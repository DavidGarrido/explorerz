-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 19:50:38
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-30 22:43:31', '2020-11-30 22:43:31');

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

--
-- Volcado de datos para la tabla `course_schedule`
--

INSERT INTO `course_schedule` (`id`, `course_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-30 22:59:34', '2020-11-30 22:59:34');

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
(1, 1, 1, '2020-11-30 22:43:31', '2020-11-30 22:43:31'),
(2, 1, 5, '2020-11-30 22:43:39', '2020-11-30 22:43:39'),
(3, 1, 26, '2020-11-30 22:43:42', '2020-11-30 22:43:42'),
(4, 1, 27, '2020-11-30 22:55:45', '2020-11-30 22:55:45'),
(5, 1, 28, '2020-11-30 22:55:46', '2020-11-30 22:55:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_admins`
--

CREATE TABLE `data_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_parents`
--

CREATE TABLE `data_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_one` bigint(20) NOT NULL,
  `cel_two` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_parents`
--

INSERT INTO `data_parents` (`id`, `relationship`, `cel_one`, `cel_two`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Madre', 3006284320, NULL, 'Crr 78p 42c 31 sur', NULL, NULL),
(2, 'Padre', 3205731318, NULL, 'Cll 75 c bis sur No 2 - 83 este', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_students`
--

CREATE TABLE `data_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_teachers`
--

CREATE TABLE `data_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensions`
--

CREATE TABLE `dimensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dimensions`
--

INSERT INTO `dimensions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Corporal', '2020-11-30 22:36:53', '2020-11-30 22:36:53'),
(2, 'Cognitiva', '2020-11-30 22:36:56', '2020-11-30 22:36:56'),
(3, 'Comunicativa', '2020-11-30 22:37:00', '2020-11-30 22:37:00'),
(4, 'Etica', '2020-11-30 22:37:03', '2020-11-30 22:37:03'),
(5, 'Estetica', '2020-11-30 22:37:05', '2020-11-30 22:37:05'),
(6, 'Actitudinal', '2020-11-30 22:37:10', '2020-11-30 22:37:10'),
(7, 'Valorativa', '2020-11-30 22:37:12', '2020-11-30 22:37:12'),
(8, 'Matemáticas', '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(9, 'Humanidades: Lengua Castellana e Idioma Extranjero', '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(10, 'Ciencias Naturales y Educación Ambiental', '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(11, 'Ciencias Sociales', '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(12, 'Educación Artistica', '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(13, 'Educación Ética y en Valores Humanos', '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(14, 'Educación Fisica, Recreación y Deportes', '2020-11-30 22:37:25', '2020-11-30 22:37:25'),
(15, 'Educación Religiosa', '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(16, 'Tecnología e Informática', '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(17, 'Ciencias Sociales (Ciencias Políticas y Económicas)', '2020-11-30 22:37:32', '2020-11-30 22:37:32'),
(18, 'Filosofía', '2020-11-30 22:37:32', '2020-11-30 22:37:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimension_model_course`
--

CREATE TABLE `dimension_model_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimension_id` bigint(20) UNSIGNED NOT NULL,
  `model_course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dimension_model_course`
--

INSERT INTO `dimension_model_course` (`id`, `dimension_id`, `model_course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-30 22:36:54', '2020-11-30 22:36:54'),
(2, 1, 2, '2020-11-30 22:36:54', '2020-11-30 22:36:54'),
(3, 1, 3, '2020-11-30 22:36:55', '2020-11-30 22:36:55'),
(4, 2, 1, '2020-11-30 22:36:56', '2020-11-30 22:36:56'),
(5, 2, 2, '2020-11-30 22:36:58', '2020-11-30 22:36:58'),
(6, 2, 3, '2020-11-30 22:36:59', '2020-11-30 22:36:59'),
(7, 3, 1, '2020-11-30 22:37:01', '2020-11-30 22:37:01'),
(8, 3, 2, '2020-11-30 22:37:02', '2020-11-30 22:37:02'),
(9, 3, 3, '2020-11-30 22:37:03', '2020-11-30 22:37:03'),
(10, 4, 1, '2020-11-30 22:37:04', '2020-11-30 22:37:04'),
(11, 4, 2, '2020-11-30 22:37:04', '2020-11-30 22:37:04'),
(12, 4, 3, '2020-11-30 22:37:05', '2020-11-30 22:37:05'),
(13, 5, 1, '2020-11-30 22:37:07', '2020-11-30 22:37:07'),
(14, 5, 2, '2020-11-30 22:37:08', '2020-11-30 22:37:08'),
(15, 5, 3, '2020-11-30 22:37:10', '2020-11-30 22:37:10'),
(16, 6, 1, '2020-11-30 22:37:11', '2020-11-30 22:37:11'),
(17, 6, 2, '2020-11-30 22:37:12', '2020-11-30 22:37:12'),
(18, 6, 3, '2020-11-30 22:37:12', '2020-11-30 22:37:12'),
(19, 7, 1, '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(20, 7, 2, '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(21, 7, 3, '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(22, 8, 4, '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(23, 8, 5, '2020-11-30 22:37:13', '2020-11-30 22:37:13'),
(24, 8, 6, '2020-11-30 22:37:14', '2020-11-30 22:37:14'),
(25, 8, 7, '2020-11-30 22:37:14', '2020-11-30 22:37:14'),
(26, 8, 8, '2020-11-30 22:37:14', '2020-11-30 22:37:14'),
(27, 8, 9, '2020-11-30 22:37:14', '2020-11-30 22:37:14'),
(28, 8, 10, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(29, 8, 11, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(30, 8, 12, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(31, 8, 13, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(32, 8, 14, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(33, 9, 4, '2020-11-30 22:37:15', '2020-11-30 22:37:15'),
(34, 9, 5, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(35, 9, 6, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(36, 9, 7, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(37, 9, 8, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(38, 9, 9, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(39, 9, 10, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(40, 9, 11, '2020-11-30 22:37:16', '2020-11-30 22:37:16'),
(41, 9, 12, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(42, 9, 13, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(43, 9, 14, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(44, 10, 4, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(45, 10, 5, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(46, 10, 6, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(47, 10, 7, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(48, 10, 8, '2020-11-30 22:37:17', '2020-11-30 22:37:17'),
(49, 10, 9, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(50, 10, 10, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(51, 10, 11, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(52, 10, 12, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(53, 10, 13, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(54, 10, 14, '2020-11-30 22:37:18', '2020-11-30 22:37:18'),
(55, 11, 4, '2020-11-30 22:37:19', '2020-11-30 22:37:19'),
(56, 11, 5, '2020-11-30 22:37:19', '2020-11-30 22:37:19'),
(57, 11, 6, '2020-11-30 22:37:19', '2020-11-30 22:37:19'),
(58, 11, 7, '2020-11-30 22:37:19', '2020-11-30 22:37:19'),
(59, 11, 8, '2020-11-30 22:37:19', '2020-11-30 22:37:19'),
(60, 11, 9, '2020-11-30 22:37:20', '2020-11-30 22:37:20'),
(61, 11, 10, '2020-11-30 22:37:20', '2020-11-30 22:37:20'),
(62, 11, 11, '2020-11-30 22:37:20', '2020-11-30 22:37:20'),
(63, 11, 12, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(64, 11, 13, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(65, 11, 14, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(66, 12, 4, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(67, 12, 5, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(68, 12, 6, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(69, 12, 7, '2020-11-30 22:37:21', '2020-11-30 22:37:21'),
(70, 12, 8, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(71, 12, 9, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(72, 12, 10, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(73, 12, 11, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(74, 12, 12, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(75, 12, 13, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(76, 12, 14, '2020-11-30 22:37:22', '2020-11-30 22:37:22'),
(77, 13, 4, '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(78, 13, 5, '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(79, 13, 6, '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(80, 13, 7, '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(81, 13, 8, '2020-11-30 22:37:23', '2020-11-30 22:37:23'),
(82, 13, 9, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(83, 13, 10, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(84, 13, 11, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(85, 13, 12, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(86, 13, 13, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(87, 13, 14, '2020-11-30 22:37:24', '2020-11-30 22:37:24'),
(88, 14, 4, '2020-11-30 22:37:25', '2020-11-30 22:37:25'),
(89, 14, 5, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(90, 14, 6, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(91, 14, 7, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(92, 14, 8, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(93, 14, 9, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(94, 14, 10, '2020-11-30 22:37:26', '2020-11-30 22:37:26'),
(95, 14, 11, '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(96, 14, 12, '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(97, 14, 13, '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(98, 14, 14, '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(99, 15, 4, '2020-11-30 22:37:27', '2020-11-30 22:37:27'),
(100, 15, 5, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(101, 15, 6, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(102, 15, 7, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(103, 15, 8, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(104, 15, 9, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(105, 15, 10, '2020-11-30 22:37:28', '2020-11-30 22:37:28'),
(106, 15, 11, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(107, 15, 12, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(108, 15, 13, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(109, 15, 14, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(110, 16, 4, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(111, 16, 5, '2020-11-30 22:37:29', '2020-11-30 22:37:29'),
(112, 16, 6, '2020-11-30 22:37:30', '2020-11-30 22:37:30'),
(113, 16, 7, '2020-11-30 22:37:30', '2020-11-30 22:37:30'),
(114, 16, 8, '2020-11-30 22:37:30', '2020-11-30 22:37:30'),
(115, 16, 9, '2020-11-30 22:37:30', '2020-11-30 22:37:30'),
(116, 16, 10, '2020-11-30 22:37:31', '2020-11-30 22:37:31'),
(117, 16, 11, '2020-11-30 22:37:31', '2020-11-30 22:37:31'),
(118, 16, 12, '2020-11-30 22:37:31', '2020-11-30 22:37:31'),
(119, 16, 13, '2020-11-30 22:37:31', '2020-11-30 22:37:31'),
(120, 16, 14, '2020-11-30 22:37:32', '2020-11-30 22:37:32'),
(121, 17, 13, '2020-11-30 22:37:32', '2020-11-30 22:37:32'),
(122, 17, 14, '2020-11-30 22:37:32', '2020-11-30 22:37:32'),
(123, 18, 13, '2020-11-30 22:37:33', '2020-11-30 22:37:33'),
(124, 18, 14, '2020-11-30 22:37:33', '2020-11-30 22:37:33');

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
(20, '2020_11_16_155054_create_course_thematic_table', 1),
(21, '2020_11_20_173502_create_dimensions_table', 1),
(22, '2020_11_20_174714_create_dimension_model_course_table', 1),
(23, '2020_11_29_013722_create_data_students_table', 1),
(24, '2020_11_29_013801_create_data_admins_table', 1),
(25, '2020_11_29_013821_create_data_teachers_table', 1),
(26, '2020_11_29_013841_create_data_parents_table', 1),
(27, '2020_11_29_014042_create_clubs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_courses`
--

CREATE TABLE `model_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_courses`
--

INSERT INTO `model_courses` (`id`, `group`, `created_at`, `updated_at`) VALUES
(1, 'Jardin', '2020-11-30 22:36:44', '2020-11-30 22:36:44'),
(2, 'Pre-kinder', '2020-11-30 22:36:44', '2020-11-30 22:36:44'),
(3, 'kinder', '2020-11-30 22:36:45', '2020-11-30 22:36:45'),
(4, '1er Grado', '2020-11-30 22:36:46', '2020-11-30 22:36:46'),
(5, '2do Grado', '2020-11-30 22:36:46', '2020-11-30 22:36:46'),
(6, '3ro Grado', '2020-11-30 22:36:46', '2020-11-30 22:36:46'),
(7, '4to Grado', '2020-11-30 22:36:47', '2020-11-30 22:36:47'),
(8, '5to Grado', '2020-11-30 22:36:48', '2020-11-30 22:36:48'),
(9, '6to Grado', '2020-11-30 22:36:49', '2020-11-30 22:36:49'),
(10, '7mo Grado', '2020-11-30 22:36:50', '2020-11-30 22:36:50'),
(11, '8vo Grado', '2020-11-30 22:36:50', '2020-11-30 22:36:50'),
(12, '9no Grado', '2020-11-30 22:36:51', '2020-11-30 22:36:51'),
(13, '10mo Grado', '2020-11-30 22:36:52', '2020-11-30 22:36:52'),
(14, '11vo Grado', '2020-11-30 22:36:52', '2020-11-30 22:36:52');

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
(1, 'Todo cursos', 'course.all', 'Todos los permisos para cursos', '2020-11-30 22:36:35', '2020-11-30 22:36:35'),
(2, 'Listar cursos', 'course.index', 'El usuario podra vel el listado de cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(3, 'Crear cursos', 'course.create', 'El usuario podra vel el formulario de creacion de cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(4, 'Enviar cursos', 'course.store', 'El usuario podra enviar el formulacio de creacion de cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(5, 'Eliminar cursos', 'course.destroy', 'El usuario podra eliminar el cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(6, 'Editar cursos', 'course.update', 'El usuario enviar el formulario de edicion de cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(7, 'Ver cursos', 'course.show', 'El usuario podra ver la informacion del cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(8, 'Form. editar cursos', 'course.edit', 'El usuario podra ver el formulario de edicion del cursos', '2020-11-30 22:36:36', '2020-11-30 22:36:36'),
(9, 'Todo club', 'club.all', 'Todos los permisos para club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(10, 'Listar club', 'club.index', 'El usuario podra vel el listado de clubes', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(11, 'Crear club', 'club.create', 'El usuario podra vel el formulario de creacion de club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(12, 'Enviar club', 'club.store', 'El usuario podra enviar el formulacio de creacion de club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(13, 'Eliminar club', 'club.destroy', 'El usuario podra eliminar el club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(14, 'Editar club', 'club.update', 'El usuario enviar el formulario de edicion de club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(15, 'Ver club', 'club.show', 'El usuario podra ver la informacion del club', '2020-11-30 22:36:37', '2020-11-30 22:36:37'),
(16, 'Form. editar club', 'club.edit', 'El usuario podra ver el formulario de edicion del club', '2020-11-30 22:36:38', '2020-11-30 22:36:38'),
(17, 'Todo ambientes', 'enviroment.all', 'Todos los permisos para ambientes', '2020-11-30 22:36:38', '2020-11-30 22:36:38'),
(18, 'Listar ambientes', 'enviroment.index', 'El usuario podra vel el listado de ambientes', '2020-11-30 22:36:38', '2020-11-30 22:36:38'),
(19, 'Crear ambientes', 'enviroment.create', 'El usuario podra vel el formulario de creacion de ambientes', '2020-11-30 22:36:38', '2020-11-30 22:36:38'),
(20, 'Enviar ambientes', 'enviroment.store', 'El usuario podra enviar el formulacio de creacion de ambientes', '2020-11-30 22:36:39', '2020-11-30 22:36:39'),
(21, 'Eliminar ambientes', 'enviroment.destroy', 'El usuario podra eliminar el ambientes', '2020-11-30 22:36:39', '2020-11-30 22:36:39'),
(22, 'Editar ambientes', 'enviroment.update', 'El usuario enviar el formulario de edicion de ambientes', '2020-11-30 22:36:39', '2020-11-30 22:36:39'),
(23, 'Ver ambientes', 'enviroment.show', 'El usuario podra ver la informacion del ambientes', '2020-11-30 22:36:39', '2020-11-30 22:36:39'),
(24, 'Form. editar ambientes', 'enviroment.edit', 'El usuario podra ver el formulario de edicion del ambientes', '2020-11-30 22:36:40', '2020-11-30 22:36:40');

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
(1, 1, 1, '2020-11-30 22:36:40', '2020-11-30 22:36:40'),
(2, 1, 2, '2020-11-30 22:36:40', '2020-11-30 22:36:40'),
(3, 1, 3, '2020-11-30 22:36:40', '2020-11-30 22:36:40'),
(4, 1, 4, '2020-11-30 22:36:41', '2020-11-30 22:36:41'),
(5, 1, 5, '2020-11-30 22:36:41', '2020-11-30 22:36:41'),
(6, 1, 6, '2020-11-30 22:36:41', '2020-11-30 22:36:41'),
(7, 1, 7, '2020-11-30 22:36:41', '2020-11-30 22:36:41'),
(8, 1, 8, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(9, 1, 9, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(10, 1, 10, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(11, 1, 11, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(12, 1, 12, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(13, 1, 13, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(14, 1, 14, '2020-11-30 22:36:42', '2020-11-30 22:36:42'),
(15, 1, 15, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(16, 1, 16, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(17, 1, 17, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(18, 1, 18, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(19, 1, 19, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(20, 1, 20, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(21, 1, 21, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(22, 1, 22, '2020-11-30 22:36:43', '2020-11-30 22:36:43'),
(23, 1, 23, '2020-11-30 22:36:44', '2020-11-30 22:36:44'),
(24, 1, 24, '2020-11-30 22:36:44', '2020-11-30 22:36:44');

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
(1, 'admin', 'admin', 'Permisos de administrador', 'Yes', '2020-11-30 22:36:27', '2020-11-30 22:36:27'),
(2, 'teacher', 'teacher', 'Permisos de teacher', 'no', '2020-11-30 22:36:28', '2020-11-30 22:36:28'),
(3, 'parent', 'parent', 'Permisos de parent', 'no', '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(4, 'studen', 'studen', 'Permisos de studen', 'no', '2020-11-30 22:36:32', '2020-11-30 22:36:32');

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
(1, 1, 1, '2020-11-30 22:36:27', '2020-11-30 22:36:27'),
(2, 1, 2, '2020-11-30 22:36:28', '2020-11-30 22:36:28'),
(3, 1, 3, '2020-11-30 22:36:28', '2020-11-30 22:36:28'),
(4, 2, 4, '2020-11-30 22:36:28', '2020-11-30 22:36:28'),
(5, 2, 5, '2020-11-30 22:36:28', '2020-11-30 22:36:28'),
(6, 2, 6, '2020-11-30 22:36:29', '2020-11-30 22:36:29'),
(7, 2, 7, '2020-11-30 22:36:29', '2020-11-30 22:36:29'),
(8, 2, 8, '2020-11-30 22:36:29', '2020-11-30 22:36:29'),
(9, 2, 9, '2020-11-30 22:36:29', '2020-11-30 22:36:29'),
(10, 2, 10, '2020-11-30 22:36:29', '2020-11-30 22:36:29'),
(11, 3, 11, '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(12, 3, 12, '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(13, 3, 13, '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(14, 3, 14, '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(15, 3, 15, '2020-11-30 22:36:30', '2020-11-30 22:36:30'),
(16, 3, 16, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(17, 3, 17, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(18, 3, 18, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(19, 3, 19, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(20, 3, 20, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(21, 3, 21, '2020-11-30 22:36:31', '2020-11-30 22:36:31'),
(22, 3, 22, '2020-11-30 22:36:32', '2020-11-30 22:36:32'),
(23, 3, 23, '2020-11-30 22:36:32', '2020-11-30 22:36:32'),
(24, 3, 24, '2020-11-30 22:36:32', '2020-11-30 22:36:32'),
(25, 3, 25, '2020-11-30 22:36:32', '2020-11-30 22:36:32'),
(26, 4, 26, '2020-11-30 22:36:32', '2020-11-30 22:36:32'),
(27, 4, 27, '2020-11-30 22:36:33', '2020-11-30 22:36:33'),
(28, 4, 28, '2020-11-30 22:36:33', '2020-11-30 22:36:33'),
(29, 4, 29, '2020-11-30 22:36:33', '2020-11-30 22:36:33'),
(30, 4, 30, '2020-11-30 22:36:33', '2020-11-30 22:36:33'),
(31, 4, 31, '2020-11-30 22:36:34', '2020-11-30 22:36:34'),
(32, 4, 32, '2020-11-30 22:36:34', '2020-11-30 22:36:34'),
(33, 4, 33, '2020-11-30 22:36:34', '2020-11-30 22:36:34'),
(34, 4, 34, '2020-11-30 22:36:34', '2020-11-30 22:36:34'),
(35, 4, 35, '2020-11-30 22:36:34', '2020-11-30 22:36:34'),
(36, 4, 36, '2020-11-30 22:36:35', '2020-11-30 22:36:35'),
(37, 4, 37, '2020-11-30 22:36:35', '2020-11-30 22:36:35'),
(38, 4, 38, '2020-11-30 22:36:35', '2020-11-30 22:36:35'),
(39, 4, 39, '2020-11-30 22:36:35', '2020-11-30 22:36:35'),
(40, 4, 40, '2020-11-30 22:36:35', '2020-11-30 22:36:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `dimension` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `start`, `dimension`, `created_at`, `updated_at`) VALUES
(1, 5, 11, 5, '2020-11-30 22:59:34', '2020-11-30 22:59:34');

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
('PM6hIdL1YucfzFuiih1qsExSZ82a15STNSKSm7Py', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMHpxY2hVQ0FTQVdOVzY2ejRlY2RMR1BoVDZVU01XU25qWjlKTmxDMiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjgxOiJodHRwOi8vbG9jYWxob3N0OjgwODEvZGFzaGJvYXJkP2FjdGl2ZT0xJmNvbnRlbnQ9c3R1ZGVudHMmc2VsZWN0ZWQ9Mjgmc2hvdz1jb3Vyc2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkREhmOHBnWjVxM2VTcDRGUGNiQkRVdWlUc3YzYm5WQkN3WUJSbS5ac2NnZTdLbkhwSHZhTjYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJERIZjhwZ1o1cTNlU3A0RlBjYkJEVXVpVHN2M2JuVkJDd1lCUm0uWnNjZ2U3S25IcEh2YU42Ijt9', 1606759188);

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
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `usertable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `parent_id`, `profile_photo_path`, `usertable_id`, `usertable_type`, `created_at`, `updated_at`) VALUES
(1, 'Nick Dickinson', 'pleffler@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'kac3IDFyrN', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:19', '2020-11-30 22:36:19'),
(2, 'Dr. Angela Rohan I', 'elijah12@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'sZ3nmHhBsI', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:19', '2020-11-30 22:36:19'),
(3, 'Kole Heaney Sr.', 'xgutmann@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'AHEauAeMOo', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:20', '2020-11-30 22:36:20'),
(4, 'Prof. Ashlee Considine DVM', 'sauer.chauncey@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'vcPIHUYlYs', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:20', '2020-11-30 22:36:20'),
(5, 'Dr. Lorena Wiza', 'erick.daniel@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'DE19TfvIVs', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:20', '2020-11-30 22:36:20'),
(6, 'Mr. Faustino Fahey I', 'ubotsford@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'EiSq2BmUAi', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:21', '2020-11-30 22:36:21'),
(7, 'Norberto Langworth Jr.', 'emmerich.jaclyn@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'pY3x4QZSCm', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:21', '2020-11-30 22:36:21'),
(8, 'Prof. Zack Huel Jr.', 'emiliano09@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '9JX7HtFLlX', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:21', '2020-11-30 22:36:21'),
(9, 'Ceasar Witting', 'hodkiewicz.camron@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'z0aGIufDb0', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:21', '2020-11-30 22:36:21'),
(10, 'Armani Dickinson V', 'rutherford.flavio@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '21yC50YcWU', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:21', '2020-11-30 22:36:21'),
(11, 'Laurie Rogahn', 'dorothea48@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '5SpXYTTU7y', NULL, NULL, NULL, 1, 'App\\Models\\DataParent', '2020-11-30 22:36:22', '2020-11-30 22:36:22'),
(12, 'Ellen Mann', 'kathryne29@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'GPZ79uQTIq', NULL, NULL, NULL, 2, 'App\\Models\\DataParent', '2020-11-30 22:36:22', '2020-11-30 22:36:22'),
(13, 'Ms. Shaniya Dickinson Jr.', 'peggie07@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'VzvzmYmP7v', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:22', '2020-11-30 22:36:22'),
(14, 'Jayde Fadel I', 'ettie89@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'zUaomeKgAu', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:22', '2020-11-30 22:36:22'),
(15, 'Dr. Lawrence Ankunding', 'iveum@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'Hcaji6RMsi', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(16, 'Clotilde Harber', 'karen.maggio@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'AJ0lLNzBfw', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(17, 'Zaria Bernhard', 'ruecker.emelie@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'nQNCKQ6H4B', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(18, 'Benjamin Bauch', 'sdenesik@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'cdFYm3FkeZ', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(19, 'Aidan Funk', 'glover.rafaela@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'mTzdxt3zBx', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(20, 'Mr. Guido Jenkins I', 'bonita.kozey@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '5ESVKo1uuR', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:23', '2020-11-30 22:36:23'),
(21, 'Celine Jacobson', 'franecki.alene@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'HhBXuYEXm7', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:24', '2020-11-30 22:36:24'),
(22, 'Ms. Kaylee Graham', 'gbode@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'YvEaIFrH0L', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:24', '2020-11-30 22:36:24'),
(23, 'Wilbert McCullough', 'hegmann.ken@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'McUU1ubGYZ', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:24', '2020-11-30 22:36:24'),
(24, 'Lucinda Kuhlman', 'bahringer.eulalia@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'zdrIytSsjq', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:24', '2020-11-30 22:36:24'),
(25, 'Juvenal Rau', 'cristobal07@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'Y7L3pCBk6X', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:24', '2020-11-30 22:36:24'),
(26, 'Dexter Roob', 'gisselle.will@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'kB5D1UZb8J', NULL, 11, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:44:06'),
(27, 'Amelia Doyle', 'yconsidine@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'o0JgmgVgk2', NULL, 11, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:51:00'),
(28, 'Evert Koss', 'ischultz@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '9MhqFnpW4I', NULL, 12, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:53:22'),
(29, 'Vella Huels', 'igreenholt@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'XXgsiojHwo', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:36:25'),
(30, 'Erling Hyatt II', 'simonis.demond@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'U8yDlO3Srv', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:36:25'),
(31, 'Miss Lacey Davis III', 'pfeffer.remington@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'tnVw0C0j7h', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:36:25'),
(32, 'Samara Rath II', 'dion.gibson@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'lmKnal7QCN', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:25', '2020-11-30 22:36:25'),
(33, 'Prof. Imelda Gerhold', 'sipes.emerald@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'NCZqmN7wBj', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(34, 'Jaquelin Dietrich', 'brittany25@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'er43VkWaem', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(35, 'Domenico Bogan', 'lester28@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'hfLbysDDZl', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(36, 'Mireille Sanford', 'lebsack.alexzander@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'WAAltR52XI', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(37, 'Bret Fisher DVM', 'florence.gusikowski@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, '5VGP6yXr7X', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(38, 'Dr. Cloyd Kuvalis', 'legros.harold@example.org', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'i4YCcN32yp', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:26', '2020-11-30 22:36:26'),
(39, 'Dr. Lesly Schmitt I', 'cruickshank.reggie@example.com', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'PlUdh79c4N', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:27', '2020-11-30 22:36:27'),
(40, 'Tyrell Jast', 'arlo.stiedemann@example.net', '2020-11-30 22:36:19', '$2y$10$DHf8pgZ5q3eSp4FPcbBDUuiTsv3bnVBCwYBRm.Zscge7KnHpHvaN6', NULL, NULL, 'xIX23YPC88', NULL, NULL, NULL, NULL, NULL, '2020-11-30 22:36:27', '2020-11-30 22:36:27');

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
-- Indices de la tabla `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_model_id_foreign` (`model_id`);

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
-- Indices de la tabla `data_admins`
--
ALTER TABLE `data_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data_parents`
--
ALTER TABLE `data_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data_students`
--
ALTER TABLE `data_students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data_teachers`
--
ALTER TABLE `data_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dimension_model_course`
--
ALTER TABLE `dimension_model_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dimension_model_course_dimension_id_foreign` (`dimension_id`),
  ADD KEY `dimension_model_course_model_course_id_foreign` (`model_course_id`);

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
-- Indices de la tabla `model_courses`
--
ALTER TABLE `model_courses`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `activity_thematic`
--
ALTER TABLE `activity_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course_schedule`
--
ALTER TABLE `course_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course_thematic`
--
ALTER TABLE `course_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `data_admins`
--
ALTER TABLE `data_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `data_parents`
--
ALTER TABLE `data_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `data_students`
--
ALTER TABLE `data_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `data_teachers`
--
ALTER TABLE `data_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `dimension_model_course`
--
ALTER TABLE `dimension_model_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `model_courses`
--
ALTER TABLE `model_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `schedule_thematic`
--
ALTER TABLE `schedule_thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `thematics`
--
ALTER TABLE `thematics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `model_courses` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `dimension_model_course`
--
ALTER TABLE `dimension_model_course`
  ADD CONSTRAINT `dimension_model_course_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dimension_model_course_model_course_id_foreign` FOREIGN KEY (`model_course_id`) REFERENCES `model_courses` (`id`) ON DELETE CASCADE;

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
