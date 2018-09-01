<?php

#primeira forma - exemplo de download por login
readfile('usuarios.csv');

#segunda forma - carregar arquivo por inteirp na memoria
$usuarios = file_get_contents('usuarios.csv');
echo $usuarios;

$usuarios = file('usuarios.csv');
print_r($usuarios);
#echo 'O arquivo tem' . count($usuarios) . 'linhas' . PHP_EOL;

#percorrer todos os indices da variavel usuarios
#e escrever as linhas na tela

echo "ID: \tNOME:\tEMAIL:\n";
foreach ($usuarios as $usuario) {
    #echo "Value: $usuario<br />\n";
    #print_r(explode(',', $usuario));
    #$usuario = explode(',', $usuario);
    #echo implode("\t", $usuario);
    #echo "$usuario[0]\t$usuario[1]\t$usuario[2]";

    #echo str_replace(',', "\t", $usuario);
	list($id, $nome, $email) = explode (',' , $usuario);
	echo "$id\t$nome\t$email";
}
echo PHP_EOL;