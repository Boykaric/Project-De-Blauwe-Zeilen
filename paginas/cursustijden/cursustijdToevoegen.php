<div class="container">

    <h1> Cursus Dag Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="begintijd">Begin Tijd:</label>
            <input type="datetime-local" class="form-control" id="begintijd" name="begintijd">
        </div>
        <div class="form-group">
            <label for="eindtijd">Eind Tijd:</label>
            <input type="datetime-local" class="form-control" id="eindtijd" name="eindtijd">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
        </div>
</div>


<?php
if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
    $begintijd = $_POST['begintijd'];
    $eindtijd = $_POST['eindtijd'];

    // Voeg de gegevens toe aan de database
    mysqli_query($conn, "INSERT INTO cursusdagen (begintijd, eindtijd) VALUES ('$begintijd', '$eindtijd')");
    header("location: ?pagina=beherenCursusDagen");
}
?>