<?php
    session_start();
    if ($_SESSION['loggued_on_user'] !== "admin")
        header("Location: ../view/access_denied.php");
    require_once 'menu.php';
?>
<div class="container">
    <div class="forms">
            <h3>EDIT ARTICLES</h3>
            <form action="../model/action_edit_articles.php" method="POST">
                <input type="text" name="old_ref" style="display: none;" value="<?php echo $_POST['ref']?>">
                <label>Nom de l'article:</label>
                <input type="text" name="ref" placeholder="nom" value="<?php echo $_POST['ref']?>">
                <label>Categorie</label>
                <input type="text" name="category" placeholder="categorie" value="<?php echo $_POST['category']?>">
                <label>Prix</label>
                <input type="number" name="price" placerholder="prix" value="<?php echo $_POST['price']?>">
                <label>Quantité</label>
                <input type="number" name="stock" placeholder="quantité" value="<?php echo $_POST['stock']?>">
                <label>42-login</label>
                <input type="text" name="42-login" placeholder="42-login" value="<?php echo $_POST['img']?>">
                <input type="submit" name="submit">
            </form>
        </div>
</div>