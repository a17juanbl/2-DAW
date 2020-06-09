// función para añadir productos a la cesta
function anadeCesta(){
	// recogemos el valor introducido en el campo 'cod' del formulario
	var producto = document.getElementById("cod").value;
	// recuperamos el número aleatorio de esta sesión
	var micod=document.getElementById("numAle").value;
	// llamamos a la función php 'anadirCesta' pasándole el valor recogido anteriormente y la sesión actual
	var respuesta = xajax.request({xjxfun:"anadirCesta"}, {mode:"synchronous", parameters: [producto,micod]});
	// devolvemos el valor obtenido por la función anterior
	return respuesta;
}

// función para vaciar la cesta
function vaciaCesta(){
	// llamamos a la función php 'vaciarCesta' sin enviarle ningún parámetro
	var respuesta = xajax.request({xjxfun:"vaciarCesta"}, {mode:"synchronous"});
	// devolvemos la palabra 'vaciar' para indicar que se ha ejecutado ese proceso
	return "vaciar";
}

// función que nos muestra los artículos existentes en la cesta
function muestraCesta(){
	// llamamos a la función php 'mostrarCesta' sin enviarle ningún parámetro
	var respuesta = xajax.request({xjxfun:"mostrarCesta"}, {mode:"synchronous"});
	// devolvemos la palabra 'comprar' para indicar que se ha ejecutado ese proceso
	return "comprar";
}