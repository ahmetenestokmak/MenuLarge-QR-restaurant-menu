-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 20 Eyl 2020, 14:34:18
-- Sunucu sürümü: 10.3.22-MariaDB
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bemolmed_menularge`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_category`
--

CREATE TABLE `tb_category` (
  `ID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` mediumtext NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tb_category`
--

INSERT INTO `tb_category` (`ID`, `name`, `image`, `companyID`) VALUES
(1, 'Burgers', 'menu-title-burgers.jpg', 1),
(2, 'Pasta', 'menu-title-pasta.jpg', 1),
(5, 'Drinks', 'menu-title-drinks.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_company`
--

CREATE TABLE `tb_company` (
  `ID` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tb_company`
--

INSERT INTO `tb_company` (`ID`, `name`, `address`, `description`, `phone`, `email`, `password`) VALUES
(1, 'Bemol Cafe&Restaurant', 'Ataturk cad. cumhuriyer mah. Esenyurt / İstanbul', 'Müşterilerini önemseyen lezzetleriyle nam salmış bir mekan', '5555555', 'ahmet@bemolmedya.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_menu`
--

CREATE TABLE `tb_menu` (
  `ID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` mediumtext NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tb_menu`
--

INSERT INTO `tb_menu` (`ID`, `name`, `description`, `price`, `image`, `categoryID`) VALUES
(1, 'Chicken Burger', 'Lav taşında pişmiş tavuk, rus salatası, yeşillik, soğan, domates, turşu, baharatlı bonfrit patates ile servis edilir.', 27.95, '', 1),
(5, 'Fettuccine Alfredo', 'Izgara tavuk, dolmalık fıstık, mantar, taze fesleğen, parmesan peyniri, alfredo sos ile servis edilir.', 31.50, '', 2),
(4, 'Steak Burger', 'Lav taşında pişmiş biftek, rus salatası, yeşillik, soğan, domates, turşu, baharatlı bonfrit patates ile servis edilir.', 32.95, '', 1),
(6, 'Mantarlı Tortellini', 'Mantar, labne peyniri, parmesan peyniri, krem sos ile servis edilir.', 30.95, '', 2),
(7, 'Kola ', 'Coca Cola 300 ml', 5.00, '', 5),
(8, 'Ice Tea', 'Şeftali, Limon, Bergamot', 5.00, '', 5),
(9, 'Çay', '', 2.00, '', 5),
(10, 'Türk Kahvesi', 'Mehmet Efendi Kahvesi', 9.00, '', 5),
(11, 'Su', '', 1.00, '', 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
