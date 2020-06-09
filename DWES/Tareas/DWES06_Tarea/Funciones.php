<?php

/**
* Class Funciones
* 
* Curso: 		Desarrollo Web de Entorno Servidor
* Tema 6: 		SERVICIOS WEB
* Ejercicio: 	Funciones.php, fichero comentado para la creación 
*             	automática de documento WSDL
* @author: 		José Luis Comesaña
*/
class Funciones{
    /**
     * Obtener el precio del producto que tenga el código que le pasemos
     * 
     * @param string $cod
     * @return float
     */
    public function getPvp($cod){
		// Inicializamos las variables
        $pvp = null;
		// Capturamos posibles errores al leer de la base de datos
        try{
            $dwes = new PDO("mysql:host=127.0.0.1;dbname=tarea6", "dwes", "abc123.");
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }catch (PDOException $e) {
            $pvp = -($e->getCode());
			return $pvp;
        }
        if (!isset($error)) {
            $sql = "SELECT PVP FROM producto WHERE cod='$cod'";
            $resultado = $dwes->query($sql);
            if($resultado) {
                $row = $resultado->fetch();
                $pvp = $row['PVP'];
            } 
        }
        return $pvp;
    }
    
    
    /**
     * Obtener el stock existente en una tienda y de un producto concreto
     * 
     * @param string $producto
     * @param int $tienda
     * @return int
     */
    public function getStock($producto,$tienda){
        $stock = null;
        try{
            // Entramos en la base de datos
            $dwes = new PDO("mysql:host=127.0.0.1;dbname=tarea6", "dwes", "abc123.");
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }
        catch (PDOException $e) {
            $stock = -($e->getCode());
			return $stock;
        }
        if (!isset($error)) {
            $sql = "SELECT unidades FROM stock WHERE producto='$producto' AND tienda='$tienda'"; 
            $resultado = $dwes->query($sql);
            if($resultado) {
                $row = $resultado->fetch();
                $stock = $row['unidades'];
            } 
        }
        return $stock;
    }
    
    /**
     * Listar todas las familias de productos existentes
     * 
     * @return Array
     */
    public function getFamilias(){     
        $familias = array();
        try{
            // Entramos en la base de datos
            $dwes = new PDO("mysql:host=127.0.0.1;dbname=tarea6", "dwes", "abc123.");
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }catch (PDOException $e) {
            $familias[0] = "<span style='background:yellow'>ERROR: ".$e->getCode()."</span>";
            $familias[1] = "<span style='color:red'>".$e->getMessage()."</span>";
			return $familias;
        }
        if (!isset($error)) {
            $sql = "SELECT cod FROM familia";
            $resultado = $dwes->query($sql);
        }
        if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $familias[] = "${row['cod']}";
                $row = $resultado->fetch();
            }
        }
        return $familias;
    }
    
    /**
     * Listar todos los productos existentes de la familia que se le indique
     * 
     * @param String $codFamilia
     * @return Array
     */
    public function getProductosFamilia($codFamilia){
        $codigos = array();
        try{
            // Entramos en la base de datos
            $dwes = new PDO("mysql:host=127.0.0.1;dbname=tarea6", "dwes", "abc123.");
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }catch (PDOException $e) {
            $codigos[0] = "<span style='background:yellow'>ERROR: ".$e->getCode()."</span>";
            $codigos[1] = "<span style='color:red'>".$e->getMessage()."</span>";
			return $codigos;
        }
        if (!isset($error)) {
            $sql = "SELECT cod FROM producto WHERE familia='".$codFamilia."'";
            $resultado = $dwes->query($sql);
        } 
        if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $codigos[] = "${row['cod']}";
                $row = $resultado->fetch();
            }
        }
        return $codigos;
    }

}
?>
