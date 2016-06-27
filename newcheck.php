<?php
include_once "config_www/config.php";

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}

//********************* Je peux faire un INSERT INTO pépère ! ******************

if ($_POST['snom']!=null && !empty( $_POST['snom'] )) {

$req = "insert into Todo_Liste (Nom, Observations, DateDebut, DateFin, HeureDebut, HeureFin, TypeProjet, ClassementTache) ";
$req .= "VALUES ('".$_POST['snom']."','".$_POST['smemo']."','".$_POST['sdatedeb']."', '".$_POST['sdatefin']."', '".$_POST['sheuredeb']."', '";
$req .= $_POST['sheurefin']."', '".$_POST['LstTypeProjet']."', '".$_POST['LstClassement']."')";

if ($ModeDebog==1) {print $req."<br>";}
//*******************************************************************************

if ($result = mysqli_query($db, $req)) {
    /* Libération du jeu de résultats */
    mysqli_free_result($result);
	include "js_php/JS_PHP_ENRG_OK.php";//Je confirme l'enreigstrement

}



}
?>
