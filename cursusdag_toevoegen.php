<div class="container">

    <h1> Boot Toevoegen </h1>
    <form method="post">
        <div class="form-group">
            <label for="begintijd">Begin Tijd:</label>
            <input type="date" class="form-control" id="begintijd" name="begintijd">
        </div>
        <div class="form-group">
            <label for="eindtijd">Eind Tijd:</label>
            <input type="date" class="form-control" id="eindtijd" name="eindtijd">
        </div>
</div>


<?php
// if (isset($_POST['opslaan'])) { // Controleer of het "opslaan" knop is ingedrukt
//     $naam = $_POST['naam'];
//     $minpassagiers = $_POST['minpassagiers'];
//     $maxpassagiers = $_POST['maxpassagiers'];
//     $grootte = $_POST['grootte'];
//     $niveau = $_POST['niveau'];
//     $beschikbaarheid = $_POST['beschikbaarheid'];
//     $opmerking = $_POST['opmerking'];

//     // Voeg de gegevens toe aan de database
//     mysqli_query($conn, "INSERT INTO boten (naam, minpassagiers, maxpassagiers, grootte, niveau, beschikbaarheid, opmerking) VALUES ('$naam', '$minpassagiers', '$maxpassagiers', '$grootte', '$niveau', '$beschikbaarheid', '$opmerking')");
//     header("location: ?pagina=boten");
// }
?>