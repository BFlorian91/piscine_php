<?php
    session_start();
    

    function price_counter($basket)
    {
        $price = 0;
        foreach ($basket as $elem) 
            $price = $price + $elem['price'] * $elem['stock'];
        return ($price);
    }   

    if (!file_exists("./private"))
        mkdir("./private", '0755');
    if (!file_exists("./private/basket"))
       $check_basket = 0;
   else
   {
        $basket = unserialize(file_get_contents("./private/basket"));
        if ($basket)
            $check_basket = 1;
    }
    if (file_exists("./private/products.csv"))
   {
        $file = unserialize(file_get_contents("./private/products.csv"));
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Accueil</title>
</head>

<body>

    <header>
        <h1>Adopte-un-Etudiant.com</h1>
    </header>
    <div class="navigation">
        <a href="index.php" class="active">Accueil</a>
        <?php if (!$_SESSION['loggued_on_user']) { ?>
        <a href="login.php">Se Connecter</a><?php } ?>
        <?php if (!$_SESSION['loggued_on_user']) { ?>
        <a href="create.php">S'inscrire</a><?php } ?>
        <?php if ($_SESSION['loggued_on_user'] === "admin") { ?>
        <a href="admin.php" >Administration</a><?php } ?>
        <?php if ($_SESSION['loggued_on_user']) { ?>
        <a href="modif.php" >Gerer son compte</a><?php } ?>
        <?php if ($_SESSION['loggued_on_user']) { ?>
        <a href="logout.php">Déconnexion</a><?php } ?>

    </div>

    <div id="accueil_central">
    <!-- Affichage des produits existants -->
    <div>
        <h2>Etudiants en vente</h2>

        <table class="tableau">
        
            <?php 
        if (!$file)
            die("Tableau des produits vide. Fin du script");?>
        <thead>
            <th>Produit</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
        foreach ($file as $key => $value) { ?>
            <tr>
                <td><?php echo $file[$key]['ref'];?></td>
                <td><?php echo $file[$key]['category'];?></td>
                <td><?php echo $file[$key]['price'];?></td>
                <td><?php echo $file[$key]['stock'];?></td>
                <td><img class=img_tab style="max-width:250px; max-height:250px; text-align:center;" src="https://cdn.intra.42.fr/users/<?php echo $file[$key]['img'];?>.jpg" alt="Image de <?php echo $file[$key]['ref'];?>"></td>
                <td>
                    <form class="action_button" action="basket.php" method="POST">
                        <input type="hidden" name="ref" value="<?php echo $file[$key]['ref'];?>">
                        <input type="submit" name="plus" value="add to basket">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>

        <div id="basket" name="basket">
            <h2>Panier</h2>
            <table class="tableau">
                <thead>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </thead>
                <tbody>
                    <?php if ($check_basket == 1) 
                    {
                        foreach ($basket as $key => $value) { ?>
                    <tr>
                        <td><?php echo $basket[$key]['ref'];?></td>
                        <td><?php echo $basket[$key]['price'];?></td>
                        <td><?php echo $basket[$key]['stock'];?></td>
                    </tr>
                    <td>
                        <form class="action_button" action="basket.php" method="POST">
                            <input type="hidden" name="ref" value="<?php echo $basket[$key]['ref'];?>">
                            <input type="hidden" name="stock" value="<?php echo $basket[$key]['stock'];?>">
                            <input type="submit" name="delete" value="delete">
                            <input type="submit" name="plus" value="+">
                            <input type="submit" name="minus" value="-">
                        </form>
                    </td>
                    <?php } ?>
                </tbody>
            </table>
            <div>
                Total : <?php echo price_counter($basket);?>
                <form action="basket.php" method="POST">
                    <input type="hidden" name="empty_basket" value="<?php echo $basket;?>">
                    <input type="submit" name="empty" value="empty">
                    <input type="submit" name="purchase" value="purchase">
                </form>
            <?php } ?>
            </div>          
        </div>
    </div>
</body>
</html>