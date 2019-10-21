<?PHP
	
	function auth($login, $passwd)
	{
		if (file_exists('private/passwd'))
		{
			if ($file = unserialize(file_get_contents('private/passwd')))
			{
				foreach ($file as $value) 
				{	
					if ($login == $value['login'])
					{
						if ($value['passwd'] == hash('whirlpool', $passwd))
							return "TRUE";
						return "FALSE";
					}
				}
			}
		}
		return "FALSE";
	}

	session_start();
	
	if ($_POST['login'] && $_POST['passwd'])
	{
		if (auth($_POST['login'], $_POST['passwd']) == 'TRUE')
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
			header("Location: index.php");
			exit ("OK\n");
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo "mot de passe ou identifiant incorrect\n";
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Page de connection</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body >
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
		<fieldset>
			<div class="formulaire">
				<form method="POST" action="login.php">
					Identifiant: <input type="text" name="login" value=""/>
					<br />
					Mot de passe: <input type="password" name="passwd" value=""/>
					<br />
					<input type="submit" name ="submit" value="OK" />		
				</form>
	</div>
		</fieldset>	
	</body>
</html>