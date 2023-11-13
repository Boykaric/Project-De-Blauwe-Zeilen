<?php

// Prepare and execute a query
$result = $conn->query("SELECT * FROM cursusdagen");
?>

<body>

    <div class="container">
        <h1> CURSUSTIJDEN OVERZICHT </h1>
        <a href="?pagina=cursustijdToevoegen" class="btn btn-success mb-4 mt-4">Cursus Tijd Toevoegen </a>
        <table class="table table_boten table-striped">
            <thead class="header_boten">
                <tr class="header_row_boten text-center">
                    <th> ID </th>
                    <th> Begin Tijd </th>
                    <th> Eind Tijd </th>
                    <th> Opties </th>
                </tr>
            </thead>
            <tbody class="body_boten text-center">
                <?php
                // Check if there are rows in the result set
                if ($result->num_rows > 0) {
                    // Fetch and process the data
                    while ($row = $result->fetch_assoc()) {
                    // Process each row of data here
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['begintijd'] . "</td>";
                    echo "<td>" . $row['eindtijd'] . "</td>";
                    echo "<td>
                    <a class='btn btn-warning p3' href='?pagina=cursustijdAanpassen&id=" . $row['id'] . "'> Edit </a>
                    <a class='btn btn-danger' href='?pagina=cursustijdVerwijderen&id=" . $row['id'] . "'> Delete </a> </td>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>