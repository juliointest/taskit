SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `task` (
  `taskid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tasktitle` varchar(255) NOT NULL,
  `taskdescription` text NOT NULL,
  `taskdatetime` datetime NOT NULL,
  `taskdone` enum('yes','not') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userlogin` varchar(20) NOT NULL,
  `userpassword` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`userid`, `username`, `userlogin`, `userpassword`) VALUES
(1, 'Teste', 'teste', 'e10adc3949ba59abbe56e057f20f883e');

CREATE TABLE `userdata` (
  `userdataid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `userdatatype` enum('email','phone') NOT NULL,
  `userdatavalue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `task`
  ADD PRIMARY KEY (`taskid`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userdataid`);

ALTER TABLE `task`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1315;

ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;

ALTER TABLE `userdata`
  MODIFY `userdataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19096;
COMMIT;
