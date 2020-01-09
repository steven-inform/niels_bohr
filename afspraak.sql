CREATE TABLE `afspraak` (
  `afs_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `afs_naam` varchar(256) DEFAULT NULL,
  `afs_voornaam` varchar(256) DEFAULT NULL,
  `afs_datum` date DEFAULT NULL,
  `afs_begin` time DEFAULT NULL,
  PRIMARY KEY (`afs_id`)
) DEFAULT CHARSET=utf8;