<?php

 require("connect.php");
 include("utile.php");
 $connexion = getConnectionPqsql();

 $id = $_POST['numero'];

 $sql = "SELECT * from chargesProduitsCentres WHERE idChargesProduits = ".$id;

 $resultats=$connexion->query($sql);

 $resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet

 header( "Content-Type: application/json");

 while( $ligne = $resultats->fetch() ) {  //OR while( $ligne = $resultats->fetch(PDO::FETCH_OBJ){ et en enlevant la ligne au dessus

    $retour [] = $ligne;

}

$resultats->closeCursor(); // on ferme le curseur des résultats

//echo $retour;

echo json_encode($retour);

?>
