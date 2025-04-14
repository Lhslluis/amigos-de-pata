<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/functions/utils.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username && $password) {
    $logado = logarAdmin($username, $password);

    if ($logado) {
        $expiracao = time() + 3600; // 1 Hora
        setcookie('logado', true, $expiracao, '/');

        header('Location: /amigos-de-pata/pages/admin/cadastro/cadastro.php');
        exit;
    } else {
        $erroLogin = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigos de Paga</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/amigos-de-pata/reset.css">
    <link rel="stylesheet" href="/amigos-de-pata/style.css">

    <link rel="stylesheet" href="/amigos-de-pata/components/header/header.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/components/header/header.php' ?>

    <div class="container">
        <div class='login-card'>
            <h1>Logar no Sistema</h1>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Entrar</button>
                <?php
                    if ($erroLogin) {
                        echo "<p class='error-message'>Login inválido</p>";
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
