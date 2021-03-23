-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 23 2021 г., 12:49
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phptest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `id_product`) VALUES
(1, 'ОК.', 1),
(2, 'ОК. - 2', 1),
(3, 'Test comment', 1),
(4, 'фывфывфыв', 1),
(5, 'asdasdasda', 3),
(6, 'testtest', 3),
(7, 'testtest', 3),
(8, 'testtest', 3),
(9, 'test', 4),
(10, 'qwerty', 2),
(11, 'qwe', 4),
(12, 'fsdfsdfsdf', 4),
(13, 'test', 2),
(14, 'ыавываывааыва', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` longtext NOT NULL,
  `size` int(10) NOT NULL,
  `view` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `url`, `size`, `view`) VALUES
(1, 'Река', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/%D0%A0%D0%B5%D0%BA%D0%B0_%D0%9B%D0%B8%D0%B2%D0%BE_3.jpg/1200px-%D0%A0%D0%B5%D0%BA%D0%B0_%D0%9B%D0%B8%D0%B2%D0%BE_3.jpg', 16, 1),
(2, 'Река', 'http://uraloved.ru/images/mesta/bashkiriya/belaya/reka-belaya-2.jpg', 16, 2),
(3, 'Река3', 'https://сезоны-года.рф/sites/default/files/images/shkolnikam/reka.jpg', 16, 5),
(7, 'Река4', 'https://сезоны-года.рф/sites/default/files/images/shkolnikam/reka.jpg', 16, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(128) NOT NULL,
  `img_url` text NOT NULL,
  `description` text NOT NULL,
  `view` int(64) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img_url`, `description`, `view`) VALUES
(1, '\"PHP. Объекты, шаблоны и методики программирования\"', 'https://media.proglib.io/wp-uploads/2017/04/978-5-8459-1922-9.jpg', 'Книга включает в себя подробный обзор объектно-ориентированных возможностей PHP: определение классов, наследование, инкапсуляция и многое другое.', 24),
(2, '\"PHP. Объекты, шаблоны и методики программирования\"', 'https://media.proglib.io/wp-uploads/2017/04/978-5-8459-1922-9.jpg', 'Книга включает в себя подробный обзор объектно-ориентированных возможностей PHP: определение классов, наследование, инкапсуляция и многое другое.', 16),
(3, 'PHP 7', 'https://lavkababuin.com/image/cache/alias/v-podlinnike-php-7-546480/v-podlinnike-php-7-546480-main-1000x1000.jpg', 'Рассмотрены основы языка PHP и его рабочего окружения в Windows, Mac OS X и Linux.Отражены радикальные изменения в языке PHP, произошедшие с момента выхода предыдущего издания: трейты, пространство имен, анонимные функции, замыкания, элементы строгой типизации, генераторы, встроенный Web-сервер и многие другие возможности. ', 4),
(4, 'PHP 7', 'https://lavkababuin.com/image/cache/alias/v-podlinnike-php-7-546480/v-podlinnike-php-7-546480-main-1000x1000.jpg', 'Рассмотрены основы языка PHP и его рабочего окружения в Windows, Mac OS X и Linux.Отражены радикальные изменения в языке PHP, произошедшие с момента выхода предыдущего издания: трейты, пространство имен, анонимные функции, замыкания, элементы строгой типизации, генераторы, встроенный Web-сервер и многие другие возможности. ', 10),
(5, 'test', 'data:image/png;base64,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', 'test', 1),
(7, 'Admin-test-2', 'https://i.ytimg.com/vi/wCZ5TJCBWMg/maxresdefault.jpg', 'testtest2', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '123'),
(2, 'admin2', '123'),
(5, 'admin3', '123'),
(6, '123', '123'),
(7, 'asdasd', 'asdasd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
