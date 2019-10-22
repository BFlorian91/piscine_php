<?php
    require_once 'menu.php';
?>
<body>
    <p class="total">Ce compte avait deja un panier contenant des articles, voulez-vous y ajouter le panier actuel ?</p>
    <div class="button_center">
   	    <form action="/model/action_merge_basket.php" method="POST">
            <input name="submit" value="OUI" type="submit"/>
            <input name="submit" value="NON" type="submit"/>
   	    </form> 
    </div>
</body>
</html>