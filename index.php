<?php

require_once 'controladores/controlador.plantilla.php';

# Planes de entenamineto 
require_once 'modelos/modelo.planes.php';
require_once 'controladores/controlador.planes.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();