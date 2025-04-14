<?php
    if (!$_COOKIE['logado']) {
        header('Location: /amigos-de-pata/pages/login/login.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['name'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $local = $_POST['local'] ?? '';
        $idade = $_POST['idade'] ?? '';
        $image = $_POST['image'] ?? '';
    
        if (!$nome || !$tipo || !$local || !$idade || !$image) {
            $resposta = "Preencha todos os campos.";
        } else {
            $jsonPath = $_SERVER['DOCUMENT_ROOT'] . '/amigos-de-pata/animais.json';

            $dadosJson = file_get_contents($jsonPath);
            $animais = json_decode($dadosJson, true);

            $novoId = count($animais) + 1;

            $novoAnimal = [
                'id' => $novoId,
                'nome' => $nome,
                'tipo' => $tipo,
                'local' => $local,
                'idade' => (int)$idade,
                'image' => $image
            ];

            $animais[] = $novoAnimal;
            
            $salvo = file_put_contents($jsonPath, json_encode($animais, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            if (!$salvo) {
                $resposta = "Erro ao cadastrar.";
            } else {
                $resposta = "Cadastrado com sucesso!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/amigos-de-pata/components/header/header.css">
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/components/header/header.php' ?>

    <div class="container">
        <div class="cadastro-card">
            <h1>Cadastrar animal</h1>
            <form action="cadastro.php" method="POST">
                <div class="input-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" required>
                </div>
                <div class="input-group">
                    <label for="local">Local:</label>
                    <input type="text" id="local" name="local" required>
                </div>
                <div class="input-group">
                    <label for="idade">idade:</label>
                    <input type="number" id="idade" name="idade" required>
                </div>
                <div class="input-group">
                    <label for="image">Imagem (url):</label>
                    <input type="text" id="image" name="image" required>
                </div>
                <button type="submit">Cadastrar</button>
                <?= $resposta ?>
            </form>
        </div>
    </div>
</body>
</html>
