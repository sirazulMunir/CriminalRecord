-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 08:07 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `crime_id` int(15) NOT NULL,
  `authority_email` varchar(20) NOT NULL,
  `authority_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authority_info`
--

CREATE TABLE `authority_info` (
  `authority_email` varchar(30) NOT NULL,
  `authority_password` varchar(30) NOT NULL,
  `authority_name` varchar(20) DEFAULT NULL,
  `duty_area` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority_info`
--

INSERT INTO `authority_info` (`authority_email`, `authority_password`, `authority_name`, `duty_area`) VALUES
('toxicboy574@gmail.com', '1234', 'Munir', 'Dhanmondi'),
('tushar123@gmail.com', '1234', 'Tushar', 'Mohammadpur');

-- --------------------------------------------------------

--
-- Table structure for table `commit`
--

CREATE TABLE `commit` (
  `criminal_id` int(15) NOT NULL,
  `complain_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(30) NOT NULL,
  `suspect_name` varchar(30) DEFAULT NULL,
  `suspect_age` int(10) DEFAULT NULL,
  `suspect_gender` varchar(30) DEFAULT NULL,
  `crime_type` varchar(30) DEFAULT NULL,
  `complain_description` varchar(1000) DEFAULT NULL,
  `complain_date` varchar(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `complain_ststus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `suspect_name`, `suspect_age`, `suspect_gender`, `crime_type`, `complain_description`, `complain_date`, `image`, `complain_ststus`) VALUES
(3, 'Tushar', 30, 'Male', 'Child Abuse', 'Abused a child', '2017-09-12', '16835919_1642056726100587_6964851786555988914_o.jpg', 1),
(4, 'Maria Hossain', 28, 'Male', 'Fraud', 'Took money from many boys', '2017-09-06', '21731544_1784918695139160_7108067714881915297_o.jpg', 1),
(5, 'Rakibul Alam', 34, 'Male', 'Rape', 'Rapped house maid', '2017-09-16', '15675732_1304112506326967_921167085162973862_o.jpg', 1),
(6, 'himi alam', 30, 'Female', 'Theft', 'stolen on my watch', '2017-09-02', '21462501_1496294343825525_3039176870031600378_n.jpg', 1),
(7, 'nabila', 20, 'Female', 'Kidnapping', 'kidnapped by my friend whos name is shamim', '2017-09-01', '20108614_1451598634933339_5750729196940387385_n.jpg', 1),
(8, 'Tithi ', 28, 'Female', 'Fraud', 'Took money from me.', '2017-09-07', '18073361_1012059118924422_1312325011_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complainer`
--

CREATE TABLE `complainer` (
  `complainer_id` int(11) NOT NULL,
  `complainer_name` varchar(20) DEFAULT NULL,
  `complainer_nid` varchar(30) DEFAULT NULL,
  `complainer_phone` varchar(20) DEFAULT NULL,
  `complainer_email` varchar(40) DEFAULT NULL,
  `complainer_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainer`
--

INSERT INTO `complainer` (`complainer_id`, `complainer_name`, `complainer_nid`, `complainer_phone`, `complainer_email`, `complainer_address`) VALUES
(3, 'SIrazul Munir', '1994121125', '01774098177', 'munirsirazul@yahoo.com', 'Staff Quarter, DHanmondi'),
(4, 'SIrazul Munir', '1994121125', '01774098177', 'munirsirazul@yahoo.com', 'Staff Quarter, DHanmondi'),
(5, 'SIrazul Munir', '1994121125', '01774098177', 'munirsirazul@yahoo.com', 'Staff Quarter, DHanmondi'),
(6, 'Shamsu', '01239874562', '01567398109', 'shamsu@gmail.com', 'najinur hospital'),
(7, 'Shamsu', '01239874562', '01567398109', 'shamsu@gmail.com', 'najinur hospital'),
(8, 'Shamsu', '01239874562', '01567398109', 'shamsu@gmail.com', 'najinur hospital');

-- --------------------------------------------------------

--
-- Table structure for table `crime_record`
--

CREATE TABLE `crime_record` (
  `crime_id` int(20) NOT NULL,
  `crime_type` varchar(50) DEFAULT NULL,
  `crime_place` varchar(50) DEFAULT NULL,
  `crime_date` varchar(30) DEFAULT NULL,
  `arrest_status` varchar(30) DEFAULT NULL,
  `thana` char(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime_record`
--

INSERT INTO `crime_record` (`crime_id`, `crime_type`, `crime_place`, `crime_date`, `arrest_status`, `thana`, `description`) VALUES
(5, 'Robbery', 'mirpur', '2017-09-04', 'Not Arrested', 'Dhanmondi', 'Robbed a shop'),
(6, 'Robbery', 'Dutch-Bangla Bank', '2017-09-02', 'Not Arrested', 'Dhanmondi', 'Robbed a Bank'),
(7, 'Kidnapping', 'Afser Uddin', '2017-08-21', 'Not Arrested', 'Dhanmondi', 'Kidnapped a Boy where she works'),
(8, 'Murder', 'mirpur', '2017-09-02', 'Not Arrested', 'Dhanmondi', 'murder by his friend'),
(9, 'Theft', 'Mohammadpur', '2017-07-25', 'Arrested', 'Dhanmondi', 'Theft Huge money by his best-friend'),
(10, 'Rape', 'Modhu Bazar', '2017-09-16', 'Arrested', 'Dhanmondi', 'Rapped a girl'),
(11, 'Rape', 'Saknar ', '2017-02-12', 'Not Arrested', 'Dhanmondi', 'Rapped his house maid'),
(12, 'Kidnapping', 'Jikatola', '2017-04-02', 'Not Arrested', 'Dhanmondi', 'Kidnapped a boy'),
(13, 'Fraud', 'Handi Resturant', '2017-09-05', 'Arrested', 'Dhanmondi', 'Took money but did not returned'),
(14, 'Fraud', '19 Number', '2010-07-18', 'Arrested', 'Dhanmondi', 'Snached a mobile'),
(15, 'Child Abuse', 'staff Quarter', '2017-09-15', 'Arrested', 'Dhanmondi', 'Abused a child'),
(16, 'Extortion', 'Afser Uddin Road', '2017-09-06', 'Arrested', 'Dhanmondi', 'Took Money from many shopkeepers'),
(17, 'Robbery', '10/A Dhanmondi', '2017-09-08', 'Arrested', 'Dhanmondi', 'Robbed a shop'),
(18, 'Robbery', 'Indira REoad', '2017-04-06', 'Arrested', 'Dhanmondi', 'Robbed a house '),
(19, 'Robbery', 'Dimond Hotel', '2017-06-28', 'Arrested', 'Dhanmondi', 'Robbed a DBBL bank'),
(20, 'Rape', 'Dhanmondi 15', '2017-09-15', 'Arrested', 'Dhanmondi', 'Rapped a school girl'),
(21, 'Robbery', 'Agrani Bank', '2017-06-18', 'Arrested', 'Dhanmondi', 'Robbed neighbors house'),
(22, 'Kidnapping', 'Chairman Bari', '2016-01-18', 'Arrested', 'Dhanmondi', 'Kidnapped a boy'),
(23, 'Robbery', 'Tech Hub Office', '2017-02-01', 'Arrested', 'Dhanmondi', 'Robbed an office'),
(25, 'Rape', 'Tikatuli', '2015-08-17', 'Arrested', 'Dhanmondi', 'Rapped a girl'),
(26, 'Kidnapping', 'Afser uddin Road', '2017-06-18', 'Arrested', 'Dhanmondi', 'Kidnapped a baby'),
(33, 'Theft', 'karim', '2017-09-04', 'Not Arrested', 'Dhanmondi', 'stolefggddd'),
(34, 'Kidnapping', 'mohammadpur', '2017-09-10', 'Not Arrested', 'Mohammadpur', 'kidnapped a baby'),
(35, 'Kidnapping', 'mohammadpur', '2017-09-01', 'Arrested', 'Mohammadpur', 'kidnapped a baby'),
(36, 'Kidnapping', 'mohammadpur', '2017-08-15', 'Arrested', 'Mohammadpur', 'kidnapped a baby'),
(37, 'Kidnapping', 'rayer,bazar', '2011-01-09', 'Arrested', 'Dhanmondi', 'kidnapped a baby which she works');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `criminal_id` int(20) NOT NULL,
  `criminal_name` varchar(20) DEFAULT NULL,
  `criminal_nid` varchar(30) DEFAULT NULL,
  `criminal_age` int(20) NOT NULL,
  `criminal_gender` char(10) DEFAULT NULL,
  `criminal_address` varchar(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminal_id`, `criminal_name`, `criminal_nid`, `criminal_age`, `criminal_gender`, `criminal_address`, `image`) VALUES
(5, 'Asraf Ullah', '6531287901', 25, 'Male', 'zikatola', '20800296_1437022159685832_6738898225588587277_n.jpg'),
(6, 'Shamsul Alam', '6871205915', 30, 'Male', 'najinur hospital,dhanmondi', '1918887_925766104144491_808307722741606084_n.jpg'),
(7, 'Urbi Roy Choudhury', '8712896045', 22, 'Female', 'Afser Uddin', '230459_222420291118198_3301930_n.jpg'),
(8, 'Al-Hasan-Rupok', '4587210659', 30, 'Male', 'mirpur', '15589763_1384057731624607_4142267542020481074_n.jpg'),
(9, 'Zunaied Hossain', '15735945802', 27, 'Male', 'Afser Uddin', '10409449_655461627882311_5795253282179750670_n.jpg'),
(10, 'Mahbub Ahmed', '54658132658', 32, 'Male', 'Modhu Bazar', '13939511_10210397476757735_8833102209894110784_n.jpg'),
(11, 'Ashikul Islam', '3216565588', 40, 'Male', 'Saknar ', '21246364_683486845192499_395110505981154211_o.jpg'),
(12, 'Maria Hossain', '87459632144', 32, 'Female', 'Jikatola', '21731544_1784918695139160_7108067714881915297_o.jpg'),
(13, 'Nahid Islam', '730981254364', 24, 'Male', 'Handi Resturant', '20621973_1424671870973778_3672753708518163925_n.jpg'),
(14, 'Naser Sakib', '02130450780', 52, 'Male', '19 Number', '17424637_1277502049008093_4019601929176462565_n.jpg'),
(15, 'Mou Gosh', '3211236547789', 30, 'Female', 'staff Quarter', '21192378_1885341931768986_5741447650152417055_n.jpg'),
(16, 'Sakil Ahmed', '326515689058', 30, 'Male', 'Afser Uddin Road', '14238324_1763518763896654_5358012710404636429_n.jpg'),
(17, 'Al Amin', '23215654789', 32, 'Male', '10/A Dhanmondi', '16836264_963956387074685_1306413985372010605_o.jpg'),
(18, 'Mohaiminul Mohan', '73914682054', 36, 'Male', 'Indira REoad', 'IMG_20151204_195716.jpg'),
(19, 'Rayhan Abedin', '654849883165', 30, 'Male', 'Dimond Hotel', '16177939_674726896063764_761310388864456649_o.jpg'),
(20, 'Fazly Imran Moni', '231569985184', 28, 'Male', 'Dhanmondi 15', '21551752_1732447213466344_4493496665767834988_o.jpg'),
(21, 'Maiem Jahangir', '2010203040', 40, 'Male', 'Agrani Bank', '17973514_1151315935014150_8228741119785834378_o.jpg'),
(22, 'Rifat Ara', '3256488938', 26, 'Female', 'Chairman Bari', '21743829_1787333024640193_2197740627374458616_o.jpg'),
(23, 'Faisal Ahmed', '102030405060', 40, 'Male', 'Rifels square', '14993515_1872290006335150_4569263392645028401_n.jpg'),
(25, 'Sojon Roy', '987487874548', 34, 'Male', 'Tikatuli', '18118669_1861019547491409_7314629960705398626_n.jpg'),
(26, 'Upoma Roy', '654848951144', 35, 'Female', 'Afser uddin Road', '12038124_1078968712115775_7139784606983309180_n.jpg'),
(33, 'dolon', '6516595825', 33, 'Female', 'karim bhovon', '15732624_1823441807872924_2762766138766648052_o.jpg'),
(34, 'sagor paul', '0158763214', 33, 'Male', 'mohammadpur', '14462755_1840093816222560_1110645281491155656_n.jpg'),
(35, 'momun mollah', '0785147358', 30, 'Male', 'mohamadpur', '11796363_1618212991765588_6983753489949563477_n.jpg'),
(36, 'Asadujjaman', '45873158978', 30, 'Male', 'mohammadpur', '13151511_1034449659974344_7802220118153815518_n.jpg'),
(37, 'sadeka', '8715934585', 30, 'Female', 'rayer,bazar', '19601454_1901014070187093_8216285078488795840_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `complainer_id` int(11) NOT NULL,
  `complain_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `ID` int(11) NOT NULL,
  `complain_id` int(11) DEFAULT NULL,
  `PERSON` varchar(50) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATEPOSTED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`ID`, `complain_id`, `PERSON`, `COMMENT`, `DATEPOSTED`) VALUES
(13, 7, 'Sirazul Munir', 'It is fake news. I know her ', '2017-09-19 06:41:29'),
(14, 3, 'Shamsu', 'It is fake news. I know him well. He can not do that.', '2017-09-19 07:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `total_crime_record`
--

CREATE TABLE `total_crime_record` (
  `criminal_id` int(20) NOT NULL,
  `crime_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_name` varchar(30) DEFAULT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_NID` varchar(20) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `thana` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_name`, `user_email`, `user_phone`, `user_address`, `user_NID`, `user_gender`, `user_password`, `image`, `thana`) VALUES
('Sirazul Munir', 'munirsirazul@yahoo.com', '01774098177', 'Staff Quarter, Dhanmondi', '1994121125', 'Male', '1234', 'edited1.jpg', 'Dhanmondi'),
('sadidul islam', 'sadidul@gmail.com', '01874315943', 'zikatola', '8731576145', 'Male', '123', '19400156_1047785358686128_2141900448585051142_n.jpg', 'Mohammodpur'),
('Shamsu', 'shamsu@gmail.com', '01567398109', 'najinur hospital', '01239874562', 'Male', '512', '21586776_1415847198469710_7724082364249499954_o.jpg', 'Mohammodpur'),
('Ahadul Islam', 'tushar.657@gmail.com', '01558489743', 'Zikatola,dhaka', '0158796542', 'Male', '1234', '16835919_1642056726100587_6964851786555988914_o.jpg', 'Mohammodpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`crime_id`,`authority_email`,`authority_password`),
  ADD KEY `authority_email` (`authority_email`,`authority_password`);

--
-- Indexes for table `authority_info`
--
ALTER TABLE `authority_info`
  ADD PRIMARY KEY (`authority_email`,`authority_password`);

--
-- Indexes for table `commit`
--
ALTER TABLE `commit`
  ADD PRIMARY KEY (`criminal_id`,`complain_id`),
  ADD KEY `complain_id` (`complain_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `complainer`
--
ALTER TABLE `complainer`
  ADD PRIMARY KEY (`complainer_id`);

--
-- Indexes for table `crime_record`
--
ALTER TABLE `crime_record`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminal_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`complainer_id`,`complain_id`),
  ADD KEY `complain_id` (`complain_id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `total_crime_record`
--
ALTER TABLE `total_crime_record`
  ADD PRIMARY KEY (`criminal_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `crime_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commit`
--
ALTER TABLE `commit`
  MODIFY `criminal_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complainer`
--
ALTER TABLE `complainer`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `criminal_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `total_crime_record`
--
ALTER TABLE `total_crime_record`
  MODIFY `criminal_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`authority_email`,`authority_password`) REFERENCES `authority_info` (`authority_email`, `authority_password`),
  ADD CONSTRAINT `access_ibfk_2` FOREIGN KEY (`crime_id`) REFERENCES `crime_record` (`crime_id`);

--
-- Constraints for table `commit`
--
ALTER TABLE `commit`
  ADD CONSTRAINT `commit_ibfk_1` FOREIGN KEY (`criminal_id`) REFERENCES `criminal` (`criminal_id`),
  ADD CONSTRAINT `commit_ibfk_2` FOREIGN KEY (`complain_id`) REFERENCES `complain` (`complain_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`complainer_id`) REFERENCES `complainer` (`complainer_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`complain_id`) REFERENCES `complain` (`complain_id`);

--
-- Constraints for table `total_crime_record`
--
ALTER TABLE `total_crime_record`
  ADD CONSTRAINT `total_crime_record_ibfk_1` FOREIGN KEY (`criminal_id`) REFERENCES `criminal` (`criminal_id`),
  ADD CONSTRAINT `total_crime_record_ibfk_2` FOREIGN KEY (`crime_id`) REFERENCES `crime_record` (`crime_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
