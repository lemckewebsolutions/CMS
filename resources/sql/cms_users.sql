CREATE TABLE IF NOT EXISTS `cms_users` (
  `userid` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userroleid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `IND_RIGHTS` (`userroleid`);


ALTER TABLE `cms_users`
  MODIFY `userid` int(2) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cms_users`
  ADD CONSTRAINT `FK_USER_USERROLE` FOREIGN KEY (`userroleid`) REFERENCES `cms_userroles` (`userroleid`);