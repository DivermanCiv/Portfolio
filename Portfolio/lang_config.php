<?php

 
if (empty($_GET['lang'])){
    $_SESSION['lang'] = "fr";
}
else{
    switch ($_GET['lang']){
        case 'fr' :
            $_SESSION['lang']="fr";
            break;
        case 'en' :
            $_SESSION['lang']="en";
            break;
        default :
            $_SESSION['lang']="fr";
    }
}

switch($_SESSION["lang"]){
    case 'fr' :
        $language_file = "lang_fr.php";
        break;
    case 'en' :
        $language_file = "lang_en.php";
        break;
}

include ($language_file);



?>