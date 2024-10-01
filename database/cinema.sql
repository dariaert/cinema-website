-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2024 г., 00:14
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `age_limit`
--

CREATE TABLE `age_limit` (
  `id` int(16) NOT NULL,
  `name_ageLimit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `age_limit`
--

INSERT INTO `age_limit` (`id`, `name_ageLimit`) VALUES
(1, '6+'),
(2, '12+'),
(3, '18+'),
(4, '0+');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id` int(16) NOT NULL,
  `dateBoking` datetime NOT NULL,
  `amount` int(255) NOT NULL,
  `id_user` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id`, `dateBoking`, `amount`, `id_user`) VALUES
(1, '2024-04-15 00:00:00', 400, 2),
(2, '2024-04-12 00:00:00', 300, 3),
(3, '2024-03-01 00:00:00', 450, 1),
(4, '2024-05-03 00:00:00', 600, 7),
(6, '2024-05-03 00:00:00', 600, 7),
(7, '2024-05-04 00:00:00', 1350, 7),
(8, '2024-05-04 00:00:00', 2800, 7),
(9, '2024-05-04 00:00:00', 1380, 7),
(10, '2024-05-04 00:00:00', 2400, 7),
(11, '2024-05-04 00:00:00', 3300, 7),
(12, '2024-05-04 00:00:00', 2100, 7),
(13, '2024-05-04 00:00:00', 1200, 7),
(14, '2024-05-04 00:00:00', 1600, 7),
(15, '2024-05-04 00:00:00', 250, 7),
(16, '2024-05-04 00:00:00', 250, 7),
(17, '2024-05-04 00:00:00', 250, 7),
(18, '2024-05-04 00:00:00', 250, 7),
(19, '2024-05-04 00:00:00', 500, 7),
(20, '2024-05-04 00:00:00', 500, 7),
(21, '2024-05-04 11:47:21', 250, 7),
(22, '2024-05-04 12:21:10', 400, 5),
(23, '2024-05-04 12:22:24', 400, 5),
(24, '2024-05-05 12:13:28', 450, 7),
(25, '2024-05-05 20:07:45', 800, 5),
(26, '2024-05-05 20:19:17', 1050, 7),
(27, '2024-05-06 08:30:23', 500, 10),
(28, '2024-05-06 08:44:50', 400, 10),
(29, '2024-05-06 11:43:56', 600, 10),
(30, '2024-05-14 05:21:06', 700, 7),
(31, '2024-05-16 15:10:20', 500, 7),
(32, '2024-05-16 15:10:39', 500, 7),
(33, '2024-05-20 15:49:30', 150, 7),
(34, '2024-09-02 18:58:47', 600, 11),
(35, '2024-09-02 18:59:22', 900, 11),
(36, '2024-09-02 19:00:20', 2268, 11),
(37, '2024-09-02 19:57:30', 600, 11),
(38, '2024-09-03 08:39:22', 1134, 11),
(39, '2024-09-03 08:39:33', 5103, 11),
(40, '2024-09-03 08:40:13', 900, 11),
(41, '2024-09-03 11:41:21', 1134, 11),
(42, '2024-09-03 11:41:48', 1134, 11),
(43, '2024-09-29 20:48:53', 300, 12),
(44, '2024-09-29 20:49:08', 300, 12),
(45, '2024-09-29 20:49:14', 400, 12),
(46, '2024-10-02 00:10:37', 360, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `id_favourites` bigint(20) NOT NULL,
  `id_favourites_film` int(16) NOT NULL,
  `id_user` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favourites`
--

INSERT INTO `favourites` (`id_favourites`, `id_favourites_film`, `id_user`) VALUES
(16, 4, 9),
(17, 24, 5),
(18, 20, 5),
(19, 27, 7),
(20, 27, 10),
(21, 20, 10),
(23, 4, 7),
(24, 21, 7),
(29, 4, 11),
(30, 28, 12),
(31, 1, 14),
(32, 28, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id_film` int(16) NOT NULL,
  `name_film` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genre` int(16) NOT NULL,
  `id_ageLimit` int(16) NOT NULL,
  `poster_film` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filmmaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_film` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id_film`, `name_film`, `id_genre`, `id_ageLimit`, `poster_film`, `description`, `actors`, `filmmaker`, `country`, `duration_film`) VALUES
(1, 'Летучий корабль', 3, 1, 'poster_1714048525.png', 'Царь собирается выдать свою дочь Забаву за красавца Поля, единственного наследника богача Полкана. Вот только царевна хочет выйти замуж по любви. Ее неожиданное знакомство с простым, но честным и обаятельным матросом Иваном вносит смуту в планы хитреца Поля заполучить корону. И если в руках злодея темная магия и богатство, то на стороне Ивана – волшебные существа, любовь и мечта.', 'Александр Метёлкин, Ксения Трейстер, Андрей Бурковский, Леонид Ярмольник', 'Илья Учитель', 'Россия', 100),
(4, 'Пять ночей с Фредди', 5, 2, 'poster_1714048582.jpg', 'Пытаясь сохранить опекунство над сестрёнкой, Майк Шмидт устраивается работать ночным охранником в «Freddy Fazbear’s» — некогда популярный, но ныне закрытый семейный развлекательный центр. Несколько лет назад, когда Майк был ещё ребёнком, его младшего брата похитил неизвестный, и к этому событию парень снова и снова возвращается во сне, пытаясь вспомнить лицо похитителя. На новой работе в его снах появляются новые подробности — кажется, это место хранит зловещие тайны.', 'Джош Хатчерсон, Пайпер Рубио, Элизабет Лэил, Мэттью Лиллард', 'Эмма Тамми', 'США', 110),
(5, 'Артур, ты король', 2, 2, 'poster_1714048598.png', 'Это было последнее соревнование капитана по приключенческим гонкам Майкла Линднорда, он был полон решимости ничему не позволить встать у него на пути. Собрав первоклассную команду, он не мог и представить, что в 700-километровом забеге у них появится неожиданный попутчик — пес по кличке Артур, встреча с которым изменит не только исход гонки, но и их жизнь.', 'Марк Уолберг, Натали Эммануэль, Симу Лю, Майкл Лэндис, Пол Гилфойл', 'Саймон Селлан Джоунс', 'США', 109),
(20, 'Леди Баг и Супер-Кот: Пробуждение силы', 9, 1, 'poster_1713987987.png', 'В обыкновенной французской школе учатся девочка Маринетт и мальчик Адриан, в которого она влюблена. Казалось бы, классическая история первой любви, но эти ребята совсем не те, за кого себя выдают. Когда городу угрожает опасность, Маринетт превращается в супергероиню Леди Баг, а Адриан — в Супер-Кота. Их невероятные способности помогают бороться со злом, но при этом никто из них не знает, кто на самом деле скрывается под маской.', '', 'Джереми Заг', 'Франция', 105),
(21, 'Кунг-Фу Панда 4', 8, 2, 'poster_1714048865.png', 'Продолжение приключений легендарного Воина Дракона, его верных друзей и наставника.', '', 'Майк Митчелл, Стефани Стайн', 'США, Китай', 95),
(24, 'Человек-паук: Нет пути домой', 4, 2, 'poster_1714121961.jpg', 'Жизнь и репутация Питера Паркера оказываются под угрозой, поскольку Мистерио раскрыл всему миру тайну личности Человека-паука. Пытаясь исправить ситуацию, Питер обращается за помощью к Стивену Стрэнджу, но вскоре всё становится намного опаснее.', 'Том Холланд, Зендея, Бенедикт Камбербэтч, Мариса Томей, Уиллем Дефо, Альфред Молина, Джейми Фокс', 'Джон Уоттс', 'США', 148),
(25, 'Тройной форсаж: Токийский дрифт', 4, 2, 'poster_1714122183.jpg', 'Старшеклассник Шон Босуэлл только и делает, что попадает в неприятности. После очередной выходки — импровизированных гонок и аварии — парню уже светит тюрьма, тогда мать решает отправить его к отцу в Японию. В первый же день в японской школе он знакомится с соотечественником, а тот притаскивает нового друга на подпольные соревнования по дрифт-рейсингу. Тут Шону открывается доселе невиданное искусство прохождения поворотов — и он сразу же ввязывается в спор, с позором проиграв который, оказывается должен местному авторитету по имени Хан.', 'Лукас Блэк, Шэд Мосс, Сон Ган, Брайан Ти, Натали Келли, Брайан Гудман, Джейсон Тобин', 'Джастин Лин', 'США, Германия', 104),
(27, 'Майор Гром: Игра', 4, 2, 'poster_1714929409.jpg', 'Майор полиции Игорь Гром известен всему Санкт-Петербургу пробивным характером и непримиримой позицией по отношению к преступникам всех мастей. Неимоверная сила, аналитический склад ума и неподкупность — всё это делает майора Грома самым настоящим супергероем. Его жизнь идеальна: днём он ловит преступников вместе с напарником Димой Дубиным, а вечера проводит в компании журналистки Юлии Пчёлкиной. Полную идиллию прерывает появление в городе таинственного злодея, называющего себя Призраком. Он предлагает Грому сыграть в опасную игру, ставка в которой — жизни обычных людей.', 'Тихон Жизневский, Александр Сетейкин, Алексей Маклаков, Любовь Аксенова', 'Олег Трофим', 'Россия', 160),
(28, 'Дэдпул и Росомаха', 4, 3, 'poster_1727631802.jpg', 'Уэйд Уилсон попадает в организацию «Управление временными изменениями», что вынуждает его вернуться к своему альтер-эго Дэдпулу и изменить историю с помощью Росомахи.', 'Райан Рейнольдс, Хью Джекман, Эмма Коррин, Морена Баккарин, Роб Делани', 'Шон Леви', 'США', 127);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(16) NOT NULL,
  `name_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `name_genre`) VALUES
(1, 'Мелодрама'),
(2, 'Приключения'),
(3, 'Сказка'),
(4, 'Боевик'),
(5, 'Ужасы'),
(8, 'Анимация'),
(9, 'Мультфильм');

-- --------------------------------------------------------

--
-- Структура таблицы `order_element`
--

CREATE TABLE `order_element` (
  `id` int(16) NOT NULL,
  `id_ticket` int(16) NOT NULL,
  `id_order` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_element`
--

INSERT INTO `order_element` (`id`, `id_ticket`, `id_order`) VALUES
(1, 1, 43),
(2, 2, 43),
(3, 3, 43),
(4, 4, 44),
(5, 5, 44),
(6, 6, 44),
(7, 7, 45),
(8, 8, 45),
(9, 9, 45),
(10, 10, 45),
(11, 11, 46),
(12, 12, 46),
(13, 13, 46);

-- --------------------------------------------------------

--
-- Структура таблицы `seat`
--

CREATE TABLE `seat` (
  `id` int(16) NOT NULL,
  `row` int(16) NOT NULL,
  `seat_number` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `seat`
--

INSERT INTO `seat` (`id`, `row`, `seat_number`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 2, 1),
(22, 2, 2),
(23, 2, 3),
(24, 2, 4),
(25, 2, 5),
(26, 2, 6),
(27, 2, 7),
(28, 2, 8),
(29, 2, 9),
(30, 2, 10),
(31, 2, 11),
(32, 2, 12),
(33, 2, 13),
(34, 2, 14),
(35, 2, 15),
(36, 2, 16),
(37, 2, 17),
(38, 2, 18),
(39, 2, 19),
(40, 2, 20),
(41, 3, 1),
(42, 3, 2),
(43, 3, 3),
(44, 3, 4),
(45, 3, 5),
(46, 3, 6),
(47, 3, 7),
(48, 3, 8),
(49, 3, 9),
(50, 3, 10),
(51, 3, 11),
(52, 3, 12),
(53, 3, 13),
(54, 3, 14),
(55, 3, 15),
(56, 3, 16),
(57, 3, 17),
(58, 3, 18),
(59, 3, 19),
(60, 3, 20),
(61, 4, 1),
(62, 4, 2),
(63, 4, 3),
(64, 4, 4),
(65, 4, 5),
(66, 4, 6),
(67, 4, 7),
(68, 4, 8),
(69, 4, 9),
(70, 4, 10),
(71, 4, 11),
(72, 4, 12),
(73, 4, 13),
(74, 4, 14),
(75, 4, 15),
(76, 4, 16),
(77, 4, 17),
(78, 4, 18),
(79, 4, 19),
(80, 4, 20),
(81, 5, 1),
(82, 5, 2),
(83, 5, 3),
(84, 5, 4),
(85, 5, 5),
(86, 5, 6),
(87, 5, 7),
(88, 5, 8),
(89, 5, 9),
(90, 5, 10),
(91, 5, 11),
(92, 5, 12),
(93, 5, 13),
(94, 5, 14),
(95, 5, 15),
(96, 5, 16),
(97, 5, 17),
(98, 5, 18),
(99, 5, 19),
(100, 5, 20),
(101, 6, 1),
(102, 6, 2),
(103, 6, 3),
(104, 6, 4),
(105, 6, 5),
(106, 6, 6),
(107, 6, 7),
(108, 6, 8),
(109, 6, 9),
(110, 6, 10),
(111, 6, 11),
(112, 6, 12),
(113, 6, 13),
(114, 6, 14),
(115, 6, 15),
(116, 6, 16),
(117, 6, 17),
(118, 6, 18),
(119, 6, 19),
(120, 6, 20),
(121, 7, 1),
(122, 7, 2),
(123, 7, 3),
(124, 7, 4),
(125, 7, 5),
(126, 7, 6),
(127, 7, 7),
(128, 7, 8),
(129, 7, 9),
(130, 7, 10),
(131, 7, 11),
(132, 7, 12),
(133, 7, 13),
(134, 7, 14),
(135, 7, 15),
(136, 7, 16),
(137, 7, 17),
(138, 7, 18),
(139, 7, 19),
(140, 7, 20),
(141, 8, 1),
(142, 8, 2),
(143, 8, 3),
(144, 8, 4),
(145, 8, 5),
(146, 8, 6),
(147, 8, 7),
(148, 8, 8),
(149, 8, 9),
(150, 8, 10),
(151, 8, 11),
(152, 8, 12),
(153, 8, 13),
(154, 8, 14),
(155, 8, 15),
(156, 8, 16),
(157, 8, 17),
(158, 8, 18),
(159, 8, 19),
(160, 8, 20),
(161, 9, 1),
(162, 9, 2),
(163, 9, 3),
(164, 9, 4),
(165, 9, 5),
(166, 9, 6),
(167, 9, 7),
(168, 9, 8),
(169, 9, 9),
(170, 9, 10),
(171, 9, 11),
(172, 9, 12),
(173, 9, 13),
(174, 9, 14),
(175, 9, 15),
(176, 9, 16),
(177, 9, 17),
(178, 9, 18),
(179, 9, 19),
(180, 9, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `show_film`
--

CREATE TABLE `show_film` (
  `id` int(16) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_film` int(16) NOT NULL,
  `cost` int(255) NOT NULL,
  `id_ageLimit` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `show_film`
--

INSERT INTO `show_film` (`id`, `date`, `time`, `id_film`, `cost`, `id_ageLimit`) VALUES
(7, '2024-10-03', '12:00:00', 27, 120, NULL),
(8, '2024-10-14', '09:41:00', 21, 100, NULL),
(9, '2024-10-15', '11:00:00', 28, 100, NULL),
(10, '2024-10-15', '13:00:00', 28, 130, NULL),
(11, '2024-10-15', '20:47:00', 25, 400, NULL),
(12, '2024-10-18', '17:56:00', 27, 100, NULL),
(13, '2024-10-02', '07:13:00', 24, 555, NULL),
(14, '2024-10-02', '14:15:00', 28, 555, NULL),
(15, '2024-10-04', '05:11:00', 20, 555, NULL),
(16, '2024-10-04', '10:11:00', 20, 555, NULL),
(17, '2024-10-04', '22:15:00', 20, 667, NULL),
(18, '2024-10-04', '16:12:00', 27, 777, NULL),
(19, '2024-10-04', '20:15:00', 27, 456, NULL),
(20, '2024-10-05', '20:15:00', 21, 900, NULL),
(21, '2024-10-05', '18:06:00', 27, 678, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` int(16) NOT NULL,
  `id_seat` int(16) NOT NULL,
  `id_show_film` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `id_seat`, `id_show_film`) VALUES
(1, 68, 9),
(2, 69, 9),
(3, 70, 9),
(4, 111, 9),
(5, 112, 9),
(6, 113, 9),
(7, 29, 12),
(8, 30, 12),
(9, 17, 12),
(10, 112, 12),
(11, 148, 7),
(12, 149, 7),
(13, 150, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `FIO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `FIO`, `email`, `password`, `role`) VALUES
(1, 'Никулина Анастасия Александровна', 'anastasianikulina@yandex.ru', 'NRj289m', 'ROLE_USER'),
(2, 'Можаева Дарья Александровна', 'dariamozhaeva@yandex.ru', 'IM93Jnew', 'ROLE_ADMIN'),
(3, 'Можаева Милана Александровна', 'milmozhaeva@yandex.ru', 'QP4&j29', 'ROLE_USER'),
(5, 'Дарья', 'dary@yandex.ru', '$2y$10$LVgMEJhbBS.04ndDnAqIpOSoE6dypXk.4PY08IdydyzHZ.iuofQDa', 'ROLE_USER'),
(7, 'АДМИН', 'admin@yandex.ru', '$2y$10$QZlbaTCBU7e/1BLg74VDtOqbuNE7M/U2h0yWobHH8XG/MjmgZj53q', 'ROLE_ADMIN'),
(8, 'Владыко Олег', 'vladykoRaya@mail.ru', '$2y$10$LawHzhwAj5libj8EGOC6nuQ8YElIWB.s8jfes.vs00G.pITrjWNYW', 'ROLE_USER'),
(9, 'Милана', 'milana@yandex.ru', '$2y$10$IOwM4Krm9LCgIPRvsTBs5OEXMRQ.lYq5Dnwlv4rr.u5tg36OkhPTS', 'ROLE_USER'),
(10, 'Дарья', 'ff@gmail.com', '$2y$10$RMFvLDXIPGVf0SLE6VfIZOO.Wo.k3sPGXgR4UjcUVMXO/RFUoWbmK', 'ROLE_USER'),
(11, 'ADMINDARIA', 'dash.mozhaeva@yandex.ru', '$2y$10$T0xEfDybSCr2iVZ569zqQevqCAzZurKNubrROqC17kmw4joTPzQki', 'ROLE_ADMIN'),
(12, 'админ', 'admin@yandex.com', '$2y$10$5I2EptK1zazRO0gAAF0u1.tB5NCKiV79hVayBvDEGxxOD5dnCzsiC', 'ROLE_ADMIN'),
(13, 'Пользователь', 'polz@gmail.com', '$2y$10$FUcv.i7WW2i1apH/dm6OhObUxmRhSTExli4566XvBuTp.JMi32Nva', 'ROLE_USER'),
(14, 'человек', 'test@test.ru', '$2y$10$krc9H7T0Al856wtQDsPQeOnLDNz7eF9qGRmznKxMMA1KkdEL0RINS', 'ROLE_USER');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `age_limit`
--
ALTER TABLE `age_limit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id_favourites`),
  ADD KEY `id_favourites_element` (`id_favourites_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_ageLimit` (`id_ageLimit`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_element`
--
ALTER TABLE `order_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `show_film`
--
ALTER TABLE `show_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seat` (`id_seat`),
  ADD KEY `id_show_film` (`id_show_film`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `age_limit`
--
ALTER TABLE `age_limit`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id_favourites` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `order_element`
--
ALTER TABLE `order_element`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT для таблицы `show_film`
--
ALTER TABLE `show_film`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`id_favourites_film`) REFERENCES `film` (`id_film`);

--
-- Ограничения внешнего ключа таблицы `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`id_ageLimit`) REFERENCES `age_limit` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_element`
--
ALTER TABLE `order_element`
  ADD CONSTRAINT `order_element_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `order_element_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `booking` (`id`);

--
-- Ограничения внешнего ключа таблицы `show_film`
--
ALTER TABLE `show_film`
  ADD CONSTRAINT `show_film_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_show_film`) REFERENCES `show_film` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_seat`) REFERENCES `seat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
