-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Ara 2021, 22:51:10
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ekullanici_dolmus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_kullanici`
--

CREATE TABLE `tb_kullanici` (
  `id` int(255) NOT NULL,
  `isim` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `sifre` varchar(150) NOT NULL DEFAULT 'c4ca4238a0b923820dcc509a6f75849b',
  `profil` varchar(150) NOT NULL DEFAULT 'varsayilan/img/user.jpg',
  `yetki` varchar(15) NOT NULL DEFAULT 'Bilinmiyor',
  `_createdby` varchar(300) NOT NULL,
  `_createTime` datetime NOT NULL,
  `_updatedby` varchar(300) DEFAULT NULL,
  `_updateTime` datetime DEFAULT NULL,
  `_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `_deletedby` varchar(300) DEFAULT NULL,
  `_deletedTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_kullanici`
--

INSERT INTO `tb_kullanici` (`id`, `isim`, `mail`, `sifre`, `profil`, `yetki`, `_createdby`, `_createTime`, `_updatedby`, `_updateTime`, `_deleted`, `_deletedby`, `_deletedTime`) VALUES
(3, 'Admin', 'admin@admin', '202cb962ac59075b964b07152d234b70', 'varsayilan/img/user.jpg', 'Admin', 'Cica id: 1', '2020-10-14 22:18:33', 'Admin  id: 3', '2021-12-22 23:58:02', 0, 'Admin id: 1', '2020-10-21 22:48:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_tur`
--

CREATE TABLE `tb_tur` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `_createdby` varchar(300) NOT NULL,
  `_createTime` datetime NOT NULL,
  `_updatedby` varchar(300) DEFAULT NULL,
  `_updateTime` datetime DEFAULT NULL,
  `_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `_deletedby` varchar(300) DEFAULT NULL,
  `_deletedTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_tur`
--

INSERT INTO `tb_tur` (`id`, `adi`, `_createdby`, `_createTime`, `_updatedby`, `_updateTime`, `_deleted`, `_deletedby`, `_deletedTime`) VALUES
(1, '33ads33', 'Admin  id: 3', '2021-12-23 00:07:55', 'Admin  id: 3', '2021-12-23 00:08:37', 1, 'Admin  id: 3', '2021-12-23 00:08:43'),
(2, '33abc01', 'Admin  id: 3', '2021-12-23 00:08:56', NULL, NULL, 0, NULL, NULL),
(3, '33abc02', 'Admin  id: 3', '2021-12-23 00:09:08', NULL, NULL, 0, NULL, NULL),
(4, '33abc03', 'Admin  id: 3', '2021-12-23 00:09:15', NULL, NULL, 0, NULL, NULL),
(5, '33abc04', 'Admin  id: 3', '2021-12-23 00:09:21', NULL, NULL, 0, NULL, NULL),
(6, '33abc05', 'Admin  id: 3', '2021-12-23 00:09:28', NULL, NULL, 0, NULL, NULL),
(7, '33abc06', 'Admin  id: 3', '2021-12-23 00:09:34', NULL, NULL, 0, NULL, NULL),
(8, '33abc07', 'Admin  id: 3', '2021-12-23 00:09:41', NULL, NULL, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tb_kullanici`
--
ALTER TABLE `tb_kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tb_tur`
--
ALTER TABLE `tb_tur`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tb_kullanici`
--
ALTER TABLE `tb_kullanici`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `tb_tur`
--
ALTER TABLE `tb_tur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
