-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2020 a las 15:44:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `editorial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copy`
--

CREATE TABLE `copy` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_record` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `pages` smallint(5) UNSIGNED NOT NULL,
  `copies` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial_branch`
--

CREATE TABLE `editorial_branch` (
  `code` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial_branch`
--

INSERT INTO `editorial_branch` (`code`, `address`, `phone`) VALUES
(1, 'Cal-64#34', '3214785'),
(2, 'Diag 48 No 36', '5647895'),
(3, 'Car34#64-20', '5478545'),
(4, 'Diag35-96Sur', '4578954'),
(5, 'Car 58 54 este Sur', '3547856'),
(6, 'Car 57 # 45-20', '3214785'),
(7, 'Cal 63 # 87 - 20', '5478563'),
(8, 'Diag 6 47 # 75 - 12', '21478566'),
(9, 'Car 65 # 32 50', '4785623547'),
(10, 'Car 63 # 20 - 66', '854653');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial_branch_magazine`
--

CREATE TABLE `editorial_branch_magazine` (
  `code_editorial_branch` int(10) UNSIGNED NOT NULL,
  `number_record` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `citizenship_card` varchar(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname1` varchar(50) NOT NULL,
  `lastname2` varchar(50) DEFAULT NULL,
  `phone` varchar(9) DEFAULT NULL,
  `code_editorial_branch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journalist`
--

CREATE TABLE `journalist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname1` varchar(50) NOT NULL,
  `lastname2` varchar(50) DEFAULT NULL,
  `phone` varchar(9) DEFAULT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journalist_magazine`
--

CREATE TABLE `journalist_magazine` (
  `number_record` int(10) UNSIGNED NOT NULL,
  `id_journalist` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magazine`
--

CREATE TABLE `magazine` (
  `number_record` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `frequency` enum('weekly','monthly','yearly') DEFAULT 'weekly',
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_record` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `extension` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nick`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_record` (`number_record`);

--
-- Indices de la tabla `editorial_branch`
--
ALTER TABLE `editorial_branch`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `editorial_branch_magazine`
--
ALTER TABLE `editorial_branch_magazine`
  ADD PRIMARY KEY (`code_editorial_branch`,`number_record`),
  ADD KEY `number_record` (`number_record`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citizenship_card` (`citizenship_card`),
  ADD KEY `code_editorial_branch` (`code_editorial_branch`);

--
-- Indices de la tabla `journalist`
--
ALTER TABLE `journalist`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `journalist_magazine`
--
ALTER TABLE `journalist_magazine`
  ADD PRIMARY KEY (`number_record`,`id_journalist`),
  ADD KEY `id_journalist` (`id_journalist`);

--
-- Indices de la tabla `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`number_record`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_record` (`number_record`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `copy`
--
ALTER TABLE `copy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editorial_branch`
--
ALTER TABLE `editorial_branch`
  MODIFY `code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `journalist`
--
ALTER TABLE `journalist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `magazine`
--
ALTER TABLE `magazine`
  MODIFY `number_record` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `copy_ibfk_1` FOREIGN KEY (`number_record`) REFERENCES `magazine` (`number_record`);

--
-- Filtros para la tabla `editorial_branch_magazine`
--
ALTER TABLE `editorial_branch_magazine`
  ADD CONSTRAINT `editorial_branch_magazine_ibfk_1` FOREIGN KEY (`code_editorial_branch`) REFERENCES `editorial_branch` (`code`),
  ADD CONSTRAINT `editorial_branch_magazine_ibfk_2` FOREIGN KEY (`number_record`) REFERENCES `magazine` (`number_record`);

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`code_editorial_branch`) REFERENCES `editorial_branch` (`code`);

--
-- Filtros para la tabla `journalist_magazine`
--
ALTER TABLE `journalist_magazine`
  ADD CONSTRAINT `journalist_magazine_ibfk_1` FOREIGN KEY (`number_record`) REFERENCES `magazine` (`number_record`),
  ADD CONSTRAINT `journalist_magazine_ibfk_2` FOREIGN KEY (`id_journalist`) REFERENCES `journalist` (`id`);

--
-- Filtros para la tabla `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`number_record`) REFERENCES `magazine` (`number_record`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
