<?php
    session_start();

    include "auth.php";

    if ($_POST["login"] && $_POST["passwd"] && auth($_POST["login"], $_POST["passwd"])) {
        $_SESSION["loggued_on_user"] = $_POST["login"];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>42Chat</title>
</head>
<body>
    <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
    <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
</body>
</html>
<?php
} else {
    $_SESSION["loggued_on_user"] = "";
    echo "ERROR" . PHP_EOL;
}