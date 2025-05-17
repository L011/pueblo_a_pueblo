<?php
/* if (!is_file("modelo/" . $pagina . ".php")) {
    echo "Falta definir la clase " . $pagina;
    exit;
}
require_once("modelo/" . $pagina . ".php"); */

if (is_file("vista/" . $pagina . ".php")) {
   // $o = new inventario();

    if (!empty($_POST)) {
        $accion = $_POST['accion'] ?? 'Error';

        switch ($accion) {
            case 'consultar':
                echo json_encode($o->consultarEntradas());
                break;
            case 'registrar':
                $o->set_fecha($_POST['fecha']);
                $o->set_proveedor($_POST['proveedor']);
                $o->set_categoria($_POST['categoria']);
                $o->set_peso($_POST['peso']);
                $o->set_notas($_POST['notas']);
                echo $o->registrarEntrada();
                break;
            case 'eliminar':
                $o->set_id($_POST['id']);
                echo $o->eliminarEntrada();
                break;
            default:
                echo "Acción no válida";
        }
        exit;
    }

    require_once("vista/" . $pagina . ".php");
} else {
    echo "Página en construcción";
}
?>