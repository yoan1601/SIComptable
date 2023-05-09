<?php

 require("connect.php");
 include("utile.php");
 $connexion = getConnectionPqsql();

 $idChargeProduit = $_POST['idChargeProduit'];
 $pourcentage = $_POST['pourcentage'];
 $pourc_var = $_POST['pourc_var'];
 $pourc_fix = $_POST['pourc_fix'];

 $sql = "UPDATE chargesProduits SET pourcentage = %g, pourc_var = %g, pourc_fix = %g WHERE id = %g";
 $sql=sprintf($sql, $pourcentage, $pourc_var, $pourc_fix, $idChargeProduit);

 $insert = $connexion->exec($sql);

$resultats->closeCursor(); // on ferme le curseur des résultats

//echo $retour;

echo json_encode($retour);

?>
