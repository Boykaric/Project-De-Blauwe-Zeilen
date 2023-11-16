<?php
if (!isset($level)) {
  if (LoginCheck($conn) == true) {
    $level = $_SESSION['level'];
  } else {
    $level = 0;
  }

  switch ($level) {
    case 1:
      echo   "<div class='container-fluid'>
    <a class='navbar-brand' href='#'> <img src='./assets/images/logo.png' class='nav-logo'> </a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
      <div class='navbar-nav'>
        <a class='nav-link active' aria-current='page' href='?pagina=home'>Home</a>
        <a class='nav-link' href='?pagina=overOns'>Over ons</a>
        <a class='nav-link' href='?pagina=inschrijvenCursus'>Inschrijven</a>
      </div>
    </div>
    <div class='dropdown'>
    <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
      Mijn Account
    </button>
    <ul class='dropdown-menu'>
      <li><a class='nav-link' href='?pagina=gegevensOverzichtCursist'>Account Info</a></li>
      <li><a class='nav-link' href='?pagina=roosterCursist'>Rooster</a><li>
      <li><a class='nav-link' href='?pagina=uitloggen'>Uitloggen</a></li>
    </ul>
  </div>

  </div>";
      break;
    case 2:
      echo   "<div class='container-fluid'>
    <a class='navbar-brand' href='#'> <img src='./assets/images/logo.png' class='nav-logo'> </a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
      <div class='navbar-nav'>
        <a class='nav-link active' aria-current='page' href='?pagina=home'>Home</a>
        <a class='nav-link' href='?pagina=overOns'>Over ons</a>
      </div>
    </div>
    <div class='dropdown m-4'>
    <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
      Mijn Account
    </button>
    <ul class='dropdown-menu'>
      <li><a class='nav-link' href='?pagina=planningCursusDagen'> Cursussen </a></li>
      <li><a class='nav-link' href='?pagina=beschikbaarheid'>Mijn Beschikbaarheid</a></li>
      <li><a class='nav-link' href='?pagina=roosterInstructeur'>Mijn Rooster</a></li>
      <li><a class='nav-link' href='?pagina=uitloggen'>Uitloggen</a></li>
    </ul>
  </div>
    
  </div>";
      break;
    case 3:
      echo   "<div class='container-fluid'>
    <a class='navbar-brand' href='#'> <img src='./assets/images/logo.png' class='nav-logo'> </a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
      <div class='navbar-nav'>
        <a class='nav-link active' aria-current='page' href='?pagina=home'>Home</a>
        <a class='nav-link' href='#'>Over ons</a>
      </div>
    </div>
    <div class='dropdown m-4'>
          <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Beheren
          </button>
            <ul class='dropdown-menu'>
              <li><a class='nav-link' href='?pagina=beherenCursusTijden'> Cursus Tijden </a></li>
              <li><a class='nav-link' href='?pagina=planningCursusDagen'> Cursussen </a></li>
              <li><a class='nav-link' href='?pagina=boten'>Boten</a></li>
              <li><a class='nav-link' href='?pagina=beherenGebruikers'>Gebruikers</a></li>
            </ul>
        </div>
    <div class='dropdown m-4'>
    <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
      Mijn Account
    </button>
    <ul class='dropdown-menu'>
      <li><a class='nav-link' href='?pagina=uitloggen'>Uitloggen</a></li>
    </ul>
    </div>
  </div>";
      break;
    case 4:
      echo   "<div class='container-fluid'>
    <a class='navbar-brand' href='#'> <img src='./assets/images/logo.png' class='nav-logo'> </a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
      <div class='navbar-nav'>
        <a class='nav-link active' aria-current='page' href='?pagina=home'>Home</a>
        <a class='nav-link' href='?pagina=overOns'>Over ons</a>
      </div>
    </div>
    <div class='dropdown m-4'>
    <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
      Beheren
    </button>
    <ul class='dropdown-menu'>
      <li><a class='nav-link' href='?pagina=beherenCursusTijden'> Cursus Tijden </a></li>
      <li><a class='nav-link' href='?pagina=planningCursusDagen'> Cursussen </a></li>
      <li><a class='nav-link' href='?pagina=boten'>Boten</a></li>
      <li><a class='nav-link' href='?pagina=beherenGebruikers'>Gebruikers</a></li>
    </ul>
  </div>
  <div class='dropdown m-4'>
  <button class='dropdown-btn btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
    Mijn Account
  </button>
  <ul class='dropdown-menu'>
    <li><a class='nav-link' href='?pagina=uitloggen'>Uitloggen</a></li>
  </ul>
</div>
  </div>";
      break;
    default:
      echo   "<div class='container-fluid'>
        <a class='navbar-brand' href='#'> <img src='./assets/images/logo.png' class='nav-logo'> </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-link active' aria-current='page' href='?pagina=home'>Home</a>
            <a class='nav-link' href='?pagina=overOns'>Over ons</a>
            <a class='nav-link' href='?pagina=inschrijvenCursus'>Inschrijven</a>
          </div>
        </div>
        <a class='nav-link' href='?pagina=inloggen'>Inloggen</a>
      </div>";
      break;
  }
}
