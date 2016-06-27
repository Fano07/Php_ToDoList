<?php

include_once "config_www/config.php";//Fichier de configuration

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}


//Liste des clients
if ($ModeDebog==1) {print "Consulter une To-Do list <br>\n";}

//$res = mysqli_query($db, $req)
if ($ModeDebog==1) {print "Fin de d&eacute;boggage PHP 7<br>\n";}




if ($ModeDebog==1) {print "Affichage des r&eacute;sultat en PHP 7<br>\n";}

$Id = $_GET['Id'];//je récupère l'id dans l'url !
$traitement="update";

$req="select IdListe, Nom, Observations, DateDebut, DateFin, HeureDebut, HeureFin, TypeProjet, ClassementTache, NiveauClassement from Todo_Liste where IdListe='$Id'";
if ($ModeDebog==1) {print $req;}

if ($res = mysqli_query($db,$req)) {
  //  printf("Super ! Select a retourn&eacute %d lignes.\n", mysqli_num_rows($res));

    if ($ModeDebog==1) {print "Affichage des r&eacute;sultats en PHP 7<br>\n";}

    //recupération du resultat
    while($rows=mysqli_fetch_row($res)){
    //champ1, champ2, champ3 correspondent aux noms de colonnes
    $i++;
  print "hello Id = ".$Id;
  print "<div name='voirtodo' id='aff_todo'>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>".$rows[0]."</a><br>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>To-Do : ".$rows[1]."</a><br>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>Observations : ".$rows[2]."</a><br>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>D&eacute;but : ".$rows[3]."</a> | <a href='$traitement-todo.php?Id=".$rows[0]."'>heure : ".$rows[5]."</a><br>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>Fin : ".$rows[4]."</a> | <a href='$traitement-todo.php?Id=".$rows[0]."'>heure : ".$rows[6]."</a><br>";
  print "<a href='$traitement-todo.php?Id=".$rows[0]."'>Projet : ".$rows[7]."</a> | <a href='$traitement-todo.php?Id=".$rows[0]."'>Classement : ".$rows[8]."</a><br>";
  print " </div>";
    }

    /* Libération du jeu de résultats */
    mysqli_free_result($res);
}



?>
