<?php
$id = $_GET['id'];

$query = "SELECT * FROM gebruikers WHERE id = $id";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['opslaan'])) {
    // Haal de bijgewerkte gegevens uit het formulier
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $telNr = $_POST['telNr'];
    $email = $_POST['email'];
    $straatnaam = $_POST['straatnaam'];
    $huisNr = $_POST['huisNr'];
    $postcode = $_POST['postcode'];
    $opmerking = $_POST['opmerking'];
    $niveau = $_POST['niveau'];
    $level = $_POST['level'];

    // Voer een updatequery uit om de gegevens bij te werken
    $updateQuery = "UPDATE gebruikers SET voornaam = '$voornaam', achternaam = '$achternaam', telnr = '$telNr',
    email = '$email', straatnaam = '$straatnaam', huisnr = '$huisNr', postcode = '$postcode', niveau = '$niveau', opmerking = '$opmerking', level = '$level' WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Gegevens zijn bijgewerkt.";
        RedirectNaarPagina(0, "?pagina=beherenGebruikers");
        // Je kunt hier ook een redirect naar een andere pagina uitvoeren als dat nodig is.
    } else {
        echo "Fout bij het bijwerken van gegevens: " . mysqli_error($conn);
    }
}

?>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="voornaam"><b>Voornaam</b></label>
            <input class="form-control" type="text" value="<?= $row['voornaam']; ?>" id="Voorletter" name="voornaam" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="achternaam"><b>Achternaam</b></label>
            <input class="form-control" type="text" value="<?= $row['achternaam']; ?>" id="Achternaam" name="achternaam" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="telNr"><b>Telefoonnummer</b></label>
            <input class="form-control" type="text" value="<?= $row['telnr']; ?>" id="telNr" name="telNr" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input class="form-control" type="text" value="<?= $row['email']; ?>" id="Email" name="email" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="straatnaam"><b>Straatnaam</b></label>
            <input class="form-control" type="text" value="<?= $row['straatnaam']; ?>" id="straatnaam" name="straatnaam" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="huisNr"><b>Huisnummer</b></label>
            <input class="form-control" type="text" value="<?= $row['huisnr']; ?>" id="huisnummer" name="huisNr" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="postcode"><b>Postcode</b></label>
            <input class="form-control" type="text" value="<?= $row['postcode']; ?>" id="postcode" name="postcode" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="opmerking"><b>Opmerking</b></label>
            <input class="form-control" type="text" value="<?= $row['opmerking']; ?>" id="opmerking" name="opmerking" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="niveau">Niveau:</label>
            <select id="niveau" name="niveau" class="form-control">
                <option value="1" <?php if ($row['niveau'] == "1") {
                            echo "selected";
                        }; ?> value="Beginner"> Beginner </option>
                <option value="2" <?php if ($row['niveau'] == "2") {
                            echo "selected";
                        }; ?> value="Gevorderd"> Gevorderd </option>
                <option value="3" <?php if ($row['niveau'] == "3") {
                            echo "selected";
                        }; ?> value="Expert"> Expert </option>
            </select>
        </div>
        <?php
        if ($_SESSION['level'] == 4) {
        ?>
            <div class='form-group'>
                <label for='level'>Level:</label>
                <select id='level' name='level' class='form-control'>
                    <option <?php if ($row['level'] == '1') {
                                echo 'selected';
                            }; ?> value='1'> Cursist </option>
                    <option <?php if ($row['level'] == '2') {
                                echo 'selected';
                            }; ?> value='2'> Instructeur </option>
                    <option <?php if ($row['level'] == '3') {
                                echo 'selected';
                            }; ?> value='3'> Admin </option>
                    <option <?php if ($row['level'] == '4') {
                                echo 'selected';
                            }; ?> value='4'> Eigenaar </option>
                </select>
            </div>
        <?php
        } else {
            echo "<input type='hidden' value=" . $row['level'] . " id='level' name='level'><br>";
        }

        ?>
        <button type="submit" name="opslaan" value="Opslaan" class="btn btn-primary">Opslaan</button>
        <a href="?pagina=beherenGebruikers" class="btn btn-secondary"> Annuleren</a>
    </form>
</div>