<?php
try{
    $bdd= new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8','root','root');
}

catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


#Afficher des noms venant de la BDD
//$reponse = $bdd->query('SELECT * FROM admin;');
//
//while ($donnee = $reponse->fetch()){
//    echo $donnee['admin_username'];
//}
//$reponse->closeCursor() ;


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
                    <a href="portfolio.php?lang=fr"><img class='french flag' src="Images/french.png" alt="french flag" title="french"/></a>
                    <a href="portfolio.php?lang=en"><img class="english flag" src="Images/english.png" alt="union jack" title="english"/></a>
                    
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
                <div class="portfolio_box">
                    <img src="Images/info7.jpg" alt ="" title="">
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit leo nisi. Nullam eget interdum massa, et auctor diam. Suspendisse quis nisl sit amet enim ultricies ultrices viverra sit amet lorem.</p>
                        <p>#Lorem #Ipsum</p>
                    </div>
                </div>
                <div class="portfolio_box">
                    <img src="Images/info8.jpg" alt ="" title="">
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit leo nisi. Nullam eget interdum massa, et auctor diam. Suspendisse quis nisl sit amet enim ultricies ultrices viverra sit amet lorem.</p>
                        <p>#Lorem #Ipsum</p>
                    </div>
                </div>
                <div class="portfolio_box">
                    <img src="Images/info9.jpg" alt ="" title="">
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit leo nisi. Nullam eget interdum massa, et auctor diam. Suspendisse quis nisl sit amet enim ultricies ultrices viverra sit amet lorem.</p>
                        <p>#Lorem #Ipsum</p>
                    </div>
                </div>
            </div>
        </section>
        
<!--        ------------------------------REFERENCES--------------------------------->
        <section id="references">
            <h3><?php echo _REFERENCES ; ?></h3>
            <div>
                
                <img src="Images/double_arrow.svg" alt="arrow" title="arrow">
                <div>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit leo nisi. Nullam eget interdum massa, et auctor diam. Suspendisse quis nisl sit amet enim ultricies ultrices viverra sit amet lorem."</p>
                    <p>Bob G. Inventé, <span><?php echo "PDG " . _A . " Famous Company";?></span></p>
                </div>
                <img src="Images/double_arrow.svg" alt="arrow" title="arrow">

                </div>    
            
        </section>
        
<!--        --------------------------CONTACT------------------------------------->
        <section id="contact">
            <h3><?php echo _ME_CONTACTER; ?></h3>
            <div>
                <div>
                    <h4><?php echo _LAISSEZ_MESSAGE ; ?></h4>
<!--                    formulaire.txt à changer -->

                    <form action="contact.php" method="post" >
                        <input type="text" name ="name" id="name" placeholder="<?php echo _NOM ; ?>"/>
                        <input type="email" name = "email" id="email" placeholder="<?php echo _MAIL ; ?>"/>
                        <input type="text" name = "organisation" id="organisation" placeholder="<?php echo _ORGANISATION ; ?>"/>
                        <input type="tel" name = "phone" id="phone" placeholder="<?php echo _TELEPHONE ; ?>"/>
                        <textarea name ="message" id="message" placeholder="<?php echo _MESSAGE_PLACEHOLDER ; ?>"></textarea>
                        <button type="submit" value="envoyer"><?php echo _ENVOYER; ?></button>
                    </form>
                </div>
                <div>
                    <h4><?php echo _CONTACT_DIRECT ; ?></h4>
                    <ul>
                        <li class="pin_icon">17 Boulevard Voltaire - 35000 Rennes</li>
                        <li class="phone_icon">+33 6 11 20 74 68</li>
                        <li class="mail_icon">adamdupuis@laposte.net</li>
                        <li class= "linkedin_icon"><a href="https://www.linkedin.com/in/adam-dupuis/" target="_blank" >Linkedin</a></li>
                        <li class="web_icon"><?php echo _WEB_SITE; ?></li>
                    </ul>
                </div>
            </div>
        </section>
        
<!--        -------------------------------FOOTER---------------------------------->
        <footer>
            <p>&copy; Adam DUPUIS - 2019</p>
        </footer>
    </body>
        
        

