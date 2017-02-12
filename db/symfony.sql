-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2017 г., 20:45
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `symfony`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minCountPlayers` int(11) NOT NULL,
  `maxCountPlayers` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `name`, `minCountPlayers`, `maxCountPlayers`, `image`, `description`) VALUES
(1, 'Крестики-нолики', 2, 2, 'http://placehold.it/350x300', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor pretium mollis. Nunc convallis nisl metus, vel aliquam erat lacinia ac. Cras malesuada gravida sapien, eget pellentesque lorem iaculis et. Ut posuere tempor lectus. Morbi consectetur lorem nec ex tincidunt faucibus. Nunc accumsan sem ac dui mollis dapibus. Mauris in diam ex. Ut non sem turpis.'),
(2, 'Морской бой', 2, 2, 'http://placehold.it/250x300', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor pretium mollis. Nunc convallis nisl metus, vel aliquam erat lacinia ac. Cras malesuada gravida sapien, eget pellentesque lorem iaculis et. Ut posuere tempor lectus. Morbi consectetur lorem nec ex tincidunt faucibus. Nunc accumsan sem ac dui mollis dapibus. Mauris in diam ex. Ut non sem turpis.');

-- --------------------------------------------------------

--
-- Структура таблицы `gamer`
--

CREATE TABLE `gamer` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `gamer`
--

INSERT INTO `gamer` (`id`, `login`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Структура таблицы `game_session`
--

CREATE TABLE `game_session` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `game_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `game_session`
--

INSERT INTO `game_session` (`id`, `created`, `game_id`) VALUES
(1, '2017-02-12 00:00:00', 1),
(2, '2017-02-12 00:00:00', 2),
(3, '2017-02-12 00:00:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `play_session`
--

CREATE TABLE `play_session` (
  `id` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_232B318C5E237E06` (`name`);

--
-- Индексы таблицы `gamer`
--
ALTER TABLE `gamer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `game_session`
--
ALTER TABLE `game_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4586AAFBE48FD905` (`game_id`);

--
-- Индексы таблицы `play_session`
--
ALTER TABLE `play_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `gamer`
--
ALTER TABLE `gamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `game_session`
--
ALTER TABLE `game_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `play_session`
--
ALTER TABLE `play_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `game_session`
--
ALTER TABLE `game_session`
  ADD CONSTRAINT `FK_4586AAFBE48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
