<?php
if (!(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true)) {
    header('Location: /login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Students - VCS</title>
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
                                    <h4 class="card-title">Table Students</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Fullname</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, i) in list">
                                                    <th>{{ i+1 }}</th>
                                                    <td>{{ item.username }}</td>
                                                    <td>{{ item.fullname }}</td>
                                                    <td>{{ item.phone }}</td>
                                                    <td>{{ item.email }}</td>
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
                    fetch('/api/students')
                    .then(r => r.json())
                    .then(r => {
                        if(r.status) {
                            this.list = r.data
                        }
                    })
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