<?php

function login($email, $password, $conn)
{

	$query = mysqli_query($conn, "SELECT * FROM gebruikers WHERE email = '$email';");

	if ($query->num_rows == 1) 
	{
		// Variabelen inlezen uit query
		$result = $query->fetch_assoc();

		$hashedPassword = hash('sha512', $password);


		if ($hashedPassword  ==  $result['wachtwoord']) 
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];


			$_SESSION['userId'] = $result['id'];
			$_SESSION['email'] = $email;
			$_SESSION['level'] = $result['level'];
			$_SESSION['loginString'] = hash('sha512',
			$hashedPassword . $user_browser);
			
			// Login successful.
			return true;
		 } 
		 else 
		 {
			// password incorrect
            echo "Wachtwoord Onjuist";
			return false;
		 }
	}
	else
	{
		// username bestaat niet
        echo "Gebruiker Bestaat niet";
		return false;
	}
}



if(isset($_POST['inloggen']))
{

	$email = $_POST["email"];
	$password = $_POST["wachtwoord"];


    if (login($email, $password, $conn)) {
        RedirectNaarPagina(1,"?pagina=inschrijvenCursus");
    }else {
        require('inloggenForm.php');
    }


}
else
{	

	require('inloggenForm.php');
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven

}
?>

