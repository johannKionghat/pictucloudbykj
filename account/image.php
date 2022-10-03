<?php
require('../src/connexion.php');
session_start();
$prenom=$_SESSION['prenom'];
$nom=$_SESSION['nom'];
$key_users=$_SESSION['key'];
?>
<!-- /***************************************************************************************************************** */
/********************************************************************************************************************** */ -->
  
<?php
    if (!empty($_SESSION['connect'])){
        require('../header.html');
?>
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
        <section>
        <?php echo'<div id="topbar"><h1>Choisisser une image et appuyer sur envoyer pour la sauvegarder </h1></div>'; ?>
        <?php if (isset($_GET['error'])){
                    if($_GET['error']==1){
                        echo'<div class="message"><div class ="error">Image deja enregistrer</div></div>';
                    }else if($_GET['error']==2){
                        echo'<div class="message"><div class ="error">Error mauvaise extension du fichier </div></div>';
                    }else if($_GET['error']==3){
                        echo'<div class="message"><div class="error">Error fichier trop lourd</div></div>';
                    }
                }
                else if(isset($_GET['succes'])){
                    if($_GET['succes']==1){
                        echo'<div class="message"><div class="succes">Image sauvegarder avec succes !</div></div>';
                    }
                } ?>
        <div id=form >
                <form method ="post" action ="image.php" enctype="multipart/form-data">
                    <fieldset><h3>Enregister une image</h3></fieldset>
                        <table>
                            <tr>
                                <td class="label" style="background-color:white;">Image :</td>
                                <td style="background-color:white;"><input type="file" name="image" placeholder="selectionner une image"></td>
                            </tr>
                        </table><br/>
                        <button type="submit">Enregister</button>        
               </form>
            </div>
            <?php
                    if(!empty($_FILES['image']) && $_FILES['image']['error'] == 0){

                        if($_FILES['image']['size'] <= 3000000){
                        $infoImage = pathinfo($_FILES['image']['name']);
                        $imageName=$_FILES['image']['name'];
                        $extendImage = $infoImage['extension'];
                        $extendArray = array('png','gif','jpg','jpeg','jfif');
                            if (in_array($extendImage,$extendArray))
                            {       
                                
                                $imageName=$key_users.$imageName;
                                $destination='../uploads/'.$imageName;
                                move_uploaded_file($_FILES['image']['tmp_name'],$destination);
                                $req=$db->prepare("SELECT count(*) as imageVerif from image where photo=?");
                                $req->execute(array($imageName)) or die("erreur de verification :".print_r($db->errorInfo()));
                                    while($imageVerif = $req->fetch())
                                    {
                                        
                                        if($imageVerif['imageVerif'] == 0){
                                            $req=$db->prepare("INSERT into image (photo) values ('$imageName')");
                                            $req->execute() or die("erreur d'insertion :".print_r($db->errorInfo()));
                                            header("location:  http://localhost/pictucloudbykj/account/image.php?succes=1");
                                           
                                            }else{
                                                header("location:  http://localhost/pictucloudbykj/account/image.php?error=1");
                                            }
                                            
                                    }
                                }else{
                                        header("location:  http://localhost/pictucloudbykj/account/image.php?error=2");
                                }
                            }else{
                                header("location:  http://localhost/pictucloudbykj/account/image.php?error=3");
                            }
                        }
                        $req=$db->prepare("SELECT photo as sauv from image where photo like '%$key_users%' ");
                        $req->execute() or die("erreur de selection :".print_r($db->errorInfo()));
                        echo'<div id="flexImage">';
                        while($imageSauv=$req->fetch()){
                                echo '<div class="gallery"><a href="http://localhost/pictucloudbykj/uploads/'.$imageSauv["sauv"].'"><img id="imgSauv" src="http://localhost/pictucloudbykj/uploads/'.$imageSauv["sauv"].'"></a></div>';
                            }
                        echo '</div>';
                        ?>
                </section>
                <div id="off"><button id="disconnect"><a id="adeconnection" href="http://localhost/pictucloudbykj/disconnect.php">Deconnexion</a></button></div>';<?php
        require('../footer.html');
        }else{
            header('location: http://localhost/pictucloudbykj/index.php');
        }

?>

        