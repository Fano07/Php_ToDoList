<?php
include_once "../config_www/config.php";

//connexion à la bdd en php 5 ou PHP 7
print "Debut test conn ok<br>\n";
if ($ModePHP==5) {
  include "connexion_5.php";
} else {
//print "en conn 7<br>\n";
  include "connexion_7.php";
}

//********************* Je peux faire un INSERT INTO pépère ! ******************

if ($_POST['snom']!=null && !empty( $_POST['sprenom'] )) {

$req = "insert into client (nom, prenom, adresse, cp, ville, telfixe, telport) VALUES ('".$_POST['snom']."','".$_POST['sprenom']."','".$_POST['sadresse']."','".$_POST['scodepostal']."','".$_POST['sville']."', '".$_POST['stelfixe']."', '".$_POST['smobile']."')";
//$req ="select * from client";
print $req;




//----------------------------------
/* Requête "Select" retourne un jeu de résultats  mysqli_query ===> PHP7,  mysql_query ===>PHP5 */

//*******************************************************************************

if ($result = mysqli_query($db, $req)) {
    /* Libération du jeu de résultats */
    mysqli_free_result($result);
	include "JS_PHP_ENRG_OK.php";//Je confirme l'enreigstrement

}



}
?>
