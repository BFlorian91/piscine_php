<?php
    require_once 'menu.php';
?>
    <div class="container">
        <div class="forms">
            <form action="/model/action_create.php" method="POST">
                <input type="text" name="login" placeholder="login">
                <input type="password" name="passwd" placeholder="password">
                <input type="submit" name="submit" value="Créer">
            </form>
        </div>
    </div>
</body>
</html>
