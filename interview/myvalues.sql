-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Oca 2022, 12:30:10
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `myvalues`
--

CREATE TABLE `myvalues` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `MeasurementUnit` varchar(50) NOT NULL,
  `DepthMeasurementUnit` varchar(50) NOT NULL,
  `Dimensionwidth` tinyint(4) NOT NULL,
  `Dimensionlength` tinyint(4) NOT NULL,
  `Dimensiondepth` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `myvalues`
--

INSERT INTO `myvalues` (`id`, `Name`, `MeasurementUnit`, `DepthMeasurementUnit`, `Dimensionwidth`, `Dimensionlength`, `Dimensiondepth`) VALUES
(1, 'ilhami', 'Metres', 'Centimetres', 5, 2, 6),
(2, 'ilhami', 'Metres', 'Centimetres', 4, 2, 6);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `myvalues`
--
ALTER TABLE `myvalues`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `myvalues`
--
ALTER TABLE `myvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
