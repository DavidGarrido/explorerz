-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 04:47:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `explorerz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Postre de fresas', 'Crear un postre de fresas', '2020-11-17 05:26:25', '2020-11-17 05:26:25'),
(2, 'actividad dos', 'actividad dos', '2020-11-17 05:32:15', '2020-11-17 05:32:15'),
(3, 'Una actividad', 'una actividad mas', '2020-11-17 07:29:38', '2020-11-17 07:29:38'),
(4, 'tercer actividad', 'tercer actividad', '2020-11-17 07:31:30', '2020-11-17 07:31:30'),
(5, 'Primer actividad', 'vamos por la primera actividad', '2020-11-17 07:31:50', '2020-11-17 07:31:50'),
(6, 'Primer actividad de las vocales', 'primer actividad de los vocales', '2020-11-17 07:32:30', '2020-11-17 07:32:30'),
(7, 'Hacer la tabla del numero 5', 'hacer la tabla del numero 5', '2020-11-17 07:33:15', '2020-11-17 07:33:15'),
(8, 'Actividad de la tematica', 'Esta actividad tiene calificación ', '2020-11-17 07:56:40', '2020-11-17 07:56:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_thematic`
--

CREATE TABLE `activity_thematic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `thematic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_thematic`
--

INSERT INTO `activity_thematic` (`id`, `activity_id`, `thematic_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2020-11-17 05:26:25', '2020-11-17 05:26:25'),
(2, 2, 7, '2020-11-17 05:32:15', '2020-11-17 05:32:15'),
(3, 3, 9, '2020-11-17 07:29:38', '2020-11-17 07:29:38'),
(4, 4, 7, '2020-11-17 07:31:30', '2020-11-17 07:31:30'),
(5, 5, 12, '2020-11-17 07:31:50', '2020-11-17 07:31:50'),
(6, 6, 2, '2020-11-17 07:32:31', '2020-11-17 07:32:31'),
(7, 7, 20, '2020-11-17 07:33:15', '2020-11-17 07:33:15'),
(8, 8, 22, '2020-11-17 07:56:40', '2020-11-17 07:56:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Mi primer curso', 'Descripción del primer curso', 50, '2020-11-16 20:10:07', '2020-11-16 20:10:07'),
(2, 'Segundo curso', 'Descripción del segundo curso', 50, '2020-11-16 20:21:24', '2020-11-16 20:21:24'),
(3, 'Grado 11', 'ultimo curso de la institución ', 40, '2020-11-16 21:09:09', '2020-11-16 21:09:09'),
(4, 'Cocina avanzada', 'curso para aprender a cocinar de forma profesional', 100, '2020-11-16 21:12:26', '2020-11-16 21:13:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_schedule`
--

CREATE TABLE `course_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_thematic`
--

CREATE TABLE `course_thematic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `thematic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_thematic`
--

INSERT INTO `course_thematic` (`id`, `course_id`, `thematic_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-11-16 20:58:45', '2020-11-16 20:58:45'),
(2, 2, 3, '2020-11-16 21:00:53', '2020-11-16 21:00:53'),
(3, 2, 4, '2020-11-16 21:02:13', '2020-11-16 21:02:13'),
(4, 2, 5, '2020-11-16 21:06:59', '2020-11-16 21:06:59'),
(5, 3, 6, '2020-11-16 21:09:27', '2020-11-16 21:09:27'),
(6, 4, 7, '2020-11-16 21:13:46', '2020-11-16 21:13:46'),
(7, 3, 8, '2020-11-16 22:29:44', '2020-11-16 22:29:44'),
(8, 4, 9, '2020-11-17 03:12:33', '2020-11-17 03:12:33'),
(9, 2, 10, '2020-11-17 03:17:35', '2020-11-17 03:17:35'),
(10, 2, 11, '2020-11-17 03:23:08', '2020-11-17 03:23:08'),
(11, 4, 12, '2020-11-17 03:25:20', '2020-11-17 03:25:20'),
(12, 4, 13, '2020-11-17 04:10:17', '2020-11-17 04:10:17'),
(13, 4, 14, '2020-11-17 04:11:05', '2020-11-17 04:11:05'),
(14, 4, 15, '2020-11-17 04:12:51', '2020-11-17 04:12:51'),
(15, 4, 16, '2020-11-17 04:13:51', '2020-11-17 04:13:51'),
(16, 4, 17, '2020-11-17 05:26:41', '2020-11-17 05:26:41'),
(17, 4, 18, '2020-11-17 05:33:05', '2020-11-17 05:33:05'),
(18, 4, 19, '2020-11-17 05:33:26', '2020-11-17 05:33:26'),
(19, 1, 20, '2020-11-17 07:32:46', '2020-11-17 07:32:46'),
(20, 3, 21, '2020-11-17 07:54:54', '2020-11-17 07:54:54'),
(21, 1, 22, '2020-11-17 07:56:16', '2020-11-17 07:56:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_user`
--

INSERT INTO `course_user` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-16 20:10:08', '2020-11-16 20:10:08'),
(2, 1, 6, '2020-11-16 20:10:15', '2020-11-16 20:10:15'),
(3, 2, 1, '2020-11-16 20:21:24', '2020-11-16 20:21:24'),
(5, 2, 4, '2020-11-16 20:36:02', '2020-11-16 20:36:02'),
(6, 2, 5, '2020-11-16 20:38:48', '2020-11-16 20:38:48'),
(8, 3, 1, '2020-11-16 21:09:09', '2020-11-16 21:09:09'),
(9, 4, 1, '2020-11-16 21:12:26', '2020-11-16 21:12:26'),
(10, 4, 6, '2020-11-16 21:12:41', '2020-11-16 21:12:41'),
(11, 3, 4, '2020-11-16 22:28:16', '2020-11-16 22:28:16'),
(12, 4, 4, '2020-11-17 02:47:51', '2020-11-17 02:47:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enviroments`
--

CREATE TABLE `enviroments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_12_034240_create_sessions_table', 1),
(7, '2020_11_12_142617_create_courses_table', 1),
(8, '2020_11_12_142812_create_enviroments_table', 1),
(9, '2020_11_12_180632_create_roles_table', 1),
(10, '2020_11_12_180644_create_permissions_table', 1),
(11, '2020_11_12_180951_create_role_user_table', 1),
(12, '2020_11_12_181059_create_permission_role_table', 1),
(13, '2020_11_13_235009_create_course_user_table', 1),
(14, '2020_11_15_142241_create_schedules_table', 1),
(15, '2020_11_15_142806_create_course_schedule_table', 1),
(16, '2020_11_16_145255_create_thematics_table', 1),
(17, '2020_11_16_145454_create_activities_table', 1),
(18, '2020_11_16_145655_create_schedule_thematic_table', 1),
(19, '2020_11_16_145738_create_activity_thematic_table', 1),
(20, '2020_11_16_155054_create_course_thematic_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Todo cursos', 'course.all', 'Todos los permisos para cursos', '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(2, 'Listar cursos', 'course.index', 'El usuario podra vel el listado de cursos', '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(3, 'Crear cursos', 'course.create', 'El usuario podra vel el formulario de creacion de cursos', '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(4, 'Enviar cursos', 'course.store', 'El usuario podra enviar el formulacio de creacion de cursos', '2020-11-16 20:08:55', '2020-11-16 20:08:55'),
(5, 'Eliminar cursos', 'course.destroy', 'El usuario podra eliminar el cursos', '2020-11-16 20:08:55', '2020-11-16 20:08:55'),
(6, 'Editar cursos', 'course.update', 'El usuario enviar el formulario de edicion de cursos', '2020-11-16 20:08:56', '2020-11-16 20:08:56'),
(7, 'Ver cursos', 'course.show', 'El usuario podra ver la informacion del cursos', '2020-11-16 20:08:56', '2020-11-16 20:08:56'),
(8, 'Form. editar cursos', 'course.edit', 'El usuario podra ver el formulario de edicion del cursos', '2020-11-16 20:08:56', '2020-11-16 20:08:56'),
(9, 'Todo club', 'club.all', 'Todos los permisos para club', '2020-11-16 20:08:56', '2020-11-16 20:08:56'),
(10, 'Listar club', 'club.index', 'El usuario podra vel el listado de clubes', '2020-11-16 20:08:56', '2020-11-16 20:08:56'),
(11, 'Crear club', 'club.create', 'El usuario podra vel el formulario de creacion de club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(12, 'Enviar club', 'club.store', 'El usuario podra enviar el formulacio de creacion de club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(13, 'Eliminar club', 'club.destroy', 'El usuario podra eliminar el club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(14, 'Editar club', 'club.update', 'El usuario enviar el formulario de edicion de club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(15, 'Ver club', 'club.show', 'El usuario podra ver la informacion del club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(16, 'Form. editar club', 'club.edit', 'El usuario podra ver el formulario de edicion del club', '2020-11-16 20:08:57', '2020-11-16 20:08:57'),
(17, 'Todo ambientes', 'enviroment.all', 'Todos los permisos para ambientes', '2020-11-16 20:08:58', '2020-11-16 20:08:58'),
(18, 'Listar ambientes', 'enviroment.index', 'El usuario podra vel el listado de ambientes', '2020-11-16 20:08:58', '2020-11-16 20:08:58'),
(19, 'Crear ambientes', 'enviroment.create', 'El usuario podra vel el formulario de creacion de ambientes', '2020-11-16 20:08:58', '2020-11-16 20:08:58'),
(20, 'Enviar ambientes', 'enviroment.store', 'El usuario podra enviar el formulacio de creacion de ambientes', '2020-11-16 20:08:58', '2020-11-16 20:08:58'),
(21, 'Eliminar ambientes', 'enviroment.destroy', 'El usuario podra eliminar el ambientes', '2020-11-16 20:08:58', '2020-11-16 20:08:58'),
(22, 'Editar ambientes', 'enviroment.update', 'El usuario enviar el formulario de edicion de ambientes', '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(23, 'Ver ambientes', 'enviroment.show', 'El usuario podra ver la informacion del ambientes', '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(24, 'Form. editar ambientes', 'enviroment.edit', 'El usuario podra ver el formulario de edicion del ambientes', '2020-11-16 20:08:59', '2020-11-16 20:08:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(2, 1, 2, '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(3, 1, 3, '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(4, 1, 4, '2020-11-16 20:08:59', '2020-11-16 20:08:59'),
(5, 1, 5, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(6, 1, 6, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(7, 1, 7, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(8, 1, 8, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(9, 1, 9, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(10, 1, 10, '2020-11-16 20:09:00', '2020-11-16 20:09:00'),
(11, 1, 11, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(12, 1, 12, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(13, 1, 13, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(14, 1, 14, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(15, 1, 15, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(16, 1, 16, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(17, 1, 17, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(18, 1, 18, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(19, 1, 19, '2020-11-16 20:09:01', '2020-11-16 20:09:01'),
(20, 1, 20, '2020-11-16 20:09:02', '2020-11-16 20:09:02'),
(21, 1, 21, '2020-11-16 20:09:02', '2020-11-16 20:09:02'),
(22, 1, 22, '2020-11-16 20:09:02', '2020-11-16 20:09:02'),
(23, 1, 23, '2020-11-16 20:09:02', '2020-11-16 20:09:02'),
(24, 1, 24, '2020-11-16 20:09:02', '2020-11-16 20:09:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full-access` enum('Yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `full-access`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Permisos de administrador', 'Yes', '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(2, 'teacher', 'teacher', 'Permisos de teacher', 'no', '2020-11-16 20:08:52', '2020-11-16 20:08:52'),
(3, 'parent', 'parent', 'Permisos de parent', 'no', '2020-11-16 20:08:53', '2020-11-16 20:08:53'),
(4, 'studen', 'studen', 'Permisos de studen', 'no', '2020-11-16 20:08:54', '2020-11-16 20:08:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-16 20:08:52', '2020-11-16 20:08:52'),
(2, 1, 2, '2020-11-16 20:08:52', '2020-11-16 20:08:52'),
(3, 1, 3, '2020-11-16 20:08:52', '2020-11-16 20:08:52'),
(4, 2, 4, '2020-11-16 20:08:52', '2020-11-16 20:08:52'),
(5, 2, 5, '2020-11-16 20:08:53', '2020-11-16 20:08:53'),
(6, 2, 6, '2020-11-16 20:08:53', '2020-11-16 20:08:53'),
(7, 3, 7, '2020-11-16 20:08:53', '2020-11-16 20:08:53'),
(8, 3, 8, '2020-11-16 20:08:53', '2020-11-16 20:08:53'),
(9, 3, 9, '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(10, 4, 10, '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(11, 4, 11, '2020-11-16 20:08:54', '2020-11-16 20:08:54'),
(12, 4, 12, '2020-11-16 20:08:54', '2020-11-16 20:08:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_thematic`
--

CREATE TABLE `schedule_thematic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `thematic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LSdy4y6OepIFExN007iEe6s9kCKBmBmspMHMQ0Fv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVnpGNmhHR1BvWkRXcnR6NU9vNXVIUVFYdjFzQ1dDWnNpdVJaV3hIQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MS9jdXJzb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTHA0LjNRSTM1ejhuZVJCMlpoSER1ZXBBc1Nnc2ZTbTZhLmxTMS9aVTJGcmRwYmlQdS9TZmkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJExwNC4zUUkzNXo4bmVSQjJaaEhEdWVwQXNTZ3NmU202YS5sUzEvWlUyRnJkcGJpUHUvU2ZpIjt9', 1605582000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thematics`
--

CREATE TABLE `thematics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `thematics`
--

INSERT INTO `thematics` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Las Vocales', 'En esta sección aprenderemos las vocales', '2020-11-16 20:57:05', '2020-11-16 20:57:05'),
(2, 'Las vocales', 'en esta sección aprenderemos las vocales', '2020-11-16 20:58:45', '2020-11-16 20:58:45'),
(3, 'las consonantes', 'en esta seccion aprenderemos las consonantes', '2020-11-16 21:00:53', '2020-11-16 21:00:53'),
(4, 'Números del 1 al 10', 'los numeros del uno al diez', '2020-11-16 21:02:13', '2020-11-16 21:02:13'),
(5, 'Vocales', 'las vocales a e i o u.', '2020-11-16 21:06:59', '2020-11-16 21:06:59'),
(6, 'proyecto de grado', 'este es el proyecto de grado ', '2020-11-16 21:09:27', '2020-11-16 21:09:27'),
(7, 'Postre', 'en esta sección aprenderemos a crear postres.', '2020-11-16 21:13:46', '2020-11-16 21:13:46'),
(8, 'Actividad de recuperación', 'Evalúa los logros para los estudiantes', '2020-11-16 22:29:44', '2020-11-16 22:29:44'),
(9, 'Cocina vegetariana', 'En este modulo aprenderemos la creación de todo tipo de cocina vegetariana.', '2020-11-17 03:12:32', '2020-11-17 03:12:32'),
(10, 'Los colores', 'Colores primarios', '2020-11-17 03:17:35', '2020-11-17 03:17:35'),
(11, 'frutas y verduras', 'todas la frutas y verduras', '2020-11-17 03:23:07', '2020-11-17 03:23:07'),
(12, 'gelatinas', 'seccion de gelatinas', '2020-11-17 03:25:20', '2020-11-17 03:25:20'),
(13, 'otro mas', 'otro mas', '2020-11-17 04:10:16', '2020-11-17 04:10:16'),
(14, 'uno mas', 'uno mas', '2020-11-17 04:11:05', '2020-11-17 04:11:05'),
(15, 'mas mas', 'mas mas', '2020-11-17 04:12:51', '2020-11-17 04:12:51'),
(16, 'mas mas mas', 'mas mas mas', '2020-11-17 04:13:51', '2020-11-17 04:13:51'),
(17, 'holaaa', 'holaaaa', '2020-11-17 05:26:41', '2020-11-17 05:26:41'),
(18, 'thematic tow', 'tematica dos', '2020-11-17 05:33:05', '2020-11-17 05:33:05'),
(19, 'tematica tres', 'temait three', '2020-11-17 05:33:26', '2020-11-17 05:33:26'),
(20, 'Los numeros', 'números enteros', '2020-11-17 07:32:46', '2020-11-17 07:32:46'),
(21, 'tercer actividad', 'Esta es mi tercer actividad', '2020-11-17 07:54:54', '2020-11-17 07:54:54'),
(22, 'Nueva tematica', 'mas tematicas', '2020-11-17 07:56:16', '2020-11-17 07:56:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Marion Sauer', 'hansen.lenora@example.net', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'yycbYQSD1s', NULL, NULL, '2020-11-16 20:08:50', '2020-11-16 20:08:50'),
(2, 'Edd Toy', 'rubye08@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'x1GghQVb1b', NULL, NULL, '2020-11-16 20:08:50', '2020-11-16 20:08:50'),
(3, 'Prof. Eulah Kub IV', 'qhuels@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, '1llxjtqSqk', NULL, NULL, '2020-11-16 20:08:50', '2020-11-16 20:08:50'),
(4, 'Miss Lora Stanton II', 'mjohnson@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'iVDLx8wvFq', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(5, 'Dr. Lenny Osinski', 'qheller@example.net', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, '5ABiEBIDup', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(6, 'Felipa Kutch', 'dorcas50@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'f2KC8cuujl', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(7, 'Prof. Franz Boyle', 'russ35@example.org', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'VYUV6ZRkDY', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(8, 'Elsie Ferry', 'jerad31@example.net', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'wBxKGvBhDx', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(9, 'Whitney Ondricka', 'oherzog@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'y3NjdsR1jT', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(10, 'Allison Gislason', 'hbrekke@example.net', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'sfqB7zDz5S', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(11, 'Rollin Flatley', 'russel.jessy@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'pVLBudIsw5', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51'),
(12, 'Coty Mante DVM', 'natalia.ryan@example.com', '2020-11-16 20:08:50', '$2y$10$Lp4.3QI35z8neRB2ZhHDuepAsSgsfSm6a.lS1/ZU2FrdpbiPu/Sfi', NULL, NULL, 'ZFOXTmvdka', NULL, NULL, '2020-11-16 20:08:51', '2020-11-16 20:08:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `activity_thematic`
--
ALTER TABLE `activity_thematic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_thematic_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_thematic_thematic_id_foreign` (`thematic_id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_schedule_course_id_foreign` (`course_id`),
  ADD KEY `course_schedule_schedule_id_foreign` (`schedule_id`);

--
-- Indices de la tabla `course_thematic`
--
ALTER TABLE `course_thematic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_thematic_course_id_foreign` (`course_id`),
  ADD KEY `course_thematic_thematic_id_foreign` (`thematic_id`);

--
-- Indices de la tabla `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `enviroments`
--
ALTER TABLE `enviroments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedule_thematic`
--
ALTER TABLE `schedule_thematic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_thematic_schedule_id_foreign` (`schedule_id`),
  ADD KEY `schedule_thematic_thematic_id_foreign` (`thematic_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `thematics`
--
ALTER TABLE `thematics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `activity_thematic`
--
ALTER TABLE `activity_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `course_schedule`
--
ALTER TABLE `course_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `course_thematic`
--
ALTER TABLE `course_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `enviroments`
--
ALTER TABLE `enviroments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedule_thematic`
--
ALTER TABLE `schedule_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `thematics`
--
ALTER TABLE `thematics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity_thematic`
--
ALTER TABLE `activity_thematic`
  ADD CONSTRAINT `activity_thematic_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_thematic_thematic_id_foreign` FOREIGN KEY (`thematic_id`) REFERENCES `thematics` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD CONSTRAINT `course_schedule_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_schedule_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_thematic`
--
ALTER TABLE `course_thematic`
  ADD CONSTRAINT `course_thematic_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_thematic_thematic_id_foreign` FOREIGN KEY (`thematic_id`) REFERENCES `thematics` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `schedule_thematic`
--
ALTER TABLE `schedule_thematic`
  ADD CONSTRAINT `schedule_thematic_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_thematic_thematic_id_foreign` FOREIGN KEY (`thematic_id`) REFERENCES `thematics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
