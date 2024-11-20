<?php

# Plantilla 
require_once 'controladores/controlador.plantilla.php';

# Usuarios
#require_once 'modelos/modelo.usuarios.php';
#require_once 'controladores/usuarios.controlador.php';

# Clientes
require_once "modelos/modelo.clientes.php";
require_once "controladores/controlador.clientes.php";

# Entremadores
require_once "modelos/modelo.entrenadores.php";
require_once "controladores/controlador.entrenadores.php";

# Especialidades
require_once "controladores/controlador.especialidades.php";
require_once "modelos/modelo.especialidades.php";

# Planes de entenamineto 
require_once 'modelos/modelo.planes.php';
require_once 'controladores/controlador.planes.php';

# Metodos de pagos
#require_once 'modelos/modelo.pagos.php';
#require_once 'controladores/controlador.pagos.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();