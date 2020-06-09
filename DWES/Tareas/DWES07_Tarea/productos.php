<?php
// Incluimos la lilbrería Xajax
require_once('include/xajax_core/xajax.inc.php');

// Incluimos los ficheros de clases y acceso a bases de datos
require_once('include/DB.php');
require_once('include/CestaCompra.php');

// Recuperamos la información de la sesión
session_start();

// Creamos el objeto xajax
$xajax = new xajax('fcesta.php','xajax_','utf-8',true);

// Registramos la función que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"anadirCesta");
$xajax->register(XAJAX_FUNCTION,"vaciarCesta");
$xajax->register(XAJAX_FUNCTION,"mostrarCesta");

// Configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI','./include/');

// Configuramos el lenguage que utilizará xajax
$xajax->configure('language','es');

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Recuperamos la cesta de la compra
$cesta = CestaCompra::carga_cesta();

// Comprobamos si se ha enviado el formulario de vaciar la cesta
if (isset($_POST['vaciar'])) {
    unset($_SESSION['cesta']);
    // Se inicializa la cesta
    $cesta = new CestaCompra();
}

// Comprobamos si se quiere añadir un producto a la cesta
if (isset($_POST['enviar'])) {
    // Si coincide el número aleatorio de esta sesión con el recibido...
    if($_SESSION['codigoAleatorio']==$_POST['numAle']){
        // Se genera un nuevo número aleatorio de sesión con el fin que si ahora
        // se refresca la página no coincidirá el nuevo número con el recibido
        $_SESSION['codigoAleatorio']=creaNumero();
        $cesta->nuevo_articulo($_POST['cod']);
        unset($_POST['enviar']);
        $cesta->guarda_cesta();
    }
}

// Función que nos genera números aleatorios entre 1 y 100000
function creaNumero(){
    $codigoAle=rand(1,100000);
    return $codigoAle;
}

// Función para crear un formulario por cada producto existente
function creaFormularioProductos(){
    // Si no existe la variable de sesión de control, la creamos
    // con lo que conseguimos asignar un número único para esta sesión 
    if(!isset($_SESSION['codigoAleatorio'])) $_SESSION['codigoAleatorio'] = creaNumero();
    $productos = DB::obtieneProductos();
    foreach ($productos as $p) {
        echo "<p><form id='" . $p->getcodigo() . "' action='productos.php' method='post' onsubmit='return anadeCesta();'>";
        // Metemos ocultos el código de los productos
        echo "<input type='hidden' name='cod' id='cod' value='" . $p->getcodigo() . "'/>";
        // enviamos también el código generado para esta sesión
        echo "<input type='hidden' name='numAle' id='numAle' value='" . $_SESSION['codigoAleatorio'] . "'/>";
        echo "<input type='submit' name='enviar' class='boton' value='Añadir'/>";
        // imprimimos el nombre corto del producto y su precio
        echo $p->getnombrecorto() . ": ";
        echo $p->getPVP() . " euros.";
        echo "</form>";
        echo "</p>";
    }        
}

function muestraCestaCompra($cesta) {
    echo "<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>";
    echo "<hr />";
    // mostramos todos los productos almacenados en la cesta
    $cesta->muestra();
    // cuando pulsemos el boton 'vaciar' se llamará a la función xajax 'vaciaCesta'
    echo "<form id='vaciar' action='productos.php' method='post' onsubmit='return vaciaCesta();'>";
    echo "<input type='submit' name='vaciar' class='boton' value='Vaciar Cesta' ";
    // si la cesta está vacía se desactiva el botón de 'vaciar'
    if ($cesta->vacia()) echo "disabled='true'";
    echo "/></form>";
    // cuando pulsemos sobre el botón de 'comprar' se llamará a la función xajax 'muestraCesta'
    echo "<form id='comprar' action='cesta.php' method='post' onsubmit='return muestraCesta();'>";
    echo "<input type='submit' name='comprar' class='boton' value='Comprar' ";
    // si la cesta está vacía se desactiva el botón de 'comprar'
    if ($cesta->vacia()) echo "disabled='true'";
    echo "/></form>";  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 7 : Aplicaciones web dinámicas: PHP y Javascript -->
<!-- Tarea: Cesta de la compra con Xajax: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos</title>
  <link href="tienda.css" rel="stylesheet" type="text/css" />
    <!-- Llamamos al método que permite escribir todo el código xajax en el documento -->
    <?php $xajax->printJavascript(); ?>
    <script type="text/javascript" src="fcesta.js"></script>
</head>

<body class="pagproductos">

<div id="contenedor">
  <div id="encabezado">
    <h1>Listado de productos</h1>
  </div>
  <div id="cesta">
<?php muestraCestaCompra($cesta); ?>
  </div>
  <div id="productos">
<?php creaFormularioProductos(); ?>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' class='boton' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>'/>
    </form>        
  </div>
</div>
</body>
</html>
