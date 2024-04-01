<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prj_infra";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed :" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $userEmail = $_POST["userEmail"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO users ( username, password) VALUES ('$userEmail' , '$hashed_password')";

    if ($conn->query($sql)==TRUE){
        echo "Utilisateur créé avec succès.";
    } else {
        echo "Erreur :".$sql."<br>".$conn->error;
    } 
}

$conn->close();
?>