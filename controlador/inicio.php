<?php

if (is_file("vista/" . $pagina . ".php")) {

    
    require_once("vista/" . $pagina . ".php");
} else {
    echo "pagina principal en construccion";
}
?>