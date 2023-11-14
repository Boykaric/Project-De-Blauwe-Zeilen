<div class="container">
    <h1 class="RegHeader">Registreren</h1>
    <form name="RegistratieFormulier" action="" method="post">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="voornaam">Voornaam</label>
                <input class="form-control" type="text" id="voornaam" required autocomplete="off" name="voornaam" />
                <?php echo $FnameErr; ?>
            </div>
            <div class="col">
                <label class="form-label" for="achternaam">Achternaam</label>
                <input class="form-control" type="text" id="achternaam" required autocomplete="off" name="achternaam" />
                <?php echo $LnameErr; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="straatnaam">Straat</label>
                <input class="form-control" type="text" id="straatnaam" required autocomplete="off" name="straatnaam" />
            </div>
            <div class="col">
                <label for="huisNr">Huis Nummer</label>
                <input class="form-control" type="text" id="huisNr" required autocomplete="off" name="huisNr" />
            </div>
            <div class="col">
                <label for="postcode">Postcode</label>
                <input class="form-control" type="text" id="postcode" required autocomplete="off" name="postcode" />
                <?php echo $ZipErr; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" required autocomplete="off" name="email" />
                <?php echo $MailErr; ?><br />
            </div>
            <div class="col">
                <label for="telNr">Telefoon nr.</label>
                <input class="form-control" type="text" id="telNr" required autocomplete="off" name="telNr" />
                <?php echo $TelErr; ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="Password">Wachtwoord</label>
                <input class="form-control" type="password" id="password" required autocomplete="off" name="password" />
                <?php echo $PassErr; ?>
            </div>
            <div class="col">
                <label for="RetypePassword">Herhaal Wachtwoord:</label>
                <input class="form-control" type="password" id="retypePassword" required autocomplete="off"
                    name="retypePassword" />
                <?php echo $RePassErr; ?>

            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="niveau">Niveau</label>
                <select class="form-control" name="niveau">
                    <option selected disabled> Kies uw Niveau </option>
                    <option value="1"> Beginner </option>
                    <option value="2"> Gevorderd </option>
                    <option value="3"> Expert </option>
                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="opmerking">Opmerking</label>
                <textarea class="form-control" rows="4" type="textarea" id="opmerking" autocomplete="off"
                    name="opmerking"></textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <input class="btn btn-primary" type="submit" name="registreren" value="Registreer!" /> <br>
                <p1>Heeft u al een account Log dan <a href="?pagina=inloggen">hier</a> in. </p1>
            </div>
        </div>
    </form>
</div>