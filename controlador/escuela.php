<?php
if (!is_file("modelo/" . $pagina . ".php")) {
    echo "Falta definir la clase " . $pagina;
    exit;
}

require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {
    $o = new Gestionescuelas();

    if (!empty($_POST)) {
        $accion = $_POST['accion'];

        if ($accion == 'consultar') {
            // Consultar todas las escuelas
            $escuelas = $o->consultarescuelas();
            echo json_encode($escuelas);
        } elseif ($accion == 'obtener') {
            // Obtener datos de una escuela específica
            $o->setescuelaId($_POST['escuela_id']);
            $escuela = $o->obtenerescuelaPorId();
            echo json_encode($escuela);
        } elseif ($accion == 'incluir') {
            // Registrar nueva escuela
            $o->setNombre($_POST['nombre']);
            $o->setDireccion($_POST['direccion']);
            $o->setContactoTelefono($_POST['contacto_telefono']);
            echo $o->registrarescuela();
        } elseif ($accion == 'modificar') {
            // Actualizar escuela existente
            $o->setescuelaId($_POST['escuela_id']);
            $o->setNombre($_POST['nombre']);
            $o->setDireccion($_POST['direccion']);
            $o->setContactoTelefono($_POST['contacto_telefono']);
            echo $o->actualizarescuela();
        } elseif ($accion == 'eliminar') {
            // Eliminar escuela
            $o->setescuelaId($_POST['escuela_id']);
            echo $o->eliminarescuela();
        } /* elseif ($accion == 'generarOpciones') {
            // Generar opciones para select HTML
            echo $o->generarOpcionesescuelas();
        } */
        exit;
    }

    require_once("vista/" . $pagina . ".php");
} else {
    echo "Página en construcción";
}
