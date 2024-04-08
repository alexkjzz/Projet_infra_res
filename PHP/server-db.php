<?php

 // Connexion à la base de données
 $servername = "localhost";
 $username = "root";
 $dbpassword = "";
 $dbname = "prj_infra";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// verification de la connexion
if ($conn->connect_error) {
    die ("La connexion a echoué : " . $conn->connect_error);
    
}

?>