<?php

$usuario = new Usuario(['email'=>'fmnfernanda@gmail.com', 'senha'=> md5('4linux')]);
$usuario-> save();
