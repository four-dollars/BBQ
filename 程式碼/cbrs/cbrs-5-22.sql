-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-22 10:46:10
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cbrs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `apply`
--

CREATE TABLE `apply` (
  `place_id` int(11) UNSIGNED NOT NULL,
  `record_id` int(11) UNSIGNED NOT NULL,
  `time_start` datetime NOT NULL,
  `time_finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `place_id` int(11) UNSIGNED NOT NULL,
  `money_school` int(11) NOT NULL,
  `money_outside` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `record_id` int(10) UNSIGNED NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'approving',
  `money` int(11) NOT NULL,
  `organization` varchar(20) DEFAULT NULL,
  `apply_date` date NOT NULL,
  `approved_date` date DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `bbq_number` int(11) DEFAULT NULL,
  `camp_number` int(11) DEFAULT NULL,
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`account`, `password`, `name`, `tel`, `mail`, `type`, `id`, `number`) VALUES
('a1075514', 'a1075514', 'YuanZai', '0901075514', 'a1075514@mail.nuk.edu.tw', 'student', 'D123456789', 'a1075514'),
('a1075519', 'a1075519', 'Tina', '0901075519', 'a1075519@mail.nuk.edu.tw', 'CA', 'F123456789', 'A1075519'),
('a1075542', 'a1075542', 'Fish', '0901075542', 'a1075542@mail.nuk.edu.tw', 'DA', 'S123456789', 'a1075542'),
('a1075545', 'a1075545', 'Mao', '0901075545', 'a1075545@mail.nuk.edu.tw', 'PA', 'P987654321', 'A1075545'),
('a1075546', 'a1075546', 'Eric', '0901075546', 'a1075546@mail.nuk.edu.tw', 'SA', 'P123456789', 'A1075546'),
('jerry', 'jerry', 'jerry', '0911111111', 'jerry@mail.tw', 'outsider', 'A123456789', NULL),
('wylin', 'wylin', 'wylin', '0900000000', 'wylin@mail', 'staff', 'E123456789', 'E123456789');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`place_id`,`record_id`),
  ADD KEY `record_id` (`record_id`);

--
-- 資料表索引 `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `account` (`account`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`record_id`) REFERENCES `record` (`record_id`);

--
-- 資料表的限制式 `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`account`) REFERENCES `user` (`account`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
