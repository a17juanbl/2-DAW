<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 3: Trabajo con bases de datos MySQL y motor PDO -->
<!-- 
    Simplemente redirige a la página "listado.php", pero si en el formulario anterior se ha pulsado 
    "Actualizar" (y no "Cancelar"), antes de redirigir debe ejecutar una consulta para cambiar los 
    datos del producto.
 -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Si no se pulsa el botón de aceptar, a los diez segundos se redirige a listado.php -->
        <meta http-equiv="refresh" content="10; url=listado.php" />	
        <title>Tarea 3 - DWES - Jos&eacute; Luis Comesa&ntilde;a Cabeza</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
			// si se ha recibido el código del producto por post, se asigna su valor a la variable codigo
            if (isset($_POST['cod'])) $codigo = $_POST['cod'];
			// Se abre la base de datos y se almacenan los posibles errores
            try {
                $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                $error = $e->getCode();
                $mensaje = $e->getMessage();
            }
		?>
		<div id="contenido">
			<h2>Producto:</h2>
			<?php
				// Si se recibio un codigo de producto y no se produjo ningun error
				// mostramos los datos de ese producto
				if (!isset($error) && isset($codigo)) {
					// Ahora inicializamos las variables con sus correspondientes datos
					// recibidos por post, y una variable 'ok' que usaremos para comprobar 
					// si la grabación se ha realizado de forma correcta
					$ok=true;
					$nombre=$_POST['nombre'];
					$nombre_corto=$_POST['nombre_corto'];
					$descripcion=$_POST['descripcion'];
					$PVP=$_POST['PVP'];
					$familia=$_POST['familia'];
					/* 	Realizamos una consulta que saque todos los campos de la tabla producto
					 	para el código que hemos recibido.
						Podríamos mostrar los datos sin realizar esta consulta (con los datos recibidos
						por post), pero como se tiene que realizar una actualización de un registro de 
						la tabla, es recomendable ponerla para comprobar que los datos se han recibido correctamente
					*/
					$sql="SELECT * FROM producto WHERE cod='$codigo'";
					echo "<form id'form_actualiza' action='listado.php' method='post'>";
					// Mostramos los datos descativando la edición
					echo "<p>C&Oacute;DIGO: <b>$codigo</b></p>";
				  	echo "<p>NOMBRE: <b><input type='text' value='$nombre' disabled /></b></p>";
				  	echo "<p>NOMBRE CORTO: <b><input type='text' value='$nombre_corto' disabled /></b></p>";
					// como el campo descripción puede contener bastante texto, lo acortamos a 60 caracteres
					// y lo finalizamos poniendo puntos suspensivos
				  	echo "<p>DECRIPCI&Oacute;N: <b><input type='text' size='70' value='".substr($descripcion,0,60)."...' disabled /></b></p>";
				  	echo "<p>PVP: <b><input type='text' value='$PVP' disabled /></b></p>";
				  	echo "<p>FAMILIA: <b><input type='text' value='$familia' disabled /></b></p>";
					// Comprobamos si se ha pulsado el botón de actualizar
					if(isset($_POST['actualiza'])){
						// Comenzamos el proceso de actualización de datos
						$dwes->beginTransaction();
						// actualizamos los datos almacenados en el registro con los recibidos por post
						$sql = "UPDATE producto SET nombre='$nombre',nombre_corto='$nombre_corto',descripcion='$descripcion',PVP='$PVP' ";
						$sql .= "WHERE cod='$codigo'";
						// Ejecutamos la actualización y cambiamos el valor de ok si se ha producido un error
						if ($dwes->exec($sql) == 0) $ok = false;
						// si todo ha sido correcto se actualiza la tabla de forma definitiva
						if($ok==true){
							$dwes->commit();
							echo "<h2>Se han actualizado los datos</h2>";
						// si hubo algún error se deshace la actualización de los datos
						}else{
							$dwes->rollback();
							echo "<h2>NO HA SIDO POSIBLE ACTUALIZAR LOS DATOS</p>";
						}
						// Se libera la variable que contenía los datos de la base de datos
						unset($dwes);
					// Si hemos pulsado sobre el botón de cancelar
					}else{
						echo "<h2>Ha pulsado 'cancelar'</h2>";
					}
					// si pulsamos el botón de continuar nos vamos a la página principal
					// enviando el valor del código de la familia para que se vuelva a seleccionar
					// esa familia en el desplegable
					echo "<input type='hidden' name='cod' value='$familia' />";
					echo "<input type='submit' value='continuar' name='continua' />";
					echo "</form>";
				}

			?>
		</div>
	</body>
</html>