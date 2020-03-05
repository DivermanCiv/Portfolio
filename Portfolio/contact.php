<?php

$user = $bdd -> prepare ('SELECT * FROM user'); 
$user -> execute(array()); 

$name = $_POST['name'];
$email = $_POST['email'];

$message = $_POST['message'];
$phone = $_POST['phone'];
$orga = $_POST['organisation'];

$reponse = $bdd-> prepare('INSERT INTO user (user_username, user_mail) VALUES (:nom, :mail)');



while ($data_user = $user -> fetch()){
    if ($email = $data_user["user_mail"]){
        #on doit récupérer le mail (et le nom ?) et l'id associés et les regrouper comme il faut !
        
    }
    else{ # ATTENTION : on ne veut pas que cette commande s'effectue si jamais le if est positif au moins une fois !!! A changer donc ! 
        $reponse -> execute(array(
           'nom' => $name,
            'mail'=> $email
        ));

        $last_id = $bdd -> lastInsertId();
    }
}



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