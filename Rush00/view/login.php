<?php 
    require_once 'menu.php';
?>
    <div class="container">
        <div class="forms">
            <form action="/model/action_login.php" method="POST">
                <input type="text" name="login" placeholder="login">
                <input type="password" name="passwd" placeholder="password">
                <input type="submit" name="submit" value="Login">
            </form> 
            <div class="button_container" >
                <a class="button_in_form" href="create.php">create account</a>
            </div>
        </div>
    </div>
</body> 
</html>