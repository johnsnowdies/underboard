-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 10 2013 г., 01:20
-- Версия сервера: 5.5.27
-- Версия PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `underboard`
--
CREATE DATABASE `underboard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `underboard`;

-- --------------------------------------------------------

--
-- Структура таблицы `dislikes`
--

CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `post` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent` int(32) NOT NULL,
  `dislikes` int(32) NOT NULL,
  `last_update` datetime NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `timestamp`, `parent`, `dislikes`, `last_update`, `count`) VALUES
(1, 'Проверка нового треда', 'Testing Thread', 'Anonymous', '2013-06-09 08:24:48', 0, 0, '2013-06-09 12:24:48', 0),
(2, 'Новая тема', 'Описание встроенных директив php.ini\r\n\r\nЭтот список включает встроенные директивы php.ini, которые вы можете использовать для настройки PHP. Директивы, которые обрабатываются модулями, перечислены и подробно описаны на страницах документаций соответствующих модулей. К примеру, информация о директивах сессий может быть найдена на странице документации сессий.', 'Anonymous', '2013-06-09 08:29:57', 0, 0, '2013-06-09 21:53:30', 2),
(3, 'Это ответ!', 'Наш ответ капитализму!', 'Anonymous', '2013-06-09 08:30:32', 2, 0, '2013-06-09 12:30:32', 0),
(4, 'Нет, это не вариант так отвечать', 'Собственно сабж', 'Anonymous', '2013-06-09 17:53:30', 2, 0, '2013-06-09 21:53:30', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `login`, `password`) VALUES
(1, 'eslider@live.ru', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
