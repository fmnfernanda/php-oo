<?php

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

	

	}

}

	
$bulldog = new Animal('Bulldog', 18, 25, 2);
echo $bulldog;

echo PHP_EOL;

$dashround = new Animal('Dashround', 7, 27, 15);
echo $dashround;

