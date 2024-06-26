<?php
session_start();

// Vérifier si une session est déjà active
if (isset($_SESSION['login'])) {
    // Rediriger vers la page dashboard ou une autre page sécurisée
    header('Location: dashboard.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <script type="text/javascript" id="debugbar_loader" data-time="1666272427" src="index.php?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <meta charset="utf-8" />
    <title>Register | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="public/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/line-awesome.min.css">
    <link rel="stylesheet" href="public/plugins/alertify/alertify.min.css">
    <link rel="stylesheet" href="public/plugins/lightbox/glightbox.min.css">
    <link rel="stylesheet" href="public/plugins/c3-chart/c3.min.css">
    <link rel="stylesheet" href="public/plugins//toastr/toatr.css">
    <link rel="stylesheet" href="public/css/select2.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="public/css/fullcalendar.min.css">
    <link rel="stylesheet" href="public/plugins/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="public/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body class="account-page">


    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <div class="account-logo">
                    <a href="dashboard"><img src="public/img/logo2.png" alt="Dreamguy's Technologies"></a>
                </div>

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Creation Compte</h3>
                        <p class="account-subtitle"></p>

                        <form class="needs-validation custom-form mt-4 pt-2" novalidate method="post" action="auth/register.php">
                            <div class="form-group">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="useremail" name="login" placeholder="Enter email" required>
                                <div class="invalid-feedback">
                                    Please Enter Email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userpassword" class="form-label">Mot de Passe</label>
                                <input type="password" class="form-control" id="userpassword" name="passwd" placeholder="Enter password" required>
                                <div class="invalid-feedback">
                                    Entrez le mot de passe
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="repeatpassword" class="form-label">Repetez le mot de passe</label>
                                <input type="password" class="form-control" id="repeatpassword" name="repeatpasswd" placeholder="Enter password again" required>
                                <div class="invalid-feedback">
                                    Repetez le mot de passe
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Entrez votre nom</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter full name" required>
                                <div class="invalid-feedback">
                                    Votre Nom Complet
                                </div>
                            </div>


                            <input type="hidden" class="form-control" id="level" name="level" value="1" placeholder="Enter access level" required>
                            <div class="invalid-feedback">
                                Please Enter Access Level
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Register</button>
                            </div>
                            <div class="account-footer">
                                <p>Already have an account? <a href="index">Login</a></p>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="public/js/jquery-3.6.0.min.js"></script>

    <script src="public/js/bootstrap.bundle.min.js"></script>

    <script src="public/js/jquery.slimscroll.min.js"></script>

    <script src="public/js/select2.min.js"></script>

    <script src="public/js/moment.min.js"></script>
    <script src="public/js/bootstrap-datetimepicker.min.js"></script>

    <script src="public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <script src="public/js/jquery-ui.min.js"></script>
    <script src="public/js/fullcalendar.min.js"></script>
    <script src="public/js/jquery.fullcalendar.js"></script>

    <script src="public/js/jquery.dataTables.min.js"></script>
    <script src="public/js/dataTables.bootstrap4.min.js"></script>

    <script src="public/js/validation.init.js"></script>

    <script src="public/js/app.js"></script>

</body>

</html>