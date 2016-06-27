<?php
include_once "config_www/config.php";

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}
?>

<form name="formnewcheck" action="newcheck.php" method="post">
<label name="snom">Todo :</label>
<input type="text" name="snom">

<label name="smemo">Obserations :</label>
<input type="aera" name="smemo">

<label name="sdatedeb">Date :</label>
<input type="date" name="sdatedeb">

<label name="sheuredeb">Heure &eacute;but :</label>
<input type="time" name="sheuredeb">

<label name="sdatefin">Date fin :</label>
<input type="date" name="sdatefin">


<label name="sheurefin">Heure fin :</label>
<input type="time" name="sheurefin">

<label name="LstTypeProjet">Type de projet :</label>
<?php include_once "include/LstTypeProjet.php";?>

<label name="LstClassement">Classement :</label>
<?php include_once "include/LstClassement.php";?>

<input type="submit" value="Enregistrer la ToDo">


</form>
