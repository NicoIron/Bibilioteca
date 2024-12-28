-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 28, 2024 at 04:56 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `Actores`
--

CREATE TABLE `Actores` (
  `ID_Actor` int NOT NULL,
  `Nombre_Actor` varchar(85) DEFAULT NULL,
  `Apellidos_Actor` varchar(150) DEFAULT NULL,
  `FechaNacimiento_Actor` date DEFAULT NULL,
  `Nacionalidad_Actor` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Actores`
--

INSERT INTO `Actores` (`ID_Actor`, `Nombre_Actor`, `Apellidos_Actor`, `FechaNacimiento_Actor`, `Nacionalidad_Actor`) VALUES
(1, 'Jake', 'Gyllenhaal', '1980-12-19', 'USA'),
(2, 'Kristy', 'Swanson', '1969-12-19', 'USA'),
(3, 'Mike', 'Angelo', '1989-12-19', 'Thailand'),
(4, 'Marcello', 'Mastroianni', '1996-12-19', 'Italy'),
(5, 'Ronald', 'Howard', '1918-04-07', 'England'),
(6, 'Gary', 'Coleman', '1968-02-08', 'USA'),
(7, 'Julianne', 'Moore', '1960-12-03', 'USA'),
(8, 'Emma', 'Stone', '1988-11-06', 'USA'),
(9, 'Scarlett', 'Johansson', '1984-11-22', 'USA'),
(10, 'Zendaya Maree', 'Stoermer Coleman', '1996-09-01', 'USA'),
(11, 'Nicolas', 'Cage', '1964-01-07', 'USA'),
(12, 'Tom', 'Cruise', '1962-07-03', 'USA'),
(13, 'Dakota', 'Fanning', '1994-02-23', 'USA'),
(14, 'Aidan', 'Gallagher', '2003-09-18', 'USA'),
(15, 'Jackie', 'Chan', '1954-04-07', 'Hong Kong'),
(16, 'Pedro', 'Pascal', '1977-04-02', 'Chile'),
(17, 'Bella', 'Ramsey', '2001-09-30', 'England'),
(18, 'Eva', 'Green', '1980-07-06', 'France'),
(19, 'Christopher', 'Nolan', '1970-07-30', 'England'),
(20, 'Angelina', 'Jolie', '1975-06-04', 'USA'),
(21, 'Luke', 'Grimes', '1984-01-21', 'USA'),
(22, 'Matt', 'Damon', '1970-10-08', 'USA'),
(23, 'Morgan', 'Freeman', '1937-06-01', 'USA'),
(24, 'Jenna', 'Ortega', '2002-09-27', 'USA'),
(25, 'Ed', 'Lauter', '1940-10-30', 'USA'),
(26, 'Tom', 'Hanks', '1956-07-09', 'USA'),
(27, 'Samuel L.', 'Jackson', '1948-12-21', 'USA'),
(28, 'Robert', 'Downey Jr.', '1965-04-04', 'USA'),
(29, 'Owen', 'Wilson', '1968-11-18', 'USA'),
(30, 'Keanu', 'Reeves', '1964-09-02', 'Lebanon');

-- --------------------------------------------------------

--
-- Table structure for table `Directores`
--

CREATE TABLE `Directores` (
  `ID_Director` int NOT NULL,
  `Nombre_Director` varchar(85) DEFAULT NULL,
  `Apellidos_Director` varchar(150) DEFAULT NULL,
  `FechaNacimiento_Director` date DEFAULT NULL,
  `Nacionalidad_Director` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Directores`
--

INSERT INTO `Directores` (`ID_Director`, `Nombre_Director`, `Apellidos_Director`, `FechaNacimiento_Director`, `Nacionalidad_Director`) VALUES
(1, 'Quentin', 'Tarantino', '1963-03-27', 'USA'),
(2, 'David', 'Fincher', '1962-08-28', 'USA'),
(5, 'Denis', 'Villeneuve', '1967-10-03', 'Canada'),
(6, 'Clint', 'Eastwood', '1930-05-31', 'USA'),
(7, 'Francis', 'Ford Coppola', '1939-04-07', 'USA'),
(8, 'Joel', 'Coen', '1954-11-29', 'USA'),
(9, 'Ridley', 'Scott', '1937-11-30', 'England'),
(10, 'Blade', 'Runner', '1982-04-13', 'USA'),
(11, 'Todd', 'Phillips', '1970-12-20', 'USA'),
(12, 'Tim', 'Burton', '1958-08-25', 'USA'),
(13, 'Damien', 'Chazelle', '1985-01-19', 'USA'),
(14, 'Guy', 'Ritchie', '1968-09-10', 'England'),
(21, 'antwonio ', 'velez ', '1953-03-27', 'COL'),
(22, 'antwonio ', 'velez ', '1953-03-27', 'COL'),
(23, 'antwonio ', 'velez ', '1953-03-27', 'COL'),
(24, 'antwonio ', 'velez ', '1953-03-27', 'COL'),
(25, 'antwonio ', 'velez ', '1953-03-27', 'COL');

-- --------------------------------------------------------

--
-- Table structure for table `Idiomas`
--

CREATE TABLE `Idiomas` (
  `IDIdioma_Idioma` int NOT NULL,
  `Nombre_Idioma` varchar(155) DEFAULT NULL,
  `ISOCode_Idioma` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Idiomas`
--

INSERT INTO `Idiomas` (`IDIdioma_Idioma`, `Nombre_Idioma`, `ISOCode_Idioma`) VALUES
(1, 'Chino mandar�n', 'zho'),
(2, 'Español', 'spa'),
(3, 'Ingl�s', 'eng'),
(4, 'Hindi', 'hin'),
(5, '�rabe', 'ara'),
(6, 'Bengal�', 'ben'),
(7, 'Portugu�s', 'por'),
(8, 'Ruso', 'rus'),
(9, 'Japon�s', 'jpn'),
(10, 'Franc�s', 'fra'),
(11, 'Malayo', 'msa'),
(12, 'Alem�n', 'deu');

-- --------------------------------------------------------

--
-- Table structure for table `Plataformas`
--

CREATE TABLE `Plataformas` (
  `ID_Plataforma` int NOT NULL,
  `Nombre_Plataforma` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Plataformas`
--

INSERT INTO `Plataformas` (`ID_Plataforma`, `Nombre_Plataforma`) VALUES
(1, 'Netflix'),
(2, 'Disney+'),
(3, 'HBO Max'),
(4, 'Amazon Prime Video'),
(5, 'Apple TV+'),
(6, 'Apple TV+'),
(7, 'Crunchyroll');

-- --------------------------------------------------------

--
-- Table structure for table `Series`
--

CREATE TABLE `Series` (
  `ID_Serie` int NOT NULL,
  `Titulo_Serie` varchar(255) DEFAULT NULL,
  `IDPlataforma_serie` int DEFAULT NULL,
  `IDDirector_Serie` int DEFAULT NULL,
  `IDActores_serie` int DEFAULT NULL,
  `IDIdiomas_serie` int DEFAULT NULL,
  `IdiomaAudio_Idioma` bit(1) NOT NULL,
  `IdiomaSubtitulo_Idioma` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Series`
--

INSERT INTO `Series` (`ID_Serie`, `Titulo_Serie`, `IDPlataforma_serie`, `IDDirector_Serie`, `IDActores_serie`, `IDIdiomas_serie`, `IdiomaAudio_Idioma`, `IdiomaSubtitulo_Idioma`) VALUES
(1, 'Forrest Gump', 4, 14, 30, 3, b'1', b'1'),
(3, 'Forrest Gump 2', 4, 14, 30, 3, b'1', b'1'),
(4, 'Jing cha gu shi', 1, 12, 15, 3, b'1', b'1'),
(5, 'Lara Croft: Tomb Raider', 2, 13, 24, 1, b'1', b'1'),
(6, 'Robin Hood: príncipe de los ladrones', 6, 5, 27, 2, b'1', b'1'),
(8, 'Forrest Gump', 4, 14, 10, 3, b'1', b'1'),
(9, 'Jing cha gu shi', 1, 12, 15, 3, b'1', b'1'),
(10, 'Lara Croft: Tomb Raider', 2, 13, 24, 1, b'1', b'1'),
(11, 'Robin Hood: príncipe de los ladrones', 6, 5, 20, 2, b'1', b'1'),
(12, 'The Marvels', 5, 13, 25, 4, b'1', b'1'),
(13, 'Monster Inc', 4, 13, 15, 2, b'1', b'1'),
(15, 'El enviado', 1, 1, 1, 1, b'1', b'1'),
(18, 'holaMundo', 1, 1, 1, 1, b'1', b'1'),
(20, 'rtwt', 1, 1, 1, 1, b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Actores`
--
ALTER TABLE `Actores`
  ADD PRIMARY KEY (`ID_Actor`);

--
-- Indexes for table `Directores`
--
ALTER TABLE `Directores`
  ADD PRIMARY KEY (`ID_Director`);

--
-- Indexes for table `Idiomas`
--
ALTER TABLE `Idiomas`
  ADD PRIMARY KEY (`IDIdioma_Idioma`);

--
-- Indexes for table `Plataformas`
--
ALTER TABLE `Plataformas`
  ADD PRIMARY KEY (`ID_Plataforma`);

--
-- Indexes for table `Series`
--
ALTER TABLE `Series`
  ADD PRIMARY KEY (`ID_Serie`),
  ADD KEY `FK_Series_Plataformas` (`IDPlataforma_serie`),
  ADD KEY `FK_Series_Directores` (`IDDirector_Serie`),
  ADD KEY `FK_Series_Actores` (`IDActores_serie`),
  ADD KEY `FK_Series_Idiomas` (`IDIdiomas_serie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Actores`
--
ALTER TABLE `Actores`
  MODIFY `ID_Actor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Directores`
--
ALTER TABLE `Directores`
  MODIFY `ID_Director` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Idiomas`
--
ALTER TABLE `Idiomas`
  MODIFY `IDIdioma_Idioma` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Plataformas`
--
ALTER TABLE `Plataformas`
  MODIFY `ID_Plataforma` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Series`
--
ALTER TABLE `Series`
  MODIFY `ID_Serie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Series`
--
ALTER TABLE `Series`
  ADD CONSTRAINT `FK_Series_Actores` FOREIGN KEY (`IDActores_serie`) REFERENCES `Actores` (`ID_Actor`),
  ADD CONSTRAINT `FK_Series_Directores` FOREIGN KEY (`IDDirector_Serie`) REFERENCES `Directores` (`ID_Director`),
  ADD CONSTRAINT `FK_Series_Idiomas` FOREIGN KEY (`IDIdiomas_serie`) REFERENCES `Idiomas` (`IDIdioma_Idioma`),
  ADD CONSTRAINT `FK_Series_Plataformas` FOREIGN KEY (`IDPlataforma_serie`) REFERENCES `Plataformas` (`ID_Plataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
