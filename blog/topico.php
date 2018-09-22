<?php

spl_autoload_register(function($class){
    require "classes/$class.class.php";
});

$config = parse_ini_file('config.ini');

$config['title'] = 'Blog';
$config['footer'] = 'Meu Blog - {ANO} - Todos os direitos reservados &#169;';


$topicos = Topico ::getAll();

$topico = Topico ::get(['id'=> (int)$_GET['id']])[0]; 

//$sqlite = new SQLite3($config['sqlite']);
//$res = $sqlite->query('SELECT id, titulo, categoria, texto, data FROM topicos WHERE id = ' . (int) $_GET['id']);
//$topico2 = $res->fetchArray(SQLITE3_ASSOC);

$topico_data = date('d/m/Y', $topico->data);

$title = $config['title'] . ' - ' . $topico->titulo;
$footer = str_replace('{ANO}', date('Y'), $config['footer']);

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
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php foreach ($topicos as $t): ?>
                <li><a href="topico.php?id=<?=$topico->id?>"><?=$t->titulo?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <main>
            <h2><?=$topico->titulo?></h2>
            <?=$topico->texto?>
            <span><?=$topico_data?></span>
        </main>
        <footer>
            <hr />
            <?=$footer?>
        </footer>
    </body>
</html>
