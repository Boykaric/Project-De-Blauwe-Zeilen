<?php
$result = mysqli_query($conn, "SELECT * FROM boten WHERE id =" . $_GET['id']);
$result->fetch_assoc();

foreach ($result as $row) {
?>
    <div class="container">

        <h1> Boot Aanpassen </h1>
        <form method="post">
            <div class="form-group">
                <label for="naam">Boot Naam:</label>
                <input type="text" class="form-control" id="naam" name="naam" value="<?= $row['naam']; ?>">
            </div>
            <div class="form-group">
                <label for="minpassagiers">Minimaal Aantal Passagiers:</label>
                <input type="text" class="form-control" id="minpassagiers" name="minpassagiers" value="<?= $row['minpassagiers']; ?>">
            </div>
            <div class="form-group">
                <label for="maxpassagiers">Maximaal Aantal Passagiers:</label>
                <input type="text" class="form-control" id="maxpassagiers" name="maxpassagiers" value="<?= $row['maxpassagiers']; ?>">
            </div>
            <div class="form-group">
                <label for="grootte">Grootte Boot</label>
                <input type="text" class="form-control" id="grootte" name="grootte" value="<?= $row['grootte']; ?>">
            </div>
            <div class="form-group">
                <label for="niveau">Niveau:</label>
                <select class="form-group" id="niveau" name="niveau">
                    <option <?php if($row['niveau'] == "Beginner"){echo "selected";}; ?> value="Beginner"> Beginner </option>
                    <option <?php if($row['niveau'] == "Gevorderd"){echo "selected";}; ?> value="Gevorderd"> Gevorderd </option>
                    <option <?php if($row['niveau'] == "Expert"){echo "selected";}; ?> value="Expert"> Expert </option>
                </select>
            </div>
            <div class="form-group">
                <label for="beschikbaarheid">Beschikbaarheid Boot:</label>
                <select class="form-control" id="beschikbaarheid" name="beschikbaarheid" value="<?= $row['beschikbaarheid']; ?>">
                    <option <?php if($row['beschikbaarheid'] == "1"){echo "selected";}; ?> value="1"> Beschikbaar </option>
                    <option <?php if($row['beschikbaarheid'] == "0"){echo "selected";}; ?> value="0"> Niet Beschikbaar </option>
                </select>
            </div>
            <div class="form-group">
                <label for="opmerking">Opmerking:</label>
                <textarea class="form-control" id="opmerking" rows="3" name="opmerking"><?= $row['opmerking']; ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
            <input type="submit" class="btn btn-primary" value="Terug" name="terug">
        </form>
    </div>
<?php
}



if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
        // Code specifiek voor de "Opslaan" knop
        $naam = $_POST['naam'];
        $minpassagiers = $_POST['minpassagiers'];
        $maxpassagiers = $_POST['maxpassagiers'];
        $grootte = $_POST['grootte'];
        $niveau = $_POST['niveau'];
        $beschikbaarheid = $_POST['beschikbaarheid'];
        $opmerking = $_POST['opmerking'];

        // Update de boot waar de ID, de ID is van de boot die je hebt aangeklikt
        mysqli_query($conn, "UPDATE `boten` SET `naam`= '$naam',`minpassagiers`='$minpassagiers',`maxpassagiers`='$maxpassagiers',`grootte`='$grootte',`niveau`='$niveau',`beschikbaarheid`='$beschikbaarheid',`opmerking`='$opmerking' WHERE id =" . $_GET['id']);

        // Na het opslaan doorverwijzen
        header("location: ?pagina=boten");
        exit();
}
?>