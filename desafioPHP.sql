-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-11-2018 a las 14:04:51
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafioPHP`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aula`
--

CREATE TABLE `Aula` (
  `id_aula` int(3) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Aula`
--

INSERT INTO `Aula` (`id_aula`, `descripcion`) VALUES
(203, 'Informatica'),
(204, 'comercio'),
(117, 'usos multiples');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `Descripcion`) VALUES
(1, '8.30-9.25'),
(2, '9.25-10.20'),
(3, '10.20-11.15'),
(4, '11.45-12.40'),
(5, '12.40-13.35'),
(6, '13.35-14.30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reserva`
--

CREATE TABLE `Reserva` (
  `CorreoUsusario` varchar(30) NOT NULL,
  `id_aula` int(1) NOT NULL,
  `id_horario` int(1) NOT NULL,
  `fecha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `id` int(1) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`id`, `descripcion`) VALUES
(1, 'Profesor'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RolAsignado`
--

CREATE TABLE `RolAsignado` (
  `CorreoUsusario` varchar(30) NOT NULL,
  `IdRol` int(1) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `RolAsignado`
--

INSERT INTO `RolAsignado` (`CorreoUsusario`, `IdRol`, `id`) VALUES
('fernando@gmail.com', 1, 1),
('fernando@gmail.com', 2, 2),
('troodycdaw@gmail.com', 1, 3),
('miki@gmail.com', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(30) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `pass`, `nombre`, `foto`) VALUES
('fernando@gmail.com', 'Abc123', 'fernando', ''),
('miki@gmail.com', 'Abc123', 'daw206', './Imagenes/miki@gmail.com.jpg'),
('troodycdaw@gmail.com', 'Abc123', 'Miguel', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `RolAsignado`
--
ALTER TABLE `RolAsignado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `RolAsignado`
--
ALTER TABLE `RolAsignado`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
