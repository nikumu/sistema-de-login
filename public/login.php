<?php
defined('CONTROL') or die('Acesso negado!');

$erro = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? null;

    if (empty($usuario) || empty($senha)) {
        $erro = "Usuário e senha são obrigatórios!";
    } else {
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach ($usuarios as $user) {
            if ($user['usuario'] === $usuario && password_verify($senha, $user['senha'])) {
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php?rota=home');
                exit();
            }
        }

        $erro = "Usuário e/ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <form action="index.php?rota=login" method="post" class="login-form">
            <h3>Login</h3>
            <?php if (!empty($erro)): ?>
                <div class="error"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="email" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>

