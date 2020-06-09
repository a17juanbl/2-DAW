/*
  He dividido la programación javascript entre este fichero y otro con el mismo
  nombre del fichero html. En este he puesto las funciones propias de los botones
  y la presentación, y en el otro la programación de la carga asíncrona de datos
*/

// Cuando se cargue la página se llama a la función comienzo
crearEvento(window,"load",comienzo);

/*
  Inicializamos las variables que usaremos para almacenar el nombre, el índice y
  la url que tenemos grabadas en la BD. También inicializamos el contador del total
  de registros y el del registro actual, así como la variable que recogerá si se ha
  seleccionado la opción de nuevo registro o de borrar.
*/
var miNombre=new Array;
var miIndice=new Array;
var miUrl=new Array;
var miReg=totalReg=0;
var miAccion="";

// Activamos los eventos de los botones y vemos cuántos registros tenemos en la BD
function comienzo(){
	crearEvento(anterior,'click',antes);
	crearEvento(siguiente,'click',despues);
	crearEvento(crearRSS,'click',creacion);
	crearEvento(borrarRSS,'click',borrado);
	crearEvento(campoSelect,'change',cambioOpcion);
	verRSS('numRSS','','');
}

// Si pulsamos en boton 'anterior' quitamos uno al número del registro actual
// y lo mostramos. Si es menor de cero lo iniciamos a cero y mostramos un mensaje
function antes(){
	miReg--;
	if(miReg<0){
		miReg=0;
		noMas("","NO EXISTEN ANTERIORES RSS");
	}else
		mostrar(miReg);
}

// Si pulsamos en boton 'siguiente' añadimos uno al número del registro actual
// y lo mostramos. Si se ha alcanzado el total de registros, lo avisamos
function despues(){
	miReg++;
	if(miReg>=miNombre.length){
		miReg=miNombre.length;
		noMas("","NO EXISTEN POSTERIORES RSS");
	}else
		mostrar(miReg);
}

// Muestra el registro que le pasemos como parámetro, si existe.
function mostrar(que){
	// Si existe el registro
	if(compruebaIndice(que)){
		// si hemos pulsado sobre el botón de añadir o el de borrar
		if(miAccion=='nueva'||miAccion=='borrar'){
			miAccion='';
			// Cargamos el primer registro, pero esperando un segundo para que podamos
			// ver antes, el mensaje de borrado o adicción
			setTimeout("verRSS('cargar','id',miIndice[0])",1000);
			// ponemos el registro actual a 0
			miReg=0;
		}else{
			// si no hemos pulsado sobre añadir o borrar carga el RSS que tenga el índice indicado
			verRSS('cargar','id',miIndice[que]);
			// ponemos el registro actual con el pasado por parámetro
			miReg=que;
		}
		// seleccionamos en el combo el registro pasado
		document.getElementById("campoSelect")[miReg].selected="selected";
	}else{
		// si intentamos mostrar un registro inexistente, lo avisamos
		noMas("","NO EXISTEN MÁS RSS");
	}
}

// cuando cambiamos de opción mediante los botones anterior/siguiente debemos
// seleccionar el registro adecuado en el combo
function cambioOpcion(){
	mostrar(document.getElementById("campoSelect").selectedIndex);
}

// Si hemos pulsado en el botón de borrar, querrá decir que deseamos eliminar el
// el registro que se está mostrando en estos momentos
function borrado(){
	// Si no confirmamos el borrado, no hará nada
	if(confirm("¿Seguro que desea borrar el registro de "+miNombre[miReg],"titulo")){
		// ponemos 'borrar' en la variable que se comprueba en la función 'mostrar'
		miAccion='borrar';
		// Borramos el registro actual
		verRSS('borrar','id',miIndice[miReg])
		// Avisamos que el registro ha sido borrado
		noMas("","RSS DE "+miNombre[miReg]+" BORRADO");
			// inicializamos las variables globales
			miNombre=miIndice=null;
			miNombre=new Array;
			miIndice=new Array;
			miReg=0;
		// Volvemos a mirar cuántos registros existen en la BD. Esta función también se
		// encargará de introducir todos los datos existentes en la recien inicializadas variables
		verRSS('numRSS','','');
	}
}

// Al pulsar en el botón 'Añadir RSS'
function creacion(){
	// ponemos 'nueva' en la variable que se comprueba en la función 'mostrar'
	miAccion='nueva';
	// Solicitamos, mediante cajas modales, la introducción de los dos datos que se
	// necesitan incluir
	var nombreM=prompt("Introduzca el nombre de la web","");
	var urlM=prompt("Introduzca la url que contiene el RSS","");
	// Si hemos tecleado algo en cada una de las dos preguntas
	if(nombreM!=''&&urlM!=''&&nombreM!=null&&urlM!=null){
		// creamos el nuevo registro
		verRSS(miAccion,'titulo='+nombreM+'&url',urlM);
		// Avisamos que el registro ha sido añadido
		noMas(urlM,"Registro "+nombreM+" añadido");
		// inicializamos las variables globales
		miNombre=miIndice=null;
		miNombre=new Array;
		miIndice=new Array;
		miReg=0;
		// Volvemos a mirar cuántos registros existen en la BD. Esta función también se
		// encargará de introducir todos los datos existentes en la recien inicializadas variables
		verRSS('numRSS','','');
	}else{
		// Si hemos dejado algún dato de los solicitados en blanco, lo avisamos y
		// no hacemos nada
		alert("No puede dejar ninguno de los datos en blanco");
		miAccion='';
	}
}

// Esta función será llamada para comprobar que el índice que se va a pasar
// coincide con un registro existente
function compruebaIndice(indi){
	if (miNombre[indi]==undefined||miNombre[indi]==null||miNombre[indi]==""){
		return false;
	}else{
		return true;
	}
}

// función que nos muestra el mensaje que le pasemos con efecto de fundido
function noMas(miTit,miMensa){
	$("#titulo").fadeOut(1).html("Lector de Titulares RSS con AJAX y jQuery >>> "+miTit).fadeIn(1000);
	$("#noticias").fadeOut(1).html("<h1 style='color:red;'>"+miMensa+"</h1>").fadeIn(1000);
}
