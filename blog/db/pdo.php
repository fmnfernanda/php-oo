<?php
/*
$pdo = new PDO('sqlite:sqlite.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$titulo = "Joana D'arc";
$categoria = 'Ipsum';
$data = time();
$texto = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

try{

	$sql = "INSERT INTO topicos ( titulo, categoria, data, texto)
	VALUES (:titulo, :categoria, :data, :texto)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':titulo' => $titulo,
		':categoria'=> $categoria,
		':data' => $data,
		'texto' => $texto]);

	$res = $pdo->query('SELECT * FROM topicos');
	while($rs = $res->fetch(PDO::FETCH_OBJ)){
		echo $rs->titulo . PHP_EOL;
	}
} 

catch(Throwable $ex){
	echo $ex->getMessage();
	exit;
}*/


$pdo = new PDO('sqlite:sqlite.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dados = [];
$dados['titulo'] = "Pingo D'água";
$dados['categoria'] = 'Ipsum';
$dados['data'] = time();
$dados['texto'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi interdum fringilla gravida. Fusce venenatis aliquam lorem, vel viverra nunc. Morbi gravida quam eu nisl tristique viverra. Donec lorem quam, porta in sem id, varius aliquet tellus. Etiam vitae pulvinar est. In vitae scelerisque felis, sit amet vehicula augue. Pellentesque et tortor ac risus viverra laoreet.';

try {

	$sql = "INSERT INTO topicos (titulo, categoria, data, texto)
			VALUES (:titulo, :categoria, :data, :texto)";
	$stmt = $pdo->prepare($sql);
	$parameters = [];
	foreach($dados as $key => $value)
		$parameters[":$key"] = $value;
	$stmt->execute($parameters);

	$res = $pdo->query('SELECT * FROM topicos');
	while($rs = $res->fetch(PDO::FETCH_OBJ)) {
		echo $rs->titulo . PHP_EOL;
	}
} catch (Throwable $ex) {
	echo $ex->getMessage() . $ex->getLine();
	exit;
}