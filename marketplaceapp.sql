-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 10:27 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marketplaceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
`campaign_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `addr_1` varchar(255) NOT NULL,
  `addr_2` varchar(255) NOT NULL,
  `addr_3` varchar(255) NOT NULL,
  `addr_4` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `campaign_status` varchar(20) NOT NULL,
  `campaign_hits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `date_updated` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `merchant_id`, `first_name`, `last_name`, `addr_1`, `addr_2`, `addr_3`, `addr_4`, `contact_no`, `campaign_status`, `campaign_hits`, `created_by`, `date_updated`, `email`, `bio`) VALUES
(29, 0, 'Hlogi', 'Mafolo', '24 Schalk Street', 'Bendor', 'New York', 'Polokwane', '823960919', 'draft', 0, 0, '2019-08-03', 'hlogi@handoutt.co.za', 'Im an artist who loves to create new things and designs');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`locations_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `locations_list_id` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locations_id`, `merchant_id`, `locations_list_id`) VALUES
(26, 0, 'Seshego');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
`merchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchant_name` varchar(255) NOT NULL,
  `merchant_industry` varchar(255) NOT NULL,
  `merchant_location` varchar(255) NOT NULL,
  `merchant_email` varchar(255) NOT NULL,
  `merchant_contact` varchar(11) NOT NULL,
  `merchant_facebook` varchar(255) NOT NULL,
  `merchant_twitter` varchar(255) NOT NULL,
  `merchant_instagram` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`merchant_id`, `user_id`, `merchant_name`, `merchant_industry`, `merchant_location`, `merchant_email`, `merchant_contact`, `merchant_facebook`, `merchant_twitter`, `merchant_instagram`) VALUES
(1, 3, 'Shoe Dog', 'Clothing', 'Polokwane', 'info@shoedog.co.za', '0152975644', '', '', ''),
(2, 0, 'Woody', 'Carpentry', 'Polokwane', 'woodyworks@gmail.com', '0789875678', '', '', ''),
(3, 0, 'Benny''s', 'retail', 'Polokwane', 'bennymaharaj@gmail.com', '0845567123', '', '', ''),
(4, 0, 'Randy''s Cabs', 'Transport', 'Polokwane', 'info@randycabs.co.za', '0152973045', '', '', ''),
(5, 0, 'Bioskop', 'entertainment', 'Polokwane', 'info@bioskopplk.co.za', '0152561996', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_gallery`
--

CREATE TABLE IF NOT EXISTS `portfolio_gallery` (
`portfolio_gallery_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `portfolio_gallery`
--

INSERT INTO `portfolio_gallery` (`portfolio_gallery_id`, `merchant_id`, `image`) VALUES
(20, 0, '3arrow_up_small.png'),
(19, 0, '2Abstract-Lights.jpg'),
(18, 0, '1abstract_colour_background_Object 04.jpg'),
(17, 0, '0abstract_background_blue_computer_desktop_1920x1080_hd-wallpaper-760983.jpg'),
(16, 0, '37171136586_5f4e1bff1f.jpg'),
(15, 0, '29027795-computer-magnifying-glass-over-background-with-different-association-terms-vector-illustration.jpg'),
(14, 0, '18840288-computer-magnifying-glass-over-background-with-different-association-terms-vector-illustration.jpg'),
(13, 0, '06134-light-blaze-hd-1080p-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
`quote_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `quote_description` varchar(512) NOT NULL,
  `quote_cost` varchar(255) NOT NULL,
  `quote_date` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `merchant_id`, `lead_id`, `quote_description`, `quote_cost`, `quote_date`) VALUES
(4, 0, 1, 'vebgd', '5000', 1564861168);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`services_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `services_list_id` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `merchant_id`, `services_list_id`) VALUES
(7, 0, 'Graphic Design'),
(8, 0, 'Logo Design');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `usertype`, `date_created`) VALUES
(1, 'test', '1234', 'merchant', '2019-07-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
 ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`locations_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
 ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `portfolio_gallery`
--
ALTER TABLE `portfolio_gallery`
 ADD PRIMARY KEY (`portfolio_gallery_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
 ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `locations_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `portfolio_gallery`
--
ALTER TABLE `portfolio_gallery`
MODIFY `portfolio_gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
