<?PHP
	session_start();
	if ($_SESSION['loggued_on_user'])
		$_SESSION['loggued_on_user'] = "";
	session_destroy();
	header("Location: index.php");
	exit ;
?>