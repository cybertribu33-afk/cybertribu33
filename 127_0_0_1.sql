-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2026 a las 13:26:39
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
-- Base de datos: `gestion_horarios`
--
CREATE DATABASE IF NOT EXISTS `gestion_horarios` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_horarios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia`
--

CREATE TABLE `ausencia` (
  `id_ausencia` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `justificante` varchar(255) DEFAULT NULL,
  `tarea` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_horario` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `fecha` date DEFAULT NULL,
  `horas` varchar(50) DEFAULT NULL,
  `aula` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ausencia`
--

INSERT INTO `ausencia` (`id_ausencia`, `motivo`, `tipo`, `justificante`, `tarea`, `id_usuario`, `id_horario`, `estado`, `fecha`, `horas`, `aula`) VALUES
(2, '1', 'Ausencia', 'uploads/6989bcde332ca_Correo profesores 25-26(1).xlsx', '', 1, NULL, 'cubierta', '0000-00-00', '1', '0'),
(5, 'a', 'Ausencia', '', '', 1, NULL, 'rechazado', '0000-00-00', 'q', '0'),
(6, 'l', 'Ausencia', '', '', 1, NULL, 'rechazado', '0000-00-00', 'q', '0'),
(7, 'c', 'Ausencia', '', '', 1, NULL, 'cubierta', '0000-00-00', 'a', '0'),
(8, 'q', 'Ausencia', NULL, NULL, 1, NULL, 'rechazado', '2026-02-19', 'q', '0'),
(9, 'a', 'Ausencia', NULL, NULL, 1, NULL, 'cubierta', '2026-02-13', 'a', '0'),
(10, 'hola', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-19', '1', '0'),
(11, 'ag', 'Ausencia', NULL, NULL, 1, NULL, 'cubierta', '2026-02-17', '1ª', '0'),
(12, 'g', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-18', '1ª', '0'),
(13, 's', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-19', 'todo el DIA ', '0'),
(14, '¡l', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-19', 'todo el dia ', '0'),
(15, 'a', 'Ausencia', NULL, NULL, 1, NULL, 'rechazado', '2026-02-18', 'Cuarta', '0'),
(16, 'q', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-18', 'Primera, Segunda', '0'),
(17, 'nsns ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-04', 'Segunda, Cuarta, Quinta', '0'),
(18, 'dfgh', 'Ausencia', 'uploads/6996d06d117ac_justificante.pdf', 'uploads/6996d06d13249_tarea.pdf', 12, NULL, 'rechazado', '2026-02-20', 'Primera, Tercera', '0'),
(19, 'df', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-21', 'Primera, Segunda', '0'),
(20, 'vih', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-23', 'Primera', '0'),
(21, 'hola', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-23', 'Tercera', '0'),
(22, 'giuhfwojd', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-24', 'Primera', '0'),
(23, 'giuhfwojd', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-24', 'Tercera', '0'),
(24, 'giuhfwojd', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-24', 'Quinta', '0'),
(25, 'çpolknl', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Primera', '0'),
(26, 'çpolknl', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Segunda', '0'),
(27, 'çpolknl', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Sexta', '0'),
(29, 'vvvv', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Primera', '0'),
(30, 'vvvv', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Cuarta', '0'),
(31, 'a', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-24', 'Primera', 'aaaaa'),
(32, 'zsxdfghjklñ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Segunda', '777'),
(33, 'zsxdfghjklñ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-23', 'Tercera', '777'),
(34, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Primera', 'Jacaton '),
(35, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Segunda', 'Jacaton '),
(36, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Tercera', 'Jacaton '),
(37, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Cuarta', 'Jacaton '),
(38, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Quinta', 'Jacaton '),
(39, 'Pereza historica ', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-25', 'Sexta', 'Jacaton '),
(40, 'jhgf', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-27', 'Primera', 'esta '),
(41, 'jhgf', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-27', 'Sexta', 'esta '),
(42, 'Enfermedad', 'Ausencia', NULL, NULL, 1, NULL, 'aceptado', '2026-02-27', 'Segunda', 'IFC201'),
(43, 'gvfsv', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-27', 'Primera', 'svbetbt'),
(44, 'gvfsv', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-27', 'Tercera', 'svbetbt'),
(45, 'gvfsv', 'Ausencia', NULL, NULL, 12, NULL, 'aceptado', '2026-02-27', 'Cuarta', 'svbetbt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardias_realizadas`
--

CREATE TABLE `guardias_realizadas` (
  `id` int(11) NOT NULL,
  `id_ausencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(10) NOT NULL,
  `tarea` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guardias_realizadas`
--

INSERT INTO `guardias_realizadas` (`id`, `id_ausencia`, `id_usuario`, `fecha`, `hora`, `tarea`) VALUES
(1, 2, 1, '0000-00-00', '1', ''),
(2, 7, 1, '0000-00-00', 'a', ''),
(3, 11, 1, '2026-02-17', '1ª', ''),
(4, 9, 1, '2026-02-13', 'a', ''),
(5, 10, 1, '2026-02-19', '1', ''),
(6, 12, 1, '2026-02-18', '1ª', ''),
(7, 13, 1, '2026-02-19', 'todo el DI', ''),
(8, 14, 12, '2026-02-19', 'todo el di', ''),
(9, 16, 1, '2026-02-18', 'Primera, S', ''),
(10, 17, 1, '2026-02-04', 'Segunda, C', ''),
(11, 19, 1, '2026-02-21', 'Primera, S', ''),
(12, 20, 1, '2026-02-23', 'Primera', ''),
(13, 21, 1, '2026-02-23', 'Tercera', ''),
(14, 25, 12, '2026-02-23', 'Primera', ''),
(15, 26, 12, '2026-02-23', 'Segunda', ''),
(16, 27, 12, '2026-02-23', 'Sexta', ''),
(17, 22, 12, '2026-02-24', 'Primera', ''),
(18, 24, 12, '2026-02-24', 'Quinta', ''),
(19, 30, 12, '2026-02-23', 'Cuarta', ''),
(20, 31, 1, '2026-02-24', 'Primera', ''),
(21, 23, 1, '2026-02-24', 'Tercera', ''),
(22, 40, 12, '2026-02-27', 'Primera', ''),
(23, 41, 1, '2026-02-27', 'Sexta', ''),
(24, 42, 1, '2026-02-27', 'Segunda', ''),
(25, 45, 12, '2026-02-27', 'Cuarta', ''),
(26, 43, 12, '2026-02-27', 'Primera', ''),
(27, 44, 12, '2026-02-27', 'Tercera', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_horas`
--

CREATE TABLE `horario_horas` (
  `id_horario` int(11) NOT NULL,
  `id_horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id_horas` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `horas` varchar(20) NOT NULL,
  `id_horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id_horas`, `dia`, `horas`, `id_horario`) VALUES
(9, 'Lunes', '1', NULL),
(10, 'Lunes', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `familia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni`, `nombre`, `apellido`, `correo`, `contraseña`, `rol`, `familia`) VALUES
(1, '21746621Y', 'carlos', 'cagabona', '1@gmail.com', '$2y$10$UPfcbvRZsVNCQ2ctynzKbuye6NfyW4nDAMFwtiCaxzFLb84xMn8he', 'Administrador', 'informatica'),
(12, '25358467R', 'Samuel', 'Ubeda', 'samuelubeda@gmail.com', '$2y$10$3TWGCtP.ndSrBBbrUkZCHeVXE1B7bz1eeTAYWPEMGVc7Frde4Zk8O', 'Administrador', 'informática'),
(16, '123456789K', 'Gabi ', 'Feo', 'Gabi_muy_tonto@gmail.com', '$2y$10$5hPOins6pdB/OiIF32DuzuOG1UD7pr7jg3OYMfXnKlHL/UOf8gzA6', 'Administrador', 'Ninguna'),
(17, '2174662L', 'Alejandro', 'Albaladejo', 'aalbaladejo@cpifpbajoaragon.com', '$2y$10$diZP5OSbPoFuK4N.EnsrI.q0Fqmp5wj/u3nu7jo8l4r4QEjl55LEK', 'Docente', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  ADD PRIMARY KEY (`id_ausencia`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `guardias_realizadas`
--
ALTER TABLE `guardias_realizadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ausencia` (`id_ausencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `horario_horas`
--
ALTER TABLE `horario_horas`
  ADD PRIMARY KEY (`id_horario`,`id_horas`),
  ADD KEY `id_horas` (`id_horas`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id_horas`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  MODIFY `id_ausencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `guardias_realizadas`
--
ALTER TABLE `guardias_realizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id_horas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ausencia`
--
ALTER TABLE `ausencia`
  ADD CONSTRAINT `ausencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ausencia_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guardias_realizadas`
--
ALTER TABLE `guardias_realizadas`
  ADD CONSTRAINT `guardias_realizadas_ibfk_1` FOREIGN KEY (`id_ausencia`) REFERENCES `ausencia` (`id_ausencia`),
  ADD CONSTRAINT `guardias_realizadas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario_horas`
--
ALTER TABLE `horario_horas`
  ADD CONSTRAINT `horario_horas_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_horas_ibfk_2` FOREIGN KEY (`id_horas`) REFERENCES `horas` (`id_horas`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'gestion_horarios', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"ausencia\",\"guardias_realizadas\",\"horario\",\"horario_horas\",\"horas\",\"usuario\"],\"table_structure[]\":[\"ausencia\",\"guardias_realizadas\",\"horario\",\"horario_horas\",\"horas\",\"usuario\"],\"table_data[]\":[\"ausencia\",\"guardias_realizadas\",\"horario\",\"horario_horas\",\"horas\",\"usuario\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continúa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continúa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"gestion_horarios\",\"table\":\"ausencia\"},{\"db\":\"gestion_horarios\",\"table\":\"usuario\"},{\"db\":\"gestion_horarios\",\"table\":\"horas\"},{\"db\":\"gestion_horarios\",\"table\":\"horario\"},{\"db\":\"gestion_horarios\",\"table\":\"guardias_realizadas\"},{\"db\":\"test\",\"table\":\"ausencia\"},{\"db\":\"dataciber1\",\"table\":\"profesor\"},{\"db\":\"dataciber1\",\"table\":\"ausencia\"},{\"db\":\"dataciber1\",\"table\":\"guardia\"},{\"db\":\"dataciber1\",\"table\":\"sustitucion\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-02-27 12:26:13', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
