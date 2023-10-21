-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 08:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `image`, `description`, `status`) VALUES
(1, 'Processor', 'amd.jpg', 'The best Ryzen CPU can trade blows with the top processors from Intel.', '0'),
(2, 'Graphics Card', 'graphics-card.jpg', 'The graphics card market is dominated by AMD and Nvidia, with chip giant Intel.', '0'),
(3, 'Keyboard', 'keyboard.jpg', 'We compiled a list of the best gaming keyboards for every PC gamer.', '0'),
(4, 'Monitor', 'monitor.jpg', 'We\'ve bought and tested over 270 monitors, and below you\'ll find our recommendations for the best gaming monitors to buy.', '0'),
(5, 'Motherboard', 'motherboard.jpg', 'Best Gaming Motherboards.', '0'),
(6, 'Mouse', 'mouse.jpg', 'The best gaming mouse provides you with the most satisfying sweeps, clicks, and hand-feel TM possible.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_16_132314_create_orders_table', 1),
(6, '2023_05_16_132346_create_categories_table', 1),
(7, '2023_05_17_124412_create_products_table', 2),
(8, '2023_05_17_125400_create_products_table', 3),
(9, '2023_05_20_102903_create_productorders_table', 4),
(10, '2023_05_20_142349_create_carts_table', 5),
(11, '2023_05_20_154257_create_orders_table', 6),
(12, '2023_05_20_154900_create_order_items_table', 6),
(13, '2023_05_21_050343_create_carts_table', 7),
(14, '2023_05_21_100900_create_categories_table', 8),
(15, '2023_05_21_104412_create_categories_table', 9),
(16, '2023_05_21_111807_create_products_table', 10),
(17, '2023_05_21_165801_create_carts_table', 11),
(18, '2023_05_27_042303_create_carts_table', 12),
(19, '2023_05_27_103654_create_orders_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `pincode`, `address`, `product_title`, `quantity`, `price`, `status`, `paymentmode`, `created_at`, `updated_at`) VALUES
(85, 'oldspeed', 'jovanniesala@gmail.com', '09089977347', '8100', 'Prk. Durian Mankilam', 'AMD Ryzen 5 3600', '4', '796', 'in progress', 'Cash on Delivery', '2023-08-07 10:46:19', '2023-08-07 10:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `title`, `image`, `type`, `description`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'AMD Ryzen 5 3600', 'amd.jpg', 'Processor', 'The AMD Ryzen 5 3600 is a desktop processor with 6 cores, launched in July 2019, at an MSRP of $199.', 50, 199, '0', NULL, NULL),
(2, 1, 'AMD Ryzen 7 1700', 'amd.jpg', 'Processor', 'The AMD Ryzen 7 1700 is a desktop processor with 8 cores, launched in March 2017, at an MSRP of $329.', 50, 329, '0', NULL, NULL),
(3, 1, 'AMD Ryzen 9 5950X', 'amd.jpg', 'Processor', 'The 16-core Ryzen 9 5950X is the perfect pick for AMD-loyal content creators who needs tons of multithreaded muscle in a reasonably priced CPU on a mainstream platform.', 50, 470, '0', NULL, NULL),
(4, 1, 'Ryzen 3 3200g', 'amd.jpg', 'Processor', 'AMD\'s Ryzen 3 3200G is a good-value budget CPU with surprising graphics pep', 50, 96, '0', NULL, NULL),
(5, 2, 'Gigabyte GeForce RTX™ 4070Ti AORUS ELITE (GV-N407TAORUS-E-12GD) 12GB GDDR6X 192BIT Graphics Card\r\n', 'graphics-card.jpg', 'Graphics Card', 'Powered by NVIDIA DLSS 3, ultra-efficient Ada Lovelace arch, and full ray tracing. 4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering.', 50, 1130, '0', NULL, NULL),
(6, 2, 'Gigabyte GeForce RTX™ 4080 Gaming OC (GV-N4080GAMING-OC-16GD) 16GB GDDR6X 256BIT Graphics Card', 'graphics-card.jpg', 'Graphics Card', '4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering', 50, 1579, '0', NULL, NULL),
(7, 2, 'INNO3D GTX1650 TWINX2 OC 4GB GDDR6 128BIT Graphics Card\r\n', 'graphics-card.jpg', 'Graphics Card', 'GPU Architecture: The GTX 1650 is based on NVIDIA\'s Turing architecture, which provides improved performance and efficiency compared to previous generations.', 50, 192, '0', NULL, NULL),
(8, 2, 'MSI GeForce RTX™ 3060Ti VENTUS 2X OC (LHR) 8GB GDDR6 256B Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The RTX 3060 Ti is based on NVIDIA\'s Ampere architecture, which offers significant performance improvements and enhanced ray tracing capabilities compared to previous generations.', 50, 422, '0', NULL, NULL),
(9, 2, 'MSI GeForce RTX™ 3060 GAMING X (LHR) 12GB GDDR6 192BIT Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The MSI GeForce RTX 3060 GAMING X (LHR) is a high-performance graphics card designed for gaming and graphics-intensive applications.', 50, 408, '0', NULL, NULL),
(10, 2, 'GIGABYTE GeForce RTX™ 3050 EAGLE OC 8GB GDDR6 128BIT Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The GIGABYTE GeForce RTX 3050 EAGLE OC is a graphics card designed for gaming and multimedia applications.', 50, 340, '0', NULL, NULL),
(11, 2, 'GIGABYTE GeForce RTX™ 3050 EAGLE 8GB GDDR6 128BIT Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The GIGABYTE GeForce RTX™ 3050 EAGLE is a graphics card designed for gaming and high-performance computing. GPU: The graphics card is powered by the NVIDIA GeForce RTX 3050 GPU.VRAM.', 50, 333, '0', NULL, NULL),
(12, 2, 'GIGABYTE GeForce® GTX 1660Ti OC 6GB DDR6 192BIT Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The GIGABYTE GeForce® GTX 1660Ti OC is a high-performance graphics card designed for gaming and multimedia applications.', 50, 320, '0', NULL, NULL),
(13, 2, 'GIGABYTE GeForce® GTX 1650 OC 4GB GDDR5 128BIT Graphics Card\r\n', 'graphics-card.jpg', 'Graphics Card', 'The GIGABYTE GeForce® GTX 1650 OC is an entry-level graphics card designed for budget-conscious gamers and users.', 50, 186, '0', NULL, NULL),
(14, 2, 'GIGABYTE GeForce® GTX 1650 LOW PROFILE OC 4GB GDDR5 128BI Graphics Card', 'graphics-card.jpg', 'Graphics Card', 'The GIGABYTE GeForce® GTX 1650 LOW PROFILE OC is a compact and low-profile graphics card designed for small form factor systems and HTPCs (Home Theater PCs).', 50, 177, '0', NULL, NULL),
(15, 3, 'RAZER BLACKWIDOW V3 TKL Yellow Switch Chroma RGB Tenkeyless Wired Keyboard', 'keyboard.jpg', 'Keyboard', 'The Razer BlackWidow V3 TKL Yellow Switch Chroma RGB Tenkeyless Wired Keyboard offers a compact and high-performance gaming experience.', 50, 68, '0', NULL, NULL),
(16, 3, 'LOGITECH G413 TKL SE Mechanical Gaming Keyboard', 'keyboard.jpg', 'Keyboard', 'Logitech G413 TKL SE Mechanical Gaming Keyboard offers a compact design, reliable performance, and essential gaming features. ', 50, 61, '0', NULL, NULL),
(17, 3, 'ASUS TUF GAMING K3 (Red Switch) RGB Mechanical Gaming Keyboard (Gun Metal)', 'keyboard.jpg', 'Keyboard', 'ASUS TUF Gaming K3 RGB Mechanical Gaming Keyboard is a feature-rich and durable keyboard designed for gamers.', 50, 60, '0', NULL, NULL),
(18, 3, 'GLORIOUS GMMK2 RGB (GLO-GMMK2-96-FOX-B) Prebuilt Linear Mechanical Keyboard (Black)', 'keyboard.jpg', 'Keyboard', 'Glorious GMMK2 RGB Prebuilt Linear Mechanical Keyboard offers versatility, customization options, and a sleek design.', 50, 87, '0', NULL, NULL),
(19, 3, 'LOGITECH Pop Keys Daydream Mint Lilac/Yellow Wireless Receiver Mechanical Keyboard', 'keyboard.jpg', 'Keyboard', 'LOGITECH Pop Keys Daydream Mint Lilac/Yellow Wireless Receiver Mechanical Keyboard offers a blend of style, functionality, and convenience.', 50, 96, '0', NULL, NULL),
(20, 3, 'LOGITECH Pop Keys Blast Black/Yellow Wireless Receiver Mechanical Keyboard', 'keyboard.jpg', 'Keyboard', 'LOGITECH Pop Keys Blast Black/Yellow Wireless Receiver Mechanical Keyboard seamlessly combines style, performance, and convenience.', 50, 96, '0', NULL, NULL),
(21, 3, 'Logitech MK220 Compact Wireless Keyboard and Mouse Combo', 'keyboard.jpg', 'Keyboard', 'Logitech MK220 Compact Wireless Keyboard and Mouse Combo offers a practical and efficient solution for those seeking a clutter-free workspace.', 50, 20, '0', NULL, NULL),
(22, 3, 'RAPOO X120 Pro USB Keyboard+Mouse Bundle (Black)', 'keyboard.jpg', 'Keyboard', 'RAPOO X120 Pro USB Keyboard+Mouse Bundle in Black offers a reliable and functional solution for your everyday computing needs.', 50, 9, '0', NULL, NULL),
(23, 4, 'AOC 27″ 27G2SP Adaptive Sync 165HZ Gaming Monitor\r\nAll Products, Gaming Peripherals and Accessories, Gaming Monitors', 'monitor.jpg', 'Monitor', 'The AOC 27\" 27G2SP Adaptive Sync 165Hz Gaming Monitor offers impressive gaming performance with its high refresh rate, fast response time, adaptive sync technology, and vibrant IPS panel.', 50, 226, '0', NULL, NULL),
(24, 4, 'Samsung 49-inch Odyssey G9 32:9 WQHD G-Sync Compatible 240Hz Curved Gaming Monitor ', 'monitor.jpg', 'Monitor', ' Gaming peripherals and accessories play a crucial role in enhancing the gaming experience, and gaming monitors are a key component in delivering immersive visuals.', 50, 1297, '0', NULL, NULL),
(25, 4, 'Samsung 32-inch Odyssey G7 WQHD G-Sync Compatible 240hz QLED Curved Gaming Monitor ', 'monitor.jpg', 'Monitor', 'The Samsung 49-inch Odyssey G9 gaming monitor offers an unparalleled gaming experience with its ultra-wide curved display, high resolution, high refresh rate, G-Sync compatibility, HDR support, and immersive features.', 50, 644, '0', NULL, NULL),
(26, 4, 'Samsung 27-inch Odyssey G7 WQHD G-Sync Compatible 240hz QLED Curved Gaming Monitor', 'monitor.jpg', 'Monitor', 'The Samsung 32-inch Odyssey G7 gaming monitor offers an exceptional gaming experience with its curved QLED display, high refresh rate, G-Sync compatibility, HDR support, and gaming-focused features.', 50, 538, '0', NULL, NULL),
(27, 4, 'AOC 24G2E 23.8″ Full HD 144Hz 1ms FreeSync Premium IPS Gaming Monitor', 'monitor.jpg', 'Monitor', 'It offers a combination of fast refresh rate, quick response time, and adaptive sync technologies to deliver an immersive and smooth gaming experience.', 50, 187, '0', NULL, NULL),
(28, 4, 'PHILIPS 23.8″ 242E1GAEZ 165HZ Gaming Monitor', 'monitor.jpg', 'Monitor', 'The fast refresh rate and response time reduce motion blur and ghosting, while the adaptive sync technologies eliminate screen tearing and stuttering, resulting in smooth, fluid, and visually pleasing gameplay.', 50, 132, '0', NULL, NULL),
(29, 4, 'ASUS TUF Gaming VG249Q1A 23.8″ Full HD 165Hz AMD FreeSync Premium Gaming Monitor with Extreme Low Motion Blur', 'monitor.jpg', 'Monitor', 'ASUS TUF Gaming VG249Q1A offers a high refresh rate, AMD FreeSync Premium support, and Extreme Low Motion Blur technology to deliver smooth and immersive gaming experiences with reduced motion blur and tearing. ', 50, 176, '0', NULL, NULL),
(30, 4, 'AOC 24G2SE 23.8″ Full HD 165Hz 1ms Adaptive Sync VA Gaming Monitor', 'monitor.jpg', 'Monitor', 'AOC 24G2SE is a gaming monitor that aims to provide responsive gameplay and visual quality for gamers.', 50, 134, '0', NULL, NULL),
(31, 5, 'ASUS TUF B660M-PLUS GAMING WIFI D4 MOTHERBOARD', 'motherboard.jpg', 'Motherboard', 'ASUS TUF B660M-PLUS GAMING WIFI D4 is a motherboard designed for Intel processors and offers a range of features suited for gaming and general computing needs. ', 50, 177, '0', NULL, NULL),
(32, 5, 'ASUS STRIX B660-A GAMING WIFI D4 MOTHERBOARD', 'motherboard.jpg', 'Motherboard', 'The motherboard features high-quality audio components and supports.', 50, 241, '0', NULL, NULL),
(33, 5, 'MSI MPG Z590 GAMING PLUS Intel Z590 (LGA 1200) ATX Motherboard with Premium Thermal Solution', 'motherboard.jpg', 'Motherboard', 'MSI MPG Z590 GAMING PLUS is an ATX motherboard designed for Intel processors with the LGA 1200 socket. It offers a range of features suitable for gaming and high-performance computing.', 50, 239, '0', NULL, NULL),
(34, 5, 'ASUS TUF GAMING B560M-PLUS WIFI Intel B560 (LGA 1200) mATX motherboard with PCIe 4.0 Aura Sync RGB Lighting', 'motherboard.jpg', 'Motherboard', 'B560 (LGA 1200) mATX motherboard is designed for Intel processors and offers a compact form factor with powerful features for gaming and high-performance computing.', 50, 155, '0', NULL, NULL),
(35, 6, 'Logitech G304 Lightspeed Wireless Gaming Mouse\r\n', 'mouse.jpg', 'Mouse', 'The Logitech G304 Lightspeed Wireless Gaming Mouse is a popular gaming mouse that offers wireless connectivity and various features tailored for gaming.', 50, 38, '0', NULL, NULL),
(36, 6, 'Logitech G502 HERO High Performance RGB Gaming Mouse', 'mouse.jpg', 'Mouse', 'Logitech G502 HERO High Performance RGB Gaming Mouse is a feature-rich gaming mouse designed for gamers who prioritize performance, customization, and comfort.', 50, 42, '0', NULL, NULL),
(37, 6, 'ASUS ROG KERIS (P517) EVA EDITION 2.4GHZ Wireless RGB Gaming Mouse\n', 'mouse.jpg', 'Mouse', 'ASUS ROG Keris (P517) EVA Edition is a wireless RGB gaming mouse designed for gamers seeking precision, performance, and comfort.', 50, 81, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `pincode`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 'oldspeed', 'jovanniesala@gmail.com', NULL, '$2y$10$REIduaETZi64iCgdho87peV/RDEesX1qhlaGxuo4.3pAnEykAv23i', '09089977347', '8100', 'Prk. Durian Mankilam', NULL, '2023-08-07 10:42:56', '2023-08-07 10:51:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
