<?php
	$dadosJson = file_get_contents('animais.json');
  $animais = json_decode($dadosJson, true);
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
  
  <link rel="stylesheet" href="./components/header/header.css">
  <link rel="stylesheet" href="./components/card/card.css">
</head>
<body>
	<?php include './components/card/card.php' ?>

	<?php include './components/header/header.php' ?>
  <ul class='card-list'>
    <?php foreach ($animais as $animal): ?>
      <li>
        <?php exibirCard($animal['id'], $animal['nome'], $animal['tipo'], $animal['local'], $animal['idade'], $animal['image']) ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
        