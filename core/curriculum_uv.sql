-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2022 a las 20:06:00
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curriculum_uv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciondocente`
--

CREATE TABLE `actualizaciondocente` (
  `actualizacion_key` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `instituto` varchar(150) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `yearObtencion` int(11) NOT NULL,
  `noHoras` int(11) NOT NULL,
  `persona_fkey` int(11) NOT NULL,
  `tipo_actualizacion` int(11) NOT NULL COMMENT '1= capacitacion docente, actualizacion disiplinar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciondocente`
--

CREATE TABLE `capacitaciondocente` (
  `capacitacion_key` int(11) NOT NULL COMMENT '1= capacitacion docente, 2 = actualizacion disiplinar',
  `tipo` varchar(200) NOT NULL,
  `instituto` varchar(150) NOT NULL,
  `pais` varchar(150) NOT NULL,
  `yearObtencion` int(11) NOT NULL,
  `noHoras` int(11) NOT NULL,
  `persona_fkey` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capacitaciondocente`
--

INSERT INTO `capacitaciondocente` (`capacitacion_key`, `tipo`, `instituto`, `pais`, `yearObtencion`, `noHoras`, `persona_fkey`, `titulo`) VALUES
(4, '1', 'tec monterrey', 'mexico', 2017, 80, 1, 'prueba de titulo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experienciadiseno`
--

CREATE TABLE `experienciadiseno` (
  `expediseno_key` int(11) NOT NULL,
  `organismo` varchar(150) NOT NULL,
  `periodo` int(11) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `cargo` tinyint(1) NOT NULL,
  `especificargo` varchar(120) DEFAULT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `experienciadiseno`
--

INSERT INTO `experienciadiseno` (`expediseno_key`, `organismo`, `periodo`, `nivel`, `cargo`, `especificargo`, `persona_fkey`) VALUES
(1, 'ministerio de educacion', 2, 3, 2, '', 1),
(3, 'secretaria de derechos humanos', 1, 3, 5, 'promotor extra', 1),
(4, 'union europea', 3, 2, 5, 'jefe zuko', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experienciaprofecional`
--

CREATE TABLE `experienciaprofecional` (
  `experiencia_key` int(11) NOT NULL,
  `puesto` varchar(150) DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `experienciaprofecional`
--

INSERT INTO `experienciaprofecional` (`experiencia_key`, `puesto`, `empresa`, `fecha_inicio`, `fecha_fin`, `persona_fkey`) VALUES
(1, 'Gerente de ventas', 'General motos mexico s.a', '2009-06-01', '2020-07-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacionademica`
--

CREATE TABLE `formacionademica` (
  `formacion_key` int(11) NOT NULL,
  `nivel` char(3) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `instituto` varchar(150) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `yearObtencion` int(11) NOT NULL,
  `noCedula` int(11) NOT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formacionademica`
--

INSERT INTO `formacionademica` (`formacion_key`, `nivel`, `titulo`, `instituto`, `pais`, `yearObtencion`, `noCedula`, `persona_fkey`) VALUES
(4, 'L', 'ing. sistemas', 'ito', 'mexico', 2017, 123456789, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestionacademica`
--

CREATE TABLE `gestionacademica` (
  `gestion_key` int(11) NOT NULL,
  `puesto` varchar(150) NOT NULL,
  `instituto` varchar(150) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `actual` tinyint(1) NOT NULL COMMENT '1= actual 2= no actual',
  `persona_fkey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestionacademica`
--

INSERT INTO `gestionacademica` (`gestion_key`, `puesto`, `instituto`, `fecha_inicio`, `fecha_fin`, `actual`, `persona_fkey`) VALUES
(2, 'prefectura', 'universidad zacateca', '2019-02-01', '2021-06-01', 1, 1),
(4, 'prueba de gestion', 'TEC ANAUAC', '2022-02-25', '2022-01-03', 2, 1),
(5, 'profesor', 'colegio de la uname', '2020-01-01', '1970-01-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logrosprofesionales`
--

CREATE TABLE `logrosprofesionales` (
  `logro_key` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logrosprofesionales`
--

INSERT INTO `logrosprofesionales` (`logro_key`, `descripcion`, `persona_fkey`) VALUES
(2, 'se registra nuevo logro profesional', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacioneventos`
--

CREATE TABLE `participacioneventos` (
  `participacion_key` int(11) NOT NULL,
  `organismo` varchar(150) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `periodo` tinyint(4) NOT NULL COMMENT 'periodo en anios',
  `nivel` tinyint(1) NOT NULL,
  `especifinivel` varchar(150) DEFAULT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participacioneventos`
--

INSERT INTO `participacioneventos` (`participacion_key`, `organismo`, `fecha_inicio`, `periodo`, `nivel`, `especifinivel`, `persona_fkey`) VALUES
(1, 'ministerio de educacion', '2022-01-05', 2, 6, 'especificando', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `persona_key` int(11) NOT NULL COMMENT 'llave primaria de la tabla',
  `apPaterno` varchar(20) DEFAULT NULL,
  `apMaterno` varchar(20) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `noProfesor` int(11) NOT NULL,
  `nombramiento` varchar(150) DEFAULT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  `fechaContratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`persona_key`, `apPaterno`, `apMaterno`, `nombre`, `fechaNacimiento`, `noProfesor`, `nombramiento`, `antiguedad`, `fechaContratacion`) VALUES
(1, 'castro', 'barradas', 'juan miguel', '1994-02-03', 123456, 'desarrollador de software', 5, '2017-03-01'),
(2, 'castro do', 'barradas', 'juan miguel', '1994-02-03', 654321, 'desarrollador de software', 5, '2017-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoacademico`
--

CREATE TABLE `productoacademico` (
  `producto_key` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoacademico`
--

INSERT INTO `productoacademico` (`producto_key`, `descripcion`, `persona_fkey`) VALUES
(4, 'prueeeba de textttto, se registra valores, prueba de texto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `profesor_key` int(11) NOT NULL,
  `identificador` int(11) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estatus` tinyint(1) NOT NULL COMMENT '1= admin 2= profesor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`profesor_key`, `identificador`, `contrasena`, `estatus`) VALUES
(1, 123456, 'uv2022', 2),
(2, 654321, 'uv2022', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reconocimiento`
--

CREATE TABLE `reconocimiento` (
  `reconocimiento_key` int(11) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `persona_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reconocimiento`
--

INSERT INTO `reconocimiento` (`reconocimiento_key`, `descripcion`, `persona_fkey`) VALUES
(2, 'se registra un segundo reconocimiento, se moifca texto', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizaciondocente`
--
ALTER TABLE `actualizaciondocente`
  ADD PRIMARY KEY (`actualizacion_key`),
  ADD KEY `ActualizacionDisiplinar_FK` (`persona_fkey`);

--
-- Indices de la tabla `capacitaciondocente`
--
ALTER TABLE `capacitaciondocente`
  ADD PRIMARY KEY (`capacitacion_key`),
  ADD KEY `capacitacionDocente_FK` (`persona_fkey`);

--
-- Indices de la tabla `experienciadiseno`
--
ALTER TABLE `experienciadiseno`
  ADD PRIMARY KEY (`expediseno_key`);

--
-- Indices de la tabla `experienciaprofecional`
--
ALTER TABLE `experienciaprofecional`
  ADD PRIMARY KEY (`experiencia_key`),
  ADD KEY `experienciaProfecional_FK` (`persona_fkey`);

--
-- Indices de la tabla `formacionademica`
--
ALTER TABLE `formacionademica`
  ADD PRIMARY KEY (`formacion_key`),
  ADD KEY `formacionAdemica_FK` (`persona_fkey`);

--
-- Indices de la tabla `gestionacademica`
--
ALTER TABLE `gestionacademica`
  ADD PRIMARY KEY (`gestion_key`),
  ADD KEY `gestionAcademica_FK` (`persona_fkey`);

--
-- Indices de la tabla `logrosprofesionales`
--
ALTER TABLE `logrosprofesionales`
  ADD PRIMARY KEY (`logro_key`),
  ADD KEY `logrosProfesionales_FK` (`persona_fkey`);

--
-- Indices de la tabla `participacioneventos`
--
ALTER TABLE `participacioneventos`
  ADD PRIMARY KEY (`participacion_key`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`persona_key`);

--
-- Indices de la tabla `productoacademico`
--
ALTER TABLE `productoacademico`
  ADD PRIMARY KEY (`producto_key`),
  ADD KEY `productoAcademico_FK` (`persona_fkey`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`profesor_key`);

--
-- Indices de la tabla `reconocimiento`
--
ALTER TABLE `reconocimiento`
  ADD PRIMARY KEY (`reconocimiento_key`),
  ADD KEY `reconocimiento_FK` (`persona_fkey`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizaciondocente`
--
ALTER TABLE `actualizaciondocente`
  MODIFY `actualizacion_key` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `capacitaciondocente`
--
ALTER TABLE `capacitaciondocente`
  MODIFY `capacitacion_key` int(11) NOT NULL AUTO_INCREMENT COMMENT '1= capacitacion docente, 2 = actualizacion disiplinar', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `experienciadiseno`
--
ALTER TABLE `experienciadiseno`
  MODIFY `expediseno_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `experienciaprofecional`
--
ALTER TABLE `experienciaprofecional`
  MODIFY `experiencia_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formacionademica`
--
ALTER TABLE `formacionademica`
  MODIFY `formacion_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gestionacademica`
--
ALTER TABLE `gestionacademica`
  MODIFY `gestion_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `logrosprofesionales`
--
ALTER TABLE `logrosprofesionales`
  MODIFY `logro_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `participacioneventos`
--
ALTER TABLE `participacioneventos`
  MODIFY `participacion_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `persona_key` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primaria de la tabla', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productoacademico`
--
ALTER TABLE `productoacademico`
  MODIFY `producto_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `profesor_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reconocimiento`
--
ALTER TABLE `reconocimiento`
  MODIFY `reconocimiento_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizaciondocente`
--
ALTER TABLE `actualizaciondocente`
  ADD CONSTRAINT `ActualizacionDisiplinar_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `capacitaciondocente`
--
ALTER TABLE `capacitaciondocente`
  ADD CONSTRAINT `capacitacionDocente_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experienciaprofecional`
--
ALTER TABLE `experienciaprofecional`
  ADD CONSTRAINT `experienciaProfecional_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacionademica`
--
ALTER TABLE `formacionademica`
  ADD CONSTRAINT `formacionAdemica_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestionacademica`
--
ALTER TABLE `gestionacademica`
  ADD CONSTRAINT `gestionAcademica_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logrosprofesionales`
--
ALTER TABLE `logrosprofesionales`
  ADD CONSTRAINT `logrosProfesionales_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`);

--
-- Filtros para la tabla `productoacademico`
--
ALTER TABLE `productoacademico`
  ADD CONSTRAINT `productoAcademico_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reconocimiento`
--
ALTER TABLE `reconocimiento`
  ADD CONSTRAINT `reconocimiento_FK` FOREIGN KEY (`persona_fkey`) REFERENCES `persona` (`persona_key`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
