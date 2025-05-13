<?php
if (!is_file("modelo/" . $pagina . ".php")) {
    echo "Falta definir la clase " . $pagina;
    exit;
}
var_dump($pagina);
require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {
    $o = new escuela();
 
    if(!empty($_POST)){
        var_dump($_POST);
         
        
        if (isset($_POST['accion'])) {
            $accion = $_POST['accion'];
            echo $accion;
            } else {
                $accion = "Error"; // o algún otro valor por defecto
            }

       
        if ($accion == 'consultar') {
            // Consultar todas las escuelas
            $escuelas = $o->consultarescuelas();
            echo json_encode($escuelas);
        } elseif ($accion == 'obtener') {
            // Obtener datos de una escuela específica
            $o->set_escuelaId($_POST['escuela_id']);
            $escuela = $o->obtenerescuelaPorId();
            echo json_encode($escuela);
        }elseif ($accion == 'incluir') {
             echo "Este es un mensaje de ejemplo.";

            // Registrar nueva escuela
            $o->set_Nombre($_POST['nombre']);
            $o->set_direccion($_POST['direccion']);
            $o->set_circuito($_POST['circuito']);
            $o->set_Contacto($_POST['contacto']);
            $o->set_telefono($_POST['telefono']);
            $o->set_matricula($_POST['matricula']);
            echo $o->registrarescuela();
        }
          elseif ($accion == 'modificar') {
            // Actualizar escuela existente
            $o->set_escuelaId($_POST['escuela_id']);
            $o->set_Nombre($_POST['nombre']);
            $o->set_direccion($_POST['direccion']);
            $o->set_circuito($_POST['circuito']);
            $o->set_Contacto($_POST['contacto']);
            $o->set_telefono($_POST['telefono']);
            echo $o->actualizarescuela();
        } elseif ($accion == 'eliminar') {
            // Eliminar escuela
            $o->set_escuelaId($_POST['escuela_id']);
            echo $o->eliminarescuela();
        } elseif ($accion == 'Error') {
            echo "Ocurrio un error";
        }

        /* elseif ($accion == 'generarOpciones') {
                // Generar opciones para select HTML
                echo $o->generarOpcionesescuelas();
            } */
        exit;
    }

    require_once("vista/" . $pagina . ".php");
} else {
    echo "Página en construcción";
}
?>
