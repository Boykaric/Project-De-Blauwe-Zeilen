<?php
$result = mysqli_query($conn, "SELECT * FROM beschikbaarheid INNER JOIN cursusdagen WHERE instructeur_id = " . $_SESSION['userId']);
$result->fetch_assoc();
?>

<form action='instructeurBeschikbaarheid.php' method="POST">
    <div class="form-row">
        <div class="col">
            <select>
                <?php foreach ($result as $data) {
                    echo "<option> " . $data['cursusdagen.begintijd'] . " </option>";
                } ?>
            </select>
        </div>
        <div style="margin-top:10px;">
            <input type="submit" class="btn btn-primary" value="Opslaan" name='beschikbaarheidToevoegen'>
            <a href="?pagina=beschikbaarheid" class="btn btn-secondary"> Annuleren</a>
        </div>
    </div>
</form>