<?php
require('../src/connexion.php');
session_start();
?>
<?php
            if (!empty($_SESSION['connect'])){
                require('../header.html');?>
            <div id="nav">
                    <div class="menu">
                        <div class="list"><a href="http://localhost/pictucloudbykj/account/acceuil.php"><p class="nav" >Accueil</p></a></div>
                        <div class="list"><a href="http://localhost/pictucloudbykj/account/image.php"><p  class="nav" >Media</p></a></div>
                        <div class="list"><a href="http://localhost/pictucloudbykj/account/contact.php?affichage=1"><p  class="nav">Contact</p></a></div>
                    </div>
                    <div class="menu2">
                        <div class="list2"><a href="http://localhost/pictucloudbykj/account/acceuil.php"><img class="logo" src="http://localhost/pictucloudbykj/images/acceuil2.png" > </a></div>
                        <div class="list2"><a href="http://localhost/pictucloudbykj/account/image.php"><img class="logo"src="http://localhost/pictucloudbykj/images/media2.png" ></a></div>
                        <div class="list2"><a href="http://localhost/pictucloudbykj/account/contact.php?affichage=1"><img class="logo"src="http://localhost/pictucloudbykj/images/contact3.png" > <br/></a></div>

                    </div>
                    </div>
                    <div style="clear:both"></div>


<style>
body {font-family: Verdana, sans-serif;}
.mySlides {text-align:center;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  text-align:center;
}

/* Caption text */
.text {

  color: #f2f2f2;
  font-size: 15px;
  width: 70%;
  height:400px;
  margin-left:-88%;
  margin-top:-100px;
  float:;
  background-color:rgba(0,0,0,0.7);
  text-align: center;
  display:inline-block;
  padding:30px;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
 background-color:rgb(23, 60, 62);;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */

</style>

                    <section>
                            <div class="slideshow-container">

                                <div class="mySlides fade">
                                    <img src="http://localhost/pictucloudbykj/images/slider (1).jpg" style="width:100%; height:650px;" >
                                    <div class="text">
                                      <h2>Bienvenue dans PictuCloud Votre Hebergeur d'image ainsi que votre Gestionaire de contact</h2>
                                      <h3>PictuCloud gere le stockage d'image et la securite y est garantie !</h3>
                                      <img src="http://localhost/pictucloudbykj/images/pictucloud.png" style="width:400px; height:300px;">
                                  </div>
                                </div>

                                <div class="mySlides fade">
                                    <img src="http://localhost/pictucloudbykj/images/slider (2).jpg"  style="width:100%; height:650px;">
                                    <div class="text">
                                      <h2>Grace a PictuCloud la creation, l'enregistrement, et la gestion de vos contacts est assurer </h2>
                                      <h3>En cas de perte de vos contacts et bien retrouvez les dans PictuCloud  </h3>
                                      <img src="http://localhost/pictucloudbykj/images/pictucloud.png" style="width:400px; height:300px;">
                                    </div>
                                </div>

                                <div class="mySlides fade">
                                    <img src="http://localhost/pictucloudbykj/images/slider (3).jpg"  style="width:100%; height:650px;">
                                    <div class="text">
                                     <h2>100% de rapiditer et d'efficaciter au rendez-vous </h2>
                                      <h3>Cree et concu de A a Z par le Webmaster Disigner Johann KIONGHAT etudiant en 1ere annee.</h3>
                                      <img src="http://localhost/pictucloudbykj/images/pictucloud.png" style="width:400px; height:300px;">
                                    </div>
                                </div>
                                <div class="mySlides fade">
                                    <img src="http://localhost/pictucloudbykj/images/slider (4).jpg" style="width:100%; height:650px;" >
                                    <div class="text">
                                      <h2>Bienvenue dans PictuCloud Votre Hebergeur d'image ainsi que votre Gestionaire de contact</h2>
                                      <h3>PictuCloud gere le stockage d'image et la securite y est garantie !</h3>
                                      <img src="http://localhost/pictucloudbykj/images/pictucloud.png" style="width:400px; height:300px;">
                                  </div>
                                </div>

                                <div class="mySlides fade">
                                    <img src="http://localhost/pictucloudbykj/images/slider (5).jpg"  style="width:100%; height:650px;">
                                    <div class="text">
                                      <h2>Grace a PictuCloud la creation, l'enregistrement, et la gestion de vos contacts est assurer </h2>
                                      <h3>En cas de perte de vos contacts et bien retrouvez les dans PictuCloud  </h3>
                                      <img src="http://localhost/pictucloudbykj/images/pictucloud.png" style="width:400px; height:300px;">
                                    </div>
                                  </div>

                               
                            <br>

                            <div style="text-align:center">
                                <span class="dot"></span> 
                                <span class="dot"></span> 
                                <span class="dot"></span>
                                <span class="dot"></span> 
                                <span class="dot"></span> 
                             
                                
                            </div>
                            </div>

                            <script>

                                var slideIndex = 0;
                                showSlides();

                                function showSlides() {
                                        var i;
                                        var slides = document.getElementsByClassName("mySlides");
                                        var dots = document.getElementsByClassName("dot");
                                        for (i = 0; i < slides.length; i++) {
                                        slides[i].style.display = "none";  
                                        }
                                        slideIndex++;
                                        if (slideIndex > slides.length) {slideIndex = 1}    
                                        for (i = 0; i < dots.length; i++) {
                                            dots[i].className = dots[i].className.replace(" active", "");
                                        }
                                        slides[slideIndex-1].style.display = "block";  
                                        dots[slideIndex-1].className += " active";
                                        setTimeout(showSlides, 5000);
                                    }
                            </script>
                    </section>
                    <div id="off"><button id="disconnect"><a id="adeconnection" href="http://localhost/pictucloudbykj/disconnect.php">Deconnexion</a></button></div><?php
            require('../footer.html');
            }else{
                header('location: http://localhost/pictucloudbykj/index.php');
            }
        
?>