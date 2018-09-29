<?php

require 'main.php';

list($t) = Topico::get(['id'=> $_GET['id']]);

$topico_data = date('d/m/Y', $t->data);
$title = " - {$t->titulo}";

require 'header.php';

?>
<main>
    <h2><?=$t->titulo?></h2>
    <h3><?=$t->categoria?></h3>
    <?=$t->texto?>
    <span><?=$topico_data?></span>
</main>
<?php require 'footer.php'; ?>
