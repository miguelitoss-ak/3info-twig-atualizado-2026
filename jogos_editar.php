<?php

require('carregar_twig.php');
require('carregar_pdo.php');

// echo $twig->render('jogos_editar.html');

$erro = false;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $id = (int) $_POST["id"] ?? false;
//     if ($id) {
//     $excluir = $pdo->prepare('UPDATE jogos SET (nome, estilo, capa) VALUES (?, ?, ?)');
//     $excluir->bindParam(':id', $id);
//     $excluir->execute();
//     }
//     header('location:jogos.php');
//     die;
// }

$id = (int) $_GET["id"] ?? false;

// if (!$id) {
//     header('location:jogos.php');
//     die;
// }

$dados = $pdo->prepare('SELECT * FROM jogos WHERE id = :id');
$dados->execute(['id' => $id]);

if ($dados->rowCount() != 1) {
    header('location:jogos.php');
    die;
}

$jogo = $dados->fetch(PDO::FETCH_ASSOC);

echo $twig->render('jogos_editar.html', ['jogo' => $jogo]);