<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prj_infra";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Échec de la connexion: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$DateDebut = $_POST['arrival_date'];
$DateFin = $_POST['departure_date'];

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO reservations (DateDebut, DateFin) VALUES (?, ?)");
$stmt->bind_param("sss", $DateDebut, $DateFin);

// Exécuter la requête
$stmt->execute();

echo "Réservation enregistrée avec succès";

$stmt->close();
$conn->close();
?>
