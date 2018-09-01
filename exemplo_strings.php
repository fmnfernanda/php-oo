<?php

//$title = 'PHP';

//$html = <<<HTML
//<html>
//	<head>
//		<title>$title</title>
//	</head>
//	<body>
//		<div class = "main"></div>
//	</body>
//
//	</html>	
//HTML;

//echo $html; exit;

class Animal {

	public $especie = '';
	public $peso = 0;
	public $velocidade = 0;
	public $fome = 0;
	


	function __construct($especie = '', $peso = 0, $velocidade = 0, $fome = 0) {
		$this->especie = $especie;
		$this->peso = $peso;
		$this->velocidade = $velocidade;
		$this->fome = $fome;
	}

	function __toString(){
		//return "Cachorro de raca $this->especie\n";
		
		$str = "Especie: $this->especie\n";
		$str .= "Peso: $this->peso\n";
		$str .= "Velocidade: $this->velocidade\n";
		$str .= "Fome: $this->fome\n";
		return $str;

		//return 	$str = "Especie: $this->especie\n".
		//$str .= "Peso: $this->peso\n".
		//$str .= "Velocidade: $this->velocidade\n".
		//$str .= "Fome: $this->fome\n";
		
//		return <<<EOF
//	Especie: {$this->especie}
//	Peso: {$this->peso}
//	Velocidade: {$this->velocidade}
//	Fome: {$this->fome}

//EOF;
		

	}

	function toHTML(){
		return <<<EOF
		<!DOCTYPE html>
<html>
        <head>
                <title>$this->especie</title>
        </head>
        <body>
                <h1>$this->especie</h1>
                <ul>
                        <li><b>Peso:</b>$this->peso</li>
                        <li><b>Velocidade:</b>$this->velocidade</li>
                        <li><b>Fome:</b>$this->fome</li>
                </ul>
        </body>
</html>

EOF;
	}

}

	
$bulldog = new Animal('Bulldog', 18, 25, 2);
echo $bulldog->toHTML();

echo PHP_EOL;

$dashround = new Animal('Dashround', 7, 27, 15);
echo $dashround->toHTML();

