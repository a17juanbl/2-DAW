<?php
/*
	Nueva clase que recogerá todos los datos de los ordenadores (de dos tablas)
*/
class Ordenador {
	// Declaración de los distintos miembros que posee la clase
	protected $cod;
	protected $procesador;
	protected $ram;
	protected $disco;
	protected $grafica;
	protected $unidadoptica;
	protected $so;
	protected $otros;
	protected $nombre_corto;
	protected $pvp;
	protected $descripcion;

	// Métodos getter
	public function getcodigo() {return $this->cod;}
	public function getprocesador() {return $this->procesador;}
	public function getram() {return $this->ram;}
	public function getdisco() {return $this->disco;}
	public function getgrafica() {return $this->grafica;}
	public function getunidadoptica() {return $this->unidadoptica;}
	public function getso() {return $this->so;}
	public function getotros() {return $this->otros;}
	public function getnombrecorto() {return $this->nombre_corto;}
	public function getpvp() {return $this->pvp;}
	public function getdescripcion() {return $this->descripcion;}
	
	// Constructor por defecto
	public function __construct($row) {
		$this->cod = $row['cod'];
		$this->procesador = $row['procesador'];
		$this->ram = $row['RAM'];
		$this->disco = $row['disco'];
		$this->grafica = $row['grafica'];
		$this->unidadoptica = $row['unidadoptica'];
		$this->so = $row['SO'];
		$this->otros = $row['otros'];
		$this->nombre_corto = $row['nombre_corto'];
		$this->pvp = $row['PVP'];
		$this->descripcion = $row['descripcion'];
	}

}
?>
