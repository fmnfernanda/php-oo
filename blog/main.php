<?php

require 'classes/Trait.php';

spl_autoload_register(function($class){
	require "classes/$class.class.php";
});

session_start();
$config = parse_ini_file('config.ini');

$sqlite = new SQLite3($config['sqlite']);
