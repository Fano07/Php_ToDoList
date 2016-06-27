<?php
//Je cherche un utilisateur quiessaie de se logguer ....
include_once "config.php";

//connexion à la bdd en php 5 ou PHP 7
//print "Debut test conn ok<br>\n";
if ($ModePHP==5) {
  include "connexion_5.php";
} else {
//print "en conn 7<br>\n";
  include "connexion_7.php";
}

//********************* Je peux faire un INSERT INTO pépère ! ******************

if ($_POST['slogin']!=null && !empty( $_POST['slogin'] ) && $_POST['spassword']!=null && !empty( $_POST['spassword'] )) {

//$req = "insert into client (nom, prenom, adresse, cp, ville, telfixe, telport) VALUES ('".$_POST['snom']."','".$_POST['sprenom']."','".$_POST['sadresse']."','".$_POST['scodepostal']."','".$_POST['sville']."', '".$_POST['stelfixe']."', '".$_POST['smobile']."')";
$req ="select distinct IdClient, nom, prenm, login, password from client where login='".$_POST['slogin']."' and password='".$_POST['spassword']."'";
print $req;

if ($result = mysqli_query($db, $req)) {
//	include "JJS_PHP_SELF.php";//Je confirme l'enreigstrement
$numrows=mysqli_num_rows($result);//Compte les résultats trouvés
 if ($numrows<=0) {//Le selet fonctionne mais personne n'aété trouvée, donclogin oumotde passe inexsitant !

 } else {
   while($rows=mysqli_fetch_assoc($res)) {
     $codeuser=$rows['IdClient'];//Je récupère l'id du client
     $codenom=$rows['nom'];//Je récupère son nom
     $codeprenom=$rows['prenom'];//Je récupère son prénom
   }

   /* Libération du jeu de résultats */
   mysqli_free_result($result);

 }



}



}
?>
