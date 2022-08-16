-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 09:59 PM
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
-- Database: `pharmacy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(55) DEFAULT NULL,
  `contact_number` varchar(55) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `n_invoices` int(10) DEFAULT NULL,
  `pharma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `contact_number`, `email`, `n_invoices`, `pharma_id`) VALUES
('Asmaa Hany', '10564545', 'Asmaa@email.com', 14, 1),
('Emad Mostafa', '11564444', 'Emad@email.com', 22, 1),
('Merna Mustafa', '12564545', 'Merna@email.com', 11, 1),
('Kareem Adel', '1264844', 'Kareem@email.com', 10, 1),
('Ahmed Hossam', '12648454', 'Ahmed@email.com', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pharma_id` int(11) NOT NULL,
  `plan_type` varchar(10) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharma`
--

CREATE TABLE `pharma` (
  `pharma_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `contact_number` varchar(55) DEFAULT NULL,
  `subscriped` int(1) DEFAULT NULL,
  `pharma_name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharma`
--

INSERT INTO `pharma` (`pharma_id`, `address`, `city`, `country`, `email`, `contact_number`, `subscriped`, `pharma_name`) VALUES
(1, 'El-Zamalek', 'Cairo', 'Egypt', 'Youssefpharma@email.com', '225122643', 1, 'Youssef\'s Pharmacy'),
(2, 'Dokki', 'Cairo', 'Egypt', 'Salmapharma@email.com', '225524672', 1, 'Salma\'s Pharmacy'),
(3, 'Fesal', 'Geza', 'Egypt', 'Saadpharma@email.com', '224112510', 1, 'Saad\'s Pharmacy'),
(4, 'El-Mohndseen', 'Cairo', 'Egypt', 'Radwanpharma@email.com', '223135643', 1, 'Radwan\'s Pharmacy'),
(5, 'Ramses', 'Cairo', 'Egypt', 'Ziadpharma@email.com', '225222443', 1, 'Ziad\'s Pharmacy'),
(6, 'October', 'Cairo', 'Egypt', 'Moatazpharma@email.com', '225122613', 1, 'Moataz\'s Pharmacy'),
(7, 'El-Sheikh Zayed', 'October', 'Egypt', 'Omarpharma@email.com', '222122543', 1, 'Omar\'s Pharmacy'),
(8, 'Fesal', 'Cairo', 'Egypt', 'Wagdypharma@email.com', '225122243', 1, 'Wagdy\'s Pharmacy'),
(9, 'Ahmed Maher', 'Geza', 'Egypt', 'Marwanpharma@email.com', '226722643', 1, 'Marwan\'s Pharmacy'),
(10, 'ElSayeda Zeinab', 'Cairo', 'Egypt', 'Kareempharma@email.com', '225125243', 1, 'Kareem\'s Pharmacy'),
(11, 'Tahrer', 'Cairo', 'Egypt', 'Emanpharma@email.com', '227122643', 1, 'Eman\'s Pharmacy'),
(12, 'El-Maneal', 'Cairo', 'Egypt', 'Eslampharma@email.com', '225124143', 1, 'Eslam\'s Pharmacy'),
(13, 'Shobra', 'Cairo', 'Egypt', 'Mayarpharma@email.com', '225124643', 1, 'Mayar\'s Pharmacy'),
(14, 'Helwan', 'Helwan', 'Egypt', 'Magedpharma@email.com', '221122643', 1, 'Maged\'s Pharmacy'),
(15, 'Rasmes', 'Cairo', 'Egypt', 'Sarapharma@email.com', '225122643', 1, 'Sara\'s Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `batch_num` varchar(55) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `pharma_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`batch_num`, `name`, `price`, `expiry_date`, `pharma_id`, `quantity`) VALUES
('22222', 'Panadol', 3, '2022-09-09', 1, 73),
('33333', 'Prophine', 7, '2023-02-03', 1, 65),
('11111', 'aspirin', 5, '2022-12-11', 10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `product_batch` varchar(55) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `supplier_name` varchar(55) DEFAULT NULL,
  `pharma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `pharmacist_name` varchar(55) DEFAULT NULL,
  `customer_phone_number` varchar(55) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `sales_time` time DEFAULT NULL,
  `pharma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `pharmacist_name`, `customer_phone_number`, `total_amount`, `sales_date`, `sales_time`, `pharma_id`) VALUES
(28, 'Youssef_Atef', '10564545', 15, '2022-06-27', '12:13:20', 1),
(29, 'Youssef_Atef', 'hesham@email.com', 19, '2022-06-27', '12:14:24', 1),
(30, 'Youssef_Atef', '1264844', 21, '2022-06-27', '12:14:41', 1),
(31, 'Youssef_Atef', '12648454', 34, '2022-06-27', '12:14:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `name` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `contact_number` varchar(55) NOT NULL,
  `pharma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`name`, `email`, `contact_number`, `pharma_id`) VALUES
('HeshamCo.', 'heshamCo@email.com', '12553122', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) DEFAULT NULL,
  `pharma_id` int(11) NOT NULL,
  `isAdmin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `pharma_id`, `isAdmin`) VALUES
('Hossam_Ashraf', 'Fwdsfwe4f', 1, 0),
('Sarah_Kareem', 'Fw4eFwe', 1, 0),
('Youssef_Atef', '2fea21fa', 1, 1),
('Basant_Mohammed', '3ger5wef', 2, 0),
('Kareem_Medhat', '2ew5fEd', 2, 0),
('Salma_Emad', 'we554fw', 2, 1),
('Ahemd_Saad', '542dq5dqw', 3, 1),
('Ayman_Mostafa', 'dqhwgdqw', 3, 0),
('Enjy_Samir', 'ddwqgwq', 3, 0),
('Gasser_Amr', 'qwdgkqwd', 4, 0),
('Omar_Radwan', '552qwdwq', 4, 1),
('Youssef_Morsy', 'jdbqwdj', 4, 0),
('Bassel_Sherif', '3e5f3qwd', 5, 0),
('Perihan_Hessuin', 'jdqwd45wd', 5, 0),
('Ziad_Tarek', '545qwd54', 5, 1),
('Menna_Ahmed', 'dhdw233e', 6, 0),
('Moataz_Abelrahman', 'wdq64dqwd5', 6, 1),
('Yahia_Youssry', 'hj32gej23', 6, 0),
('Ahmed_Ali', '32hk2j1', 7, 0),
('Manar_Hatem', '4jkl532', 7, 0),
('Omar_Tamer', 'oj43hi1', 7, 1),
('Ahmed_Ayman', '4k23l5b2', 8, 0),
('Omar_Khaled', '6k6435', 8, 0),
('Wagdy_Mohammed', 'b4k23ln4', 8, 1),
('Marwan_Ahmed', 'dakfdq2e1', 9, 1),
('Toqaa_Tarek', '214lkn124', 9, 0),
('Zeina_Mohammed', 'h4j2kb3', 9, 0),
('Habiba_Yasser', '2hbjk4l3', 10, 0),
('Hesham_Amr', 'jkf12e214', 10, 0),
('Kareem_Shokry', '423h4k35ln', 10, 1),
('Eman_Ibrahim', '3jk423n', 11, 1),
('Omar_Ashraf', 'k63l5m2', 11, 0),
('Salah_Nasr', 'jbk2l43', 11, 0),
('Ali_Reda', '7jk463l5', 12, 0),
('Eslam_Fathi', '52bj3lk1', 12, 1),
('Salwa_Khaked', 'vh6bj5nk', 12, 0),
('Mayar_Magdy', '7vb64n53', 13, 1),
('Menna_Ahmed', '64nkm35l2', 13, 0),
('Mohaned_Emad', 'n35243', 13, 0),
('Maged_Salah', 'vj5342nk', 14, 1),
('Samir_Nasr', 'tyu3iu42', 14, 0),
('Shokry_Abdelmohsen', '65h4jknl3', 14, 0),
('Enjy_Omar', 'h4j3knl2', 15, 0),
('Malek_Ali', 'h54bjk3', 15, 0),
('Sara_Youssef', 'v6hbjknl', 15, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`pharma_id`,`contact_number`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pharma_id`,`payment_date`);

--
-- Indexes for table `pharma`
--
ALTER TABLE `pharma`
  ADD PRIMARY KEY (`pharma_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pharma_id`,`batch_num`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `pharma_id` (`pharma_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `pharma_id` (`pharma_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`pharma_id`,`contact_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pharma_id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pharma`
--
ALTER TABLE `pharma`
  MODIFY `pharma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pharma_id`) REFERENCES `pharma` (`pharma_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
