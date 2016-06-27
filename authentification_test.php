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
if (mysqli_real_escape_string(!empty( $_POST['sLogin'])) && mysqli_real_escape_string(!empty( $_POST['sPassword'])) ) {


$login = $_POST['sLogin'];
$password=$_POST['sPassword'];

$req = "select IdAdmin, login, password, email from administrateur where login='$login' and password='$password'";
//$req="SELECT * FROM administrateur a, niveau n WHERE a.IdAdmin = n.IdAdmin";//Jointure
if ($ModeDebog==1) {print $req."<br>";}


if ($res = mysqli_query($db, $req)) {

while($rows=mysqli_fetch_row($res)){
if ($ModeDebog==1) {print "Connexion OK : ".$rows[0]." |  ".$rows[1]." | ".$rows[2]." | ".$rows[3];}
header('location:bo_www/index.php?mmhphog='.$rows[0].'&pseudo='.$rows[1]);
$NbTrouver=$rows[0];
}

//$req="INSERT INTO niveau (niveau, lienimage) VALUES ('1', $_GET['mmhphog']) "//Ajout dans la clé etrangère
/* Libération du jeu de résultats */
mysqli_free_result($res);
}
//----------------------------------------------------------------




}
?>
