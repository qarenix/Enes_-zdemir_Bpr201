-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Ara 2025, 00:45:23
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sozluk_projesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basliklar`
--

CREATE TABLE `basliklar` (
  `id` int(11) NOT NULL,
  `baslik_adi` varchar(150) NOT NULL,
  `olusturan_id` int(11) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `basliklar`
--

INSERT INTO `basliklar` (`id`, `baslik_adi`, `olusturan_id`, `tarih`) VALUES
(1, 'final haftası', 0, '2025-12-17 21:57:08'),
(2, 'internet tabanlı programlama', 0, '2025-12-17 21:57:08'),
(4, 'projenin yapımcısı', 1, '2025-12-17 22:19:25'),
(5, 'mehabalar hocam', 1, '2025-12-17 22:42:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `entryler`
--

CREATE TABLE `entryler` (
  `id` int(11) NOT NULL,
  `baslik_id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `icerik` text NOT NULL,
  `resim_yolu` varchar(255) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `entryler`
--

INSERT INTO `entryler` (`id`, `baslik_id`, `yazar_id`, `icerik`, `resim_yolu`, `tarih`) VALUES
(1, 4, 1, 'enes özdemir\r\n24015221041\r\n', 'uploads/5045_Qarenix.png', '2025-12-17 22:19:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `rol` tinyint(4) DEFAULT 0,
  `kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kadi`, `email`, `sifre`, `rol`, `kayit_tarihi`) VALUES
(1, 'qarenix', 'ens.ozdemir06@gmail.com', '$2y$10$1e3wEkKT.DeLjatrntf7JuoCM3ZzSeOfPBNYER1dX2sSlNRaeuc66', 1, '2025-12-17 22:18:35'),
(2, 'akarsuyokuşsok', 'akarsuyokussok@gmail.com', '$2y$10$j9FePxU1xGz.aBN358/kau6mwivb/uPHkzg46eK7FxNEibrJgBxj2', 0, '2025-12-17 22:45:48');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basliklar`
--
ALTER TABLE `basliklar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `entryler`
--
ALTER TABLE `entryler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basliklar`
--
ALTER TABLE `basliklar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `entryler`
--
ALTER TABLE `entryler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
