-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 11:32:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_practicas`
--
CREATE DATABASE IF NOT EXISTS `gestion_practicas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_practicas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `apellidos`, `dni`, `telefono`) VALUES
(22, 'Candy', 'Seres', '94572653D', 2147483647),
(23, 'Elva', 'Kornyshev', '78891904D', 2147483647),
(24, 'Austen', 'Cawkill', '56225371W', 2147483647),
(26, 'Alaric', 'Syphus', '77614972T', 2147483647),
(27, 'Frankie', 'Drummond', '39061953Z', 1503228914),
(28, 'Courtney', 'Dolling', '06232514B', 1769328570),
(29, 'Adrien', 'Edwardson', '30436061C', 2147483647),
(30, 'Laird', 'Philbrick', '25834499V', 2147483647),
(31, 'Griffith', 'Bienvenu', '23383206V', 1081704472),
(32, 'Marc', 'Grimsley', '29214894I', 2147483647),
(33, 'Venita', 'Scorton', '99157882Y', 1775791656),
(34, 'Kaela', 'Pingstone', '34595483A', 2147483647),
(35, 'Karalynn', 'Shitliffe', '90426610C', 2147483647),
(36, 'Floyd', 'Slowgrave', '46852017V', 2147483647),
(37, 'Ray', 'McGilleghole', '80199840T', 2147483647),
(38, 'Cassie', 'Traynor', '43917454Q', 1661858681),
(39, 'Alvy', 'Farrington', '12548407I', 1929817631),
(40, 'Rene', 'Dytham', '29212894T', 2147483647),
(41, 'Tammie', 'Kwietak', '34894585V', 2147483647),
(47, 'Último Alumno', 'Último Alumno', '1234567', 1234567),
(48, 'ftrwsertsertwert', 'wsertwertwertwert', '123456789', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_asignado_empresa`
--

CREATE TABLE `alumno_asignado_empresa` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno_asignado_empresa`
--

INSERT INTO `alumno_asignado_empresa` (`id`, `id_alumno`, `id_empresa`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 23, 14, '2022-04-12', '2022-04-12'),
(5, 22, 1, '2022-04-12', '2022-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(200) NOT NULL,
  `email_empresa` varchar(25) NOT NULL,
  `telefono_empresa` int(11) NOT NULL,
  `url_empresa` varchar(100) NOT NULL,
  `responsable_empresa` varchar(200) NOT NULL,
  `estado_empresa` enum('Por contactar','Contactado','No interesado','Interesado') NOT NULL,
  `tutor_empresa` varchar(200) NOT NULL,
  `convenio_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `anexo_1_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `anexo_8_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `rlt_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion_empresa`, `email_empresa`, `telefono_empresa`, `url_empresa`, `responsable_empresa`, `estado_empresa`, `tutor_empresa`, `convenio_estado`, `anexo_1_estado`, `anexo_8_estado`, `rlt_estado`) VALUES
(1, 'Euroformac', 'Avenida Ortega y Gasset, nº 54', 'info@euroformac.com', 666666666, 'https://euroformac.com', 'Fco Palacios', 'Contactado', 'Fco Palacios', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(4, 'Gabtype', '696 Maple Wood Terrace', 'cshackesby2@parallels.com', 339, 'http://netvibes.com/at/nibh.html', 'Curran Shackesby', 'No interesado', 'Curran Shackesby', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(5, 'Oozz', '365 David Road', 'bbrandli3@spiegel.de', 369, 'http://nasa.gov/fermentum/justo/nec.png?risus=dapibus&praesent=duis&lectus=at&vestibulum=velit&quam=', 'Bab Brandli', 'Interesado', 'Bab Brandli', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(6, 'Jaloo', '87935 Meadow Valley Park', 'gconkay4@tuttocitta.it', 172, 'http://squarespace.com/neque/sapien/placerat/ante.jpg?commodo=interdum&vulputate=mauris&justo=non&in', 'Gal Conkay', 'Contactado', 'Gal Conkay', 'Enviado', 'Firmado', 'Enviado', 'Por enviar'),
(7, 'Trilia', '079 Stuart Lane', 'abigrigg5@joomla.org', 300, 'http://cyberchimps.com/morbi/a/ipsum/integer/a/nibh/in.xml?facilisi=aenean&cras=auctor&non=gravida&v', 'Adriaens Bigrigg', 'Por contactar', 'Adriaens Bigrigg', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(8, 'Eare', '154 Summer Ridge Avenue', 'ltoulch6@narod.ru', 487, 'http://opera.com/justo/aliquam/quis/turpis/eget.json?convallis=diam&nulla=erat&neque=fermentum&liber', 'Lynnette Toulch', 'Por contactar', 'Lynnette Toulch', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(9, 'Rhycero', '35014 Crest Line Trail', 'gclough7@shinystat.com', 922, 'https://dot.gov/euismod/scelerisque/quam/turpis/adipiscing/lorem.jpg?eget=donec&tincidunt=pharetra&e', 'Gertrudis Clough', 'Por contactar', 'Gertrudis Clough', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(10, 'Jatri', '45 Corben Park', 'ccodner8@tripod.com', 407, 'https://wired.com/sapien/placerat/ante/nulla.jsp?ut=quam&erat=pede&id=lobortis&mauris=ligula&vulputa', 'Cleveland Codner', 'Por contactar', 'Cleveland Codner', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(11, 'Kare', '436 Dottie Plaza', 'tkeitley9@cloudflare.com', 210, 'http://gmpg.org/luctus/cum/sociis/natoque/penatibus/et.png?nulla=nulla&nunc=justo&purus=aliquam&phas', 'Tabitha Keitley', 'Por contactar', 'Tabitha Keitley', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(12, 'Kare', '789 Shasta Way', 'ccutilla@slideshare.net', 827, 'http://tinypic.com/porta/volutpat/quam/pede/lobortis/ligula.html?congue=erat&risus=volutpat', 'Candie Cutill', 'Por contactar', 'Candie Cutill', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(13, 'Zoomlounge', '6 Bellgrove Trail', 'reringtonb@oakley.com', 644, 'http://skyrock.com/leo/maecenas.html?fusce=orci&lacus=luctus&purus=et&aliquet=ultrices&at=posuere&fe', 'Rocky Erington', 'Por contactar', 'Rocky Erington', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(14, 'Aimbo', '85 Mcguire Junction', 'nbaulcombec@constantconta', 936, 'https://sbwire.com/ipsum/ac/tellus/semper/interdum/mauris/ullamcorper.json?donec=pellentesque&ut=ult', 'Nicole Baulcombe', 'Por contactar', 'Nicole Baulcombe', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(16, 'Meembee', '543 Goodland Parkway', 'tgilbertsone@ucoz.ru', 833, 'http://cnet.com/luctus/et.json?metus=nascetur&vitae=ridiculus&ipsum=mus&aliquam=etiam&non=vel&mauris', 'Tait Gilbertson', 'Por contactar', 'Tait Gilbertson', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(18, 'Rhynyx', '3834 Sachs Hill', 'aelyg@printfriendly.com', 298, 'http://usda.gov/erat/tortor.json?vitae=feugiat&quam=et&suspendisse=eros&potenti=vestibulum&nullam=ac', 'Anny Ely', 'Por contactar', 'Anny Ely', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(19, 'Browsecat', '77080 Calypso Crossing', 'pkilbornh@aboutads.info', 440, 'https://zdnet.com/in/hac/habitasse/platea/dictumst/etiam/faucibus.js?nulla=odio&sed=cras&accumsan=mi', 'Perkin Kilborn', 'Por contactar', 'Perkin Kilborn', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(20, 'Ozu', '80154 Dayton Alley', 'vmacpeicei@uiuc.edu', 252, 'https://cargocollective.com/urna/ut/tellus.jpg', 'Vivyan MacPeice', 'Por contactar', 'Vivyan MacPeice', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(21, 'Topiclounge', '45 Starling Place', 'adowsj@reuters.com', 795, 'https://networksolutions.com/turpis/adipiscing/lorem.html?nisi=varius&vulputate=nulla&nonummy=facili', 'Antonino Dows', 'Por contactar', 'Antonino Dows', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `fecha_incidencia` date NOT NULL,
  `texto_incidencia` text NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `fecha_incidencia`, `texto_incidencia`, `id_empresa`) VALUES
(4, '2021-09-14', 'Nulla nisl fvhdfgh. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 4),
(5, '2021-04-26', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', 14),
(6, '2022-01-19', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 19),
(7, '2021-06-05', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.', 7),
(8, '2021-06-18', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.', 19),
(9, '2021-10-28', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum.', 5),
(10, '2021-04-28', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 16),
(11, '2021-09-07', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 13),
(13, '2021-11-14', 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.', 18),
(14, '2022-02-10', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.', 18),
(15, '2021-09-06', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 18),
(16, '2021-08-23', 'Nullam molestie nibh in lectus. Pellentesque at nulla.', 8),
(17, '2021-06-05', 'Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 9),
(18, '2021-09-16', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 1),
(19, '2022-01-29', 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', 10),
(20, '2022-03-07', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 6),
(21, '2021-09-16', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue.', 14),
(22, '2021-12-27', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 21),
(23, '2022-04-05', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', 8),
(24, '2022-03-12', 'Nullam varius. Nulla facilisi.', 12),
(25, '2021-06-21', 'Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 1),
(27, '2022-03-02', 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 21),
(28, '2021-11-15', 'Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.', 18),
(29, '2021-11-04', 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', 16),
(30, '2022-03-13', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim.', 16),
(31, '2022-03-29', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 19),
(32, '2021-08-08', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 14),
(33, '2021-05-11', 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', 16),
(34, '2021-06-05', 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', 6),
(35, '2021-04-20', 'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', 13),
(36, '2021-06-27', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 4),
(37, '2022-02-15', 'Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.', 8),
(38, '2021-05-19', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 16),
(39, '2021-10-02', 'Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 1),
(40, '2022-01-11', 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 13),
(41, '2022-03-19', 'Pellentesque viverra pede ac diam.', 12),
(42, '2021-07-26', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 5),
(43, '2022-04-07', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 11),
(44, '2021-09-11', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus.', 5),
(45, '2021-09-15', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 5),
(46, '2022-02-10', 'Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', 1),
(47, '2021-12-24', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus.', 11),
(48, '2021-04-20', 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', 4),
(49, '2021-09-23', 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', 21),
(50, '2021-12-16', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis.', 7),
(51, '2022-02-23', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.', 5),
(52, '2022-04-13', 'dfghdfghdfghdfghdfghdfghdfghdfgh', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre_completo`) VALUES
(1, 'fpalacioschaves', 'grespelen601', 'Fco Palacios Chaves');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `alumno_asignado_empresa`
--
ALTER TABLE `alumno_asignado_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumno` (`id_alumno`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `alumno_asignado_empresa`
--
ALTER TABLE `alumno_asignado_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_asignado_empresa`
--
ALTER TABLE `alumno_asignado_empresa`
  ADD CONSTRAINT `fk_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
