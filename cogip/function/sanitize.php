<?php

//variables qui vont permettre de signaler une erreur sur la page de login
global $usernameError;
global $passwordError;


//Fonction pour sanitizer l'input
 function filter($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

//fonctions pour valider les input par type
//TEXTE
function validateText($type_text){
if(empty($type_text)){
        $usernameError = "Veuillez remplir votre nom d'utilisateur";
        return $usernameError;
	}
	else if(!preg_match('`^[a-zA-Z \'\-\.]+$`', htmlspecialchars($type_text))){
		$usernameError= "Erreur dans le nom d'utilisateur";
        return $usernameError;
	}
	else{
		return TRUE;
	}
}


//MOT DE PASSE 

function validatePassword($type_password){

	if(empty($type_password)){
		$passwordError = "Veuillez remplir un mot de passe";
	}
	else{
		return TRUE;
	}
}

	
//EMAIL
function validateEmail($type_email){

	if(empty($type_email)){
		return "Champ obligatoire";
	}
	else if(!filter_var($type_email, FILTER_VALIDATE_EMAIL)){
		return "Adresse email incorrecte";
	}
	else{
		return TRUE;
	}
}


//TELEPHONE
function validatePhone($type_phone){
	
	if(empty($type_phone)){
		return "Champ obligatoire";
	}
	else if(preg_match("'^(([\+]([\d]{2,}))([0-9\.\-\/\s]{5,})|([0-9\.\-\/\s]{5,}))*$'",
			htmlspecialchars($type_phone))){
			// phone or TVA is valided, number which '/' && '-' && +
	
		return TRUE;
	}
	else{
		return FALSE;
		}
}

// FACTURES à créer?




