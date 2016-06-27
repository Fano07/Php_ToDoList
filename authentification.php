<?php
include_once "config_www/config.php";
//if ($ModeDebog==1) {include_once "config_www/active_error.php";}//Active les erreurs PHP en mode DEBOGAGE

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}

//********************* Je peux faire un INSERT INTO pépère ! ******************
//
print "hello<br>";
if ($_POST['sLogin']!=null && !empty( $_POST['sLogin']) && $_POST['sPassword']!=null && !empty( $_POST['sPassword'])  ) {
  print "hello 2<br>";

$login = $_POST['sLogin'];
$password=$_POST['sPassword'];
print "hello 3<br>";

$req = "select IdAdmin, login, password, email from administrateur where login='$login' and password='$password'";
//$req="SELECT * FROM administrateur a, niveau n WHERE a.IdAdmin = n.IdAdmin";//Jointure
if ($ModeDebog==1) {print $req."<br>";}
//*******************************************************************************
if ($res = mysqli_query($db, $req)) {
  print "hello 4<br>";

while($rows=mysqli_fetch_row($res)){
if ($ModeDebog==1) {print "Connexion OK : ".$rows[0]." |  ".$rows[1]." | ".$rows[2]." | ".$rows[3];}
header('location:bo_www/index.php?mmhphog='.$rows[0].'&pseudo='.$rows[1]);
$NbTrouver=$rows[0];
}

//$req="INSERT INTO niveau (niveau, lienimage) VALUES ('1', $_GET['mmhphog']) "//Ajout dans la clé etrangère
/* Libération du jeu de résultats */
mysqli_free_result($res);

//print "OK valuer = ".$NbTrouver;
//----------------------------------------------------------------
//Je peux tester le résultat de la requête d cette façon, aisil y en a plusieurs autres !
if ($NbTrouver[0]==0) {
  $SHOW_MESSAGE =NO_LOGIN;//Récupération de la constante dans un string
  print $SHOW_MESSAGE."<br>";//Ecriture du message
  include_once "js_php/JS_PHP_MESSAGE.php";
} else {
  //Luilisateur accède à la page de traitement !
  //$URL_NEW="http://".$_SERVER['SERVER_NAME']."/";
  session_start();//Démarrer une session pour conserver les variables..
  $_SESSION['IdConn']=$rows[0];
  $_SESSION['IdLogin']=$rows[1];
  $URL_NEW=$page_auth."?tokena=".$NbTrouver."&tokenb=".$login;
  include_once "js_php/JS_PHP_URL.php";
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
