<?php


$name = $_POST['name'];
$email = $_POST['email'];

$message = $_POST['message'];
$phone = $_POST['phone'];
$orga = $_POST['organisation'];

$reponse = $bdd-> prepare('INSERT INTO user (user_username, user_mail) VALUES (:nom, :mail)');

$reponse -> execute(array(
   'nom' => $name,
    'mail'=> $email
));

$last_id = $bdd -> lastInsertId();


$reponse = $bdd-> prepare('INSERT INTO contact (ID_user, contact_message, contact_phone, contact_organisation) VALUES (:id, :message, :telephone, :organisation)');


$reponse -> execute(array(
    'id'=> $last_id,
    'message' => $message,
    'telephone'=> $phone,
    'organisation'=> $orga
));


$return = mail('adamdupuis@laposte.net', 'Nouveau message de '.$name.' depuis le portfolio',$message.' <br>Organisation : '.$orga.'<br>Telephone : '.$phone , 'From: '.$email );

if ($return){
    echo "Votre message a été envoyé, je vous répondrai prochainement !";
}

echo "<br><a href=\"portfolio.php\">Retour au site</a>"; 
?>