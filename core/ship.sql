-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 10:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'admin', 'rajkumar@gmail.com', 'c63c294a92e253e7f7a3e5417a95e6ae598b68d82d5136d18c8fa9d992474799', '1554825564.3806'),
(2, 'newadmin', 'chondi@gmail.com', 'bd94dcda26fccb4e68d6a31f9b5aac0b571ae266d822620e901ef7ebe3a11d4f', '1553760804.9191');

-- --------------------------------------------------------

--
-- Table structure for table `boilers`
--

CREATE TABLE `boilers` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `oil_fired` varchar(100) NOT NULL,
  `exhaust_gas` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boilers`
--

INSERT INTO `boilers` (`id`, `uni_code`, `oil_fired`, `exhaust_gas`, `created_at`, `update_at`) VALUES
(1, '5ca9d1da36f75', 'Oil Fired', 'Exhaust Gas', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'Oil Fired visitorship', 'Exhaust Gas visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `classhistory`
--

CREATE TABLE `classhistory` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `shipstatus` varchar(60) NOT NULL,
  `from_date` varchar(32) NOT NULL,
  `to_date` varchar(32) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classhistory`
--

INSERT INTO `classhistory` (`id`, `uni_code`, `classification`, `shipstatus`, `from_date`, `to_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'Classification', 'Ship status', '2019-04-09', '2019-04-09', 'Remarks', '2019-04-07', '0000-00-00'),
(2, '5ca9eb6d116cc', 'Classification visitorship', 'Ship status visitorship', '2019-04-25', '2019-04-11', 'Remarks visitorship', '2019-04-07', '0000-00-00'),
(3, '5cacf13f579bf', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `class_machinery_notation` varchar(100) NOT NULL,
  `class_hull_notation` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`id`, `uni_code`, `classification`, `class_machinery_notation`, `class_hull_notation`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'Classification', 'Class Machinery Notation', 'Class Hull Notation', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'Classification visitorship', 'Class Machinery Notation visitorship', 'Class Hull Notation visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `item` varchar(100) NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defect`
--

INSERT INTO `defect` (`id`, `uni_code`, `item`, `criteria`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'itema', 'ehfgjfgjef', 'rfdfdfdf ef eesre erer erere erwrewrwr ewrewr ewrwer werewr werewr ewrewr werewr werewr werwer werwr werew rewrew ewr were ', 'f6f388e92a7474846aa09087fe1fa588.jpg', '2019-04-07', '0000-00-00'),
(2, '5ca9d1da36f75', 'item2', 'ehfgjfgjef', 'erret rtrt rtret rt rtre rtret reter tretre retret retre re ertr et retr reter ertre retret erter tret', '1de9e0346444d6d94929e7785c75244e.jpg', '2019-04-07', '0000-00-00'),
(3, '5ca9eb6d116cc', 'item2 visitorship', 'ehfgjfgjef visitorship', 'sdfsdsdfs  asfsdfsdf dsfsdf dfds sdfsd dfsd dfds ', '1a2ec268c5af4b3c222d0327689a517b.jpg', '2019-04-07', '0000-00-00'),
(4, '5ca9eb6d116cc', 'item2 visitorship', 'ehfgjfgjef visitorship', 'sdcvsdfsdfsdfsdfdsdsfsdfsd', '9c96f7cb9df2afd4e86e3ada9a9e769c.jpg', '2019-04-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE `dimensions` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `gross_tonnage` varchar(100) NOT NULL,
  `net_tonnage` varchar(70) NOT NULL,
  `deadweight` varchar(40) NOT NULL,
  `light_ship` varchar(50) NOT NULL,
  `light_overall` varchar(50) NOT NULL,
  `lbp` varchar(50) NOT NULL,
  `breadth` varchar(50) NOT NULL,
  `draft` varchar(50) NOT NULL,
  `create_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id`, `uni_code`, `gross_tonnage`, `net_tonnage`, `deadweight`, `light_ship`, `light_overall`, `lbp`, `breadth`, `draft`, `create_at`, `updated_at`, `status`) VALUES
(1, '5ca9d1da36f75', 'Gross Tonnage', 'Net Tonnage', 'Deadweight', 'Light Ship', 'Light Overall', 'LBP', 'Breadth', 'Draft', '2019-04-07', '2019-04-07', 0),
(2, '5ca9eb6d116cc', 'Gross Tonnage visitorship', 'Net Tonnage visitorship', 'Deadweight visitorship', 'Light Ship visitorship', 'Light Overall visitorship', 'LBP visitorship', 'Breadth visitorship', 'Draft visitorship', '2019-04-07', '2019-04-07', 0),
(3, '5cacf13f579bf', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0),
(4, '5cacf15647cb7', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0),
(5, '5cacf1666a417', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0),
(6, '5cacfa15350a8', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0),
(7, '5cacfa2587935', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0),
(8, '5cacfa31cbd65', '', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `app_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `uni_code`, `app_file`) VALUES
(1, '5ca9d1da36f75', 'cabb625d1952e84461aedbdc1a5e9015.pdf'),
(2, '5ca9d1da36f75', '77d84c9b70d58f1ab3690704431c3c0b.pdf'),
(3, '5ca9eb6d116cc', '58675537ec7498ac2dcd8582f7e08f26.pdf'),
(4, '5ca9eb6d116cc', 'a4da471f98e9a0a697de9fc95442a81a.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `electrical_installations`
--

CREATE TABLE `electrical_installations` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `generators` varchar(100) NOT NULL,
  `emergency_enerators` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electrical_installations`
--

INSERT INTO `electrical_installations` (`id`, `uni_code`, `frequency`, `generators`, `emergency_enerators`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'Frequency', 'Generators', 'Emergency Generators', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'Frequency visitorship', 'Generators visitorship', 'Emergency Generators visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gallary_img`
--

CREATE TABLE `gallary_img` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary_img`
--

INSERT INTO `gallary_img` (`id`, `uni_code`, `group_name`, `image`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'hull', '35657abee7c79f172c2607d5c84a279b.jpg', '2019-04-07', '0000-00-00'),
(2, '5ca9d1da36f75', 'hull', '3d0d51b024bb09b8b499f4718818d355.jpg', '2019-04-07', '0000-00-00'),
(3, '5ca9d1da36f75', 'mainDeck', 'ba277b59d0e9d81bb52184194a733a90.jpg', '2019-04-07', '0000-00-00'),
(4, '5ca9d1da36f75', 'mainDeck', '77db4b0ae5d0683c80a40ba52e531dd7.jpg', '2019-04-07', '0000-00-00'),
(5, '5ca9d1da36f75', 'BallastTanks', '5ee5f28509634fb2d6eb508460842371.jpg', '2019-04-07', '0000-00-00'),
(6, '5ca9d1da36f75', 'BallastTanks', 'f278f6588783db47078651107132dba1.jpg', '2019-04-07', '0000-00-00'),
(7, '5ca9d1da36f75', 'Superstructure', 'd4b8796b5e7e7a0a17eb7bc2c97e5ae5.jpg', '2019-04-07', '0000-00-00'),
(8, '5ca9d1da36f75', 'Superstructure', '8b7f4e58b6b50c00bf598d7dcd0bdd15.jpg', '2019-04-07', '0000-00-00'),
(9, '5ca9d1da36f75', 'Bridge', '143ec8202a7e920878e0561b3ac81f74.jpg', '2019-04-07', '0000-00-00'),
(10, '5ca9d1da36f75', 'Bridge', 'c63d71b11d4fabf310318628b2d3fc31.jpg', '2019-04-07', '0000-00-00'),
(11, '5ca9d1da36f75', 'MachinerySpaces', '925d3afe556ba635db887f19549e925e.jpg', '2019-04-07', '0000-00-00'),
(12, '5ca9d1da36f75', 'MachinerySpaces', 'a31ee9d6ed83027da721cfb201aaea09.jpg', '2019-04-07', '0000-00-00'),
(13, '5ca9d1da36f75', 'FirefightingEquipment', '39638a258eec3fb410764f99c5af8eb4.jpg', '2019-04-07', '0000-00-00'),
(14, '5ca9d1da36f75', 'FirefightingEquipment', '3f2e5640677050f506d735438c17e583.jpg', '2019-04-07', '0000-00-00'),
(15, '5ca9d1da36f75', 'LifesavingAppliances', '2c3b4122a55111e2c4a92b2ebc1af4f5.jpg', '2019-04-07', '0000-00-00'),
(16, '5ca9d1da36f75', 'LifesavingAppliances', 'c40664f3f78b7a4adaacdcd00b250677.jpg', '2019-04-07', '0000-00-00'),
(17, '5ca9d1da36f75', 'MooringEquipment', '3ecb51a25bc6dd437efa5e06854b2e74.jpg', '2019-04-07', '0000-00-00'),
(18, '5ca9d1da36f75', 'MooringEquipment', '91a2542e16461a2d9c8ae2019089c47a.jpg', '2019-04-07', '0000-00-00'),
(19, '5ca9d1da36f75', 'PollutionEquipment', 'd995901eeb27fc8506533332784c2326.jpg', '2019-04-07', '0000-00-00'),
(20, '5ca9d1da36f75', 'PollutionEquipment', 'fd93adc95442b22cdee3999b8da5a3cb.jpg', '2019-04-07', '0000-00-00'),
(21, '5ca9d1da36f75', 'Accommodation', '3356608612735789836d1b00ea4035a3.jpg', '2019-04-07', '0000-00-00'),
(22, '5ca9d1da36f75', 'Accommodation', '18487b68c31d62663469d5126135540c.jpg', '2019-04-07', '0000-00-00'),
(23, '5ca9d1da36f75', 'CargoSystems', 'fd6ab4341643f179de89e77cef998357.jpg', '2019-04-07', '0000-00-00'),
(24, '5ca9d1da36f75', 'CargoSystems', 'd33b7208c49b72a3a6557852d5cace04.jpg', '2019-04-07', '0000-00-00'),
(25, '5ca9eb6d116cc', 'hull', '2369c9fe4ded678948dd63389f6f3791.jpg', '2019-04-07', '0000-00-00'),
(26, '5ca9eb6d116cc', 'hull', 'a9f3298347037f6759e2342459fc12fd.jpg', '2019-04-07', '0000-00-00'),
(27, '5ca9eb6d116cc', 'mainDeck', '2cccf1dad549ebc955b581c83d8b30ed.jpg', '2019-04-07', '0000-00-00'),
(28, '5ca9eb6d116cc', 'mainDeck', '759c2d00bacf65505d72781e95cc4282.jpg', '2019-04-07', '0000-00-00'),
(29, '5ca9eb6d116cc', 'BallastTanks', '1369894a85932814ead5eb39b04e59f3.jpg', '2019-04-07', '0000-00-00'),
(30, '5ca9eb6d116cc', 'BallastTanks', '9aa2e39908790eaa4ec86002392cf2ae.jpg', '2019-04-07', '0000-00-00'),
(31, '5ca9eb6d116cc', 'Superstructure', '986b09c48738e5bcfaec0de872db0889.jpg', '2019-04-07', '0000-00-00'),
(32, '5ca9eb6d116cc', 'Superstructure', '68f3d8faf7cbbbb65b18d04c211e0e08.jpg', '2019-04-07', '0000-00-00'),
(33, '5ca9eb6d116cc', 'Bridge', '08ce4c1ad6d56ee911d0ed15241e4173.jpg', '2019-04-07', '0000-00-00'),
(34, '5ca9eb6d116cc', 'Bridge', 'f877f47ab9f6415ff5d4104d204d0793.jpg', '2019-04-07', '0000-00-00'),
(35, '5ca9eb6d116cc', 'MachinerySpaces', '2ec367d7e523476cc66d797d8a682a87.jpg', '2019-04-07', '0000-00-00'),
(36, '5ca9eb6d116cc', 'MachinerySpaces', 'b0d2012308beb498ddf0005cfd06198e.jpg', '2019-04-07', '0000-00-00'),
(37, '5ca9eb6d116cc', 'FirefightingEquipment', 'debdce3904787e7cc1e75e782b134dcd.jpg', '2019-04-07', '0000-00-00'),
(38, '5ca9eb6d116cc', 'FirefightingEquipment', 'b759c94157949f0014ced517d486826e.jpg', '2019-04-07', '0000-00-00'),
(39, '5ca9eb6d116cc', 'LifesavingAppliances', '292c737c6cb307150b9e253aedc77b9e.jpg', '2019-04-07', '0000-00-00'),
(40, '5ca9eb6d116cc', 'LifesavingAppliances', '73f20ac5da2a17ac9e018fddac9971e1.jpg', '2019-04-07', '0000-00-00'),
(41, '5ca9eb6d116cc', 'MooringEquipment', '50958edff4cd7f70b87123f578257d13.jpg', '2019-04-07', '0000-00-00'),
(42, '5ca9eb6d116cc', 'MooringEquipment', '8a32b11e84d5aedd86c787d57a2c91e6.jpg', '2019-04-07', '0000-00-00'),
(43, '5ca9eb6d116cc', 'PollutionEquipment', '844ecfaa107d618df8936e846ad59181.jpg', '2019-04-07', '0000-00-00'),
(44, '5ca9eb6d116cc', 'PollutionEquipment', 'a4cb56e5204eac71917ec068cbd672e6.jpg', '2019-04-07', '0000-00-00'),
(45, '5ca9eb6d116cc', 'Accommodation', '1344dbddeb434514656e4cc6c6f8bb54.jpg', '2019-04-07', '0000-00-00'),
(46, '5ca9eb6d116cc', 'Accommodation', '53042045a1f544d2ae3225e2aace54b6.jpg', '2019-04-07', '0000-00-00'),
(47, '5ca9eb6d116cc', 'CargoSystems', '0800e55030948ae200a86b395705bc8c.jpg', '2019-04-07', '0000-00-00'),
(48, '5ca9eb6d116cc', 'CargoSystems', 'b07d76e427feb2a8927d7d83e2cd3b1c.jpg', '2019-04-07', '0000-00-00'),
(49, '5cacf1666a417', 'mainDeck', '7ed24db130f1be411c3a140bfb0fa1b0.jpg', '2019-04-09', '0000-00-00'),
(50, '5cacf1666a417', 'mainDeck', '6363f54437c5db5741c8070adf5885aa.jpg', '2019-04-09', '0000-00-00'),
(51, '5cacf1666a417', 'hull', 'c6b917981da1a1110f17b34115c64ef9.jpg', '2019-04-09', '0000-00-00'),
(52, '5cacf1666a417', 'hull', '6da7dca12851503ef90b21f5d3c8d2fc.jpg', '2019-04-09', '0000-00-00'),
(53, '5cacf1666a417', 'BallastTanks', 'c40a9d1b49a768f6c60c3c79ad11b0ad.jpg', '2019-04-09', '0000-00-00'),
(54, '5cacf1666a417', 'BallastTanks', '8c2e99b1b9471968bf8dc37ac5d17286.jpg', '2019-04-09', '0000-00-00'),
(55, '5cacf1666a417', 'hull', '43ad2a135da311ba7ca41c6356f46529.jpg', '2019-04-09', '0000-00-00'),
(56, '5cacf1666a417', 'mainDeck', 'dc72c6c0f303a1857446fca89fe91724.jpg', '2019-04-09', '0000-00-00'),
(57, '5cacfa31cbd65', 'hull', '4caafd0a798388ef8c19451261e4a2cf.jpg', '2019-04-09', '0000-00-00'),
(58, '5cacfa31cbd65', 'hull', 'd721f2a88edeb2077272d655c8661281.jpg', '2019-04-09', '0000-00-00'),
(59, '5cacfa31cbd65', 'hull', '1dfd1aaf398045dc33e62a00a2ea4570.jpg', '2019-04-09', '0000-00-00'),
(60, '5cacfa31cbd65', 'hull', '48fb7a7548a81123a3f75ff7c04c977c.jpg', '2019-04-09', '0000-00-00'),
(61, '5cacfa31cbd65', 'hull', 'a354c7dceebcd3f9a2834fd4db9a0f5e.jpg', '2019-04-09', '0000-00-00'),
(62, '5cacfa31cbd65', 'hull', '95bcd12f53cf0954e664a5cceb701af4.jpg', '2019-04-09', '0000-00-00'),
(63, '5cacfa31cbd65', 'hull', 'ab2f475eba5a31aff3e550170e331952.jpg', '2019-04-09', '0000-00-00'),
(64, '5cacfa31cbd65', 'hull', '836f810d10b98b6d48e8b72ac6bfba35.jpg', '2019-04-09', '0000-00-00'),
(65, '5cacfa31cbd65', 'mainDeck', '31f759846d18a2e0bcabafc960fcf312.jpg', '2019-04-09', '0000-00-00'),
(66, '5cacfa31cbd65', 'mainDeck', '90e5d7f1d3f73048efe2ff322e8ca042.jpg', '2019-04-09', '0000-00-00'),
(67, '5cacfa31cbd65', 'mainDeck', 'c7f4f10becdc5ea36dfbb8a10ea370b4.jpg', '2019-04-09', '0000-00-00'),
(68, '5cacfa31cbd65', 'BallastTanks', 'ce3c82efe159607beeccaa699c41ea65.jpg', '2019-04-09', '0000-00-00'),
(69, '5cacfa31cbd65', 'BallastTanks', '7fb85b39d3202f14e1625b00106cfb1c.jpg', '2019-04-09', '0000-00-00'),
(70, '5cacfa31cbd65', 'BallastTanks', '119db2bf550ce7b613506b2a28c1c944.jpg', '2019-04-09', '0000-00-00'),
(71, '5cacfa31cbd65', 'BallastTanks', '75d6cff1e2d3afca6562971af7a5528a.jpg', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hull`
--

CREATE TABLE `hull` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `bulider` varchar(100) NOT NULL,
  `date_of_bulid` varchar(100) NOT NULL,
  `place_of_bulid` varchar(100) NOT NULL,
  `yard_no` varchar(100) NOT NULL,
  `hull_material` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hull`
--

INSERT INTO `hull` (`id`, `uni_code`, `bulider`, `date_of_bulid`, `place_of_bulid`, `yard_no`, `hull_material`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'Builder', '2019-04-09', 'Place of Build', '343535', 'Hull Material', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'Builder visitorship', '2019-01-16', 'Place of Build visitorship', '343539', 'Hull Material visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `indntification`
--

CREATE TABLE `indntification` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `ship_name` varchar(100) NOT NULL,
  `ship_type` varchar(50) NOT NULL,
  `official_no` varchar(50) NOT NULL,
  `call_sing` varchar(50) NOT NULL,
  `port_of_registry` varchar(100) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `ex_names` varchar(50) NOT NULL,
  `exflag` varchar(50) NOT NULL,
  `create_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indntification`
--

INSERT INTO `indntification` (`id`, `uni_code`, `ship_name`, `ship_type`, `official_no`, `call_sing`, `port_of_registry`, `flag`, `ex_names`, `exflag`, `create_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'cargoship', 'transport ', '1234567', 'incoming sing', 'London', 'London', 'ds', 'dsdsd', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'visitorship', 'Ship Type', '1234568', 'incoming sing all', 'port of island', 'island', 'visitorship', 'visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', 'SAMPLE CONTAINER SHIP DEMO 3', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', 'SAMPLE CONTAINER SHIP DEMO 4', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', 'SAMPLE CONTAINER SHIP DEMO 5', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', 'SAMPLE CONTAINER SHIP DEMO 6', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', 'SAMPLE CONTAINER SHIP DEMO 7', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', 'SAMPLE CONTAINER SHIP DEMO 8', 'Cargo', '8738777834', 'XDXX', 'XXX', 'Grenn', 'EDW', 'XXX', '2019-04-09', '2019-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `form_date` date NOT NULL,
  `to_date` date NOT NULL,
  `location` varchar(150) NOT NULL,
  `aduit_type` varchar(50) NOT NULL,
  `additional_Information` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `user_id`, `uni_code`, `name`, `company_name`, `phone`, `email`, `form_date`, `to_date`, `location`, `aduit_type`, `additional_Information`, `created_at`, `status`) VALUES
(4, 1, '', 'Golam Foysol', 'frtsdsdsfsfs', '01711085530', 'mesuq.live@yahoo.com', '2019-04-09', '2019-04-10', 'dfgfdgfdgfdg', 'ISO 14001 Audit', 'dsdgfgd', '2005-04-19 00:00:00', 0),
(5, 1, '', 'nahid', 'frtsdsdsfsfs', '017110855322', 'drajkumar@gmail.com', '2019-04-11', '2019-02-25', 'dftdtgdgd', 'Navigation Audit', 'dvfdgdgdg', '2005-04-19 00:00:00', 0),
(6, 3, '', 'foysal', 'sddfdsffds', '017110855322', 'mesuq.live@yahoo.com', '2019-04-11', '2019-04-10', 'csdsd', 'ISO 14001 Audit', 'dsdfdsf', '2005-04-19 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `main_engine_model` varchar(100) NOT NULL,
  `total_power` varchar(100) NOT NULL,
  `stroke_bore` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rpm` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `speed_of_ship` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`id`, `uni_code`, `main_engine_model`, `total_power`, `stroke_bore`, `type`, `rpm`, `manufacturer`, `speed_of_ship`, `created_at`, `updated_at`) VALUES
(1, '5ca9d1da36f75', 'Main Engine Model', 'Total Power', 'Stroke/Bore', 'Type', 'RPM', 'Manufacturer', 'Speed of the Ship', '2019-04-07', '2019-04-07'),
(2, '5ca9eb6d116cc', 'Main Engine Model visitorship', 'Total Power visitorship', 'Stroke/Bore visitorship', 'Type visitorship', 'RPM visitorship', 'Manufacturer visitorship', 'Speed of the Ship visitorship', '2019-04-07', '2019-04-07'),
(3, '5cacf13f579bf', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(4, '5cacf15647cb7', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(5, '5cacf1666a417', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(6, '5cacfa15350a8', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(7, '5cacfa2587935', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00'),
(8, '5cacfa31cbd65', '', '', '', '', '', '', '', '2019-04-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `send_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `send_at`, `status`) VALUES
(2, 'rajkumar', 'rajkumar@gmail.com', 'dfhgghfdgh', '2027-03-19 18:03:20', 0),
(3, 'rajkumarddddd', 'rajkumar@gmail.com', 'jhgjhjgjg kj jkhgg hkgg jkk khghg jhghjgjh jhgjhgj hjgjhg jhgjhg jhgjhgjh jhgjhg jhgjhgj jhgjhgj jhhgjgjh jhgjhgh jhgjhg  hgjhg jhgjhg jhgjhg jhgjhg jhgjhg jhgj hg jhgjhg jhhgjh jhgjh jhgjh jhgjh jhgj jhgjh jgjhgjhg jhgjhg jh', '2027-03-19 18:03:42', 0),
(4, 'rajkumar', 'rajkumar@gmail.com', 'jhgbjh jkhjfjhf jkhhgh hjgjhg kggh hgjg jhgjhgj jhgjhg jhgjhg jhgjhg jhgjh gjhgjhg jhjgjhg jhgjhg jhgjhg jhjgjhg jhgjhgj jhjjhg jhjhg jhgjhg jhgjg jhgjhg jhgjhg jhgjhg jhgjg jhgjgjh jhjhjhg jhgjhjh jhhgjhgj jgjhgj jhjhgjh jhgjhgjh jgj jhgj h jgjhgjh jgj hgjhgh', '2027-03-19 18:03:47', 0),
(5, 'rajkumar', 'rajkumar@gmail.com', 'ghvjhgu', '2004-04-19 16:04:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply_inquiry`
--

CREATE TABLE `reply_inquiry` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_inquiry`
--

INSERT INTO `reply_inquiry` (`id`, `user_id`, `message`, `created_at`, `status`) VALUES
(10, 1, 'effffffffff', '2019-04-05', 0),
(12, 3, 'sdsfdsfsdf', '2019-04-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipall`
--

CREATE TABLE `shipall` (
  `id` int(11) NOT NULL,
  `ship_unicode` varchar(50) NOT NULL,
  `shipname` varchar(200) NOT NULL,
  `shipimo` varchar(100) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipall`
--

INSERT INTO `shipall` (`id`, `ship_unicode`, `shipname`, `shipimo`, `picture`, `created_at`, `updated_at`, `status`) VALUES
(1, '5ca9d1da36f75', 'SAMPLE CONTAINER SHIP DEMO 2', '10000', '5efaffcfd478de937c3d35c48d376b9a.jpg', '2019-04-07 00:00:00', '2019-04-09 19:00:05', 0),
(2, '5ca9eb6d116cc', 'SAMPLE CONTAINER SHIP DEMO 1 ', '10001', '6211019dcbacb758bdbd903963e4d060.jpg', '2019-04-07 00:00:00', '2019-04-09 19:23:13', 0),
(3, '5cacf13f579bf', 'SAMPLE CONTAINER SHIP DEMO 3', '345435', '4d973626f8647f03351da38d4c5ecd61.jpg', '2019-04-09 00:00:00', '0000-00-00 00:00:00', 0),
(4, '5cacf15647cb7', 'SAMPLE CONTAINER SHIP DEMO 4', '3434334', '1e4d8b021c44d24f71eb50fd497520f6.jpg', '2019-04-09 00:00:00', '2019-04-09 19:25:20', 0),
(5, '5cacf1666a417', 'SAMPLE CONTAINER SHIP DEMO 5', '35234532', '1959418e9e4fab2fadb6d0104e544f4c.jpg', '2019-04-09 00:00:00', '2019-04-09 19:29:41', 0),
(6, '5cacfa15350a8', 'SAMPLE CONTAINER SHIP DEMO 6', '233443', 'd2b1828a6f203d66f4a4d8d8f7347bb2.jpg', '2019-04-09 00:00:00', '0000-00-00 00:00:00', 0),
(7, '5cacfa2587935', 'SAMPLE CONTAINER SHIP DEMO 7', '34344', 'd9203d5b24ad2cd2b0d6550d48e0e5a6.jpg', '2019-04-09 00:00:00', '0000-00-00 00:00:00', 0),
(8, '5cacfa31cbd65', 'SAMPLE CONTAINER SHIP DEMO 8', '23344334334', '0f4af0737827d949d69e61d60c14fac3.jpg', '2019-04-09 00:00:00', '2019-04-09 20:07:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ship_score`
--

CREATE TABLE `ship_score` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `e` int(11) NOT NULL,
  `f` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `i` int(11) NOT NULL,
  `j` int(11) NOT NULL,
  `k` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `q` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `t` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `condition_score` int(11) NOT NULL,
  `management_score` int(11) NOT NULL,
  `overall_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship_score`
--

INSERT INTO `ship_score` (`id`, `uni_code`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `condition_score`, `management_score`, `overall_score`) VALUES
(1, '5ca9d1da36f75', 10, 10, 5, 5, 7, 6, 6, 7, 9, 10, 5, 5, 8, 10, 6, 6, 8, 7, 10, 10, 10, 8, 9, 8),
(2, '5ca9eb6d116cc', 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 90, 95, 95, 95),
(3, '5cacf13f579bf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '5cacf15647cb7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '5cacf1666a417', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '5cacfa15350a8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '5cacfa2587935', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '5cacfa31cbd65', 80, 80, 80, 80, 80, 80, 80, 80, 85, 80, 80, 80, 80, 80, 80, 81, 85, 80, 80, 80, 77, 81, 81, 81);

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL,
  `uni_code` varchar(50) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `Issued_date` varchar(30) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `uni_code`, `reference_no`, `Issued_date`, `summary`) VALUES
(1, '5ca9d1da36f75', '3235235523', '2019-04-10', 'erer erre rtret rtret rtret rtret ertret rtret ertret retert ertret retret ertret ert rtr reter er'),
(2, '5ca9eb6d116cc', '32352355555', '2019-04-09', 'dfgdfhgfdh dfgdfg dfghdfh fghfgh fghfgh fghfg fghfg fghfgh f fgh'),
(3, '5cacf13f579bf', '', '', ''),
(4, '5cacf15647cb7', '', '', ''),
(5, '5cacf1666a417', '', '', ''),
(6, '5cacfa15350a8', '', '', ''),
(7, '5cacfa2587935', '', '', ''),
(8, '5cacfa31cbd65', '3454545', '2019-04-20', 'In 1968, &quot;K&quot; Line completed construction of the Toyota Maru No. 1, a multi-level car carrier with a capacity of 1,250 vehicles. Since then, &quot;K&quot; Line has continued to focus its energy and passion as a pioneer in the transport of completely built-up cars. We introduced the Toyota Maru No. 10, Japan&#039;s first pure car carrier (PCC), in 1970, and the European Highway, the world&#039;s largest PCC at the time (with 4,200-vehicle capacity), which also boasted the highest navigation speeds, in 1973, consolidating our position as a world leader.\r\n\r\n&quot;K&quot; Line has been endeavoring to innovatively reinforce its car carrier fleet with in-depth consideration to environmental preservation in particular, as well as to perform service in the handling of complete cars that is entirely damage-free at all times during loading and discharging operations as well as during ocean navigation.\r\n\r\nEnvironmental Preservation\r\nFrom viewpoint of oil pollution prevention and environmental preservation, &quot;K&quot; Line adopted a new method in which fuel and bunker oil tanks are designed to be placed within a triple-bottom structure. This new method increases the protective capabilities of the tanks when a ship&#039;s hull is damaged.\r\n\r\n&quot;K&quot; Line has also succeeded in adopting an electronic control engine onboard a car carrier. Fuel injection timing and timing of both opening and closing of the exhaust valves are controlled with electronic signals. As a result, it contributes greatly to reducing emissions of NOx (Nitrogen Oxide), and reducing emission of CO2 (Carbon Dioxide) and PM (particulate matter) when in low load operation\r\n\r\nA New Era \r\nIn Feburary 2016, the first of 8 identical vessels within a shipbuilding contract was launched. In what is described as one of the largest solar energy systems on any ship in the world, the car-carrier features more than 900 of Solar Frontier&#039;s copper, indium, selenium (CIS) solar panels. With a combined capacity of 150 kWp, the panels will power all LED lighting on the vehicle decks.\r\n\r\nIn addition &quot;K&quot; Line ordered two (2) additional new next generation 7,500 RT car carrier vessels with delivery in 2017 from Shin Kurushima Dockyard Co. Ltd. By adding these two new additional ships, line-up of our new next generation car carrier vessels with better stability and increased fuel efficiency will expand to a total of ten.\r\n\r\nFor more information on the vessels&#039; environmental protection and energy savings capabilities and the &#039;DRIVE GREEN PROJECT&#039; select here: /Environment/Green-News-Releases/140212-K-Line-Invest-Flag-Ship-Drive-Green-Project.html.\r\n\r\n&quot;K&quot; Line is Committed to Meeting the Needs of Customers\r\nWe are committed to continue to deliver value added efficiency as well as the capability of handling an even wider variety of cargo mix to assure our services successfully meet the needs of our valued customers in order to be best suited for not only passenger cars but also other RORO cargoes.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `country` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `emailalert` int(11) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `notification` int(11) NOT NULL,
  `createed` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `mobile`, `telephone`, `email`, `country`, `company`, `password`, `salt`, `emailalert`, `email_code`, `notification`, `createed`, `updated`, `status`) VALUES
(1, 'b', 'rajkumar', '43435435535', '34234234324', 'rajkumar@gmail.com', 'dfgfdfgfgdfdsf', 'fdsfsf', '', '1553615606.7228', 0, '', 0, '2026-03-19 00:00:00', '2019-04-09 14:30:07', 1),
(3, 'b', 'Golam Foysol', '+1234432424', '+14355345543', 'chondi@gmail.com', 'B', 'fdsfdsfdsf', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '1554823019.606', 0, '', 0, '2001-04-19 00:00:00', '2019-04-09 15:16:59', 1),
(4, 'b', 'nahid', '+243435435535', '+134234234324', 'nai@gmail.com', 'A', 'efasfafasf', 'bd94dcda26fccb4e68d6a31f9b5aac0b571ae266d822620e901ef7ebe3a11d4f', '1554718818.6735', 0, '', 0, '2008-04-19 00:00:00', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boilers`
--
ALTER TABLE `boilers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classhistory`
--
ALTER TABLE `classhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electrical_installations`
--
ALTER TABLE `electrical_installations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary_img`
--
ALTER TABLE `gallary_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hull`
--
ALTER TABLE `hull`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indntification`
--
ALTER TABLE `indntification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machinery`
--
ALTER TABLE `machinery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_inquiry`
--
ALTER TABLE `reply_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipall`
--
ALTER TABLE `shipall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_score`
--
ALTER TABLE `ship_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boilers`
--
ALTER TABLE `boilers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classhistory`
--
ALTER TABLE `classhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `defect`
--
ALTER TABLE `defect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `electrical_installations`
--
ALTER TABLE `electrical_installations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallary_img`
--
ALTER TABLE `gallary_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `hull`
--
ALTER TABLE `hull`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `indntification`
--
ALTER TABLE `indntification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply_inquiry`
--
ALTER TABLE `reply_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipall`
--
ALTER TABLE `shipall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ship_score`
--
ALTER TABLE `ship_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
