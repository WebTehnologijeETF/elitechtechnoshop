-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2015 at 01:21 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `autor`, `vrijeme`, `tekst`, `email`) VALUES
(22, 1, 'Hikmet', '2015-05-28 23:17:25', 'Ovo je komentar sa mailom.', 'hikmet@brzi.ba'),
(23, 1, 'Hikmet', '2015-05-28 23:17:25', 'Ovo je komentar sa mailom.', 'hikmet@brzi.ba'),
(24, 1, 'Ekrem', '2015-05-28 23:17:59', 'Ovo je komentar bez maila.', ''),
(25, 1, 'Ekrem', '2015-05-28 23:17:59', 'Ovo je komentar bez maila.', ''),
(26, 2, 'Femzo', '2015-05-28 23:18:39', 'Ovo je komentar bez maila.', ''),
(27, 2, 'Femzo', '2015-05-28 23:18:39', 'Ovo je komentar bez maila.', ''),
(28, 3, 'Mirso', '2015-05-28 23:19:37', 'Ovo je komentar sa mailom.', 'mirso@miki.ba'),
(29, 3, 'Hidajet', '2015-05-28 23:19:37', 'Ovo je komentar bez maila.', ''),
(34, 4, 'Fikret', '2015-05-28 23:20:25', 'Ovo je komentar bez maila.', ''),
(35, 3, 'Hidajet', '2015-05-28 23:20:25', 'Ovo je komentar bez maila.', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
`id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `grad` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `postanskiBroj` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `tip` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `password`, `grad`, `postanskiBroj`, `telefon`, `tip`) VALUES
(10, 'Prvi', 'Korisnik', 'prvi@korisnik.ba', 'a9f3cd8f5593c3a0e9ad25af5a981666', '', '', '', 'korisnik'),
(11, 'Zlatan', 'Cilic', 'admin@elitech.ba', '25e4ee4e9229397b6b17776bfceaf8e7', 'Sarajevo', '71000', ' 38761100200', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
`id` int(11) NOT NULL,
  `naslov` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `urlSlike` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `detaljno` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `naslov`, `vrijeme`, `autor`, `tekst`, `urlSlike`, `detaljno`) VALUES
(1, 'Apple objelodanio novi macbook', '2015-05-28 20:55:29', 'Zlatan Cilic', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(2, 'Apple objelodanio novi macbook', '2015-05-28 20:55:46', 'Zlatan Cilic', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(3, 'Apple objelodanio novi macbook', '2015-05-28 20:58:51', 'Zlatan Cilic', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/prazno.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(4, 'Apple objelodanio novi macbook', '2015-05-28 23:12:15', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.'),
(5, 'Apple objelodanio novi macbook', '2015-05-28 23:12:15', 'Zlatan Čilić', 'Kao što ste možda već i čuli, Apple je danas najavio još jedan super tanak laptop koji će se pridružiti MacBook Air i MacBook Pro modelima. Ovdje ćemo vam brzinski objasniti što možete očekivati od komponenti te podjeliti naša mišljenja o novom MacBooku.', 'slike/macbook.png', 'Po mišljenju mnogih Apple već ima dva najbolja laptopa na tržištu uz koje naravno morate platiti Apple taxu ali kad ih se jednom dočepate, skontate da su vrijedni svakog penija. Ponosan sam vlasnih MacBook Aira i mogu vam reći da je jedan od najboljih i najkorišenih laptopa koje sam ikada imao. Ne zato što je najbrži ili najskuplji, već zato što ima perfektnu kombinaciju veličine, težine i brzine, što ga čini dovoljno dobrim da se ponese sa sobom te da zamjeni i iMac i MacBook pro koji većinom puta ostaju u kući. Drugim riječima i nakon 4 godine korištenja još nisam ni pomislio da ga mjenjam ni radi brzine ni radi želje da imam nešto drugo bolje, brže ili efikasnije do danas.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id`), ADD KEY `vijest` (`vijest`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `novost`
--
ALTER TABLE `novost`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `fk_nov_kom` FOREIGN KEY (`vijest`) REFERENCES `novost` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
