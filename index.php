<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>DBZ</title>
</head>

<body>
  <?php require('./assets/functions.php'); ?>
  <?php require('connect_db.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!--- NAVBAR -->

  <div class="navbar navbar-expand-lg">
    <?php
    require('./assets/onderdelen/menu.php');
    ?>
  </div>
  <!-- NAVBAR EINDE -->
  <?php
  /* The code block is checking the value of the 'pagina' parameter in the URL using the 
  superglobal. If the 'pagina' parameter is set, it uses a switch statement to determine which page
  to require based on the value of 'pagina'. Each case corresponds to a specific page file that
  needs to be included. If the 'pagina' parameter is not set, it sets the value of ['pagina']
  to 'home' and requires the 'home.php' file. Finally, it requires the 'footer.php' file. */

  if (isset($_GET['pagina'])) {
    switch ($_GET['pagina']) {
      case 'home':
        require('home.php');
        break;
      case 'boten':
        require('./paginas/boten/boten.php');
        break;
      case 'bootToevoegen':
        require('./paginas/boten/bootToevoegen.php');
        break;
      case 'bootAanpassen':
        require('./paginas/boten/bootAanpassen.php');
        break;
      case 'bootVerwijderen':
        require('./paginas/boten/bootVerwijderen.php');
        break;
      case 'beherenCursusTijden':
        require('./paginas/cursustijden/beherenCursusTijden.php');
        break;
      case 'cursustijdToevoegen':
        require('./paginas/cursustijden/cursustijdToevoegen.php');
        break;
      case 'cursustijdVerwijderen':
        require('./paginas/cursustijden/cursustijdVerwijderen.php');
        break;
      case 'cursustijdAanpassen':
        require('./paginas/cursustijden/cursustijdAanpassen.php');
        break;
      case 'planningCursusDagen':
        require('./paginas/cursusdagen/planningCursusDagen.php');
        break;
      case 'cursusToevoegen':
        require('./paginas/cursusdagen/cursusToevoegen.php');
        break;
      case 'cursusdagAanpassen':
        require('./paginas/cursusdagen/cursusdagAanpassen.php');
        break;
      case 'cursusdagVerwijderen':
        require('./paginas/cursusdagen/cursusdagVerwijderen.php');
        break;
      case 'inschrijvenCursus':
        require('./paginas/cursusdagen/inschrijvenCursus.php');
        break;
      case 'inloggen':
        require('./assets/onderdelen/loginSysteem/inloggen.php');
        break;
      case 'registreren':
        require('./assets/onderdelen/loginSysteem/registreren.php');
        break;
      case 'uitloggen':
        require('./assets/onderdelen/loginSysteem/uitloggen.php');
        break;
      case 'roosterCursist':
        require('./assets/onderdelen/roosterCursist.php');
        break;
      case 'beschikbaarheid':
        require('./paginas/beschikbaarheid.php');
        break;
    }
  } else {
    $_GET['pagina'] = 'home';
    require('home.php');
  }

  require('./assets/onderdelen/footer.php');
  ?>
</body>

</html>