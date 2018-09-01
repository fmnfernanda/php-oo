<?php
#criar um classe Arquivo
#Que contenha 3 propriedades
# - linhas - quantidade de linhas
# - caminho - string com o caminhnho do arquivo
# - conteudo - conteudo do arquivo
# O método construtor deve receber o caminho do arquivo
# Criar metodo abrir()
# - chamar a funcao file() e jogar o conteudo de retorno na variavel conteudo
# - aproveitar, e colocar na variavel linhas a quantidade de linhas do arquivo
# Criar metodo escrever()
# Criar metodo ler($i)
# - ler a linha especificada
# Criar metodo lerTudo()
# - escrever as linhas do arquivo separando os valores por tabulacao
# Criar metodo procurar()

class Arquivo {

	public $linhas = 0;
	public $caminho = '';
	public $conteudo = '';
	

	function __construct($caminho) {
		#$this->linhas = $linhas;
		$this->caminho = $caminho;
		#$this->conteudo = $conteudo;
		
	}

	function abrir(){
		$this->conteudo = file($this->caminho);
		$this->linhas = count($this->conteudo);
	}

	function lerTudo(){
		echo "ID: \tNOME:\tEMAIL:\n";	
		foreach ($usuarios as $usuario) {
 			list($id, $nome, $email) = explode (',' , $usuario);
			echo "$id\t$nome\t$email";
	}
}

	function ler($i){
		if($i<= $this->linhas){
			echo $this->conteudo[--$i];
		}
		else{
			echo 'Linha nao existe';
		}
		#if(isset($this->conteudo[--$i]){
		#echo implode("\t",explode('.', $this->conteudo[$i]));
		#}
	}


	#function escrever(){

#	}


	
}

$texto = new Arquivo ('usuarios.csv');
$texto->abrir();
$texto->ler(2);

echo PHP_EOL;

$palavra = new Arquivo ('lista.csv');
$palavra->abrir();
$palavra->ler(3);

echo PHP_EOL;




