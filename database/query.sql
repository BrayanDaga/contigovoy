
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','doctor','paciente','') NOT NULL DEFAULT 'paciente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `workdays` (
  `id` int(11) NOT NULL,
  `morning_start` time NOT NULL,
  `morning_end` time NOT NULL,
  `afternoon_start` time NOT NULL,
  `afternoon_end` time NOT NULL,
  `day` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `hour` time NOT NULL,
  `status` enum('aceptado','pendiente') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientAppointments` (`patient_id`),
  ADD KEY `FK_DoctorAppointments` (`doctor_id`);

ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `workdays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserWorkdays` (`user_id`);

--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `workdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_DoctorAppointments` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_PatientAppointments` FOREIGN KEY (`patient`) REFERENCES `users` (`id`);


ALTER TABLE `workdays`
  ADD CONSTRAINT `FK_UserWorkdays` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);




INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `role`) VALUES
(1, 'admin@example.test', 'Admin', 'Admin', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'admin'),
(2, 'doctor1@example.test', 'Wendy Aylas Martínez\n', 'wendyA', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'doctor'),
(3, 'doctor2@example.test', 'Ana Vizcarra Sajami\n', 'AnaV', '$2y$10$kVcw0QlMeWN2Pu/4nVi4xOmTtIF50Rv41unXJLD2FW1bjq9D5HAEC', 'doctor'),
(4, 'example@test.com', 'Usuario Prueba', 'usertest', '$2y$10$rxkNGylxYPQSShqCYCRA..Yr27Xm9DPtT3fkosvwhM.1Z3Oneyk3q', 'paciente'),
(5, 'asdas@gmail.com', 'Brayan Vilchez', 'brayandaga', '$2y$10$hZLRFhNUkZ990ErNWnVHkOd3AB3FOm.jBp7nFfbxLoWSVEYcPy8aG', 'paciente');


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


INSERT INTO `appointments` (`id`, `doctor_id`, `patient_id`, `day`, `hour`, `status`) VALUES
(1, 2, 4, '2021-09-30', '11:00:00', 'aceptado'),
(2, 2, 4, '2021-09-17', '12:00:00', 'aceptado'),
(3, 2, 4, '2021-09-22', '16:00:00', 'pendiente'),
(4, 3, 5, '2021-09-22', '15:00:00', 'pendiente'),
(5, 3, 5, '2021-09-24', '16:00:00', 'pendiente');


INSERT INTO `blogs` (`id`, `title`, `slug`, `body`, `excerpt`, `image`, `created_at`) VALUES
(1, 'Primer ', 'primer-post', 'ASDSADSASASDSADSSADSAD', 'ASDASDSADSSADSAD', 'SADASDASDAS', '2021-09-15 04:40:37');

CREATE  VIEW `appointmentsusers`  AS SELECT `app`.`id` AS `id`, `app`.`day` AS `day`, `app`.`hour` AS `hour`, `app`.`status` AS `status`, `app`.`doctor_id` AS `doctor_id`, `app`.`patient_id` AS `patient_id`, `doc`.`name` AS `doctor`, `pat`.`name` AS `patient` FROM ((`appointments` `app` left join `users` `doc` on((`doc`.`id` = `app`.`doctor_id`))) left join `users` `pat` on((`pat`.`id` = `app`.`patient_id`))) ;
