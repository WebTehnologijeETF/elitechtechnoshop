-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2015 at 12:00 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id` int(11) NOT NULL,
  `vijest` int(11) NOT NULL,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `autor`, `vrijeme`, `tekst`, `email`) VALUES
(1, 2, 'brzi', '2015-05-25 22:46:44', 'ovo je prva vijest ovo je prva vijest ovo je prva vijest ovo je prva vijest ovo je prva vijest ovo je prva vijest ovo je prva vijest ovo je prva vijest', 'brzi@gmail.com'),
(2, 2, 'brzi2', '2015-05-25 22:46:44', 'ovo je druga vijest', 'brzi2@gmail.com'),
(8, 2, 'Zlaja', '2015-05-25 23:19:09', 'OVo je prvi ubaceni komentar', 'zc@gmail.om'),
(9, 2, 'Injector', '2015-05-26 20:19:13', 'Da li radi sql', 'mail'),
(10, 2, 'aaa', '2015-05-26 20:39:51', 'aaaaaaaaaaaaaaaaa', 'aaaa'),
(11, 2, 'hametova', '2015-05-26 21:01:55', 'erd dijagram', 'z@z.c'),
(12, 2, 'sdsd', '2015-05-26 21:02:03', 'dsds', ''),
(13, 2, 'asdsa', '2015-05-26 21:06:43', 'sdasd', ''),
(14, 0, 'asdasds', '2015-05-26 21:10:01', 'adasdasd', 'asd@asd.com');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
  `id` int(11) NOT NULL DEFAULT '0',
  `naslov` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `urlSlike` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `detaljno` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `naslov`, `vrijeme`, `autor`, `tekst`, `urlSlike`, `detaljno`) VALUES
(0, 'Apple objavio novi Macbook', '2015-05-10 22:00:00', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', ''),
(1, 'Apple objelodanio novi macbook', '2015-05-09 22:00:00', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(2, 'Apple objelodanio novi macbook', '2015-05-25 16:34:25', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(3, 'Apple objavio novi Macbook', '2015-05-14 22:00:00', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(4, 'Apple objelodanio novi macbook', '2015-05-22 22:00:00', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id`), ADD KEY `vijest` (`vijest`);

--
-- Indexes for table `novost`
--
ALTER TABLE `novost`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `kom_nov_fk` FOREIGN KEY (`vijest`) REFERENCES `novost` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
