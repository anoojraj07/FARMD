-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FarmD`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_farmer_detail` (IN `adhar` VARCHAR(20), IN `fn` VARCHAR(100), IN `ln` VARCHAR(100), IN `email` VARCHAR(100))  UPDATE Farmers_Deatils SET firstname=fn, lastname=ln, email=email WHERE adharuid=adhar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_farmer_land` (IN `adhar` VARCHAR(20), IN `acr` INT, IN `cent` INT, IN `fam` INT)  UPDATE Farmers_Land SET acre=acr, cents=cent, family=fam WHERE adharuid=adhar$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`mail`, `password`) VALUES
('anoojraj07@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `Application_Details`
--

CREATE TABLE `Application_Details` (
  `app_num` int(11) NOT NULL,
  `dop` date NOT NULL,
  `weed_cutter` int(11) NOT NULL,
  `sprayer` int(11) NOT NULL,
  `tiller` int(11) NOT NULL,
  `tractor` int(11) NOT NULL,
  `npk` int(11) NOT NULL,
  `bio` int(11) NOT NULL,
  `fungal` int(11) NOT NULL,
  `viral` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `acc_num` varchar(12) NOT NULL,
  `bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Application_Details`
--

INSERT INTO `Application_Details` (`app_num`, `dop`, `weed_cutter`, `sprayer`, `tiller`, `tractor`, `npk`, `bio`, `fungal`, `viral`, `total`, `acc_num`, `bill`) VALUES
(1, '2022-01-01', 20000, 20000, 20000, 50000, 30000, 20000, 10000, 10000, 180000, '1234567891', ''),
(2, '2022-01-03', 50000, 50000, 50000, 100000, 20000, 20000, 20000, 20000, 330000, '1234567892', ''),
(3, '2022-01-07', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', ''),
(5, '2022-01-07', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', ''),
(9, '2022-01-07', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', ''),
(22, '2022-01-10', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', '1.png'),
(23, '2022-01-10', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', '1.png'),
(27, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(28, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(29, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(30, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(31, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(32, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(33, '2022-01-04', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '2222222222', 'Orders.png'),
(34, '2022-01-05', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '3333333333', 'salesman.png'),
(35, '2022-01-05', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', 'salesman.png'),
(36, '2022-01-05', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '1234567891', 'salesman.png'),
(37, '2022-01-18', 30000, 30000, 40000, 69000, 4000, 4000, 6000, 6000, 189000, '7896541434', 'eyrc.png'),
(38, '2022-01-12', 20000, 20000, 20000, 20000, 4000, 4000, 4000, 4000, 96000, '7777777777', 'eyrckit.png'),
(39, '2022-01-06', 3400, 3600, 85000, 85000, 659, 5511, 753, 262, 184185, '1023759845', '1.png'),
(40, '2022-01-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, '9632587415', '4.png'),
(41, '2022-01-12', 3400, 3600, 40000, 69000, 4000, 4000, 5000, 9000, 138000, '2222222222', 'customer.png'),
(42, '2022-03-05', 23000, 25000, 28000, 29000, 5000, 5000, 14000, 14000, 143000, '1478523698', 'Screenshot from 2022-01-29 09-37-30.png');

-- --------------------------------------------------------

--
-- Table structure for table `Bank_Details`
--

CREATE TABLE `Bank_Details` (
  `adharuid` varchar(20) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `acc_num` varchar(12) NOT NULL,
  `ifsc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Bank_Details`
--

INSERT INTO `Bank_Details` (`adharuid`, `bank_name`, `acc_num`, `ifsc`) VALUES
('147852369123', 'Canara Bank', '1023759845', 'cnb000056'),
('203501018311', 'SBI', '1234567891', 'sbi0000123'),
('123456789105', 'karnataka bank', '1234567892', 'karb0000526'),
('888888888888', 'Canara Bank', '1478523698', 'vewqvw'),
('111111111111', 'Bank of Baroda', '2222222222', 'karb09'),
('333333333333', 'Canara Bank', '3333333333', 'jhjh3'),
('55555555555', 'Canara Bank', '7777777777', 'bvrwrvbw'),
('332910992223', 'Bank of Baroda', '7896541434', 'bob0000457'),
('963258741123', 'Karnataka Bank', '9632587415', 'mjk222');

-- --------------------------------------------------------

--
-- Table structure for table `Farmers_Deatils`
--

CREATE TABLE `Farmers_Deatils` (
  `adharuid` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Farmers_Deatils`
--

INSERT INTO `Farmers_Deatils` (`adharuid`, `firstname`, `lastname`, `gender`, `email`, `pass`) VALUES
('111111111111', 'nandan', 'uchila', 'MALE', 'nandan@gmail.com', '$2y$10$PKZQ3jufj02DGXNAz4P0mOcexNiISJmhJE6XG9CXEzGGKsmgpt/n6'),
('123', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$EGiXa83PJTHIZdqCdOt7GuYbA3Cb4PratdXZOp3ox0K/wseadBgG6'),
('123456789', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$q7itmryb5BMMxIZKPmcSkehNaPUQZBXixnK2iloRbUvCHQI9Jdlsu'),
('123456789105', 'nandu', 'uchu', 'FEMALE', 'nandan@gmail', '$2y$10$LK5EYSDKV8i47W8Bnb1xu.VdWO7hawyY6dt3caJvMpfxEAJ6MtGo.'),
('147852369123', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$2iwnkKTBlnoWEgf5/3ab4.nc6RF5bFcaR5qiUZeRC3e3ULcbwSl72'),
('203501018311', 'nandu', 'uchu', 'FEMALE', 'nandan@gmail', '$2y$10$WtUmMm8fjMHyaBhDzOU/MOgunmv5/bVcUXH5qx1SYBqBD2q1iqbSa'),
('332910992223', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$91bDtiHCPVVj/Y.TeGTjdu2WKIIIG.qLEuWiW.iayz02nmlivhUeu'),
('333333333333', 'nandu', 'uchu', 'FEMALE', 'nandan@gmail', '$2y$10$Bc7puABSmcHMaP02IHekQuza5GH8IM1GEH87Ggj4UzE2U7a86beJe'),
('55555555555', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$4Sl8HxgjM2HA.AQwx1G.Ae/H85R06J74mzuw.PNXnXuGmfTBH4zGK'),
('78965412302', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$Ej5vyUCJvX0KIfC3sieIXOuk8qHsDmb4yAD5Zqy8Bc10YriETUXDS'),
('888888888888', 'ganesh', 'shetty', 'MALE', 'gs@gmail.com', '$2y$10$DnyIZ.M1Ca9E1J/7it08We3ijGrCoRmZ5VP1Zma71Ei090.nRH51K'),
('963258741123', 'nandu', 'uchu', 'MALE', 'nandan@gmail', '$2y$10$YEN5jtMmCn/c4txsRB5QuewBC4lWX7XYw8Selpmctp8bVGWb46iPO');

-- --------------------------------------------------------

--
-- Table structure for table `Farmers_Land`
--

CREATE TABLE `Farmers_Land` (
  `adharuid` varchar(20) NOT NULL,
  `acre` int(11) NOT NULL,
  `cents` int(11) NOT NULL,
  `family` int(11) NOT NULL,
  `rationcard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Farmers_Land`
--

INSERT INTO `Farmers_Land` (`adharuid`, `acre`, `cents`, `family`, `rationcard`) VALUES
('123', 1, 500, 3, 3),
('111111111111', 10, 10, 10, 11111),
('123456789', 1, 5, 3, 12345),
('78965412302', 1, 1, 3, 12346),
('203501018311', 150, 1, 5, 23456),
('333333333333', 33, 33, 3, 33333),
('963258741123', 26, 12, 25, 54789),
('55555555555', 2, 400, 3, 66666),
('123456789105', 3, 400, 3, 75315),
('147852369123', 1, 78, 4, 75344),
('888888888888', 1, 10, 3, 78945),
('332910992223', 2, 2, 1, 96321);

-- --------------------------------------------------------

--
-- Table structure for table `Sanction_Details`
--

CREATE TABLE `Sanction_Details` (
  `app_num` int(11) NOT NULL,
  `acc_num` varchar(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount_sanctioned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sanction_Details`
--

INSERT INTO `Sanction_Details` (`app_num`, `acc_num`, `status`, `amount_sanctioned`) VALUES
(39, '1023759845', 'not sanctioned', 104985),
(1, '1234567891', 'not sanctioned', 113000),
(35, '1234567891', 'not sanctioned', 64000),
(36, '1234567891', 'not sanctioned', 64000),
(42, '1478523698', 'processing', 0),
(34, '3333333333', 'sanctioned', 10),
(38, '7777777777', 'sanctioned', 64000),
(37, '7896541434', 'not sanctioned', 121600),
(40, '9632587415', 'not sanctioned', 10);

--
-- Triggers `Sanction_Details`
--
DELIMITER $$
CREATE TRIGGER `sanc_trigger` BEFORE UPDATE ON `Sanction_Details` FOR EACH ROW SET new.amount_sanctioned=(SELECT (0.9*a.weed_cutter+0.8*a.sprayer+0.5*a.tiller+0.6*a.tractor+0.5*a.npk+0.9*a.bio+0.2*a.fungal+0.4*a.viral) FROM  Application_Details a WHERE a.app_num=new.app_num)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `Application_Details`
--
ALTER TABLE `Application_Details`
  ADD PRIMARY KEY (`app_num`),
  ADD KEY `acc_num` (`acc_num`);

--
-- Indexes for table `Bank_Details`
--
ALTER TABLE `Bank_Details`
  ADD PRIMARY KEY (`acc_num`),
  ADD KEY `adharuid` (`adharuid`);

--
-- Indexes for table `Farmers_Deatils`
--
ALTER TABLE `Farmers_Deatils`
  ADD PRIMARY KEY (`adharuid`);

--
-- Indexes for table `Farmers_Land`
--
ALTER TABLE `Farmers_Land`
  ADD PRIMARY KEY (`rationcard`),
  ADD KEY `adharuid` (`adharuid`);

--
-- Indexes for table `Sanction_Details`
--
ALTER TABLE `Sanction_Details`
  ADD PRIMARY KEY (`acc_num`,`app_num`),
  ADD KEY `app_num` (`app_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Application_Details`
--
ALTER TABLE `Application_Details`
  MODIFY `app_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Application_Details`
--
ALTER TABLE `Application_Details`
  ADD CONSTRAINT `Application_Details_ibfk_1` FOREIGN KEY (`acc_num`) REFERENCES `Bank_Details` (`acc_num`);

--
-- Constraints for table `Bank_Details`
--
ALTER TABLE `Bank_Details`
  ADD CONSTRAINT `Bank_Details_ibfk_1` FOREIGN KEY (`adharuid`) REFERENCES `Farmers_Deatils` (`adharuid`);

--
-- Constraints for table `Farmers_Land`
--
ALTER TABLE `Farmers_Land`
  ADD CONSTRAINT `Farmers_Land_ibfk_1` FOREIGN KEY (`adharuid`) REFERENCES `Farmers_Deatils` (`adharuid`);

--
-- Constraints for table `Sanction_Details`
--
ALTER TABLE `Sanction_Details`
  ADD CONSTRAINT `Sanction_Details_ibfk_1` FOREIGN KEY (`app_num`) REFERENCES `Application_Details` (`app_num`),
  ADD CONSTRAINT `Sanction_Details_ibfk_2` FOREIGN KEY (`acc_num`) REFERENCES `Bank_Details` (`acc_num`),
  ADD CONSTRAINT `Sanction_Details_ibfk_3` FOREIGN KEY (`acc_num`) REFERENCES `Bank_Details` (`acc_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
