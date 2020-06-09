<?php

/**
 * Funciones class
 * 
 * Class Funciones  Desarrollo web de entorno servidor Tema 6: servicios web Ejercicio: Documentación 
 * para generación automática de documento WSDL 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Funciones extends SoapClient {

  public function Funciones($wsdl = "http://127.0.0.1/dwes/tarea6/serviciow.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  } 

  /**
   * Obtiene el PVP correspondiente al código del producto que se le pase 
   *
   * @param string $cod
   * @return float
   */
  public function getPvp($cod) {
    return $this->__call('getPvp', array(
            new SoapParam($cod, 'cod')
      ),
      array(
            'uri' => 'http://127.0.0.1/dwes/tarea6',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene el stock del producto y tienda que se le pase 
   *
   * @param string $producto
   * @param int $tienda
   * @return int
   */
  public function getStock($producto, $tienda) {
    return $this->__call('getStock', array(
            new SoapParam($producto, 'producto'),
            new SoapParam($tienda, 'tienda')
      ),
      array(
            'uri' => 'http://127.0.0.1/dwes/tarea6',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene las familias existentes 
   *
   * @param  
   * @return Array
   */
  public function getFamilias() {
    return $this->__call('getFamilias', array(),
      array(
            'uri' => 'http://127.0.0.1/dwes/tarea6',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene los códigos de los producto de la falimilia que se le indique 
   *
   * @param string $codFamilia
   * @return Array
   */
  public function getProductosFamilia($codFamilia) {
    return $this->__call('getProductosFamilia', array(
            new SoapParam($codFamilia, 'codFamilia')
      ),
      array(
            'uri' => 'http://127.0.0.1/dwes/tarea6',
            'soapaction' => ''
           )
      );
  }

}

?>
