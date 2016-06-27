<?php

$Id = $_GET['tokena'];//je récupère l'id dans l'url !
$login = $_GET['tokenb'];//je récupère le login dans l'url !

if (!Id==0) {
$Bienvenue = "<h4>Connexion ".$login."</h4>";
} else {
  $Bienvenue=null;
}

?>

<html>
<head>

<!--METAS ICI-->
<?php include_once "fragments/metas.php";?>

</head>
<body>

<!--ENTETE ICI-->
<?php include_once "fragments/entete.php";?>

<!--CONTENU ICI-->
<?php include_once "fragments/contenu.php";?>

<!--PIED DE PAGE ICI-->
<?php include_once "fragments/footer.php";?>


</body>
</html>
