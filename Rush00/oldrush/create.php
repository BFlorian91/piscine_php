<?PHP
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === 'OK')
	{
		if (!file_exists("./private"))
			mkdir("./private", '0755');
		if (file_exists("./private/passwd"))
		{
			if ($file = unserialize(file_get_contents("./private/passwd")))
			{
				foreach ($file as $elem) 
				{	
					if ($elem['login'] == $_POST['login'])
					{	
						echo "Ce login existe deja\n";
						exit ;
					}
				}
			}
		}
	$file[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
	file_put_contents("./private/passwd", serialize($file));
	header("Location: index.php");
	exit ("Compte crée\n");
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>create account</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
	
		<form method="POST" action="create.php">
			<div class="formulaire">
					Identifiant: <input type="text" name="login" value="" required />
					<br />
					Mot de passe: <input type="password" name="passwd" value="" required/>
					<br />
					<input type="submit" name ="submit" value="OK" />
					</div>
		</form>
	</body>
</html>