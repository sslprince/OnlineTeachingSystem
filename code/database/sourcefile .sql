-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 08:07 AM
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
  `name` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `symbol` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientlist`
--

INSERT INTO `clientlist` (`name`, `username`, `password`, `symbol`) VALUES
('', 'aaron', '1', 's'),
('', 'aaron1', '1', 's'),
('', 'abbott', '1', 's'),
('', 'abbott1', '1', 's'),
('', 'bill', '1', 's'),
('', 'bill1', '1', 's'),
('', 'lcc', '1', 's'),
('', 'lcc1', '1', 's'),
('', 'peter', '1', 's'),
('', 'peter1', '1', 's'),
('', 'sherry', '1', 's'),
('', 'sherry1', '1', 's'),
('', 'tony1', '1', 's'),
('', 'tony2', '1', 's');

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
('arron', 'd.c', '1', ''),
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
  `statement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`source_file`, `solution`, `name`, `variable`, `statement`) VALUES
('\n#include <stdio.h>\n//\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    float aa = 100.0;\n    float hn = aa/3;\n    int a;\n    if(hn==50){\n        a=1;\n    }\n    else{\n        a=0;\n    }\n    int n;\n   \n        aa = aa+2*hn;\n        hn = hn/2;\n    }\n', '100\n0\n0\n0\n100\n33.33\n0\n0\n100\n33.33\n0\n0\n100\n33.33\n0\n0\n166.67\n33.33\n0\n0\n166.67\n16.67\n0\n0\n', 'c1.c', 'aa\nhn\na\nn\n', '2\n3\n8\n9\n13\n14\n'),
('//\n//  main.c\n//  test1\n//\n//  Created by LCC on 1/03/2017.\n//  Copyright Â© 2017 LCC. All rights reserved.\n//\n\n#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    int a =0;\n    int b =0;\n    int i=0;\n    for( i=0;i<3;i++){\n        b=b+1;\n    }\n    }\n', '0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n0\n1\n0\n0\n1\n1\n0\n2\n1\n0\n2\n2\n0\n3\n2\n0\n3\n3\n', 'c2.c', 'a\nb\ni\n', '0\n2\n3\n4\n5\n6\n5\n6\n5\n6\n5\n'),
('//\n//  cc.c\n//  test1\n//\n//  Created by LCC on 1/03/2017.\n//  Copyright Â© 2017 LCC. All rights reserved.\n//\n\n#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    float cc = 100.0;\n    float hn = cc/2;\n    int a =3;\n    while(a>=0){\n        cc=cc*2;\n        a=a-1;\n    }\n    \n}\n', '0\n0\n0\n100\n0\n0\n100\n50\n0\n100\n50\n3\n100\n50\n3\n200\n50\n3\n200\n50\n2\n200\n50\n2\n400\n50\n2\n400\n50\n1\n400\n50\n1\n800\n50\n1\n800\n50\n0\n800\n50\n0\n1600\n50\n0\n1600\n50\n-1\n1600\n50\n-1\n', 'c3.c', 'cc\nhn\na\n', ''),
('//\n//  dd.c\n//  test1\n//\n//  Created by LCC on 1/03/2017.\n//  Copyright Â© 2017 LCC. All rights reserved.\n//\n\n#include <stdio.h>\nint main(int argc, const char * argv[]) {\n    // insert code here...\n    float dd = 100.0;\n    float hn = dd/2;\n    int n;\n   \n        dd = dd+2*hn;\n        hn = hn/2;\n    }\n', '0\n0\n0\n100\n0\n0\n100\n50\n0\n200\n50\n0\n200\n25\n0\n', 'c4.c', 'dd\nhn\nn\n', '0\n2\n3\n6\n7\n');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `filename` varchar(256) NOT NULL,
  `studentname` varchar(256) NOT NULL,
  `score` int(8) NOT NULL
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
('c1.c', 'bill', 100);

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `statement` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `username` varchar(10) NOT NULL,
  `class` varchar(255) NOT NULL,
  `keyvalue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`username`, `class`, `keyvalue`) VALUES
('aaron1', 'class2', 'aaron1class2'),
('aaron', 'class1', 'aaronclass1'),
('abbott1', 'class2', 'abbott1class2'),
('abbott', 'class1', 'abbottclass1'),
('bill1', 'class2', 'bill1class2'),
('bill', 'class1', 'billclass1'),
('lcc1', 'class2', 'lcc1class2'),
('lcc', 'class1', 'lccclass1'),
('peter1', 'class2', 'peter1class2'),
('peter', 'class1', 'peterclass1'),
('sherry1', 'class2', 'sherry1class2'),
('sherry', 'class1', 'sherryclass1'),
('tony1', 'class1', 'tony1class1'),
('tony2', 'class2', 'tony2class2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientlist`
--
ALTER TABLE `clientlist`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`keyvalue`),
  ADD UNIQUE KEY `key` (`keyvalue`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
