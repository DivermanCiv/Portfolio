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
$email = $_POST['email'];

$message = $_POST['message'];
$phone = $_POST['phone'];
$orga = $_POST['organisation'];

$reponse = $bdd-> prepare('INSERT INTO user (user_username, user_mail) VALUES (:nom, :mail)');


$user_already_exists = FALSE; 
while ($data_user = $user -> fetch()){
    if ($email == $data_user["user_mail"]){
        $id = $data_user ["ID_user"]; 
        $user_already_exists = TRUE; 
    }
}

if ($user_already_exists==FALSE){ 
        $reponse -> execute(array(
           'nom' => $name,
            'mail'=> $email
        ));

        $id = $bdd -> lastInsertId();
    }


$reponse = $bdd-> prepare('INSERT INTO contact (ID_user, contact_message, contact_phone, contact_organisation) VALUES (:id, :message, :telephone, :organisation)');


$reponse -> execute(array(
    'id'=> $id,
    'message' => $message,
    'telephone'=> $phone,
    'organisation'=> $orga
));


$return = mail('adamdupuis@laposte.net', 'Nouveau message de '.$name.' depuis le portfolio',$message.' <br>Organisation : '.$orga.'<br>Telephone : '.$phone , 'From: '.$email );

if ($return){
    echo "Votre message a été envoyé, je vous répondrai prochainement !";
}

echo "<br><a href=\"index.php\">Retour au site</a>"; 

?>