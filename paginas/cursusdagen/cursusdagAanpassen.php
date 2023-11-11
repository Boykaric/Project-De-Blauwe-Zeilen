<?php
$result = mysqli_query($conn, "SELECT planning.id as id, cursusdagen.id as cursus_id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.id as boot_id, boten.naam, gebruikers.id as gebruikers_id,  gebruikers.voornaam, gebruikers.achternaam, actief FROM planning INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id INNER JOIN boten ON planning.boot_id = boten.id INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id WHERE planning.id = " . $_GET['id'] . ";");
mysqli_fetch_assoc($result);
?>
<div class="container">
    <h1> Cursus Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="cursustijd">Cursus Tijd:</label>
            <select class="form-control" name="cursustijd">
                <?php
                foreach ($result as $rij) {
                    // Loop door de resultaten van de databasequery
                    $cursusdag = mysqli_query($conn, "SELECT * FROM cursusdagen");
                    mysqli_fetch_assoc($cursusdag);
                    foreach ($cursusdag as $row) {
                        $selected = ($row['id'] == $rij['cursus_id']) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['begintijd'] . " / " . $row['eindtijd'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="boten">Boot:</label>
            <select class="form-control" name="boten" id="boten">
                <?php
                foreach ($result as $rij) {
                    // Loop door de resultaten van de databasequery
                    $boten = mysqli_query($conn, "SELECT * FROM boten");
                    mysqli_fetch_assoc($boten);
                    foreach ($boten as $row) {
                        $selected = ($row['id'] == $rij['boot_id']) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['naam'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="instructeur">Instructeur:</label>
            <select class="form-control" name="instructeur" id="instructeur">
                <?php
                foreach ($result as $rij) {
                    // Loop door de resultaten van de databasequery
                    $instructeur = mysqli_query($conn, "SELECT * FROM gebruikers WHERE level = 2");
                    mysqli_fetch_assoc($instructeur);
                    foreach ($instructeur as $row) {
                        $selected = ($row['id'] == $rij['gebruikers_id']) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['voornaam'] . " " . $row['achternaam'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label  for="actief">Actief:</label>
            <select class="form-control" id="actief" name="actief" id="actief">
                <?php
                    foreach($result as $rij) {
                        ?>
                        <option <?php if($rij['actief'] == "1"){echo "selected";}; ?> value="1"> Ja </option>
                        <option <?php if($rij['actief'] == "0"){echo "selected";}; ?> value="0"> Nee </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
        </div>
    </form>
</div>
<?php
if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
    $cursustijd = $_POST['cursustijd'];
    $boten = $_POST['boten'];
    $instructeur = $_POST['instructeur'];
    $actief = $_POST['actief'];
//  echo "UPDATE planning SET cursus_id = $cursustijd, boot_id = $boten, instructeur_id = $instructeur, actief = $actief WHERE id =" . $_GET['id'];
    // Update de de boot waar de ID, de ID is van de cursus dag die je hebt aangeklikt
    mysqli_query($conn, "UPDATE planning SET cursus_id = $cursustijd, boot_id = $boten, instructeur_id = $instructeur, actief = $actief WHERE id = " . $_GET['id']);
    header("location: ?pagina=planningCursusDagen");
    // if (mysqli_query($conn, $sql)) {
    //     echo "Gegevens zijn succesvol opgeslagen in de planning tabel.";
    // } else {
    //     echo "Fout bij het opslaan van gegevens: " . mysqli_error($conn);
    // }
}

?>