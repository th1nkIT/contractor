<?php
setcookie('X-T1T-SESSION', 'LOGOUT');
$path = $_ENV['ROUTE'] . 'login';
header('Location: ' . $path);
