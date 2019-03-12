-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2019 at 01:25 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` bigint(20) NOT NULL,
  `bill_num` int(11) NOT NULL DEFAULT '0',
  `total_price` float NOT NULL DEFAULT '0',
  `paid_money` float NOT NULL DEFAULT '0',
  `neto` float NOT NULL DEFAULT '0',
  `pdv` float NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  `m` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `full_paid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bills_history`
--

CREATE TABLE `bills_history` (
  `id` int(11) NOT NULL,
  `hash` bigint(20) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `m` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `time` text,
  `left_money` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bills_parts`
--

CREATE TABLE `bills_parts` (
  `id` int(11) NOT NULL,
  `what` text,
  `user_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `hash` bigint(20) DEFAULT NULL,
  `title` text,
  `price` float DEFAULT NULL,
  `d` int(11) NOT NULL DEFAULT '0',
  `m` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `auto_continue` int(11) NOT NULL DEFAULT '0',
  `how_many` int(11) NOT NULL DEFAULT '1',
  `service_finnished` int(11) NOT NULL DEFAULT '0',
  `d_f` int(11) NOT NULL DEFAULT '0',
  `m_f` int(11) NOT NULL DEFAULT '0',
  `y_f` int(11) NOT NULL DEFAULT '0',
  `d_e` int(11) NOT NULL DEFAULT '0',
  `m_e` int(11) NOT NULL DEFAULT '0',
  `y_e` int(11) NOT NULL DEFAULT '0',
  `domain_hash` text,
  `domain_code` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `title` text,
  `what` text,
  `how_many` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `icon` text,
  `bought` int(11) NOT NULL DEFAULT '0',
  `exist` int(11) NOT NULL DEFAULT '0',
  `domain_hash` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `title`, `what`, `how_many`, `price`, `icon`, `bought`, `exist`, `domain_hash`) VALUES
(101, 20, 22, 'https://mojadomena.ba', 'domain', 1, 90, 'fa-network-wired', 0, 0, '7e15efc5479787821a0f35f0949468a6'),
(102, 20, 22, 'https://eeeee.ba', 'domain', 1, 90, 'fa-network-wired', 0, 0, '5d0dd4f75015ff2e2dbac3294a3665f0');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `ext` text NOT NULL,
  `price` float NOT NULL,
  `neto` float NOT NULL,
  `pdv` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `ext`, `price`, `neto`, `pdv`) VALUES
(22, '.ba', 90, 74.7, 15.3),
(24, '.com', 45, 37.35, 7.65),
(25, '.tv', 100, 83, 17);

-- --------------------------------------------------------

--
-- Table structure for table `front_images`
--

CREATE TABLE `front_images` (
  `id` int(11) NOT NULL,
  `title` text,
  `header` text,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_images`
--

INSERT INTO `front_images` (`id`, `title`, `header`, `details`) VALUES
(5, 'ea2d6d35403fb609f1f76e01c9043a4e.jpg', 'DobrodoÅ¡li na DMD.ba', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\0s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(6, '9782bcf0f642ae77d684bfabc03f154c.jpg', 'JoÅ¡ jedan naslov fotografije', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\0s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(7, '5c68fe2cdfc58acfcc1410d43ef7a57c.jpg', 'I treÄ‡i naslov fotografije', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\0s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');

-- --------------------------------------------------------

--
-- Table structure for table `hostings`
--

CREATE TABLE `hostings` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `value` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `neto` float NOT NULL,
  `pdv` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostings`
--

INSERT INTO `hostings` (`id`, `title`, `value`, `price`, `neto`, `pdv`) VALUES
(3, 'Web hosting - START', 0, 185, 153.55, 31.45),
(4, 'Web hosting - ADVANCED', 90, 280, 232.4, 47.6),
(5, 'Web hosting - PREMIUM', 150, 480, 398.4, 81.6),
(6, 'Web hosting - PROFESSIONAL', 0, 780, 647.4, 132.6);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `company_adress` text NOT NULL,
  `company_phone` text NOT NULL,
  `d_c` int(11) NOT NULL,
  `m_c` int(11) NOT NULL,
  `y_c` int(11) NOT NULL,
  `time_of_entry` text NOT NULL,
  `d_m` int(11) NOT NULL,
  `m_m` int(11) NOT NULL,
  `y_m` int(11) NOT NULL,
  `time_of_meeting` text NOT NULL,
  `contact_person` text NOT NULL,
  `email` text NOT NULL,
  `hash` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `company_name`, `company_adress`, `company_phone`, `d_c`, `m_c`, `y_c`, `time_of_entry`, `d_m`, `m_m`, `y_m`, `time_of_meeting`, `contact_person`, `email`, `hash`, `user_id`) VALUES
(7, 'Johns Company', 'Address of Company, 71000 Sarajevo', '+38761/222-333', 31, 1, 19, '13:52h', 2, 2, 19, '09:00h', 'John Doe', 'john@doe.com', '0191723bdbd752834b4b71f069f7d27b', 51),
(9, 'John 2', '', '', 1, 2, 19, '13:10h', 1, 2, 19, '', '', '', '5e56cb2c76509c27dcde37303e86ccaf', 1),
(10, 'John 3', '', '', 1, 2, 19, '13:10h', 1, 2, 19, '', '', '', '19374fa781efdb7bf43409e5b3d22201', 1),
(11, 'John 4', '', '', 1, 2, 19, '13:10h', 1, 2, 19, '', '', '', '7ff34060c23f92967cef7e32324e6e2d', 1),
(12, 'Deoo firma', '', '', 1, 2, 19, '13:10h', 1, 2, 19, '', '', '', '59602c3df137a68d16b5f4ba29e587dd', 1),
(13, 'coca Cola', '', '', 1, 2, 19, '13:10h', 1, 2, 19, '', '', '', 'f70e790b5dc1f7a6d319b74495ed381d', 1),
(14, 'Pepsi company', '', '', 1, 2, 19, '13:11h', 1, 2, 19, '', '', '', '1b36a146e9183578d13e5ce4f1b2f25c', 1),
(15, 'JoÅ¡ jedna firma : )', '', '', 1, 2, 19, '13:11h', 1, 2, 19, '', '', '', 'b5c3955e25720b46c0f9d142510c1781', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetings_details`
--

CREATE TABLE `meetings_details` (
  `id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `details` text NOT NULL,
  `date_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings_details`
--

INSERT INTO `meetings_details` (`id`, `hash`, `details`, `date_time`) VALUES
(13, '0191723bdbd752834b4b71f069f7d27b', 'This is first detailed part about this meeting !', '31. Januar 2019 - 15:08h'),
(14, '0191723bdbd752834b4b71f069f7d27b', 'Evo joÅ¡ jedan dio !?', '31. Januar 2019 - 15:09h'),
(15, '0191723bdbd752834b4b71f069f7d27b', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\0s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '31. Januar 2019 - 15:10h'),
(16, 'ba07814ebc65439ad295e85d4bf2481d', 'a', '01. Februar 2019 - 8:56h'),
(17, 'ba07814ebc65439ad295e85d4bf2481d', 'zvala, nema responsea', '1. Februar 2019 - 8:56h'),
(18, '5e56cb2c76509c27dcde37303e86ccaf', '', '01. Februar 2019 - 13:10h'),
(19, '19374fa781efdb7bf43409e5b3d22201', '', '01. Februar 2019 - 13:10h'),
(20, '7ff34060c23f92967cef7e32324e6e2d', '', '01. Februar 2019 - 13:10h'),
(21, '59602c3df137a68d16b5f4ba29e587dd', '', '01. Februar 2019 - 13:10h'),
(22, 'f70e790b5dc1f7a6d319b74495ed381d', '', '01. Februar 2019 - 13:10h'),
(23, '1b36a146e9183578d13e5ce4f1b2f25c', '', '01. Februar 2019 - 13:11h'),
(24, 'b5c3955e25720b46c0f9d142510c1781', '', '01. Februar 2019 - 13:11h');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text,
  `from_who` int(11) DEFAULT NULL,
  `to_who` int(11) NOT NULL,
  `from_seen` int(11) NOT NULL DEFAULT '0',
  `too_seen` int(11) NOT NULL DEFAULT '0',
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `from_who`, `to_who`, `from_seen`, `too_seen`, `time`) VALUES
(128, 'Hello there', 20, 1, 0, 1, NULL),
(129, 'Hello there too', 1, 20, 0, 1, NULL),
(130, 'Sta ima?', 1, 20, 0, 1, NULL),
(131, 'Kako ide?', 1, 20, 0, 1, NULL),
(132, 'evo gura se, kod tebe?', 20, 1, 0, 1, NULL),
(133, 'Ma bezveze Bgm', 1, 20, 0, 1, NULL),
(134, 'sve baÅ¡ bezveze', 20, 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `header` text,
  `text` text,
  `d` int(11) DEFAULT NULL,
  `m` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `time` text,
  `seen` int(11) NOT NULL DEFAULT '0',
  `what` text,
  `hash` bigint(20) DEFAULT NULL,
  `pop_up` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `php_codes`
--

CREATE TABLE `php_codes` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php_codes`
--

INSERT INTO `php_codes` (`id`, `code`) VALUES
(1, '\n<?php\n\nclass HTTPRequester {\n    public function __construct($url, array $params) {\n        $query = http_build_query($params);\n        $ch    = curl_init($url.''?''.$query);\n        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\n        curl_setopt($ch, CURLOPT_HEADER, false);\n        $response = curl_exec($ch);\n        curl_close($ch);\n        echo $response;\n    }\n}\n$array = array(''hash'' => ''#'');\n$http = new HTTPRequester(''http://dmd.ba/api_key.php'', $array);\n\n?>\n');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `title` text,
  `parent` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `neto` float NOT NULL,
  `pdv` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `hash`, `title`, `parent`, `price`, `neto`, `pdv`) VALUES
(1, 'f0fcdff6e0d287203c76912abdcea032', 'WEB DESIGN', NULL, 0, 0, 0),
(2, 'd527a008b7ab2671882fe4d654fb3142', 'GRAPGIC DESIGN', NULL, 0, 0, 0),
(6, '7d247ab8e6f1b444990a34bb11f3def3', 'Web design - BASIC', 1, 550, 456.5, 93.5),
(7, '028e9b3b627cc4d1991d6b9a433724d4', 'Web design - ADVANCED', 1, 850, 705.5, 144.5),
(8, '6657cdadc35927362340869f6fd4fb0f', 'Web design - ADVANCED PLUS', 1, 1100, 913, 187),
(9, 'cc8c83645a197d4fb03ae4745fb555e6', 'Web design - PROFESIONAL', 1, 1300, 1079, 221),
(11, 'd4138a2922999270a3ce3417d8413291', 'Graphic design logo', 2, 350, 290.5, 59.5),
(13, '25b13c598a81b5ab3eac9738e8098e2d', 'Graphic design catalog - MINI', 2, 400, 332, 68),
(14, 'd686841d0924498eab31135071abbedb', 'Web design online catalogue ', 1, 1400, 1162, 238),
(15, '8fcac66f1da3c83d467c50e5ef8e2f66', 'Web design online shop', 1, 1600, 1328, 272),
(16, '7ebc7514ce31787256706aa645f8c6ec', 'Web online catalogue', 1, 450, 373.5, 76.5),
(17, 'f276dcef204091ab5153e43cdc7c4471', 'Graphic design catalog - BASIC', 2, 600, 498, 102),
(18, '5f69748dd4f7fec7943c5c7faed5b323', 'Graphic design catalog - ADVANCED', 2, 800, 664, 136),
(19, '3e748c2b75a2d4520ade2375a6bb6351', 'Graphic design catalog - PREMIUM', 2, 950, 788.5, 161.5),
(20, '461418052866f23a077d2a96ea4a1495', 'Graphic design catalog - PROFESSIONAL', 2, 1200, 996, 204),
(21, 'adf4eb251c6723e8b08783118b9e6ea0', 'Graphic design catalog - PROFESSIONAL PLUS', 2, 1400, 1162, 238),
(22, 'd297807016f1d6f0acc99c6bed75deef', 'Graphic design flayer', 2, 350, 290.5, 59.5),
(23, 'e9f6f1ce81d3c76c52805b412849b82a', 'Graphic design billboard', 2, 450, 373.5, 76.5),
(24, '29630d1b0b84cc73ca0570f924f71e27', 'Graphic design broshure', 2, 650, 539.5, 110.5),
(25, '0234e9b03ce1f397f13d4283567f5abe', 'Graphic design packing', 2, 450, 373.5, 76.5),
(26, '34bda5e680e32ae4058eabfe38385de7', 'Graphic design banner', 2, 250, 207.5, 42.5),
(27, 'e2139892a7bef399a6c079e7501345a1', 'CORPORATE ID', NULL, 0, 0, 0),
(28, '69dc50be8cad7791f477ed3943118182', 'Corporate ID - START', 27, 450, 373.5, 76.5),
(29, '9bbed2fe84c341d6020c5997591c6b84', 'Corporate ID -  ADVANCED', 27, 750, 622.5, 127.5),
(30, '2fd1927398f5075b71c47efe34960bac', 'Corporate ID - PREMIUM', 27, 950, 788.5, 161.5),
(31, '139f51ba81311918b6d212fe0e3073e4', 'Corporate ID - PROFESSIONAL', 27, 1150, 954.5, 195.5),
(32, 'ad57eb4b4b0f09ea9e1980e17c07eac7', 'Digital marketing web ', 27, 650, 539.5, 110.5),
(33, '51b68b1cc543f60ff040d11f388d7ad6', 'Content marketing web', 27, 850, 705.5, 144.5),
(34, 'a67a59d8b9349f2a0a244a7e62710113', 'GOOGLE ADS', NULL, 0, 0, 0),
(35, '3de3cd314f3aead0146b278706eb9c78', 'Google ADS - START', 34, 185, 153.55, 31.45),
(36, 'ef8fc8806cfa4a8cded692191df43f5c', 'Google ADS - ADVANCED', 34, 280, 232.4, 47.6),
(37, '5bcb7b05b4af563643a6c09c320133e8', 'Google ADS - PREMIUM', 34, 450, 373.5, 76.5),
(38, 'd018ae8539a01f646daf25e205bdc844', 'Google ADS - PROFESSIONAL', 34, 650, 539.5, 110.5),
(39, 'b70f5182b66d2f6896d92b95063a7ea0', 'FACEBOOK MARKETING', NULL, 0, 0, 0),
(40, '70124bf6a3b4a9cfa5490e5be5f13450', 'Facebook ADS - START', 39, 285, 319.55, 65.45),
(41, 'c443750eacfa1d99ade5ed6f43a2a402', 'Facebook ADS - ADVANCED', 39, 380, 481.4, 98.6),
(42, '08b47b212f7a41d790afef4dda9539ff', 'Facebook ADS - PREMIUM', 39, 480, 398.4, 81.6),
(43, '902c6d1c6aadec0f92d5afb55a877312', 'Facebook ADS - PROFESSIONAL', 39, 780, 647.4, 132.6),
(44, 'c38e83ed9574c0e071efea069a962847', 'VIBER MARKETING', NULL, 0, 0, 0),
(45, '92a4306e8825531809ec6e4b3a6050b8', 'Viber marketing - START', 44, 385, 319.55, 65.45),
(46, '19d72bf2b3ed379e59b999d28b3a896d', 'Viber marketing - ADVANCED', 44, 580, 481.4, 98.6),
(47, 'dc221806066e73d01f460f3ed677b1d5', 'Viber marketing - PREMIUM', 44, 680, 564.4, 115.6),
(48, 'ac70d5f9da41fcf3aa651cd9257ed0f4', 'Viber marketing - PROFESSIONAL', 44, 980, 813.4, 166.6),
(49, 'ee0e2452479d840fd2de9a3d3fbaf85e', 'INSTAGRAM MARKETING', NULL, 0, 0, 0),
(50, 'dd2323c8082b6a407627e7da29c21a89', 'Instagram marketing - START', 49, 285, 236.55, 48.45),
(51, '19429697ca9b0a37595379d47963fb4c', 'Instagram marketing - ADVANCED', 49, 380, 564.4, 115.6),
(52, '6a420f4de5e487da2abb400df4c18755', 'Instagram marketing - PREMIUM', 49, 480, 398.4, 81.6),
(53, 'd582b8b631be245d0d4bd18312f2e63d', 'Instagram marketing - PROFESSIONAL', 49, 780, 647.4, 132.6),
(54, '1df23d9f6709badc860b4a5973f55f67', 'SEO OPTIMIZATION', NULL, 0, 0, 0),
(55, '34e6c363e362731a606fd909efa371d6', 'SEO optimization', 54, 650, 539.5, 110.5),
(56, 'da64db787df04c45a1292baa0169a5dd', 'VIDEO SHOOTING', NULL, 0, 0, 0),
(57, '783928c265df9b42097c57755403e742', 'Video shooting - START', 56, 685, 568.55, 116.45),
(58, '1c554384efd46ae0873672c545e5a232', 'Video shooting - ADVANCED', 56, 880, 730.4, 149.6),
(59, '3fe76c2890403379b9f7fe3c503559ca', 'Video shooting - PREMIUM', 56, 1800, 1494, 306),
(60, 'f7ad43da437796c7960a796ca082501f', 'Video shooting - PROFESSIONAL', 56, 2800, 2324, 476),
(61, 'c38f457210eb83fe3224502349378205', 'DRONE SHOOTING', NULL, 0, 0, 0),
(62, 'd9efe2c1da68443068bfa61f66ff3d7e', 'Drone record video', 61, 450, 373.5, 76.5),
(63, 'b27b4d66218991a9c0b402567c0d103a', 'Drone record video mapping', 61, 850, 705.5, 144.5),
(64, 'c8876aed9b65be28939b40d53f0f1347', 'Drone record photography', 61, 450, 373.5, 76.5),
(65, 'c7a8b6d370b3b282a0ecc901366ad3dd', 'Drone record 360Â° photography', 61, 650, 539.5, 110.5),
(66, '0b8876da1ee4540af9a2c039371ebe57', 'Drone record 360Â° video', 61, 850, 705.5, 144.5),
(67, '2ccb7e0c376c55b257903e1a75d15ff7', 'Post production', 61, 450, 373.5, 76.5),
(68, 'a0ffb8173dfb5422daa39390425d5eec', 'ODRÅ½AVANJE', NULL, 0, 0, 0),
(69, '4bf2b9a95f57f1c70bd5dd84ce1fcb80', 'OdrÅ¾avanje - MINI', 68, 100, 83, 17),
(70, '44a9ac7323bcbda5c73d61e9f93a1870', 'ODRÅ½AVANJE - ADVANCED ', 68, 250, 207.5, 42.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `email` text,
  `password` text,
  `name` text,
  `surname` text,
  `adress` text,
  `phone` text,
  `company` text,
  `company_phone` text,
  `company_adress` text,
  `role` text,
  `online` int(11) NOT NULL DEFAULT '0',
  `sent_messages` int(11) NOT NULL DEFAULT '0',
  `last_active_time` bigint(20) NOT NULL DEFAULT '0',
  `last_active_real_time` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hash`, `email`, `password`, `name`, `surname`, `adress`, `phone`, `company`, `company_phone`, `company_adress`, `role`, `online`, `sent_messages`, `last_active_time`, `last_active_real_time`) VALUES
(1, 'cb35c577ca7362f918bd3dc924f1893c', 'kaapiic@hotmail.com', 'enciklopedija', 'Root', 'Admin', 'Muhameda ef. PandÅ¾e bb, 71000 Sarajevo', '+38761/683-449', 'Digital Media Development', '+38733/602-446', 'Silve RizvanbegoviÄ‡a 24b, 71000 Sarajevo', 'root', 1, 0, 1549023641, '01. 02. 2019 - 01:20:41pm'),
(19, 'd7003c1d9dcdf07e92d466c814f23aeb', 'marketing@dmdbest.com', 'enciklopedija', 'DMD - Marketing', '', 'Dr. Silve RizvanbegoviÄ‡a 24b, 71000 Sarajevo', '', '-', '', '', 'moderator', 0, 0, 1548324656, '01. 02. 2019 - 01:20:41pm'),
(20, 'dbe1a8e90dc36f563ce964824dceede5', 'user@email.com', 'sifra', 'John', 'Doe', 'Muhameda ef. PandÅ¾e bb, 71000 Sarajevo', '+38761/683-449', 'Johns Company', '+38733/455-555', 'Dr. Silve RizvanbegoviÄ‡a 24b, 71000 Sarajevo', 'user', 0, 0, 1549017852, '01. 02. 2019 - 01:20:41pm'),
(21, '82c15abf81a71bff22cc226e3d035642', 'novi@email.com', 'sifra', 'Novi', 'ÄŒovjek', '', '', '-', '', '', 'user', 0, 0, 1548675176, '01. 02. 2019 - 01:20:41pm'),
(22, 'a9214dc7d716e145c176be77f2cc35de', 'adin@dmdbest.com', 'adin123', 'Adin', '', '', '', '-', '', '', 'moderator', 0, 0, 1548339270, '01. 02. 2019 - 01:20:41pm'),
(23, '2a944c5bde54dbe838773b671ecd249f', 'info@sarajevograd.ba', 'Connect1977', 'Sarajevograd', '', '', '', 'Sarajevo grad - portal', '', '', 'user', 0, 0, 1548928400, '01. 02. 2019 - 01:20:41pm'),
(24, 'f97b3428e4fe2fb0d72bb2aea0ae6531', 'info@dmdbest.com', 'enciklopedija', 'Ervin', '', '', '', '-', '', '', 'root', 0, 0, 1548928392, '01. 02. 2019 - 01:20:41pm'),
(50, '330c4bd1b4d5a10d296b4c56690d767d', 'user@newmail.com', 'sifra', 'New User', '', '', '', '-', '', '', 'user', 0, 0, 0, '01. 02. 2019 - 01:20:41pm'),
(51, '0c6e07fabbfd3fd52e81abe11fd6d43c', 'aa', 'aaa', 'aaa', NULL, NULL, NULL, '-', NULL, NULL, 'user', 0, 0, 0, '01. 02. 2019 - 01:20:41pm'),
(52, '90eaa6117b418f941a47c4f218d89ae9', 'office@dmdbest.com', 'doberman', 'Ervin', NULL, NULL, NULL, '-', NULL, NULL, 'user', 0, 0, 1548946294, '01. 02. 2019 - 01:20:41pm'),
(53, '7b35760a1422b8bf94205e655a11186c', 'offer@dmdbest.com', 'doberman', 'ervin', NULL, NULL, NULL, '-', NULL, NULL, 'user', 0, 0, 1548964109, '01. 02. 2019 - 01:20:41pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_company_images`
--

CREATE TABLE `user_company_images` (
  `id` int(11) NOT NULL,
  `hash` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_company_images`
--

INSERT INTO `user_company_images` (`id`, `hash`, `image`) VALUES
(1, '9d6ab9ce810929eda09504757a078b3c', '9a9cff1b3dd853e62bb01a00edd609f4.png'),
(2, '7a9ac91087c56b77a6457f5a806f0e08', 'logo.jpeg'),
(3, 'd7003c1d9dcdf07e92d466c814f23aeb', 'logo.jpeg'),
(4, 'dbe1a8e90dc36f563ce964824dceede5', 'logo.jpeg'),
(5, 'cb35c577ca7362f918bd3dc924f1893c', 'logo.jpeg'),
(6, '82c15abf81a71bff22cc226e3d035642', 'logo.jpeg'),
(7, 'a9214dc7d716e145c176be77f2cc35de', 'logo.jpeg'),
(8, '2a944c5bde54dbe838773b671ecd249f', 'logo.jpeg'),
(9, 'f97b3428e4fe2fb0d72bb2aea0ae6531', 'logo.jpeg'),
(10, '88bb9bc1bb0a9ac182c5af35133fc4ad', 'logo.jpeg'),
(11, '15723d01a711924a55aaf0673eff069a', 'logo.jpeg'),
(12, '04cd059618d6ffcb9de3f1c85e9814c6', 'logo.jpeg'),
(13, '4e5f01884a8acd96f0568fa55ab21d1b', 'logo.jpeg'),
(14, '4e5f01884a8acd96f0568fa55ab21d1b', 'logo.jpeg'),
(15, '0257e4265db04b984b91c9b10a7d11e2', 'logo.jpeg'),
(16, 'b53d9cc2cec6ca5132135fb91372dfcc', 'logo.jpeg'),
(17, 'd3f3551b212b3cc3daa6697d7ab4c75c', 'logo.jpeg'),
(18, '78041a6668ac1c9d5adf580a3bc4ba87', 'logo.jpeg'),
(19, '437607cabd9a0d222ccc3304da323b58', 'logo.jpeg'),
(20, '387d7a1d8b1b6cee4cf223c54b827175', 'logo.jpeg'),
(21, '4926659441b7694f7c97110d747c7a57', 'logo.jpeg'),
(22, '4926659441b7694f7c97110d747c7a57', 'logo.jpeg'),
(23, '9ef667320443c891e0d2f3b7a783df82', 'logo.jpeg'),
(24, '9ef667320443c891e0d2f3b7a783df82', 'logo.jpeg'),
(25, 'b9fe5a9aef745c769663c29c05a7dca5', 'logo.jpeg'),
(26, '7828480b3f425b366d6a3d05e346c8c8', 'logo.jpeg'),
(27, '1e2cdbecce39ae627eecffc475061f81', 'logo.jpeg'),
(28, '6148d6a6b3db793339cd75cd544adf35', 'logo.jpeg'),
(29, '035cbbe3a49c029ecb459b0dfb0f3920', 'logo.jpeg'),
(30, '035cbbe3a49c029ecb459b0dfb0f3920', 'logo.jpeg'),
(31, 'c1747d2cb5b09c4699b94e97abe9484d', 'logo.jpeg'),
(32, '041bce06964e7614378a776ba41fda17', 'logo.jpeg'),
(33, 'bf11350906fd62ea7e12e8013aff587d', 'logo.jpeg'),
(34, '77ee00608ab0879bf01c7fc4f5fff4bc', 'logo.jpeg'),
(35, '330c4bd1b4d5a10d296b4c56690d767d', 'logo.jpeg'),
(36, 'b28a6bb7d2a55afd9c89dd9a9ed5136f', 'logo.jpeg'),
(37, 'b62aed33e62cc7db02d831bad1a27185', 'logo.jpeg'),
(38, 'c31b529e21f7736e602cb14a0202273b', 'logo.jpeg'),
(39, 'd696f985e692a0e4a08521eff0cb2539', 'logo.jpeg'),
(40, 'c369ab3e815fae68927af5f85b10f85d', 'logo.jpeg'),
(41, '0a52f693918dd7e839a5bcf919050f92', 'logo.jpeg'),
(42, 'df6e8fed6cb5ac6923cc83f69649bc17', 'logo.jpeg'),
(43, '97c1cdddc94b85183a47134ba55ab9ed', 'logo.jpeg'),
(44, 'ce238bda4036a633e0bcd30c48809d2f', 'logo.jpeg'),
(45, '5371511ba48e57cb8fb6b580f1736129', 'logo.jpeg'),
(46, '0c6e07fabbfd3fd52e81abe11fd6d43c', 'logo.jpeg'),
(47, '90eaa6117b418f941a47c4f218d89ae9', 'logo.jpeg'),
(48, '7b35760a1422b8bf94205e655a11186c', 'logo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cover_images`
--

CREATE TABLE `user_cover_images` (
  `id` int(11) NOT NULL,
  `hash` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cover_images`
--

INSERT INTO `user_cover_images` (`id`, `hash`, `image`) VALUES
(1, '9d6ab9ce810929eda09504757a078b3c', 'fe10e88777a9a76ca768c3a486343c73.jpg'),
(2, '7a9ac91087c56b77a6457f5a806f0e08', 'cover.jpg'),
(3, 'd7003c1d9dcdf07e92d466c814f23aeb', 'cover.jpg'),
(4, 'dbe1a8e90dc36f563ce964824dceede5', 'cover.jpg'),
(5, 'cb35c577ca7362f918bd3dc924f1893c', 'bcd75c3860a97da840e85dc13ef15a2a.jpg'),
(6, '82c15abf81a71bff22cc226e3d035642', 'cover.jpg'),
(7, 'a9214dc7d716e145c176be77f2cc35de', 'cover.jpg'),
(8, '2a944c5bde54dbe838773b671ecd249f', 'cover.jpg'),
(9, 'f97b3428e4fe2fb0d72bb2aea0ae6531', 'cover.jpg'),
(10, '88bb9bc1bb0a9ac182c5af35133fc4ad', 'cover.jpg'),
(11, '15723d01a711924a55aaf0673eff069a', 'cover.jpg'),
(12, '04cd059618d6ffcb9de3f1c85e9814c6', 'cover.jpg'),
(13, '4e5f01884a8acd96f0568fa55ab21d1b', 'cover.jpg'),
(14, '4e5f01884a8acd96f0568fa55ab21d1b', 'cover.jpg'),
(15, '0257e4265db04b984b91c9b10a7d11e2', 'cover.jpg'),
(16, 'b53d9cc2cec6ca5132135fb91372dfcc', 'cover.jpg'),
(17, 'd3f3551b212b3cc3daa6697d7ab4c75c', 'cover.jpg'),
(18, '78041a6668ac1c9d5adf580a3bc4ba87', 'cover.jpg'),
(19, '437607cabd9a0d222ccc3304da323b58', 'cover.jpg'),
(20, '387d7a1d8b1b6cee4cf223c54b827175', 'cover.jpg'),
(21, '4926659441b7694f7c97110d747c7a57', 'cover.jpg'),
(22, '4926659441b7694f7c97110d747c7a57', 'cover.jpg'),
(23, '9ef667320443c891e0d2f3b7a783df82', 'cover.jpg'),
(24, '9ef667320443c891e0d2f3b7a783df82', 'cover.jpg'),
(25, 'b9fe5a9aef745c769663c29c05a7dca5', 'cover.jpg'),
(26, '7828480b3f425b366d6a3d05e346c8c8', 'cover.jpg'),
(27, '1e2cdbecce39ae627eecffc475061f81', 'cover.jpg'),
(28, '6148d6a6b3db793339cd75cd544adf35', 'cover.jpg'),
(29, '035cbbe3a49c029ecb459b0dfb0f3920', 'cover.jpg'),
(30, '035cbbe3a49c029ecb459b0dfb0f3920', 'cover.jpg'),
(31, 'c1747d2cb5b09c4699b94e97abe9484d', 'cover.jpg'),
(32, '041bce06964e7614378a776ba41fda17', 'cover.jpg'),
(33, 'bf11350906fd62ea7e12e8013aff587d', 'cover.jpg'),
(34, '77ee00608ab0879bf01c7fc4f5fff4bc', 'cover.jpg'),
(35, '330c4bd1b4d5a10d296b4c56690d767d', 'cover.jpg'),
(36, 'b28a6bb7d2a55afd9c89dd9a9ed5136f', 'cover.jpg'),
(37, 'b62aed33e62cc7db02d831bad1a27185', 'cover.jpg'),
(38, 'c31b529e21f7736e602cb14a0202273b', 'cover.jpg'),
(39, 'd696f985e692a0e4a08521eff0cb2539', 'cover.jpg'),
(40, 'c369ab3e815fae68927af5f85b10f85d', 'cover.jpg'),
(41, '0a52f693918dd7e839a5bcf919050f92', 'cover.jpg'),
(42, 'df6e8fed6cb5ac6923cc83f69649bc17', 'cover.jpg'),
(43, '97c1cdddc94b85183a47134ba55ab9ed', 'cover.jpg'),
(44, 'ce238bda4036a633e0bcd30c48809d2f', 'cover.jpg'),
(45, '5371511ba48e57cb8fb6b580f1736129', 'cover.jpg'),
(46, '0c6e07fabbfd3fd52e81abe11fd6d43c', 'cover.jpg'),
(47, '90eaa6117b418f941a47c4f218d89ae9', 'cover.jpg'),
(48, '7b35760a1422b8bf94205e655a11186c', 'cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(11) NOT NULL,
  `hash` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `hash`, `image`) VALUES
(2, '9d6ab9ce810929eda09504757a078b3c', '45697945f9a654873c282ef2904cf408.jpg'),
(3, '7a9ac91087c56b77a6457f5a806f0e08', 'avatar.png'),
(4, 'd7003c1d9dcdf07e92d466c814f23aeb', 'avatar.png'),
(5, 'dbe1a8e90dc36f563ce964824dceede5', 'd3cf41b80c288409d90dc54fd6079dce.jpg'),
(6, 'cb35c577ca7362f918bd3dc924f1893c', 'd0688485bf0d4c1c299be5e852994db0.jpeg'),
(7, '82c15abf81a71bff22cc226e3d035642', 'avatar.png'),
(8, 'a9214dc7d716e145c176be77f2cc35de', 'avatar.png'),
(9, '2a944c5bde54dbe838773b671ecd249f', 'avatar.png'),
(10, 'f97b3428e4fe2fb0d72bb2aea0ae6531', 'avatar.png'),
(11, '88bb9bc1bb0a9ac182c5af35133fc4ad', 'avatar.png'),
(12, '15723d01a711924a55aaf0673eff069a', 'avatar.png'),
(13, '04cd059618d6ffcb9de3f1c85e9814c6', 'avatar.png'),
(14, '4e5f01884a8acd96f0568fa55ab21d1b', 'avatar.png'),
(15, '4e5f01884a8acd96f0568fa55ab21d1b', 'avatar.png'),
(16, '0257e4265db04b984b91c9b10a7d11e2', 'avatar.png'),
(17, 'b53d9cc2cec6ca5132135fb91372dfcc', 'avatar.png'),
(18, 'd3f3551b212b3cc3daa6697d7ab4c75c', 'avatar.png'),
(19, '78041a6668ac1c9d5adf580a3bc4ba87', 'avatar.png'),
(20, '437607cabd9a0d222ccc3304da323b58', 'avatar.png'),
(21, '387d7a1d8b1b6cee4cf223c54b827175', 'avatar.png'),
(22, '4926659441b7694f7c97110d747c7a57', 'avatar.png'),
(23, '4926659441b7694f7c97110d747c7a57', 'avatar.png'),
(24, '9ef667320443c891e0d2f3b7a783df82', 'avatar.png'),
(25, '9ef667320443c891e0d2f3b7a783df82', 'avatar.png'),
(26, 'b9fe5a9aef745c769663c29c05a7dca5', 'avatar.png'),
(27, '7828480b3f425b366d6a3d05e346c8c8', 'avatar.png'),
(28, '1e2cdbecce39ae627eecffc475061f81', 'avatar.png'),
(29, '6148d6a6b3db793339cd75cd544adf35', 'avatar.png'),
(30, '035cbbe3a49c029ecb459b0dfb0f3920', 'avatar.png'),
(31, '035cbbe3a49c029ecb459b0dfb0f3920', 'avatar.png'),
(32, 'c1747d2cb5b09c4699b94e97abe9484d', 'avatar.png'),
(33, '041bce06964e7614378a776ba41fda17', 'avatar.png'),
(34, 'bf11350906fd62ea7e12e8013aff587d', 'avatar.png'),
(35, '77ee00608ab0879bf01c7fc4f5fff4bc', 'avatar.png'),
(36, '330c4bd1b4d5a10d296b4c56690d767d', 'avatar.png'),
(37, 'b28a6bb7d2a55afd9c89dd9a9ed5136f', 'avatar.png'),
(38, 'b62aed33e62cc7db02d831bad1a27185', 'avatar.png'),
(39, 'c31b529e21f7736e602cb14a0202273b', 'avatar.png'),
(40, 'd696f985e692a0e4a08521eff0cb2539', 'avatar.png'),
(41, 'c369ab3e815fae68927af5f85b10f85d', 'avatar.png'),
(42, '0a52f693918dd7e839a5bcf919050f92', 'avatar.png'),
(43, 'df6e8fed6cb5ac6923cc83f69649bc17', 'avatar.png'),
(44, '97c1cdddc94b85183a47134ba55ab9ed', 'avatar.png'),
(45, 'ce238bda4036a633e0bcd30c48809d2f', 'avatar.png'),
(46, '5371511ba48e57cb8fb6b580f1736129', 'avatar.png'),
(47, '0c6e07fabbfd3fd52e81abe11fd6d43c', 'avatar.png'),
(48, '90eaa6117b418f941a47c4f218d89ae9', 'avatar.png'),
(49, '7b35760a1422b8bf94205e655a11186c', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `numOfViews` int(11) DEFAULT NULL,
  `hash` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `day`, `month`, `year`, `numOfViews`, `hash`) VALUES
(369, 29, 2, 18, 11, 'dc3084e8ae2ca95925ee8296fef9a667'),
(368, 24, 2, 18, 29, 'dc3084e8ae2ca95925ee8296fef9a667'),
(367, 21, 2, 18, 14, 'dc3084e8ae2ca95925ee8296fef9a667'),
(366, 17, 2, 18, 12, 'dbf774eba064ed64ea722db169905e03'),
(365, 12, 2, 18, 7, 'dbf774eba064ed64ea722db169905e03'),
(364, 26, 1, 18, 12, 'dbf774eba064ed64ea722db169905e03'),
(363, 24, 1, 18, 17, 'dbf774eba064ed64ea722db169905e03'),
(362, 21, 1, 18, 3, 'dbf774eba064ed64ea722db169905e03'),
(361, 29, 1, 19, 3, 'dc3084e8ae2ca95925ee8296fef9a667'),
(360, 28, 1, 19, 20, 'dc3084e8ae2ca95925ee8296fef9a667'),
(359, 24, 1, 19, 9, 'dc3084e8ae2ca95925ee8296fef9a667'),
(358, 23, 1, 19, 17, 'dbf774eba064ed64ea722db169905e03'),
(357, 19, 1, 19, 13, 'dbf774eba064ed64ea722db169905e03'),
(356, 17, 1, 19, 6, 'dbf774eba064ed64ea722db169905e03'),
(355, 14, 1, 19, 14, 'dbf774eba064ed64ea722db169905e03'),
(354, 12, 1, 19, 1, 'dbf774eba064ed64ea722db169905e03'),
(370, 31, 1, 19, 11, 'dbe1a8e90dc36f563ce964824dceede5'),
(371, 30, 1, 19, 12, 'a8b4c328d06ffe02af02c82974fbb5e6'),
(372, 31, 1, 19, 11, 'a8b4c328d06ffe02af02c82974fbb5e6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_history`
--
ALTER TABLE `bills_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_parts`
--
ALTER TABLE `bills_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_images`
--
ALTER TABLE `front_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostings`
--
ALTER TABLE `hostings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings_details`
--
ALTER TABLE `meetings_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_codes`
--
ALTER TABLE `php_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company_images`
--
ALTER TABLE `user_company_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cover_images`
--
ALTER TABLE `user_cover_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `bills_history`
--
ALTER TABLE `bills_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `bills_parts`
--
ALTER TABLE `bills_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `front_images`
--
ALTER TABLE `front_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hostings`
--
ALTER TABLE `hostings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `meetings_details`
--
ALTER TABLE `meetings_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `php_codes`
--
ALTER TABLE `php_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user_company_images`
--
ALTER TABLE `user_company_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_cover_images`
--
ALTER TABLE `user_cover_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
