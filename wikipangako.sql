--
-- Table structure for table `ACCOUNT`
--

CREATE TABLE IF NOT EXISTS `ACCOUNT` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enforcer_points` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` int(11) DEFAULT '0',
  `searchable` int(11) DEFAULT '1',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `ACCOUNT`
--

INSERT INTO `ACCOUNT` (`account_id`, `username`, `password`, `email`, `facebook_id`, `twitter_id`, `enforcer_points`, `name`, `privacy`, `searchable`) VALUES
(1, NULL, NULL, NULL, '100002260607091', NULL, 0, 'Carlo Virtucio', 0, 1),
(2, NULL, NULL, NULL, '100006501403751', NULL, 0, 'Carlo Virtucio', 0, 1),
(3, NULL, NULL, NULL, '100000174953385', NULL, 1, 'Cedric Abuso', 0, 1),
(4, NULL, NULL, NULL, '704294334', NULL, 0, 'Ernest Francis Calayag', 0, 1),
(5, NULL, NULL, NULL, '1777613147', NULL, 0, 'Jude Mailom', 1, 1),
(6, NULL, NULL, NULL, '100000051016167', NULL, 0, 'Dion Bacalzo', 0, 0),
(7, NULL, NULL, NULL, '100000233661148', NULL, 0, 'Tine Magdangan', 0, 1),
(8, NULL, NULL, NULL, '1847117502', NULL, 0, 'Mat Dayapera', 0, 1),
(9, NULL, NULL, NULL, '100000876709561', NULL, 0, 'Lee Candelaria', 0, 1),
(10, NULL, NULL, NULL, '1452878395', NULL, 0, 'Megan Oclarino', 0, 1),
(11, NULL, NULL, NULL, '1057977159', NULL, 0, 'Jan Excel M. Cabling', 0, 1),
(12, NULL, NULL, NULL, '1786571133', NULL, 0, 'Isabelle Laureta', 0, 1),
(13, NULL, NULL, NULL, '1374447162', NULL, 0, 'Frazdic Sta Ana', 0, 1),
(14, NULL, NULL, NULL, '521370209', NULL, 0, 'Earwin', 0, 1),
(15, NULL, NULL, NULL, '763139202', NULL, 0, 'Miguel Martin N. Bermundo', 0, 1),
(16, NULL, NULL, NULL, '727659671', NULL, 0, 'Charie Villa', 0, 1),
(17, NULL, NULL, NULL, '1060886463', NULL, 0, 'Tin De Villa', 0, 1),
(18, NULL, NULL, NULL, '1765852448', NULL, 0, 'Din-din Bautista', 1, 0),
(19, NULL, NULL, NULL, '100003000879338', NULL, 0, 'Elijah Elworld Calayag', 0, 1),
(20, NULL, NULL, NULL, '1498373206', NULL, 0, 'Edz Cervantes Del Rosario', 0, 1),
(21, NULL, NULL, NULL, '100000143960048', NULL, 0, 'Lester Cruz', 0, 1),
(22, NULL, NULL, NULL, '100000273077213', NULL, 0, 'Kevin Michael Mendoza', 0, 1),
(23, NULL, NULL, NULL, '1849752859', NULL, 0, 'Jericko Ramilo', 0, 1),
(24, NULL, NULL, NULL, '100000263532421', NULL, 0, 'Reynard Mikael Hutalla', 0, 1),
(25, NULL, NULL, NULL, '100000143642618', NULL, 0, 'Ton Melendres', 0, 1),
(26, NULL, NULL, NULL, '100000154765486', NULL, 0, 'Raven Lagrimas', 0, 1),
(27, NULL, NULL, NULL, '1490975896', NULL, 0, 'Ivan Escamos', 0, 1),
(28, NULL, NULL, NULL, '1620315370', NULL, 0, 'Sherwin Jet Bilog Ferrer', 1, 0),
(29, NULL, NULL, NULL, '1412104461', NULL, 0, 'Josh Polancos', 0, 1),
(30, NULL, NULL, NULL, '738367644', NULL, 0, 'Alexa J. Arabejo', 0, 1),
(31, NULL, NULL, NULL, '100000468398043', NULL, 0, 'Ninz XP', 0, 1),
(32, NULL, NULL, NULL, '100000400946764', NULL, 0, 'Alyssa Lara Garcia', 0, 1),
(33, NULL, NULL, NULL, '1590366109', NULL, 0, 'Samuel Jay C. Pasia', 0, 1),
(34, NULL, NULL, NULL, '827187707', NULL, 0, 'Kevin De Guzman Benico', 0, 1),
(35, NULL, NULL, NULL, '1802351798', NULL, 0, 'Ezekiel Elmer Rodriguez Calayag', 0, 1),
(36, NULL, NULL, NULL, '1018534247', NULL, 0, 'Mac Polancos', 0, 1),
(37, NULL, NULL, NULL, '607908756', NULL, 0, 'Francis Mark Naga Mawo', 0, 1),
(39, NULL, NULL, NULL, '100000830931637', NULL, 0, 'Carina Pisigan Virtucio', 0, 1),
(40, NULL, NULL, NULL, '1195882442', NULL, 0, 'Diane Fajardo', NULL, 1),
(41, NULL, NULL, NULL, '100007493348659', NULL, 0, 'Wikipangako Pilipinas', NULL, 1),
(42, NULL, NULL, NULL, '1070387994', NULL, 0, 'Julian Paul Aseneta', 0, 1),
(43, NULL, NULL, NULL, '524913851', NULL, 0, 'Anna Oposa', 0, 1),
(44, NULL, NULL, NULL, '100005655340905', NULL, 0, 'Kat Magno', 0, 1),
(45, NULL, NULL, NULL, '100000161791608', NULL, 0, 'Cedie Fontanilla', 0, 1),
(46, NULL, NULL, NULL, '1586057826', NULL, 0, 'Kevin John Ventura', 0, 1),
(47, NULL, NULL, NULL, '1059351553', NULL, 0, 'Michael Ignacio', 0, 1),
(48, NULL, NULL, NULL, '100000147166908', NULL, 0, 'Aiza Lamdag', 0, 1),
(49, NULL, NULL, NULL, '100001466060828', NULL, 0, 'Junjun Sunico III', 0, 1),
(50, NULL, NULL, NULL, '100002175933139', NULL, 0, 'Bret Nixon Salceda', 0, 1),
(51, NULL, NULL, NULL, '1264700671', NULL, 0, 'Law Namuco', 1, 0),
(52, NULL, NULL, NULL, '100000047520200', NULL, 0, 'Christian Paul B. Lacdao', 0, 1),
(53, NULL, NULL, NULL, '1034770380', NULL, 0, 'Butch Bustria', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `DEMAND`
--

CREATE TABLE IF NOT EXISTS `DEMAND` (
  `demand_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id_fk` int(11) DEFAULT NULL,
  `wikip_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`demand_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `wikip_id_fk` (`wikip_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `IS_CONTACT`
--

CREATE TABLE IF NOT EXISTS `IS_CONTACT` (
  `is_contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id1_fk` int(11) DEFAULT NULL,
  `account_id2_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`is_contact_id`),
  KEY `account_id1_fk` (`account_id1_fk`),
  KEY `account_id2_fk` (`account_id2_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=92 ;

--
-- Dumping data for table `IS_CONTACT`
--

INSERT INTO `IS_CONTACT` (`is_contact_id`, `account_id1_fk`, `account_id2_fk`) VALUES
(1, 1, 2),
(2, 3, 4),
(3, 1, 4),
(4, 4, 8),
(5, 9, 4),
(6, 9, 4),
(7, 9, 4),
(8, 9, 4),
(9, 13, 4),
(10, 2, 4),
(11, 10, 4),
(12, 11, 4),
(13, 15, 4),
(14, 7, 3),
(15, 3, 1),
(16, 16, 4),
(17, 4, 17),
(18, 16, 17),
(21, 1, 26),
(25, 1, 5),
(26, 1, 9),
(27, 19, 35),
(28, 4, 35),
(34, 1, 8),
(35, 1, 41),
(36, 2, 41),
(37, 3, 41),
(38, 4, 41),
(39, 5, 41),
(40, 6, 41),
(41, 7, 41),
(42, 8, 41),
(43, 9, 41),
(44, 10, 41),
(45, 11, 41),
(46, 12, 41),
(47, 13, 41),
(48, 14, 41),
(49, 15, 41),
(50, 16, 41),
(51, 17, 41),
(52, 18, 41),
(53, 19, 41),
(54, 20, 41),
(55, 21, 41),
(56, 22, 41),
(57, 23, 41),
(58, 24, 41),
(59, 25, 41),
(60, 26, 41),
(61, 27, 41),
(62, 28, 41),
(63, 29, 41),
(64, 30, 41),
(65, 31, 41),
(66, 32, 41),
(67, 33, 41),
(68, 34, 41),
(69, 35, 41),
(70, 36, 41),
(71, 37, 41),
(76, 39, 41),
(77, 40, 41),
(78, 42, 41),
(79, 43, 41),
(80, 44, 41),
(81, 45, 41),
(82, 46, 41),
(83, 47, 41),
(84, 48, 41),
(85, 49, 41),
(86, 50, 41),
(87, 51, 41),
(88, 4, 51),
(89, 52, 41),
(90, 43, 4),
(91, 53, 41);

-- --------------------------------------------------------

--
-- Table structure for table `IS_FAMILY_MEMBER`
--

CREATE TABLE IF NOT EXISTS `IS_FAMILY_MEMBER` (
  `is_family_member_id` int(11) NOT NULL AUTO_INCREMENT,
  `relationship` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `politician1_id_fk` int(11) DEFAULT NULL,
  `politician2_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`is_family_member_id`),
  KEY `politician1_id_fk` (`politician1_id_fk`),
  KEY `politician2_id_fk` (`politician2_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `IS_WATCHING`
--

CREATE TABLE IF NOT EXISTS `IS_WATCHING` (
  `is_watching_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id_fk` int(11) DEFAULT NULL,
  `politician_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`is_watching_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_id_fk` (`politician_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Dumping data for table `IS_WATCHING`
--

INSERT INTO `IS_WATCHING` (`is_watching_id`, `account_id_fk`, `politician_id_fk`) VALUES
(1, 2, 24),
(2, 1, 1),
(3, 1, 2),
(4, 4, 8),
(5, 4, 2),
(6, 4, 4),
(7, 4, 5),
(8, 4, 3),
(9, 3, 11),
(10, 3, 8),
(12, 4, 1),
(15, 35, 1),
(16, 1, 4),
(17, 1, 1),
(18, 1, 1),
(19, 1, 1),
(20, 1, 2),
(21, 1, 7),
(22, 39, 1),
(23, 39, 2),
(24, 39, 7),
(25, 1, 3),
(26, 1, 21),
(27, 1, 7),
(28, 1, 7),
(29, 1, 1),
(30, 4, 7),
(31, 4, 10),
(32, 4, 9),
(33, 4, 9),
(34, 4, 11),
(35, 4, 12),
(36, 4, 13),
(37, 4, 14),
(38, 4, 15),
(39, 4, 16),
(40, 4, 17),
(41, 4, 18),
(42, 4, 19),
(43, 4, 20),
(44, 4, 21),
(45, 4, 22),
(46, 4, 23),
(47, 4, 24),
(48, 4, 25),
(49, 4, 26),
(50, 44, 3),
(51, 44, 2),
(52, 9, 11),
(53, 9, 11),
(54, 48, 1),
(55, 48, 3),
(56, 48, 2),
(57, 48, 5),
(58, 48, 4),
(59, 48, 8),
(60, 48, 7),
(61, 48, 10),
(62, 48, 13),
(63, 48, 12),
(64, 48, 9),
(65, 48, 11),
(66, 48, 18),
(67, 48, 21),
(68, 51, 25),
(69, 19, 1),
(70, 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `NOTIFICATION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICATION` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `details` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `is_seen` int(11) DEFAULT '1',
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=148 ;

--
-- Dumping data for table `NOTIFICATION`
--

INSERT INTO `NOTIFICATION` (`notification_id`, `account_id`, `details`, `link`, `is_seen`) VALUES
(14, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>E-Sim</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=12', 1),
(29, 39, '<b>Cedric Abuso</b> edited <b>Benigno Simeon C. Aquino III</b> profile.', 'http://www.wikipangako.com/?main=home&inner=politician-profile&id=1', 1),
(44, 39, '<b>Cedric Abuso</b> posted a wikip about <b>Benigno Simeon C. Aquino III</b>', 'http://www.wikipangako.com/?main=home&inner=wikip_url&wikip_id=44', 1),
(55, 39, '<b>Ernest Francis Calayag</b> edited <b>Jejomar C. Binay Sr.</b> profile.', 'http://www.wikipangako.com/?main=home&inner=politician-profile&id=2', 1),
(59, 39, '<b>Miguel Martin N. Bermundo</b> edited <b>Jejomar C. Binay Sr.</b> profile.', 'http://www.wikipangako.com/?main=home&inner=politician-profile&id=2', 1),
(69, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>murang gamot</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=14', 1),
(76, 39, '<b>Jejomar C. Binay Sr.</b> declared a new promise: <b>Free education and school materials</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=15', 1),
(79, 39, '<b>Jejomar C. Binay Sr.</b> declared a new promise: <b>Tiniyak ang libreng ospital at gamot para sa buong bayan</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=16', 1),
(82, 39, '<b>Ernest Francis Calayag</b> posted a wikip about <b>Jejomar C. Binay Sr.</b>', 'http://www.wikipangako.com/?main=home&inner=wikip_url&wikip_id=49', 1),
(96, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>On appointments</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=19', 1),
(111, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>Gender Equality</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=20', 1),
(125, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>PNOY promise economic growth for all during SONA 2013</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=21', 1),
(132, 39, '<b>Benigno Simeon C. Aquino III</b> declared a new promise: <b>PNOY promised economic growth for all during SONA 2013</b>', 'http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=22', 1),
(142, 39, '<b>Ernest Francis Calayag</b> posted a wikip about <b>Jejomar C. Binay Sr.</b>', 'http://www.wikipangako.com/?main=home&inner=wikip_url&wikip_id=53', 1),
(143, 44, '<b>Ernest Francis Calayag</b> posted a wikip about <b>Jejomar C. Binay Sr.</b>', 'http://www.wikipangako.com/?main=home&inner=wikip_url&wikip_id=53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `POLITICIAN`
--

CREATE TABLE IF NOT EXISTS `POLITICIAN` (
  `politician_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `position` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `wikipedia_id` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `share_count` int(11) DEFAULT '0',
  `tweet_count` int(11) DEFAULT '0',
  PRIMARY KEY (`politician_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=138 ;

--
-- Dumping data for table `POLITICIAN`
--

INSERT INTO `POLITICIAN` (`politician_id`, `name`, `birthday`, `position`, `province`, `city`, `views`, `wikipedia_id`, `share_count`, `tweet_count`) VALUES
(1, 'Benigno Simeon C. Aquino III', '1960-02-08', 'President', NULL, NULL, 305, 'Benigno_Aquino_III', 1, 4),
(2, 'Jejomar C. Binay Sr.', '1942-11-11', 'Vice-President', NULL, NULL, 111, 'Jejomar_Binay', 1, 0),
(3, 'Juan Edgardo "Sonny" M. Angara', '1972-07-15', 'Senator', NULL, NULL, 32, 'Sonny_Angara', 0, 0),
(4, 'Paolo Benigno "Bam" Aquino', '1977-05-07', 'Senator', NULL, NULL, 38, 'Bam_Aquino', 0, 0),
(5, 'Maria Lourdes Nancy S. Binay', '1973-05-12', 'Senator', NULL, NULL, 36, 'Nancy_Binay', 0, 0),
(7, 'Pia S. Cayetano', '1966-03-22', 'Senator', NULL, NULL, 27, 'Pia_Cayetano', 0, 0),
(8, 'Miriam Defensor Santiago', '1945-06-15', 'Senator', NULL, NULL, 52, 'Miriam_Defensor_Santiago', 0, 0),
(9, 'Franklin M. Drilon', '1948-11-28', 'Senator', NULL, NULL, 15, 'Franklin_Drilon', 0, 0),
(10, 'Joseph Victor G. Ejercito', '1969-12-26', 'Senator', NULL, NULL, 13, 'JV_Ejercito', 1, 0),
(11, 'Francis Joseph "Chiz" Escudero', '1969-10-10', 'Senator', NULL, NULL, 189, 'Francis_Escudero', 2, 1),
(12, 'Jinggoy Ejercito Estrada', '1963-02-17', 'Senator', NULL, NULL, 13, 'Jinggoy_Estrada', 0, 0),
(13, 'Juan Ponce Enrile', '1924-02-14', 'Senator', NULL, NULL, 14, 'Juan_Ponce_Enrile', 0, 0),
(14, 'Teofisto "TG" L. Guingona', '1959-04-15', 'Senator', NULL, NULL, 25, 'Teofisto_Guingona_III', 0, 0),
(15, 'Gregorio B. Honasan II', '1948-03-14', 'Senator', NULL, NULL, 13, 'Gregorio_Honasan', 0, 0),
(16, 'Manuel "Lito" M. Lapid', '1955-10-25', 'Senator', NULL, NULL, 14, 'Lito_Lapid', 0, 0),
(17, 'Loren B. Legarda', '1960-01-28', 'Senator', NULL, NULL, 15, 'Loren_Legarda', 0, 0),
(18, 'Ferdinand "Bongbong" R. Marcos Jr.', '1957-09-13', 'Senator', NULL, NULL, 18, 'Ferdinand_Marcos,_Jr.', 0, 0),
(19, 'Sergio R. Osmena III', '1943-12-13', 'Senator', NULL, NULL, 10, 'Sergio_Osmeña_III', 0, 0),
(20, 'Aquilino "Koko" L. Pimentel III', '1964-01-20', 'Senator', NULL, NULL, 12, 'Aquilino_Pimentel_III', 0, 0),
(21, 'Grace L. Poe', '1968-09-03', 'Senator', NULL, NULL, 17, 'Grace_Poe', 0, 0),
(22, 'Ralph G. Recto', '1964-01-11', 'Senator', NULL, NULL, 23, 'Ralph_Recto', 0, 0),
(23, 'Ramon  "Bong" B. Revilla Jr.', '1966-09-25', 'Senator', NULL, NULL, 22, 'Bong_Revilla', 0, 0),
(24, 'Vicente "Tito" C. Sotto III', '1948-08-24', 'Senator', NULL, NULL, 20, 'Tito_Sotto', 0, 0),
(25, 'Antonio "Sonny" F. Trillanes IV', '1971-08-06', 'Senator', NULL, NULL, 31, 'Antonio_Trillanes_IV', 0, 0),
(26, 'Cynthia A. Villar', '1950-07-29', 'Senator', NULL, NULL, 15, 'Cynthia_Villar', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `POLITICIAN_PROFILE`
--

CREATE TABLE IF NOT EXISTS `POLITICIAN_PROFILE` (
  `politician_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `account_id_fk` int(11) DEFAULT NULL,
  `politician_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`politician_profile_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_id_fk` (`politician_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `POLITICIAN_PROFILE`
--

INSERT INTO `POLITICIAN_PROFILE` (`politician_profile_id`, `date_added`, `category`, `details`, `account_id_fk`, `politician_id_fk`) VALUES
(2, '2013-10-31 17:29:54', 'educational_background', '', 3, 11),
(3, '2013-10-31 23:24:43', 'educational_background', 'Escudero attended the University of the Philippines Integrated School for both his Elementary and Secondary Education, and graduated in 1981 and 1985 respectively. He earned his Bachelor''s Degree in Political Science at the University of the Philippines in Diliman, Quezon City in 1988 and Bachelors of Laws at the University of the Philippines College of Law in 1993. He received his Masters in International and Comparative Law at the Georgetown University Law Center in Washington D. C. in 1996.<b', 3, 11),
(4, '2013-11-01 22:43:18', 'educational_background', 'Escudero attended the University of the Philippines Integrated School for both his Elementary and Secondary Education, and graduated in 1981 and 1985 respectively. He earned his Bachelor''s Degree in Political Science at the University of the Philippines in Diliman, Quezon City in 1988 and Bachelors of Laws at the University of the Philippines College of Law in 1993. He received his Masters in International and Comparative Law at the Georgetown University Law Center in Washington D. C. in 1996.', 3, 11),
(5, '2013-11-01 23:01:18', 'educational_background', ' Escudero attended the University of the Philippines Integrated School for both his Elementary and Secondary Education, and graduated in 1981 and 1985 respectively. He earned his Bachelor''s Degree in Political Science at the University of the Philippines in Diliman, Quezon City in 1988 and Bachelors of Laws at the University of the Philippines College of Law in 1993. He received his Masters in International and Comparative Law at the Georgetown University Law Center in Washington D. C. in 1997. ', 3, 11),
(6, '2013-11-01 23:05:45', 'educational_background', 'Escudero attended the University of the Philippines Integrated School for both his Elementary and Secondary Education, and graduated in 1981 and 1985 respectively. He earned his Bachelor''s Degree in Political Science at the University of the Philippines in Diliman, Quezon City in 1988 and Bachelors of Laws at the University of the Philippines College of Law in 1993. He received his Masters in International and Comparative Law at the Georgetown University Law Center in Washington D. C. in 1996.  ', 3, 11),
(7, '2013-11-01 23:05:54', 'educational_background', ' Escudero attended the University of the Philippines Integrated School for both his Elementary and Secondary Education, and graduated in 1981 and 1985 respectively. He earned his Bachelor''s Degree in Political Science at the University of the Philippines in Diliman, Quezon City in 1988 and Bachelors of Laws at the University of the Philippines College of Law in 1993. He received his Masters in International and Comparative Law at the Georgetown University Law Center in Washington D. C. in 1996.', 3, 11),
(8, '2013-11-02 12:59:00', 'profile', 'Benigno Simeon Cojuangco Aquino III[1][2][3][4] (/bÉ›ËˆnÉªÉ¡noÊŠ É™ËˆkiËnoÊŠ/; [bÉ›ËˆniÉ¡no aËˆkino]; born February 8, 1960), also known as Noynoy Aquino or PNoy, is a Filipino politician who has been the 15th President of the Philippines since June 2010.', 4, 1),
(9, '2013-11-02 12:59:07', 'profile', ' Benigno Simeon Cojuangco Aquino III[1][2][3][4] (/bÉ›ËˆnÉªÉ¡noÊŠ É™ËˆkiËnoÊŠ/; [bÉ›ËˆniÉ¡no aËˆkino]; born February 8, 1960), also known as Noynoy Aquino or PNoy, is a Filipino politician who has been the 15th President of the Philippines since June 2010. ', 4, 1),
(10, '2013-11-02 13:08:02', 'profile', '  Benigno Simeon Cojuangco Aquino III[1][2][3][4] (/bÃ‰â€ºÃ‹Ë†nÃ‰ÂªÃ‰Â¡noÃŠÅ  Ã‰â„¢Ã‹Ë†kiÃ‹ÂnoÃŠÅ /; [bÃ‰â€ºÃ‹Ë†niÃ‰Â¡no aÃ‹Ë†kino]; born February 8, 1960), also known as Noynoy Aquino or PNoy, is a Filipino politician who has been the 15th President of the Philippines since June 2010.  ', 4, 1),
(11, '2013-11-03 07:18:54', 'profile', '   Benigno Simeon Cojuangco Aquino III[1][2][3][4] (/bÃƒâ€°Ã¢â‚¬ÂºÃƒâ€¹Ã‹â€ nÃƒâ€°Ã‚ÂªÃƒâ€°Ã‚Â¡noÃƒÅ Ã…Â  Ãƒâ€°Ã¢â€žÂ¢Ãƒâ€¹Ã‹â€ kiÃƒâ€¹Ã‚ÂnoÃƒÅ Ã…Â /; [bÃƒâ€°Ã¢â‚¬ÂºÃƒâ€¹Ã‹â€ niÃƒâ€°Ã‚Â¡no aÃƒâ€¹Ã‹â€ kino]; born February 8, 1960), also known as Noynoy Aquino or PNoy, is a Filipino politician who has been the 15th President of the Philippines since June 2010.   ', 4, 1),
(12, '2013-11-10 09:15:29', 'profile', '  test', 1, 2),
(13, '2013-11-10 22:42:00', 'profile', '    Benigno Simeon Cojuangco Aquino III (born February 8, 1960), also known as Noynoy Aquino or PNoy, is a Filipino politician who has been the 15th President of the Philippines since June 2010.    ', 1, 1),
(14, '2013-11-13 09:34:47', 'profile', 'Bam test', 3, 4),
(15, '2013-11-18 14:55:47', 'profile', ' Bam test test', 26, 1),
(16, '2013-11-19 11:26:32', '', '', 3, 11),
(17, '2013-12-03 12:47:52', 'educational_background', '  Ateneo de Manila', 35, 1),
(18, '2014-01-09 05:14:27', 'profile', '  Bam test', 4, 1),
(19, '2014-01-15 16:06:06', 'profile', '   bjbjblll', 4, 14),
(20, '2014-01-15 16:13:05', 'profile', 'Teofisto de Lara Guingona III or TG, (born April 19, 1959) is a Filipino politician.', 41, 14),
(21, '2014-01-15 20:02:43', 'profile', ' Teofisto de Lara Guingona III or TG, (born April 19, 1959) is a Filipino politician. ', 4, 14),
(22, '2014-01-15 20:05:26', 'profile', '  ', 4, 26),
(23, '2014-01-15 20:10:16', 'family_background', '  Son of former Senator Benigno Aquino and the late President  Corazon Cojuanco Aquino.', 4, 1),
(24, '2014-01-15 20:12:34', 'family_background', '  Daughter of Vice President Jejomar Binay.', 4, 5),
(25, '2014-01-15 20:36:47', 'political_career', '  Before being elected as president, President Aquino served as Representative for Tarlac and Senator of the Republic of the Philippines.', 4, 1),
(26, '2014-01-15 20:40:35', 'profile', 'Jejomar Binay, Sr. (born November 11, 1942), is a Filipino politician who has been the 15th Vice President of the Philippines since 2010. Previously, he was Mayor of Makati City from 1986 to 1998 and again from 2001 to 2010. He also holds the following positions: President of the United Nationalist Alliance (UNA), President of Partido Demokratiko Pilipino-Lakas ng Bayan (PDP-Laban), Chairman of Asia-Pacific Region Scout Committee, and the President of the Boy Scouts of the Philippines.', 4, 2),
(27, '2014-01-15 20:41:12', 'political_career', '  Mayor of Makati (1986â€“1998)[edit]In February 1986, Binay became President Corazon Aquinoâ€™s first appointed local official after Nemesio I. Yabut died while in office as mayor during the EDSA Revolution.[7] He was reelected in 1987, 1992, and 1995.\nBinay joined pro-democracy forces in thwarting the mutinies. His active role in the defense of the Constitution earned him the nickname â€œRambotitoâ€ (or little Rambo, after the screen hero), the Outstanding Achievement Medal and a special commendation from President Aquino herself.\nMMDA Chairman[edit]\nDuring his first term as mayor, Binay was also appointed Governor of Metro Manila in 1987 and was later elected by his peers in Metro Manila as chairman of the Metro Manila Authority (precursor to the MMDA). He served from 1990 to 1992.\nIn 1998, Binay was appointed chairman of the Metropolitan Manila Development Authority (MMDA) with cabinet rank under the administration of president Joseph Estrada. He was also appointed as vice-chairman of the Pasig River Rehabilitation Commission and Traffic Czar for Metro Manila.\nMayor of Makati (2001â€“2010)[edit]\nIn 2001, Binay reclaimed his post as mayor of Makati, winning over actor, TV host, and then-vice mayor Edu Manzano via landslide. He won his second term in 2004 by a landslide against 1st district Councilor Oscar Ibay. He ran for his third and last term as mayor in 2007 and won again by a landslide, beating incumbent Senator and actor Lito Lapid. His margin over Lapid has been considered as the largest margin in a local election in Makati City.[6]\nSuspension[edit]\nIn October 2006, the Department of the Interior and Local Government issued a suspension order against Binay, his vice mayor, and all members of the City Council following an accusation of &#039;ghost employees&#039; on the city payroll by former city councilor Roberto Brillante, a political rival.[8] Refusing to cooperate with the suspension order, Binay barricaded himself inside the Makati City Hall. Among those who expressed support for Binay were former President Corazon Aquino, actress Susan Roces â€“ who is the widow of the late movie star and ex-presidential aspirant, Fernando Poe Jr. â€“ and several Catholic bishops.[9][10] After a three-day stand-off, the Court of Appeals issued a temporary restraining order. Before it lapsed, the court issued an injunction order, thereby preventing the Office of the President from enforcing its suspension order until the case is resolved.[11]\nBinay was upheld by the courts in a graft case filed by the Ombudsman over allegations of overpricing in the purchase of office furniture. The case was also filed by Brillante, who at that time was leading in Makati a Palace-supported signature campaign to amend the Constitution. The Sandiganbayan Third Division dismissed the graft case filed against Binay and his six co-accused for lack of factual basis.[12] Critics claim the suspension order was intended to distract attention from the government&#039;s own scandals.[13]\nBIR garnishment[edit]\nOn May 2, 2007 the Bureau of Internal Revenue(BIR) froze all the bank accounts of the city government of Makati and the personal accounts of Binay and his Vice Mayor Ernesto Mercado.\nThe BIR issued the order after it said the city still owed the BIR P 1.1 billion in withholding taxes of city employees from 1999 to 2002. BIR revenue officer Roberto Baquiran signed and issued the warrant of garnishment against the bank accounts that belonged to Binay, his vice mayor, the city government and the cityâ€™s treasurer and accountant.\nThe city government protested the garnishment order, saying the city had already paid P200 million to the BIR as part of a settlement agreement agreed to by Finance Secretary Margarito Teves and former BIR chief Jose Bunag. The city also said the order was flawed, since Baquiran has no authority to issue writs of garnishment. Freezing the personal accounts of Binay and Mercado were also unlawful, they said. The city government also maintained that the freeze order would cripple city government services.[14][15]\nThe garnishment orders were eventually lifted by MalacaÃ±ang, but not after Binay slammed the move as politically motivated and patently illegal. Business leaders also voiced concern over the adverse effects of the unprecedented BIR action on public services in the countryâ€™s financial center.[16][17]\nAnd again, barely a week before Election Day, the Ombudsman suspended Binay based on allegations made by a local candidate allied with Malacanang. It would be revealed that the charges were supported by falsified statements. As president of the United Opposition (UNO), Binay had been very active in campaigning for the opposition bets for the Senate, and had been issuing critical statements against the Arroyo government. In a repeat of the October 2006 incident, heavily armed policemen barged into the City Hall after office hours, forcibly opening the offices and occupying the building. Binay confronted police officials and representatives of the Department of Interior and Local Government, while hundreds of supporters once again swarmed the city hall quadrangle to show their support.[18]\nThe suspension order generated national media attention, and prompted even administration senatorial candidates to protest publicly, saying the action further undermined their chances in the elections.[19] In the election that followed, Binay and his entire slate in the polls won by a landslide.[20] The opposition slate for the Senate eventually won by a landslide.[21]\nVice-Presidential campaign[edit]\nBinay, president of the United Opposition, announced his bid for the presidency at Makati City Hall in his 66th birthday on November 11, 2008. He ran under the banner of the Partido ng Demokratikong Pilipino-Laban (PDP-Laban). Binay&#039;s candidacy earned words of support from former President Joseph Estrada. However, he decided to campaign for Vice President as Estrada&#039;s running mate.\nVice-Presidency[edit]\nJejomar Binay was inaugurated as the 15th Vice-President of the Philippines on June 30, 2010. He was the first local government official to be elected vice president.\nBinay also mostly representing President Noynoy Aquino in official visits to other countries, since the latter would always appoint him as his official representative, since the President is not fully fond of travel.\nHUDCC Chairmanship[edit]\nBinay was appointed as chairman of the Housing Urban Development Coordinating Council (HUDCC) by President Noynoy Aquino, the same position held by his predecessor, Vice-President Noli de Castro. As Presidential Adviser for OFW Concerns, Binay is also head of the Task Force OFW which helps Overseas Filipino Workers who were maltreated by their employers to return to the Philippines at government expense.', 4, 2),
(28, '2014-01-15 20:41:54', 'articles', '  http://www.rappler.com/nation/46556-dasmarinas-village-guards-good-job', 4, 2),
(29, '2014-01-15 20:42:45', 'profile', '    Cynthia Aguilar Villar (born July 29, 1950) is a Filipino politician who was the member of the House of Representatives for the Lone District of Las PiÃ±as City from 2001-2010 and is currently a Senator.She is the sister of Las PiÃ±as City Mayor Vergel Aguilar,[1] and Muntinlupa Barangay Chairman Elizabeth &quot;Ate Bess&quot; A. Masangkay and the wife of Senator Manny Villar.', 4, 26),
(30, '2014-01-15 21:30:15', 'family_background', '  Son of Joseph Estrada.', 3, 12),
(31, '2014-01-15 21:34:10', 'advocacies', '  booom', 3, 1),
(32, '2014-01-15 23:21:32', 'advocacies', 'booom notifs!', 3, 1),
(33, '2014-01-15 23:28:59', 'advocacies', ' booom', 3, 1),
(36, '2014-01-16 02:15:37', 'family_background', '  yuctuyuig', 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PRIVATE_CONTACT`
--

CREATE TABLE IF NOT EXISTS `PRIVATE_CONTACT` (
  `account_id` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL,
  KEY `account_id` (`account_id`),
  KEY `requested_by` (`requested_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PRIVATE_CONTACT`
--

INSERT INTO `PRIVATE_CONTACT` (`account_id`, `requested_by`) VALUES
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `PROMISE`
--

CREATE TABLE IF NOT EXISTS `PROMISE` (
  `promise_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `pdaf` int(11) NOT NULL,
  `approved` int(11) NOT NULL,
  `sources` text COLLATE utf8_unicode_ci,
  `category` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `politician_id_fk` int(11) DEFAULT NULL,
  `account_id_fk` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `share_count` int(11) DEFAULT '0',
  `tweet_count` int(11) DEFAULT '0',
  PRIMARY KEY (`promise_id`),
  KEY `politician_id_fk` (`politician_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `PROMISE`
--

INSERT INTO `PROMISE` (`promise_id`, `name`, `details`, `pdaf`, `approved`, `sources`, `category`, `politician_id_fk`, `account_id_fk`, `date_added`, `share_count`, `tweet_count`) VALUES
(15, 'Free education and school materials', 'During the Miting de Avance, Binay promised free education and school materials to students just like how they do it in Makati.', 0, 1, 'https://www.youtube.com/watch?v=EbDS2eHvirM', 'Education', 2, 4, '2014-03-06 12:34:25', 0, 0),
(16, 'Tiniyak ang libreng ospital at gamot para sa buong bayan', 'Tiniyak ni VP Binay noong siya ay tumatakbo na libre ang gamot at ospital para sa masang pilipino gaya ng ginagawa nila sa Makati', 0, 1, 'https://www.youtube.com/watch?v=EbDS2eHvirM', 'Health', 2, 4, '2014-03-06 12:36:26', 0, 0),
(17, 'Shelter as part of his legislative agenda', 'According to his 2013 platform, a universal housing program will ensure not only shelter but ownership of homes.', 0, 1, 'http://www.ivoteph.com/platforms/chiz-escudero-platforms-advocacy/', 'Housing', 11, 4, '2014-03-06 12:55:10', 0, 0),
(18, 'Courts accessible to the poor', 'He wants to make courts more accessible to the people to make sure that quick decisions and actions will be served.', 0, 1, 'http://www.ivoteph.com/platforms/chiz-escudero-platforms-advocacy/', 'Peace, Law and Order', 11, 9, '2014-03-08 03:45:33', 0, 1),
(19, 'On appointments', '&quot;From Presidential appointees chosen mainly out of political accommodation  to discerning selection based on integrity, competence and performance in serving the public good.&quot;  (directly lifted from source)', 0, 1, 'http://2010presidentiables.wordpress.com/2009/11/28/a-social-contract-with-the-filipino-people-the-platform-of-senator-benigno-%E2%80%9Cnoynoy%E2%80%9D-s-aquino-iii/', 'Good Governance', 1, 9, '2014-04-15 04:09:42', 1, 0),
(20, 'Gender Equality', '&quot;From a lack of concern for gender disparities and shortfalls, to the promotion of equal gender opportunity in all spheres of public policies and programs.&quot; (Directly lifted from source)', 0, 1, 'http://2010presidentiables.wordpress.com/2009/11/28/a-social-contract-with-the-filipino-people-the-platform-of-senator-benigno-%E2%80%9Cnoynoy%E2%80%9D-s-aquino-iii/', '', 1, 9, '2014-03-11 00:48:42', 0, 0),
(22, 'PNOY promised economic growth for all during SONA 2013', 'PNOY promised to overtake the trickle down effect expected from the economic growth and create mechanisms that will make the growth felt by more Filipinos.', 0, 1, 'http://www.rappler.com/nation/special-coverage/sona/2013/34522-aquino-promises-growth-for-all', 'Employment and Livelihood', 1, 4, '2014-03-11 00:56:22', 0, 0),
(24, 'Raise Salaries of Public School Teachers', 'Sen. Antonio Trillanes IV filed separate bills which called to raise the minimum pay of public school teachers.', 0, 1, 'http://www.panaynewsphilippines.com/', 'Education', 25, 51, '2014-04-01 14:15:50', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RATES`
--

CREATE TABLE IF NOT EXISTS `RATES` (
  `rates_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `account_id_fk` int(11) DEFAULT NULL,
  `politician_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`rates_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_id_fk` (`politician_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `RATES`
--

INSERT INTO `RATES` (`rates_id`, `rating`, `account_id_fk`, `politician_id_fk`) VALUES
(1, 0, 1, 1),
(2, 0, 4, 1),
(3, 1, 4, 3),
(4, 1, 4, 7),
(5, 0, 4, 12),
(6, 1, 4, 8),
(7, 0, 7, 1),
(8, 1, 4, 2),
(9, 0, 4, 13),
(10, -1, 12, 11),
(11, 1, 4, 4),
(12, 1, 4, 11),
(14, 1, 3, 11),
(17, -1, 3, 1),
(18, -1, 3, 3),
(28, 0, 1, 2),
(29, -1, 26, 20),
(30, -1, 4, 22),
(31, -1, 3, 24),
(32, 0, 1, 12),
(33, -1, 1, 21),
(34, 0, 39, 1),
(35, 0, 39, 2),
(36, 1, 39, 7),
(37, 1, 1, 8),
(38, 0, 1, 4),
(39, 1, 4, 5),
(40, 0, 9, 2),
(41, 1, 9, 1),
(42, 1, 9, 21),
(43, 1, 4, 21),
(44, 1, 51, 25),
(45, 1, 4, 25),
(46, -1, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `REPORTS`
--

CREATE TABLE IF NOT EXISTS `REPORTS` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `photo_url` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `REPORTS`
--

INSERT INTO `REPORTS` (`id`, `category`, `details`, `photo_url`) VALUES
(1, 'bug', 'Bug bug bug bug bug.', ''),
(2, 'bug', 'report', 'https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-ash4/1525508_791387114210446_1045772404_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ROLE`
--

CREATE TABLE IF NOT EXISTS `ROLE` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` int(11) NOT NULL,
  `account_id_fk` int(11) DEFAULT NULL,
  `politician_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_id_fk` (`politician_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`role_id`, `role_type`, `account_id_fk`, `politician_id_fk`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 3, 1, NULL),
(6, 1, 5, NULL),
(7, 1, 6, NULL),
(8, 1, 7, NULL),
(9, 1, 8, NULL),
(10, 1, 9, NULL),
(11, 1, 10, NULL),
(12, 1, 11, NULL),
(13, 1, 12, NULL),
(14, 1, 13, NULL),
(15, 1, 14, NULL),
(16, 1, 15, NULL),
(20, 1, 4, NULL),
(22, 1, 16, NULL),
(23, 1, 17, NULL),
(24, 1, 18, NULL),
(25, 1, 19, NULL),
(26, 1, 20, NULL),
(27, 1, 21, NULL),
(28, 1, 22, NULL),
(29, 1, 23, NULL),
(30, 1, 24, NULL),
(31, 1, 25, NULL),
(32, 1, 26, NULL),
(33, 1, 27, NULL),
(34, 1, 28, NULL),
(35, 1, 29, NULL),
(36, 1, 30, NULL),
(37, 1, 31, NULL),
(38, 1, 32, NULL),
(39, 1, 33, NULL),
(40, 1, 34, NULL),
(41, 1, 35, NULL),
(42, 1, 36, NULL),
(43, 1, 37, NULL),
(45, 1, 39, NULL),
(46, 1, 40, NULL),
(47, 1, 41, NULL),
(48, 1, 42, NULL),
(49, 1, 43, NULL),
(50, 1, 44, NULL),
(51, 1, 45, NULL),
(52, 1, 46, NULL),
(53, 1, 47, NULL),
(54, 1, 48, NULL),
(55, 1, 49, NULL),
(56, 1, 50, NULL),
(57, 1, 51, NULL),
(58, 1, 52, NULL),
(59, 1, 53, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SEMI_LOCKS`
--

CREATE TABLE IF NOT EXISTS `SEMI_LOCKS` (
  `semi_locks_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id_fk` int(11) DEFAULT NULL,
  `politician_profile_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`semi_locks_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_profile_id_fk` (`politician_profile_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TRACKS`
--

CREATE TABLE IF NOT EXISTS `TRACKS` (
  `tracks_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `account_id_fk` int(11) DEFAULT NULL,
  `promise_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`tracks_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `promise_id_fk` (`promise_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Dumping data for table `TRACKS`
--

INSERT INTO `TRACKS` (`tracks_id`, `status`, `account_id_fk`, `promise_id_fk`) VALUES
(35, 1, 9, 15),
(36, 1, 9, 16),
(37, 2, 9, 17),
(38, 4, 4, 18),
(39, 1, 4, 17),
(40, 0, 3, 17),
(41, 0, 3, 18),
(44, 1, 4, 15),
(45, 4, 4, 16),
(46, 4, 4, 19),
(47, 1, 4, 20),
(48, 1, 4, 22),
(100, 2, 51, 24),
(101, 1, 51, 15),
(102, 2, 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `WIKIP`
--

CREATE TABLE IF NOT EXISTS `WIKIP` (
  `wikip_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` int(11) NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `is_question` int(11) NOT NULL,
  `answer` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_count` int(11) DEFAULT '0',
  `tweet_count` int(11) DEFAULT '0',
  `politician_id_fk` int(11) NOT NULL,
  `account_id_fk` int(11) NOT NULL,
  `promise_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`wikip_id`),
  KEY `account_id_fk` (`account_id_fk`),
  KEY `politician_id_fk` (`politician_id_fk`),
  KEY `promise_id_fk` (`promise_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `WIKIP`
--

INSERT INTO `WIKIP` (`wikip_id`, `url`, `date_added`, `approved`, `caption`, `is_question`, `answer`, `share_count`, `tweet_count`, `politician_id_fk`, `account_id_fk`, `promise_id_fk`) VALUES
(49, 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-ash3/t1/1966718_10152099702409335_506090891_n.jpg', '2014-03-06 12:41:06', 1, 'Sadly he is the strongest contender for 2016&#039;s presidential election. #beta #yup #testing', 0, NULL, 0, 0, 2, 4, NULL),
(50, 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-frc1/t1/10003907_682908458415038_2055191740_n.jpg', '2014-03-08 00:04:43', 1, 'I can&#039;t agree more! :) http://www.abs-cbnnews.com/nation/03/07/14/miriam-dont-vote-pork-scam-pols', 0, NULL, 0, 0, 8, 9, NULL),
(51, 'https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-prn2/t1/1904001_588895454529136_1001539184_n.jpg', '2014-03-10 05:59:39', 1, '#wikipangako Benigno Aquino not convinced that Napoles should be a state witness', 0, NULL, 0, 1, 1, 1, NULL),
(53, 'https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-prn2/t1/10001380_10152111226089335_338733876_n.jpg', '2014-03-12 00:36:31', 1, 'oh c&#039;mon! are you kidding me? #test #beta #wikip', 0, NULL, 0, 0, 2, 4, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DEMAND`
--
ALTER TABLE `DEMAND`
  ADD CONSTRAINT `DEMAND_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `DEMAND_ibfk_2` FOREIGN KEY (`wikip_id_fk`) REFERENCES `WIKIP` (`wikip_id`);

--
-- Constraints for table `IS_CONTACT`
--
ALTER TABLE `IS_CONTACT`
  ADD CONSTRAINT `IS_CONTACT_ibfk_1` FOREIGN KEY (`account_id1_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `IS_CONTACT_ibfk_2` FOREIGN KEY (`account_id2_fk`) REFERENCES `ACCOUNT` (`account_id`);

--
-- Constraints for table `IS_FAMILY_MEMBER`
--
ALTER TABLE `IS_FAMILY_MEMBER`
  ADD CONSTRAINT `IS_FAMILY_MEMBER_ibfk_1` FOREIGN KEY (`politician1_id_fk`) REFERENCES `POLITICIAN` (`politician_id`),
  ADD CONSTRAINT `IS_FAMILY_MEMBER_ibfk_2` FOREIGN KEY (`politician2_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `IS_WATCHING`
--
ALTER TABLE `IS_WATCHING`
  ADD CONSTRAINT `IS_WATCHING_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `IS_WATCHING_ibfk_2` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `POLITICIAN_PROFILE`
--
ALTER TABLE `POLITICIAN_PROFILE`
  ADD CONSTRAINT `POLITICIAN_PROFILE_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `POLITICIAN_PROFILE_ibfk_2` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `PRIVATE_CONTACT`
--
ALTER TABLE `PRIVATE_CONTACT`
  ADD CONSTRAINT `PRIVATE_CONTACT_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `PRIVATE_CONTACT_ibfk_2` FOREIGN KEY (`requested_by`) REFERENCES `ACCOUNT` (`account_id`);

--
-- Constraints for table `PROMISE`
--
ALTER TABLE `PROMISE`
  ADD CONSTRAINT `PROMISE_ibfk_1` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `RATES`
--
ALTER TABLE `RATES`
  ADD CONSTRAINT `RATES_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `RATES_ibfk_2` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `ROLE`
--
ALTER TABLE `ROLE`
  ADD CONSTRAINT `ROLE_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `ROLE_ibfk_2` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`);

--
-- Constraints for table `SEMI_LOCKS`
--
ALTER TABLE `SEMI_LOCKS`
  ADD CONSTRAINT `SEMI_LOCKS_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `SEMI_LOCKS_ibfk_2` FOREIGN KEY (`politician_profile_id_fk`) REFERENCES `POLITICIAN_PROFILE` (`politician_profile_id`);

--
-- Constraints for table `TRACKS`
--
ALTER TABLE `TRACKS`
  ADD CONSTRAINT `TRACKS_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `TRACKS_ibfk_2` FOREIGN KEY (`promise_id_fk`) REFERENCES `PROMISE` (`promise_id`);

--
-- Constraints for table `WIKIP`
--
ALTER TABLE `WIKIP`
  ADD CONSTRAINT `WIKIP_ibfk_1` FOREIGN KEY (`account_id_fk`) REFERENCES `ACCOUNT` (`account_id`),
  ADD CONSTRAINT `WIKIP_ibfk_2` FOREIGN KEY (`politician_id_fk`) REFERENCES `POLITICIAN` (`politician_id`),
  ADD CONSTRAINT `WIKIP_ibfk_3` FOREIGN KEY (`promise_id_fk`) REFERENCES `PROMISE` (`promise_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
