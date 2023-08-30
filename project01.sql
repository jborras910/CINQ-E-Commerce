-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 10:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project01`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheesecake_product`
--

CREATE TABLE `cheesecake_product` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `descriptions` varchar(5000) NOT NULL,
  `modal_images` varchar(100) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cheesecake_product`
--

INSERT INTO `cheesecake_product` (`id`, `product_image`, `title`, `price`, `descriptions`, `modal_images`, `visible`) VALUES
(1, 'original_plain_cheesecake.jpg', 'Original Cheesecake', 130, 'What all Original cheesecakes aspire to be. Creamy but not heavy, light without falling apart as you take a forkful, and of course, that rich flavor. Rated “Best Overall” by the Wall Street Journal.', '', 0),
(2, 'devils_food_cheesecake.jpg', 'Devils Cheesecake', 135, 'Layers of rich chocolate cake and fudge frosting adorned with devilishly large chocolate chips and shavings. Approx. Net wt. 3.25 lbs.', 'devils_food_slice.jpg', 0),
(3, 'key_lime.jpg', 'Key Lime Cheesecake', 140, 'This beautiful and seasonal cake is both tart and sweet and perfectly complemented by our creamy cheesecake, is topped with fresh whipped cream. Delicious and refreshing!', 'key_lime_slice.jpg', 0),
(4, 'raspberry_swirl.jpg', 'Raspberry Swirl', 140, 'C’est magnifique... the delicately delicious whirl of real raspberry puree in delightful contrast with the smooth richness of Junior’s cheesecake.', 'raspberry_swirl_slice.jpg', 0),
(5, 'strawberry_cheesecake.jpg', 'Strawberry Cheesecake', 145, 'The original Strawberry Cheesecake is topped with fresh strawberry pie filling and baked into a graham crust. Finished with our macaroon crunch.', 'strawberry_slice.jpg', 0),
(6, 'tiramisu.jpg', 'Tiramisu Cheesecake', 150, 'Layers of Juniors Cappuccino Cheesecake, tiramisu cream, chiffon cake, and more tiramisu cream. Dusted with cocoa and dollops of cream. Elegant and beautiful dessert that tastes as good as it looks.', 'tiramisu_slice.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactuspage`
--

CREATE TABLE `contactuspage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `descriptions` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactuspage`
--

INSERT INTO `contactuspage` (`id`, `title`, `sub_title`, `descriptions`) VALUES
(8, 'Contact Us', 'Thank you for visiting the CinQ website!', 'We value your comments and suggestions. The information you provide will be used only to help us better serve you and will not be sold or shared for any other purpose. If you are writing with a question, we suggest that you first visit the FAQ section of the website. You may be able to find the answer to your question immediately by reviewing our list of frequently asked questions. If not, please complete the following form and we will get back with you as quickly as possible.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(550) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Pay_mode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_id`, `full_name`, `Contact`, `Address`, `Email`, `Pay_mode`) VALUES
(13, 'abigail borras', '0912342341', '26 antipolo st Metro Manila', 'abigailborras@gmail.com', 'COD'),
(14, 'jayson borras', '0912312321', '26 palosapis St proj 3, Quezon City', 'borgz@gmail.com', 'COD'),
(15, 'angel borras', '09122321372', '26 palosapis St proj 3, Quezon City', 'angel123@gmail.com', 'COD'),
(16, 'alona borras', '09123428471', '26, palosapis st proj 3 quezon city', 'alonaborras@yahoo.com', 'COD'),
(17, 'randy orton', '0', '', 'randy123@yahoo.com', 'COD'),
(18, 'ghobel de jesus', '09128831213', '27 antipolo, st', 'ghobel122@gmail.com', 'COD'),
(19, 'paolo alayacyac', '9682678886', '26 palosapis St proj 3, Quezon City', 'paolo123@gmail.com', 'COD'),
(20, 'paolo alayacyac', '9642678886', '26 palosapis St proj 3, Quezon City', 'paolo12345@gmail.com', 'COD'),
(21, 'jeferson borras', '9682678886', '26 palosapis St proj 3, Quezon City', 'jborras9101@gmail.com', 'COD'),
(22, 'paolo alayacyac', '9683478886', '22 palosapis St proj 3, Quezon City', 'paolo1234@gmail.com', 'COD'),
(23, 'paolo alayacyac', '9683478886', '22 palosapis St proj 3, Quezon City', 'paolo1234@gmail.com', 'COD'),
(24, 'Jeferson borras', '0912314212', '26 palosapis', 'qjaborras01@tip.edu.ph', 'COD'),
(25, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stuffed_product`
--

CREATE TABLE `stuffed_product` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `descriptions` varchar(5000) NOT NULL,
  `modal_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuffed_product`
--

INSERT INTO `stuffed_product` (`id`, `product_image`, `title`, `price`, `descriptions`, `modal_images`) VALUES
(1, 'banana_puddin.png', 'Banana Pudding', 110, 'This waffle cone is dipped in white chocolate and rolled in Nilla Wafer cookies. It is then stuffed with a banana pudding flavored cheesecake. It is then topped with bananas and mini Nilla Wafer Cookies.', ''),
(2, 'lemon_stuffed_cones.png', 'Lemon Stuffed Cones', 110, 'This delightful treat is made with a combination of lemon and sweet cream ice cream with lemon ribbon inside a sugar cone dipped in lemon candy coating.', ''),
(3, 'mango_stuffed_cones.png', 'Mango Stuffed Cones', 110, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', ''),
(4, 'mint_chocolate_chip_avocado_stuffed_cones.png', 'Mint Choco Avocado', 120, 'Creamy and crunchy from the chocolate chips, with a beautiful mint flavor, this avocado flavor is not overly sweet and it’s very refreshing!', ''),
(5, 'roasted_almond_stuffed_cones.png', 'Roasted Almond', 120, 'The addition of chopped roasted almonds to the stuffed cones brings delightful crunchiness to each bite.', ''),
(6, 'buko_pandan_stuffed_cones.png', 'Coconut Pandan', 120, 'This coconut pandan has a wonderful herbaceous pandan flavour and an amazing green colour thats totally natural.', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `Contact` varchar(250) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersType` varchar(100) NOT NULL,
  `faculty_images` varchar(50) DEFAULT NULL,
  `visible` tinyint(4) NOT NULL,
  `verify_status` int(11) NOT NULL DEFAULT 0,
  `verify_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `first_name`, `last_name`, `Contact`, `Address`, `usersEmail`, `usersUid`, `usersPwd`, `usersType`, `faculty_images`, `visible`, `verify_status`, `verify_token`) VALUES
(298, 'jeferson', 'borras', '131928329178', 'N/A', 'qjaborras01@tip.edu.ph', 'Admin123', '$2y$10$oUTWsoh0AALCD.MvR5AEuekWgYLBCoEh03qAc2KdwRTO3tipKuEji', 'Admin', '2x2.jpg', 0, 1, 'Done'),
(302, 'jef', 'borras', '', '', 'jborras910@gmail.com', 'admin1234', '$2y$10$RzHy0gFkrJzG.IBeuv96ReSs0/G5.S6fYgKGhz9t9MUzWLTAzT1Vq', 'Admin', 'canvas_pic.jpg', 0, 0, ''),
(309, 'jeferson', 'borras', '30219390', '239021', 'jborras123@gamil.com', 'jborras123', '$2y$10$rrKegyze609/Zbg1y/rzX.8Y1DXgjw7NKyDSmWVZmIg.ahCJqQiHC', 'User', NULL, 0, 0, '779f5f6f873fa0661e1bb66d0d90f1a0'),
(310, 'angel', 'borras', '213981209', 'kslajklds', 'angelborras1997@gmail.com', 'angelborras1997', '$2y$10$3GVfmb.3TTe7QkwcmR4LseoQmFSbNRKD6Kscv35VISD/jh51W4N4m', 'User', NULL, 0, 1, 'Done'),
(311, 'inok', 'goroy', '099858454', 'Quezon City', 'user@gmail.com', 'user', '$2y$10$x6FTQDhS/5AJLYLCo.eW5e1hVQcE.rQ1bm98ACGKVuUTSkG70JD/6', 'User', NULL, 0, 0, '57b144e83df7f260adfc6826a3da1971'),
(312, 'inok', 'goroy', '12345678', 'Quezon City', 'qrbgoroy@tip.edu.ph', 'inok', '$2y$10$BQSYe5Mc8drdwjY.di9/qOMXlsObCHARPbHRNY5sM0kTtKO1Kb6RS', 'User', NULL, 0, 0, '54abea7ac2f8486e78f9efbd16ab62d5'),
(313, 'REYNALDO', 'GOROY', '09269858454', 'Block63 Lot11 Southville9 Phase3 Baras Pinugay Rizal', 'inokgoroy22@gmail.com', 'rey', '$2y$10$Ml3UCr3qm4GOuUsJMDq5OeLZpiNuboALk91/0WT6aLP.iN7Wc22jq', 'User', NULL, 0, 0, '2938c0af358e4a9f48947dd462264af1');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_id` int(100) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Order_id`, `item_name`, `Price`, `Quantity`) VALUES
(7, 'Original Cheesecake', 130, 1),
(8, 'Original Cheesecake', 130, 1),
(8, 'Devils Cheesecake', 135, 1),
(9, 'Lemon Stuffed Cones', 110, 1),
(9, 'Mango Stuffed Cones', 110, 1),
(9, 'Coconut Pandan', 120, 1),
(10, 'Original Cheesecake', 130, 4),
(10, 'Devils Cheesecake', 135, 4),
(11, 'Devils Cheesecake', 135, 3),
(11, 'Mango Stuffed Cones', 110, 1),
(11, 'Banana Pudding', 110, 1),
(12, 'Original Cheesecake', 130, 4),
(12, 'Lemon Stuffed Cones', 110, 2),
(13, 'Mango Stuffed Cones', 110, 3),
(13, 'Lemon Stuffed Cones', 110, 3),
(14, 'Devils Cheesecake', 135, 3),
(14, 'Key Lime Cheesecake', 140, 3),
(15, 'Original Cheesecake', 130, 2),
(15, 'Devils Cheesecake', 135, 2),
(15, 'Key Lime Cheesecake', 140, 2),
(15, 'Glazed Waffle', 135, 2),
(15, 'Banana Pudding', 110, 1),
(16, 'Original Cheesecake', 130, 1),
(16, 'Devils Cheesecake', 135, 1),
(16, 'Key Lime Cheesecake', 140, 1),
(16, 'Raspberry Swirl', 140, 1),
(16, 'Strawberry Cheesecake', 145, 1),
(16, 'Tiramisu Cheesecake', 150, 1),
(16, 'Banana Pudding', 110, 1),
(16, 'Lemon Stuffed Cones', 110, 1),
(16, 'Mango Stuffed Cones', 110, 1),
(16, 'Coconut Pandan', 120, 1),
(16, 'Roasted Almond', 120, 1),
(16, 'Mint Choco Avocado', 120, 1),
(16, 'BlueBerry Waffle', 135, 1),
(16, 'Glazed Waffle', 135, 1),
(16, 'Ham & Cheese Waffle', 135, 1),
(16, 'Ice Cream Waffle', 130, 1),
(16, 'Sunny Side Waffle', 130, 1),
(16, 'Smores Waffle', 130, 1),
(17, 'Devils Cheesecake', 135, 1),
(17, 'Key Lime Cheesecake', 140, 1),
(17, 'Original Cheesecake', 130, 1),
(18, 'Original Cheesecake', 130, 1),
(18, 'Key Lime Cheesecake', 140, 1),
(18, 'Devils Cheesecake', 135, 1),
(19, 'Original Cheesecake', 130, 1),
(19, 'Devils Cheesecake', 135, 1),
(20, 'Devils Cheesecake', 135, 1),
(21, 'Key Lime Cheesecake', 140, 2),
(22, 'Devils Cheesecake', 135, 1),
(22, 'Key Lime Cheesecake', 140, 1),
(22, 'Original Cheesecake', 130, 1),
(23, 'Devils Cheesecake', 135, 1),
(23, 'Key Lime Cheesecake', 140, 1),
(24, 'Mango Stuffed Cones', 110, 1),
(24, 'Devils Cheesecake', 135, 1),
(25, 'Original Cheesecake', 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `waffle_product`
--

CREATE TABLE `waffle_product` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `descriptions` varchar(5000) NOT NULL,
  `modal_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waffle_product`
--

INSERT INTO `waffle_product` (`id`, `product_image`, `title`, `price`, `descriptions`, `modal_images`) VALUES
(1, 'blueberry_waffle.png', 'BlueBerry Waffle', 135, 'This waffle cone is dipped in white chocolate and rolled in Nilla Wafer cookies. It is then stuffed with a banana pudding flavored cheesecake. It is then topped with bananas and mini Nilla Wafer Cookies.', 'blueberrywaffle.png'),
(2, 'glazed_waffle.png', 'Glazed Waffle', 135, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', 'hamncheese_waffle.png'),
(3, 'hamncheese_waffle.png', 'Ham & Cheese Waffle', 135, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', ''),
(4, '', 'Smores Waffle', 130, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', ''),
(5, 'sunnyside_waffle.png', 'Sunny Side Waffle', 130, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', ''),
(6, 'icecream_waffle.png', 'Ice Cream Waffle', 130, 'This Homemade Mango Stuffed Cones is not only simple and easy to make but it is also creamy with full of flavor from the fresh mangoes.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheesecake_product`
--
ALTER TABLE `cheesecake_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuspage`
--
ALTER TABLE `contactuspage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `stuffed_product`
--
ALTER TABLE `stuffed_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- Indexes for table `waffle_product`
--
ALTER TABLE `waffle_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheesecake_product`
--
ALTER TABLE `cheesecake_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contactuspage`
--
ALTER TABLE `contactuspage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stuffed_product`
--
ALTER TABLE `stuffed_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `waffle_product`
--
ALTER TABLE `waffle_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
