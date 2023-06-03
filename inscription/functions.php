<?php

$host = "localhost";
$username = "id20169362_bahsine";
$password = "BAhsine.1998";
$dbname = "id20169362_bahsine" ;
//verification des informations rentrer par l'utilisateur renvoie True ou message d'erreur //

function verification_data_form($data_user) {
    $error_input_data = [];
    $data_chiffre =[];
    
    foreach ($data_user as $key=> $data) {
        //validation de saisie //
        if ($key ==='username' || $key === 'firstname' || $key === 'password'||$key === 'mail')
        {
           if (!empty($data)){ 
             if ($key === 'password') 
            {

                if (strlen($data) < 8) {
                    $error_input_data[] = 'Votre mot de passe doit contenir au moins 8 caractères.';
                }
                elseif (!preg_match("#['data'-9]+#", $data)) {
                    $error_input_data[] = 'Votre mot de passe doit contenir au moins un chiffre.';
                }elseif (!preg_match("#[A-Z]+#", $data)) {
                    $error_input_data[] = 'Votre mot de passe doit contenir au moins une lettre majuscule.';
                }else {
                    $data_chiffre[$key] = $data;
                }
            }  elseif (($key === 'mail') && (!filter_var($data, FILTER_VALIDATE_EMAIL)))
             {
                $error_input_data [] = "votre email n'est pas valide";

              }  elseif (strlen(trim ($data))>40)
              {
                $error_input_data[] = "votre $key depasse 40 caractère";

             } else{
                $data_chiffre[$key] = trim($data);
             }
         }else{
            $error_input_data[]="votre $key est obligatoire";
         }
         

        }else {
            $data_chiffre[$key]= trim($data);
        }
        
    }
   
    return array ('data'=> $data_chiffre ,'error_input'=>$error_input_data);
}





//  fonction qui verifier l'existance du compte deja //

function exist_donnes($username_user ) {

// Informations de connexion à la base de données
$host = "localhost";
$username = "id20169362_bahsine";
$password = "BAhsine.1998";
$dbname = "id20169362_bahsine" ;

// Connexion à la base de données
$connexion = new mysqli($host, $username, $password, $dbname);

// Vérification des erreurs de connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Requête SQL pour vérifier si le nom d'utilisateur existe
$requete = "SELECT * FROM users WHERE username = '$username_user'";
$resultat = $connexion->query($requete);
// retourne True ou False selon si il existe ou pas //
if ($resultat->num_rows > 0) {
   return true;
    
} else {
   return false;
}

// Fermeture de la connexion à la base de données
$connexion->close();

}








?>