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
        RedirectNaarPagina(0, "?pagina=beherenGebruikers");
        if (mysqli_query($conn, $query)) {
            echo "Gebruiker is aangemaakt";
        } else {
            echo "Fout bij het uitvoeren van de query: " . mysqli_error($conn);
        }
    } else {
        echo "Wachtwoorden komen niet overeen!";
    }
}


?>
<div class="container">
    <h2>Gebruiker Aanmaken</h2>
    <form method="post" action="">
        <div class="row">
            <div class="col">
                <label class="form-label" for="Thema">voornaam</label>
                <input type="text" class="form-control" name="voornaam"  id="voornaam" required
                    autocomplete="off" value='<?php $voornaam; ?>'>
            </div>
            <div class="col">
                <label class="form-label" for="Thema">achternaam</label>
                <input type="text" class="form-control" name="achternaam"  id="achternaam"
                    required autocomplete="off" value='<?php $achternaam; ?>'>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="Thema">Email</label>
                <input type="email" class="form-control" name="email"  id="Gebruikersnaam" required
                    autocomplete="off" value='<?php $email; ?>'>
            </div>
            <div class="col">
                <label class="form-label" for="Thema">Telefoonnummer</label>
                <input type="text" class="form-control" name="telnr"  id="telefoonnummer"
                    required autocomplete="off" value='<?php $telNr; ?>'>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="Thema">Straatnaam</label>
                <input type="text" class="form-control" name="straatnaam"  id="straatnaam"
                    required autocomplete="off" value='<?php $straatnaam; ?>'>
            </div>
            <div class="col">
                <label class="form-label" for="Thema">Huisnummer</label>
                <input type="text" class="form-control" name="huisnr"  id="huisnummer" required
                    autocomplete="off" value='<?php $huisNr; ?>'>
            </div>
            <div class="col">
                <label class="form-label" for="Thema">Postcode</label>
                <input type="text" class="form-control" name="postcode"  id="postcode" required
                    autocomplete="off" value='<?php $postcode; ?>'>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="wachtwoord">Wachtwoord</label>
                <input type="password" class="form-control" name="wachtwoord" id="wachtwoord"
                    required autocomplete="off">
            </div>
            <div class="col">
                <label class="form-label" for="retypeWachtwoord"> Retype Wachtwoord</label>
                <input type="password" class="form-control" name="retypeWachtwoord" 
                    id="retypeWachtwoord" required autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="Thema">Opmerking</label>
                <textarea rows="5" max-rows="5" class="form-control" name="opmerking"
                    id="opmerking" required autocomplete="off" value='<?php $opmerking; ?>'></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="niveau">Niveau:</label>
                <select class="form-control" id="niveau" name="niveau" class="form-control">
                    <option value="1"> Beginner </option>
                    <option value="2"> Gevorderd </option>
                    <option value="3"> Expert </option>
                </select>
            </div>
        </div>
        <input type="submit" class="mt-2 btn btn-primary" name="submit" value="Verzenden">
    </form>
</div>