<?php

// Prepare and execute a query
$result = $conn->query("SELECT * FROM boten");
$result->fetch_assoc();
?>

<body>

    <div class="container">
        <h1> BOTEN OVERZICHT </h1>

        <a href="?pagina=bootToevoegen" class="btn btn-success mb-4 mt-4"> Toevoegen </a>
        <table class="table table_boten table-striped">
            <thead class="header_boten">
                <tr class="header_row_boten text-center">
                    <th> ID </th>
                    <th> Naam </th>
                    <th> Min Passagiers </th>
                    <th> Max Passagiers </th>
                    <th> Grootte </th>
                    <th> Type </th>
                    <th> Beschikbaarheid </th>
                    <th> Opmerking </th>
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
                    echo "<td>" . $row['naam'] . "</td>";
                    echo "<td>" . $row['minpassagiers'] . "</td>";
                    echo "<td>" . $row['maxpassagiers'] . "</td>";
                    echo "<td>" . $row['grootte'] . "</td>";
                    echo "<td>" . $row['niveau'] . "</td>";
                    echo "<td>";
                    if ($row['beschikbaarheid'] == 1) {
                        echo " Beschikbaar ";
                    } else {
                        echo " Niet Beschikbaar ";
                    };
                    echo "</td>";
                    echo "<td>" . $row['opmerking'] . "</td>";
                    echo "<td>
                    <a class='btn btn-warning p3' href='?pagina=bootAanpassen&id=" . $row['id'] . "'> Edit </a>
                    <a class='btn btn-danger' href='?pagina=bootVerwijderen&id=" . $row['id'] . "'> Delete </a> </td>";
                    echo "</tr>";
                };
                ?>
            </tbody>
        </table>
    </div>
</body>