<?php

include ("admin_config.php");

include("lang_config.php");



?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' name ="AdamDupuis"/>
        <title>My Portfolio</title>
        <link rel='stylesheet' href='styles.css'/>
    </head>
    <body>
<!-----------------------------HEADER-------------------------------------------------    -->
        <header>
            <div id="banner">  <!--banner-->
                <div id="languages"> <!--1st line-->
                    <a href="index.php?lang=fr"><img class='french flag' src="Images/french.png" alt="french flag" title="french"/></a>
                    <a href="index.php?lang=en"><img class="english flag" src="Images/english.png" alt="union jack" title="english"/></a>

                </div>
                <div id="welcome">
                    <div>
                        <p id="bonjour"><?= _BONJOUR;?> </p>
                        <p><?= _ADAM_DUPUIS ;?></p>
                        <h1><?= _DEVELOPPEUR ;?></h1>
                        <p><?= _AT_LOCATION ;?></p>

                    </div>
                    <div>
                        <p><?= _SAVOIR_PLUS ;?></p>
                        <a href="#navigateur"><img src="Images/whitearrow.svg" alt="arrow" title="arrow"/></a>
                    </div>
                </div>

            </div>
            <nav id="navigateur">
                <a href=#banner><?= _ACCUEIL ;?></a>
                <a href=#about><?= _A_PROPOS ;?></a>
                <a href="#portfolio"><?= _PORTFOLIO ;?></a>
                <a href="#references"><?= _REFERENCES ;?></a>
                <a href="#contact"><?= _ME_CONTACTER ;?></a>
            </nav>

        </header>

<!--        -------------------ABOUT ME----------------------------------->

        <section id="about">
            <h3><?= _QUI_SUIS_JE ;?></h3>
            <div>
                <img src="Images/profile_picture.jpg" alt="Adam_Dupuis" title="Adam_Dupuis">
                <div id="profile_box">
                    <p><?= _ADAM_DUPUIS ;?></p>
                    <p><?= _3_MOTS_DEF ;?></p>
                    <p><?= _DESCRIPTION ;?></p>
                    <?= _OBTENIR_CV ; ?>
                </div>
            </div>
        </section>
<!--        -------------------------------PORTFOLIO-------------------------->
        <section id="portfolio">
            <h3><?= _PORTFOLIO ; ?></h3>
            <div>
                <?php include ("project_portfolio.php"); ?>

            </div>
        </section>

<!--        REFERENCES -->
        <section id="references">
            <h3><?= _REFERENCES ; ?></h3>
            <div>
                <?php
                include("testimonial_portfolio.php");
                $datatestimonial = $datatestimonial[2]
                ?>
                <span id="previous_next_testimonial">
                  <img id="previous_testimonial" src="Images/double_arrow.svg" alt="previous_testimonial">
                  <img id="next_testimonial" src="Images/double_arrow.svg" alt="next_testimonial">
                </span>
                <div>
                    <?php
                        if ($_SESSION['lang'] == "fr"){
                            if (empty($datatestimonial['testimonial_content_fr'])){
                                define ("_REFCONTENT", "Oups, cette référence n'a pas encore été traduite en français !");
                            }
                            else {
                                define ("_REFCONTENT", $datatestimonial['testimonial_content_fr']);
                            }
                        }
                        elseif ($_SESSION['lang'] == "en"){
                            if (empty($datatestimonial['testimonial_content_en'])){
                                define ("_REFCONTENT", "Oops, this testimonial hasn't been translated in english yet!");
                            }
                            else{
                                define ("_REFCONTENT", $datatestimonial['testimonial_content_en']);
                            }
                        }
                    ?>
                    <p><?= _REFCONTENT ; ?></p>
                    <p><?= $datatestimonial['user_username'].", "; ?>
                    <span><?= $datatestimonial["user_position"]." " . _A ; ?>
                    <?php
                    if ($datatestimonial['user_website']!=NULL){
                        echo "<a href= ' ".$datatestimonial['user_website']." ' >".$datatestimonial['user_organisation'] ."</a>" ;
                    }
                    else {
                        echo $datatestimonial['user_organisation'] ;
                    }
                        ?>
                    </span>
                    </p>
                </div>
            </div>
            <p id ="travailler_ensemble"><?= _TRAVAILLER_ENSEMBLE ; ?></p>
            <a class="afficher_masquer" onclick ="ShowHide();"><?= _AFFICHER_MASQUER ; ?></a>
            <div id ="flop" class ="testimonial_submit">
                <form  action ="<?= _FORM_ADD_REFERENCE ?>" method="post">
                    <input type ="text" name = 'name' placeholder="<?= _NOM ; ?>" required/>
                    <input id="testimonial_mail" type="email" name = "email" placeholder="<?= _MAIL ; ?>" required/>
                    <input type="text" name= "position" placeholder ="<?= _POSITION ; ?>" required/>
                    <input type="text" name = "organisation" placeholder="<?= _ORGANISATION ; ?> " required/>
                    <input type="text" name = "website" placeholder="<?= _WEBSITE ; ?>"/>
                    <textarea name ="testimonial" placeholder="<?= _TESTIMONIAL_PLACEHOLDER ; ?>" required></textarea>
                    <button type="submit" value="envoyer"><?= _ENVOYER; ?></button>
                </form>
            </div>
            <?php if (!empty($_POST["testimonial"])){
                        echo "<p id='thank_you_testimonial'>". _THANKS_TESTIMONIAL . "</p>";
                    }
                    ?>
        </section>

<!--  CONTACT -->
        <section id="contact">
            <h3><?= _ME_CONTACTER; ?></h3>
            <div>
                <div>
                    <h4><?= _LAISSEZ_MESSAGE ; ?></h4>
<!--                    formulaire.txt à changer -->

                    <form action="contact.php" method="post" >
                        <input type="text" name ="name" id="name" placeholder="<?= _NOM ; ?>" required/>
                        <input type="email" name = "email" id="email" placeholder="<?= _MAIL ; ?>" required/>
                        <input type="text" name = "organisation" id="organisation" placeholder="<?= _ORGANISATION ; ?>"/>
                        <input type="tel" name = "phone" id="phone" placeholder="<?= _TELEPHONE ; ?>"/>
                        <textarea name ="message" id="message" placeholder="<?= _MESSAGE_PLACEHOLDER ; ?>" required></textarea>
                        <button type="submit" value="envoyer"><?= _ENVOYER; ?></button>
                    </form>
                </div>
                <div>
                    <h4><?= _CONTACT_DIRECT ; ?></h4>
                    <ul>
                        <li class="pin_icon">Angers (49100)</li>
                        <li class="phone_icon">+33 6 11 20 74 68</li>
<!--                        <li class="mail_icon">adamdupuis@laposte.net</li>-->
                        <li class= "linkedin_icon"><a href="https://www.linkedin.com/in/adam-dupuis/" target="_blank" >Linkedin</a></li>
                        <li class="web_icon"><?= _WEB_SITE; ?></li>
                    </ul>
                </div>
            </div>
        </section>

<!--        -------------------------------FOOTER---------------------------------->
        <footer>
            <p>&copy; Adam DUPUIS - 2019</p>
            <a href="mentionslegales.html"><?= _MENTIONSLEGALES ; ?></a>
        </footer>

<!--        ON FERME ICI TOUT LES CURSEURS POUR STOPPER LES TRAITEMENTS DE REQUETES UTILISES -->
        <?php
        $reqtestimonial -> closeCursor(); #Stoppe le traitement de la requête

        ?>
        <script>
            //Fonction Javascript pour coller la barre de navigation au haut de la page
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navigateur");
            var sticky = navbar.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
  }
}
            //Fonction pour afficher/cacher des balises lorsque l'on clique sur un bouton
            function ShowHide(){
                if (addr.id == "flip") {
                    addr.id = "flop";
                }
                else {
                    addr.id = "flip";
                }
            }

            window.onload = function(){
                addr = document.getElementById("flop");
            }

        </script>
    </body>
