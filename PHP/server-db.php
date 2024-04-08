<?php

 // Connexion à la base de données
 $servername = "192.168.1.174";
 $username = "lmna";
 $dbpassword = "racine";
 $dbname = "prj_infra";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// verification de la connexion
if ($conn->connect_error) {
    die ("La connexion a echoué : " . $conn->connect_error);
    
}

?>