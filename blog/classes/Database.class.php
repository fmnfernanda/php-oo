<?php

class Database{

	const FILE = 'db/sqlite.db';

	private function __construct(){
		
	}

	static function connect (){
		return new SQLite3(self::FILE);

	}

}