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
    <title>Profile</title>
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
                <div class="row justify-content-md-center">
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Avatar</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img data-holder-rendered="true" class="rounded-circle" style="object-position: center; object-fit: cover; max-width: 100%; width: 150px; height: 150px;" :src="avt" />
                                    <span ref="avt-fullname" class="text-dark"><?php echo htmlspecialchars($_SESSION['fullname']); ?></span>
                                    <span ref="avt-email"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                                </div>
                                <div class="d-flex flex-column align-items-center text-center mt-2">
                                    <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#changeAvt">Edit Avatar</button>
                                    <?php include 'layouts/change_avt.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">Infomation</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input v-model="username" class="form-control" placeholder="Username" <?php echo $is_student ? 'disabled' : ''; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fullname</label>
                                        <div class="col-sm-9">
                                            <input v-model="fullname" class="form-control" placeholder="Fullname" <?php echo $is_student ? 'disabled' : ''; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input v-model="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input v-model="phone" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-block" @click="save">Save</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#changePassword">Change password</button>
                                            <?php include 'layouts/edit_profile.php'; ?>
                                        </div>
                                    </div>
                                </form>
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
                    username: '<?php echo $_SESSION['username']; ?>',
                    fullname: '<?php echo $_SESSION['fullname']; ?>',
                    avt: '<?php echo $_SESSION['avt']; ?>',
                    email: '<?php echo $_SESSION['email']; ?>',
                    phone: '<?php echo $_SESSION['phone']; ?>',
                    old_password: '',
                    new_password: '',
                    confirm_password: '',
                    imgUpload: null,
                    imgErr: ''
                }
            },
            methods: {
                save() {
                    fetch('/api/edit', {
                        method: 'POST',
                        body: JSON.stringify({ <?php
                            echo $is_student ? 'phone: this.phone, email: this.email' :  'username: this.username, fullname: this.fullname, phone: this.phone, email: this.email';
                        ?> }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            this.$refs['avt-fullname'].innerText = this.fullname
                            this.$refs['avt-email'].innerText = this.email 
                            swal(r.msg, '', 'success')
                        } else {
                            sweetAlert('Oops...',r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', err, 'error')
                    })
                },
                changePassword() {
                    fetch('api/change_password', {
                        method: 'POST',
                        body: JSON.stringify({
                            old_password: this.old_password,
                            password: this.new_password
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            this.$refs['close-modal'].click()
                            swal(r.msg, '', 'success')
                            this.new_password = ''
                            this.old_password = '',
                            this.confirm_password = ''
                        } else {
                            sweetAlert('Oops...',r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', err, 'error')
                    })
                },
                uploadFile(e) {
                    this.$refs.filename.innerText = e.target.files[0].name
                    if (e.target.files[0].size > 1024*1024*5) {
                        this.$refs['btn-upload'].disabled = true
                        this.imgErr = 'File size should not be larger than 5MB'
                        return 
                    }
                    this.imgUpload = e.target.files[0]
                    this.$refs['btn-upload'].disabled = false
                    this.imgErr = ''
                },
                changeAvt() {
                    let formData = new FormData()
                    formData.append('file', this.imgUpload)
                    fetch('/api/upload', {
                        method: 'POST',
                        body: formData
                    })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            this.afterUpload()
                            this.avt = r.url
                            swal(r.msg, '', 'success')
                        } else {
                            this.imgErr = r.msg
                            this.$refs['btn-upload'].disabled = true
                        }
                    })
                    .catch(err => this.imgErr = err)
                },
                afterUpload() {
                    this.imgUpload = null
                    this.$refs['close-btn-upload'].click()
                    this.$refs['btn-upload'].disabled = true
                    this.$refs['filename'].innerText = 'Choose file'
                    this.$refs['file-upload'].value = ''
                }
            },
            watch: {
                confirm_password(val) {
                    if (val == this.new_password) {
                        this.$refs.confirm.className = 'form-control'
                        this.$refs['btn-change'].disabled = false
                        return
                    }
                    this.$refs.confirm.className = 'form-control is-invalid'
                    this.$refs['btn-change'].disabled = true
                }
            }
        }
        Vue.createApp(App).mount('#app')
    </script>
</body>
</html>