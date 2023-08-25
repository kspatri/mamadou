<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "form";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}
// Traitement du formulaire
if(isset($_POST["valider"])) {
    $nom = $_POST['user_nom'];
    $prenom = $_POST['user_prenom'];
    $email = $_POST['user_email'];
    $motDePasse = $_POST['user_password'] // Hash du mot de passe

    $requete = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$motDePasse')";

    if ($connexion->query($requete) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur : " . $requete . "<br>" . $connexion->error;
    }
}

// Fermeture de la connexion
$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body> 
  <form action="" method="POST">
    <h4>inscription</h4>
    <hr>
    <div class="name_field">
        <div>
            <label for="">nom</label>
            <input type="text" name="user_nom">
        </div>
        <div>
            <label for="">prenom</label>
            <input type="text" name="user_prenom">
        </div>
        </div> 
        <label for="">adresse mail</label> 
        <input type="mail" name="user_email"> 
        <label for="">mot de passe</label>
        <input type="password" name="user_password">
        <input type="submit" value="s'inscrire" name="valider">
        <p>avez-vous deja un compte <a href="#">se connecter</a></p>
  </form> 
</body>
</html>