-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 21:35:11
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
-- Base de datos: `caminata_parejasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Estudiantes Universitarios'),
(2, 'Comunidad Universitaria'),
(3, 'Universitaria Mixta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_parejas`
--

CREATE TABLE `miembros_parejas` (
  `id_pareja` int(11) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros_parejas`
--

INSERT INTO `miembros_parejas` (`id_pareja`, `cedula`) VALUES
(1, 29699505),
(1, 12345678),
(2, 87654321),
(2, 88888888),
(3, 12345679),
(3, 12345670),
(4, 11111111),
(4, 22222222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `id_pareja` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_universidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`id_pareja`, `id_categoria`, `id_universidad`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 1),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `nombre2` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `sexo` int(3) NOT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`cedula`, `nombre`, `nombre2`, `apellido`, `apellido2`, `sexo`, `id_rol`) VALUES
(11111111, 'a', 'a', 'A', 'A', 1, 3),
(12345670, 'Angel', 'Gabriel', 'Chaparro', 'Chaparro', 0, 2),
(12345678, 'Luis', 'Aron', 'Rojas', 'Porras', 1, 1),
(12345679, 'Ulardio', 'Pablo', 'Parra', 'Parra', 1, 1),
(22222222, 'bb', 'bb', 'BB', 'BB', 0, 2),
(29699505, 'Jhosmar', 'David', 'Suarez', 'Contreras', 0, 1),
(87654321, 'Jesus', 'Manuel', 'Perez', 'Perez', 0, 3),
(88888888, 'Ashly', 'Hanneiker', 'Torres', 'Algo', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `id_pareja` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `lugar` int(11) NOT NULL,
  `tiempo` time(2) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'descalificado o participando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `id_pareja`, `id_categoria`, `lugar`, `tiempo`, `status`) VALUES
(11, 1, 1, 1, '00:00:09.41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Estudiante'),
(2, 'Profesor'),
(3, 'Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE `universidades` (
  `id_universidad` int(11) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `universidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id_universidad`, `siglas`, `universidad`) VALUES
(1, 'UNEFA', 'Universidad Nacional Experimental Politécnica de las Fuerzas Armadas'),
(2, 'ULA', 'Universidad de los Andes'),
(3, 'UNES', 'Universidad Nacional Experimental de la Seguridad'),
(4, 'UNET', 'Universidad Nacional Experimental del Táchira'),
(5, 'UPTAI', 'Universidad Politécnica Territorial Agroindustrial del Estado Táchira'),
(6, 'UBA', 'Universidad Bicentenaria de Aragua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'chaparro', '1234');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_resultados_parejas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_resultados_parejas` (
`pareja` int(11)
,`categoria` int(11)
,`universidad` varchar(10)
,`lugar` int(11)
,`tiempo` time(2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_resultados_parejas`
--
DROP TABLE IF EXISTS `v_resultados_parejas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_resultados_parejas`  AS   (select `a`.`id_pareja` AS `pareja`,`e`.`id_categoria` AS `categoria`,`d`.`siglas` AS `universidad`,`f`.`lugar` AS `lugar`,`f`.`tiempo` AS `tiempo` from (((`parejas` `a` join `universidades` `d` on(`d`.`id_universidad` = `a`.`id_universidad`)) join `categorias` `e` on(`e`.`id_categoria` = `a`.`id_categoria`)) left join `resultados` `f` on(`f`.`id_pareja` = `a`.`id_pareja`)) order by `a`.`id_categoria` <> 0 and `f`.`lugar` <> 0)  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `miembros_parejas`
--
ALTER TABLE `miembros_parejas`
  ADD KEY `fk_id_pareja` (`id_pareja`),
  ADD KEY `fk_cedula` (`cedula`);

--
-- Indices de la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD PRIMARY KEY (`id_pareja`),
  ADD KEY `fk_id_universidad` (`id_universidad`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `fk_id_pareja1` (`id_pareja`),
  ADD KEY `fk_id_categoria1` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`id_universidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `id_universidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `miembros_parejas`
--
ALTER TABLE `miembros_parejas`
  ADD CONSTRAINT `fk_cedula` FOREIGN KEY (`cedula`) REFERENCES `participantes` (`cedula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pareja` FOREIGN KEY (`id_pareja`) REFERENCES `parejas` (`id_pareja`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_universidad` FOREIGN KEY (`id_universidad`) REFERENCES `universidades` (`id_universidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_id_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pareja1` FOREIGN KEY (`id_pareja`) REFERENCES `parejas` (`id_pareja`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
