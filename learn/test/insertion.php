<?php

if(isset($_POST['submit']))
{
    $nom = $_POST["name"];
    $prenom = $_POST["firstname"];
    $sexe = $_POST["sex"];
    $pasword = $_POST["passwd"];

    echo $nom;

}

$objetPdo =  new PDO('mysql:host=localhost; dbname=bd_formulaire', 'root', '');


//après ouverture d'une connexion à la bd on prepare la requete d'insertion sql
$pdoStat = $objetPdo->prepare('INSERT INTO form VALUES (NULL, :nom, :prenom, :sexe, :pasword)');

 //on lie chaque marqueur à une valeur

 $pdoStat->bindValue(':nom', $_POST['name'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prenom', $_POST['firstname'], PDO::PARAM_STR);
 $pdoStat->bindValue(':sexe', $_POST['sex'], PDO::PARAM_STR);
 $pdoStat->bindValue(':pasword', $_POST['passwd'], PDO::PARAM_STR);

 //executons la rqt préparée
$insertIsOk = $pdoStat->execute();
if($insertIsOk){
    $message = ' enrégistrement reussi';
}
else{
    $message= 'echec de l\'enrégistrement';
}
?>
