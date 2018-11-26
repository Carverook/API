-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 27 2018 г., 01:31
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `buyper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `login`, `email`, `password`, `salt`) VALUES
(2, 'Admin', 'test@hmal.com', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$pHXI3MtyROjLQOh0.zRKXe8nO.W8KhDkJG/EajdAczkEYiuVwVp5C'),
(66, 'Tffdfefast1', 'tfaefdfsff1', '827ccb0eea8a706c4c34a16891f84e7b', '$2y$10$fceiwNfPeBu6fRK8sf2Cyea2mHBq9hJVpPNg7Iv0Pr/kpYyH51nBq'),
(67, 'Tffdfeffaastf1', 'tfafaaefdfsff1', '827ccb0eea8a706c4c34a16891f84e7b', '$2y$10$2HrT1eP9ILxTXgpzpJSyoOT6e/1Btk5gs5cE0gTXyXhBB6D0NMRpG'),
(68, 'fTffdfeffaastf1', 'tffafaaefdfsff1', '827ccb0eea8a706c4c34a16891f84e7b', '$2y$10$zh.bMH2esdQohIabIIOt5.yhvtdxys2Po4Zvg3Bm.Jnuov2FMz9Te'),
(69, 'Admin2', 'test@hmal.cm', '123456', ''),
(70, 'Admin23', 'test@hmal.cms', '123456', '$2y$10$bMECZGlDElUg5TqvwBj/lOrN8M3WZ7FfgTC83Jl3ohWLpLn0aMLT2');

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(0, 'jsm8tw3NTdBXpFoOANtZQhkD86Kn1zOLlC7Aa8hgohTgtVwufkSWRT1u9GDB');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
