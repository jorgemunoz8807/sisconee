-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-02-2015 a las 14:57:10
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisconee`
--
CREATE DATABASE IF NOT EXISTS `sisconee` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sisconee`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_trabajo` int(11) DEFAULT NULL,
  `id_organismo` int(11) NOT NULL,
  `plan` int(11) DEFAULT NULL,
  `dias_permitidos` tinyint(4) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `fk_configuracion_organismo` (`id_organismo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `periodo_trabajo`, `id_organismo`, `plan`, `dias_permitidos`) VALUES
(1, 2015, 24, 50000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE IF NOT EXISTS `entidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codreeup` varchar(5) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `siglas` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_organismo` int(11) NOT NULL,
  `id_nae` int(11) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `id_entidad` int(11) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codreeup_UNIQUE` (`codreeup`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `siglas_UNIQUE` (`siglas`),
  KEY `fk_entidad_organismo1` (`id_organismo`),
  KEY `fk_entidad_nae1` (`id_nae`),
  KEY `fk_entidad_padre` (`id_entidad`),
  KEY `id_provincia` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id`, `codreeup`, `nombre`, `siglas`, `direccion`, `id_organismo`, `id_nae`, `telefono`, `correo`, `activo`, `id_entidad`, `id_provincia`) VALUES
(1, '5566', 'Universidades', 'ABC', 'direcccomn', 24, 3, '45678', 'cmar@citmatel.inf.cu', 1, 1, 5),
(2, '12345', 'Citmatel', 'CITMATEL', '47 y 20 Bosque', 24, 1, '12345', 'comercial@citmatel.inf.cu', 1, 2, 4),
(3, '23454', 'Universidad de La Habana', 'UH', 'Habana', 24, 1, '1213245', 'uh@uh.cu', 1, 1, 4),
(4, '2352', 'Citmatel PR', 'CPR', 'pinar', 24, 1, '2345', 'cpr@citmatel.cu', 1, 5, 4),
(5, '2134', 'Ciudad Universitaria JAE', 'CUJAE', 'Cujae', 24, 1, '124', 'cujae@cujae.cu', 1, 5, 5),
(6, '6578', 'entidad null', 'EN', 'desconocida', 6, 4, '3456789', 'ddff@citm.cu', 1, NULL, 4),
(7, '14', 'Citma Camaguey', 'CC', 'camaguey', 24, 4, '123456', 'bbb@ggg', 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectura_diaria_servicio`
--

CREATE TABLE IF NOT EXISTS `lectura_diaria_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) DEFAULT NULL,
  `consumo` int(11) NOT NULL DEFAULT '0',
  `plan_horariopico` int(11) DEFAULT NULL,
  `consumo_horariopico` int(11) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lectura_diariagen_servicio_servicio1` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `lectura_diaria_servicio`
--

INSERT INTO `lectura_diaria_servicio` (`id`, `plan`, `consumo`, `plan_horariopico`, `consumo_horariopico`, `fecha`, `id_servicio`) VALUES
(1, 500, 20, 0, 0, '2015-01-01', 1),
(2, 45, 250, 10, 8, '2015-01-01', 2),
(3, 500, 300, 0, 0, '2015-01-01', 3),
(4, 321, 200, 0, 0, '2015-01-01', 10),
(5, 745, 200, 250, 100, '2015-01-01', 11),
(6, 2000, 23, 0, 0, '2015-01-02', 1),
(7, 200, 100, 100, 50, '2015-01-02', 2),
(8, 300, 200, 0, 0, '2015-01-02', 3),
(9, 200, 100, 0, 0, '2015-01-02', 10),
(10, 300, 0, 100, 0, '2015-01-02', 11),
(11, 412, 125, 100, 50, '2015-02-01', 1),
(12, 300, 185, 100, 23, '2015-02-01', 2),
(13, 10, 7, 0, 0, '2015-02-01', 3),
(14, 42, 41, 20, 18, '2015-02-01', 10),
(15, 30, 29, 4, 2, '2015-02-01', 11),
(16, 78, 45, 0, 0, '2015-02-02', 1),
(17, 345, 341, 120, 119, '2015-02-19', 2),
(18, 721, 695, NULL, 0, '2015-02-02', 3),
(19, 41, 7, 5, 2, '2015-01-01', 12),
(20, 962, 952, 521, 23, '2015-01-02', 12),
(21, 352, 321, 74, 72, '2015-02-01', 12),
(22, 51, 45, 12, 9, '2015-02-02', 12);

--
-- Disparadores `lectura_diaria_servicio`
--
DROP TRIGGER IF EXISTS `LecturasLog_AU_trigger`;
DELIMITER //
CREATE TRIGGER `LecturasLog_AU_trigger` AFTER UPDATE ON `lectura_diaria_servicio`
 FOR EACH ROW BEGIN 
INSERT INTO trazas 
VALUES (null, 'actualizacion','lectura_diaria_servicio',NEW.id,CONCAT('plan:',NEW.plan,' consumo:',NEW.consumo,
                                                                       ' plan horario pico:',NEW.plan_horariopico,' consumo horario pico:',NEW.consumo_horariopico,
                                                                       ' id_servicio:', NEW.id_servicio),NOW(),1);

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_municipio_provincia1` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=339 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `codigo`, `descripcion`, `id_provincia`) VALUES
(171, '2101', 'SANDINO', 4),
(172, '2102', 'MANTUA', 2),
(173, '2103', 'MINAS DE MATAHAMBRE', 2),
(174, '2104', 'VINALES', 2),
(175, '2105', 'LA PALMA', 4),
(176, '2106', 'LOS PALACIOS', 4),
(177, '2107', 'CONSOLACION DEL SUR', 3),
(178, '2108', 'PINAR DEL RIO', 3),
(179, '2109', 'SAN LUIS', NULL),
(180, '2110', 'SAN JUAN Y MARTINEZ', NULL),
(181, '2111', 'GUANE', NULL),
(182, '2201', 'BAHIA HONDA', NULL),
(183, '2202', 'MARIEL', NULL),
(184, '2203', 'GUANAJAY', NULL),
(185, '2204', 'CAIMITO', NULL),
(186, '2205', 'BAUTA', NULL),
(187, '2206', 'SAN ANTONIO DE LOS BANOS', NULL),
(188, '2207', 'GUIRA DE MELENA', NULL),
(189, '2208', 'ALQUIZAR', NULL),
(190, '2209', 'ARTEMISA', NULL),
(191, '2210', 'CANDELARIA', NULL),
(192, '2211', 'SAN CRISTOBAL', NULL),
(193, '2301', 'PLAYA', NULL),
(194, '2302', 'PLAZA DE LA REVOLUCION', NULL),
(195, '2303', 'CENTRO HABANA', NULL),
(196, '2304', 'LA HABANA VIEJA', NULL),
(197, '2305', 'REGLA', NULL),
(198, '2306', 'LA HABANA DEL ESTE', NULL),
(199, '2307', 'GUANABACOA', NULL),
(200, '2308', 'SAN MIGUEL DEL PADRON', NULL),
(201, '2309', 'DIEZ DE OCTUBRE', NULL),
(202, '2310', 'CERRO', NULL),
(203, '2311', 'MARIANAO', NULL),
(204, '2312', 'LA LISA', NULL),
(205, '2313', 'BOYEROS', NULL),
(206, '2314', 'ARROYO NARANJO', NULL),
(207, '2315', 'COTORRO', NULL),
(208, '2401', 'BEJUCAL', NULL),
(209, '2402', 'SAN JOSE DE LAS LAJAS', NULL),
(210, '2403', 'JARUCO', NULL),
(211, '2404', 'SANTA CRUZ DEL NORTE', NULL),
(212, '2405', 'MADRUGA', NULL),
(213, '2406', 'NUEVA PAZ', NULL),
(214, '2407', 'SAN NICOLAS', NULL),
(215, '2408', 'GUINES', NULL),
(216, '2409', 'MELENA DEL SUR', NULL),
(217, '2410', 'BATABANO', NULL),
(218, '2411', 'QUIVICAN', NULL),
(219, '2501', 'MATANZAS', NULL),
(220, '2502', 'CARDENAS ', NULL),
(221, '2503', 'MARTI', NULL),
(222, '2504', 'COLON', NULL),
(223, '2505', 'PERICO', NULL),
(224, '2506', 'JOVELLANOS', NULL),
(225, '2507', 'PEDRO BETANCOURT', NULL),
(226, '2508', 'LIMONAR', NULL),
(227, '2509', 'UNION DE REYES', NULL),
(228, '2510', 'CIENAGA DE ZAPATA', NULL),
(229, '2511', 'JAGUEY GRANDE', NULL),
(230, '2512', 'CALIMETE', NULL),
(231, '2513', 'LOS ARABOS', NULL),
(232, '2601', 'CORRALILLO', NULL),
(233, '2602', 'QUEMADO DE GUINES', NULL),
(234, '2603', 'SAGUA LA GRANDE', NULL),
(235, '2604', 'ENCRUCIJADA', NULL),
(236, '2605', 'CAMAJUANI', NULL),
(237, '2606', 'CAIBARIEN', NULL),
(238, '2607', 'REMEDIOS', NULL),
(239, '2608', 'PLACETAS', NULL),
(240, '2609', 'SANTA CLARA', NULL),
(241, '2610', 'CIFUENTES', NULL),
(242, '2611', 'SANTO DOMINGO', NULL),
(243, '2612', 'RANCHUELO', NULL),
(244, '2613', 'MANICARAGUA', NULL),
(245, '2701', 'AGUADA DE PASAJEROS', NULL),
(246, '2702', 'RODAS', NULL),
(247, '2703', 'PALMIRA', NULL),
(248, '2704', 'LAJAS', NULL),
(249, '2705', 'CRUCES', NULL),
(250, '2706', 'CUMANAYAGUA', NULL),
(251, '2707', 'CIENFUEGOS', NULL),
(252, '2708', 'ABREUS', NULL),
(253, '2801', 'YAGUAJAY', NULL),
(254, '2802', 'JATIBONICO', NULL),
(255, '2803', 'TAGUASCO', NULL),
(256, '2804', 'CABAIGUAN', NULL),
(257, '2805', 'FOMENTO', NULL),
(258, '2806', 'TRINIDAD', NULL),
(259, '2807', 'SANCTI SPIRITUS', NULL),
(260, '2808', 'LA SIERPE', NULL),
(261, '2901', 'CHAMBAS', NULL),
(262, '2902', 'MORON', NULL),
(263, '2903', 'BOLIVIA', NULL),
(264, '2904', 'PRIMERO DE ENERO', NULL),
(265, '2905', 'CIRO REDONDO', NULL),
(266, '2906', 'FLORENCIA', NULL),
(267, '2907', 'MAJAGUA', NULL),
(268, '2908', 'CIEGO DE AVILA', NULL),
(269, '2909', 'VENEZUELA', NULL),
(270, '2910', 'BARAGUA', NULL),
(271, '3001', 'CARLOS MANUEL DE CESPEDES', NULL),
(272, '3002', 'ESMERALDA', NULL),
(273, '3003', 'SIERRA DE CUBITAS', NULL),
(274, '3004', 'MINAS', NULL),
(275, '3005', 'NUEVITAS', NULL),
(276, '3006', 'GUAIMARO', NULL),
(277, '3007', 'SIBANICU', NULL),
(278, '3008', 'CAMAGUEY', NULL),
(279, '3009', 'FLORIDA', NULL),
(280, '3010', 'VERTIENTES', NULL),
(281, '3011', 'JIMAGUAYU', NULL),
(282, '3012', 'NAJASA', NULL),
(283, '3013', 'SANTA CRUZ DEL SUR', NULL),
(284, '3101', 'MANATI', NULL),
(285, '3102', 'PUERTO PADRE', NULL),
(286, '3103', 'JESUS MENENDEZ', NULL),
(287, '3104', 'MAJIBACOA', NULL),
(288, '3105', 'LAS TUNAS', NULL),
(289, '3106', 'JOBABO', NULL),
(290, '3107', 'COLOMBIA', NULL),
(291, '3108', 'AMANCIO', NULL),
(292, '3201', 'GIBARA', NULL),
(293, '3202', 'RAFAEL FREYRE', NULL),
(294, '3203', 'BANES', NULL),
(295, '3204', 'ANTILLA', NULL),
(296, '3205', 'BAGUANOS', NULL),
(297, '3206', 'HOLGUIN', NULL),
(298, '3207', 'CALIXTO GARCIA', NULL),
(299, '3208', 'CACOCUM', NULL),
(300, '3209', 'URBANO NORIS', NULL),
(301, '3210', 'CUETO', NULL),
(302, '3211', 'MAYARI', NULL),
(303, '3212', 'FRANK PAIS', NULL),
(304, '3213', 'SAGUA DE TANAMO', NULL),
(305, '3214', 'MOA', NULL),
(306, '3301', 'RIO CAUTO', NULL),
(307, '3302', 'CAUTO CRISTO', NULL),
(308, '3303', 'JIGUANI', NULL),
(309, '3304', 'BAYAMO', NULL),
(310, '3305', 'YARA', NULL),
(311, '3306', 'MANZANILLO', NULL),
(312, '3307', 'CAMPECHUELA', NULL),
(313, '3308', 'MEDIA LUNA', NULL),
(314, '3309', 'NIQUERO', NULL),
(315, '3310', 'PILON', NULL),
(316, '3311', 'BARTOLOME MASO', NULL),
(317, '3312', 'BUEY ARRIBA', NULL),
(318, '3313', 'GUISA', NULL),
(319, '3401', 'CONTRAMAESTRE', NULL),
(320, '3402', 'MELLA', NULL),
(321, '3403', 'SAN LUIS', NULL),
(322, '3404', 'SEGUNDO FRENTE', NULL),
(323, '3405', 'SONGO - LA MAYA', NULL),
(324, '3406', 'SANTIAGO DE CUBA', NULL),
(325, '3407', 'PALMA SORIANO', NULL),
(326, '3408', 'TERCER FRENTE', NULL),
(327, '3409', 'GUAMA', NULL),
(328, '3501', 'EL SALVADOR', NULL),
(329, '3502', 'MANUEL TAMES', NULL),
(330, '3503', 'YATERAS', NULL),
(331, '3504', 'BARACOA', NULL),
(332, '3505', 'MAISI', NULL),
(333, '3506', 'IMIAS', NULL),
(334, '3507', 'SAN ANTONIO DEL SUR', NULL),
(335, '3508', 'CAIMANERA', NULL),
(336, '3509', 'GUANTANAMO', NULL),
(337, '3510', 'NICETO PEREZ', NULL),
(338, '4001', 'ISLA DE LA JUVENTUD', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nae`
--

CREATE TABLE IF NOT EXISTS `nae` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Nomenclador de actividades economicas' AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `nae`
--

INSERT INTO `nae` (`id`, `codigo`, `descripcion`) VALUES
(1, 'A', 'AGRICULTURA, GANADERÍA, CAZA Y SILVICULTURA'),
(2, 'B', 'PESCA'),
(3, 'C', 'EXPLOTACIÓN DE MINAS Y CANTERAS'),
(4, 'D', 'INDUSTRIA AZUCARERA'),
(5, 'E', 'INDUSTRIA MANUFACTURERA (EXCEPTO INDUSTRIA AZUCARERA) '),
(6, 'F', 'SUMINISTRO DE ELECTRICIDAD, GAS Y AGUA '),
(7, 'G', 'CONSTRUCCIÓN '),
(8, 'H', 'COMERCIO, REPARACIÓN DE EFECTOS PERSONALES.'),
(9, 'I', 'HOTELES Y RESTAURANTES'),
(10, 'J', 'TRANSPORTE, ALMACENAMIENTO Y COMUNICACIONES'),
(11, 'K', 'INTERMEDIACIÓN FINANCIERA'),
(12, 'L', 'SERVICIOS EMPRESARIALES, ACTIVIDADES INMOBILIARIAS Y DE ALQUILER'),
(13, 'M', 'ADMINISTRACIÓN PÚBLICA, DEFENSA, SEGURIDAD SOCIAL'),
(14, 'N', 'CIENCIA E INNOVACIÓN TECNOLÓGICA'),
(15, '0', 'EDUCACIÓN                           '),
(16, 'P', 'SALUD PÚBLICA Y ASISTENCIA SOCIAL'),
(17, 'Q', 'CULTURA, DEPORTE'),
(18, 'R', 'OTRAS ACTIVIDADES DE SERVICIOS COMUNALES, DE ASOCIACIONES Y PERSONALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismo`
--

CREATE TABLE IF NOT EXISTS `organismo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `siglas` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=94 ;

--
-- Volcado de datos para la tabla `organismo`
--

INSERT INTO `organismo` (`id`, `codigo`, `nombre`, `siglas`, `activo`) VALUES
(1, 100, 'CIMEX', 'CIMEX', 1),
(2, 102, 'Ministerio de Industrias', 'MINDUS', 1),
(3, 103, 'Ministerio de la Industria Sidero Mecánica', 'SIME', 1),
(4, 104, 'Ministerio de Energía y Minas', 'MINEM', 1),
(5, 105, 'Ministerio de la Industria Básica', 'MINBAS', 1),
(6, 107, 'Ministerio de la Industria Ligera', 'MINIL', 1),
(7, 108, 'Ministerio del Azúcar', 'MINAZ', 1),
(8, 109, 'Ministerio de la Industria Pesquera', 'MIP', 1),
(9, 110, 'Ministerio de la Industria Alimenticia', 'MINAL', 1),
(10, 111, 'Ministerio de la Industria Alimentaria', 'MINAL', 1),
(11, 113, 'Instituto Nacional de Recursos Hidráulicos', 'INRH', 1),
(12, 126, 'Ministerio de la Construcción', 'MICONS', 1),
(13, 131, 'Ministerio de la Agricultura', 'MINAG', 1),
(14, 151, 'Ministerio del Transporte', 'MITRANS', 1),
(15, 152, 'Instituto de la Aeronáutica Civil de Cuba', 'IACC', 1),
(16, 153, 'Instituto Nacional de Reservas Estatales', 'INRE', 1),
(17, 161, 'Ministerio de Comunicaciones', 'MINCOM', 1),
(18, 171, 'Ministerio del  Comercio Interior', 'MINCIN', 1),
(19, 173, 'Ministerio del Comercio Exterior', 'MINCEX', 1),
(20, 174, 'Ministerio del Comercio Exterior y la Inversión Extranjera', 'MINCEX', 1),
(21, 177, 'CEATM Nivel Central', 'CEATMNC', 1),
(22, 191, 'INSAC Nivel Central', 'INSACNC', 1),
(23, 201, 'INTUR Nivel Central', 'INTURNC', 1),
(24, 211, 'Ministerio de Ciencia,Tecnología y Medio Ambiente', 'CITMA', 1),
(25, 221, 'Ministerio de Educación', 'MINED', 1),
(26, 223, 'Ministerio de Educación Superior', 'MES', 1),
(27, 233, 'Instituto Cubano de Radio y Televisión', 'ICRT', 1),
(28, 234, 'Ministerio de  Cultura', 'MINCULT', 1),
(29, 241, 'Ministerio de Salud Publica', 'MINSAP', 1),
(30, 242, 'Instituto Nacional de Deportes,Educación Física y Recreación', 'INDER', 1),
(31, 249, 'Contraloría General de la República', 'CGR', 1),
(32, 250, 'Ministerio de Auditoría y Control', 'MAC', 1),
(33, 251, 'Banco Nacional de Cuba', 'BNC', 1),
(34, 252, 'Comité Estatal de Finanzas Nivel Central', 'CEFNC', 1),
(35, 253, 'Banco Popular de Ahorro', 'BPA', 1),
(36, 254, 'Ministerio de Finanzas y Precios', 'MFP', 1),
(37, 255, 'Ministerio para la Inversión Extranjera  y la  Colaboración Económica', 'MINVEC', 1),
(38, 256, 'Ministerio del Turismo', 'MINTUR', 1),
(39, 257, 'Banco Central de Cuba', 'BCC', 1),
(40, 258, 'Banco de Crédito y Comercio', 'BANDEC', 1),
(41, 259, 'Banco Exterior de Cuba', 'BEC', 1),
(42, 261, 'Ministerio de Economía y Planificación', 'MEP', 1),
(43, 262, 'Ministerio de Trabajo y Seguridad Social', 'MTSS', 1),
(44, 263, 'Ministerio de Justicia', 'MINJUS', 1),
(45, 264, 'Ministerio de Relaciones Exteriores', 'MINREX', 1),
(46, 265, 'Instituto de la Demanda Interna', 'IDI', 1),
(47, 266, 'CECE Nivel Central', 'CECENC', 1),
(48, 267, 'Tribunal Supremo Popular', 'TSP', 1),
(49, 268, 'Fiscalía General de la República', 'FGR', 1),
(50, 269, 'Comité Estatal de Precios Nivel Central', 'CEPNC', 1),
(51, 271, 'Ministerio de las Fuerzas Armadas Revolucionarias', 'MINFAR', 1),
(52, 272, 'Ministerio del Interior', 'MININT', 1),
(53, 278, 'ONDI', 'ONDI', 1),
(54, 281, 'Secretaría Ejecutiva para Asuntos Nucleares', 'SEAN', 1),
(55, 283, 'Instituto Cubano de Hidrografía', 'ICH', 1),
(56, 284, 'Instituto Nacional de Geodesia y Cartografía', 'INGC', 1),
(57, 300, 'Consejo de Estado', 'CE', 1),
(58, 301, 'Poder Popular Nacional - Asamblea Nacional', 'ANPP', 1),
(59, 302, 'Comité Ejecutivo del Consejo de Ministros', 'CECM', 1),
(60, 304, 'Aduana General de la República Nivel Central', 'AGR', 1),
(61, 305, 'Consejo de Ministros', 'CM', 1),
(62, 306, 'Oficina del Historiador de la Ciudad de la Habana', 'OHCH', 1),
(63, 311, 'Poder Popular de Pinar del Rio', 'PPPR', 1),
(64, 312, 'Poder Popular de La Habana', 'PPHB', 1),
(65, 313, 'Poder Popular de La Habana', 'PPLH', 1),
(66, 314, 'Poder Popular de Matanzas', 'PPMT', 1),
(67, 315, 'Poder Popular de Villa Clara', 'PPVC', 1),
(68, 316, 'Poder Popular de Cienfuegos', 'PPCF', 1),
(69, 317, 'Poder Popular de Sancti Spíritus', 'PPSS', 1),
(70, 318, 'Poder Popular de Ciego de Ávila', 'PPCA', 1),
(71, 319, 'Poder Popular de Camagüey', 'PPCM', 1),
(72, 320, 'Poder Popular de Las Tunas', 'PPLT', 1),
(73, 321, 'Poder Popular de Holguín', 'PPHG', 1),
(74, 322, 'Poder Popular de Granma', 'PPGR', 1),
(75, 323, 'Poder Popular de Santiago de Cuba', 'PPSC', 1),
(76, 324, 'Poder Popular de Guantánamo', 'PPGT', 1),
(77, 325, 'Poder Popular de Isla de la Juventud', 'PPIJ', 1),
(78, 326, 'Poder Popular de Artemisa', 'PPAR', 1),
(79, 327, 'Poder Popular de Mayabeque', 'PPMY', 1),
(80, 501, 'Partido Comunista de Cuba', 'PCC', 1),
(81, 502, 'Unión de Jóvenes Comunistas', 'UJC', 1),
(82, 503, 'Organización de Pioneros José Marti', 'OPJM', 1),
(83, 504, 'Central de Trabajadores de Cuba', 'CTC', 1),
(84, 505, 'Federación de Mujeres Cubanas', 'FMC', 1),
(85, 506, 'Comité de Defensa de la Revolución', 'CDR', 1),
(86, 507, 'Asociación Nacional de Agricultores Pequeños', 'ANAP', 1),
(87, 658, 'GRUPO AZUCARERO', 'AZCUBA', 1),
(88, 692, 'Grupo de las Industrias Biotecnológica y Farmacéutica', 'BIOCUBAFARMA', 1),
(89, 934, 'Sociedad de Educación Patriótico Militar', 'SEPMI', 1),
(90, 936, 'Plan de Desarrollo Turístico Norte Sur zona Oriental', 'PDTNSO', 1),
(91, 937, 'Metro de Ciudad de La Habana', 'MCH', 1),
(92, 998, 'No se subordina a un Organismo', 'NOSUBORDINAD', 1),
(93, 999, 'Organismo Desconocido', 'DESCONOCIDO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_anual_entidad`
--

CREATE TABLE IF NOT EXISTS `plan_anual_entidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_entidad` int(11) NOT NULL,
  `anno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plan_entidad_entidad1` (`id_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `plan_anual_entidad`
--

INSERT INTO `plan_anual_entidad` (`id`, `plan`, `id_entidad`, `anno`) VALUES
(1, '20', 2, 2014),
(4, '300', 1, 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_anual_servicio`
--

CREATE TABLE IF NOT EXISTS `plan_anual_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plan_mensual_general_servicio_servicio1` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `plan_anual_servicio`
--

INSERT INTO `plan_anual_servicio` (`id`, `plan`, `anno`, `id_servicio`) VALUES
(1, 300, 2015, 2),
(2, 400, 2015, 1),
(3, 1000, 2015, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_mensual_entidad`
--

CREATE TABLE IF NOT EXISTS `plan_mensual_entidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `id_entidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plan_mensual_entidad_entidad1` (`id_entidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_mensual_servicio`
--

CREATE TABLE IF NOT EXISTS `plan_mensual_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) DEFAULT NULL,
  `plan_horariopico` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plan_mensual_general_servicio_servicio1` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `plan_mensual_servicio`
--

INSERT INTO `plan_mensual_servicio` (`id`, `plan`, `plan_horariopico`, `mes`, `anno`, `id_servicio`) VALUES
(9, 100, 0, 1, 2015, 1),
(11, 152, 50, 1, 2015, 2),
(12, 124, 0, 1, 2015, 3),
(13, 785, 0, 1, 2015, 10),
(14, 741, 620, 1, 2015, 11),
(15, 456, 411, 1, 2015, 12),
(17, 1452, 0, 2, 2015, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `codigo`, `descripcion`) VALUES
(2, '21', 'PINAR DEL RIO'),
(3, '22', 'ARTEMISA'),
(4, '23', 'LA HABANA'),
(5, '24', 'MAYABEQUE'),
(6, '25', 'MATANZAS'),
(7, '26', 'VILLA CLARA'),
(8, '27', 'CIENFUEGOS'),
(9, '28', 'SANCTI SPIRITUS'),
(10, '29', 'CIEGO DE AVILA'),
(11, '30', 'CAMAGUEY'),
(12, '31', 'LAS TUNAS'),
(13, '32', 'HOLGUIN'),
(14, '33', 'GRANMA'),
(15, '34', 'SANTIAGO DE CUBA'),
(16, '35', 'GUANTANAMO'),
(17, '400', 'ISLA DE LA JUVENTUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`) VALUES
(1, 'administrador', 'ROLE_PLANIFICADOR_SUP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `id_entidad` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `codcliente_EE` varchar(10) DEFAULT NULL,
  `codRF` varchar(6) DEFAULT NULL,
  `horariopico` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `codcliente_EE_UNIQUE` (`codcliente_EE`),
  UNIQUE KEY `codRF_UNIQUE` (`codRF`),
  KEY `fk_servicio_tipo_servicio1` (`id_tipo_servicio`),
  KEY `fk_servicio_entidad1` (`id_entidad`),
  KEY `fk_servicio_municipio` (`id_municipio`),
  KEY `fk_servicio_provincia1` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `id_tipo_servicio`, `id_entidad`, `id_municipio`, `codcliente_EE`, `codRF`, `horariopico`, `activo`, `id_provincia`) VALUES
(1, 'Edificio central', 8, 2, 172, 'H124F', 'GGHH23', 0, 0, 4),
(2, 'Nodo casa 20', 3, 2, 179, 'wwwww', 'wwwwww', 1, 1, 4),
(3, 'servicio prueba xxx', 3, 1, 174, '123', '123', 0, 1, 5),
(10, 'servicio universidad', 8, 1, 174, '2w56', 'r5', 0, 1, 5),
(11, 'servicio cujae', 8, 5, 174, '5g5', '8f', 1, 1, 5),
(12, 'Serv camaguey', 3, 7, 174, 'd4', 'd5', 1, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id`, `descripcion`, `activo`) VALUES
(3, 'nuevawwww', 1),
(8, 'Dany', 1),
(9, 'ddddd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazas`
--

CREATE TABLE IF NOT EXISTS `trazas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tabla` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `registro` int(11) DEFAULT NULL,
  `datos` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha-hora` timestamp NULL DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trazas_usuario1` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `trazas`
--

INSERT INTO `trazas` (`id`, `operacion`, `tabla`, `registro`, `datos`, `fecha-hora`, `id_usuario`) VALUES
(8, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:65000 plan horario pico:10 consumo horario pico:10 id_servicio:2', '2015-01-21 16:04:17', 1),
(9, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:65000 plan horario pico:10 consumo horario pico:30 id_servicio:2', '2015-01-21 17:20:02', 1),
(10, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:65000 plan horario pico:10 consumo horario pico:46 id_servicio:2', '2015-01-21 21:26:46', 1),
(11, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:65000 plan horario pico:10 consumo horario pico:34 id_servicio:2', '2015-01-21 21:27:05', 1),
(12, 'actualizacion', 'lectura_diaria_servicio', 1, 'plan:500 consumo:20 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-16 19:48:10', 1),
(13, 'actualizacion', 'lectura_diaria_servicio', 2, 'plan:45 consumo:250 plan horario pico:10 consumo horario pico:8 id_servicio:2', '2015-02-16 19:48:48', 1),
(14, 'actualizacion', 'lectura_diaria_servicio', 3, 'plan:500 consumo:300 plan horario pico:0 consumo horario pico:0 id_servicio:3', '2015-02-16 19:49:52', 1),
(15, 'actualizacion', 'lectura_diaria_servicio', 4, 'plan:321 consumo:200 plan horario pico:0 consumo horario pico:0 id_servicio:10', '2015-02-16 19:50:37', 1),
(16, 'actualizacion', 'lectura_diaria_servicio', 5, 'plan:745 consumo:200 plan horario pico:250 consumo horario pico:100 id_servicio:11', '2015-02-16 19:51:20', 1),
(17, 'actualizacion', 'lectura_diaria_servicio', 6, 'plan:2000 consumo:23 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-16 19:52:09', 1),
(18, 'actualizacion', 'lectura_diaria_servicio', 7, 'plan:200 consumo:100 plan horario pico:100 consumo horario pico:50 id_servicio:2', '2015-02-16 19:52:46', 1),
(19, 'actualizacion', 'lectura_diaria_servicio', 8, 'plan:300 consumo:200 plan horario pico:0 consumo horario pico:0 id_servicio:3', '2015-02-16 19:53:24', 1),
(20, 'actualizacion', 'lectura_diaria_servicio', 9, 'plan:200 consumo:100 plan horario pico:0 consumo horario pico:0 id_servicio:10', '2015-02-16 19:54:24', 1),
(21, 'actualizacion', 'lectura_diaria_servicio', 10, 'plan:300 consumo:0 plan horario pico:100 consumo horario pico:0 id_servicio:11', '2015-02-16 19:55:07', 1),
(22, 'actualizacion', 'lectura_diaria_servicio', 11, 'plan:412 consumo:125 plan horario pico:100 consumo horario pico:50 id_servicio:1', '2015-02-16 19:56:07', 1),
(23, 'actualizacion', 'lectura_diaria_servicio', 12, 'plan:300 consumo:185 plan horario pico:100 consumo horario pico:23 id_servicio:2', '2015-02-16 19:57:11', 1),
(24, 'actualizacion', 'lectura_diaria_servicio', 13, 'plan:10 consumo:7 plan horario pico:0 consumo horario pico:0 id_servicio:3', '2015-02-16 19:58:15', 1),
(25, 'actualizacion', 'lectura_diaria_servicio', 14, 'plan:42 consumo:41 plan horario pico:20 consumo horario pico:18 id_servicio:10', '2015-02-16 19:59:17', 1),
(26, 'actualizacion', 'lectura_diaria_servicio', 15, 'plan:30 consumo:29 plan horario pico:4 consumo horario pico:2 id_servicio:11', '2015-02-16 20:00:51', 1),
(27, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:42 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-16 20:01:35', 1),
(28, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:42 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-20 19:57:20', 1),
(29, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:45 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-20 19:57:52', 1),
(30, 'actualizacion', 'lectura_diaria_servicio', 16, 'plan:78 consumo:45 plan horario pico:0 consumo horario pico:0 id_servicio:1', '2015-02-20 19:58:46', 1),
(31, 'actualizacion', 'lectura_diaria_servicio', 17, 'plan:345 consumo:341 plan horario pico:120 consumo horario pico:119 id_servicio:2', '2015-02-20 19:59:01', 1),
(32, 'actualizacion', 'lectura_diaria_servicio', 17, 'plan:345 consumo:341 plan horario pico:120 consumo horario pico:119 id_servicio:2', '2015-02-20 19:59:43', 1),
(33, 'actualizacion', 'lectura_diaria_servicio', 17, 'plan:345 consumo:341 plan horario pico:120 consumo horario pico:119 id_servicio:2', '2015-02-20 20:00:15', 1),
(34, 'actualizacion', 'lectura_diaria_servicio', 17, 'plan:345 consumo:341 plan horario pico:120 consumo horario pico:119 id_servicio:2', '2015-02-20 20:00:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_entidad` int(11) NOT NULL,
  `rol` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_usuario_entidad1` (`id_entidad`),
  KEY `fk_usuario_rol1` (`rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `nombre`, `password`, `id_entidad`, `rol`, `correo`, `activo`) VALUES
(1, 'superior', 'Carlos', '123', 1, 'ROLE_PLANIFICADOR_SUP', 'cmar@citmatel.inf.cu', 1),
(2, 'entidad', 'Entidad', '123', 5, 'ROLE_PLANIFICADOR_ENT', 'xxx@xxx.com', 1),
(3, 'servicio', 'Servicio', '123', 1, 'ROLE_PLANIFICADOR_SER', 'xxx@mmm.com', 1),
(4, 'registrador_servicio', 'ssssssss', '123', 1, 'ROLE_REGISTRADOR_SER', 'cmar@citmatel.inf.cu', 1),
(5, 'supervisor_superior', 'Jefe', '123', 1, 'ROLE_SUPERVISOR_SUP', 'cmar@citmatel.inf.cu', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD CONSTRAINT `fk_configuracion_organismo` FOREIGN KEY (`id_organismo`) REFERENCES `organismo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD CONSTRAINT `entidad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entidad_nae1` FOREIGN KEY (`id_nae`) REFERENCES `nae` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entidad_organismo1` FOREIGN KEY (`id_organismo`) REFERENCES `organismo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entidad_padre` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lectura_diaria_servicio`
--
ALTER TABLE `lectura_diaria_servicio`
  ADD CONSTRAINT `fk_lectura_diariagen_servicio_servicio1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_anual_entidad`
--
ALTER TABLE `plan_anual_entidad`
  ADD CONSTRAINT `fk_plan_entidad_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_anual_servicio`
--
ALTER TABLE `plan_anual_servicio`
  ADD CONSTRAINT `fk_plan_anual_servicio_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_mensual_entidad`
--
ALTER TABLE `plan_mensual_entidad`
  ADD CONSTRAINT `fk_plan_mensual_entidad_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_mensual_servicio`
--
ALTER TABLE `plan_mensual_servicio`
  ADD CONSTRAINT `fk_plan_mensual_general_servicio_servicio1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_tipo_servicio1` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trazas`
--
ALTER TABLE `trazas`
  ADD CONSTRAINT `fk_trazas_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
