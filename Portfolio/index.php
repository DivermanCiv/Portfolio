<?php

include ("admin_config.php");
try{
    $bdd= new PDO($dsn,$username,$password);
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
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
                        <p id="bonjour"><?php echo _BONJOUR;?> </p>
                        <p><?php echo _ADAM_DUPUIS ;?></p>
                        <h1><?php echo _DEVELOPPEUR ;?></h1>
                        <p><?php echo _SUR_RENNES ;?></p>
                        
                    </div>
                    <div>
                        <p><?php echo _SAVOIR_PLUS ;?></p>
                        <a href="#navigateur"><img src="Images/whitearrow.svg" alt="arrow" title="arrow"/></a>
                    </div>
                </div>
                
            </div>
            <nav id="navigateur">
                <a href=#banner><?php echo _ACCUEIL ;?></a>
                <a href=#about><?php echo _A_PROPOS ;?></a>
                <a href="#portfolio"><?php echo _PORTFOLIO ;?></a>
                <a href="#references"><?php echo _REFERENCES ;?></a>
                <a href="#contact"><?php echo _ME_CONTACTER ;?></a>
            </nav>
            
        </header>
        
<!--        -------------------ABOUT ME----------------------------------->
        
        <section id="about">
            <h3><?php echo _QUI_SUIS_JE ;?></h3>
            <div>
                <img src="Images/profile_picture.jpg" alt="Adam_Dupuis" title="Adam_Dupuis">
                <div id="profile_box">
                    <p><?php echo _ADAM_DUPUIS ;?></p>
                    <p><?php echo _3_MOTS_DEF ;?></p>
                    <p><?php echo _DESCRIPTION ;?></p>
                    <?php echo _OBTENIR_CV ; ?>
                </div>
            </div>
        </section>
<!--        -------------------------------PORTFOLIO-------------------------->
        <section id="portfolio">
            <h3><?php echo _PORTFOLIO ; ?></h3>
            <div>
                <?php include ("project_portfolio.php"); ?>
                
            </div>
        </section>
        
<!--        ------------------------------REFERENCES--------------------------------->
        <section id="references">
            <h3><?php echo _REFERENCES ; ?></h3>
            <div>
                <?php
                include("testimonial_portfolio.php");
                while ($datatestimonial = $reqtestimonial ->  fetch())
                {
                ?>
                
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
                    
                    <p><?php echo _REFCONTENT ; ?></p>
                    <p><?php echo $datatestimonial['user_username'].", "; ?> 
                    <span><?php echo $datatestimonial["testimonial_position"]." " . _A ; ?> 
                    <?php
                    if ($datatestimonial['testimonial_website']!=NULL){
                        echo "<a href= ' ".$datatestimonial['testimonial_website']." ' >".$datatestimonial['testimonial_organisation'] ."</a>" ;
                    }
                    else {
                        echo $datatestimonial['testimonial_organisation'] ;
                    }
                }
                        ?>
                    </span>
                    </p>
                </div>
                <div>
                    <form action="<?php echo _FORMPORTFOLIOREFERENCE ?>" method="post">
                        <button name ="testimonialreference" type ="submit" class="<?= $buttoncolor1 ?>" value="reference1"></button>
                        <button name ="testimonialreference" type ="submit" class="<?php echo $buttoncolor2 ?>" value="reference2"></button>
                        <button name ="testimonialreference" type ="submit" class="<?php echo $buttoncolor3 ?>" value="reference3"></button>
                    </form>
                </div>
            </div>
            <p id ="travailler_ensemble"><?php echo _TRAVAILLER_ENSEMBLE ; ?></p>
            <a class="afficher_masquer" onclick ="ShowHide();"><?php echo _AFFICHER_MASQUER ; ?></a>
            <div id ="flop" class ="testimonial_submit">
                <form  action ="<?php echo _FORM_ADD_REFERENCE ?>" method="post">
                    <input type ="text" name = 'name' placeholder="<?php echo _NOM ; ?>" required/>
                    <input id="testimonial_mail" type="email" name = "email" placeholder="<?php echo _MAIL ; ?>" required/>
                    <input type="text" name= "position" placeholder ="<?php echo _POSITION ; ?>" required/>
                    <input type="text" name = "organisation" placeholder="<?php echo _ORGANISATION ; ?> " required/>
                    <input type="text" name = "website" placeholder="<?php echo _WEBSITE ; ?>"/>
                    <textarea name ="testimonial" placeholder="<?php echo _TESTIMONIAL_PLACEHOLDER ; ?>" required></textarea>
                    <button type="submit" value="envoyer"><?php echo _ENVOYER; ?></button>
                </form>
            </div>
            <?php if (!empty($_POST["testimonial"])){
                        echo "<p id='thank_you_testimonial'>". _THANKS_TESTIMONIAL . "</p>"; 
                    }
                    ?>
        </section>
        
<!--        --------------------------CONTACT------------------------------------->
        <section id="contact">
            <h3><?php echo _ME_CONTACTER; ?></h3>
            <div>
                <div>
                    <h4><?php echo _LAISSEZ_MESSAGE ; ?></h4>
<!--                    formulaire.txt à changer -->

                    <form action="contact.php" method="post" >
                        <input type="text" name ="name" id="name" placeholder="<?php echo _NOM ; ?>" required/>
                        <input type="email" name = "email" id="email" placeholder="<?php echo _MAIL ; ?>" required/>
                        <input type="text" name = "organisation" id="organisation" placeholder="<?php echo _ORGANISATION ; ?>"/>
                        <input type="tel" name = "phone" id="phone" placeholder="<?php echo _TELEPHONE ; ?>"/>
                        <textarea name ="message" id="message" placeholder="<?php echo _MESSAGE_PLACEHOLDER ; ?>" required></textarea>
                        <button type="submit" value="envoyer"><?php echo _ENVOYER; ?></button>
                    </form>
                </div>
                <div>
                    <h4><?php echo _CONTACT_DIRECT ; ?></h4>
                    <ul>
                        <li class="pin_icon">Rennes (35000)</li>
                        <li class="phone_icon">+33 6 11 20 74 68</li>
<!--                        <li class="mail_icon">adamdupuis@laposte.net</li>-->
                        <li class= "linkedin_icon"><a href="https://www.linkedin.com/in/adam-dupuis/" target="_blank" >Linkedin</a></li>
                        <li class="web_icon"><?php echo _WEB_SITE; ?></li>
                    </ul>
                </div>
            </div>
        </section>
        
<!--        -------------------------------FOOTER---------------------------------->
        <footer>
            <p>&copy; Adam DUPUIS - 2019</p>
            <a href="mentionslegales.html"><?php echo _MENTIONSLEGALES ; ?></a>
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
        
        

