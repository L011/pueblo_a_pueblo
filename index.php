<?php //etiqueta de apertura para codigo php
//ARCHIVO index.php 
//Se conoce como "From controller"
//es el encargado de direccionar todo el flujo de las
//paginas en nuetro sitio web

session_start();


//$pagina, Variable que se recibe por GET y que indica que
//pagina sera cargada, se le asigna un valor por defecto
//en este caso principal para cuando se carga por primera vez
 
$pagina = "inicio"; 


//condicional que lee la solicitud
//de cambio de pagina  
 if (!empty($_GET['pagina'])){ //si no esta vacia la variable $pagina que viene por get
   $pagina = $_GET['pagina'];  //cambia el valor de $pagina por el obtenido por GET
 }
 
if (is_file("controlador/".$pagina.".php")) {
    // si la página existe, la incluimos
    require_once("controlador/".$pagina.".php");
} else {
    // si la página no existe, mostramos una página de error 404
    require_once("controlador/error404.php");
}
?> 
