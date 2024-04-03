<?php
session_start(); // Démarrer la session
require('server-db.php');
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $userEmail = $_POST["username_email"];
    $password = $_POST["password"];

    // // Connexion à la base de données
    // $servername = "172.20.10.7";
    // $username = "lmna";
    // $dbpassword = "racine";
    // $dbname = "prj_infra";

    // // Créer une connexion
    // $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // // Vérifier la connexion
    // if ($conn->connect_error) {
    //     die("La connexion à la base de données a échoué : " . $conn->connect_error);
    // }

    // Préparer la requête SQL pour récupérer toutes les informations de l'utilisateur
    $sql = "SELECT * FROM Utilisateurs WHERE Email = '$userEmail'";
    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($result->num_rows == 1) {
        // Récupérer toutes les informations de l'utilisateur
        $user = $result->fetch_assoc();

        // Vérifier si le mot de passe correspond
        if (password_verify($password, $user["MotDePasse"])) {
            // Mot de passe correct, connexion réussie
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION["userID"] = $user['ID'];
            $_SESSION["userNom"] = $user['Nom'];
            $_SESSION["userPrenom"] = $user['Prenom'];
            $_SESSION["userEmail"] = $user['Email'];
            // Rediriger l'utilisateur vers la page de réservation 
            header("Location: ../HTML/reservation.php");
            exit();
        } else {
            // Mot de passe incorrect, afficher un message d'erreur
            echo "Nom d'utilisateur / email ou mot de passe incorrect.";
        }
    } else {
        // L'utilisateur n'a pas été trouvé, afficher un message d'erreur
        echo "Nom d'utilisateur / email ou mot de passe incorrect.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
