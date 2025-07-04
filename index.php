<?php
session_start();
// Generate a cryptographically secure token for this session
$token = $_SESSION['token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut" href="lgo.png" >

<?php  include('bdd_app_gst_connect/class_authetification.php');?>
<link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
</head>

 <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * */
        


        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>

     
  		<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <form class="formValidation" method="post">
            <h1 class="text-light">Karibu </h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Utilisateur:</label>
                <input type="text" required name="login" autofocus=""  id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Mot de Passe:</label>
                <input type="password" required name="psswd" id="user_password">
                <button class="button helper-button reveal"></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary valideBtn">Connexion...</button>
                <button type="reset" class="button link">Cancel</button>
                <p><center>GestEcole 3.0 ||KIZAME</center></p>
            </div>
        </form>
    </div>
      <?php
          if(isset($_POST['login']) and (isset($_POST['psswd']))){
               $login=filtrageVariable($_POST['login']);
               $psswd=filtrageVariable($_POST['psswd']);
               Authenfication($login,$psswd);
               }
      ?>
</body>
</html>

 