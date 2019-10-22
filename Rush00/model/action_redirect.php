<?php
	if ($_POST['submit'] === "Revenir à la page d'acceuil")
		header("location: ../index.php");
	if ($_POST['submit'] === "Se Connecter")
		header("location: ../view/login.php");
	if ($_POST['submit'] === "S'inscrire")
		header("location: ../view/create.php");	
?>