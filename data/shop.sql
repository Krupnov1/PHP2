-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Янв 25 2021 г., 11:45
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_session`, `id_product`, `quantity`) VALUES
(1, '76ed25htoe1i4b9iour9inhs1gnqb11c', 4, 5),
(2, '76ed25htoe1i4b9iour9inhs1gnqb11c', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `texts` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `texts`) VALUES
(67, 'Евгений', 'Добрый день!!!!'),
(68, 'Евгений', 'Все отлично!!!'),
(69, 'Евгений', 'Все хорошо');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `route` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `route`) VALUES
(1, 'Главная', '/'),
(2, 'Каталог', '/?c=product&a=catalog'),
(3, 'Отзывы', '/reviews'),
(4, 'Регистрация', '/registration');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `session_id` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`, `status`) VALUES
(11, 'Игорь', '81230657845', 'ph99vnh5gpsq59oe8ipop09006aq4us2', 'Новый заказ'),
(12, 'Игорь', '987654', 'ph99vnh5gpsq59oe8ipop09006aq4us2', 'Новый заказ'),
(26, 'User', '1234567', 'p1huukbq194vvap1hi34ks6r0ttl3are', 'Новый заказ'),
(27, 'Толя', '987654', '0gj6d3t20om9hq9dqeep0u9fm4gtm70s', 'Новый заказ'),
(28, 'User', '987654', '71648gfavli4kdgctonp41ck787406q6', 'Новый заказ'),
(29, 'Евгений', '81230657845', '76ed25htoe1i4b9iour9inhs1gnqb11c', 'Новый заказ');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`) VALUES
(1, 'Чай', 'Цейлонский', 25),
(2, 'Чай', 'Цейлонский', 25),
(34, 'Чай', 'Цейлонский', 25),
(36, 'Чай', 'Цейлонский', 25),
(39, 'Чай', 'Цейлонский', 25),
(43, 'Чай', 'Цейлонский', 25),
(44, 'Чай_2', 'Цейлонский', 25),
(46, 'Чай_2', 'Цейлонский', 25),
(47, 'Чай', 'Цейлонский', 25),
(48, 'Чай', 'Цейлонский', 25),
(49, 'Чай', 'Цейлонский', 25),
(50, 'Чай', 'Цейлонский', 25),
(51, 'Чай', 'Цейлонский', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `image_size` int NOT NULL,
  `image_file` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image_alt` varchar(125) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_size`, `image_file`, `image_alt`, `likes`) VALUES
(1, 'Jacket men', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 2500, 72, 'img_1.jpg', 'product_1', 39),
(2, 'Men\'s coat', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 6000, 90, 'img_2.jpg', 'product_2', 66),
(3, 'Blouse women', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 1500, 145, 'img_3.jpg', 'product_3', 92),
(4, 'Breeches', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 1300, 133, 'img_4.jpg', 'product_4', 41),
(5, 'Dress women', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 1200, 160, 'img_5.jpg', 'product_5', 47),
(6, 'Jacket men', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 3800, 132, 'img_6.jpg', 'product_6', 46),
(7, 'Dress women', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 2300, 175, 'img_7.jpg', 'product_7', 33),
(8, 'Jacket men', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 5500, 92, 'img_8.jpg', 'product_8', 89),
(9, 'Jacket men', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', 4300, 140, 'img_9.jpg', 'product_9', 19);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(125) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` varchar(125) NOT NULL,
  `login` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `telephone`, `login`, `password`) VALUES
(1, 'Иван', 'Иванов', 'ii@mail.com', '98765432', 'admin', '$2y$10$D/ArtUwo2xccMYUPLgtQ4.f/43WU5HC/qPWixTeGvLrmb6OJ8hUja'),
(11, 'Евгений', 'Иванов', 'yevgeniy_krupnov@mail.ru', '98765432', 'kruevg', '$2y$10$QrdwRhIedzGKvmxK7A./sujoyYihz6OCDXLWN.N2/af3LwLEnb0h2'),
(13, 'Игорь', 'Иванов', 'anbel@mail.ru', '81230982365', 'an123', '$2y$10$PS1tef3xI9.sjFOjFpxDCe7LUvDDhkE7.44kpFiAbsgtoWs1KycT6'),
(14, 'Игорь', 'Петров', 'krubel@mail.ru', '81230982365', 'Евгений', '$2y$10$SARjFwgRBbelVGIdPwuYBeUSc4RJeMZ9SDbBsRROzEgIhPRpvTvzO'),
(15, 'User', 'Петров', 'anbel@mail.ru', '81230982365', 'admin', '$2y$10$F3MnUw8AXLa.jqcD/R2Rxecgped3cGMfMJr6sFYuUgnfKpWS2Yxkq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
