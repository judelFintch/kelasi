<?php
require_once("connexion.php");
function salutation($id){
    $tabSalutation = array('Hi!', 'Hello!', 'Bonjour!', 'Jambo!', 'Comment allez-vous?');
    return isset($tabSalutation[$id]) ? $tabSalutation[$id] : 'Hi!';
}

function numeberormat($number){
    return number_format($number, 2, ',', ' ');
}

setlocale(LC_TIME, 'fr', 'fr_FR', 'UTF-8');
function TestLevelSessionUser(){ 
    global $ecriture;
    if (isset($_SESSION['level']) && $_SESSION['level'] == 6){
        $ecriture = "readonly";
    } else {
        $ecriture = "";
    }
    return $ecriture;
}

function searcheEleves(){
    global $bdd;
    $aleatoireId = random_int(1, 1000);
    $stmt = $bdd->prepare("SELECT nom, postnom, prenom, matricule, promotion FROM eleve WHERE id = :id");
    $stmt->execute(['id' => $aleatoireId]);
    return $stmt->fetch();
}

function dynamiqueTables($annescolaire){
    $subAnneeScolaireA = substr($annescolaire, 0, 4);
    $subAnneeScolaireB = substr($annescolaire, 5, 8);
    return 'b' . $subAnneeScolaireA . '_' . $subAnneeScolaireB;
}

function filtrageVariable($string){
    if (ctype_digit($string)){
        return intval($string);
    } else {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}

function selectionClasse(){
    global $bdd;
    $stmt = $bdd->query('SELECT nomclasse FROM classe ORDER BY niveau DESC');
    return $stmt->fetchAll();
}

function selectionClasseInfoMin(){
    global $bdd;
    $stmt = $bdd->query('SELECT classe, annacad, montantmensuel FROM infomin ORDER BY id DESC');
    return $stmt->fetchAll();
}

function annee_scolaireAll(){
    global $bdd;
    $stmt = $bdd->query('SELECT annee FROM anne_scolaire ORDER BY id DESC');
    return $stmt->fetchAll();
}

function Annee_scolaire(){
    global $bdd;
    $stmt = $bdd->query("SELECT annee FROM anne_scolaire ORDER BY id DESC");
    $reception_anne = $stmt->fetch();
    return $reception_anne['annee'];
}

function Annee_scolaireReel(){
    global $bdd;
    $stmt = $bdd->query("SELECT annee FROM anne_scolaire ORDER BY id DESC");
    $reception_anne = $stmt->fetch();
    return $reception_anne['annee'];
}

function Taux_du_jour(){
    global $bdd;
    $stmt = $bdd->query("SELECT taux FROM taux ORDER BY id DESC LIMIT 1");
    $taux_du_jour_bdd = $stmt->fetch();
    return $taux_du_jour_bdd['taux'];
}

function Date_et_heure_logiciel(){
    $date = date('Y-m-d');
    $heure = date('H:i:s', strtotime('+1 hour'));
    return [$date, $heure];
}

list($date, $heure) = Date_et_heure_logiciel();
$annacad = Annee_scolaire();
$taux = Taux_du_jour();

$total_depense = 0;
$total_depense_cdf = 0;

$selection_du_depense = $bdd->prepare("SELECT montantusd_s, montantcdf_s FROM depense WHERE date_s = :date");
$selection_du_depense->execute(['date' => $date]);
while($depense_du_jour_bdd = $selection_du_depense->fetch()){
    $total_depense += $depense_du_jour_bdd['montantusd_s'];
    $total_depense_cdf += $depense_du_jour_bdd['montantcdf_s'];
}

$selection_entete = $bdd->query("SELECT * FROM info_application ORDER BY id DESC LIMIT 1");
$info_entete = $selection_entete->fetch();
$entete = $info_entete['Entete'];
$Slogan = $info_entete['Sloga'];

$select_nombre_eleve = $bdd->prepare("SELECT id FROM eleve WHERE annacad = :annacad AND etat = 'disponible'");
$select_nombre_eleve->execute(['annacad' => $annacad]);
$comtpeur = $select_nombre_eleve->rowCount();

$garcon = 0;
$fille = 0;
$abadon = 0;

$select_abadon = $bdd->prepare("SELECT id FROM eleve WHERE annacad = :annacad AND etat <> 'disponible'");
$select_abadon->execute(['annacad' => $annacad]);
$abadon = $select_abadon->rowCount();

$select_fille = $bdd->prepare("SELECT id FROM eleve WHERE sexe = 'F' AND annacad = :annacad AND etat = 'disponible'");
$select_fille->execute(['annacad' => $annacad]);
$fille = $select_fille->rowCount();

$select_garcon = $bdd->prepare("SELECT id FROM eleve WHERE sexe = 'M' AND annacad = :annacad AND etat = 'disponible'");
$select_garcon->execute(['annacad' => $annacad]);
$garcon = $select_garcon->rowCount();

$mont_usd = 0;
$mont_cdf = 0;
$selection_montant = $bdd->prepare("SELECT montantcdf, montantusd FROM finance WHERE anne_acad = :annacad AND date_enreg = :date");
$selection_montant->execute(['annacad' => $annacad, 'date' => $date]);
while($resultat_argent = $selection_montant->fetch()){
    $mont_usd += $resultat_argent['montantusd'];
    $mont_cdf += $resultat_argent['montantcdf'];
}

$comtpeur_derogation = 0;
$select_date_fin_dans_derogation = $bdd->prepare("SELECT date_fin FROM derogation WHERE date_fin = :date AND annee_academique = :annacad");
$select_date_fin_dans_derogation->execute(['date' => $date, 'annacad' => $annacad]);
if($select_date_fin_dans_derogation->rowCount() > 0){
    while($derogation = $select_date_fin_dans_derogation->fetch()){
        $comtpeur_derogation++;
    }
    $udpatefive = $bdd->prepare("UPDATE derogation SET etat = 'inactif' WHERE date_fin = :date AND annee_academique = :annacad");
    $udpatefive->execute(['date' => $date, 'annacad' => $annacad]);
}

$select_derogation_actif = $bdd->prepare("SELECT matricule, mois FROM derogation WHERE etat = 'actif' AND annee_academique = :annacad");
$select_derogation_actif->execute(['annacad' => $annacad]);
while($resultat = $select_derogation_actif->fetch()){
    $matricule = $resultat['matricule'];
    $moisp = $resultat['mois'];
    $verification_etat_paiement = $bdd->prepare("SELECT * FROM mois WHERE matricule = :matricule AND annee_acad = :annacad");
    $verification_etat_paiement->execute(['matricule' => $matricule, 'annacad' => $annacad]);
    while($statut = $verification_etat_paiement->fetch()){
        if($statut['moisp'] == $moisp){
            $bdd->prepare("UPDATE derogation SET etat = 'inactif' WHERE matricule = :matricule")
                ->execute(['matricule' => $matricule]);
        }
    }
}
?>
