<?php
    // Permitimos el uso de acentos y caracteres especiales
    header('Content-Type: text/html; charset=UTF-8');
    // creamos el objeto de cliente SOAP con nuestro fichero
    $url = 'http://127.0.0.1/dwes/tarea6/serviciow.php';
    $cliente = new SoapClient(null, array('location'=>$url, 'uri'=>''));
    
    // Llamamos a la función que obtiene el precio del artículo que le pasemos
    $pvp = $cliente->getPVP('PBELLI810323');
    echo "El precio del artículo <b>PBELLI810323</b> es: <b>".$pvp." &euro;</b><br /><hr />";
    
    // Llamamos a la función que obtiene el stock existente del artículo y tienda pasados
    $stock = $cliente->getStock('PBELLI810323',2);
    echo "El Stock del artículo <b>PBELLI810323</b> en la tienda <b>2</b> es de: <b>".$stock."</b> artículos<br /><hr />";
    
    
    // Llamamos a la función que lista los códigos de todas las familias existentes
    $familias = $cliente->getFamilias();
    echo "<table><tr><td colspan=2>Las familias disponibles son:</td></tr>"; 
    foreach($familias as $codFam)
        echo "<tr><td>Código</td><td><b>".$codFam."</b></td></tr>";
    echo"</table><hr />";
    
    // Llamamos a la función que lista todos los artículos de la familia que le indiquemos
    $codigosF = $cliente->getProductosFamilia('ORDENA');
    echo "Los códigos de productos de la familia ORDENA disponibles son:<br/>"; 
    echo "<table>";
    foreach($codigosF as $cod)
        echo "<tr><td>Código</td><td><b>".$cod."</b></td></tr>";   
    echo "</table>"
?>
