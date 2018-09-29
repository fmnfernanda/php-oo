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