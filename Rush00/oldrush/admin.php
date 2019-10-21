<?php
session_start();
if (!file_exists("./private/products.csv"))
    die ("Ficher product.csv inexistant. Fin du Script");

if (!file_exists("./private/passwd"))
    die ("Ficher passwd inexistant. Fin du Script");

if ($_SESSION['loggued_on_user'] !== "admin")
{
    header("Location: index.php");
    exit ;
}
$ref = $_POST['ref'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$category = $_POST['category'];
$img = $_POST['img'];
$login = $_POST['login'];

$file = unserialize(file_get_contents("./private/products.csv"));
$file_members = unserialize(file_get_contents("./private/passwd"));

if (file_exists("./private/purchase.csv"))
    $file_purchase = unserialize(file_get_contents("./private/purchase.csv"));


if ($_POST['submit'] == "OK")
{   
    foreach ($file as $key => $value)
    {   
        if ($file[$key]['ref'] == $ref)
            die("Ce produit existe déja\n");

    }

    $file[] = array('ref' => $ref, 'category' => $category, 'price' => $price, 'stock' => $stock, 'img' => $img);
    file_put_contents("./private/products.csv", serialize($file));
}
?>

<!-- Début du HTML -->

<html>

<head>
    <title>Page d'Administration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <header>
        <h1>Adopte-un-Etudiant.com</h1>
    </header>

<!-- Barre de navigation -->

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



    <!-- Formulaire d'ajout d'un produit -->

    <h2>Ajout d'un nouveau Produit</h2>
    <form class="formulaire" action="/admin.php" method=POST>
        Nom du Produit: <input type="text" name="ref" required>
        <br>
        Catégorie du Produit: <input type="text" name="category" required>
        <br>
        Prix en euro: <input type="number" name="price" required>
        <br>
        Quantité disponible :<input type="number" name="stock" required>
        <br>
        42-Login :<input type="text" name="img" required>
        <div><input type="submit" name="submit" value="OK"></div>
    </form>

    <!-- Affichage et Administation des produits existants -->

    <div>
        <h2>Ceci est ma table de produit:</h2>

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
                    <form class="action_button" action="action_admin.php" method="POST">
                        <input type="hidden" name="ref" value="<?php echo $file[$key]['ref'];?>">
                        <input type="hidden" name="stock" value="<?php echo $file[$key]['stock'];?>">
                        <input type="submit" name="delete" value="delete">
                        <input type="submit" name="plus" value="+">
                        <input type="submit" name="minus" value="-">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>

    <!-- Affichage et Administation des catégories existantes -->
    
    <?php
    $all_cetegory = array();
    foreach ($file as $key => $value) {
        $all_category[] = $file[$key]['category'];
    }
    $group_category = array_unique($all_category);
    ?>

    <div>
        <h2>La table de Catégories</h2>
    <table class="tableau">
        <thead>
        <th>Catégorie</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            foreach ($group_category as $key => $value) { ?>
                <tr>
                <td><?php echo $group_category[$key];?></td>
                <td>
                <form class="action_button" action="action_admin.php" method="POST">    
                <input type="hidden" name="category" value="<?php echo $group_category[$key];?>">
                <input type="submit" name="delete_category" value="delete_category"></td>
                </form>
                </tr>
            <?php }?>
    </tbody>
    </table>
    </div>

<!-- Gestion des utilisateurs -->


<div>
<h2>Gestion des utilisateurs</h2>
<div>
<table class="tableau">
        <thead>
        <th>Nom de l'utilisateur</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            foreach ($file_members as $key => $value) { ?>
                <tr>
                <td><?php echo $file_members[$key]['login'];?></td>
                <td>
                <form class="action_button" action="action_admin.php" method="POST">    
                <input type="hidden" name="login" value="<?php echo $file_members[$key]['login'];?>">
                <input type="submit" name="delete_user" value="delete_user"></td>
                </form>
                </tr>
            <?php }?>
    </tbody>
    </table>
</div>
</div>

<!-- Gestion des commandes -->

<?php 
if (file_exists("./private/purchase.csv"))
{ ?>

<div>
<h2>Gestion des commandes</h2>
<div>
<table class="tableau">
        <thead>
        <th>Nom de la Commande</th>
    </thead>
    <tbody>
        <?php
            $nb_commande = 0;
            foreach ($file_purchase as $key => $value) { ?>
                <tr>
                <td><?php
                if ($file_purchase[$key] == "purchase")
                {
                    $nb_commande++;
                    echo "Commande numero: ".$nb_commande;
                }
                
                ?></td>
                </form>
                </tr>
            <?php }?>
    </tbody>
    </table>
</div>
</div>

<?php } ?>

</body></html>