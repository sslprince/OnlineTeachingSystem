-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2017 at 11:12 AM
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
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `source_file` longtext NOT NULL,
  `solution` text NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`source_file`, `solution`, `name`) VALUES
('//\n<br>//  main.c\n<br>//  test1\n<br>//\n<br>//  Created by LCC on 1/03/2017.\n<br>//  Copyright Â© 2017 LCC. All rights reserved.\n<br>//\n<br>\n<br>#include <stdio.h>\n<br>int main(int argc, const char * argv[]) {\n<br>    // insert code here...\n<br>    float bb = 100.0;\n<br>    float hn = bb/2;\n<br>    int n;\n<br>   \n<br>        bb = bb+2*hn;\n<br>        hn = hn/2;\n<br>    }\n<br><br>', '0\n<br>0\n<br>0\n<br>100\n<br>0\n<br>0\n<br>100\n<br>50\n<br>0\n<br>200\n<br>50\n<br>0\n<br>200\n<br>25\n<br>0\n<br><br>', 'c2.c'),
('//\n<br>//  cc.c\n<br>//  test1\n<br>//\n<br>//  Created by LCC on 1/03/2017.\n<br>//  Copyright Â© 2017 LCC. All rights reserved.\n<br>//\n<br>\n<br>#include <stdio.h>\n<br>int main(int argc, const char * argv[]) {\n<br>    // insert code here...\n<br>    float cc = 100.0;\n<br>    float hn = cc/2;\n<br>    int n;\n<br>   \n<br>        cc = cc+3*hn;\n<br>        hn = hn/2;\n<br>    }\n<br><br>', '0\n<br>0\n<br>0\n<br>100\n<br>0\n<br>0\n<br>100\n<br>50\n<br>0\n<br>250\n<br>50\n<br>0\n<br>250\n<br>25\n<br>0\n<br><br>', 'c3.c'),
('//\n<br>//  dd.c\n<br>//  test1\n<br>//\n<br>//  Created by LCC on 1/03/2017.\n<br>//  Copyright Â© 2017 LCC. All rights reserved.\n<br>//\n<br>\n<br>#include <stdio.h>\n<br>int main(int argc, const char * argv[]) {\n<br>    // insert code here...\n<br>    float dd = 100.0;\n<br>    float hn = dd/2;\n<br>    int n;\n<br>   \n<br>        dd = dd+2*hn;\n<br>        hn = hn/2;\n<br>    }\n<br><br>', '0\n<br>0\n<br>0\n<br>100\n<br>0\n<br>0\n<br>100\n<br>50\n<br>0\n<br>200\n<br>50\n<br>0\n<br>200\n<br>25\n<br>0\n<br><br>', 'c4.c'),
('//\n<br>//  aa.c\n<br>//  test1\n<br>//\n<br>//  Created by LCC on 1/03/2017.\n<br>//  Copyright Â© 2017 LCC. All rights reserved.\n<br>//\n<br>\n<br>#include <stdio.h>\n<br>int main(int argc, const char * argv[]) {\n<br>    // insert code here...\n<br>    float aa = 100.0;\n<br>    float hn = aa/2;\n<br>    int n;\n<br>   \n<br>        aa = aa+2*hn;\n<br>        hn = hn/2;\n<br>    }\n<br><br>', '', 'main.c');

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `ID` int(8) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `studentname` varchar(256) NOT NULL,
  `score` int(8) NOT NULL,
  `class` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Score`
--

INSERT INTO `Score` (`ID`, `filename`, `studentname`, `score`, `class`) VALUES
(1, 'c1.c', 'lalala', 89, ''),
(2, 'c2.c', 'nana', 90, ''),
(3, 'c1.c', 'nana', 60, ''),
(4, 'c2.c', 'lalala', 78, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Score`
--
ALTER TABLE `Score`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
