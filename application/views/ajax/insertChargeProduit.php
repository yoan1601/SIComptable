<?php

 require("connect.php");
 include("utile.php");
 $connexion = getConnectionPqsql();

 $idproduit = $_POST['idproduit'];
 $numero = $_POST['numero'];
 $pourcentage = $_POST['pourcentage'];
 $pourc_var = $_POST['pourc_var'];
 $pourc_fix = $_POST['pourc_fix'];

 $sql = "INSERT INTO chargesProduits (numero , idproduit , pourcentage , pourc_var , pourc_fix) VALUES ('%s' ,%g, %g, %g,  %g)";
 $sql=sprintf($sql, $numero, $idproduit ,$pourcentage, $pourc_var, $pourc_fix);

 $insert = $connexion->exec($sql);

$resultats->closeCursor(); // on ferme le curseur des résultats

$retour = $sql;

//echo $retour;

echo json_encode($retour);

?>
