<?php

session_start();
session_unset();
session_destroy();

?>

    <?php
        require('header.html');?>
        <header id="header2"><h1 style="font-size:45px; color:red;">...</h1></header>
        <section id= end>   
        <div class="contener">
            <div class="succes">Deconnexion effectuer avec succes !</p><br/><br/>
            <button id="disconnect"><a href="http://localhost/pictucloudbykj">Quitter</a></button>
        </div>
        </div>
        </section>
        </body>
        <?php
            require('footer.html')
            ?>
    </html>