-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2024 a las 03:39:41
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
  `categoria` varchar(40) DEFAULT NULL,
  `siglas` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `siglas`) VALUES
(1, 'Estudiantes Universitarios', 'E.U.'),
(2, 'Comunidad Universitaria', 'C.U.'),
(3, 'Universitaria Mixta', 'U.M.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_parejas`
--

CREATE TABLE `miembros_parejas` (
  `id_pareja` int(11) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `id_pareja` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_universidad` int(11) NOT NULL,
  `falta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura Stand-in para la vista `v_participantes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_participantes` (
`pareja` int(11)
,`cedula` int(11)
,`nombre` varchar(20)
,`nombre2` varchar(20)
,`apellido` varchar(20)
,`apellido2` varchar(20)
,`sexo` int(3)
,`rol` int(11)
);

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
-- Estructura para la vista `v_participantes`
--
DROP TABLE IF EXISTS `v_participantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_participantes`  AS   (select `m`.`id_pareja` AS `pareja`,`p1`.`cedula` AS `cedula`,`p1`.`nombre` AS `nombre`,`p1`.`nombre2` AS `nombre2`,`p1`.`apellido` AS `apellido`,`p1`.`apellido2` AS `apellido2`,`p1`.`sexo` AS `sexo`,`p1`.`id_rol` AS `rol` from (`miembros_parejas` `m` join `participantes` `p1` on(`p1`.`cedula` = `m`.`cedula`)))  ;

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
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

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
