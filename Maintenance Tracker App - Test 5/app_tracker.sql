-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 04:39 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `DeviceId` int(20) NOT NULL,
  `DeviceName` varchar(400) NOT NULL,
  `ProductNo` varchar(40) NOT NULL,
  `Category` varchar(400) NOT NULL,
  `Manufacturer` varchar(400) NOT NULL,
  `DeviceOwner` varchar(400) NOT NULL,
  `DeviceDesc` varchar(5000) NOT NULL,
  `CostPrice` varchar(20) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `UserId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceId`, `DeviceName`, `ProductNo`, `Category`, `Manufacturer`, `DeviceOwner`, `DeviceDesc`, `CostPrice`, `PurchaseDate`, `UserId`) VALUES
(1, 'Ticwatch E', '11111EEFFEER3', '', 'Android', 'Emmanuel Nika', 'Compatibility: Android 4.3+, iOS 8+ | Display: 1.4\" 400 x 400 OLED | Processor: MediaTek MT2601 | Onboard storage: 4GB | Battery duration: Up to 24h | Charging method: Magnetic connecting pin | IP rating: IP67 | Connectivity: Wi-Fi, Bluetooth 4.1', 'shs.1000000', '2018-06-22', 1),
(2, 'BlackBerry Z10', '112D110069382', '', 'BlackBerry', 'Mrs. Kanyago Miriam', 'Blackberry OS 10', 'shs. 5000000', '2018-06-18', 1),
(3, 'Ticwatch S Class', 'A13434F', '', 'Android', 'Ms. Hermoine Granger Potter', 'Compatibility: Android 4.3+, iOS 8+ | Display: 1.4', 'shs. 1000000', '2018-06-10', 2),
(4, 'Misfit Vapor', 'AS124545454', '', 'Android', 'Mr. Harry Potter', 'Compatibility: Android, iOS | Display: 1.3\" 360 x 360 AMOLED | Processor: Dual-core 1.0GHz | Band sizes: 20mm straps | Onboard storage: 4GB | Battery duration: 2 days | Charging method: Wireless | IP rating: 50m | Connectivity: Wi-Fi, Bluetooth', 'shs. 900000', '2018-06-19', 3),
(5, 'LG Watch Sport', '0999182RFE348', '', 'Android', 'Mr. Longbottom', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.38\" 480 x 480 P-OLED | Processor: Snapdragon Wear 2100 | Onboard storage: 4GB | Battery duration: Up to 48h | Charging method: Conductive USB-C charger | IP rating: IP68 | Connectivity: Wi-Fi, Bluetooth, 3G + 4G LTE', 'shs. 7000000', '2018-06-22', 4),
(6, 'Asus ZenWatch 3', '1333AD400976', '', 'Android', 'Prof. Dumbledoe', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.39\" 400 x 400 AMOLED | Processor: Snapdragon Wear 2100 | Onboard storage: 4GB | Battery duration: Up to 48h | Charging method: Magnetic pogo pin | IP rating: IP67 | Connectivity: Wi-Fi, Bluetooth', 'shs. 5000000', '2018-06-21', 3),
(7, 'Huawei Watch', '001928381DFG100', '', 'Android', 'Mr. Draco Malfoy', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.4\" 400 x 400 AMOLED | Processor: Quad-core 1.2 GHz | Onboard storage: 4GB | Battery duration: Up to 24h | Charging method: Conductive USB | IP rating: IP67 | Connectivity: Wi-Fi, Bluetooth', 'shs. 7000000', '2018-06-19', 4),
(8, 'Fossil Q Venture', '0019283819F73', '', 'Android', 'Mrs. Ginny Potter', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.63\" 360 x 360 LTPS LCD | Processor: Intel Atom | Onboard storage: 4GB | Battery duration: Up to 24h | Charging method: Conductive USB | IP rating: IP67 | Connectivity: Wi-Fi, Bluetooth', 'shs. 1000000', '2018-06-19', 4),
(9, 'Huawei Watch 2', '1991CD2281700', '', 'Android', 'Mr. Ron Wesley', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.2\" 390 x 390 | Processor: Snapdragon Wear 2100 | Onboard storage: 4GB | Battery duration: Up to 48h | Charging method: Conductive USB-C charger | IP rating: IP68 | Connectivity: Wi-Fi, Bluetooth, 3G + 4G LTE', 'shs. 750000', '2018-06-06', 4),
(10, 'Fossil Q Founder', '1103393010D323R', '', 'Android', 'Daniel Radcliffe', 'Compatibility: Android 4.3+, iOS 9+ | Display: 1.63\" 360 x 360 LTPS LCD | Processor: Intel Atom | Onboard storage: 4GB | Battery duration: Up to 24h | Charging method: Conductive USB | IP rating: IP67 | Connectivity: Wi-Fi, Bluetooth', 'shs. 755000', '2018-06-09', 4),
(11, 'Dell XPS 13', '12WSDA1123', '', 'DELL', 'Mrs. Mary Akol', 'CPU: 8th-generation Intel Core i5 â€“ i7 | Graphics: Intel UHD Graphics 620 | RAM: 4GB â€“ 16GB | Screen: 13.3-inch FHD (1,920 x 1,080; non-touch) â€“ UHD (3,840 x 2,160; touchscreen) | Storage: 128GB â€“ 1TB SSD', 'shs. 5000000', '2018-05-28', 5),
(12, 'Samsung Notebook 9 Pro', '04492831D29H', '', 'Samsung', 'Mr. Okanya Jesse', 'CPU: 7th generation Intel Core i7 | Graphics: Intel HD Graphics 620 â€“ AMD Radeon Graphics (2GB GDDR5) | RAM: 8GB â€“ 16GB | Screen: 13.3-inch â€“ 15.6-inch FHD (1,920 x 1,080) LED display with Touch Screen Panel | Storage: 256GB SSD', 'shs. 950000', '2018-05-27', 3),
(13, 'Asus Chromebook Flip', '1123131467767', '', 'Google', 'Dr. Fred Mahoney', 'CPU: Intel Core m3 | Graphics: Intel HD Graphics 515 | RAM: 4GB | Screen: 12.5-inch, Full HD (1,920 x 1,080) LED backlit anti-glare | Storage: 64GB eMMC + TPM', 'shs. 704500', '2016-06-01', 3),
(14, 'HP EliteBook', 'A29901300T923', '', 'HP', 'Mrs. Edwardo Sylvester 	', 'OS version: Windows 7 | Dual core i5 	', 'shs. 3250000', '2018-06-26', 5),
(15, 'BlackBerry', '112D110069382', '', 'BlackBerry', 'Mrs. Kanyago Miriam', 'Blackberry OS 10', 'shs. 5000000 ', '2018-06-18', 2),
(16, 'HTC ', '11241f1212', '', '', 'Ms. Hannah Okori', 'Memory 32GB', '', '2018-08-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `OrderId` int(20) NOT NULL,
  `OrderTitle` varchar(6000) NOT NULL,
  `OrderDesc` varchar(6000) NOT NULL,
  `DueDate` date NOT NULL,
  `DeviceName` varchar(400) NOT NULL,
  `Status` varchar(400) NOT NULL,
  `UserId` int(20) NOT NULL,
  `DeviceId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`OrderId`, `OrderTitle`, `OrderDesc`, `DueDate`, `DeviceName`, `Status`, `UserId`, `DeviceId`) VALUES
(1, 'Replace Battery', 'Battery doesn\'t charge on power plug in', '2018-06-27', 'Dell XPS 13', 'Started', 5, 11),
(2, 'Check device', 'Device heats up very in a short time after sending of messages', '2018-06-30', 'Fossil Q Founder', 'Closed', 4, 10),
(3, 'Adjust volume', 'The screen buttons for adjusting volume aren\'t adjusting the volume', '2018-06-27', 'Huawei Watch 2', 'Started', 4, 9),
(4, 'Speed is slow', 'The speed at which the applications run is very slow', '2018-06-27', 'Fossil Q Venture', 'Rejected', 4, 8),
(5, 'Repair android wear', 'Display not working', '2018-06-30', 'LG Watch Style', 'Accepted', 1, 2),
(10, 'Touch pad no longer working', 'Replace the touch screen', '2018-08-14', 'Ticwatch S Class', '', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(40) NOT NULL,
  `UserName` varchar(400) NOT NULL,
  `UserPassword` varchar(40) NOT NULL,
  `UserEmail` varchar(400) NOT NULL,
  `UserLocation` varchar(400) NOT NULL,
  `UserSex` varchar(200) NOT NULL DEFAULT 'M',
  `UserPhone` varchar(100) NOT NULL DEFAULT 'None',
  `UserCategory` varchar(400) NOT NULL DEFAULT 'User',
  `Company` varchar(400) NOT NULL DEFAULT 'None',
  `Feedback` varchar(5000) NOT NULL,
  `CompanyPass` varchar(20) NOT NULL,
  `CompanySize` varchar(200) NOT NULL,
  `DeviceIndustry` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserPassword`, `UserEmail`, `UserLocation`, `UserSex`, `UserPhone`, `UserCategory`, `Company`, `Feedback`, `CompanyPass`, `CompanySize`, `DeviceIndustry`) VALUES
(1, 'Emmanuel Okot', '26ecb9b58922a1daea796b0b32ec584f', 'emmanike@info.co', 'Kampala', 'M', 'None', 'User', 'None', '', '', '', ''),
(2, 'Emmanuel Nika', '26ecb9b58922a1daea796b0b32ec584f', 'emmanuelnika@info.co', 'Kampala', 'M', 'None', 'User', 'None', '', '', '', ''),
(3, 'Mike Johns', '08b32a4f329f98dec687701a29e60179', 'mike@info.co', 'Kumi', 'M', 'None', 'User', 'None', '', '', '', ''),
(4, 'Micheal Jordan', '657735455d9218288794f4b463c2f023', 'mjordans@info.co', 'Kampala', 'M', 'None', 'User', 'None', '', '', '', ''),
(5, 'Randy Travis', 'f05340c51d90e6b79ec2e62b19bf86be', 'rand@info.co', 'Kumi', 'M', 'None', 'User', 'None', '', '', '', ''),
(6, 'Emmanuel Nika', '26ecb9b58922a1daea796b0b32ec584f', 'emma@info.co', 'Kampala', 'M', 'None', 'Administrator', 'Taxify', 'A friend told me', '26ecb9b58922a1daea79', '1-7', 'Mobile Phones');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`DeviceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `DeviceId` (`DeviceId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `DeviceId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `OrderId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
