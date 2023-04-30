-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-04-2023 a las 19:50:07
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `velzon_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` int NOT NULL,
  `id_orden` int NOT NULL,
  `id_insumo` int NOT NULL,
  `cantidad` int NOT NULL,
  `u_medida` text NOT NULL,
  `valor_unitario` decimal(18,2) NOT NULL,
  `iva` int NOT NULL,
  `descuento` decimal(18,2) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id`, `id_orden`, `id_insumo`, `cantidad`, `u_medida`, `valor_unitario`, `iva`, `descuento`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 3, 'UMA', 28.00, 0, 0.00, 84.00, '2023-02-21 01:35:38', '2023-02-21 01:35:38'),
(2, 11, 3, 1, 'UMA', 0.00, 0, 0.00, 0.00, '2023-02-21 01:35:38', '2023-02-21 01:35:38'),
(3, 12, 1, 3, 'UMA', 28.00, 0, 0.00, 84.00, '2023-02-21 01:36:26', '2023-02-21 01:36:26'),
(4, 12, 3, 1, 'UMA', 0.00, 0, 0.00, 0.00, '2023-02-21 01:36:26', '2023-02-21 01:36:26'),
(5, 13, 1, 2, 'UMA', 40.00, 18, 4.00, 90.40, '2023-02-21 02:21:11', '2023-02-21 02:21:11'),
(6, 13, 2, 1, 'UMA', 25.00, 0, 0.00, 25.00, '2023-02-21 02:21:11', '2023-02-21 02:21:11'),
(7, 13, 3, 1, 'UMA', 34.00, 0, 0.00, 34.00, '2023-02-21 02:21:11', '2023-02-21 02:21:11'),
(8, 13, 4, 1, 'UMA', 2.00, 0, 0.00, 2.00, '2023-02-21 02:21:11', '2023-02-21 02:21:11'),
(9, 14, 8, 3, 'UMA', 10.00, 8, 1.00, 31.40, '2023-02-23 02:04:13', '2023-02-23 02:04:13'),
(10, 14, 9, 2, 'UMA', 2.00, 0, 0.00, 4.00, '2023-02-23 02:04:13', '2023-02-23 02:04:13'),
(11, 15, 1, 1, 'UMA', 334.00, 0, 0.00, 334.00, '2023-02-23 02:26:28', '2023-02-23 02:26:28'),
(12, 15, 2, 1, 'UMA', 32.00, 0, 0.00, 32.00, '2023-02-23 02:26:28', '2023-02-23 02:26:28'),
(13, 15, 9, 1, 'UMA', 232.00, 0, 0.00, 232.00, '2023-02-23 02:26:28', '2023-02-23 02:26:28'),
(14, 15, 10, 1, 'UMA', 345.00, 0, 0.00, 345.00, '2023-02-23 02:26:28', '2023-02-23 02:26:28'),
(15, 16, 9, 1, 'UMA', 10.00, 5, 2.00, 8.50, '2023-02-23 22:17:28', '2023-02-23 22:17:28'),
(16, 16, 10, 10, 'UMA', 10000.00, 19, 20000.00, 95200.00, '2023-02-23 22:17:28', '2023-02-23 22:17:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id` int NOT NULL,
  `id_categ` int NOT NULL,
  `id_subcateg` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `color` int NOT NULL,
  `unidad` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `t_insumo` int NOT NULL,
  `ancho_tela` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `id_categ`, `id_subcateg`, `nombre`, `color`, `unidad`, `img`, `t_insumo`, `ancho_tela`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'aaaaaaaaaaaa', 7, 8, 'http://localhost:81/laravel/microservicio/insumos/public/imginsumo/ins_Djo0afMSlk.png', 2, '7cm', '2023-02-18 21:43:01', '2023-02-23 21:48:20'),
(2, 1, 9, 'bfr', 7, 8, 'http://localhost:81/laravel/microservicio/insumos/public/imginsumo/ins_9384bBNrhi.png', 2, '3cm', '2023-02-18 21:43:16', '2023-02-23 12:09:02'),
(7, 1, 12, 'c', 24, 8, 'http://localhost:81/laravel/microservicio/insumos/public/imginsumo/ins_9wN4lmEa5U.png', 3, 'sddsd', '2023-02-21 04:48:08', '2023-02-21 04:48:08'),
(9, 30, 31, 'e', 24, 8, 'http://localhost:81/laravel/microservicio/insumos/public/imginsumo/ins_QEktIc2fsc.png', 2, 'null', '2023-02-21 07:51:59', '2023-02-23 10:02:53'),
(10, 30, 15, 'tela algodon', 7, 8, 'http://localhost:81/laravel/microservicio/insumos/public/imginsumo/ins_dZfczyFQDU.png', 3, '2cm', '2023-02-23 01:30:09', '2023-02-23 01:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_27_201545_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordencompra`
--

CREATE TABLE `ordencompra` (
  `id` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `id_formapago` int NOT NULL,
  `fecha_solicitud` varchar(255) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `total` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ordencompra`
--

INSERT INTO `ordencompra` (`id`, `id_proveedor`, `id_formapago`, `fecha_solicitud`, `archivo`, `total`, `created_at`, `updated_at`) VALUES
(1, 5, 18, 'fecha', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_57dzqISmRM.pdf', 9.00, '2023-02-21 01:05:29', '2023-02-21 01:05:29'),
(2, 5, 18, '2023-02-17', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_MPAaQrUWJk.pdf', 9.00, '2023-02-21 01:06:06', '2023-02-21 01:06:06'),
(3, 7, 18, '2023-02-24', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_18CgDcLTXs.pdf', 9.00, '2023-02-21 01:07:52', '2023-02-21 01:07:52'),
(4, 7, 18, '2023-02-04', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_Ato1jB3Gxg.pdf', 84.00, '2023-02-21 01:10:46', '2023-02-21 01:10:46'),
(5, 7, 18, '2023-03-02', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_HA7RAOzz3d.pdf', 84.00, '2023-02-21 01:11:22', '2023-02-21 01:11:22'),
(6, 5, 19, '2023-02-16', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_AE34yhS8cE.pdf', 84.00, '2023-02-21 01:14:23', '2023-02-21 01:14:23'),
(7, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_WZSatsfVm6.pdf', 84.00, '2023-02-21 01:29:51', '2023-02-21 01:29:51'),
(8, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_v9jjkIq4Se.pdf', 84.00, '2023-02-21 01:34:17', '2023-02-21 01:34:17'),
(9, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_rC48j60cul.pdf', 84.00, '2023-02-21 01:34:36', '2023-02-21 01:34:36'),
(10, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_YI4ziA5odW.pdf', 84.00, '2023-02-21 01:35:06', '2023-02-21 01:35:06'),
(11, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_F1ZFN78PtY.pdf', 84.00, '2023-02-21 01:35:38', '2023-02-21 01:35:38'),
(12, 6, 18, '2023-02-19', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_DBAvZ4sBA9.pdf', 84.00, '2023-02-21 01:36:26', '2023-02-21 01:36:26'),
(13, 7, 18, '2023-02-24', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_ryQegm3D5N.pdf', 402.20, '2023-02-21 02:21:11', '2023-02-21 02:21:11'),
(14, 3, 18, '2023-02-23', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_PhX4KKvYVO.pdf', 35.40, '2023-02-23 02:04:13', '2023-02-23 02:04:13'),
(15, 5, 19, '2023-02-03', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_eLAhyIxx3t.pdf', 943.00, '2023-02-23 02:26:28', '2023-02-23 02:26:28'),
(16, 6, 32, '2023-02-24', 'http://localhost:81/laravel/microservicio/insumos/public/pdforden/ord_Kqt23vEKEp.pdf', 95208.50, '2023-02-23 22:17:28', '2023-02-23 22:17:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizacion`
--

CREATE TABLE `parametrizacion` (
  `id` int NOT NULL,
  `id_tipo` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `parametrizacion`
--

INSERT INTO `parametrizacion` (`id`, `id_tipo`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Botón', 'aaa', 1, NULL, '2023-02-12 01:32:57'),
(2, 3, 'producto terminado', 'teminado', 0, '2023-02-03 03:02:17', '2023-02-03 03:02:17'),
(3, 3, 'Insumos', 'todo tipo insumos', 1, '2023-02-03 03:02:42', '2023-02-05 12:38:05'),
(7, 5, 'Azul', '#fb32sa32', 1, '2023-02-05 02:46:18', '2023-02-05 02:46:18'),
(8, 6, 'UMA', 'aaaaa', 0, '2023-02-05 03:22:00', '2023-02-05 12:45:20'),
(9, 2, 'Lino', 'Todo tipo', 1, '2023-02-05 04:17:00', '2023-02-05 12:21:45'),
(12, 2, 'tela', 'bbb', 1, '2023-02-05 12:46:36', '2023-02-19 00:03:48'),
(14, 3, 'zxcczx', 'zxczxczxc', 1, '2023-02-05 12:50:20', '2023-02-05 12:50:20'),
(15, 2, 'sub categ nom', 'sff', 1, '2023-02-06 01:00:09', '2023-02-06 01:00:09'),
(18, 4, 'crédito', 'aaa', 1, '2023-02-21 00:00:28', '2023-02-21 00:00:28'),
(19, 4, 'DEbito', 'fsd', 1, '2023-02-21 00:02:30', '2023-02-21 00:02:30'),
(24, 5, 'azules', 'sdsdf', 1, '2023-02-21 02:43:54', '2023-02-21 02:43:54'),
(25, 5, 'Rojo', '#3232RWs3', 1, '2023-02-21 03:48:47', '2023-02-21 03:48:47'),
(26, 4, 'Efectivo', 'sdf', 1, '2023-02-21 03:50:10', '2023-02-21 03:50:10'),
(37, 6, 'prueba2', 'ESTA ES UNA PRUEBA', 0, '2023-04-30 07:32:14', '2023-04-30 07:32:14'),
(39, 3, 'prueba0002', 'esta es una prueba de funcionamiento del modal', 0, '2023-04-30 21:36:51', '2023-04-30 21:36:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'ver-roles', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(6, 'crear-roles', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(7, 'editar-roles', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(8, 'borrar-roles', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(9, 'ver-user', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(10, 'crear-user', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(11, 'editar-user', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(12, 'borrar-user', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(13, 'ver-proveedor', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(14, 'crear-proveedor', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(15, 'editar-proveedor', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(16, 'borrar-proveedor', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(17, 'ver-parametrizacion', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(18, 'crear-parametrizacion', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(19, 'editar-parametrizacion', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(20, 'borrar-parametrizacion', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(21, 'ver-insumos', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(22, 'crear-insumos', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(23, 'editar-insumos', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(24, 'borrar-insumos', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(25, 'ver-ordenCompra', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(26, 'crear-ordenCompra', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(27, 'editar-ordenCompra', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39'),
(28, 'borrar-ordenCompra', 'web', '2023-04-29 04:29:39', '2023-04-29 04:29:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `telefono_fijo` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre_contacto` varchar(255) NOT NULL,
  `t_insumo` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `razon_social`, `nit`, `telefono_fijo`, `celular`, `direccion`, `ciudad`, `email`, `nombre_contacto`, `t_insumo`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'SAC', 'FMD', '92332545', '9322335342', 'av. mx', 'Antioquia - Abejorral', 'adminq@gmail', 'frankDs', '[2,3]', 'lino, botones', '2023-02-03 03:18:01', '2023-02-17 22:52:52'),
(3, 'fsd', 'sdfsdf', '32412341', '424324324', '4sdffsd', 'Antioquia - Apartadó', 'sdfsdf', 'sdfsdf', '[14]', 'sdfsdf', '2023-02-16 03:55:13', '2023-02-17 22:54:52'),
(5, 'franvv', 'aaaa', '2334114', '142412441', 'asaaa', 'Antioquia - Argelia', 'aaa', 'aa', '[3]', 'aa', '2023-02-16 03:59:31', '2023-02-23 11:45:07'),
(6, 'eggdf', 'gdfgdfg', '345535345', 'gdfgdfgdf', 'gdfgdf', 'Antioquia - Anorí', 'gdfgdfgdfgf', 'gdfgdfgf', '[3,14]', 'cvsvxcxcv', '2023-02-17 00:41:27', '2023-02-23 09:47:39'),
(7, 'bbbbbb', 'czxczx', '121414124', '1244124114', '4xcvxv', 'Guainía - San Felipe', 'xcvxcvxcv', 'xcvvxcxcv', '[3]', 'vxcxcvxcv', '2023-02-17 00:44:11', '2023-02-17 00:44:11'),
(8, 'aaaa', 'aa', '123123', '31321', 'aads', 'Antioquia - Betulia', 'ada', 'sadsd', '[3]', 'ad', '2023-02-21 08:49:54', '2023-02-23 12:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdministrador', 'web', '2023-04-29 08:09:20', '2023-04-29 08:09:20'),
(2, 'Administrador', 'web', '2023-04-29 08:12:16', '2023-04-29 08:12:16'),
(3, 'Vendedor', 'web', '2023-04-29 08:13:04', '2023-04-29 08:13:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(5, 2),
(9, 2),
(13, 2),
(17, 2),
(21, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(13, 3),
(17, 3),
(21, 3),
(25, 3),
(26, 3),
(27, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_parametrizacion`
--

CREATE TABLE `tipo_parametrizacion` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_parametrizacion`
--

INSERT INTO `tipo_parametrizacion` (`id`, `nombre`) VALUES
(1, 'Categoría'),
(2, 'Sub Categoría'),
(3, 'Tipo de Insumo'),
(4, 'Forma de Pago'),
(5, 'Colores'),
(6, 'Unidad de Medida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'super administrador', 'superadmin@gmail.com', NULL, '$2y$10$.9elJvgVb3VlLTcQ.8EUTOu1lxBF5UHpS6Mvq3QUmRsTqMFzPoRhK', '1682700736.jpeg', NULL, '2023-04-28 21:52:16', '2023-04-28 21:52:16'),
(10, 'Tottto', 'totttto@gmail.com', NULL, '$2y$10$ksYdoJwOaKPmcqK1.IRp..7hljHTMywNDkzBMc.vGfai0MyQkP55u', '1682790627.png', NULL, '2023-04-29 22:50:27', '2023-04-29 22:50:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `ordencompra`
--
ALTER TABLE `ordencompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametrizacion`
--
ALTER TABLE `parametrizacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipo_parametrizacion`
--
ALTER TABLE `tipo_parametrizacion`
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
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ordencompra`
--
ALTER TABLE `ordencompra`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `parametrizacion`
--
ALTER TABLE `parametrizacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_parametrizacion`
--
ALTER TABLE `tipo_parametrizacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
