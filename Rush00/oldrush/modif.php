<?PHP
	session_start();
	if ($_POST['login'] && $_POST['newpw'] && $_POST['oldpw'] && $_POST['submit'] === 'OK')
	{
		if ($file = unserialize(file_get_contents("./private/passwd")))
		{
			foreach ($file as $key => $value)
			{
				if ($value['login'] == $_POST['login'])
				{	
					if ($value['passwd'] == hash('whirlpool', $_POST['oldpw']) && $value['passwd'] !== ($newpw = hash('whirlpool', $_POST['newpw'])))
					{
						$file[$key]['passwd'] = $newpw;
						file_put_contents("./private/passwd", serialize($file));
						header("Location: index.php");
						exit ("mot de passe modifié\n");
					}
					break ;
				}
			}
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>change password</title>
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
    <div>
    	<p>Vous serez redirigé vers l'accueil, si votre mot de passe a été correctemment modifié.</p>
    </div>

		<form method="POST" action="modif.php">
			<fieldset>
				<div class="formulaire">
					Identifiant: <input type="text" name="login" value=""/>
					<br />
					Ancien mot de passe: <input type="password" name="oldpw" value=""/>
					<br />
					Nouveau mot de passe: <input type="password" name="newpw" value=""/>
					<br />
					<input type="submit" name ="submit" value="OK" />
</div>
			</fieldset>
		</form>
	</body>
</html>