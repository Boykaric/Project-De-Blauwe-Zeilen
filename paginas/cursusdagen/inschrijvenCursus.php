<?php

// Prepare and execute a query
$result = $conn->query("SELECT planning.id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.naam, boten.niveau, gebruikers.voornaam, gebruikers.achternaam,gebruikers.level, actief FROM planning INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id INNER JOIN boten ON planning.boot_id = boten.id INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id WHERE actief = 1;");
$result->fetch_assoc();
?>

<body>
    <div class="container">
        <h1> CURSUSSEN </h1>
        <form method='post'> <!-- Move the form tag outside the loop -->
            <table class="table table_boten table-striped">
                <thead class="header_boten">
                    <tr class="header_row_boten text-center">
                        <th> Begin / Eindtijd </th>
                        <th> Boot Naam </th>
                        <th> Niveau </th>
                        <th> Instructeur </th>
                        <th> Inschrijven </th> <!-- Add a new header for the button -->
                    </tr>
                </thead>
                <tbody class="body_boten text-center">
                    <?php
                    // Fetch and process the data
                    foreach ($result as $row) {
                        // Process each row of data here
                        echo "<tr>";
                        echo "<td>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</td>";
                        echo "<td>" . $row['naam'] . "</td>";
                        echo "<td>" . $row['niveau'] . "</td>";
                        echo "<td>" . $row['voornaam'] . " " . $row['achternaam'] . "</td>";
                        echo "<td>
                            <input type='hidden' name='planning_id' value='" . $row['id'] . "'>
                            <input type='submit' class='btn btn-primary' name='inschrijven' value='Inschrijven'> <br>
                            </td>";
                        echo "</tr>";
                    };
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

<?php
if (isset($_POST['inschrijven'])) {
    $planningId = $_POST['planning_id']; // Get the planning_id from the submitted form
    $userId = $_SESSION['userId'];

    // Voeg de gegevens toe aan de 'planning' tabel
    $sql = "INSERT INTO roostercursist (planning_id, cursist_id) VALUES ('$planningId', '$userId')";
    header("location: ?pagina=roosterCursist");
    if (mysqli_query($conn, $sql)) {
        echo "U bent Succesvol aangemeld voor de Cursus.";
    } else {
        echo "Fout bij het opslaan van gegevens: " . mysqli_error($conn);
    }
}
?>