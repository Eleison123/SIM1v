-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2015 a las 09:43:51
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `kiosco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  `Mision` longtext,
  `Vision` longtext,
  `Objetivo` longtext,
  PRIMARY KEY (`idCarrera`,`idFacultad`),
  KEY `fk_Carrera_Facultad_idx` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `Nombre`, `idFacultad`, `Mision`, `Vision`, `Objetivo`) VALUES
(1, 'Licenciatura en InformÃ¡tica', 1, NULL, NULL, NULL),
(4, 'Licenciatura en Ciencias y TÃ©cnicas EstadÃ­stica', 1, NULL, NULL, NULL),
(5, 'Licenciatura en IngenierÃ­a de Software', 1, NULL, NULL, NULL),
(6, 'Licenciatura en Redes y Servicios de CÃ³mputo', 1, NULL, NULL, NULL),
(7, 'Licenciatura en TecnologÃ­as Computacionales', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedratico`
--

CREATE TABLE IF NOT EXISTS `catedratico` (
  `idCatedratico` int(11) NOT NULL AUTO_INCREMENT,
  `Apellidomaterno` varchar(45) DEFAULT NULL,
  `Apellidopaterno` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idCatedratico`,`idFacultad`),
  KEY `fk_Catedratico_Facultad1_idx` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Volcado de datos para la tabla `catedratico`
--

INSERT INTO `catedratico` (`idCatedratico`, `Apellidomaterno`, `Apellidopaterno`, `Correo`, `Nombre`, `idFacultad`) VALUES
(1, ' ', ' ', '', 'No Asignado', 1),
(5, 'LÃ³pez', ' Alonso', 'malonso@un.mx', 'Miguel', 1),
(6, ' RamÃ­rez', 'Alonso', 'lalonso@uv.mx', 'Lorena', 1),
(7, 'ValdÃ©s ', 'Arenas', 'marenas@uv.mx', 'MarÃ­a de los Ãngeles', 1),
(8, ' Rosas ', 'Balderas', 'gbalderas@uv.mx', 'Gustavo Manuel', 1),
(9, 'Guerrero', 'BenÃ­tez ', 'edbenitez@uv.mx', ' Edgard IvÃ¡n', 1),
(10, 'MartÃ­nez ', 'Canal ', 'mcanal@uv.mx', 'Margarita', 1),
(11, 'GarcÃ­a ', 'Carmona ', 'maribelcarmona@uv.mx', 'Maribel', 1),
(12, 'MÃ©ndez ', 'CarriÃ³n ', 'pcarrion@uv.mx', 'Patricia de la Luz', 1),
(13, ' SÃ¡nchez ', 'CastaÃ±eda', 'fcastaneda@uv.mx', 'Fredy', 1),
(14, ' Valerio ', 'Castillo', ' Valerio ', 'Sergio Luis', 1),
(15, ' ', 'CerdÃ¡n ', 'acerdan@uv.mx', 'MarÃ­a AngÃ©lica', 1),
(16, 'Dorantes ', 'Contreras ', 'pecontreras@uv.mx', 'Pedro Higinio', 1),
(17, 'Vega', 'Contreras ', 'gcontreras@uv.mx', ' Gerardo', 1),
(18, 'VerdÃ­n ', 'CortÃ©s ', 'kcortes@uv.mx', 'MarÃ­a Karen', 1),
(19, 'MÃ¡vil ', 'Cruz ', 'micruz@uv.mx', 'Miguel Ãngel', 1),
(20, 'RamÃ­rez ', 'Cruz ', 'ncruz@uv.mx', 'Nicandro', 1),
(21, ' Reyes ', 'Cruz', 'ocruz@uv.mx', 'Oscar JosÃ© Luis', 1),
(22, 'Borges ', 'Cuesta ', 'acuesta@uv.mx', 'Abraham', 1),
(23, 'RamÃ­rez ', 'Delgado ', 'hdelgado@uv.mx', 'Atanasio Hermilo', 1),
(24, 'Barcenas ', 'DomÃ­nguez ', 'eldominguez@uv.mx', 'Martha Elizabet', 1),
(25, 'Vega ', 'Escalante ', 'jescalante@uv.mx', 'Juana Elisa', 1),
(26, 'PeÃ±a ', 'FernÃ¡ndez ', 'jfernandez@uv.mx', 'Juan Manuel', 1),
(27, 'Gaona ', 'GarcÃ­a ', 'agarcia@uv.mx', 'Alma Rosa', 1),
(28, 'Menier', 'GarcÃ­a ', 'evgarcia@uv.mx', ' Everardo', 1),
(29, 'Oviedo', 'GarcÃ­a ', 'angelegarcia@uv.mx', ' MarÃ­a de los Angeles', 1),
(30, 'RamÃ­rez ', 'GarcÃ­a ', 'sgarcia@uv.mx', 'MarÃ­a Silvia', 1),
(31, 'Vega  ', 'GarcÃ­a ', 'angegarcia@uv.mx', 'Virginia AngÃ©lica', 1),
(32, 'Zamora ', 'GarcÃ­a ', 'esgarcia@uv.mx', 'Ma. Esther', 1),
(33, 'Otero ', 'GutiÃ©rrez ', 'cgutierrez@uv.mx', 'Carmen', 1),
(34, 'GonzÃ¡lez ', 'HernÃ¡ndez ', 'sehernandez@uv.mx', 'Lizbeth Alejandra', 1),
(35, 'Olivera ', 'HernÃ¡ndez ', 'victohernandez@uv.mx', 'VÃ­ctor Manuel', 1),
(36, ' RodrÃ­guez ', 'HernÃ¡ndez', 'lourhernandez@uv.mx', 'Ma. de Lourdes', 1),
(37, 'Barradas ', 'Lagunes ', 'vlagunes@uv.mx', 'Virginia', 1),
(38, 'Pensado ', 'Landa ', 'bllanda@uv.mx', 'Blanca Rosa', 1),
(39, ' Herrera ', 'LÃ³pez', 'julopez@uv.mx', 'Juan Luis', 1),
(40, 'MartÃ­nez ', 'LÃ³pez ', 'linlopez@uv.mx', 'MarÃ­a Lina', 1),
(41, 'Peralta ', 'LÃ³pez ', 'dolopez@uv.mx', 'Dora Emilia', 1),
(42, ' ', 'Martinez ', 'jemartinez@uv.mx', 'JosÃ© de Jesus', 1),
(43, 'Velasco ', 'Matus ', 'cmatus@uv.mx', 'Ma. Candelaria', 1),
(44, 'Toral ', 'Melgoza ', 'emelgoza@uv.mx', 'Edith Ilicet', 1),
(45, 'Ortiz ', 'MÃ©ndez ', 'jmendez@uv.mx', 'JesÃºs Roberto', 1),
(46, ' Godoy ', 'Mezura', 'cmezura@uv.mx', 'MarÃ­a del Carmen', 1),
(47, 'JimÃ©nez ', 'MontanÃ© ', 'lmontane@uv.mx', 'Luis Gerardo', 1),
(48, 'Guerrero ', 'Navarro ', 'lonavarro@uv.mx', 'Ma. de los Angeles', 1),
(49, 'Rivera ', 'Ochoa ', 'cochoa@uv.mx', 'Carlos Alberto', 1),
(50, 'GonzÃ¡lez', 'OrduÃ±a  ', 'aorduna@uv.mx', 'Aquiles', 1),
(51, 'RÃ­os', 'Orozco ', 'vorozco@uv.mx', ' VerÃ³nica', 1),
(52, 'Sedano ', 'Ortiz ', 'aortiz@uv.mx', 'Adolfo', 1),
(53, 'Arriaga ', 'PÃ©rez ', 'juaperez@uv.mx', 'Juan Carlos', 1),
(54, 'Flores ', 'PÃ©rez ', 'armperez@uv.mx', 'Armando', 1),
(55, 'HernÃ¡ndez ', 'PÃ©rez ', 'angelperez@uv.mx', 'AngÃ©lica', 1),
(56, ' Estrella ', 'Polo', 'apolo@uv.mx', 'Ana Luz', 1),
(57, 'MÃ©ndez', 'Rebolledo ', 'grebolledo@uv.mx', ' Genaro', 1),
(58, 'Cortez ', 'RodrÃ­guez ', 'edgrodriguez@uv.mx', 'Edgar Paul', 1),
(59, 'CÃ¡ceres ', 'Rojano ', 'rrojano@uv.mx', 'JosÃ© Rafael', 1),
(60, 'DÃ­az ', 'Salazar ', 'gsalazar@uv.mx', 'Ma. Guadalupe', 1),
(61, 'GarcÃ­a ', 'SÃ¡nchez ', '', 'Ãngel Juan', 1),
(62, 'Orea ', 'SÃ¡nchez ', 'alsanchez@uv.mx', 'Alfonso', 1),
(63, 'Cervantes ', 'Sarmiento ', 'rsarmiento@uv.mx', 'RamÃ³n David', 1),
(64, 'JimÃ©nez ', 'Sosa ', 'cansosa@uv.mx', 'Candy Obdulia', 1),
(65, 'Ortiz ', 'Soto ', 'luisoto@uv.mx', 'JosÃ© Luis', 1),
(66, 'LÃ³pez ', 'Sumano ', 'asumano@uv.mx', 'Ma. de los Angeles', 1),
(67, 'MejÃ­a', 'Torres ', 'ptorres@uv.mx', ' Pedro', 1),
(68, 'Pedraza', 'ValderrÃ¡bano ', 'dvalderrabano@uv.mx', ' Diana Elizabeth', 1),
(69, 'Cortina', 'Zamora ', 'luzamora@uv.mx', ' Luis', 1),
(70, 'HERNÃNDEZ', 'PÃ©rez ', '', 'IRMA ', 1),
(71, 'ROMERO', 'MORALES ', '', 'ZOILO ', 1),
(72, 'CAMACHO', 'DIAZ ', '', 'EDUARDO ', 1),
(73, 'LEÃ“N', 'MUÃ‘OZ', '', 'JOSÃ‰ JUAN', 1),
(74, 'CANAL', 'DEL CALLEJO ', '', 'DIANA D. ', 1),
(75, 'Portilla', 'MuÃ±oz', '', 'JosÃ© FabiÃ¡n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `Contrasena` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idCuenta`,`idFacultad`),
  KEY `fk_Cuenta_Facultad1_idx` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `Contrasena`, `tipo`, `Usuario`, `idFacultad`) VALUES
(1, '07b060ba53e219102e79fd6224a61fa2f640f83c', '1', 'santy', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experienciaeducativa`
--

CREATE TABLE IF NOT EXISTS `experienciaeducativa` (
  `idExperienciaEducativa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `idCarrera` int(11) NOT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idExperienciaEducativa`,`idCarrera`,`idFacultad`),
  KEY `fk_experienciaeducativa_Carrera1_idx` (`idCarrera`,`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

--
-- Volcado de datos para la tabla `experienciaeducativa`
--

INSERT INTO `experienciaeducativa` (`idExperienciaEducativa`, `Nombre`, `idCarrera`, `idFacultad`) VALUES
(4, 'COMPUTACION BASICA', 4, 1),
(5, 'HABILIDADES DEL PENSAMIENTO CRITICO Y CREATIV', 4, 1),
(6, 'INGLES I', 4, 1),
(7, 'LECTURA Y REDACCION A TRAVES DEL ANALISIS DEL', 4, 1),
(8, 'ALGEBRA LINEAL', 4, 1),
(9, 'ALGEBRA MATRICIAL Y VECTORIAL', 4, 1),
(10, 'CALCULO I', 4, 1),
(11, 'CALCULO II', 4, 1),
(12, 'INTRODUCCION A LAS MATEMATICAS', 4, 1),
(13, 'PRECALCULO', 4, 1),
(14, 'INTRODUCCION AL ANALISIS Y PENSAMIENTO ESTADI', 4, 1),
(15, 'METODOLOGIA DE LA INVESTIGACION', 4, 1),
(16, 'METODOLOGIA ESTADISTICA', 4, 1),
(17, 'MODELACION ESTADISTICA', 4, 1),
(18, 'COMPUTO ESTADISTICO', 4, 1),
(19, 'INTRODUCCION A LA PROGRAMACION', 4, 1),
(20, 'INFERENCIA ESTADISTICA', 4, 1),
(21, 'PROBABILIDAD', 4, 1),
(22, 'CONSULTORIA ESTADISTICA', 4, 1),
(23, 'ESTADISTICA EN EL CONTROL DE LA CALIDAD&#9;', 4, 1),
(24, 'ESTADISTICA NO PARAMETRICA', 4, 1),
(25, 'MUESTREO', 4, 1),
(26, 'DISEÃ‘O Y ANALISIS DE EXPERIMENTOS', 4, 1),
(27, 'ESTADISTICA MULTIVARIANTE', 4, 1),
(28, 'INVESTIGACION DE OPERACIONES', 4, 1),
(29, 'ANALISIS DE REGRESION', 4, 1),
(30, 'ANALISIS DE SERIES DE TIEMPO', 4, 1),
(31, 'MODELOS LINEALES GENERALIZADOS Y ANALISIS DE ', 4, 1),
(32, 'SERVICIO SOCIAL', 4, 1),
(33, 'EXPERIENCIA RECEPCIONAL', 4, 1),
(34, 'COMPUTACION BASICA', 1, 1),
(35, 'HABILIDADES DEL PENSAMIENTO CRITICO Y CREATIV', 1, 1),
(36, 'INGLES I', 1, 1),
(37, 'INGLES II', 1, 1),
(38, 'LECTURA Y REDACCION A TRAVES DEL ANALISIS DEL', 1, 1),
(39, 'ALGORITMOS Y ESTRUCTURAS DE DATOS I&#9;', 1, 1),
(40, 'ARQUITECTURA DE COMPUTADORAS I', 1, 1),
(41, 'ALGEBRA LINEAL', 1, 1),
(42, 'PROBABILIDAD Y ESTADISTICA', 1, 1),
(43, 'MATEMATICAS DISCRETAS', 1, 1),
(44, 'ALGORITMOS Y ESTRUCTURAS DE DATOS II', 1, 1),
(45, 'PROGRAMACION AVANZADA', 1, 1),
(46, 'ARQUITECTURA DE COMPUTADORAS II', 1, 1),
(47, 'METODOLOGIA DE LA INVESTIGACION', 1, 1),
(48, 'ETICA Y LEGISLACION INFORMATICA', 1, 1),
(49, 'FUNDAMENTOS DE ADMINISTRACION', 1, 1),
(50, 'ADMINISTRACION DE RECURSOS INFORMATICOS', 1, 1),
(51, 'INGENIERIA DE SOFTWARE I', 1, 1),
(52, 'INGENIERIA DE SOFTWARE II', 1, 1),
(53, 'ADMINISTRACION DE PROYECTOS', 1, 1),
(54, 'TALLER DE INTEGRACION I', 1, 1),
(55, 'TALLER DE INTEGRACION II', 1, 1),
(56, 'TALLER DE INTEGRACION III', 1, 1),
(57, 'INTELIGENCIA ARTIFICIAL', 1, 1),
(58, 'LOGICA', 1, 1),
(59, 'CALCULO', 1, 1),
(60, 'REDES I', 1, 1),
(61, 'REDES II', 1, 1),
(62, 'BASES DE DATOS I', 1, 1),
(63, 'BASES DE DATOS II', 1, 1),
(64, 'ORGANIZACION DE ARCHIVOS', 1, 1),
(65, 'SISTEMAS OPERATIVOS', 1, 1),
(66, 'PROGRAMACION DE SISTEMAS', 1, 1),
(67, 'COMPILADORES', 1, 1),
(68, 'SERVICIO SOCIAL', 1, 1),
(69, 'EXPERIENCIA RECEPCIONAL', 1, 1),
(70, 'COMPUTACION BASICA', 5, 1),
(71, 'HABILIDADES DEL PENSAMIENTO CRITICO Y CREATIV', 5, 1),
(72, 'INGLES I', 5, 1),
(73, 'INGLES II', 5, 1),
(74, 'LECTURA Y REDACCION A TRAVES DEL ANALISIS DEL', 5, 1),
(75, 'LABORATORIO DE RESOLUCION DE PROBLEMAS', 5, 1),
(76, 'FUNDAMENTOS DE MATEMATICAS', 5, 1),
(77, 'ALGEBRA LINEAL PARA COMPUTACION', 5, 1),
(78, 'PROBABILIDAD Y ESTADISTICA PARA COMPUTACION', 5, 1),
(79, 'MATEMATICAS DISCRETAS', 5, 1),
(80, 'HABILIDADES DE COMUNICACION', 5, 1),
(81, 'INTRODUCCION A LA PROGRAMACION&#9;', 5, 1),
(82, 'PROGRAMACION', 5, 1),
(83, 'PROCESOS PARA LA INGENIERIA DE SOFTWARE', 5, 1),
(84, 'ADMINISTRACION DE PROYECTOS DE SOFTWARE', 5, 1),
(85, 'SISTEMAS OPERATIVOS', 5, 1),
(86, 'PRUEBA DE SOFTWARE', 5, 1),
(87, 'VERIFICACION Y VALIDACION DE SOFTWARE&#9;', 5, 1),
(88, 'PRINCIPIOS DE CONSTRUCCION DE SOFTWARE', 5, 1),
(89, 'TECNOLOGIAS PARA LA CONSTRUCCION DE SOFTWARE', 5, 1),
(90, 'DESARROLLO DE SOFTWARE', 5, 1),
(91, 'DESARROLLO DE APLICACIONES', 5, 1),
(92, 'DESARROLLO DE SISTEMAS WEB', 5, 1),
(93, 'DESARROLLO DE SISTEMAS EN RED', 5, 1),
(94, 'PRACTICAS DE INGENIERIA DE SOFTWARE', 5, 1),
(95, 'DERECHO DE LAS TECNOLOGIAS DE INFORMACION Y C', 5, 1),
(96, 'ECONOMIA PARA TOMA DE DECISIONES', 5, 1),
(97, 'PROYECTO GUIADO', 5, 1),
(98, 'REQUERIMIENTOS DE SOFTWARE', 5, 1),
(99, 'PRINCIPIOS DE DISEÃ‘O DE SOFTWARE', 5, 1),
(100, 'DISEÃ‘O DE SOFTWARE', 5, 1),
(101, 'ESTRUCTURAS DE DATOS', 5, 1),
(102, 'PARADIGMAS DE PROGRAMACION', 5, 1),
(104, 'REDES', 5, 1),
(105, 'BASES DE DATOS', 5, 1),
(106, 'ACREDITACION DEL IDIOMA INGLES', 5, 1),
(107, 'SERVICIO SOCIAL', 5, 1),
(108, 'EXPERIENCIA RECEPCIONAL', 5, 1),
(109, 'COMPUTACION BASICA', 6, 1),
(110, 'HABILIDADES DEL PENSAMIENTO CRITICO Y CREATIV', 6, 1),
(111, 'INGLES I', 6, 1),
(112, 'INGLES II', 6, 1),
(113, 'LECTURA Y REDACCION A TRAVES DEL ANALISIS DEL', 6, 1),
(114, 'FUNDAMENTOS DE MATEMATICAS', 6, 1),
(115, 'ALGEBRA LINEAL PARA COMPUTACION', 6, 1),
(116, 'PROBABILIDAD Y ESTADISTICA PARA COMPUTACION', 6, 1),
(117, 'MATEMATICAS DISCRETAS', 6, 1),
(118, 'INTRODUCCION A LA PROGRAMACION', 6, 1),
(119, 'SISTEMAS OPERATIVOS', 6, 1),
(120, 'PROGRAMACION DE SISTEMAS', 6, 1),
(121, 'ARQUITECTURA DE DISPOSITIVOS DE RED', 6, 1),
(122, 'SISTEMAS OPERATIVOS APLICADOS', 6, 1),
(124, 'MANTENIMIENTO DE EQUIPO DE COMPUTO&#9;', 6, 1),
(125, 'DESARROLLO DE SISTEMAS WEB', 6, 1),
(126, 'HABILIDADES DE COMUNICACION', 6, 1),
(127, 'ADMINISTRACION DE PROYECTOS DE RED&#9;', 6, 1),
(128, 'PRACTICAS DE REDES', 6, 1),
(129, 'METODOLOGIA DE LA INVESTIGACION', 6, 1),
(130, 'ETICA Y NORMATIVIDAD EN COMUNICACIONES Y REDE', 6, 1),
(131, 'PROGRAMACION', 6, 1),
(132, 'ESTRUCTURAS DE DATOS', 6, 1),
(133, 'PROGRAMACION EN LA ADMINISTRACION DE REDES', 6, 1),
(134, 'PRINCIPIOS DE TELECOMUNICACIONES', 6, 1),
(135, 'ENRUTAMIENTO BASICO', 6, 1),
(136, 'ENRUTAMIENTO AVANZADO', 6, 1),
(137, 'CONMUTACION EN REDES LAN', 6, 1),
(138, 'ARQUITECTURAS EN RED', 6, 1),
(139, 'REDES INALAMBRICAS', 6, 1),
(140, 'ACCESO WAN', 6, 1),
(141, 'BASES DE DATOS', 6, 1),
(142, 'ADMINISTRACION DE BASES DE DATOS', 6, 1),
(143, 'PROGRAMACION SEGURA', 6, 1),
(144, 'ANALISIS DE PROTOCOLOS', 6, 1),
(145, 'SEGURIDAD', 6, 1),
(146, 'ADMINISTRACION DE SERVIDORES', 6, 1),
(147, 'ADMINISTRACION AVANZADA DE SERVICIOS&#9;', 6, 1),
(148, 'ACREDITACION DEL IDIOMA INGLES', 6, 1),
(149, 'SERVICIO SOCIAL', 6, 1),
(150, 'EXPERIENCIA RECEPCIONAL', 6, 1),
(151, 'COMPUTACION BASICA', 7, 1),
(152, 'HABILIDADES DEL PENSAMIENTO CRITICO Y CREATIV', 7, 1),
(153, 'INGLES I', 7, 1),
(154, 'INGLES II', 7, 1),
(155, 'LECTURA Y REDACCION A TRAVES DEL ANALISIS DEL', 7, 1),
(156, 'FUNDAMENTOS DE MATEMATICAS', 7, 1),
(157, 'ALGEBRA LINEAL PARA COMPUTACION', 7, 1),
(158, 'PROBABILIDAD Y ESTADISTICA PARA COMPUTACION', 7, 1),
(159, 'MATEMATICAS DISCRETAS', 7, 1),
(160, 'INTRODUCCION A LA PROGRAMACION&#9;', 7, 1),
(161, 'PROGRAMACION', 7, 1),
(162, 'TECNOLOGIAS DE INFORMACION PARA LA INNOVACION', 7, 1),
(163, 'SISTEMAS OPERATIVOS', 7, 1),
(164, 'ORGANIZACION DE COMPUTADORAS', 7, 1),
(165, 'HABILIDADES DIRECTIVAS', 7, 1),
(166, 'GESTION DE PROYECTOS DE TECNOLOGIAS DE INFORM', 7, 1),
(167, 'PROYECTO INTEGRADOR', 7, 1),
(168, 'INGENIERIA DE SOFTWARE', 7, 1),
(169, 'METODOLOGIAS DE DESARROLLO', 7, 1),
(170, 'INTERACCION HUMANO COMPUTADORA', 7, 1),
(171, 'METODOLOGIA DE LA INVESTIGACION', 7, 1),
(172, 'ETICA Y LEGISLACION INFORMATICA', 7, 1),
(173, 'TECNOLOGIAS PARA LA INTEGRACION DE SOLUCIONES', 7, 1),
(174, 'INTEGRACION DE SOLUCIONES', 7, 1),
(175, 'DESARROLLO DE SOFTWARE', 7, 1),
(176, 'ESTRUCTURAS DE DATOS', 7, 1),
(177, 'DESARROLLO MOVIL', 7, 1),
(178, 'REDES', 7, 1),
(179, 'BASES DE DATOS', 7, 1),
(180, 'BASES DE DATOS AVANZADAS', 7, 1),
(181, 'SISTEMAS INTELIGENTES', 7, 1),
(182, 'SEGURIDAD', 7, 1),
(183, 'ADMINISTRACION DE SERVIDORES', 7, 1),
(184, 'SISTEMAS WEB', 7, 1),
(185, 'TECNOLOGIAS WEB', 7, 1),
(186, 'PROGRAMACION AVANZADA', 7, 1),
(187, 'ACREDITACION DEL IDIOMA INGLES', 7, 1),
(188, 'SERVICIO SOCIAL', 7, 1),
(189, 'EXPERIENCIA RECEPCIONAL', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Sede` varchar(45) DEFAULT NULL,
  `Descripcion` longtext,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idFacultad`, `Nombre`, `Sede`, `Descripcion`) VALUES
(1, 'Facultad de EstadÃ­stica e InformÃ¡tica', 'Xalapa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(10) DEFAULT NULL,
  `diapub` varchar(10) DEFAULT NULL,
  `fechavig` varchar(10) DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `horain` time DEFAULT NULL,
  `horapub` time DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `idCarrera` int(11) NOT NULL,
  `idFacultad` int(11) NOT NULL,
  `idCatedratico` int(11) NOT NULL,
  `idubicacion` int(11) NOT NULL,
  `idExperienciaEducativa` int(11) NOT NULL,
  `NRC` varchar(5) DEFAULT NULL,
  `NRCANT` varchar(5) DEFAULT NULL,
  `Seccion` varchar(2) DEFAULT NULL,
  `Bloque` varchar(2) DEFAULT NULL,
  `Secretaria` varchar(45) DEFAULT NULL,
  `acta` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idHorario`,`idCarrera`,`idFacultad`,`idCatedratico`,`idubicacion`,`idExperienciaEducativa`),
  KEY `fk_horario_Carrera1_idx` (`idCarrera`,`idFacultad`),
  KEY `fk_horario_Catedratico1_idx` (`idCatedratico`),
  KEY `fk_horario_ubicacion1_idx` (`idubicacion`),
  KEY `fk_horario_experienciaeducativa1_idx` (`idExperienciaEducativa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `dia`, `diapub`, `fechavig`, `horafin`, `horain`, `horapub`, `tipo`, `idCarrera`, `idFacultad`, `idCatedratico`, `idubicacion`, `idExperienciaEducativa`, `NRC`, `NRCANT`, `Seccion`, `Bloque`, `Secretaria`, `acta`) VALUES
(19, 'Lunes', '01/01/2015', '08/02/2015', '19:00:00', '17:00:00', '01:00:00', 1, 1, 1, 1, 9, 59, '---', '---', 'S1', 'B2', '', ''),
(20, 'Martes', '01/01/2015', '08/01/2015', '19:00:00', '17:00:00', '01:00:00', 1, 1, 1, 1, 11, 59, '---', '30587', 'S1', 'B2', '', ''),
(21, 'Jueves', '01/01/2015', '08/01/2015', '19:00:00', '17:00:00', '01:00:00', 1, 1, 1, 1, 8, 59, '---', '30587', 'S1', 'B2', '', ''),
(22, 'Martes', '01/01/2015', '08/01/2015', '19:00:00', '17:00:00', '13:00:00', 1, 1, 1, 16, 14, 40, '--', '27332', 'S1', 'B2', '', ''),
(23, 'Miercoles', '01/01/2015', '08/01/2015', '19:00:00', '17:00:00', '13:00:00', 1, 1, 1, 16, 14, 40, '--', '27332', 'S1', 'B2', '', ''),
(24, 'Viernes', '01/01/2015', '08/01/2015', '21:00:00', '19:00:00', '13:00:00', 1, 1, 1, 16, 14, 40, '--', '27332', 'S1', 'B2', '', ''),
(25, 'Martes', '01/01/2015', '08/01/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 8, 13, 46, '---', '27352', 'S1', 'B2', '', ''),
(26, 'Miercoles', '01/01/2015', '08/01/2015', '09:00:00', '07:00:00', '13:00:00', 1, 1, 1, 8, 6, 46, '', '27352', 'S1', 'B2', '', ''),
(27, 'Jueves', '01/01/2015', '08/01/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 8, 2, 46, '---', '27352', 'S1', 'B2', '', ''),
(28, 'Martes', '01/01/2015', '08/01/2015', '11:00:00', '10:00:00', '01:00:00', 1, 1, 1, 54, 14, 64, '70671', '27356', 'S1', 'B2', '', ''),
(29, 'Miercoles', '01/01/2015', '08/01/2015', '13:00:00', '11:00:00', '01:00:00', 1, 1, 1, 54, 11, 64, '70671', '27356', 'S1', 'B2', '', ''),
(30, 'Jueves', '01/01/2015', '08/01/2015', '13:00:00', '11:00:00', '01:00:00', 1, 1, 1, 54, 8, 64, '70671', '27356', 'S1', 'B2', '', ''),
(31, 'Lunes', '01/01/2015', '08/01/2015', '15:00:00', '13:00:00', '01:00:00', 1, 1, 1, 1, 9, 43, '70673', '27361', 'S1', 'B2', '', ''),
(32, 'Miercoles', '01/01/2015', '08/01/2015', '15:00:00', '13:00:00', '01:00:00', 1, 1, 1, 1, 9, 43, '70673', '27361', 'S1', 'B2', '', ''),
(33, 'Viernes', '01/01/2015', '08/01/2015', '15:00:00', '13:00:00', '01:00:00', 1, 1, 1, 1, 12, 43, '70673', '27361', 'S1', 'B2', '', ''),
(34, 'Martes', '01/01/2015', '08/01/2015', '21:00:00', '19:00:00', '01:00:00', 1, 1, 1, 28, 12, 43, '---', '27399', 'S2', 'B2', '', ''),
(35, 'Miercoles', '01/01/2015', '08/01/2015', '17:00:00', '15:00:00', '01:00:00', 1, 1, 1, 28, 8, 43, '---', '27399', 'S2', 'B2', '', ''),
(36, 'Viernes', '01/01/2015', '08/01/2015', '21:00:00', '19:00:00', '13:00:00', 1, 1, 1, 28, 13, 43, '---', '27399', 'S2', 'B2', '', ''),
(37, 'Lunes', '01/01/2015', '08/01/2015', '11:00:00', '09:00:00', '13:00:00', 1, 1, 1, 1, 12, 41, '70677', '27402', 'S2', 'B2', '', ''),
(38, 'Martes', '01/01/2015', '08/01/2015', '10:00:00', '09:00:00', '01:00:00', 1, 1, 1, 1, 14, 41, '70677', '27402', 'S2', 'B2', '', ''),
(39, 'Jueves', '01/01/2015', '08/01/2015', '11:00:00', '09:00:00', '01:00:00', 1, 1, 1, 1, 14, 41, '70677', '27402', 'S2', 'B2', '', ''),
(40, 'Lunes', '01/01/2015', '08/01/2015', '11:00:00', '09:00:00', '01:00:00', 1, 1, 1, 49, 10, 39, '---', '27431', 'S2', 'B2', '', ''),
(41, 'Miercoles', '01/01/2015', '08/01/2015', '11:00:00', '09:00:00', '01:00:00', 1, 1, 1, 49, 6, 39, '---', '27431', 'S2', 'B2', '', ''),
(42, 'Viernes', '01/01/2015', '08/01/2015', '11:00:00', '09:00:00', '01:00:00', 1, 1, 1, 49, 11, 39, '---', '27431', 'S2', 'B2', '', ''),
(43, 'Lunes', '01/01/2015', '08/01/2015', '17:00:00', '15:00:00', '01:00:00', 1, 1, 1, 1, 10, 49, '---', '27455', 'S2', 'B2', '', ''),
(44, 'Martes', '01/01/2015', '08/01/2015', '19:00:00', '17:00:00', '01:00:00', 1, 1, 1, 1, 7, 49, '---', '27455', 'S2', 'B2', '', ''),
(45, 'Jueves', '01/01/2015', '08/01/2015', '21:00:00', '19:00:00', '01:00:00', 1, 1, 1, 1, 10, 49, '---', '27455', 'S2', 'B2', '', ''),
(46, 'Jueves', '01/01/2015', '08/01/2015', '21:00:00', '19:00:00', '01:00:00', 1, 1, 1, 1, 12, 49, '---', '27455', 'S2', 'B2', '', ''),
(47, 'Lunes', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '14:00:00', 1, 1, 1, 14, 14, 40, '---', '27466', 'S3', 'B2', '', NULL),
(48, 'Jueves', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '13:00:00', 1, 1, 1, 14, 9, 40, '---', '27466', 'S3', 'B2', '', NULL),
(49, 'Viernes', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '02:00:00', 1, 1, 1, 14, 8, 40, '---', '27466', 'S3', 'B2', '', NULL),
(50, 'Lunes', '02/01/2015', '08/02/2015', '21:00:00', '19:00:00', '13:00:00', 1, 1, 1, 1, 2, 46, '---', '27471', 'S3', 'B2', '', NULL),
(51, 'Martes', '02/01/2015', '08/02/2015', '19:00:00', '17:00:00', '13:00:00', 1, 1, 1, 1, 9, 46, '---', '27471', 'S3', 'B2', '', NULL),
(52, 'Jueves', '02/01/2015', '08/02/2015', '19:00:00', '17:00:00', '13:00:00', 1, 1, 1, 1, 9, 46, '---', '27471', 'S3', 'B2', '', NULL),
(53, 'Martes', '02/01/2015', '08/02/2015', '19:00:00', '17:00:00', '13:01:00', 1, 1, 1, 73, 8, 41, '---', '27486', 'S3', 'B2', '', NULL),
(54, 'Miercoles', '02/01/2015', '08/02/2015', '20:00:00', '19:00:00', '01:00:00', 1, 1, 1, 73, 6, 41, '---', '27486', 'S3', 'B2', '', NULL),
(55, 'Viernes', '02/01/2015', '08/02/2015', '17:00:00', '15:00:00', '13:00:00', 1, 1, 1, 73, 11, 41, '---', '27486', 'S3', 'B2', '', NULL),
(56, 'Lunes', '02/01/2015', '08/02/2015', '17:00:00', '15:00:00', '01:01:00', 1, 1, 1, 1, 12, 42, '70706', '44369', 'S3', 'B2', '', NULL),
(57, 'Miercoles', '02/01/2015', '08/02/2015', '09:00:00', '08:00:00', '13:00:00', 1, 1, 1, 1, 13, 42, '70706', '44369', 'S3', 'B2', '', NULL),
(58, 'Jueves', '02/01/2015', '08/02/2015', '13:00:00', '11:00:00', '01:00:00', 1, 1, 1, 1, 52, 42, '70706', '44369', 'S3', 'B2', '', NULL),
(59, 'Lunes', '02/01/2015', '08/02/2015', '21:00:00', '19:00:00', '01:00:00', 1, 1, 1, 49, 11, 44, '---', '27962', 'S4', 'B2', '', NULL),
(60, 'Miercoles', '02/01/2015', '08/02/2015', '21:00:00', '19:00:00', '13:00:00', 1, 1, 1, 49, 2, 46, '---', '27962', 'S4', 'B2', '', NULL),
(61, '', '02/01/2015', '08/02/2015', '21:00:00', '19:00:00', '13:00:00', 1, 1, 1, 49, 11, 44, '---', '27962', 'S4', 'B2', '', NULL),
(62, 'Lunes', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 74, 11, 58, '---', '60083', 'S4', 'B2', '', NULL),
(63, 'Martes', '02/01/2015', '08/02/2015', '21:00:00', '07:00:00', '13:00:00', 1, 1, 1, 74, 11, 58, '---', '60083', 'S4', 'B2', '', NULL),
(64, 'Miercoles', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 74, 11, 58, '---', '60083', 'S4', 'B2', '', NULL),
(65, 'Miercoles', '02/01/2015', '08/02/2015', '09:00:00', '08:00:00', '01:00:00', 1, 1, 1, 75, 10, 42, '---', '60089', 'S4', 'B2', '', NULL),
(66, 'Jueves', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 75, 11, 42, '---', '60089', 'S4', 'B2', '', NULL),
(67, '', '02/01/2015', '08/02/2015', '09:00:00', '07:00:00', '01:00:00', 1, 1, 1, 75, 11, 42, '---', '60089', 'S4', 'B2', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Colorletra` varchar(45) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `diapublicacion` varchar(10) DEFAULT NULL,
  `fecharea` varchar(10) DEFAULT NULL,
  `fechavig` varchar(10) DEFAULT NULL,
  `horapublicacion` time DEFAULT NULL,
  `horarea` time DEFAULT NULL,
  `horater` time DEFAULT NULL,
  `img` text,
  `Info` longtext,
  `Infobreve` longtext,
  `Lugar` varchar(45) DEFAULT NULL,
  `Nombre` text,
  `Prioridad` varchar(45) DEFAULT NULL,
  `QR` longtext,
  `URL` longtext,
  `Visitas` int(11) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  `fechater` varchar(10) DEFAULT NULL,
  `idRegistro` int(11) NOT NULL,
  `horavig` time NOT NULL,
  PRIMARY KEY (`idPublicacion`,`idFacultad`,`idRegistro`),
  KEY `fk_publicacion_Facultad1_idx` (`idFacultad`),
  KEY `fk_publicacion_registro1_idx` (`idRegistro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`idPublicacion`, `categoria`, `Color`, `Colorletra`, `Contacto`, `diapublicacion`, `fecharea`, `fechavig`, `horapublicacion`, `horarea`, `horater`, `img`, `Info`, `Infobreve`, `Lugar`, `Nombre`, `Prioridad`, `QR`, `URL`, `Visitas`, `idFacultad`, `fechater`, `idRegistro`, `horavig`) VALUES
(1, 'Aviso', '#34495e', 'white', '', '2015-02-06', '02/06/2015', '02/28/2015', '23:21:00', '23:21:00', '13:00:00', 'imgPublicaciones/', 's fsdf sfs f sd ', 's fsdf sfs f sd ', '', 'AVISO MATRICULA S1100', '2', 'temp/testc0c4d79d655b5207da19b793b6674427.png', '', 0, 1, '02/09/2015', 15, '01:00:00'),
(2, 'Aviso', '#34495e', 'white', '', '02/06/2015', '02/06/2015', '02/28/2015', '23:44:00', '23:44:00', '13:00:00', 'imgPublicaciones/67c0cd279152005d1ce8f90465b1114d.jpg', 'adadad', 'adadad', '', 'AVISO MATRICULA S1100', '2', 'temp/test1dbc433f3ce9e48200f177eae32f1258.png', '', 0, 1, '02/09/2015', 16, '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `diareg` date DEFAULT NULL,
  `horareg` time DEFAULT NULL,
  `idCuenta` int(11) NOT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro`,`idCuenta`,`idFacultad`),
  KEY `fk_registro_Cuenta1_idx` (`idCuenta`,`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idRegistro`, `diareg`, `horareg`, `idCuenta`, `idFacultad`) VALUES
(12, '2015-01-22', '00:39:14', 1, 1),
(13, '2015-02-04', '01:01:00', 1, 1),
(14, '2015-02-04', '01:50:19', 1, 1),
(15, '2015-02-07', '06:21:41', 1, 1),
(16, '2015-02-07', '06:45:42', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `idubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  `QR` mediumtext,
  PRIMARY KEY (`idubicacion`,`idFacultad`),
  KEY `fk_ubicacion_Facultad1_idx` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `nombre`, `descripcion`, `idFacultad`, `QR`) VALUES
(1, 'CC1', '', 1, NULL),
(2, 'CC2', '', 1, NULL),
(3, 'CC3', '', 1, NULL),
(4, 'CC4', '', 1, NULL),
(5, 'Salón 102', '', 1, NULL),
(6, 'Salón 103', '', 1, NULL),
(7, 'Salón 104', '', 1, NULL),
(8, 'Salón 105', '', 1, NULL),
(9, 'Salón 106', '', 1, NULL),
(10, 'Salón 107', '', 1, NULL),
(11, 'Salón 108', '', 1, NULL),
(12, 'Salón 111', '', 1, NULL),
(13, 'Salón 112', '', 1, NULL),
(14, 'Salón 113', '', 1, NULL),
(15, 'Auditorio', '', 1, NULL),
(16, 'Audiovisual', '', 1, NULL),
(17, 'Biblioteca', '', 1, NULL),
(19, 'DirecciÃ³n FEI', '', 1, NULL),
(20, 'Salón 219', '', 1, NULL),
(21, 'Jefatura de Carrera', '', 1, NULL),
(22, 'Secretaria Academica', '', 1, NULL),
(23, 'Jefatura EconomÃ­a', '', 1, NULL),
(24, 'LINAE', '', 1, NULL),
(25, 'DirecciÃ³n EconomÃ­a', '', 1, NULL),
(26, 'CubÃ­culos AcadÃ©micos I', '', 1, NULL),
(27, 'EspecializaciÃ³n de MÃ©todos ExtadÃ­sticos', '', 1, NULL),
(28, 'Centro de Copiado', '', 1, NULL),
(29, 'Salón 101', '', 1, NULL),
(30, 'CubÃ­culo 1', '', 1, NULL),
(31, 'CubÃ­culo 2', '', 1, NULL),
(32, 'CubÃ­culo 3', '', 1, NULL),
(33, 'CubÃ­culo 4', '', 1, NULL),
(34, 'CubÃ­culo 5', '', 1, NULL),
(35, 'CubÃ­culo 6', '', 1, NULL),
(36, 'CubÃ­culo 7', '', 1, NULL),
(37, 'CubÃ­culo 8', '', 1, NULL),
(38, 'CubÃ­culo 30', '', 1, NULL),
(39, 'CubÃ­culo 31', '', 1, NULL),
(40, 'CubÃ­culo 32', '', 1, NULL),
(41, 'CubÃ­culo 33', '', 1, NULL),
(42, 'CubÃ­culo 34', '', 1, NULL),
(43, 'CubÃ­culo 35', '', 1, NULL),
(44, 'CubÃ­culo 36', '', 1, NULL),
(45, 'CubÃ­culo 37', '', 1, NULL),
(46, 'CubÃ­culo 38', '', 1, NULL),
(47, 'CubÃ­culo 39', '', 1, NULL),
(48, 'CubÃ­culo 40', '', 1, NULL),
(49, 'CubÃ­culo 41', '', 1, NULL),
(50, 'SalÃ³n 4', '', 1, NULL),
(51, 'SalÃ³n 5', '', 1, NULL),
(52, 'SalÃ³n 6', '', 1, NULL),
(53, 'SalÃ³n de Murales', '', 1, NULL),
(54, 'M.S.I.U.', '', 1, NULL),
(55, 'Laboratorio Redes', '', 1, NULL),
(56, 'Sala de Maestros', '', 1, NULL),
(57, 'Jefatura de Carrera GeografÃ­a', '', 1, NULL),
(58, 'Salón 201', '', 1, NULL),
(59, 'Salón 202', '', 1, NULL),
(60, 'Salón 203', '', 1, NULL),
(61, 'Salón 207', '', 1, NULL),
(62, 'Salón 208', '', 1, NULL),
(63, 'Salón 211', '', 1, NULL),
(64, 'Salón 212', '', 1, NULL),
(65, 'Salón 213', '', 1, NULL),
(66, 'Laboratorio de EstadÃ­stica', '', 1, NULL),
(67, 'Jefatura de Centro de Computo', '', 1, NULL),
(68, 'Salón 114', '', 1, NULL),
(69, 'M.I.S.', '', 1, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `fk_Carrera_Facultad` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catedratico`
--
ALTER TABLE `catedratico`
  ADD CONSTRAINT `fk_Catedratico_Facultad1` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_Cuenta_Facultad1` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experienciaeducativa`
--
ALTER TABLE `experienciaeducativa`
  ADD CONSTRAINT `fk_experienciaeducativa_Carrera1` FOREIGN KEY (`idCarrera`, `idFacultad`) REFERENCES `carrera` (`idCarrera`, `idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_Carrera1` FOREIGN KEY (`idCarrera`, `idFacultad`) REFERENCES `carrera` (`idCarrera`, `idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_Catedratico1` FOREIGN KEY (`idCatedratico`) REFERENCES `catedratico` (`idCatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_experienciaeducativa1` FOREIGN KEY (`idExperienciaEducativa`) REFERENCES `experienciaeducativa` (`idExperienciaEducativa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_ubicacion1` FOREIGN KEY (`idubicacion`) REFERENCES `ubicacion` (`idubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_publicacion_Facultad1` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacion_registro1` FOREIGN KEY (`idRegistro`) REFERENCES `registro` (`idRegistro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_registro_Cuenta1` FOREIGN KEY (`idCuenta`, `idFacultad`) REFERENCES `cuenta` (`idCuenta`, `idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `fk_ubicacion_Facultad1` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
