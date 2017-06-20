-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2017 at 01:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcefile`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientlist`
--

CREATE TABLE `clientlist` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `symbol` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientlist`
--

INSERT INTO `clientlist` (`username`, `password`, `symbol`) VALUES
('', '1', 's'),
('1193141', '123', 's'),
('1215118', '1', 's'),
('1643397', '1', 's'),
('1674472', '1', 's'),
('1675590', '1', 's'),
('1678174', '111', 's'),
('1678975', '1', 's'),
('1679001', '1', 's'),
('1679004', '1', 's'),
('1679049', '1', 's'),
('1679217', '1', 's'),
('1679380', '1', 's'),
('1680297', '1', 's'),
('1680399', '1', 's'),
('1680639', '1', 's'),
('1680974', '1', 's'),
('1680978', '1', 's'),
('1681245', '1', 's'),
('1681343', '1', 's'),
('1681960', '1', 's'),
('1682285', '1', 's'),
('1682781', '1', 's'),
('1682782', '1', 's'),
('1683059', '1', 's'),
('1683229', '1', 's'),
('1683531', '1', 's'),
('1683744', '1', 's'),
('1684851', '1', 's'),
('1685167', '1', 's'),
('1685196', '1', 's'),
('1690342', '1', 's'),
('1690700', '1', 's'),
('1691688', '1', 's'),
('1691967', '1', 's'),
('1692118', '1', 's'),
('1692335', '123', 's'),
('1692774', '1', 's'),
('1692828', '1', 's'),
('1693360', '1', 's'),
('1694617', '1', 's'),
('1694697', '1', 's'),
('1695078', '1', 's'),
('1695820', '1', 's'),
('1696198', '1', 's'),
('1696877', '1', 's'),
('1697073', '1', 's'),
('1697233', '1', 's'),
('1698313', '1', 's'),
('1698583', '1', 's'),
('1699186', '1', 's'),
('1699817', '1', 's'),
('1700176', '1', 's'),
('1700405', '1', 's'),
('1701655', '1', 's'),
('1712545', '1', 's'),
('aaron', '2', 's'),
('aaron1', '1', 's'),
('abbott', '1', 's'),
('abbott1', '1', 's'),
('alice', '1', 't'),
('bill', '1', 's'),
('bill1', '1', 's'),
('lcc', '1', 's'),
('lcc1', '1', 's'),
('peter', '1', 's'),
('peter1', '1', 's'),
('sherry', '1', 's'),
('sherry1', '1', 's'),
('tony', '1', 's'),
('tony2', '1', 's');

-- --------------------------------------------------------

--
-- Table structure for table `Error`
--

CREATE TABLE `Error` (
  `studentname` varchar(256) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `errorline` varchar(256) NOT NULL,
  `studentinput` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Error`
--

INSERT INTO `Error` (`studentname`, `filename`, `errorline`, `studentinput`) VALUES
('sherry', 'd.c', '1', '4,0,0'),
('sherry', 'd.c', '3', '4,0,0'),
('sherry', 'c1.c', '4', '4,0,0'),
('sherry', 'c1.c', '1', '4,0,0'),
('aaron', 'd.c', '1', '3,0,0'),
('bill', 'c2.c', '3', '4,0,0'),
('sherry', 'c2.c', '1', '4,0,0'),
('tony', 'c1.c', '1', '3,0,0'),
('tony', 'd.c', '1', '3,0,0'),
('bill', 'c2.c', '1', '3,0,0'),
('tony', 'c1.c', '2', '0,0,0'),
('tony', 'c1.c', '3', '0,0,0'),
('tony', 'c1.c', '4', '0,0,0'),
('tony', 'c1.c', '5', '0,0,0'),
('tony', 'c2.c', '1', '0,0,0'),
('tony', 'c2.c', '2', '0,0,0'),
('tony', 'c2.c', '3', '0,0,0'),
('tony', 'c2.c', '4', '0,0,0'),
('tony', 'c3.c', '1', '0,0,0'),
('tony', 'c3.c', '2', '0,0,0'),
('tony', 'c3.c', '3', '0,0,0'),
('tony', 'c3.c', '4', '0,0,0'),
('tony', 'c3.c', '1', '0,0,0'),
('tony', 'c3.c', '2', '0,0,0'),
('tony', 'c3.c', '3', '0,0,0'),
('tony', 'c3.c', '4', '0,0,0'),
('tony', 'c3.c', '1', '0,0,0'),
('tony', 'c3.c', '2', '0,0,0'),
('tony', 'c3.c', '3', '0,0,0'),
('tony', 'c3.c', '4', '0,0,0'),
('tony', 'c3.c', '1', '0,0,0'),
('tony', 'c3.c', '2', '0,0,0'),
('tony', 'c3.c', '3', '0,0,0'),
('tony', 'c3.c', '4', '0,0,0'),
('tony', 'c3.c', '1', '0,0,0'),
('tony', 'c3.c', '2', '0,0,0'),
('tony', 'c3.c', '3', '0,0,0'),
('tony', 'c3.c', '4', '0,0,0'),
('tony', 'c4.c', '1', '1,1,1'),
('tony', 'c4.c', '0', '0,0,0'),
('tony', 'c4.c', '1', '0,0,0'),
('tony', 'c4.c', '2', '0,0,0'),
('tony', 'c4.c', '1', '0,0,0'),
('tony', 'c4.c', '2', '0,0,0'),
('tony', 'c4.c', '3', '0,0,0'),
('tony', 'c4.c', '4', '0,0,0'),
('peter', 'main.c', '1', '1,1,1'),
('peter', 'main.c', '2', '2,2,2'),
('peter', 'main.c', '3', '0,0,0'),
('peter', 'main.c', '4', '0,0,0'),
('peter', 'c1.c', '2', '0,0,0'),
('peter', 'c1.c', '3', '0,0,0'),
('peter', 'c1.c', '4', '0,0,0'),
('peter', 'c1.c', '5', '0,0,0'),
('peter', 'c2.c', '0', '0,0,0'),
('peter', 'c2.c', '0', '0,0,0'),
('peter', 'c2.c', '0', '0,0,0'),
('peter', 'c2.c', '0', '0,0,0'),
('peter', 'c1.c', '2', '0,0,0,0'),
('peter', 'c1.c', '3', '0,0,0,0'),
('peter', 'c1.c', '4', '0,0,0,0'),
('peter', 'c1.c', '5', '0,0,0,0'),
('peter', 'c1.c', '6', '0,0,0,0'),
('tony', 'c2.c', '1', '0,0,0'),
('tony', 'c2.c', '2', '0,0,0'),
('tony', 'c2.c', '3', '0,0,0'),
('tony', 'c2.c', '4', '0,0,0'),
('tony', 'c2.c', '1', '0,0,0'),
('tony', 'c2.c', '2', '0,0,0'),
('tony', 'c2.c', '3', '0,0,0'),
('tony', 'c2.c', '4', '0,0,0'),
('tony', 'c1.c', '0', '0,0,0,0'),
('tony', 'c1.c', '0', '0,0,0,0'),
('tony', 'c1.c', '0', '0,0,0,0'),
('tony', 'c1.c', '0', '0,0,0,0'),
('tony', 'c1.c', '0', '0,0,0,0'),
('tony', 'c3.c', '0', '0,0,0'),
('tony', 'c3.c', '0', '0,0,0'),
('tony', 'c3.c', '0', '0,0,0'),
('tony', 'c3.c', '0', '0,0,0');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `source_file` longtext NOT NULL,
  `solution` text NOT NULL,
  `name` varchar(256) NOT NULL,
  `variable` varchar(256) NOT NULL,
  `statement` text NOT NULL,
  `class` varchar(256) NOT NULL,
  `cap` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`source_file`, `solution`, `name`, `variable`, `statement`, `class`, `cap`) VALUES
('\n#include <stdio.h>\n//\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    float aa = 100.0;\n    float hn = aa/3;\n    int a;\n    if(hn==50){\n        a=1;\n    }\n    else{\n        a=0;\n    }\n    int n;\n   \n        aa = aa+2*hn;\n        hn = hn/2;\n    }\n', '100\n0\n0\n0\n100\n33.33\n0\n0\n100\n33.33\n0\n0\n100\n33.33\n0\n0\n166.67\n33.33\n0\n0\n166.67\n16.67\n0\n0\n', 'c1.c', 'aa\nhn\na\nn\n', '2\n3\n8\n9\n13\n14\n', 'MCI', 0.25),
('\n#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    int a =0;\n    int b =0;\n    int i=0;\n    for( i=0;i<3;i++){\n        b=b+1;\n    }\n    }\n', '0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n1\n0\n0\n1\n1\n0\n2\n1\n0\n2\n2\n0\n3\n2\n0\n3\n3\n', 'c2.c', 'a\nb\ni\n', '2\n3\n4\n5\n6\n5\n6\n5\n6\n5\n', 'MCI', 0.25),
('\n\n#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    float cc = 100.0;\n    float hn = cc/2;\n    int a =3;\n    while(a>=0){\n        cc=cc*2;\n        a=a-1;\n    }\n    \n}\n', '100\n0\n0\n100\n50\n0\n100\n50\n3\n100\n50\n3\n200\n50\n3\n200\n50\n2\n200\n50\n2\n400\n50\n2\n400\n50\n1\n400\n50\n1\n800\n50\n1\n800\n50\n0\n800\n50\n0\n1600\n50\n0\n1600\n50\n-1\n1600\n50\n-1\n', 'c3.c', 'cc\nhn\na\n', '2\n3\n4\n5\n6\n7\n5\n6\n7\n5\n6\n7\n5\n6\n7\n5\n', 'class2', 0.5),
('#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    float dd = 100.0;\n    float hn = dd/2;\n    int n;\n    dd = dd+2*hn;\n    hn = hn/2;\n}\n', '100\n0\n0\n100\n50\n0\n200\n50\n0\n200\n25\n0\n', 'c4.c', 'dd\nhn\nn\n', '1\n2\n4\n5\n', 'MCI', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `filename` varchar(256) NOT NULL,
  `studentname` varchar(256) NOT NULL,
  `score` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Score`
--

INSERT INTO `Score` (`filename`, `studentname`, `score`) VALUES
('c1.c', 'bill', 13),
('c1.c', 'peter', 13),
('c1.c', 'bill1', 100),
('c1.c', 'sherry', 100),
('c2.c', 'sherry', 80),
('c1.c', 'sherry1', 100),
('c2.c', 'sherry1', 60),
('c1.c', 'lcc', 100),
('c1.c', 'bill', 100),
('c1.c', 'aaron', 15),
('c1.c', 'bill', 15),
('c1.c', '1193141', 0),
('c1.c', '1678174', 0),
('c1.c', '1678174', 0),
('c1.c', '1692335', 75),
('c1.c', '1674472', 100),
('c1.c', 'alice', 100),
('c1.c', 'alice', 100);

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `username` varchar(10) NOT NULL,
  `class` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `valuekey` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`username`, `class`, `firstname`, `lastname`, `valuekey`) VALUES
('1193141', 'MCI', 'Koh', 'Guo Ren', '1193141MCI'),
('1215118', 'MCI', 'Li', 'Han', '1215118MCI'),
('1643397', 'MCI', 'Li', 'Jiannan', '1643397MCI'),
('1674472', 'MCI', 'Xi', 'Tianxu', '1674472MCI'),
('1675590', 'MCI', 'Zhu', 'Juesheng', '1675590MCI'),
('1678174', 'MCI', 'Lang', 'Haifan', '1678174MCI'),
('1678975', 'MCI', 'Hao', 'Ke', '1678975MCI'),
('1679001', 'MCI', 'Cui', 'Aqiang', '1679001MCI'),
('1679004', 'MCI', 'Yue', 'Tongyuan', '1679004MCI'),
('1679049', 'MCI', 'Zhao', 'Ming', '1679049MCI'),
('1679217', 'MCI', 'Gao', 'Jingyao', '1679217MCI'),
('1679380', 'MCI', 'Yuan', 'Liang', '1679380MCI'),
('1680297', 'MCI', 'Wang', 'Ze', '1680297MCI'),
('1680399', 'MCI', 'Xue', 'Chunyuan', '1680399MCI'),
('1680639', 'MCI', 'Yu', 'Zhuojun', '1680639MCI'),
('1680974', 'MCI', 'Zhang', 'Tao', '1680974MCI'),
('1680978', 'MCI', 'Xie', 'Haochen', '1680978MCI'),
('1681245', 'MCI', 'Han', 'Xiaoxi', '1681245MCI'),
('1681343', 'MCI', 'Zhang', 'Xiyue', '1681343MCI'),
('1681960', 'MCI', 'Ou', 'Siwen', '1681960MCI'),
('1682285', 'MCI', 'Zhang', 'Yue', '1682285MCI'),
('1682781', 'MCI', 'Lin', 'Yi', '1682781MCI'),
('1682782', 'MCI', 'Liu', 'Chang', '1682782MCI'),
('1683059', 'MCI', 'Zeighami', 'Bita', '1683059MCI'),
('1683229', 'MCI', 'Wu', 'Lili', '1683229MCI'),
('1683531', 'MCI', 'So', 'Kok', '1683531MCI'),
('1683744', 'MCI', 'Luo', 'Jiajun', '1683744MCI'),
('1684851', 'MCI', 'Yu', 'Saijun', '1684851MCI'),
('1685167', 'MCI', 'Dong', 'Xiaofeng', '1685167MCI'),
('1685196', 'MCI', 'Zhang', 'Chen', '1685196MCI'),
('1690342', 'MCI', 'Xie', 'Yiming', '1690342MCI'),
('1690700', 'MCI', 'Liu', 'Xin', '1690700MCI'),
('1691688', 'MCI', 'Yu', 'Chen', '1691688MCI'),
('1691967', 'MCI', 'Lu', 'Yi', '1691967MCI'),
('1692118', 'MCI', 'Xu', 'Hangyue', '1692118MCI'),
('1692335', 'MCI', 'Liu', 'Changchang', '1692335MCI'),
('1692774', 'MCI', 'Wu', 'Qinqian', '1692774MCI'),
('1692828', 'MCI', 'Luo', 'Wei', '1692828MCI'),
('1693360', 'MCI', 'Tao', 'Weikai', '1693360MCI'),
('1694617', 'MCI', 'Wang', 'He', '1694617MCI'),
('1694697', 'MCI', 'Godisela', 'Manaswini', '1694697MCI'),
('1695078', 'MCI', 'Wang', 'Weikang', '1695078MCI'),
('1695820', 'MCI', 'Chen', 'Bowen', '1695820MCI'),
('1696198', 'MCI', 'Shang', 'Chenlu', '1696198MCI'),
('1696877', 'MCI', 'Guo', 'Yang', '1696877MCI'),
('1697073', 'MCI', 'Mu', 'Hui', '1697073MCI'),
('1697233', 'MCI', 'Ma', 'Chi', '1697233MCI'),
('1698313', 'MCI', 'Calabrese', 'Michael Carmine', '1698313MCI'),
('1698583', 'MCI', 'Wang', 'Hao', '1698583MCI'),
('1699186', 'MCI', 'Wang', 'I-Sheng Chris', '1699186MCI'),
('1699817', 'MCI', 'Sidhu', 'Pavitterjeet Singh', '1699817MCI'),
('1700176', 'MCI', 'Phull', 'Vivek', '1700176MCI'),
('1700405', 'MCI', 'Wang', 'Chao', '1700405MCI'),
('1701655', 'MCI', 'Mao', 'Boyu', '1701655MCI'),
('1712545', 'MCI', 'Lakshmana', 'Neelam', '1712545MCI'),
('aaron', 'class2', 'Aaron', 'Michael Carmine', 'aaronclass2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientlist`
--
ALTER TABLE `clientlist`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Error`
--
ALTER TABLE `Error`
  ADD KEY `studentname` (`studentname`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Score`
--
ALTER TABLE `Score`
  ADD KEY `studentname` (`studentname`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Error`
--
ALTER TABLE `Error`
  ADD CONSTRAINT `error_ibfk_1` FOREIGN KEY (`studentname`) REFERENCES `clientlist` (`username`);

--
-- Constraints for table `Score`
--
ALTER TABLE `Score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`studentname`) REFERENCES `clientlist` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
