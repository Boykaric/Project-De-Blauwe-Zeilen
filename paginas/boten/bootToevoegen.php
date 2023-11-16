<?php
if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
    $naam = $_POST['naam'];
    $minpassagiers = $_POST['minpassagiers'];
    $maxpassagiers = $_POST['maxpassagiers'];
    $grootte = $_POST['grootte'];
    $niveau = $_POST['niveau'];
    $beschikbaarheid = $_POST['beschikbaarheid'];
    $opmerking = $_POST['opmerking'];

    // Voeg de gegevens toe aan de database
    mysqli_query($conn, "INSERT INTO boten (naam, minpassagiers, maxpassagiers, grootte, niveau, beschikbaarheid, opmerking) VALUES ('$naam', '$minpassagiers', '$maxpassagiers', '$grootte', '$niveau', '$beschikbaarheid', '$opmerking')");
    header("location: ?pagina=boten");
}
?>
<div class="container">

    <h1> Boot Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="naam">Boot Naam:</label>
            <input type="text" class="form-control" id="naam" name="naam" class="form-control">
        </div>
        <div class="form-group">
            <label for="minpassagiers">Minimaal Aantal Passagiers:</label>
            <input type="text" class="form-control" id="minpassagiers" name="minpassagiers" class="form-control">
        </div>
        <div class="form-group">
            <label for="maxpassagiers">Maximaal Aantal Passagiers:</label>
            <input type="text" class="form-control" id="maxpassagiers" name="maxpassagiers" class="form-control">
        </div>
        <div class="form-group">
            <label for="grootte">Grootte Boot</label>
            <input type="text" class="form-control" id="grootte" name="grootte" class="form-control">
        </div>
        <div class="form-group">
            <label for="niveau">Type moeilijkheid:</label>
            <select class="form-control" id="niveau" name="niveau" class="form-control">
                <option value="Beginner"> Beginner </option>
                <option value="Gevorderd"> Gevorderd </option>
                <option value="Expert"> Expert </option>
            </select>
        </div>
        <div class="form-group">
            <label for="beschikbaarheid">Beschikbaarheid Boot:</label>
            <select class="form-control" id="beschikbaarheid" name="beschikbaarheid" class="form-control">
                <option value="1"> Beschikbaar </option>
                <option value="0"> Niet Beschikbaar </option>
            </select>
        </div>
        <div class="form-group">
            <label for="opmerking">Opmerking:</label>
            <textarea class="form-control" id="opmerking" rows="3" name="opmerking" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
        <a href="?pagina=boten" class="btn btn-secondary"> Annuleren</a>
    </form>
</div>