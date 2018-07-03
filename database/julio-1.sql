-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2018 a las 01:21:36
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modifase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `nif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `cp`, `provincia`, `telefono`, `nif`, `created_at`, `updated_at`) VALUES
(25, 'LVMH IBERIA, S.L.', 'ISLA DE JAVA, 33', 28034, 'MADRID', 0, 'B81733503', NULL, NULL),
(26, 'SIGLA, S.A.', 'C/ PEDRO DE VALDIVIA, 21', 28006, '', 0, 'A28308484', NULL, NULL),
(27, 'VISION INTERIOR', 'AVD. DE LOS REYES S/N POL.IND.LA MINA', 28770, 'MADRID', 0, '', NULL, NULL),
(28, '5ASEC ESPA?A S.A.', 'C/ ALBASANZ, N? 14 BIS - 3? G', 28037, 'MADRID', 0, 'A79540787', NULL, NULL),
(29, 'SERVAC TURISMO Y GESTION', 'C/SANTA CRUZ DE MARCENADO,22 ESC.3.3-D.', 28015, 'MADRID', 0, '', NULL, NULL),
(30, 'OPTICA DE LAS HERAS', 'C/ FELIPE ESTEVEZ,10', 28901, 'MADRID', 0, '', NULL, NULL),
(31, 'INMADECO S.L.', 'C/ GABRIEL GARCIA MARQUEZ, 9 - ESC DCHA. 1? D', 28400, 'MADRID', 0, 'B84705359', NULL, NULL),
(32, 'CARREFOUR', 'CAMPEZO,16 - POL. INDUSTRIAL LAS MERCEDES', 28022, 'MADRID', 0, '', NULL, NULL),
(33, 'SIGLA IBERICA, S.A.', 'C/ PEDRO DE VALDIVIA, 21', 28006, '', 0, 'A79288148', NULL, NULL),
(34, 'TOPGLOBAL S.L.', 'C/ HERMANDAD SAN SEBASTIAN 3, BJ', 28670, 'MADRID', 0, 'B83072660', NULL, NULL),
(35, 'MEDIATEM CANALES TEMATICOS, SL', 'C/ VIRGILIO,N?2 CIUDAD DE LA IMAGEN', 28223, 'MADRID', 0, '', NULL, NULL),
(36, 'WEB Y MEDIA, S.L.', 'Avd. Cerro del Aguila, 2 - Portal 3 - 5? 11', 28703, 'MADRID', 0, 'B82658055', NULL, NULL),
(37, 'ANA MARTIN', '', 0, '', 0, '', NULL, NULL),
(38, 'MAR CUENCA', '', 0, '', 0, '', NULL, NULL),
(39, 'MOSTOLES INDUSTRIAL SA', 'C/ GRANADA, S/N', 28935, 'MADRID', 0, 'A28160711', NULL, NULL),
(40, 'EPKIDS', 'AV DE FONTANILLA, S/N', 28250, 'MADRID', 0, '', NULL, NULL),
(41, 'LVMH - PERFUMES & COSMETICOS, LDE', 'RUA CASTILLO, N? 5', 1250, 'LISBOA', 0, '501452184', NULL, NULL),
(42, 'TCSHYBO IN STORE', '', 0, '', 0, '', NULL, NULL),
(43, 'EN PIEZA ESTUDIO', 'C/ BELMONTE DE TAJO, 6', 28019, 'MADRID', 0, 'B85789725', NULL, NULL),
(44, 'ENCUENTRO MODA SLU', '', 0, '', 0, '', NULL, NULL),
(45, 'MAJOSAN S.A.', 'C/ SALAS DE BARBADILLO, 64', 28017, 'MADRID', 0, 'A79429189', NULL, NULL),
(46, 'CADOR ESPACIOS S.A.U', 'LUIS MITJANS,18', 28007, 'MADRID', 0, 'A83849331', NULL, NULL),
(47, 'CON3RAS', 'P.IND SAN MARCOS C/ FCO.GASCO SANTILLAN 12', 28906, 'MADRID', 0, 'B79815551', NULL, NULL),
(48, 'ENRIQUE GONZALEZ GONZALEZ', 'C/ HONDURAS, 32', 28980, 'MADRID', 0, '2849129G', NULL, NULL),
(49, 'PERFUMES LOEWE S.A', 'ISLA DE JAVA, 33', 28034, 'MADRID', 0, 'A79287124', NULL, NULL),
(50, 'WBX BUSINESS SUPPORT ESPA?A S.L.', 'PLAZA LETAMENDI  1-2 - ATICO ', 8007, 'BARCELONA', 0, '', NULL, NULL),
(51, 'LAYPE - BLANCO, S.L.', 'P.IND. LA FRONTERA - C/ 4 - NAVES 47 Y 48', 45217, 'TOLEDO', 0, 'B451295185', NULL, NULL),
(52, 'KILIKA, S.A.', 'C/ MOSCATELAR, 11', 28043, 'MADRID', 0, 'A78984291', NULL, NULL),
(53, 'CARLOS E CA?AVATE CENTELLAS', 'C7 LIMA N? 50 2? D', 28945, 'MADRID', 0, '52125641M', NULL, NULL),
(54, 'TJC DECORACION AMBIENTAL UNO, S.L.', 'SERRANO,6 - 3?,3', 28001, 'MADRID', 0, 'B84403500', NULL, NULL),
(55, 'CRISTIAN DIOR ESPA?OLA, S.L.', 'ISLA DE JAVA ,33', 28034, 'MADRID', 0, 'B08784076', NULL, NULL),
(56, 'TECNYDIS ', '', 0, '', 0, '', NULL, NULL),
(57, 'TUENTI TECHOLOGIES. SL', 'PLAZA DE LAS CORTES 2? 6? PLANTA', 28014, 'MADRID', 0, 'B84675529', NULL, NULL),
(58, 'PICARA SL', 'C/ BRUSELAS, N? 3 NAVE 12. POLIGONO INDUSTRIAL AVD CIUDAD DE PARLA', 0, 'MADRID', 0, '', NULL, NULL),
(59, 'LEADS 4 SALES SL', 'GUZMAN EL BUENO 133, 10 PLANTA', 28003, 'MADRID', 0, 'B85713261', NULL, NULL),
(60, 'STARBUCKS COFFEE ESPA?A, S.L.', 'PEDRO DE VALDIVIA N? 21', 28006, 'MADRID', 0, 'B83115907', NULL, NULL),
(61, 'COMERCIAL FARLABO ESPA?A, S.L.', 'C/ ISLA DE JAVA, 33', 28034, 'MADRID', 0, 'B82425521', NULL, NULL),
(62, 'GLOCAR SA', 'C/ CAMINO DE HORMIGUERAS, 122', 0, 'MADRID', 0, 'A78573375', NULL, NULL),
(63, 'BAVIERA MODA (OGOZA)', 'C/ VALGRANDE, N? 8 ', 0, 'MADRID', 0, '', NULL, NULL),
(64, 'AGO ACONDICIONAMIENTO GENERAL DE OFICINAS SL', 'CALLE NAVAS DE TOLOSA 250 LOCAL 1 - ', 8027, 'BARCELONA', 0, 'B60312055', NULL, NULL),
(65, 'FARMAOPCION, S.L.U', 'C/ OCA?A, 3', 28341, 'MADRID', 0, 'B85865145', NULL, NULL),
(66, 'SARTORIAL SL', 'AVD JUAN CARLOS I REY DE ESPA?A, 6,8', 28590, 'MADRID', 0, 'B85126704', NULL, NULL),
(67, 'SANTANDER GLOBAL FACILITIES SL UNIPERSONAL', 'AVD DE CANTABRIA S/N. ', 28660, 'MADRID', 0, 'B62116298', NULL, NULL),
(68, 'DISE?OS Y ADECUACIONES SL', 'AVDA. CORDOBA, 21 2? PLTA. OFICINA 1', 28026, 'MADRID', 0, 'B85817633', NULL, NULL),
(69, 'GIORGIO ARMANI RETAIL SRL', 'PASEO DE LA CASTELLANA,20 - 6? PLANTA', 28046, 'MADRID', 0, '', NULL, NULL),
(70, 'INTEGRAL OFFICE COMUNICACIONES S.L.U', 'POLIGONO FONTSANTA - C/ LES PLANES, 2-4', 8970, 'BARCELONA', 0, 'B60502333', NULL, NULL),
(71, 'ROBERTO VERINO DIFUSION S.A', 'PARQUE TECNOLOGICO DE GALICIA  SAN CIBRAO DAS VI?AS', 32900, 'OURENSE', 0, '', NULL, NULL),
(72, 'ESTUDIO RED BOX SL', 'C/ JULIAN CAMARILLO, 47, Portal C 202', 28037, 'MADRID', 0, 'B84829316', NULL, NULL),
(73, 'M? ANGELES BARCELO PALACIOS', 'C/ REAL, 22 BAJO', 51001, 'CEUTA', 0, '45064922X', NULL, NULL),
(74, 'CRISTALFARMA SC', 'RONDA DE QUI?ONES N? 10', 45214, 'TOLEDO', 0, 'J45723764', NULL, NULL),
(75, 'MODAS PISTOLOS', 'C/ CORREDERAS,260', 41520, 'SEVILLA', 0, 'B91258251', NULL, NULL),
(76, 'MOBILIARIO COMERCIAL DESNIVEL.SL.', 'POL.IND. LAS NACIONES C/ PARAGUAY, 4', 28971, 'MADRID', 0, 'B82921180', NULL, NULL),
(77, 'SMART MOBILITY SL', 'C/ ESGLESIA , 236', 8370, 'BARCELONA', 0, 'B64910680', NULL, NULL),
(78, 'CHEIL SPAIN, S.L.', 'AVENIDA DE BRUSELAS 16 1? izq', 28108, 'MADRID', 0, 'B86358645', NULL, NULL),
(79, 'LINEA MOBILIARIO DE OFICINA S.A', 'AVDA DE LOGRO?O, 42', 28042, 'MADRID', 0, 'A78903820', NULL, NULL),
(80, 'NUBE PRINT SL', 'SANCHO DAVILA,21 - BAJO 3', 28028, 'MADRID', 0, 'B85994366', NULL, NULL),
(81, 'CARMEN CARRIZO DIAZ', 'CALLE ROMANONES,2', 45211, 'TOLEDO', 0, '03801449D', NULL, NULL),
(82, 'MOBLIARIO COMERCIAL GRI?ON,S.L.', 'C/ VENEZUELA, 5', 28971, 'MADRID', 0, 'B86701398', NULL, NULL),
(83, 'ARIAS Y BERNABE CB', 'GRAN VIA DE SAN MARCOS,12', 24002, 'LEON', 0, 'E24653040', NULL, NULL),
(84, 'DM CONSULTORIA E INVERSIONES SL', 'AV CA JIMENEZ BECERRIL 8-20 P-9 5?1', 41009, 'SEVILLA', 0, 'B90076365', NULL, NULL),
(85, 'SANDRO FERRONE RETAIL ESPA?A SL', 'AVD MENENDEZ PELAYO 83', 28007, 'MADRID', 0, 'B86569142', NULL, NULL),
(86, 'ORLANE,S.A.', '12-14 RODN POINT DES CHAMPS ELYSEES', 75008, '', 0, 'FR51333621134', NULL, NULL),
(87, 'PACIFIC CREATION', '6-8 RUE CAROLINE', 75017, '', 0, 'FR56410238364', NULL, NULL),
(88, 'LA GALERIA DE ALMAGRO SL', 'C/ MARQUES DE RISCAL, N? 2 PTA 3', 0, 'MADRID', 0, 'B84255488', NULL, NULL),
(89, 'IDEAS IMAGINATIVAS S.L', 'C/ VELAZQUEZ,N? 57, 1?A URBANIZACION EL OLIVAR', 28220, 'MADRID', 0, 'B82221730', NULL, NULL),
(90, 'PANASONIC ESPA?A, SUCURSAL DE PANASONIC MARKETING EUROPE GMBH', 'WTC ALMEDA PARK - PLAZA DE LA PAV S/N EDIFICIO N? 8 PLANTA BAJA', 8940, 'BARCELONA', 0, 'W0047935B', NULL, NULL),
(91, 'DISE?OS Y ADECUACIONES SL', 'AVDA. CORDOBA, 21 2? PLTA. OFICINA 1', 28026, 'MADRID', 0, 'B85817633', NULL, NULL),
(92, 'SGZ RENT FASHION,S.L.', 'C/ DEHESILLAS, 2, PT 5, 3A', 28942, 'MADRID', 0, 'B86883501', NULL, NULL),
(93, 'ALVAREX 2013 S.L', 'C/ SOROLLA, N? 17', 24010, 'LEON', 0, 'B24657827', NULL, NULL),
(94, 'DANIEL LOPEZ RIZO', 'PARQUE EPRESARIAO NEINOR-HENARES  EDIFICIO 9 NAVE 2', 28880, 'MADRID', 0, '53016505X', NULL, NULL),
(95, 'OMNITEL COMUNICACIONES,,S.L.', 'EDIFICIO PRISMA, CALLE COLQUIDE N? 6', 28230, 'MADRID', 0, 'B81040669', NULL, NULL),
(96, 'METACRILATOS BURGOS', 'CALLE MERINDAZ DE CUESTA URRIA, S/N ', 9001, 'BURGOS', 0, '', NULL, NULL),
(97, 'RETAIL QUALITY PROJECT,S.L.', 'C/ SANCHO DAVILA, N? 21', 28028, 'MADRID', 0, 'B86786126', NULL, NULL),
(98, 'CAREYES CONTRACT SL', 'CALLE GABRIEL LOBO, 29', 28002, 'MADRID', 0, 'B83155697', NULL, NULL),
(99, 'LEDEL SPAIN,S.L.', 'PASEO DE LAS DELICIAS, 31', 28045, 'MADRID', 0, 'B86858081', NULL, NULL),
(100, 'EL CORCEL EQUITACION S.L', 'C/ TORRELAGUNA, N? 16', 28027, 'MADRID', 0, 'B84551357', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materials`
--

INSERT INTO `materials` (`id`, `nombre`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'LIGNA V8416 SABIA RIGATO DE FORMICA 3050x1220 mm/TABLERO/CONTRATIRO', 'madera', NULL, NULL),
(2, 'TABLERO POLIREY COMPACT MONOCHROM B170', 'madera', NULL, NULL),
(3, 'CANTO MELAM. CALVADOS 1951 DE 0.4X22', 'acabado', NULL, NULL),
(4, 'ROLLO BURBUJA 1,20X180M', 'embalaje', NULL, NULL),
(5, 'ROLLO FOAM 1MM 1,20X400M', 'embalaje', NULL, NULL),
(6, 'CANTONERA FOAM U30', 'embalaje', NULL, NULL),
(7, 'PALETS DE 1200 X 800 1ºFINO', 'embalaje', NULL, NULL),
(8, 'TABLERO MELAMINA EGGER HAYA DEL TIROL 2800X2070X19', 'madera', NULL, NULL),
(9, 'TABLERO MELAMINA EGGER HAYA DEL TIROL 2800X2070X30', 'madera', NULL, NULL),
(10, 'M2 LACADO madera', 'acabado', NULL, NULL),
(11, 'TRANSFORMADOR 12V 50W ', 'electricidad', NULL, NULL),
(12, 'ML TIRA DE LEDS IP20 9.6W  + CARRIL ALUMINIO PARA LED + DIFUSOR OPAL', 'electricidad', NULL, NULL),
(13, 'CABLE DE MANGUERA 3 X 1.5 BLANCA', 'electricidad', NULL, NULL),
(14, 'CERRADURA PUERTA CORREDERA (BOMBILLO LLAVES IGUALES) CROMO', 'herraje', NULL, NULL),
(15, 'CERRADURA PUERTA CORREDERA (EXPULSOR) CROMO', 'herraje', NULL, NULL),
(16, 'CERRADURA RIM LOCK 853-NKEY-701.NIQ', 'herraje', NULL, NULL),
(17, 'BMB CERRADURA KOMBI CIERRE GOLPETE  NIQ', 'herraje', NULL, NULL),
(18, 'BOMBILLO DE PERA 120MM NIQUEL', 'herraje', NULL, NULL),
(19, 'BOMBILLO KEY A004 NIQUEL', 'herraje', NULL, NULL),
(20, 'CANTO PVC FICHTE PRB 33 X 0,8', 'acabado', NULL, NULL),
(21, 'ROLLO CANTO HOJA ROBLE PORO ABIERTO 50MM', 'acabado', NULL, NULL),
(22, 'CANTO FICHTE PRB 33', 'acabado', NULL, NULL),
(23, 'ROLLO CANTO OLMO GAUDI 35 X 0,8MM', 'acabado', NULL, NULL),
(24, 'CANTO EGGER CALVADOS H1951 22 X 0,8', 'acabado', NULL, NULL),
(25, 'CANTO CHAPA ROBLE', 'acabado', NULL, NULL),
(26, 'CANTO EGGER REF. F509 ST2 33MM', 'acabado', NULL, NULL),
(27, 'CANTO HOJA NOGAL 42MM', 'acabado', NULL, NULL),
(28, 'ROLLO CANTO OLMO GAUDI 22 X 0,8MM', 'acabado', NULL, NULL),
(29, 'CANTO EGGER H1555 ST 15 33MM', 'acabado', NULL, NULL),
(30, 'CANTO DE ALUMINIO RAYADO DE 22 X 1', 'acabado', NULL, NULL),
(31, 'CANTO HOJA WENGE  50 X 0,8', 'acabado', NULL, NULL),
(32, 'LAMPARA DE TECHO PARA MESA NIDO, SOUTHERN COTTON', 'electricidad', NULL, NULL),
(33, 'LAMPARA DECOSTAR 51S WFL 50 W 38º CERRADA', 'electricidad', NULL, NULL),
(34, 'LAMPARA ESF. CLARA E27 25W 220V', 'electricidad', NULL, NULL),
(35, 'LAMPARA FARO 29874 NEGRO ', 'electricidad', NULL, NULL),
(36, 'LAMPARA HALÓGENA 50 W 220V GU10', 'electricidad', NULL, NULL),
(37, 'LAMPARA LED GU 10 3X 2W 600K', 'electricidad', NULL, NULL),
(38, 'LAMPARA MESA BAILAORA GRUPO ELÉCTRICO 361800000', 'electricidad', NULL, NULL),
(39, 'LAMPARA MND 3 X 3W D80 X 66 12º', 'electricidad', NULL, NULL),
(40, 'DM CRUDO DE 40MM  (M2)', 'madera', NULL, NULL),
(41, 'DM CRUDO DE 4MM  (M2)', 'madera', NULL, NULL),
(42, 'DM CRUDO DE 50MM  (M2)', 'madera', NULL, NULL),
(43, 'DM CRUDO EN 244 X 122 X 19 MM', 'madera', NULL, NULL),
(44, 'TABLERO DE DM CRUDO 244 X 205 X 35', 'madera', NULL, NULL),
(45, 'TABLERO DE DM CRUDO 2750 X 1220 X 19 MM', 'madera', NULL, NULL),
(46, 'ALFOMBRA 280 X 180 CM LES BEST III 995 CON CENEFA 637 DAMA PIEL SINTETICA ANCHO 6 CM', 'complemento', NULL, NULL),
(47, 'ALFOMBRA PIEL DE VACA IKEA', 'complemento', NULL, NULL),
(48, 'ALFOMBRA, COUCHEL', 'complemento', NULL, NULL),
(49, 'FELPUDO PURO EGO A MEDIDA NEGRO', 'complemento', NULL, NULL),
(50, 'ASIENTO DE PROBADORES', 'complemento', NULL, NULL),
(51, 'ASIENTO EN TELA JACKARD TWO 1702 DE 365 X 445 X 70MM', 'complemento', NULL, NULL),
(52, 'ASIENTO FOOTWEAR', 'complemento', NULL, NULL),
(53, 'ASIENTO NEGRO DE 150 X 75', 'complemento', NULL, NULL),
(54, 'ASIENTO NEGRO DE 150 X 75 ', 'complemento', NULL, NULL),
(55, 'ASIENTO PROBADOR', 'complemento', NULL, NULL),
(56, 'ATRIL MTC TRANSPARENTE S/PLANO', 'complemento', NULL, NULL),
(57, 'BALDA 5 SEC ( SEGÚN MEDIDAS INDICADAS )', 'complemento', NULL, NULL),
(58, 'ANAQ. ESPEJO REMATE, MULTIMARCAS HOMBRE Y MULTIMARCAS TALLAS G.', 'piezaCompuesta', NULL, NULL),
(59, 'ANAQUEL EXPOSICION CORTINAS CONFECCIONADAS', 'piezaCompuesta', NULL, NULL),
(60, 'ANAQUEL  GENERAL DE PRENSA Y REVISTAS', 'piezaCompuesta', NULL, NULL),
(61, 'ANAQUEL 125 CUELGA FRONTAL Y LATERAL ZENDRA 2 CUELGAS FRONTALES 35 CM 1 ENTREPAÑO DE 125 CM Y 1 CUELGA LATERAL', 'piezaCompuesta', NULL, NULL),
(62, 'ANAQUEL 125CM ENTREPAÑO CON CUELGA LATERAL, BASICOS SEÑORAS', 'piezaCompuesta', NULL, NULL),
(63, 'ANAQUEL 142,50 CM MULTIFIRMAS PUNTO COMPLETO CON 3 ENTREPAÑOS 1 BARRA LATERAL E ILUMINACION', 'piezaCompuesta', NULL, NULL),
(64, 'ANAQUEL 148,5 CM, SOUTHERN COTTON', 'piezaCompuesta', NULL, NULL),
(65, 'ANAQUEL 160CM, MULTIMARCAS HOMBRE', 'piezaCompuesta', NULL, NULL),
(66, 'ANAQUEL 205 CM MULTIFIRMAS PUNTO COMPLETO, CON 3 ENTREPAÑOS, 2 BARRAS FRONTALES, 1 BARRA LATERAL E ILUMINACION', 'piezaCompuesta', NULL, NULL),
(67, 'ANAQUEL 215CM ENTREPAÑOS Y CUELGA LAT Y FRONT, LLOYDS MIXTO', 'piezaCompuesta', NULL, NULL),
(68, 'P.BURBUJA + PAPEL 1.20', 'embalaje', NULL, NULL),
(69, 'PAPEL DE BURBUJA SIN PAPEL KRAFT', 'embalaje', NULL, NULL),
(70, 'BOBINA PAPEL DOBLE CAPA BOBINA 400M. FEF1902616', 'embalaje', NULL, NULL),
(71, 'BOBINA PAPEL IND 2 C 400M REF.190-2616', 'embalaje', NULL, NULL),
(72, 'ROLLO PAPEL CELULOSA (2 UDS X PAQUETE)', 'embalaje', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_externos`
--

CREATE TABLE `material_externos` (
  `id` int(10) UNSIGNED NOT NULL,
  `presupuesto_id` int(11) NOT NULL,
  `concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `proveedor_externo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `unidades` int(11) NOT NULL DEFAULT '0',
  `tipo_material` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No seleccionado',
  `largo` int(11) NOT NULL DEFAULT '0',
  `ancho` double NOT NULL DEFAULT '0',
  `alto` double NOT NULL DEFAULT '0',
  `m` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m` double(5,4) NOT NULL DEFAULT '0.0000',
  `m2` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m2` double(5,4) NOT NULL DEFAULT '0.0000',
  `m3` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m3` double(5,4) NOT NULL DEFAULT '0.0000',
  `precio_unidad` double NOT NULL DEFAULT '0',
  `unidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unidades',
  `precio_total` double NOT NULL DEFAULT '0',
  `archivo_presupuesto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sin definir',
  `num_presupuesto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sin definir',
  `uso_presupuesto_externo` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_parte`
--

CREATE TABLE `material_parte` (
  `id` int(10) UNSIGNED NOT NULL,
  `parte_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `unidades` int(11) NOT NULL DEFAULT '1',
  `largo` int(11) NOT NULL DEFAULT '0',
  `alto` int(11) NOT NULL DEFAULT '0',
  `ancho` int(11) NOT NULL DEFAULT '0',
  `m` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m` double(5,4) NOT NULL DEFAULT '0.0000',
  `m2` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m2` double(5,4) NOT NULL DEFAULT '0.0000',
  `m3` double(5,4) NOT NULL DEFAULT '0.0000',
  `total_m3` double(5,4) NOT NULL DEFAULT '0.0000',
  `descuento` int(11) NOT NULL DEFAULT '0',
  `precio_total` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_proveedor`
--

CREATE TABLE `material_proveedor` (
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `unidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unidad',
  `descuento` int(11) NOT NULL DEFAULT '0',
  `min_unidades` int(11) NOT NULL DEFAULT '1',
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `material_proveedor`
--

INSERT INTO `material_proveedor` (`proveedor_id`, `material_id`, `unidad`, `descuento`, `min_unidades`, `precio`, `created_at`, `updated_at`) VALUES
(764, 1, 'Unidades', 0, 1, 73.96, NULL, NULL),
(246, 2, 'Unidades', 0, 1, 123.00, NULL, NULL),
(814, 3, 'm2', 0, 1, 20.00, NULL, NULL),
(814, 4, 'Unidades', 0, 1, 0.16, NULL, NULL),
(814, 5, 'm', 0, 1, 0.11, NULL, NULL),
(814, 6, 'Unidades', 0, 1, 0.29, NULL, NULL),
(814, 7, 'Unidades', 0, 1, 2.50, NULL, NULL),
(263, 8, 'm2', 0, 1, 10.71, NULL, NULL),
(263, 9, 'm2', 0, 1, 14.90, NULL, NULL),
(814, 10, 'm2', 0, 1, 21.00, NULL, NULL),
(814, 11, 'Unidades', 0, 1, 17.64, NULL, NULL),
(814, 12, 'm', 0, 1, 18.50, NULL, NULL),
(814, 13, 'm', 0, 1, 0.89, NULL, NULL),
(814, 14, 'm2', 0, 1, 1.75, NULL, NULL),
(814, 15, 'm2', 0, 1, 1.82, NULL, NULL),
(814, 16, 'm2', 0, 1, 1.80, NULL, NULL),
(814, 17, 'm2', 0, 1, 1.51, NULL, NULL),
(814, 18, 'm2', 0, 1, 35.30, NULL, NULL),
(814, 19, 'm2', 0, 1, 1.83, NULL, NULL),
(69, 20, 'm2', 0, 1, 0.51, NULL, NULL),
(613, 21, 'm2', 0, 1, 0.52, NULL, NULL),
(69, 22, 'm2', 0, 1, 0.52, NULL, NULL),
(382, 23, 'm2', 0, 1, 0.53, NULL, NULL),
(263, 24, 'm2', 0, 1, 0.55, NULL, NULL),
(69, 25, 'm2', 0, 1, 0.55, NULL, NULL),
(563, 26, 'm2', 0, 1, 0.57, NULL, NULL),
(69, 27, 'm2', 0, 1, 0.58, NULL, NULL),
(382, 28, 'm2', 0, 1, 0.65, NULL, NULL),
(263, 29, 'm2', 0, 1, 0.70, NULL, NULL),
(576, 30, 'm2', 0, 1, 0.74, NULL, NULL),
(69, 31, 'm2', 0, 1, 0.78, NULL, NULL),
(814, 32, 'Unidades', 0, 1, 240.00, NULL, NULL),
(814, 33, 'Unidades', 0, 1, 1.50, NULL, NULL),
(814, 34, 'Unidades', 0, 1, 0.83, NULL, NULL),
(814, 35, 'Unidades', 0, 1, 20.87, NULL, NULL),
(814, 36, 'Unidades', 0, 1, 3.58, NULL, NULL),
(814, 37, 'Unidades', 0, 1, 9.50, NULL, NULL),
(814, 38, 'Unidades', 0, 1, 100.80, NULL, NULL),
(814, 39, 'Unidades', 0, 1, 43.55, NULL, NULL),
(814, 40, 'm2', 0, 1, 21.28, NULL, NULL),
(814, 41, 'm2', 0, 1, 2.94, NULL, NULL),
(814, 42, 'm2', 0, 1, 27.46, NULL, NULL),
(814, 43, 'm3', 0, 1, 16.16, NULL, NULL),
(814, 44, 'm3', 0, 1, 61.44, NULL, NULL),
(814, 45, 'm3', 0, 1, 5.43, NULL, NULL),
(814, 46, 'Unidades', 0, 1, 310.00, NULL, NULL),
(814, 47, 'Unidades', 0, 1, 202.00, NULL, NULL),
(814, 48, 'Unidades', 0, 1, 368.00, NULL, NULL),
(814, 49, 'Unidades', 0, 1, 141.93, NULL, NULL),
(814, 50, 'Unidades', 0, 1, 165.00, NULL, NULL),
(814, 51, 'Unidades', 0, 1, 35.00, NULL, NULL),
(814, 52, 'Unidades', 0, 1, 470.00, NULL, NULL),
(814, 53, 'Unidades', 0, 1, 140.00, NULL, NULL),
(814, 54, 'Unidades', 0, 1, 165.00, NULL, NULL),
(814, 55, 'Unidades', 0, 1, 9.97, NULL, NULL),
(814, 56, 'Unidades', 0, 1, 197.00, NULL, NULL),
(814, 57, 'Unidades', 0, 1, 15.00, NULL, NULL),
(814, 58, 'Unidades', 0, 1, 440.00, NULL, NULL),
(814, 59, 'Unidades', 0, 1, 3336.00, NULL, NULL),
(814, 60, 'Unidades', 0, 1, 1641.00, NULL, NULL),
(814, 61, 'Unidades', 0, 1, 740.00, NULL, NULL),
(814, 62, 'Unidades', 0, 1, 606.00, NULL, NULL),
(814, 63, 'Unidades', 0, 1, 1347.00, NULL, NULL),
(814, 64, 'Unidades', 0, 1, 585.00, NULL, NULL),
(814, 65, 'Unidades', 0, 1, 1208.00, NULL, NULL),
(814, 66, 'Unidades', 0, 1, 1579.00, NULL, NULL),
(814, 67, 'Unidades', 0, 1, 961.00, NULL, NULL),
(814, 68, 'Unidades', 0, 1, 0.36, NULL, NULL),
(814, 69, 'Unidades', 0, 1, 44.00, NULL, NULL),
(814, 70, 'Unidades', 0, 1, 10.11, NULL, NULL),
(814, 71, 'Unidades', 0, 1, 8.10, NULL, NULL),
(814, 72, 'Unidades', 0, 1, 13.47, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(133, '2014_10_12_000000_create_users_table', 1),
(134, '2014_10_12_100000_create_password_resets_table', 1),
(135, '2018_02_19_202017_create_clientes_table', 1),
(136, '2018_02_19_203627_create_obras_table', 1),
(137, '2018_02_19_204118_create_proveedors_table', 1),
(138, '2018_02_19_205338_create_presupuestos_table', 1),
(139, '2018_02_19_206139_create_partes_table', 1),
(140, '2018_02_19_304129_create_materials_table', 1),
(141, '2018_02_22_010003_parte_material', 1),
(142, '2018_03_08_111754_material_proveedor', 1),
(143, '2018_04_02_000344_planos', 1),
(144, '2018_04_03_010021_create_material_externos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id` int(10) UNSIGNED NOT NULL,
  `v_id` int(11) NOT NULL DEFAULT '1',
  `version` int(11) NOT NULL DEFAULT '1',
  `v_activa` int(11) NOT NULL DEFAULT '1',
  `v_ultima` int(11) NOT NULL DEFAULT '1',
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `beneficio` double NOT NULL DEFAULT '30',
  `precio_total` double(8,2) NOT NULL DEFAULT '0.00',
  `precio_total_beneficio` double(8,2) NOT NULL DEFAULT '0.00',
  `porcentaje_montaje` double(8,2) NOT NULL DEFAULT '0.00',
  `coste_montaje` double(8,2) NOT NULL DEFAULT '0.00',
  `total_montaje` double(8,2) NOT NULL DEFAULT '0.00',
  `porcentaje_transporte` double(8,2) NOT NULL DEFAULT '0.00',
  `coste_transporte` double(8,2) NOT NULL DEFAULT '0.00',
  `total_transporte` double(8,2) NOT NULL DEFAULT '0.00',
  `margen_estructural` double(8,2) NOT NULL DEFAULT '0.00',
  `total_estructural` double(8,2) NOT NULL DEFAULT '0.00',
  `margen_comercial` double(8,2) NOT NULL DEFAULT '0.00',
  `total_comercial` double(8,2) NOT NULL DEFAULT '0.00',
  `total_IVA` double(8,2) NOT NULL DEFAULT '0.00',
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presupuesto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `planos`
--

CREATE TABLE `planos` (
  `id` int(10) UNSIGNED NOT NULL,
  `presupuesto_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id` int(10) UNSIGNED NOT NULL,
  `obra_id` int(10) UNSIGNED NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mueble',
  `caracteristicas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidades` int(11) NOT NULL DEFAULT '1',
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'por comprobar',
  `beneficio` int(11) NOT NULL DEFAULT '0',
  `desperdicio` int(11) NOT NULL DEFAULT '10',
  `precio_total_unidad` double(8,2) NOT NULL DEFAULT '0.00',
  `precio_total` double(8,2) NOT NULL DEFAULT '0.00',
  `uso_beneficio_global` tinyint(1) NOT NULL DEFAULT '1',
  `t_seccionadora` int(11) NOT NULL DEFAULT '0',
  `o_seccionadora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Corte',
  `precio_t_seccionadora` double NOT NULL DEFAULT '0',
  `total_seccionadora` double NOT NULL DEFAULT '0',
  `t_escuadradora` int(11) NOT NULL DEFAULT '0',
  `o_escuadradora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ingletado',
  `precio_t_escuadradora` double NOT NULL DEFAULT '0',
  `total_escuadradora` double NOT NULL DEFAULT '0',
  `t_elaboracion` int(11) NOT NULL DEFAULT '0',
  `o_elaboracion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Macizos',
  `precio_t_elaboracion` double NOT NULL DEFAULT '0',
  `total_elaboracion` double NOT NULL DEFAULT '0',
  `t_canteadora` int(11) NOT NULL DEFAULT '0',
  `o_canteadora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Canteado',
  `precio_t_canteadora` double NOT NULL DEFAULT '0',
  `total_canteadora` double NOT NULL DEFAULT '0',
  `t_punto` int(11) NOT NULL DEFAULT '0',
  `o_punto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mecanizado',
  `precio_t_punto` double NOT NULL DEFAULT '0',
  `total_punto` double NOT NULL DEFAULT '0',
  `t_prensa` int(11) NOT NULL DEFAULT '0',
  `o_prensa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pegado de Formica',
  `precio_t_prensa` double NOT NULL DEFAULT '0',
  `total_prensa` double NOT NULL DEFAULT '0',
  `maquinas_operarios` int(11) NOT NULL DEFAULT '0',
  `maquinas_horas_operario` int(11) NOT NULL DEFAULT '0',
  `maquinas_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `maquinas_precio_unidad` double NOT NULL DEFAULT '0',
  `total_maquinas` double NOT NULL DEFAULT '0',
  `bancos_operarios` int(11) NOT NULL DEFAULT '0',
  `bancos_horas_operario` int(11) NOT NULL DEFAULT '0',
  `bancos_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `bancos_precio_unidad` double NOT NULL DEFAULT '0',
  `total_bancos` double NOT NULL DEFAULT '0',
  `maquinas_oficial_1_operarios` int(11) NOT NULL DEFAULT '0',
  `maquinas_oficial_1_horas_operario` int(11) NOT NULL DEFAULT '0',
  `maquinas_oficial_1_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `maquinas_oficial_1_precio_unidad` double NOT NULL DEFAULT '0',
  `total_maquinas_oficial_1` double NOT NULL DEFAULT '0',
  `producto_ter_1_operarios` int(11) NOT NULL DEFAULT '0',
  `producto_ter_1_horas_operario` int(11) NOT NULL DEFAULT '0',
  `producto_ter_1_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `producto_ter_1_precio_unidad` double NOT NULL DEFAULT '0',
  `total_producto_ter_1` double NOT NULL DEFAULT '0',
  `productor_ter_2_operarios` int(11) NOT NULL DEFAULT '0',
  `productor_ter_2_horas_operario` int(11) NOT NULL DEFAULT '0',
  `productor_ter_2_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `productor_ter_2_precio_unidad` double NOT NULL DEFAULT '0',
  `total_productor_ter_2` double NOT NULL DEFAULT '0',
  `oficial_1_operarios` int(11) NOT NULL DEFAULT '0',
  `oficial_1_horas_operario` int(11) NOT NULL DEFAULT '0',
  `oficial_1_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `oficial_1_precio_unidad` double NOT NULL DEFAULT '0',
  `total_oficial_1` double NOT NULL DEFAULT '0',
  `oficial_2_operarios` int(11) NOT NULL DEFAULT '0',
  `oficial_2_horas_operario` int(11) NOT NULL DEFAULT '0',
  `oficial_2_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `oficial_2_precio_unidad` double NOT NULL DEFAULT '0',
  `total_oficial_2` double NOT NULL DEFAULT '0',
  `ayudante_operarios` int(11) NOT NULL DEFAULT '0',
  `ayudante_horas_operario` int(11) NOT NULL DEFAULT '0',
  `ayudante_operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No indicado',
  `ayudante_precio_unidad` double NOT NULL DEFAULT '0',
  `total_ayudante` double NOT NULL DEFAULT '0',
  `desplazamiento_unidad` double NOT NULL DEFAULT '0',
  `total_desplazamiento` double NOT NULL DEFAULT '0',
  `transporte_unidad` double NOT NULL DEFAULT '0',
  `total_transporte` double NOT NULL DEFAULT '0',
  `imprevistos_unidad` double NOT NULL DEFAULT '0',
  `total_imprevistos` double NOT NULL DEFAULT '0',
  `iva_unidad` double NOT NULL DEFAULT '21',
  `total_iva` double NOT NULL DEFAULT '0',
  `precio_con_iva` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedors`
--

CREATE TABLE `proveedors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No insertado',
  `cp` int(11) NOT NULL DEFAULT '0',
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No insertado',
  `telefono` int(11) NOT NULL DEFAULT '0',
  `nif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No insertado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedors`
--

INSERT INTO `proveedors` (`id`, `nombre`, `direccion`, `cp`, `provincia`, `telefono`, `nif`, `created_at`, `updated_at`) VALUES
(1, 'INTERIORISMO Y DECOR. DE ESPAC.ARQUITECTONICOS S.L', 'AV ISABEL DE FARNESIO, 23 - LOCAL 5', 28660, 'MADRID', 916333215, 'B84482918', NULL, NULL),
(2, 'ROYMARDI, S.L.', 'C/ BASTIDOR, 6 - CIUDAD DEL AUTOMOVIL', 28914, 'MADRID', 916932200, 'B28819050', NULL, NULL),
(3, 'ARSYS INTERNET, S.L.U.', 'C/ CHILE N? 54', 26007, 'LOGRO?O', 902115530, 'B85294916', NULL, NULL),
(4, 'SISTEMAS MULTIMEDIA Y DE GESTION, S.L.U.', 'P.I.Olivares. Ctra.Bail?n-Motril Km. 332,7 Nave 12', 23009, 'JAEN', 953227933, 'B11682879', NULL, NULL),
(5, 'CENTROS COMERCIALES CARREFOUR S.A.', 'C/ CAMPEZO N? 16. P.I. LAS MERCEDES', 28022, 'MADRID', 0, 'A284252270', NULL, NULL),
(6, 'GERFLOR', '50 COURS DE LA REPUBLIQUE', 69627, 'VILLEURBANNE CEDEX', 916535011, 'W0013692I', NULL, NULL),
(7, 'GLOSER ASESORIA JURIDICA Y FISCAL S.L.', 'PLAZA JUAN CARLOS I N?1 APARTADO CORREOS 74', 28750, 'MADRID', 918436093, 'B83192195', NULL, NULL),
(8, 'LIBROS Y COPIAS BOADILLA 2006, S.L.', 'AV. ISABEL DE FARNESIO, 23 LOCAL 7', 28660, 'MADRID', 916320467, 'B84048685', NULL, NULL),
(9, 'EL CORTE INGLES, S.A.', 'C/ HERMOSILLA, 112', 28009, 'MADRID', 0, 'A28017895', NULL, NULL),
(10, 'AUTOMERCADO DEL SUR, S.A.', 'C/ PALIER, 19 - CIUDAD DEL AUTOMOVIL', 28914, 'MADRID', 916949998, 'A28646610', NULL, NULL),
(11, 'MEGATIENDAS-ABANA, S.L.', 'C/ COLEGIATA, 9, LOCAL 5,6,7,8', 28012, 'MADRID', 913601140, 'B82880873', NULL, NULL),
(12, 'PEREZ DE MADRID Y SANZ C.B.', 'C/ SERRANO, 41', 28001, 'MADRID', 915755113, 'E81144123', NULL, NULL),
(13, 'SOCIEDAD MATRITENSE DE ASESORIA EMPRESARIAL, S.L.', 'C/ SANCHO DAVILA, 21 - BAJO', 28028, 'MADRID', 91, 'B83265694', NULL, NULL),
(14, 'REGISTRO MERCANTIL DE MADRID', 'P? DE LA CASTELLANA, 44', 28046, 'MADRID', 0, 'E81458556', NULL, NULL),
(15, 'BOLETIN OFICIAL DEL ESTADO', 'AV. MANOTERAS, 54', 28071, 'MADRID', 913841525, 'Q2811001C', NULL, NULL),
(16, 'SIMADEC, S.L.', 'EXPLANADA, 8 3? PLANTA', 28040, 'MADRID', 915538844, 'B80314172', NULL, NULL),
(17, 'PAVIGAR INSTALACIONES, S.L.', 'C/ RESINA, 33 A - NAVES 17/18. P.I VILLAVERDE ALTO', 28021, 'MADRID', 91, 'B85472637', NULL, NULL),
(18, 'MEDIA MARKT GETAFE VIDEO-TV-HIFI-ELECTRO-COMP.S.A.', 'C.C. CAPITAL M-50?', 28905, 'MADRID', 916248000, 'A62348305', NULL, NULL),
(19, 'FERRETERIA ORTIZ S.A.', 'C/ NARVAEZ, 47', 28009, 'MADRID', 915734293, 'A28988673', NULL, NULL),
(20, 'MEGINO, S.L.', 'AVD. FUENLABRADA, 97 - 3?', 28912, 'MADRID', 916932211, 'B28240075', NULL, NULL),
(21, 'BLASCO SUR MATERIAL ELECTRICO, S.L.', 'AV. DE LAREDO, 54. P.IND. EL ALAMO', 28946, 'MADRID', 916153783, 'B85339489', NULL, NULL),
(22, 'BERMETRANS 91, S.L. (MRW)', 'C/ PONZANO, 80', 28003, 'MADRID', 915543252, 'B80098791', NULL, NULL),
(23, 'CON3RAS, S.L.', 'P.I. SAN MARCOS. C/ FCO.GASCO SANTILLAN, 12', 28906, 'MADRID', 916652566, 'B79815551', NULL, NULL),
(24, 'VIAJES DE NEGOCIOS Y TIEMPO LIBRE, S.A.', 'C/ DOCTOR CASTELLO, 31', 28009, 'MADRID', 914008830, 'A81807273', NULL, NULL),
(25, 'SONTRES MOBILIARIO, S.L.', 'C/ SEVERO OCHOA, 12 - NAVE 5', 45224, 'TOLEDO', 918936963, 'B83133520', NULL, NULL),
(26, 'MLS MENSAJEROS, S.L.', 'C/ NIEREMBERG, 19', 28002, 'MADRID', 0, 'B80214711', NULL, NULL),
(27, 'ABC DISPRENSA, S.L.', 'C/ COMANDANTE ZORITA, 13', 28020, 'MADRID', 0, 'B81947715', NULL, NULL),
(28, 'D.R. DISTRIBUCION, S.L.', 'C/ JAZMIN, 22', 28033, 'MADRID', 0, 'B81586778', NULL, NULL),
(29, 'AURIGACROWN CAR HIRE S.L.', 'AV. GARCIA MORATO, 10', 29004, 'MALAGA', 0, 'B92711464', NULL, NULL),
(30, 'TOOL QUICK', 'C/ GALANA, 4', 28944, 'MADRID', 0, 'B85527844', NULL, NULL),
(31, 'FERRETE, S.A.', 'C/ POZOBLANCO,2. POL.IND.SEVILLA', 28946, 'MADRID', 916153717, 'A78962792', NULL, NULL),
(32, 'BANCO BILBAO VIZCAYA ARGENTARIA, S.L.', 'PLAZA SAN NICOLAS, 4', 48005, 'VIZCAYA', 0, 'A48265169', NULL, NULL),
(33, 'REGISTRO MERCANTIL CENTRAL', 'PRINCIPE DE VERGARA, 94', 28006, 'MADRID', 902884442, 'Q2863020J', NULL, NULL),
(34, 'LAZARO Y PEREZ, S.L.', 'C/ HINOJOSA DEL DUQUE, 4-6. P.I. LA ALBARREJA', 28946, 'MADRID', 916905251, 'B28375863', NULL, NULL),
(35, 'COLOR WEB S.L.', 'C/ MOIANES 9, PLANTA 1?. P.I. CAN CASABLANQUES', 8192, 'BARCELONA', 937216636, 'B64577927', NULL, NULL),
(36, 'BRICOR S.L.', 'HERMOSILLA, 112 ', 28009, 'MADRID', 0, 'A50319771', NULL, NULL),
(37, 'MOSTOLES INDUSTRIAL S.A', 'CALLE GRANADA S/N', 28935, 'MADRID', 916648800, 'A28160711', NULL, NULL),
(38, 'PULSAR TECNOLOGIES', 'C/ MONASTERIO DE SUSO Y YUSO, 34', 28049, 'MADRID', 916363111, 'A82693615', NULL, NULL),
(39, 'RAFAEL SANCHEZ GARCIA', 'C/ SIERRA DE ALGODONALES, 20', 28500, 'MADRID', 0, '5429859L', NULL, NULL),
(40, 'ANTALIS OFICCE SUPPLIES', 'C/ BRUJULA, 21', 28850, 'MADRID', 916789815, 'B82983826', NULL, NULL),
(41, 'DECORPLAX METACRILATOS S.L.', 'C/ ANDRES ALVAREZ CABALLERO, 36. P.IND.VALDONAIRE', 28970, 'MADRID', 91, 'B81612087', NULL, NULL),
(42, 'MUEBLES MADERAMA S.L.', 'C/ FERROCARRIL, 25', 28450, 'MADRID', 918554507, 'B81997207', NULL, NULL),
(43, 'TELEFONICA MOVILES ESPA?A, S.A. ', 'Ronda de la Comunicaci?n s/n. Distrito C. Edificio Sur 3', 28050, 'MADRID', 900101010, 'A78923125', NULL, NULL),
(44, 'GLOBAL COLLECT BV', '', 0, '', 0, '', NULL, NULL),
(45, 'VISUAL MERCHANDISING CONSULTING SL', 'SUECIA ESQ CALABRIA S/N', 28022, 'MADRID', 0, 'B87282554', NULL, NULL),
(46, 'ENRIQUE GONZALEZ GONZALEZ', 'C/ HONDURAS N?32', 28980, 'MADRID', 0, '2849129G', NULL, NULL),
(47, 'WEB Y MEDIA, S.L.', 'CALLE SERRADILLA, 12 BAJO B', 28044, 'MADRID', 609206028, 'B82658055', NULL, NULL),
(48, 'CA?ADA REAL OPEN NATURE, S.L.', 'CTRA. M533 p.k. 1,600', 28211, 'MADRID', 918906980, 'B83194811', NULL, NULL),
(49, 'CORPORACION EUROPEA DE SISTEMAS ELECTRICOS, S.L.', 'AVD. PRINCIPE DE ASTURIAS, 69', 28670, 'MADRID', 916658138, 'B84669498', NULL, NULL),
(50, 'CAMARA OFICIAL DE COMERCIO E INDUSTRIA DE MADRID', 'C/ RIBERA DE LOIRA, 56-58', 28042, 'MADRID', 915383500, 'Q2873001H', NULL, NULL),
(51, 'MUTUA MADRILE?A AUTOMOVILISTA', 'P? CASTELLANA, 33', 28046, 'MADRID', 902555555, 'V28027118-501', NULL, NULL),
(52, 'PC CITY SPAIN S.A.U.', 'C/ LAS FABRICAS, 2. POL.IND.URTINSA', 28923, 'MADRID', 902100302, 'A81927964', NULL, NULL),
(53, 'MUEBLES MODULARES MADRID, S.L.', 'AVD. DEL SOL, 3 - SECTOR 8', 28850, 'MADRID', 916751776, 'B28851764', NULL, NULL),
(54, 'PORISTES MONTAJES Y MANTENIMIENTO S.L.', 'AVD. JUAN XXIII, 15 B', 28224, 'MADRID', 917815870, 'B85116523', NULL, NULL),
(55, 'MUNDORUEDA', 'C/ LISBOA, 2 - NAVE 19', 28340, 'MADRID', 912791316, 'B85160612', NULL, NULL),
(56, 'SEUR GEOPOST, S.L.U', 'CTRA. VALLECAS-VILLAVERDE N? 257', 28031, 'MADRID', 0, 'B82516600', NULL, NULL),
(57, 'ROTULOS AYLLON S.A.', 'C/ CARNICER, 9', 28039, 'MADRID', 915352034, 'A28253029', NULL, NULL),
(58, 'MIGUEL ANGEL ALBADALEJO JIMENEZ', 'AV. MONASTERIO DE SILOS, 73 A - 3? IZDA', 28049, 'MADRID', 0, '50101990D', NULL, NULL),
(59, 'CRISTALERIAS MATIAS, S.L.', 'C/ NAVARRA, 6-8', 28330, 'MADRID', 91, 'B79344487', NULL, NULL),
(60, 'SAPA EXTRUSION NAVARRA, S.L.', 'C/ ARALAR, 9', 31860, 'NAVARRA', 94850, 'B31614035', NULL, NULL),
(61, 'MULTIPAPEL HIPERPAPELERIA, S.L.', 'C/ CARLOS I, 15', 45210, 'TOLEDO', 902147789, 'B45479664', NULL, NULL),
(62, 'EZPELETA-PLASTIVAL S.A', 'C/ VITORIALANDA, 4-6', 1010, 'ALAVA', 902400354, 'A46015335 ', NULL, NULL),
(63, 'PINTURAS Y BARNICES MORLO, S.L', 'TRAVESIA DE ALCALA DE HENARES 4A', 28510, 'MADRID', 918733020, 'B78458650', NULL, NULL),
(64, 'LENKO,S.A', 'AVENIDA DE AMERICA,6', 28028, 'MADRID', 91, 'A28281079', NULL, NULL),
(65, 'SUMINISTROS MILLAN', 'CALLE FORNAX N? 15', 28905, 'MADRID', 916825139, '70160824Z', NULL, NULL),
(66, 'RECICLAJES MADRID S.L.', 'CTRA PARLA A PINTO, KM 2,500', 28980, 'MADRID', 91, 'B80820970', NULL, NULL),
(67, 'MADEGAN S.A.', 'p.i. CA?ARIEGO - C/ CEDROS, 3', 28979, 'MADRID', 918103099, 'A78781184', NULL, NULL),
(68, 'NEWFLOORS S.L.', 'LUIS I, 65 - B, NAVE 4. P.IND. VALLECAS', 28031, 'MADRID', 917788062, 'B80526213', NULL, NULL),
(69, 'MADERAS ELVIRA', 'P.IND. N? 5. APTDO DE CORREOS N? 10', 45220, 'TOLEDO', 925, 'B79940029', NULL, NULL),
(71, 'ASOCIACION DE TRANSPORTISTAS AUTONOMOS', 'C/ MOLINA DE SEGURA, 5 POST.', 0, 'MADRID', 917510323, 'G28624617', NULL, NULL),
(72, 'CEPSA ESTACIONES DE SERVICIO, S.A.', 'CAMPO DE LAS NACIONES - AVDA. DEL PATERNON, 12', 28042, 'MADRID', 913376000, 'A80298896', NULL, NULL),
(73, 'MAJOSAN S.A.', 'C/ SALAS DE BARBADILLO, 64', 28017, 'MADRID', 913680103, 'A79429189', NULL, NULL),
(74, 'AFILADOS QUICAP', 'C/ATENAS.13 POLIGONO INDUSTRIAL WELL?S', 28970, 'MADRID', 91, 'B78146610', NULL, NULL),
(75, 'DDIEFER MORGA MOTOR S.L.', 'C/ NICOLAS COPERNICO, 7', 28946, 'MADRID', 916151697, 'B85255453', NULL, NULL),
(76, 'REPSOL COMERCIAL DE PRODUCTOS PETROLIFEROS, S.A', 'P? DE LA CASTELLANA 278-280', 28046, 'MADRID', 0, 'A80298839', NULL, NULL),
(77, 'HERK?NIG S.L', 'C/ BRONCE, 30-31 NAVE 4/', 28890, 'MADRID', 91, 'B83240341', NULL, NULL),
(78, 'TURBOCOLOR S,L', 'PASEO DE TALLERES 3 NAVE 165', 28021, 'MADRID', 915052682, 'B81615494', NULL, NULL),
(79, 'ROTULOS SIMON S,L', 'AVENIDA DE LA CONSTITUCION,251 POL.IND.MONTE BOYAL', 45950, 'MADRID', 91, 'B81538241', NULL, NULL),
(80, 'CRISTALERIAS ESPEIN S.L', 'CALLE TEJAR 14 POL.IND. LOS SALMUEROS', 28978, 'MADRID', 918142290, 'B81491235', NULL, NULL),
(81, 'GREEN LED LIGHT S.L', 'CALLE ARACNE 33 ESCALERA B 5?A', 28022, 'MADRID', 91, 'B85843894', NULL, NULL),
(82, 'FERRETERIA Y SUMINISTROS ARENAL, S.L.', 'CTRA.CEDILLO DEL CONDADO EL VISO KM 1', 45214, 'TOLEDO', 925508296, 'B45354842', NULL, NULL),
(83, 'MANUELA MONTES SANCHEZ', 'AV. RAMON Y CAJAL, 36', 45210, 'TOLEDO', 925553773, '50162975K', NULL, NULL),
(84, 'PREMAP SEGURIDAD Y SALUD S.L.U.', 'C/ JARAMA, 132. PARQ.ACT.TOLEDO N.P-4.08', 45007, 'TOLEDO', 925234467, 'B84412683', NULL, NULL),
(85, 'SKYPE COMUNICATIONS S.A.R.L. 6e ETAGE', '22/24 BOULEVARD ROYAL', 0, 'LUXEMBOURG', 0, 'LU20981643', NULL, NULL),
(86, 'SPAINSAT S.L.', 'CL/ REAL, 2', 28460, 'MADRID', 918550845, 'B82444910', NULL, NULL),
(87, 'SOCIEDAD ESTATAL CORREOS Y TELEGRAFOS S.A.', 'VIA DUBLIN, 7', 28042, 'MADRID', 0, 'A83052407', NULL, NULL),
(88, 'MAQUIDUR, S.L.U.', 'PZA. VICENTE ALEXANDRE, 2 - 4? B', 45200, 'TOLEDO', 925540194, 'B45349610', NULL, NULL),
(89, 'ANTONIO CASANOVA BARTRA', 'C/ VARSOVIA 113 BIS ENTREPATIO', 8041, 'BARCELONA', 934561116, 'B64828163', NULL, NULL),
(90, 'BRICOPLUS, S.L.', 'C/ MORALEJA DE ENMEDIO, 4', 28944, 'MADRID', 912885855, 'B84627058', NULL, NULL),
(91, 'WURTH ESPA?A S.A.', 'PLO.IND. RIERA DE CALDES JOLERS 21 ', 8184, 'BARCELONA', 91, 'A08472276', NULL, NULL),
(92, 'DISTRIBUCIONES CONRADO MAYORAL, S.A.', 'C/ CAMINO PUENTE VIEJO,9-POL.IND. LOS ROBLES', 28500, 'MADRID', 918716817, 'A28827442', NULL, NULL),
(93, 'MADRIFERR, S.L.', 'AVDA DEL COMERCIO ,61', 45200, 'TOLEDO', 925532221, 'B80446354', NULL, NULL),
(94, 'INDUSTRIAS QUIMICAS KUPSA.S.L.', 'CTRA. N-111 LOGRO?O-PAMPLONA', 26080, 'LA RIOJA', 945, 'B01006766', NULL, NULL),
(95, 'GRUPO EMPRESARIALTEI.S.L.', 'CAMINO DE CAMPOSANTO, 18', 28860, 'MADRID', 912607927, 'B81266264', NULL, NULL),
(96, 'SUPERMERCADOS PICABO, S.L.', 'C/ FUENLABRADA, 46', 28945, 'MADRID', 0, 'B64694151', NULL, NULL),
(97, 'SCMGROUP ESPA?A S.A.U.', 'AVD. RAGULL 78-80 EDIFICIO 1, 1? PLTA.', 8173, 'BARCELONA', 93, 'A59063883', NULL, NULL),
(98, 'JANFER,SUMINISTROS PARA LA INDUSTRIA,S.L.U.', 'CARRETERA NACIONAL IV KM 20', 28320, 'MADRID', 918753131, 'B82904905', NULL, NULL),
(99, 'VISPLAY INTERNATIONAL GmbH', 'Charles Eames Strasse, 6', 79576, 'Weil Am Rhein', 932688701, 'DE254785254', NULL, NULL),
(101, 'MAPFRE FAMILIAR', 'CTRA DE POZUELO A MAJADAHONDA, 50', 28220, 'MADRID', 902448844, 'A28141935', NULL, NULL),
(102, 'MAPFRE COMPA?IA DE SEGUROS DE EMPRESAS', '', 0, '', 0, 'A28725331', NULL, NULL),
(103, 'TELEFONICA DE ESPA?A, S.A.U.', 'GRAN VIA, 28', 28013, 'MADRID', 0, 'A82018474', NULL, NULL),
(104, 'SANTANDER FACTORING Y CONFIRMING, S.A.', 'AV. CANTABRIA S/N. ED. PINAR, IE PLANTA 1', 28660, 'MADRID', 0, 'A78287562', NULL, NULL),
(105, 'ROYO FAHRENBERGER', 'C/ ALEMANIA, 10 - BAJO B', 28943, 'MADRID', 0, 'A79161212', NULL, NULL),
(106, 'MIGUEL QUEVEDO C.B.', 'C/ MARCELINO OROZCO, 3 LOCAL 1', 19200, 'GUADALAJARA', 949277692, 'E19248822', NULL, NULL),
(107, 'EMPORIO RUEDA, S.L.', 'C/ PLOMO, 6 NAVE 17. P.IND. AYMAIR', 28330, 'MADRID', 912791315, 'B85702546', NULL, NULL),
(108, 'MAQUINARIA LUPA, S.L.', 'C/ TEJEDORES, 4', 47400, 'VALLADOLID', 983803650, 'B47372909', NULL, NULL),
(109, 'UNIVERSAL EXPRESS TREX, S.L.', 'P.IND.STA M? DE BENQUERENCIA. C/ SANCHO', 45007, 'TOLEDO', 925240023, 'B45594249', NULL, NULL),
(110, 'DISTRIBUIDORES AUTOMATICOS DE BEBIDAS Y ALIMENTOS, S.A. ', 'AV. VIA AUGUSTA, 71-73 - 3? PLANTA', 8174, 'BARCELONA', 902110020, 'A59408492', NULL, NULL),
(111, 'FABRICADOS VENZA, S.L.', 'C/ BEMBIBRE, 37. P.IND.COBO CALLEJA', 28947, 'MADRID', 916420470, 'B28955391', NULL, NULL),
(112, 'ALFONSO VISEDO MARTIN', 'C/ GAMONAL, 5 - 3? PTA NAVE 23', 28031, 'MADRID', 917776230, '01100211Y', NULL, NULL),
(113, 'INSTALACION Y CONSERVACION P. CARRILLO, S.L.', 'AVD. ANDRAITX, 1 BIS', 28290, 'MADRID', 917105946, 'B81135816', NULL, NULL),
(114, 'ELECTRODOMESTICOS MENAJE DEL HOGAR, S.A.', 'C/ RIO GUADALHORCE, 4', 28906, 'MADRID', 0, 'A83695650', NULL, NULL),
(115, 'MAQUINARIA PARA LA MADERA, S.L.', 'C/ TENERIFE, 11. P.IND.LA FRALLE III', 28970, 'MADRID', 918, 'B82170473', NULL, NULL),
(116, 'FAB.PLAST.BURB. SANCHEZ Y PALOMO, S.L.', 'P.IND. LA MORA, 2425', 28950, 'MADRID', 916093510, 'B82500075', NULL, NULL),
(117, 'CARLOS JOSE CABEZAS VELAZQUEZ', 'GOYA, 25, 3? PLANTA', 28001, 'MADRID', 914351608, '01612889Z', NULL, NULL),
(118, 'ASPIRACIONES DEL CENTRO, S.A.', 'C/ BEGO?A, 16. P.IND.EL LOMO', 28970, 'MADRID', 916151014, 'A78657194', NULL, NULL),
(119, 'ALU SYSTEM S.A.U.', 'C/CARDEDEU S/N POL. IND.MONTGUIT ', 8480, 'BARCELONA', 93, 'A08658569', NULL, NULL),
(120, 'NORTECOLOR, S.A.', 'C/ JULIAN CAMARILLO, 23', 28037, 'MADRID', 91, 'A78491966', NULL, NULL),
(121, 'MDS INFORMATICA C.B.', 'C/ REAL 74 A', 45210, 'TOLEDO', 925557175, 'E45744281', NULL, NULL),
(122, 'HN COMPONENTES, S.L.', 'C/ CIUDAD DE FRIAS, 24 - 32 NAVE 10', 28021, 'MADRID', 915050798, 'B80647662', NULL, NULL),
(123, 'ELABORA CARPINTERIA Y DECORACION, S.L.', 'C/ ARTURO SORIA, 259', 28033, 'MADRID', 913835058, 'B84852763', NULL, NULL),
(124, 'JAVIER BERRIATUA HORTA', 'LAGASCA 105, 4? DCHA', 28006, 'MADRID', 914454558, '643454Y', NULL, NULL),
(125, 'INTERIA MAKING SPACES', 'AV. DEL JUGUETE, 22', 3440, 'ALICANTE', 902161617, 'B53014577', NULL, NULL),
(126, 'I.C.LOMINCHAR, S.L.', 'CTRA.TOCENAQUE, KM 0,7', 45212, 'TOLEDO', 925558130, 'B45274461', NULL, NULL),
(127, 'GRUSITEL ILLESCAS', 'AV. CASTILLA LA MANCHA', 45200, 'TOLEDO', 925513797, 'B45432697', NULL, NULL),
(128, 'MONSTER WORLDWIDE, S.L.', 'PZ MANUEL GOMEZ MORENO, 2. ED. ALFREDO MAHOU 3?', 28020, 'MADRID', 914140574, 'B82313982', NULL, NULL),
(129, 'CENTRAL AUX.DEL MOBILIARIO, S.L.', 'P.IND.EXPLANADA. C/ EXPLANADA, 7', 45220, 'TOLEDO', 925545524, 'B79449641', NULL, NULL),
(130, 'TECNYDIS SERVICIOS MONTAJE Y DECORACION, S.A.', 'AV.CERRO DEL RUBAL, 79', 28980, 'MADRID', 916989315, 'A28494847', NULL, NULL),
(131, 'SISTEMAS INTEGRALES DE BARNIZADO, S.A.', 'C/ CIUDAD DE SEVILLA, 57', 46988, 'VALENCIA', 961324977, 'A96347737', NULL, NULL),
(132, 'UNION FENOSA COMERCIAL, S.L.', 'AV. SAN LUIS, 77', 28033, 'MADRID', 901380220, 'B82207275', NULL, NULL),
(133, 'JALOGLASS', 'C/ LAS FABRICAS, 23. P.IND. URTINSA', 28923, 'MADRID', 916418383, 'B83987420', NULL, NULL),
(134, 'REDONDO Y GARCIA, S.A.', 'AREA EMPRESARIAL ANDALUCIA. SECTOR 1', 28320, 'MADRID', 916918220, 'A28021350', NULL, NULL),
(135, 'LOGISTICA DISTRIMOP 2006, S.L.', 'C/ BELGICA, 26', 28320, 'MADRID', 616536753, 'B84905801', NULL, NULL),
(136, 'ANA ISABEL DAVILA DELGADO', 'AVD. ESPA?A, 55', 28903, 'MADRID', 912284253, '52975023C', NULL, NULL),
(137, 'BLASCO SUMINISTROS ELECTRICOS, S.A.', 'CL.CAMPO AZALVARO, 9', 5004, 'AVILA', 920221062, 'A05011226', NULL, NULL),
(138, 'INFOJOBS, S.A.', 'C/ NUMANCIA, 46, 6? PLANTA', 8029, 'BARCELONA', 0, 'A62134309', NULL, NULL),
(139, 'LVMH IBERIA SL', 'C/ ISLA DE JAVA, N?33', 28034, 'MADRID', 917286900, 'B81733503', NULL, NULL),
(140, 'SALAMANCA ALIMENTACION S.L', 'C/ SALUD, N? 15, 3?', 28013, 'MADRID', 923151759, 'B82973264', NULL, NULL),
(141, 'PERCHAS CANO S.A ', 'C/ REAL, 98 B / APARTADO DE CORREO N?18', 28980, 'MADRID', 916991755, 'A28549210', NULL, NULL),
(143, 'TXISTU, S.L.', 'INFANTA MERCEDES, 79', 28020, 'MADRID', 915790871, 'B28276871', NULL, NULL),
(144, 'DECORACION INTEGRAL DEL COMERD SL', 'C/ ESTIU, 34-36 ', 8918, 'BARCELONA', 933976234, 'B61576401', NULL, NULL),
(145, 'CREACION DE IMAGEN INTEGRAL, S.L.', 'C/ MANUEL MEANA CANAL, 11', 33393, 'ASTURIAS', 985167932, 'B33956293', NULL, NULL),
(146, 'ALDASER OPTIVISION GRUPO OPTICO, S.L.', 'C/ ALEJANDRO SUREDA, 1 PORTAL 5 BAJO D', 28300, 'MADRID', 925132131, 'B84562255', NULL, NULL),
(147, 'CARLOS E. CA?AVATE CENTELLAS', 'C/ LIMA, N? 50, 2?D', 28945, 'MADRID', 659428184, '52125641M', NULL, NULL),
(148, 'SERGIO GARCIA DEL POZO HERNANDEZ', 'CTRA/ DE GALAPAGAR, N? 34 LOCAL 1', 28270, 'MADRID', 918424697, '50446238Q', NULL, NULL),
(149, 'PEGATINAS Y VINILOS S.L', 'AVD/ JOSE ANTONIO S/N NAVE 1', 45183, 'TOLEDO', 918108127, 'B85520658', NULL, NULL),
(150, 'A.C. MAGNETS 98, S.L', 'C/ AVIO PLUS ULTRA 8', 8017, 'BARCELONA', 932800028, 'B61642831', NULL, NULL),
(151, 'LEROY MERLIN ESPA?A S.L.U', 'N4 SALIDA 17 CENTRO COMERCIAL DE OCIO NASSICA', 0, '', 913940800, 'B84818442', NULL, NULL),
(152, 'HANBEL EASO, S.L', 'AVENIDA MADRE CANDIDA, N? 19', 20140, 'GUIPUZCOA', 2147483647, 'B75011429', NULL, NULL),
(153, 'JULIAN SOLIS BARRERO', 'C/ GANDIA, N? 20, 1?A', 28939, 'MADRID', 0, '47492055E', NULL, NULL),
(154, 'AID IMPROVE S.L', 'C/ COSTA RICA, N? 36', 28016, 'MADRID', 605870152, 'B83047282', NULL, NULL),
(155, 'COASA SEGURIDAD', 'C/ EDISON, PARCELA 78 - POL. IND TORREHIERRO', 45600, 'TOLEDO', 92, 'B45520814', NULL, NULL),
(156, 'LAYPE-BLANCO, S.L', 'POL. IND LA FRONTERA C/ 4, NAVES 47-48', 45217, 'TOLEDO', 925533271, 'B451295185', NULL, NULL),
(157, 'DECORACION Y SERVICIOS S.A.L', 'AVDA/ MONCAYO, N?2, NAVE 10, POL.IND SUR', 28703, 'MADRID', 916238077, 'A81113128', NULL, NULL),
(158, 'CERAMICAS NAVAGRES, S.A', 'POL. TALLUNTXE II,', 31110, 'NAVARRA', 948312897, 'A31536436', NULL, NULL),
(159, 'TALLERES HERMOSO S.L', 'C/ DEL REY, N? 4 (NAVE 4A)', 28609, 'MADRID', 918128021, 'B81350647', NULL, NULL),
(160, 'ARGANDE?A DE BARNICES Y PINTURAS S.L', 'AVDA/ DE MADRID, N? 25, NAVE D1', 28500, 'MADRID', 918713014, 'B81890766', NULL, NULL),
(161, 'ANDRES CARDE?A IZQUIERDO', 'CNO./ VILLAVICIOSA, N? 19, POL IND ALPARRACHE', 28600, 'MADRID', 0, '46852039G', NULL, NULL),
(162, 'BENJAMIN MATAS SANCHEZ', 'C/. DE MANAGUA, 12', 28945, 'MADRID', 671, '50164731Y', NULL, NULL),
(163, 'GELE S.A', 'C/ LEZAMA, N? 2, 3?IZQ, ', 28034, 'MADRID', 913582215, 'A28476778', NULL, NULL),
(164, 'IKEA IBERICA S.A', 'AVENIDA MATAPILONERA, N?9', 28922, 'MADRID', 902, 'A28812618', NULL, NULL),
(165, 'ABET LAMINATI S.A', 'C/ LOPEZ DE HOYOS, N? 35, 1? PL', 28002, 'MADRID', 916746339, 'A61904348', NULL, NULL),
(166, 'SANTIAGO RAMOS IZQUIERDO', 'CNO. VIEJO DE POZUELO S/N,', 28925, 'MADRID', 916111157, '71912112J', NULL, NULL),
(167, 'FELIPE MARTIN PASTOR', 'C/ CASTILLA, N? 3, NAVE 14', 28840, 'MADRID', 0, '2170833R', NULL, NULL),
(168, 'NAVALROTUL S.L', 'AVDA. DE LA CONSTITUCION, N?222 A- POLIND MONTE BOYAL', 45950, 'TOLEDO', 918113047, 'B2220641', NULL, NULL),
(169, 'ISABEL TORO MELERO', 'C/ VALENCIA, N? 3', 41927, 'SEVILLA', 954765776, '27853797S', NULL, NULL),
(170, 'SARAS ENERGIA S.A', 'C/ JOSE ABASCAL, N?5', 28003, 'MADRID', 927, 'A80503105', NULL, NULL),
(171, 'HIPERCOR S.A', 'C/ HERMOSILLA, N? 112', 28009, 'MADRID', 0, 'A28642866', NULL, NULL),
(172, 'POWER EXTIN S.L', 'C/ LAGO MARACAIBO, N?14', 28018, 'MADRID', 91, 'B28979656', NULL, NULL),
(173, 'GALP ENERGIA ESPA?A S.A.U', 'C/ ANABEL SEGURA, N? 16 EDIFICIO VEGA NORTE', 28100, 'MADRID', 91, 'A28559573', NULL, NULL),
(174, 'MIGUEL ANGEL ALONSO BUZON', 'URB. CIUDAD JARDIN, N? 63', 11379, 'CADIZ', 956683483, '75878508J', NULL, NULL),
(175, 'BELDA INTERIORISMO S.L', 'CTRA. ENCINAS REALIES S/N ', 29210, 'MALAGA', 952, 'B92459114', NULL, NULL),
(176, 'ARTISAN S.L', 'C/ BUENAVISTA, N? 4 APARTADO DE CORREOS 15', 46450, 'VALENCIA', 96, 'B46196168', NULL, NULL),
(177, 'TALLERES EDELWEISS, S.L.U', 'C/ BRISTOL, 9 - P.I. EUROPOLIS', 28232, 'MADRID', 916377164, 'B84626704', NULL, NULL),
(178, 'LAMPARAS OLIVA S.A', 'C/ DE LA ESTRADA, N? 11', 28034, 'MADRID', 913581993, 'A28477107', NULL, NULL),
(179, 'TECNOEQUIPAMIENTO, S.L', 'POL.IND. ALBRESA. LISBOA 3, NAVE 70', 28340, 'MADRID', 91, 'B79356366', NULL, NULL),
(180, 'LETRA A DE AROMA S.L', 'C/ MARIE CURIE, N? 17-19', 28521, 'MADRID', 902, 'B85180040', NULL, NULL),
(181, 'MARTA SEGURA GONZALEZ', 'AVD/ DOCTOR FLEMING, N? 17, A', 45210, 'TOLEDO', 925, '53424967S', NULL, NULL),
(182, 'FERRETERIA VAES S.L', 'C/ MARIBLANCA, N? 23', 28937, 'MADRID', 916133779, 'B84571306', NULL, NULL),
(183, 'RAMOS SIERRA S.A', 'C/ EDUARDO TORROJA, 1 (POL IND NTRA SRA. DE BUTARQUE', 28914, 'MADRID', 91, 'A28422335', NULL, NULL),
(184, 'JUAN ANTONIO RODRIGUEZ GARCIA', 'CTRA/ DE CEDILLO, N? 13', 45212, 'TOLEDO', 629914629, '51964893G', NULL, NULL),
(185, 'FRANCISCO AGUADO GONZALEZ', 'CTRA/ CEDILLO DEL CONDADO,, 11', 45212, 'TOLEDO', 925558772, '52107517M', NULL, NULL),
(186, 'YUKA ARTE FLORAL S.C', 'C/ JOSE ANTONIO, N? 47', 28660, 'MADRID', 91, 'J82863432', NULL, NULL),
(187, 'BALEARIA EUROLINEAS MARITIMAS S.A', 'ESTACION MARITIMA S/N ', 3700, 'ALICANTE', 966, 'A53293213', NULL, NULL),
(188, 'RAMIRO BARRIOS ECHENIQUE', 'C/ PERDICES, 16', 28670, 'MADRID', 912, '53450909J', NULL, NULL),
(189, 'VOLUMEN S.A.', 'CRTA.ALGETE KM 3,500 POL.INDUSTRIAL RIO JANEIRO C/TEJERA 2', 28110, 'MADRID', 914112447, 'A28324598', NULL, NULL),
(190, 'KL?BER LUBRICATION', '', 0, '', 0, 'D60295417', NULL, NULL),
(191, 'STUDIO ESCAPARATISMO S.L', 'C/ GOYA, N? 35', 24193, 'LEON', 607, 'B24489841', NULL, NULL),
(192, 'VALORACION DE LA FORMACION PROFESIONAL, S.L.', 'C/ PRINCESA, 13 1?', 28008, 'MADRID', 0, 'B85738656', NULL, NULL),
(193, 'J.C.SANTOS, S.A.', 'C/ SAN CESAREO, 15; POL.IND VILLAVERDE ALTO', 28021, 'MADRID', 91, 'A85478212', NULL, NULL),
(194, 'FERRETERIA LA ROSA', 'C/ PALOMA, N?5', 45400, 'TOLEDO', 925, 'B45725280', NULL, NULL),
(195, 'SUPRAMADERA S.L', 'C/ ARTESANIA, N? 17 POL IND ATALAYA', 45529, 'TOLEDO', 915, 'B45618766', NULL, NULL),
(196, 'CAPS SOLUCIONES INTEGRALES, S.L.', 'AVDA DE LAS CIUDADES, 1 LOCAL 7', 28903, 'MADRID', 91, 'B80603269', NULL, NULL),
(197, 'CASCOBALL S.A', 'C/ ITALIA, N? 29 POL. IND LA ESTACION', 28971, 'MADRID', 91, 'A80554017', NULL, NULL),
(198, 'PANESPOL SYSTEM DE ALCOY S.L', 'CARRER BUIXCARRO, 5', 3802, 'ALICANTE', 965, 'B53706651', NULL, NULL),
(199, 'COADPA S.A', 'C/ NAVALES, N? 27', 28925, 'MADRID', 91, 'A81765356', NULL, NULL),
(200, 'FASHION RENTING S.L', 'C/ GOSOL, 41 BAJOS C ', 8017, 'BARCELONA', 658078185, 'B64430432', NULL, NULL),
(201, 'GVM S.L', 'C/ LA VECILLA N?1, P.I COBO CALLEJA', 28947, 'MADRID', 91, 'B80846058', NULL, NULL),
(202, 'AUTOTRANSPORTE TURISTICO ESPA?OL S.A', 'P? DE LA CASTELLANA, N? 130', 28046, 'MADRID', 91, 'A28047884', NULL, NULL),
(203, 'AGUEDA CIPRIAN CASTRO', 'C/ MALAGA, N? 5', 28945, 'MADRID', 91, '3833202E', NULL, NULL),
(204, 'FERRETERIA DALPES S.A', 'AVD. DEL COMERCIO, N? 55. POL IND VALDELASILLAS', 45200, 'TOLEDO', 925, 'A45018496', NULL, NULL),
(205, 'AMETS OPERADOR DE TRANSPORTE S.L', 'C/ FUENTE DEL ALAMO, N? 16 1? PLANTA LOCAL 4 D-2, C.CIAL PUERTA VILLALBA', 28400, 'MADRID', 91, 'B84377829', NULL, NULL),
(206, 'COPIADORAS INNOVADAS S.A', 'C/ CAMPOMANES, N? 53', 28223, 'MADRID', 917, 'A78479276', NULL, NULL),
(207, 'BANCO SANTANDER S.A', 'PASEO/ PEREDA 9-12 ', 39004, 'CANTABRIA', 91, 'A39000013', NULL, NULL),
(208, 'RUBICIN SL', 'C/ MADRE DE DIOS, N? 4', 47011, 'VALLADOLID', 983265894, 'B47533856', NULL, NULL),
(209, 'ALD AUTOMOTIVE S.A', 'CARRETERA DE POZUELO 32', 28220, 'MADRID', 902100885, 'A80292667', NULL, NULL),
(210, 'SONIA MOMPO', 'AVDA- DE VALDEMARIN, N? 142, 2?A', 28023, 'MADRID', 619234751, '5418566L', NULL, NULL),
(211, 'GLOCAR, S.A.', 'C/ CAMINO DE HORMIGUERAS, 122', 28031, 'MADRID', 913329113, 'A78573375', NULL, NULL),
(212, 'MATIMEX SA', 'POL IND. MIJARES, C/ COMERCIO, N? 7', 12550, 'CASTELLON', 964, 'A12015848', NULL, NULL),
(213, 'ALMACENES ELECTRICOS MADRILE?OS SA', 'SEDNDA GALIANA , N?2 ', 28821, 'MADRID', 91, 'A80013170', NULL, NULL),
(214, 'COMERCIAL BREA SL', 'C/RIO MANZANARES, N? 47', 28970, 'MADRID', 91, 'B78632114', NULL, NULL),
(215, 'REVESTIMIENTOS KUBO, S.A.', 'C/ CARPINTEROS, N? 5 P.I VALDEFUENTES', 28939, 'MADRID', 91, 'A83225532', NULL, NULL),
(216, 'AYUSO 2, SAU', 'C/URANO N? 11 P.I N?2, LA FUENSANTA', 28936, 'MADRID', 91, 'A79022844', NULL, NULL),
(217, 'BATTICALOA INVERSIONES SL', 'P? DE LA CASTELLANA, N? 130', 28046, 'MADRID', 91, 'B85426815', NULL, NULL),
(218, 'CESAR CASTA?EDA E HIJOS S.L', 'C/ LA PERDIZ, N? 141', 45950, 'TOLEDO', 918, 'B81339152', NULL, NULL),
(219, 'DIAL MENSAJEROS S,L. ', 'RIO MUNDO NAVE 7', 45007, 'TOLEDO', 925, 'B45390127', NULL, NULL),
(220, 'A.D.Y.B.S.A', 'C.CIAL . MADRID-2 LA VAGUADA GINZO DE LIMIA, N? 43', 28029, 'MADRID', 0, 'A28857720', NULL, NULL),
(221, 'MANTECMA INDUSTRIAL S.L', 'AVDA/ DE LOS POBLADOS, 133 1?-4 ', 28025, 'MADRID', 913411422, 'B84263631', NULL, NULL),
(222, 'IDEAS IMAGINATIVAS S.L', 'C/ VELAZQUEZ,N? 57, 1?A URBANIZACION EL OLIVAR', 28220, 'MADRID', 91, 'B82221730', NULL, NULL),
(223, 'INGENICO SERVICES IBERIA S.A', 'C/ BASAURI, N?14, 1? PLANTA    URB LA FLORIDA ', 28023, 'MADRID', 902241111, 'A78425774', NULL, NULL),
(224, 'DAGOL IBERICA ', 'AVDA/ MONTE BOYAL, PARCELA 106, NAVE 1 P.I MONTE BOYAL', 45950, 'TOLEDO', 918171728, 'B45549714', NULL, NULL),
(225, 'EURO COMERCIAL H2F SL', 'C/ FLORIDA N?3 NAVE 1', 28670, 'MADRID', 91, 'B82373275', NULL, NULL),
(226, 'TINERO FERROKEY', 'C/ ANDALUCIA ESQ. LINDA VISTA', 29670, 'MALAGA', 952, 'B92030733', NULL, NULL),
(227, 'EUROSTARS ASTORIA ', 'C/ COMANDANTE BENITEZ, N?5 ', 29001, 'MALAGA', 951, 'B92346303', NULL, NULL),
(228, 'MADERAS BALLEMAR', 'C/ LOS METALES, 26-A', 28970, 'MADRID', 91, 'B81934994', NULL, NULL),
(229, 'STOYAN IVANOV POPOV', 'CUESTA DE LOS CARROS N? 10', 28391, 'MADRID', 0, 'X4198872S', NULL, NULL),
(230, 'F.SOBRADO S.L', 'C/ ALBERCA, 1 POL. CAMPOHERMOSO', 28942, 'MADRID', 91, 'B84134352', NULL, NULL),
(231, 'ALBERTO BALLESTEROS JIMENEZ', 'C/ FELIPE ESTEVEZ, N?10', 28901, 'MADRID', 91, '70012122F', NULL, NULL),
(232, 'ANGEL-ABRAHAM HERNANDEZ SANCHEZ ', 'C/ GUADALAJARA N? 412', 45191, 'TOLEDO', 0, '03866368E', NULL, NULL),
(233, 'DANIEL LOPEZ RIZO', 'C/ BRIGADAS INTERNACIONALES, 6, 2?C', 28805, 'MADRID', 0, '53016505X', NULL, NULL),
(234, 'TEKWOOD SL', 'C/ ALVAREZ, 14, C, 1?, 2?', 8190, 'BARCELONA', 93, 'B61704714', NULL, NULL),
(235, 'ASOCIACION ESPA?OLA DE CENTROS COMERCIALES', 'C/ MAURICIO LEGENDRE, N? 18, 1? A', 28046, 'MADRID', 913, 'G78922275', NULL, NULL),
(236, 'GESTION Y MEJORA ENERGETICA SL', 'C/ AGUSTIN MARTIN ESPERANZA, N? 15', 45126, 'TOLEDO', 925, 'B45643731', NULL, NULL),
(237, 'MANIQUIES SEMPERE SL', 'PG. INDUSTRIAL 2 * C/ COCENTAINA, 1', 3420, 'ALICANTE', 96, 'B03263431', NULL, NULL),
(238, 'SOFTWARE DEL SOL S.A', 'CTRA/ BAILEN- MATRIL, KM 332,7 NAVE 12', 23007, 'JAEN', 95, 'A11682879', NULL, NULL),
(239, 'HIDRAULICA CARRERA SL', 'C/ TORRES QUEVEDO, N? 29 NAVE 3', 28936, 'MADRID', 91, 'B79125605', NULL, NULL),
(240, 'APPLE STORE PARQUESUR', 'CENTRO COMERCIAL PARQUESUR', 28914, 'MADRID', 916445100, 'B65130643', NULL, NULL),
(241, 'REPAIR SHOP INDUSTRIAL SL', 'C/ COBRE, 18, POLIG IND SAN MILLAN', 28950, 'MADRID', 91, 'B81682098', NULL, NULL),
(242, 'JULIA GARCIA RABADAN', 'C/ LICENCIADO VIDRIERA, N? 14', 45221, 'TOLEDO', 0, '3776610X', NULL, NULL),
(243, 'INFORMA D&B S.A ', 'AVDA. DE LA INDUSTRIA, 32', 28108, 'MADRID', 900, 'A80192727', NULL, NULL),
(244, 'ESTUDIO ALBAHACA S.L', 'C/ SAN DIMS , N? 7 ', 28015, 'MADRID', 91, 'b80036882', NULL, NULL),
(245, 'LYRECO ESPA?A S.A', 'CTRA. HOSPITALET 147-149 EDIF PARIS D', 8940, 'BARCELONA', 902100016, 'A79206223', NULL, NULL),
(246, 'MADERAS Y CHAPAS ALPISA S.A', 'POL. IND. AV.PRINCIPAL ,5', 46220, 'VALENCIA', 91, 'A46229126', NULL, NULL),
(247, 'MADERAS GUILLEN SANCHEZ S.C', 'C/ CARPINTEROS, N? 18 POL IND PRADO DEL ESPINO', 28660, 'MADRID', 911, 'J85881316', NULL, NULL),
(248, 'NUEVO PERFIL S.A', 'LANZAROTE, 11 NAVE 6 ', 28703, 'MADRID', 91, 'A78507258', NULL, NULL),
(249, 'CIMODIN S.L', 'C/ FUENTE DE LA TEJA, 2', 28916, 'MADRID', 91, 'B86042306', NULL, NULL),
(250, 'RESOPAL S.A', 'C/ FRANCISCO ALONSO 2', 28806, 'MADRID', 902, 'A28010957', NULL, NULL),
(251, 'GESTERNOVA S.A', 'C/ AGUARON, 23B, 1? PLANTA', 28036, 'MADRID', 902, 'A84337849', NULL, NULL),
(252, 'MANUEL E HIJOS S.L', 'CTRA. UGENA, N? 3 ', 45216, 'TOLEDO', 925, 'B45580024', NULL, NULL),
(253, 'GOEPI S.L', 'C/ RAIMUNDO LULIO, N? 124', 0, 'TELDE', 0, 'B35309152', NULL, NULL),
(254, 'ALVAREZ MADERAS SL', 'POL IND VILLA DE YUNCOS C/ FELIPE II, N? 131 ', 45210, 'TOLEDO', 925, 'B81624405', NULL, NULL),
(255, 'CIT TRES 30, S.L', 'RONDA DE BUENAVISTA 41, LOCAL 36-27', 45005, 'TOLEDO', 925, 'B45476454', NULL, NULL),
(256, 'GREGORIO DELGADO HENRIQUEZ', 'MARIANAO, 25', 35016, 'LAS PALMAS', 928, '42747535B', NULL, NULL),
(257, 'SAPA PROFILES LA SELVA S.L ', 'P.I MILENIUM. AVDA. ALUMINIUM S/N CARTERIA MUNICIPAL 120', 43470, 'TARRAGONA', 977, 'B08944464', NULL, NULL),
(258, 'ARTESANOS UNIDOS DE VILLORUELA S.L', 'C/ UNAMUNO, N? 13, BJ', 37338, 'SALAMANCA', 923, 'B37402997', NULL, NULL),
(259, 'MUEBLES TAPIZADOS GRANFORT S.A', 'CTRA. DEL ARDAL, S/N APDO 5', 30510, 'MURCIA', 968719500, 'A30031439', NULL, NULL),
(260, 'H?FELE HERRAJES ESPA?A SL', 'C/ ELECTRONICA, 33 Y 35; P.I URTINSA II', 28923, 'MADRID', 91, 'B81666026', NULL, NULL),
(261, 'MESILL PRODUCTOS SA', 'C/ BIZKAIA, 26 (APDO. 212)', 20800, 'GUIPUZCOA', 943, 'A20177408', NULL, NULL),
(262, 'FEDERACION EMPRESARIAL DE TOLEDO ', 'PASEO/ DE RECAREDO, N? 1', 45002, 'TOLEDO', 925, 'G45024866', NULL, NULL),
(263, 'EMEDEC S.L MADERAS DE PROFESIONALES', 'AV MIGUEL HERNANDEZ, 27', 46960, 'VALENCIA', 91, 'B96828207', NULL, NULL),
(264, 'DISE?OS Y TRANSFORMADOS DE METAL S,L', 'C/ MARMOL , N? 3', 45220, 'TOLEDO', 925, 'B45653284', NULL, NULL),
(265, 'FUNDACION LABORAL DE LA CONSTRUCCION', 'RIVAS 25', 28052, 'MADRID', 91, 'G80468416', NULL, NULL),
(266, 'MIGUEL ANGEL DEL AGUA ORTEGA', 'C/ CRISTOBAL COLON, N? 8', 45210, 'TOLEDO', 0, '50091154Y', NULL, NULL),
(267, 'E.S CRUCE DE CEDILLO S.L', 'CM-4004, KM 17.500', 45214, 'TOLEDO', 925, 'B45453977', NULL, NULL),
(268, 'CONFORAMA GETAFE', 'P. CIAL NASSICA A4 SALIDA 17; AVDA RIO GUADALQUIVIR, 13', 28906, 'MADRID', 918, 'A79103222', NULL, NULL),
(269, 'ZAKOKO S.L.L', 'C/ PASAJE DE LOS REMEDIOS, N?2', 45100, 'TOLEDO', 925, 'B45738499', NULL, NULL),
(270, 'TALEGO SL', 'CTRA/ TOLEDO - AVILA, KM, 30', 45500, 'TOLEDO', 925, 'B45215472', NULL, NULL),
(271, 'FRANCISCO JAVIER LOPEZ - MARTINEZ CAMPUZANO', 'C/ RUFINO BLANCO, 9 D', 19002, 'GUADALAJARA', 949, '5347053J', NULL, NULL),
(272, 'URLAN HEAT  S.L', 'C/ AUTONOMIA 64 BIS 4? PLANTA', 48012, 'VIZCAYA', 94, 'B95151957', NULL, NULL),
(273, 'CA2L S.L', 'C/ ALI - BEL 22', 8013, 'BARCELONA', 932, 'B59571232', NULL, NULL),
(274, 'RAUL UCEDA BARRERA', 'C/ CANALES, 50', 45212, 'TOLEDO', 925, '70349250R', NULL, NULL),
(275, 'ALEJANDRO BARRASA MONTALVO', 'C/ JOSE GABRIEL Y GALAN, 3 B?E', 28806, 'MADRID', 667760990, '09047183H', NULL, NULL),
(276, 'SERCAMAN 1 S.L ', 'C/ CORPUS CHRISTI, N? 8', 45005, 'TOLEDO', 925, 'B45243474', NULL, NULL),
(277, 'PC COMPONENTES Y MULTIMEDIA S,.L', 'AVDA. ANTONIO FUENTES, N? 23', 30840, 'MURCIA', 0, 'B73347494', NULL, NULL),
(278, 'SCAN SYSTEM CONSULTORES S.L', 'C/ MARCELO GOMEZ, N? 66 ', 28600, 'MADRID', 0, 'B84875822', NULL, NULL),
(279, 'JM BRUNEAU ESPA?A S.A ', 'C/BERGUEDA N? 1, ', 8820, 'BARCELONA', 902, 'A62588421', NULL, NULL),
(280, 'BOOKS AND GIFTS S.L', 'C/ GAVILANES, 1', 28035, 'MADRID', 913, 'B85645000', NULL, NULL),
(281, 'AMBYTEC QUALITY SOLUTIONS SL', 'C/ MINERVA N? 35 3?E', 28032, 'MADRID', 91, 'B85401081', NULL, NULL),
(282, 'COMPA?IA DE EQUIPAMIENTOS DEL HOGAR HABITAT SA', 'AVD DIAGONAL 514', 8006, 'BARCELONA', 917705442, 'A78996998', NULL, NULL),
(283, 'LACADOS GREMA SL', 'C/ GUADALQUIVIR, 3 P.I COBO CALLEJA', 28947, 'MADRID', 916421507, 'B82064569', NULL, NULL),
(284, 'DAVID MORCILLO ESPADA', 'C/ PEGASO, 46, 1?A', 28938, 'MADRID', 0, '46928598L', NULL, NULL),
(285, 'FESTO PNEUMATIC S.A', 'AVDA. DE LA GRANVIA, 159', 8908, 'BARCELONA', 932, 'A08270084', NULL, NULL),
(286, 'SISTEMAS DE LACADOS LVG SL', 'CTRA/ MADRID-TOLEDO KM 31.200', 45200, 'TOLEDO', 913, 'B45662384', NULL, NULL),
(287, 'MARCOBE MONTAJE MOBILIARIO SL', 'C/ VIRGEN DE COVADONGA, N? 22', 28607, 'MADRID', 616456166, 'B85725836', NULL, NULL),
(288, 'TALLER DE DECORACION PUBLICITARIA SL', 'POL IND MATAS NAVE M C/ PLAZA DE OL?LIVEIRA ', 80780, 'BARCELONA', 936, 'B63764054', NULL, NULL),
(289, 'BARNIZADOS Y LACADOS HUMANES S.L', 'C/ABEDUL, N? 23', 28940, 'MADRID', 916, 'B78854890', NULL, NULL),
(290, 'DESNIVEL MOBILIARIO COMERCIAL', 'POL IND LAS NACIONES C/ PARAGUAY 4', 28971, 'MADRID', 918, 'B82921180', NULL, NULL),
(291, 'DECORMEDINA SL', 'CAMINO DE HORMIGUERAS, 124 6? G', 28031, 'MADRID', 91, 'B81680720', NULL, NULL),
(292, 'SEQUOIA DESIGN SLLC', 'EXPLANADA POL IND LA EXPLANADA ', 45220, 'TOLEDO', 925, 'B85480390', NULL, NULL),
(293, 'FRANCISCO JAVIER PEREZ SANZ', 'C/ DIEGO LOPEZ, 15 - BAJO A', 45490, 'TOLEDO', 0, '50195520K', NULL, NULL),
(294, 'INSTALACIONES QUEVEDO SL', 'C/SAN MIGUEL, 1 LOCAL ', 19200, 'GUADALAJARA', 949277692, 'B19281153', NULL, NULL),
(295, 'OTEGAR SL', 'C/ DEL RIO, N? 22', 45212, 'TOLEDO', 925, 'B45616331', NULL, NULL),
(296, 'RICARDO OSUNA GONZALEZ', 'C/ MOSTOLES N? 6 LOCAL DERECHO', 28970, 'MADRID', 91, '50175932Y', NULL, NULL),
(297, 'SANGARPLAS S.L', 'C/ JULIO ANTONIO 28', 28025, 'MADRID', 914, 'B82203266', NULL, NULL),
(298, 'JUAN CARLOS BOLLO NARANJO', 'C/ VERACRUZ, 7', 28938, 'MADRID', 605, '20262813C', NULL, NULL),
(299, 'MENZZO ESPA?A SL', 'AVDA. DE MADRID 128, NAVE 2', 28500, 'MADRID', 918, 'B85566651', NULL, NULL),
(300, 'RIPLEY GESTORA DE CONTENIDOS SL', 'C/ PELAYO, N? 12 1? 1? ', 8001, 'BARCELONA', 93, 'B62014204', NULL, NULL),
(301, 'TAPIZADOS ZAFIRO S.L', 'CNO. VILLAVICIOSA N? 19 (POL IND ALPARRACHE)', 28600, 'MADRID', 91, 'B86433406', NULL, NULL),
(302, 'PORTICADA E INTERIORISMO SL', 'C/ ALFONSO GOMEZ, 17/19 1? PLANTA', 28037, 'MADRID', 949218787, 'B84487123', NULL, NULL),
(303, 'INDUSTRIAS QUIMICAS IVM SA', 'C/ EL PERELLO, 19 P. IND MASIA DEL JUEZ', 46900, 'VALENCIA', 961324111, 'A46459871', NULL, NULL),
(304, 'ALVAREZ BELTRAN ', 'P. I BUTARQUE C/ DAZA VALDES, N? 15', 28914, 'MADRID', 914811509, 'A50049519', NULL, NULL),
(305, 'JUCALBE CARPINTERIA SLL', 'C/ LAS PALMAS, 5', 28500, 'MADRID', 918, 'B84264886', NULL, NULL),
(306, 'MANEL CIVICO ', 'C/ PIZARRO 33-35 1?3?', 8291, 'BARCELONA', 0, '46646986L', NULL, NULL),
(307, 'J. PEREIRA S.L.', 'C/ BELL, 15 - POL. IND. SAN MARCOS', 28906, 'MADRID', 916815714, 'B28644946', NULL, NULL),
(308, 'INSAUSTI HERMANOS, S.L.', 'C/ TORTOLA, 17 - POL. IND. LOS GALLEGOS', 28946, 'MADRID', 916422278, 'B28000156', NULL, NULL),
(309, 'FERRETERIA CUEVAS SL', 'C/TOLEDO, N? 34', 28901, 'MADRID', 91, 'B82068388', NULL, NULL),
(310, 'LAYFER S.A', 'C/ PE?A PRIETA, 64-66', 28038, 'MADRID', 91, 'A28738813', NULL, NULL),
(311, 'NORTHGATE ESPA?A RENTING FLEXIBLE SAU', 'AVENIDA ISAAC NEWTON, 3 PARQUE EMPR CARPETANIA', 28906, 'MADRID', 913, 'A28659423', NULL, NULL),
(312, 'HUMANES DE ELECTRICIDAD SL', 'C/ ISLAS CIES, N? 4', 28970, 'MADRID', 916, 'B80930670', NULL, NULL),
(313, 'OEDIM SOLUCIONES INTEGRALES SL', 'POL. OLIVARES C/ CASTELLAR, 44', 23009, 'JAEN', 953, 'B23505282', NULL, NULL),
(314, 'EMBAMADRID S.L', 'CRTA M404 KM 21', 28971, 'MADRID', 902, 'B78952462', NULL, NULL),
(315, 'LIMPIEZAS GARAN SL', 'C/ SANTA CECILIA, 9', 45200, 'TOLEDO', 925, 'B45624681', NULL, NULL),
(316, 'OCEANTRADE SL', 'PI LA RAYA C/ MI?O 1', 28816, 'MADRID', 91, 'B78958592', NULL, NULL),
(317, 'HERBANO S.L', 'C/  ALBAICIN, 4', 28300, 'MADRID', 918, 'B86154606', NULL, NULL),
(318, 'ELECTRONICA RAFEL SLU', 'AVDA GIRONA N?6', 17800, 'GIRONA', 0, 'B17908914', NULL, NULL),
(319, 'GRUPO RAFAEL ', 'P.E URBIS- P.I RIO DE JANEIRO. C/ RAFAEL PILLADO MOURELLE 6. NAVE C-6', 28110, 'MADRID', 91, 'B80123789', NULL, NULL),
(320, 'NIVIC PLASTICOS INTERNACIONALES SL', 'C/SIERRA MOREN, N? 21', 28320, 'MADRID', 916919181, 'B85865574', NULL, NULL),
(321, 'LLEDO ILUMINACION SA', 'CTRA. MOSTOLES A VILLAVICIOSA DE ODON', 28935, 'MADRID', 926, 'A28469625', NULL, NULL),
(322, 'PINTURAS Y BRICOLAJE LA UNION', 'C/ TILO, N?4', 45200, 'TOLEDO', 925, 'B45460581', NULL, NULL),
(323, 'GREEN ELECTRONICA SL', 'C/EL ELECTRODO, N? 64', 28522, 'MADRID', 913, 'B85694248', NULL, NULL),
(324, 'CAREYES CONTRACT SL', 'C/ GABRIEL LOBO, 29', 28002, 'MADRID', 912, 'B83155697', NULL, NULL),
(325, 'ESTUDIO RED BOX SL', 'C/ JULIAN CAMARILLO  47 PORTAL B008', 28037, 'MADRID', 91, 'B84829316', NULL, NULL),
(326, 'COLECTIVIDADES RAMIRO SL', 'C/ BRAVO MURILLO, 377 5?D', 28020, 'MADRID', 91, 'B83052894', NULL, NULL),
(327, 'MILAGROS FIGUEROA RODRIGUEZ', 'PASEO DE LA CASTELLANA, N? 179 10?A-1', 28046, 'MADRID', 0, '10031542T', NULL, NULL),
(328, 'REBECA POZA TELELZ', 'C/VILLAMANTA N?1', 28051, 'MADRID', 679766261, '51983495E', NULL, NULL),
(329, 'EPOXIRON SL', 'C/ MARMOL, 5 P.I TORRECILLA GRANDE', 0, 'TOLEDO', 0, 'B86428760', NULL, NULL),
(330, 'BEZALEL 7 SL', 'AVDA AGUILA REAL 116', 45123, 'TOLEDO', 0, 'B83051425', NULL, NULL),
(331, 'MARTIN TORNAY ORTEGA', 'C/ DEL PONT 26 A', 8211, 'BARCELONA', 0, '33908218P', NULL, NULL),
(332, 'JOSE LUIS MAZA GALINDO', 'C/ TEIA 21-27 3? 1?', 8303, 'BARCELONA', 0, '38803078P', NULL, NULL),
(333, 'BHDESTILO INTERNACIONAL SL', 'C/ BELGICA, NAVE 27', 12006, 'CASTELLON', 964, 'B12412250', NULL, NULL),
(334, 'LKS CONTRACT', 'CTRA MATARO S/N    APTDO DE CORREOS 10', 8450, 'BARCELONA', 93, 'B65259384', NULL, NULL),
(335, 'CONBAR INSTALACIONES Y MONTAJES SL', 'C/ HOMERO 30-5', 28341, 'MADRID', 91, 'B85168722', NULL, NULL),
(336, 'AGENCIA MARITIMA TRANSHIPANICA SA', 'RECINTO DEL PUERTO S/N ', 11201, 'CADIZ', 2147483647, 'A81683781', NULL, NULL),
(337, 'SEUR LOGISTICA SA ', 'P.I LOS ANGELES, C/TORNEROS, 1 ', 28906, 'MADRID', 91, 'A79367876', NULL, NULL),
(338, 'CESINE METROS-2 SL', 'C/ DOCTOR ESQUERDO, 47, 1?D', 28028, 'MADRID', 915745209, 'B81277550', NULL, NULL),
(339, 'TOURLINE EXPRESS MENSAJERIA SLU', 'AVDA. GALILEO GALILEI, 11. NAVE 1', 28906, 'MADRID', 902, 'B63238455', NULL, NULL),
(340, 'A.M.P.E.R.E SYSTEM IBERICA', 'C/ SANT MARTIN DE L?? ERM, N?1', 8960, 'BARCELONA', 93, 'B59314757', NULL, NULL),
(341, 'GASOLINERAS MARUXI?A SA', 'AVDA CASTILLA LA MANCHA, N?9', 0, 'TOLEDO', 925, 'A45077682', NULL, NULL),
(342, 'SUMIN.ELECT.MARTIN FUENTES S.L', 'CTRA. DE CALVIN, 6 1A', 45510, 'TOLEDO', 925, 'B45780699', NULL, NULL),
(343, 'REPRESENTACIONES AIMAR SL', 'POL IND LAS AYALAYAS C/ DE LA ARTESANIA, NAVE 19', 45529, 'TOLEDO', 92, 'B45420767', NULL, NULL),
(344, 'INOX Y LATON DECORACION SL', 'C/ CUENCA, 21-23 P.I VALDONAIRE', 28970, 'MADRID', 916061185, 'B85604999', NULL, NULL),
(345, 'MOLDES KORIS SL', 'C/URANO N? 19', 28224, 'MADRID', 913525193, 'B85866911', NULL, NULL),
(346, 'PYTON SLU', 'C/ TEROL, N? 9 P.IND LES SALINES ', 8830, 'BARCELONA', 93, 'B08543076', NULL, NULL),
(347, 'SUMINISTROS ELECTRICOS GEPAL SLU', 'C/ LITIO, N? 12, P I. SONSOLES ', 28946, 'MADRID', 91, 'B87201307', NULL, NULL),
(348, 'SUMINISTROS INDUSTRIALES COBSA SL', 'C/ TERESA HERRERA 21 CM 4,010 KM 19', 45224, 'TOLEDO', 925, 'B8552578', NULL, NULL),
(349, 'JIHUPA S.L', 'C/TERESA HERRERA N? 21', 28946, 'MADRID', 916, 'B80658461', NULL, NULL),
(350, 'FINSA ARQUITECTURA SL', 'C/JOAN MONPEO, N? 144', 8223, 'BARCELONA', 915749643, 'B62902853', NULL, NULL),
(351, 'EURO DEPOT  ESPA?A S.A.U', 'PARQUE EMPRESARIAL LA CARPETAN', 28906, 'MADRID', 91, 'A62018064', NULL, NULL),
(352, 'ALKISAGRA INSMAFON S.L', 'C/ HORNO, 83', 45230, 'TOLEDO', 925, 'B80657216', NULL, NULL),
(353, 'FERNANDO JUANAS CERRADA', 'C.C BURGOCENTRO II, LOC 26; C.I COMUNIDAD DE MADRID N? 37', 28231, 'MADRID', 91, '07492231G', NULL, NULL),
(354, 'GV MANUTENCION SL', 'PARQUE EMPRESARIAL LAS ATALAYAS, C/ DE LOS COMERCIOS, N? 67 (AUTOVIA MADRID-TOLEDO KM 46.500)', 45529, 'TOLEDO', 0, 'B78615069', NULL, NULL),
(355, 'JOAQUIN VERDU DIAZ S.L', 'CTRA DE VILLENA KM 1 APDO 282', 30510, 'MURCIA', 968, 'B30309298', NULL, NULL),
(356, 'CAMENGO ESPA?A S.L', 'GRAN VIA CARLOS III, N? 84 3?', 8028, 'BARCELONA', 901, 'B63346845', NULL, NULL),
(357, 'JESUS FERNANDEZ MARTIN', 'C/ CIUDAD DE PARIS, 16', 28840, 'MADRID', 0, '51880827A', NULL, NULL),
(358, 'ANTONIO DIAZ E HIJOS SA', 'C/ PUERTO DE LA MORCUERA, N? 1 ', 28935, 'MADRID', 91, 'A28132959', NULL, NULL),
(359, 'DARWIN XXK S.L', 'C/ LA CARRETERA, 6 ', 8776, 'BARCELONA', 931, 'B61908380', NULL, NULL),
(360, 'MAXIART S.L', 'C/. VIZCONDE DE UZQUETA, 19', 28042, 'MADRID', 91, 'B79845343', NULL, NULL),
(361, 'FORMACION ADOCENS SLINGES IDIOMAS SL', 'C/ CON DE VILCHES, N? 21 ', 0, 'MADRID ', 91, 'B85637676', NULL, NULL),
(362, 'CREATIVE MERCHANDISING DECORATIONS GMBH', 'B?LOWSTR. 66', 10783, 'BERLIN', 49, 'DE193271210', NULL, NULL),
(363, 'OFFICE DEPOT S.L', 'ROTONDA RENE DESCARTES; PARCELA 101, NAVE 3. P.I ALCALA GARENA', 28806, 'MADRID', 902, 'B80441306', NULL, NULL),
(364, 'TALLER DE SERIGRAFIA SL', 'PUERTO DE NAVAFRIA 29 POL. IND LAS NIEVES', 28935, 'MADRID', 91, 'B78207859', NULL, NULL),
(365, 'HERGAR ILUMINACION S.C', 'C/ EMBARCACIONES 26 1? B', 28760, 'MADRID', 699, 'J86538592', NULL, NULL),
(366, 'MAIL SERVICIOS TOLEDO S.L', 'POLIGONO IND NAVE 6', 45593, 'TOLEDO', 925, 'B45294659', NULL, NULL),
(367, 'ACCIONA TRASMEDITERRANEA SA', 'CALLE ANABEL SEGURA 11 PLANTA 2? COMPLEJO ALBATROS EDIF D', 0, '', 0, 'A28018075', NULL, NULL),
(368, 'COMERCIAL ARTEPLASTICA SA', 'AVDA DE LA INDUSTRIA Numero 7  POL IND LA CANTUE?A', 28947, 'MADRID', 91, 'A28873099', NULL, NULL),
(369, 'INSTITUCION FERIAL DE MADRID', 'FERIA DE MADRID', 28042, 'MADRID', 91, 'Q2873018B', NULL, NULL),
(370, 'AMBIENTE RESPONSABLE S.L', 'C/ PEDRO BARREDA N? 16 BJ DERECHA ', 28039, 'MADRID', 0, 'B85700573', NULL, NULL),
(371, 'BIGMAT ALOTRANS S.L', 'AVDA. DE LAS NACIONES N? 17', 45200, 'TOLEDO', 925, 'B45471471', NULL, NULL),
(372, 'MROLO IBERIA S.L', 'CALLE VALLEHERMOSO, 70 B', 28015, 'MADRID', 91, 'B95639951', NULL, NULL),
(373, 'EURORECHAPADOS SL', 'CTRA CM 4004 KM 22.500', 45210, 'TOLEDO', 925, 'B45581402', NULL, NULL),
(374, 'REGISTRO MERCANTIL DE TOLEDO', 'CARRETERA DE LA PERALEDA , 1', 45004, 'TOLEDO', 0, '00785903Q', NULL, NULL),
(375, 'FATIEL SL', 'C/ MAMERTO LOPEZ N? 63', 28026, 'MADRID', 915, 'B78375383', NULL, NULL),
(376, 'LA COPA DISPLAY SL', 'PICO ALMANZOR 17-19    APDO DE CORREOS N?70', 28500, 'MADRID', 91, 'B82498569', NULL, NULL),
(377, 'OVELAR MERCHANDISING S.L', 'CALLE MARIANO BENLLIURE, N? 2', 285231, 'MADRID', 914990980, 'B85330421', NULL, NULL),
(378, 'MOBILIARIO COMERCIAL GRI?ON S.L', 'C/ VENEZUELA, N? 5', 28971, 'MADRID', 918, 'B86701398', NULL, NULL),
(379, 'TRANSFEREX S.A', 'GENERAL MOSCARDO, N? 32', 28020, 'MADRID', 91, 'A28587707', NULL, NULL),
(380, 'MOBILIARIO DISE?O FABRICACION Y SERVICIO S.L.', 'C/ MANGADA 2-A', 28950, 'MADRID', 91, 'B85806560', NULL, NULL),
(381, 'HERRAMIENTAS DE CORTE PARA MADERA SLL', 'POL IND LOS ARACILES, C/ PROGRESO, 12; APTDO CORREOS 130', 45100, 'TOLEDO', 925, 'B45455201', NULL, NULL),
(382, 'TABLEMODI SL', 'AVDA RETAMAS PARC 7 P.I MONTE BOYAL', 45950, 'TOLEDO', 91, 'B83812735', NULL, NULL),
(383, 'REALIZACIONES INTERNACIONALES EXCLUSIVAS SL', 'POL. IND PAGATZA, PARCELA 9', 20690, 'GUIPUZCOA', 943, 'B48747877', NULL, NULL),
(384, 'HERA GmbH', 'DieselstraBe 9', 0, '', 934502384, 'DE124322397', NULL, NULL),
(385, 'JAVIER AGUILERA LOPEZ', 'C/ GABRIEL MIRO, N? 37 5? D', 46701, 'VALENCIA', 646322784, '19990248M', NULL, NULL),
(386, 'DOROTEO ORTIZ ESQUER', 'AVDA COMUNIDAD VALENCIANA 41, 2', 46770, 'VALENCIA', 615, '52744950Q', NULL, NULL),
(388, 'GAS NATURAL SERVICIOS SDG S.A', 'PLAZA DEL GAS 1 ', 8003, 'BARCELONA', 902, 'A08431090', NULL, NULL),
(389, 'CLP TRADING GMBH', 'TRIFTENSTRASSE, 96', 0, '', 523269899, 'DE232600313', NULL, NULL),
(390, 'DALPACK SISTEMAS S.L', 'C/. COBRE, N? 18, NAVE 2', 28863, 'MADRID', 91, 'B85062917', NULL, NULL),
(391, 'MADERAS RAIMUNDO DIAZ S.A', 'C/FUNDIDORES, 41', 28906, 'MADRID', 916, 'A28117398', NULL, NULL),
(392, 'MANIPULACION Y RECUPERACION MAREPA S.A', 'AVDA. SAN MARTIN DE VALDEIGLESIAS, 22', 28922, 'MADRID', 91, 'A78637907', NULL, NULL),
(393, 'SERGI BELLO COLLADO', 'RAMBLA CATALANA 9, OFICINA 1', 8903, 'BARCELONA', 902, '46749239Z', NULL, NULL),
(394, 'SOULEM INSERCION S.L', 'C/ ABIZANDA, 6 - LOCAL ', 28033, 'MADRID', 913, 'B85966398', NULL, NULL),
(395, 'ALUCENTER ', 'PASSEIG DE LA RIERA N? 216', 8191, 'BARCELONA', 935, 'A61749529', NULL, NULL),
(396, 'EUROP ASSISTANCE SERVICIOS INTEGRALES DE GESTION S.A.U', 'CALLE ORENSE N? 4', 28020, 'MADRID', 915, 'A81098600', NULL, NULL),
(397, 'DEDI S.L', 'AVDA. DE LAREDO, 9 (POL.IND EL ALAMO) APTDO CORREOS 487', 28946, 'MADRID', 91, 'B28455087', NULL, NULL),
(398, 'JUAN ROLDAN S.A', 'RAMIRO II, N?5; 1? IZQ', 28003, 'MADRID', 91, 'A28970457', NULL, NULL),
(399, 'EMBALAJES NICOLAS SL', 'C/ QUIROGA, N? 10  POL.IND LA ESTACION', 45220, 'TOLEDO', 925, 'B78776176', NULL, NULL),
(400, 'SAGOTRANS SL', 'C/ CABA?EROS, N? 4 ', 45111, 'TOLEDO', 670415773, 'B79934683', NULL, NULL),
(401, 'EXCLUSIVAS DIBAR S.L', 'CTRA/ MADRID-TOLEDO KM 44.00', 45529, 'TOLEDO', 925, 'B45384096', NULL, NULL),
(402, 'HERRAMIENTAS TRES S.L', 'P.I LOS ARACILES C/PROGRESO N?12', 45100, 'TOLEDO', 925, 'B45514072', NULL, NULL),
(403, 'MORALES-SANCHEZ E HIJOS SL', 'C/ BRETON DE LOS HERREROS 25', 28003, 'MADRID', 0, 'B83292284', NULL, NULL),
(404, 'DELUX SERVICIOS INTEGRALES,S.L.', 'C/ ZURBANO, 76', 28010, 'MADRID', 0, 'B85625093', NULL, NULL),
(405, 'LOEWE,S.A.', 'GOYA, 4', 28001, 'MADRID', 0, 'A28003861', NULL, NULL),
(406, 'SUMINISTROS ELECTRICOS JARAMA,S.L.', 'TRAVESIA DE VILLA - ESTHER 1-3', 28110, 'MADRID', 91, 'B80011729', NULL, NULL),
(407, 'ADHESIVOS TECNICOS INDUSTRIALES 2000,S.L.', 'C/ ESCOCIA, 1 OFICINA B-1', 28940, 'MADRID', 916083995, 'B86495801', NULL, NULL),
(408, 'ECOLOSTRIP,S.L.', 'CATTERA ANDALUCIA KM 24 P.I.ALBRESA C/ATENAS 3', 28340, 'MADRID', 918094450, 'B82321007', NULL, NULL),
(409, 'CARLOS MANUEL SANCHEZ AGUADO', 'AVENIDA DE LA MANCHA 34', 28915, 'MADRID', 916800946, '406241S', NULL, NULL),
(410, 'TRAFIC MAT Y MAS S,.L', 'C/ DEHESA VIEJA, N? 2D NAVE 13', 28052, 'MADRID', 91, 'B86326725', NULL, NULL),
(411, 'GI GROUP SPAIN EMPRESA DE TRABAJO TEMPORAL S.L', 'C/ O?DONNELL N? 7, 1? DERECHA', 28009, 'MADRID', 925, 'B81888042', NULL, NULL),
(412, 'COSLADA LOGISTICA INTERNACIONAL S.L', 'C/ ALCARRIA N? 7 OFI 2? - 30,31 Y 32 POL.IND COSLADA', 28823, 'MADRID', 91, 'B84814698', NULL, NULL),
(413, 'SUMINISTROS INDUSTRIALES DEL TAJO S.A', 'C/ JARAMA 52. POL IND ', 45007, 'TOLEDO', 925, 'A45072717', NULL, NULL),
(414, 'CABLEMATIC DOS MIL S.L.U', 'C/ SANTANDER, 85', 8020, 'BARCELONA', 934, 'B62231261', NULL, NULL),
(415, 'INSTALACIONES COMERCIALES DECORSEVILLA S.L', 'C/ ASTRONOMIA, N? 1', 41015, 'SEVILLA', 954, 'B91188623', NULL, NULL),
(416, 'CONSTRUCTORA INMOBILIARIA GONGER SA', 'C/ HONDURAS, 3 (FRENTE PARQUE LEGANES)', 0, 'MADRID', 91, 'A28863710', NULL, NULL),
(417, 'HIGH TECH SOLUCIONES PARA ARQUITECTURA S.A', 'C/ CONDE DE EXIQUENA, 13', 28004, 'MADRID', 91, 'A78087558', NULL, NULL),
(418, 'RUBEN OREA PEREZ', 'C/ ENCINA N? 3 ', 45200, 'TOLEDO', 696, '49002060P', NULL, NULL),
(419, 'JESUS MANUEL LOPEZ SANZ ', 'C/ JUAN PADILLA 12 ', 45930, 'TOLEDO', 629, '6572675B', NULL, NULL),
(420, 'ALMAN SOCIEDAD GENERAL DE SERVICIOS S.L.U', 'AV. DE LAS AMERICAS, 6', 28823, 'MADRID', 91, 'B83709253', NULL, NULL),
(421, 'EXCLUSIVAS A?OVER S.L', 'CORONEL MONASTERIO, N? 10', 0, 'TOLEDO', 669762377, 'E45597978', NULL, NULL),
(422, 'ELECTRICIDAD BENITO,S.L', 'B? ZURBARAN -BARRI, 25 LOCALES', 48007, 'VIZCAYA', 94446162, 'B95005815', NULL, NULL),
(423, 'NOTARIOS DE PINTO CB', 'C/ EGIDO DE LA FUENTE, 9 PORTA 1, 1A', 28320, 'MADRID', 916, 'E86083979', NULL, NULL),
(424, 'INDUSTRIAS FERNANDEZ ROJAS S.A', 'C/ FELIPE ASENJO, N? 39 P.I COBO CALLEJA', 28947, 'MADRID', 91, 'A78343183', NULL, NULL),
(425, 'EDIVER ORDO?EZ COBO', 'C/ CONCEJAL FRANCISCO JOSE JIMENEZ MARTIN, 50, BAJO 1', 28047, 'MADRID', 615, 'X2825580F', NULL, NULL),
(426, 'MADERAS SANTIAGO SEVILLA S.L', 'MAR TIRRENO, 6; CTRA ANTIGUA DE BARCELONA KM 19', 28830, 'MADRID', 916, 'B80207194', NULL, NULL),
(427, 'BAGLINOX S.L', 'P.I COMARCA 1, C/ L, N? 27', 31160, 'NAVARRA', 948, 'B31475999', NULL, NULL),
(428, 'MADERAS MEDINA SL', 'CARRETERA DE CABA?AS S/N ', 45300, 'TOLEDO', 925, 'B45035854', NULL, NULL),
(429, 'MOQUETAS ASAN S.A', 'PRINCIPE DE VERGARA, 39, 3?', 28001, 'MADRID', 91, 'A28381564', NULL, NULL),
(430, 'KENDU RETAIL S.L.', 'C/IRIBAR 1 B8 Y B9', 20018, 'GUIPUZCOA', 943223822, 'B20857934', NULL, NULL),
(431, 'WORTEN ESPADA DISTRIBUCION S.L', 'AVDA. DE EUROPA 2, 2? PLANTA EDIF ALCOR', 28922, 'MADRID', 902, 'B82140633', NULL, NULL),
(432, 'SOCITETE D\'ECONOMIE MIXTE POUR LES EVENEMENTS CANNOIS S.A', 'LA CROISETTE CS 30051', 6414, 'CANNES CEDEX', 0, 'FR29383150232', NULL, NULL),
(433, 'FRANCISCO JAVIER GARCIA SANJUAN', 'C/ DEL CONDADO, 4, ', 45215, 'TOLEDO', 622, '52950387V', NULL, NULL),
(434, 'DECATHLON ESPA?A SAU', 'C/ SALVADOR DE MADARPAGA S/N', 28702, 'MADRID', 91, 'A79935607', NULL, NULL),
(435, 'MANUEL RIESGO S.A', 'AVENIDA REAL DE PINTO, 142', 28021, 'MADRID', 91, 'A28038206', NULL, NULL),
(436, 'CANTISA S.A', 'C/ PINTOR JOAQUIN SOROLLA, N? 8', 46930, 'VALENCIA', 96, 'A46269213', NULL, NULL),
(437, 'DISTIPLAS FLOORS', 'CAMINO DE PAJARES Y DEL PORCAL, N? 11', 28500, 'MADRID', 91, 'B84920735', NULL, NULL),
(438, 'ANGEL MARTIN PEINADO', 'C/ DEL REY NAVE 13, P.I LOS PERALES', 28609, 'MADRID', 91, '00277987P', NULL, NULL),
(439, 'ANTIGUEDADES EL CASTILLITO S.L', 'CTRA/ MADRID ALICANTE, KM 119.200', 45800, 'TOLEDO', 925, 'B45234788', NULL, NULL),
(440, 'GSP SECURITY PRODUCTOS UNIPERSONAL ', 'PARQUE IND RIVAS FUTURA, C/ MARIE CURIE17-19, EDIF 2, BAJO 4', 28521, 'MADRID', 91, 'PT508425026', NULL, NULL),
(441, 'EUROTARIMAS S.L', 'C/ FRANCISCO SILVEL, N? 37', 28028, 'MADRID', 91, 'B83166082', NULL, NULL),
(442, 'F. JAVIER SANCHEZ RODRIGUEZ', 'AVDA. DE LA LIBERTAD, N? 32', 23400, 'JAEN', 953, '26463965G', NULL, NULL),
(443, 'PEDRO ORTIZ ESQUER', '', 0, '', 0, '53094006R', NULL, NULL),
(444, 'TRANSCARLYMAR S.L.U', 'C/ GARZAS, N? 1  POL.IND EL CASCAJAL', 28320, 'MADRID', 91, 'B82852294', NULL, NULL),
(445, 'JUAN RODRIGUEZ CASTELLANOS', 'C/ BARTOLOME MURILLO, N? 12', 28510, 'MADRID', 91, '46833759D', NULL, NULL),
(446, 'JULIO CESAR ASENJO SANCHEZ', 'C/ BERLIN, N?9', 28938, 'MADRID', 649780585, '08936730B', NULL, NULL);
INSERT INTO `proveedors` (`id`, `nombre`, `direccion`, `cp`, `provincia`, `telefono`, `nif`, `created_at`, `updated_at`) VALUES
(447, 'EUGENIO SANCHEZ MU?OZ', 'C/ JOAQUIN RODRIGO, N? 9', 28981, 'MADRID', 0, '50826872T', NULL, NULL),
(448, 'ANGEL VALENTIN DIAZ GARCIA', 'AVDA. DE AVIACION 75 6? A', 28044, 'MADRID', 0, '03821796R', NULL, NULL),
(449, 'MARIANO FELIPE VELAZQUEZ MARTIN', 'AVD. DE LA AVIACION N? 105 5? ', 28044, 'MADRID', 0, '50440739Z', NULL, NULL),
(450, 'FRANCISCO BENGALA CHENA', 'AVDA. M? GUERRERO, 58', 0, 'MADRID', 659, '52122082B', NULL, NULL),
(451, 'TELANDCOM MOBILE SL', 'AVDA. DE LA INDUSTRIA, 6 ED A PTL', 28108, 'MADRID', 91, 'B85181873', NULL, NULL),
(452, 'CONECTROL S.A', 'C/ JORGE JUAN 57 Y 58', 28001, 'MADRID', 91, 'A78157625', NULL, NULL),
(453, 'PAVIMENTOS CASANOVA', 'C/ VARSOVIA,113 BAJOS', 8041, 'BARCELONA', 934, 'B63598643', NULL, NULL),
(454, 'AGRI- REPUESTOS S.L', 'C/ LANZANITA, N? 21', 28946, 'MADRID', 0, 'B82469834', NULL, NULL),
(455, 'CAROBALL SA', 'C/ ITALIA, 29, P.I LA ESTACION', 28971, 'MADRID', 91, 'A28968352', NULL, NULL),
(456, 'GEIMU MOBILIARIO S.L', 'C/ YESO, N? 3 P.I LA TORRECILLA GRANDE', 45220, 'TOLEDO', 925, 'B84673730', NULL, NULL),
(457, 'INDUSTRIAS METALICAS CARLON', 'C/ ESTE, 46 P.I LA SERNA', 45221, 'TOLEDO', 925, 'B45517992', NULL, NULL),
(458, 'GABRIEL CABALLERO BONET', 'C/ TULIPAN N? 1', 28912, 'MADRID', 0, '53449442H', NULL, NULL),
(459, 'CRISTALERIA ORIENTE S.L', 'C/ ROMAN ROMANO 3 BAJO', 33500, 'ASTURIAS', 985, 'B74193962', NULL, NULL),
(460, 'JESUS CAMPO RODRIGUEZ', 'C/ SORIA, N? 11', 28921, 'MADRID', 0, '8927554N', NULL, NULL),
(461, 'MANUEL RUZ PEREZ', 'C/ REINA VICTORIA, N? 23', 28982, 'MADRID', 0, '51975675E', NULL, NULL),
(462, 'TRANSPORTES PATRICIO S.L', 'C/ MAQUINISTAS, N? 5 P.I AMPLIACION MATEU CROMO', 28320, 'MADRID', 91, 'B78915287', NULL, NULL),
(463, 'FASHION FRUIT SA', 'AVDA DE LOS ROSALES 42 EDIF NOVOSUR NAVE 509', 28021, 'MADRID', 902, 'A81836413', NULL, NULL),
(464, 'EXPOSITORES Y DERIVADOS DEL ALAMBRE SL', 'PI. HOLGAR C/ HIERRO, N? 16', 28970, 'MADRID', 91, 'B82104332', NULL, NULL),
(465, 'REGISTRO MERCANTIL CENTRAL CB', 'PRINCIPE DE VERGARA 94', 28006, 'MADRID', 0, 'E87599742', NULL, NULL),
(466, 'METACRILATOS BURGOS SL', 'C/ MERINDAD DE CUESTA URRIA N? 7', 9001, 'BURGOS', 947, 'B09311457', NULL, NULL),
(467, 'MARKET GLOBAL TRADE EN ESPA?A SL.', 'C/ SIERRA DE BAZA 1-7 BAJO C', 29650, 'MALAGA', 902, 'B83044121', NULL, NULL),
(468, 'OPRO INVESTMENTS S.L', 'C/ ANTONI BARNES GULTRESA, N? 8', 17005, 'GIRONA', 93, 'B17858861', NULL, NULL),
(469, 'MIGUEL ANGEL ESPINOSA GOMEZ', 'C/ VALLE INCLAN 103 LOCAL 5', 28044, 'MADRID', 0, '50098047E', NULL, NULL),
(471, 'TRANSPORTES RAMOS 2010 SL', 'CTRA DEL NORTE, 163 BAJO (FRENTE AL CC LA BALLENA)', 35013, 'LAS PALMAS', 924, 'B76057272', NULL, NULL),
(472, 'LEASE PLAN SERVICIOS S.A', 'AVDA/ BRUSELAS, 8 PARQUE EMPRESARIAL  ARROYO DE LA VEGA', 28108, 'MADRID', 902, 'A78007473', NULL, NULL),
(473, 'JESUS MARTIN TORRALBA', 'AVDA. DOS DE MAYO, N? 19 1?B', 28912, 'MADRID', 0, '53041979T', NULL, NULL),
(474, 'PATRICIA JARAMILLO GOMEZ', 'PLAZA DE LOS RIOS, 2 - 4 IZQ', 28913, 'MADRID', 0, '51548573F', NULL, NULL),
(475, 'GLOBAL SERVICIOS GENERALES S.L', 'C/ JONCAR, 49 , LOCAL 2', 8005, 'BARCELONA', 651, 'B65344608', NULL, NULL),
(476, 'LIMPIEZAS KRONOS S.L', 'C/ ORIGUEL, 18', 46009, 'VALENCIA ', 96, 'B96594676', NULL, NULL),
(477, 'INSTALFARMA S.C', 'RONDA DE QUI?ONES, 10', 45214, 'TOLEDO', 925, 'J45723764', NULL, NULL),
(478, 'SIXT RENT A CAR S.L UNIPERSONAL', 'CARRER DEL CANAL DE SANT JORDI 29 LOC ', 7610, 'BALEARES', 0, 'B07947591', NULL, NULL),
(479, 'JAVIER FERNANDEZ MORALES', 'C/  MARIA DIAZ DE HARO N?15, 2D', 48920, 'VIZCAYA', 0, '45890310C', NULL, NULL),
(482, 'SILCA DER MOBILIARIO S.L', 'C/ CAMINO VIEJO DE GETAFE, 73', 28946, 'MADRID', 91, 'B84782846', NULL, NULL),
(483, 'MARTIN ROMERO & CASTA?O CASANOVA, C.B.', 'C/ MARQUES DE LARIOS 12 2? PLANTA', 29005, 'MALAGA', 952220008, 'E92134725', NULL, NULL),
(484, 'JESUS CEREZO SANCHEZ', 'C/ JOSEFA SALVANES, N? 4 PORTAL F, BAJO B', 28500, 'MADRID', 91, '50976092L', NULL, NULL),
(485, 'MARIA DEL CARMEN DE DIEGO AGUERO', 'C/ REAL N? 23 2?', 28981, 'MADRID', 916057865, '00829313W', NULL, NULL),
(486, 'SUSANA ADRIAN SANZ', 'C/ ALEJANDRO CASONA N? 3 6? 2', 28035, 'MADRID', 0, '27537493F', NULL, NULL),
(487, 'MANUFACTURAS LOEWE S.L.U', 'C/ GOYA, 4', 28001, 'MADRID', 91, 'B82021825', NULL, NULL),
(488, 'TECPIN S.L', 'C/SAN JUAN, N? 33. POL IND/ EL PALOMO', 28946, 'MADRID', 91, 'B78662699', NULL, NULL),
(489, 'FUNSARTE METALISTAS S.L', 'C/ Par?s, 34 Nave-45', 28813, 'MADRID', 91, 'B84063692', NULL, NULL),
(490, 'HOGARLUX S.L', 'C/ VIRGEN DE LA PAZ, n? 14', 28027, 'MADRID', 914774355, 'B78982956', NULL, NULL),
(491, 'PARQUETS FLOTANTES S.L', 'P.I CAN HUMET DE DALT ', 8213, 'BARCELONA', 93, 'B62945514', NULL, NULL),
(492, 'NEOLASER S.L', 'CAMINO PUENTE VIEJO, 10', 28500, 'MADRID', 91, 'B82623455', NULL, NULL),
(493, 'SUMINISTROS ELECTRICOS GUARDE?O S.L', 'C/ EDUARDO TORROJA, 23', 28914, 'MADRID', 914812161, 'B86636024', NULL, NULL),
(494, 'FRANCISCO JAVIER GONZALEZ SANTOS', 'C/ RAMON Y CAJAL, 11', 45224, 'TOLEDO', 91, '08032206P', NULL, NULL),
(496, 'MARIA-DOLORES RUIZ DEL VALLE GARCIA', 'C/ ARBOLEDAS, 20 BJO', 45200, 'TOLEDO', 925, '51698666W', NULL, NULL),
(497, 'JULIO JESUS FERNANDEZ VARA', 'LA FRAGUA, 1 POL IND LOS ROSALES', 28935, 'MADRID', 0, '30416658D', NULL, NULL),
(498, 'CAZANAVES ASESORES INMOBILIARIOS,S.L.', 'C/ FRANCISCO DE ROJAS 1-A', 45240, 'TOLEDO', 695569721, 'B45758109', NULL, NULL),
(499, 'EVA MARIA FERNANDEZ MEDINA', 'GOYA, 25', 28001, 'MADRID', 914351608, '5392764T', NULL, NULL),
(500, 'EUROMOF SA', 'C/ QUINTANA, N? 10', 28008, 'MADRID', 915, 'A80557366', NULL, NULL),
(501, 'AGM IBERICA S.L', 'AVDA. VALDEPARRA N? 27 NAVE 21', 28108, 'MADRID', 91, 'B85736593', NULL, NULL),
(502, 'EMBALATGES REUS S.L', 'C/ MAS DEL ABAT, PARCELAS F-126 Y F-12. POL IND ALBA', 43480, 'TARRAGONA', 902, 'B43382977', NULL, NULL),
(503, 'ABILITY DISE?O GRAFICO S.L', 'C/ GABRIEL CAMPILLO S/N', 30500, 'MURCIA', 968, 'B73192700', NULL, NULL),
(504, 'ZAJI SA', 'EDUARDO TORROJA, N? 25 POL. IND CODEIN ', 0, 'MADRID', 91, 'A28695492', NULL, NULL),
(505, 'EMBALAJES HURTADO SL', 'AVDA. CONSTITUCION, 208', 28850, 'MADRID', 916, 'B85306058', NULL, NULL),
(507, 'GRUAS CAMPAYO S.L', 'C/ ACONCAGUA, 4, POL IND LAS CASILLA', 28944, 'MADRID', 902, 'B79300950', NULL, NULL),
(508, 'SAMUEL HUERTAS DIAZ', 'C/ VENEZUELA, 2-E', 28341, 'MADRID', 672, '02300605F', NULL, NULL),
(509, 'GRUAS Y TRANSPORTES SIXTO S.A', 'AVDA DEL EURO, 20', 28054, 'MADRID', 91, 'A28828861', NULL, NULL),
(510, 'MIGUEL ANGEL REVERT PEINADO', 'C/ GETAFE, N?14', 28970, 'MADRID', 637705594, '50091315Y', NULL, NULL),
(511, 'AGORA CONTROL Y GESTION EMPRESARIAL SL', 'C/ TERRADAS, 20', 28905, 'MADRID', 91, 'B84741032', NULL, NULL),
(512, 'CANAL DE ISABEL II GESTION S.A', 'C/ SANTA GRACIA, 125', 28003, 'MADRID', 0, 'A86488087', NULL, NULL),
(513, 'ALCIP SL', 'C/ DICIEMBRE, N? 8', 28022, 'MADRID', 913295373, 'B80513328', NULL, NULL),
(514, 'JOSACA S.C ', 'C/ CORO RONDA GARCILASO, 13 5? A', 39300, 'CANTABRIA', 627437510, 'J39670062', NULL, NULL),
(515, 'REPACRUZ S.L', 'C/ SAUCE, 5', 28970, 'MADRID', 639116288, 'B87036067', NULL, NULL),
(516, 'MOISES SHOWROOM', 'AVDA. EJERCITO ESPA?OL, 52', 22300, 'HUESCA', 974, 'B22291652', NULL, NULL),
(517, 'LUMINOSOS JOCAR SL', 'C/ LA VILLORIA S/N', 24199, 'LEON', 987, 'B24029738', NULL, NULL),
(518, 'COMERCIAL FAMA SA', 'AVD/ DE LA INDUSTRIA, 76', 28970, 'MADRID', 91, 'A78618758', NULL, NULL),
(519, 'GRUPO GR MAQUINARIA Y ALQUILER', 'AVD/ DE LA INDUSTRIA, 1', 28970, 'MADRID', 91, 'B86676855', NULL, NULL),
(520, 'ACTIVIDADES Y EXPLOTACION DEL NORTE S.L', 'GENERAL ERASO, 1-3? PTA. PAB10', 48014, 'VIZCAYA', 944, 'B95536801', NULL, NULL),
(521, 'BILCO DECORACIONES DE INTERIORES S.L', 'AVDA/ ESCANDINAVIA, 98', 3130, 'ALICANTE', 966695681, 'B85899649', NULL, NULL),
(522, 'FONTAVELA PASCUAL MADRID S.L', 'C/ VILLAFUERTE, 21, LOCAL ', 28041, 'MADRID', 91, 'B82906405', NULL, NULL),
(523, 'SYSLED SL', 'POLIG. IND. LOS OLIVOS C/INICIATIVA N? 22', 28906, 'MADRID', 916424326, 'B86123056', NULL, NULL),
(524, 'CERRAJERIA SAN LORENZO,S.L.', 'CALLE DEL ESTANQUE N? 5 NAVE 19-POL- LA FONTANA', 28942, 'MADRID', 609, 'B84153642', NULL, NULL),
(525, 'EMBALAJES MOVACEN,S.L.', 'CALLE CASTA?O 1  POL IND. LOS OLIVOS ', 28950, 'MADRID', 916969450, 'B86683448', NULL, NULL),
(526, 'COMERCIAL DE INGENIERIA Y COMUNICACION INTEGRAL SL', 'C/ DEL PLASTICO N? 5 NAVE 14', 19200, 'GUADALAJARA', 949, 'B81583700', NULL, NULL),
(527, 'FERRETERIA ROBLEDILLO S.L', 'C/ SAN QUINTIN, N?39', 19004, 'GUADALAJARA', 949213783, 'B19202605', NULL, NULL),
(528, 'FERNANDO REVERT PEINADO', '', 0, '', 637705596, '50091316F', NULL, NULL),
(529, 'SAINT-GOBAIN DISTRIBUCION CONSTRUCCION SL', 'C/ FCO GASCO SANTILLAN, N? 2, 1? PLANTA', 28906, 'MADRID', 91, 'B82706136', NULL, NULL),
(531, 'M? ASCENSION JAIME MARTINEZ', 'C/ PETUNIA, NAVE 38', 28970, 'MADRID', 91, '51313962L', NULL, NULL),
(532, 'NYA NORDISKA TEXTILES GMBH', 'AN DEN RATSWESEN', 29451, 'GERMANY', 915, 'DE811924878', NULL, NULL),
(533, 'UMACRIS S.L', 'C/ MADRO?O, 18-20, P I. EL ALAMO HUMANES', 28970, 'MADRID', 916042498, 'B81160830', NULL, NULL),
(534, 'MADERAS OZCOIDI SL', 'C/ CAMINO DE LABIANO, 11', 31192, 'NAVARRA', 948232351, 'B31081961', NULL, NULL),
(535, 'D. JESUS BARRIONUEVO GARCIA', 'C/ HIJUELA N? 2', 28670, 'MADRID', 0, '46932611F', NULL, NULL),
(537, 'FULL ON', '41 AVENUE MAURICE CHEVALIER', 6150, 'CANNES LA BOCCA', 33, 'FR49481649697', NULL, NULL),
(538, 'SAMBEAT COOPERATIVA VALENCIANA', 'C/ CIUDAD DE SEVILLA, N? 46 PI FUENTE DEL JARRO', 46988, 'VALENCIA', 96, 'F-46113403', NULL, NULL),
(539, 'MYDECOR FABRICA DE MUEBLES S.L', 'C/ SIERRA DE BAZA, N? 1, PLTA 7, BAJO C', 0, 'MALAGA', 902875949, 'B92978022', NULL, NULL),
(540, 'EDIPENINSULA,S.L.', 'CALLE SANTA LEONOR N? 22 OF.5.4.', 28037, 'MADRID', 914401424, 'B85318442', NULL, NULL),
(541, 'ELECTRO MONTAJES SERVER SL', 'C/BARBERAN Y COLLAR, S/N', 28903, 'MADRID', 912284682, 'B86489762', NULL, NULL),
(542, 'ALEJANDRO ROMERO PEREZ', 'C/ MURILLO, N? 7 BJ', 28982, 'MADRID', 605, '53133787S', NULL, NULL),
(543, 'MASTERLUZ SURESTE SL', 'CTRA/ ALICANTE N332, KM 3', 30399, 'MURCIA', 968523052, 'B30631543', NULL, NULL),
(544, 'URBESA PROMOCION Y EXTERIORES S,.L', 'C/ CRONOS, N? 5', 3016, 'ALICANTE', 902, 'B53730651', NULL, NULL),
(545, 'ISOLANA LEGANES', 'C/ DAZA VALDES, N? 7', 28914, 'MADRID', 91, 'A43039288', NULL, NULL),
(546, 'SISTEMAS BAUHAUS S.L', 'C/ MARMOLISTAS, 4', 28891, 'MADRID', 91, 'B84483593', NULL, NULL),
(547, 'LORANCA COURIER S.L', 'MANGADA N? 1', 28950, 'MADRID', 91, 'B85712826', NULL, NULL),
(548, 'F. DOMARCO SA', 'CAMINO DE LA GRANJA 6, APTO DE CORREOS 59090', 28860, 'MADRID', 91, 'A79099800', NULL, NULL),
(549, 'ALVARO SALAS QUINTIN', 'C/ CONDES DE BARCELONA, 7', 28019, 'MADRID', 91, '50191179G', NULL, NULL),
(551, 'EULEN S.A', 'PE TACTICA, C/ ALGEPSER, 40-42', 26980, 'LA RIOJA', 963, 'A28517308', NULL, NULL),
(552, 'MORFUS EQUIPAMIENTO COMERCIAL SL', 'C/ POZANO, N? 42 A ENTREPLANTA ', 28003, 'MADRID', 0, 'B86596004', NULL, NULL),
(553, 'EVA MARIA SANZ DEL REAL', 'CALLE GOYA, 34', 28023, 'MADRID', 917818861, '21658365R', NULL, NULL),
(554, 'RAUL DIAZ REDONDO', '', 45600, 'TOLEDO', 0, '4183981M', NULL, NULL),
(555, 'ARMSTRONG DLW GMBH', 'STRUTTGARDER STRASSE, 75', 74321, 'BISSINGEN', 49, 'DE144958292', NULL, NULL),
(556, 'ANGEL MONCADA LOBATO', 'PI LA MORA, NAVE 15', 28950, 'MADRID', 91, '51964266K', NULL, NULL),
(557, 'CLUB DEPORTIVO ELEMENTAL TRISPORT GETAFE', 'C/ ISLAS CANARIAS, 55', 28905, 'MADRID', 0, 'G86908241', NULL, NULL),
(559, 'FEDERAL EXPRESS CORPORATION', '', 0, '', 0, 'W4002888E', NULL, NULL),
(560, 'LACTOTRADE S.L', 'P? PARQUES, 6 ', 28109, 'MADRID', 0, 'B97692883', NULL, NULL),
(561, 'QUATRO DECORACION GRAFICA SL', 'C/ ALBATROS, N? 6', 28320, 'MADRID', 918, 'B86311081', NULL, NULL),
(562, 'JAR 99,S.L.', 'CALLE MANGADA 17 POL. BARRIONUEVO', 28950, 'MADRID', 916093091, 'B82223108', NULL, NULL),
(563, 'GABARRO HERMANOS S.A', 'P.I COBO CALLEJA FLORES DEL SIL, 2 NAVE 3', 28946, 'MADRID', 916424943, 'A08445983', NULL, NULL),
(564, 'V.N. & BRITANNIC WAREHOUSES LTD', '142 SANDPITS', 0, '', 91, 'N8264364D', NULL, NULL),
(565, 'IMANES MECO, S.L. ', 'RONDA SANTA MARIA, 2', 28880, 'MADRID', 918861419, 'B85769214', NULL, NULL),
(566, 'JOSE ANTONIO LAVADO AMADO', 'C/ BRONCE, 24', 28950, 'MADRID', 91, '50060821X', NULL, NULL),
(567, 'JANSEN DISPLAY IBERIA S.L', 'C/ PELAYO, N?12', 8001, 'BARCELONA', 0, 'B65970576', NULL, NULL),
(568, 'LIMPIEZAS BERNI', 'SAN PEDRO 3 P5 2?B', 28917, 'MADRID', 91, 'B81367278', NULL, NULL),
(570, 'MANUFACTURAS RECAMAR S.L.U.', 'P I NUEVOS CALAHORROS C/ GARDENIA, 26', 28970, 'MADRID', 91, 'B82423211', NULL, NULL),
(571, 'HIDROTERMIA QUEVEDO S.L', 'C/ PONTEVEDRA, 3-2? A', 28804, 'MADRID', 0, 'B86794237', NULL, NULL),
(572, 'ACERO Y BELLON SL', 'PLAZA MUNILLA', 28032, 'MADRID', 91, 'B83523175', NULL, NULL),
(573, 'SANDRA ALVAREZ SANTOS', 'C/ ESTRELLA MIZAR N? , BLQ 2 PORTAL 4 1?A', 28983, 'MADRID', 0, '49001476E', NULL, NULL),
(574, 'JORGE AMBRONA GARCIA-RICO', 'C/ TOMAS REDONDO, 2, PLANTA 4, NAVE 6', 28033, 'MADRID', 91, '53409668X', NULL, NULL),
(576, 'MADERAS Y TABLEROS HUMANES S.L', 'C/ LOS METALES, 26', 28970, 'MADRID', 91, 'B78641032', NULL, NULL),
(577, 'KM3 SYSTEM 2000 SL', 'C/ SAN VICENTE MARTIR, N? 85 PLANTA 3 PUERTA 9', 46007, 'VALENCIA', 607360744, 'B98652464', NULL, NULL),
(578, 'LINKEDIN ', 'WILTON PLAZA, DUBLIN 2', 0, '', 0, 'IE9740425P', NULL, NULL),
(579, 'REYMANSUR SL', 'C/ PINDARO, 10, LOCALES 4 Y 5', 29010, 'MALAGA', 952308998, 'B29552247', NULL, NULL),
(580, 'RICARDO BELLIDO PENADES', 'VAZQUEZ DE MELLA 17 BAJO A IZQUIERDA', 46100, 'VALENCIA', 960, '73569166D', NULL, NULL),
(581, 'FERNANDO SIMON SANZ', 'C/ VICENTE ALEIXANDRE 62', 19208, 'GUADALAJARA', 949274226, '03088191G', NULL, NULL),
(582, 'MARMOLES Y GRANITOS 2001 SL', 'C/ PICO ALMANZOR 24, P.I LOS LINARES', 28970, 'MADRID', 916040311, 'B86167004', NULL, NULL),
(584, 'LED PLANET S.L', 'C/. AVENA, 24, NAVE 1', 28914, 'MADRID', 91, 'B85935898', NULL, NULL),
(585, 'TABLECASA S.L', 'P.I LOS LINARES, NAVE 29', 28970, 'MADRID', 916049369, 'B83498725', NULL, NULL),
(586, 'MARMOL Y GRANITO KELDO S.L', 'C/ ROCINANTE N? 7', 28970, 'MADRID', 91, 'B84456623', NULL, NULL),
(587, 'SUMINISTROS AVENCA, S.A.', 'AVDA. FUENLABRADA, 43', 28970, 'MADRID', 91604, 'A783973611', NULL, NULL),
(588, 'MUNDO P?TREO, S.L.', 'C/PLATA, NAVES 11 Y 12, P.I. PRADO CONCEJIL', 28890, 'MADRID', 91830, 'B85172351', NULL, NULL),
(589, 'PERFILES GOVI, S.L.', 'C/LIMONEROS, 7', 28500, 'MADRID', 91871, 'B78643806', NULL, NULL),
(590, 'CASTELLANA DE MARMOLES, S.L.', 'CARRETERA CABEZON,  KM.  6,5', 47155, 'VALLADOLID', 983, 'B47027545', NULL, NULL),
(591, 'NUVEL DEVELOPMENT.  S.L.', 'CL. FRESA, 1', 28700, 'MADRID', 34, 'B83352740', NULL, NULL),
(592, 'INDUSTRIA, FILTRACION Y DESARROLLO, S.L.', 'C/BEGO?A, 18, P.I. EL LOMO', 28970, 'MADRID', 91814, 'B87103107', NULL, NULL),
(594, 'CRISTAL ABEJERA, S.L.', 'C/BERRUGUETE, 5', 28946, 'MADRID', 91606, 'B82458241', NULL, NULL),
(595, 'CRISTALERIA P?REZ, S.A.', 'CTRA. YUNCOS A CEDILLO DEL CONDADO, KM. 0,800', 45210, 'TOLEDO', 92553, 'A45042454', NULL, NULL),
(596, 'APLICACIONES ZURBARAN, S.L.', 'C/LA PLATA,19 P.I. SAN MILLAN', 28950, 'MADRID', 91609, 'B45462959', NULL, NULL),
(597, 'ZONA VIVA, DECORACION Y PLV, S.L.', 'C/NOVIEMBRE, 11-17 COLONIA FIN DE SEMANA', 28022, 'MADRID', 91748, 'B82257858', NULL, NULL),
(598, 'CONSEJEROS EN DERECHO Y EMPRESA, S.L.', 'C/ VELAZQUEZ,  10  -  4?  DCHA', 28001, 'MADRID', 91, 'B25358946', NULL, NULL),
(599, 'IVAN CORBALAN PIRIS', 'AVDA. CARLOS V  42', 28936, 'MADRID', 916455934, '46850977T', NULL, NULL),
(600, 'JUAN PEREZ HEREZA (NOTARIO)', '', 0, '', 0, '33529241W', NULL, NULL),
(601, 'AXALTA COATING SYSTEMS SPAIN, S.L.', 'C/JESUS SERRA SANTAMANS N? 4 2?A', 8174, 'BARCELONA', 93, 'B65817389', NULL, NULL),
(602, 'FABRICA NACIONAL DE MONEDA Y TIMBRE - REAL CASA DE LA MONEDA', 'C/ JORGE JUAN 106', 28009, 'MADRID', 0, 'Q2826004J', NULL, NULL),
(603, 'AIR JMB S.L. UNIP', 'C/MIGUEL SERVET, 2, P.I. EL PALOMO', 28946, 'MADRID', 91606, 'B82817578', NULL, NULL),
(605, 'J.F. CONSTRUFERIAL, S.L.', 'AVDA DE LA CONSTITUCION 250 POL. IND. MONTE BOYAL', 45950, 'TOLEDO', 91, 'B45793726', NULL, NULL),
(606, 'ORGLASS, S.L.', 'PUERTO DE SAN GLORIO, N? 68-70 P.I. PRADO OVERA', 28916, 'MADRID', 91428, 'B81673592', NULL, NULL),
(607, 'EUROPICKING, S.L.', 'C/CONDE DUQUE, N? 1', 28343, 'MADRID', 91895, 'B82232026', NULL, NULL),
(608, 'APIL NEON, S.L.', 'C/ EINSTEIN N? 11  POL. IND. SUR M-50', 28914, 'MADRID', 91, 'B39269964', NULL, NULL),
(609, 'ANAVLIS ARREDO, S.A.', 'C/ VIRGEN DEL SAGRARIO 34', 28027, 'MADRID', 0, 'A82069832', NULL, NULL),
(610, 'YUDIGAR, S.L.', '', 0, '', 0, 'B50768167', NULL, NULL),
(611, 'ANGEL ARMENTEROS', 'AVDA. ROMA 80 (EUROVILLAS)', 28512, 'MADRID', 91885, '8971752G', NULL, NULL),
(612, 'ORBELASER, S.L.', 'C/ALEJANDRO GOICOECHEA, 14', 28823, 'MADRID', 91669, 'B83635808', NULL, NULL),
(613, 'ARCAMA S.L.U.', 'C/ALBATROS, 2 - LOCAL', 28025, 'MADRID', 91462, 'B28193530', NULL, NULL),
(614, 'DLR INTEGRAL DEL METAL, S.L.', 'C/ MARMOL N? 1', 45220, 'TOLEDO', 925, 'B87294385', NULL, NULL),
(615, 'CAMO EMBALAJES S.L.', 'C/ EXPLANADA N? 9  POL. IND. LA EXPLANADA', 45220, 'TOLEDO', 925, 'B81590424', NULL, NULL),
(616, 'AIMAN GZ, S.L.', 'C/ LA VENTA 2 EDIF. 7, NAVE 14 P.A.E. NEINOR-HENARES', 28880, 'MADRID', 91886, 'B81108292', NULL, NULL),
(617, 'REPARACIONES YOVY S.L.', 'CALLE AGUA 74', 45593, 'TOLEDO', 0, 'B45754389', NULL, NULL),
(618, 'INFORMATICA Y REPARACIONES CSI S.L.', 'AVDA DE LAS CIUDADES 1 LOCAL 7 Y 8', 28903, 'MADRID', 91, 'B86044641', NULL, NULL),
(619, 'LUIS HORRILLO GRANADO', 'C/MARIANO USERA, N? 5', 28026, 'MADRID', 91475, '50935103Q', NULL, NULL),
(620, 'CERRATO', 'C/ FRESADORES 62', 28939, 'MADRID', 91, 'B84929975', NULL, NULL),
(621, 'TACON DECOR, S.L.', 'CTRA MADRID - IRUN, KM. 243.5', 9007, 'BURGOS', 947475, 'B64338692', NULL, NULL),
(622, 'BRICOLAJE BRICOMAN S.L.U', 'P.C. PLAZA NUEVA CTRA. M-425 KM. 2200', 28918, 'MADRID', 91481, 'B84406289', NULL, NULL),
(623, 'ESMELUX ESTANTERIA RAPIDA, S.L.', 'C/PUERTO DE NAVACERRADA, N? 2', 28935, 'MADRID', 902321, 'B82557125', NULL, NULL),
(624, 'DLW FLOORING GMBH', 'STUTTGARTER STRASSE 75', 74321, 'BISSINGEN', 902430, 'DE815564712', NULL, NULL),
(625, 'ACTILUM RGB, S.L.', 'C/RAMON VI?AS, 50', 8930, 'BARCELONA', 935334, 'B65372666', NULL, NULL),
(626, 'PINCOLOR, S.L.', 'C/BENJAMIN FRANKLIN, 13 P.I. COGULLADA', 50014, 'ZARAGOZA', 97647, 'B50029545', NULL, NULL),
(627, 'K2DECORA S.C.P.', 'AVDA. ROCALLISA, 36, BAJO', 8729, 'BARCELONA', 61077, 'J66341827', NULL, NULL),
(628, 'MONTAJES ALVIC, S.L.', 'C/CAPITAN TRUENO, 15', 28521, 'MADRID', 91305, 'B85170512', NULL, NULL),
(629, 'ALVARO GARRIDO QUINTERO', 'C/TORREMOLINOS, 40', 28939, 'MADRID', 0, '47465167K', NULL, NULL),
(630, 'ELIAS Y PEREZ DE CAMINO C.B.', 'PZ DE LOS HOYOS 1', 28901, 'MADRID', 91, 'E85259026', NULL, NULL),
(631, 'INGENICO IBERIA S.L.', 'AVDA DEL PARTENON 16-18', 28042, 'MADRID', 902, 'B82241506', NULL, NULL),
(632, 'FLETCO CARPETS A/S', 'MADS CLAUSENS VEJ 2', 7441, '', 0, 'DK27350658', NULL, NULL),
(633, 'HERNANDEZ RIVERA S.L.', 'LUIS SAUQUILLO 85', 28940, 'MADRID', 91, 'B80492168', NULL, NULL),
(634, 'DON CLIMA S.L.', 'C/ ATENAS 5 NAVE C  POL. CIUDAD DE PARLA', 28980, 'MADRID', 91, 'B79555108', NULL, NULL),
(635, 'LIMPIEZAS IDEAL S.L.', 'PLAZA DE LOS COMUNEROS 6 Y 7', 28820, 'MADRID', 91, 'B81994071', NULL, NULL),
(636, 'PERMAY MAQUINARIA PARA LA MADERA S.L.', 'C/AMERICO VESPUCIO, 3 - 4?D', 45500, 'TOLEDO', 92577, 'B45832359', NULL, NULL),
(637, 'CARPINTERIA HORRILLO - IGNACIO C.B.', 'MARIANO USERA, 5', 28026, 'MADRID', 91475, 'E87425286', NULL, NULL),
(638, 'COLEGIO OFICIAL DE DECORADORES DISE?ADORES DE INTERIOR DE MADRID', 'P? DE LA CASTELLANA N? 168 BAJO', 28046, 'MADRID', 91, 'V81400269', NULL, NULL),
(639, 'GONZALO DAMIAN MARTINEZ', 'C/ MARRUECOS 1', 8018, 'BARCELONA', 0, 'X8905179Q', NULL, NULL),
(640, 'PROFILPAS ESPA?A SLU', 'CTRA VILA-REAL ONDA KM. 1.5', 12540, 'CASTELLON', 964, 'B12559787', NULL, NULL),
(641, 'MORLO E HIJOS, S.L.', 'TRAVESIA DE ALCALA DE HENARES 4 A', 28510, 'MADRID', 91, 'B87419537', NULL, NULL),
(642, 'MASVENTOSAS S.L.', 'AVDA. REINA SOFIA N? 28 P.4 BJ. A', 28919, 'MADRID', 0, 'B87392155', NULL, NULL),
(643, 'TECMIN 2011, S.L.', 'C/FINLANDIA, 6, P.I. LA ESTACION', 28971, 'MADRID', 91810, 'B45766888', NULL, NULL),
(644, 'COMERCIAL FERODAES, S.L.', 'C/CASTILLO DE AREVALO, 8, LOCAL C', 28037, 'MADRID', 91140, 'B86440591', NULL, NULL),
(645, 'MERCEDES-BENZ RETAIL , S.A.U.', 'C/ ALCALA 728', 28022, 'MADRID', 900, 'A01003227', NULL, NULL),
(646, 'PINTURAS PEREIRA, S.L.', 'C/ BELL, 15 - POL. IND. SAN MARCOS', 28906, 'MADRID', 916815714, 'B87178067', NULL, NULL),
(647, 'COADPA DISTRIBUCION Y COMERCIALIZACION, S.L.', 'C/COBRE, 1, C/V AVDA. METALES, 6', 28914, 'MADRID', 61644, 'B86858339', NULL, NULL),
(649, 'COMERCIAL DE INDUSTRIA Y REPRESENTACIONES, S.A.', 'C/. MURCIA, 4-5-6', 28045, 'MADRID', 914680131, 'A28112555', NULL, NULL),
(650, 'INTERNET CONSTRUDATA21 SA', 'LOPEZ DE NEIRA 3', 36202, 'PONTEVEDRA', 986, 'A36878205', NULL, NULL),
(651, 'JUAN MIGUEL ZARAGOZA PUIG', 'C/ CERRO DEL CASTA?AR 187 PB D', 28034, 'MADRID', 647, '18953482X', NULL, NULL),
(652, 'FSB DECORACION C.B.', 'C/ MARIA JOSEFA 7  4? B', 33209, 'ASTURIAS', 985, 'E33986373', NULL, NULL),
(653, 'SEUR LOGISTICA S.A.U.', 'C/ GAMONAL N? 6', 28031, 'MADRID', 91, 'A82301474', NULL, NULL),
(654, 'SUFEIN, S.L.', 'C/. ANTONIO LOPEZ, N? 142', 28026, 'MADRID', 91, 'B79293403', NULL, NULL),
(655, 'DETECCION ROBO INCENDIO Y SEGURIDAD S.L.U.', 'POL. IND. EL ACUADECTO 62', 40006, 'SEGOVIA', 902, 'B40193930', NULL, NULL),
(656, 'MOLDURAS CRISTOBAL, S.A.', 'C/. DEL ESPINO, N? 3. P.I. MALATONES', 28110, 'MADRID', 91, 'A79241543', NULL, NULL),
(657, 'LACADOS SIERRA, S.L.', 'C/ MONFRAG?E N? 18', 28970, 'MADRID', 91, 'B86634623', NULL, NULL),
(658, 'MARIA TERESA MU?OZ SEVILLA', 'POL. IND. LA MORA NAVE 15', 28950, 'MADRID', 91, '03412073T', NULL, NULL),
(659, 'SOLRED S.A', 'MENDEZ ALVARO 44', 28045, 'MADRID', 902, 'A79707345', NULL, NULL),
(660, 'TOLDOS ALBERCHE S.L.', 'C/ NAVAYUNCOSA 19', 28620, 'MADRID', 0, 'B84055425', NULL, NULL),
(661, 'TIBERMOTOR SUR S.L.', 'CTRA. A42 KM 14,400 ', 28905, 'MADRID', 91, 'B84681733', NULL, NULL),
(662, 'GLOBAL ALAYBE, S.L.', 'C/. DOLORES IBARRURI, 38', 19200, 'GUADALAJARA', 0, 'B19285980', NULL, NULL),
(663, 'LED EXPERT S.L.', 'C/ RAMON VI?AS 50', 8930, 'BARCELONA', 93, 'B66152000', NULL, NULL),
(664, 'CARPINTERIA MONCAR S.L.', 'CAMINO ERIETE PARCELA 14 NAVE 6', 31190, 'NAVARRA', 948, 'B31559685', NULL, NULL),
(665, 'MANUEL JOAO PINTO', 'C/ LAPURBIDE N? 3  2? D ESCALERA IZDA', 31013, 'NAVARRA', 0, '73493718R', NULL, NULL),
(666, 'SONAE ARAUCO - SOLUCIONES EN MADERA SL', 'RONDA DE PONIENTE 6B', 28760, 'MADRID', 0, 'B81599052', NULL, NULL),
(667, 'ANTONIO BAIXAULI, S.L.', 'C/Castell�_n n�� 25 \r\r', 46910, 'VALENICA', 961431007, 'B97483762\r\r', NULL, NULL),
(668, 'ANGEL LUIS ROMO LOPEZ', 'TRAVESIA DE NAVARRETE 18', 45530, 'TOLEDO', 677, '50196098R', NULL, NULL),
(669, 'AKI BRICOLAJE ESPA?A, S.A.U.', 'CTRA. NACIONAL 150, KM. 6,7. EDIF. CRISTAL. PLANTA 5?.', 8210, 'BARCELONA', 914952050, 'B83985713', NULL, NULL),
(670, 'ANGEL MORO GOMEZ', 'C/ HUNGRIA N? 5 B', 28341, 'MADRID', 618, '03821425K', NULL, NULL),
(671, 'TORNEADOS YUSTAS, C.B.', 'C7. LOMINCHAR, N? 9', 45214, 'TOLEDO', 925, 'E45457900', NULL, NULL),
(672, 'INDUSTRIAS DEL MUEBLE ASORAL S.A.', 'CNO. PUENTE VIEJO 13', 28500, 'MADRID', 91, 'A28414548', NULL, NULL),
(673, 'JESAMETAL 2002, S.L.U.', 'C/. ABEDUL, N? 19', 28500, 'MADRID', 91, '46857088Q', NULL, NULL),
(674, 'INCOYPRE, S.L.', 'P.I. PILAR DE LA DEHESA. C/. GALICIA, N? 1', 14900, 'CORDOBA', 925, 'B14721617', NULL, NULL),
(675, 'QUIMICA INDUSTRIAL MEDITERRANEA, S.L.U.', 'C/. ROSA DE LOS VIENTOS, N? 75', 29006, 'MALAGA', 952, 'B29225687', NULL, NULL),
(676, 'CREATION BAUMANN, S.L.', 'C/. CANILLAS, 2, BAJO', 28002, 'MADRID', 91, 'B28815736', NULL, NULL),
(677, 'BANCO DE SABADELL S.A.', '', 0, '', 0, 'A08000143', NULL, NULL),
(678, 'INDUSTRIAS REHAU, S.A.', 'P.I. CAMI RAL. C/ MIGUEL SERVET, N? 25', 8850, 'BARCELONA', 93, 'A58189473', NULL, NULL),
(679, 'AUTO RECAMBIOS FORNILLOS S.L.', 'C/. VALLE DE TOBALINA, 42, NAVE 10', 28021, 'MADRID', 91, 'B82553561', NULL, NULL),
(680, 'MIGUEL ENRIQUE ESTELLA GARBAYO', 'C/ ESTANISLAO ZAZO 37', 28970, 'MADRID', 91, '15792069Q', NULL, NULL),
(681, 'TECNICAS COMERCIALES RUBIALES, S.L.U.', 'C/. CERVANTES, 7', 6172, 'BADAJOZ', 924, 'B06468433', NULL, NULL),
(682, 'COSENTINO, S.A.', 'CTRA. BAZA HUERCAL - OVERA, KM 59', 4850, 'ALMERIA', 91, 'A04117297', NULL, NULL),
(683, 'ROTULOS FRESANZ, S.L.L.', 'C/. MILANOS, 6 - NAVE 18-19. P.I. LA ESTACION', 28320, 'MADRID', 91, 'B84009919', NULL, NULL),
(684, 'B11 WORLD CLASS EXHIBITS SL', 'C/ PLATINO 4', 28770, 'MADRID', 91, 'B87466272', NULL, NULL),
(685, 'DISE?O, DECORACION Y MONTAJES C.B.', 'AVDA. NTRA. SRA. VALVANERA 104   1? A   ESC. DCHA', 28025, 'MADRID', 606, 'E84140482', NULL, NULL),
(687, 'SOCIEDAD MIROBRIGA DE PINTURAS, S.L.', 'CALLE CARPINTEROS N? 6', 28906, 'MADRID', 91, 'B81370173', NULL, NULL),
(688, 'AGUALIFE-AGUAPURA S.L.U.', 'PLAZA MANUEL DE FALLA 6  3 A ', 24402, 'LEON', 902, 'B24602161', NULL, NULL),
(689, 'DAVID ESCUDERO MANI', 'AVDA. FRANKFURT N? 12', 28514, 'MADRID', 657, '52118091E', NULL, NULL),
(690, 'CONTRAMEDIDAS SEGURIDAD E INVESTIGACION S.L.', 'C/ HUNGRIA N? 5 B', 28341, 'MADRID', 618, 'B87602454', NULL, NULL),
(691, 'HNOS. ALAMILLO, S.L.', 'C/ LA IGLESIA N? 16 LOCAL 2', 28891, 'MADRID', 91, 'B87427464', NULL, NULL),
(692, 'WORK OUT EVENTS S.L.', 'C/ SANTA CRUZ DE MARCENADO 4 LOCAL 2', 28015, 'MADRID', 91, 'B84108513', NULL, NULL),
(693, 'CARLOS GARCIA OJEDA', 'CAMI DE LA FITA N? 44', 8870, 'BARCELONA', 610, '52428152C', NULL, NULL),
(694, 'ALADINOS CARGO, S.L.', 'AVDA. DE LA INDUSTRIA, 50', 28823, 'MADRID', 91, 'B83631317', NULL, NULL),
(695, 'ABCDISPLAY S.L.', 'C/ ALMERIA 21 POL. IND. VALDONAIRE', 28950, 'MADRID', 91, 'B84335397', NULL, NULL),
(696, 'JOSE CARLOS HERRERO AREVALO', 'CALLE MOLINO VIEJO 14 BL. V  4? B', 28032, 'MADRID', 609, '53046405X', NULL, NULL),
(697, 'ELAIV EVENTS S.L.', 'C/ LUIS DE HOYOS SAINZ 162, 13 D', 28030, 'MADRID', 671, 'B87551271', NULL, NULL),
(698, 'SISTEMAS Y COMPLEMENTOS DE HERRAJES, S.L.', 'AVENIDA DE LAS NACIONES, 31. AUTOVIA MADRID-TOLEDO A42 KM. 32,500', 45200, 'TOLEDO', 925, 'B45342334', NULL, NULL),
(700, 'IMPREROTUL 2013, S.L.', 'POLIGONO DE MARRATXI. C/. TEIXIDORS, 26-D', 7141, 'BALEARES', 971, 'B57887150', NULL, NULL),
(701, 'BOTIDECOR S.L.', 'RONDA DE QUI?ONES 10', 45214, 'TOLEDO', 606, 'B45852001', NULL, NULL),
(702, 'E.R.A. RIOJA S.L.', 'C/ SERVILLAS 3 BAJO', 26006, 'LA RIOJA', 699, 'B26295899', NULL, NULL),
(703, 'JOSE LUIS PEREZ BALLESTER', 'C/. CARLOS CORTINA 21 B.', 46025, 'VALENCIA', 0, '33459795Q', NULL, NULL),
(704, 'PERITACIONES CASTA?EDA CB', 'C/ ARQUITECTO TIODA 4 BAJO G', 33012, 'ASTURIAS', 0, 'E74350976', NULL, NULL),
(705, 'ARTESANIA PATRY, S.L.', 'CTRA. SALAMANCA S/N', 37338, 'SALAMANCA', 923, 'B37311149', NULL, NULL),
(706, 'INNOVACION SANTANDER, S.L.', 'C/. FRANCISCO DE QUEVEDO, 13', 39001, 'CANTABRIA', 942, 'B39659560', NULL, NULL),
(707, 'BOOMERANG TRANSPORTE URGENTE, S.L.', 'CALLE SANTA JULIANA, N? 16 - LOCAL', 28039, 'MADRID', 91, 'B78756582', NULL, NULL),
(708, 'MOBILIARIO COMERCIAL MANIQUIES RUIZ, S.L.', 'C/. PABLO SARASATE, N? 2 P2 2?A', 28320, 'MADRID', 91, 'B86809647', NULL, NULL),
(709, 'CNM REFERENCIAS DE NEGOCIOS S.L.', 'C/ BARBADILLO N? 4 PLANTA 1 OFICINA 7', 28042, 'MADRID', 91, 'B86401569', NULL, NULL),
(710, 'VIFERCA INSTALACIONES ELECTRICAS S.L.', 'AVDA LOS ANDES 21 BAJO', 24400, 'LEON', 987, 'B24377848', NULL, NULL),
(711, 'DOFER INGENIERIA S.C.P.', 'PASAJE DE TETUAN N? 11  2?', 35212, 'GRAN CANARIA', 0, 'J35952373', NULL, NULL),
(712, 'HMY YUDIGAR EQUIPAMIENTO SLU', 'POLIGONO INDUSTRIAL LA VEGUILLA S/N', 50400, 'ZARAGOZA', 976793050, 'B96106794', NULL, NULL),
(713, 'CARLOS  MOLLA BENDITO', 'CAMINO DE MANZANARES 42  29', 28240, 'MADRID', 91, '51465132X', NULL, NULL),
(714, 'CRG PLANAVAR, S.L.', 'P. I.. LA ERMITA. AVDA DE LA INDUSTRIA 34-36-38', 45215, 'TOLEDO', 925, 'B45769999', NULL, NULL),
(715, 'TODEVI-FIL, S.L.', 'POL. IND. RIERA DE CALDES, C/ MIGDIA, 3', 8184, 'BARCELONA', 93, 'B63343198', NULL, NULL),
(716, 'SOLUCIONES MODULARES DE ALMACENAJE, S.L.', 'C/ LOS GONZALEZ, 89, PTA 12', 38611, 'SANTA CRUZ DE TENERIFE', 922, 'B76560226', NULL, NULL),
(717, 'DIDASKO TRAINING S.L.', 'C/ RAMON GOMEZ DE LA SERNA 17  1? A', 28035, 'MADRID', 91, 'B87250437', NULL, NULL),
(718, 'KICK OFF EVENTS S.L.', 'C/ SANTA CRUZ DE MARCENADO 4, LOCAL 2', 28015, 'MADRID', 913952599, 'B85518926', NULL, NULL),
(719, 'FERCON ALQUILER DE MAQUINARIA', 'PL EUR?POLIS, C/ BERNA 16-B', 28232, 'MADRID', 91, 'B86472883', NULL, NULL),
(720, 'NUEVA IMPRENTA S.L.', 'C/ LA GRANJA 45', 28108, 'MADRID', 91, 'B78545480', NULL, NULL),
(721, 'FRANQUICIAS GACELA S.L.', 'C/ BENITO BLANCO RAJOY N? 7, PLANTA 1', 15006, 'A CORU?A', 981904949, 'B70394408', NULL, NULL),
(722, 'AUTOS DE ALQUILER OCA?A S.L.U.', 'C/ GORRION N? 10; P.I. LOS GALLEGOS', 28946, 'MADRID', 91, 'B28887255', NULL, NULL),
(723, 'NEUMATICOS CETA S.L.', 'CRTA. TOLEDO KM 5,900', 28054, 'MADRID', 91, 'B80957467', NULL, NULL),
(725, 'EBENISTERIA LIGNA SL', 'CRTA. DE LES FORQUES 2-B, NAU D-E', 17740, 'GIRONA', 0, 'B55154009', NULL, NULL),
(726, 'SYC PIEDRA NATURAL S.L.', 'CALLE VADILLO, 9 - 1? IZDA', 28670, 'MADRID', 91, 'B87425625', NULL, NULL),
(727, 'JAVIER SASTRE CARRERA', 'CALLE FERRAZ 9', 28008, 'MADRID', 91, '50182195J', NULL, NULL),
(728, 'PILAR LLORENTE S.L.', 'MENDEZ ALVARO, 15', 28045, 'MADRID', 91, 'B86554888', NULL, NULL),
(729, 'LA GAVIOTA S.L', 'CARRETERA FUENLABRADA A GRI??N KM 6,7000', 28791, 'MADRID', 91, 'B28188100', NULL, NULL),
(730, 'EXPOSITUM PLV', 'C/ CHILE 18. POL?GONO INDUSTRIAL GO?I', 28971, 'MADRID', 91, 'B86114675', NULL, NULL),
(731, 'KLA-FERR 27 S.L.', 'POL. LA ESTACI?N, CALLE FRANCIA, 31', 28971, 'MADRID', 91, 'B81234882', NULL, NULL),
(732, 'BRADY IDENTIFICACI?N S.L.', 'C/ DIPUTACI?N, 260, 2? PLANTA', 8007, 'BARCELONA', 900, 'B59123844', NULL, NULL),
(733, 'MORARTE LOGISTICS S.L.', 'C/ MEXICO 4  POL. IND. LA SERRETA APDO. 86', 30500, 'MURCIA', 968, 'B73600595', NULL, NULL),
(734, 'CARBEPANA S.L.', 'C/ LAS MARISMAS N? 59 LOCAL 2', 28038, 'MADRID', 91, 'B87740999', NULL, NULL),
(735, 'AMBIENTE DIRECT GMBH', 'ZIELSTATTSTR 32', 81379, '', 0, 'N2760203F', NULL, NULL),
(736, 'ADAPTA COLOR S.L.', 'Ctra. Nacional 340, km. 1041.1 ', 12598, 'CASTELLON', 964, 'B12410411', NULL, NULL),
(737, 'ZAIDA ARCAYA JIMENEZ', 'C/ SAGASTA N? 8', 28004, 'MADRID', 0, '50226207A', NULL, NULL),
(738, 'EDIVER ORDO?EZ COBO', 'P. I. LOS LLANOS, C/ LANZAROTE, 9', 28970, 'MADRID', 91, '51750064H', NULL, NULL),
(739, 'EVONIK INDUSTRIES', 'KIRSCHENALLEE', 0, '', 0, 'DE815528462', NULL, NULL),
(740, 'SERICUM S.A.', 'C/ EBRO, 33', 28840, 'MADRID', 916713502, 'A28229177', NULL, NULL),
(741, 'LIFTISA S.L.', 'P.I. SAN MARCOS, C/ MERCALLI, 1 (ESQ CON C/ DIESEL)', 28906, 'MADRID', 91, 'B65629495', NULL, NULL),
(742, 'DEPAU SISTEMAS S.L.', 'AVDA DEL CARBONO 46    POL. IND. LOS CAMACHOS', 30369, 'MURCIA', 968, 'B30701924', NULL, NULL),
(743, 'SERVILATON', 'SANTO DOMINGO, 5', 5001, 'AVILA', 916903216, 'A05128798', NULL, NULL),
(744, 'FELUFE S.L.', 'P. I. COBO CALLEJA, C/ MATARROSA, 3', 28940, 'MADRID', 91, 'B81589657', NULL, NULL),
(745, 'TABLEROS MART?NEZ MESALLES S.L.', 'POL. IND. RAFALET, AVDA AL QUERIA DE CANET, 12', 46723, 'VALENCIA', 962873112, 'B46236428', NULL, NULL),
(746, 'CROMADOS BLAZQUEZ CHECA, S.L.', 'POL. IND. LOS CALAHORROS, C/ PETUNIA, 29-31', 28970, 'MADRID', 91, 'B78428638', NULL, NULL),
(747, 'JULMO SA', 'Calle de Felipe Asenjo, 16', 28947, 'MADRID', 91, 'A28379170', NULL, NULL),
(748, 'HIPER ALUMINIO S.A.', 'C?RSEGA, 561', 8025, 'BARCELONA', 93, 'A58087818', NULL, NULL),
(749, 'IBERELECTRICA COMERCIALIZADORA S.L.', 'C/ JOSE VAZQUEZ CARMONA 1 LOCAL', 41620, 'SEVILLA', 955, 'B90037243', NULL, NULL),
(750, 'UNIVERSAL MOBILIARIO S.L.', 'AVDA CONSTITUCION 113 - POLIGONO INDUSTRIAL MONTE ROYAL', 45950, 'TOLEDO', 91, 'B81723082', NULL, NULL),
(751, 'MOLDURAS JOFRA S.A.', 'C/ CERRAJEROS N? 23-24, P.I. LA ERMITA', 45215, 'TOLEDO', 925, 'A78306552', NULL, NULL),
(754, 'EXPOLAM FACTORY S.L.', 'PASAJE DEL BRONCE, 6', 28500, 'MADRID', 91, 'B85050284', NULL, NULL),
(755, 'MIGUEL A. ORTEGA SANCHEZ', 'C/ SUR, 8', 28971, 'MADRID', 0, '11794030K', NULL, NULL),
(756, 'QUALITY MACHINES PROFILE S.L.', 'CTRA B 140 KM 4,3  POLIG. CAN VINYALS', 8130, 'BARCELONA', 93, 'B60175940', NULL, NULL),
(757, 'MANUFACTURAS CHAC?N S?NCHEZ S.L.', 'CTRA TORRALBA N? 1', 13179, 'CIUDAD REAL', 926, 'B13386933', NULL, NULL),
(758, 'NINJATRUCK S.L.', 'PR?NCIPE DE VERGARA, 128', 28002, 'MADRID', 91, 'B98732290', NULL, NULL),
(759, 'INTPLUS S.L.', 'C/ CIAURRIZ 142, PLANTA 1, LOCAL B', 41927, 'SEVILLA', 954, 'B41426073', NULL, NULL),
(760, 'LABORATORIOS RAYT, S.A. ', 'POL. IND. LOS ANGELES, C/ TORNEROS, 36 ', 28906, 'MADRID', 916821611, 'A60106382 ', NULL, NULL),
(761, 'MARMOLES GREGORIO VELAZQUEZ, S.L.', 'C/ CARDENAL CISNEROS, 94', 13260, 'CIUDAD REAL', 0, 'B13500541', NULL, NULL),
(762, 'FERRETERIA MENGUAL S.L.', 'CARRER RON?ANA, 12', 8400, 'BARCELONA', 93, 'B59938811', NULL, NULL),
(763, 'PULCRO HIGIENE PROFESIONAL IB?RICA, SLU', 'PASEO CLUB DEPORTIVO 1, EDIF 15A, PARQUE EMPRESARIAL ?La Finca?', 28223, 'MADRID', 902, 'B86474699', NULL, NULL),
(764, 'FORMICA S.A.', 'C/ RIU VERD, 8', 46470, 'VALENCIA', 91, 'A48032890', NULL, NULL),
(765, 'COCINAS Y COMPLEMENTOS DEL SUR, S.L.', 'CTRA ANDALUC?A KM 35.500', 45224, 'TOLEDO', 91, 'B45337714', NULL, NULL),
(766, 'BRICOLAJE BRICOTODO S.A.', 'C/ FRANCISCO SILVELA 25', 28028, 'MADRID', 91, 'A79828372', NULL, NULL),
(767, 'UNIEMBALAJE FD S.A.', 'POL. IND. CODEIN, C? VIEJO DE GETAFE, 33', 28946, 'MADRID', 91, 'A82115239', NULL, NULL),
(768, 'FRANCISCO RODRIGUEZ BOIX', 'C/ PARQUE BUJARUELO 23', 28924, 'MADRID', 91, '45264372G', NULL, NULL),
(769, 'SABADELL REAL ESTATE DEVELOPMENT S.L.', 'P.I.A.E. CAN SANT JOAN-SENA 12', 8174, 'BARCELONA', 902, 'B33300518', NULL, NULL),
(770, 'TOYPE MONTAJES S.L.U.', 'C/ POZO, 10', 28690, 'MADRID', 0, 'B85080935', NULL, NULL),
(771, 'BETA LOG?STICA DE CANTOS, S.L.', 'POL. IND. LA CLOTA, C/ JOSEP ROS Y ROS, 46 NAVE 7', 8740, 'BARCELONA', 93, 'B63598437', NULL, NULL),
(772, 'TECNICAS PARA MADERA Y DERIVADOS, S.A.', 'C/ ALEMANIA, 11', 28971, 'MADRID', 91, 'A45066156', NULL, NULL),
(773, 'MASYFER SLU', 'PUERTO SANGLORIO N? 1', 28919, 'MADRID', 91, 'B86816055', NULL, NULL),
(774, 'MARGRALUX ELECTRICIDAD, S.L.', 'CALLA ZARZA, 22', 19174, 'GUADALAJARA', 0, 'B19309749', NULL, NULL),
(775, 'CAREVA C.B.', 'PLAZA ALBENIZ, PORTAL 4-5? B', 24402, 'LEON', 0, 'E24544447', NULL, NULL),
(776, 'ALFONSO CARLOS FERNANDEZ ALVAREZ', 'C/ EMILIANO BARRAL, 4-A, 4? A', 28043, 'MADRID', 0, '51354462Q', NULL, NULL),
(777, 'PERSI CASTRO S.L.', 'C/ JUNO, 13', 28340, 'MADRID', 671, 'B84994839', NULL, NULL),
(778, 'RANDSTAD EMPLEO EMPRESA DE TRABAJO TEMPORAL S.A.', 'VIA DE LOS POBLADOS 9  4? PLTA.', 28033, 'MADRID', 0, 'A80652928', NULL, NULL),
(779, 'RAFAEL RUIZ MEDINA', 'C/ FRANCISCO PIZARRO, 17', 28500, 'MADRID', 91, '51913426B', NULL, NULL),
(780, 'RECHAPADOS DEL NORTE S.A.', 'POL. IND. GIJANO DE MENA', 9585, 'BURGOS', 947, 'A09106824', NULL, NULL),
(781, 'FS TRADE', 'BIRKENSTR 54 B', 85757, '', 8131, 'DE298361339', NULL, NULL),
(782, 'MOQUETAS EUSEBIO GIL S.L.', 'C/ NICOLAS USERA 124', 28026, 'MADRID', 91, 'B80759301', NULL, NULL),
(783, 'AF STEELCASE SA', 'ANTONIO LOPEZ, 243', 28041, 'MADRID', 91, 'A78939576', NULL, NULL),
(784, 'CASABONA MARMOLES Y GRANITOS S.L.', 'POL. IND. LA CORONA FASE III NAVE 2-4', 50740, 'ZARAGOZA', 0, 'B50752849', NULL, NULL),
(785, 'CRISTALER?AS MARIANO PEREANT?N, S.A.', 'CALLE CHILE, 30 - POL?GONO INDUSTRIAL AZQUE', 28806, 'MADRID', 91, 'A28171783', NULL, NULL),
(786, 'CARPINTERIA EBANISTERIA JESUS MORA S.L.', 'C/ALZIMAR,5', 25123, 'LLEIDA', 973750125, 'B25811829', NULL, NULL),
(787, 'A6 GESTION HOSTELERA S.L.', 'C/ MARQUES DE URQUIJO 23', 28008, 'MADRID', 91, 'B86564713', NULL, NULL),
(788, 'NUVELINGENIA S.L.', 'AVDA. CERRO DEL AGUILA, 2', 28703, 'MADRID', 91, 'B87858825', NULL, NULL),
(789, 'DAVID GOMEZ CONDE', 'C/ FORMENTERA, 3 BAJO 2', 28970, 'MADRID', 0, '9456766V', NULL, NULL),
(790, 'FERRETERIA IRISARRI S.L.', 'C/ CASTRO DE ORO, 1', 28019, 'MADRID', 91, 'B81610032', NULL, NULL),
(791, 'TRANSPORTES MATAS 2016 S.L.', 'C/ DE MANAGUA N? 12', 28945, 'MADRID', 671, 'B87739322', NULL, NULL),
(792, 'GONZALO PINTO ROJANO', 'TRAVESIA DE LA CIUDAD DOLORES HIDALGO 11', 28931, 'MADRID', 91, '48200336H', NULL, NULL),
(793, 'HERMES LOGISTICA S.A.', 'C/ 62 N? 11-+13, 1? PLTA, SECTOR A - ZONA FRANCA', 8040, 'BARCELONA', 91, 'A08813032', NULL, NULL),
(794, 'IDEA EXPONENT', 'CTRA. DE BARCELONA, 184', 8187, 'BARCELONA', 93, 'B62441787', NULL, NULL),
(795, 'BIP & DRIVE S.A.', 'PZA. COLON 2 TORRE COLON TORRE 2 PLANTA 19', 28046, 'MADRID', 0, 'A86969607', NULL, NULL),
(796, 'QUIRON PREVENCION S.L.U', 'C/ AGUSTIN DE BETANCOURT N? 25  2?', 28003, 'MADRID', 925, 'B64076482', NULL, NULL),
(797, 'SOLO CORBA S.L.', 'C/ ESTONIA NAVE 10 POL. IND. TECNOCORDOBA', 14014, 'CORDOBA', 957, 'B14793954', NULL, NULL),
(798, 'VINCCI HOTELES S.A.', 'C/ ANABEL SEGURA N? 11 EDIF. A BAJO ', 28108, 'MADRID', 0, 'A82919945', NULL, NULL),
(799, 'PINTOS ACABADOS PARA LA MADERA S.L.', 'VENEZUELA 18', 28983, 'MADRID', 647, 'B81071573', NULL, NULL),
(800, 'URBANO ALVAREZ MERINO', 'C/ PARQUE BUJARUELO 23', 28924, 'MADRID', 91, '5366263H', NULL, NULL),
(801, 'MECANIZACION Y ENSAMBLAJE TOLEDO S.L.', 'CMNO. REAL DE UGENA S/N CTRA DE CARRANQUE AL VISO', 45217, 'TOLEDO', 925, 'B45314804', NULL, NULL),
(802, 'TERMISER SERVICIOS INTEGRALES S.L.U.', 'CTRA. M-114 KM. 1', 28864, 'MADRID', 91, 'B84374982', NULL, NULL),
(803, 'MIFARMA TIENDA ONLINE S.L.', 'C/ VIRGEN 76', 2100, 'ALBACETE', 967, 'B02518041', NULL, NULL),
(804, 'ALPROTEC C.B.', 'C/ JOAQUIN TURINA N? 7- 2? C', 4720, 'ALMERIA', 950, 'E04837373', NULL, NULL),
(805, 'LOGISTICA Y DISTRIBUCION DOBLE A S.L', 'CTRA. VALDEMINGOMEZ, 128-130  KM  28051 ', 28051, 'MADRID', 91, 'B87165155', NULL, NULL),
(806, 'MABECA INFORMES PERICIALES S.L.', 'C/ ESTRELLA SIRIO 2   6? A', 30203, 'MURCIA', 0, 'B30906994', NULL, NULL),
(807, 'GABINETE TECNICO MARTIN PONS S.L.', 'PL SAN BLAS N?1  1? A', 37007, 'SALAMANCA', 923, 'B37261781', NULL, NULL),
(808, 'TRANSPORTES GALLASTEGUI S.L.', 'CABO DE GATA 5 ', 28320, 'MADRID', 0, 'B20929758', NULL, NULL),
(809, 'SNOID LTDA', 'C/ NORTE 5', 28950, 'MADRID', 0, 'B81750002', NULL, NULL),
(810, 'CARLOS PEREZ GONZALEZ', 'C/ ROBLE 28', 28250, 'MADRID', 0, '35283152W', NULL, NULL),
(811, 'CENTRO DE LA REAL FEDERACION ESPA?OLA DE GOLF S.A.U.', 'ARROYO DEL FRESNO 2', 28049, 'MADRID', 91, 'A83261180', NULL, NULL),
(812, 'ISC PLASTIC PARTS S.L.', 'PASEO DE GRACIA 12  1ER PISO', 8007, 'BARCELONA', 93, 'B62140579', NULL, NULL),
(813, 'PRE-MOTION BV', 'FARADAYSTRAAT 16', 6718, 'XT EDE', 31, 'NL814801596B01', NULL, NULL),
(814, 'AMIDATA S.A.U.', 'AVDA. EUROPA 19 EDIF. 3', 28224, 'MADRID', 0, 'A78913993', NULL, NULL),
(815, 'JOSE ANTONIO CANO MU?OZ', '', 28019, 'MADRID', 0, '050179743E', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_id_unique` (`id`);

--
-- Indices de la tabla `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_id_unique` (`id`);

--
-- Indices de la tabla `material_externos`
--
ALTER TABLE `material_externos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_externos_id_unique` (`id`);

--
-- Indices de la tabla `material_parte`
--
ALTER TABLE `material_parte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_parte_id_unique` (`id`),
  ADD KEY `material_parte_parte_id_foreign` (`parte_id`),
  ADD KEY `material_parte_material_id_foreign` (`material_id`),
  ADD KEY `material_parte_proveedor_id_foreign` (`proveedor_id`);

--
-- Indices de la tabla `material_proveedor`
--
ALTER TABLE `material_proveedor`
  ADD KEY `material_proveedor_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `material_proveedor_material_id_foreign` (`material_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `obras_id_unique` (`id`),
  ADD KEY `obras_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partes_id_unique` (`id`),
  ADD KEY `partes_presupuesto_id_foreign` (`presupuesto_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `planos_id_unique` (`id`),
  ADD KEY `planos_presupuesto_id_foreign` (`presupuesto_id`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `presupuestos_id_unique` (`id`),
  ADD KEY `presupuestos_obra_id_foreign` (`obra_id`);

--
-- Indices de la tabla `proveedors`
--
ALTER TABLE `proveedors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedors_id_unique` (`id`);

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `material_externos`
--
ALTER TABLE `material_externos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_parte`
--
ALTER TABLE `material_parte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedors`
--
ALTER TABLE `proveedors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=816;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `material_parte`
--
ALTER TABLE `material_parte`
  ADD CONSTRAINT `material_parte_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_parte_parte_id_foreign` FOREIGN KEY (`parte_id`) REFERENCES `partes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_parte_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `material_proveedor`
--
ALTER TABLE `material_proveedor`
  ADD CONSTRAINT `material_proveedor_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_proveedor_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partes`
--
ALTER TABLE `partes`
  ADD CONSTRAINT `partes_presupuesto_id_foreign` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `planos_presupuesto_id_foreign` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuestos_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
