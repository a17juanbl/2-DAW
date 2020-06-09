<?php
require_once('Producto.php');

class DB {
    protected static function ejecutaConsulta($sql) {
        try{
						$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		        $dsn = "mysql:host=127.0.0.1;dbname=tarea5";
		        $usuario = 'dwes';
		        $contrasena = 'abc123.';
		        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
				}catch(PDOException $e){
						die("Error: " . $e->getMessage());
				}
		    $resultado = null;
		    if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }

    public static function obtieneProductos() {
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $productos = array();
				if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $productos[] = new Producto($row);
                $row = $resultado->fetch();
            }
				}
        
        return $productos;
    }

/*
		Nuevo método para buscar los artículos que sean ordenadores y recuperar sus
		atributos de las tablas ordenador y producto
*/
		public static function obtieneOrdenador($codigo) {
				$sql = "SELECT o.*, p.nombre_corto, p.PVP, p.descripcion ";
				$sql .= "FROM ordenador o,producto p ";
				$sql .= "WHERE o.cod='".$codigo."' and p.cod='".$codigo."'";
				$resultado = self::ejecutaConsulta ($sql);
				$miordenador = null;
				if(isset($resultado)){
					$row = $resultado->fetch();
				}
				return $row;
		}
    
    public static function obtieneProducto($codigo) {
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $producto = null;

				if(isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
				}
        
        return $producto;    
    }
    
    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='" . md5($contrasena) . "';";
        $resultado = self::ejecutaConsulta ($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    }
    
}

?>
