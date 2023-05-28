-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 08:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakemyday`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `createdat`) VALUES
(1, 'admin.first', 'admin.first@gmail.com', '$2y$10$GcNtHpUfBlN0j7Yttzji8uSNRqqpVPEMtZ9Ur1w0CQIO1JW70dj7e', '2023-05-21 18:16:16'),
(2, 'admin.second', 'admin.second@gmail.com', '$2y$10$fWsF6zNJT.v2ms7WF7q9.ucMaz5xBwWF/rVv9WNjNltDUy9q7Zx7u', '2023-05-21 21:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_title` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(10) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_subtotal` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `pro_id`, `pro_title`, `pro_image`, `pro_price`, `pro_qty`, `pro_subtotal`, `user_id`, `created_at`) VALUES
(23, 11, 'Chocolate Cookie', 'choco_cookie.jpg', 800, 2, 1600, 1, '2023-05-18 15:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `icon`, `description`, `created_at`) VALUES
(2, 'BAKED GOODS', 'bis.jpg', 'bistro-muffin', 'Foods Made From Dough or Batter', '2023-05-14 13:26:50'),
(3, 'CAKE JARS', 'jar.png', 'bistro-icecream', 'Mini Layered Cakes in Small Mason Jars', '2023-05-14 13:29:22'),
(4, 'CUPCAKES', 'cup.jpg', 'bistro-muffin', 'Sweet and Delicious Basic Cupcakes', '2023-05-14 13:29:22'),
(5, 'MACARONS', 'mac.jpg', 'bistro-dessert', 'Delicate Sandwich Cookies with a Crisp Exterior', '2023-05-14 13:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `details`, `created_at`) VALUES
(0, 'test fullname', 'testemail@gmail.com', 'test text', '2023-05-23 16:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `visit` enum('Yes','No') NOT NULL,
  `service` enum('Bad','Not so bad','Average','Good','Very Good','Excellent') NOT NULL,
  `ordering` enum('Easy','Difficult') NOT NULL,
  `order_again` enum('Yes','No') NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `username`, `email`, `visit`, `service`, `ordering`, `order_again`, `rate`, `created_at`) VALUES
(11, 'user2', 'user2@gmail.com', 'Yes', 'Excellent', 'Easy', 'Yes', '4', '2023-05-19 21:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zip_code` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `order_notes` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Sent for process',
  `price` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lname`, `company_name`, `address`, `city`, `country`, `zip_code`, `email`, `phone_number`, `order_notes`, `status`, `price`, `user_id`, `created_at`) VALUES
(6, 'Test for order', 'test for order', 'test', 'test', 'test', 'test', 0, 'user1@gmail.com', 0, 'test', 'Sent for process', 2420, 1, '2023-05-18 19:26:23'),
(7, 'k', 'k', 'k', 'k', 'k', 'k', 0, 'user3@gmail.com', 5, 'y', 'Sent for process', 1680, 3, '2023-05-19 07:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `order_id` int(3) NOT NULL,
  `payer_name` varchar(200) NOT NULL,
  `payer_email` varchar(200) NOT NULL,
  `transaction_amount` varchar(200) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'Sent for process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`order_id`, `payer_name`, `payer_email`, `transaction_amount`, `user_id`, `created_at`, `status`) VALUES
(1, 'user', 'user2@gmail.com', '8032.00', 2, '2023-05-28 18:00:07', 'Sent for process'),
(8, 'first', 'user3@gmail.com', '930.00', 3, '2023-05-25 18:13:00', 'Sent for process');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT 1,
  `image` varchar(200) NOT NULL,
  `exp_date` varchar(200) NOT NULL,
  `category_id` int(3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `quantity`, `image`, `exp_date`, `category_id`, `status`, `created_at`) VALUES
(2, 'Special Cookies', 'Welcome to our cookie wonderland! Indulge in the heavenly delight of our freshly baked cookies. Each bite offers a perfect balance of crispy edges and a soft, chewy center that will leave you craving more.\n\nOur cookies are made with premium ingredients, including rich butter, high-quality chocolate, and a touch of magic. From classic chocolate chip to decadent double chocolate, our selection of flavors will satisfy every cookie lover\'s palate.\n\nBaked to perfection, our cookies are crafted with love and atteWelcome to our cookie wonderland! Indulge in the heavenly delight of our freshly baked cookies. Each bite offers a perfect balance of crispy edges and a soft, chewy center that will leave you craving more.\n\nOur cookies are made with premium ingredients, including rich butter, high-quality chocolate, and a touch of magic. From classic chocolate chip to decadent double chocolate, our selection of flavors will satisfy every cookie lover\'s palate.', '898', 14, 'cookie.jpg', '2024', 2, 1, '2023-05-14 17:48:07'),
(3, 'Oreo Cupcake', 'Welcome to the world of Oreo Cupcakes, where indulgence meets perfection! Our Oreo cupcakes are a delightful fusion of moist chocolate cake and the iconic Oreo cookie.\n\nSink your teeth into the rich and velvety chocolate cake base, infused with a hint of Oreo goodness. Each cupcake is generously topped with a luscious Oreo cream frosting that will transport you to dessert paradise.', '801', 2, 'oreo_cup.jpg', '2025', 4, 1, '2023-05-14 17:48:07'),
(4, 'Strawberry Macaron', 'Welcome to the exquisite world of Strawberry Macarons, where elegance meets delectable flavors! Our strawberry macarons are a delightful marriage of delicate almond shells and a luscious strawberry filling.\n\nIndulge in the crisp, yet tender texture of our perfectly baked macaron shells, which have been skillfully crafted to create a light and airy bite. These dainty treats are then filled with a velvety strawberry ganache that bursts with the sweet and tangy essence of sun-ripened strawberries.', '702', 3, 'straw_macaron.jpg', '2025', 5, 1, '2023-05-15 09:11:24'),
(5, 'Cherry Cake', 'Indulge in the exquisite flavors of our signature cherry cake, a true masterpiece that combines the allure of cherries with the perfection of cake-making. This delectable creation will captivate your taste buds and leave you craving for more.\n\nOur cherry cake starts with a light and moist vanilla sponge, carefully prepared to ensure a delicate texture that melts in your mouth. Within its tender crumb, you\'ll discover a luscious layer of juicy, ruby-red cherries, adding a burst of natural sweetness and a delightful tartness that perfectly balances the overall flavor profile.', '999', 3, 'chery_cake.jpg', '2024', 1, 1, '2023-05-15 11:41:47'),
(6, 'Caramel Macaron', 'Welcome to the world of Caramel Macarons, where sweetness and sophistication combine to create a truly irresistible treat. Our caramel macarons are a delightful symphony of delicate almond shells and a rich, gooey caramel filling.', '830', 1, 'caramel_macaron.jpg', '2024', 5, 1, '2023-05-15 12:11:23'),
(7, 'Chocolate Cake', 'Welcome to chocolate lover\'s paradise! Our decadent chocolate cake is an absolute delight for your taste buds. Prepare to indulge in the rich, velvety goodness that only high-quality chocolate can deliver.', '1300', 1, 'choco_cake.jpg', '2024', 1, 1, '2023-05-15 12:11:23'),
(9, 'Birthday Jar', 'Celebrate birthdays in style with our delightful Birthday Jars! These charming and irresistible treats are the perfect way to make someone\'s special day even more memorable.\r\n\r\nEach Birthday Jar is a mini dessert masterpiece, meticulously crafted with love and attention to detail. Picture a clear glass jar filled with layers of delectable goodness, creating a visual feast that\'s as delightful to look at as it is to devour.', '2000', 1, 'birthday_jar.jpg', '2024', 3, 1, '2023-05-15 12:27:53'),
(10, 'Caramel Jar', 'Indulge in the irresistible allure of our Caramel Jars. These delectable treats are a celebration of the rich and velvety caramel flavor, expertly crafted to satisfy your sweetest cravings.\r\n\r\nImagine a petite glass jar filled to the brim with layers of caramel-infused goodness. With each spoonful, you\'ll discover a symphony of flavors and textures that will transport you to caramel heaven.', '1600', 1, 'caramel_jar.jpg', '2024', 3, 1, '2023-05-15 12:27:53'),
(11, 'Chocolate Cookie', 'Satisfy your cravings with our heavenly chocolate cookies, the ultimate indulgence for chocolate enthusiasts. These delectable treats are baked to perfection, boasting a rich, fudgy texture and a deep cocoa flavor that will transport your taste buds to chocolate paradise.\r\n\r\nImagine sinking your teeth into a freshly baked chocolate cookie with a crisp, slightly cracked exterior that gives way to a soft and chewy center. Each bite is a blissful explosion of chocolatey goodness, as velvety chocolate chips melt in your mouth, leaving you craving for more.', '800', 1, 'choco_cookie.jpg', '2024', 2, 1, '2023-05-15 12:27:53'),
(12, 'Chocolate Cupcake', 'Experience pure bliss with our delectable chocolate cupcakes. These miniature delights are a chocolate lover\'s dream come true, combining rich, moist cake with velvety frosting for an indulgent treat that will leave you craving more.\r\n\r\nOur chocolate cupcakes start with a moist and fluffy chocolate cake base, crafted with the finest cocoa powder to achieve a deep, irresistible chocolate flavor. Each bite is a harmonious balance of tenderness and richness, delivering a moment of pure chocolate heaven.', '750', 1, 'choco_cup.jpg', '2024', 4, 1, '2023-05-15 12:27:53'),
(13, 'Chocolate Jar', 'Get ready to embark on a chocolate lover\'s adventure with our exquisite Chocolate Jars. These decadent treats are meticulously crafted to capture the essence of pure chocolate bliss, beautifully presented in a convenient and indulgent jar.\r\n\r\nImagine layers of rich and velvety chocolate goodness, all tucked into a charming glass jar. Each spoonful is a symphony of flavors and textures, designed to tantalize your taste buds and leave you craving for more.', '1700', 1, 'choco_jar.jpg', '2024', 3, 1, '2023-05-15 12:36:11'),
(14, 'Chocolate Macaron', 'Introducing our heavenly Chocolate Jar, a true delight for chocolate enthusiasts. This indulgent treat is a harmonious symphony of rich flavors and velvety textures, elegantly presented in a convenient and luxurious jar.\r\n\r\nPrepare to be captivated by layers of pure chocolate goodness, meticulously crafted to create an unforgettable experience. As you unscrew the lid, the intoxicating aroma of fine chocolate wafts through the air, building anticipation for the delight that awaits.', '900', 1, 'choco_macaron.jpg', '2025', 5, 1, '2023-05-15 12:36:11'),
(15, 'Lemon Cupcake', 'Imagine a moist and tender lemon-infused cake, kissed with a hint of vibrant yellow. The moment you take a bite, the zesty lemon flavor dances on your palate, awakening your senses with its bright and invigorating essence. The cake\'s texture is perfectly balanced, with a soft crumb that melts in your mouth.', '500', 1, 'lemon_cup.jpg', '2024', 4, 1, '2023-05-15 12:39:19'),
(16, 'Lemon Macaron', 'Experience a delightful balance of tangy and sweet with our exquisite Lemon Macarons. These delicate French confections are a testament to the artistry of pastry-making, combining the vibrant flavors of zesty lemon with the airy perfection of a classic macaron shell.\r\n\r\nImagine biting into a crisp and lightly crunchy exterior that gives way to a soft and chewy center. The first taste is an explosion of bright lemon flavor, as the zingy citrus notes dance across your palate, awakening your senses with their refreshing tang.', '750', 1, 'lemon_macaron.jpg', '2024', 5, 1, '2023-05-15 12:39:19'),
(17, 'Plain Cookie', 'Indulge in the simple pleasure of our classic Plain Cookies. These timeless treats are the epitome of comfort and familiarity, offering a delightful experience with every bite.\r\n\r\nImagine a perfectly baked cookie with a golden-brown exterior that\'s crisp at the edges and wonderfully tender in the center. The aroma of freshly baked goodness fills the air as you take your first bite, revealing a satisfying crunch that gives way to a melt-in-your-mouth texture.', '700', 1, 'mill_cookie.jpg', '2024', 2, 1, '2023-05-15 12:44:31'),
(18, 'Oatmeal Cookie', 'Delight in the comforting flavors of our wholesome Oatmeal Cookies. These classic treats are crafted with love and care, blending the heartiness of oats with the perfect touch of sweetness for a truly satisfying experience.\r\n\r\nImagine biting into a chewy and hearty cookie, filled with a medley of rolled oats that lend a delightful texture and nutty undertones. Each bite is a harmonious combination of flavors, as the oats mingle with the sweetness of brown sugar and a hint of warm cinnamon, creating a comforting and nostalgic taste.', '850', 1, 'oatmeal_cookie.jpg', '2025', 2, 1, '2023-05-15 12:44:31'),
(19, 'Oreo Cake', 'Introducing our sensational Oreo Cake, a chocolate lover\'s dream come true. Indulge in layers of moist chocolate cake infused with the iconic flavors of Oreo cookies, enveloped in a velvety smooth Oreo cream filling, and adorned with a symphony of chocolatey delights.', '1500', 1, 'oreo_cake.jpg', '2024', 1, 1, '2023-05-15 12:47:18'),
(20, 'Oreo Jar', 'Embark on a journey of pure delight with our exquisite Oreo Jar. This indulgent treat is a harmonious blend of velvety chocolate, creamy Oreo filling, and irresistible cookie crunch, all beautifully layered in a charming glass jar.', '1650', 1, 'oreo_jar.jpg', '2024', 3, 1, '2023-05-15 12:47:18'),
(21, 'Raspberry Cookie', 'Indulge in the delightful fusion of sweet and tangy with our Raspberry Cookies. These delectable treats combine the buttery richness of a classic cookie with the vibrant flavors of juicy raspberries, creating a sensational taste experience.', '650', 1, 'raspberry_cookie.jpg', '2024', 2, 1, '2023-05-15 12:49:42'),
(22, 'Red Cupcake', 'Indulge in the vibrant allure of our Red Cupcakes, a visual and culinary delight that will captivate your senses. These eye-catching treats are a perfect blend of moist cake, velvety frosting, and a pop of vibrant red color that adds a touch of excitement to any occasion.', '600', 1, 'red_cup.jpg', '2025', 4, 1, '2023-05-15 12:49:42'),
(24, 'Strawberry Cake', 'Introducing our delectable Strawberry Cake, a perfect blend of moist cake, creamy frosting, and the refreshing sweetness of strawberries. This mouthwatering treat is sure to satisfy your cravings in no time.', '1200', 1, 'strawberry_cake.jpg', '2024', 1, 1, '2023-05-15 12:53:06'),
(25, 'Ube Jar', 'Indulge in the enchanting flavors of our Ube Jar, a captivating dessert that celebrates the unique and vibrant essence of purple yam. This delightful creation is a feast for the senses, beautifully layered in a charming glass jar.', '1200', 1, 'ube_jar.jpg', '2025', 3, 1, '2023-05-15 12:54:59'),
(26, 'Vanilla Cupcake', 'Delight in the timeless elegance of our Vanilla Cupcakes, a classic treat that never fails to please. These delectable delights are the epitome of simplicity and sophistication, offering a perfect balance of delicate flavors and irresistible sweetness.', '500', 1, 'vanilla_cup.jpg', '2024', 4, 1, '2023-05-15 12:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `suppliername`, `email`, `password`) VALUES
(1, 'supplier', 'supplier.first@gmail.com', '$2y$10$GcNtHpUfBlN0j7Yttzji8uSNRqqpVPEMtZ9Ur1w0CQIO1JW70dj7e'),
(5, 'cake supplier', 'cakesupplier@gmail.com', '$2y$10$69n3d1oaLbdSqbNuUlIIWu1z4xaBZDHuO2DPLHkOL8wHw.vaQwubC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `phone_number` int(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `mypassword`, `image`, `address`, `city`, `country`, `zip_code`, `phone_number`, `created_at`) VALUES
(1, 'user1', 'user1@gmail.com', 'user1', 'xxxxx', 'logocake.png', '', 'Tirana', '', 0, 0, '2023-05-13 20:00:20'),
(2, 'user2', 'user2@gmail.com', 'user2', 'xxxxx', 'logocake.png', 'new address', '', '', 0, 0, '2023-05-13 20:19:05'),
(3, 'user3', 'user3@gmail.com', 'user3', '$2y$10$K.SkPmxZ8jKj1SYUKPfSVO.duUGpZv8fnBG7V4MyAqJmqUBx.ZPdW', 'logocake.png', '', '', NULL, 0, 0, '2023-05-14 12:34:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
