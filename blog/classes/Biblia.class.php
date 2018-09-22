<?php

class Biblia{

    private static $livros = ['Genesis', 'Exodo', 'Levitico', 'Numeros', 'Deuteronomio'];
    private $livro, $capitulo, $versiculo;

    public function __construct($l, $c, $v){
     $this->setLivro($l);
     $this->setCapitulo($c);
     $this->setVersiculo($v);

}

public function getLivro(){

    return $this->livro;
}

public function setLivro($livro){

    if(in_array($livro, self::$livros ))
        $this->livro = $livro;
    else
        throw new Exception('Livro inexistente no pentateuco!');
        
}

public function getCapitulo(){

    return $this->capitulo;
}

public function setCapitulo($capitulo){

    if(!is_numeric($capitulo))
        throw new Exception('Capitulo deve ser numerico!');
        $this->capitulo = (int)$capitulo; 
                
}

public function getVersiculo(){

    return $this->versiculo;
}

public function setVersiculo($versiculo){

    if(!is_numeric($versiculo))
        throw new Exception('Versiculo deve ser numerico!');
        $this->versiculo = (int)$versiculo; 
                
}

}


try{
    $biblia = new Biblia('Deuteronomio', 1, 8);
    echo $biblia->getLivro();
   }
   catch (Exception $e){
    echo $e->getMessage();
   } 