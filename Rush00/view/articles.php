<?php 
    session_start();
    if ($_SESSION['loggued_on_user'] !== "admin")
    {
        header("Location: ../view/access_denied.php");
    }
    require_once 'menu.php';
    require_once '../model/display_articles.php';
?>
<div class="container_pannel">
    <div class="display_articles">
        <h3>ADMIN ARTICLES</h3>
        <?php 
            display_articles();
        ?>
    </div>
    <div class="forms">
        <h3>ADD ARTICLES</h3>
        <form action="/model/action_add_article.php" method="POST">
            <label>Nom de l'article:</label>
            <input type="text" name="ref" placeholder="nom">
            <label>Categorie</label>
            <input type="text" name="category" placeholder="categorie">
            <label>Prix</label>
            <input type="number" name="price" placerholder="prix">
            <label>Quantité</label>
            <input type="number" name="stock" placeholder="quantité">
            <label>42-login</label>
            <input type="text" name="42-login" placeholder="42-login">
            <input type="submit" name="submit">
        </form>
    </div>
</div>
</body>
</html>
