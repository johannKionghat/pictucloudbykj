<?php
require('../src/connexion.php');
session_start();
$prenom=$_SESSION['prenom'];
$nom=$_SESSION['nom'];
$key_users=$_SESSION['key'];


?>
<?php
if (!empty($_SESSION['connect'])){
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * *********************************************  Image profil dans fichier profil ************************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */

if(!empty($_FILES['image']) && $_FILES['image']['error'] == 0){

        if($_FILES['image']['size'] <= 3000000){
        $infoImage = pathinfo($_FILES['image']['name']);
        $imageName=$_FILES['image']['name'];
        $extendImage = $infoImage['extension'];
        $extendArray = array('png','gif','jpg','jpeg','jfif');
                if (in_array($extendImage,$extendArray))
                {       
                    
                        $imageName=$key_users.$imageName;
                        $destination='../profil/'.$imageName;
                        move_uploaded_file($_FILES['image']['tmp_name'],$destination);
                        $req=$db->prepare("SELECT count(*) as imageVerif from users where profil=? && key_users like '$key_users'");
                        $req->execute(array($imageName)) or die("erreur de verification :".print_r($db->errorInfo()));
                        while($imageVerif = $req->fetch())
                        {
                            
                            if($imageVerif['imageVerif'] == 0){
                                $req=$db->prepare("UPDATE users SET profil='$imageName' where key_users='$key_users'") ;
                                $req->execute() or die("erreur d'insertion :".print_r($db->errorInfo()));
                                header("location:  http://localhost/pictucloudbykj/account/contact.php?modifier=1&&succes=1");
                            
                                }else{
                                    header("location:  http://localhost/pictucloudbykj/account/contact.php?modifier=1&&error=1");
                                }
                                
                        }
                }else{
                        header("location:  http://localhost/pictucloudbykj/account/contact.php?error=2");
                }
        }else{
            header("location:  http://localhost/pictucloudbykj/account/contact.php?error=3");
        }
}
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * ********************************************** image profil des contacts dans profil_contact***********************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */



            
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  en tete de la page contact  --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
    <head>
        <title>PictuCloud</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://localhost/pictucloudbykj/design/contact.css">
    </head>

    <body>
    <header>
        <div id="icon" ></div>
        <div id ="icon2"></div>
        <div id="headerTitle"><h1>Pictucloud</h1></div>
    </header>
<!------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  menu universelle  --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

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
            <!------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  corps de la page debut section --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

<section >
<!------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  afficage du profil a gauche  --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="profil">
    <?php 
    $req=$db->prepare("SELECT * from users where key_users like '$key_users' ");
    $req->execute();
    while($myProfil=$req->fetch())
    {
        echo '
        
          
        <a href="http://localhost/pictucloudbykj/account/contact.php?affichage=1">
        <div id="divprofilleft">
            <img id="imgprofil"  src="http://localhost/pictucloudbykj/profil/'.$myProfil['profil'].'">
           '.$myProfil['nom'].' '.$myProfil['prenom'].'
        </div></a>
         
        <div style="clear:both"></div>
        ';
    }?>
</div>
<div style="clear:both"></div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  affichage des contacts a gauche  --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="left_bar_contact">
    <div id="search">
    
    </div> 
    <div id="listContact">
        <?php 
        $req=$db->prepare("SELECT * from contact where ref like '%$key_users%' ORDER BY nom ");
        $req->execute();
        while($myContactleft=$req->fetch())
        {
            echo '
            <a href="http://localhost/pictucloudbykj/account/contact.php?affichage=2&&id='.$myContactleft['key_contact'].'">
            <div id="divcontactleft">
                    <img id="imgcontactleft"  src="http://localhost/pictucloudbykj/profil_contact/'.$myContactleft['profil'].'">
                    '.$myContactleft['nom'].' '.$myContactleft['prenom'].'
        
                </div>
            </a><div style= "clear:both;"></div>
            ';
        }?>
    </div>
        
</div>
<div style="clear:both"></div>
                                <!------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------  bar de creation de nouveau contact  --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                <div id ="newcontact">
                                    <a href="http://localhost/pictucloudbykj/account/contact.php?cree=1"><button id="buttonnew"> New </button></a>
                                </div>
                                <div style="clear:both"></div>
<!------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------      secteur droit  debut      --------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                <div class="right_bar_contact">
                                    <?php
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * ********************************************** modifier la photo profil  ***********************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */
if (isset($_GET['modifier'])){
    if($_GET['modifier']==1)
    {
        echo'<div id="topbar"><h1>Modification du profil utilisateur</h1></div>';

            if (isset($_GET['error'])){
                if($_GET['error']==1){
                    echo'<div class="message"><div class ="error">profil deja enregistrer</div></div>';
                }else if($_GET['error']==2){
                    echo'<div class="message"><div class ="error">Error mauvaise extension du fichier </div></div>';
                }else if($_GET['error']==3){
                    echo'<div class="message"><div class="error">Error fichier trop lourd</div></div>';
                }
            }
            else if(isset($_GET['succes'])){
                if($_GET['succes']==1){
                    echo'<div class="message"><div class="succes">profil sauvegarder avec succes !</div></div>';
                }
            }
        echo' 
        
                <form method ="post" action ="contact.php?modifier=1" enctype="multipart/form-data">
                    <fieldset><h3>Modifier la photo profil</h3></fieldset>
                        <table id="tablechangeprofil">
                            <tr>
                                <td id="tdchangeprofil" class="label" style="background-color:white;">Photo profil :</td>
                                <td id="tdchangeprofil" style="background-color:white;"><input type="file" name="image" placeholder="selectionner une image"></td>
                            </tr>
                        </table>
                        <div id ="button"><button type="submit">Modifier</button></div>          
                </form>
        ';
                        if (!empty($_POST['changetelprofil'])){
                            $changetelprofil            =$_POST['changetelprofil'];
                            $req=$db->prepare("UPDATE users SET tel='$changetelprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changenomprofil'])){
                            $changenomprofil            =$_POST['changenomprofil'];
                            $req=$db->prepare("UPDATE users SET nom='$changenomprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changeprenomprofil'])){
                            $changeprenomprofil         =$_POST['changeprenomprofil'];
                            $req=$db->prepare("UPDATE users SET prenom='$changeprenomprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changewhatsappprofil'])){
                            $changewhatsappprofil       =$_POST['changewhatsappprofil'];
                            $req=$db->prepare("UPDATE users SET whatsapp='$changewhatsappprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changeemailprofil'])){
                            $changeemailprofil          =$_POST['changeemailprofil'];
                            $req=$db->prepare("UPDATE users SET email='$changeemailprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changeadresseprofil'])){
                            $changeadresseprofil        =$_POST['changeadresseprofil'];
                            $req=$db->prepare("UPDATE users SET adresse='$changeadresseprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changeprofessionprofil'])){
                            $changeprofessionprofil     =$_POST['changeprofessionprofil'];
                            $req=$db->prepare("UPDATE users SET profession='$changeprofessionprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changenaissanceprofil'])){
                            $changenaissanceprofil      =$_POST['changenaissanceprofil'];
                            $req=$db->prepare("UPDATE users SET date_naissance='$changenaissanceprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changenationaliteprofil'])){
                            $changenationaliteprofil    =$_POST['changenationaliteprofil'];
                            $req=$db->prepare("UPDATE users SET nationalite='$changenationaliteprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
                        if(!empty($_POST['changetypeprofil'])){
                            $changetypeprofil           =$_POST['changetypeprofil'];
                            $req=$db->prepare("UPDATE users SET type='$changetypeprofil'");
                            $req->execute() or die(print_r($db->errorInfo()));
                        }
        $req=$db->prepare("SELECT * from users where key_users like '$key_users' ");
        $req->execute();
        while($myProfil=$req->fetch())
        {
            echo '
            <form method="post" action="contact.php?modifier=1">
                <table id ="tableaffichage">
                    <tr id ="traffichage">
                        <td id="tdaffichage">Nom : '.$myProfil['nom'].'<input type="text" name="changenomprofil"></td>
                        <td id="tdaffichage">Prenom : '.$myProfil['prenom'].'<input type="text" name="changeprenomprofil"></td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">Numero Tel : '.$myProfil['tel'].'<input type="text" name="changetelprofil"></td>
                        <td id="tdaffichage">Numero WhatsApp : '.$myProfil['whatsapp'].'<input type="text" name="changewhatsappprofil"></td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">email: '.$myProfil['email'].'<input type="text" name="changeemailprofil"></td>
                        <td id="tdaffichage">Adresse de residence : '.$myProfil['adresse'].'<input type="text" name="changeadresseprofil"></td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">Proffession : '.$myProfil['profession'].'<input type="text" name="changeprofessionprofil"></td>
                        <td id="tdaffichage">Date de naissance : '.$myProfil['date_naissance'].'<input type="date" name="changenaissanceprofil"></td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">Nationalite: '.$myProfil['nationalite'].'<input type="text" name="changenationaliteprofil"></td>
                        <td id="tdaffichage">Type du contact : '.$myProfil['type'].'<input type="text" name="changetypeprofil"></td>
                    </tr>';
            }echo '</table><br/>
            <button id ="buttonmodifier" type="submit"> Sauvegarder la modification </button>
            </form>';

    }
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * ********************************************** modifier la photo  contact ***********************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */
    else if($_GET['modifier']==2)
    {
        if (isset($_GET['id'])){

            $key_contact=$_GET['id'];
            if (isset($_GET['main'])){
                echo'<div id="topbar"><h1>Modification du profil du contact</h1></div>';

                if(!empty($_FILES['profil_contact']) && $_FILES['profil_contact']['error'] == 0){

                    if($_FILES['profil_contact']['size'] <= 3400000){
                    $infoImage = pathinfo($_FILES['profil_contact']['name']);
                    $imageName=$_FILES['profil_contact']['name'];
                    $extendImage = $infoImage['extension'];
                    $extendArray = array('png','gif','jpg','jpeg','jfif');
                        if (in_array($extendImage,$extendArray))
                                  {   
                                $imageName=$key_users.$imageName;
                                $destination='../profil_contact/'.$imageName;
                                move_uploaded_file($_FILES['profil_contact']['tmp_name'],$destination);
                                    $req=$db->prepare("UPDATE contact SET profil='$imageName' where ref like '%$key_contact%'") ;
                                    $req->execute() or die("erreur d'insertion :".print_r($db->errorInfo()));
                                    echo'<div class="message"><div class="succes">profil sauvegarder avec succes !</div></div>';                                
                                    }else{
                                        echo'<div class="message"><div class ="error">Error mauvaise extension du fichier </div></div>';                                    }
                            }else{
                                echo'<div class="message"><div class="error">Error fichier trop lourd</div></div>';
                            }
                }

                
                echo' 
                
                        <form method ="post" action ="contact.php?modifier=2&&id='.$key_contact.'&&main=none" enctype="multipart/form-data">
                            <fieldset><h3>Modifier la photo du contact</h3></fieldset>
                                <table id="tablechangeprofil">
                                    <tr>
                                        <td id="tdchangeprofil" class="label" style="background-color:white;">Photo contact :</td>
                                        <td id="tdchangeprofil" style="background-color:white;"><input type="file" name="profil_contact" placeholder="selectionner une image"></td>
                                    </tr>
                                </table>
                                <div id ="button"><button type="submit">Modifier</button></div>          
                        </form>
                ';

                if (!empty($_POST['changetelcontact'])){
                    $changetelcontact            =$_POST['changetelcontact'];
                    $req=$db->prepare("UPDATE contact SET tel='$changetelcontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changenomcontact'])){
                    $changenomcontact            =$_POST['changenomcontact'];
                    $req=$db->prepare("UPDATE contact SET nom='$changenomcontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changeprenomcontact'])){
                    $changeprenomcontact         =$_POST['changeprenomcontact'];
                    $req=$db->prepare("UPDATE contact SET prenom='$changeprenomcontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changewhatsappcontact'])){
                    $changewhatsappcontact       =$_POST['changewhatsappcontact'];
                    $req=$db->prepare("UPDATE contact SET whatsapp='$changewhatsappcontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changeemailcontact'])){
                    $changeemailcontact          =$_POST['changeemailcontact'];
                    $req=$db->prepare("UPDATE contact SET email='$changeemailcontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changeadressecontact'])){
                    $changeadressecontact        =$_POST['changeadressecontact'];
                    $req=$db->prepare("UPDATE contact SET adresse='$changeadressecontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changeprofessioncontact'])){
                    $changeprofessioncontact     =$_POST['changeprofessioncontact'];
                    $req=$db->prepare("UPDATE contact SET profession='$changeprofessioncontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changenaissancecontact'])){
                    $changenaissancecontact      =$_POST['changenaissancecontact'];
                    $req=$db->prepare("UPDATE contact SET date_naissance='$changenaissancecontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changenationalitecontact'])){
                    $changenationalitecontact    =$_POST['changenationalitecontact'];
                    $req=$db->prepare("UPDATE contact SET nationalite='$changenationalitecontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                if(!empty($_POST['changetypecontact'])){
                    $changetypecontact           =$_POST['changetypecontact'];
                    $req=$db->prepare("UPDATE contact SET type='$changetypecontact' where key_contact like '$key_contact'");
                    $req->execute() or die(print_r($db->errorInfo()));
                }
                $req=$db->prepare("SELECT * from contact where ref like '%$key_users$key_contact%' ");
                $req->execute();
                while($myContact=$req->fetch())
                {
                    echo '
                    <form method="post" action="contact.php?modifier=2&&id='.$key_contact.'&&main=none">
                        <table id ="tableaffichage">
                            <tr id ="traffichage">
                                <td id="tdaffichage">Nom : '.$myContact['nom'].'<input type="text" name="changenomcontact"></td>
                                <td id="tdaffichage">Prenom : '.$myContact['prenom'].'<input type="text" name="changeprenomcontact"></td>
                            </tr>
                            <tr id ="traffichage">
                                <td id="tdaffichage">Numero Tel : '.$myContact['tel'].'<input type="text" name="changetelcontact"></td>
                                <td id="tdaffichage">Numero WhatsApp : '.$myContact['whatsapp'].'<input type="text" name="changewhatsappcontact"></td>
                            </tr>
                            <tr id ="traffichage">
                                <td id="tdaffichage">email: '.$myContact['email'].'<input type="text" name="changeemailcontact"></td>
                                <td id="tdaffichage">Adresse de residence : '.$myContact['adresse'].'<input type="text" name="changeadressecontact"></td>
                            </tr>
                            <tr id ="traffichage">
                                <td id="tdaffichage">Proffession : '.$myContact['profession'].'<input type="text" name="changeprofessioncontact"></td>
                                <td id="tdaffichage">Date de naissance : '.$myContact['date_naissance'].'<input type="date" name="changenaissancecontact"></td>
                            </tr>
                            <tr id ="traffichage">
                                <td id="tdaffichage">Nationalite: '.$myContact['nationalite'].'<input type="text" name="changenationalitecontact"></td>
                                <td id="tdaffichage">Type du contact : '.$myContact['type'].'<input type="text" name="changetypecontact"></td>
                            </tr>';
                    }echo '</table><br/>
                    <button id ="buttonmodifier" type="submit"> Sauvegarder la modification </button>
                    </form>';
            }
            

        /********************************************************  supprimer le contact ************************************************************************************ */
        if (isset($_GET['sup'])){
            echo'<div id="topbar"><h2> Voulez vous vraiment supprimer ce contact ? </h2></div>';
            if (isset($_GET['conf'])){
              
                $req=$db->prepare("DELETE from contact where key_contact='$key_contact'");
                $req->execute() or die(print_r(errorInfo()));
                echo'<div class="message"><div class="succes">Suppression effectuer avec succes !</div></div>';
            }
            echo'
            <div>
                <a href="http://localhost/pictucloudbykj/account/contact.php?modifier=2&&id='.$key_contact.'&&sup=none&&conf=1"><button id ="buttonsup"> OUI </button></a>
                <a href="http://localhost/pictucloudbykj/account/contact.php?affichage=2&&id='.$key_contact.'"><button id ="buttonsup"> NON </button></a>
            </div>
            ';
        }
        }
    }
}
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * ********************************************** affichage du contact utilisateur ***********************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */
if (isset($_GET['affichage'])){
    if($_GET['affichage']==1){
        $req=$db->prepare("SELECT * from users where key_users like '$key_users' ");
        $req->execute();
        while($myProfil=$req->fetch())
        {
            echo '
                <div id="contactimageaffichage"><img id="imgcontact"  src="http://localhost/pictucloudbykj/profil/'.$myProfil['profil'].'"><br/></div>
                <div id="nomcontact"><h1>'.$myProfil['nom'].' '.$myProfil['prenom'].'</h1></div>
                <table id ="tableaffichage">
                    <tr id ="traffichage">
                        <td id="tdaffichage">Numero Tel : '.$myProfil['tel'].'</td>
                        <td id="tdaffichage">Numero WhatsApp : '.$myProfil['whatsapp'].'</td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">email: '.$myProfil['email'].'</td>
                        <td id="tdaffichage">Adresse de residence : '.$myProfil['adresse'].'</td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">Proffession : '.$myProfil['profession'].'</td>
                        <td id="tdaffichage">Date de naissance : '.$myProfil['date_naissance'].'</td>
                    </tr>
                    <tr id ="traffichage">
                        <td id="tdaffichage">Nationalite: '.$myProfil['nationalite'].'</td>
                        <td id="tdaffichage">Type du contact : '.$myProfil['type'].'</td>
                    </tr>';
            }echo '</table><br/>

            <a href="http://localhost/pictucloudbykj/account/contact.php?modifier=1"><button id ="buttonmodifier"> Modifier le profil</button></a>';
        }
                            /***********************************************************************************************************************************
* **********************************************************************************************************************************
* ********************************************** affichage des contacts  ***********************************************************************************
* **********************************************************************************************************************************
* **********************************************************************************************************************************
*/
    if($_GET['affichage']==2){
        if(isset($_GET['id'])){
            $key_contact=$_GET['id'];
            $req=$db->prepare("SELECT * from contact where ref like '%$key_users$key_contact%' ");
            $req->execute();
            while($myContact=$req->fetch())
            {
                echo '
                <div id="contactaffichageimg1">
                    <div id="contactimageaffichage2"><img id="imgcontact"  src="http://localhost/pictucloudbykj/profil_contact/'.$myContact['profil'].'"><br/></div>
                    <div id="nomcontact"><h1>'.$myContact['nom'].' '.$myContact['prenom'].'</h1></div>
                </div>
                    <table id ="tableaffichage">
                        <tr id ="traffichage">
                            <td id="tdaffichage">Numero Tel : '.$myContact['tel'].'</td>
                            <td id="tdaffichage">Numero WhatsApp : '.$myContact['whatsapp'].'</td>
                        </tr>
                        <tr id ="traffichage">
                            <td id="tdaffichage">email: '.$myContact['email'].'</td>
                            <td id="tdaffichage">Adresse de residence : '.$myContact['adresse'].'</td>
                        </tr>
                        <tr id ="traffichage">
                            <td id="tdaffichage">Proffession : '.$myContact['profession'].'</td>
                            <td id="tdaffichage">Date de naissance : '.$myContact['date_naissance'].'</td>
                        </tr>
                        <tr id ="traffichage">
                            <td id="tdaffichage">Nationalite: '.$myContact['nationalite'].'</td>
                            <td id="tdaffichage">Type du contact : '.$myContact['type'].'</td>
                        </tr>
                        </table><br/>

                <a href="http://localhost/pictucloudbykj/account/contact.php?modifier=2&&id='.$key_contact.'&&main=none"><button> Modifier le contact</button></a>
                <a href="http://localhost/pictucloudbykj/account/contact.php?modifier=2&&id='.$key_contact.'&&sup=none"><button> Supprimer le contact</button></a>';

            }
        }                                    
        
    }
}

                       
/***********************************************************************************************************************************
 * **********************************************************************************************************************************
 * ********************************************** creation des contacts  ***********************************************************************************
 * **********************************************************************************************************************************
 * **********************************************************************************************************************************
 */
if (isset($_GET['cree'])){
    if($_GET['cree']==1){
        echo'<div id="topbar"><h1>Creation du nouveau contact</h1></div>';
 
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['whatsapp']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['type']) && isset($_POST['naissance']) && isset($_POST['profession']) && isset($_POST['nationalite'])){
            $nomContact         =$_POST['nom'];
            $prenomContact      =$_POST['prenom'];
            $telContact         =$_POST['tel'];
            $whatsappContact    =$_POST['whatsapp'];
            $emailContact       =$_POST['email'];
            $adresseContact     =$_POST['adresse'];
            $typeContact        =$_POST['type'];
            $naissanceContact   =$_POST['naissance'];
            $professionContact  =$_POST['profession'];
            $nationaliteContact =$_POST['nationalite'];
            $key_contact='key_contact'.md5(sha1(rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000)));
            $ref='32408097'.$key_users.$key_contact.rand(100000,1).rand(1,100000000);

            $req=$db->prepare("INSERT INTO contact (nom,prenom,tel,whatsapp,email,adresse,type,date_naissance,profession,nationalite,ref,key_contact) values (?,?,?,?,?,?,?,?,?,?,?,?) ");
            $req->execute(array($nomContact,$prenomContact,$telContact,$whatsappContact,$emailContact,$adresseContact,$typeContact,$naissanceContact,$professionContact,$nationaliteContact,$ref,$key_contact));
            
            echo'<div class="message"><div class="succes">Contact cree avec succes !</div></div>';
            
        }

        echo'
        
                <form action="contact.php?cree=1" method ="post">
                <fieldset><h3>Nouveau contact </h3></fieldset>
                    <table>
                        <tr>
                            <td class="label" style="background-color:white;">Nom :</td>
                            <td style="background-color:white;"><input type="text" name="nom" placeholder="Ex : johann" required></td>
                        </tr>
                        <tr>
                            <td class="label">Prenom :</td>
                            <td ><input type="text" name="prenom" placeholder="Ex : guewol" ></td>
                        </tr>
                        <tr>
                            <td class="label" style="background-color:white;">Tel :</td>
                            <td style="background-color:white;"><input type="text" name="tel" placeholder="Ex : +242 06 592 23 38" required></td>
                        </tr>
                        <tr>
                            <td class="label" >Whatsapp :</td>
                            <td ><input type="text" name="whatsapp" placeholder="Ex : +242 06 592 23 38"></td>
                        </tr>
                        <tr>
                            <td class="label" style="background-color:white;">E-mail :</td>
                            <td style="background-color:white;"><input type="email" name="email" placeholder="Ex : johann@gmail.com"></td>
                        </tr>
                        <tr>
                            <td class="label">Adresse :</td>
                            <td ><input type="text" name="adresse" placeholder="Ex: Montpranas,Paris 2, rue Kotmateve" ></td>
                        </tr>
                        <tr>
                            <td class="label" style="background-color:white;">Type :</td>
                            <td style="background-color:white;" ><input type="text" name="type" placeholder="Ex : Famille" ></td>
                        </tr>
                        <tr>
                            <td class="label" >Date de naissance :</td>
                            <td ><input type="date" name="naissance" placeholder="Ex : 06/08/2022" ></td>
                        </tr>
                        <tr>
                            <td class="label" style="background-color:white;">Profession :</td>
                            <td style="background-color:white;" ><input type="text" name="profession" placeholder="Ex : Webmaster" ></td>
                        </tr>
                        <tr>
                            <td class="label" >Nationalite :</td>
                            <td ><input type="text" name="nationalite" placeholder="Ex : congolais" ></td>
                        </tr>
                    </table>
                    <a href="http://localhost/pictucloudbykj/account/contact.php?affichage=2&&id='.$myContactleft['key_users'].'"><div id ="button"><button type="submit">Cree</button></div></a>
                    <fieldset></fieldset>
                </form>
        
        ';
    }
}  
?>
</div>
</div>
</section>
<div style="clear:both;"></div>
<div id="off"><button id="disconnect"><a id="adeconnection" href="http://localhost/pictucloudbykj/disconnect.php">Deconnexion</a></button></div> 
<?php
            require('../footer.html');
            }
            else{
                header('location: http://localhost/pictucloudbykj/index.php');
            }
?>