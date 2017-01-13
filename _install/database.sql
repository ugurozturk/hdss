-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 13 Oca 2017, 12:10:25
-- Sunucu sürümü: 5.5.52-cll
-- PHP Sürümü: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `hdss_mini`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_ayrinti` varchar(55) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=886 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(150) NOT NULL DEFAULT 'NULL',
  `size` int(11) DEFAULT NULL,
  `big_url` varchar(200) DEFAULT NULL,
  `thumbs_url` varchar(200) DEFAULT NULL,
  `yayin_tarihi` date NOT NULL,
  `pic_category_id` int(11) DEFAULT NULL,
  `pic_owner_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '0',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pic_id`),
  KEY `pic_category_id` (`pic_category_id`),
  KEY `pic_owner_id` (`pic_owner_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=206 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pic_categories`
--

CREATE TABLE IF NOT EXISTS `pic_categories` (
  `pic_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_category_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pic_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pic_owners`
--

CREATE TABLE IF NOT EXISTS `pic_owners` (
  `pic_owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_owner_name` varchar(75) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pic_owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pic_tags`
--

CREATE TABLE IF NOT EXISTS `pic_tags` (
  `pic_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_id` int(11) NOT NULL,
  `tag` varchar(35) NOT NULL DEFAULT 'NULL',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pic_tag_id`),
  KEY `pic_id` (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL DEFAULT 'NULL',
  `password` varchar(16) NOT NULL DEFAULT 'NULL',
  `name` varchar(30) NOT NULL DEFAULT 'NULL',
  `surname` varchar(30) DEFAULT NULL,
  `email` varchar(35) NOT NULL DEFAULT 'NULL',
  `user_group_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(15) NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `pics`
--
ALTER TABLE `pics`
  ADD CONSTRAINT `pics_ibfk_1` FOREIGN KEY (`pic_category_id`) REFERENCES `pic_categories` (`pic_category_id`),
  ADD CONSTRAINT `pics_ibfk_2` FOREIGN KEY (`pic_owner_id`) REFERENCES `pic_owners` (`pic_owner_id`),
  ADD CONSTRAINT `pics_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Tablo kısıtlamaları `pic_tags`
--
ALTER TABLE `pic_tags`
  ADD CONSTRAINT `pic_tags_ibfk_1` FOREIGN KEY (`pic_id`) REFERENCES `pics` (`pic_id`);

--
-- Tablo kısıtlamaları `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`user_group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
