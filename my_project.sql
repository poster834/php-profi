-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 11 2022 г., 09:03
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Нормальное название статьи', 'Нормальный текст статьи Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nihil excepturi natus voluptatem ex debitis rerum, labore, perferendis delectus illo quasi distinctio repellat recusandae nostrum earum accusantium. Facilis, eveniet et.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nihil excepturi natus voluptatem ex debitis rerum, labore, perferendis delectus illo quasi distinctio repellat recusandae nostrum earum accusantium. Facilis, eveniet et.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nihil excepturi natus voluptatem ex debitis rerum, labore, perferendis delectus illo quasi distinctio repellat recusandae nostrum earum accusantium. Facilis, eveniet et.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nihil excepturi natus voluptatem ex debitis rerum, labore, perferendis delectus illo quasi distinctio repellat santium. Facilis,', '2022-07-21 08:49:52'),
(2, 1, 'Пост о КУХНЕ', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', '2022-07-21 08:49:52'),
(15, 1, 'Название новой статьи', 'Текст новой статьи', '2022-07-26 15:49:58'),
(17, 1, 'Название новой статьи', 'Текст новой статьи', '2022-07-26 16:01:42'),
(19, 24, 'наименование заготовка статьи', 'А вот тут записан текст статьи', '2022-08-04 08:46:59'),
(22, 24, 'Наименование статьи', 'Содержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторамСодержимое статьи допускается редактировать только тем, кто ее написал и администраторам', '2022-08-04 09:44:47'),
(23, 25, 'wefwefwefwef', 'wefwefwef', '2022-08-04 12:33:03'),
(24, 25, 'AdminTest', 'AdminText', '2022-08-04 12:43:02');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `article_id`, `text`, `date`) VALUES
(1, 1, 1, 'test comments', '2022-08-08 15:26:57'),
(2, 1, 1, 'test comments222222222', '2022-08-08 16:29:57'),
(3, 25, 1, 'Проверка добавления комментария', '2022-08-09 10:02:44'),
(4, 25, 1, 'Проверка добавления комментария', '2022-08-09 10:04:00'),
(5, 25, 1, 'Проверка добавления комментария', '2022-08-09 10:05:03'),
(6, 25, 1, 'Проверка добавления комментария', '2022-08-09 10:05:16'),
(7, 25, 1, 'dfgdfgdfg', '2022-08-09 10:06:10'),
(8, 25, 1, 'fgdfgdfgdfg', '2022-08-09 10:06:39'),
(9, 25, 1, 'Вот Вам еще один комментарий', '2022-08-09 10:07:09'),
(10, 25, 1, 'fghfghfgh', '2022-08-09 10:17:48'),
(11, 25, 1, 'fghfghfgh', '2022-08-09 10:18:40'),
(12, 25, 2, 'Этого комментария быть не должно в первой статье. Это комментарий для статьи - 2', '2022-08-09 10:18:40'),
(13, 25, 1, 'Вот теперь проверим еще разочек', '2022-08-09 10:19:50'),
(14, 24, 1, 'Что тут понаписано?впарвапвап', '2022-08-11 08:56:40'),
(15, 24, 1, 'tyutyutyu', '2022-08-09 10:25:22'),
(16, 25, 22, 'Новый комментарий новой статье\r\nEDIT\r\nEDIT\r\nEDIT\r\nEDIT\r\nEDIT', '2022-08-09 11:31:43'),
(17, 25, 22, 'Нормальный текст для проверки', '2022-08-09 12:02:25'),
(18, 25, 22, 'Норм текст', '2022-08-09 12:03:43'),
(19, 24, 19, '321321321321', '2022-08-09 12:11:57'),
(20, 24, 17, 'ОГО!', '2022-08-09 12:22:07'),
(21, 24, 22, 'Комментарий автора статьи. Редактор Admin', '2022-08-09 15:15:53'),
(22, 24, 23, 'retsertgerte', '2022-08-11 08:46:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`, `avatar_url`) VALUES
(1, 'admin555', 'poster8@gmail.com', 0, 'user', '$2y$10$wzZ1T9gzkdbq8lNWV/qxcezfqRSj/CkJAUNL.zPzdrRnEkjYtsWsm', 'aff37379f73468bb5ba56c6b5bb96cef2dcd459140af35f541fa9b82e907b630db16e4fce8f50def', '2022-08-03 15:03:59', NULL),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2022-07-21 08:48:54', NULL),
(3, 'user1', 'admin1@gmail.com', 0, 'user', '$2y$10$PH.vAJpVmeZNGATmesM3y.Uo9AFtmQAlCOZ33TnZV0/5R1.SzCl1O', 'e1f3fff7a5a0c2b0d4e7baeacb43a232f8596b24b0cee3b576f809391658234f7d92ebc8a6ddc7d1', '2022-07-28 17:05:41', NULL),
(24, 'rrr', 'poster83@gmail.com', 1, 'user', '$2y$10$SEgjBmCZM/hetf6fBreI1OddjQyRWLMC.OtzE8560NKM3J/u9Sk72', '116b428dd23677fd9880d919ba66c553dbed4b9f61ff997ebef6503293d8fc15a486629536f8224b', '2022-08-03 17:04:01', 'rrr70 Лет Победы -206.png'),
(25, 'admin', 'poster834@gmail.com', 1, 'admin', '$2y$10$Okt6sCTVFBPQihRT5cDYPu2XXmW9bduv0RYLYsJ0qGfJ6VBLow8qS', 'b8fa1e6b7ce5c65f859e5494e050b74aea56845b2a32ab63fa113d473c5ed5df0e2a385862da2293', '2022-08-04 10:22:45', 'admingosuslugi-min.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users_activation_codes`
--

CREATE TABLE `users_activation_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
