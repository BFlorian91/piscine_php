<?php

    include '../model/get_total.php';

    session_start();
    if ($_SESSION['loggued_on_user'] && file_exists("../private/".$_SESSION['loggued_on_user']))
        $basket = unserialize(file_get_contents("../private/".$_SESSION['loggued_on_user']));
    else if (file_exists("../private/unsuscribe"))
        $basket = unserialize(file_get_contents("../private/unsuscribe"));
    require_once 'menu.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Basket</title>
        <link rel="stylesheet" type="text/css" href="../lib/style.css">
    </head>
    <body>
    <header>
        <h1>Panier</h1>
    </header>
    </body>
    <?php if ($basket) { ?>
    <div>
        <table class="tableau">
            <thead>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($basket as $key => $value) {?>
                <tr>
                    <td><?php echo $basket[$key]['ref'];?></td>
                    <td><?php echo $basket[$key]['price'];?>$</td>
                    <td><?php echo $basket[$key]['stock'];?></td>
                    <td>
                        <form action="../model/action_basket.php" method="POST">
                            <input type="hidden" name="ref" value="<?php echo $basket[$key]['ref'];?>">
                            <div class="container">
                                <input type="submit" name="submit" value="+">
                                <?php if ($basket[$key]['stock'] >= 2) {?>
                                <input type="submit" name="submit" value="-">
                                <?php }?>
                                <input type="submit" name="submit" value="delete">
                            </div>
                        </form>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <div>
        <div class="container">
            <p class="total">Total: <?php echo get_total()?>$</p>
        </div>
        <div class="button_center">
            <form action="../model/action_basket.php" method="POST">
                 <input type="submit" name="submit" value="purchase">
                 <input type="submit" name="submit" value="empty">
            </form>
        </div>
    </div>
    <div class="container">
        <?php } else { ?><p class="total">Votre panier est vide<?php } ?></p>
    </div>
    </body>
</html>