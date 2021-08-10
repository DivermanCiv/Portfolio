<?php


#Gestion des références à afficher



$reqtestimonial = $bdd -> prepare ('SELECT * FROM testimonial, user WHERE user.ID_user=testimonial.ID_user AND testimonial.ID_message_status = 2');

$reqtestimonial -> execute();

$datatestimonial = $reqtestimonial ->  fetchAll();



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
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_fr, ID_message_status) VALUES (:id, :message, 1)');
    }
    elseif ($_SESSION["lang"] == "en"){
        $reponse = $bdd -> prepare ('INSERT INTO testimonial (ID_user, testimonial_content_en, ID_message_status) VALUES (:id, :message, 1)');
    }

    $reponse -> execute(array(
        'id'=> $last_id,
        'message' => $testimonial
        ));

    $reponse -> closeCursor();


}



?>
