<?php
    require_once 'menu.php';
?>
    <div class="container">
        <div class="forms">
            <form action="/model/action_modif.php" method="POST">
            <?php if (!$_SESSION['loggued_on_user']): ?>
                <input type="text" name="login" placeholder="login">
                <br />
            <?php endif;?>
                <input type="password" name="oldpw" placeholder="password">
                <br />
                <input type="password" name="newpw" placeholder="new password">
                <br />
                <input type="submit" name="submit" value="Editer">
            </form>
        </div>
    </div>
</body>
</html>