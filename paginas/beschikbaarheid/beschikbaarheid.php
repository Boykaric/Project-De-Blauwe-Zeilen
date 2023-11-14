<div style="margin-left:212px; margin-top:40px;">
    <form action="instructeurbeschikbaarheidToevoegen.php">
        <button type="submit" class="btn btn-info">toevoegen</button>
    </form>
</div>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Begintijd</th>
                        <th scope="col">Eindtijd</th>
                        <th scope="col">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM beschikbaarheid WHERE instructeur_id = 1");
                    $result->fetch_assoc();
                    foreach ($result as $data) {
                        echo "<tr>
                                    <th scope='row'>  </th>
                                    <td>" . date_format(date_create($data['begintijd']), "d-m-Y H:i") . "</td>
                                    <td>" . date_format(date_create($data['eindtijd']), "d-m-Y H:i") . "</td>
                                    <td>
                                        <form action='' method='POST' id='" . $data['id'] . "'>
                                            <input type='hidden' id='ID' name='id' value='" . $data['id'] . "'>
                                            <input type='hidden' id='begintijd' name='begintijd' value='" . $data['begintijd'] . "'>
                                            <input type='hidden' id='eindtijd' name='eindtijd' value='" . $data['eindtijd'] . "'>
                                        </form>
                                            <button type='submit' class='btn btn-outline-danger' form='" . $data['id'] . "' value='Submit' name='submitVer'><i class='fa-solid fa-trash'></i></button>
                                            <button type='submit' class='btn btn-outline-warning' form='" . $data['id'] . "' formaction='BeschikbaarheidAapassen.php'><i class='fa-solid fa-pen-to-square'></i></button>
                                    </td>
                                </tr>";
                    };
                    if (isset($_POST['submitVer'])) {

                        mysqli_query($conn, "DELETE FROM beschikbaarheid WHERE id='" . $_POST['id'] . "'");
                        unset($_POST['submitVer']);
                        //echo "<meta https-equiv='refresh' content='0'>";
                        //header("Refresh:1; URL=Home.php");
                    ?>
                        <script>
                            setTimeout(function() {
                                location.reload();
                            }, 500); // 1000 milliseconds = 1 seconds
                        </script>
                        <?php
                    }

                    if (isset($_POST['BeschikbaarheidAapassen'])) {
                        try {
                            mysqli_query($conn, "UPDATE beschikbaarheid SET begintijd='" . $_POST['begintijd'] . "', eindtijd='" . $_POST['eindtijd'] . "' WHERE ID='" . $_POST['ID'] . "'");
                        ?>
                            <script>
                                setTimeout(function() {
                                    location.reload();
                                }, 500); // 1000 milliseconds = 1 seconds
                            </script>
                        <?php
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        echo "<meta https-equiv='refresh' content='0'>";
                    }
                    if (isset($_POST['BeschikbaarheidToevoegen'])) {

                        try {
                            mysqli_query($conn, "INSERT INTO beschikbaarheid (begintijd,eindtijd,instructeur_id)
                              VALUES ('" . $_POST['begintijd'] . "','" . $_POST['eindtijd'] . "',1)");
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
        </div>
        <div class="col">
        </div>
    </div>
</div>
