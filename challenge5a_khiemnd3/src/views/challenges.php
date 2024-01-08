<?php
if (!(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true)) {
    header('Location: /login');
    exit();
}
$is_student = $_SESSION['type'] === 'student' ? true : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Challenges - VCS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/kma.png">
    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'layouts/preloader.php'; ?>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php include 'layouts/header.php'; ?>
        <?php include 'layouts/sidebar.php'; ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" id="app">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Welcome back <?php echo htmlentities($_SESSION['fullname']); ?>!</h4>
                                <span class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                    <?php if(!$is_student) { ?>
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <div class="float-right">
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createChallenge">Create challenge</button>
                                    <?php include 'layouts/create_challenge.php'; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div v-for="(item, i) in list" class="col-xl-6">
                            <div class="card text-white bg-dark">
                                <div class="card-header">
                                    <h5 class="card-title text-white">{{ item.title }}</h5>
                                </div>
                                <div class="card-body mb-0">
                                    <p class="card-text">{{ item.hint }}</p>
                                </div>
                                <div class="card-footer d-sm-flex justify-content-between">
                                    <?php if(!$is_student) { ?>
                                        <div>
                                            <button @click="() => deleteItem(item.id)" class="btn btn-primary">Delete</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="input-group mb-3">
                                            <input :ref="`input-${item.id}`" type="text" class="form-control" placeholder="Answer">
                                            <div class="input-group-append">
                                                <button @click="() => submitChallenge(item.id)" class="btn btn-primary" type="button">Submit</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <?php include 'layouts/footer.php'; ?>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- Required vendors -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.31/vue.global.prod.min.js"></script>
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/quixnav-init.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        const App = {
            data() {
                return {
                    list: [],
                    title: '',
                    desc: '',
                    fileErr: ''

                }
            },
            methods: {
                uploadFile(e) {
                    this.$refs.filename.innerText = e.target.files[0].name
                    if (e.target.files[0].size > 1024*1024*20) {
                        this.$refs['btn-save'].disabled = true
                        this.fileErr = 'File size should not be larger than 20MB'
                        return 
                    }
                    this.file = e.target.files[0]
                    this.$refs['btn-save'].disabled = false
                    this.fileErr = ''
                },
                save() {
                    let formData = new FormData()
                    formData.append('file', this.file)
                    formData.append('title', this.title)
                    formData.append('desc', this.desc)
                    fetch('/api/create_challenge', {
                        method: 'POST',
                        body: formData
                    })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            this.afterSave()
                            swal('Challenge created!', '', 'success')
                            this.showAll()
                        } else {
                            this.fileErr = r.msg
                        }
                    })
                    .catch(err => this.fileErr = err)
                },
                showAll() {
                    fetch('/api/challenges')
                    .then(r => r.json())
                    .then(r => {
                        if(r.status) {
                            this.list = r.data
                        } else {
                            sweetAlert('Oops...', r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', '' + err, 'error')
                    })
                },
                <?php if(!$is_student) { ?>
                deleteItem(id) {
                    fetch(`/api/delete_challenge?id=${id}`)
                    .then(r => r.json())
                    .then(r => {
                        if(r.status) {
                            swal('Challenge deleted!', '', 'success')
                            this.showAll()
                        } else {
                            sweetAlert('Oops...', r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', '' + err, 'error')
                    })
                },
                <?php } else { ?>
                submitChallenge(id) {
                    let ans = this.$refs[`input-${id}`][0].value
                    fetch('/api/submit_challenge', {
                        method: 'POST',
                        body: JSON.stringify({
                            id,
                            answer: ans
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(r => r.json())
                    .then(r => {
                        if(r.status) {
                            swal('Correct!', r.msg, 'success')
                        } else {
                            sweetAlert('Oops...', r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', '' + err, 'error')
                    })
                },
                <?php } ?>
                afterSave() {
                    this.$refs['close-modal'].click()
                    this.$refs['btn-save'].disabled = true
                    this.$refs['filename'].innerText = 'Choose file'
                    this.$refs['file-upload'].value = ''
                    this.fileErr = ''
                    this.title = ''
                    this.desc = ''
                }
            },
            mounted() {
                this.showAll()
            }
        }
        Vue.createApp(App).mount('#app')
    </script>
</body>

</html>