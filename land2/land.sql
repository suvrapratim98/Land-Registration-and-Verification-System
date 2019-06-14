-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 11:20 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLanduser` ()  select * from landuser$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `id` int(11) NOT NULL,
  `upn` varchar(500) NOT NULL,
  `img1` varchar(5000) NOT NULL,
  `img` varchar(500) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `what_action` varchar(20) NOT NULL,
  `date_uploaded` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documentation`
--

INSERT INTO `documentation` (`id`, `upn`, `img1`, `img`, `userid`, `what_action`, `date_uploaded`) VALUES
(6, 'IMSLU/2017/791789780', 'document/microsoftcollabo.PNG', 'document/mscfchymdy.PNG', 'IMLSUP/USER/2056427', 'New', '02/05/18');

-- --------------------------------------------------------

--
-- Table structure for table `landuser`
--

CREATE TABLE `landuser` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `permanentaddr` text NOT NULL,
  `lga` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landuser`
--

INSERT INTO `landuser` (`id`, `name`, `email`, `permanentaddr`, `lga`, `phone`, `username`, `password`, `userid`, `picture`) VALUES
(7, 'Ikechukwu Sunday', 'ikechukwu23@yahoo.com', 'Umuahia, Abia State', 'Ihime West LGA', '09078654321', 'ike', 'ike', 'IMLSUP/USER/2056427', 'userphoto/13.jpg'),
(8, 'Tamal', 'tamaldey00@gmail.com', 'bangalore', 'whitefield', '5252525', 'tamal01', '12345', 'IMLSUP/USER/1855531', 'userphoto/IMG_20171028_210901.jpg'),
(565, 'suv', 'suv@gmail.com', 'adadad', 'adadad', '414144', 'suv01', '123', 'suve', '');

--
-- Triggers `landuser`
--
DELIMITER $$
CREATE TRIGGER `after_landuser_insert` AFTER INSERT ON `landuser` FOR EACH ROW begin 
insert into landuser_backup values(NEW.id,NEW.name,NEW.email,NEW.permanentaddr,NEW.lga,NEW.phone,NEW.username,NEW.password,NEW.userid,NEW.picture);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `landuser_backup`
--

CREATE TABLE `landuser_backup` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `permanentaddr` text NOT NULL,
  `lga` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landuser_backup`
--

INSERT INTO `landuser_backup` (`id`, `name`, `email`, `permanentaddr`, `lga`, `phone`, `username`, `password`, `userid`, `picture`) VALUES
(7, 'Ikechukwu Sunday', 'ikechukwu23@yahoo.com', 'Umuahia, Abia State', 'Ihime West LGA', '09078654321', 'ike', 'ike', 'IMLSUP/USER/2056427', 'userphoto/13.jpg'),
(565, 'suv', 'suv@gmail.com', 'adadad', 'adadad', '414144', 'suv01', '123', 'suve', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `phone`) VALUES
(1, 'kolade', 'ononogbokolly@gmail.com', 'good stuff', '09036166195');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `tellerno` varchar(20) NOT NULL,
  `date_uploaded` varchar(20) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `upn` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `tellerno`, `date_uploaded`, `payment_date`, `upn`, `photo`) VALUES
(3, '3234435', '02/05/18', '01/05/2018', ' IMSLU/2017/791789780', 'paymentphoto/chiemerie invoice.PNG'),
(4, '54', '02/12/18', '22/11/2018', 'IMSLU/2017/458', 'paymentphoto/IMG_20171028_223407.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regland`
--

CREATE TABLE `regland` (
  `id` int(11) NOT NULL,
  `address_of_land` text NOT NULL,
  `lga` text NOT NULL,
  `acquisition_year` varchar(10) NOT NULL,
  `survey_date` varchar(50) NOT NULL,
  `holding_type` text NOT NULL,
  `current_land_use` text NOT NULL,
  `userid` varchar(200) NOT NULL,
  `certificate_number` varchar(500) NOT NULL,
  `holding_number` varchar(500) NOT NULL,
  `soil_fertility` text NOT NULL,
  `other_evidence` text NOT NULL,
  `encumbrance` text NOT NULL,
  `orthograph_num` varchar(20) NOT NULL,
  `upn` varchar(500) NOT NULL,
  `date_registered` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `gps_coordinates` varchar(100) NOT NULL,
  `soldby` text NOT NULL,
  `note` text NOT NULL,
  `photo` text NOT NULL,
  `username` text NOT NULL,
  `date_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regland`
--

INSERT INTO `regland` (`id`, `address_of_land`, `lga`, `acquisition_year`, `survey_date`, `holding_type`, `current_land_use`, `userid`, `certificate_number`, `holding_number`, `soil_fertility`, `other_evidence`, `encumbrance`, `orthograph_num`, `upn`, `date_registered`, `status`, `gps_coordinates`, `soldby`, `note`, `photo`, `username`, `date_updated`) VALUES
(12, 'Umudagu, Umuahia', 'Tai LGA', '2003', '2011-09-05', 'Private', 'tenacy', 'IMLSUP/USER/2056427', 'RE-234567', 'IMSLU/753723IDSMML/HOLDER', 'Rich', 'none', 'Interest', '45', 'IMSLU/2017/791789780', '02/05/18', 'Registered', '34 56.1 2314', 'none', 'This is my land', 'userphoto/13.jpg', 'Ikechukwu Sunday', ''),
(13, 'channasandra', 'whitefield', '2005', '2018-11-20', 'Communal', 'office', 'IMLSUP/USER/1855531', '1414', 'IMSLU/882DMMILS/HOLDER', 'Medium', 'site', 'Interest', '12', 'IMSLU/2017/458', '02/12/18', 'Registered', '41 21.2423, 22.2123', 'suvro', 'sfsfsf', 'userphoto/IMG_20171028_210901.jpg', 'Tamal', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landuser`
--
ALTER TABLE `landuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landuser_backup`
--
ALTER TABLE `landuser_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regland`
--
ALTER TABLE `regland`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `landuser`
--
ALTER TABLE `landuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT for table `landuser_backup`
--
ALTER TABLE `landuser_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `regland`
--
ALTER TABLE `regland`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
