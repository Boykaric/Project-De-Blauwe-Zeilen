<?php

    $hostname = "localhost";
    $gebruikersnaam = "root";
    $wachtwoord = "";
    $databasenaam = "db_dbz";

    $conn = new mysqli($hostname, $gebruikersnaam, $wachtwoord, $databasenaam);
    if ($conn->connect_error) {
        die("Kon geen verbinding maken met de database: " . $conn->connect_error);
    }
?>