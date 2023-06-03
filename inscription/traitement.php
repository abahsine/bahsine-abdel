<?php 
require_once("functions.php");

$host = "localhost";
$username = "id20169362_bahsine";
$password = "BAhsine.1998";
$dbname = "id20169362_bahsine" ;
$data_user = verification_data_form($_POST);
if (!empty ($data_user['error_input'])){ 
    echo "<ul>";
   foreach($data_user['error_input'] as $error)
      
        echo "<li style='color: red; font-weight: bold;'>$error</li>";
        echo "</ul>";
    
}elseif (exist_donnes($data_user['data']['username'])) {

                    $errorMsg = "Votre username est déjà utilisé.";
                
                    echo '
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">
                      <i class="fas fa-exclamation-circle"></i>
                      <span>' . $errorMsg . '</span>
                    </div>
                    ';


}else{
    $conn = mysqli_connect($host,$username,$password,$dbname);
    if (mysqli_connect_errno()){

            $errorMsg = "Veuillez réessayer ultérieurement.";
            $errorMessage = mysqli_connect_error();
            
            echo '
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">
              <i class="fas fa-exclamation-circle"></i>
              <span>' . $errorMsg . '</span>
              <p>Erreur : ' . $errorMessage . '</p></div>';


        
    }else {
        $query = "INSERT INTO users (gender, firstname, lastname, username, mail, password, birthdate, country)
        VALUES ('{$data_user['data']['gender']}', '{$data_user['data']['firstname']}', '{$data_user['data']['lastname']}',
                '{$data_user['data']['username']}', '{$data_user['data']['mail']}', '{$data_user['data']['password']}',
                '{$data_user['data']['birthdate']}', '{$data_user['data']['country']}')";
        $result = mysqli_query($conn,$query);
        if ($result){
        header("Location: confirmation.html");
        exit; } else {
            echo "error :".mysqli_error();
        }


        
    }
}
?>