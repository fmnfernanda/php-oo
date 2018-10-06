<?php

namespace Classes;

use PHPUnit\Framework\TestCase;

class TopicoTest extends TestCase{

	public function testDatabase(){
		$this->assertFileExists('db/sqlite.db');

	}

	public function testTopico(){

		$topico = new \Classes\Topico(['id' => 1, 'titulo' => 'Last Class']);
		$this->assertEquals($topico->titulo, 'Last Class');
	}
}