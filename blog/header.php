<?php



$title = $config['title'] . $title;


$topicos = Topico::getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <link href="css/style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1><?=$title?></h1>
            <?php if(isset($_SESSION['auth'])): ?>
            <span><a href="logoff.php">SAIR</a></span>
            <?php else:?>
            <span><a href="login.php">ENTRAR</a></span>
            <?php endif; ?>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php foreach($topicos as $topico): ?>
                <li><a href="topico.php?id=<?=$topico->id?>"><?=$topico->titulo?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
