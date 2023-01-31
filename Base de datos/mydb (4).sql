-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2023 a las 18:09:36
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
-- Estructura de tabla para la tabla `esactividads`
--

CREATE TABLE `esactividads` (
  `id` int(11) NOT NULL,
  `id_plan_trabajo` int(11) NOT NULL,
  `id_tipo_actividad` int(11) NOT NULL,
  `horas_semanales` int(11) DEFAULT 0,
  `horas_semestre` int(11) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `alcance` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `esactividads`
--

INSERT INTO `esactividads` (`id`, `id_plan_trabajo`, `id_tipo_actividad`, `horas_semanales`, `horas_semestre`, `updated_at`, `created_at`, `alcance`) VALUES
(1, 1, 0, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', '0'),
(2, 1, 1, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', NULL),
(3, 1, 2, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', NULL),
(4, 1, 3, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', NULL),
(5, 1, 4, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', NULL),
(6, 2, 0, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', NULL),
(7, 2, 1, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', '0'),
(8, 2, 1, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', '0'),
(9, 2, 3, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', '0'),
(10, 2, 4, 0, 0, '2022-11-24 04:19:21', '2022-11-24 04:19:21', '0'),
(11, 4, 0, 10, 22, '2022-11-24 09:20:14', '2022-11-24 09:20:14', NULL),
(12, 4, 1, 10, 22, '2022-11-29 09:44:58', '2022-11-29 09:44:58', NULL),
(13, 4, 2, 0, 0, '2022-11-29 09:57:13', '2022-11-29 09:57:13', NULL),
(14, 22, 3, 10, 22, '2022-12-15 21:17:55', '2022-12-15 21:17:55', NULL),
(15, 22, 1, 10, 11, '2022-12-15 22:09:34', '2022-12-15 22:09:34', NULL),
(16, 22, 0, 10, 22, '2022-12-15 22:25:29', '2022-12-15 22:25:29', NULL),
(17, 22, 2, 10, 11, '2023-01-10 04:12:11', '2023-01-10 04:12:11', NULL),
(18, 21, 1, 0, 0, '2023-01-19 23:31:10', '2023-01-19 23:31:10', NULL),
(19, 23, 0, NULL, NULL, '2023-01-20 19:31:09', '2023-01-20 19:31:09', NULL),
(21, 24, 1, 2, 48, '2023-01-20 21:14:17', '2023-01-20 21:14:17', NULL),
(22, 24, 4, NULL, NULL, '2023-01-20 21:18:23', '2023-01-20 21:18:23', NULL),
(24, 25, 0, NULL, NULL, '2023-01-20 22:02:34', '2023-01-20 22:02:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` smallint(3) NOT NULL,
  `nombre_estado` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre_estado`) VALUES
(0, 'Terminado'),
(1, 'En ejecución'),
(2, 'En revisión'),
(3, 'Aprobado'),
(4, 'Reprobado'),
(5, 'Calificado'),
(6, 'Próximo');

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
(1, 'Ingenierías');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `profesrs`
--

CREATE TABLE `profesrs` (
  `id` int(11) NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `id_programa` int(11) DEFAULT NULL,
  `id_vinculacion` int(4) DEFAULT NULL,
  `id_dedicacion` int(4) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `escalafon` varchar(45) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesrs`
--

INSERT INTO `profesrs` (`id`, `id_usuario`, `id_programa`, `id_vinculacion`, `id_dedicacion`, `direccion`, `telefono`, `escalafon`, `created_at`, `updated_at`) VALUES
(0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29', '2022-11-29'),
(1, 1, 1, 1, 1, 'calle 29b 11-16', 3212486521, 'hola', '0000-00-00', '0000-00-00'),
(2, 2, 1, 2, 2, 'barrio el yopo', 321248652, 'hola', '0000-00-00', '0000-00-00'),
(3, 3, 1, 2, 2, 'casimena', 3144722469, 'hola', '0000-00-00', '0000-00-00'),
(4, 1, 1, 1, 3, 'casiquiare', 3212486521, 'hola', '0000-00-00', '0000-00-00'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29', '2022-11-29'),
(7, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29', '2022-11-29'),
(8, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29', '2022-11-29'),
(9, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-30', '2022-11-30'),
(10, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-30', '2022-11-30'),
(11, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09', '2023-01-09'),
(12, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20', '2023-01-20'),
(13, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20', '2023-01-20'),
(14, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20', '2023-01-20'),
(15, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-30', '2023-01-30');

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
  `estado` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_trabajos`
--

INSERT INTO `p_trabajos` (`id`, `id_profesor`, `id_semestre`, `horas_semana`, `horas_semestre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 24, 326, 0, '2022-10-30 05:08:50', '2022-10-30 03:09:30'),
(2, 2, 2, 22, 365, 0, '2022-10-30 05:16:02', '2022-10-30 03:09:47'),
(3, 3, 1, 44, 222, 0, '2022-10-30 14:36:09', '2022-10-30 19:03:03'),
(4, 3, 1, 0, 0, 0, '2022-11-24 08:44:17', '2022-11-24 08:44:17'),
(5, 3, 2, 0, 0, 0, '2022-11-29 10:31:40', '2022-11-29 10:31:40'),
(6, 5, 2, 0, 0, 0, '2022-11-29 10:35:15', '2022-11-29 10:35:15'),
(7, 5, 2, 0, 0, 0, '2022-11-29 10:40:13', '2022-11-29 10:40:13'),
(8, 5, 2, 0, 0, 0, '2022-11-29 10:48:10', '2022-11-29 10:48:10'),
(9, 5, 2, 0, 0, 0, '2022-11-29 10:51:55', '2022-11-29 10:51:55'),
(10, 5, 2, 0, 0, 0, '2022-11-29 10:52:58', '2022-11-29 10:52:58'),
(11, 5, 1, 0, 0, 0, '2022-11-29 10:54:03', '2022-11-29 10:54:03'),
(12, 5, 1, 0, 0, 0, '2022-11-29 10:55:30', '2022-11-29 10:55:30'),
(13, 5, 1, 0, 0, 0, '2022-11-29 10:56:07', '2022-11-29 10:56:07'),
(14, 5, 1, 0, 0, 0, '2022-11-29 10:57:38', '2022-11-29 10:57:38'),
(15, 5, 1, 0, 0, 0, '2022-11-29 10:58:41', '2022-11-29 10:58:41'),
(16, 5, 1, 0, 0, 0, '2022-11-29 11:00:58', '2022-11-29 11:00:58'),
(17, 5, 1, 0, 0, 0, '2022-11-29 11:02:19', '2022-11-29 11:02:19'),
(19, 2, 1, 0, 0, 0, '2022-11-30 04:08:32', '2022-11-30 04:08:32'),
(20, 5, 2, 0, 0, 0, '2022-12-01 00:49:52', '2022-12-01 00:49:52'),
(21, 1, 2, 0, 0, 0, '2022-12-01 00:52:14', '2022-12-01 00:52:14'),
(22, 1, 2, 0, 0, 0, '2023-01-09 18:38:38', '2023-01-09 18:38:38'),
(24, 1, 3, 55, 260, 1, '2023-01-30 17:02:03', '2023-01-28 22:22:31');

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
(2, '2022-A', '2022-02-15', '2022-06-22', '2022-10-30 03:41:42', '2022-10-30 03:41:42'),
(3, '2023-A', '2023-01-06', '2023-06-17', '2023-01-18 18:55:11', '2023-01-18 18:55:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtareas`
--

CREATE TABLE `subtareas` (
  `id` int(6) NOT NULL,
  `id_tarea` smallint(6) NOT NULL,
  `id_p_trabajo_tarea` smallint(6) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `horas` smallint(5) NOT NULL,
  `horas_semestre` smallint(5) NOT NULL,
  `semanas` smallint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_actividad` int(5) NOT NULL,
  `id_p_trabajo` int(5) NOT NULL,
  `descripcion` varchar(455) NOT NULL,
  `descripcion2` varchar(255) DEFAULT NULL,
  `horas` tinyint(4) NOT NULL DEFAULT 0,
  `horas_semestre` int(4) NOT NULL DEFAULT 0,
  `semanas` int(5) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `id_actividad`, `id_p_trabajo`, `descripcion`, `descripcion2`, `horas`, `horas_semestre`, `semanas`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'Actividades de preparación de clase', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(2, 2, 1, 'Asesorías Académicas', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(3, 2, 1, 'Director o Jurados evaluador trabajo de grado', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(4, 3, 1, 'Seminario Institucional', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(5, 4, 1, 'Gestión al programa académico', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(6, 4, 1, 'Reunión de Grupo de Trabajo', NULL, 0, 0, 0, '2022-11-24 07:44:13', '0000-00-00 00:00:00'),
(9, 11, 4, 'oioihoi', '+pke´fpked´fas', 0, 0, 0, '2022-11-24 21:47:55', '2022-11-24 21:47:55'),
(10, 11, 4, 'Actividades de preparación de clase', 'paosjdoiasd', 0, 0, 0, '2022-11-24 21:56:30', '2022-11-24 21:56:30'),
(14, 13, 4, 'Seminario Institucional', 'asñkmdpañsd', 0, 0, 0, '2022-11-29 10:13:02', '2022-11-29 10:13:02'),
(15, 5, 1, 'Diseño de proyecto tecnologico', 'Se debe entregar proyecto radicadoe n banco de proyectos de Unitropico', 0, 0, 0, '2022-12-01 01:08:43', '2022-12-01 01:08:43'),
(16, 5, 1, 'Proyecto de siembra de arboles', 'Entregar el radicado del proyecto', 0, 0, 0, '2022-12-01 01:09:53', '2022-12-01 01:09:53'),
(17, 5, 1, 'Curso de redes de datos', 'sddsad  d dsd  dsdasd', 0, 0, 0, '2022-12-01 01:10:39', '2022-12-01 01:10:39'),
(18, 5, 1, 'curso de ingles', 'curso para hablar ingles', 0, 0, 0, '2022-12-01 01:11:11', '2022-12-01 01:11:11'),
(23, 16, 22, 'oioihoi', 'okkmjk', 0, 0, 0, '2022-12-15 22:47:53', '2022-12-15 22:47:53'),
(25, 16, 22, 'Seminario Institucional', 'ñla,sd', 0, 0, 0, '2023-01-12 00:54:35', '2023-01-12 00:54:35'),
(26, 14, 22, 'Seminario Institucional', 'asdasd', 0, 0, 0, '2023-01-12 01:16:14', '2023-01-12 01:16:14'),
(27, 15, 22, 'Diseño de proyecto tecnologico', 'poamsdmapsdmo', 0, 0, 0, '2023-01-12 19:54:46', '2023-01-12 19:54:46'),
(28, 14, 22, 'Curso de redes de datos', 'ñkmpmp', 0, 0, 0, '2023-01-18 20:19:30', '2023-01-18 20:19:30'),
(29, 14, 22, 'Proyecto de siembra de arboles', 'nsakkjsdjoiww', 22, 0, 0, '2023-01-18 20:33:05', '2023-01-18 20:33:05'),
(30, 19, 23, 'Seminario Institucional', 'klk l', 22, 0, 0, '2023-01-20 19:33:21', '2023-01-20 19:33:21'),
(33, 21, 24, 'Reuniones de comité curricular', 'Participar en la reuniones', 1, 0, 0, '2023-01-20 21:15:37', '2023-01-20 21:15:37'),
(34, 21, 24, 'Reunion Consejo de Facultad de Ingenierias', 'Participar en las reuniones', 1, 0, 0, '2023-01-20 21:16:47', '2023-01-20 21:16:47'),
(39, 24, 25, 'Seminario Institucional', NULL, 10, 0, 0, '2023-01-20 22:02:51', '2023-01-20 22:02:51'),
(45, 22, 24, 'Actividades de preparación de clase', NULL, 11, 605, 55, '2023-01-28 22:20:51', '2023-01-28 22:20:51'),
(46, 22, 24, 'Seminario Institucional', NULL, 5, 250, 50, '2023-01-28 22:22:31', '2023-01-28 22:22:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividades`
--

CREATE TABLE `tipo_actividades` (
  `id_tipo_actividad` int(11) NOT NULL,
  `nombre_tipo_actividad` varchar(152) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_actividades`
--

INSERT INTO `tipo_actividades` (`id_tipo_actividad`, `nombre_tipo_actividad`) VALUES
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
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `n_documento`, `id_tipo_usuario`, `id_tipo_documento`, `nombres`, `apellidos`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, 1006556454, 5, 0, 'Freddy Sneyder', 'Cedeño Uva', 'sneyderu1@gmail.com', '$2y$10$Qnw/oFWcqJ5LkgQFVg7MF.sht3dmO7pkGQWwIjNz9ckmzadbZjwfS', '2022-11-29 10:26:09', '2022-10-28 22:00:19'),
(2, 1006558921, 1, 0, 'Paula Daniela', 'Avendaño', 'paula.sanchez10@uptc.edu.co', '$2y$10$6DLhNQKzV1zWARNY3qi1.uQeYUibz3M6TLc0REA6xXH7Uc0EdWCle', '2022-11-30 04:07:28', '2022-10-29 04:25:02'),
(3, 0, 4, 0, 'Alfonso', 'López Tovar', 'alfonsolopez@unitropico.edu.co', '$2y$10$jQrjkb6sU1vMtPBOzR1Axu3yyu1b5pvaB9zM.n.uz9lSgdTxYIvOC', '2022-11-29 08:45:24', '2022-10-29 04:33:16'),
(4, 0, 1, 0, 'Pedro Antonio', 'Caro Bernal', 'pedro@gmail.com', '12345678', '2022-10-29 06:02:58', '2022-10-29 04:33:55'),
(5, 100000000, 1, 0, 'didier', 'morales', 'didier@gmail.com', '$2y$10$07R2IeSOk68/Fod5Q6w0wuIjfNAV8fO1RPgUuR4BnkiA9C96YFeri', '2022-11-29 10:28:08', '2022-10-29 12:26:47'),
(6, 1222543221, 3, 0, 'Aidan', 'Lopez Herrera', 'aidan@gmail.com', '$2y$10$2ri5BBweTM.U0EZdL.djpOfvLRtSVDIuKrN.w/gxLJWM2tCxh3bdW', '2022-12-01 01:18:52', '2022-12-01 01:18:52');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `esactividads`
--
ALTER TABLE `esactividads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
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
-- Indices de la tabla `profesrs`
--
ALTER TABLE `profesrs`
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
-- Indices de la tabla `subtareas`
--
ALTER TABLE `subtareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_actividades`
--
ALTER TABLE `tipo_actividades`
  ADD PRIMARY KEY (`id_tipo_actividad`);

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
-- AUTO_INCREMENT de la tabla `esactividads`
--
ALTER TABLE `esactividads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesrs`
--
ALTER TABLE `profesrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `p_trabajos`
--
ALTER TABLE `p_trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subtareas`
--
ALTER TABLE `subtareas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
