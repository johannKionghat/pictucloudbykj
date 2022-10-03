<?php
require('src/connexion.php');
session_start();
if (!empty($_POST['email']) && !empty($_POST['password'])){

        $email=$_POST['email'];
        $password=$_POST['password'];

        $password= "jkg".sha1($password."3543")."34";

        $req= $db->prepare("SELECT count(*) as dbmail  from users where email=?");
        $req->execute(array($email));
        while($email_verif = $req->fetch()){
            if($email_verif['dbmail'] != 0){
                $req= $db->prepare("SELECT *  from users where email=?");
                $req->execute(array($email));
                while($user = $req->fetch()){
                    if($password == $user['password']){
                        $_SESSION['connect']=1;
                        $_SESSION['prenom']=$user['prenom'];
                        $_SESSION['nom']=$user['nom'];
                        $_SESSION['key']=$user['key_users'];                        
                        header('location: http://localhost/pictucloudbykj/account/acceuil.php/?succes=1;');
                    }else{
                        header('location: http://localhost/pictucloudbykj/index.php/?error=1');
                    }
                }
            }else{
                header('location: http://localhost/pictucloudbykj/index.php/?error=2');
            }
        }
        
    }
?>

    
            <?php
            require('header.html');
            if (isset($_GET['error'])){
                if($_GET['error']==2){
                    echo"<div class='message'><div class='error'>Adresse email non existante</div></div>";
                }else if($_GET['error']==1){
                    echo"<div class='message'><div class='error'>Mot de passe incorrect</div></div>";
                }
            }
            ?>
            <div class ="contener" style="height:700px;">
                <div id="form">
                    <form action="index.php" method ="post">
                        <fieldset><h3>Se connecter</h3><h2>Vous avez pas de compte ? Cree le <a href="http://localhost/pictucloudbykj/connexion.php"><div id="button">ici !</div></a> </h2></fieldset>
                        <table>
                        <tr>
                            <tr>
                                <td class="label" style="background-color:white;">E-mail :</td>
                                <td style="background-color:white;"><input type="email" name="email" placeholder="Entrer votre email"></td>
                            </tr>
                            <tr>
                                <td class="label" style="background-color:white;">Mot de passe :</td>
                                <td style="background-color:white;" ><input type="password" name="password" placeholder="Entrer un mot de passe" required></td>
                            </tr>
                        </table>
                        <br/>
                        <button type="submit">Connexion</button>
                        <fieldset></fieldset>
                    </form>
                </div>
            </div>
            <?php
            require('footer.html')
            ?>
   