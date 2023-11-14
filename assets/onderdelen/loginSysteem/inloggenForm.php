<?php

?>

<body>
    <div class="container">
        <h1> Inloggen </h1>
        <div>
            <form method="post">
                <div class="row mb-4">
                    <div class="col">
                        <input type="text" class="form-control" name="email" placeholder="email" autocomplete="off" />
                        <br>
                        <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord"
                            autocomplete="off" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="inloggen" value="inloggen"> <br>
                <small class="inloginput"> Heeft u nog geen Account? Registreer dan <a href="?pagina=registreren"> hier
                    </a></small>
            </form>
        </div>
    </div>