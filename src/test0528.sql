
CREATE TABLE `customer` (
  `custname` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `custregion` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `passportid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `manager` (
  `maname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `ordering` (
  `custname` varchar(50) NOT NULL,
  `custregion` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `orderid` varchar(30) NOT NULL,
  `srname` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type1` int(11) NOT NULL,
  `type2` int(11) NOT NULL,
  `type3` int(11) NOT NULL,
  `totalsales` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `salerep` (
  `srname` varchar(50) NOT NULL,
  `employeeid` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `srregion` varchar(30) NOT NULL,
  `quota1` int(11) NOT NULL,
  `quota2` int(11) NOT NULL,
  `quota3` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `customer`
  ADD PRIMARY KEY (`custname`);

ALTER TABLE `manager`
  ADD PRIMARY KEY (`maname`);

ALTER TABLE `ordering`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fk_srname` (`srname`),
  ADD KEY `fk_custname` (`custname`);

ALTER TABLE `salerep`
  ADD PRIMARY KEY (`srname`);


ALTER TABLE `ordering`
  ADD CONSTRAINT `fk_custname` FOREIGN KEY (`custname`) REFERENCES `customer` (`custname`),
  ADD CONSTRAINT `fk_srname` FOREIGN KEY (`srname`) REFERENCES `salerep` (`srname`);
COMMIT;


INSERT INTO `manager` (`maname`, `password`) VALUES
('manager', '111');

INSERT INTO `customer` (`custname`, `realname`, `phone`, `email`, `custregion`, `password`, `passportid`) VALUES
('america1', 'america1', '05524026707', '123@abc.com', 'America', '111', '11111'),
('canada1', 'canada1', '05524026707', '123@abc.com', 'Canada', '111', '11111'),
('china1', 'china1', '18055220209', '123@abc.com', 'China', '111', '12322123'),
('china2', 'china2', '05524026707', '123@abc.com', 'China', '111', '11111'),
('england1', 'england1', '111111111111', 'aaa@aaa.com', 'England', '111', '12322123'),
('japan1', 'japan1', '05524026707', '123@abc.com', 'Japan', '111', '11111'),
('korea1', 'korea1', '05524026707', '123@abc.com', 'Korea', '111', '11111');

INSERT INTO `salerep` (`srname`, `employeeid`, `realname`, `phone`, `email`, `srregion`, `quota1`, `quota2`, `quota3`, `password`) VALUES
('rep', '241501319', 'rep', '18055220707', '123@abc.com', 'America', 500, 400, 200, '111'),
('repAmerica1', '240016059', 'repAmerica1', '05524026707', '123@abc.com', 'America', 400, 300, 300, '111'),
('repCanada1', '240016058', 'repCanada1', '05524026707', '123@abc.com', 'Canada', 400, 600, 500, '111'),
('repCanada2', '240017081', 'repCanada2', '05524026707', '123@abc.com', 'Canada', 400, 600, 500, '111'),
('repChina1', '232346486', 'repChina1', '11111111111', '123@abc.com', 'China', 919, 300, 300, '111'),
('repChina2', '240018096', 'repChina2', '05524026707', '123@abc.com', 'China', 413, 582, 300, '111'),
('repEngland1', '240019011', 'repEngland1', '05524026707', '123@abc.com', 'England', 400, 600, 640, '111'),
('repJapan1', '240019081', 'repJapan1', '05524026707', '123@abc.com', 'Japan', 400, 600, 312, '111'),
('repKorea1', '240128902', 'repKorea1', '05524026707', '123@abc.com', 'Korea', 400, 500, 300, '111'),
('repKorea2', '262130458', 'hh', '18055220209', '123@abc.com', 'Korea', 300, 500, 300, '111');

INSERT INTO `ordering` (`custname`, `custregion`, `date`, `orderid`, `srname`, `status`, `type1`, `type2`, `type3`, `totalsales`) VALUES
('china1', 'China', '2020-05-16 15:03:22', '051615032227', 'repChina2', 'completed', 0, 200, 4, 206),
('china1', 'China', '2020-05-16 15:03:30', '051615033067', 'repChina1', 'completed', 200, 0, 0, 200),
('china1', 'China', '2020-05-16 15:03:49', '051615034944', 'repChina2', 'completed', 1, 50, 200, 351),
('canada1', 'Canada', '2020-05-16 15:09:32', '051615093248', 'repCanada1', 'cancelled', 0, 200, 0, 200),
('canada1', 'Canada', '2020-05-16 15:37:45', '051615374568', 'repCanada1', 'completed', 100, 20, 134, 321),
('china1', 'China', '2020-05-17 11:50:57', '051711505796', 'repChina1', 'completed', 20, 0, 100, 170),
('japan1', 'Japan', '2020-05-17 12:10:55', '051712105592', 'repJapan1', 'completed', 50, 100, 200, 450),
('korea1', 'Korea', '2020-05-17 12:11:17', '051712111797', 'repKorea1', 'completed', 12, 4, 4, 22),
('china2', 'China', '2020-05-19 11:16:57', '051911165750', 'repChina2', 'cancelled', 0, 200, 0, 200),
('china2', 'China', '2020-05-19 16:19:47', '051916194758', 'repChina1', 'completed', 7, 4, 10, 26),
('china2', 'China', '2020-05-19 16:20:02', '051916200244', 'repChina1', 'completed', 0, 20, 80, 140),
('china1', 'China', '2020-05-20 22:26:20', '052022262059', 'repChina2', 'completed', 300, 123, 13, 442.5),
('china1', 'China', '2020-05-20 22:26:28', '052022262881', 'repChina1', 'completed', 300, 13, 13, 332.5),
('china1', 'China', '2020-05-20 22:26:28', '052022262890', 'repChina1', 'completed', 300, 13, 13, 332.5),
('korea1', 'Korea', '2020-05-20 22:26:42', '052022264266', 'repKorea1', 'completed', 300, 122, 0, 422),
('america1', 'America', '2020-05-21 11:42:09', '052111420986', 'repAmerica1', 'completed', 200, 10, 20, 240),
('america1', 'America', '2020-05-21 11:42:18', '052111421855', 'repAmerica1', 'completed', 22, 10, 20, 62),
('america1', 'America', '2020-05-21 11:42:18', '052111421856', 'repAmerica1', 'completed', 22, 10, 20, 62),
('japan1', 'Japan', '2020-05-21 11:42:36', '052111423676', 'repJapan1', 'completed', 50, 40, 100, 240),
('england1', 'England', '2020-05-21 12:08:11', '052112081157', 'repEngland1', 'completed', 30, 90, 40, 180),
('england1', 'England', '2020-05-21 12:08:19', '052112081945', 'repEngland1', 'completed', 39, 87, 300, 576),
('england1', 'England', '2020-05-21 12:08:19', '052112081998', 'repEngland1', 'completed', 39, 87, 300, 576),
('korea1', 'Korea', '2020-05-21 13:39:17', '052113391731', 'repKorea1', 'completed', 14, 13, 20, 57),
('canada1', 'Canada', '2020-05-21 21:19:26', '052121192657', 'repCanada1', 'completed', 2, 3, 0, 5),
('america1', 'America', '2020-05-21 21:35:29', '052121352984', 'repAmerica1', 'completed', 0, 200, 0, 200),
('china1', 'China', '2020-05-21 22:29:23', '052122292315', 'repChina1', 'completed', 4, 3, 0, 7),
('china1', 'China', '2020-05-21 22:29:23', '052122292389', 'repChina1', 'completed', 4, 3, 0, 7),
('china1', 'China', '2020-05-21 22:29:35', '052122293519', 'repChina2', 'completed', 0, 3, 0, 3),
('china1', 'China', '2020-05-21 22:29:55', '052122295590', 'repChina1', 'cancelled', 4, 3, 0, 7),
('japan1', 'Japan', '2020-05-21 23:03:35', '052123033546', 'repJapan1', 'completed', 300, 200, 12, 518),
('china1', 'China', '2020-05-23 23:50:05', '052323500572', 'repChina1', 'completed', 0, 2, 0, 2),
('canada1', 'Canada', '2020-05-24 00:24:21', '052400242138', 'repCanada2', 'completed', 3, 200, 8, 215),
('china2', 'China', '2020-05-24 12:31:28', '052412312836', 'repChina2', 'completed', 100, 6, 30, 151),
('china2', 'China', '2020-05-24 12:33:09', '052412330963', 'repChina1', 'completed', 30, 20, 10, 65),
('china2', 'China', '2020-05-24 12:37:12', '052412371268', 'repChina1', 'completed', 30, 120, 13, 169.5),
('korea1', 'Korea', '2020-05-24 12:54:03', '052412540335', 'repKorea1', 'completed', 7, 10, 9, 30.5),
('korea1', 'Korea', '2020-05-24 15:25:14', '052415251447', 'repKorea1', 'completed', 30, 20, 24, 86),
('canada1', 'Canada', '2020-05-24 15:25:34', '052415253446', 'repCanada2', 'completed', 200, 1, 4, 207),
('china2', 'China', '2020-05-27 13:02:33', '052713023387', 'repChina2', 'completed', 12, 200, 20, 242),
('china2', 'China', '2020-05-27 13:02:39', '052713023956', 'repChina1', 'completed', 12, 20, 20, 62),
('china2', 'China', '2020-05-27 13:02:39', '052713023997', 'repChina1', 'completed', 12, 20, 20, 62),
('japan1', 'Japan', '2020-05-27 23:41:31', '052723413129', 'repJapan1', 'processing', 223, 12, 33, 284.5),
('japan1', 'Japan', '2020-05-27 23:41:36', '052723413613', 'repJapan1', 'processing', 223, 16, 33, 288.5),
('japan1', 'Japan', '2020-05-27 23:41:36', '052723413624', 'repJapan1', 'processing', 223, 16, 33, 288.5),
('america1', 'America', '2020-05-27 23:41:59', '052723415921', 'rep', 'processing', 12, 22, 37, 89.5),
('america1', 'America', '2020-05-27 23:42:05', '052723420546', 'repAmerica1', 'processing', 21, 27, 37, 103.5),
('america1', 'America', '2020-05-27 23:42:05', '052723420564', 'repAmerica1', 'processing', 21, 27, 37, 103.5);
