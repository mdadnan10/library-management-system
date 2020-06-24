-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 04:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(7) NOT NULL,
  `bid` int(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `rack` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bid`, `file`, `name`, `author`, `edition`, `status`, `quantity`, `department`, `rack`) VALUES
(1, 3241, 'java.jpg', 'JAVA', 'Kathy Sierra, Bert Bates', '1st', 'Available', 13, 'BSC(ITM)', '12,C3'),
(2, 9763, 'se.jpg', 'Software Engineering', 'Roger S. Pressman', '4th', 'Available', 18, 'BCA', '11,A1'),
(3, 2241, 'fm.jpg', 'Financial Management', ' Prasanna Chandra', '3rd', 'Available', 22, 'BBA', '3B'),
(4, 1351, 'os.jpg', 'Operating System Concepts', 'Avi Silberschatz', '6th', 'Available', 54, 'BSC(CS)', '7A'),
(5, 7854, 'me.jpg', 'Principles of Microeconomics', 'N. Gregory Mankiw', '1st', 'Available', 33, 'B.com', '4C1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `reply` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `reply`, `name`, `comment`) VALUES
(1, 'staff', 'admin2000', 'the first msg.'),
(2, 'user', 'archi10', 'hello sir.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tittle` varchar(70) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `username` varchar(100) NOT NULL,
  `bid` varchar(30) NOT NULL,
  `approve` varchar(30) NOT NULL,
  `issue` date NOT NULL,
  `retorn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`username`, `bid`, `approve`, `issue`, `retorn`) VALUES
('aditya03', '3241', 'RETURNED', '0000-00-00', '0000-00-00'),
('anita04', '3241', 'EXPIRED', '2019-04-03', '2019-04-10'),
('anita04', '4421', 'RETURNED', '0000-00-00', '0000-00-00'),
('adnan07', '4240', 'RETURNED', '0000-00-00', '0000-00-00'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('adnan07', '9045', 'RETURNED', '0000-00-00', '0000-00-00'),
('adnan07', '9045', 'RETURNED', '0000-00-00', '0000-00-00'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('adnan07', '3241', 'EXPIRED', '0000-00-00', '2010-04-19'),
('Ayush007', '2241', 'RETURNED', '0000-00-00', '0000-00-00'),
('ayush007', '3241', 'EXPIRED', '0000-00-00', '0000-00-00'),
('ayush007', '1351', 'EXPIRED', '0000-00-00', '0000-00-00'),
('ayush007', '9763', 'RETURNED', '0000-00-00', '0000-00-00'),
('ayush007', '2241', 'RETURNED', '0000-00-00', '0000-00-00'),
('anita04', '3241', 'EXPIRED', '2019-04-03', '2019-04-10'),
('ayush007', '3241', '', '0000-00-00', '0000-00-00'),
('nivedita5789', '2241', '', '0000-00-00', '0000-00-00'),
('archi10', '9763', 'EXPIRED', '2019-11-25', '2019-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(5) NOT NULL,
  `susername` varchar(30) NOT NULL,
  `dusername` varchar(30) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `reed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `susername`, `dusername`, `tittle`, `msg`, `reed`) VALUES
(1, 'librarian01', 'adnan07', 'this is testing', 'i want to test message is sending or not .\r\n', 'seen'),
(2, 'librarian01', 'anita04', 'feedback not working', 'shurtout the problem in feedback notification form', 'seen'),
(3, 'librarian01', 'adnan07', 'when you will submit your book.', 'your book id 3241 is already expired,submit your book as soon as possible otherwise you have to pay more fine thank you.', 'seen'),
(4, 'librarian01', 'farheen01', 'where is your zoology book?', 'when you will submit your book?', 'seen'),
(5, 'librarian01', 'deb369', 'gedu anwesha jindabad', 'anwesha lovvvvvvvvveeeeee youuuuuuuuuuuuuuuu nd many more to come.', 'seen'),
(6, 'librarian01', 'monsoon24', 'where are you', 'when you will come back.', 'seen'),
(7, 'librarian01', 'aditya03', 'need to know status', 'need to know the status of sending message.\r\n', 'seen'),
(8, 'librarian01', 'adnan07', 'when you will submit your book.', 'where is the book.\r\n', 'seen'),
(9, 'librarian01', 'shilpi46', 'where are you?', 'when you wil be back to coolege?', 'sent'),
(10, 'librarian01', 'farheen01', 'you are not punctual', 'i am notice that you are not punctual to come class.', 'seen'),
(11, 'librarian01', 'adnan07', 'congrats', 'Congratulation adnan07 the scroll bar is working perfectly,thank you,', 'seen'),
(12, 'librarian01', 'adnan07', 'Now work on edit page', 'please complete the edit page as soon as possible,the project submisson date is very near.', 'seen'),
(13, 'librarian01', 'adnan07', 'md', 'how are you', 'seen'),
(14, 'librarian01', 'ayush007', 'we are sorry', 'we are sorry that the it book is not available.we will try our level best to get the stock.', 'seen'),
(15, 'HAPPY', 'ayush007', 'regarding study', 'how about ur study?', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(25) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `sid`, `first`, `last`, `username`, `password`, `email`, `mobile`, `pic`) VALUES
(1, '4432', 'MR.', 'LIBRARIAN', 'librarian01', 'library', 'onlinelibrary@gmail.com', '9178649035', 'md.jpg'),
(2, '56743', 'admin', 'admin', 'admin2000', 'admin', 'niislibrary@gmail.com', '0123456789', 'IMG_20180511_174455.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(8) NOT NULL,
  `first` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `course` varchar(15) NOT NULL,
  `batch` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first`, `username`, `password`, `roll`, `course`, `batch`, `address`, `contact`, `email`, `pic`) VALUES
(1, 'MD ADNAN KHAN', 'adnan07', 'adnan', '12UITM165022', 'Bsc(ITM)', '2016-19', 'AT/PO-Binjharpur,DIST-Jajpur,PIN-755004', '8984516332', 'onlyadnancul.01@gmail.com', 'beard boy.jpg'),
(2, 'Monosweeni Padhihari', 'monsoon24', 'monsoon', '12UITM165024', 'B.sc(ITM)', '2016-19', 'AT/PO-Rasulgarh,DIST-Khurda,PIN-751006', '7008363301', 'monosweenipadhihari@gmail.com', 'pexels-photo-757385.jpeg'),
(3, 'ARCHANA NAYAK', 'archi10', 'archi', '12UCS161044', 'B.SC(CS)', '2018-21', 'at/po-sailasri vihar,dist-khurda,pin-751021', '6371858543', 'archana1234mama1999@gmail.com', 'penguin-funny-blue-water-86405.jpeg'),
(4, 'ANITA GUPTA', 'anita04', 'anita', '12UITM165004', 'B.sc(ITM)', '2016-19', 'AT/PO-Nuapada,DIST-Nuapada,PIN-766105', '7326933643', 'anitagupta2797@gmail.com', 'user.jpg'),
(5, 'ADITYA NARAYAN LENKA', 'aditya03', 'aditya', '12UITM165003', 'B.sc(ITM)', '2016-19', 'AT/PO-Goroda,DIST-Jgathsinghpur,PIN-754137', '9090229820', 'mailmeaditya01@gmail.com', 'user.jpg'),
(6, 'farheen Ayesha', 'farheen01', 'farheen', '12UBSC161004', 'BSC(hons)', '2018-21', 'at/po-Dumduma,\r\nDist-Khurda,\r\nPin-751019', '9090564462', 'farheenayesha@gmail.com', 'user.jpg'),
(7, 'Debasis Sarangi', 'deb369', '+2wali', '12UITM165013', 'B.sc(ITM)', '2016-19', 'AT/PO-Neeladri Vihar\r\nDIST-Khurda\r\nPIN-751021', '8249657684', 'debasis.7271@gmail.com', 'user.jpg'),
(8, 'Shilpi Jaiswal', 'shilpi46', 'shilpi', '12UITM165046', 'B.sc(ITM)', '2016-19', 'AT/PO-Jharsuguda,\r\nDIST-Jharsuguda,\r\nPIN-768201', '7750916585', 'shilpijaiswal@gmail.com', 'user.jpg'),
(9, 'Sahil ku Rout', 'sahil36', 'sahil', '12UITM165038', 'BSC(ITM)', '2016-19', 'at/po-Patala,Balarampur\r\ndist-Dhenkanal,\r\npin-759019', '7978386840', 'mailmesahil02@gmail.com', 'user.jpg'),
(10, 'Ayush ku. yadav', 'ayush007', 'ayush', '12uitm165006', 'BSC(ITM)', '2016-19', 'at/po-chowkipara,dist-Jharsuguda,pin-768201', '7978973109', 'ay7792750@gmail.com', 'pexels-photo-1201397.jpeg'),
(11, 'FARHAN KHAN', 'farhan35', 'farhan', '1265035', 'B.TECH', '2016-20', 'at/po-Binjharpur,\r\ndist-jajpur,\r\npin-755004', '7377323208', 'only.farhancul01@gmail.com', 'IMG_20160518_160144.jpg'),
(12, 'Nivedita Bebarta', 'nivedita5789', 'chinmaya', '1234UT18026', 'bba', '2018', '\r\nliv-306, phase-4 Dumduma,Bhubaneswar', '7751902026', 'niveditabebarta@gmail.com', 'antique-black-call-1416530.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
