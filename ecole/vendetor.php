<?php include('header.php'); ?>
<script type="text/javascript">
  function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontant = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontant;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

<body>
  <div class=" private">
    <div class="row">
      <input type="button" value="Imprimer" class="btn btn-success" onclick="printContent('div1')" />
      <div class="col-md-10">
        <form action="" method="post" class="form-inline" id="jn" name="form-one">
          <label>Liste des eleves insolvables Pour :</label>
          <select name="classe" class="form-control">
  
            <?php $selection_de_classe = $bdd->query("SELECT nomclasse FROM classe order by nomclasse "); ?>
            <?php while ($liste_classe = $selection_de_classe->fetch()) {
              echo '<option value="' . $liste_classe['nomclasse'] . '">' . $liste_classe['nomclasse'] . '</option>';
            }
            ?>
          </select>
          <label>Appartir du Mois de :</label>
          <select name="mois" class="form-control">
            <?php $annee = $bdd->query("SELECT DISTINCT moisp FROM mois "); ?>
            <?php while ($info = $annee->fetch()) {
              echo '<option value="' . $info['moisp'] . '">' . $info['moisp'] . '</option>';
            }
            ?>
          </select>
          <select name="annee" class="form-control">
            <?php $annee = $bdd->query("SELECT annee FROM anne_scolaire order by id desc "); ?>
            <?php while ($info = $annee->fetch()) {
              echo '<option value="' . $info['annee'] . '">' . $info['annee'] . '</option>';
            }
            ?>
          </select>
          <input type="hidden" name="type" value="insolvable">
          <input type="submit" value="Afficher" name="btn-one" class="btn btn-primary" />
        </form>
      </div>
      <div class="col-offset-md-1 col-md-2">
      </div>
    </div>
    <hr />
    <div class="row">
      <div id="div1">
        <div class="table-responsive">
        
                <?php
                $i = 0;


                if (isset($_POST['classe'])) {

                
                $classeSpecifique = $_POST['classe'];
                $etatDesire = 'dispo';
                $anneeAcademiqueSpecifique = Annee_scolaire();
                $moisPaiement = $_POST['mois'];

                // Suite de la connexion PDO

                $sql = "SELECT 
            e.*, 
            m.moisp, 
            m.etat AS etat_paiement, 
            m.annee_acad, 
            m.cdfact 
        FROM 
            eleve e
        LEFT JOIN 
            mois m ON e.matricule = m.matricule
        WHERE 
            m.etat = :etat AND 
            e.promotion = :classeSpecifique AND
            m.annee_acad = :anneeAcademique AND
            m.moisp = :moisPaiement
        GROUP BY 
            e.matricule";

                $stmt = $bdd->prepare($sql);

                // Liaison des valeurs aux paramètres nommés dans la requête préparée
                $stmt->bindValue(':etat', $etatDesire);
                $stmt->bindValue(':classeSpecifique', $classeSpecifique);
                $stmt->bindValue(':anneeAcademique', $anneeAcademiqueSpecifique);
                $stmt->bindValue(':moisPaiement', $moisPaiement);

                // Exécution de la requête
                $stmt->execute();

                // Récupération des résultats
                $results = $stmt->fetchAll();

                // Récupération des résultats

                

                ?>

              
<table class=" table table-striped table-bordere ">
  <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Classe</th>
      
          <th>État de Paiement</th>
          <th>Année Académique</th>
    </thead>
                  </tr>
                  <?php foreach ($results as $row) : ?>
                    <tr>
                      <td><?php echo htmlspecialchars($row['nom']); ?></td>
                      <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                      <td><?php echo htmlspecialchars($row['promotion']); ?></td>
                      <td><?php echo htmlspecialchars($row['moisp']); ?></td>
                      <td><?php echo htmlspecialchars($row['annee_acad']); ?></td>
                      <td><?php echo htmlspecialchars($row['cdfact']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>

              <?php }?>
            </div>

          </table>
          <script language="Javascript" src="traitement.js"></script>
         