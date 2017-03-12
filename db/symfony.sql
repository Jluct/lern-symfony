-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 12 2017 г., 22:44
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Крестики-нолики', 2, 2, 'http://placehold.it/350x350', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et placerat enim. Nulla facilisi. Nullam eget ante mauris. Curabitur viverra volutpat eros sit amet egestas. Etiam aliquam justo ac velit feugiat eleifend. Donec nunc risus, feugiat sed dolor id, dignissim elementum lectus. Duis in pretium nibh. Phasellus in dolor sollicitudin, maximus tortor vitae, tincidunt orci. Nam diam orci, sollicitudin eget tempus at, iaculis eget lectus. Vestibulum enim quam, elementum ac dapibus vulputate, condimentum sed urna. Proin tincidunt sapien et orci imperdiet mattis.'),
(2, 'Морской бой', 2, 2, 'http://placehold.it/350x350', 'Nam nec risus blandit urna dapibus mattis at vitae massa. Maecenas eget mattis nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Etiam vehicula imperdiet nisi, in sodales nisi pellentesque ac. Nullam scelerisque dui felis, a rhoncus massa congue at. Aliquam congue luctus neque, eu dapibus lectus. In quis sapien luctus dui dictum laoreet venenatis at elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc porta venenatis nulla, id vulputate tellus sollicitudin non. Nulla a nulla mattis, dignissim eros in, ornare elit.'),
(3, 'Шахматы', 2, 2, 'http://placehold.it/350x350', 'Phasellus ullamcorper elementum nisi et maximus. Sed quis neque dignissim tellus ullamcorper congue. Sed ut leo condimentum ligula pretium volutpat. Vivamus et tellus nec ipsum pellentesque tempus. Nam vel congue lorem. Quisque ac libero orci. Praesent hendrerit, nibh sed fringilla pellentesque, libero sapien egestas lectus, vel accumsan dui mi in leo. Phasellus in velit elit. Integer nunc ipsum, dictum eu nibh a, accumsan gravida urna. Nam nec leo vel nisi facilisis tristique id at neque. Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(4, 'Шашки', 2, 2, 'http://placehold.it/350x350', 'Quisque eleifend nunc diam, non porttitor est tincidunt a. Nunc imperdiet turpis ut libero ornare lacinia a ut enim. Aenean lobortis tellus ut ipsum rutrum, in fringilla ante viverra. Vivamus non nulla augue. Curabitur commodo finibus odio, eget dignissim nunc. Proin pellentesque ligula vel neque rutrum, nec mattis eros fermentum. Phasellus et luctus risus, ac malesuada nisl. Donec consequat libero vel orci tincidunt pharetra. Quisque commodo ex quis justo tempus, sit amet egestas dolor vestibulum. Integer euismod nec eros nec iaculis. Praesent vestibulum ullamcorper augue non sagittis.');

-- --------------------------------------------------------

--
-- Структура таблицы `gamer`
--

CREATE TABLE `gamer` (
  `id` int(11) NOT NULL,
  `gameSession_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `gamer`
--

INSERT INTO `gamer` (`id`, `gameSession_id`, `user_id`) VALUES
(1, 6, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 1, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `game_session`
--

CREATE TABLE `game_session` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `game_session`
--

INSERT INTO `game_session` (`id`, `game_id`, `created`, `status`) VALUES
(1, 1, '2017-02-15 07:45:24', 0),
(2, 2, '2017-02-15 14:23:12', 0),
(3, 2, '2017-02-15 15:39:14', 0),
(4, 3, '2017-02-15 13:41:24', 0),
(6, 1, '2017-03-12 12:01:21', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `play`
--

CREATE TABLE `play` (
  `id` int(11) NOT NULL,
  `history` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `updated` datetime NOT NULL,
  `players` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `last` int(11) NOT NULL,
  `action` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `gameSession_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `play`
--

INSERT INTO `play` (`id`, `history`, `updated`, `players`, `last`, `action`, `gameSession_id`) VALUES
(2, 'a:1:{s:10:\"coordinate\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '2017-03-12 22:44:30', 'a:2:{i:0;i:1;i:1;i:6;}', 6, 'a:1:{s:10:\"coordinate\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `resources` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `storage`
--

INSERT INTO `storage` (`id`, `game_id`, `resources`) VALUES
(1, 1, '<h2 class=\"text-center\">START</h2>\r\n<script>\r\n    $(\'h2\').css(\'color\',\'red\');\r\n</script>');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'list', 'list', 'panaev02@gmail.com', 'panaev02@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-03-12 10:55:48', NULL, NULL, 'a:0:{}'),
(2, 'list2', 'list2', 'panaev021@gmail.com', 'panaev021@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-03-03 20:28:24', NULL, NULL, 'a:0:{}'),
(3, 'list3', 'list3', 'panaev022@gmail.com', 'panaev022@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-02-28 15:17:04', NULL, NULL, 'a:0:{}'),
(4, 'list4', 'list4', 'panaev023@gmail.com', 'panaev023@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-02-28 15:17:04', NULL, NULL, 'a:0:{}'),
(5, 'list5', 'list5', 'panaev024@gmail.com', 'panaev024@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-02-28 15:17:04', NULL, NULL, 'a:0:{}'),
(6, 'list6', 'list6', 'panaev025@gmail.com', 'panaev025@gmail.com', 1, NULL, '$2y$13$QKrcHhKAo1oMFh8kxdaaOOjw20YSZi7c9FR50q7WjKKrSR2/2n8Wa', '2017-03-12 10:56:19', NULL, NULL, 'a:0:{}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_88241BA7A76ED395` (`user_id`),
  ADD KEY `IDX_88241BA7B1588F10` (`gameSession_id`);

--
-- Индексы таблицы `game_session`
--
ALTER TABLE `game_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4586AAFBE48FD905` (`game_id`);

--
-- Индексы таблицы `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E89DEBAB1588F10` (`gameSession_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8D12469DE2` (`category_id`);

--
-- Индексы таблицы `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_547A1B34E48FD905` (`game_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `gamer`
--
ALTER TABLE `gamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `game_session`
--
ALTER TABLE `game_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `play`
--
ALTER TABLE `play`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `gamer`
--
ALTER TABLE `gamer`
  ADD CONSTRAINT `FK_88241BA7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_88241BA7B1588F10` FOREIGN KEY (`gameSession_id`) REFERENCES `game_session` (`id`);

--
-- Ограничения внешнего ключа таблицы `game_session`
--
ALTER TABLE `game_session`
  ADD CONSTRAINT `FK_4586AAFBE48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Ограничения внешнего ключа таблицы `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `FK_5E89DEBAB1588F10` FOREIGN KEY (`gameSession_id`) REFERENCES `game_session` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `FK_547A1B34E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
