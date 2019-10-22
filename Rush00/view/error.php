<?php
    require "menu.php";

    function user_is_ban()
     {?>
        <div class="container_pannel">
            <div>
                <p class="error">Accès refusé</p>
            </div>
        </div>
    <?php } ?>

<?php

    function user_not_found()
    {
       ?>
        <div class="container_pannel">
            <div>
                <p class="error">Login ou/et mot de passe incorrect</p>
            </div>
        </div>
    <?php } ?>

<?php

    function user_already_taken()
    {
       ?>
        <div class="container_pannel">
            <div>
                <p class="error">Le nom d'utilisateur est déjà pris !</p>
            </div>
        </div>
    <?php } ?>


<?php

    function user_information_missing()
    {
       ?>
        <div class="container_pannel">
            <div>
                <p class="error">Vous devez remplir tous les champs !</p>
            </div>
        </div>
    <?php } ?>