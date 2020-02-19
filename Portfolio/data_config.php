<?php
try{
    $bdd= new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8','root','root');
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}



#GESTION DES REFERENCES A AJOUTER 

#Gestion des références à afficher 

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
    $buttoncolor1 ="blue";
    $buttoncolor2 = "white";
    $buttoncolor3 = "white";
}


$reqtestimonial = $bdd -> prepare ('SELECT * FROM testimonial, user WHERE user.ID_user=testimonial.ID_user AND ID_testimonial = :numtestimonial');

$reqtestimonial -> execute(array('numtestimonial' => $numtestimonial));

#Ajout de références par les users 

if (!empty($_POST["testimonial"])){
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $position = $_POST["position"];
    $organisation = $_POST["organisation"];
    $website = $_POST["website"];
    $testimonial = $_POST["testimonial"];
    
    $reponse = $bdd ->prepare ('INSERT INTO user (user_username, user_mail) VALUES (:nom, :mail)');
    $reponse -> execute(array(
        'nom' => $name,
        'mail' => $mail
    ));
    
    $last_id = $bdd -> lastInsertId();
    
    if ($_SESSION["lang"] == "fr"){
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_fr, testimonial_position, testimonial_organisation, testimonial_website) VALUES (:id, :message, :position, :organisation, :website)');
    }
    elseif ($_SESSION["lang"] == "en"){
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_en, testimonial_position, testimonial_organisation, testimonial_website) VALUES (:id, :message, :position, :organisation, :website)');
    }
    
    $reponse -> execute(array(
        'id'=> $last_id,
        'message' => $testimonial,
        'position' => $position,
        'organisation' => $organisation,
        'website' => $website
        ));
    
    $reponse -> closeCursor();
    

}



?>




