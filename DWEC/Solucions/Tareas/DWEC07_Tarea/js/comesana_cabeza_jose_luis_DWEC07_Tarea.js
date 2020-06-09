/*
  En este fichero he colocado toda la programación de la carga asíncrona de datos
*/
 
// función que crea un nuevo objeto XHR y que llama a la función que carga de
// forma asíncrona los datos de la BD que obtenemos con el fichero php
function verRSS(funcion,opcion,cadena){
	// mostramos con fundido el logo carga ajax
	activarIndicadorAjax();
	// creamos un objeto XHR en miXHR
	miXHR=objetoXHR();
	// si hemos enviado parámetros de opcion y cadena los ponemos en miFinal
	// Esto sólo ocurre con el parámetro de 'nueva', que le hemos de pasar 'id' y
	// 'url' además de la accion de 'nueva'
	var miFinal='';
	if(opcion!=''&&cadena!='')
		miFinal="&"+opcion+"="+cadena;
	// cargamos de forma asíncrona los datos recogidos mediante la acción indicada
	cargarAsync("rss.php?accion="+funcion+miFinal,preparado);
}

// función que se llama cuando se han cargado datos de la BD
function preparado(){
	// Si se ha completado la carga y todo es correcto
	if (miXHR.readyState==4 && miXHR.status==200){
		// Se inicializan las variables locales
		var texto="";
		var miFecha=null;
		var opcio=0;
		// Se inicializa la variable que contendrá el número de elementos RSS
		totalReg=0;
		// Se capturan los posibles errores
		try{
			// Se recogen los valores devueltos por la carga de datos asíncrona
			var resultados=eval('('+miXHR.responseText+')');
				// Si la longitud es distinta de null quiere decir que contiene datos RSS
				if(resultados.length!=null){
					// Se comienza poniendo el título de quien ofrece el servicio de RSS
					texto+="<h1>RSS Ofrecido por: "+miNombre[miReg]+"</h1>";
					// Se ponen todas las noticias que contenga el RSS
					for (var i=0; i < resultados.length; i++){
						objeto = resultados[i];
						miFecha=new Date(objeto.fecha);
						// Ponemos el título de la noticia que nos servirá de enlace a la misma
						texto+="<h3><a href='"+objeto.url+"' target='blank' title='"+objeto.titulo+"'>"+objeto.titulo+"</a></h3>";
						// Incluyo la fecha de la noticia en formato dd/mm/aaaa
						texto+="Fecha: "+miFecha.getDate()+"/"+(miFecha.getMonth()+1)+"/"+miFecha.getFullYear();
						// Inlcuyo la hora de la noticia en formato hh:mm
						texto+="  -  Hora: "+miFecha.getHours()+":"+miFecha.getMinutes();
						// terminamos con la descripción de la noticia y una línea horizontal de separación
						texto+="<br />"+objeto.descripcion+"<hr />";
					}
					// llamamos a la función que nos imprimirá el título del RSS y el contenido
					noMas(miNombre[miReg],texto);
				}else if(resultados>=0){
					// Si recibimos un número positivo será el número de registros y los introducimos en totalReg
					totalReg=resultados;
					// ponemos el registro actual a 0 (el primero)
					miReg=0;
					// ya sabemos cuántos hay, y ahora vemos cuáles son
					verRSS('recursosRSS','','');
				}else{
					// si el valor es null es que ya se han cargado todos los datos necesarios
					// por lo que se pondrá el combo con sus datos y se mostrará el primer RSS (el 0)
					miCombo(totalReg,resultados);
					mostrar(0);
				}
			}catch(unError){
				// si no se han podido cargar los datos de un RSS del que sí se recibe el nombre y la dirección
				// se muestra como título la url que tiene el registro rss que se indica en el cuerpo
				noMas(miUrl[miReg],"<h3 style='color:red;'>No se ha podido cargar el RSS de:</h3><h1>"+miNombre[miReg]+"</h1>");
			}
			// Desactivamos el indicador AJAX cuando termina la petición
			desactivarIndicadorAjax();
		}
	}

	// Función para crear o restablecer el combo cada vez que exista algún cambio
	// Recibe el número de elementos y los elementos
	function miCombo(totRSS,resul){
		// indicamos la longitud del combo (el número de elementos)
		document.getElementById("campoSelect").length=totRSS;
		var alfa=0;
		// Recorremos cada uno de los elementos recibidos incluyéndolo en el combo
		for(miObjeto in resul){
			// cargamos los arrays globales con cada uno de los datos
			miNombre[alfa]=resul[miObjeto]['titulo'];
			miIndice[alfa]=resul[miObjeto]['id'];
			miUrl[alfa]=resul[miObjeto]['url'];
			// incluimos en el combo el nombre del RSS y el índice que tiene grabado
			document.getElementById("campoSelect").options[alfa]=new Option(miNombre[alfa],miIndice[alfa]);
			alfa++;
		}
		// Dejamos seleccionada la primera de las opciones
		document.getElementById("campoSelect").options[0].selected="selected";
	}