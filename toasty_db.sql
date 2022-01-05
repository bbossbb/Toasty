-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 05:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toasty_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_item` (IN `pro_id` INT(11), IN `pro_price` DECIMAL(65,2), IN `pro_quan` INT(11))  BEGIN

UPDATE product SET productid = pro_id , productprice=pro_price,pquantity = pro_quan where productid = pro_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressid` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `addresshouse` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressid`, `userid`, `addresshouse`, `city`, `country`, `postcode`) VALUES
('03', '314859261', '1235', 'Hatyai', 'Thailand', '66581'),
('03488441178', '77698921498114361', '99', 'Kukot', 'Thailand', '12130'),
('0508323591349', '543830199496', '22', 'Chiang Mai', 'Thailand', '99852'),
('06323942585', '84916111408', '123456', 'Kukot', 'Thailand', '12130'),
('06618838562896877246', '63969027', '45', 'Bangkok', 'Thailand', '10110'),
('122823', '5537321831279793906', '66', 'China', 'Chinese', '12312'),
('122948800678', '9998884287489969', '22222', 'Beijing', 'Hongkong', '12322'),
('151140098', '4495065', '600/1230', 'Kukot', 'Thailand', '12130'),
('16', '92062793114651022620', '99', 'Kukot', 'Thailand', '12130'),
('18017377817', '866288838727', '12345', 'Buriram', 'Thailand', '45345'),
('2297470185151733984', '9017847122144031636', '69', 'Korat', 'Thailand', '67505'),
('27970350146208', '71295130727807885', '79', 'Nonthaburi', 'Thailand', '55417'),
('28801588892992309054', '2590', '2131', 'KongNan', 'China', '90993'),
('29', '45909494511268386', '1231312', 'Beijing', 'China', '23232'),
('3214456054276884', '2068', '56', 'Mahidol', 'Thailand', '55666'),
('35673384896278851', '71431701', '99', 'Bangkok', 'Soap', '12334'),
('43381862145020', '10297531450144774', '123', 'Kukot', 'Thailand', '12130'),
('458247236240', '3817579391', '123', 'Hongkong', 'Sydney', '23232'),
('47040517533', '443637641', '99', 'Kukot', 'Thailand', '12130'),
('573957897900784787', '430088150', '66', 'ลำลูกกา', 'Japan', '12130'),
('624840217635979', '131609255954117394', '99', 'Beijing', 'Thailand', '12130'),
('635467', '29', '44444', 'Alert', 'Test', '12312'),
('64', '159668123', '2222', 'Tokyo', 'Japan', '39486'),
('67480484016180196', '12120869024600323939', '99', 'Lumka', 'Thailand', '12130'),
('6805698975636874', '835146226321653123', '11', 'Hatyai', 'Thailand', '53454'),
('689580407129980', '92641763408', '66', 'Kukot', 'Thailand', '12130'),
('7162538412', '711371', '99', 'Taiguaren', 'China', '02022'),
('722', '30354917', '66', 'Hongkong', 'Hongkong', '12121'),
('7320253125', '20644307027824', '235', 'Bangkok', 'Thailand', '10001'),
('74141036325957629983', '1174788729148', '61', 'Patumthani', 'Thailand', '12140'),
('874026390086573', '034315037894525', '555', 'Bangkok', 'Thailand', '10020'),
('876980', '34334792847971', '55', 'Patumthani', 'Thailand', '11025'),
('9253779785', '5059', '66', 'Patumthani', 'Thailand', '12135'),
('9561842', '9278044399359', '1230', 'Kukot', 'Hongkong', '12121'),
('99914910392686216532', '15481477882', '99', 'Beijing', 'China', '12312');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Kijwipat', 'Thanasittichai');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billingid` varchar(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `shipmenttypeid` varchar(11) NOT NULL,
  `ordernote` varchar(100) NOT NULL,
  `deliverydate` varchar(11) NOT NULL,
  `timeslotid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billingid`, `orderid`, `shipmenttypeid`, `ordernote`, `deliverydate`, `timeslotid`) VALUES
('146', '11762785052', '2', 'Dear, Ms css326', '01/13/2022', '2'),
('16435324619', '896009179', '1', 'tEST', '10/14/2021', '1'),
('19219227', '963013931131625505', '1', 'TEST4', '10/07/2021', '1'),
('2033', '939825926378031974', '1', 'TEST DELETE ADDRESS', '10/04/2021', '1'),
('20853713710', '41891086240487', '1', 'TEST4', '10/07/2021', '1'),
('24596747831', '166507340890499', '1', '', '', '1'),
('24886189703', '998607', '1', '', '', '1'),
('2584', '40448776226313', '1', 'TEST', '', '1'),
('456', '4750148419747', '1', 'Happy Birth Day !', '10/06/2021', '1'),
('49538544751', '29278885', '2', 'TEST css325 Present', '12/10/2021', '1'),
('547722', '122818147235801', '1', 'TEST QUANTITY', '10/13/2021', '1'),
('55668', '18467429010197699507', '1', 'TEST', '10/11/2021', '1'),
('579', '2908220', '1', 'Dear, Css326', '11/13/2021', '1'),
('58206373182', '746589', '1', 'TEST', '10/14/2021', '1'),
('59786418', '307099376', '2', 'Dear, Nick .... HAPPY BIRTHDAY', '11/30/2021', '3'),
('6774679030', '15', '1', 'tEST', '10/14/2021', '1'),
('709300410', '375889271', '1', 'TEST Security', '10/21/2021', '1'),
('748248361', '78964', '1', 'TEST QUANTITY 2', '10/02/2021', '1'),
('75118343218', '742392', '1', 'Dear, Mrs Saung ', '11/26/2021', '2'),
('77818146444', '8184439808', '2', 'Dear, Jinyi Chen', '11/21/2021', '2'),
('80410161242', '8249322883', '1', 'test', '10/14/2021', '2'),
('83236715870', '8832565', '1', 'test', '10/14/2021', '2'),
('84017563539', '454027497266594', '1', 'Please Deliver ASAP!', '12/17/2021', '1'),
('845245627', '78765185299', '2', 'TEST VIDEO', '11/18/2021', '2'),
('87128858613', '8259479', '3', 'Hi Youtube', '11/18/2021', '2'),
('92828079', '341', '2', 'Dear, css325', '12/17/2021', '2'),
('95375062530', '20314319961417683910', '1', 'TEST COUNT QUANTTIY', '11/19/2021', '1'),
('963187', '296710634191133799', '1', 'TEST7', '10/04/2021', '1'),
('99659', '5886729960', '1', 'Dear css326', '11/25/2021', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userid` varchar(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userid`, `productid`, `quantity`, `price`) VALUES
('92641763408', 3, 1, '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `userid`, `name`, `email`, `phone`, `message`) VALUES
(2, '84916111408', 'Kijwipat Thanasittichai', 'bbbbkwp@gmail.com', '0970078341', 'TEST'),
(4, '84916111408', 'Kijwipat Thanasittichai', 'bbbbkwp@gmail.com', '0970078341', 'TEST ER'),
(5, '835146226321653123', 'Kijwipat Thanasittichai', 'bbbbkwp@gmail.com', '0970078341', 'TEST ER 2'),
(7, '5537321831279793906', 'CSS326', 'Programming@gmail.com', '098108390', 'Hi Google'),
(8, '45909494511268386', 'Kijwipat Thanasittichai', 'bbbbkwp@gmail.com', '0978989232', 'TEST FOR VIDEO '),
(12, '92062793114651022620', 'Kijwipat Thanasittichai', 'bbbbkwp@gmail.com', '0970078341', 'Dear, Staff');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `paymentid` varchar(100) NOT NULL,
  `staffid` varchar(11) NOT NULL,
  `totalprice` decimal(65,2) NOT NULL,
  `paymentstatus` varchar(50) NOT NULL,
  `ordertime` datetime DEFAULT NULL,
  `billingid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `userid`, `paymentid`, `staffid`, `totalprice`, `paymentstatus`, `ordertime`, `billingid`) VALUES
('11762785052', '45909494511268386', '83023160754', '1', '525.00', '1', '2021-11-20 23:02:35', '146'),
('122818147235801', '84916111408', '6834992492924493727', '1', '1800.00', '1', '2021-11-19 00:58:54', '547722'),
('15', '84916111408', '8102636', '1', '300.00', '1', '2021-11-22 11:00:47', '6774679030'),
('166507340890499', '84916111408', '10392017019668007', '1', '300.00', '1', '2021-11-22 10:58:21', '24596747831'),
('18467429010197699507', '84916111408', '545185', '1', '400.00', '1', '2021-11-18 22:15:30', '55668'),
('20314319961417683910', '84916111408', '3301329740871589895', '1', '300.00', '1', '2021-11-19 19:52:41', '95375062530'),
('232090373795', '84916111408', '461236410054620487', '1', '400.00', '1', '2021-11-22 10:54:42', '21155875931'),
('2908220', '131609255954117394', '28060666240529891', '1', '600.00', '0', '2021-11-23 22:36:11', '579'),
('29278885', '92062793114651022620', '95194326715898495', '1', '330.00', '0', '2021-11-24 10:26:57', '49538544751'),
('296710634191133799', '84916111408', '5150', '1', '650.00', '1', '2021-11-18 22:52:55', '963187'),
('307099376', '430088150', '5247986', '1', '1830.00', '0', '2021-11-23 22:45:15', '59786418'),
('341', '92641763408', '13680', '1', '220.00', '0', '2021-11-23 18:52:57', '92828079'),
('375889271', '711371', '34702449', '1', '800.00', '0', '2021-11-19 23:55:46', '709300410'),
('404093719', '84916111408', '19', '1', '300.00', '0', '2021-11-22 10:56:16', '80652372386'),
('40448776226313', '84916111408', '14721115', '1', '300.00', '0', '2021-11-22 10:59:26', '2584'),
('41891086240487', '84916111408', '760628128', '1', '400.00', '0', '2021-11-18 22:43:45', '20853713710'),
('454027497266594', '84916111408', '5362782', '1', '534.00', '0', '2021-11-19 19:49:54', '84017563539'),
('46239407', '84916111408', '47', '1', '300.00', '0', '2021-11-22 10:56:02', '82361717647'),
('4750148419747', '84916111408', '831537', '1', '550.00', '0', '2021-11-23 12:42:28', '456'),
('5886729960', '10297531450144774', '22156595010617717845', '1', '900.00', '0', '2021-11-20 22:09:24', '99659'),
('742392', '15481477882', '3784', '1', '550.00', '0', '2021-11-20 22:02:51', '75118343218'),
('746589', '84916111408', '6687415098206054', '1', '600.00', '0', '2021-11-18 14:11:19', '58206373182'),
('78765185299', '5537321831279793906', '67900', '1', '1200.00', '0', '2021-11-20 22:44:13', '845245627'),
('78964', '84916111408', '76621326', '1', '200.00', '0', '2021-11-19 00:59:27', '748248361'),
('8184439808', '543830199496', '523885128421973153', '1', '1160.00', '0', '2021-11-21 00:00:04', '77818146444'),
('8249322883', '84916111408', '937024958027653120', '1', '300.00', '0', '2021-11-22 10:57:13', '80410161242'),
('8259479', '9017847122144031636', '962109', '1', '500.00', '0', '2021-11-20 18:23:47', '87128858613'),
('8832565', '84916111408', '69933122347138', '1', '300.00', '0', '2021-11-22 10:57:24', '83236715870'),
('896009179', '84916111408', '373688356589383', '1', '300.00', '0', '2021-11-22 11:00:57', '16435324619'),
('939825926378031974', '84916111408', '43662195603265', '1', '300.00', '0', '2021-11-19 17:11:58', '2033'),
('963013931131625505', '84916111408', '241406568', '1', '400.00', '1', '2021-11-18 22:43:34', '19219227'),
('998607', '84916111408', '82329382', '1', '300.00', '0', '2021-11-22 10:57:44', '24886189703');

-- --------------------------------------------------------

--
-- Table structure for table `order_product_detail`
--

CREATE TABLE `order_product_detail` (
  `orderpdid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `productprice` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product_detail`
--

INSERT INTO `order_product_detail` (`orderpdid`, `orderid`, `userid`, `productid`, `productname`, `pquantity`, `productprice`) VALUES
(65, '746589', '84916111408', 3, 'Sunflower Flax Loaf', 2, '600.00'),
(66, '18467429010197699507', '84916111408', 2, 'SourDough Vienna', 2, '400.00'),
(67, '963013931131625505', '84916111408', 2, 'SourDough Vienna', 2, '400.00'),
(68, '41891086240487', '84916111408', 2, 'SourDough Vienna', 2, '400.00'),
(69, '296710634191133799', '84916111408', 5, 'Bagel', 1, '250.00'),
(70, '296710634191133799', '84916111408', 2, 'SourDough Vienna', 2, '400.00'),
(71, '122818147235801', '84916111408', 3, 'Sunflower Flax Loaf', 6, '1800.00'),
(72, '78964', '84916111408', 2, 'SourDough Vienna', 1, '200.00'),
(73, '939825926378031974', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(74, '454027497266594', '84916111408', 2, 'SourDough Vienna', 1, '200.00'),
(75, '454027497266594', '84916111408', 4, 'Baguette', 1, '250.00'),
(76, '454027497266594', '84916111408', 22, 'Chocolate Raspberry Croissant', 1, '84.00'),
(77, '20314319961417683910', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(78, '375889271', '711371', 3, 'Sunflower Flax Loaf', 2, '600.00'),
(79, '375889271', '711371', 2, 'SourDough Vienna', 1, '200.00'),
(80, '8259479', '9017847122144031636', 4, 'Baguette', 2, '500.00'),
(81, '742392', '15481477882', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(82, '742392', '15481477882', 4, 'Baguette', 1, '250.00'),
(83, '5886729960', '10297531450144774', 3, 'Sunflower Flax Loaf', 3, '900.00'),
(84, '78765185299', '5537321831279793906', 1, 'Cape Loaf Seed', 3, '900.00'),
(85, '78765185299', '5537321831279793906', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(86, '11762785052', '45909494511268386', 14, 'Pain Simit', 3, '525.00'),
(87, '8184439808', '543830199496', 10, 'Brownie Chocolate', 6, '480.00'),
(88, '8184439808', '543830199496', 19, 'Premium Butter Croissant', 1, '80.00'),
(89, '8184439808', '543830199496', 1, 'Cape Loaf Seed', 1, '300.00'),
(90, '8184439808', '543830199496', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(93, '232090373795', '84916111408', 2, 'SourDough Vienna', 2, '400.00'),
(94, '46239407', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(95, '404093719', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(96, '8249322883', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(97, '8832565', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(98, '998607', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(99, '166507340890499', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(100, '40448776226313', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(101, '15', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(102, '896009179', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(103, '4750148419747', '84916111408', 3, 'Sunflower Flax Loaf', 1, '300.00'),
(104, '4750148419747', '84916111408', 4, 'Baguette', 1, '250.00'),
(105, '341', '92641763408', 10, 'Brownie Chocolate', 1, '80.00'),
(106, '341', '92641763408', 8, 'Custard Danish', 1, '60.00'),
(107, '341', '92641763408', 9, 'Challah Bread', 1, '80.00'),
(108, '2908220', '131609255954117394', 3, 'Sunflower Flax Loaf', 2, '600.00'),
(109, '307099376', '430088150', 12, 'Chocolate Cake', 1, '800.00'),
(110, '307099376', '430088150', 2, 'SourDough Vienna', 2, '400.00'),
(111, '307099376', '430088150', 10, 'Brownie Chocolate', 1, '80.00'),
(112, '307099376', '430088150', 13, 'Brownie Chocolate Cake', 1, '100.00'),
(113, '307099376', '430088150', 6, 'Mini Apple Licious', 3, '450.00'),
(114, '29278885', '92062793114651022620', 4, 'Baguette', 1, '250.00'),
(115, '29278885', '92062793114651022620', 9, 'Challah Bread', 1, '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` varchar(100) NOT NULL,
  `paymenttypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `paymenttypeid`) VALUES
('13680', 1),
('19', 1),
('241406568', 1),
('373688356589383', 1),
('47', 1),
('5150', 1),
('523885128421973153', 1),
('5247986', 1),
('5362782', 1),
('545185', 1),
('6111', 1),
('67900', 1),
('760628128', 1),
('8102636', 1),
('85160997775', 1),
('962109', 1),
('10392017019668007', 2),
('14721115', 2),
('22156595010617717845', 2),
('28060666240529891', 2),
('3301329740871589895', 2),
('34702449', 2),
('3784', 2),
('43662195603265', 2),
('461236410054620487', 2),
('6498128', 2),
('6687415098206054', 2),
('6834992492924493727', 2),
('69933122347138', 2),
('76621326', 2),
('82329382', 2),
('83023160754', 2),
('831537', 2),
('8641815', 2),
('937024958027653120', 2),
('95194326715898495', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE `paymenttype` (
  `paymenttypeid` int(11) NOT NULL,
  `paymenttype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenttype`
--

INSERT INTO `paymenttype` (`paymenttypeid`, `paymenttype`) VALUES
(1, 'Direct Bank Transfer'),
(2, 'Credit / Debit Card'),
(3, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productprice` decimal(65,2) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `productprice`, `pquantity`, `image`) VALUES
(1, 'Cape Loaf Seed', '300.00', 30, 'img/product/1.png'),
(2, 'SourDough Vienna', '200.00', 50, 'img/product/2.png'),
(3, 'Sunflower Flax Loaf', '300.00', 9, 'img/product/3.png'),
(4, 'Baguette', '250.00', 8, 'img/product/4.png'),
(5, 'Bagel', '250.00', 10, 'img/product/5.png'),
(6, 'Mini Apple Licious', '150.00', 7, 'img/product/6.png'),
(7, 'Custard Bunlet', '80.00', 10, 'img/product/7.png'),
(8, 'Custard Danish', '60.00', 9, 'img/product/8.png'),
(9, 'Challah Bread', '80.00', 8, 'img/product/9.png'),
(10, 'Brownie Chocolate', '80.00', 2, 'img/product/10.png'),
(11, 'White Bread Flour', '80.00', 10, 'img/product/11.png'),
(12, 'Chocolate Cake', '800.00', 8, 'img/product/12.png'),
(13, 'Brownie Chocolate Cake', '100.00', 9, 'img/product/13.png'),
(14, 'Pain Simit', '175.00', 9, 'img/product/23.png'),
(15, 'Toasty Original Cracker', '105.00', 10, 'img/product/39.png'),
(16, 'Premium Chocolate Croissant', '100.00', 10, 'img/product/24.png'),
(17, 'Original Pretzel', '60.00', 10, 'img/product/38.png'),
(18, 'Panini Bread', '250.00', 10, 'img/product/41.png'),
(19, 'Premium Butter Croissant', '80.00', 9, 'img/product/22.png'),
(20, 'Donut Cake', '140.00', 10, 'img/product/25.png'),
(21, 'Chocolate Crepe Cake', '120.00', 10, 'img/product/31.png'),
(22, 'Chocolate Raspberry Croissant', '84.00', 9, 'img/product/17.png');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `check_stock` BEFORE UPDATE ON `product` FOR EACH ROW BEGIN
     IF (NEW.pquantity <= 2) THEN
       SET @error = 'Low Instock Items';
     ELSEIF(NEW.pquantity > 100) THEN
    SET @error = 'Over Instock Items';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shipmenttype`
--

CREATE TABLE `shipmenttype` (
  `shipmenttypeid` varchar(11) NOT NULL,
  `shipmenttype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipmenttype`
--

INSERT INTO `shipmenttype` (`shipmenttypeid`, `shipmenttype`) VALUES
('1', 'Kerry'),
('2', 'Grab'),
('3', 'Pick-up');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(11) NOT NULL,
  `staff_rank` varchar(100) NOT NULL,
  `staff_fname` varchar(100) NOT NULL,
  `staff_lname` varchar(100) NOT NULL,
  `staff_username` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_salary` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staff_rank`, `staff_fname`, `staff_lname`, `staff_username`, `staff_password`, `staff_salary`) VALUES
('1', 'MANAGER', 'Kijwipat', 'Thanasittichai', 'bbossbb', '827ccb0eea8a706c4c34a16891f84e7b', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeslotid` varchar(11) NOT NULL,
  `timeslot` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeslotid`, `timeslot`) VALUES
('1', '10:00-12:00'),
('2', '13:00-14:00'),
('3', '15:00-17:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `addressid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `addressid`, `username`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(37, '034315037894525', '874026390086573', 'nenesimp', 'Warat', 'Tantiviriyagul', 'genelab@gmail.com', '0800736566', '827ccb0eea8a706c4c34a16891f84e7b'),
(57, '10297531450144774', '43381862145020', 'kijwipat1', 'Kijwipat', 'Thanasittichai', 'bbossbb11@outlook.co.th', '090989922', '827ccb0eea8a706c4c34a16891f84e7b'),
(31, '1174788729148', '74141036325957629983', 'billgiss01', 'Sirinada', 'Sanprasert', 'billgiss1@gmail.com', '0981049104', '827ccb0eea8a706c4c34a16891f84e7b'),
(55, '12120869024600323939', '67480484016180196', 'admin123456', 'TestScript', 'Alert', 'hongkongdb@gmail.com', '098098909', '827ccb0eea8a706c4c34a16891f84e7b'),
(65, '131609255954117394', '624840217635979', 'css326', 'Database', 'Lab', 'css3267889@gmail.com', '098989892', '827ccb0eea8a706c4c34a16891f84e7b'),
(56, '15481477882', '99914910392686216532', 'bbossbb123', 'Kijwipat', 'Thanasittichai', 'abcdef@gmail.com', '09999999', 'd41d8cd98f00b204e9800998ecf8427e'),
(50, '159668123', '64', 'admintest2', 'PasswordHash', 'Testmd5', 'secuirty@gmail.com', '0999231322', '827ccb0eea8a706c4c34a16891f84e7b'),
(38, '20644307027824', '7320253125', 'getcpyy', 'Crongchatra', 'Getcc', 'getcpyy@gmail.com', '0634464510', '827ccb0eea8a706c4c34a16891f84e7b'),
(41, '2068', '3214456054276884', 'yokjadekae', 'Waris', 'Yok', 'jadekae@gmail.com', '0855689885', '827ccb0eea8a706c4c34a16891f84e7b'),
(49, '2590', '28801588892992309054', 'admintest', 'Security', 'Test', 'md5@gmail.com', '09898908989', '827ccb0eea8a706c4c34a16891f84e7b'),
(45, '29', '635467', 'testalert', 'Harajuku', 'Hoiyaaa', 'testalert@siit.tu.ac.th', '08898989899', '827ccb0eea8a706c4c34a16891f84e7b'),
(35, '314859261', '03', 'jernjern', 'Paratchapron', 'Uttraporn', 'jernerei@gmail.com', '0922478820', '827ccb0eea8a706c4c34a16891f84e7b'),
(40, '34334792847971', '876980', 'tanzaza', 'Tantan', 'Tantan', 'tantan@hotmail.com', '0888888888', '827ccb0eea8a706c4c34a16891f84e7b'),
(66, '430088150', '573957897900784787', 'sornsorasonic', 'Sornsorawitch', 'Chanpradubfa', 'nick@gmail.com', '089898933', '827ccb0eea8a706c4c34a16891f84e7b'),
(63, '443637641', '47040517533', 'css3252', 'Css325', 'Database2', 'css3252@gmail.com', '099898989', '827ccb0eea8a706c4c34a16891f84e7b'),
(42, '4495065', '151140098', 'bb', 'purinat', 'Thanasittichai', 'bbbbkwp@gmail.com', '0917575000', '827ccb0eea8a706c4c34a16891f84e7b'),
(60, '45909494511268386', '29', 'toasty2', 'css326', 'Database', 'css326123@gmail.com', '098989899', '827ccb0eea8a706c4c34a16891f84e7b'),
(34, '5059', '9253779785', 'namsaisim', 'Vimolnath', 'Saisim', 'nam_scb@gmail.com', '0957126244', '827ccb0eea8a706c4c34a16891f84e7b'),
(33, '543830199496', '0508323591349', 'skysky', 'Jinyi', 'Chen', 'skysky@gmail.com', '0966865666', '827ccb0eea8a706c4c34a16891f84e7b'),
(58, '5537321831279793906', '122823', 'toasty', 'Css326', 'Programming', 'database@gmail.com', '099898999', '827ccb0eea8a706c4c34a16891f84e7b'),
(36, '63969027', '06618838562896877246', 'Pitfalist', 'Bhanutas', 'Sawanachai', 'time01@gmail.com', '0809808690', '827ccb0eea8a706c4c34a16891f84e7b'),
(52, '711371', '7162538412', 'jernjern1', 'Jern', 'JernJern', 'getJern@gmail.com', '0989898988', '827ccb0eea8a706c4c34a16891f84e7b'),
(39, '71295130727807885', '27970350146208', 'ttannta', 'Artittayaporn', 'Kerdchouay', 'tanta_party@hotmail.com', '0616100657', '827ccb0eea8a706c4c34a16891f84e7b'),
(54, '71431701', '35673384896278851', 'namsaisim2', 'Vimolnath2', 'Securitycheck', 'vimolnaththailand@siit.tu.ac.th', '09898982131', '7488e331b8b64e5794da3fa4eb10ad5d'),
(62, '77698921498114361', '03488441178', 'testnoti', 'TestNoti', 'Fi', 'testtesttest@gmail.com', '0987889722', '827ccb0eea8a706c4c34a16891f84e7b'),
(43, '835146226321653123', '6805698975636874', 'des326', 'Lab', 'Programming', 'lab@hotmail.com', '09999999', '827ccb0eea8a706c4c34a16891f84e7b'),
(30, '84916111408', '06323942585', 'admin', 'Kijwipat55555', 'Thanasittichai', 'bbbbkwp@gmail.com', '0970078341', '827ccb0eea8a706c4c34a16891f84e7b'),
(44, '866288838727', '18017377817', 'NewID', 'Programming', 'Database', 'csss326@gmail.com', '099798989', '827ccb0eea8a706c4c34a16891f84e7b'),
(32, '9017847122144031636', '2297470185151733984', 'halahonggie', 'Kanokkarn', 'Pinkeaw', 'kthammayot@gmail.com', '0973369919', '827ccb0eea8a706c4c34a16891f84e7b'),
(67, '92062793114651022620', '16', 'css326test', 'Database', 'CSS326', 'database326@gmail.com', '098989898', '827ccb0eea8a706c4c34a16891f84e7b'),
(64, '92641763408', '689580407129980', 'css3253', 'Thanaruk', 'Database', 'thanaruk@siit.tu.ac.th', '0978878788', '827ccb0eea8a706c4c34a16891f84e7b'),
(51, '9278044399359', '9561842', 'bossb', 'Boss', 'b', 'bbbbkwp@gmail.com', '08223029292', '7488e331b8b64e5794da3fa4eb10ad5d'),
(59, '9998884287489969', '122948800678', 'test1234', 'CSS326', 'Database', 'bbbbbb@gmail.com', '0987887878', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billingid`),
  ADD KEY `timeslotid` (`timeslotid`),
  ADD KEY `shipmenttypeid` (`shipmenttypeid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `paymentid` (`paymentid`),
  ADD KEY `billingid` (`billingid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `order_product_detail`
--
ALTER TABLE `order_product_detail`
  ADD PRIMARY KEY (`orderpdid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `fk_11` (`paymenttypeid`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
  ADD PRIMARY KEY (`paymenttypeid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `shipmenttype`
--
ALTER TABLE `shipmenttype`
  ADD PRIMARY KEY (`shipmenttypeid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeslotid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `addressid` (`addressid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_product_detail`
--
ALTER TABLE `order_product_detail`
  MODIFY `orderpdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`timeslotid`) REFERENCES `timeslot` (`timeslotid`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`shipmenttypeid`) REFERENCES `shipmenttype` (`shipmenttypeid`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`paymentid`) REFERENCES `payment` (`paymentid`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`);

--
-- Constraints for table `order_product_detail`
--
ALTER TABLE `order_product_detail`
  ADD CONSTRAINT `order_product_detail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`),
  ADD CONSTRAINT `order_product_detail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  ADD CONSTRAINT `order_product_detail_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_11` FOREIGN KEY (`paymenttypeid`) REFERENCES `paymenttype` (`paymenttypeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`addressid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
