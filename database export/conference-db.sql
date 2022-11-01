-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.10 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-07-11 11:40:02
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for conference
CREATE DATABASE IF NOT EXISTS `conference` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `conference`;


-- Dumping structure for table conference.attendees
CREATE TABLE IF NOT EXISTS `attendees` (
  `attendee_ID` int(11) NOT NULL DEFAULT '0',
  `First` text,
  `Last` text,
  PRIMARY KEY (`attendee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table conference.attendees: ~0 rows (approximately)
/*!40000 ALTER TABLE `attendees` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendees` ENABLE KEYS */;


-- Dumping structure for table conference.conferences
CREATE TABLE IF NOT EXISTS `conferences` (
  `conference_ID` int(11) NOT NULL AUTO_INCREMENT,
  `conference_name` text,
  `default_place` int(11) DEFAULT NULL,
  `table_prefix` text,
  PRIMARY KEY (`conference_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table conference.conferences: ~1 rows (approximately)
/*!40000 ALTER TABLE `conferences` DISABLE KEYS */;
REPLACE INTO `conferences` (`conference_ID`, `conference_name`, `default_place`, `table_prefix`) VALUES
	(1, 'Homecoming 2013', NULL, 'HC13');
/*!40000 ALTER TABLE `conferences` ENABLE KEYS */;


-- Dumping structure for table conference.conference_options
CREATE TABLE IF NOT EXISTS `conference_options` (
  `conference_ID` int(11) DEFAULT NULL,
  `option_column_name` text,
  `option_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table conference.conference_options: ~5 rows (approximately)
/*!40000 ALTER TABLE `conference_options` DISABLE KEYS */;
REPLACE INTO `conference_options` (`conference_ID`, `option_column_name`, `option_name`) VALUES
	(1, 'maiden_name', 'Maiden Name'),
	(1, 'class_yr', 'Class Year'),
	(1, 'guest_of', 'Guest of'),
	(1, 'group_with', 'Group with'),
	(1, 'parking_needs', 'Parking Needs');
/*!40000 ALTER TABLE `conference_options` ENABLE KEYS */;


-- Dumping structure for table conference.events
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` text,
  `cost` float DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table conference.events: ~0 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


-- Dumping structure for table conference.hc13_attendee_options
CREATE TABLE IF NOT EXISTS `hc13_attendee_options` (
  `attendee_id` int(11) NOT NULL DEFAULT '0',
  `maiden_name` text,
  `class_yr` int(11) DEFAULT NULL,
  `guest_of` int(11) DEFAULT NULL,
  `group_with` int(11) DEFAULT NULL,
  `parking_needs` text,
  PRIMARY KEY (`attendee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table conference.hc13_attendee_options: ~0 rows (approximately)
/*!40000 ALTER TABLE `hc13_attendee_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc13_attendee_options` ENABLE KEYS */;


-- Dumping structure for table conference.hc13_registration
CREATE TABLE IF NOT EXISTS `hc13_registration` (
  `event_id` int(11) NOT NULL DEFAULT '0',
  `attendee_id` int(11) NOT NULL DEFAULT '0',
  `amt_paid` float DEFAULT NULL,
  `meal_choice` text,
  PRIMARY KEY (`event_id`,`attendee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table conference.hc13_registration: ~0 rows (approximately)
/*!40000 ALTER TABLE `hc13_registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `hc13_registration` ENABLE KEYS */;


-- Dumping structure for table conference.places
CREATE TABLE IF NOT EXISTS `places` (
  `place_ID` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` text,
  PRIMARY KEY (`place_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table conference.places: ~4 rows (approximately)
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
REPLACE INTO `places` (`place_ID`, `place_name`) VALUES
	(1, 'Millikin'),
	(2, 'RTUC'),
	(3, 'Decatur Club'),
	(4, 'Griswold');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
