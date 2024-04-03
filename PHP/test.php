<?php
$servername = "10.60.137.65";
$username = "lmna";
$password = "racine";
$database = "prj_infra";

// Créer une connexion
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
} else {
    echo "Connexion réussie à la base de données.";
    // Vous pouvez exécuter vos requêtes SQL ici
}

// Fermer la connexion
mysqli_close($conn);
?>