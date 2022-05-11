-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 22:22:20
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_actividades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividades`
--

CREATE TABLE `tbl_actividades` (
  `id` int(11) NOT NULL,
  `correo_act` varchar(50) NOT NULL,
  `titulo_act` varchar(50) NOT NULL,
  `desc_act` varchar(100) NOT NULL,
  `foto_act` varchar(50) NOT NULL,
  `hora_act` varchar(30) NOT NULL,
  `opcion_act` varchar(7) NOT NULL,
  `topic_act` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_actividades`
--

INSERT INTO `tbl_actividades` (`id`, `correo_act`, `titulo_act`, `desc_act`, `foto_act`, `hora_act`, `opcion_act`, `topic_act`) VALUES
(23, 'yeray@gmail.com', 'Barça', 'Ian LPD', 'b436e5e7a86ae83e4eced0b4a6cd5ca3.jpg', '07-05-2022 (15:36:31)', 'Publico', 'Matematicas'),
(24, 'yeray@gmail.com', 'Barça', 'careto de ibai', 'Ibai-Llanos.jpg', '07-05-2022 (16:42:47)', 'Publico', 'Matematicas'),
(25, 'yeray@gmail.com', 'Madrid', 'Vardird', 'sf.PNG', '07-05-2022 (16:43:54)', 'Publico', 'Informatica'),
(26, 'yeray@gmail.com', 'Informatica', 'Info', 'juez.jpg', '07-05-2022 (16:44:28)', 'Publico', 'Informatica'),
(28, 'yeray@gmail.com', 'Barça', 'Barça', 'b436e5e7a86ae83e4eced0b4a6cd5ca3.jpg', '07-05-2022 (16:45:23)', 'Privado', 'Matematicas'),
(29, 'yeray@gmail.com', 'gato', 'gatos', 'asdsad.PNG', '07-05-2022 (16:46:51)', 'Publico', 'Matematicas'),
(30, 'yeray@gmail.com', 'Nano primero', 'El nano va a ser primero este gran premio de miami platja', 'pista1.jpg', '07-05-2022 (17:12:44)', 'Publico', 'Informatica'),
(31, 'yeray@gmail.com', 'Barça', 'Barça', 'b436e5e7a86ae83e4eced0b4a6cd5ca3.jpg', '09-05-2022 (19:31:40)', 'Publico', 'Matematicas'),
(32, 'yeray@gmail.com', 'Informatica', 'Informatica', 'bartdanny.jpg', '10-05-2022 (12:06:00)', 'Publico', 'Informatica'),
(33, 'yeray@gmail.com', 'Informatica', 'Vardird', 'flat,750x,075,f-pad,750x1000,f8f8f8.jpg', '10-05-2022 (17:50:40)', 'Publico', 'Informatica'),
(34, 'yeray@gmail.com', 'Guillem', 'careto de ibai', 'Ibai-Llanos.jpg', '11-05-2022 (11:48:01)', 'Publico', 'Matematicas'),
(35, 'yeray@gmail.com', 'efdfg', 'Ian LPD', 'Ibai-Llanos.jpg', '11-05-2022 (20:16:51)', 'Publico', 'Matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id_like` int(11) NOT NULL,
  `usuario_fk` int(11) NOT NULL,
  `actividad_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_like`
--

INSERT INTO `tbl_like` (`id_like`, `usuario_fk`, `actividad_fk`) VALUES
(15, 13, 24),
(16, 13, 23),
(17, 13, 25),
(20, 13, 23),
(21, 13, 23),
(22, 13, 23),
(23, 13, 23),
(24, 13, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `contra_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nombre_usuario`, `email_usuario`, `contra_usuario`) VALUES
(1, 'guillem', 'guillem@gmail.com', '5c64152cbbe77fa550a73b8eb6be37f15e339acc'),
(13, 'yeray', 'yeray@gmail.com', '5c64152cbbe77fa550a73b8eb6be37f15e339acc');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actividades`
--
ALTER TABLE `tbl_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_actividades`
--
ALTER TABLE `tbl_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
