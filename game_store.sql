-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2025 lúc 06:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `game_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `decentralization`
--

CREATE TABLE `decentralization` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `developers`
--

CREATE TABLE `developers` (
  `developer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `founded_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `developers`
--

INSERT INTO `developers` (`developer_id`, `name`, `website`, `founded_year`) VALUES
(1, 'NeoGames Studio', 'https://neogames.example.com', 2015),
(2, 'SunnyFarm Devs', 'https://sunnyfarm.example.com', 2018),
(3, 'GalaxyTech', 'https://galaxytech.example.com', 2020),
(4, 'FromSoftware', 'https://www.fromsoftware.jp', 1986),
(5, 'Toby Fox', 'https://tobyfox.com', 2015),
(6, 'BlueTwelve Studio', 'https://www.bluetwelve.com', 2016),
(7, 'Capcom', 'https://www.capcom.com', 1979),
(8, 'ConcernedApe', 'https://www.stardewvalley.net', 2012),
(9, 'Supergiant Games', 'https://www.supergiantgames.com', 2009),
(10, 'Team Cherry', 'https://www.teamcherry.com.au', 2015),
(11, 'Mojang Studios', 'https://www.minecraft.net', 2009),
(12, 'CD Projekt Red', 'https://en.cdprojektred.com', 2002),
(13, 'Rockstar Games', 'https://www.rockstargames.com', 1998);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `function`
--

CREATE TABLE `function` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `function`
--

INSERT INTO `function` (`id`, `name`, `deleted`) VALUES
(1, 'Thêm', b'0'),
(2, 'Sửa', b'0'),
(3, 'Xóa', b'0'),
(4, 'Xem', b'0'),
(5, 'Nhập', b'0'),
(6, 'Xuất', b'0'),
(7, 'Chi tiết', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `release_date` date DEFAULT NULL,
  `developer_id` int(11) DEFAULT NULL,
  `platform` enum('Windows','Mac','Linux','Console') DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`game_id`, `title`, `description`, `price`, `release_date`, `developer_id`, `platform`, `cover_image`, `trailer_url`, `created_at`) VALUES
(6, 'Bloodborne', 'An action RPG set in a gothic, horror-filled city.', 49.99, '2015-03-24', NULL, 'Console', NULL, NULL, '2025-04-12 01:09:29'),
(7, 'Deltarune', 'A role-playing game by Toby Fox.', 0.00, '2018-10-31', 4, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(8, 'Stray', 'Play as a stray cat in a cyberpunk world.', 29.99, '2022-07-19', 5, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(9, 'Monster Hunter', 'Hunt giant monsters in epic environments.', 59.99, '2018-01-26', 6, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(10, 'Stardew Valley', 'A farming simulation and role-playing game.', 14.99, '2016-02-26', 7, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(11, 'Hades', 'A rogue-like dungeon crawler by Supergiant Games.', 24.99, '2020-09-17', 8, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(12, 'Hollow Knight', 'A challenging action-adventure in a dark world.', 14.99, '2017-02-24', 9, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(13, 'Undertale', 'A role-playing game where no one has to die.', 9.99, '2015-09-15', 4, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(14, 'Minecraft', 'Build, mine, and survive in a sandbox world.', 26.95, '2011-11-18', 10, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(15, 'Resident Evil', 'A survival horror franchise.', 59.99, '1996-03-22', 11, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(16, 'GTA', 'Open-world action-adventure crime game.', 59.99, '2013-09-17', 12, 'Windows', NULL, NULL, '2025-04-12 01:09:29'),
(17, 'Cyberpunk', 'Futuristic RPG in Night City.', 59.99, '2020-12-10', 13, 'Windows', NULL, NULL, '2025-04-12 01:09:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_genres`
--

CREATE TABLE `game_genres` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `game_genres`
--

INSERT INTO `game_genres` (`game_id`, `genre_id`) VALUES
(6, 1),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 4),
(9, 1),
(9, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 3),
(12, 1),
(12, 8),
(13, 2),
(13, 3),
(14, 4),
(14, 5),
(15, 1),
(15, 10),
(16, 1),
(16, 2),
(17, 1),
(17, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_keys`
--

CREATE TABLE `game_keys` (
  `key_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `license_key` varchar(50) NOT NULL,
  `status` enum('Available','Used') DEFAULT 'Available',
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `game_keys`
--

INSERT INTO `game_keys` (`key_id`, `game_id`, `license_key`, `status`, `purchase_id`) VALUES
(1, 6, 'BBRN-1234-ABCD-5678', 'Available', NULL),
(2, 7, 'DLTR-2233-XYZA-8899', 'Available', NULL),
(3, 8, 'STRY-3344-QWER-7788', 'Available', NULL),
(4, 9, 'MHNT-4455-ASDF-6677', 'Available', NULL),
(5, 10, 'SDVL-5566-ZXCV-5566', 'Available', NULL),
(6, 11, 'HADS-6677-TYUI-4455', 'Available', NULL),
(7, 12, 'HLKT-7788-GHJK-3344', 'Available', NULL),
(8, 13, 'UNDL-8899-UIOP-2233', 'Available', NULL),
(9, 14, 'MCFT-9900-PLKM-1122', 'Available', NULL),
(10, 15, 'REVL-0001-BNMJ-0011', 'Available', NULL),
(11, 16, 'GTAV-1112-VCXD-2223', 'Available', NULL),
(12, 17, 'CBPK-2223-QAZX-3334', 'Available', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(11, 'Fighting'),
(10, 'Horror'),
(17, 'MMORPG'),
(16, 'Music'),
(13, 'Platformer'),
(7, 'Puzzle'),
(8, 'Racing'),
(3, 'Role-Playing'),
(14, 'Sandbox'),
(9, 'Shooter'),
(4, 'Simulation'),
(6, 'Sports'),
(15, 'Stealth'),
(5, 'Strategy'),
(12, 'Survival'),
(18, 'Visual Novel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('Unpaid','Paid','Refunded') NOT NULL DEFAULT 'Unpaid',
  `status` enum('Pending','Completed','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount_paid` decimal(10,2) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` enum('Pending','Completed','Failed','Refunded') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_methods`
--

INSERT INTO `payment_methods` (`method_id`, `method_name`) VALUES
(6, 'Apple Pay'),
(4, 'Bank Transfer'),
(5, 'Cash on Delivery'),
(1, 'Credit Card'),
(2, 'Debit Card'),
(7, 'Google Pay'),
(3, 'PayPal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `price_paid` decimal(10,2) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `roleID` (`role_id`);

--
-- Chỉ mục cho bảng `decentralization`
--
ALTER TABLE `decentralization`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `functionID` (`function_id`),
  ADD KEY `moduleID` (`module_id`);

--
-- Chỉ mục cho bảng `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`developer_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `developer_id` (`developer_id`);

--
-- Chỉ mục cho bảng `game_genres`
--
ALTER TABLE `game_genres`
  ADD PRIMARY KEY (`game_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `game_keys`
--
ALTER TABLE `game_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD UNIQUE KEY `license_key` (`license_key`),
  ADD UNIQUE KEY `purchase_id` (`purchase_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `usersID` (`user_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `methodID` (`method_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`method_id`),
  ADD UNIQUE KEY `method_name` (`method_name`);

--
-- Chỉ mục cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `orderID` (`order_id`),
  ADD KEY `gameID` (`game_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `developers`
--
ALTER TABLE `developers`
  MODIFY `developer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `function`
--
ALTER TABLE `function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `game_keys`
--
ALTER TABLE `game_keys`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `roleID` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `decentralization`
--
ALTER TABLE `decentralization`
  ADD CONSTRAINT `functionID` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`),
  ADD CONSTRAINT `moduleID` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Các ràng buộc cho bảng `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`developer_id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `game_genres`
--
ALTER TABLE `game_genres`
  ADD CONSTRAINT `game_genres_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `game_keys`
--
ALTER TABLE `game_keys`
  ADD CONSTRAINT `game_keys_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchaseID` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `usersID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `methodID` FOREIGN KEY (`method_id`) REFERENCES `payment_methods` (`method_id`),
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Các ràng buộc cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `gameID` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id`) REFERENCES `decentralization` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
