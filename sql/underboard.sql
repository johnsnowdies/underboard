-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 16 2013 г., 06:40
-- Версия сервера: 5.5.29
-- Версия PHP: 5.4.6-1ubuntu1

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
  `last_update` datetime NOT NULL,
  `count` int(32) NOT NULL,
  `dislikes` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `timestamp`, `parent`, `last_update`, `count`, `dislikes`) VALUES
(6, 'Первый тред', 'Тело первого треда', 'Anonymous', '2013-04-02 06:06:16', 0, '2013-04-05 15:35:31', 2, 0),
(7, 'Второй тред', 'Бла бла бла бла!', 'Anonymous', '2013-04-02 06:09:33', 0, '2013-04-03 12:43:37', 2, 0),
(8, 'Третий тред', 'Сема йобушкин', 'Anonymous', '2013-04-02 06:11:55', 0, '2013-04-05 15:03:43', 1, 0),
(12, 'asdas', 'asdasd', 'Anonymous', '2013-04-02 09:01:36', 0, '2013-04-03 10:50:36', 1, 0),
(13, 'asd', 'asDASD', 'Anonymous', '2013-04-02 09:02:33', 0, '2013-04-02 16:45:30', 0, 0),
(17, '', 'Новая тема!', 'Anonymous', '2013-04-02 10:19:54', 0, '2013-04-02 14:19:54', 0, 0),
(18, '', 'Анон, я давно хочу рассказать кому-нибудь о довольно двух странных случаях.\r\nПервый был весной 2010 года. Я ехал в маршрутке, на переднем месте и просто смотрел в окно. Тут моё внимание привлекла женщина, переходящая на противоположную сторону дорогу. Отвлекаясь от темы скажу, что память на лица у меня хорошая. Так вот, я запомнил её лицо, в нём было что-то, хм, необычное и одета она была ярко, зелёно-оранжевая куртка и юбка. Переходя дорогу, она повернула голову и безо всяких эмоций смотрела на меня пару секунд, от чего мне стало не по себе. Загорелся зелёный свет и мы поехали дальше. Все вы знаете, как ездят наши маршрутчики, лишь бы побыстрее. Через минут пять, может чуть больше, мы были как минимум в пяти километрах от того перехода и остановились на светофоре перед остановкой, я продолжал пялиться в окно и увидел её на остановке. Ту женщину. Я точно уверен, что это была она и смотрела как-то отрешённо, а потом взглянула на меня, безо всяких эмоций. Не ждите кирпичных рож, или растянутого искажённого рта, просто никаких эмоций. Маршрутка тронулась и я стал соображать, как она оказалась тут, когда я видел её несколько минут назад, переходящей на другую сторону дороги. Даже если допустить, что она быстро вернулась обратно, села на маршрутку, или поймала такси, то на это бы ушло как минимум минут 10 и ей нужно было бы обогнать нас и выйти на остановке, оно ей надо?\r\nИ вот второй случай.\r\nТот странный инцидент я уже забыл, ехал в маршрутке, снова на переднем месте, была осень, я помню этот день, было первое ноября и пошёл первый снег, небо было светло-серым, полностью затянуто. Маршрутка остановилась и я краем глаза заметил мужчину, не знаю почему, но он привлёк моё внимание. У него была козлиная бородка, был одет в пальто и брюки. И его лицо. Что-то мне в нём не понравилось. Он смотрел вперёд безо всяких эмоций, а потом повернул голову и просто начал смотреть на меня. Тут я обосрался и вспомнил про ту женщину. Маршрутка поехала дальше, а я смотрел на того мужчину глазами с пятирублёвую монету, водитель наверное подумал, что я поехавший какой-то. Вот мы проехали по дороге, которая чем-то похожа на шоссе-широкая и все по ней неслись минимум 80 км/ч. Так мы проехали несколько километров и я вновь увидел этого мужика, он шёл по пешеходной дорожке и смотрел на меня, причём шёл спокойно. Как он так быстро оказался в том месте и вообще, что это? Может с аноном происходило такое, или я просто псих?', 'Anonymous', '2013-04-02 11:15:13', 0, '2013-04-02 15:15:13', 0, 0),
(19, '', '\r\n     Я посмотрел свои заметки, и они мне не понравились. Те три дня, которые\r\nя провел  на  предприятиях фирмы "Ю  С. Роботе", я мог бы с таким же успехом\r\nпросидеть дома, изучая энциклопедию.\r\n     Как мне сказали, Сьюзен Кэлвин родилась в 1982 году. Значит,  теперь ей\r\nсемьдесят пять. Это известно  каждому. Фирме "Ю  С. Роботе энд Мекэникел Мэн\r\nКорпорэишн" тоже семьдесят пять лет. Именно в тот год, когда родилась доктор\r\nКэлвин, Лоуренс  Робертсби основал предприятие,  которое со  временем  стало\r\nсамым необыкновенным промышленным гигантом в истории  человечества. Но и это\r\nтоже известно каждому.\r\n     В двадцать лет  Сьюзен  Кэлвин  присутствовала  на  том  самом  занятии\r\nсеминара по психоматематике, когда доктор Альфред  Лэннинг из "Ю. С. Роботс"\r\nпродемонстрировал  первого  подвижного  робота,  обладавшего  голосом.  Этот\r\nбольшой, неуклюжий, уродливый робот, от которого разило машинным маслом, был\r\nпредназначен для использования в проектировавшихся  рудниках на Меркурии. Но\r\nон умел говорить, и говорить разумно.\r\n     На этом  семинаре  Сьюзен не  выступала.  Она не  приняла участия  и  в\r\nпоследовавших   за   ним   бурных   дискуссиях.   Мир   не   нравился   этой\r\nмалообщительной, бесцветной и неинтересной девушке с  каменным  выражением и\r\nгипертрофированным интеллектом, и она сторонилась людей.\r\n     Но слушая  и  наблюдая, она уже тогда почувствовала, как в ней холодным\r\nпламенем загорается увлечение.\r\n     В  2005  году  она  окончила  Колумбийский  университет  в поступила  в\r\nаспирантуру по кибернетике.\r\n     Изобретенные  Робертсоном  позитронные  мозговые  связи  превзошли  все\r\nдостигнутое в  середине XX века  в области  вычислительных машин и совершили\r\nнастоящий  переворот.  Целые  мили  реле  и  фотоэлементов  уступили   место\r\nпористому платино-иридиевому шару размером с человеческий мозг.\r\n     Сьюзен  научилась  рассчитывать   необходимые   параметры,   определять\r\nвозможные  значения  переменных позитронного "мозга"  и  разрабатывать такие\r\nсхемы,  чтобы  можно   было   точно  предсказать  его  реакцию   на   данные\r\nраздражители.\r\n     В 2008 году она получила степень доктора и поступила на "Ю.  С. Роботс"\r\nв   качестве   робопсихолога,  став,   таким   образом,   первым  выдающимся\r\nспециалистом в этой новой области науки. Лоуренс Робертсон тогда все еще был\r\nпрезидентом компании, Альфред Лэннинг - научным руководителем.', 'Anonymous', '2013-04-02 11:22:05', 0, '2013-04-02 15:22:05', 0, 0),
(20, 'Очень странная история', 'Анон, я давно хочу рассказать кому-нибудь о довольно двух странных случаях. Первый был весной 2010 года. Я ехал в маршрутке, на переднем месте и просто смотрел в окно. Тут моё внимание привлекла женщина, переходящая на противоположную сторону дорогу. Отвлекаясь от темы скажу, что память на лица у меня хорошая. Так вот, я запомнил её лицо, в нём было что-то, хм, необычное и одета она была ярко, зелёно-оранжевая куртка и юбка. Переходя дорогу, она повернула голову и безо всяких эмоций смотрела на меня пару секунд, от чего мне стало не по себе. Загорелся зелёный свет и мы поехали дальше. Все вы знаете, как ездят наши маршрутчики, лишь бы побыстрее. Через минут пять, может чуть больше, мы были как минимум в пяти километрах от того перехода и остановились на светофоре перед остановкой, я продолжал пялиться в окно и увидел её на остановке. Ту женщину. Я точно уверен, что это была она и смотрела как-то отрешённо, а потом взглянула на меня, безо всяких эмоций. Не ждите кирпичных рож, или растянутого искажённого рта, просто никаких эмоций. Маршрутка тронулась и я стал соображать, как она оказалась тут, когда я видел её несколько минут назад, переходящей на другую сторону дороги. Даже если допустить, что она быстро вернулась обратно, села на маршрутку, или поймала такси, то на это бы ушло как минимум минут 10 и ей нужно было бы обогнать нас и выйти на остановке, оно ей надо? И вот второй случай. Тот странный инцидент я уже забыл, ехал в маршрутке, снова на переднем месте, была осень, я помню этот день, было первое ноября и пошёл первый снег, небо было светло-серым, полностью затянуто. Маршрутка остановилась и я краем глаза заметил мужчину, не знаю почему, но он привлёк моё внимание. У него была козлиная бородка, был одет в пальто и брюки. И его лицо. Что-то мне в нём не понравилось. Он смотрел вперёд безо всяких эмоций, а потом повернул голову и просто начал смотреть на меня. Тут я обосрался и вспомнил про ту женщину. Маршрутка поехала дальше, а я смотрел на того мужчину глазами с пятирублёвую монету, водитель наверное подумал, что я поехавший какой-то. Вот мы проехали по дороге, которая чем-то похожа на шоссе-широкая и все по ней неслись минимум 80 км/ч. Так мы проехали несколько километров и я вновь увидел этого мужика, он шёл по пешеходной дорожке и смотрел на меня, причём шёл спокойно. Как он так быстро оказался в том месте и вообще, что это? Может с аноном происходило такое, или я просто псих?', 'Anonymous', '2013-04-02 11:28:33', 0, '2013-04-03 14:36:48', 4, 0),
(24, '', 'Нет, это идиотизм!', 'Anonymous', '2013-04-03 05:10:19', 7, '2013-04-03 09:10:19', 0, 0),
(25, 'Ах блять всегда заголовок!', 'Штоу?', 'Anonymous', '2013-04-03 06:50:36', 12, '2013-04-03 10:50:36', 0, 0),
(26, 'Хуита-хуита!', 'Правдивая история, бро', 'Anonymous', '2013-04-03 07:42:09', 20, '2013-04-03 11:42:09', 0, 0),
(27, 'А как ты хотел?', 'Не ждите кирпичных рож, или растянутого искажённого рта, просто никаких эмоций. Маршрутка тронулась и я стал соображать, как она оказалась тут, когда я видел её несколько минут назад, переходящей на другую сторону дороги. Даже если допустить, что она быстро вернулась обратно, села на маршрутку, или поймала такси, то на это бы ушло как минимум минут 10 и ей нужно было бы обогнать нас и выйти на остановке, оно ей надо? И вот второй случай. Тот странный инцидент я уже забыл, ехал в маршрутке, снова на переднем месте, была осень, я помню этот день, было первое ноября и пошёл первый снег, небо было светло-серым, полностью затянуто. Маршрутка остановилась и я краем глаза заметил мужчину, не знаю почему, но он привлёк моё внимание. У него была козлиная бородка, был одет в пальто и брюки. И его лицо. Что-то мне в нём не понравилось.', 'Anonymous', '2013-04-03 08:43:37', 7, '2013-04-03 12:43:37', 0, 0),
(28, '111', 'Не ждите кирпичных рож, или растянутого искажённого рта, просто никаких эмоций. Маршрутка тронулась и я стал соображать, как она оказалась тут, когда я видел её несколько минут назад, переходящей на другую сторону дороги. Даже если допустить, что она быстро вернулась обратно, села на маршрутку, или поймала такси, то на это бы ушло как минимум минут 10 и ей нужно было бы обогнать нас и выйти на остановке, оно ей надо? И вот второй случай. Тот странный инцидент я уже забыл, ехал в маршрутке, снова на переднем месте, была осень, я помню этот день, было первое ноября и пошёл первый снег, небо было светло-серым, полностью затянуто. Маршрутка остановилась и я краем глаза заметил мужчину, не знаю почему, но он привлёк моё внимание. У него была козлиная бородка, был одет в пальто и брюки. И его лицо. Что-то мне в нём не понравилось.', 'Anonymous', '2013-04-03 08:43:51', 20, '2013-04-03 12:43:51', 0, 0),
(29, ' ', 'font-size: 2em;\r\n        font-family: cambria;', 'Anonymous', '2013-04-03 08:46:39', 20, '2013-04-03 12:46:39', 0, 0),
(30, 'Комментария', 'Семен \r\nЙобушкин\r\nНегодует', 'Anonymous', '2013-04-03 10:36:48', 20, '2013-04-03 14:36:48', 0, 0),
(31, 'Без названия', 'И вот, я вернулась по старым своим же следам \r\nНайдя их под снегом, по мху и следам на деревьях \r\nБросалась с улыбкой к любимым своим и друзьям, \r\nОни отвечали: "Родная, ошиблася дверью". \r\n\r\nПрошли все проблемы весны и кураж января \r\n﻿Сменились сто масок, истоптаны сотни сапог \r\nЯ, правда, не знаю: я в зеркале, или не я? \r\nСтелить мне солому? А может, нажать на курок? \r\n\r\nЯ помню вкус виски, вкус жизни и запах любви \r\nДороги, как цепи, стянули мне руки и губы. \r\nРодная, любимая, можешь - пойми и прости. \r\nА я не исчезну. "Я был, я вернулся, я буду."', 'Anonymous', '2013-04-03 10:38:56', 0, '2013-04-03 14:42:39', 2, 0),
(32, 'Комментария', 'Слушай, это восхитительно!', 'Anonymous', '2013-04-03 10:40:38', 31, '2013-04-03 14:40:38', 0, 0),
(33, 'Комментарий', '#32 \r\nСпасибо тебе большое)', 'Anonymous', '2013-04-03 10:42:39', 31, '2013-04-03 14:42:39', 0, 0),
(34, 'Рабочий тред', 'Семен', 'Anonymous', '2013-04-05 11:02:59', 0, '2013-04-05 15:02:59', 0, 0),
(35, 'Заголовок', 'Бампанем Сёму!', 'Anonymous', '2013-04-05 11:03:43', 8, '2013-04-05 15:03:43', 0, 0),
(36, 'Проверка пагинации', 'Пагагинг же!', 'Anonymous', '2013-04-05 11:34:50', 0, '2013-04-05 15:34:50', 0, 0),
(37, 'Заголовокъ!', 'Сейчас Как бампану первый!', 'Anonymous', '2013-04-05 11:35:12', 6, '2013-04-05 15:35:12', 0, 0),
(38, 'Ну?', 'Зачем ты это сделал?', 'Anonymous', '2013-04-05 11:35:31', 6, '2013-04-05 15:35:31', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registration` datetime NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `membership` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `login`, `password`, `membership`) VALUES
(1, '0000-00-00 00:00:00', 'eslider', '8057ef5cd2bb119006fd7b5c71704f2c', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
