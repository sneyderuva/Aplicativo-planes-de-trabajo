-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2022 a las 01:04:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `id_plan_trabajo` int(11) NOT NULL,
  `id_tipo_actividad` int(11) NOT NULL,
  `id_tareas` int(5) DEFAULT NULL,
  `horas_semanales` int(11) NOT NULL,
  `horas_semestre` int(11) NOT NULL,
  `alcance` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `id_plan_trabajo`, `id_tipo_actividad`, `id_tareas`, `horas_semanales`, `horas_semestre`, `alcance`) VALUES
(1, 1, 0, 1, 0, 0, '0'),
(2, 1, 1, 2, 0, 0, NULL),
(3, 1, 1, 3, 0, 0, NULL),
(4, 1, 3, NULL, 0, 0, NULL),
(5, 1, 4, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_evaluadas`
--

CREATE TABLE `actividad_evaluadas` (
  `id` int(11) NOT NULL,
  `actividades_id_actividad` int(11) NOT NULL,
  `rubrica_id_rubrica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_planes`
--

CREATE TABLE `aprobacion_planes` (
  `id` int(11) NOT NULL,
  `id_actividad_ap` int(11) NOT NULL,
  `fecha_aprobacion` date NOT NULL,
  `id_usuario_aprobacion` int(11) NOT NULL,
  `aprobado` char(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterios`
--

CREATE TABLE `criterios` (
  `id` int(11) NOT NULL,
  `criterio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dedicacion_tipos`
--

CREATE TABLE `dedicacion_tipos` (
  `id` int(3) NOT NULL,
  `nombre_tipo_dedicacion` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dedicacion_tipos`
--

INSERT INTO `dedicacion_tipos` (`id`, `nombre_tipo_dedicacion`) VALUES
(1, 'Tiempo completo'),
(2, 'Medio tiempo'),
(3, 'Cátedra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` smallint(2) NOT NULL,
  `nombre_dependencia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluadores`
--

CREATE TABLE `evaluadores` (
  `id` int(11) NOT NULL,
  `dependencia_id_dependencia` smallint(2) NOT NULL,
  `nombres_completos` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_usuario_profesor` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `directorio` varchar(1000) DEFAULT NULL,
  `fecha_de_carga` date NOT NULL,
  `hora_de_carga` time NOT NULL,
  `porcentaje_avance` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre_facultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `nombre_facultad`) VALUES
(1, 'Ingenierias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` mediumint(7) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `valor` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion_evaluaciones`
--

CREATE TABLE `opcion_evaluaciones` (
  `id` int(11) NOT NULL,
  `opciones_id_opciones` mediumint(7) NOT NULL,
  `actividad_evaluar_id_actividad_evaluar` int(11) NOT NULL,
  `evaluador_id_evaluador` int(11) NOT NULL,
  `resultado` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_vinculacion` int(4) NOT NULL,
  `id_dedicacion` int(4) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `escalafon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `id_usuario`, `id_programa`, `id_vinculacion`, `id_dedicacion`, `direccion`, `telefono`, `escalafon`) VALUES
(1, 1, 1, 1, 1, 'calle 29b 11-16', 3212486521, 'hola'),
(2, 2, 1, 2, 2, 'barrio el yopo', 321248652, 'hola'),
(3, 3, 1, 2, 2, 'casimena', 3144722469, 'hola'),
(4, 1, 1, 1, 3, 'casiquiare', 3212486521, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_academicos`
--

CREATE TABLE `p_academicos` (
  `id` int(11) NOT NULL,
  `idfacultad` int(11) NOT NULL,
  `nombre_programa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_academicos`
--

INSERT INTO `p_academicos` (`id`, `idfacultad`, `nombre_programa`) VALUES
(1, 1, 'Técnico profesional en desarrollo de software para móviles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_trabajos`
--

CREATE TABLE `p_trabajos` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL DEFAULT 0,
  `id_semestre` int(5) NOT NULL DEFAULT 0,
  `horas_semana` float DEFAULT 0,
  `horas_semestre` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_trabajos`
--

INSERT INTO `p_trabajos` (`id`, `id_profesor`, `id_semestre`, `horas_semana`, `horas_semestre`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 24, 326, '2022-10-30 05:08:50', '2022-10-30 03:09:30'),
(2, 2, 2, 22, 365, '2022-10-30 05:16:02', '2022-10-30 03:09:47'),
(3, 3, 1, 44, 222, '2022-10-30 14:36:09', '2022-10-30 19:03:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubricas`
--

CREATE TABLE `rubricas` (
  `id` int(11) NOT NULL,
  `id_criterio_eval` int(11) NOT NULL,
  `concepto` varchar(45) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE `semestres` (
  `id` smallint(5) NOT NULL,
  `nombre_semestre` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `inicio` date NOT NULL DEFAULT current_timestamp(),
  `final` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id`, `nombre_semestre`, `inicio`, `final`, `updated_at`, `created_at`) VALUES
(1, '2022-B', '2022-07-03', '2022-11-19', '2022-10-20 18:50:55', '2022-10-20 18:50:55'),
(2, '2022-A', '2022-02-15', '2022-06-22', '2022-10-30 03:41:42', '2022-10-30 03:41:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `descripcion`) VALUES
(1, 'Actividades de preparación de clase'),
(2, 'Asesorías Académicas'),
(3, 'Director o Jurados evaluador trabajo de grado'),
(4, 'Seminario Institucional'),
(5, 'Gestión al programa académico'),
(6, 'Reunión de Grupo de Trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividades`
--

CREATE TABLE `tipo_actividades` (
  `id` int(11) NOT NULL,
  `nombre_tipo_actividad` varchar(152) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_actividades`
--

INSERT INTO `tipo_actividades` (`id`, `nombre_tipo_actividad`) VALUES
(0, 'Actividades de Docencia Indirecta'),
(1, 'Actividades de Asesoría'),
(2, 'Actividades de Capacitación'),
(3, 'Actividades Académico-Administrativas'),
(4, 'Actividades de Gestión y Enlace con otras Áreas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `id` int(11) NOT NULL,
  `n_tipo_documento` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`id`, `n_tipo_documento`) VALUES
(0, 'Cédula de ciudadanía'),
(1, 'Cédula extranjera'),
(2, 'NIT'),
(3, 'Pasaporte'),
(4, 'Tarjeta de identidad'),
(5, 'Registro civíl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(3) NOT NULL,
  `nombre_tipo` varchar(28) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `nombre_tipo`) VALUES
(1, 'Profesor transitorio'),
(2, 'Profesor de cátedra'),
(3, 'Profesor ocasional'),
(4, 'Evaluador'),
(5, 'Administrador'),
(6, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vinculaciones`
--

CREATE TABLE `tipo_vinculaciones` (
  `id` int(5) NOT NULL,
  `nombre_tipo_vinculacion` varchar(28) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_vinculaciones`
--

INSERT INTO `tipo_vinculaciones` (`id`, `nombre_tipo_vinculacion`) VALUES
(1, 'Término indefinido'),
(2, 'Término fijo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` smallint(7) NOT NULL,
  `n_documento` int(15) NOT NULL,
  `id_tipo_usuario` mediumint(12) NOT NULL DEFAULT 0,
  `id_tipo_documento` int(4) NOT NULL,
  `nombres` varchar(28) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(48) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `n_documento`, `id_tipo_usuario`, `id_tipo_documento`, `nombres`, `apellidos`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, 1006556454, 5, 0, 'Freddy Sneyder', 'Cedeño Uva', 'sneyderu1@gmail.com', '3144722469Ss', '2022-10-29 06:02:35', '2022-10-28 22:00:19'),
(2, 1006558921, 1, 0, 'Paula Daniela', 'Avendaño', 'paula.sanchez10@uptc.eu.co', '12345678', '2022-10-29 06:03:17', '2022-10-29 04:25:02'),
(3, 0, 4, 0, 'Alfonso', 'López Tovar', 'lopeztovar@gmail.com', '12345678', '2022-10-29 12:03:05', '2022-10-29 04:33:16'),
(4, 0, 1, 0, 'Pedro Antonio', 'Caro Bernal', 'pedro@gmail.com', '12345678', '2022-10-29 06:02:58', '2022-10-29 04:33:55'),
(5, 100000000, 1, 0, 'didier', 'morales', 'didier@gmail.com', '12345678', '2022-10-30 03:16:20', '2022-10-29 12:26:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_evaluadas`
--
ALTER TABLE `actividad_evaluadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aprobacion_planes`
--
ALTER TABLE `aprobacion_planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `criterios`
--
ALTER TABLE `criterios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dedicacion_tipos`
--
ALTER TABLE `dedicacion_tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluadores`
--
ALTER TABLE `evaluadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opcion_evaluaciones`
--
ALTER TABLE `opcion_evaluaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_academicos`
--
ALTER TABLE `p_academicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_trabajos`
--
ALTER TABLE `p_trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `rubricas`
--
ALTER TABLE `rubricas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `inicio` (`inicio`),
  ADD UNIQUE KEY `nombre_semestre` (`nombre_semestre`),
  ADD UNIQUE KEY `final` (`final`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_actividades`
--
ALTER TABLE `tipo_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vinculaciones`
--
ALTER TABLE `tipo_vinculaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `criterios`
--
ALTER TABLE `criterios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dedicacion_tipos`
--
ALTER TABLE `dedicacion_tipos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `p_academicos`
--
ALTER TABLE `p_academicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `p_trabajos`
--
ALTER TABLE `p_trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rubricas`
--
ALTER TABLE `rubricas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_vinculaciones`
--
ALTER TABLE `tipo_vinculaciones`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
