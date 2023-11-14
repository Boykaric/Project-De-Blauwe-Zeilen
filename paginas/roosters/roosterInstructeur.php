<?php

// Prepare and execute a query
$result = $conn->query("SELECT cursusdagen.begintijd, cursusdagen.eindtijd, boten.naam FROM roostercursist 
INNER JOIN planning ON roostercursist.planning_id = planning.id 
INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id 
INNER JOIN boten ON planning.boot_id = boten.id  WHERE instructeur_id =" . $_SESSION['userId']);
$result->fetch_assoc();

?>
    <div class="container">
        <h1> ROOSTER </h1>
        <table class="table table_boten table-striped">
            <thead class="header_boten">
                <tr class="header_row_boten text-center">
                    <th> Begin / Eindtijd </th>
                    <th> Boot Naam </th>
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
                        echo "<td>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</td>";
                        echo "<td>" . $row['naam'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
