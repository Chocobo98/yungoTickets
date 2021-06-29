-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 09:28:01
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yungotickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_paquete` bigint(20) UNSIGNED DEFAULT NULL,
  `fk_mac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_sitios` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `email`, `telefono`, `domicilio`, `fk_paquete`, `fk_mac`, `fk_sitios`) VALUES
(1, 'Paul Nieblas', 'paulN2012@gmail.com', '6645963251', 'Av.Carrazco Fracc.Hacienda del Real #362', 1, NULL, 8),
(4, 'Mario Benson', 'xxx@you.com', '123123124', 'Av.Caballos Santo Domingo', 4, NULL, 12),
(5, 'Vivian Long', 'qwerty@me.com', '135797531', 'Calle Martinez ', 2, '3D:F2:C9:A6:B3:4F', 20),
(7, 'Alexis Gutierrez', 'gutierrezAle@email.com', '6861233215', 'Av.Canciller #245 Fracc.Sevilla', 3, 'B1:C2:D2:A5:C3', 28),
(8, 'Gustavo Martinez', 'tavoR7@red7.com.net', '6862584679', 'Av.Caballeros Fracc.Zodiaco Oriente #666', 5, 'C1:C3:D3:F1:A5:B2', 12),
(11, 'Saul Hernandez', 'osunasaul98@live.com', '6862829507', 'Av.Magallan', 1, NULL, 8),
(12, 'Eliazar Blanco Ochoa', 'ebo@gmail.ar', '4748314329', 'Av.Barcelona Fracc.Portales 9', 4, NULL, 1088),
(13, 'Emiliano Gaytan', 'emiYungo@yungo.mx', '9991234567', 'Av.Militares del Oriente Fracc. Villa Campana #654', 2, NULL, 12),
(14, 'Evo Morales Pinochet', 'emp@callofduty.org.bo', '5623145870', 'Av.Pentitlan Fracc. Andes del Norte #236', 1, NULL, 24),
(15, 'Jose Hernandez Dominguez', 'jhd780301@outlook.com', '6863412756', 'Calle. Diamantes de Toledo #1198 Fracc. Santo Domingo', 4, NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_ticket` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `comentario`, `created_at`, `fk_ticket`) VALUES
(1, 'Vestibulum viverra fermentum mi a posuere. Nulla posuere, nibh sed dignissim vehicula, nisi lectus sollicitudin diam, eget posuere eros massa tempor magna. Fusce molestie lobortis.', '2021-04-23 18:07:38', 20),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec enim elit, dictum sit amet purus at, aliquet mollis arcu. Vivamus venenatis lorem at urna gravida, ut accumsan dui fermentum. Suspendisse.', '2021-04-29 21:40:31', 20),
(3, 'Duis ac vulputate lectus, et eleifend risus. Etiam vulputate erat a nisi feugiat tempus quis ut lectus. Proin fermentum diam vel nunc porttitor, congue dapibus eros luctus. Vestibulum ante ipsum.', '2021-04-29 21:40:31', 20),
(10, 'Comentario de prueba;', '2021-05-10 16:58:28', NULL),
(27, 'Test', '2021-05-10 17:38:51', 20),
(31, 'Prueba de comentario, imprimir en consola o en caja de comentarios', '2021-05-10 17:45:14', 20),
(35, 'Este comentario esta dentro de la BD', '2021-05-10 18:54:03', 20),
(37, 'Prueba', '2021-05-10 18:57:35', 20),
(39, 'Test', '2021-05-10 18:59:35', 20),
(42, 'Prueba de Comentario3er intento', '2021-05-10 19:11:48', 20),
(46, 'Se realizo cambio de Poe', '2021-05-10 19:16:45', 23),
(47, 'Cliente comenta que llevaba dicho problema desde hace 3 dias', '2021-05-10 19:19:04', 23),
(48, 'Se reemplazo por un router nuevo', '2021-05-10 19:34:45', 22),
(49, 'Se le indico no tocar el boton de reset', '2021-05-10 19:35:40', 22),
(50, 'Aptent morbi litora enim morbi rutrum metus varius metus odio ac ac euismod iaculis litora senectus, nisi mattis. In, vulputate ante suscipit nunc arcu ut nam commodo luctus in malesuada duis quis fusce cras. Pulvinar purus massa. Ipsum nulla, lobortis. Nostra ipsum sagittis Nulla fames quis commodo ac. Euismod suscipit.', '2021-05-10 19:43:06', 18),
(52, 'adadas', '2021-05-11 18:44:52', 23),
(53, 'Se cambio por otro modelo de router, se realizaron configuración al mismo para reestablecer servicio', '2021-05-11 19:15:13', 13),
(54, 'Prueba de comentario 2021', '2021-05-12 20:26:19', 20),
(55, 'Se le cambio el ancho de banda, y se verifico funcionalidad del router; se reemplazo este por uno nuevo.', '2021-05-12 20:38:09', 18),
(56, 'Se cambio radio y router, se le subio el ancho de banda', '2021-05-12 20:39:38', 26),
(57, 'Comentario de prueba', '2021-05-12 20:40:03', 26),
(58, 'Se le cambio el paquete de ancho de banda por una mayor', '2021-06-01 22:13:05', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `idFiles` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_ticket` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`idFiles`, `name`, `file_path`, `created_at`, `updated_at`, `fk_ticket`) VALUES
(1, '1621014881_pruebaPing.jpg', '/storage/uploads/1621014880_pruebaPing.jpg', '2021-05-15 00:54:41', '2021-05-15 00:54:41', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `MAC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idInventario` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoEquipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`MAC`, `idInventario`, `modelo`, `marca`, `tipoEquipo`) VALUES
('B1:C2:D2:A5:C3', 1, 'PowerBeam', 'TP-LINK', 'Radio'),
('B1:B2:B3:B4:B5:B6', 3, 'B', 'Ubiquiti', 'Router'),
('C1:C2:C3:C4:C5:C6', 6, 'LiteBeam', 'Ubiquiti', 'Omni'),
('A1:A2:A3:A4:A5:A6', 14, 'X', 'Mercury', 'Septorial'),
('C3:F4:A1:C3:B2:C4', 15, 'LiteBeam', 'Ubiquiti', 'Radio'),
('C1:C3:D3:F1:A5:B2', 16, 'BMC-045', 'TP-LINK', 'Router'),
('3D:F2:C9:A6:B3:4F', 17, 'TP-8', 'Mercusys', 'Router');

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
(4, '2021_03_11_223143_create_table_inventario', 1),
(5, '2021_03_11_223300_create_table_sitios', 1),
(6, '2021_03_11_223319_create_table_paquete', 1),
(7, '2021_03_12_003549_create_table_clientes', 1),
(11, '2021_03_16_163015_create_table_ticket', 2),
(14, '2021_03_16_155546_create_table_reportes', 3),
(15, '2021_03_16_161822_create_table_reportic', 3),
(16, '2021_05_12_212034_create_files_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` bigint(20) UNSIGNED NOT NULL,
  `nombrePaquete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `precio` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `nombrePaquete`, `capacidad`, `precio`) VALUES
(1, 'Elemental10/10', 10, 349.00),
(2, 'Estandar20/20', 20, 499.00),
(3, 'Optimo30/30', 30, 599.00),
(4, 'Invicto50/50', 50, 899.00),
(5, 'Absoluto100/100', 100, 1399.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `idReportes` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportic`
--

CREATE TABLE `reportic` (
  `fk_reporte` bigint(20) UNSIGNED NOT NULL,
  `fk_ticket` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `idSitios` bigint(20) UNSIGNED NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`idSitios`, `zona`) VALUES
(8, 'Alcala'),
(12, 'Santo Domingo'),
(20, 'Bosques del Sol'),
(24, 'Alamitos'),
(28, 'Villa del Cedro'),
(1088, 'Aries');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` bigint(20) UNSIGNED NOT NULL,
  `tipoProblema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_cliente` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `tipoProblema`, `Fecha`, `descripcion`, `estado`, `fk_cliente`) VALUES
(1, 'Otros', '2021-03-17 16:49:31', 'Mi router enciende y apaga constantemente', 'Abierto', 5),
(4, 'Red no Detectada', '2021-03-17 17:06:31', 'Mi dispositivo no puede detectarse a pesar que esta conectada a la corriente', 'Nuevo', 4),
(5, 'Bloqueo de Paginas', '2021-03-17 17:07:30', 'No puedo ingresar a Facebook pero todas la demas si', 'Nuevo', 5),
(6, 'Problemas con aplicaciones', '2021-03-17 17:08:40', 'Mi internet falla mucho cuando uso Netflix, pero con otras paginas funciona bien', 'Nuevo', 1),
(8, 'Problemas con Otros dispositivos', '2021-03-17 17:10:30', 'Solo puedo conectar 3 telefonos, pero cuando conecto la tele desconectada a todos', 'Nuevo', 4),
(9, 'Problemas con Otros dispositivos', '2021-03-17 17:11:04', 'Me falla el internet', 'Abierto', 5),
(10, 'Desconexiones', '2021-03-17 17:11:39', 'Se me desconecta mucho', 'Nuevo', 4),
(11, 'Problemas con conexion de dispositivos', '2021-03-17 17:12:14', 'Mi telefono no se conecta pero mi pc si', 'Nuevo', 1),
(12, 'Otros', '2021-03-19 12:12:39', 'Como puedo generar una factura', 'Nuevo', 4),
(13, 'Desconexiones', '2021-04-01 17:12:35', 'Presenta mucha desconexiones, el radio funciona perfectamente pero el router cancela la señal cada rato. Checar fisicamente con el cliente.', 'Resuelto', 8),
(14, 'Bloqueo de Paginas', '2021-04-01 09:16:33', 'Cliente reporta que no le deja ingresar a Facebook y Youtube, pero otras paginas como Twitch e Instagram funcionan', 'Nuevo', 7),
(15, 'Desconexiones', '2021-04-18 17:44:25', 'Cliente registra que tiene 500 de ping en los juegos en linea, nunca gana :c', 'Nuevo', 12),
(16, 'Problemas con Otros Dispositivos', '2021-04-18 18:10:26', 'a', 'Abierto', 12),
(17, 'Cobertura', '2021-04-18 19:29:04', 'allala', 'Abierto', 11),
(18, 'Ancho de Banda', '2021-04-19 09:30:55', 'Cliente comenta que no le llega el ancho de banda contratado', 'Resuelto', 12),
(19, 'Otros', '2021-04-20 16:28:36', 'Cliente comenta que no puede jugar en un juego en especifico, pero cuando usa datos moviles si logra acceder', 'Nuevo', 13),
(20, 'Desconexiones', '2021-04-20 17:07:19', 'Router falla constantemente', 'Abierto', 8),
(21, 'Cobertura', '2021-04-27 09:20:28', 'No logra llegar al cuarto del segundo piso, poner repetidor', 'Nuevo', 7),
(22, 'Radio Defectuoso', '2021-04-27 09:21:02', 'Cliente comenta que el radio se reinicia cada hora, hacer reemplazo por uno nuevo', 'Nuevo', 13),
(23, 'Radio Defectuoso', '2021-05-03 07:49:55', 'El Poe se quemo, se solicita reemplazo', 'Resuelto', 5),
(24, 'Ancho de Banda', '2021-05-11 11:46:30', 'No le llega el ancho de banda contratado', 'Resuelto', 8),
(25, 'Ancho de Banda', '2021-05-11 11:46:54', 'Registra 5mb de bajada y 15 de subida desde hace 3 dias', 'Abierto', 8),
(26, 'Ancho de Banda', '2021-05-11 11:47:33', 'No le llega lo contratado desde hace una semana, las descargas no sobrepasan del 1mb/s', 'Resuelto', 8),
(27, 'Radio Defectuoso', '2021-05-25 10:55:41', 'Radio no enciende, enviar personal para chequeo fisico', 'Nuevo', 5),
(28, 'Problemas con Aplicaciones', '2021-05-25 10:57:54', 'No logra entrar a netflix, pero si a otras aplicaciones en su telefono y smarttv', 'Abierto', 7),
(30, 'Bloqueo de Paginas', '2021-06-01 14:22:14', 'Twitch y Youtube no se le permite reproducir videos, pero en FB y Tiktok funciona sin problemas', 'Nuevo', 11),
(31, 'Red no Detectada', '2021-06-01 14:22:57', 'El telefono del cliente no detecta la red, ni la laptop. Solo el dispositivo que esta conectado en la red directamente con el router.', 'Nuevo', 12),
(32, 'Ancho de Banda', '2021-06-01 14:23:37', 'Tiene contratado 20 mb pero nomas le llegan 5, favor de confirmar radio y de tal caso; reemplazarlo.', 'Nuevo', 4),
(33, 'Desconexiones', '2021-06-01 14:24:45', 'Durante las madrugadas su servicio falla constantemente, se sabe que desde que hizo viento los ultimos dias se haya cambiado de orientacion el radio. Favor de ir a revisar con personal tecnico al domicilio.', 'Abierto', 13),
(34, 'Cobertura', '2021-06-01 14:25:37', 'El radio no daba servicio hasta el cuarto mas lejano de la casa, se cambio por un Nano beam', 'Resuelto', 1),
(35, 'Cobertura', '2021-06-02 17:52:09', 'No le llega el internet en el tercer piso de su casa', 'Nuevo', 1),
(36, 'Desconexiones', '2021-06-02 17:53:57', 'Descripcion de prueba', 'Abierto', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`),
  ADD KEY `clientes_fk_paquete_foreign` (`fk_paquete`),
  ADD KEY `clientes_fk_mac_foreign` (`fk_mac`),
  ADD KEY `clientes_fk_sitios_foreign` (`fk_sitios`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_ticket` (`fk_ticket`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idFiles`),
  ADD KEY `files_fk_ticket_foreign` (`fk_ticket`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `idInventario` (`idInventario`),
  ADD KEY `MAC` (`MAC`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`idReportes`);

--
-- Indices de la tabla `reportic`
--
ALTER TABLE `reportic`
  ADD KEY `reportic_fk_reporte_foreign` (`fk_reporte`),
  ADD KEY `reportic_fk_ticket_foreign` (`fk_ticket`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`idSitios`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `ticket_fk_cliente_foreign` (`fk_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `idFiles` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idPaquete` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `idReportes` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
  MODIFY `idSitios` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_fk_mac_foreign` FOREIGN KEY (`fk_mac`) REFERENCES `inventario` (`MAC`) ON DELETE CASCADE,
  ADD CONSTRAINT `clientes_fk_paquete_foreign` FOREIGN KEY (`fk_paquete`) REFERENCES `paquete` (`idPaquete`) ON DELETE CASCADE,
  ADD CONSTRAINT `clientes_fk_sitios_foreign` FOREIGN KEY (`fk_sitios`) REFERENCES `sitios` (`idSitios`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`fk_ticket`) REFERENCES `ticket` (`idTicket`) ON DELETE CASCADE;

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_fk_ticket_foreign` FOREIGN KEY (`fk_ticket`) REFERENCES `ticket` (`idTicket`);

--
-- Filtros para la tabla `reportic`
--
ALTER TABLE `reportic`
  ADD CONSTRAINT `reportic_fk_reporte_foreign` FOREIGN KEY (`fk_reporte`) REFERENCES `reportes` (`idReportes`) ON DELETE CASCADE,
  ADD CONSTRAINT `reportic_fk_ticket_foreign` FOREIGN KEY (`fk_ticket`) REFERENCES `ticket` (`idTicket`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_fk_cliente_foreign` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
