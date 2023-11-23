-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 00:30:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kahwa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

CREATE TABLE `cultivo` (
  `Id` int(11) NOT NULL,
  `Cultivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cultivo`
--

INSERT INTO `cultivo` (`Id`, `Cultivo`, `Descripcion`, `Estado`) VALUES
(1, 'Sin Cultivo', 'No hay cultivo presente o se encuentra valdío', 1),
(2, 'Banano Criollo', 'Distancia de siembra 4 x1.5 m, densidad de siembra 1.666 plantas/Ha.', 1),
(3, 'Banano Variedad Cavendish', 'Distancia de siembra 4x1 m, densidad de siembra 2.500 plantas/Ha.', 1),
(4, 'Banano variedad Gross Mitchell', 'Distancia de siembra 4x1 m, densidad de siembra 2.500 plantas/Ha.', 1),
(5, 'Café Variedad Colombia (1x1)', 'Distancia de siembra 1x1 m, densidad 10.000 plantas/Ha.', 1),
(6, 'Café Variedad Colombia (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad 5.000 plantas/Ha.', 1),
(7, 'Café Variedad Caturra (1.1)', 'Distancias de siembra, 1x1 m densidad de siembra 10.000 plantas/Ha.', 1),
(8, 'Café Variedad Caturra (1x1.2)', 'Distancias de siembra, 1x1.2 m densidad de siembra 5.000 plantas/Ha.', 1),
(9, 'Café Variedad Borbón', 'Distancia de siembra 2x2 m, densidad de siembra 2.500 plantas/Ha.', 1),
(10, 'Café Variedad Tabí', 'Distancia de siembra 1.8x1.8 m, densidad de siembra 3.086 plantas por/Ha.', 1),
(11, 'Café Variedad Geisha', 'Distancia de siembra 2x2 m, densidad de siembra 2.500 plantas/Ha.', 1),
(12, 'Café Variedad Castillo (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(13, 'Café Variedad Castillo (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra, 5.000 plantas /Ha. ', 1),
(14, 'Café Variedad Castillo Naranjal (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(15, 'Café Variedad Castillo Naranjal (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(16, 'Café Variedad Castillo El Rosario (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(17, 'Café Variedad Castillo El Rosario (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(18, 'Café Variedad Castillo Paraguaicito (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(19, 'Café Variedad Castillo Paraguaicito (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(20, 'Café Variedad Castillo La Trinidad (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(21, 'Café Variedad Castillo La Trinidad (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(22, 'Café Variedad Castillo El Tambo (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(23, 'Café Variedad Castillo El Tambo (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(24, 'Café Variedad Castillo Santa Bárbara (1x1)', 'Distancia de siembra 1x1 m, densidad de siembra 10.000 plantas/Ha.', 1),
(25, 'Café Variedad Castillo Santa Bárbara (1x1.2)', 'Distancia de siembra 1x1.2 m, densidad de siembra 5.000 plantas/Ha.', 1),
(26, 'Plátano Variedad Dominico', 'Distancia de siembra 4x1.5 m, densidad de siembra 1.666 plantas/Ha.', 1),
(28, 'Plátano Variedad Dominico Hartón', 'Distancia de siembra 4x1,5 m densidad de siembra 1.666 plantas/Ha.', 1),
(29, 'Maíz', 'Distancia de siembra 0.50x0.46x0.46 m, densidad de siembra 94.517 plantas/Ha.', 1),
(30, 'Frijol', 'Distancia de siembra 0,5x0,46x0,46 m, densidad de siembra 94.517 plantas/Ha.\r\nAcciones  ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `Id` int(11) NOT NULL,
  `FechaInventario` date NOT NULL,
  `NombreEquipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaDeEntrega` date NOT NULL,
  `FechaDeRecibido` date NOT NULL,
  `Responsable` int(11) NOT NULL,
  `FechaDeMantenimiento` date NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Id`, `FechaInventario`, `NombreEquipo`, `Cantidad`, `FechaDeEntrega`, `FechaDeRecibido`, `Responsable`, `FechaDeMantenimiento`, `Estado`) VALUES
(1, '2023-04-15', 'Fumigadora de Espalda Control Arvenses', 2, '2023-04-03', '2023-04-05', 12, '2023-04-10', 1),
(2, '2023-04-15', 'Fumigadora de Espalda Aplicacion Foliares', 2, '0000-00-00', '0000-00-00', 33, '2023-05-17', 1),
(3, '2023-04-15', 'Fumigadora de Espalda MIPE', 2, '0000-00-00', '0000-00-00', 6, '2023-05-23', 1),
(4, '2023-04-15', 'Medidor de humedad', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(5, '2023-04-15', 'Termohigrómetro', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(6, '2023-04-15', 'Refractrómetro', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(7, '2023-04-15', 'Pluviómetro', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(8, '2023-04-15', 'Medidor de PH', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(9, '2023-04-15', 'Temómetro', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(10, '2023-04-15', 'Nivel tipo A', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(11, '2023-04-15', 'Máquina Despulpadora', 2, '2023-06-12', '2023-12-06', 23, '2023-12-06', 1),
(12, '2023-04-15', 'Beneficiadero', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(13, '2023-04-15', 'Tanque de Fermentación', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(14, '2023-04-15', 'Canales de Correteo', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(15, '2023-04-15', 'Tanque Tina', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(16, '2023-04-15', 'Tolva de Recibo', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(17, '2023-04-15', 'Desmucilaginador mecánico', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(18, '2023-04-15', 'Bandeja de Secado', 4, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(19, '2023-04-15', 'Carro Secador', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(20, '2023-04-15', 'Marquesina', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(21, '2023-04-15', 'Secador Parabólico', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(22, '2023-04-15', 'Fumigadora Estacionaria', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(23, '2023-04-15', 'Tolva Beneficiadero', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(24, '2023-04-15', 'Tanque Preclasificador', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(25, '2023-04-15', 'Bomba baja Presión', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(26, '2023-04-15', 'Tornillo sinfin', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(27, '2023-04-15', 'Descascarilladora', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(28, '2023-04-15', 'Guadaña', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(29, '2023-04-15', 'Motosierra', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(30, '2023-04-15', 'Belcosub', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(47, '2023-04-15', 'Báscula', 1, '0000-00-00', '0000-00-00', 37, '2023-06-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE `finca` (
  `id` int(11) NOT NULL,
  `Nombredelpredio` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Vereda` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tamano` int(11) NOT NULL,
  `Temperatura` int(11) NOT NULL,
  `Lluvia` int(11) NOT NULL,
  `BrilloSolar` int(11) NOT NULL,
  `HumedadRelativa` int(11) NOT NULL,
  `Relieve` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Altura` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`id`, `Nombredelpredio`, `Vereda`, `Municipio`, `Departamento`, `Tamano`, `Temperatura`, `Lluvia`, `BrilloSolar`, `HumedadRelativa`, `Relieve`, `Altura`, `Estado`) VALUES
(1, 'Villalba', 'Buena Vista', 'Chinchiná', 'Caldas', 50, 23, 2200, 2398, 75, 'Ondulado', 1800, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `Id` int(11) NOT NULL,
  `FechaInventario` date NOT NULL,
  `NombreHerramienta` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaDeEntrega` date NOT NULL,
  `FechaDeRecibido` date NOT NULL,
  `Responsable` int(11) NOT NULL,
  `FechaDeReemplazo` date NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`Id`, `FechaInventario`, `NombreHerramienta`, `Cantidad`, `FechaDeEntrega`, `FechaDeRecibido`, `Responsable`, `FechaDeReemplazo`, `Estado`) VALUES
(1, '2019-08-04', 'Palin', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(2, '2023-04-15', 'Germinador', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(3, '2023-04-15', 'Valde plástico', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(4, '2023-04-15', 'Balde recolector', 20, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(5, '2023-02-15', 'Carretilla Trasporte', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(7, '2023-04-15', 'Zaranda Plana', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(8, '2023-04-15', 'Recipiente Plástico de Recolección', 20, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(9, '2023-04-15', 'Zaranda Redonda', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(10, '2023-04-15', 'Rastrillo de Secado PVC', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(11, '2023-04-15', 'Secador Mecánico', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(12, '2023-04-15', 'Rastrillo Secador Madera', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(13, '2023-04-15', 'Paleta para beneficio', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(14, '2023-04-15', 'Pala', 15, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(15, '2023-04-15', 'Machete', 10, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(16, '2023-04-15', 'Sierra Manual para Zoca 14', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(17, '2023-04-15', 'Colador Plástico Beneficio', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(18, '2023-04-15', 'Azadón ', 15, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(19, '2023-04-15', 'Pica', 10, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(20, '2023-04-15', 'Recatón', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 0),
(21, '2023-04-15', 'Equipo Protección Personal Aplicaciones', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(22, '2023-04-15', 'Estibas plásticas', 7, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(23, '2023-04-15', 'Caneca plástica 20 Litros', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(24, '0000-00-00', 'Caneca plástica 50 Litros', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(25, '0000-00-00', 'Caneca plástica 100 Litros', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(26, '2023-04-15', 'Estopas Plástcas', 200, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(27, '0000-00-00', 'Canastillas Plásticas', 0, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(28, '2023-04-15', 'Boquillas Bomba de Espalda', 30, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(29, '2023-04-15', 'Boquillas Bomba Estacionaria', 15, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(30, '2023-04-15', 'Pala manual Germiinador', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(31, '2023-04-15', 'Tijeras podadoras', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(32, '2023-04-15', 'Caja de llaves de copa', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(33, '2023-04-15', 'Estuche Destornilladores Diferentes tamaños', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(34, '2023-04-15', 'Martillo', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(35, '2023-04-15', 'Juego de Alicates', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(36, '2023-04-15', 'Colador plástico para beneficio', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(37, '2023-04-15', 'Podadora para plátano', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(38, '2023-04-15', 'Lima triangular', 5, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(39, '2023-04-15', 'Serrucho', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(40, '2023-04-15', 'Arco de poda 21', 4, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(41, '2023-04-15', 'Cavadora manual', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(42, '2023-04-15', 'Selector de arvenses', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(43, '2023-04-15', 'Matraca sembradora', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(45, '2023-04-15', 'Lanza para drench', 1, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1),
(46, '2023-04-15', 'Embolsadora manual', 2, '0000-00-00', '0000-00-00', 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id` int(11) NOT NULL,
  `FechaInventario` date NOT NULL,
  `NombreInsumo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IngredienteActivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Unidad` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CantidadEnBodega` int(11) NOT NULL,
  `FechaDeCompra` date NOT NULL,
  `FechaDeVencimiento` date NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id`, `FechaInventario`, `NombreInsumo`, `IngredienteActivo`, `Unidad`, `CantidadEnBodega`, `FechaDeCompra`, `FechaDeVencimiento`, `Estado`) VALUES
(5, '2023-03-16', 'Acaricida Borneo 11 SC', 'Etoxazole 110 g/l', 'Centímetros Cúbicos', 480, '2023-01-12', '2023-01-03', 1),
(6, '2023-03-16', 'Acaricida Candonga 18 EC', 'Abamectina (g/L) ', 'Centímetros Cúbicos', 0, '0001-01-01', '0001-01-01', 1),
(7, '2023-03-16', 'Acaricida EcoA-Z', 'Extracto de ajo', 'Centímetros Cúbicos', 0, '0001-01-01', '0001-01-01', 1),
(8, '2023-03-16', 'Acaricida Efiaguas', 'Alquilpoliglicoléterde 8 moles de etoxilación', 'Litro', 0, '0001-01-01', '0001-01-01', 1),
(9, '2023-03-16', 'Acaricida Magister 200 SC', 'Fenazaquin ', 'gr/Lt', 0, '0001-01-01', '0001-01-01', 1),
(10, '2023-02-16', 'Acaricida Milbeknock 1 EC', 'Milbemectin10 gr/l ', 'Centímetros Cúbicos', 0, '0001-01-01', '0001-01-01', 1),
(11, '2023-03-16', 'Acaricida QL AGRI', 'Extracto de quillay (Quillaja saponaria Mol.)', 'Litro', 0, '0001-01-01', '0001-01-01', 1),
(12, '2023-03-16', 'Acaricida Smart calcio', 'Calcio total', 'Litro', 0, '0001-01-01', '0001-01-01', 1),
(13, '2023-03-16', 'Acaricida Sumatra EC', 'Etozaxole', 'Centímetros Cúbicos', 0, '0001-01-01', '0001-01-01', 1),
(14, '2023-03-16', 'Acaricida Supressor 500 SC', '', 'Centímetros Cúbicos', 0, '0001-01-01', '0001-01-01', 1),
(15, '2023-03-16', 'Acaricida Vasto 10 WG', 'Abamectina', 'Granulos dispersables Kilo', 0, '0001-01-01', '0001-01-01', 1),
(16, '2023-03-16', 'Bioestimulante Actiplant', 'N, K, CO', 'Litro', 0, '0001-01-01', '0001-01-01', 1),
(17, '2023-03-16', 'Bioestimulante Bassar WP', 'Conidias del hongo Beauveria bassiana', 'Polvo mojable Kilo', 0, '0001-01-01', '0001-01-01', 1),
(18, '2023-03-16', 'Bioestimulante Efisoil Superbia', 'N', 'Kilo', 0, '0001-01-01', '0001-01-01', 1),
(19, '2023-03-16', 'Bioestimulante Molib-K', 'KO, BO, MbO', 'gr', 0, '0001-01-01', '0001-01-01', 1),
(20, '2023-03-16', 'Bioestimulante Safer Micorriza M.A', 'Micorrizas', 'Bolsa de 1 Kilo', 0, '0001-01-01', '0001-01-01', 1),
(21, '2023-03-16', 'Bioestimulante Safer Terra Life GR', 'Esporas de los hongos antagonicos', 'Bolsa de 1 Kilo', 0, '0001-01-01', '0001-01-01', 1),
(22, '2023-03-16', 'Coadyuvante Agrobuffer SL', 'Coabyubante regulador de Ph', 'Litro', 0, '0001-01-01', '0001-01-01', 1),
(23, '2023-03-16', 'Coadyuvante Agrotin SL 79,5', 'Reguladoras del pH', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(24, '2023-03-16', 'Coadyuvante Campo Oil', 'Aceite de origen vegetal', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(25, '2023-03-16', 'Coadyuvante Carrier', 'Aceite de soya', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(26, '2023-03-16', 'Coadyuvante Dash HC', 'Mezcla surfactante', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(27, '2023-03-16', 'Coadyubante Efiaguas', 'Alquil poliglicol éter de 8 moles e etoxilación', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(28, '2023-03-16', 'Coadyubante Fluyex', 'Alcohol etoxilado modificado', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(30, '2023-03-16', 'Coadyubante Inex-A', 'Emulsificante concentrado', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(31, '2023-03-16', 'coadyubante Kinetic', 'Polimetilsiloxano y surfactante no iónico', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(32, '2023-03-16', 'Coadyubante Mixel Top SL', 'Alkil Aril Polieter Alcohol', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(33, '2023-03-16', 'Coadyubante Nu Film P', 'Pinolene 96%', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(34, '2023-03-16', 'Coabyubante Pegal pH', 'alcohol graso etoxilado', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(35, '2023-03-16', 'Coabyubante Pegal Protec WP', 'Silicatos de aluminio', 'Bolsa de 1 Kilo', 0, '0000-00-00', '0000-00-00', 1),
(36, '2023-03-16', 'Coabyubante Portador SYS', 'Polyoxyethylene (6) lineal alcohol (9-11)', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(37, '2023-03-16', 'Coabyubante Potenzol 3000 SL', 'Coabyubante agrícola', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(38, '2023-03-16', 'Coabyubante Potenzol PH-D', 'Regulador de pH (buffer citrato).', 'Bolsa de 1 Kilo', 0, '0000-00-00', '0000-00-00', 1),
(39, '2023-03-16', 'Coadyubante Siliconado SYS', 'Coadyuvante siliconado no iónico', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(40, '2023-03-16', 'Coadyubante Silwet L77', 'Coadyuvante siliconado no iónico', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(41, '2023-03-16', 'Coadyubante Surfatron 350', 'Alkil aril polieter', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(42, '2023-03-16', 'Coadyubante SYS Comet', 'Polyoxyethylene (6) Lineal alcohol (9-11) ', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(43, '2023-03-16', 'Coadyubante Trionex', 'Alcohol etoxilado modificado', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(44, '2023-03-16', 'Enmienda Cal Magnesiana 57-33 Rio Claro', 'Cal de Magnesio', 'Bulto 25 Kilos', 0, '0000-00-00', '0000-00-00', 1),
(45, '2023-03-16', 'Enmienda Dolomita', 'Calcio Total, Magnesio Total', 'Bulto de 25 ', 0, '0000-00-00', '0000-00-00', 1),
(46, '2023-03-16', 'Enmienda Hydra Hume', 'Carbono total, Sodio soluble', 'Bulto 25 kilos', 0, '0000-00-00', '0000-00-00', 1),
(47, '2023-03-16', 'Enmienda K-tionic', 'Ácido fúlvico', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(48, '2023-03-16', 'Enmienda Llanero-P', 'Feldespato de potasio y zeolita', 'Bulto 25 Kilos', 0, '0000-00-00', '0000-00-00', 1),
(49, '2023-03-16', 'Enmienda Oxical Mg', 'CaO, MgO, KCl', 'Kilo', 0, '0000-00-00', '0000-00-00', 1),
(50, '2023-03-16', 'Enmienda Pentax', 'CaO, MgO, PO, SiO', 'Bulto 25 Kilos', 0, '0000-00-00', '0000-00-00', 1),
(51, '2023-03-16', 'Enmienda Sili-cal-mag Rio Claro', 'P, Ca, Mg, S', 'Bulto 25 Kilos', 0, '0000-00-00', '0000-00-00', 1),
(52, '2023-03-16', 'Enmienda Yeso Agricola Monomeros', 'N, P, Ca, S', 'Bulto 25 kilos', 0, '0000-00-00', '0000-00-00', 1),
(53, '2023-03-16', 'Misilk-360', 'P, S, SiO', 'Litro', 0, '0000-00-00', '0000-00-00', 1),
(55, '2023-03-18', 'Fertilizante 10-20-20 Ciamsa', 'N, P, K, Mg, CaO, SiO, S', 'Bulto de 50 Kilogramos', 0, '0000-00-00', '0000-00-00', 1),
(56, '2023-03-16', 'Fertilizante 10-30-10 Ciamsa', 'N, P, K, Mg, CaO, SiO, S', 'Bulto de 50 Kilogramos', 0, '0000-00-00', '0000-00-00', 1),
(57, '2023-05-26', 'Glifosol', 'Glifosato', 'Litro', 5, '2023-05-25', '2024-05-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

CREATE TABLE `labores` (
  `Id` int(11) NOT NULL,
  `labor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`Id`, `labor`, `Descripcion`, `Estado`) VALUES
(1, 'Construcción del Germinador.', 'Construcción o adecuación del germinador para que las semillas de café germinen y donde se mantienen hasta que aparezca el primer par de hojas.', 1),
(2, 'Llenado de Bolsas.', 'Actividad de llenado de las bolsas, con suelo cernido y pulpa de café descompuesta en relación 2 a 1.', 1),
(3, 'Siembra de Chapolas.', 'Proceso de traslado de las plántulas del germinador a las bolsas plásticas sembrando dos chapolas.', 1),
(4, 'Resiembra Almacigo.', 'Actividad de remplazo de las chapolas en el almacigo.', 1),
(5, 'Control Fitosanitario Almacigo.', 'Aplicación de fungicidas, insecticidas, nematicidas y herbicidas durante el almacigo.', 1),
(6, 'Preparación del Terreno.', 'Preparar el suelo para la siembra de la planta.', 1),
(7, 'Trazo.', 'Distribución, siguiendo la forma de figura geométrica en el terreno.', 1),
(8, 'Ahoyado.', 'Elaboración del hoyo para la siembra de 30 x 30 x 30 cm.', 1),
(9, 'Distribuir Colinos en el Lote.', 'Colocar las plántulas en cada sitio para la siembra.', 1),
(10, 'Aplicar Materia Orgánica.', 'Aplicacion de materia orgánica al plato de la planta.', 1),
(11, 'Siembra y Resiembra.', 'Siembra de colinos durante la siembra de un lote o el reemplazo de las plantas muertas.', 1),
(12, 'Fertilización (levante).', 'Aplicación de fertilizante a las plantas en proceso de levante.', 1),
(13, 'Control Arvenses Calles (levante).', 'Control químico con selector de arvenses, bomba de espalda o mecánico con guadaña.', 1),
(14, 'Control Arvenses Platos (levante).', 'Plateo manual con machete en el plato del árbol.', 1),
(15, 'Control Mecánico Machete.', 'Conttol con machete en los platos.', 1),
(16, 'Control Manual de Arvenses.', 'Control manual de arvenses con las manos en el plato.', 1),
(17, 'Control Arvenses Herbicida.', 'Aplicación de herbicida químico con bomba de espalda para el control de arvenses.', 1),
(18, 'Control Mecánico Arvenses Guadaña.', 'Control mecánico de arvenses con la guadaña.', 1),
(19, 'Aplicación de Fertilizante al Suelo.', 'Aplicación manual de fertilizante químico en el plato de la planta.', 1),
(20, 'Aplicación de Fertilizantes Foliares.', 'Aplicación de fertilizante foliar.', 1),
(21, 'Control de Broca.', 'Aplicación de insecticidas para el control de la broca Hypothenemus hampei.', 1),
(22, 'Control de Roya.', 'Aplicación de fungicidas para el control de la roya Hemileia vastatrix', 1),
(23, 'Control de Mancha de Hierro.', 'Aplicación de fungicidas para el control de la mancha de hierro Cercospora coffeicola.', 1),
(24, 'Control Otros Insectos.', 'Aplicación de insecticidas para el control de insectos.', 1),
(25, 'Control Otras Enfermedades.', 'Aplicación de fungicidas, nematicidas, acaricidas o bactericidas para el control de diferentes enfermedades.', 1),
(26, 'Deschuponados Cultivos en Producción.', 'Eliminación de ramas de la zona baja de las plantas.', 1),
(27, 'Descumbrar, Desrames de Sombrío del Cafetal.', 'Eliminar las ramas superiores de la planta, podas de formación y sanitarias.', 1),
(28, 'Desorillar, Controlar Arvenses', 'Quitar las ramas que se superponen dentro del cultivo y las especies que invaden el cultivo.', 1),
(29, 'Recolección al Día (Kg.).', 'Pago de producción por kilo de café pergamino recolectado en un día.', 1),
(30, 'Recolección Kilo (Kg.).', 'Pago de producción por kilo de café pergamino recolectado.', 1),
(31, 'Evaluación de la Recolección.', 'Actividad para la recolección de café no recogido en la planta y en el suelo o comúnmente llamado RERE (Proceso de repase y repele).', 1),
(32, 'Evaluación de la Calidad de la Cosecha.', 'Proceso de la evaluación de la calidad de la recolección del café por lotes.', 1),
(33, 'Patrón de Corte.', 'Persona encargada del peso final de cada recolección diaria por lote.', 1),
(34, 'Despulpar, Fermentar y Lavar.', 'Proceso de despulpado, fermentación del café y lavado del mucilago.', 1),
(35, 'Patiería', 'Persona encargada del proceso final de beneficio del café.', 1),
(36, 'Trasporte de Café Mojado.', 'Actividad de transporte de café despulpado para la zona de secado.', 1),
(37, 'Secado Mecánico o al Sol.', 'Secado de los frutos de café en secador mecánico o en helda.', 1),
(38, 'Empaque y Transporte.', 'Proceso de empaque y transporte del café, ya sea en el lote al momento del pesaje o para el envío hacia el centro de acopio.', 1),
(39, 'Evaluación del Nivel de Infestación.', 'Proceso de evaluación del nivel de infestación de plagas y enfermedades en especial broca y roya en los lotes.', 1),
(40, 'Zoca.', 'Proceso de renovación del cafetal realizado cada cuatro o cinco años.', 1),
(41, 'Eliminación de Arboles con Sierra Manual.', 'Proceso de eliminación de los arboles con sierra manual, para el proceso de zoca.', 1),
(42, 'Eliminación de Arboles con Motosierra.', 'Proceso de eliminación de los arboles con motosierra, para el proceso de zoca.', 1),
(43, 'Retirada de Material Grueso.', 'Proceso de retirada de las ramas y troncos de árboles zoqueados.', 1),
(44, 'Mantenimiento Beneficiadero.', 'Proceso de mantenimiento y limpieza del beneficiadero.', 1),
(45, 'Reparación Maquinaria ', 'Reparación de la maquinaria o mantenimiento preventivo.', 1),
(46, 'Aplicación de Correctivos.', 'Proceso de aplicación de correctivos para mejoramiento de las condiciones del suelo.', 1),
(47, 'Limpia Antes del Desrame.', 'Proceso de eliminacion de hojas y frutos no recolectados.', 1),
(48, 'Protección de Cortes. ', 'Aplicacion de fitosanitarios para evitar pudriciones y enfermedades despues de la zoca.', 1),
(49, 'Control Arvenses de Lotes en Renovación.', 'Control químico con selector, bomba de espalda o mecánico con guadaña.', 1),
(50, 'Selección de Chupones.', 'Selección de las ramas productivas.', 1),
(51, 'Fertilización para Lotes en Renovación', 'Aplicación de fertilizante a las plantas despues de la zoca.', 1),
(52, 'Transporte de Fertilizante al Cultivo.', 'Transportar los bultos de fertilizante al lote.', 1),
(53, 'Deschuponada lotes en Producción.', 'Eliminación de ramas de la zona baja de las plantas.', 1),
(54, 'Desbejucada Lotes en Producción.', 'Proceso de quitar los bejucos de arvenses rastreras en el cultivo durante la producción.', 1),
(55, 'Otras Labores en Producción.', 'Proceso de realizar otras labores durante el cuclo productivo del cultivo.', 1),
(56, 'Otras Labores en Levante.', 'Proceso de realizar otras labores durante el levante del cultivo.', 1),
(57, 'Plateo Arvenses, Manual.', 'Control manual de arvenses en los platos del cultivo.', 1),
(58, 'Manipulación de Pulpa en Fosa.', 'Volteo de la pulpa en descompocisión para evitar contaminación y proliferación de microorganismos.', 1),
(59, 'Plateo Lotes en Producción', 'Proceso de control de arvenses en los platos durante el ciclo productivo.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `Id` int(11) NOT NULL,
  `NombreLote` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FincaAsociada` int(11) NOT NULL,
  `Cultivo` int(11) NOT NULL,
  `Tamano` int(11) NOT NULL,
  `FechaDeSiembra` date NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`Id`, `NombreLote`, `FincaAsociada`, `Cultivo`, `Tamano`, `FechaDeSiembra`, `Estado`) VALUES
(1, 'NINGUNO', 1, 1, 0, '0000-00-00', 1),
(5, 'El Nogal', 1, 5, 7, '2019-04-23', 1),
(6, 'El Yarumo', 1, 5, 5, '2020-03-12', 1),
(7, 'La Tranquera', 1, 5, 10, '2020-08-21', 1),
(8, 'La Platanera', 1, 28, 6, '2020-02-15', 1),
(9, 'El Guayabo', 1, 5, 2, '2020-12-06', 1),
(10, 'La Ye', 1, 8, 7, '2020-07-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilladepago`
--

CREATE TABLE `planilladepago` (
  `Id` int(11) NOT NULL,
  `FechaDePago` date NOT NULL,
  `Trabajador` int(11) NOT NULL,
  `Sueldo` int(11) NOT NULL,
  `Descuento` int(11) NOT NULL,
  `ValorTotal` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planilladepago`
--

INSERT INTO `planilladepago` (`Id`, `FechaDePago`, `Trabajador`, `Sueldo`, `Descuento`, `ValorTotal`, `Estado`) VALUES
(15, '2023-04-13', 8, 425000, 225000, 200000, 1),
(20, '2023-04-20', 8, 425000, 225000, 200000, 1),
(21, '2023-03-16', 20, 525000, 200000, 325000, 1),
(22, '2023-04-05', 13, 550000, 200000, 349998, 1),
(23, '2023-04-12', 12, 525000, 225000, 300000, 1),
(24, '2023-03-22', 29, 325000, 125000, 200000, 1),
(25, '2023-04-04', 22, 65000, 12000, 43000, 1),
(26, '2023-03-23', 31, 550000, 225000, 300000, 1),
(27, '2023-04-28', 8, 45000, 6000, 39000, 1),
(28, '2023-05-15', 4, 35000, 6000, 29000, 1),
(29, '2023-05-14', 20, 250000, 25000, 225000, 1),
(30, '2023-05-30', 11, 50000, 12000, 38000, 1),
(31, '2023-05-26', 12, 225000, 25000, 200000, 1),
(33, '2023-06-09', 13, 250000, 50000, 200000, 1),
(34, '2023-06-28', 9, 250000, 25000, 225000, 1),
(35, '0000-00-00', 1, 0, 0, 0, 1),
(36, '2023-06-21', 13, 350000, 80000, 270000, 1),
(37, '2023-06-28', 7, 280000, 6000, 274000, 1),
(38, '2023-07-27', 21, 250000, 50000, 200000, 1),
(39, '2023-07-31', 38, 280000, 60000, 220000, 1),
(40, '2023-05-04', 31, 250000, 25000, 225000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilladerecoleccion`
--

CREATE TABLE `planilladerecoleccion` (
  `Id` int(11) NOT NULL,
  `FechaDeRecoleccion` date NOT NULL,
  `Responsable` int(11) NOT NULL,
  `KilosRecolectados` int(11) NOT NULL,
  `JornalesRecoleccion` int(11) NOT NULL,
  `ValorNeto` int(11) NOT NULL,
  `Descuentos` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planilladerecoleccion`
--

INSERT INTO `planilladerecoleccion` (`Id`, `FechaDeRecoleccion`, `Responsable`, `KilosRecolectados`, `JornalesRecoleccion`, `ValorNeto`, `Descuentos`, `Total`, `Estado`) VALUES
(3, '2004-10-05', 4, 0, 3, 180000, 45000, 135000, 1),
(4, '2023-03-18', 21, 120, 0, 480000, 120000, 360000, 1),
(5, '2023-06-13', 11, 170, 0, 250000, 60000, 190000, 1),
(6, '2023-06-13', 10, 125, 0, 68750, 60000, 8750, 1),
(7, '2023-05-03', 4, 0, 1, 150000, 40000, 110000, 1),
(8, '2023-05-26', 13, 150, 0, 225000, 25000, 200000, 1),
(9, '2023-12-06', 34, 150, 0, 82500, 0, 82500, 1),
(10, '0000-00-00', 1, 0, 0, 150000, 25000, 0, 1),
(11, '2023-06-09', 11, 0, 0, 225000, 25000, 20000, 1),
(12, '2023-06-27', 4, 120, 0, 250000, 25000, 225000, 1),
(13, '2023-06-27', 4, 150, 0, 75000, 6000, 69000, 1),
(14, '2023-06-28', 4, 120, 0, 80000, 12000, 68000, 1),
(15, '2023-06-28', 17, 0, 7, 28000, 60000, -32000, 1),
(16, '2022-12-02', 31, 0, 3, 275000, 50000, 225000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillalabores`
--

CREATE TABLE `plantillalabores` (
  `Id` int(11) NOT NULL,
  `FechaDeAsignacion` date NOT NULL,
  `Encargado` int(11) NOT NULL,
  `Finca` int(11) NOT NULL,
  `Lote` int(11) NOT NULL,
  `Labor` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantillalabores`
--

INSERT INTO `plantillalabores` (`Id`, `FechaDeAsignacion`, `Encargado`, `Finca`, `Lote`, `Labor`, `Estado`) VALUES
(4, '2023-05-05', 5, 1, 5, 8, 1),
(5, '2023-04-05', 21, 1, 5, 16, 1),
(6, '2023-04-08', 13, 1, 6, 17, 1),
(7, '2023-05-12', 11, 1, 9, 15, 1),
(8, '2023-05-15', 15, 1, 7, 17, 1),
(10, '2023-05-26', 4, 1, 10, 24, 1),
(11, '2023-07-05', 17, 1, 9, 19, 1),
(15, '2021-03-08', 10, 1, 1, 1, 1),
(16, '2023-10-05', 20, 1, 1, 34, 1),
(17, '2023-11-10', 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `Id` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FechaDeNacimiento` date NOT NULL,
  `Eps` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Arl` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`Id`, `Documento`, `Nombre`, `Telefono`, `FechaDeNacimiento`, `Eps`, `Arl`, `Estado`) VALUES
(1, 0, 'NINGUNO', '0', '0000-00-00', 'NA', '', 1),
(4, 1689256, 'Andrés Arango Arango 	', '3102697896', '1972-05-06', 'Medimas EPS', '', 1),
(5, 4325698, 'Aquilino	Villegas Sanchez 	', '3113886933', '1945-08-09', 'Nueva EPS', '', 1),
(6, 4365896, 'Rodolfo Blandon Ramirez', '3135863688', '1965-06-23', 'Nueva EPS', '', 1),
(7, 10365789, 'Mariano Arango López', '3142365886', '1975-10-21', 'Nueva EPS', '', 1),
(8, 15789365, 'Andrés Pereira Ramirez', '3207290048', '1977-02-28', 'Nueva EPS', '', 1),
(9, 25698741, 'María Angel Angel', '3126547893', '1980-04-16', 'Salud Vida', '', 1),
(10, 30256987, 'Esperanza Aranzazú Flórez', '3154896525', '1985-12-26', 'Salud Vida', '', 1),
(11, 30563987, 'Angela Ramirez', '3154863368', '1986-01-19', 'Nueva EPS', '', 1),
(12, 75041236, 'Fernando Alvarez Vélez', '3132689743', '1977-03-25', 'Cafesalud EPS', '', 1),
(13, 75068082, 'Rafael Espitia', '3012689526', '1979-07-27', 'No posee', '', 1),
(14, 75068962, 'Fernando Rodriguez Alzate', '3146589633', '1983-01-30', 'Nueva EPS', '', 1),
(15, 75069958, 'Rodolfo Perez Blandon', '3025639845', '1987-10-08', 'Cafesalud', '', 1),
(16, 75081630, 'Ernesto Arango Villa', '3126688836', '1978-10-16', 'Nueva EPS', '', 1),
(17, 75089366, 'Alexander Perez Ángel', '3014569856', '1975-10-06', 'Cafesalud EPS', '', 1),
(18, 1053569263, 'Gonzalo Correa Cano', '3154632256', '1990-02-20', 'Nueva EPS', '', 1),
(20, 1053658321, 'Lucia Amparo Montes Orozco', '3143256699', '1989-12-14', 'CafeSalud EPS', '', 1),
(21, 1053658892, 'Arnulfo Ocaña', '3023658896', '1992-01-19', 'Nueva EPS', '', 1),
(22, 1053698471, 'Javier Garcia Peña', '3026589632', '1990-03-29', 'Nueva EPS', '', 1),
(23, 1054365896, 'Ismael Hernando Cano Garcia', '3158963255', '1982-08-06', 'Nueva EPS', '', 1),
(24, 1054637892, 'Ernesto Ramirez Garcia', '3125869855', '1997-04-25', 'SaludVida EPS', '', 1),
(25, 30254698, 'Angela Castaño Perez', '3125697894', '1976-05-12', 'SolSalud EPS', '', 1),
(26, 75050956, 'Algemiro Arango Rincón', '3146589966', '1973-12-01', 'Nueva EPS', '', 1),
(27, 4658974, 'Alberto Hoyos Quintero', '3154789633', '1948-05-12', 'Cafesalud EPS', '', 1),
(28, 30896541, 'Maria Esneida López López 	', '3113589632', '1978-08-15', 'SolSalud EPS', '', 1),
(29, 1053456987, 'Esperanza Martinez Suaréz', '3154789654', '1990-08-12', 'Nueva EPS', '', 1),
(30, 10236547, 'Marino Delgado', '3165874596', '1985-10-20', 'No posee', '', 1),
(31, 30458963, 'Andrea Cardona López 	', '3125896347', '1978-10-08', 'Sol Salud EPS', '', 1),
(32, 75081069, 'Alberto Castaño Montoya', '3158631479', '1971-05-03', 'Nueva EPS', '', 1),
(33, 100256897, 'Armando Casas Restrepo', '3123654789', '1980-02-18', 'Nueva EPS', '', 1),
(34, 24589365, 'Angela Restrepo Maya', '3150007894', '1983-12-22', 'Sanitas EPS', '', 1),
(35, 24269874, 'Mariela Arango ', '315897632', '1984-12-23', 'Nueva Eps', '', 1),
(36, 750486321, 'Alexander Montoya', '3281368965', '1978-02-12', 'CaféSalud', '', 1),
(37, 75069321, 'Fernando Espitia Romero', '3104568963', '1981-05-25', 'Nueva EPS', '', 1),
(38, 1000364789, 'Raul Salazar Pérez', '3214569874', '1979-12-18', 'Cafesalud', '', 1),
(39, 75081064, 'Gustavo Ramirez Restrepo', '3214569874', '1977-06-25', 'Nueva EPS', '', 1),
(41, 24369789, 'Angela Rodríguez Mota ', '3125698743', '1980-03-24', 'Cafesalud EPS', '', 1),
(42, 4325697, 'Roberto López Gutiérrez ', '315698741', '1980-03-23', 'Café Salud EPS', '', 1),
(43, 43215789, 'Rodrigo Espitia Pérez', '3182365479', '1980-05-12', 'Nueva EPS', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` longblob NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Codigo` varchar(10) NOT NULL,
  `Fecha_Codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Correo`, `Usuario`, `Password`, `Estado`, `Codigo`, `Fecha_Codigo`) VALUES
(1, 'Usuario', 'usuario@mail.com', 'Usuario', 0x313233343536, 1, '245818', '2023-11-03 23:44:31'),
(2, 'Alexander Amaya Arango', 'amaya.agro@gmail.com', 'Kahwasoft', 0x313233343536, 1, '080552', '2023-11-04 20:51:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cultivo`
--
ALTER TABLE `cultivo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NombreEquipo` (`NombreEquipo`),
  ADD KEY `Responsable` (`Responsable`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nombredelpredio` (`Nombredelpredio`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NombreHerramienta` (`NombreHerramienta`),
  ADD KEY `Responsable` (`Responsable`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NombreInsumo` (`NombreInsumo`);

--
-- Indices de la tabla `labores`
--
ALTER TABLE `labores`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `labor` (`labor`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NombreLote` (`NombreLote`),
  ADD KEY `FincaAsociada` (`FincaAsociada`),
  ADD KEY `Cultivo` (`Cultivo`);

--
-- Indices de la tabla `planilladepago`
--
ALTER TABLE `planilladepago`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Trabajador` (`Trabajador`) USING BTREE;

--
-- Indices de la tabla `planilladerecoleccion`
--
ALTER TABLE `planilladerecoleccion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Responsable` (`Responsable`);

--
-- Indices de la tabla `plantillalabores`
--
ALTER TABLE `plantillalabores`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Finca` (`Finca`),
  ADD KEY `Lote` (`Lote`),
  ADD KEY `Labor` (`Labor`),
  ADD KEY `Encargado` (`Encargado`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Nombre_2` (`Nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cultivo`
--
ALTER TABLE `cultivo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `labores`
--
ALTER TABLE `labores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `planilladepago`
--
ALTER TABLE `planilladepago`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `planilladerecoleccion`
--
ALTER TABLE `planilladerecoleccion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `plantillalabores`
--
ALTER TABLE `plantillalabores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`Responsable`) REFERENCES `trabajadores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`Responsable`) REFERENCES `trabajadores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`FincaAsociada`) REFERENCES `finca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`Cultivo`) REFERENCES `cultivo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planilladepago`
--
ALTER TABLE `planilladepago`
  ADD CONSTRAINT `planilladepago_ibfk_1` FOREIGN KEY (`Trabajador`) REFERENCES `trabajadores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planilladerecoleccion`
--
ALTER TABLE `planilladerecoleccion`
  ADD CONSTRAINT `planilladerecoleccion_ibfk_1` FOREIGN KEY (`Responsable`) REFERENCES `trabajadores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plantillalabores`
--
ALTER TABLE `plantillalabores`
  ADD CONSTRAINT `plantillalabores_ibfk_1` FOREIGN KEY (`Labor`) REFERENCES `labores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillalabores_ibfk_2` FOREIGN KEY (`Finca`) REFERENCES `finca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillalabores_ibfk_3` FOREIGN KEY (`Lote`) REFERENCES `lote` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillalabores_ibfk_4` FOREIGN KEY (`Encargado`) REFERENCES `trabajadores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
