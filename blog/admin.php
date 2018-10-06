<?php


require 'main.php';

if(!isset($_SESSION['auth'])) {
	header('Location: login.php');
	exit;
}

if(isset($_POST['cadastrar'])) {

    $errors = [];
    
    $valores = [];

    foreach(['titulo', 'categoria', 'texto'] as $chave) {
        $valores[$chave] = trim($sqlite->escapeString($_POST[$chave] ?? ''));
        if(!$valores[$chave])
            $errors[$chave] = 'Obrigatório';
    }
    
    if(!$errors) {
        $valores ['data'] = time();
        $topico = new Topico ($valores);
        assert($topico->titulo == $_POST['titulo'] . 'erro');
        assert($sqlite);
        $topico->save();
        header('Location: admin.php?success');
        exit;
    }
}

$title = ' - Administrar';
require 'header.php';

?>
<main>
    <h2>Cadastrar Tópico</h2>
    <?php if(isset($_GET['success'])): ?>
    <div class="success">Tópico cadastrado com sucesso</div>
    <?php endif; ?>
    <form method="post" action="admin.php">
        <table>
            <tr>
                <td>Titulo: </td>
                <td>
                    <input type="text" name="titulo" placeholder="Titulo" value="<?=$titulo ?? ''?>" />
                    <div class="error"><?=$errors['titulo'] ?? ''?></div>
                </td>
            </tr>
            <tr>
                <td>Categoria: </td>
                <td>
                    <input type="text" name="categoria" placeholder="Categoria" value="<?=$categoria ?? ''?>" />
                    <div class="error"><?=$errors['categoria'] ?? ''?></div>
                </td>
            </tr>
            <tr>
                <td>Texto: </td>
                <td>
                    <textarea name="texto" placeholder="Texto ou HTML" cols="60" rows="8"><?=$texto ?? ''?></textarea>
                    <div class="error"><?=$errors['texto'] ?? ''?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="cadastrar" value="Cadastrar" /></td>
            </tr>
        </table>
    </form>
</main>
<?php require 'footer.php'; ?>
