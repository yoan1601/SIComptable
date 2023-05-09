<?php

 require("connect.php");
 $connexion = getConnectionPqsql();
 
 $idDevise = $_POST['idDevise'];

 $sql = "SELECT * from deviseequivalences WHERE reference = ".$idDevise." and devise = (SELECT tenuecompte FROM comptabilites WHERE dateheuremaj = (SELECT MAX(dateheuremaj) FROM comptabilites)) and dateheuremaj = (SELECT MAX(dateheuremaj) FROM deviseequivalences WHERE reference = ".$idDevise.")";

 $resultats=$connexion->query($sql);

 $resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet

 header( "Content-Type: application/json");

 while( $ligne = $resultats->fetch() ) {  //OR while( $ligne = $resultats->fetch(PDO::FETCH_OBJ){ et en enlevant la ligne au dessus

    $retour [] = $ligne;

}

$resultats->closeCursor(); // on ferme le curseur des résultats

//echo $retour;

echo json_encode($retour[0]);

?>
