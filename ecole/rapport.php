<?php 
	include('header.php'); 
	 if(isset($_SESSION['user'])){
	 	 require_once('../bdd_app_gst_connect/allscirpt.inc.php');
	 }
	 else{
	 header("Location:index.php");}
?>
<script type="text/javascript">
  function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontant= document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontant;
    window.print();
    document.body.innerHTML= restorepage;
}
 </script>
<input id="button" type="button" value="Imprimer"  class="btn btn-success " onclick="printContent('div1')"/>
<div id="div1"> 
<?php
$n=1;
if($date){  
$selection_entree=$bdd->query("SELECT * FROM  finance  WHERE anne_acad='$annacad' and  date_enreg BETWEEN '".$date."' AND '".$date."'  ORDER BY ID DESC  ");


   
    echo '<div class="table-responsive">
                  <table class=" table table-striped table-bordere " >
          <thead>
          <tr>
            <td>N</td>
             <td>Maticule</td>
                      <td>NOM</td>
                        <td>MOTIF</td>
                        <td>CLASSE</td>
                        <td>MONTANT USD</td>
                        <td>MONTANT CDF</td>
                        <td>Quantite</td>
                        <td>TYPE</td>
                        <td>CODE FACTURE</td>
                        <td>COMPTE</td>
                        <td>DATE</td>
                        
                    </tr>
          <thead>';
		
	while ($resultat = $selection_entree->fetch()){
		echo '<tr><td>'.$n++.'</td>
	         <td><a href="situation.php?matr='.$resultat['matricule'].'&&annacad='.$annacad.'">S. GENERALE </a>'.$resultat['matricule'].'</td>
                         <td style="font-size: 11px;">'.$resultat['nom_eleve'].'</td>
                         <td style="font-size: 11px;">'.$resultat['motif'].'</td>
                         <td style="font-size: 11px;">'.$resultat['classe_eleve'].'</td>
                         <td style="font-size: 11px;">'.numeberormat($resultat['montantusd']).'</td>
                         <td style="font-size: 11px;">'.numeberormat($resultat['montantcdf']).' Fc</td>
                         <td style="font-size: 11px;">'.$resultat['qte_acheter'].'</td>
                         <td style="font-size: 11px;">'.$resultat['type'].' </td>
                         <td style="font-size: 11px;">'.$resultat['cdfact'].'</td>
                          <td style="font-size: 11px;">'.$resultat['compte'].'</td>
                         <td style="font-size: 11px;">'.$resultat['date_enreg'].'</td>
                         </tr> 	';
	}
	
	echo '</table><br />';

	}
		
	?>
</div>

	
</form>
</table>






<?php include('footer.php');  ?>

