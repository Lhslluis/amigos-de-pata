<?php
  if (!isset($_GET['id'])) {
    header('Location: /404.php');
    exit();
  }

	$dadosJson = file_get_contents('../../animais.json');
  $animais = json_decode($dadosJson, true);

  $id = $_GET['id'];
  $animal = null;

  foreach ($animais as $a) {
    if ($a['id'] == $id) {
      $animal = $a;
      break;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Amigos de Paga</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  
  <link rel="stylesheet" href="/amigos-de-pata/components/header/header.css">
  <link rel="stylesheet" href="/amigos-de-pata/pages/detalhes/detalhes.css">
</head>
<body>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/amigos-de-pata/components/header/header.php' ?>

  <div class='container'>
    <div class='container-into'>
        <h1><?php echo $animal['nome'] ?></h1>
        <div class="container-info">
            <div class="preview">
                <img src=<?php echo $animal['image'] ?>>
            </div>
            <div class="info">
                <div>
                    <p class='label'>Espécie</p>
                    <p class='value'><?php echo $animal['tipo'] ?></p>
                </div>
                <div>
                    <p class='label'>Idade</p>
                    <p class='value'><?php echo $animal['idade'] ?></p>
                </div>
                <div>
                    <p class='label'>Localização</p>
                    <p class='value'><?php echo $animal['local'] ?></p>
                </div>
                <button class="adotar-btn">
                  Adotar animalzinho
                </button>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
        