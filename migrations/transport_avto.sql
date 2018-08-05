-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 05 2018 г., 16:15
-- Версия сервера: 10.1.26-MariaDB-0+deb9u1
-- Версия PHP: 7.2.5-1+0~20180505045740.21+stretch~1.gbpca2fa6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `transport_avto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `avto`
--

CREATE TABLE `avto` (
  `id_avto` int(11) NOT NULL,
  `categoriya_avto` int(11) NOT NULL,
  `model_avto` varchar(255) NOT NULL,
  `capacity_avto` double NOT NULL,
  `space_avto` double NOT NULL,
  `manipulator_avto` enum('0','1') NOT NULL DEFAULT '0',
  `availability_avto` enum('0','1') NOT NULL DEFAULT '1',
  `driver_avto` int(11) NOT NULL,
  `r_number_avto` varchar(255) NOT NULL,
  `notes_avto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Таблица с данными автомобиля';

--
-- Дамп данных таблицы `avto`
--

INSERT INTO `avto` (`id_avto`, `categoriya_avto`, `model_avto`, `capacity_avto`, `space_avto`, `manipulator_avto`, `availability_avto`, `driver_avto`, `r_number_avto`, `notes_avto`) VALUES
(1, 1, 'Газель', 1.5, 3, '0', '1', 2, '55-55 ДО', 'Разбит борт.'),
(2, 3, 'МАЗ', 10, 10, '0', '1', 1, '34-456 МА', 'Новый'),
(3, 4, 'Скания', 10, 10, '1', '1', 3, '123-34 МА', 'Открытый верх'),
(4, 7, 'ЗИЛ', 3, 5, '0', '0', 4, '234-23', 'Дрова. После аварии'),
(6, 6, 'СуперМАЗ', 20, 20, '1', '1', 5, '25145', 'Новый Тестовый');

-- --------------------------------------------------------

--
-- Структура таблицы `categoriya`
--

CREATE TABLE `categoriya` (
  `id_categoriya` int(11) NOT NULL,
  `name_categoriya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categoriya`
--

INSERT INTO `categoriya` (`id_categoriya`, `name_categoriya`) VALUES
(1, 'Газель 1.5 т'),
(2, '5т + манип'),
(3, '10 т'),
(4, '10 т + манип'),
(5, '20 т'),
(6, '20 т + манип'),
(7, '5т');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_clients` int(11) NOT NULL,
  `contact_name_clients` varchar(255) NOT NULL,
  `contact_phone_clients` varchar(100) NOT NULL,
  `zip_clients` int(11) DEFAULT NULL,
  `region_clients` varchar(100) DEFAULT NULL,
  `town_clients` varchar(100) NOT NULL,
  `street_clients` varchar(255) NOT NULL,
  `house_clients` int(11) NOT NULL,
  `korp_clients` int(11) DEFAULT NULL,
  `email_clients` varchar(255) DEFAULT NULL,
  `office_clients` int(11) DEFAULT NULL,
  `notes_clients` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_clients`, `contact_name_clients`, `contact_phone_clients`, `zip_clients`, `region_clients`, `town_clients`, `street_clients`, `house_clients`, `korp_clients`, `email_clients`, `office_clients`, `notes_clients`) VALUES
(1, 'вася', '646464565', 2140, '', 'Питер', 'Мойка', 2, 12, '', 23, 'Звонить до 9-00'),
(2, 'Маша', '61641546', 2140, '', 'Красное село', 'Ленина', 2, NULL, NULL, NULL, ''),
(3, 'Яша', '646848', NULL, NULL, 'Питер', 'Фонтанка', 3, NULL, NULL, NULL, 'Еще тот'),
(4, 'Cаша', '341242434324', 32432, '432432', '23423', '4234', 3324, NULL, '', NULL, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `id_avto` int(11) NOT NULL,
  `zsd_orders` enum('0','1') NOT NULL DEFAULT '0',
  `id_staf_manager` int(11) NOT NULL,
  `id_staff_driver` int(11) NOT NULL,
  `time_orders` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_orders` tinyint(1) NOT NULL DEFAULT '0',
  `summ_orders` double NOT NULL,
  `distance_orders` double NOT NULL,
  `notes_orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_orders`, `id_clients`, `id_avto`, `zsd_orders`, `id_staf_manager`, `id_staff_driver`, `time_orders`, `pay_orders`, `summ_orders`, `distance_orders`, `notes_orders`) VALUES
(1, 2, 1, '0', 1, 2, '2018-07-31 14:36:54', 0, 3456, 34, 'После 13-00'),
(2, 3, 2, '0', 2, 1, '2018-07-31 14:37:31', 0, 45667, 320, 'Чем раньше тем лучше'),
(3, 4, 4, '0', 1, 1, '2018-07-31 14:38:02', 0, 300, 23, '');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `name_roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_roles`, `name_roles`) VALUES
(1, 'Менеджер'),
(2, 'Админ'),
(3, 'Водитель');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `name_staff` varchar(100) NOT NULL,
  `soname_staff` varchar(100) NOT NULL,
  `phone_staff` varchar(100) NOT NULL,
  `email_staff` varchar(255) NOT NULL,
  `home_staff` varchar(255) NOT NULL,
  `role_staff` varchar(20) NOT NULL,
  `notes_staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id_staff`, `name_staff`, `soname_staff`, `phone_staff`, `email_staff`, `home_staff`, `role_staff`, `notes_staff`) VALUES
(1, 'Саша', 'Петров', '641654165', 'цукуц', 'Вокзал', '1', ''),
(2, 'Вася', 'Вася', '32432432', '32432432', '23432432', '3', ''),
(3, 'Маша', 'Машина', '34324', '324324', '234234324', '3242343', '32423');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `avto`
--
ALTER TABLE `avto`
  ADD PRIMARY KEY (`id_avto`),
  ADD UNIQUE KEY `Staff_id` (`driver_avto`);

--
-- Индексы таблицы `categoriya`
--
ALTER TABLE `categoriya`
  ADD PRIMARY KEY (`id_categoriya`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_clients`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `avto`
--
ALTER TABLE `avto`
  MODIFY `id_avto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categoriya`
--
ALTER TABLE `categoriya`
  MODIFY `id_categoriya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
