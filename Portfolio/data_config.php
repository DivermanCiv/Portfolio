<?php
try{
    $bdd= new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8','root','root');
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}



#GESTION DES REFERENCES A AJOUTER 

if (isset($_POST['testimonialreference'])){
    switch ($_POST['testimonialreference']){
        case 'reference1':
            $numtestimonial = 1;
            $buttoncolor1 = "blue";
            $buttoncolor2 = "white";
            $buttoncolor3 = "white";
            break;
        case 'reference2':
            $numtestimonial = 2;
            $buttoncolor2 = "blue";
            $buttoncolor1 = "white";
            $buttoncolor3 = "white";
            break;
        case 'reference3':
            $numtestimonial = 3;
            $buttoncolor3 = "blue";
            $buttoncolor2 = "white";
            $buttoncolor1 = "white";
            break;
        
    }
}
else{
    $numtestimonial = 1;
    $buttoncolor ="blue";
}


$reqtestimonial = $bdd -> prepare ('SELECT * FROM testimonial, user WHERE user.ID_user=testimonial.ID_user AND ID_testimonial = :numtestimonial');

$reqtestimonial -> execute (array('numtestimonial' => $numtestimonial));



?>




