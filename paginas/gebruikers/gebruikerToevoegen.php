<?php

if (isset($_POST['submit'])) {

    if ($_POST['retypeWachtwoord'] == $_POST['wachtwoord']) {
        $wachtwoord = $_POST['wachtwoord'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $telnr = $_POST['telnr'];
        $straatnaam = $_POST['straatnaam'];
        $huisNr = $_POST['huisnr'];
        $wachtwoord = $_POST['wachtwoord'];
        $retypeWachtwoord = $_POST['retypeWachtwoord'];
        $postcode = $_POST['postcode'];
        $opmerking = $_POST['opmerking'];
        $niveau = $_POST['niveau'];
        $hashedWachtwoord = hash('sha512', $wachtwoord);


        // Voeg de gegevens in de database in
        $query = "INSERT INTO gebruikers (voornaam, achternaam,email, telnr, straatnaam, huisnr, wachtwoord, postcode, opmerking, niveau)
        VALUES ('$voornaam', '$achternaam', '$email', '$telnr','$straatnaam', '$huisNr', '$hashedWachtwoord', '$postcode','$opmerking','$niveau')";
        RedirectNaarPagina(0,"?pagina=beherenGebruikers");
        if (mysqli_query($conn, $query)) {
            echo "Gebruiker is aangemaakt";
        } else {
            echo "Fout bij het uitvoeren van de query: " . mysqli_error($conn);
        }
    }else {
        echo "Wachtwoorden komen niet overeen!";
} 
}


?>

<body>
    <h2>Gebruiker Aanmaken</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="Thema">voornaam</label>
            <input type="text" class="form-control" name="voornaam" placeholder="Voornaam" id="voornaam" required autocomplete="off" value='<?php $voornaam; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">achternaam</label>
            <input type="text" class="form-control" name="achternaam" placeholder="Achternaam" id="achternaam" required autocomplete="off" value='<?php $achternaam; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" id="Gebruikersnaam" required autocomplete="off" value='<?php $email; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">Telefoonnummer</label>
            <input type="text" class="form-control" name="telnr" placeholder="Telefoonnummer" id="telefoonnummer" required autocomplete="off" value='<?php $telNr; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">Straatnaam</label>
            <input type="text" class="form-control" name="straatnaam" placeholder="Straatnaam" id="straatnaam" required autocomplete="off" value='<?php $straatnaam; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">Huisnummer</label>
            <input type="text" class="form-control" name="huisnr" placeholder="Huisnummer" id="huisnummer" required autocomplete="off" value='<?php $huisNr; ?>'>
        </div>
        <div class="form-group">
            <label for="Thema">Postcode</label>
            <input type="text" class="form-control" name="postcode" placeholder="Postcode" id="postcode" required autocomplete="off" value='<?php $postcode; ?>'>
        </div>
        <div class="form-group">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" class="form-control" name="wachtwoord" placeholder="Password" id="wachtwoord" required autocomplete="off">
            <label for="retypeWachtwoord"> Retype Wachtwoord</label>
            <input type="password" class="form-control" name="retypeWachtwoord" placeholder="Retype Password" id="retypeWachtwoord" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="Thema">Opmerking</label>
            <input type="text" class="form-control" name="opmerking" placeholder="Opmerking" id="opmerking" required autocomplete="off" value='<?php $opmerking; ?>'>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau:</label>
            <select class="form-control" id="niveau" name="niveau" class="form-control">
                <option value="1"> Beginner </option>
                <option value="2"> Gevorderd </option>
                <option value="3"> Expert </option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Verzenden">

    </form>

</body>

</html>
</body>

</html>