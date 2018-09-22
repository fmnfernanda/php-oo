<?php

class Registro{

	public $id = 0;
		

	public function __construct($properties) {

		foreach ($properties as $property => $value){
		$this->$property = $value;
		}
	
	}

	public static function get($inf) {
			$campos = '';
				
		foreach($inf as $property => $value)
			$campos .="$property = '$value' AND ";
				
		$campos = substr($campos, 0, -5);
				
		$class = strtolower(get_called_class());
		$sqlite = Database::connect();
		$res = $sqlite->query("SELECT * FROM {$class}s WHERE $campos");
		$objetos = [];
		while($rs = $res->fetchArray(SQLITE3_ASSOC)){
			$objetos[] = new $class($rs);
		}
		return $objetos;



	}

	public static function getAll() {
		
		$class = get_called_class();
		$sqlite = Database::connect();

		$objetos = [];

		$res = $sqlite->query('SELECT * FROM ' . strtolower($class) . 's');
		
		while($rs = $res->fetchArray(SQLITE3_ASSOC)){
			$objetos[] = new $class($rs);
		}
		return $objetos;
	}

		public function save() {

			$class = strtolower(get_class($this));
			$sqlite = Database::connect();
			$properties = get_object_vars($this);
			if(!$this->id){ 
				unset($properties['id']);
				$colunas = implode(',', array_keys($properties));
				$valores = implode("','", array_values($properties));
				$sqlite->exec("INSERT INTO {$class}s ($colunas) VALUES('$valores')");
		
			} else{
			
				$campos = '';
				foreach($properties as $property => $value){
					if($property != 'id')
						$campos .="$property = '$value',";
				}

				$campos = substr($campos, 0, -2);
				$sql = "UPDATE {$class}s SET $campos WHERE id = {$properties['id']}";
				$sqlite->exec($sql);
		}


	}


}