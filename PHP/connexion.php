<?php
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $userEmail = $_POST["username_email"];
    $password = $_POST["password"];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "prj_infra";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour récupérer le mot de passe chiffré de l'utilisateur
    $sql = "SELECT MotDePasse FROM utilisateurs WHERE Email = '$userEmail'";
    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($result->num_rows == 1) {
        // Récupérer le mot de passe chiffré de la base de données
        $row = $result->fetch_assoc();
        $hashed_password = $row["MotDePasse"];

        // Vérifier si le mot de passe correspond
        if (password_verify($password, $hashed_password)) {
            // Mot de passe correct, connexion réussie
            header("Location: ../HTML/reservation.html"); // Rediriger l'utilisateur vers la page de réservation 
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
