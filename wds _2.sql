-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 07:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(7, 'Yashodhan', 'Joshi', 'yj1400@nyu.edu', 'yashodhan1400', '$2y$10$WBDODGstKWgVfTCs5MoxquvGDEa1wnXFCBi14pSm.3FEQ4WQt9hx2'),
(8, 'Rachana', 'Swamy', 's.rachana15@gmail.com', 'rachanachotuu', '$2y$10$3vTrWAtS3QxbqDcLF72U5uQGEphhF9rgk3JHETSPy/OgQRmc3TwN6');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cid` decimal(6,0) NOT NULL COMMENT 'Customer Id',
  `Fname` varchar(30) NOT NULL COMMENT 'First Name',
  `Lname` varchar(30) NOT NULL COMMENT 'Last Name',
  `St` varchar(30) NOT NULL COMMENT 'Street Address',
  `City` varchar(30) NOT NULL COMMENT 'Name of the city',
  `State` varchar(2) NOT NULL COMMENT 'State Code',
  `Zipcode` decimal(5,0) NOT NULL COMMENT 'Postal Code',
  `Gender` varchar(1) DEFAULT NULL COMMENT 'Gender',
  `DOB` date NOT NULL COMMENT 'Date of Birth',
  `M_Status` varchar(1) NOT NULL COMMENT 'Marital Status',
  `C_Type` varchar(2) NOT NULL COMMENT 'Customer Type (A / H / AH)'
) ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cid`, `Fname`, `Lname`, `St`, `City`, `State`, `Zipcode`, `Gender`, `DOB`, `M_Status`, `C_Type`) VALUES
('100001', 'MARSHAL', 'ERICKSON', '215 BROADWAY', 'New York', 'NY', '11222', 'M', '1986-07-02', 'M', 'AH'),
('100002', 'LILY', 'ALDRIN', '332 LAFAYETTE', 'NEW YORK', 'NY', '11224', 'F', '1986-06-24', 'M', 'AH'),
('100003', 'BARNEY', 'STINSON', '562 UPPER WEST', 'NEW YORK', 'NY', '11127', 'M', '1988-10-12', 'S', 'H'),
('100004', 'TED EVELYN', 'MOSBY', '215 BROADWAY', 'NEW YORK', 'NY', '11222', 'M', '1987-08-11', 'S', 'H'),
('100005', 'ROBIN', 'SCHERBATSKY', '452 WOODBRIDGE', 'BROOKLYN', 'NY', '11242', 'F', '1989-05-05', 'W', 'H'),
('100006', 'OSCAR', 'MYER', '224 DANBURY', 'COOKS COUNTY', 'WA', '12345', 'M', '1956-02-09', 'W', 'AH'),
('100007', 'QUINTIN', 'TARANTINTO', 'BEVERLY HILL', 'LOS ANGELES', 'CA', '23419', 'M', '1966-04-08', 'M', 'AH'),
('100008', 'MARK', 'ZUCKERBERG', '452 COFFEE LANE', 'REDMOND', 'WA', '89675', 'M', '1990-07-07', 'M', 'AH'),
('100009', 'ELON', 'MUSK', '333 83RD ST', 'BROOKLYN', 'NY', '11667', 'M', '1980-06-22', 'S', 'H'),
('100010', 'ANDY', 'HAMILTION', '111 LA GUARDIA', 'NEW YORK', 'NY', '11236', 'M', '1974-03-12', 'M', 'AH'),
('100011', 'YASH', 'JOSHI', '8020', 'BROOKLYN', 'NY', '89897', 'M', '1989-09-09', 'S', 'A'),
('100012', 'RACHANA', 'SWAMY', '555 25 ST', 'BROOKLYN', 'NY', '11217', 'F', '1966-05-08', 'S', 'A'),
('100013', 'JANE', 'DOE', '111 1ST', 'BROOKLYN', 'NY', '11111', NULL, '2001-01-01', 'W', 'H'),
('100020', 'Wayne', 'Rooney', 'Somewhere', 'Manchester', 'En', '11233', 'M', '2020-04-27', 'S', 'A'),
('100025', 'Alex', 'Ferguson', '556 83rd ST, Apt #1', 'BROOKLYN', 'NY', '11209', 'M', '2020-04-30', 'M', 'H'),
('100042', 'test', 'tetxt', 'TES', 'JKZKCKJZ', 'KJ', '12345', 'M', '2020-05-13', 'M', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `License_no` varchar(10) NOT NULL COMMENT 'Driver''s license number',
  `D_Fname` varchar(30) NOT NULL COMMENT 'FIRST NAME',
  `D_Lname` varchar(30) NOT NULL COMMENT 'LAST NAME',
  `D_DOB` date NOT NULL COMMENT 'Driver''s date of birth'
) ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`License_no`, `D_Fname`, `D_Lname`, `D_DOB`) VALUES
('A116778148', 'JASON', 'BOURNE', '1984-03-12'),
('A156548148', 'MIKAELE', 'BLOMKWIST', '1972-04-11'),
('A226798148', 'RACHANA', 'SWAMY', '1966-05-08'),
('A432798148', 'MARK', 'ZUCKERBERG', '1990-07-07'),
('A450988148', 'LESLIE', 'BOURNE', '1974-03-12'),
('A453388148', 'ANDY', 'HAMILTION', '1974-03-12'),
('A455778148', 'QUINTIN', 'TARANTINTO', '1966-04-08'),
('A456788148', 'MARSHAL', 'ERICKSON', '1986-07-02'),
('A465488148', 'LISBETH', 'SALANDER', '1987-03-10'),
('A667888148', 'OSCAR', 'MYER', '1956-02-09'),
('A776788148', 'YASH', 'JOSHI', '1989-09-09'),
('A996478148', 'TEST', 'TESTINGS', '0001-01-01'),
('A996778148', 'CR&', 'Roonttyq', '2020-05-28'),
('ABCDE12345', 'TEST1', 'TEST1', '2020-04-29'),
('ABCDE12346', 'RODNEY', 'RODGERS', '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `Home_id` decimal(8,0) NOT NULL COMMENT 'Unique Id for each home insured',
  `Purchase_Date` date NOT NULL COMMENT 'Day the house was purchased',
  `Home_value` decimal(10,2) NOT NULL COMMENT 'Home purchase value',
  `Area` decimal(7,2) NOT NULL COMMENT 'Area in Sqft',
  `Home_type` varchar(1) NOT NULL COMMENT 'Type of Home',
  `Auto_fire` decimal(1,0) NOT NULL COMMENT 'Auto Fire Notification',
  `Home_sec` decimal(1,0) NOT NULL COMMENT 'Home Security System',
  `Pool` varchar(1) DEFAULT NULL COMMENT 'Swimming Pool',
  `Basement` decimal(1,0) NOT NULL COMMENT 'DOES THE HOUSE HAVE A BASEMENT',
  `Policy_no` decimal(12,0) DEFAULT NULL COMMENT 'Policy Number'
) ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`Home_id`, `Purchase_Date`, `Home_value`, `Area`, `Home_type`, `Auto_fire`, `Home_sec`, `Pool`, `Basement`, `Policy_no`) VALUES
('10000000', '2020-05-06', '2.00', '2.00', 'M', '1', '1', 'O', '1', '100000000201'),
('10000002', '2020-04-30', '10000.00', '1000.00', 'M', '1', '1', 'M', '1', '100000000032'),
('10003001', '2019-03-01', '400000.00', '1100.00', 'S', '1', '1', NULL, '0', '100000000201'),
('10003002', '2017-07-01', '250000.00', '700.00', 'M', '1', '1', NULL, '1', '100000000202'),
('10003003', '2019-09-13', '150000.00', '500.00', 'S', '1', '1', NULL, '0', '100000000203'),
('10003004', '2019-01-05', '190000.00', '800.00', 'M', '1', '1', 'O', '1', '100000000204'),
('10003005', '2018-03-04', '500000.00', '1500.00', 'T', '1', '1', 'I', '1', '100000000205'),
('10003006', '2017-10-19', '300000.00', '1100.00', 'C', '1', '0', NULL, '0', '100000000206'),
('10003007', '2019-10-18', '1400000.00', '2100.00', 'T', '1', '1', 'U', '0', '100000000207'),
('10003008', '2019-10-18', '2400000.00', '3100.00', 'T', '1', '1', 'M', '1', '100000000207'),
('10003009', '2017-10-16', '800000.00', '1300.00', 'C', '0', '1', NULL, '0', '100000000208'),
('10003010', '2015-03-25', '1000000.00', '1500.00', 'S', '1', '1', NULL, '0', '100000000209'),
('10003011', '2019-04-21', '600000.00', '12400.00', 'M', '1', '1', NULL, '1', '100000000210'),
('10003012', '2019-12-15', '500000.00', '900.00', 'S', '1', '1', NULL, '0', '100000000211'),
('10003013', '2019-12-15', '500000.00', '900.00', 'S', '1', '1', NULL, '0', '100000000211');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_id` decimal(7,0) NOT NULL COMMENT 'INVOICE NUMBER FOR HOME POLICY',
  `Due_Date` date NOT NULL COMMENT 'DAY PAYMENT IS DUE',
  `Invoice_amt` decimal(10,2) NOT NULL COMMENT 'AMOUNT DUE',
  `Policy_no` decimal(12,0) NOT NULL COMMENT 'Policy Number'
) ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_id`, `Due_Date`, `Invoice_amt`, `Policy_no`) VALUES
('1000001', '2020-04-30', '997.00', '100000000102'),
('1000031', '2020-04-05', '8.00', '100000000101'),
('1001101', '2019-07-02', '425.00', '100000000101'),
('1001107', '2019-04-04', '2400.00', '100000000102'),
('1001109', '2017-12-14', '1400.00', '100000000103'),
('1001110', '2020-05-08', '2200.00', '100000000104'),
('1001113', '2019-11-14', '400.00', '100000000105'),
('1001114', '2019-05-07', '1200.00', '100000000106'),
('1001115', '2020-01-13', '900.00', '100000000107'),
('1001116', '2018-08-07', '900.00', '100000000108'),
('1001120', '2016-12-14', '220.00', '100000000110'),
('1001121', '2019-08-02', '200.00', '100000000111'),
('1001201', '2019-03-28', '1000.00', '100000000201'),
('1001202', '2017-08-01', '1100.00', '100000000202'),
('1001203', '2019-10-13', '700.00', '100000000203'),
('1001204', '2019-02-01', '900.00', '100000000204'),
('1001205', '2018-05-04', '5000.00', '100000000205'),
('1001206', '2018-10-04', '6000.00', '100000000205'),
('1001208', '2017-12-14', '9000.00', '100000000206'),
('1001211', '2019-11-14', '20000.00', '100000000207'),
('1001212', '2019-12-14', '9000.00', '100000000207'),
('1001217', '2017-11-14', '12000.00', '100000000208'),
('1001218', '2015-04-14', '10000.00', '100000000209'),
('1001219', '2019-10-14', '300.00', '100000000109'),
('1001222', '2019-11-14', '2400.00', '100000000210'),
('1001223', '2020-01-14', '4400.00', '100000000211'),
('1008008', '2020-04-28', '5.00', '100000000102');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Instal_ID` decimal(8,0) NOT NULL COMMENT 'INSTALLMENT ID',
  `Instal_amt` decimal(10,2) NOT NULL COMMENT 'AMOUT PAID IN INSTALMENT',
  `Pay_date` date NOT NULL COMMENT 'PAYMENT DATE',
  `Pay_method` varchar(6) NOT NULL COMMENT 'Method of PAYMENT',
  `Invoice_id` decimal(7,0) NOT NULL COMMENT 'INVOICE NUMBER'
) ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Instal_ID`, `Instal_amt`, `Pay_date`, `Pay_method`, `Invoice_id`) VALUES
('10000000', '101.00', '2020-04-30', 'PAYPAL', '1000001'),
('10001101', '420.00', '2019-07-01', 'CREDIT', '1001101'),
('10001102', '2400.00', '2019-04-02', 'PAYPAL', '1001202'),
('10001103', '1500.00', '2017-12-01', 'CHEQUE', '1001203'),
('10001104', '2200.00', '2020-05-01', 'CHEQUE', '1001204'),
('10001105', '400.00', '2019-11-09', 'PAYPAL', '1001205'),
('10001106', '1200.00', '2019-05-01', 'CREDIT', '1001206'),
('10001107', '900.00', '2020-01-15', 'DEBIT', '1001107'),
('10001108', '900.00', '2018-08-07', 'DEBIT', '1001208'),
('10001109', '300.00', '2019-10-14', 'DEBIT', '1001109'),
('10001110', '220.00', '2016-12-11', 'DEBIT', '1001110'),
('10001111', '200.00', '2019-08-01', 'PAYPAL', '1001110'),
('10001201', '1000.00', '2019-03-18', 'CHEQUE', '1001201'),
('10001202', '1100.00', '2017-08-01', 'DEBIT', '1001202'),
('10001203', '700.00', '2019-10-13', 'DEBIT', '1001203'),
('10001204', '900.00', '2019-01-15', 'DEBIT', '1001204'),
('10001205', '5000.00', '2018-05-04', 'CHEQUE', '1001205'),
('10001206', '9000.00', '2017-12-10', 'CHEQUE', '1001206'),
('10001207', '10000.00', '2019-11-10', 'CHEQUE', '1001107'),
('10001208', '10000.00', '2019-11-13', 'CHEQUE', '1001107'),
('10001209', '10000.00', '2017-11-01', 'CHEQUE', '1001208'),
('10001210', '2000.00', '2017-11-04', 'CREDIT', '1001208'),
('10001211', '10000.00', '2017-04-04', 'CREDIT', '1001219'),
('10001212', '2400.00', '2019-10-14', 'CREDIT', '1001211'),
('10001213', '4400.00', '2020-01-02', 'CHEQUE', '1001211');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `Policy_no` decimal(12,0) NOT NULL COMMENT 'Policy Number',
  `P_Type` varchar(1) NOT NULL COMMENT 'Primary Type (A/H)',
  `Cid` decimal(6,0) NOT NULL COMMENT 'Customer ID',
  `Start_Date` date NOT NULL COMMENT 'POLICY START DATE',
  `End_Date` date NOT NULL COMMENT 'POLICY END DATE',
  `Premium` decimal(10,2) NOT NULL COMMENT 'MONTHLY PREMIUM AMOUNT',
  `Status` varchar(1) NOT NULL COMMENT 'POLICY STATUS ( Current/Expired)'
) ;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`Policy_no`, `P_Type`, `Cid`, `Start_Date`, `End_Date`, `Premium`, `Status`) VALUES
('100000000031', 'A', '100020', '2020-04-01', '2020-04-02', '10.00', 'C'),
('100000000032', 'H', '100004', '2020-04-21', '2020-04-23', '500.00', 'C'),
('100000000046', 'H', '100020', '2020-04-23', '2020-04-29', '101.00', 'C'),
('100000000101', 'A', '100001', '2019-07-01', '2020-06-30', '425.00', 'C'),
('100000000102', 'A', '100006', '2019-04-04', '2020-04-03', '2400.00', 'C'),
('100000000103', 'A', '100007', '2017-10-14', '2018-10-03', '1400.00', 'P'),
('100000000104', 'H', '100007', '2020-04-08', '2022-04-07', '2200.00', 'P'),
('100000000105', 'A', '100008', '2019-10-14', '2021-10-03', '400.00', 'C'),
('100000000106', 'A', '100009', '2019-04-07', '2020-03-07', '1200.00', 'C'),
('100000000107', 'A', '100010', '2019-11-14', '2021-11-03', '900.00', 'C'),
('100000000108', 'A', '100010', '2018-07-07', '2019-07-06', '900.00', 'P'),
('100000000109', 'A', '100011', '2019-09-14', '2021-09-03', '300.00', 'C'),
('100000000110', 'A', '100011', '2016-10-14', '2017-10-13', '220.00', 'P'),
('100000000111', 'A', '100012', '2019-07-02', '2021-07-02', '200.00', 'C'),
('100000000201', 'H', '100002', '2019-02-28', '2020-03-30', '1000.00', 'C'),
('100000000202', 'H', '100003', '2017-08-01', '2020-09-30', '1100.00', 'P'),
('100000000203', 'H', '100004', '2019-09-13', '2020-09-12', '700.00', 'C'),
('100000000204', 'H', '100005', '2019-01-01', '2020-06-01', '900.00', 'C'),
('100000000205', 'H', '100006', '2018-04-04', '2020-04-03', '11000.00', 'C'),
('100000000206', 'H', '100007', '2017-10-14', '2018-10-13', '9000.00', 'P'),
('100000000207', 'H', '100008', '2019-10-14', '2020-10-13', '29000.00', 'C'),
('100000000208', 'H', '100010', '2017-10-14', '2021-10-13', '12000.00', 'C'),
('100000000209', 'H', '100010', '2015-03-14', '2017-03-13', '10000.00', 'P'),
('100000000210', 'H', '100013', '2019-10-14', '2021-11-03', '2400.00', 'C'),
('100000000211', 'H', '100013', '2019-12-14', '2021-11-03', '4400.00', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--
CREATE TABLE `request` (
  `Request_time` datetime NOT NULL DEFAULT current_timestamp(),
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL, 
  `St` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zipcode` int(5) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `DOB` date NOT NULL,
  `M_Status` varchar(1) NOT NULL,
  `Itype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Request_time`, `Fname`, `Lname`, `Email`, `St`, `City`, `State`, `Zipcode`, `Gender`, `DOB`, `M_Status`, `Itype`) VALUES
('0000-00-00 00:00:00', 'Yashodhan', 'Joshi', 'yashodhanjoshi@gmail.com', '556 83rd ST', 'BROOKLYN', 'NY', 11209, 'M', '2020-05-12', 'S', 'H'),
('2020-05-02 15:37:31', 'Tejas', 'Awasarmol', 'ta123@gmail.com', '19th Ellora, 20/21 Carter Road', 'MUMBAI', 'MAHARASHTRA', 40005, 'M', '2020-05-21', 'M', 'B'),
('2020-05-02 15:39:47', 'test', 'test', 'tt@gmail.com','test', 'test', 'tt', 11233, 'F', '2007-01-22', 'M', 'A'),
('2020-05-02 15:52:40', 'Abel', 'Kumar','tt@gmail.com', 'Test', 'Test', 'TT', 11209, 'M', '2020-05-07', 'W', 'A'),
('2020-05-02 16:04:03', 'Abel', 'Kumar','tt@gmail.com', 'Test', 'Test', 'TT', 11209, 'M', '2020-05-07', 'W', 'A'),
('2020-05-02 16:07:16', 'lol', 'lol','tt@gmail.com', 'lol', 'lol', 'lol', 11234, 'F', '2020-05-19', 'S', 'A'),
('2020-05-04 12:12:56', 'Yashodhan', 'Joshi','tt@gmail.com', '556 83rd ST, Apt #1', 'BROOKLYN', 'NY', 11209, 'M', '2020-05-22', 'M', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vin` varchar(10) NOT NULL COMMENT 'VEHICLE IDENTIFICATION NUMBER',
  `V_make` varchar(30) NOT NULL COMMENT 'VEHICLE MAKE AND MODEL',
  `V_model` varchar(30) NOT NULL COMMENT 'Vehicle Model',
  `V_year` year(4) NOT NULL COMMENT 'YEAR THE CAR WAS BOUGHT',
  `V_status` varchar(1) NOT NULL COMMENT 'STATUS IS L,F,O',
  `Policy_no` decimal(12,0) NOT NULL COMMENT 'POLICY NUMBER'
) ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vin`, `V_make`, `V_model`, `V_year`, `V_status`, `Policy_no`) VALUES
('ABCDE12345', 'TEST', 'TEST', 0000, 'L', '100000000031'),
('ABCDE12346', 'test', 'test', 0000, 'F', '100000000101'),
('C167731467', 'VW', 'Polo', 2019, 'O', '100000000110'),
('C177894532', 'BAJAJ', 'CHETAK', 2015, 'O', '100000000109'),
('D990131479', 'VW', 'POLO', 2018, 'O', '100000000111'),
('M121105964', 'HONDA', 'CRV', 2016, 'L', '100000000103'),
('M121314121', 'HONDA', 'ACCORD', 2018, 'O', '100000000101'),
('M128299909', 'BMW', 'M3', 2019, 'O', '100000000102'),
('M128537088', 'VW', 'POLO', 2019, 'O', '100000000102'),
('N122644567', 'VW', 'PASSAT', 2015, 'F', '100000000104'),
('N125277889', 'VW', 'POLO', 2017, 'L', '100000000105'),
('N332314978', 'BMW', 'M5', 2017, 'F', '100000000106'),
('O121314123', 'HONDA', 'DYNAMO', 2015, 'L', '100000000108'),
('O456314111', 'AUDI', 'Q7', 2020, 'F', '100000000107'),
('testtestte', 'tester', 'test', 2020, 'L', '100000000104');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_driver`
--

CREATE TABLE `vehicle_driver` (
  `Vin` varchar(10) NOT NULL COMMENT 'Vehicle Id Number',
  `License_no` varchar(10) NOT NULL COMMENT 'Driver''s license number',
  `Rating` decimal(2,0) NOT NULL COMMENT 'DRIVER RATINGS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_driver`
--

INSERT INTO `vehicle_driver` (`Vin`, `License_no`, `Rating`) VALUES
('ABCDE12345', 'ABCDE12345', '5'),
('C167731467', 'A432798148', '8'),
('C167731467', 'A465488148', '9'),
('C167731467', 'A996778148', '10'),
('C177894532', 'A465488148', '7'),
('D990131479', 'A432798148', '8'),
('D990131479', 'A465488148', '9'),
('M121105964', 'A455778148', '8'),
('M121314121', 'A432798148', '7'),
('M121314121', 'A456788148', '8'),
('M128299909', 'A667888148', '6'),
('M128537088', 'A455778148', '9'),
('N122644567', 'A453388148', '5'),
('N125277889', 'A776788148', '9'),
('N332314978', 'A226798148', '8'),
('O121314123', 'A156548148', '9'),
('O121314123', 'A226798148', '1'),
('O121314123', 'A450988148', '1'),
('O456314111', 'A450988148', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`License_no`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Home_id`),
  ADD KEY `policy_no` (`Policy_no`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_id`),
  ADD KEY `policy_no` (`Policy_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Instal_ID`),
  ADD KEY `invoice_id` (`Invoice_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`Policy_no`),
  ADD KEY `c_id` (`Cid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_time`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vin`),
  ADD KEY `policy_no` (`Policy_no`);

--
-- Indexes for table `vehicle_driver`
--
ALTER TABLE `vehicle_driver`
  ADD PRIMARY KEY (`Vin`,`License_no`),
  ADD KEY `license_no` (`License_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`),
  ADD CONSTRAINT `home_policy_fk` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`),
  ADD CONSTRAINT `invoice_policy_fk` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `payment_invoice_fk` FOREIGN KEY (`Invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `pk_customer_policy` FOREIGN KEY (`Cid`) REFERENCES `customer` (`Cid`),
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `customer` (`Cid`),
  ADD CONSTRAINT `policy_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `customer` (`Cid`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`),
  ADD CONSTRAINT `vehicle_policy_fk` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`Policy_No`);

--
-- Constraints for table `vehicle_driver`
--
ALTER TABLE `vehicle_driver`
  ADD CONSTRAINT `vehicle_driver_drivers_fk` FOREIGN KEY (`license_no`) REFERENCES `drivers` (`license_no`),
  ADD CONSTRAINT `vehicle_driver_ibfk_1` FOREIGN KEY (`license_no`) REFERENCES `drivers` (`license_no`),
  ADD CONSTRAINT `vehicle_driver_ibfk_2` FOREIGN KEY (`vin`) REFERENCES `vehicle` (`vin`),
  ADD CONSTRAINT `vehicle_driver_vehicle_fk` FOREIGN KEY (`vin`) REFERENCES `vehicle` (`vin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
