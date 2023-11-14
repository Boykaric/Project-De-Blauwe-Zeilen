<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Begintijd</th>
                        <th scope="col">Eindtijd</th>
                        <th scope="col">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM beschikbaarheid INNER JOIN cursusdagen WHERE instructeur_id = ".$_SESSION['userId']);
                    $result->fetch_assoc();
                    foreach ($result as $data) {
                        echo "<tr>
                                    <td>" . $data['begintijd'] . "</td>
                                    <td>" . $data['eindtijd']. "</td>
                                    <td>
                                        <form action='' method='POST'>
                                            <input type='hidden' id='cursus_id' name='cursus_id' value='" . $data['cursus_id'] . "'>
                                            <input type='hidden' id='instructeur_id' name='instructeur_id' value='" . $data['instructeur_id'] . "'>
                                            <button type='submit' class='btn btn-danger' value='Submit' name='submitVer'>Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>";
                    };
                    if (isset($_POST['submitVer'])) {

                        mysqli_query($conn, "DELETE FROM beschikbaarheid WHERE cursus_id = " . $_POST['cursus_id'] . " AND instructeur_id = " . $_POST['instructeur_id'] . ";");
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
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col">
        </div>
    </div>
</div>
