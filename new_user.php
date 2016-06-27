<?php
include_once "config_www/config.php";

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}

//********************* Je peux faire un INSERT INTO pépère ! ******************
//
if ($_POST['sLogin']!=null && !empty( $_POST['sLogin']) && $_POST['sPassword']!=null && !empty( $_POST['sPassword'])  ) {

$login = $_POST['sLogin'];
$password=$_POST['sPassword'];

$req = "select IdAdmin, login, password, email from administrateur where login='$login' and password='$password'";
if ($ModeDebog==1) {print $req."<br>";}
//*******************************************************************************
if ($res = mysqli_query($db, $req)) {

while($rows=mysqli_fetch_row($res)){
if ($ModeDebog==1) {print "Connexion OK : ".$rows[0]." |  ".$rows[1]." | ".$rows[2]." | ".$rows[3];}
$NbTrouver=$rows[0];
}

/* Libération du jeu de résultats */
mysqli_free_result($res);

//print "OK valuer = ".$NbTrouver;
//----------------------------------------------------------------
//Je peux tester le résultat de la requête d cette façon, aisil y en a plusieurs autres !
if ($NbTrouver[0]==0) {
//88888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
$req = "insert into administrateur (login,password) VALUES ('".$_POST['sLogin']."','".$_POST['sPassword']."')";
if ($result = mysqli_query($db, $req)) {
    /* Libération du jeu de résultats */
    mysqli_free_result($result);
	include "js_php/JS_PHP_ENRG_OK.php";//Je confirme l'enreigstrement
}
//88888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888


} else {
  //Luilisateur accède à la page de traitement !
  //$URL_NEW="http://".$_SERVER['SERVER_NAME']."/";
  session_start();//Démarrer une session pour conserver les variables..
  $_SESSION['IdConn']=$rows[0];
  $_SESSION['IdLogin']=$rows[1];
  $URL_NEW=$page_auth."?tokena=".$NbTrouver."&tokenb=".$login;
  include_once "js_php/JS_PHP_URL.php";

  $SHOW_MESSAGE =NO_ADD;//Récupération de la constante dans un string
  print $SHOW_MESSAGE."<br>";//Ecriture du message
  include_once "js_php/JS_PHP_MESSAGE.php";




}
//----------------------------------------------------------------

}

else {
  $SHOW_MESSAGE =ERROR_LOGIN;//Récupération de la constante dans un string
  print $SHOW_MESSAGE."<br>";//Ecriture du message
  include_once "js_php/JS_PHP_MESSAGE.php";
}

}

?>
