<?php

require('server-db.php');
// Vérifier si le formulaire de création de compte a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $usernameEmail = $_POST["username_email"];
    $password = $_POST["password"];
    $userPrenom = $_POST["username_prenom"];
    $userNom = $_POST["username_nom"];

    // Chiffrer le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // // Connexion à la base de données
    // $servername = "192.168.1.152";
    // $username = "lmna";
    // $dbpassword = "racine";
    // $dbname = "prj_infra";

    // // Créer une connexion
    // $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // // Vérifier la connexion
    // if ($conn->connect_error) {
    //     die("La connexion à la base de données a échoué : " . $conn->connect_error);
    // }

    // Vérifier s'il existe déjà un utilisateur avec le même nom d'utilisateur ou email
    $sql_check_duplicate = "SELECT * FROM Utilisateurs WHERE Email = '$usernameEmail'";
    $result_check_duplicate = $conn->query($sql_check_duplicate);

    if ($result_check_duplicate->num_rows > 0) {
        // Doublon trouvé, afficher un message d'erreur
        echo "Un compte avec ce nom d'utilisateur ou email existe déjà.";
    } else {
        // Aucun doublon trouvé, insérer les données dans la base de données avec le mot de passe chiffré
        $sql_insert = "INSERT INTO Utilisateurs (Email, MotDePasse, Prenom, Nom) VALUES ('$usernameEmail', '$hashed_password', '$userPrenom', '$userNom')";

        if ($conn->query($sql_insert) === TRUE) {
            // Compte créé avec succès
            echo "Compte créé avec succès !";
        } else {
            // Erreur lors de l'insertion dans la base de données
            echo "Erreur lors de la création du compte : " . $conn->error;
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
