-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июл 19 2020 г., 17:14
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb_lesson_php-1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `img`, `img_2`, `description`) VALUES
(1, 'Shirt', 150, 'Shirt.png', 'Shirt_1.png', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.'),
(2, 'Socks', 50, 'Socks.png', 'Socks_1.png', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.'),
(3, 'Jacket', 350, 'Jacket.png', 'Jacket_1.png', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.'),
(4, 'Shoes', 250, 'Shoes.png', 'Shoes_1.png', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.'),
(5, 'Pants', 100, 'Pants.png', 'Pants_1.png', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `text`) VALUES
(1, 'Den', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.'),
(2, 'Emma', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consectetur dignissimos ad atque perferendis voluptatem quaerat impedit, modi at autem cum odit illum laboriosam animi, quas veritatis quam molestias maiores dolorum soluta incidunt in illo. Rem repellendus voluptatem architecto nemo deserunt nulla ut consequuntur minima. Quibusdam facilis magnam exercitationem. Unde atque autem, error velit soluta ipsam saepe ex molestias perspiciatis aliquid quis adipisci vero laudantium, nemo sapiente consequatur rem, pariatur dolor corrupti. Harum, iure quo in vero quis veniam nobis nam. Quasi velit, omnis provident consequuntur voluptatum incidunt. Labore similique quam asperiores sit assumenda blanditiis nulla! Cupiditate assumenda aut minus.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
