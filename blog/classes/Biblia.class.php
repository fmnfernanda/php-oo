<?php

class Biblia {

    public $livros;

    public function __construct($file) {
        $livros = json_decode(file_get_contents($file));
        foreach($livros as $numero => $livro) {
            $this->{$livro->abbrev} = new Livro($livro->name, $numero + 1, $livro->chapters);
        }
    }

}

class Livro {
    
    public $nome, $numero, $capitulos;
    
    public function __construct($nome, $numero, $capitulos) {
        $this->nome = $nome;
        $this->numero = $numero;
        $this->capitulos = [];
        foreach($capitulos as $numero => $versiculos) {
             $this->capitulos[] = new Capitulo($numero + 1, gzcompress(json_encode($versiculos)));
             //$this->capitulos[] = gzcompress(json_encode($versiculos));                

        }
    }

}

class Capitulo {

    public $numero, $versiculos;
    
    public function __construct($numero, $versiculos) {
        $this->numero = $numero;
        $this->versiculos = new Versiculo ($versiculos);
        
    }

    

}

class Versiculo implements ArrayAccess, Countable {

    public $numero, $texto;
    private $gzip, $versiculos;


    public function __construct($gzip) {
        $this->gzip = $gzip;
    }

    public function count (){
        if(!$this->versiculos)
            $this->versiculos = json_decode(gzuncompress($this->gzip));
        return count($this->versiculos);
    }

    public function offsetSet($indice, $valor){}

    public function offsetGet($indice){
        if(!$this->versiculos)
            $this->versiculos = json_decode(gzuncompress($this->gzip));
        return $this->versiculos[$indice];
    }

    public function offsetUnset($indice){}

    public function offsetExists($indice){}

}



//$biblia = new Biblia('biblia.json');
//echo count ($biblia->gn->capitulos[0]->versiculos);
//echo '<br />';
//print_r($biblia->gn->capitulos[0]->versiculos[13]);
//exit;