-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2020 at 03:42 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu_role`
--

CREATE TABLE `access_menu_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_menu_role`
--

INSERT INTO `access_menu_role` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 2, 5),
(4, 2, 4),
(5, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `access_role_user`
--

CREATE TABLE `access_role_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jabatan` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_role_user`
--

INSERT INTO `access_role_user` (`id`, `role_id`, `user_id`, `created_at`, `jabatan`) VALUES
(3, 1, 1, '2020-11-08 01:41:16', ''),
(4, 2, 2, '2020-11-08 01:41:16', ''),
(106, 46, 18, '2020-11-10 15:27:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `access_submenu_role`
--

CREATE TABLE `access_submenu_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategories`
--

CREATE TABLE `kategories` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `keterangan` varchar(223) NOT NULL,
  `image` varchar(233) NOT NULL DEFAULT 'depault.jpg',
  `no_urut` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategories`
--

INSERT INTO `kategories` (`id`, `name`, `keterangan`, `image`, `no_urut`, `status`, `date_created`) VALUES
(5, 'Laravel 7', 'Tidak bagus lagi', 'red-folder-icon.png', 3, 0, '2020-10-31 11:02:46'),
(7, 'Yamaha', 'Tidak bagus lagi', 'dhdfdh.jpg', 3, 0, '2020-11-01 12:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `id` int(11) NOT NULL,
  `name` varchar(133) NOT NULL,
  `email` varchar(122) NOT NULL,
  `subject` varchar(224) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`id`, `name`, `email`, `subject`, `message`) VALUES
(52, 'Managemen Access f', 'super-admin@gmail.com', 'dgdfg', 'yhtgfh'),
(53, 'Yamaha', 'super-admin@gmail.com', 'dgdfg', 'gfdd'),
(54, 'hfghfggfg', 'jkhghjghgf@jhghfg.bvh', 'hjghjgfgh', 'hjkghjkig\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `icon` varchar(122) NOT NULL,
  `url` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `url`) VALUES
(1, 'Managemen', '', ''),
(2, 'Setting', '', ''),
(3, 'Video', '', ''),
(4, 'Testimonial', '', ''),
(5, 'Pembayaran', '', ''),
(6, 'Lainya', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL,
  `bukti_pembayaran` varchar(223) NOT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0 = wait; 1 = di terima ; 2 = di tolak ; 9 = belum',
  `alasan` varchar(122) NOT NULL,
  `updated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `user_id`, `created_at`, `updated_at`, `jumlah`, `bukti_pembayaran`, `status`, `alasan`, `updated`) VALUES
(4, 18, '2020-11-25 00:00:00', '2020-11-18 00:00:00', 200000, 'LOGO_KABUPATEN_BANTAENG.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`) VALUES
(2, 'Admin'),
(1, 'Super Admin'),
(46, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `value` varchar(44) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `status`) VALUES
(1, 'theme_admin', 'azzara', 0),
(2, 'theme_public', 'rapid', 0),
(12, 'name_app', 'Video Course', 0),
(14, 'Alamat', 'Kamp. Sarroanging Desa Mappilawing', 0),
(15, 'harga_member', '200000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `icon` varchar(122) NOT NULL,
  `url` varchar(122) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_access` enum('public','private') NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `name`, `icon`, `url`, `status`, `is_access`) VALUES
(1, 1, 'Menus', '', 'super-admin/menu', 1, 'private'),
(2, 1, 'Sub Menus', '', 'super-admin/submenu', 1, 'private'),
(3, 1, 'Users', '', 'admin/user/list', 1, 'public'),
(7, 1, 'Rules', '', 'super-admin/rules', 1, 'public'),
(8, 2, 'Web Aplplication', '', 'admin/setting', 1, 'public'),
(9, 3, 'Kategori', '', 'admin/kategori', 1, 'public'),
(11, 3, 'List Video', '', 'admin/video', 1, 'public'),
(12, 4, 'List Testimonial', '', 'admin/testimonial', 1, 'public'),
(13, 5, 'Belum Di ACC', '', 'admin/pembayaran?type=belum_acc', 1, 'public'),
(14, 5, 'Diterima', '', 'admin/pembayaran?type=diterima', 1, 'public'),
(16, 2, 'Users Setting', '', 'admin/user/list', 1, 'public'),
(17, 6, 'Masukan', '', 'admin/masukan', 1, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keterangan` varchar(336) NOT NULL,
  `foto` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `user_id`, `keterangan`, `foto`) VALUES
(5, 1, 'Tidak bagus lagi', 'petani.jpg'),
(6, 1, 'Tidak bagus lagi', 'folder-iphone-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(22) NOT NULL,
  `codeReferal` varchar(22) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(122) NOT NULL,
  `email_verified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `profile` varchar(122) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `codeReferal`, `email`, `name`, `email_verified_at`, `password`, `profile`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(1, 'Super Admin', '', 'super-admin@gmail.com', 'Super Admin', '2020-10-08 09:15:55', '$2y$10$F101ScO91yhebnZUmrZlBuAul0vPx/Buut5Hpm7OsbDYTRfmaf6My', 'default.jpg', '2020-10-08 09:15:55', '2020-10-08 09:15:55', '43xZdYal6MxFE8SI7ueJkCpE/PSZOguolAAEYsrlSmCezIGJbKmfcINpytUKobx8Me/oRw6K4z_bP8LHiSUkKg==', 1),
(2, 'admin', '', 'admin@gmail.com', 'Admin', '2020-10-08 09:15:55', '$2y$10$F101ScO91yhebnZUmrZlBuAul0vPx/Buut5Hpm7OsbDYTRfmaf6My', 'default.jpg', '2020-10-08 09:15:55', '2020-10-08 09:15:55', 'VSqBB4te7QizZObd6ZTMCM1TYiJUV9hF1BMlf4pRi9A7S_jWKCwwfTCyiKdaQzfBwm9sKFbJDpyOrJJ4VMfMVA==', 1),
(18, 'irsanm', 'admin', 'irsan00mansyur@gmail.com', 'irsan Mansyur', '2020-11-10 15:27:17', '$2y$10$OYVVZf1VPbav1CHMtkoI8uSOYZRSKHn7spdliwsiBPby30FphtDi2', 'default.jpg', '2020-11-10 15:27:17', '2020-11-10 15:27:17', 'uD5N45zUSwWsu6W_33OETTtih9/td2y0/xB4z9YEX3/hR_tYkia9mlEk2wHoC0iyuACGKeQIghi/EgxTzgCVPg==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `title` varchar(44) NOT NULL,
  `description` varchar(220) NOT NULL,
  `file` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `kategori_id`, `no_urut`, `title`, `description`, `file`, `created_at`, `updated_at`, `status`) VALUES
(3, 5, 3, 'Blade dengan tehnik yang bagus', 'dsfdfdfdfdffdf', '5_Blade_luar_biasa_ya.mp4', '2020-11-02 23:06:02', '2020-11-02 23:06:02', 1),
(4, 5, 1, 'Instal Laravel Tentunya', 'Hal yang pertama di lakukan tentunya ialah edit video dong ..!!', '2_Install_Laravel_7_pastinya1.mp4', '2020-11-12 19:33:58', '2020-11-12 19:33:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu_role`
--
ALTER TABLE `access_menu_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_menu_role_ibfk_1` (`menu_id`),
  ADD KEY `access_menu_role_ibfk_2` (`role_id`);

--
-- Indexes for table `access_role_user`
--
ALTER TABLE `access_role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `access_role_user_ibfk_1` (`role_id`);

--
-- Indexes for table `access_submenu_role`
--
ALTER TABLE `access_submenu_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_submenu_role_ibfk_1` (`role_id`),
  ADD KEY `submenu_id` (`submenu_id`);

--
-- Indexes for table `kategories`
--
ALTER TABLE `kategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu_role`
--
ALTER TABLE `access_menu_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `access_role_user`
--
ALTER TABLE `access_role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `access_submenu_role`
--
ALTER TABLE `access_submenu_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategories`
--
ALTER TABLE `kategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masukan`
--
ALTER TABLE `masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_menu_role`
--
ALTER TABLE `access_menu_role`
  ADD CONSTRAINT `access_menu_role_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_menu_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `access_role_user`
--
ALTER TABLE `access_role_user`
  ADD CONSTRAINT `access_role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_role_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `access_submenu_role`
--
ALTER TABLE `access_submenu_role`
  ADD CONSTRAINT `access_submenu_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_submenu_role_ibfk_2` FOREIGN KEY (`submenu_id`) REFERENCES `submenus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `anggaran`.`users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
