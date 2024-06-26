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
    <script type="text/javascript" id="debugbar_loader" data-time="1666272205" src="index.php?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="public/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
    <?php include 'css.html'; ?>
    <?php require_once('config/allscirpt.inc.php');?>
    <?php  include('config/class_authetification.php');?>

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
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <form class="needs-validation custom-form mt-4 pt-2" method="post" >
                            <div class="form-group">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="useremail" name="login" placeholder="Enter email" required >
                                <div class="invalid-feedback">
                                    Please Enter Email
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="userpassword" class="form-label">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="auth-recoverpw">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password" name="psswd" placeholder="Enter password">
                                    <div class="invalid-feedback">
                                        Please Enter Password
                                    </div>
                                    <span class="fa fa-eye-slash" id="toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="register.php">Register</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
          if(isset($_POST['login']) and (isset($_POST['psswd']))){
               $login=$_POST['login'];
               $psswd=$_POST['psswd'];
               Authenfication($login,$psswd);
               }
      ?>
    <?php include 'css.html'; ?>

</body>

</html>