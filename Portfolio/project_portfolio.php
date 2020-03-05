<?php 

$reqproject = $bdd -> prepare ('SELECT * FROM project, associate, keywords WHERE project.ID_project=associate.ID_project AND keywords.ID_keywords = associate.ID_keywords');

$reqkeywords = $bdd -> prepare ('SELECT * FROM keywords');

$reqproject -> execute(array());



#Génération des boîtes contenant les différents projets

while ($dataproject = $reqproject -> fetch()){
    
    if ($_SESSION['lang']=="fr"){
        $project_content = $dataproject['project_fr_text'];
        $project_title = $dataproject['project_fr_name'];
        $project_keywords = $dataproject['keywords_name_fr'];
    }
    elseif ($_SESSION['lang'] == "en"){
        $project_content = $dataproject['project_en_text'];
        $project_title = $dataproject['project_en_name'];
        $project_keywords = $dataproject['keywords_name_en'];
    }

    echo "<div class='portfolio_box'>
                    <a ".$dataproject["project_link"]." target='_blank'><img src='".$dataproject["project_image"]."' alt ='".$project_title."' title='".$project_title."'></a>
                    <div>
                        <p>".$project_content."</p>
                        <p>".$project_keywords."</p>
                    </div>
            </div>";
}

?>