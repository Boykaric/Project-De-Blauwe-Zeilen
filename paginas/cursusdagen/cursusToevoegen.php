<?php
if (isset($_POST['opslaan'])) {
    // Haal de geselecteerde waarden uit het formulier
    $cursusTijdId = $_POST['cursustijd'];
    $bootId = ($_POST['boot'] == 0) ? null : $_POST['boot']; // Als boot_id 0 is, zet het dan op NULL
    $instructeurId = ($_POST['instructeur'] == 0) ? null : $_POST['instructeur']; // Als instructeur_id 0 is, zet het dan op NULL
    $actief = $_POST['actief'];

    // Voeg de gegevens toe aan de 'planning' tabel
    $stmt = $conn->prepare("INSERT INTO planning (cursus_id, boot_id, instructeur_id, actief) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $cursusTijdId, $bootId, $instructeurId, $actief);
    $stmt->execute();
    $stmt->close();

    header("location: ?pagina=planningCursusDagen");
}
?>

<div class="container">
    <h1> Cursus Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="cursustijd">Cursus Tijd:</label>
            <select name="cursustijd" class="form-control">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM cursusdagen");
                // Loop door de resultaten van de databasequery
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Herhaal het bovenstaande proces voor andere select-velden -->

        <div class="form-group">
            <label for="boot">Boot:</label>
            <select name="boot" class="form-control">
                <option value="0"> Onbekend </option>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM boten WHERE beschikbaarheid = '1'");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['naam'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="instructeur">Instructeur:</label>
            <select name="instructeur" class="form-control">
                <option value="0"> Onbekend </option>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM gebruikers WHERE level = '2'");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['voornaam'] . " " . $row['achternaam'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="actief">Actief:</label>
            <select name="actief" class="form-control">
                <option value="1"> Ja </option>
                <option value="0" selected> Nee </option>
            </select>
        </div>

        <!-- Herhaal het bovenstaande proces voor andere select-velden -->

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
            <a href="?pagina=beherenCursusTijden" class="btn btn-secondary"> Annuleren</a>
        </div>
    </form>
</div>
