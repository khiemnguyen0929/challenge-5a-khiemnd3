<?php
if (!(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true)) {
    header('Location: /login');
    exit();
}
if ($_SESSION['type'] !== 'admin') {
    header('Location: /');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Messages - Admin</title>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Table Users</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Message</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, i) in list">
                                                    <th>{{ i+1 }}</th>
                                                    <td>{{ item.username }}</td>
                                                    <td>
                                                        <button data-toggle="modal" :data-target="`#message-${i}`" type="button" class="btn btn-outline-danger">Message</button>
                                                        <div class="modal fade" :id="`message-${i}`" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Send message to {{ item.fullname }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="basic-form">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <textarea :ref="`textarea-${item.id}`" class="form-control" rows="4" id="comment"></textarea>
                                                                                </div>
                                                                            </form>
                                                                        </div>    
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" @click="() => sendMessage(item.id)" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                    list: []
                }
            },
            methods: {
                show() {
                    fetch('/api/all_users')
                    .then(r => r.json())
                    .then(r => {
                        if(r.status) {
                            this.list = r.data
                        }
                    })
                },
                sendMessage(id) {
                    let message = this.$refs[`textarea-${id}`][0].value
                    fetch('/api/send_message', {
                        method: 'POST',
                        body: JSON.stringify({
                            id,
                            message
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            swal('Message sent!', '', 'success')
                        } else {
                            sweetAlert('Oops...', r.msg, 'error')
                        }
                    })
                    .catch(err => {
                        sweetAlert('Oops...', '' + err, 'error')
                    })
                },
                afterSave() {
                }
            },
            mounted() {
                this.show()
            }
        }
        Vue.createApp(App).mount('#app')
    </script>
</body>

</html>