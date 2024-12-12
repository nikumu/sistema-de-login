<?php
defined('CONTROL') or die('Acesso negado!');

session_destroy();
session_write_close();
header('Location: index.php?rota=login');
exit();

