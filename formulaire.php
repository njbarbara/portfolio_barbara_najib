<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $sexe = isset($_POST['sexe']) ? htmlspecialchars($_POST['sexe']) : '';
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars(trim($_POST['telephone']));

    if (empty($nom) || empty($prenom) || empty($sexe) || !$email || empty($telephone)) {
        echo "Tous les champs sont requis et doivent être valides.";
        exit;
    }

    if (!preg_match("/^[0-9]{10}$/", $telephone)) {
        echo "Le numéro de téléphone doit contenir 10 chiffres.";
        exit;
    }

    echo "<h2>Données reçues :</h2>";
    echo "Nom : " . $nom . "<br>";
    echo "Prénom : " . $prenom . "<br>";
    echo "Sexe : " . $sexe . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Téléphone : " . $telephone . "<br>";
}
?>