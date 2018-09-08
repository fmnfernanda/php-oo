<?php

$config = parse_ini_file('config.ini');

$config['title'] = 'Blog';
$config['footer'] = 'Meu Blog - {ANO} - Todos os direitos reservados &#169;';

$sqlite = new SQLite3($config['sqlite']);
$topicos = $sqlite->query('SELECT id, titulo, categoria FROM topicos');

$res = $sqlite->query('SELECT id, titulo, categoria, texto, data FROM topicos WHERE id = ' . (int) $_GET['id']);
$topico = $res->fetchArray(SQLITE3_ASSOC);

$topico_data = date('d/m/Y', $topico['data']);

$title = $config['title'] . ' - ' . $topico['titulo'];
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
                <?php while($rs = $topicos->fetchArray(SQLITE3_ASSOC)): ?>
                <li><a href="topico.php?id=<?=$rs['id']?>"><?=$rs['titulo']?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>
        <main>
            <h2><?=$topico['titulo']?></h2>
            <?=$topico['texto']?>
            <span><?=$topico_data?></span>
        </main>
        <footer>
            <hr />
            <?=$footer?>
        </footer>
    </body>
</html>
