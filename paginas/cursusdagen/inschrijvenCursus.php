<?php

// Prepare and execute a query
$result = $conn->query("SELECT planning.id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.naam, boten.niveau, gebruikers.voornaam, gebruikers.achternaam,gebruikers.level, actief FROM planning INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id INNER JOIN boten ON planning.boot_id = boten.id INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id WHERE actief = 1;");
$result->fetch_assoc();
?>

<body>

    <div class="container">
        <h1> CURSUSSEN </h1>
        <table class="table table_boten table-striped">
            <thead class="header_boten">
                <tr class="header_row_boten text-center">
                    <th> Begin / Eindtijd </th>
                    <th> Boot Naam </th>
                    <th> Niveau </th>
                    <th> Instructeur </th>
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
                    if(loginCheck($conn) == false) {
                        echo "<td>
                        <a class='btn btn-primary p3' href='?pagina=inloggen'> Inschrijven </a>";
                        echo "</tr>";
                    }else {
                        echo "<td>
                        <a class='btn btn-primary p3' href='?pagina=cursusdagAanpassen&id=" . $row['id'] . "'> Inschrijven </a>";
                        echo "</tr>";
                    }
                };
                ?>
            </tbody>
        </table>
    </div>
</body>