-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2017 a las 23:04:06
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamesodyssey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `Total`, `idUsuario`, `idEstado`) VALUES
(1, 50000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritodetalle`
--

CREATE TABLE `carritodetalle` (
  `id` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carritodetalle`
--

INSERT INTO `carritodetalle` (`id`, `idCarrito`, `idJuego`, `Cantidad`, `Subtotal`) VALUES
(1, 1, 1, 5, 50000),
(2, 1, 2, 2, 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(10) NOT NULL,
  `categoria` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categoria`) VALUES
(1, 'aventura'),
(2, 'creepy'),
(6, 'shooter'),
(7, 'Terror'),
(8, 'racing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consola`
--

CREATE TABLE `consola` (
  `idConsola` int(11) NOT NULL,
  `consola` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consola`
--

INSERT INTO `consola` (`idConsola`, `consola`) VALUES
(1, 'ps4'),
(2, 'ps3'),
(3, 'xbox'),
(4, 'nintendo64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'preparado'),
(2, 'preparando'),
(3, 'despachado'),
(4, 'entregado'),
(5, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `idJuego` int(10) NOT NULL,
  `nombreJuego` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `anho` int(4) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `url` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `idCategoria` int(10) NOT NULL,
  `idConsola` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`idJuego`, `nombreJuego`, `descripcion`, `anho`, `precio`, `stock`, `url`, `idCategoria`, `idConsola`) VALUES
(1, 'resident evil', 'apocalipsis zombie sobrevivencia', 1990, 10000, 49, '../img/juegos/residentEvil.jpg', 2, 1),
(2, 'lastofUs', 'The Last of Us es un videojuego de acción-aventura y survival horror ', 2013, 15000, 50, '../img/juegos/lastofus.jpg', 2, 1),
(3, 'Resident evil 7', 'Resident Evil 7 (estilizado como RESIDENT E\'VII. biohazard), conocido en Japón como Biohazard 7: Resident Evil (estilizado como BIOHA7ARD) es un videojuego de survival horror desarrollado por la empresa Capcom, lanzado el 24 de enero de 2017 para Microsoft Windows, PlayStation 4 y Xbox One, con una versión de PlayStation 4 con soporte completo para el PlayStation VR. Es el undécimo título de la serie principal de Resident Evil, y, a diferencia de los otros juegos de la franquicia, es en primera ', 2017, 45000, 50, '../img/juegos/residenevil7.jpg\r\n', 7, 1),
(4, 'Kingdom Hearts III', 'Kingdom Hearts III es un ARPG actualmente en desarrollo por Square Enix y que será publicado por la misma empresa para las consolas PlayStation 4 y Xbox One. Fue anunciado en el E3 2013, y en la D23 Expo se confirmó su fecha para 2018', 2017, 50000, 100, '../img/juegos/kingdom.jpg\r\n', 1, 1),
(5, 'Destiny: Rise of Iron ', 'estiny: Rise of Iron is a major expansion for Bungie\'s first-person shooter, Destiny. The expansion was released on September 20, 2016, as the fourth and last expansion of Destiny. It revolves around the Fallen enemy race, as they have breached the Wall that surrounds Earth\'s last safe city and are utilizing the SIVA virus, a Golden Age nanotechnology characterized by self-replication and self-assembly.', 2016, 35000, 100, '../img/juegos/destiny.jpg\r\n', 2, 1),
(6, 'Kingdom Hearts III', 'Kingdom Hearts III es un ARPG actualmente en desarrollo por Square Enix y que será publicado por la misma empresa para las consolas PlayStation 4 y Xbox One. Fue anunciado en el E3 2013, y en la D23 Expo se confirmó su fecha para 2018', 2017, 50000, 100, '../img/juegos/kingdom.jpg\r\n', 1, 1),
(7, 'Destiny: Rise of Iron ', 'estiny: Rise of Iron is a major expansion for Bungie\'s first-person shooter, Destiny. The expansion was released on September 20, 2016, as the fourth and last expansion of Destiny. It revolves around the Fallen enemy race, as they have breached the Wall that surrounds Earth\'s last safe city and are utilizing the SIVA virus, a Golden Age nanotechnology characterized by self-replication and self-assembly.', 2016, 35000, 100, '../img/juegos/destiny.jpg\r\n', 2, 1),
(8, 'Mario Kart 8 Deluxe NSW', 'Mario Kart 8 Deluxe es un videojuego de carreras desarrollado y publicado por Nintendo para la consola Nintendo Switch. Es la undécima entrega de la serie Mario Kart, novena en consolas de Nintendo. Se lanzó en todo el mundo el 28 de abril de 2017', 2017, 60000, 100, '../img/juegos/mariokart8.png\r\n', 8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `rut` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nombreUsuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Dirección` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `rut`, `nombreUsuario`, `email`, `Dirección`, `contrasena`) VALUES
(1, '1-9', 'usuario', 'usuario@usuario.cl', 'alguna direccion', 'usuario123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`);

--
-- Indices de la tabla `carritodetalle`
--
ALTER TABLE `carritodetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `consola`
--
ALTER TABLE `consola`
  ADD PRIMARY KEY (`idConsola`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`idJuego`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `carritodetalle`
--
ALTER TABLE `carritodetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `consola`
--
ALTER TABLE `consola`
  MODIFY `idConsola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `idJuego` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
