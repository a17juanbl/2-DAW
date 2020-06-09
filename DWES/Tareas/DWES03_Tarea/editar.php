<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 3: Trabajo con bases de datos MySQL y motor PDO -->
<!-- 
    Mostrar los datos del producto seleccionado en la página anterior (nombre corto, nombre, 
    descripción y PVP) dentro de un formulario que permita cambiarlos, y dos botones: 
    "Actualizar" y "Cancelar". El formulario se enviará a la página "actualizar.php".
 -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea 3 - DWES - Jos&eacute; Luis Comesa&ntilde;a Cabeza</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
			// Si se ha recibido el código de algún producto, se almacena en la variable codigo
            if (isset($_POST['cod'])) $codigo = $_POST['cod'];
			// se abre la base de datos como objeto PDO y se almacenan los posibles errores
            try {
                $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                $error = $e->getCode();
                $mensaje = $e->getMessage();
            }
		?>
		<div id="encabezado">
			<h1>Tarea 3: Edici&oacute;n de un producto</h1>
		</div>
		<div id="contenido">
			<h2>Producto:</h2>
			<?php
				// Si se recibio un codigo de producto y no se produjo ningun error
				//  mostramos los datos de ese producto
				if (!isset($error) && isset($codigo)) {
					// Necesitamos seleccionar el registro que coincide con el código recibido
					$sql = <<<SQL
						SELECT cod,nombre, nombre_corto, descripcion, PVP, familia
						FROM producto
						WHERE producto.cod='$codigo'
SQL;
					// Ejecutamos la consulta anterior
					$resultado = $dwes->query($sql);
					// si se ha encontrado el registro
					if($resultado) {
						// leemos el primer registro encontrado (y único, ya que buscamos por su campo clave)
						$row = $resultado->fetch();
						// Creamos un formulario que envíe los datos via post al fichero actualizar.php
						echo "<form id='form_edit' action='actualizar.php' method='post'>";
						// metemos los datos del registro en sus correspondientes variables
						$codigo=$row['cod'];
						$nombre=$row['nombre'];
						$nombre_corto=$row['nombre_corto'];
						$descripcion=$row['descripcion'];
						$pvp=$row['PVP'];
						$familia=$row['familia'];
						// Mostramos el código en formato de sólo lectura para prevenir modificaciones
						echo "C&oacute;digo: <input type='text' style='color: #F00;background-color: #ccc;' name='cod' value='$codigo' readonly />";
						// enviamos oculto el código de la familia del producto visualizado
						echo "<input type='hidden' name='familia' value='$familia' />";
						// Mostramos en modo edición los datos de Nombre corto, Nombre, Descripción y PVP
						echo "<fieldset><legend>Nombre corto: </legend><input type='text' name='nombre_corto' value='$nombre_corto' size='50' /></fieldset>";
						echo "<fieldset><legend>Nombre: </legend><textarea name='nombre' rows='3' cols='50' >$nombre</textarea></fieldset>";
						echo "<fieldset><legend>Descripci&oacute;n: </legend><textarea name='descripcion' rows='7' cols='50' >$descripcion)</textarea></fieldset>";
						echo "<fieldset><legend>PVP: </legend><input type='text' name='PVP' value='$pvp'/></fieldset>";
						// mostramos los botones de actualizar y cancelar asignándole un nombre para poder comprobar
						// en el fichero actualizar.php si se han pulsado
						echo "<input type='submit' value='actualizar' name='actualiza' />";
						echo "<input type='submit' value='cancelar' name='cancela' />";
						echo "</form>";
					}
				}
			?>
		</div>
	</body>
</html>