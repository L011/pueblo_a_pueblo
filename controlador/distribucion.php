<?php


if (is_file("vista/" . $pagina . ".php")) {
    //$o = new distribucion();

    if (!empty($_POST)) {
        $accion = $_POST['accion'] ?? 'Error';

        switch ($accion) {
            case 'consultarPendientes':
                echo json_encode($o->consultarEntregasPendientes());
                break;
            case 'consultarHistorial':
                echo json_encode($o->consultarHistorial());
                break;
            case 'calcular':
                $o->set_entregaId($_POST['entrega_id']);
                echo json_encode($o->calcularDistribucion());
                break;
            case 'confirmar':
                $o->set_entregaId($_POST['entrega_id']);
                $o->set_distribucion(json_decode($_POST['datos'], true));
                echo $o->confirmarDistribucion();
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