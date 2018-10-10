-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 10, 2018 lúc 11:11 AM
-- Phiên bản máy phục vụ: 5.6.38-log
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_title`) VALUES
(1, 'Bootstrap'),
(3, 'PHP'),
(4, 'CSS'),
(10, 'Java'),
(11, 'dotNet'),
(12, 'SQL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_status`, `comment_content`) VALUES
(5, 1, 'HuanLX', 'huan@gmail.com', 'Unapproving', 'change some things'),
(6, 2, 'huanAgain', 'huan2@gmail.com', 'Approving', 'Come back again!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text COLLATE utf8_unicode_ci NOT NULL,
  `post_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_tag`, `post_content`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Every Day to Big', 'PhongLe', '2018-09-23', 'thuysi.jpg\r\n', 'EveryDay', 'Thái độ quan trọng hơn trình độ', 1, 'published'),
(2, 1, '', 'Phong Lê Xuân', '2004-10-18', 'brain.jpg', 'PhongLe', '            Thái Độ quan trọng hơn trình độ            ', 0, 'published'),
(6, 11, '', 'HUAN1', '2029-09-18', 'image2.png', 'TEST EDIT', '                                                                        TETS EDIT 1st    (1)                                                                    ', 1, 'published'),
(7, 4, 'CSS 3', 'LXH', '2029-09-18', 'image3.png', 'FRONT', 'TEST dropdown', 1, 'published'),
(27, 11, '13124', 'PhongLE', '2009-10-18', 'image1.jpg', 'PHP', 'zczxczczxczx', 1, 'draft'),
(28, 11, '13124', 'PhongLE', '2009-10-18', 'image1.jpg', 'PHP', 'zczxczczxczx', 0, 'draft'),
(29, 1, '', 'Phong Lê Xuân', '2009-10-18', 'brain.jpg', 'PhongLe', '            Thái Độ quan trọng hơn trình độ            ', 0, 'draft'),
(30, 11, '', 'HUAN1', '2009-10-18', 'image2.png', 'TEST EDIT', '                                                                        TETS EDIT 1st    (1)                                                                    ', 0, 'draft'),
(31, 4, 'CSS 3', 'LXH', '2009-10-18', 'image3.png', 'FRONT', 'TEST dropdown', 0, 'published'),
(33, 1, '', 'PhongLe', '2009-10-18', 'image4.jpg', 'PHL', '    asdasd\'sss    ', 0, 'published'),
(35, 1, '', 'PhongLe', '2009-10-18', 'image4.jpg', 'PHL', '    asdasd\'sss    ', 0, 'draft'),
(36, 4, 'CSS 3', 'LXH', '2009-10-18', 'image3.png', 'FRONT', 'TEST dropdown', 0, 'draft'),
(37, 11, '', 'HUAN1', '2009-10-18', 'image2.png', 'TEST EDIT', '                                                                        TETS EDIT 1st    (1)                                                                    ', 0, 'published'),
(38, 1, '', 'Phong Lê Xuân', '2009-10-18', 'brain.jpg', 'PhongLe', '            Thái Độ quan trọng hơn trình độ            ', 0, 'published'),
(39, 11, '13124', 'PhongLE', '2009-10-18', 'image1.jpg', 'PHP', 'zczxczczxczx', 0, 'published'),
(40, 11, '13124', 'PhongLE', '2009-10-18', 'image1.jpg', 'PHP', 'zczxczczxczx', 0, 'published'),
(41, 4, 'CSS 3', 'LXH', '2009-10-18', 'image3.png', 'FRONT', 'TEST dropdown', 0, 'published'),
(42, 11, '', 'HUAN1', '2009-10-18', 'image2.png', 'TEST EDIT', '                                                                        TETS EDIT 1st    (1)                                                                    ', 0, 'published'),
(43, 1, '', 'Phong Lê Xuân', '2009-10-18', 'brain.jpg', 'PhongLe', '            Thái Độ quan trọng hơn trình độ            ', 0, 'published'),
(44, 1, 'Every Day to Big', 'PhongLe', '2009-10-18', 'thuysi.jpg\r\n', 'EveryDay', 'Thái độ quan trọng hơn trình độ', 0, 'published');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `randomSalt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '''$6$rounds=5000$usesomesillystringforsalt$'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`, `randomSalt`) VALUES
(16, 'huan12', '$6$rounds=5000$usesomesillystri$c4tXo9uBXPrK96BH88/CfSqaHI1BQi97c5yv/hKvPl4/L3jC4awP3j0ZhfHekuucDSXVnaVuuqlq/4vy5ZBR1/', 'huan31@gmail.com', '', '\'$6$rounds=5000$usesomesillystringforsalt$\''),
(17, 'mrte', '$6$rounds=5000$usesomesillystri$1nGWY11vAQrUAybHP8YUrBcakwH3B/4tlMYlVLPDaXHCMm/cHlDSNn1T3gI8Qka5wQY/drwDL9stbZHBp2mCZ0', 'te@gmail.com', 'subscriber', '\'$6$rounds=5000$usesomesillystringforsalt$\''),
(18, 'admin', '$6$rounds=5000$usesomesillystri$r0QZZTlgrgAb/zLF/i1xCPpqT9cWEwAtQUYgjGXbbTmGKKwGQmXwGR8KulnyR3JtiLlucbDMDSbXwKTMRcrDG.', 'admin@gmail.com', 'admin', '\'$6$rounds=5000$usesomesillystringforsalt$\'');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Cơ sở dữ liệu: `larshop`
--
CREATE DATABASE IF NOT EXISTS `larshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `larshop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adds`
--

CREATE TABLE `adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenKhoaHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaKhoaHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GVKhoaHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adds`
--

INSERT INTO `adds` (`id`, `TenKhoaHoc`, `GiaKhoaHoc`, `GVKhoaHoc`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', '100000', 'GV_HUAN', '2018-08-22 21:27:43', '2018-08-22 21:27:43'),
(2, 'CSS', '0', 'Coders.tokyo', '2018-08-22 22:07:41', '2018-08-22 22:07:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkis`
--

CREATE TABLE `dangkis` (
  `id` int(10) UNSIGNED NOT NULL,
  `monhoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkis`
--

INSERT INTO `dangkis` (`id`, `monhoc`, `giatien`, `hoten`, `created_at`, `updated_at`) VALUES
(1, 'Lap Trinh Nhung', '1000', 'Mr T', NULL, NULL),
(2, 'css', '2000', 'mr H', NULL, NULL),
(3, 'css3', '2500', 'mr H', NULL, NULL),
(4, 'Java2EE', '2000', 'MrTB', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_07_19_003732_create_dangkis_table', 1),
(2, '2018_08_22_085641_create_adds_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'huan', 'lexuanhuan90@gmail.com', '$2y$10$EQyfQiWVpT4lqtVSYMyvne14uwkbduposZ7wyptB0.Ke5Tipy8D66', 'MDDNzaywVwYLVxkLs2nQQbdJ21aB8vUxsLo8QJPGKh9FS31CmmLslkRYtkoH', '2018-09-06 00:29:36', '2018-09-06 00:29:36'),
(2, 'hien', 'hien@gmail.com', '$2y$10$qeO5UhU7MkADLZD1xGX1R.fzJwH4.6GZeNkTkVa1/BLPvXY79lzsm', NULL, '2018-09-06 02:41:13', '2018-09-06 02:41:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangkis`
--
ALTER TABLE `dangkis`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dangkis`
--
ALTER TABLE `dangkis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Cơ sở dữ liệu: `udemy`
--
CREATE DATABASE IF NOT EXISTS `udemy` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `udemy`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin12', 'admin@admin.com'),
(3, 'baby', 'babyshake', 'shake@gmail.com'),
(17, 'Huanlx', 'xuanhuan', 'huanlx@gmail.com'),
(18, 'PhongCa', 'phongdeptrai', 'phong2016@gmail.com'),
(19, 'huan\'smoney', 'huanbg', 'huanhuan@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
