<form name="formparam" action="../config_www/param.php" method="post">


<label name="sserver"> Serveur : </label>
<input type="text" name="sserver" value=<?php print $SERVER;?>>

<label name="spass"> Password : </label>
<input type="password" name="spass" value=<?php print $PASS;?>>

<label name="suser"> Login : </label>
<input type="text" name="suser" value=<?php print $USER;?>>

<label name="sdbase"> Base de donn&eacute;e : </label>
<input type="text" name="sdbase" value=<?php print $DBASE;?>>

  <!-- Type de connexion ?-->
<select name="typeconn">
<option value=5>PHP 5</option>
<option value=7>PHP 7</option>
<option value=8>PDO</option>
</select>

<!-- Mode débogage ?-->
<label name="ModeDebog"> Mode d&eacute;bogage : </label>
<select name="ModeDebog">
<option value=0>Non</option>
<option value=1>Oui</option>
</select>

<input type="submit" value="Parametrer">
<form>
