<?php

// Prepare and execute a query
$result = $conn->query("SELECT planning.id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.naam, gebruikers.voornaam, gebruikers.achternaam, actief FROM planning 
INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id 
INNER JOIN boten ON planning.boot_id = boten.id 
INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id;");
?>

<body>
    <div class="container">
        <h1> CURSUSDAGEN OVERZICHT </h1>
        <?php
        if ($_SESSION['level'] >= 3) {
            echo" <a href='?pagina=cursusToevoegen' class='btn btn-success mb-4 mt-4'> Cursus Dag Toevoegen </a>";
        }
        ?>
        <form method="post">
            <table class="table table_boten table-striped">
                <thead class="header_boten">
                    <tr class="header_row_boten text-center">
                        <th> ID </th>
                        <th> Begin / Eindtijd </th>
                        <th> Boot Naam </th>
                        <th> Instructeur </th>
                        <th> Actief </th>
                        <?php 
                        if ($_SESSION['level'] >= 3) {
                            echo "<th> Opties </th>";
                        }
                        if ($_SESSION['level'] == 2) {
                            echo "<th> Beschikbaarheid </th>";
                        }

                        ?>

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
                            echo "<td>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</td>";
                            echo "<td>" . $row['naam'] . "</td>";
                            echo "<td>" . $row['voornaam'] . " " . $row['achternaam'] . "</td>";
                            echo "<td>" . str_replace(['1', '0'], ['Ja', 'Nee'], $row['actief']) . "</td>";
                            if ($_SESSION['level'] >= 3) {
                                echo "<td>
                                <a class='btn btn-warning p3' href='?pagina=cursusdagAanpassen&id=" . $row['id'] . "'> Edit </a>
                                <a class='btn btn-danger' href='?pagina=cursusdagVerwijderen&id=" . $row['id'] . "'> Delete </a> </td>";
                            }
                            if ($_SESSION['level'] == 2) {
                                echo "<td> 
                                <input type='hidden' name='id' value" . $row['id'] . ">
                                <input type='hidden' name='userId' value" . $_SESSION['userId'] . ">
                                <input type='submit' class='btn btn-primary' name='beschikbaar' value='Beschikbaar'> 
                            </td>";
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
                    }
                    if (isset($_POST['beschikbaar'])) {

                        try {
                            mysqli_query($conn, "INSERT INTO beschikbaarheid (cursus_id,instructeur_id)
                              VALUES ('" . $_POST['id'] . "','" . $_POST['userId'] . "')");
                        } catch (PDOException $e) {
                            $foutMelding = "Er is een fout opgetreden";
                        }
                        echo "<meta https-equiv='refresh' content='0'>";
                        ?>
                        <script>
                            setTimeout(function() {
                                location.reload();
                            }, 500); // 1000 milliseconds = 1 seconds
                        </script>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>