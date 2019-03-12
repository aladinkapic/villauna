-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2019 at 03:09
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eurobrand`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_items`
--

CREATE TABLE `all_items` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `title` text,
  `availablity` text,
  `hash` text,
  `vpc` float DEFAULT NULL,
  `mpc` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `producer` text NOT NULL,
  `specific_details` text,
  `short_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_items`
--

INSERT INTO `all_items` (`id`, `parent`, `category`, `title`, `availablity`, `hash`, `vpc`, `mpc`, `discount`, `producer`, `specific_details`, `short_details`) VALUES
(2, 7, 32, 'GAME Intel Pentium G5400 3,7 GHz + AMD Radeon RX550 2GB DDR5', 'Dostupno', 'c4c51bcdde1bc7ed5dc3fe3e24e7d53a', 1000, 1100, 10, '', 'Intel Pentium;|;AMD Radeon RX;|;8 GB;|;240 GB;|;450 W;|;Free DOS', 'MatiÄna ploÄa: Intel H310M, Grafika: AMD Radeon RX550 2GB DDR5, Ram: 8GB DDR4, SSD: 240GB, KuÄ‡iÅ¡te: Zalman ZM-T4 PLUS, Napajanje: LC-Power 500W, Ostalo: VGA, DVI i HDMI. Garancija: 2 godine'),
(3, 7, 32, 'Intel Core i5 8400 + nVidia GeForce 1060 3GB DDR5', 'Dostupno', '18fbd162a811a56798e99204a3b24a91', 800, 900, 5, '', 'Intel Core i5;|;nVidia GeForce;|;8 GB;|;240 GB;|;650 W;|;Free DOS', 'CPU: Intel Core i5 8400 2,8 GHz, MatiÄna ploÄa: Intel B360M, Grafika: nVidia GeForce 1060 3GB DDR5, Ram: 8GB 2666 MHz DDR4, SSD: 240GB, KuÄ‡iÅ¡te: LC-Power 990B Concorde, Napajanje: LC-Power 600W, Ostalo: VGA, DVI i HDMI. Garancija: 2 godine'),
(5, 7, 32, 'Intel Core i3 8100 3,6 GHz + nVidia GeForce 1050TI 4GB DDR5', 'Dostupno', 'b04b9a0baaf80ebb183faaf99d035f9b', 1500, 1700, 5, '', 'Intel Core i3;|;nVidia GeForce;|;8 GB;|;240 GB;|;550 W;|;Free DOS', 'MatiÄna ploÄa: Intel H310M, Grafika: nVidia GeForce 1050TI 4GB DDR5, Ram: 8GB DDR4, SSD: 240GB, KuÄ‡iÅ¡te: Zalman ZM-T3 PLUS, Napajanje: LC-Power 500W, Ostalo: VGA, DVI i HDMI. Garancija: 2 godine'),
(6, 7, 32, 'AMD Ryzen5 1500X + AMD Radeon RX570 4GB DDR5', 'Dostupno', '544d5722ec80bf77281ecd774f319fd1', 1400, 1200, 5, '', 'AMD Ryzen 5;|;AMD Radeon RX;|;8 GB;|;240 GB;|;600 W;|;Free DOS', 'Procesor: AMD Ryzen5 1500X 3,5 GHz, MatiÄna ploÄa: AMD B350M, Grafika: AMD Radeon RX 570 4GB DDR5, Ram: 8 GB DDR4, SSD: 240GB, KuÄ‡iÅ¡te: LC-power Reddemer, Napajanje: LC-Power 600W. Ostalo: LAN: Gigabit, AUDIO: 2.1, HDMI, VGA, DVI, Garancija: 24 mjeseca.'),
(7, 7, 32, 'AMD Ryzen5 1600X + AMD Radeon RX580 4GB DDR5', 'Dostupno', '3b167de674d0a01139e6dc5b04eb4a74', 1500, 1700, 5, '', 'AMD Ryzen 5;|;AMD Radeon RX;|;8 GB;|;240 GB;|;650 W;|;Free DOS', 'CPU: AMD Ryzen5 1600X 3,6GHz, MatiÄna ploÄa: AMD B350M, Grafika: AMD Radeon RX580 4GB DDR5, RAM: 8GB, SSD disk: 240 GB, KuÄ‡iÅ¡te: LC-Power Dragonslayer, Napajanje: LC-Power 600W. Ostalo: DVI, HDMI, DP, Garancija: 24 mjeseca'),
(8, 7, 32, 'AMD Ryzen5 2600X 4,2 GHz + AMD Radeon RX590 8GB DDR5', 'Dostupno', '7c3b6d8733dfdcc228883e5a62c66a94', 1800, 1999.9, 5, '', 'AMD Ryzen 5;|;AMD Radeon RX;|;16 GB;|;240 GB;|;700 W;|;Free DOS', 'MatiÄna ploÄa: AMD B450M, Grafika: AMD Radeon RX590 8GB DDR5, Ram: 16 GB 2400 MHz (2x8GB), SSD disk: Kingston M.2. NVMe 240 GB, KuÄ‡iÅ¡te: LC-Power 990B Concorde, Napajanje: Fortron 700W. Ostalo: LAN: Gigabit, AUDIO, HDMI, DVI-D, Display Port, Garancija: 2 godine'),
(9, 7, 32, 'Intel Core i5 9600K + nVidia GeForce 2060 6GB DDR6', 'Dostupno', '663b7dcd16bf237ad09b6e02e95890e3', 2000, 2200, 5, '', ';|;;|;;|;;|;;|;', 'CPU: Intel Core i7 9600K 3,7 GHz, MatiÄna ploÄa: Intel B360, Grafika: nVidia GeForce 2060 6GB DDR6, Ram: 16 GB 2400 MHz DDR4, SSD: Kingston A1000 M.2 240GB, KuÄ‡iÅ¡te: LC-Power 994B Vitreous, Napajanje: Fortron Hyper 700W, Ostalo: VGA, DVI i HDMI. Garancija: 2 godine'),
(10, 7, 34, 'ASUS VS197DE 18,5 LED Monitor', 'Dostupno', '7222289b2218df80c4afcb7b1b280ec7', 145, 135, 5, '', '18,5";|;1366 x 768;|;200 cd/mÂ²;|;90Â°(H)/50Â°(V),;|;5ms;|;D-Sub', 'VeliÄina ekrana: 18,5", Format: 16:9, Rezolucija: 1366x768, Osvjetljenje: 200cd/m2, Kontrast: (ASCR) : 50000000:1, Ugao gledanja: 90Â°(H)/50Â°(V), Vrijeme odziva: 5ms, D-Sub: DA, Garancija: 3g,'),
(11, 7, 34, 'AOC I2481FXH AH-IPS 23,8 LED Monitor', 'Dostupno', 'cb25787c8772ae7f892745a041ca6ae4', 350, 324, 5, '', ' 23.8";|; 1920 x 1080;|; 250 cd/mÂ²;|; ;|; ;|; 2x HDMI, D-Sub i 3.5 Mini-Jack.', 'VeliÄina zaslona: 23,8", AH-IPS, LED. Rezolucija: Full HD, 1920 x 1080. Svjetlina: 250 cd/mÂ². Kontrast: 1000: 1, Ugao gledanja: 178(H) / 178(V), PrikljuÄci: D-Sub i 2x HDMI. Garancija: 36 mjeseci.'),
(12, 7, 35, 'Gigabyte BRIX GB-BACE-3000 mini PC', 'Dostupno', '1566e2dd1b734eeb4f2052bfff9bc673', 260, 300, 5, '', '', 'OS: FreeDOS. CPU: Intel Celeron N3050 2.1 GHz. (Hard disk i RAM nisu ukljuÄeni). Broj diskova: 1x. Tip hard diska: HDD i SSD. 1x slot za RAM: DDR3 Max. do 8 GB 1600 MHz. VGA: Integrisana Intel HD. Optika: Nema. MreÅ¾a: Gigabit Ethernet, PrikljuÄci: 4x USB 3.0, Micro SD, VGA, HDMI, Audio-out i Mic-In. Garancija: 36 mjeseci.'),
(13, 7, 35, 'Gigabyte BRIX GB-BKI3HA-7100 mini PC', 'Dostupno', 'a62050cf7cc0576aedd8e957bb5b42e1', 600, 700, 5, '', '', 'OS: FreeDOS. CPU: Intel Core i3-7100U, 2.4 GHz. (Hard disk i RAM nisu ukljuÄeni). Broj diskova: 2x. Tip hard diska: 2.5â€ HDD i SSD. 2x slot za RAM: DDR4 Max. do 32 GB i 2133 MHz. VGA: Integrisana Intel HD 620. Slotovi: 1x M.2 slot (2280_storage) PCIe /SATA i 1x PCIe M.2 NGFF 2230 A-E. Optika: Nema. MreÅ¾a: Wireless 802.11 ac, Gigabit Ethernet i Bluetooth. PrikljuÄci: 2x USB 3.0, USB 3.1 type C, USB 3.1, Mini Display port, HDMI, DC-In i LAN. Garancija: 36 mjeseci.'),
(14, 8, 36, 'HP 255 G6 (1WY47EA)', 'Dostupno', '9e7d47cee940b1f8bd040bdc9841883a', 450, 500, 5, 'HP', ' 15,6";|; AMD Quad 2C+2G E2-9000e;|; 4 GB;|; 500 GB;|; AMD Radeon R2;|; Free DOS', 'Operativni Sistem: Free DOS 2.0. Display: 15.6" LED HD AntiGlare. Procesor: AMD Quad 2C+2G E2-9000e (2.00GHz Turbo). Grafika: AMD Radeon R2 GPU. RAM: 4GB 1866MHz DDR4. HDD: 500GB 5400RPM. DVD: NE. SECURITY: TPM Firmware 2.0. Povezivanje: LAN, WiFi, BluetoothÂ® 4.2 Combo with Wi-Di,MEDIA: Card Reader, Web Camera. PORTOVI: HDMI, 2x USB3.1 Gen 1, USB2.0 x 1, VGA. Boja: Dark Ash Silver.Garancija:12 Mjeseci'),
(15, 8, 37, 'Adapter za ugradnju SSD u notebook 12,7 mm Digitus DA-71100', 'Dostupno', 'e24ad1039bcab7c3dbf773cee6da9776', 30, 35, 5, '', '', 'Adapter za ugradnju SSD u notebook 12,7 mm Digitus DA-71100 - dodatne opcije : )'),
(16, 8, 38, 'Esperanza torba za laptop ET191E', 'Dostupno', '9c030d76a47aeff331b13a6f682e4602', 25, 30, 5, '', '', 'Torba za laptop, veliÄine do 15.6", najlon materijal, 2x dodatnih dÅ¾epova za ostale stvari.'),
(17, 8, 39, 'Esperanza hladnjak laptop Sirocco EA105', 'Dostupno', 'fe11a462348d6b81738077cd314c54cd', 10, 15, 5, '', '', 'Hladnjak za laptop do 15.6". 1x Ventilator 160 x 160 mm. Brzina vrtnje ventilatora: do 2400 rpm. Buka: 25 dB(A). Napajanje preko USB-a.'),
(18, 8, 40, 'HP Napojnii Adapter za Laptop 90W (W5D55AA)', 'Dostupno', '9fbad260708b9797c9e976b52b0a5a76', 40, 45, 5, '', '', 'Originalni HP punjaÄ za laptop adapter. MoÅ¾e biti zamjena i rezervna opcija. Dolazi uz 4.5 mm konektor, a tu je i nastavak uz koji se moÅ¾e koristiti na starijim laptopima sa 7.4 mm ulazom. Kompatibilan je sa 90% HP laptopa.Idealan je kao zamjenski ili rezervni adapter.'),
(19, 8, 42, 'HP ruksak za laptop 15.6 Value (K0B39AA)', 'Dostupno', '481395ff68cf601d9a4db31d3df2405c', 30, 35, 5, '', '', 'VeliÄina laptopa: 15.6", Boje ruksaka: Plava i siva, Lagani i praktiÄni ruksak nudi deducirani pretinac za sigurno smjeÅ¡tanje laptopa uz dodatne dÅ¾epove za VaÅ¡e stvari,'),
(20, 9, 43, 'Asonic PCMCI RS232 s kablom', 'Dostupno', 'b463de55fb2846a8c4b954598ad6f1e5', 4, 5, 0, 'Asonic', '', 'PCMCI karta s kablom na serial/RS232'),
(21, 9, 45, 'GIGABYTE VGA GT210 1GB DDR3, GV-N210D3-1GI, nVidia', 'Dostupno', '3fcb376a4d9794e1b6f29e50cab91728', 80, 95, 5, 'Gigabyte', '', 'Frekvencija: 590 MHz. Radni takt: 1200 MHz. KoliÄina memorije: 1 GB. Vrsta memorije grafiÄke kartice: DDR3. Sabirnica: 64 bit. PrikljuÄci: HDMI, DVI-I i D-Sub. Garancija: 24 mjeseca.'),
(22, 11, 70, 'Mobitel Huawei Y5 2018 Dual SIM plavi', 'Dostupno', '4d25db930038513fd7d9edb65f75f0e2', 270, 300, 5, 'Huawei', ' Android;|; 5.45";|; Quad Core;|; 720 x 1440;|; 13 MP;|; 5 MP;|; 2 GB;|; 16 GB;|; 3000 mAh;|; Plava', 'OS: Android 8.1 (Oreo). Display: 5.45" IPS LCD(1440 x 720). Procesor: MediaTek MT6739 Quad-core 1.5 GHz Cortex-A53. Memorija 16GB. RAM: 2GB RAM. MreÅ¾a: GSM / HSPA / LTE. Glavna kamera: 13MP , LED bljeskalica. Prednja kamera: 5 MP. Povezivost: Wi-Fi 802.11 b/g/n, Bluetooth 4.0,microUSB. Lociranje: A-GPS, GLONASS. Baterija: Li-Ion 3020 mAh. Garancija: 24 mjeseca.'),
(23, 15, 76, 'Televizor SAMSUNG LED UltraHD SMART TV 75NU7172', 'Dostupno', 'dda06307848ade51801494ae31be800b', 3200, 3500, 5, 'Samsung', ' 75";|; 4K Ultra HD 3840 x 2160;|; WiFi;|; DVB-T2/C/S2;|; Tizen 3.0', 'VeliÄina ekrana: 75". Tip ekrana: LED. Rezolucija: 4K Ultra HD(3840x2160). OsvjeÅ¾enje slike(Hz): 1300 PQI. Ugao gledanja: 178/178. Format: 16:9. Tuneri: DVB-T2/C/S2, Analogni prijamnik. Procesor: Quad Core. Zvuk: 20W(2x 10W). WiFi: DA. Smart: DA. Operativni sistem: Tizen 3.0. Energetska klasa: A+. PrikljuÄci: 3x HDMI, 2x USB, kompozitni ulaz. Garancija: 24 mjeseca'),
(24, 17, 79, 'Canon EOS-1D X Mark II', 'Dostupno', '99f39cd0fe426d667cd87fcb18a54471', 13000, 12500, 5, 'Canon', ' 20,2 mpx;|; 3,2";|; do 4K, 4096 x 2160;|; Litij-ionska punjiva baterija', 'Rezolucija: 20.2 mpx. Navoj za objektiv: EF (ne obuhvaÄ‡a EF-S / EF-M objektive). LCD Ekran: 8,11 cm (3,2" inÄa), VeliÄina videozapisa: Full HD (1920 x 1080p) i 4K, 4096 x 2160. Interface: USB 3,0, LAN, HDMI, vanjski mikrofon, ulaz za sluÅ¡alice i prikljuÄak za daljinsko upravljanje. Baterija: Litij ionska baterija LP-E19. Garancija: 12 mjeseci.'),
(25, 13, 75, 'MS dron CX-50 + VGA kamera', 'Dostupno', '045a7309a4ef868d389b32fdb6d0ebfc', 80, 90, 5, 'MS dron', '', 'MS CX-50 s ugraÄ‘enom VGA kamerom. Mala bespilotna letjelica s daljinskim upravljaÄem. Maksimalni domet: 80m. Baterija: 350 mAh. CX-40 ima inteligentnu kontrolu orijentacije, zaÅ¡tiÄ‡ene propelere, tri brzine leta, super tihi naÄin letenja te moguÄ‡nost 360Â° 3D okreta. Idealan je za igru, zabavu, druÅ¾enje i slobodno vrijeme te istraÅ¾ivaÄke pothvate. Uz ugraÄ‘enu VGA kameru zabiljeÅ¾ite Vama vaÅ¾ne dogaÄ‘aje fotografijom ili snimkom iz sasvim nove, posebne, perspektive. Garancija: 12 mjeseci.'),
(26, 13, 75, 'MS dron BLACK FORCE', 'Dostupno', '8bdc7287352d9a887270ebdfe635f3f0', 130, 150, 5, 'MS dron', '', 'Ugradbena kamera i GPS funkcija. Max brzina: 12,5 m/s. Baterija: 1200 mAh. Max vrijeme letnja: 10-11 min. Vrijeme punjenja: 150min. Rezolucija kamere: HD 720p. WiFi domet: 30-50m. MoguÄ‡nost vraÄ‡anja na tipku. Garancija: 12 mjeseci.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `how_many` int(11) NOT NULL DEFAULT '1',
  `payin_method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_ip`, `item_id`, `price`, `how_many`, `payin_method`) VALUES
(8, 0, '::1', 5, 1700, 1, ''),
(20, 12, '', 12, 300, 1, ''),
(30, 12, '', 24, 12500, 6, ''),
(32, 2, '', 16, 25, 2, ''),
(33, 2, 'null', 3, 900, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `hash` text,
  `title` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `hash`, `title`, `parent`, `child`) VALUES
(1, '<i class="fas fa-desktop"></i>', 'LAPTOPI, PC I MONITORI', NULL, NULL),
(2, '<i class="fas fa-laptop"></i>', 'MOBITELI, TABLETI I GAMING', NULL, NULL),
(3, '<i class="fas fa-camera-retro"></i>', 'TV, FOTO I AUDIO UREÄAJI', NULL, NULL),
(4, '<i class="fas fa-print"></i>', 'PRINTERI, KOPIRI I OFFICE OPREMA', NULL, NULL),
(5, '<i class="fas fa-snowflake"></i>', 'KUÄ†ANSKI APARATI I KLIMA UREÄAJI', NULL, NULL),
(6, '<i class="fas fa-chart-line"></i>', 'SERVERI, MREÅ½A I SOFTWARE', NULL, NULL),
(7, NULL, 'PC RAÄŒUNARI I MONITORI', 1, NULL),
(8, NULL, 'LAPTOPI I OPREMA', 1, NULL),
(9, NULL, 'PC DIJELOVI I MEMORIJE', 1, NULL),
(10, NULL, 'PC PERIFERIJA I SOFTWARE', 1, NULL),
(11, NULL, 'MOBITELI I SMART SATOVI', 2, NULL),
(12, NULL, 'TABLETI I OPREMA', 2, NULL),
(13, NULL, 'GAMING I DRONOVI', 2, NULL),
(14, NULL, 'OPREMA ZA MOBITELE I TABLETE', 2, NULL),
(15, NULL, 'TELEVIZORI I OPREMA', 3, NULL),
(16, NULL, 'AUDIO OPREMA', 3, NULL),
(17, NULL, 'FOTO-VIDEO I OPREMA', 3, NULL),
(18, NULL, 'PROJEKTORI SMART TABLE I DISPLAY RJEÅ ENJA', 3, NULL),
(19, NULL, 'PRINTERI', 4, NULL),
(20, NULL, 'KOPIRI SKENERI I PLOTERI', 4, NULL),
(21, NULL, 'OFFICE OPREMA I MATERIJAL', 4, NULL),
(22, NULL, 'POTROÅ NI MATERIJAL ZA PRINTERE', 4, NULL),
(23, NULL, 'KLIMA UREÄAJI', 5, NULL),
(24, NULL, 'MALI KUÄ†ANSKI APARATI', 5, NULL),
(25, NULL, 'BIJELA TEHNIKA', 5, NULL),
(27, NULL, 'MREÅ½NA OPREMA', 6, NULL),
(28, NULL, 'SERVERI STORAGE I UPS', 6, NULL),
(29, NULL, 'SOFTWARE', 6, NULL),
(32, NULL, 'Game RaÄunari', NULL, 7),
(33, NULL, 'Office RaÄunari', NULL, 7),
(34, NULL, 'Monitori', NULL, 7),
(35, NULL, 'Brand RaÄunari', NULL, 7),
(36, NULL, 'Laptopi', NULL, 8),
(37, NULL, 'Dodatna oprema za laptope', NULL, 8),
(38, NULL, 'Torbe za laptope', NULL, 8),
(39, NULL, 'Hladnjaci za laptope', NULL, 8),
(40, NULL, 'PunjaÄi za laptope', NULL, 8),
(41, NULL, 'Baterije za laptope', NULL, 8),
(42, NULL, 'Ruksaci za laptope', NULL, 8),
(43, NULL, 'Adapteri i kontroleri', NULL, 9),
(44, NULL, 'DVD RW OptiÄki ureÄ‘aji', NULL, 9),
(45, NULL, 'GrafiÄke kartice', NULL, 9),
(46, NULL, 'Hard diskovi', NULL, 9),
(47, NULL, 'Hladnjaci i termalne paste', NULL, 9),
(48, NULL, 'KuÄ‡iÅ¡ta za raÄunare', NULL, 9),
(49, NULL, 'MatiÄne ploÄe', NULL, 9),
(50, NULL, 'Napojne jedinice', NULL, 9),
(51, NULL, 'Prenaponska zaÅ¡tita', NULL, 9),
(52, NULL, 'Procesori', NULL, 9),
(53, NULL, 'RAM memorija', NULL, 9),
(54, NULL, 'SSD diskovi', NULL, 9),
(55, NULL, 'ZvuÄne i TV kartice', NULL, 9),
(56, NULL, 'Memorijske kartice', NULL, 9),
(57, NULL, 'USB Flash diskovi', NULL, 9),
(58, NULL, 'Microsoft Windows', NULL, 10),
(59, NULL, 'Microsoft OEM Office', NULL, 10),
(60, NULL, 'Antivirusni programi', NULL, 10),
(61, NULL, 'MiÅ¡evi', NULL, 10),
(62, NULL, 'Tastature', NULL, 10),
(63, NULL, 'SluÅ¡alice', NULL, 10),
(64, NULL, 'SluÅ¡alice sa mikrofonom', NULL, 10),
(65, NULL, 'Mikrofoni za raÄunare', NULL, 10),
(66, NULL, 'ZvuÄnici ', NULL, 10),
(67, NULL, 'Web kamere', NULL, 10),
(68, NULL, 'Apple Iphone', NULL, 11),
(69, NULL, 'Smart satovi', NULL, 11),
(70, NULL, 'Mobiteli', NULL, 11),
(71, NULL, 'Navigacije', NULL, 12),
(72, NULL, 'Tableti', NULL, 12),
(73, NULL, 'Apple Ipad', NULL, 12),
(74, NULL, 'Gaming stolice i stolovi', NULL, 13),
(75, NULL, 'Dronovi HOME', NULL, 13),
(76, NULL, 'Televizori', NULL, 15),
(77, NULL, 'NosaÄi za televizore', NULL, 15),
(78, NULL, 'Oprema za televizore', NULL, 15),
(79, NULL, 'Fotoaparati', NULL, 17),
(80, NULL, 'Dvogledi', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `home_posts`
--

CREATE TABLE `home_posts` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_posts`
--

INSERT INTO `home_posts` (`id`, `item_id`, `category`) VALUES
(1, 8, 1),
(2, 6, 1),
(3, 9, 1),
(4, 9, 2),
(5, 8, 2),
(6, 7, 2),
(7, 10, 3),
(8, 11, 3),
(9, 10, 2),
(10, 11, 2),
(11, 16, 3),
(12, 16, 1),
(13, 19, 3),
(14, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `hash`, `title`) VALUES
(8, '1549881647', 'fb70af4990dc818c702c6a1032b04307.jpg'),
(9, '1549881647', '2a5f1a112ee0998307105ab46834120d.jpg'),
(13, 'c4c51bcdde1bc7ed5dc3fe3e24e7d53a', 'd7842d06f57c4a86bc0d27e5b1307a0e.jpg'),
(14, 'c53a22e4f96df2bbd3f3f1ed8bf1b61f', '0873ae4c0dfb258a46e95e8a952ae6ef.jpg'),
(15, 'c4c51bcdde1bc7ed5dc3fe3e24e7d53a', '358be2143c413a1fd1ede520d2ae16b3.jpg'),
(16, '18fbd162a811a56798e99204a3b24a91', '33fdb78cdb3291a9987b3454e3f6d050.jpg'),
(17, 'b04b9a0baaf80ebb183faaf99d035f9b', '28a4213e8743c380aaf69bc1f0e08279.jpg'),
(18, '544d5722ec80bf77281ecd774f319fd1', 'ccca9628dfe317452f4a2b65878b187a.jpg'),
(19, '3b167de674d0a01139e6dc5b04eb4a74', 'dffe09272f5e0f9b91c85b5fbce3d802.jpg'),
(20, '7c3b6d8733dfdcc228883e5a62c66a94', '9befc7d678445157ca1fbba55bfff526.jpg'),
(21, '663b7dcd16bf237ad09b6e02e95890e3', 'bfdaf749a8dffa98c57d5b419e7d2cd0.jpg'),
(22, '5e0927941cef5ddf2f41ec32d66f3065', '3d9dd24702ae96af8dac4d1e501c2a84.jpg'),
(23, '7222289b2218df80c4afcb7b1b280ec7', '16a6a91118d33a12cf09ce8fe8c2f28e.jpg'),
(24, 'cb25787c8772ae7f892745a041ca6ae4', '96d9beb5df199e8d15d204b37ac67893.jpg'),
(25, '939aa8a951228f0ebe5f2add36deb780', '2da6e3e53586de29b258117979de95ae.jpg'),
(26, '5d7704558eb3f1bd6111167fbe01a3a8', '8db03fce096a757cee7d1a688a55c46a.jpg'),
(27, '1566e2dd1b734eeb4f2052bfff9bc673', 'da0b89537628300adff42415b3e5f721.jpg'),
(28, 'a62050cf7cc0576aedd8e957bb5b42e1', '5eb7aabeed911901d1ac68f21908d8cb.jpg'),
(29, '7aece80de63bee5f7d9ffb6d092dfb25', 'fc1136d7709d4f642f367ff1f7710bfd.jpg'),
(30, '9e7d47cee940b1f8bd040bdc9841883a', 'b676fb449fc86d6d2dcf0aed528dc815.jpg'),
(31, 'e24ad1039bcab7c3dbf773cee6da9776', 'a1d0400dd9d8f00513ad977cebd5393e.jpg'),
(32, '84b6374e2934cf671e18d7454b03cee6', '90a31cb28f0fdd757f7ce93122a9baf1.jpg'),
(33, '9c030d76a47aeff331b13a6f682e4602', '926f54df68b6a933dfa7b917253b0115.jpg'),
(34, '55d572a0bf2e6beb125cb75503b7a8a0', '4a5da2facb23f13e6da7a1d3f17ea02f.jpg'),
(35, 'fe11a462348d6b81738077cd314c54cd', 'fe1d0818f4e2b9a833cceee0d4f47215.jpg'),
(36, '8c6d17fb7978f7db7c021db9b5bec972', '93c90346437f04d4b7338283c5b6fc23.jpg'),
(37, '9fbad260708b9797c9e976b52b0a5a76', '37fdbe7cd27be4fe93bff1045435cae2.jpg'),
(38, '3c6174ad59b06c5d19eefdf294822168', 'c783cbcf3bb63f244b0d5bb9032e6ee1.jpg'),
(39, '481395ff68cf601d9a4db31d3df2405c', 'a71d43e04568ec86fe8cd675910141b8.jpg'),
(40, '540d95abad5098e368bf3c082c576a1d', 'e7d085c2b3e8ca20cee4d0bbfc317c2e.jpg'),
(41, 'b463de55fb2846a8c4b954598ad6f1e5', '1fcff48228e1113487c0eebce65bfc7e.jpg'),
(42, 'b740aebd27e02a2678203c2bc30c5b19', '97c5c7af373684fb492ed48818d8bb19.jpg'),
(43, '3fcb376a4d9794e1b6f29e50cab91728', 'edd1ec15698e946aa4a1aa7dd55a47ff.jpg'),
(44, '27e985c22cfaf3c07128cb3b49b91a08', '403afd1bb46fd156a5fd9a5698890914.jpg'),
(45, 'f8b56d0dd7ab61a70d56270c5e8cf1c1', '982e84443f66d7a4d31473e9d894ba5b.jpg'),
(46, '4d25db930038513fd7d9edb65f75f0e2', '3f97ae41a92aa68acdb807845941408d.jpg'),
(47, 'dda06307848ade51801494ae31be800b', '443792a8d8655bf26648f166cb284a7c.jpg'),
(48, '99f39cd0fe426d667cd87fcb18a54471', 'b43b6e493c8f9c818d0e3059bbea3187.jpg'),
(49, '045a7309a4ef868d389b32fdb6d0ebfc', '434d3699a60d40bfef017a9f9f385304.jpg'),
(50, '8bdc7287352d9a887270ebdfe635f3f0', '0b2d7a4e29f40f3f348b079e54aa15cf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`) VALUES
(1, 'NARUÄŒIVANJE'),
(2, 'ISPORUKA'),
(3, 'PLAÄ†ANJE'),
(4, 'REKLAMACIJE'),
(5, 'GARANCIJA'),
(6, 'O NAMA');

-- --------------------------------------------------------

--
-- Table structure for table `pages_content`
--

CREATE TABLE `pages_content` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `what` text,
  `title` text,
  `text` text,
  `image_one` text,
  `hash` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_content`
--

INSERT INTO `pages_content` (`id`, `post_id`, `what`, `title`, `text`, `image_one`, `hash`) VALUES
(2, 1, 'huge_header', 'THIS IS THE FIRST HEADER OF THIS POST', NULL, NULL, NULL),
(5, 1, 'one_image', NULL, NULL, '3e38c61eec1bbaf904874da129e1fbe2.jpg', NULL),
(6, 1, 'two_images', NULL, NULL, NULL, '1549881647'),
(9, 1, 'header_text', 'Ovo je naslov', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\0s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \0Content here, content here\0, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \0lorem ipsum\0 will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\0t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\0t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n\r\n', NULL, NULL),
(11, 6, 'huge_header', 'KO SMO MI?', NULL, NULL, NULL),
(12, 6, 'one_image', NULL, NULL, '982a781f79ea7371423d6c892eb3792a.jpg', NULL),
(13, 6, 'header_text', 'UKRATKO O NAMA', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\0t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\0t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \0Content here, content here\0, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \0lorem ipsum\0 will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `hash` text NOT NULL,
  `image_d` text NOT NULL,
  `image_m` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `hash`, `image_d`, `image_m`, `link`) VALUES
(12, 'Post broj  - 1', '1549627167', 'd5a1992948ea8ad8c61f97ead911bf51.jpg', '6c39ef8c04650a3e8e50f284cad356e5.jpg', 'modules.php'),
(13, 'Post broj - 2', '1549629128', 'e16edf9f335dcb317e0d8e43177176fc.jpg', 'd46210481dc7634374f1ec5068784bc6.jpg', ''),
(14, 'Post broj - 3', '1549629144', '7c4728a1a31c921ee1989df83c153de7.jpg', '616ed592236299fea10e8b770403bdb5.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `ip` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `company` text NOT NULL,
  `city` text,
  `postal_code` text,
  `role` text NOT NULL,
  `partner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ip`, `password`, `phone`, `address`, `company`, `city`, `postal_code`, `role`, `partner`) VALUES
(2, 'Aladin KapiÄ‡', 'kaapiic@hotmail.com', '', 'enciklopedija', '', '', '', NULL, NULL, 'root', NULL),
(12, 'John Doe', 'john@doe.com', '::1', 'password', '+38761 683449', 'Muhameda ef. PandÅ¾e 55a', 'Digital Media Development', 'Sarajevo', '71000', 'user', NULL),
(14, 'Å emso Poplava', 'semso@poplava.com', '', 'password', '', '', '', NULL, NULL, 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_items`
--
ALTER TABLE `all_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_posts`
--
ALTER TABLE `home_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_content`
--
ALTER TABLE `pages_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `all_items`
--
ALTER TABLE `all_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `home_posts`
--
ALTER TABLE `home_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages_content`
--
ALTER TABLE `pages_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;