<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-10">
            <form action='?pagina=gegevensOverzichtCursist' method="POST">
                <div class="mb-3 row">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['userId']; ?>">
                    <div class="col">
                        <label for="" class="form-label">Voornaam</label>
                        <input type="text" class="form-control" name="voornaam" placeholder="Voornaam" value="<?php echo $_SESSION['voornaam']; ?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Achternaam</label>
                        <input type="text" class="form-control" name="achternaam" placeholder="Achternaam" value="<?php echo $_SESSION['achternaam']; ?>">
                    </div>
                </div>
                <div class="form-row" style="margin-top: 12px;">
                    <div class="col">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                </div>
                <div class="form-row" style="margin-top: 12px;">
                    <div class="col">
                        <label for="" class="form-label">Telefoon Nummer</label>
                        <input type="text" class="form-control" name="telnr" placeholder="Telefoonnummer" value="<?php echo $_SESSION['telnr']; ?>">
                    </div>

                </div>
                <div class="mb-3 row" style="margin-top: 12px;">
                    <div class="col">
                        <label for="" class="form-label">Straat naam</label>
                        <input type="text" class="form-control" name="straatnaam" placeholder="Straatnaam" value="<?php echo $_SESSION['straatnaam']; ?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Huisnummer</label>
                        <input type="text" class="form-control" name="huisnr" placeholder="huisnummer" value="<?php echo $_SESSION['huisNr']; ?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Postcode</label>
                        <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $_SESSION['postcode']; ?>">
                    </div>
                </div>
                <div class="form-row" style="margin-top: 12px;">

                </div>
                <div style="margin-top:10px;">
                    <input type="submit" class="btn btn-primary" value="Opslaan" name='aanpassenCursist'>
                    <a href="?pagina=gegevensOverzichtCursist" class="btn btn-secondary"> Annuleren</a>
                </div>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>