<?php
    $user = 'zaz';
    $pass = 'jaimelespetitsponeys';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        die;
    }
    $data = file_get_contents('../img/42.png');
    $img = 'data:image/png;base64;' . base64_encode($data);
    if ($_SERVER['PHP_AUTH_USER'] == $user && $_SERVER['PHP_AUTH_PW'] == $pass) { ?>
    <html><body>
        Bonjour, Zaz<br/>
        <img src="<?php echo $img ?>">
    </body></html>
<?php } else { ?>
        <html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php } ?>