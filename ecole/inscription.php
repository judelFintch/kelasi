<?php ob_start();
include('header.php'); ?>

<body>
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
  
  <?php include('footer.php');
  ob_end_flush(); ?>
  <script type="text/javascript" src="js/__inscription.js"></script>
  <script type="text/javascript" src="js/__contrainte_inscription.js"></script>