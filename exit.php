<?php

setcookie('user', $user['login'], time() - 3600 * 24, "/Camagru");
header('Location: /Camagru');

?>