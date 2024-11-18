<?php

require_once 'controladores/controlador.plantilla.php';

#require_once 'modelos/modelo.usuarios.php';
#require_once 'controladores/usuarios.controlador.php';

require_once "modelos/modelo.clientes.php";
require_once "controladores/controlador.clientes.php";

require_once "modelos/modelo.entrenadores.php";
require_once "controladores/controlador.entrenadores.php";

# Planes de entenamineto 
require_once 'modelos/modelo.planes.php';
require_once 'controladores/controlador.planes.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();