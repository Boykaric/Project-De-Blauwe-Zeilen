
<?php

// Prepare and execute a query
$result = $conn->query("SELECT * FROM roostercursist INNER JOIN planning ON roostercursist.planning_id = planning.id;");
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
                    echo "<td>" . $row['planning_id'] . "</td>";
                    echo "<td>" . $row['cursist_id'] . "</td>";
                    echo "</tr>";
                };
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php

