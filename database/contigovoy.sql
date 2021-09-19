-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-09-2021 a las 01:32:08
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contigovoy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `hour` time NOT NULL,
  `status` enum('aceptado','rechazado','pendiente') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `patient_id`, `day`, `hour`, `status`) VALUES
(1, 2, 10, '2021-09-30', '11:00:00', 'pendiente'),
(2, 2, 10, '2021-09-30', '12:00:00', 'pendiente'),
(3, 2, 4, '2021-09-17', '12:00:00', 'pendiente'),
(4, 2, 4, '2021-09-17', '11:00:00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `body`, `excerpt`, `image`, `created_at`) VALUES
(1, 'Primer ', 'primer-post', 'ASDSADSASASDSADSSADSAD', 'ASDASDSADSSADSAD', 'SADASDASDAS', '2021-09-15 04:40:37');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `citasdedoctor`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `citasdedoctor` (
`id` int(11)
,`day` date
,`hour` time
,`status` enum('aceptado','rechazado','pendiente')
,`doctor_id` int(11)
,`patient_id` int(11)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `citasdepaciente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `citasdepaciente` (
`id` int(11)
,`day` date
,`hour` time
,`status` enum('aceptado','rechazado','pendiente')
,`doctor_id` int(11)
,`patient_id` int(11)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','doctor','paciente','') NOT NULL DEFAULT 'paciente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `role`) VALUES
(1, 'admin@example.test', 'Admin', 'Admin', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'admin'),
(2, 'doctor1@example.test', 'Wendy Aylas Martínez\n', 'wendyA', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'doctor'),
(3, 'doctor2@example.test', 'Ana Vizcarra Sajami\n', 'AnaV', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'doctor'),
(4, 'example@test.com', 'Usuario Prueba', 'usertest', '$2y$10$rxkNGylxYPQSShqCYCRA..Yr27Xm9DPtT3fkosvwhM.1Z3Oneyk3q', 'paciente'),
(10, 'asdas@gmail.com', 'Brayan Vilchez', 'brayandaga', '$2y$10$hZLRFhNUkZ990ErNWnVHkOd3AB3FOm.jBp7nFfbxLoWSVEYcPy8aG', 'paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workdays`
--

CREATE TABLE `workdays` (
  `id` int(11) NOT NULL,
  `morning_start` time NOT NULL,
  `morning_end` time NOT NULL,
  `afternoon_start` time NOT NULL,
  `afternoon_end` time NOT NULL,
  `day` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `workdays`
--

INSERT INTO `workdays` (`id`, `morning_start`, `morning_end`, `afternoon_start`, `afternoon_end`, `day`, `user_id`) VALUES
(1, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 0, 2),
(2, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 1, 2),
(3, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 2, 2),
(4, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 3, 2),
(5, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 4, 2),
(6, '10:00:00', '13:00:00', '13:00:00', '14:00:00', 5, 2),
(7, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 0, 3),
(8, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 1, 3),
(9, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 2, 3),
(10, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 3, 3),
(11, '10:00:00', '13:00:00', '15:00:00', '19:00:00', 4, 3),
(12, '10:00:00', '13:00:00', '13:00:00', '14:00:00', 5, 3);

-- --------------------------------------------------------

--
-- Estructura para la vista `citasdedoctor`
--
DROP TABLE IF EXISTS `citasdedoctor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `citasdedoctor`  AS SELECT `app`.`id` AS `id`, `app`.`day` AS `day`, `app`.`hour` AS `hour`, `app`.`status` AS `status`, `app`.`doctor_id` AS `doctor_id`, `app`.`patient_id` AS `patient_id`, `us`.`name` AS `name` FROM (`appointments` `app` left join `users` `us` on((`app`.`patient_id` = `us`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `citasdepaciente`
--
DROP TABLE IF EXISTS `citasdepaciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `citasdepaciente`  AS SELECT `app`.`id` AS `id`, `app`.`day` AS `day`, `app`.`hour` AS `hour`, `app`.`status` AS `status`, `app`.`doctor_id` AS `doctor_id`, `app`.`patient_id` AS `patient_id`, `us`.`name` AS `name` FROM (`appointments` `app` left join `users` `us` on((`app`.`doctor_id` = `us`.`id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DoctorAppointments` (`doctor_id`);

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `workdays`
--
ALTER TABLE `workdays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserWorkdays` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `workdays`
--
ALTER TABLE `workdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_DoctorAppointments` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `workdays`
--
ALTER TABLE `workdays`
  ADD CONSTRAINT `FK_UserWorkdays` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
