-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4
-- Время создания: Окт 18 2025 г., 12:51
-- Версия сервера: 8.4.6
-- Версия PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courses_online`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_id` int UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `time_start` time NOT NULL,
  `pay_type_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `master_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `user_id`, `created_at`, `course_id`, `date_start`, `time_start`, `pay_type_id`, `status_id`, `master_id`) VALUES
(2, 2, '2025-10-04 13:49:15', 1, '0011-11-11', '00:00:00', 1, 3, NULL),
(3, 2, '2025-10-04 14:11:57', 2, '0022-02-22', '00:00:00', 2, 3, NULL),
(4, 2, '2025-10-04 13:49:15', 1, '0011-11-11', '00:00:00', 1, 1, NULL),
(5, 2, '2025-10-04 14:11:57', 2, '0022-02-22', '00:00:00', 2, 1, NULL),
(6, 2, '2025-10-18 11:31:16', 1, '2025-10-18', '00:00:00', 1, 1, NULL),
(7, 2, '2025-10-18 11:55:56', 2, '2025-10-19', '11:11:00', 2, 1, 1),
(8, 2, '2025-10-18 12:46:01', 1, '2025-10-19', '11:11:00', 2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `title`) VALUES
(1, 'Основы алгоритмизации ипрограммирования'),
(2, 'Основы веб-дизайна'),
(3, 'Основы проектирования баз\r\nданных');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `application_id` int UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`application_id`, `comment`) VALUES
(2, 'sadasdasd'),
(3, 'sdfsdfasdf\r\nas\r\ndf\r\nasd\r\nf');

-- --------------------------------------------------------

--
-- Структура таблицы `master`
--

CREATE TABLE `master` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `master`
--

INSERT INTO `master` (`id`, `name`) VALUES
(1, 'master 1'),
(2, 'master 2'),
(3, 'master 3');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_type`
--

CREATE TABLE `pay_type` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pay_type`
--

INSERT INTO `pay_type` (`id`, `title`) VALUES
(1, 'Наличными'),
(2, 'Переводом по номеру телефона');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`, `alias`) VALUES
(1, 'Новая', 'new'),
(2, 'Идет обучение', 'study'),
(3, 'Обучение завершено', 'final');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `auth_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `full_name`, `phone`, `email`, `role`, `auth_key`) VALUES
(2, 'q', '$2y$13$7V8x6FMnQ0vmbCa2cu53duzFeVTc7YbH.jF.BLU9Wi0RSVVfpvzmq', 'q', 'q', 'q', 0, 'EKw5XK7Z1MAXu7TsXW3rPXKX-uUzl0Rv'),
(3, 'qqqqqq', '$2y$13$mFiB9wdvLiTXDRxkSkpXY.orZC17wbY4r7Nj12gW/Nm9f74fdFK5m', 'ф', '8(888)888-88-88', 'q@q.q', 0, 'yfTJ3R4S54wpNmw3ujoehfIco1Jve-d_'),
(5, 'Admin', '$2y$13$RXTF6EdIoFUuoo4KiGM23e8ZEuUNY8vKG/40WU647xN8pJhhKD/wm', 'admin', '8(888)88-88-88', 'a@a.a', 1, 'dLfi2kT0nQ-dH7eK9ajSm6kENfBroMta'),
(6, 'aaaaaa', '$2y$13$/HuhhMiayt1xMYYhFtekWuevO7zeSibYiRdwQEpDze4hsV3jZaJei', 'ф', '8(999)999-99-99', 'a@a.a', 0, '0LIa0cBQs1QKCqhFnjluIIaGWLGC3Udx');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pay_type_id` (`pay_type_id`),
  ADD KEY `staus_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`application_id`);

--
-- Индексы таблицы `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pay_type`
--
ALTER TABLE `pay_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `master`
--
ALTER TABLE `master`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pay_type`
--
ALTER TABLE `pay_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`pay_type_id`) REFERENCES `pay_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_5` FOREIGN KEY (`master_id`) REFERENCES `master` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
