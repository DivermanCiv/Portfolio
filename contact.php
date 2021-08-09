<?php
include ("admin_config.php");

$name = $_POST['name'];
$mail = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$orga = $_POST['organisation'];
$position = NULL;
$website = NULL;
$ip = NULL;




add_to_user($name, $mail, $phone, $orga, $position, $website, $ip, $user, $bdd);

$insert_into_contact = $bdd-> prepare('INSERT INTO contact (ID_user, contact_message) VALUES (:id, :message)');

$id = $bdd -> lastInsertId();

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
