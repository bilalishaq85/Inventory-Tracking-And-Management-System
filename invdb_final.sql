-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 04:32 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `captchas`
--

CREATE TABLE `captchas` (
  `cap_code` int(10) UNSIGNED NOT NULL,
  `cap_value` varchar(10) NOT NULL,
  `cap_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captchas`
--

INSERT INTO `captchas` (`cap_code`, `cap_value`, `cap_pic`) VALUES
(1, 'XAVHZHN', ''),
(2, 'XEEYZWA', ''),
(3, 'W34CMV', ''),
(4, 'AKYX9PY', ''),
(5, 'VK29L', ''),
(6, 'XVJ4JHA', ''),
(7, 'J6XHA', ''),
(8, 'V6Y44', ''),
(9, 'NNMN6T', ''),
(10, 'YNXCP46', ''),
(11, 'H1KYC', ''),
(12, 'PP3EL3A', ''),
(13, '3HJJV', ''),
(14, 'VKTEE', ''),
(15, 'NZ6EYUT', ''),
(16, '9HXZ6', ''),
(17, 'UFCVJ7', ''),
(18, 'EJVL16', ''),
(19, 'KZYNNN', ''),
(20, '7PWPH', ''),
(21, 'ZF97ME', ''),
(22, 'LA3XZ36', ''),
(23, '4ZJLC', ''),
(24, 'FCWEPV', ''),
(25, 'XE4E2ME', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_code` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_code`, `cat_name`, `cat_desc`) VALUES
(1, 'Hex Socket Products Alloy', 'Socket-Flat-Button-Shoulder-Set Screws'),
(2, 'Hex and Square Head Screws', 'Hex and Square Head Screws-Bolts-Set Screws'),
(3, 'Hex and Square Nuts', 'Locking-Course and Fine-Slotted-Acorn'),
(4, 'Machine Screws', 'Steel-Brass-Stainless-Threading'),
(6, 'Hex Socket Products Stainless', 'Socket-Flat-Button-Shoulder-Set Screws Stainless'),
(8, 'Pipe Fittings', 'Elbow-Cross-Coupling-Reducing-Barb-Valves'),
(9, 'Pipe Plugs Steel And Brass', 'Dry Seal-Flush Seal-Square Head'),
(10, 'Dowel Pins', 'Dowel Pins and Pull Dowel Pins'),
(11, 'Spring Pins', 'Split-Coiled-Steel and Stainless'),
(12, 'Drill Rod', 'Water and Oil Hard'),
(13, 'Ground Stock', 'Flat Ground Stock 01'),
(14, 'Hex Socket Screws ', 'Socket-Button-Flat-Shoulder-Set-Low Head Cap Screws'),
(15, 'End Mills HSS', '2 Flute-4 Flute-Ball Nose-Centre Cutting-HSS'),
(16, 'Countersinks and Counterbores', 'Countersink-Counterbore-Combined Drill and Cntrsnk'),
(17, 'Reamers', 'Inch-Metric-Straight-Spiral-Taper'),
(18, 'Milling Cutters', 'Key-Woodruff-Corner Round-Side Milling'),
(19, 'Taps ', 'Spiral Flt-Taper Pipe-Spiral Point-Plug-Bottoming'),
(20, 'Surface Grinding Wheels', 'Aluminum Oxide-Ceramic-High Performance'),
(21, 'Bench and Cutter Grinding Wheels', 'Grey-Green-Sharpening-Centerless'),
(22, 'Depressed Centre Wheels', 'Reinforced-Gas-Electric-Hand Saw'),
(23, 'Flap Discs', 'Flap Discs '),
(24, 'Fiber Discs ', 'Fiber Discs and Sanding Discs'),
(25, 'Compression Fitting', 'Union Tee-Union Elbow-Union Reducing-Bress Insert'),
(26, 'Bolts', 'Shoulder Eye-Tap Full Thread-Flang-Heavy Hex-Lag'),
(27, 'Hex-Square Head Screws Stainless', 'Hex and Square Head Screws-Bolts-Set Screws Stainless'),
(28, 'Bolts Stainless', 'Shoulder Eye-Tap Full Thread-Flang-Heavy Hex-Lag'),
(29, 'Hex and Square Nuts Stainless', 'Locking-Course and Fine-Slotted-Acorn Stainless'),
(30, 'End Mills Solid Carbide', '2 Flute-4 Flute-Ball Nose-Centre Cutting-Carbide'),
(31, 'End Mills Cobalt', '2 Flute-4 Flute-Ball Nose-Centre Cutting- Cobalt'),
(32, 'Dies', 'Inch-Metric-NPT-Round Adjustable'),
(33, 'Taps Roll Forming', 'Roll Forming Taps'),
(34, 'Mounted Points and Carbide Burs', 'Mounted Points and Carbide Burs'),
(35, 'Shop Rolls', 'Shop Rolls'),
(36, 'Non Woven Abrasives', 'Non Woven Discs Drums and Pads'),
(37, 'Cutting Wheels', 'Cutting and Cutoff Wheels'),
(38, 'Belts', 'Abrasive Belts'),
(39, 'Flap Wheels', 'Flap Wheels and Drums'),
(40, 'Polishing Pads and Discs', 'Surface Conditioning Discs and Pads'),
(41, 'Stripping Wheels', 'Rust Paint and Surface Coat Removal'),
(42, 'Deburring Wheels', 'Aluminum Oxide and Silicon Carbide'),
(43, 'Cable Ties and Hose Clamps', 'Cable Ties-Natural-Black UV-Heat Stabilized Black'),
(44, 'Key Stock', 'Key Stock Plated'),
(45, 'Die Springs', 'Die Springs'),
(46, 'Shim Stock', 'Shim Stock-Stainless-Brass-Blue Tempered');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_code` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_desc` varchar(100) NOT NULL,
  `photo1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_code`, `class_name`, `class_desc`, `photo1`) VALUES
(2, 'Office Supplies', 'Office and Computer Supplies', 'photos/classes/2_1_1287694220.jpg'),
(5, 'Truck and Trailor Supplies', 'Truck and Trailor Supplies', 'photos/classes/5_1_1287679625.jpg'),
(6, 'Plant - Safety - Sanitary Supplies', 'Soap-Fluids-Hand Cleaner-Tapes-Absorbents', 'photos/classes/6_1_1287679615.jpg'),
(11, 'Industrial Supplies', 'Industrial Supplies', 'photos/classes/11_1_1280880590.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_code` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `add_street` varchar(100) NOT NULL,
  `add_city` varchar(15) NOT NULL,
  `add_state` varchar(15) NOT NULL,
  `add_country` varchar(15) NOT NULL,
  `add_postal_code` varchar(7) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `voice` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `toll free` varchar(15) NOT NULL,
  `service_email` varchar(50) NOT NULL,
  `website_url` varchar(50) NOT NULL,
  `cust_login_url` varchar(50) NOT NULL,
  `dist_login_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_code` int(10) UNSIGNED NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `cust_graphic` varchar(200) NOT NULL,
  `cust_pwd` varchar(10) NOT NULL,
  `dist_code` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_code`, `cust_id`, `cust_name`, `contact_name`, `cust_graphic`, `cust_pwd`, `dist_code`, `active`) VALUES
(6, 'cust1', 'cust1', 'cust1', '', 'cust1', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_inventory`
--

CREATE TABLE `customer_inventory` (
  `cust_inv_code` int(10) UNSIGNED NOT NULL,
  `cust_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `part_quantity` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_inventory_log`
--

CREATE TABLE `customer_inventory_log` (
  `log_code` int(10) UNSIGNED NOT NULL,
  `cust_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `part_quantity` int(10) UNSIGNED NOT NULL,
  `action_quantity` int(10) UNSIGNED NOT NULL,
  `action` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `dist_code` int(10) UNSIGNED NOT NULL,
  `dist_id` varchar(20) NOT NULL,
  `dist_pwd` varchar(10) NOT NULL,
  `dist_name` varchar(50) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `add_street` varchar(100) NOT NULL,
  `add_city` varchar(15) NOT NULL,
  `add_state` varchar(15) NOT NULL,
  `add_country` varchar(15) NOT NULL,
  `add_postal_code` varchar(15) NOT NULL,
  `dist_graphic` varchar(200) NOT NULL,
  `billing` tinyint(1) NOT NULL,
  `paypal_email` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free_ac_qty` int(10) NOT NULL,
  `padi_ac_charge` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`dist_code`, `dist_id`, `dist_pwd`, `dist_name`, `contact_name`, `add_street`, `add_city`, `add_state`, `add_country`, `add_postal_code`, `dist_graphic`, `billing`, `paypal_email`, `active`, `free_ac_qty`, `padi_ac_charge`) VALUES
(14, 'anda', 'anda', 'Anda Tool and Fastener', 'Murray', '29 Penn Drive', 'Weston', 'Ontario', 'Canada', 'M3H 1L7', '', 0, 'qwer@anda.com ', 1, 0, '1.00'),
(15, 'dist1', 'dist1', 'dist1', 'Telus', '508 1470 midland ave', 'scarborugh', 'on', 'canada', 'm1p4z4', '', 0, '', 1, 2, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `distributors_catalog`
--

CREATE TABLE `distributors_catalog` (
  `catalog_code` int(10) UNSIGNED NOT NULL,
  `catalog_name` varchar(20) NOT NULL,
  `dist_code` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors_catalog`
--

INSERT INTO `distributors_catalog` (`catalog_code`, `catalog_name`, `dist_code`) VALUES
(11, 'Catalog-1', 14),
(12, 'Catalog-1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `distributors_catalog_detail`
--

CREATE TABLE `distributors_catalog_detail` (
  `catalog_detail_code` int(10) UNSIGNED NOT NULL,
  `catalog_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `assigned` tinyint(1) NOT NULL,
  `min_value` int(10) UNSIGNED DEFAULT NULL,
  `max_value` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors_catalog_detail`
--

INSERT INTO `distributors_catalog_detail` (`catalog_detail_code`, `catalog_code`, `part_code`, `assigned`, `min_value`, `max_value`) VALUES
(48, 11, 70, 1, NULL, NULL),
(49, 11, 71, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distributors_staff`
--

CREATE TABLE `distributors_staff` (
  `staff_code` int(10) UNSIGNED NOT NULL,
  `dist_code` int(10) UNSIGNED NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `staff_pwd` varchar(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_assignment`
--

CREATE TABLE `inventory_assignment` (
  `assign_code` int(10) UNSIGNED NOT NULL,
  `dist_code` int(10) UNSIGNED NOT NULL,
  `cust_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `assigned` tinyint(1) NOT NULL,
  `max_value` int(10) UNSIGNED DEFAULT NULL,
  `min_value` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `opt_code` int(10) UNSIGNED NOT NULL,
  `opt_id` varchar(20) NOT NULL,
  `opt_name` varchar(50) NOT NULL,
  `opt_pwd` varchar(10) NOT NULL,
  `opt_comments` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`opt_code`, `opt_id`, `opt_name`, `opt_pwd`, `opt_comments`, `active`) VALUES
(1, 'opt1', 'George Smith', 'opt1', 'George is the operator for this system', 1),
(2, 'opt2', 'Michael Brown', 'opt2', 'Operator is the operator for this system', 1),
(3, 'lionel', 'Lionel Poizner', 'year10', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `part_code` int(10) UNSIGNED NOT NULL,
  `part_no` varchar(25) NOT NULL,
  `class_code` int(10) UNSIGNED NOT NULL,
  `type_code` int(10) UNSIGNED NOT NULL,
  `sub_cat_code` int(10) UNSIGNED NOT NULL,
  `part_name` varchar(30) NOT NULL,
  `short_desc` varchar(50) DEFAULT NULL,
  `long_desc` varchar(100) NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `list_price` decimal(12,4) NOT NULL,
  `upc_no` varchar(30) NOT NULL,
  `industry_no` varchar(30) NOT NULL,
  `uic_no` varchar(30) NOT NULL,
  `sku_no` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `dist_code` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_code`, `part_no`, `class_code`, `type_code`, `sub_cat_code`, `part_name`, `short_desc`, `long_desc`, `photo1`, `photo2`, `list_price`, `upc_no`, `industry_no`, `uic_no`, `sku_no`, `active`, `dist_code`) VALUES
(1, 'BSCS004C012', 11, 12, 228, 'BSCS 4 Course By 1/2', 'Button Head Socket Cap Screw C', '4-40X1/2 BUTTON SOCKET CAP SCREWS N.C.', '', '', '1.0000', '', '', '', '0', 1, 0),
(2, 'BSCS004C014', 11, 12, 228, 'BSCS 4 Course By 1/4', 'Button Head Socket Cap Screw C', '4-40X1/4 BUTTON SOCKET CAP SCREWS N.C.', '', '', '1.0000', '', '', '', '0', 1, 0),
(3, 'BSCS004C034', 11, 12, 228, 'BSCS 4 Course By 3/4', 'Button Head Socket Cap Screw C', '4-40X3/4 BUTTON SOCKET CAP SCREWS N.C', '', '', '1.0000', '', '', '', '0', 1, 0),
(4, 'BSCSM6C30', 11, 12, 228, 'BSCS M6 By 30', 'Metric Button Socket Cap Screw C', 'M6-(1.0)X30 METRIC BUTTON HD CAP SCREWS', '', '', '1.0000', '', '', '', '0', 1, 0),
(5, 'BSCSM6C40', 11, 12, 228, 'BSCS M6 By 40', 'Metric Button Socket Cap Screw C', 'M6-(1.0)X40 METRIC BUTTON HD CAP SCREWS', '', '', '1.0000', '', '', '', '0', 1, 0),
(6, 'BSCSM8C10', 11, 12, 228, 'BSCS M8 By 10', 'Metric Button Socket Cap Screw C', 'M8-(1.25)X10 METRIC BUTTON HD CAP SCREWS', '', '', '1.0000', '', '', '', '0', 1, 0),
(7, 'CGBL014C034', 11, 12, 228, 'CGBL 1/4 Course By 3/4', 'Carrage Bolt Round Head', '1/4-20X3/4 CARRIAGE BOLTS N.C.', '', '', '1.0000', '', '', '', '0', 1, 0),
(8, 'CGBL038C034', 11, 12, 228, 'CGBL 3/8 Course By 3/4', 'Carrage Bolt Round Head', '3/8-16X3/4 CARRIAGE BOLTS N.C.', '', '', '1.0000', '', '', '', '0', 1, 0),
(9, 'CGBL038C114', 11, 12, 228, 'CGBL 3/8 Course By 1 1/4', 'Carrage Bolt Round Head', '3/8-16X1 1/4 CARRAGE BOLTS N.C.', '', '', '1.0000', '', '', '', '0', 1, 0),
(10, 'DWLPN014X234', 11, 12, 228, 'DWLPN 1/4 By 2 3/4', 'Dowel Pin', '1/4X2 3/4 DOWEL PINS', '', '', '1.0000', '', '', '', '0', 1, 0),
(11, 'DWLPN014X3', 11, 12, 228, 'DWLPN 1/4 By 3', 'Dowel Pin', '1/4X3 DOWEL PINS', '', '', '1.0000', '', '', '', '0', 1, 0),
(12, 'DWLPN014X312', 11, 12, 228, 'DWLPN 1/4 By 3 1/2', 'Dowel Pin', '1/4X3 1/2 DOWEL PINS', '', '', '1.0000', '', '', '', '0', 1, 0),
(13, 'DWLPNM6X36', 11, 12, 228, 'DWLPN M6 By 36', 'Dowel Pin Metric', 'M6X36 METRIC DOWEL PINS', '', '', '1.0000', '', '', '', '0', 1, 0),
(14, 'DWLPNM6X40', 11, 12, 228, 'DWLPN M6 By 40', 'Dowel Pin Metric', 'M6X40 METRIC DOWEL PINS', '', '', '1.0000', '', '', '', '0', 0, 0),
(70, 'SHCS002CX3-16', 11, 5, 6, 'SHCS No. 2 -56 Pitch 3-16 lng', 'SOCKET HEAD CAP SCREW COURSE SERIES', 'SHCS No. 2  -56 Thread Pitch 3-16 inch Long', '', '', '1.0000', '', '', '', '', 0, 0),
(71, 'SHCS014CX3-8', 11, 5, 6, 'SHCS No.2 -20Pitch 3-8 in lng', 'part2', 'part2', '', '', '2.0000', 'part2', 'part2', 'part2', 'part2', 1, 0),
(72, 'SHCSLH008CX3-8', 11, 5, 9, 'SHCS LH No.8 -32Pitch 3-8 in l', '', '', '', '', '0.0000', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parts_log`
--

CREATE TABLE `parts_log` (
  `log_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `dist_code` int(10) UNSIGNED NOT NULL,
  `staff_code` int(10) UNSIGNED NOT NULL,
  `action` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts_specs`
--

CREATE TABLE `parts_specs` (
  `sfv_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `sf_code` int(10) UNSIGNED NOT NULL,
  `sf_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_specs`
--

INSERT INTO `parts_specs` (`sfv_code`, `part_code`, `sf_code`, `sf_value`) VALUES
(239, 70, 13, ''),
(240, 70, 14, ''),
(241, 70, 15, ''),
(242, 71, 13, ''),
(243, 71, 14, ''),
(244, 71, 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `sf_name_def`
--

CREATE TABLE `sf_name_def` (
  `sf_code` int(10) UNSIGNED NOT NULL,
  `sub_cat_code` int(10) UNSIGNED NOT NULL,
  `sf_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_name_def`
--

INSERT INTO `sf_name_def` (`sf_code`, `sub_cat_code`, `sf_name`) VALUES
(13, 6, 'Diameter'),
(14, 6, 'Thread Pitch'),
(15, 6, 'Length');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_code` int(10) UNSIGNED NOT NULL,
  `sub_cat_id` varchar(20) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `sub_cat_desc` varchar(100) NOT NULL,
  `sub_cat_detail1` varchar(100) NOT NULL,
  `sub_cat_detail2` varchar(100) NOT NULL,
  `cat_code` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_code`, `sub_cat_id`, `sub_cat_name`, `sub_cat_desc`, `sub_cat_detail1`, `sub_cat_detail2`, `cat_code`) VALUES
(1, 'SHCS', 'Socket Head Cap Screw C', 'Heat Treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(2, 'SHCSF', 'Socket Head Cap Screw F', 'Heat Treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(3, 'SHCSM', 'Metric Socket Head Cap Screw C', 'Heat Treated Alloy Steel Grade 12.9 ANSI B1.13M', '', '', 1),
(4, 'BSCS', 'Button Head Socket Cap Screw C', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(5, 'BSCSF', 'Button Head Socket Cap Screw F', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(6, 'SHCSUNRC', 'Socket Head Cap Screws Course Thread', 'Heat Treated Alloy Steel ASME-ANSI B18.3 3A Fit', 'Unified 3A Thread Fit', 'Meets ASME-ANSI B18.3', 14),
(7, 'SHCSUNRF', 'Socket Head Cap Screws Fine Thread', 'Heat Treated Alloy Steel ASME-ANSI B18.3 3A Fit', 'Unified 3A Thread Fit', 'Meets ASME-ANSI B18.3', 14),
(8, 'SHCSM', 'Socket Head Cap Screws Metric', 'Heat Treated Alloy Steel Grade 12.9 ANSI B1.13M', 'ISO Metric Threads To ANSI B1.13M', '', 14),
(9, 'SHCSLHUNRC', 'Low Head Socket Cap Screws Course Thread', 'Heat Treated Alloy Steel ASME-ANSI B18.3 3A Fit', '', '', 14),
(10, 'SHCSLHUNRF', 'Low Head Socket Cap Screws Fine Thread', 'Heat Treated Alloy Steel ASME-ANSI B18.3 3A Fit', '', '', 14),
(11, 'SHSB', 'Socket Head Shoulder Screw', 'Heat Treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(12, 'SLHCS', 'Low Head Socket Cap Screw C', 'Heat Treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(13, 'SLHCSF', 'Low Head Socket Cap Screw F', 'Heat Treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(14, 'SLHCSM', 'Metric Low Head Socket Cap Screw', 'Heat Treated Alloy Steel ISO Thread ANSI M1.13M', '', '', 1),
(15, 'SSCP', 'Socket Set Screw Cup Point C', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(16, 'SSCPF', 'Socket Set Screw Cup Point F', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(17, 'SSKNP', 'Socket Set Screw Knurled Point C', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(18, 'SSKNPF', 'Socket Set Screw Knurled Point F', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(19, 'SSBT', 'Socket Set Screw Brass Tip C', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(20, 'SSBTF', 'Socket Set Screw Brass Tip F', 'Heat treated Alloy Steel 3A Fit ASME/ANSI B18.3', '', '', 1),
(21, 'HX2CS', 'Hex Head Cap Screw Gr2 C ', 'Bare Metal', '', '', 2),
(22, 'HX2CSF', 'Hex Head Cap Screw Gr2 F', 'Bare Metal', '', '', 2),
(25, 'HX5CS', 'Hex Head Cap Screw Gr5 C', 'Bright Zinc Plated', '', '', 2),
(26, 'HX5CSF', 'Hex Head Cap Screw Gr5 F', 'Bright Zinc Plated', '', '', 2),
(27, 'HX5CSM', 'Metric Hex Head Cap Screw Gr8-8', 'Grade 8.8 ZC Plated', '', '', 2),
(28, 'HX8CS', 'Hex Head Cap Screw Gr8 C Y ZC', 'Hex Head Cap Screws Gr8 NC Y ZC', '', '', 2),
(29, 'HX8CSF', 'Hex Head Cap Screw Gr8 F Y ZC', 'Hex Head Cap Screws Gr8 NF Y ZC', '', '', 2),
(30, 'HX8CSBO', 'Hex Head Cap Screw 1 in-up C', 'Hex Head Cap Screws 1 inch and up Black Oxide', '', '', 2),
(31, 'SQHSS', 'Square Head Set Screw C', 'Square Head Set Screws NC Case Hard Cup Point', '', '', 2),
(32, 'SQHSSF', 'Square Head Set Screw F', 'Square Head Set Screws NF Case Hard Cup Point', '', '', 2),
(36, 'SHSTCS', 'Stainless Socket Cap Screw C', 'Stainless Steel 3A Fit ASME/ANSI B18.3', '', '', 6),
(38, 'SHSTCSF', 'Stainless Socket Cap Screw F', 'Stainless Steel 3A Fit ASME/ANSI B18.3', '', '', 6),
(39, 'SHSTCSM', 'Stainless Metric Socket Cap Screw', 'Stainless Steel DIN 912', '', '', 6),
(40, 'DWLPN', 'Dowel Pin', 'Dowel Pins Steel', '', '', 10),
(41, 'DWLPNM', 'Dowel Pin Metric', 'Dowel Pin Metric Steel', '', '', 10),
(42, 'PLDWL', 'Pull Dowel Pin', 'Pull Dowel Pins', '', '', 10),
(43, 'PLDWLM', 'Pull Dowel Pin Metric', 'Pull Dowel Pin Metric', '', '', 10),
(46, 'SPRPN', 'Spring Pins', 'Spring Pins Steel Split', '', '', 11),
(47, 'SPRPNM', 'Spring Pins Metric', 'Spring Pins Metric Steel Split', '', '', 11),
(48, 'SPRPNSTNL', 'Spring Pins Stainless', 'Spring Pins Stainless Split', '', '', 11),
(49, 'DRLFTL', 'Fractional Taper Length Drill', 'Fractional Taper Length Drills', '', '', 14),
(50, 'DRLFXL', 'Factional Extra Long Drill', 'Factional Extra Long Drills', '', '', 14),
(51, 'DRLFTS', 'Fractional Tapershank Drill', 'Fractional Tapershank Drills', '', '', 14),
(52, 'DRLFTSXL', 'Fractional Tapershank Extra Long', 'Fractional Tapershank Extra Long Drills', '', '', 14),
(53, 'DRLJBR', 'Fractional Jobber Length Drill', 'Fractional Jobber Length Drills', '', '', 14),
(54, 'DRLLTR', 'Letter Straight Shank Drill', 'Letter Straight Shank Drills', '', '', 14),
(55, 'DRLMAS', 'Fractional Masonry Drill', 'Fractional Masonry Drills', '', '', 14),
(56, 'DRLM', 'Metric Straight Shank Drill', 'Metric Straight Shank Drills', '', '', 14),
(57, 'DRLNBR', 'Number Straight Shank Drill', 'Number Straight Shank Drills', '', '', 14),
(58, 'DRLPR', 'Fractional Prentice Drill', 'Fractional Silver and Deming (Prentice) Drills', '', '', 14),
(60, 'EML2FBL', 'Two Flute Ball Nose Long', 'Two Flute Ball Nose Long Series', '', '', 15),
(61, 'EML2FBLC', 'Two Flute Ball Nose Long Carbide', 'Two Flute Ball Nose Carbide Long Series', '', '', 30),
(64, 'SQHPP', 'Square Head Pipe Plug', 'Square Head Pipe Plug', '', '', 9),
(65, 'DSPP', 'Dryseal Pipe Plug', 'Dryseal Pipe Plug', '', '', 9),
(66, 'FSPP', 'Flushseal Pipe Plug', 'Flushseal Pipe Plug', '', '', 9),
(67, 'SSCPM', 'Metric Socket Set Screw Cup Point', 'Heat Treated Alloy Steel ISO Thread ANSI M1.13M', '', '', 1),
(68, 'HX2TB', 'Hex Head Tap Bolts Gr2 C', 'Gr2 Full Thread Bare Metal', '', '', 26),
(69, 'HX2TBF', 'Hex Head Tap Bolts Gr2 F', 'Gr2 Full Thread Bare Metal', '', '', 26),
(70, 'HX5TB', 'Hex Head Tap Bolts Gr5 C', 'Gr5 Full Thread Zinc Plated', '', '', 26),
(71, 'HX5TBF', 'Hex Head Tap Bolts Gr5 F', 'Gr5 Full Thread Zinc Plated', '', '', 26),
(72, 'SQHBLT', 'Square Head Bolt GrA C', 'Square Head Bolt Grade A ASME B18.2.1', '', '', 26),
(73, 'BSTSCS', 'Stainless Button Socket Screw C', 'Stainless Button Head Socket Cap Screw C', '', '', 6),
(74, 'BSTSCSF', 'Stainless Button Socket Screw F', 'Stainless Button Head Socket Cap Screw F', '', '', 6),
(75, 'BSTSCSM', 'Stainless Metric Button Socket Screw', 'Stainless Metric Button Head Socket Cap Screw', '', '', 6),
(76, 'FSTSCS', 'Stainless Flat Socket Cap Screw C', 'Stainless Flat Head Socket Cap Screw C', '', '', 6),
(77, 'FSTSCSF', 'Stainless Flat Socket Cap Screw F', 'Stainless Flat Socket Head Cap Screw F', '', '', 6),
(78, 'FSTSCSM', 'Stainless Metric Flat Socket Screw', 'Stainless Metric Flat Socket Head Cap Screw', '', '', 6),
(79, 'SHSTSB', 'Stainless Socket Head Shoulder Screw', 'Stainless Socket Head Shoulder Screw', '', '', 6),
(80, 'SHSTSBM', 'Stainless Metric Socket Shoulder Screw', 'Stainless Metric Socket Head Shoulder Screw', '', '', 6),
(81, 'SLHSTCS', 'Stainless Low Head Socket Screw C', 'Stainless Low Head Socket Cap Screw C', '', '', 6),
(82, 'SLHSTCSF', 'Stainless Low Head Socket Screw F', 'Stainless Low Head Socket Cap Screw F', '', '', 6),
(83, 'SLHSTCSM', 'Stainless Metric Low Head Socket Screw', 'Stainless Metric Low Head Socket Cap Screw', '', '', 6),
(84, 'SSSTCP', 'Stainless Socket Set Screw Cup Point C', 'Stainless Socket Set Screw Cup Point C', '', '', 6),
(85, 'SSSTCPF', 'Stainless Socket Set Screw Cup Point F', 'Stainless Socket Set Screw Cup Point F', '', '', 6),
(86, 'SSSTCPM', 'Stainless Metric Socket Set Screw Cup Point', 'Stainless Metric Socket Set Screw Cup Point', '', '', 6),
(87, 'SSSTKNP', 'Stainless Socket Set Screw Knurled Point C', 'Stainless Socket Set Screw Knurled Point C', '', '', 6),
(88, 'SSSTKNPF', 'Stainless Socket Set Screw Knurled Point F', 'Stainless Socket Set Screw Knurled Point F', '', '', 6),
(89, 'HXSTCS', 'Stainless Hex Head Cap Screw C', 'Stainless Hex Head Cap Screw C', '', '', 27),
(90, 'HXSTCSF', 'Stainless Hex Head Cap Screw F', 'Stainless Hex Head Cap Screw F', '', '', 27),
(91, 'HXSTCSM', 'Stainless Metric Hex Head Cap Screw ', 'Stainless Metric Hex Head Cap Screw ', '', '', 27),
(92, 'CGBLT', 'Carrage Bolt Round Head', 'Carrage Bolt Round Head Square Neck', '', '', 26),
(93, 'EYBLSH', 'Shoulder Eye Bolt', 'Forged Shoulder Eye Bolt', '', '', 26),
(94, 'EYBLSHM', 'Metric Shoulder Eye Bolt', 'Forged Metric Shoulder Eye Bolt', '', '', 26),
(95, 'F12PS', 'Flange Screw 12 Point C', 'Flange Screw 12 Point Washer Head C', '', '', 26),
(96, 'F12PSF', 'Flange Screw 12 Point F', 'Flange Screw 12 Point Washer Head F', '', '', 26),
(97, 'HHXBLT', 'Heavy Hex Bolt', 'Heavy Hex Bolt', '', '', 26),
(98, 'LGBLT', 'Hex Head Lag Bolt', 'Hex Head Lag Bolt', '', '', 26),
(99, 'LGBLSQ', 'Square Head Lagt Bolt', 'Square Head Lagt Bolt', '', '', 26),
(100, 'CPLNT', 'Hex Coupling Nut  C', 'Hex Coupling Nut  Zinc Plated C', '', '', 3),
(101, 'G5HXNT', 'Hex Nut Gr5 C Bare Metal', 'Hex Nut Gr5 C Bare Metal', '', '', 3),
(102, 'G5HXNTF', 'Hex Nut Gr5 F Bare Metal', 'Hex Nut Gr5 F Bare Metal', '', '', 3),
(103, 'G8HXNT', 'Hex Nut Gr8 C Bare Metal', 'Hex Nut Gr8 C Bare Metal', '', '', 3),
(104, 'G8HXNTF', 'Hex Nut Gr8 F Bare Metal', 'Hex Nut Gr8 F Bare Metal', '', '', 3),
(105, 'NYIG8LNT', 'Nylon Insert Gr8 Lock Nut C', 'Nylon Insert Gr8 Lock Nut C', '', '', 3),
(106, 'NYIG8LNTF', 'Nylon Insert Gr8 Lock Nut F', 'Nylon Insert Gr8 Lock Nut F', '', '', 3),
(107, 'NYIG2LNTF', 'Nylon Insert Gr2 Lock Nut F', 'Nylon Insert Gr2 Lock Nut F', '', '', 3),
(108, 'NYIG2LNT', 'Nylon Insert Gr2 Lock Nut C', 'Nylon Insert Gr2 Lock Nut C', '', '', 3),
(109, 'NYIMLNT', 'Nylon Insert Metric Lock Nut', 'Nylon Insert Metric Lock Nut', '', '', 3),
(110, 'GCHXLNT', 'Hex Automation GrC Lock Nut C', 'Hex Automation Grade C Lock Nut C', '', '', 3),
(111, 'GCHXLNTF', 'Hex Automation GrC Lock Nut F', 'Hex Automation Grade C Lock Nut F', '', '', 3),
(112, 'HSQNT', 'Heavy Square Nut C', 'Heavy Square Nut C', '', '', 3),
(113, 'HHXNT', 'Heavy Hex Nut C', 'Heavy Hex Nut C', '', '', 3),
(114, 'LHHXNT', 'Left Hand Hex Nut C', 'Left Hand Thread Hex Nut C', '', '', 3),
(115, 'LHHXNTF', 'Left Hand Hex Nut F', 'Left Hand Thread Hex Nut F', '', '', 3),
(116, 'SQNT', 'Square Nut C', 'Square Nut C', '', '', 3),
(117, 'SQNTF', 'Square Nut F', 'Square Nut F', '', '', 3),
(118, 'HXNTM', 'Metric Hex Nut', 'Metric Hex Nut', '', '', 3),
(119, 'HXNT', 'Hex Nut Gr2 C', 'Hex Nut Gr2 C', '', '', 3),
(120, 'HXNTF', 'Hex Nut Gr2 F', 'Hex Nut Gr2 F', '', '', 3),
(121, 'MSFHD', 'Flat Head Machine Screw', 'Flat Head Machine Screw', '', '', 4),
(122, 'MSFHDSS', 'Stainless Flat Head Machine Screw', 'Stainless Flat Head Machine Screw', '', '', 4),
(123, 'MSRD', 'Round Head Machine Screw ', 'Machine Screw Round Head ', '', '', 4),
(124, 'MSRDSS', 'Stainless Round Head Machine Screw', 'Stainless Machine Screw Round Head', '', '', 4),
(125, 'MSRDB', 'Brass Round Head Machine Screw', 'Machine Screw Round Head Brass', '', '', 4),
(126, 'MSFHDB', 'Brass Flat Head Machine Screw', 'Flat Head Machine Screw Brass', '', '', 4),
(127, 'HSTSQNT', 'Stainless Heavy Square Nut C', 'Stainless Heavy Square Nut C', '', '', 29),
(128, 'HXSTNT', 'Stainless Hex Nut C', 'Stainless Hex Nut C', '', '', 29),
(129, 'HXSTNTF', 'Stainless Hex Nut F', 'Stainless Hex Nut F', '', '', 29),
(130, 'HXSTNTM', 'Stainless Metric Hex Nut ', 'Stainless Metric Hex Nut ', '', '', 29),
(131, 'NYISTLNTM', 'Stainless Nylon Insert Lock Nut', 'Stainless Nylon Insert Lock Nut', '', '', 29),
(132, 'NYISTLNT', 'Stainless Nylon Insert Lock Nut C', 'Stainless Nylon Insert Lock Nut C', '', '', 29),
(133, 'NYISTLNTF', 'Stainless Nylon Insert Lock Nut F', 'Stainless Nylon Insert Lock Nut F', '', '', 29),
(134, 'GCSTHXLNT', 'Stainless Hex Automation GrC Lock Nut C', 'Stainless Hex Automation GrC Lock Nut C', '', '', 29),
(135, 'GCSTHXLNTF', 'Stainless Hex Automation GrC Lock Nut F', 'Stainless Hex Automation GrC Lock Nut F', '', '', 29),
(136, 'HXSTTB', 'Stainless Hex Head Tap Bolt C', 'Stainless Hex Head Tap Bolt C Full Thread', '', '', 28),
(137, 'HXSTTBF', 'Stainless Hex Head Tap Bolt F', 'Stainless Hex Head Tap Bolt F Full Thread', '', '', 28),
(138, 'EYBLSTSHM', 'Stainless Metric Shoulder Eye Bolt', 'Stainless Metric Shoulder Eye Bolt', '', '', 28),
(139, 'EYBLSTSH', 'Stainless Shoulder Eye Bolt', 'Stainless Shoulder Eye Bolt', '', '', 28),
(140, 'CGSTBLT', 'Stainless Carrage Bolt Round Head', 'Stainless Carrage Bolt Round Head Square Neck', '', '', 28),
(141, 'HX8CSM', 'Metric Hex Head Cap Screw Gr10-9', 'Metric Hex Head Cap Screws Gr10-9', '', '', 2),
(142, 'MSRDF', 'Round Head Machine Screw F', 'Round Head Machine Screw N.F.', '', '', 4),
(143, 'ACRNT', 'Acorn Nuts C', 'Acorn Nuts C ', '', '', 3),
(144, 'ACRNTF', 'Acorn Nuts F', 'Acorn Nuts F', '', '', 3),
(145, 'HHJMNT', 'Heavy Hex Jam Nut C', 'Heavy Hex Jam Nuts C', '', '', 3),
(146, 'HRDHXNT', 'Hardend Hex Nut', 'Hardend Hex Nut', '', '', 3),
(147, 'JMNT', 'Hex Jam Nut C', 'Hex Jam Nut C', '', '', 3),
(148, 'JMNTF', 'Hex Jam Nut F', 'Hex Jam Nut F', '', '', 3),
(149, 'LJMNT', 'Left Hand Jam Nut C', 'Left Hand Jam Nut C', '', '', 3),
(150, 'LJMNTF', 'Left Hand Jam Nut F', 'Left Hand Jam Nut F', '', '', 3),
(151, 'EML2FC8', 'Two Flute Cblt Cntr Cut End Mill', 'Two Flute 8 Prc Cblt Centre Cutting End Mill', '', '', 31),
(152, 'EML4FC8', 'Four Flute Cblt Cntr Cut End Mill', 'Four Flute 8 Prc Cobalt Center Cutting End Mill', '', '', 31),
(153, 'EML2FBC8', 'Two Flute Ball Nose Cblt End Mill', 'Two Flute Ball Nose 8 Percent Cobalt End Mill', '', '', 31),
(154, 'DRLFSTB', 'Fractional Stub Drill', 'Fractional Stub Drill', '', '', 14),
(155, 'EML2FBM', 'Two Flute Ball Nose End Mill Metric', 'Two Flute Ball Nose End Mill Metric', '', '', 15),
(156, 'EML2FB', 'Two Flute Ball Nose End Mill', 'Two Flute Ball Nose End Mill', '', '', 15),
(157, 'EML2FBC', 'Two Flute Ball Nose End Mill Crbd', 'Two Flute Ball Nose End Mill Carbide', '', '', 30),
(158, 'EML2FL', 'Two Flute Centre Cut End Mill Long', 'Two Flute Centre Cutting End Mill Long Series', '', '', 15),
(159, 'EML2FLC', 'Two Flt Cntr Cut Crbd End Mill  Lng', 'Two Flute Centre Cutting Carbide End Mill Long', '', '', 30),
(160, 'EML2FM', 'Two Flute Cntr Cut End Mill Metric', 'Two Flute Centre Cut End Mill Metric', '', '', 15),
(161, 'EML2F', 'Two Flute Centre Cutting End Mill', 'Two Flute Centre Cutting End Mill', '', '', 15),
(162, 'EML2FC', 'Two Flute Cntr Cut End Mill Crbd', 'Two Flute Centre Cutting End Mill Carbide', '', '', 30),
(163, 'EML4FC', 'Four Flute Crbd Centre Cut End Mill', 'Four Flute Carbide Centre Cutting End Mill', '', '', 30),
(164, 'EML4FRL', 'Four Flute Rough Cutting End Mill', 'Four Flute Rough Cutting End Mill', '', '', 15),
(165, 'EML4FRLC8', 'Four Flt Cblt Rgh Cut End Mill Lng', 'Four Flute Cobalt Rough Cutting End Mill Long', '', '', 31),
(166, 'EML4FRC8', 'Four Flute Cblt Rough Cut End Mill', 'Four Flute Cobalt Rough Cutting End Mill', '', '', 31),
(167, 'EML4FXL', 'Four Flute Extra Long End Mill', 'Four Flute Extra Long End Mill', '', '', 15),
(168, 'EML4FBC', 'Four Flt Ball Nose Carbide End Mill', 'Four Flute Ball Nose Carbide End Mill', '', '', 30),
(169, 'EML4F', 'Four Flute Centre Cutting End Mill', 'Four Flute Centre Cutting End Mill', '', '', 15),
(170, 'EML4FLC8', 'Four Flt Cblt Cntr Cut End Mill Lng', 'Four Flute Cobalt Centre Cutting End Mill Lng', '', '', 31),
(171, 'EML4FL', 'Four Flute Centre Cut End Mill Long', 'Four Flute Centre Cut End Mill', '', '', 15),
(172, 'EML4FB', 'Four Flute Ball Nose End Mill', 'Four Flute Ball Nose End Mill', '', '', 15),
(173, 'EML4FBLC', 'Four Flt Ball Nose Crbd End Mill Lng', 'Four Flute Ball Nose Carbide End Mill Long', '', '', 30),
(174, 'EML4FBL', 'Four Flute Ball Nose End Mill Long', 'Four Flute Ball Nose End Mill Long Series', '', '', 15),
(175, 'EML3FTL', 'Three Flt Throwaway End Mill Lng', 'Three Flute Throwaway End Mill Long Series', '', '', 15),
(176, 'EML3FT', 'Three Flute Throwaway End Mill', 'Three Flute Throwaway End Mill', '', '', 15),
(177, 'RMRSSH', 'Reamer Straight Shnk and Flt Hnd', 'Straight Shank Straight Flute Hand Reamer', '', '', 17),
(178, 'RMRSSM', 'Reamer Straight Shnk and Flt Mtr', 'Straight Shank Straight Flute Metric Reamer', '', '', 17),
(179, 'RMRTSPM', 'Taper Shnk Sprl Flt Metric Reamer', 'Taper Shank Spiral Flute Metric Reamer', '', '', 17),
(180, 'RMRSFTS', 'Straight Flute Taper Shank Reamer', 'Straight Flute Taper Shank Reamer', '', '', 17),
(181, 'RMRSPFS', 'Straight Shank Spiral Flute Reamer', 'Straight Shank Spiral Flute Reamer', '', '', 17),
(182, 'RMRSPFTS', 'Taper Shank Spiral Flute Reamer', 'Taper Shank Spiral Flute Reamer', '', '', 17),
(183, 'RMRSS', 'Straight Shank and Flute Reamer', 'Straight Shank Straight Flute Reamer', '', '', 17),
(184, 'RMRTPR', 'Taper Reamer', 'Taper Reamer', '', '', 17),
(185, 'SPRPNSTNLM', 'Spring Pin Stainless Split Metric', 'Spring Pin Stainless Split Metric', '', '', 11),
(186, 'RMRSSO', 'Straight Shk and Flt Oversize Rmrs', 'Straight Shank Straight Flute Oversize Reamers', '', '', 17),
(187, 'PLGT', 'Plug Tap', 'Plug Tap', '', '', 19),
(188, 'PLGTM', 'Plug Tap Metric', 'Plug Tap Metric', '', '', 19),
(189, 'PLYTP', 'Pully Tap', 'Pully Tap', '', '', 19),
(190, 'PPST', 'Pipe Tap Straight', 'Pipe Tap Straight', '', '', 19),
(191, 'PPTPT', 'Pipe Tap Taper', 'Pipe Tap Taper', '', '', 19),
(192, 'SPRPTM', 'Spiral Point Metric Tap', 'Spiral Point Metric Tap', '', '', 19),
(193, 'SPRPT', 'Spiral Point Tap', 'Spiral Point Tap', '', '', 19),
(194, 'BTMTPM', 'Bottoming Metric Tap', 'Bottoming Metric Tap', '', '', 19),
(195, 'INTHTP', 'Interupted Thread Tap', 'Interupted Thread Tap', '', '', 19),
(196, 'TPRT', 'Taper Tap', 'Taper Tap', '', '', 19),
(197, 'SPRPTF', 'Spiral Point Tap F', 'Spiral Point Tap F', '', '', 19),
(198, 'SPRPTMF', 'Spiral Point Tap Metric F', 'Spiral Point Tap Metric F', '', '', 19),
(199, 'TPRTF', 'Taper Tap F', 'Taper Tap F', '', '', 19),
(200, 'BTMTP', 'Bottoming Tap C', 'Bottoming Tap C', '', '', 19),
(201, 'BTMTPF', 'Bottoming Tap F', 'Bottoming Tap F', '', '', 19),
(202, 'CNTRDRL', 'Center Drill', 'Center Drill', '', '', 16),
(203, 'CTRSNK', 'Countersink', 'Countersink', '', '', 16),
(204, 'CTRTSLT', 'T-Slot Cutter', 'T-Slot Cutter', '', '', 18),
(205, 'CTRWD', 'Woodruff Cutter', 'Woodruff Key Cutter', '', '', 18),
(206, 'CRCTR', 'Corner Rounding Cutter', 'Corner Rounding Cutter', '', '', 18),
(207, 'CTRDVT', 'Dove Tail Angle Cutter', 'Dove Tail Angle Cutter', '', '', 18),
(208, 'HSPRT', 'Hi Spiral Tap C', 'Hi Spiral Tap C', '', '', 19),
(209, 'HSPRTF', 'Hi Spiral Tap F', 'Hi Spiral Tap F', '', '', 19),
(210, 'PLGTF', 'Plug Tap F', 'Plug Tap F', '', '', 19),
(211, 'LHTP', 'Left Hand Tap', 'Left Hand Tap', '', '', 19),
(212, 'LHTPF', 'Left Hand Tap F', 'Left Hand Tap F', '', '', 19),
(213, 'PLGTO', 'Plug Tap Oversize C', 'Plug Tap Oversize C', '', '', 19),
(214, 'PLGTOF', 'Plug Tap Oversize F', 'Plug Tap Oversize F', '', '', 19),
(215, 'SPRPTO', 'SpiralPoint Tap Oversize C', 'SpiralPoint Tap Oversize C', '', '', 19),
(216, 'SPRPTOF', 'Spiral Point Tap Oversize F', 'Spiral Point Tap Oversize F', '', '', 19),
(217, 'TLBTSQ', 'Square Toolbit CBLT', 'Square Toolbit CBLT', '', '', 18),
(218, 'CTRSTG', 'Stagger Tooth Milling Cutter', 'Stagger Tooth Milling Cutter', '', '', 18),
(219, 'TLBTRD', 'Round Toolbit CBLT', 'Round Toolbit CBLT', '', '', 18),
(220, 'DIE', 'Thread Cutting Round  Die C', 'Thread Cutting Round Adjustable Die', '', '', 32),
(221, 'DIEF', 'Thread Cutting Round Die F', 'Thread Cutting Round Adjustable Die F', '', '', 32),
(222, 'DIEM', 'Metric Thread Cutting Round Die', 'Metric Thread Cutting Round Adjustable Die', '', '', 32),
(223, 'DIEP', 'NTP Pipe Threading Die', 'NTP Pipe Threading Round Adjustable Die', '', '', 32),
(224, 'EML4FLC', 'Four Flute Solid Crbd Lng End Mill', 'Four Flute Solid Carbide Center Cut Long End Mill', '', '', 30),
(225, 'DRLBLK', 'Drill Blank HSS', 'Drill Blank HSS', '', '', 14),
(226, 'RLTPOM', 'Roll Forme Oversize Metric Tap', 'Roll Forme Oversize Metric Tap', '', '', 33),
(227, 'PLGTRM', 'Roll Form Metric Plug Tap', 'Roll Form Metric Plug Tap', '', '', 33),
(228, 'BBA1', 'Aluminum Oxide 1 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(229, 'BBA2', 'Aluminum Oxide 2 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(230, 'BBA3', 'Aluminum Oxide 3 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(231, 'BBA4', 'Aluminum Oxide 4 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(232, 'BBA6', 'Aluminum Oxide 6 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(233, 'BBZ1', 'Zirconia 1 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(234, 'BBZ2', 'Zirconia 2 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(235, 'BBZ3', 'Zirconia 3 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(236, 'BBZ4', 'Zirconia 4 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(237, 'BBZ6', 'Zirconia 6 inch Belt', 'Portable Bench and Back Stand Belts', '', '', 38),
(238, 'SRAO', 'Aluminum Oxide Shop Roll', 'Aluminum Oxide Shop Rolls 1 inch 1 1/2 and 2 inch', '', '', 35),
(239, 'SRAOP', 'Premium Aluminum Oxide Shop Roll', 'Aluminum Oxide Shop Rolls 1 inch 1 1/2 and 2 inch', '', '', 35),
(240, 'STRWNWH', 'EZ Strip Wheel Arbour Hole', 'EZ Strip Wheels 1/2 Arbour Hole', '', '', 41),
(241, 'STRWNWR', 'EZ Strip Wheel Roll On Mounting', 'EZ Strip Wheel Roll On Mounting', '', '', 41),
(242, 'STRWNWS', 'EZ Strip Wheel Spindal Mounting', 'EZ Strip Wheel Roll On Mounting', '', '', 41),
(243, 'STRWSCD', 'EZ Strip Wheel Silicon Carbide', 'EZ Strip Wheel Silicon Carbide Right Angle Grinder', '', '', 41),
(244, 'SGW32A', '32A Grain AO Surface Grinding', '32A Grain Aluminum Oxide Surface Grinding Wheel', '', '', 20),
(245, 'SGW32AP', '32A Porous AO Surface Grinding', '32A Porous Aluminum Oxide Grinding Wheel', '', '', 20),
(246, 'SGWAS3', 'AS3 Ceramic Surface Grinding', 'AS3 Ceramic Surface Grinding Wheel', '', '', 20),
(247, 'SGWAS3P', 'AS3 Porous Ceramic Grinding', 'AS3 Porous Ceramic Surface Grinding Wheel', '', '', 20),
(248, 'SGWBLUE', 'AZ Blue Surface Grinding Wheel', 'AZ Blue Aluminum Oxide Surface Grinding Wheel', '', '', 20),
(249, 'SGWGSC', 'Green Silicon Carbide Wheel', 'Green Silicon Carbide Surface Grinding Wheel', '', '', 20),
(250, 'SGWPAO', 'Pink Aluminum Oxide Wheel', 'Pink Aluminum Oxide Toolroom Grinding Wheel', '', '', 20),
(251, 'SGWRBY', 'Ruby Grain Surface Grinding Wheel', 'Ruby Grain Aluminum Oxide Grinding Wheel', '', '', 20),
(252, 'SGWWAO', 'White Aluminum Oxide Wheel', 'White Aluminum Oxide Surface Grinding Wheel', '', '', 20),
(253, 'SGWPNKP', 'Pink Porous AO Surface Grinding', 'Pink Porous Aluminum Oxide Grinding Wheel', '', '', 20),
(254, 'SGWRBYP', 'Ruby Grain AO Surface Grinding', 'Ruby Grain Aluminum Oxide Grinding Wheel', '', '', 20),
(255, 'BGWAOB', 'Brown Aluminum Oxide Wheel', 'Brown Aluminum Oxide Bench Wheel', '', '', 21),
(256, 'BGWAOBL', 'Blue Aluminum Oxide Wheel', 'Blue Aluminum Oxide Bench Wheel', '', '', 21),
(257, 'BGWSCG', 'Green Silicon Carbide Bench Wheel', 'Green Silicon Carbide Bench Wheel', '', '', 21),
(258, 'CHSCOW', 'Chop Saw Blades', 'Chop Saw Blades Single and Double Reinforced', '', '', 37),
(259, 'COWAOFT', 'Flex Cutoff White Aluminum Oxide', 'White Aluminum Oxide Flex Cutoff  Wheel', '', '', 37),
(260, 'COWAOFTS', 'Cutting-Notching White Wheel', 'White Aluminum Oxide Cutting-Notching Wheel', '', '', 37),
(261, 'COWAORT', 'Regular Quick Cut Aluminum Oxide', 'Regular White Aluminum Oxide Quick Cut Wheel', '', '', 37),
(262, 'COWAOT', 'Aluminum Oxide Cutoff Wheels', 'Standard Aluminum Oxide Cutoff Wheels', '', '', 37),
(263, 'COWZ3T', 'Zirconia Quick Cutoff Wheels', 'Zirconia Quick Cutoff Wheels', '', '', 37),
(264, 'COWZAFT', 'Zirconia AO Flexable Cutoff Wheel', 'Zirconia Aluminum Oxide Flexable Cutoff Wheels', '', '', 37),
(265, 'COWZART', 'Zirconia AO Rigid Cutoff Wheels', 'Zirconia Aluminum Oxide Rigid Cutoff Wheels', '', '', 37),
(266, 'COWZATM', 'Zirconia Aluminum Oxide Mix Wheel', 'Zirconia Aluminum Oxide Mix Cutoff Wheel', '', '', 37),
(267, 'CSCOW', 'Circular Saw Cutoff Wheels', 'Circular Saw Cutoff Wheels', '', '', 37),
(268, 'SSCOW', 'Stationary Saw Cutoff Wheel', 'Stationary Saw Cutoff Wheels', '', '', 37),
(269, 'DBRWAO', 'Aluminum Oxide Deburring Wheel', 'Aluminum Oxide Deburring Wheel', '', '', 42),
(270, 'DBRWAOD', 'Aluminum Oxide Deburring Rt Agl', 'Aluminum Oxide Deburring Wheel Right Angle', '', '', 42),
(271, 'DBRWAOH', 'Aluminum Oxide Unitized Arbour', 'Aluminum Oxide Unitized With Arbour Hole', '', '', 42),
(272, 'DBRWAOR', 'Aluminum Oxide Unitized Role On', 'Aluminum Oxide Unitized Role On Mounting', '', '', 42),
(273, 'DBRWSC', 'Silicon Carbide Deburring Wheels', 'Silicon Carbide Deburring Wheels', '', '', 42),
(274, 'DBRWSCD', 'Silicon Crbd Dbring Whls Rt Angle', 'Silicon Carbide Unitized Deburring Whls Rt Angle', '', '', 42),
(275, 'DBRWSCM', 'Multi Fnsh Sil Crbd Dbrg Whls RtA', 'Multi Finish Silcn Carbide Deburring Whls Rt Angle', '', '', 42),
(276, 'DBRWSCR', 'Silicon Crbd Unitized Deburring RO', 'Silicon Carbide Unitized Deburring Whls Roll On', '', '', 42),
(277, 'DCWAOCG', 'Alu Ox Depressed Centre Wheels', 'Aluminum Oxide Depressed Centre Wheels', '', '', 22),
(278, 'DCWAOCGT', 'Alu Ox Depressed Cntre Wheels-T', 'Aluminum Oxide Depressed Centre Wheels-T', '', '', 22),
(279, 'DCWAOCGTC', 'Depressed Centre Wheels for Tile', 'Depressed Centre Wheels for Tile-Ceramic-Marble', '', '', 22),
(280, 'DCWAOGFT', 'Depressed Centre Wheels-Gr-Fnsh', 'Depressed Center  Wheels-Grind-Finish', '', '', 22),
(281, 'DCWAOGT', 'Fast Cut AluOx Dpr Cntr  Wheels', 'Fast Cut Alu Ox Depressed Center  Wheels', '', '', 22),
(282, 'DCWAOGTA', 'Depressed Center  Wheels For Alu', 'Depressed Center  Wheels For Aluminum', '', '', 22),
(283, 'DCWAOGTC', 'Dpr Center  Wheels For Concrete', 'Depressed Center  Wheels For Concrete', '', '', 22),
(284, 'DCWAOGTS', 'White Alu Ox Dpr Center  Wheels', 'White Alu Ox Depressed Center  Wheels-Stainless', '', '', 22),
(285, 'DCWAOPT', 'Dpr Center  Wheels-Pipe Line', 'Depressed Center  Wheels-Pipe Line', '', '', 22),
(286, 'DCWZ3CGT', 'Zirconia Dpr Center  Wheels-T', 'Zirconia Depressed Center  Wheels-T', '', '', 22),
(287, 'DCWZACGT', 'Zirconia Depressed Center  Wheels', 'Zirconia Depressed Center  Wheels', '', '', 22),
(288, 'DCWZAGT', 'Zirconia Grinding Dpr Cntr  Wheels', 'Zirconia Grinding Depressed Center  Wheels', '', '', 22),
(289, 'FDA3AT', 'AluOx T27T29 Flap Discs for Alu', 'Aluminum Oxide T27-T29 Flap Discs for Aluminum', '', '', 23),
(290, 'FDA3T', 'Aluminum Oxide T27-T29 Flap Discs', 'Aluminum Oxide T27-T29 Flap Discs', '', '', 23),
(291, 'FDA3TXL', 'Alu Oxide XL T27-T29 Flap Discs', 'Aluminum Oxide XL T27-T29 Flap Discs', '', '', 23),
(292, 'FDC3', 'Compact Ceramic Flap Discs', 'Compact Ceramic Flap Discs', '', '', 23),
(293, 'FDC3T', 'Compact Ceramic T27T29 FlapDiscs', 'Compact Ceramic T27-T29 Flap Discs', '', '', 23),
(294, 'FDC3XL', 'Compact Ceramic XL Flap Discs', 'Compact Ceramic XL Flap Discs', '', '', 23),
(295, 'FDNWT', 'Surface Cnd NWvn T29 Flap Discs', 'Surface Conditioning Non Woven T29 Flap Discs', '', '', 23),
(296, 'FDSCT', 'Silicon Carbide T27-T29 Flap Discs', 'Silicon Carbide T27-T29 Flap Discs', '', '', 23),
(297, 'FDZ3', 'ZirconiaCmpct Trimmable FlapDiscs', 'Zirconia Compact Trimmable Flap Discs', '', '', 23),
(298, 'FDZ3T', 'Zirconia T27-T29 Flap Discs', 'Zirconia T27-T29 Flap Discs', '', '', 23),
(299, 'FDZ3TA', 'Zirconia T27-T29 Flap Discs Alu Bk', 'Zirconia T27-T29 Flap Discs Aluminum Back', '', '', 23),
(300, 'FDZ3TF', 'Zirconia T27-T29 Flap Discs Flex Bk', 'Zirconia T27-T29 Flap Discs Flexable Back', '', '', 23),
(301, 'FDZ3TMR', 'Zirconia T27-T29 Flap Disc MiniRO', 'Zirconia T27-T29 Flap Discs Mini Roll On', '', '', 23),
(302, 'FDZ3TMT', 'ZirconiaS-TpT27T29FlapDiscMiniTO', 'Zirconia S-TypeT27-T29 Flap Discs Mini Turn On', '', '', 23),
(303, 'FDZ3TPC', 'Zirconia PlyCtnT27T29 FlapDisc', 'Zirconia Poly Cotten T27-T29 Flap Discs', '', '', 23),
(304, 'FDZ3TSZ', 'Zirconia SeeThru T27-T29 FlapDisc', 'Zirconia See Thru T27-T29 Flap Discs', '', '', 23),
(305, 'FDZ3TXL', 'Zirconia XL T27-T29 Flap Discs', 'Zirconia XL T27-T29 Flap Discs', '', '', 23),
(306, 'FDZ3TXLA', 'ZirconiaXL T27-T29 Flap Disc AluBk', 'Zirconia XL T27-T29 Flap Discs Aluminum Backed', '', '', 23),
(307, 'FDZ3TXLF', 'Zirconia XL T27-T29 Flap Disc FlxBk', 'Zirconia XL T27-T29 Flap Discs Flexable Back', '', '', 23),
(308, 'FDZ3TXLPC', 'Zirconia PCtn XL T27-T29 FlapDisc', 'Zirconia Poly Cotten XL T27-T29 Flap Discs', '', '', 23),
(309, 'FDZ3TXXL', 'Zirconia XXL T27-T29 Flap Discs', 'Zirconia XXL T27-T29 Flap Discs', '', '', 23),
(310, 'FDZ3UT', 'Zirconia ULT T27-T29 Flap Discs', 'Zirconia ULT T27-T29 Flap Discs', '', '', 23),
(311, 'FDZ3XL', 'Zirconia XL Flap Discs', 'Zirconia XL Flap Discs', '', '', 23),
(312, 'FDZST', 'Zirconia Stnls T27-T29 Flap Discs', 'Zirconia Stainless T27-T29 Flap Discs', '', '', 23),
(313, 'FDZSTXL', 'Zirconia Stnls XL T27-T29 Flap Disc', 'Zirconia Stainless XL T27-T29 Flap Discs', '', '', 23),
(314, 'FWAO', 'Aluminum Oxide Flap Wheels', 'Aluminum Oxide Flap Wheels', '', '', 39),
(315, 'FWAODRM', 'Alu Oxide Flap Wheel KyDrum', 'Aluminum Oxide Flap Wheels Keyhole Drum', '', '', 39),
(316, 'FWAOM', 'Aluminum Oxide Mini Flap Wheels', 'Aluminum Oxide Mini Flap Wheels', '', '', 39),
(317, 'FWIADRM', 'Interleaf Flap Wheel Drum Keyhole', 'Interleaf Flap Wheel Drum With Keyhole', '', '', 39),
(318, 'FWIN', 'Interleaf Flap Wheels', 'Interleaf Flap Wheels', '', '', 39),
(319, 'FWNW', 'Non Woven Flap Wheels', 'Non Woven Flap Wheels', '', '', 39),
(320, 'FWNWDRM', 'NonWoven FlapWheel DrumKey', 'Non Woven Flap Wheel Drum With Keyhole', '', '', 39),
(321, 'FWUMAO', 'Alu Oxide Unmounted Flap Wheels', 'Aluminum Oxide Unmounted Flap Wheels', '', '', 39),
(322, 'FWZ3AO', 'Zirconia Alu Oxide Flap Wheels', 'Zirconia Aluminum Oxide Flap Wheels', '', '', 39),
(323, 'FWZADRM', 'Zirconia AluOx Flap Wheel Kh Drum', 'Zirconia Aluminum Oxide Flap Wheel Kh Drum', '', '', 39),
(324, 'MTDPTS', 'Mounted Points A-B-W Shapes', 'Mounted Points Pink Aluminum Oxide ', '', '', 34),
(325, 'NWDRO', 'Roll On Non Woven Discs', 'Roll On Non Woven Discs', '', '', 36),
(326, 'NWDTO', 'Turn On Non Woven Discs', 'Turn On Non Woven Discs', '', '', 36),
(327, 'PLDNWSCH', 'Surface Condition Discs with Hole', 'Surface Conditioning Discs with Hole', '', '', 40),
(328, 'PLNWPDS', 'Non-Woven Industrial Hand Pads', 'Non-Woven Industrial Hand Pads', '', '', 40),
(329, 'RFDAO', 'Aluminum Oxide Resin Fibre Discs', 'Aluminum Oxide Resin Fibre Discs', '', '', 24),
(330, 'RFDAODC', 'Alu Ox Dpr Cntr Resin Fibre Discs', 'Alu Oxide Depressed Centre Resin Fibre Discs', '', '', 24),
(331, 'RFDAOF', 'Alu Oxide Flat Resin Fibre Discs', 'Aluminum Oxide Flat Resin Fibre Discs', '', '', 24),
(332, 'RFDAOO', 'Alu Ox OpenCoat Resin Fibre Discs', 'Aluminum Oxide Open-Coated Resin Fibre Discs', '', '', 24),
(333, 'RFDAOQ', 'Alu Ox Quick Change Rsn Fbr Discs', 'Aluminum Oxide Quick Change Resin Fibre Discs', '', '', 24),
(334, 'RFDAOR', 'Ceramic Quick Change Discs RollOn', 'Ceramic C3 Quick Change Discs Roll On', '', '', 24),
(335, 'RFDAOTO', 'Alu Ox Coated Fibre Discs-Turn On', 'Aluminum Oxide Coated Fibre Discs-Turn On', '', '', 24),
(336, 'RFDC3', 'Ceramic Rsn Fbr Disc-Carbon Steel', 'Ceramic C3 Resin Fibre Discs-Carbon Steel', '', '', 24),
(337, 'RFDC3TO', 'Ceramic Ctd  Resin Fibre Discs TO', 'Ceramic C3 Coated  Resin Fibre Discs Turn On', '', '', 24),
(338, 'RFDSC', 'Silicon Carbide Resin Fibre Discs', 'Silicon Carbide Resin Fibre Discs', '', '', 24),
(339, 'RFDZ3', 'Zirconia Resin Fibre Discs', 'Zirconia Resin Fibre Discs', '', '', 24),
(340, 'RFDZ3AGR', 'Zirconia Alu Oxide Grinding Aid RO', 'Zirconia Alu Oxide With Grinding Aid Roll On', '', '', 24),
(341, 'RFDZ3AOR', 'Zirconia Alu Oxide Fibre Discs RO', 'Zirconia Alu Oxide Coated Fibre Discs-Roll On', '', '', 24),
(342, 'RFDZ3DC', 'Zirconia Dpr Cntr Resin Fibre Discs', 'Zirconia Depressed Centre Resin Fibre Discs', '', '', 24),
(343, 'RFDZ3F', 'Zirconia Flat Resin Fibre Discs', 'Zirconia Flat Resin Fibre Discs', '', '', 24),
(344, 'RFDZ3Q', 'Zirconia Quick Change Fibre Discs', 'Zirconia Quick Change Resin Fibre Discs', '', '', 24),
(345, 'RFDZAGTO', 'Zirconia Alu Oxide W-Grinding Aid', 'Zirconia Alu Oxide W/Grnd Aid Fibre Discs-Turn On', '', '', 24),
(346, 'SFAOT', 'Alu Ox Semi-Flex Sanding Discs', 'Aluminum Oxide Semi-Flex Sanding Discs', '', '', 24),
(347, 'SFSCT', 'Silicon Crbd SmiFlx Sanding Discs', 'Silicon Carbide Semi-Flex Sanding Discs', '', '', 24),
(348, 'RFDC3Q', 'Ceramic Q-Change Rsn Fibre Discs', 'Ceramic C3 Quick Change Resin Fibre Discs', '', '', 24),
(349, 'RFDZAOTO', 'Zirconia Alu Ox Coated Fibre Discs', 'Zirconia Alu Oxide Coated Fibre Discs-Turn On', '', '', 24),
(350, 'NTRLNY', 'Natural Cable Ties', 'Natural Nylon Cable Ties', '', '', 43),
(351, 'UVBLK', 'UV Black Cable Ties', 'UV Black Stabilized Cable Ties', '', '', 43),
(352, 'HSTBT', 'Heat Stabilized Black Cable Ties', 'Heat Stabilized Black Cable Ties', '', '', 43),
(353, 'DSHP', 'High Pressure Die Spring', 'High Pressure Die Spring', '', '', 45),
(354, 'DSMHP', 'Medium High Pressure Die Spring', 'Medium High Pressure Die Spring', '', '', 45),
(355, 'DSMP', 'Medium Pressure Die Spring', 'Medium Pressure Die Spring', '', '', 45),
(356, 'DSXHP', 'Extra High Pressure Die Spring', 'Extra High Pressure Die Spring', '', '', 45),
(357, 'O1DRLRD', 'Oil Hard -O1- Drill Rod', 'Oil Hard (O1) Drill Rod', '', '', 12),
(358, 'WDRLRD', 'Water Hard Drill Rod', 'Water Hard Drill Rod', '', '', 12),
(359, 'BRSMSTK', 'Brass Shim Stock', 'Brass Shim Stock', '', '', 46),
(360, 'STSMSTK', 'Spring Steel Shim Stock', 'Spring Steel Shim Stock', '', '', 46),
(361, 'BTSMSTK', 'Blue Tempered Shim Stock', 'Blue Tempered Shim Stock', '', '', 46),
(362, 'O1DRLRDM', 'Metric Oil Hard -O1- Drill Rod', 'Metric Oil Hard (O1) Drill Rod', '', '', 12),
(363, 'RKYSTK', 'Rectangular Key Stock', 'Rectangular Key Stock', '', '', 44),
(364, 'SKYSTK', 'Square Key Stock', 'Square Key Stock', '', '', 44),
(365, 'GF18STK', 'Ground Flat Stock Oil Hard 18inch', 'Ground Flat Stock (O1) Oil Hard 18 inch', '', '', 13),
(366, 'GF36STK', 'Ground Flat Stock Oil Hard 36 inch', 'Ground Flat Stock (O1) Oil Hard 36 inch', '', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_code` int(10) UNSIGNED NOT NULL,
  `supplier_id` varchar(20) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `add_street` varchar(100) NOT NULL,
  `add_city` varchar(15) NOT NULL,
  `add_state` varchar(15) NOT NULL,
  `add_country` varchar(15) NOT NULL,
  `add_postal_code` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` varchar(15) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_price_index`
--

CREATE TABLE `supplier_price_index` (
  `price_code` int(10) UNSIGNED NOT NULL,
  `supplier_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(30) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_code` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_code`, `type_name`, `type_desc`) VALUES
(1, 'Fasteners', 'Screws-Bolts and Nuts'),
(2, 'Fittings Plugs and Clamps', 'Brass-Steel Pipe Fittings Plugs Clamps CableTies'),
(5, 'Stocked', 'Stocked Supplies'),
(6, 'Printer Cartrages', 'Printer Cartrages and Ribbons'),
(7, 'Paper Letter Size', 'Paper Letter Size 8  1/2 X 11'),
(8, 'Paper Legal Size', 'Paper Legal Size 8 1/2 X 14'),
(9, 'Toilett Paper', 'Toilett Paper'),
(10, 'Paper Towel', 'Paper Towel'),
(11, 'Facial Tissue', 'Facial Tissue'),
(12, 'Abrasives', 'Abrasives-Grinding-Pollishing-Cutting'),
(13, 'Drills and Cutting Tools', 'Tap-End Mill-Die-Cutter-Burr-Reamer-Counterbore'),
(14, 'Springs', 'Die-Compression-Extention'),
(15, 'Chemicals Paints and Wipers', 'Chemicals-Paints-Cutting Fluid-Blue-Wipers'),
(16, 'Adhesives', 'Gue-Sealants-Pipe Sealer'),
(17, 'Test', 'Test');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_categories`
--
CREATE TABLE `v_categories` (
`cat_code` int(10) unsigned
,`cat_name` varchar(50)
,`cat_desc` varchar(100)
,`sub_cat_code` int(10) unsigned
,`sub_cat_id` varchar(20)
,`sub_cat_name` varchar(50)
,`sub_cat_desc` varchar(100)
,`sub_cat_detail1` varchar(100)
,`sub_cat_detail2` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_classification`
--
CREATE TABLE `v_classification` (
`class_code` int(10) unsigned
,`class_name` varchar(50)
,`class_desc` varchar(100)
,`type_code` int(10) unsigned
,`type_name` varchar(50)
,`type_desc` varchar(100)
,`cat_code` int(10) unsigned
,`cat_name` varchar(50)
,`cat_desc` varchar(100)
,`sub_cat_code` int(10) unsigned
,`sub_cat_id` varchar(20)
,`sub_cat_name` varchar(50)
,`sub_cat_desc` varchar(100)
,`sub_cat_detail1` varchar(100)
,`sub_cat_detail2` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_distributors_catalog`
--
CREATE TABLE `v_distributors_catalog` (
`catalog_code` int(10) unsigned
,`catalog_name` varchar(20)
,`dist_code` int(10) unsigned
,`catalog_detail_code` int(10) unsigned
,`part_code` int(10) unsigned
,`assigned` tinyint(1)
,`min_value` int(10) unsigned
,`max_value` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `_cust_inv_log_1`
--

CREATE TABLE `_cust_inv_log_1` (
  `log_code` int(10) UNSIGNED NOT NULL,
  `cust_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `part_quantity` int(10) UNSIGNED NOT NULL,
  `action_quantity` int(10) UNSIGNED NOT NULL,
  `action` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_cust_inv_log_1`
--

INSERT INTO `_cust_inv_log_1` (`log_code`, `cust_code`, `part_code`, `part_quantity`, `action_quantity`, `action`, `timestamp`) VALUES
(22, 1, 50, 0, 100, 1, '2010-07-19 11:16:19'),
(23, 1, 3, 0, 11, 1, '2010-07-19 11:16:41'),
(24, 1, 62, 0, 100, 1, '2010-07-22 14:37:31'),
(25, 1, 61, 0, 200, 1, '2010-07-22 14:37:31'),
(26, 1, 62, 100, 50, 1, '2010-07-22 17:11:13'),
(27, 1, 62, 150, 25, 2, '2010-07-22 17:11:32'),
(28, 1, 62, 125, 26, 4, '2010-07-22 17:12:09'),
(29, 1, 62, 99, 101, 3, '2010-07-24 14:12:14'),
(30, 1, 58, 0, 500, 3, '2010-07-24 14:13:11'),
(31, 1, 58, 500, 500, 4, '2010-07-24 14:13:16'),
(32, 1, 62, 200, 100, 4, '2010-07-24 15:53:27'),
(33, 1, 62, 100, 1, 2, '2010-08-03 18:03:45'),
(34, 1, 61, 200, 2, 2, '2010-08-03 18:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `_cust_inv_log_5`
--

CREATE TABLE `_cust_inv_log_5` (
  `log_code` int(10) UNSIGNED NOT NULL,
  `cust_code` int(10) UNSIGNED NOT NULL,
  `part_code` int(10) UNSIGNED NOT NULL,
  `part_quantity` int(10) UNSIGNED NOT NULL,
  `action_quantity` int(10) UNSIGNED NOT NULL,
  `action` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_cust_inv_log_5`
--

INSERT INTO `_cust_inv_log_5` (`log_code`, `cust_code`, `part_code`, `part_quantity`, `action_quantity`, `action`, `timestamp`) VALUES
(1, 5, 58, 130, 5, 4, '2010-07-25 16:03:09'),
(2, 5, 59, 130, 10, 4, '2010-07-25 16:03:09');

-- --------------------------------------------------------

--
-- Structure for view `v_categories`
--
DROP TABLE IF EXISTS `v_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categories`  AS  select `a`.`cat_code` AS `cat_code`,`a`.`cat_name` AS `cat_name`,`a`.`cat_desc` AS `cat_desc`,`b`.`sub_cat_code` AS `sub_cat_code`,`b`.`sub_cat_id` AS `sub_cat_id`,`b`.`sub_cat_name` AS `sub_cat_name`,`b`.`sub_cat_desc` AS `sub_cat_desc`,`b`.`sub_cat_detail1` AS `sub_cat_detail1`,`b`.`sub_cat_detail2` AS `sub_cat_detail2` from (`categories` `a` left join `sub_categories` `b` on((`a`.`cat_code` = `b`.`cat_code`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_classification`
--
DROP TABLE IF EXISTS `v_classification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_classification`  AS  select `a`.`class_code` AS `class_code`,`a`.`class_name` AS `class_name`,`a`.`class_desc` AS `class_desc`,`b`.`type_code` AS `type_code`,`b`.`type_name` AS `type_name`,`b`.`type_desc` AS `type_desc`,`c`.`cat_code` AS `cat_code`,`c`.`cat_name` AS `cat_name`,`c`.`cat_desc` AS `cat_desc`,`c`.`sub_cat_code` AS `sub_cat_code`,`c`.`sub_cat_id` AS `sub_cat_id`,`c`.`sub_cat_name` AS `sub_cat_name`,`c`.`sub_cat_desc` AS `sub_cat_desc`,`c`.`sub_cat_detail1` AS `sub_cat_detail1`,`c`.`sub_cat_detail2` AS `sub_cat_detail2` from ((`classes` `a` join `types` `b`) join `v_categories` `c`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_distributors_catalog`
--
DROP TABLE IF EXISTS `v_distributors_catalog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_distributors_catalog`  AS  select `a`.`catalog_code` AS `catalog_code`,`a`.`catalog_name` AS `catalog_name`,`a`.`dist_code` AS `dist_code`,`b`.`catalog_detail_code` AS `catalog_detail_code`,`b`.`part_code` AS `part_code`,`b`.`assigned` AS `assigned`,`b`.`min_value` AS `min_value`,`b`.`max_value` AS `max_value` from (`distributors_catalog` `a` join `distributors_catalog_detail` `b`) where (`a`.`catalog_code` = `b`.`catalog_code`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captchas`
--
ALTER TABLE `captchas`
  ADD PRIMARY KEY (`cap_code`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_code`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_code`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_code`),
  ADD UNIQUE KEY `cust_id` (`cust_id`),
  ADD KEY `dist_code` (`dist_code`);

--
-- Indexes for table `customer_inventory`
--
ALTER TABLE `customer_inventory`
  ADD PRIMARY KEY (`cust_inv_code`),
  ADD UNIQUE KEY `cust_code_2` (`cust_code`,`part_code`),
  ADD KEY `cust_code` (`cust_code`),
  ADD KEY `part_code` (`part_code`);

--
-- Indexes for table `customer_inventory_log`
--
ALTER TABLE `customer_inventory_log`
  ADD PRIMARY KEY (`log_code`),
  ADD KEY `part_code` (`part_code`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`dist_code`),
  ADD UNIQUE KEY `dist_id` (`dist_id`);

--
-- Indexes for table `distributors_catalog`
--
ALTER TABLE `distributors_catalog`
  ADD PRIMARY KEY (`catalog_code`),
  ADD KEY `dist_code` (`dist_code`);

--
-- Indexes for table `distributors_catalog_detail`
--
ALTER TABLE `distributors_catalog_detail`
  ADD PRIMARY KEY (`catalog_detail_code`),
  ADD UNIQUE KEY `catalog_code_2` (`catalog_code`,`part_code`),
  ADD KEY `catalog_code` (`catalog_code`,`part_code`),
  ADD KEY `part_code` (`part_code`);

--
-- Indexes for table `distributors_staff`
--
ALTER TABLE `distributors_staff`
  ADD PRIMARY KEY (`staff_code`),
  ADD UNIQUE KEY `staff_id` (`staff_id`),
  ADD KEY `dist_code` (`dist_code`);

--
-- Indexes for table `inventory_assignment`
--
ALTER TABLE `inventory_assignment`
  ADD PRIMARY KEY (`assign_code`),
  ADD UNIQUE KEY `dist_code_2` (`dist_code`,`cust_code`,`part_code`),
  ADD KEY `dist_code` (`dist_code`),
  ADD KEY `part_code` (`part_code`),
  ADD KEY `cust_code` (`cust_code`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`opt_code`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`part_code`),
  ADD UNIQUE KEY `part_no` (`part_no`),
  ADD KEY `type_code` (`type_code`),
  ADD KEY `sub_cat_code` (`sub_cat_code`),
  ADD KEY `class_code` (`class_code`);

--
-- Indexes for table `parts_log`
--
ALTER TABLE `parts_log`
  ADD PRIMARY KEY (`log_code`),
  ADD KEY `staff_code` (`staff_code`),
  ADD KEY `part_code` (`part_code`),
  ADD KEY `dist_code` (`dist_code`);

--
-- Indexes for table `parts_specs`
--
ALTER TABLE `parts_specs`
  ADD PRIMARY KEY (`sfv_code`),
  ADD KEY `part_code` (`part_code`,`sf_code`),
  ADD KEY `sf_code` (`sf_code`);

--
-- Indexes for table `sf_name_def`
--
ALTER TABLE `sf_name_def`
  ADD PRIMARY KEY (`sf_code`),
  ADD KEY `sub_cat_code` (`sub_cat_code`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_code`),
  ADD KEY `cat_code` (`cat_code`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_code`);

--
-- Indexes for table `supplier_price_index`
--
ALTER TABLE `supplier_price_index`
  ADD PRIMARY KEY (`price_code`),
  ADD KEY `price_code` (`price_code`),
  ADD KEY `price_code_2` (`price_code`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_code`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `_cust_inv_log_1`
--
ALTER TABLE `_cust_inv_log_1`
  ADD PRIMARY KEY (`log_code`),
  ADD KEY `part_code` (`part_code`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `_cust_inv_log_5`
--
ALTER TABLE `_cust_inv_log_5`
  ADD PRIMARY KEY (`log_code`),
  ADD KEY `part_code` (`part_code`),
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captchas`
--
ALTER TABLE `captchas`
  MODIFY `cap_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_inventory`
--
ALTER TABLE `customer_inventory`
  MODIFY `cust_inv_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_inventory_log`
--
ALTER TABLE `customer_inventory_log`
  MODIFY `log_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `dist_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `distributors_catalog`
--
ALTER TABLE `distributors_catalog`
  MODIFY `catalog_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `distributors_catalog_detail`
--
ALTER TABLE `distributors_catalog_detail`
  MODIFY `catalog_detail_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `distributors_staff`
--
ALTER TABLE `distributors_staff`
  MODIFY `staff_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_assignment`
--
ALTER TABLE `inventory_assignment`
  MODIFY `assign_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `opt_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `part_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `parts_log`
--
ALTER TABLE `parts_log`
  MODIFY `log_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parts_specs`
--
ALTER TABLE `parts_specs`
  MODIFY `sfv_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `sf_name_def`
--
ALTER TABLE `sf_name_def`
  MODIFY `sf_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_price_index`
--
ALTER TABLE `supplier_price_index`
  MODIFY `price_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `_cust_inv_log_1`
--
ALTER TABLE `_cust_inv_log_1`
  MODIFY `log_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `_cust_inv_log_5`
--
ALTER TABLE `_cust_inv_log_5`
  MODIFY `log_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`dist_code`) REFERENCES `distributors` (`dist_code`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `customer_inventory`
--
ALTER TABLE `customer_inventory`
  ADD CONSTRAINT `customer_inventory_ibfk_3` FOREIGN KEY (`cust_code`) REFERENCES `customers` (`cust_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_inventory_ibfk_4` FOREIGN KEY (`part_code`) REFERENCES `parts` (`part_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributors_catalog`
--
ALTER TABLE `distributors_catalog`
  ADD CONSTRAINT `distributors_catalog_ibfk_1` FOREIGN KEY (`dist_code`) REFERENCES `distributors` (`dist_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributors_catalog_detail`
--
ALTER TABLE `distributors_catalog_detail`
  ADD CONSTRAINT `distributors_catalog_detail_ibfk_3` FOREIGN KEY (`catalog_code`) REFERENCES `distributors_catalog` (`catalog_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distributors_catalog_detail_ibfk_4` FOREIGN KEY (`part_code`) REFERENCES `parts` (`part_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributors_staff`
--
ALTER TABLE `distributors_staff`
  ADD CONSTRAINT `distributors_staff_ibfk_1` FOREIGN KEY (`dist_code`) REFERENCES `distributors` (`dist_code`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `inventory_assignment`
--
ALTER TABLE `inventory_assignment`
  ADD CONSTRAINT `inventory_assignment_ibfk_4` FOREIGN KEY (`dist_code`) REFERENCES `distributors` (`dist_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_assignment_ibfk_5` FOREIGN KEY (`cust_code`) REFERENCES `customers` (`cust_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_assignment_ibfk_6` FOREIGN KEY (`part_code`) REFERENCES `parts` (`part_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_ibfk_4` FOREIGN KEY (`class_code`) REFERENCES `classes` (`class_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `parts_ibfk_5` FOREIGN KEY (`type_code`) REFERENCES `types` (`type_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `parts_ibfk_6` FOREIGN KEY (`sub_cat_code`) REFERENCES `sub_categories` (`sub_cat_code`) ON UPDATE CASCADE;

--
-- Constraints for table `parts_log`
--
ALTER TABLE `parts_log`
  ADD CONSTRAINT `parts_log_ibfk_4` FOREIGN KEY (`part_code`) REFERENCES `parts` (`part_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parts_log_ibfk_5` FOREIGN KEY (`dist_code`) REFERENCES `distributors` (`dist_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parts_specs`
--
ALTER TABLE `parts_specs`
  ADD CONSTRAINT `parts_specs_ibfk_4` FOREIGN KEY (`part_code`) REFERENCES `parts` (`part_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parts_specs_ibfk_5` FOREIGN KEY (`sf_code`) REFERENCES `sf_name_def` (`sf_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sf_name_def`
--
ALTER TABLE `sf_name_def`
  ADD CONSTRAINT `sf_name_def_ibfk_1` FOREIGN KEY (`sub_cat_code`) REFERENCES `sub_categories` (`sub_cat_code`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`cat_code`) REFERENCES `categories` (`cat_code`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
