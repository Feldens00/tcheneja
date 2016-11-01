-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Out-2016 às 14:00
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcheneja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bands`
--

CREATE TABLE `bands` (
  `id_band` int(11) NOT NULL,
  `name_band` varchar(45) NOT NULL,
  `components` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `fone_band` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bands_musics`
--

CREATE TABLE `bands_musics` (
  `bands_id_band` int(11) NOT NULL,
  `musics_id_music` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id_city` int(11) NOT NULL,
  `id_state` int(11) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `name_city` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `name_event` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `adress` varchar(45) NOT NULL,
  `schedule` time NOT NULL,
  `day` date NOT NULL,
  `fone_event` varchar(45) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events_bands`
--

CREATE TABLE `events_bands` (
  `event_id_event` int(11) NOT NULL,
  `band_id_band` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events_sponsors`
--

CREATE TABLE `events_sponsors` (
  `event_id_event` int(11) NOT NULL,
  `sponsor_id_sponsor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `membership`
--

INSERT INTO `membership` (`id`, `username`, `password`, `status`) VALUES
(3, 'visitante', 'visitante69', 2),
(4, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musics`
--

CREATE TABLE `musics` (
  `id_music` int(11) NOT NULL,
  `name_music` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musics`
--

INSERT INTO `musics` (`id_music`, `name_music`, `url`, `title`) VALUES
(1, 'teste ', 'assets/musics/Semargl1.mp3', 'Semargl1.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sponsors`
--

CREATE TABLE `sponsors` (
  `id_sponsor` int(11) NOT NULL,
  `name_sponsor` varchar(45) NOT NULL,
  `url` varchar(250) NOT NULL,
  `fone_sponsor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `states`
--

CREATE TABLE `states` (
  `id_state` int(11) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `name_state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id_band`);

--
-- Indexes for table `bands_musics`
--
ALTER TABLE `bands_musics`
  ADD PRIMARY KEY (`bands_id_band`,`musics_id_music`),
  ADD KEY `fk_bands_has_musics_musics1_idx` (`musics_id_music`),
  ADD KEY `fk_bands_has_musics_bands1_idx` (`bands_id_band`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`,`id_state`),
  ADD KEY `fk_cidades_estados1_idx` (`id_state`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`,`id_city`,`id_state`),
  ADD KEY `fk_events_cities1_idx` (`id_city`,`id_state`);

--
-- Indexes for table `events_bands`
--
ALTER TABLE `events_bands`
  ADD PRIMARY KEY (`event_id_event`,`band_id_band`),
  ADD KEY `fk_events_has_bands_bands1_idx` (`band_id_band`),
  ADD KEY `fk_events_has_bands_events1_idx` (`event_id_event`);

--
-- Indexes for table `events_sponsors`
--
ALTER TABLE `events_sponsors`
  ADD PRIMARY KEY (`event_id_event`,`sponsor_id_sponsor`),
  ADD KEY `fk_events_has_sponsors_sponsors1_idx` (`sponsor_id_sponsor`),
  ADD KEY `fk_events_has_sponsors_events1_idx` (`event_id_event`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id_music`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id_state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id_band` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bands_musics`
--
ALTER TABLE `bands_musics`
  ADD CONSTRAINT `fk_bands_has_musics_bands1` FOREIGN KEY (`bands_id_band`) REFERENCES `bands` (`id_band`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bands_has_musics_musics1` FOREIGN KEY (`musics_id_music`) REFERENCES `musics` (`id_music`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`id_state`) REFERENCES `states` (`id_state`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_cities1` FOREIGN KEY (`id_city`,`id_state`) REFERENCES `cities` (`id_city`, `id_state`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `events_bands`
--
ALTER TABLE `events_bands`
  ADD CONSTRAINT `fk_events_has_bands_bands1` FOREIGN KEY (`band_id_band`) REFERENCES `bands` (`id_band`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_events_has_bands_events1` FOREIGN KEY (`event_id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `events_sponsors`
--
ALTER TABLE `events_sponsors`
  ADD CONSTRAINT `fk_events_has_sponsors_events1` FOREIGN KEY (`event_id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_events_has_sponsors_sponsors1` FOREIGN KEY (`sponsor_id_sponsor`) REFERENCES `sponsors` (`id_sponsor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
