CREATE TABLE IF NOT EXISTS `cms_userroles` (
  `userroleid` int(2) NOT NULL,
  `userrole` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `cms_userroles`
  ADD PRIMARY KEY (`userroleid`);


ALTER TABLE `cms_userroles`
  MODIFY `userroleid` int(2) NOT NULL AUTO_INCREMENT;