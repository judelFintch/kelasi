<?php
session_start();
if (isset($_SESSION['user'])) {
  require_once('../config/allscirpt.inc.php');
} else {
  header("Location:../index.php");
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial
scale=1.0">
  <title>Accueil || <?php echo $entete = $info_entete['Entete']; ?> </title>
  <?php include('liens_boostrap.php') ?>

  <link rel="shortcut icon" type="image/x-icon"
        href="../public/img/favicon.png">

    <link rel="stylesheet"
        href="../public/css/bootstrap.min.css">

    <link rel="stylesheet"
        href="../public/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="../public/css/line-awesome.min.css">

    <link rel="stylesheet"
        href="../public/plugins/alertify/alertify.min.css">

    <link rel="stylesheet"
        href="../public/plugins/lightbox/glightbox.min.css">

    <link rel="stylesheet"
        href="../public/plugins/c3-chart/c3.min.css">

    <link rel="stylesheet"
        href="../public/plugins//toastr/toatr.css">

    <link rel="stylesheet"
        href="../public/css/select2.min.css">

    <link rel="stylesheet"
        href="../public/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet"
        href="../public/css/fullcalendar.min.css">

    <link rel="stylesheet"
        href="../public/plugins/summernote/dist/summernote-bs4.css">

    <link rel="stylesheet"
        href="../public/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../public/css/style.css">
  <script src="../js/metro.js"></script>
  <script type="text/javascript" src="js/__heure.js"></script>
  
    <font color="royalbleu">
      <div class="alert alert-info" role="alert" id="notification">
        <?php echo '<a href="rapport.php?du=' . date('Y-m-d') . '& au=' . date('Y-m-d') . '">' ?>
        <span class="badge">
          <?php echo  numeberormat($mont_usd); ?> USD ||
          <?php echo  numeberormat($mont_cdf); ?> CDF </span></a>
        <b> <span id="date_heure"></span>
          <script type="text/javascript">
            window.onload = date_heure('date_heure');
          </script> || <a href="eleves.php">Eleve(s) <span class="badge"> <?php echo $comtpeur ?> (G <?php echo $garcon ?>) (F <?php echo $fille ?>) Cas Abandon( <?php echo $abadon ?>)
            </span></a> || <a href="secure_d.php?id=4">Taux :<?php echo $taux; ?></a>
        </b>
    </font> || <?php echo $_SESSION['user'] ?> est connect&eacute;(e)

  </div>
  <?php include('modals.php') ?>
</head>
<button class='btnEffacerTab'><img src='img/module_notinstall.png'></button>
<div class="detailListes"> </div>
<script type="text/javascript" src="js/__search.js"></script>
<script type="text/javascript" src="js/__gestionMounth.js"></script>
<?php $id = rand(1, 4);
$salutation = salutation($id);
$user = $_SESSION['user'];
?>