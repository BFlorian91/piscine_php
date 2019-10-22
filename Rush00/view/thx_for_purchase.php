<?php 
    require_once 'menu.php'
?>
<body>
  <p class="total">Merci Pour votre achat</p>
  <div class="button_center">
     <form action="/model/action_redirect.php" method="POST">
          <input name="submit" value="Revenir à la page d'acceuil" type="submit"/>
     </form> 
  </div>
</body>
</html>