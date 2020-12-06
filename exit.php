<?php
unset ($_COOKIE ['user']);
setcookie('user', $user['login'], time() - 3600 * 24, "/Camagru");
header('Location: /Camagru');

?>