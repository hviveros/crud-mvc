<?php

require_once './libs/DB.php';

class ModeloBase extends DB {
	public $db;
	public $string;

	public function __construct() {
		$this->db = new DB();
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

	public function insertar($tabla, $datos) {
		try {
			$llaves = array_keys($datos);
		    $sql = "INSERT INTO $tabla (".implode(", ", $llaves).") VALUES ( :".implode(", :",$llaves).")";
		    $q = $this->db->prepare($sql);
		    return $q->execute($datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function editar($tabla, $id, $datos) {
		try {

		    $campos = array();

			foreach ($datos as $claves => $elemento) {
				$campos[] = " ". $claves ."=:". $claves;
					// nombre=:nombre 	email=:email 
			}

			$cadena = implode(", ", $campos);
			//nombre=:nombre, email=:email

			$sql = "UPDATE $tabla SET $cadena WHERE id=:id";
			$q = $this->db->prepare($sql);
			//se asigna la variable $id a la cadena antes de ejecutar el query
			$datos['id'] = $id;
			return $q->execute($datos); 

		} catch (PDOException $e) {
			echo $e->getMessage();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function eliminar($tabla, $id) {
		try {
		    $sql = "DELETE FROM $tabla WHERE id = $id";
		    $q = $this->db->prepare($sql);
		    return $q->execute($datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function consultarRegistro($query) {
		try {
			$consulta = $this->db->query($query);
			if ($consulta->rowCount() == 1) {
				return $consulta;
			} else {
				return false;
			}
		} catch (PDOException $e){
			echo "Error: ".$e->getMessage();
		}
	}

	public function obtenerTodos($query) {
		try {
			return $this->db->query($query);
		} catch (PDOException $e){
			echo "Error: ".$e->getMessage();
		}
	}

}
