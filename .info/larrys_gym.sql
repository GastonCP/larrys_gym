-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 14:13:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `larrys_gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_inscripcion` date NOT NULL DEFAULT curdate(),
  `id_plan` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `dni`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `fecha_inscripcion`, `id_plan`, `estado`) VALUES
(1, '12345678', 'Juan Modificado2', 'Pérez', '1990-05-12', 'Calle Falsa 123', '1234567890', 'juan.perez@example.com', '2023-01-01', 1, 1),
(2, '87654321', 'María', 'Gómez', '1985-11-22', 'Av. Siempreviva 742', '0987654321', 'maria.gomez@example.com', '2023-02-15', 2, 1),
(4, '99887766', 'Laura', 'Martínez', '2000-02-20', 'Av. de la Paz 67', '9988776655', 'laura.martinez@example.com', '2023-04-25', 1, 1),
(5, '33445566', 'Luis', 'Hernández', '1992-09-30', 'Calle Luna 89', '3344556677', 'luis.hernandez@example.com', '2023-05-18', NULL, 1),
(6, '66778899', 'Ana', 'Rodríguez', '1988-12-15', 'Av. del Mar 12', '6677889900', 'ana.rodriguez@example.com', '2023-06-05', 3, 1),
(7, '44556677', 'Pedro', 'García', '1998-06-25', 'Calle Estrella 34', '4455667788', 'pedro.garcia@example.com', '2023-07-09', 1, 1),
(8, '77889900', 'Lucía', 'Sánchez', '1993-03-14', 'Av. Libertad 56', '7788990011', 'lucia.sanchez@example.com', '2023-08-12', 2, 1),
(9, '55667788', 'Sofía', 'Díaz', '1997-07-07', 'Calle Primavera 78', '5566778899', 'sofia.diaz@example.com', '2023-09-21', 3, 1),
(10, '99001122', 'Miguel', 'Fernández', '1983-10-03', 'Av. Victoria 90', '9900112233', 'miguel.fernandez@example.com', '2023-10-11', 1, 1),
(12, '987655434', 'Héctor', 'Avalos', '2024-11-22', 'Rivoli 977', '03454068902', 'naruto101@hotmail.com.ar', '2024-11-05', 1, 1),
(13, '38000000', 'Gaston', 'Casino', '2024-10-31', 'mi casa 123', '5493454000000', 'email@gmail.com', '2024-11-20', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id_entrenador` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_contratacion` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id_entrenador`, `dni`, `nombre`, `apellido`, `telefono`, `email`, `fecha_contratacion`, `estado`) VALUES
(1, '12345678A', 'Carlos', 'Pérez', '555-1234', 'carlos.perez@example.com', '2023-01-15', 1),
(2, '87654321B', 'Ana', 'Gómez', '555-5678', 'ana.gomez@example.com', '2023-03-10', 1),
(3, '11223344C', 'Luis', 'Martínez', '555-9101', 'luis.martinez@example.com', '2022-11-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador_especialidades`
--

CREATE TABLE `entrenador_especialidades` (
  `id_entrenador` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenador_especialidades`
--

INSERT INTO `entrenador_especialidades` (`id_entrenador`, `id_especialidad`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 1),
(3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre_especialidad`) VALUES
(1, 'Musculación Mod'),
(2, 'Yoga'),
(3, 'Pilates'),
(4, 'CrossFit'),
(5, 'Natación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_entrenamiento`
--

CREATE TABLE `planes_entrenamiento` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL COMMENT 'Duración en semanas o meses',
  `sesiones` int(11) NOT NULL COMMENT 'Cantidad de sesiones por semana',
  `id_entrenador` int(11) NOT NULL,
  `precio` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes_entrenamiento`
--

INSERT INTO `planes_entrenamiento` (`id_plan`, `nombre_plan`, `duracion`, `sesiones`, `id_entrenador`, `precio`) VALUES
(1, 'Plan Básico', 1, 2, 1, 1000.00),
(2, 'Plan Intermedio', 3, 3, 2, 2500.00),
(3, 'Plan Avanzado', 6, 5, 3, 5000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_plan_cliente` (`id_plan`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id_entrenador`);

--
-- Indices de la tabla `entrenador_especialidades`
--
ALTER TABLE `entrenador_especialidades`
  ADD PRIMARY KEY (`id_entrenador`,`id_especialidad`),
  ADD KEY `fk_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `planes_entrenamiento`
--
ALTER TABLE `planes_entrenamiento`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `fk_plan_entrenador` (`id_entrenador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `planes_entrenamiento`
--
ALTER TABLE `planes_entrenamiento`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_plan_cliente` FOREIGN KEY (`id_plan`) REFERENCES `planes_entrenamiento` (`id_plan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenador_especialidades`
--
ALTER TABLE `entrenador_especialidades`
  ADD CONSTRAINT `fk_entrenador` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenadores` (`id_entrenador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes_entrenamiento`
--
ALTER TABLE `planes_entrenamiento`
  ADD CONSTRAINT `fk_plan_entrenador` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenadores` (`id_entrenador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
