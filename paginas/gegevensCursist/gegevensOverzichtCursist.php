
    <?php
    $result = mysqli_query($conn, "SELECT * FROM gebruikers WHERE id =" . $_SESSION["userId"]);
    $result->fetch_assoc();
    foreach ($result as $row) {
        echo "
            <br>
            <div class='row'>
                <div class='col-4'></div>
                <div class='col-2'>
                    <b>Voornaam :</b> <br><br>
                    <b>Achternaam :</b> <br><br>
                    <b>Email :</b> <br><br>
                    <b>Telefoonnummer :</b> <br><br>
                    <b>Straatnaam :</b> <br><br>
                    <b>Huisnummer :</b> <br><br>
                    <b>Postcode :</b> <br>
                </div>
                <div class='col-2'>
                    " . $row['voornaam'] . "<br><br>
                    " . $row['achternaam'] . "<br><br>
                    " . $row['email'] . "<br><br>
                    " . $row['telnr'] . "<br><br>
                    " . $row['straatnaam'] . "<br><br>
                    " . $row['huisnr'] . "<br><br>
                    " . $row['postcode'] . "<br><br>
                    <div style='float: right;'>
                        <form action='?pagina=aanpassenCursist' method='POST'>
                            <input type='hidden' id='id' name='id' value='" . $row['id'] . "'>
                            <input type='hidden' id='voornaam' name='voornaam' value='" . $row['voornaam'] . "'>
                            <input type='hidden' id='achternaam' name='achternaam' value='" . $row['achternaam'] . "'>
                            <input type='hidden' id='email' name='email' value='" . $row['email'] . "'>
                            <input type='hidden' id='telnr' name='telnr' value='" . $row['telnr'] . "'>
                            <input type='hidden' id='straatnaam' name='straatnaam' value='" . $row['straatnaam'] . "'>
                            <input type='hidden' id='huisnr' name='huisnr' value='" . $row['huisnr'] . "'>
                            <input type='hidden' id='postcode' name='postcode' value='" . $row['postcode'] . "'>
                            <input type='submit' class='btn btn-primary' value='Aanpassen' name='aanpassenCursist'>
                        </form>
                    </div>
                </div>

                <div class='col-4'></div>
            </div>";
    }
    if (isset($_POST['aanpassenCursist'])) {
        try {

            mysqli_query($conn, "UPDATE gebruikers SET voornaam='" . $_POST['voornaam'] . "', achternaam='" . $_POST['achternaam'] . "', email='" . $_POST['email'] . "', telnr='" . $_POST['telnr'] . "',straatnaam='" . $_POST['straatnaam'] . "', huisnr='" . $_POST['huisnr'] . "', postcode='" . $_POST['postcode'] . "' WHERE ID='" . $_POST['id'] . "'");

            unset($_SESSION["voornaam"]);
            unset($_SESSION["achternaam"]);
            unset($_SESSION["email"]);
            unset($_SESSION["telnr"]);
            unset($_SESSION["straatnaam"]);
            unset($_SESSION["huisNr"]);
            unset($_SESSION["postcode"]);

            $_SESSION['voornaam'] = $_POST['voornaam'];
			$_SESSION['achternaam'] = $_POST['achternaam'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['telnr'] = $_POST['telnr'];
			$_SESSION['straatnaam'] = $_POST['straatnaam'];
			$_SESSION['huisNr'] = $_POST['huisnr'];
			$_SESSION['postcode'] = $_POST['postcode'];
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
    ?>