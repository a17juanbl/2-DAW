<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Tarea 5: Cesta de la Compra con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Cesta de la compra</h1>
  </div>
  <div id="productos">
{* Para calcular en la plantilla el coste se podría hacer
    {assign var="coste" value="0"} *}
    {foreach from=$productoscesta item=producto}
        <p>
            <span class='codigo'>{$producto->getcodigo()}</span>
            <span class='nombre'>{$producto->getnombre()}</span>
            <span class='precio'>{$producto->getPVP()}</span>
        </p>
    {/foreach}
    <hr />
    <p><span class='pagar'>Precio total: {$coste} €</span></p>
    <form action='pagar.php' method='post'>
        <p><span class='pagar'>
            <input type='submit' name='pagar' class='boton' value='Pagar'/>
        </span></p>
    </form>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        {* Este botón también lo he puesto del mismo tipo que los demás *}
        <input type='submit' name='desconectar' class='boton' style='width:100%;' value='Desconectar usuario {$usuario}'/>
    </form>        
  </div>
</div>
</body>
</html>
