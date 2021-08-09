<?php

$dsn = "mysql:host=localhost;dbname=portfolio";
$username = "root";
$password = "root";

  try{
    $bdd= new PDO($dsn,$username,$password);
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
#### Fonction pour vérifier qu'un user existe. Assigne à $id le numéro d'id de l'user s'il est trouvé.

########" REFAIRE LA FONCTION POUR NE PLUS UTILISER DE VARIABLES GLOBALES !!!!


function user_exists($user){
    $ok = FALSE;
    global $mail, $id;
    while ($data_user = $user -> fetch()){
        if ($mail == $data_user["user_mail"]){
            $id = $data_user ["ID_user"];
            $ok= TRUE;
        }
    }
    if ($ok){return TRUE;}
    else {return FALSE;}
}

function fetch_in_user($a, $b){
    while ($data_user = $user -> fetch()){
        if ($id == $data_user["ID_user"]){
            $a = $data_user[$b];
        }
    }
}

?>
