-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2022 г., 18:15
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int NOT NULL,
  `quantity_views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `size`, `quantity_views`) VALUES
(21, '01.jpg', 111456, 1),
(22, '02.jpg', 70076, 0),
(23, '03.jpg', 70215, 0),
(24, '04.jpg', 61733, 0),
(25, '05.jpg', 160617, 0),
(26, '06.jpg', 89871, 0),
(27, '07.jpg', 99418, 0),
(28, '08.jpg', 103775, 0),
(29, '09.jpg', 81022, 0),
(30, '10.jpg', 97127, 0),
(31, '11.jpg', 98579, 0),
(32, '12.jpg', 139286, 0),
(33, '13.jpg', 113016, 0),
(34, '14.jpg', 151814, 5),
(35, '15.jpg', 112488, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
