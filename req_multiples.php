
<?php
$Id = $_GET['tokena'];//je récupère l'id dans l'url !
$login = $_GET['tokenb'];//je récupère le login dans l'url !


include_once "config_www/config.php";
print "1 <br>";

//Sélectionne le mode de CONNEXION PHP vers MySQL
switch ($ModePHP) {
case 5 :
include "include_conn/".$Conn5;
break;
case 7 : include "include_conn/".$Conn7;
break;
case 8 : include "include_conn/".$ConnPDO;
break;
case 71 : include "include_conn/".$Conn7_obj;
break;
default:
case 7 : include "include_conn/".$Conn7;
}

//******************* pas bon
//Sélectionne
switch($ModePHP)
{
    case '5':
        mysql_query($req);
        break;

    case 7 :
      $res = mysqli_query($db, $req);
        break;
    case 8 : include "include_conn/".$ConnPDO;
        break;
    case 71 :
      $res = $db->query($req,MYSQLI_USE_RESULT);
        break;


    case '9':
         sqlite_query($req);
         break;
    case '91':
         mssql_query($req);
         break;
    case '92':
         $stid = oci_parse($conn, $req);
         oci_execute($stid);

         default:
     case 7 : include "include_conn/".$Conn7;

}


//******************************

if ($db->connect_errno) {
    echo "Echec lors de la connexion à MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

if (!$db->query("DROP TABLE IF EXISTS test") || !$db->query("CREATE TABLE test(id INT)")) {
    echo "Echec lors de la création de la table : (" . $db->errno . ") " . $db->error;
}

$sql = "SELECT COUNT(*) AS _num FROM test; ";
$sql.= "INSERT INTO test(id) VALUES (1); ";
$sql.= "SELECT COUNT(*) AS _num FROM test; ";

if (!$db->multi_query($sql)) {
    echo "Echec lors de l'exécution de la multi-requête : (" . $db->errno . ") " . v->error;
}

do {
    if ($res = $db->store_result()) {
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        $res->free();
    }
} while ($db->more_results() && $db->next_result());
?>
