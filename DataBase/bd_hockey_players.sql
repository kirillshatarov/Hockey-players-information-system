-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd_hockey_players`
--

-- --------------------------------------------------------

--
-- Структура таблицы `award_hc`
--

CREATE TABLE `award_hc` (
  `id` int(11) NOT NULL,
  `id_statistics_hc` int(11) NOT NULL,
  `award` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `award_hc` (`id`, `id_statistics_hc`, `award`) VALUES
(1, 1, 'Кубок Гагарина'),
(2, 2, 'Кубок Леонова'),
(3, 3, 'Кубок Харламова'),
(5, 5, 'Чемпион России 2004 и 2021 годов. Обладатель Кубка Гагарина 2021 года.');

-- --------------------------------------------------------

--
-- Структура таблицы `city_of_birth`
--

CREATE TABLE `city_of_birth` (
  `id` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `name_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `city_of_birth` (`id`, `id_region`, `name_city`) VALUES
(1, 1, 'Подольск'),
(3, 1, 'Нижний Тагил'),
(9, 1, 'Новосибирск'),
(12, 10, 'Астана'),
(28, 1, 'Магнитогорск'),
(29, 1, 'Нижний Тагил'),
(30, 1, 'Пенза'),
(31, 1, 'Новокузнецк');

-- --------------------------------------------------------

--
-- Структура таблицы `coach`
--

CREATE TABLE `coach` (
  `id` int(11) NOT NULL,
  `id_coaching_staff` int(11) NOT NULL,
  `coach_surname` varchar(255) NOT NULL,
  `coach_name` varchar(255) NOT NULL,
  `coach_patronymic` varchar(255) NOT NULL,
  `coaching_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `coach` (`id`, `id_coaching_staff`, `coach_surname`, `coach_name`, `coach_patronymic`, `coaching_position`) VALUES
(1, 1, 'Нефедов', 'Дмитрий', 'Борисович', 'Главный тренер'),
(2, 2, 'Фёдоров', 'Сергей', 'Викторович', 'Главный тренер'),
(3, 3, 'Новиков', 'Антон', 'Павлович', 'Главный тренер'),
(5, 5, 'Кравец', 'Михаил', 'Григорьевич', 'Главный тренер');

-- --------------------------------------------------------

--
-- Структура таблицы `coaching_staff`
--

CREATE TABLE `coaching_staff` (
  `id` int(11) NOT NULL,
  `id_hockey_club` int(11) NOT NULL,
  `number_of_coaches` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `coaching_staff` (`id`, `id_hockey_club`, `number_of_coaches`) VALUES
(1, 1, 5),
(2, 2, 13),
(3, 6, 5),
(5, 9, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_hockey_club` int(11) NOT NULL,
  `type_of_contract` varchar(255) NOT NULL,
  `contract_amount` varchar(255) NOT NULL,
  `date_of_signing` date NOT NULL,
  `contract_duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `contract` (`id`, `id_player`, `id_hockey_club`, `type_of_contract`, `contract_amount`, `date_of_signing`, `contract_duration`) VALUES
(3, 5, 1, '«Основная команда» (односторонний)', '15000000', '2022-05-15', '3'),
(11, 31, 2, '«Основная команда» (односторонний)', '250000000', '2021-05-21', '3'),
(27, 52, 2, '«Основная команда» (односторонний)', '12000000', '2018-04-30', '6'),
(28, 53, 9, '«Основная команда» (односторонний)', '560000', '2021-05-15', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `country_hc`
--

CREATE TABLE `country_hc` (
  `id` int(11) NOT NULL,
  `name_country_hc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `country_hc` (`id`, `name_country_hc`) VALUES
(1, 'США'),
(2, 'Россия'),
(3, 'Канада'),
(4, 'Швеция'),
(5, 'Великобритания'),
(6, 'Казахстан'),
(7, 'Беларусь'),
(8, 'Латвия'),
(9, 'Финляндия'),
(10, 'Китай');

-- --------------------------------------------------------

--
-- Структура таблицы `hockey_club`
--

CREATE TABLE `hockey_club` (
  `id` int(11) NOT NULL,
  `id_country_hc` int(11) NOT NULL,
  `id_manager_hc` int(11) NOT NULL,
  `name_h` varchar(255) NOT NULL,
  `city_hc` varchar(255) NOT NULL,
  `league` varchar(255) NOT NULL,
  `home_arena` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `conference` varchar(255) NOT NULL,
  `year_of_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `hockey_club` (`id`, `id_country_hc`, `id_manager_hc`, `name_h`, `city_hc`, `league`, `home_arena`, `division`, `conference`, `year_of_creation`) VALUES
(1, 2, 3, 'Ак Барс', 'Казань', 'КХЛ', 'Татнефть арена', 'Харламова', 'Восток', '1956-05-27'),
(2, 2, 2, 'ЦСКА', 'Москва', 'КХЛ', 'ЦСКА арена', 'Тарасова', 'Запад', '1946-01-01'),
(6, 2, 1, 'СКА', 'Санкт-Петербург', 'КХЛ', 'МСРК Ледовый Дворец', 'Боброва', 'Запад', '1946-10-15'),
(8, 1, 1, 'Вашингтон Кэпиталз', 'Вашингтон', 'НХЛ', 'Вашингтон арена', '-', '-', '2002-01-10'),
(9, 2, 16, 'Авангард', 'Омск', 'КХЛ', 'ЛД Арена Балашиха', 'Чернышёва', 'Восток', '1950-10-10'),
(10, 2, 9, 'Автомобилист', 'Екатеринбург', 'КХЛ', 'КРК Уралец', 'Харламова', 'Восток', '1946-01-01'),
(11, 2, 8, 'Адмирал', 'Владивосток', 'КХЛ', 'КСК Фетисов Арена', 'Чернышёва', 'Восток', '2013-03-25'),
(12, 2, 15, 'Амур', 'Хабаровск', 'КХЛ', 'СКЗ Платинум Арена', 'Чернышёва', 'Восток', '1957-12-20'),
(13, 6, 10, 'Барыс', 'Нур-Султан', 'КХЛ', 'Барыс Арена', 'Чернышёва', 'Восток', '1999-10-01'),
(14, 2, 13, 'Витязь', 'Чехов', 'КХЛ', 'ЛД Витязь', 'Боброва', 'Запад', '1996-11-01'),
(15, 7, 1, 'Динамо Мн', 'Минск', 'КХЛ', 'МКСК Минск-Арена', 'Тарасова', 'Запад', '1948-07-01'),
(16, 2, 16, 'Динамо Мск', 'Москва', 'КХЛ', 'ВТБ Арена-Парк', 'Тарасова', 'Запад', '1946-08-01'),
(17, 8, 15, 'Динамо Р', 'Рига', 'КХЛ', 'Арена Рига', 'Тарасова', 'Запад', '2008-01-10'),
(18, 9, 12, 'Йокерит', 'Хельсинки', 'КХЛ', 'Хартвалл Арена', 'Боброва', 'Запад', '1967-03-01'),
(19, 10, 1, 'Куньлунь Ред Стар', 'Пекин', 'КХЛ', 'Леспорт-центр', 'Харламова', 'Восток', '2016-08-25'),
(20, 2, 14, 'Локомотив', 'Ярославль', 'КХЛ', 'УКРК Арена-2000', 'Тарасова', 'Запад', '1959-05-05'),
(21, 2, 15, 'Металлург', 'Магнитогорск', 'КХЛ', 'УКРК Арена Металлург', 'Харламова', 'Восток', '1955-10-10'),
(22, 2, 13, 'Нефтехимик', 'Нижнекамск', 'КХЛ', 'ЛД Нефтехимик Арена', 'Харламова', 'Восток', '1968-01-01'),
(23, 2, 7, 'Салават Юлаев', 'Уфа', 'КХЛ', 'УСА Уфа-Арена', 'Чернышёва', 'Восток', '1961-03-30'),
(24, 2, 11, 'Северсталь', 'Череповец', 'КХЛ', 'МАУ Ледовый Дворец', 'Тарасова', 'Запад', '1956-07-02'),
(25, 2, 6, 'Сибирь', 'Новосибирск', 'КХЛ', 'ЛДС Сибирь', 'Чернышёва', 'Восток', '1962-01-01'),
(27, 2, 5, 'ХК Сочи', 'Сочи', 'КХЛ', 'ДС Большой', 'Боброва', 'Запад', '2014-10-20'),
(28, 2, 14, 'Спартак', 'Москва', 'КХЛ', 'МСК ЦСКА Арена', 'Боброва', 'Запад', '1946-04-15'),
(29, 2, 5, 'Торпедо', 'Нижний Новгород', 'КХЛ', 'КРК Нагорный', 'Боброва', 'Запад', '1946-08-10'),
(30, 2, 6, 'Трактор', 'Челябинск', 'КХЛ', 'ЛА Трактор им. В.К.Белоусова', 'Харламова', 'Восток', '1947-07-17');

-- --------------------------------------------------------

--
-- Структура таблицы `hockey_player`
--

CREATE TABLE `hockey_player` (
  `id` int(11) NOT NULL,
  `id_place_of_birth` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `sports_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `hockey_player` (`id`, `id_place_of_birth`, `surname`, `name`, `patronymic`, `date_of_birth`, `height`, `weight`, `role`, `number`, `sports_category`) VALUES
(5, 4, 'Радулов', 'Александр', 'Валерьевич', '1986-07-05', 185, 91, 'Нападающий', 47, 'ОЧ'),
(31, 7, 'Нестеров', 'Никита', 'Данилович', '1993-03-28', 181, 90, 'Защитник', 89, 'ЗМС'),
(52, 28, 'Слепышев', 'Антон', 'Владимирович', '1994-05-13', 187, 96, 'Нападающий', 9, 'МС'),
(53, 29, 'Телегин', 'Иван', 'Алексеевич', '1992-02-28', 193, 96, 'Нападающий', 6, 'ЗМС');

-- --------------------------------------------------------

--
-- Структура таблицы `lvl_user`
--

CREATE TABLE `lvl_user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `lvl_user` (`id`, `login`, `password`, `rank`) VALUES
(1, 'admin', '112233', 99),
(2, 'manager', '2222', 50),
(3, 'user', '3333', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `manager_hc`
--

CREATE TABLE `manager_hc` (
  `id` int(11) NOT NULL,
  `manager_surname` varchar(255) NOT NULL,
  `manager_name` varchar(255) NOT NULL,
  `manager_patronymic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `manager_hc` (`id`, `manager_surname`, `manager_name`, `manager_patronymic`) VALUES
(1, 'Швецов', 'Андрей', 'Витальевич'),
(2, 'Васильев', 'Игорь', 'Андреевич'),
(3, 'Прокопьев', 'Семен', 'Александрович'),
(5, 'Иванов', 'Александр ', 'Сергеевич'),
(6, 'Петров', 'Дмитрий', 'Александрович'),
(7, 'Сидоров', 'Андрей', 'Иванович'),
(8, 'Кузнецов', 'Владимир', 'Викторович'),
(9, 'Николаев', 'Алексей', 'Андреевич'),
(10, 'Григорьев', 'Игорь', 'Викторович'),
(11, 'Михайлов', 'Артем', 'Петрович'),
(12, 'Ледев', 'Сергей', 'Сергеевич'),
(13, 'Козлов', 'Евгений', 'Алексеевич'),
(14, 'Соколов', 'Андрей', 'Игоревич'),
(15, 'Жуков', 'Владимир', 'Владимирович'),
(16, 'Белов', 'Алексей', 'Николаевич');

-- --------------------------------------------------------

--
-- Структура таблицы `place_of_birth`
--

CREATE TABLE `place_of_birth` (
  `id` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `place_of_birth` (`id`, `id_city`, `street`) VALUES
(2, 1, 'Восковая'),
(4, 3, 'Проспект Дзержинского'),
(7, 9, 'Первомайская'),
(26, 28, 'Суворова'),
(27, 29, 'имени Иосифа Горошникова'),
(28, 30, 'Карла Маркса'),
(29, 31, 'Кабардинская');

-- --------------------------------------------------------

--
-- Структура таблицы `player_reward`
--

CREATE TABLE `player_reward` (
  `id` int(11) NOT NULL,
  `id_player_statistics` int(11) NOT NULL,
  `reward` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `player_reward` (`id`, `id_player_statistics`, `reward`) VALUES
(3, 3, 'Обладатель Кубка Гагарина (2011), серебряный (2016) и бронзовый (2010) призёр чемпионатов России, самый ценный игрок регулярного чемпионата КХЛ (2009/10, 2014/15), семикратный участник Матча звёзд КХЛ (2009, 2010, 2011, 2012, 2013, 2014, 2016), обладатель приза Мишель Бриер Мемориал Трофи (2006), двукратный чемпион мира (2008, 2009), бронзовый призёр чемпионата мира (2007), двукратный серебряный призёр МЧМ (2005, 2006)'),
(8, 7, 'Кубок Гагарина'),
(11, 11, 'Серебряный призёр Олимпийских игр (2022);\r\nОбладатель Кубка Гагарина (2019, 2022, 2023);\r\nЧемпион России (2019, 2020, 2022, 2023);\r\nОбладатель Кубка Континента им. В.В. Тихонова (2019, 2020, 2021);\r\nСеребряный призер чемпионата России (2021);'),
(12, 13, 'Олимпийский чемпион 2018, Серебряный призёр чемпионата России 2018, Обладатель Кубка Гагарина 2019, Чемпион России 2019, Чемпион России 2020, Серебряный призёр чемпионата России 2021, Бронзовый призёр чемпионата КХЛ 2023.');

-- --------------------------------------------------------

--
-- Структура таблицы `player_statistics`
--

CREATE TABLE `player_statistics` (
  `id` int(11) NOT NULL,
  `id_hockey_player` int(11) NOT NULL,
  `id_season` int(11) NOT NULL,
  `number_of_games` int(11) NOT NULL,
  `number_of_goals` int(11) NOT NULL,
  `number_of_assists` int(11) NOT NULL,
  `number_of_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `player_statistics` (`id`, `id_hockey_player`, `id_season`, `number_of_games`, `number_of_goals`, `number_of_assists`, `number_of_points`) VALUES
(3, 5, 1, 62, 25, 32, 57),
(7, 31, 2, 41, 5, 28, 33),
(11, 52, 1, 50, 10, 17, 27),
(12, 52, 2, 35, 10, 15, 25),
(13, 53, 1, 14, 0, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `region_of_birth`
--

CREATE TABLE `region_of_birth` (
  `id` int(11) NOT NULL,
  `name_region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `region_of_birth` (`id`, `name_region`) VALUES
(1, 'Россия'),
(10, 'Казахстан'),
(28, 'Беларусь'),
(29, 'Украина'),
(30, 'Норвегия'),
(31, 'Финляндия'),
(32, 'Эстония'),
(33, 'Латвия'),
(34, 'Литва'),
(35, 'Польша'),
(36, 'Китай'),
(37, 'Германия'),
(38, 'США'),
(39, 'Канада'),
(40, 'Великобритания'),
(41, 'Англия'),
(42, 'Швейцария'),
(43, 'Швеция'),
(44, 'Дания'),
(45, 'Франция'),
(46, 'Венгрия'),
(47, 'Австрия'),
(48, 'Чехия'),
(49, 'Словакия'),
(50, 'Словения');

-- --------------------------------------------------------

--
-- Структура таблицы `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `season_years` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `season` (`id`, `season_years`) VALUES
(1, '2022-2023'),
(2, '2021-2022'),
(7, '2000-2001'),
(8, '2001-2002'),
(9, '2002-2003'),
(10, '2003-2004'),
(11, '2004-2005'),
(12, '2005-2006'),
(13, '2006-2007'),
(14, '2007-2008'),
(15, '2008-2009'),
(16, '2009-2010'),
(17, '2010-2011'),
(18, '2011-2012'),
(19, '2012-2013'),
(20, '2013-2014'),
(21, '2014-2015'),
(22, '2015-2016'),
(23, '2016-2017'),
(24, '2017-2018'),
(25, '2018-2019'),
(26, '2019-2020');

-- --------------------------------------------------------

--
-- Структура таблицы `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `sponsor` (`id`, `sponsor_name`) VALUES
(1, 'toyota'),
(2, 'TATNEFT'),
(3, 'Жигули'),
(4, 'АвтоВаз'),
(5, 'Shkoda'),
(6, 'ГАЗ'),
(7, 'Газпром нефть');

-- --------------------------------------------------------

--
-- Структура таблицы `sponsorship_contracts`
--

CREATE TABLE `sponsorship_contracts` (
  `id` int(11) NOT NULL,
  `id_hockey_club` int(11) NOT NULL,
  `id_sponsor` int(11) NOT NULL,
  `sponsor_contract_amount` varchar(255) NOT NULL,
  `date_of_conclusion` date NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `sponsorship_contracts` (`id`, `id_hockey_club`, `id_sponsor`, `sponsor_contract_amount`, `date_of_conclusion`, `duration`) VALUES
(1, 1, 2, '200000000', '2015-05-15', '8'),
(2, 2, 4, '100000000', '2005-01-10', '8'),
(3, 6, 6, '10000000', '2020-10-10', '3'),
(5, 9, 7, '200000000', '2018-10-30', '15');

-- --------------------------------------------------------

--
-- Структура таблицы `statistics_hc`
--

CREATE TABLE `statistics_hc` (
  `id` int(11) NOT NULL,
  `id_season` int(11) NOT NULL,
  `id_hockey_club` int(11) NOT NULL,
  `number_of_games_played` int(11) NOT NULL,
  `number_of_wins` int(11) NOT NULL,
  `number_of_points_hc` int(11) NOT NULL,
  `place_in_the_league` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `statistics_hc` (`id`, `id_season`, `id_hockey_club`, `number_of_games_played`, `number_of_wins`, `number_of_points_hc`, `place_in_the_league`) VALUES
(1, 1, 1, 30, 20, 300, 5),
(2, 2, 2, 35, 34, 448, 1),
(3, 1, 6, 23, 15, 46, 3),
(5, 1, 9, 14, 9, 22, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(355) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`) VALUES
(10, '', 'test', '', '202cb962ac59075b964b07152d234b70'),
(11, 'Сергеев Иван Сергеевич', 'sergeev.i.s', 'sergeev@gmail.com', 'a591024321c5e2bdbd23ed35f0574dde'),
(12, 'Иванов Александр Сергеевич', 'ivanov.a.s', 'ivanov@gmail.com', '4dfe6e220d16e7b633cfdd92bcc8050b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `award_hc`
--
ALTER TABLE `award_hc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_statistics_hc` (`id_statistics_hc`);

--
-- Индексы таблицы `city_of_birth`
--
ALTER TABLE `city_of_birth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Индексы таблицы `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coaching_staff` (`id_coaching_staff`);

--
-- Индексы таблицы `coaching_staff`
--
ALTER TABLE `coaching_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hockey_club` (`id_hockey_club`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_player` (`id_player`),
  ADD KEY `id_hockey_club` (`id_hockey_club`);

--
-- Индексы таблицы `country_hc`
--
ALTER TABLE `country_hc`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hockey_club`
--
ALTER TABLE `hockey_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manager_hc` (`id_manager_hc`),
  ADD KEY `id_country_hc` (`id_country_hc`);

--
-- Индексы таблицы `hockey_player`
--
ALTER TABLE `hockey_player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_place_of_birth` (`id_place_of_birth`);

--
-- Индексы таблицы `lvl_user`
--
ALTER TABLE `lvl_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manager_hc`
--
ALTER TABLE `manager_hc`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `place_of_birth`
--
ALTER TABLE `place_of_birth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- Индексы таблицы `player_reward`
--
ALTER TABLE `player_reward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_player_statistics` (`id_player_statistics`);

--
-- Индексы таблицы `player_statistics`
--
ALTER TABLE `player_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hockey_player` (`id_hockey_player`,`id_season`),
  ADD KEY `id_season` (`id_season`);

--
-- Индексы таблицы `region_of_birth`
--
ALTER TABLE `region_of_birth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sponsorship_contracts`
--
ALTER TABLE `sponsorship_contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hockey_club` (`id_hockey_club`,`id_sponsor`),
  ADD KEY `id_sponsor` (`id_sponsor`);

--
-- Индексы таблицы `statistics_hc`
--
ALTER TABLE `statistics_hc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_season` (`id_season`,`id_hockey_club`),
  ADD KEY `id_hockey_club` (`id_hockey_club`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `award_hc`
--
ALTER TABLE `award_hc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `city_of_birth`
--
ALTER TABLE `city_of_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `coach`
--
ALTER TABLE `coach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `coaching_staff`
--
ALTER TABLE `coaching_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `country_hc`
--
ALTER TABLE `country_hc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `hockey_club`
--
ALTER TABLE `hockey_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `hockey_player`
--
ALTER TABLE `hockey_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `lvl_user`
--
ALTER TABLE `lvl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `manager_hc`
--
ALTER TABLE `manager_hc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `place_of_birth`
--
ALTER TABLE `place_of_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `player_reward`
--
ALTER TABLE `player_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `player_statistics`
--
ALTER TABLE `player_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `region_of_birth`
--
ALTER TABLE `region_of_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `sponsorship_contracts`
--
ALTER TABLE `sponsorship_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `statistics_hc`
--
ALTER TABLE `statistics_hc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `award_hc`
--
ALTER TABLE `award_hc`
  ADD CONSTRAINT `award_hc_ibfk_1` FOREIGN KEY (`id_statistics_hc`) REFERENCES `statistics_hc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `city_of_birth`
--
ALTER TABLE `city_of_birth`
  ADD CONSTRAINT `city_of_birth_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region_of_birth` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`id_coaching_staff`) REFERENCES `coaching_staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `coaching_staff`
--
ALTER TABLE `coaching_staff`
  ADD CONSTRAINT `coaching_staff_ibfk_1` FOREIGN KEY (`id_hockey_club`) REFERENCES `hockey_club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`id_player`) REFERENCES `hockey_player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`id_hockey_club`) REFERENCES `hockey_club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hockey_club`
--
ALTER TABLE `hockey_club`
  ADD CONSTRAINT `hockey_club_ibfk_1` FOREIGN KEY (`id_manager_hc`) REFERENCES `manager_hc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hockey_club_ibfk_2` FOREIGN KEY (`id_country_hc`) REFERENCES `country_hc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hockey_player`
--
ALTER TABLE `hockey_player`
  ADD CONSTRAINT `hockey_player_ibfk_1` FOREIGN KEY (`id_place_of_birth`) REFERENCES `place_of_birth` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `place_of_birth`
--
ALTER TABLE `place_of_birth`
  ADD CONSTRAINT `place_of_birth_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city_of_birth` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `player_reward`
--
ALTER TABLE `player_reward`
  ADD CONSTRAINT `player_reward_ibfk_1` FOREIGN KEY (`id_player_statistics`) REFERENCES `player_statistics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `player_statistics`
--
ALTER TABLE `player_statistics`
  ADD CONSTRAINT `player_statistics_ibfk_1` FOREIGN KEY (`id_hockey_player`) REFERENCES `hockey_player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_statistics_ibfk_2` FOREIGN KEY (`id_season`) REFERENCES `season` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sponsorship_contracts`
--
ALTER TABLE `sponsorship_contracts`
  ADD CONSTRAINT `sponsorship_contracts_ibfk_1` FOREIGN KEY (`id_hockey_club`) REFERENCES `hockey_club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sponsorship_contracts_ibfk_2` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `statistics_hc`
--
ALTER TABLE `statistics_hc`
  ADD CONSTRAINT `statistics_hc_ibfk_1` FOREIGN KEY (`id_hockey_club`) REFERENCES `hockey_club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistics_hc_ibfk_2` FOREIGN KEY (`id_season`) REFERENCES `season` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
