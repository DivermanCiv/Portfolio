<?php

$reqproject = $bdd -> prepare ('SELECT * FROM project');

$reqproject -> execute(array());

$dataproject = $reqproject -> fetchAll(PDO::FETCH_BOTH);

#Génération des boîtes contenant les différents projets

for ($i=0; $i < count($dataproject); $i++){

    if ($_SESSION['lang']=="fr"){
        $project_content = $dataproject[$i]['project_fr_text'];
        $project_title = $dataproject[$i]['project_fr_name'];
        $project_keywords = $dataproject[$i]['project_keywords'];
    }
    elseif ($_SESSION['lang'] == "en"){
        $project_content = $dataproject[$i]['project_en_text'];
        $project_title = $dataproject[$i]['project_en_name'];
        $project_keywords = $dataproject[$i]['project_keywords'];
    }

    echo "<div class='portfolio_box'>
                    <a ".$dataproject[$i]["project_link"]." target='_blank'><img src='".$dataproject[$i]["project_image"]."' alt ='".$project_title."' title='".$project_title."'></a>
                    <div>
                        <p>".$project_content."</p>
                        <p>".$project_keywords."</p>
                    </div>
            </div>";
}


?>
