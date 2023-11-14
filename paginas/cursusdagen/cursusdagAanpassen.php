<?php

if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
    $cursustijd = $_POST['cursustijd'];
    $boten = $_POST['boten'];
    $instructeur = $_POST['instructeur'];
    $actief = $_POST['actief'];
    mysqli_query($conn, "UPDATE planning SET cursus_id = $cursustijd, boot_id = $boten, instructeur_id = $instructeur, actief = $actief WHERE id = " . $_GET['id']);
    header("location: ?pagina=planningCursusDagen");
}
$result = mysqli_query(
    $conn,
    "SELECT planning.id as id, cursusdagen.id as cursus_id, cursusdagen.begintijd, cursusdagen.eindtijd, boten.id as boot_id, boten.naam, gebruikers.id as gebruikers_id,  gebruikers.voornaam, gebruikers.achternaam, actief FROM planning 
INNER JOIN gebruikers ON planning.instructeur_id = gebruikers.id 
INNER JOIN boten ON planning.boot_id = boten.id 
INNER JOIN cursusdagen ON planning.cursus_id = cursusdagen.id WHERE planning.id = " . $_GET['id'] . ";"
);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h1> Cursus Aanpassen </h1>
    <form method="post">
        <div class="form-group">
            <label for="cursustijd">Cursus Tijd:</label>
            <select class="form-control" name="cursustijd">
                <?php
                $cursusdagen = mysqli_query($conn, "SELECT * FROM cursusdagen");
                foreach ($cursusdagen as $cursusdag) {
                    $selected = ($cursusdag['id'] == $row['cursus_id']) ? 'selected' : '';
                    echo "<option value='" . $cursusdag['id'] . "' $selected>" . $cursusdag['begintijd'] . " / " . $cursusdag['eindtijd'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="boten">Boot:</label>
            <select class="form-control" name="boten" id="boten">
                <?php
                if (empty($row['boot_id'])) {
                ?>
                    <option value='NULL'> Onbekend </option>
                <?php
                }
                    $boten = mysqli_query($conn, "SELECT * FROM boten WHERE beschikbaarheid = 1");
                    foreach ($boten as $boot) {
                        $selected = ($row['boot_id'] == $boot['id']) ? 'selected' : '';
                        echo "<option value='" . $boot['id'] . "' $selected>" . $boot['naam'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="instructeur">Instructeur:</label>
            <select class="form-control" name="instructeur" id="instructeur">
            <?php
                if (empty($row['instructeur_id'])) {
                ?>
                    <option value='NULL'> Onbekend </option>
                    <?php
                }
                $instructeurs = mysqli_query($conn, "SELECT * FROM gebruikers WHERE level = 2");
                foreach ($instructeurs as $instructeur) {
                    $selected = ($instructeur['id'] == $row['gebruikers_id']) ? 'selected' : '';
                    echo "<option value='" . $instructeur['id'] . "' $selected>" . $instructeur['voornaam'] . " " . $instructeur['achternaam'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="actief">Actief:</label>
            <select class="form-control" id="actief" name="actief">
                <?php
                if ($row) {
                    $selectedJa = ($row['actief'] == "1") ? 'selected' : '';
                    $selectedNee = ($row['actief'] == "0") ? 'selected' : '';

                    echo "<option $selectedJa value='1'>Ja</option>";
                    echo "<option $selectedNee value='0'>Nee</option>";
                } else {
                    echo "<option value='1'>Ja</option>";
                    echo "<option value='0'>Nee</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
        </div>
    </form>
</div>