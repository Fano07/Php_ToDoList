<table name="listedesToDo" width="360" border="0">
<?php

include_once "config_www/config.php";//Fichier de configuration

if ($ModePHP==5) {//Fichiers de connexion
  include "include_conn/".$Conn5;
} else {
//print "en conn 7<br>\n";
  include "include_conn/".$Conn7;
}


//Liste des clients
if ($ModeDebog==1) {print "Listing des todolist <br>\n";}

//$res = mysqli_query($db, $req)
if ($ModeDebog==1) {print "Fin de déboggage PHP 7<br>\n";}




if ($ModeDebog==1) {print "Affichage des r&eacute;sultat en PHP 7<br>\n";}

$req="select IdListe, Nom, Observations, DateDebut, DateFin, HeureDebut, HeureFin, TypeProjet, ClassementTache, NiveauClassement from Todo_Liste";
if ($ModeDebog==1) {print $req;}

if ($res = mysqli_query($db,$req)) {
  //  printf("Super ! Select a retourn&eacute %d lignes.\n", mysqli_num_rows($res));

    if ($ModeDebog==1) {print "Affichage des r&eacute;sultats en PHP 7<br>\n";}

    //recupération du resultat
    while($rows=mysqli_fetch_row($res)){
    //champ1, champ2, champ3 correspondent aux noms de colonnes
    $i++;
    echo "<tr><td width='10'><a href='voir-todo.php?Id=".$rows[0]."'>".$rows[0]."</a></td><td width='180'><a href='voir-todo.php?Id=".$rows[0]."'>".$rows[1]."</a></td><td width='40'><a href='voir-todo.php?Id=".$rows[0]."'>".$rows[3]."</a></td><td width='40'>".$rows[5]."</td></tr>";
  //  print "hello !";
    }

    /* Libération du jeu de résultats */
    mysqli_free_result($res);
}



?>
</table>
