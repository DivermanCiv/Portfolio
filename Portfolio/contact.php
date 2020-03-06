<?php
include ("admin_config.php");

try{
    $bdd= new PDO($dsn,$username,$password);
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$user = $bdd -> prepare ('SELECT * FROM user'); 
$user -> execute(array()); 

$name = $_POST['name'];
$mail = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$orga = $_POST['organisation'];
$position = NULL; 
$website = NULL; 
$ip = NULL; 

$insert_into_user = $bdd-> prepare('INSERT INTO user (user_username, user_mail, user_phone, user_organisation, user_position, user_website, user_IP) VALUES (:nom, :mail, :telephone, :organisation, :position, :website, :ip)');

$update_user = $bdd -> prepare('UPDATE user SET user_username = :nom, user_phone = :phone, user_organisation = :organisation, user_position = :position, user_website = :website, user_IP = :ip')

    
### CONTINUER A ECRIRE LA FONCTION POUR UPDATE LES INFOS CONCERNANT UN USER DEJA DANS LA BDD ### s
function add_to_user(){
    global $name, $mail, $phone, $orga, $user, $insert_into_user;
    if (!user_exists($user)){ 
            $insert_into_user -> execute(array(
               'nom' => $name,
                'mail'=> $mail,
                'telephone'=> $phone,
                'organisation'=> $orga
            ));

            $id = $bdd -> lastInsertId();
        }
    else {
        if(!is_null($_POST['phone'])){fetch_in_user($phone, "user_phone");}
        $insert_into_user -> execute(array(
               'nom' => $name,
                'mail'=> $mail,
                'telephone'=> $phone,
                'organisation'=> $orga
            ));
    }
}

add_to_user($insert_into_user); 

$insert_into_contact = $bdd-> prepare('INSERT INTO contact (ID_user, contact_message) VALUES (:id, :message)');


$insert_into_contact -> execute(array(
    'id'=> $id,
    'message' => $message,
    
));


$return = mail('adamdupuis@laposte.net', 'Nouveau message de '.$name.' depuis le portfolio',$message.' <br>Organisation : '.$orga.'<br>Telephone : '.$phone , 'From: '.$mail );

if ($return){
    echo "Votre message a été envoyé, je vous répondrai prochainement !";
}

echo "<br><a href=\"index.php\">Retour au site</a>"; 

?>