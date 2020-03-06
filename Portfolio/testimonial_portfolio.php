<?php



#GESTION DES REFERENCES A AJOUTER 

#Gestion des références à afficher 

if (isset($_POST['testimonialreference'])){
    $buttoncolor2 = "white";
    $buttoncolor3 = "white";
    $buttoncolor1 = "white";

    switch ($_POST['testimonialreference']){
        
        case 'reference1':
            $numtestimonial = 1;
            $buttoncolor1 = "blue";
            
            break;
        case 'reference2':
            $numtestimonial = 2;
            $buttoncolor2 = "blue";
            break;
        case 'reference3':
            $numtestimonial = 3;
            $buttoncolor3 = "blue";
            break;
        default :
            $numtestimonial = 1;
            $buttoncolor1 = "blue";
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
    
    $reponse = $bdd ->prepare ('INSERT INTO user (user_username, user_mail, user_position, user_organisation, user_website) VALUES (:nom, :mail, :position, :organisation, :website)');
    $reponse -> execute(array(
        'nom' => $name,
        'mail' => $mail,
        'position' => $position,
        'organisation' => $organisation,
        'website' => $website
    ));
    
    $last_id = $bdd -> lastInsertId();
    
    if ($_SESSION["lang"] == "fr"){
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_fr) VALUES (:id, :message)');
    }
    elseif ($_SESSION["lang"] == "en"){
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_en) VALUES (:id, :message)');
    }
    
    $reponse -> execute(array(
        'id'=> $last_id,
        'message' => $testimonial
        ));
    
    $reponse -> closeCursor();
    

}



?>




