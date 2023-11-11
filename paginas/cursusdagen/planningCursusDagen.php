<?php

// Prepare and execute a query
$result = $conn->query("SELECT planning.id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.naam, gebruikers.voornaam, gebruikers.achternaam, actief FROM planning INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id INNER JOIN boten ON planning.boot_id = boten.id INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id;");
$result->fetch_assoc();
?>

<body>

    <div class="container">
        <h1> CURSUSDAGEN OVERZICHT </h1>
        <a href="?pagina=cursusToevoegen" class="btn btn-success mb-4 mt-4"> Cursus Dag Toevoegen </a>
        <table class="table table_boten table-striped">
            <thead class="header_boten">
                <tr class="header_row_boten text-center">
                    <th> ID </th>
                    <th> Begin / Eindtijd </th>
                    <th> Boot Naam </th>
                    <th> Instructeur </th>
                    <th> Actief </th>
                    <th> Opties </th>
                </tr>
            </thead>
            <tbody class="body_boten text-center">
                <?php
                // Fetch and process the data
                foreach ($result as $row) {
                    // Process each row of data here
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</td>";
                    echo "<td>" . $row['naam'] . "</td>";
                    echo "<td>" . $row['voornaam'] . " " . $row['achternaam'] . "</td>";
                    echo "<td>" . str_replace(['1','0'], ['Ja','Nee'], $row['actief']) . "</td>";
                    echo "<td>
                    <a class='btn btn-warning p3' href='?pagina=cursusdagAanpassen&id=" . $row['id'] . "'> Edit </a>
                    <a class='btn btn-danger' href='?pagina=cursusdagVerwijderen&id=" . $row['id'] . "'> Delete </a> </td>";
                    echo "</tr>";
                };
                ?>
            </tbody>
        </table>
    </div>
</body>