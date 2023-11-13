<div class="container">
    <form name="RegistratieFormulier" action="" method="post">
        <h1 class="RegHeader">Registreren</h1>
        <div class="form-group">
            <label for="voornaam">Voornaam:</label>
            <input class="form-control" placeholder="Voornaam" type="text" id="voornaam" required autocomplete="off" name="voornaam" /><?php echo $FnameErr; ?>
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam:</label>
            <input class="form-control" placeholder="Achternaam" type="text" id="achternaam" required autocomplete="off" name="achternaam" /><?php echo $LnameErr; ?>
        </div>
        <div class="form-group">
            <label for="straatnaam">Straat:</label>
            <input class="form-control" placeholder="Straat" type="text" id="straatnaam" required autocomplete="off" name="straatnaam" />
        </div>
        <div class="form-group">
            <label for="huisNr">Huis Nummer:</label>
            <input class="form-control" placeholder="huisNr" type="text" id="huisNr" required autocomplete="off" name="huisNr" />
        </div>
        <div class="form-group">
            <label for="postcode">Postcode:</label>
            <input class="form-control" placeholder="Postcode" type="text" id="postcode" required autocomplete="off" name="postcode" /><?php echo $ZipErr; ?>
        </div>
        <div class="form-group">
            <label for="telNr">Telefoon nr.:</label>
            <input class="form-control" placeholder="Telefoon Nummer" type="text" id="telNr" required autocomplete="off" name="telNr" /><?php echo $TelErr; ?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" placeholder="Email" type="text" id="email" required autocomplete="off" name="email" /><?php echo $MailErr; ?><br />
        </div>
        <div class="form-group">
            <label for="Password">Wachtwoord:</label>
            <input class="form-control" placeholder="Wachtwoord" type="password" id="password" required autocomplete="off" name="password"/><?php echo $PassErr; ?>
            <label for="RetypePassword">Herhaal Wachtwoord:</label>
            <input class="form-control" placeholder="Herhaal Wachtwoord" type="password" id="retypePassword" required autocomplete="off" name="retypePassword" /><?php echo $RePassErr; ?>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau:</label>
            <select class="form-control" name="niveau">
                <option selected disabled> Kies uw Niveau </option>
                <option value="1"> Beginner </option>
                <option value="2"> Gevorderd </option>
                <option value="3"> Expert </option>
            </select>
        </div>
        <div class="form-group">
            <label for="opmerking">Opmerking:</label>
            <input class="form-control" placeholder="Text Hier" type="textbox" id="opmerking" autocomplete="off" name="opmerking" />
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="registreren" value="Registreer!" /> <br>
            <p1>Heeft u al een account Log dan <a href="?pagina=inloggen">hier</a> in. </p1>
        </div>
    </form>
</div>