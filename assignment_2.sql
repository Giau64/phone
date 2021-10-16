-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 05:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(100) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Description`) VALUES
('AC01', 'Acer laptop', 'Acer products'),
('AP01', 'iPhone', 'Apple products'),
('AP02', 'iPad', 'Apple products'),
('AP03', 'MacBook', 'Apple products'),
('AP04', 'AirPod', 'Apple products'),
('AP05', 'Apple Watch', 'Apple products'),
('AS01', 'Asus laptop', 'Asus product'),
('DE01', 'Dell laptop', 'Dell products'),
('HE01', 'Headphone', 'Headphone'),
('HP01', 'Laptop HP', 'HP products'),
('HU01', 'Huawei mobile', 'Huawei products'),
('HU02', 'Huawei tablet', 'Huawei products'),
('LE01', 'Lenovo products', 'Lenovo products'),
('OP01', 'OPPO mobile', 'OPPO products'),
('PO01', 'Power Bank', 'Power Bank'),
('PRO01', 'Promotional', 'Discount products'),
('SE01', 'Second-hand products', 'Second-hand products'),
('SP01', 'Speaker', 'Speaker'),
('SS01', 'Samsung mobile', 'Samsung products'),
('SS02', 'Samsung tablet', 'Samsung products');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `state` int(1) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `tel`, `address`, `state`, `firstname`, `lastname`) VALUES
('admin123@gmail.com', 'e6e061838856bf47e1de730719fb2609', '0706667675', 'Can Tho city', 1, 'Ad', 'Min'),
('phat123@gmail.com', '4297f44b13955235245b2497399d7a93', '0706667675', 'fsfsdfdf', 0, 'asdasd', 'asdas'),
('phat@gmail.com', '4297f44b13955235245b2497399d7a93', '0707777777', 'Ninh kieu', 0, 'phat', 'tran'),
('phattran2207@gmail.com', '4297f44b13955235245b2497399d7a93', '0706667675', 'An Giang', 0, 'Tran', 'Phat'),
('spadmin123@gmail.com', 'e6e061838856bf47e1de730719fb2609', '0123123123', 'Can Tho', 1, 'Ad', 'Min');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_ID` varchar(10) NOT NULL,
  `Pro_Name` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Cat_ID` varchar(10) NOT NULL,
  `Image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_ID`, `Pro_Name`, `Qty`, `Price`, `Description`, `Cat_ID`, `Image`) VALUES
('APP', 'AirPods Pro Apple MWP22', 200, 5990000, 'Product introduction Compact design, easy to carry anywhere AirPods Pro with a neat, beautiful and sophisticated design, the headset is designed in the form of In-ear instead of Earbuds like AirPods 2, allowing better noise resistance, difficult to drop when worn and quieter.', 'AP04', 'airpodpro.jpg'),
('IP11', 'iPhone 11 128GB Authorised', 20, 17200000, 'iPhone 11 still owns a bezel-less design with a \"rabbit ears\" like the iPhone X. The top and bottom bezels have also been narrowed down to maximize screen use. Along with that, the 4 corners of the machine are also lightly rounded to create a solid feeling when held in the hand. The back of iPhone 11 is made of glass material, so it is very luxurious and delicate. Unlike previous iPhone series, this product will have 6 colors in silver, gold, green, white, black red.  Retina LCD technology provides the best quality. The screen resolution of 1125 x 2436 pixels renders accurate colors and produces sharp images. The 6.1-inch wide screen helps users comfortably experience watching movies, surfing the web ... Especially Apple has equipped with a scanning frequency from 90 to 120 Hz with 463 color points.', 'AP01', 'iphone11normal.jpg'),
('IP12', 'iPhone 12 Pro Max 128GB', 4, 28990000, 'Big screen super sharp. Luxurious square design iPhone 12 Pro Max officially became the iPhone with the largest screen up to now. You will experience stunning visuals on this 6.7 inch Super Retina XDR display. The screen bezel and the notch has been slimmed down to optimize the display space. The iPhone 12 Pro Max panel supports HDR10 standard with a maximum brightness of up to 1200 nits. The screen of the device is protected by the Ceremic Shield tempered glass for 4 times the durability of the previous generation. Holding iPhone 12 Pro Max in hand will definitely attract all eyes thanks to its ultra-luxurious design. The edge of the machine is made from shiny stainless steel material, painted on a scratch-resistant coating. The back of the machine continues to be roughened to enhance grip without sacrificing its premium look. Users will have 4 color options including silver, graphite gray, gold and deep blue.', 'AP01', 'iphone12promax.jpeg'),
('MAC01', 'Apple Macbook Pro 2020', 5, 42990000, 'The 512 GB MacBook Pro Touch 2020 i5 (MWP72SA / A) offers upgrades in performance and portability. Gives you the creative freedom with its powerful processor, advanced graphics, and ultimate security. Upgrade to 10th generation CPU, impressive graphics power The 10th generation Intel Core i5 processor combined with the powerful new integrated Iris Plus graphics card delivers up to 80% faster graphics performance compared to the previous generation.  You can edit videos easily and play games smoother. The machine also impresses with the ability to connect to XDR Pro Display up to 6K resolution.', 'AP03', 'macbookpro2020.jpg'),
('RENO5', 'OPPO Reno5', 10, 7990000, 'Dual exposure video Create movies art portrait With unique image overlapping effects, OPPO Reno5 camera will help you create double exposure movies, increasing the artistry and emotion in each story you want to tell. Dual display video Double the perspective - Double the fun A brand new feature on Reno5 allows to display both front and rear camera images simultaneously, helping to capture every exciting moment.', 'OP01', 'opporeno5.jpg'),
('SS20', 'Samsung Galaxy Note 20 Ultra', 2, 21590000, 'After the Galaxy Note 20, the Galaxy Note 20 Ultra is a more advanced version of Samsung Note 20 Series line, with many changes, from the camera cluster that supports AF laser focus and the new wide-angle lens, the screen overflow. up to 6.9 inches. 2K + Dynamic AMOLED 2X screen with perfect bezel, trendy design. The maximum edge-to-edge display, inheriting features from previous generations, Dynamic AMOLED 2X display technology for cinematic accurate color gamut for you to experience true movies on your smartphone. In addition, by minimizing harmful blue light, Dynamic AMOLED 2X also helps to reduce eye fatigue to help optimize the user experience.', 'SS01', 'ssgalaxynote20ultra.jpg'),
('SSPB1', 'Samsung Power Bank EB-P3300X', 100, 990000, 'Genuine 25W Samsung EB-P3300X 10,000mAh Backup Charger, Original Seal, Genuine Warranty (Up to 25W Super Fast Charging): Product information: - Product Code: EB-P3300XJEGWW - Made in HOCHUEN - Production year: 2020 * Backup battery SamSung EB-P3300X - Large capacity, support 25W fast charging: In order to provide a durable and fast charging capacity with large battery capacity. Samsung has launched a backup charger product, the SamSung EB-P3300X 10,000 mAh rechargeable battery genuine 25W fast charging with many technologies to ensure safety and super fast charging capabilities.', 'OP01', 'sspowerbank.jpg'),
('SSTABS7', 'Samsung Galaxy Tab S7 Plus 12.4inch', 5, 19990000, 'The Breakthrough Generation of Galaxy Tab Completely Transforms The Way You Work And Play  Galaxy Tab S7 and S7 + - Super powerful tablet, optimized for productivity and life. Experience authentic, natural writing or drawing on the new S Pen thanks to its slim tip design and maximum sensitivity. Immerse yourself in vivid, smooth frames at 120Hz refresh rate. Combines perfectly with a detachable keyboard to quickly transform into a compact, convenient, yet powerful computer.', 'SS02', 'sstabs7+.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
