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
  <div id="cont">
    <div class="row">
      <div class="col-md-6 ">
        <?php echo '<a href="' . $info_entete['siteweb'] . '">';  ?>
        <h1 class="entete"><?php echo $entete = $info_entete['Entete']; ?></h1>
        <h5 class="entete"> <?php echo $entete = $info_entete['Sloga']; ?></h5>
        <?php echo  $info_entete['telephone'] . '';
        echo   $info_entete['email'] . '';
        echo  $info_entete['adresse'] . ''; ?>
        </a>
      </div>
      <div class="col-md-5">
        <form action="" method="post">
          <button name="update" class="form-control">UPDATE</button>
        </form>
        <?php if (isset($_POST['update'])) {
          # code...
          $bdd->query("UPDATE mois SET etat='dispo' WHERE etat='panier'") or die(print_r($bdd->errorInfo()));
        } ?>
        <?php $searcheEleves = searcheEleves() ?>
        <div class="form-group">
          <input type="text" size="30" class="form-control BarSearch" placeholder=" Mot clés: <?php echo $searcheEleves['nom'] . ', ' . $searcheEleves['postnom'] . ', ' . $searcheEleves['matricule'] . ', ' . $searcheEleves['promotion']; ?>" autocomplete>
        </div>
      </div>
      <div class="col-md-1">
        <a href="#" class="thumbnail">
          <img src="../lgo.png" class="img-rounded" alt="...">
        </a>
      </div>
    </div>
    <br>
    <nav class="navbar navbar-default">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <a class="navbar-brand" href="accueil.php">Accueil </a>
          <?php

          if ($_SESSION['level'] == 1 or $_SESSION['level'] == 6) { ?>

            <li class="dropdown">
              <a href="classe.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Finance <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="reinsciption.php">Réinscription</a></li>
                <li><a href="autres.php">Autres Frais</a></li>
              </ul>
            </li>

          <?php  }
          ?>
          <li class="dropdown">
            <ul class="dropdown-menu">
              <li><a href="inscr.php">Inscription</a></li>
              <li><a href="reinsciption.php">Réinscription</a></li>
              <li><a href="#">Derogation</a></li>


            </ul>
          </li>
          <li class="dropdown">
            <a href="classe.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Classes <span class="caret">
              </span></a>
            <ul class="dropdown-menu">
              <li><a href="classe.php?classe=1">Toutes</a></li>
              <li><a href="classe.php?classe=2">Maternelle</a></li>
              <li><a href="classe.php?classe=3">Primaire</a></li>
              <li><a href="classe.php?classe=4">Secondaire</a></li>
            </ul>
          </li>
          <?php if ($_SESSION['level'] == 6) {
            echo '
        <li><a href="secure_d.php?id=6">Depense</a></li>
         ';
          }
          ?>

          <li class="dropdown">
            <a href="rapport_finance.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rapports <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="secure_d.php?id=5">Entrée et Sortie </a></li>
              <li><a href="situation _all_year.php">Situation Générale</a></li>
              <li><a href="autres_frais.php">Autres Frais</a></li>
              <li><a href="vendetor.php">Suivis littige</a></li>
              <li><a href="indisponibles.php">Cas d'Abandon</a></li>
              <li><a href="suivi_derogation.php">Derogation</a></li>
            </ul>
          </li>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="deconnexion.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user">Suivis Elève</span> <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li><a href="situation _all_year.php">Situation Générale</a></li>
                <li><a href="vendetor.php">Litige</a></li>
              </ul>
            </li>
          </ul>

          <li class="dropdown">
            <a href="operation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opérations <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="" data-toggle="modal" data-target="#myModal2">Dérogation</a></li>
              <li><a href="modification.php">Modification</a></li>
              <li><a href="secure_d.php?id=10">Duplicatat</a></li>

              <?php if ($_SESSION['level'] == 6) {
                echo '
            <li><a href="secure_d.php?id=1">Operation facture</a></li>
            <li><a href="secure_d.php?id=2">Création articles</a></li>
            <li><a href="secure_d.php?id=3">Panneau de configuration</a></li>
            <li><a href="secure_d.php?id=7">Corbeille</a></li>
            <li><a href="secure_d.php?id=8">Creation Frais Unique</a></li>
              ';
              } ?>

            </ul>
          </li>

          <li class="dropdown">
            <a href="operation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion Articles <span class="caret"></span></a>
            <ul class="dropdown-menu">

              <?php if ($_SESSION['level'] == 6) {
                echo '
            
            <li><a href="secure_d.php?id=2">Création et Appro articles</a></li>
             <li><a href="secure_d.php?id=9">Stock Article</a></li>
            
              ';
              } ?>

            </ul>
          </li>

        </ul>

        <ul class="nav navbar-right ">
          <li class="dropdown">
            <a href="../dashboard.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"><span class="user">DASHBOARD</span> <span class="caret"></span></a>
          </li>
        </ul>
        <!-- /.navbar-collapse -->
    </nav>
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