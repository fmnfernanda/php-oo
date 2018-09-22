<?php

class Biblia{

    private static $livros = ['Genesis', 'Exodo', 'Levitico', 'Numeros', 'Deuteronomio'];
    private $livro, $capitulo, $versiculo, $versao;

    public function __construct($l, $c, $v){
     $this->setLivro($l);
     $this->setCapitulo($c);
     $this->setVersiculo($v);

}

public function __destruct(){

    echo "A Biblia com o livro $this->livro foi destruida";
}

public function __get($p){
    return $this->$p;
}

public function __set($p, $v){
    if(!in_array($p, array_keys(get_object_vars($this))))
       throw new Exception("Propreidade $p inexistente");
    $method = 'set' . ucfirst($p);
     if(method_exists($his, $method))
        $this->$method($v);
     else
        $this->$p;      
}

/*public function __set($p, $v){

    if($p == 'livro')
        $this->setLivro($v);
    else if($p == 'versiculo')
            $this->setVersiculo($v);
    else if ($p == 'capitulo')
         $this->setCapitulo($v);
    else
        throw new Exception("Propreidade $p inexistente");
        
}*/



private function setLivro($livro){

    if(in_array($livro, self::$livros ))
        $this->livro = $livro;
    else
        throw new Exception('Livro inexistente no pentateuco!');
        
}

public function setCapitulo($capitulo){

    if(!is_numeric($capitulo))
        throw new Exception('Capitulo deve ser numerico!');
        $this->capitulo = (int)$capitulo; 
                
}

public function setVersiculo($versiculo){

    if(!is_numeric($versiculo))
        throw new Exception('Versiculo deve ser numerico!');
        $this->versiculo = (int)$versiculo; 
                
}

}


try{
    $biblia = new Biblia('Genesis', 1, 8);
    echo $biblia->livro;
   }
catch (Exception $e){
    echo $e->getMessage();
   } 


exit;
spl_autoload_register(function($class){
    require "classes/$class.class.php";
});

require 'classes/Topico.class.php';
require 'classes/Usuario.class.php';


$config = parse_ini_file('config.ini');

$config['title'] = 'Blog';
$config['footer'] = 'Meu Blog - {ANO} - Todos os direitos reservados &#169;';

$title = $config['title'] . ' - Home';
$footer = str_replace('{ANO}', date('Y'), $config['footer']);

$topicos = Topico ::getAll();

//$usuarios = Usuario ::getAll();

//$usuario = new Usuario(['email'=>'fmnfernanda@gmail.com', 'senha'=> md5('4linux')]);
//$usuario-> save();



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
                <?php foreach ($topicos as $topico): ?>
                <li><a href="topico.php?id=<?=$topico->id?>"><?=$topico->titulo?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <main>
            <h2>Bem vindo!</h2>
            <p>4Linux é uma empresa brasileira de TI fundada em 2001.</p>
            <p>Desde 2006 presta suporte à softwares livres em ambientes de missão crítica para a Caixa Econômica Federal, um dos principais cases mundiais de uso de padrões abertos: atualmente quando um cidadão faz uma aposta nas loterias, saca dinheiro em um ATM (caixa eletrônico), recebe um SMS com o saldo de seu FGTS ou simula o valor de um financiamento imobiliário no 'feirão' da casa própria, está usando uma infraestrutura baseada em softwares livres com serviços prestados pela 4Linux.</p>
            <p>Além da Caixa, a empresa realizou outras implementações de software livre do Brasil, entre elas: Metrô de São Paulo, Casa da Moeda do Brasil, Ceagesp e Projeto CDTC (Centro de Difusão de Tecnologia e Conhecimento) – uma parceria entre a IBM e o ITI – que envolveu, entre outras ações, a maior capacitação em Linux do Brasil: 785 educadores do MEC foram treinados em Linux.</p>
            <p>Idealizadora do Hackerteen – projeto de edutainment (entretenimento educacional) para jovens da geração internet sobre segurança da computação, empreendedorismo na Internet e ética hacker – que foi avaliado como “primeiro e único no mundo” pela Harvard Business School.</p>
        </main>
        <footer>
            <hr />
            <?=$footer?>
        </footer>
    </body>
</html>
