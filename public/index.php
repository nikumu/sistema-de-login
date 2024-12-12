<?php
session_start();
define('CONTROL', true);

$usuario_logado = $_SESSION['usuario'] ?? null;

$rota = empty($usuario_logado) ? 'login' : ($_GET['rota'] ?? 'home');

if (!empty($usuario_logado) && $rota == 'login') {
    $rota = 'home';
}

$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'logout' => 'logout.php'
];

if (!array_key_exists($rota, $rotas)) {
    http_response_code(404);
    die('Página não encontrada!');
}

require_once $rotas[$rota];

