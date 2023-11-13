<?php


/*
De functie RedirectNaarPagina wordt gebruikt om de gebruiker naar een opgegeven pagina te leiden
na een bepaald aantal seconden, en geeft een succesbericht weer als er geen pagina is opgegeven.
@param seconds Het aantal seconden voordat de pagina wordt doorgestuurd. Als deze parameter niet
wordt opgegeven of is ingesteld op NULL, wordt de pagina onmiddellijk doorgestuurd.
@param pagina De parameter "pagina" wordt gebruikt om de pagina aan te geven waarnaar de gebruiker zal
worden doorgestuurd. Het kan elke geldige URL of paginanaam binnen de website zijn.
*/
function RedirectNaarPagina($seconds = NULL,$pagina = NULL)
{
	if(!empty($seconds))
		$refresh = 'Refresh: '.$seconds.';URL=';
	else
		$refresh = 'location:';

	if(!isset($pagina))
	{
		echo "<div class='errorContainer'><p class='errorTekst'>U bent succesvol ingelogd<br />U wordt binnen ".$seconds." seconden doorgestuurd</p></div>";
		header($refresh . "?pagina=home");
	}
	else
		header($refresh . $pagina);
}

/** De functie LoginCheck
  * controleert of de gebruiker is ingelogd
  */
function LoginCheck($conn) 
{
    // Controleren of Sessie variabelen bestaan
    if (isset($_SESSION['userId'],$_SESSION['email'] , $_SESSION['loginString'])) 
	{
        $userId = $_SESSION['userId'];
        $loginString = $_SESSION['loginString'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        $result = mysqli_query($conn, "SELECT wachtwoord FROM gebruikers WHERE id = $userId");

		// controleren of de klant voorkomt in de DB
		if ($result->num_rows == 1) 
		{
			// Variabelen inlezen uit query
			$row = $result->fetch_assoc();

			//check maken
		    $loginCheck = hash('sha512', $row['wachtwoord'] . $user_browser);
 
				//controleren of check overeenkomt met sessie
                if ($loginCheck == $loginString)
					return true;
                else 
                   return false;
         } else 
              return false;         
     } else 
          return false;
}

/* Functies voor validatie van Form Fields */

/** Controleert een email adres op geldigheid
  * @return  boolean
  */
  function is_email($invoer)
  {
	 return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",$invoer));
   }


  /** Controleert of een string aan de minimum lengte voldoet
  * @return  boolean
  */
  function is_minlength($invoer, $minLengte)
  {
	return (strlen($invoer) >= (int)$minLengte);
  }

  /** Controleert of invoer een NL postcode is
  * @return  boolean
  */
  function is_NL_PostalCode($invoer)
  {
	return (bool)(preg_match('#^[1-9][0-9]{3}\h*[A-Z]{2}$#i', $invoer));
  }

  /** Controleert of invoer een NL telefoonnr is
  * @return  boolean
  */
  function is_NL_Telnr($invoer)
  {
	return (bool)(preg_match('#^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$#', $invoer) 
               && (strlen(str_replace(array('-', ' '), '', $invoer)) == 10));
  }


/** Controleert of invoer alleen uit letters bestaat
  * @return  boolean
  */
  function is_Char_Only($invoer)
  {
	return (bool)(preg_match("/^[a-zA-Z ]*$/", $invoer)) ;
  }

/** functie die controleert of een gebruikersnaam wel of niet in de database		  * voorkomt.
  */
  function is_Username_Unique($email,$conn)
  {
    $result = mysqli_query($conn, "SELECT email FROM gebruikers WHERE email = $email LIMIT 1");

	// controleren of de username voorkomt in de DB
	if ($result->num_rows == 1) 
		return false;//username komt voor
	else
		return true;//username komt niet voor
  }
