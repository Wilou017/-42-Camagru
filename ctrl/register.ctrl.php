<?php

	$return['result'] = false;

	if (isset($_POST['submit_register']))
	{

		if (isset($_POST['lastname']) &&
			isset($_POST['firstname']) &&
			isset($_POST['email']) &&
			isset($_POST['pass']) &&
			isset($_POST['pass2']) &&
			!empty($_POST['lastname']) &&
			!empty($_POST['firstname']) &&
			!empty($_POST['email']) &&
			!empty($_POST['pass']) &&
			!empty($_POST['pass2']))
		{
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$pass2 = $_POST['pass2'];
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];

			if (!preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\\s-]{2,}$/i', $lastname))
				$return['message'] = "Le nom contient des caractères invalides";

			else if (!preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\\s-]{2,}$/i', $firstname))
				$return['message'] = "Le prenom contient des caractères invalides";

			else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
				$return['message'] = "l'email n'est pas valide";

			else if (!preg_match('/^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\\-={}[\\]\\\\|;\':",.\\/<>?]).{8,}$/', $pass))
				$return['message'] = "le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, une caractères special et doit faire au moins 8 caractères au total";

			else if ($pass != $pass2)
				$return['message'] = "Les mots de passe ne correspondent pas";

			else if (checkdate($month, $day, $year))
				$return['message'] = "Merci d'entrer une date de naissance valide";

			else {
				$return['message'] = "OK";
			}
		}
		else
			$return['message'] = "Merci de remplir tout les champs";
	}

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		die(json_encode($return));
	}