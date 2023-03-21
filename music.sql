-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 21 2023 г., 17:41
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
-- База данных: `music`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `release_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `title`, `genre_id`, `artist_id`, `release_year`) VALUES
(1, 'Thriller', 1, 1, 1982),
(2, 'Back in Black', 2, 2, 1980),
(3, 'The Wall', 3, 3, 1979),
(4, 'The Dark Side of the Moon', 3, 3, 1973),
(5, 'Appetite for Destruction', 4, 4, 1987),
(6, 'Nevermind', 5, 5, 1991),
(7, 'Purple Rain', 6, 6, 1984),
(8, 'Led Zeppelin IV', 2, 7, 1971),
(9, 'Hotel California', 2, 8, 1976),
(10, 'Sgt. Pepper\'s Lonely Hearts Club Band', 9, 9, 1967),
(11, 'The Beatles (The White Album)', 9, 9, 1968),
(12, 'Born to Run', 10, 10, 1975),
(13, 'Born in the U.S.A.', 10, 10, 1984),
(14, 'The Joshua Tree', 11, 11, 1987),
(15, 'Achtung Baby', 11, 11, 1991),
(16, 'The Chronic', 12, 12, 1992),
(17, 'Illmatic', 12, 13, 1994),
(18, 'The Blueprint', 12, 14, 2001),
(19, 'Graduation', 13, 15, 2007),
(20, 'My Beautiful Dark Twisted Fantasy', 13, 15, 2010);

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id`, `name`, `country`) VALUES
(1, 'Michael Jackson', 'United States'),
(2, 'AC/DC', 'Australia'),
(3, 'Pink Floyd', 'United Kingdom'),
(4, 'Guns N\' Roses', 'United States'),
(5, 'Nirvana', 'United States'),
(6, 'Prince', 'United States'),
(7, 'Led Zeppelin', 'United Kingdom'),
(8, 'Eagles', 'United States'),
(9, 'The Beatles', 'United Kingdom'),
(10, 'Bruce Springsteen', 'United States'),
(11, 'U2', 'Ireland'),
(12, 'Dr. Dre', 'United States'),
(13, 'Nas', 'United States'),
(14, 'Jay-Z', 'United States'),
(15, 'Kanye West', 'United States');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Progressive rock'),
(4, 'Hard rock'),
(5, 'Grunge'),
(6, 'Funk'),
(7, 'Blues'),
(8, 'Jazz'),
(9, 'Psychedelic rock'),
(10, 'Heartland rock'),
(11, 'Alternative rock'),
(12, 'Hip hop'),
(13, 'Rap');

-- --------------------------------------------------------

--
-- Структура таблицы `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `track_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `songs`
--

INSERT INTO `songs` (`id`, `title`, `album_id`, `length`, `track_number`) VALUES
(1, 'Billie Jean', 1, 4, 1),
(2, 'Beat It', 1, 4, 2),
(3, 'Thriller', 1, 5, 3),
(4, 'Back in Black', 2, 4, 1),
(5, 'Hells Bells', 2, 5, 2),
(6, 'Shoot to Thrill', 2, 5, 3),
(7, 'Another Brick in the Wall (Part II)', 3, 3, 1),
(8, 'Comfortably Numb', 3, 6, 2),
(9, 'Money', 4, 6, 3),
(10, 'Welcome to the Jungle', 5, 4, 1),
(11, 'Sweet Child O\' Mine', 5, 5, 2),
(12, 'Paradise City', 5, 6, 3),
(13, 'Smells Like Teen Spirit', 6, 5, 1),
(14, 'Come as You Are', 6, 3, 2),
(15, 'Lithium', 6, 4, 3),
(16, 'When Doves Cry', 7, 5, 1),
(17, 'Purple Rain', 7, 8, 2),
(18, 'Stairway to Heaven', 8, 8, 1),
(19, 'Rock and Roll', 8, 3, 2),
(20, 'Hotel California', 9, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'johnsmith', 'password123', 'johnsmith@example.com'),
(2, 'janesmith', 'password456', 'janesmith@example.com'),
(3, 'michaeljones', 'password789', 'michaeljones@example.com'),
(4, 'sarahjones', 'password123', 'sarahjones@example.com'),
(5, 'davidbrown', 'password456', 'davidbrown@example.com'),
(6, 'laurasmith', 'password789', 'laurasmith@example.com'),
(7, 'markjohnson', 'password123', 'markjohnson@example.com'),
(8, 'angelawilliams', 'password456', 'angelawilliams@example.com'),
(9, 'stevenmiller', 'password789', 'stevenmiller@example.com'),
(10, 'emilydavis', 'password123', 'emilydavis@example.com'),
(11, 'matthewwilson', 'password456', 'matthewwilson@example.com'),
(12, 'samanthasmith', 'password789', 'samanthasmith@example.com'),
(13, 'kevinbrown', 'password123', 'kevinbrown@example.com'),
(14, 'jenniferlee', 'password456', 'jenniferlee@example.com'),
(15, 'justinmartin', 'password789', 'justinmartin@example.com'),
(16, 'amandajohnson', 'password123', 'amandajohnson@example.com'),
(17, 'robertwilson', 'password456', 'robertwilson@example.com'),
(18, 'ashleytaylor', 'password789', 'ashleytaylor@example.com'),
(19, 'danieljackson', 'password123', 'danieljackson@example.com'),
(20, 'katherinemiller', 'password456', 'katherinemiller@example.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);

--
-- Ограничения внешнего ключа таблицы `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
