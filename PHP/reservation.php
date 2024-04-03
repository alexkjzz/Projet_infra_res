<?php
session_start();
// $servername = "192.168.1.152";
// $username = "lmna";
// $password = "racine";
// $dbname = "prj_infra";
// $IDuser = $_SESSION["userID"];

// // Créer une connexion
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Vérifier la connexion
// if ($conn->connect_error) {
//   die("Échec de la connexion: " . $conn->connect_error);
// }
require('server-db.php');
// Récupérer les données du formulaire
$DateDebut = $_POST['arrival_date'];
$DateFin = $_POST['departure_date'];
$typeChambre = $_POST['type_chambre'];

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO Reservations (DateDebut, DateFin, TypeChambre, UtilisateurID) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $DateDebut, $DateFin, $typeChambre, $IDuser);

// Exécuter la requête
if ($stmt->execute()) {
  echo "Réservation enregistrée avec succès";
  header("refresh:5;url=../HTML/reservation.php");
  exit;
} else {
  echo "Erreur lors de l'insertion : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
