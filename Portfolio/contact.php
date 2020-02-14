<?php
try{
    $bdd= new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8','root','root');
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->exec('SELECT * FROM admin;');

INSERT INTO contact (ID_contact, ID_user, contact_message, contact_telephone, contact_organisation)

?>