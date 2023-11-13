<?php

//init error fields
$FnameErr = $LnameErr = $ZipErr = $TelErr = $MailErr = $PassErr = $RePassErr = NULL;

if(isset($_POST['registreren']))
{
	$checkOnErrors = false; // hulpvariabele voor het valideren van het formulier
	
	/*
	Opdracht PM08 STAP 2: registreren
	Omschrijving: Lees alle gegevens uit het formulier uit middels de POST methode
	*/
	$voornaam = $_POST['voornaam'];
	$achternaam = $_POST['achternaam'];
	$postcode = $_POST['postcode'];
	$telNr = $_POST['telNr'];
    $straatnaam = $_POST['straatnaam'];
    $huisNr = $_POST['huisNr'];
	$email = $_POST['email'];
    $opmerking = $_POST['opmerking'];
    $niveau = $_POST['niveau'];
	$password = $_POST['password'];
	$retypePassword = $_POST['retypePassword'];


	//BEGIN CONTROLES
	/*
	Opdracht PM08 STAP 3: registreren
	Omschrijving: Zorg er voor dat de gegevens worden gevalideerd op de eisen uit de opdracht. Gebruik de hulpvariabele $CheckOnErrors om later te kunnen controleren of er een fout is gevonden. Deze variabele zet je dus op true wanneer je een validatie fout tegenkomt. Voor het valideren kun je gebruik maken van de validatie functies in het bestand functies.php
	*/
$errTekst = "";
	//controleer het voornaam veld
	if (!is_minlength($voornaam, 2) || !is_Char_Only($voornaam)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Voornaam moet minimaal 2 characters <br>";

	}

	//controleer het achternaam veld
	if (!is_minlength($achternaam, 2) || !is_Char_Only($achternaam)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Achternaam moet minimaal 2 characters <br>";
	}
	
	//controleer het postcode veld	
	if (!is_NL_PostalCode($postcode)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Ongeldige postcode <br>";
	}

	//controleer het telnr veld
	if (!is_NL_Telnr($telNr)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Ongeldig Telefoonnummer <br>";
	}
	
	//controleer het email veld
	if (!is_email($email)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Ongeldige Email <br>";
	}
	
	//controleer het paswoord veld
	if (!is_minlength($password, 6)) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Wachtwoord is te kort <br>";
	}
	
	//controleer het retype paswoord veld
	if (!is_minlength($retypePassword, 6) || $retypePassword != $password) {
		$checkOnErrors = true;
		$errTekst = $errTekst. "Wachtwoord komt niet overeen <br>";
	}
	
	//EINDE CONTROLES


	/*
	Opdracht PM08 STAP 4: registreren
	Omschrijving: Controleer hier of er een fout is gevonden middels de CheckOnErrors variabele. Zo ja, dan ziet de gerbuiker opnieuw het formulier; zo nee, dan gaan we de gegevens in de database toevoegen.
	*/
    if($checkOnErrors == true) //aanvullen
    {
        echo "<div class='errorContainer'><p class='errorTekst'>" . $errTekst . "</p></div>";
        require('registrerenForm.php');

    }
	else
	{
		//formulier is succesvol gevalideerd

		//maak unieke salt
		// $salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$password = hash('sha512', $password);

        mysqli_query($conn, "INSERT INTO gebruikers (voornaam ,achternaam ,email , wachtwoord, telnr, straatnaam, huisnr, postcode, opmerking, niveau) 
                            VALUES ('$voornaam', '$achternaam', '$email', '$password', '$telNr', '$straatnaam', '$huisNr', '$postcode', '$opmerking','$niveau');");


		/*
		Opdracht PM08 STAP 6: registreren
		Omschrijving: Tot slot geef je de gebruiker de melding dat zijn gegevens zijn toegevoegd.
		*/
			Echo "Gegevens zijn toegevoegd " . $voornaam . " " . $achternaam . ", U kunt nu inloggen.";
			echo "U wordt binnen 5 seconden doorgestuurd naar de hoofdpagina.";
			RedirectNaarPagina(5,"?pagina=inloggen");
		
	}
}
else
{
	require('RegistrerenForm.php');
}
?>