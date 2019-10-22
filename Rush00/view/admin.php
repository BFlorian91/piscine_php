<?php 
    session_start();
    if ($_SESSION['loggued_on_user'] !== "admin")
        header("Location: ../view/access_denied.php");
    require_once 'menu.php';
?>
    <h3>Admin Panel</h3>
        <div class="button_center">
            <a class="button_in_form" href="/view/articles.php">Articles</a>
            <a class="button_in_form" href="/view/users.php">Utilisateurs</a>
        </div>
</body>
</html>