<div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-10">
                <form action='instructeurBeschikbaarheid.php' method="POST">
                    <div class="form-row">
                        <div class="col">
                            <input type="datetime-local" class="form-control" name="begintijd" placeholder="begintijd" value="">
                        </div>
                        <div class="col">
                            <input type="datetime-local" class="form-control" name="eindtijd" placeholder="eindtijd" value="">
                        </div>
                    </div>
                    <div style="margin-top:10px;">
                        <input type="submit" class="btn btn-primary" value="Opslaan" name='BeschikbaarheidToevoegen'>
                        <a href="?pagina=boten" class="btn btn-secondary"> Annuleren</a>
                    </div>
                </form>
            </div>
            <div class="col">
            </div>
        </div>
    </div>