<?php

if(isset($_POST['submit']))
{
    $nom = $_POST["name"];
    $prenom = $_POST["firstname"];
    $sexe = $_POST["sex"];
    $email = $_POST["mail"];
    $pasword = $_POST["passwd"];

    echo $nom;

}

$objetPdo =  new PDO('mysql:host=localhost; dbname=bd_formulaire', 'root', '');

//après ouverture d'une connexion à la bd on prepare la requete d'insertion sql
$pdoStat = $objetPdo->prepare('INSERT INTO form VALUES (NULL, :nom, :prenom, :sexe, :pasword)');

 //on lie chaque marqueur à une valeur

 $pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
 $pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
 $pdoStat->bindValue(':sexe', $_POST['sex'], PDO::PARAM_STR);
 $pdoStat->bindValue(':pasword', $_POST['pasword'], PDO::PARAM_STR);

 //executons la rqt préparée
$insertIsOk = $pdoStat->execute();
if($insertIsOk){
    $message = ' enrégistrement reussi';
}
else{
    $message= 'echec de l\'enrégistrement';
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/..bootstrap/js/bootstrap.min.js"></script>
    
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <form action="insertion.php" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="name">
                    </div>
                    <div class="form-group">
                            <label for="prenom">PreNom:</label>
                            <input type="text" class="form-control" id="prenom" name="firstname">
                        </div>
                        <div class="form-group">
                                <label for="sexe" name="sex">Sexe:</label>
                                <select class="form-control">
                                    <option value="Féminin">Féminin</option>
                                    <option value="Masculin">Masculin</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="mail">
                        </div>
                        <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="pasword" name="passwd">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            j'accepte les conditions
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

