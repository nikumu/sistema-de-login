<?php
defined('CONTROL') or die('Acesso negado!');
?>

<nav class="navbar">
    <span>Usuário: <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></span>
    <ul>
        <li><a href="?rota=home">Home</a></li>
        <li><a href="?rota=logout">Sair</a></li>
    </ul>
</nav>

