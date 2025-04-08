<?php
function exibirCard($id, $nome, $tipo, $local, $idade, $image) {
    $host = $_SERVER['HTTP_HOST'];
?>
        <div class='card'>
            <img class='img' src='<?= $image ?>' />
            <p class='nome'><?= $nome ?></p>
            <p class='local'><?= $local ?></p>

            <a href='pages/detalhes/detalhes.php?id=<?= $id ?>'>Adotar</a>
        </div>
<?php
}
?>
