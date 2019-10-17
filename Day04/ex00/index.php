<?php
    session_start();
    if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit'])) {
        if ($_GET['submit'] == 'OK') {
            $_SESSION['login'] = $_GET['login'];
            $_SESSION['passwd'] = $_GET['passwd'];
        }
    }
?>

<!DOCTYPE html>
<html><body>
    <form action="index.php" method="get">
        <?php echo 'Identifiant: '?><input type="text" name="login" value="<?php echo $_SESSION['login']?>">
        <br />
        <?php echo 'Mot de passe: '?><input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>">
        <button type="submit" name="submit" value="OK"></button>
    </form>    
</body></html>