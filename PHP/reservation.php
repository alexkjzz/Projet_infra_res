<?php
session_start(); // Démarrer la session
require('server-db.php'); // Inclure fichier de connexion à la base de données

// Récupérer les données du formulaire
$DateDebut = $_POST['arrival_date'];
$DateFin = $_POST['departure_date'];
$typeChambre = $_POST['type_chambre'];

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];

    // Préparer requête SQL
    $stmt = $conn->prepare("INSERT INTO Reservations (DateDebut, DateFin, TypeChambre, UtilisateurID) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }
    $stmt->bind_param("sssi", $DateDebut, $DateFin, $typeChambre, $userID);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Réservation enregistrée avec succès";
        header("refresh:5;url=../HTML/reservation.php");
        exit;
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Utilisateur non connecté. Veuillez vous connecter avant de faire une réservation.";
}

$conn->close();
?>
