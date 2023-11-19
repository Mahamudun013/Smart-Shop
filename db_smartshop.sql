-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 05:06 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categoryDescription`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', '<p>Men\'s Fashion</p>', 1, NULL, '2019-04-25 07:34:19'),
(2, 'Women\'s Fashion', '<p>Women\'s Fashion</p>', 1, NULL, NULL),
(3, 'Kid\'s Fashion', '<p>Kid\'s Fashion</p>', 1, NULL, NULL),
(4, 'Electronics', '<p>Electronics</p>', 1, NULL, NULL),
(5, 'Grocery', '<p>Grocery</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `districtName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `provider`, `provider_id`, `address`, `phoneNumber`, `districtName`, `created_at`, `updated_at`) VALUES
(1, 'Md.Mahamudun Hassan', 'mahamudun.totaltvs@gmail.com', 'mahamudun123', NULL, NULL, '<p>Dhaka</p>', '01850969739', 'Dhaka', '2019-04-17 07:39:09', '2019-04-17 07:52:16'),
(2, 'Mahmud Hasan', 'mahamudun.totaltvs@gmail.com', '123456', 'facebook', '246557299596037', '<p>Dhaka</p>', '1850969739', 'Dhaka', '2019-04-17 08:12:06', '2019-04-17 08:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacturerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturerDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturerName`, `manufacturerDescription`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Rich Man', '<p>Rich Man</p>', 1, NULL, NULL),
(2, 'Aarong', '<p>Aarong</p>', 1, NULL, NULL),
(3, 'Xiaomi', '<p>Xiaomi</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_03_134432_create_categories_table', 1),
(4, '2018_12_07_080922_create_manufacturers_table', 1),
(5, '2018_12_07_121740_create_products_table', 1),
(6, '2019_01_08_102717_create_customers_table', 1),
(7, '2019_01_19_122024_create_shippings_table', 1),
(8, '2019_01_21_094455_create_orders_table', 1),
(9, '2019_01_21_094636_create_payments_table', 1),
(10, '2019_01_21_094713_create_order_details_table', 1),
(11, '2019_03_22_082940_create_shipments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `orderTotal` double(10,2) NOT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `shippingId`, `orderTotal`, `orderStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000.00, 'Complete', '2019-04-17 07:52:43', '2019-04-17 08:01:06'),
(2, 2, 2, 5000.00, 'Pending', '2019-04-17 08:13:12', '2019-04-17 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `productName`, `productPrice`, `productQuantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Men\'s Casual Shirt', 2000.00, 2, '2019-04-17 07:52:44', '2019-04-17 07:52:44'),
(2, 1, 2, 'Gorgeous silk saree', 3000.00, 2, '2019-04-17 07:52:44', '2019-04-17 07:52:44'),
(3, 2, 1, 'Men\'s Casual Shirt', 2000.00, 1, '2019-04-17 08:13:12', '2019-04-17 08:13:12'),
(4, 2, 2, 'Gorgeous silk saree', 3000.00, 1, '2019-04-17 08:13:12', '2019-04-17 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `paymentType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderId`, `paymentType`, `paymentStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'cashOnDelivery', 'Paid', '2019-04-17 07:52:44', '2019-04-21 07:15:22'),
(2, 2, 'cashOnDelivery', 'Pending', '2019-04-17 08:13:12', '2019-04-17 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` int(11) NOT NULL,
  `manufacturerId` int(11) NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productShortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productLongDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `categoryId`, `manufacturerId`, `productPrice`, `productQuantity`, `productShortDescription`, `productLongDescription`, `productImage`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Casual Shirt', 1, 1, 2000.00, 27, '<ul style=\"margin: 0px 0px 1em; padding: 0px 0px 0px 1.5em; list-style-position: outside; list-style-image: initial; color: #787878; font-family: robotoregular; text-align: justify;\">\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Product Name: Men\'s Casual Shirt</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Brand: Obtain</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Sleeve: Full Sleeve</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\">Fabric:&nbsp;95% Cotton &amp; 5% Nylon</li>\r\n<li style=\"margin: 0px; padding: 0px;\">Pattern: Printed</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Color: Same as Picture&nbsp;</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Size: S, M, L, XL</span></li>\r\n</ul>', '<ul style=\"margin: 0px 0px 1em; padding: 0px 0px 0px 1.5em; list-style-position: outside; list-style-image: initial; color: #787878; font-family: robotoregular; text-align: justify;\">\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Product Name: Men\'s Casual Shirt</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Brand: Obtain</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Sleeve: Full Sleeve</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\">Fabric:&nbsp;95% Cotton &amp; 5% Nylon</li>\r\n<li style=\"margin: 0px; padding: 0px;\">Pattern: Printed</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Color: Same as Picture&nbsp;</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\">Size: S, M, L, XL</span></li>\r\n</ul>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; color: #787878; font-family: robotoregular; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; color: #000000;\"><strong style=\"margin: 0px; padding: 0px;\">Measurement:&nbsp;</strong></span></p>\r\n<table class=\"data-table\" style=\"margin: 0px; padding: 0px; border: 1px solid #d9dde3; border-spacing: 0px; empty-cells: show; width: 1138px; color: #787878; font-family: robotoregular; text-align: justify;\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody style=\"margin: 0px; padding: 0px;\">\r\n<tr style=\"margin: 0px; padding: 0px;\">\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"67\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Size</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"66\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Length</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Chest</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: none;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Collar</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"margin: 0px; padding: 0px;\">\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"67\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Small</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"66\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">28.5&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">20&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: none;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">15&rdquo;</p>\r\n</td>\r\n</tr>\r\n<tr style=\"margin: 0px; padding: 0px;\">\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"67\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Medium</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"66\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">29.75&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">21&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: none;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">15.5&rdquo;</p>\r\n</td>\r\n</tr>\r\n<tr style=\"margin: 0px; padding: 0px;\">\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"67\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">Large</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"66\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">30.25&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">22&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: 1px solid #d9dde3; border-right: none;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">16&rdquo;</p>\r\n</td>\r\n</tr>\r\n<tr style=\"margin: 0px; padding: 0px;\">\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: none; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"67\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\">XL</strong></p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: none; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"66\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">30.75&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: none; border-right: 1px solid #d9dde3;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">23&rdquo;</p>\r\n</td>\r\n<td style=\"margin: 0px; padding: 5px 10px; vertical-align: middle; text-align: left; border-bottom: none; border-right: none;\" valign=\"top\" width=\"60\">\r\n<p style=\"margin: 0px 0px 1em; padding: 0px;\">16.5&rdquo;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'public/productImage/81gsXllXdTL._SL1500_.jpg', 1, '2019-04-17 07:44:09', '2019-04-17 08:13:12'),
(2, 'Gorgeous silk saree', 2, 2, 3000.00, 27, '<ul style=\"margin: 0px 0px 1em; padding: 0px 0px 0px 1.5em; list-style-position: outside; list-style-image: initial; color: #787878; font-family: robotoregular; text-align: justify;\">\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Brand</span>&nbsp;: Tangail Saree</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Color</span>&nbsp;: Blue &amp; Green</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p class=\"MsoNormal\" style=\"margin: 0px 0px 0.0001pt; padding: 0px; line-height: normal; color: #696e79 !important;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Origin-Tangail Saree</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Fabric&ndash; Silk</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Size-13.5 Haat with blouse Piece</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Color-Same as picture</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Exclusively collected from the original source of Tangail</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Very comfortable to use in any weather.</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Made in Bangladesh.</span></li>\r\n</ul>', '<ul style=\"margin: 0px 0px 1em; padding: 0px 0px 0px 1.5em; list-style-position: outside; list-style-image: initial; color: #787878; font-family: robotoregular; text-align: justify;\">\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Brand</span>&nbsp;: Tangail Saree</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Color</span>&nbsp;: Blue &amp; Green</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p class=\"MsoNormal\" style=\"margin: 0px 0px 0.0001pt; padding: 0px; line-height: normal; color: #696e79 !important;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Origin-Tangail Saree</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Fabric&ndash; Silk</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Size-13.5 Haat with blouse Piece</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Color-Same as picture</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Exclusively collected from the original source of Tangail</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Very comfortable to use in any weather.</span></li>\r\n<li style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: black; font-size: 10.5pt; font-family: robotoregular, serif;\">Made in Bangladesh.</span></li>\r\n</ul>', 'public/productImage/197-1B.jpg', 1, '2019-04-17 07:48:44', '2019-04-17 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipmentId` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `trackingNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminComment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateShipped` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateDelivered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`shipmentId`, `orderId`, `trackingNumber`, `adminComment`, `dateShipped`, `dateDelivered`, `created_at`, `updated_at`) VALUES
(1, 1, 'DHL:2929', 'Shipped Today', '2019-04-17', '2019-04-18', '2019-04-17 07:59:55', '2019-04-17 08:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `districtName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `fullName`, `email`, `address`, `phoneNumber`, `districtName`, `created_at`, `updated_at`) VALUES
(1, 'Md. Mahamudun Hassan', 'mahamudun.totaltvs@gmail.com', '<p>Dhaka</p>', '01850969739', 'Dhaka', '2019-04-17 07:52:36', '2019-04-17 07:52:36'),
(2, 'Mahmud Hasan', 'mahamudun.totaltvs@gmail.com', '<p>Dhaka</p>', '1850969739', 'Dhaka', '2019-04-17 08:13:07', '2019-04-17 08:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md.Mahamudun Hassan', 'Dhaka-1212', 'mahamudun.totaltvs@gmail.com', '$2y$10$3fR0kJCmzl0g.zbQIhCIXO0ooYrSImb1UtOqwsfw9fFE6UoRwsKwO', 'ZgIrEiMdI0Yh4ZkzYkwkR0uXUu4QMH3bCXCt9ZIKGPLGYuCW15RGNi4lSCFv', '2019-04-17 07:33:47', '2019-04-17 07:33:47'),
(2, 'Md.Mahamudun Hassan', '<p>Dhaka</p>', 'mahamudun@gmail.com', '$2y$10$XVViSZxoxHnnebHMosI9w.WGJAMdt/1RVeVArWQB18pi1.6eQ3xsq', NULL, '2019-04-17 08:02:58', '2019-04-17 08:02:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipmentId`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipmentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
