-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Янв 20 2021 г., 11:01
-- Версия сервера: 5.7.32
-- Версия PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Good News', 'goodNews', 'Это хорошая Новость для тебя', NULL, NULL),
(2, 'Bad News', 'badNews', 'Это плохая Новость для тебя', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_12_26_160830_create_news_table', 1),
(10, '2020_12_26_161447_create_categories_table', 1),
(16, '2020_12_30_184249_create_sources_table', 2),
(17, '2020_12_30_181512_update_news_table', 3),
(18, '2021_01_20_091406_alter_table_users_add_is_admin', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `source_id`, `publish_date`, `created_at`, `updated_at`, `category_id`, `img`) VALUES
(1, 'Новость - Первая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2020-12-29 00:00:00', NULL, NULL, 2, 'news.png'),
(2, 'Новость - Вторая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 4, '2020-12-29 00:00:00', NULL, NULL, 1, 'news.png'),
(3, 'Новость - Третья', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2020-12-29 00:00:00', NULL, NULL, 1, 'news.png'),
(4, 'Новость - Четвертая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2020-12-29 00:00:00', NULL, NULL, 2, 'news.png'),
(5, 'Новость - Пятая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2020-12-30 00:00:00', NULL, NULL, 1, 'news.png'),
(6, 'Новость - Шестая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 3, '2020-12-30 00:00:00', NULL, NULL, 2, 'news.png'),
(7, 'Новость - Седьмая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2020-12-30 00:00:00', NULL, NULL, 2, 'news.png'),
(8, 'Новость - Восьмая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 4, '2021-01-02 23:40:44', NULL, '2021-01-02 17:43:16', 2, 'news.png'),
(9, 'Новость - Девятая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2021-01-15 16:20:32', '2021-01-15 10:20:32', '2021-01-15 11:13:24', 1, 'news.png'),
(10, 'Новость - Десятая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2021-01-15 17:13:46', '2021-01-15 11:13:46', '2021-01-15 11:13:46', 1, 'news.png'),
(11, 'Новость - Одинадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 4, '2021-01-15 17:14:03', '2021-01-15 11:14:03', '2021-01-15 11:14:03', 2, 'news.png'),
(12, 'Новость - Двенадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 3, '2021-01-15 17:14:27', '2021-01-15 11:14:27', '2021-01-15 11:14:27', 2, 'news.png'),
(13, 'Новость - Тринадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2021-01-15 17:14:59', '2021-01-15 11:14:59', '2021-01-15 11:14:59', 2, 'news.png'),
(14, 'Новость - Четырнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 4, '2021-01-15 17:15:20', '2021-01-15 11:15:20', '2021-01-15 11:15:20', 1, 'news.png'),
(15, 'Новость - Пятнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2021-01-15 17:15:42', '2021-01-15 11:15:42', '2021-01-15 11:15:42', 2, 'news.png'),
(16, 'Новость - Шестнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 2, '2021-01-15 17:16:17', '2021-01-15 11:16:17', '2021-01-15 11:16:17', 1, 'news.png'),
(17, 'Новость - Семнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 3, '2021-01-15 17:17:18', '2021-01-15 11:17:18', '2021-01-15 11:17:18', 1, 'news.png'),
(18, 'Новость - Восемнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2021-01-15 17:17:32', '2021-01-15 11:17:32', '2021-01-15 11:17:32', 2, 'news.png'),
(19, 'Новость - Девятнадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2021-01-15 17:17:55', '2021-01-15 11:17:55', '2021-01-15 11:17:55', 2, 'news.png'),
(20, 'Новость - Двадцатая', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!', 1, '2021-01-15 17:18:15', '2021-01-15 11:18:15', '2021-01-15 11:37:01', 2, 'news.png');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sources`
--

CREATE TABLE `sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sources`
--

INSERT INTO `sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Интернет', NULL, NULL),
(2, 'Телевидение', NULL, NULL),
(3, 'Газеты', NULL, NULL),
(4, 'Сарафан', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@news.com', NULL, '$2y$10$ArzA/jKie.5JuR6KH2EWve7TainiC09AfA1lcViVrTgWiYGfKwlva', 'Aaz3AcjkKleemDTiJro22yQdWdDxi1ngdCahh5FsCdXjWOKbGq6TnufmlwcM', '2021-01-19 12:25:13', '2021-01-20 07:14:39', 1),
(2, 'user', 'user@news.com', NULL, '$2y$10$nRFCkKiLAfv5fkv8UujDmOyPYF2tK5ww1GzW3mJk0zqQJeF3WiMyi', NULL, '2021-01-19 16:22:09', '2021-01-19 16:22:09', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_url_unique` (`url`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_title_unique` (`title`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sources_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
