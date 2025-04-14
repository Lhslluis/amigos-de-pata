<?php
        $dadosJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/amigos-de-pata/animais.json');
        $todosAnimais = json_decode($dadosJson, true);

        $search = $_GET['search'] ?? '';

        if ($search) {
            $searchLower = strtolower($search);

            $animaisFiltrados = array_filter($todosAnimais, function($animal) use ($searchLower) {
                return 
                    strpos(strtolower($animal['nome']), $searchLower) !== false ||
                    strpos(strtolower($animal['tipo']), $searchLower) !== false ||
                    strpos(strtolower($animal['local']), $searchLower) !== false ||
                    strpos((string)$animal['idade'], $searchLower) !== false;
            });
            
        } else {
            $animaisFiltrados = $todosAnimais;
        }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Catálogo de Animais</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  
  <link rel="stylesheet" href="/amigos-de-pata/components/header/header.css">
  <link rel="stylesheet" href="/amigos-de-pata/components/card/card.css">
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/components/card/card.php' ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/components/header/header.php' ?>

    <ul class='card-list'>
        <form method="GET" action="index.php">
            <div class="input-group">
                <label for="search">Pesquisar</label>
                <input type="text" name="search" placeholder="Pesquise por qualquer info...">
            </div>
            <button type="submit">Buscar</button>
        </form>
        <div class='animals-list'>
            <?php foreach ($animaisFiltrados as $animal): ?>
                <li>
                    <?php exibirCard($animal['id'], $animal['nome'], $animal['tipo'], $animal['local'], $animal['idade'], $animal['image']) ?>
                </li>
            <?php endforeach; ?>
        </div>
  </ul>
</body>
</html>
        