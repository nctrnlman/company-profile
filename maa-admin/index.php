    <?php
    session_start();
    include '../db.php';

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Admin | MAA GROUP</title>

        <meta name="keywords" content="Company Profile" />
        <meta name="description" content="Maa Group" />
        <meta name="author" content="MAA" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="../img/demos/business-consulting-3/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

        <!-- Web Fonts  -->
        <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css" />


        <!-- Vendor CSS -->
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="../vendor/animate/animate.compat.css" />
        <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.min.css" />
        <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.min.css" />
        <link rel="stylesheet" href="../vendor/magnific-popup/magnific-popup.min.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="../css/theme.css" />
        <link rel="stylesheet" href="../css/theme-elements.css" />
        <link rel="stylesheet" href="../css/theme-blog.css" />
        <link rel="stylesheet" href="../css/theme-shop.css" />

        <!-- Demo CSS -->
        <link rel="stylesheet" href="../css/demos/demo-business-consulting-3.css" />

        <!-- Demo CSS -->
        <link rel="stylesheet" href="../css/demos/demo-construction.css" />

        <!-- Skin CSS -->
        <link id="skinCSS" rel="stylesheet" href="../css/skins/skin-business-consulting-3.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="../css/custom.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
        </style>


    </head>

    <body style="background-image: url('../img/demos/business-consulting-3/backgrounds/background-6.jpg'); ">
        <div class="col-md-12">
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    <?php if (isset($_SESSION['success_message'])) { ?>
                        Swal.fire({
                            icon: 'success',
                            text: '<?php echo $_SESSION['success_message']; ?>',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        <?php unset($_SESSION['success_message']); ?>
                    <?php } ?>

                    <?php if (isset($_SESSION['error_message'])) { ?>
                        Swal.fire({
                            icon: 'error',
                            text: '<?php echo $_SESSION['error_message']; ?>',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        <?php unset($_SESSION['error_message']); ?>
                    <?php } ?>
                });
            </script>
        </div>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="../img/demos/business-consulting-3/logo-MAA-component-1.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="card p-4 col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="background: rgba(100, 0, 0, 0.8); border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="text-center">
                            <h2 class="text-white" style="font-size: 24px; font-weight: bold;">Welcome, Admin!</h2>
                            <p class="text-muted" style="font-size: 16px;">Please sign in to access the admin panel.</p>
                        </div>
                        <form action="login-admin.php" method="POST">
                            <div class="form-outline mb-3">
                                <input type="text" id="form3Example3" class="form-control form-control-lg" name="username" placeholder="Username" />
                            </div>
                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Password" />
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-dark btn-lg" style="border-radius: 30px; padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <div class=" text-center text-md-start justify-content-between py-4 px-4 px-xl-5 " style="background-color:  transparent">
                <div class=" mb-3 mb-md-0 text-center" style="color: #af2a25;;">
                    Mineral Alam Abadi. © 2023. All Rights Reserved
                </div>
            </div>
        </section>


        </div>

        <script src="../assets/libs/particles.js/particles.js.min.js"></script>
        <script src="../assets/js/pages/particles.app.js"></script>
        <script src="../assets/js/pages/password-addon.init.js"></script>
        <script src="../path/to/your/js/your-custom-js.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- Vendor -->
        <script src="../vendor/plugins/js/plugins.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="../js/theme.js"></script>

        <!-- Current Page Vendor and Views -->
        <script src="../js/views/view.contact.js"></script>

        <!-- Theme Custom -->
        <script src="../js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="../js/theme.init.js"></script>
    </body>

    </html>