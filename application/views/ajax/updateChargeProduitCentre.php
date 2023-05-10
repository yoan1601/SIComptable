<?php

 require("connect.php");
 include("utile.php");
 $connexion = getConnectionPqsql();

 $idChargeProduitCentre = $_POST['idChargeProduitCentre'];
 $pourc_centre = $_POST['pourc_centre'];

 $sql = "UPDATE chargesProduitsCentres SET pourc_centre = %g WHERE id = %g";
 $sql=sprintf($sql, $pourc_centre, $idChargeProduitCentre);

 $update = $connexion->exec($sql);

$resultats->closeCursor(); // on ferme le curseur des résultats

//echo $retour;

echo json_encode($retour);

?>
