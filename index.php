<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>DBZ</title>
</head>

<body>
  <?php require('connect_db.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <?php require('navbar.php'); ?>
  <?php
  if (isset($_GET['pagina'])) {
    switch ($_GET['pagina']) {
      case 'home':
        require('home.php');
        break;
      case 'boten':
        require('boten.php');
        break;
      case 'boot_toevoegen':
        require('bootToevoegen.php');
        break;
      case 'boot_aanpassen':
        require('bootAanpassen.php');
        break;
      case 'boot_verwijderen':
        require('bootVerwijderen.php');
        break;
      case 'beherenCursusDagen':
        require('beherenCursusDagen.php');
        break;
      case 'cursusdagToevoegen':
        require('cursusdagToevoegen.php');
        break;
      case 'cursusdagVerwijderen':
        require('cursusdagVerwijderen.php');
        break;
      case 'cursusdagAanpassen':
        require('cursusdagAanpassen.php');
        break;
    }
  } else {
    $_GET['pagina'] = 'home';
    require('home.php');
  }

  require('footer.php');
  ?>
</body>

</html>