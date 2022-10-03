<?php

require('src/connexion.php');
if(!empty($_POST['nom']) && !empty($_POST['prenom']) &&!empty($_POST['tel']) &&!empty($_POST['whatsapp']) && !empty($_POST['email']) && !empty($_POST['adresse'])  && !empty($_POST['password']) && !empty($_POST['password2'])){
  
    $nom        =   $_POST['nom'];
    $prenom     =   $_POST['prenom'];
    $tel        =   $_POST['tel'];
    $whatsapp   =   $_POST['whatsapp'];
    $email      =   $_POST['email'];
    $adresse    =   $_POST['adresse'];
    $password   =   $_POST['password'];
    $password2  =   $_POST['password2'];
    $key_users  =md5(sha1(rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000).rand(0,10000000000000000)));
    if ($password != $password2){
        header('location: http://localhost/pictucloudbykj/connexion.php?error=4');
    }else{
        $req = $db->prepare("SELECT count(*) as numberEmail From users Where email =?");
        $req->execute(array($email));
        while($email_verif = $req->fetch()){
            if($email_verif['numberEmail'] != 0){
                header('location: ../Espace_membre/?error=1');
            }else{
                $req = $db->prepare("SELECT count(*) as numberwhatsapp From users Where whatsapp =?");
                $req->execute(array($whatsapp));
                while($whatsapp_verif = $req->fetch()){
                   
                        $req = $db->prepare("SELECT count(*) as numbertel From users Where tel =?");
                        $req->execute(array($tel));
                        while($tel_verif = $req->fetch()){
                          
                                $password= "jkg".sha1($password."3543")."34";
                            
                                $req= $db->prepare('INSERT into Users (nom,prenom,tel,whatsapp,email,adresse,password,key_users) values (?,?,?,?,?,?,?,?)');
                                $req->execute(array($nom,$prenom,$tel,$whatsapp,$email,$adresse,$password,$key_users));
                            
                                header('location: http://localhost/pictucloudbykj/connexion.php?succes=1');
                            
                
                        }
                    
                }
            }
        }
    }
}
?>
            <?php
            require('header.html')
            ?>
                 <?php
                    if (isset($_GET['error'])){
                        if($_GET['error']==1){
                            echo"<div class='message'><div class='error'>Adresse email deja prise</div></div>";
                        }else if($_GET['error']==2){
                            echo"<div class='message'><div class='error'>Numero de telephone deja pris</div></div>";
                        }else if($_GET['error']==3){
                            echo"<div class='message'><div class='error'>Numero de Whatsapp deja pris</div></div>";
                        }else if($_GET['error']==4){
                            echo"<div class='message'><div class='error'>erreur mot de passe different</div></div>";
                        }  
                    }else if (isset($_GET['succes'])){
                        if ($_GET['succes']==1){
                            echo"<div class='message'><div class='succes'>Compte cree avec succes<br/>A present connectez-vous !</div></div>";
                        }
                    }
                ?>
                <div class="contener">
                <div id="form">
                    <form action="connexion.php" method ="post">
                    <fieldset><h3>Cree un compte </h3><br/><h2>Avez-vous deja cree un compte ? <a href="index.php"><div id="button" >connectez-vous !</div></a> </h2></fieldset>
                        <table>
                            <tr>
                                <td class="label" style="background-color:white;">Nom :</td>
                                <td style="background-color:white;"><input type="text" name="nom" placeholder="Entrer votre nom" required></td>
                            </tr>
                            <tr>
                                <td class="label"style="background-color:white;">Prenom :</td>
                                <td style="background-color:white;"><input type="text" name="prenom" placeholder="Entrer votre prenom" required></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">Tel :</td>
                                <td style="background-color:white;"><input type="tel" name="tel" placeholder="Entrer votre numero" required></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">Whatsapp :</td>
                                <td style="background-color:white;"><input type="tel" name="whatsapp" placeholder="Entrer votre whatsapp"></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">E-mail :</td>
                                <td style="background-color:white;"><input type="email" name="email" placeholder="Entrer votre email"></td>
                            </tr>
                            <tr>
                                <td class="label"style="background-color:white;">Adresse :</td>
                                <td style="background-color:white;"><input type="text" name="adresse" placeholder="Entrer votre adresse" required></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">Mot de passe :</td>
                                <td style="background-color:white;" ><input type="password" name="password" placeholder="Entrer on mot passe" required></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">Retappez le mot de passe :</td>
                                <td style="background-color:white;" ><input type="password" name="password2" placeholder="Retapper le mot de passe" required></td>
                            </tr>
                        </table>
                        <br/>
                        <button type="submit">Cree</button>
                        <fieldset></fieldset>
                    </form>
                </div>
                </div>
            <?php
            require('footer.html')
            ?>
    </body>

</html>