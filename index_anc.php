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
  <meta charset="utf-8">
<meta content="To-Do List">
<title>Application To-Do Liste</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div id="Entete">
  <div id="IdInvitation"><?php print $Bienvenue;?></div>
</div>
<div id="IdLogin"><?php include_once "seconnecter.php";?></div>


<div class="wrapper">
 <article>article</article>
  <nav>navigation</nav>
  <aside>aside</aside>
</div>

<footer>footer</footer>


</body>
</html>
