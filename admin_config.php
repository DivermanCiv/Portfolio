<?php

if (file_exists("env.php")){
  include("env.php");
}

$dsn = getenv('DSN');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PW');

try{
    $bdd= new PDO($dsn,$username,$password);
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$user = $bdd -> prepare ('SELECT * FROM user');
$user -> execute(array());


function add_to_user($name, $mail, $phone, $orga, $position, $website, $ip, $user, $bdd){
            $insert_into_user = $bdd-> prepare('INSERT INTO user (user_username, user_mail, user_phone, user_organisation, user_position, user_website, user_IP) VALUES (:nom, :mail, :telephone, :organisation, :position, :website, :ip)');
            $insert_into_user -> execute(array(
               'nom' => $name,
                'mail'=> $mail,
                'telephone'=> $phone,
                'organisation'=> $orga,
                'position' => $position,
                'website' => $website,
                'ip' => $ip
            ));
        }


function fetch_in_user($a, $b, $user){
    while ($data_user = $user -> fetch()){
        if ($id == $data_user["ID_user"]){
            $a = $data_user[$b];
        }
    }
}

?>
