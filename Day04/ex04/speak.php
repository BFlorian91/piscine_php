<?php
    session_start();

    if (!($_SESSION['loggued_on_user']))
        echo "ERROR" . PHP_EOL;
    else {
        if ($_POST['msg']) {
            if (!file_exists("../private")) {
                mkdir("../private");
            }
            if (!file_exists("../private/chat")) {
                file_put_contents("../private/chat", null);
            }
            $chat_data = unserialize(file_get_contents("../private/chat"));
            $fp = fopen("../private/chat", "w");
            flock($fp, LOCK_EX);
            $user_data['login'] = $_SESSION['loggued_on_user'];
            $user_data['time'] = time();
            $user_data['msg'] = $_POST['msg'];
            $chat_data[] = $user_data;
            file_put_contents("../private/chat", serialize($chat_data));
            fclose($fp);
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="speak.php" method="post">
            <input type="text" name="msg" value=""/><input type="submit" name="submit" value="Send">
        </form>
        <script langage="javascript">top.frames['chat'].location = 'chat.php'</script>
    </body>
    </html>
    <?php } ?>