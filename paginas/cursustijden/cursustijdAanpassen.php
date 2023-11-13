<?php
$result = mysqli_query($conn, "SELECT * FROM cursusdagen WHERE id =" . $_GET['id']);
$result->fetch_assoc();

foreach ($result as $row) {
?>
    <div class="container">

        <h1> Cursus Dag Aanpassen </h1>
        <form method="post">
            <div class="form-group">
                <label for="begintijd">Begintijd:</label>
                <input type="datetime-local" class="form-control" id="begintijd" name="begintijd" value="<?= $row['begintijd']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="eindtijd">Eindtijd:</label>
                <input type="datetime-local" class="form-control" id="eindtijd" name="eindtijd" value="<?= $row['eindtijd']; ?>" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Opslaan" name="opslaan">
        </form>
    </div>
<?php
}



if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
    $begintijd = $_POST['begintijd'];
    $eindtijd = $_POST['eindtijd'];

    // Update de de boot waar de ID, de ID is van de cursus dag die je hebt aangeklikt
    mysqli_query($conn, "UPDATE `cursusdagen` SET `begintijd`= '$begintijd',`eindtijd`='$eindtijd' WHERE id =" . $_GET['id']);
    header("location: ?pagina=beherenCursusTijden");
}

?>