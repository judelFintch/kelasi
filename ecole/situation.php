<?php include('header.php'); ?>
<body>
<?php
// Vérifiez si les paramètres 'matr' et 'annacad' sont définis dans l'URL
    if (isset($_GET['matr']) && isset($_GET['annacad'])) {
        // Sécurisez les entrées utilisateur en utilisant des requêtes préparées
        $type_reche = $_GET['matr'];
        $annacad = $_GET['annacad'];
        // Initialisation des totaux
        $total1 = 0;
        $total2 = 0;
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th style="width: 90px;">Motif</th>
            <th style="width: 90px;">USD</th>
            <th style="width: 90px;">CDF</th>
            <th style="width: 90px;">FACTURE</th>
            <th style="width: 100px;">Quantité</th>
            <th style="width: 100px;">COMPTE</th>
            <th style="width: 120px;">Date</th>
        </tr>
  
  <?php
  // Préparez et exécutez la requête pour récupérer les informations financières
      $requete = $bdd->prepare("SELECT matricule, nom_eleve, qte_acheter, motif, classe_eleve, montantusd, montantcdf, cdfact, date_enreg, compte FROM finance WHERE matricule = :matricule AND anne_acad = :anne_acad ORDER BY date_enreg ASC");
      $requete->execute(['matricule' => $type_reche, 'anne_acad' => $annacad]);
          if ($requete->rowCount() == 0) {
            echo '<p style="color:red;" align="center">Vide pour cette recherche !</p>';
          } else {
            // Préparez et exécutez la requête pour récupérer les informations de l'élève
            $requeteid = $bdd->prepare("SELECT * FROM eleve WHERE matricule = :matricule");
            $requeteid->execute(['matricule' => $type_reche]);
            $resultatid = $requeteid->fetch();
          }
  ?>
        <div class="row">
            <div class="col-lg-2">
                <img class="img-responsive" src="../images/fr.jpg" width="100%" height="100%" title="' . htmlspecialchars($resultatid['prenom'] . ' ' . $resultatid['nom'], ENT_QUOTES, 'UTF-8') . '" alt="Photo manquante"/>
            </div>
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4">
               <?php echo ' <a href="detail.php?matricule=' . urlencode($resultatid['matricule']) . '">';?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge"><?=  htmlspecialchars($resultatid['nom'] . ' ' . $resultatid['postnom']) ?></span>
                            Nom et Post Nom
                        </li>
                    </a>
                    <li class="list-group-item">
                        <span class="badge"><?= htmlspecialchars($resultatid['prenom'], ENT_QUOTES, 'UTF-8')?></span>
                        Prénom
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= htmlspecialchars($resultatid['promotion'], ENT_QUOTES, 'UTF-8')?></span>
                        Classe
                    </li>
                </ul>
            </div>
        </div>
       <?php
        while ($resultat = $requete->fetch()) {?>
            <tr>
                <td style="font-size: 11px;"><b> <?= htmlspecialchars($resultat['motif'], ENT_QUOTES, 'UTF-8')?></b></td>
                <td style="font-size: 11px;"><?= htmlspecialchars($resultat['montantusd'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-size: 11px;"><?=  htmlspecialchars($resultat['montantcdf'], ENT_QUOTES, 'UTF-8') ?>Fc</td>
                <td style="font-size: 11px;"><?= htmlspecialchars($resultat['cdfact'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-size: 11px;"><?=  htmlspecialchars($resultat['qte_acheter'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-size: 11px;"><?=  htmlspecialchars($resultat['compte'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-size: 11px;"><?=  htmlspecialchars($resultat['date_enreg'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php
            $total1 += $resultat['montantcdf'];
            $total2 += $resultat['montantusd'];
          }
         ?>
    
        </table>
        <p></p><hr>
      <table class="table table-striped table-bordered" style="background-color:white;"><tr>

     <?php   $selection_mois = $bdd->prepare("SELECT moisp, etat FROM mois WHERE matricule = :matricule AND annee_acad = :annee_acad AND etat = 'dispo'");
        $selection_mois->execute(['matricule' => $type_reche, 'annee_acad' => $annacad]);

        while ($resulta_mois = $selection_mois->fetch()) {
            echo '<td class="alert alert-danger">' . htmlspecialchars($resulta_mois['moisp'], ENT_QUOTES, 'UTF-8') . '</td>';
        }
        ?>
        </tr></table>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><b><?= htmlspecialchars($total2, ENT_QUOTES, 'UTF-8') ?> ($)</b></span>
                Total en USD
            </li>
            <li class="list-group-item">
                <span class="badge"><b><?=htmlspecialchars($total1, ENT_QUOTES, 'UTF-8') ?>(FC)</b></span>
                Total en CDF
            </li>
        </ul>
<?php
    }

?>
<?php include('footer.php'); ?>
