<?php ob_start();
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
  <link rel="shortcut icon" type="image/x-icon" href="../public/img/favicon.png">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css">
  <link rel="stylesheet" href="../public/css/line-awesome.min.css">
  <link rel="stylesheet" href="../public/plugins/alertify/alertify.min.css">
  <link rel="stylesheet" href="../public/plugins/lightbox/glightbox.min.css">
  <link rel="stylesheet" href="../public/plugins/c3-chart/c3.min.css">
  <link rel="stylesheet" href="../public/plugins//toastr/toatr.css">
  <link rel="stylesheet" href="../public/css/select2.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../public/css/fullcalendar.min.css">
  <link rel="stylesheet" href="../public/plugins/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../public/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/css/style.css">

</head>
<div class="header">
  <div class="header-left">
    <a href="../dashboard.php" class="logo">
      <img src="../public/img/logo.png" width="40" height="40" alt="">
    </a>
  </div>
  <a id="toggle_btn" href="javascript:void(0);">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>
  <div class="page-title-box">
    <h3>CRM Berakha</h3>
  </div>
  <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
  <ul class="nav user-menu">
    <li class="nav-item">
      <div class="top-nav-search">
        <a href="javascript:void(0);" class="responsive-search">
          <i class="fa fa-search"></i>
        </a>
        <form action="search">
          <input class="form-control" type="text" placeholder="Search here">
          <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </li>
    <li class="nav-item dropdown has-arrow flag-nav">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
        <img src="../public/img/flags/us.png" alt="" height="20"> <span>English</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="../public/img/flags/us.png" alt="" height="16"> English
        </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="../public/img/flags/fr.png" alt="" height="16"> French
        </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="../public/img/flags/es.png" alt="" height="16"> Spanish
        </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="../public/img/flags/de.png" alt="" height="16"> German
        </a>
      </div>
    </li>


    <li class="nav-item dropdown">
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">3</span>
      </a>
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
          <span class="notification-title">Notifications</span>
          <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
        </div>
        <div class="noti-content">
          <ul class="notification-list">

          </ul>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="activities">View all Notifications</a>
        </div>
      </div>
    </li>


    <li class="nav-item dropdown">
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
      </a>
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
          <span class="notification-title">Messages</span>
          <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
        </div>
        <div class="noti-content">
          <ul class="notification-list">

          </ul>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="apps-chat">View all Messages</a>
        </div>
      </div>
    </li>

    <li class="nav-item dropdown has-arrow main-drop">
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <span class="user-img"><img src="../public/img/profiles/avatar-21.jpg" alt="">
          <span class="status online"></span></span>
        <span>Admin</span>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="profile">My Profile</a>
        <a class="dropdown-item" href="settings">Settings</a>
        <a class="dropdown-item" href="auth-login">Logout</a>
      </div>
    </li>
  </ul>

</div>

<button class='btnEffacerTab'><img src='img/module_notinstall.png'></button>
<div class="detailListes"> </div>
<script type="text/javascript" src="js/__search.js"></script>
<script type="text/javascript" src="js/__gestionMounth.js"></script>

<body>

  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">Direction</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Direction</li>
            </ul>
          </div>
          <div class="col-auto float-end ms-auto">
            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa fa-plus"></i> Add </a>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-4">
        </div>

        <div class="col-lg-8">
          <div class="mentionAppoint"></div>
          <form method="post" action="" class=" form-inline " enctype="multipart/form-data">

            <p><input type="text" class="form-control nom" size="45" value="" placeholder="Nom" required />
              <input type="text" class="form-control postnom" size="45" value="" placeholder="Postnom" required />
            </p>
            <p>
              <input type="text" class="form-control prenom" size="45" value="" placeholder="Pr&eacute;nom" required />
              <input type="text" class="form-control lieun" size="45" value="" placeholder="Lieu de naissance" required />
            </p>
            <p>
              <input type="text" size="50" class="form-control daten" value="" name="daten" placeholder="Date de naissance AAAA-MM-JJ" />

              <select class="form-control sexe" required name="sexe">

                <option value="F">F</option>
                <option value="M">M</option>
              </select>

              <input type="text" size="45" class="form-control adresse" placeholder="Adresse Domicile" required />
            </p>
            <p>
              <input type="text" size="45" class="form-control provenance" placeholder="Ecole de Provenance" required />
              <input type="text" size="45" class="form-control pourcentage" placeholder="Pourcentage Obtenue" required />
            </p>
            <input type="text" size="45" class="form-control mention" placeholder="Mention " required />

            <select class="form-control pays">

              <option>RDC</option>
            </select>

            <fieldset>
              <legend>PHOTO</legend>
              <input type="file" class="form-control photo" title="Selectionner une Photo" multiple="file" />
            </fieldset>



            <legend>ECOLE</legend>
            <div class="retrouMessage"></div>
            <input type="text" value="HP4" class="form-control classe" placeholder="Classe Eleve" />

            <select class="form-control categorie_paiement" name="categorie">
              <option>Totalite</option>
              <option>Moitie</option>
              <option>Pris en charge</option>
            </select>

            <select class="form-control modePaiement" name="modePaiement">
              <option>Normal</option>
              <option>Elargi</option>
            </select>
            <div class="form-group">
              <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
              <div class="input-group">
                <div class="input-group-addon">$</div>
                <input type="text" name="reduction" value="0" class="form-control reduction" placeholder="Reduction">
                <div class="input-group-addon">.00</div>
              </div>
            </div>

            <input type="text" class="form-control" name="codep" placeholder="Code parent" />
            <input type="text" id="matricule" class="matricule" readonly />
            <input type="hidden" class="form-control link" value="inscription" readonly />
            <?php if ($_SESSION['level'] == 1) {
              $status = 'hidden';
            } else {
              $status = '';
            } ?>
            <input type="<?php echo $status; ?>" format=('Y-m-d') class="form-control date" name="date" value="<?php echo gmdate('Y-m-d'); ?> " placeholder="Adresse" />
            </fieldset>
            <p>

            </p>
            <div class="btnValidationGroup">
              <input type="button" class="pull-right btn btn-success btnValidation" value="Enregistrer" />
              <p>
                <input type="reset" class="pull-right btn btn-danger" value="Effacer" />
              </p>
            </div>
        </div>


      </div>
      </div>
      </div>
</body>

<?php ob_end_flush(); ?>
      <script type="text/javascript" src="js/__inscription.js"></script>
      <script type="text/javascript" src="js/__contrainte_inscription.js"></script>
</html>

      