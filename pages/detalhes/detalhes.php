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
  <title>Catálogo de Animais</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  
  <link rel="stylesheet" href="../../components/header/header.css">
  <link rel="stylesheet" href="./detalhes.css">
</head>
<body>
	<?php include '../../components/header/header.php' ?>

  <div class='container'>
    <img src=<?php echo $animal['image'] ?>>
    <h1><?php echo $animal['nome'] ?></h1>
    <p><?php echo $animal['tipo'] ?></p>
    <p><?php echo $animal['local'] ?></p>
    <p><?php echo $animal['idade'] ?></p>
  </div>
</body>
</html>
        