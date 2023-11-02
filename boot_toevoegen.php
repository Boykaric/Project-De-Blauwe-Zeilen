<div class="container">

    <h1> Boot Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="naam">Boot Naam:</label>
            <input type="text" class="form-control" id="naam" name="naam">
        </div>
        <div class="form-group">
            <label for="minpassagiers">Minimaal Aantal Passagiers:</label>
            <input type="text" class="form-control" id="minpassagiers" name="minpassagiers">
        </div>
        <div class="form-group">
            <label for="maxpassagiers">Maximaal Aantal Passagiers:</label>
            <input type="text" class="form-control" id="maxpassagiers" name="maxpassagiers">
        </div>
        <div class="form-group">
            <label for="grootte">Grootte Boot</label>
            <input type="text" class="form-control" id="grootte" name="grootte">
        </div>
        <div class="form-group">
            <label for="niveau">Type moeilijkheid:</label>
            <select class="form-group" id="niveau" name="niveau">
                <option value="Beginner"> Beginner </option>
                <option value="Gevorderd"> Gevorderd </option>
                <option value="Expert"> Expert </option>
            </select>
        </div>
        <div class="form-group">
            <label for="beschikbaarheid">Beschikbaarheid Boot:</label>
            <select class="form-control" id="beschikbaarheid" name="beschikbaarheid">
                <option value="1"> Beschikbaar </option>
                <option value="0"> Niet Beschikbaar </option>
            </select>
        </div>
        <div class="form-group">
            <label for="opmerking">Opmerking:</label>
            <textarea class="form-control" id="opmerking" rows="3" name="opmerking"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
    </form>
</div>


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