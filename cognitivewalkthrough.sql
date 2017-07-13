-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 11:03 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cognitivewalkthrough`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminid` bigint(80) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminid`, `firstname`, `lastname`, `email`, `username`, `password`, `level`) VALUES
(1, 'nischitha', 'gopinath', 'gnischitha@yahoo.in', 'nish5190', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'darshan', 'rangaswamy', 'darshan@email.com', '3688', 'acaa16770db76c1ffb9cee51c3cabfcf', 0),
(3, 'gdfg', 'gdfgdf', 'sitara.diamond@gmail.com', 'lots', '2ec001fcda7f781cac039579ca1ec170', 0),
(4, 'darshan', 'rangaswamy', 'darshan@email.com', 'darshan', '406f84c0877f9574a5295bb8f4d0ee6f', 2),
(5, 'nischitha', 'gopinath', 'admin@admin.com', 'nish5190', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(6, 'fghfg', 'hgf', 'nischithagowdagopinath@gmail.com', 'jmhh', '75b05ff36eb7ee5ad7a4ffdf3ad97860', 2);

-- --------------------------------------------------------

--
-- Table structure for table `altsteps`
--

CREATE TABLE `altsteps` (
  `altstepid` bigint(80) NOT NULL,
  `altstepname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `altsteps`
--

INSERT INTO `altsteps` (`altstepid`, `altstepname`) VALUES
(1, 'step4a'),
(2, 'step4a'),
(3, 'step7a'),
(4, 'step7a'),
(5, 'step3a'),
(6, 'step5a'),
(7, 'step6a'),
(8, 'step7a'),
(9, 'step5a'),
(10, 'step1a'),
(11, 'step11a'),
(12, 'step12a'),
(13, 'step12b'),
(14, 'step3a'),
(15, 'step3b'),
(16, 's16a'),
(17, 's16b'),
(18, 's16a'),
(19, 's1a'),
(20, 's1b'),
(21, 's2a'),
(22, 's2b'),
(24, 's5a'),
(25, 's5b'),
(26, 's4a'),
(27, 's6a'),
(28, 's7a'),
(29, 's8a'),
(30, 's9a'),
(31, 's9b'),
(32, 's1a'),
(33, 's2a'),
(34, 's4a'),
(35, 's5a'),
(36, 's6a'),
(37, 's6b'),
(38, 's7a'),
(39, 's4a'),
(40, 's4b'),
(41, 's8a'),
(42, 's8b'),
(43, 's7a'),
(44, 's9a'),
(45, 's9b'),
(46, 'step1a'),
(47, 'step1b'),
(48, 'step1a'),
(49, 'step1b'),
(50, 's1a'),
(51, 's1b'),
(52, 'all new methods1'),
(53, 'all new method2'),
(54, 'fdfd'),
(55, 'all new methods1'),
(56, 'ujtyuy'),
(57, 'fdfd'),
(58, 'fdfd'),
(59, 'ujtyuy'),
(60, 's1a'),
(61, 'all new methods1'),
(62, 'all new methods1'),
(63, 'using keys'),
(64, 's2a'),
(65, 's2b'),
(66, 's2c'),
(67, 'using keys'),
(68, 'ujtyuy'),
(69, 'all new method2'),
(70, 'all new methods1'),
(71, 'all new methods1'),
(72, 'all new method2'),
(73, '1a'),
(74, '1b'),
(75, 'a'),
(76, 'b'),
(77, 'all new methods1'),
(78, 'all new method2'),
(79, 'all new methods1'),
(80, 'all new method2'),
(81, 'jbkjh'),
(82, 'jknbj'),
(83, 'all new methods1'),
(84, 'fdfd'),
(85, 'all new method2'),
(86, 'ujtyuy'),
(87, 'gdrgd'),
(88, 'gdfgdf'),
(89, 'gdrgdf'),
(90, 'gdgd'),
(91, 'bngbf'),
(92, 'grdg'),
(93, 'hfthtfh'),
(94, 'using keys'),
(95, 's4a'),
(96, 's4b'),
(97, 's2a'),
(98, 's2b'),
(99, 's4a'),
(100, 's4b'),
(101, 'm1s2a'),
(102, 'm1s2b'),
(103, 'm1s3a'),
(104, 'm1s3b'),
(105, 'm2s2a'),
(106, 'm2s2b'),
(107, 's3a'),
(108, 's3b'),
(109, 'all new methods1'),
(110, 'all new method2'),
(111, 'all new method2'),
(112, 'all new methods1'),
(113, 'ujtyuy'),
(114, 'using keys'),
(115, 'iugh'),
(116, 'ujtyuy'),
(117, 'jnljn'),
(118, 'fdfd'),
(119, 's2a'),
(120, 's2b'),
(121, 'all new methods1'),
(122, 'all new method2'),
(123, 'all new methods1'),
(124, 'all new method2'),
(125, 'all new methods1'),
(126, 'fdfd');

-- --------------------------------------------------------

--
-- Table structure for table `altsteps_altsubsteps`
--

CREATE TABLE `altsteps_altsubsteps` (
  `altstepid` bigint(20) NOT NULL,
  `altsubstepid` bigint(20) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `altsteps_altsubsteps`
--

INSERT INTO `altsteps_altsubsteps` (`altstepid`, `altsubstepid`, `sort`) VALUES
(36, 2, 0),
(38, 3, 0),
(39, 4, 0),
(39, 5, 0),
(40, 6, 0),
(40, 7, 0),
(41, 8, 0),
(41, 9, 0),
(43, 10, 0),
(44, 11, 0),
(44, 12, 0),
(44, 13, 0),
(44, 14, 0),
(44, 15, 0),
(44, 16, 0),
(67, 21, 0),
(67, 22, 0),
(67, 23, 0),
(67, 24, 25),
(68, 26, 1),
(68, 27, 2),
(68, 28, 4),
(68, 29, 3),
(69, 30, 1),
(69, 31, 1),
(71, 32, 2),
(71, 33, 2),
(72, 34, 3),
(72, 35, 3),
(72, 36, 3),
(72, 37, 3),
(84, 38, 39),
(95, 39, 40),
(95, 40, 41),
(95, 47, 48),
(95, 48, 49),
(96, 41, 42),
(96, 42, 43),
(96, 49, 50),
(96, 50, 51),
(97, 43, 44),
(97, 44, 45),
(98, 45, 46),
(98, 46, 47),
(101, 51, 52),
(101, 52, 53),
(101, 53, 54),
(102, 54, 55),
(102, 55, 56),
(103, 56, 57),
(103, 57, 58),
(104, 58, 59),
(104, 59, 60),
(105, 60, 61),
(105, 61, 62),
(106, 62, 63),
(109, 63, 64),
(109, 64, 65),
(110, 65, 66),
(110, 66, 67),
(114, 67, 68),
(114, 68, 69),
(121, 69, 70),
(121, 70, 71),
(122, 71, 72),
(122, 72, 73),
(122, 73, 74),
(122, 74, 75),
(123, 75, 76),
(123, 76, 77),
(125, 77, 78),
(125, 78, 79),
(125, 81, 82),
(126, 79, 80),
(126, 80, 81);

-- --------------------------------------------------------

--
-- Table structure for table `altsubsteps`
--

CREATE TABLE `altsubsteps` (
  `altsubstepid` bigint(80) NOT NULL,
  `altsubstepname` varchar(150) NOT NULL,
  `altsubstepimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `altsubsteps`
--

INSERT INTO `altsubsteps` (`altsubstepid`, `altsubstepname`, `altsubstepimage`) VALUES
(1, 's5aa', 'for_seminar.PNG'),
(2, 's6aa', 'for_seminar.PNG'),
(3, 's7aa', 'exam_MUI.PNG'),
(4, 's4aa', 'for_seminar.PNG'),
(5, 's4ab', 'for_seminar.PNG'),
(6, 's4ba', 'exam_MUI.PNG'),
(7, 's4ba', 'exam_MUI.PNG'),
(8, 's8aa', 'exam_MUI.PNG'),
(9, 's8aa', 'exam_MUI.PNG'),
(10, 's7aa', 'course_reg.PNG'),
(11, 's9aa', 'exam_MUI.PNG'),
(12, 's9aa', 'exam_MUI.PNG'),
(13, 's9ab', 'course_reg.PNG'),
(14, 's9ab', 'course_reg.PNG'),
(15, 's9ac', 'course_reg.PNG'),
(16, 's9ac', 'course_reg.PNG'),
(21, 'u1', 'exam_MUI.PNG'),
(22, 'u2', 'IMG_20160629_195933.jpg'),
(23, 'u3', 'for_seminar.PNG'),
(24, 'u4', 'course_reg.PNG'),
(26, 's2a', 'course_reg.PNG'),
(27, 's2b', 'exam_MUI.PNG'),
(28, 's2c', 'for_seminar.PNG'),
(29, 's2e', 'exam_MUI.PNG'),
(30, 's2a', 'WebRatio_login.png'),
(31, 's2b', 'Screenshot (1).png'),
(32, 's2a', 'Screenshot (1).png'),
(33, 's2b', 'Screenshot (1).png'),
(34, 's2b', 'Screenshot (1).png'),
(35, 's2a', 'Screenshot (1).png'),
(36, 's2b', 'Screenshot (1).png'),
(37, 's2a', 'Screenshot (1).png'),
(38, 'g12', 'course_reg.PNG'),
(39, 's4aa', 'course_reg.PNG'),
(40, 's4ab', 'for_seminar.PNG'),
(41, 's4ba', 'for_seminar.PNG'),
(42, 's4bb', 'for_seminar.PNG'),
(43, 's2aa', 'course_reg.PNG'),
(44, 's2ab', 'exam_MUI.PNG'),
(45, 's2ba', 'exam_MUI.PNG'),
(46, 's2bb', 'course_reg.PNG'),
(47, 's4aa', 'for_seminar.PNG'),
(48, 's4ab', 'for_seminar.PNG'),
(49, 's4ba', 'course_reg.PNG'),
(50, 's4bb', 'exam_MUI.PNG'),
(51, 'm1s2aa', 'course_reg.PNG'),
(52, 'm1s2ab', 'for_seminar.PNG'),
(53, 'm1s2ac', 'IMG_20160629_195933.jpg'),
(54, 'm1s2ba', 'for_seminar.PNG'),
(55, 'm1s2bb', 'screenshot.PNG'),
(56, 'm1s3aa', 'for_seminar.PNG'),
(57, 'm1s3ab', 'for_seminar.PNG'),
(58, 'm1s3ba', 'for_seminar.PNG'),
(59, 'm1s3bb', 'IMG_20160629_195933.jpg'),
(60, 'm2s2aa', 'for_seminar.PNG'),
(61, 'm2s2ab', 'for_seminar.PNG'),
(62, 'm2s2ba', 'exam_MUI.PNG'),
(63, 's4a', 'for_seminar.PNG'),
(64, 's4b', 'screenshot.PNG'),
(65, 's4b', 'screenshot.PNG'),
(66, 's4c', 'IMG_20160629_195933.jpg'),
(67, 'jhvb', 'IMG_20160629_195933.jpg'),
(68, 'kjbk', 'screenshot.PNG'),
(69, 's1', 'exam_MUI.PNG'),
(70, 's2', 'exam_MUI.PNG'),
(71, 's2', 'exam_MUI.PNG'),
(72, 's2', 'exam_MUI.PNG'),
(73, 's3', 'IMG_20160629_195933.jpg'),
(74, 's4', 'IMG_20160629_195933.jpg'),
(75, 's1', 'course_reg.PNG'),
(76, 's2', 'for_seminar.PNG'),
(77, 'cdcds', 'for_seminar.PNG'),
(78, 'dsfds', 'for_seminar.PNG'),
(79, 'cdcds', 'for_seminar.PNG'),
(80, 'fsesd', 'for_seminar.PNG'),
(81, 'fsesd', 'for_seminar.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `methodid` bigint(80) NOT NULL,
  `methodname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`methodid`, `methodname`) VALUES
(21, '0'),
(22, 'fdfd'),
(23, ''),
(24, 'all new methods1'),
(25, 'all new method2'),
(26, 'all new methods1'),
(27, 'all new methods2'),
(28, 'me1'),
(29, 'me2'),
(30, 'all new method2'),
(31, 'all new methods1'),
(32, 'ujtyuy'),
(33, 'using keys'),
(34, 'all new methods1'),
(35, 'all new method2'),
(36, 'all new methods1'),
(37, 'all new method2'),
(38, 'all new methods1'),
(39, 'all new method2'),
(40, 'all new methods1'),
(41, 'all new method2'),
(42, 'all new methods1'),
(43, 'all new method2'),
(44, 'using keys'),
(45, 'using search button'),
(46, 'all new methods1'),
(47, 'all new method2'),
(48, 'all new methods1'),
(49, 'all new method2'),
(50, 'all new methods1'),
(51, 'all new methods1'),
(52, 'all new methods1'),
(53, 'all new method2'),
(54, 'all new methods1'),
(55, 'all new method2'),
(56, 'all new methods1'),
(57, 'all new method2'),
(58, 'all new methods1'),
(59, 'all new method2'),
(60, 'all new methods1'),
(61, 'all new method2'),
(62, 'all new methods1'),
(63, 'all new method2'),
(64, 'all new methods1'),
(65, 'all new method2'),
(66, 'all new methods1'),
(67, 'all new methods1'),
(68, 'all new method2'),
(69, 'all new methods1'),
(70, 'all new method2'),
(71, 'all new methods1'),
(72, 'all new method2'),
(73, 'all new methods1'),
(74, 'all new method2'),
(75, 'all new methods1'),
(76, 'all new method2'),
(77, 'all new methods1'),
(78, 'all new method2'),
(79, 'all new methods1'),
(80, 'all new methods1'),
(81, 'fdfd'),
(82, 'all new methods1'),
(83, 'all new method2'),
(84, 'all new methods1'),
(85, 'all new methods1'),
(86, 'all new method2'),
(87, 'all new method2'),
(88, 'all new method2'),
(89, 'all new methods1'),
(90, 'all new method2'),
(91, 'all new method2'),
(92, 'all new methods1'),
(93, 'all new methods1'),
(94, 'all new method2'),
(95, 'm1'),
(96, 'm2'),
(97, 'all new methods1'),
(98, 'all new method2'),
(99, 'using keys'),
(100, 'fdfd');

-- --------------------------------------------------------

--
-- Table structure for table `method_step`
--

CREATE TABLE `method_step` (
  `methodid` bigint(80) NOT NULL,
  `stepid` bigint(80) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `method_step`
--

INSERT INTO `method_step` (`methodid`, `stepid`, `sort`) VALUES
(3, 1, 1),
(3, 2, 3),
(3, 3, 2),
(4, 4, 5),
(4, 5, 6),
(4, 6, 7),
(4, 7, 8),
(5, 8, 9),
(7, 9, 1),
(7, 10, 2),
(7, 11, 4),
(7, 12, 3),
(8, 13, 14),
(8, 14, 15),
(34, 42, 43),
(34, 43, 44),
(36, 44, 45),
(38, 45, 46),
(38, 46, 47),
(38, 47, 48),
(38, 48, 49),
(38, 49, 50),
(38, 50, 51),
(38, 51, 52),
(38, 52, 53),
(38, 53, 54),
(38, 54, 55),
(38, 55, 56),
(38, 56, 57),
(38, 57, 58),
(38, 58, 59),
(40, 59, 60),
(40, 60, 61),
(42, 66, 1),
(42, 67, 2),
(42, 80, 81),
(43, 82, 83),
(44, 83, 84),
(45, 84, 85),
(45, 85, 86),
(45, 86, 87),
(46, 87, 88),
(46, 88, 89),
(46, 89, 90),
(47, 90, 2),
(47, 91, 1),
(47, 92, 93),
(46, 93, 94),
(47, 94, 95),
(47, 95, 96),
(47, 96, 97),
(47, 97, 98),
(49, 101, 102),
(49, 102, 103),
(48, 108, 109),
(49, 109, 110),
(48, 110, 111),
(50, 111, 112),
(50, 112, 113),
(51, 113, 114),
(51, 114, 115),
(51, 115, 116),
(51, 116, 117),
(51, 120, 121),
(51, 121, 122),
(52, 122, 123),
(54, 123, 124),
(56, 124, 125),
(56, 125, 126),
(58, 126, 127),
(58, 127, 128),
(60, 128, 129),
(62, 129, 130),
(62, 130, 131),
(64, 131, 132),
(66, 132, 133),
(67, 133, 134),
(67, 134, 135),
(69, 135, 136),
(69, 136, 137),
(71, 137, 138),
(71, 138, 139),
(73, 139, 140),
(73, 140, 141),
(75, 141, 142),
(75, 142, 143),
(77, 143, 144),
(77, 144, 145),
(79, 145, 146),
(80, 146, 147),
(80, 147, 148),
(82, 148, 149),
(87, 149, 150),
(88, 150, 151),
(89, 151, 152),
(89, 152, 153),
(89, 153, 154),
(90, 154, 155),
(90, 155, 156),
(90, 156, 157),
(90, 157, 158),
(91, 158, 159),
(91, 159, 160),
(91, 160, 161),
(91, 161, 162),
(92, 162, 163),
(92, 163, 164),
(92, 164, 165),
(93, 165, 166),
(93, 166, 167),
(94, 167, 168),
(94, 168, 169),
(93, 169, 170),
(93, 170, 171),
(94, 171, 172),
(94, 172, 173),
(94, 173, 174),
(93, 174, 175),
(94, 175, 176),
(93, 176, 177),
(95, 177, 178),
(95, 178, 179),
(95, 179, 180),
(95, 180, 181),
(96, 181, 182),
(96, 182, 183),
(96, 183, 184),
(97, 184, 185),
(97, 185, 186),
(98, 186, 187),
(98, 187, 188),
(98, 188, 189),
(99, 189, 2),
(99, 190, 1),
(100, 192, 1),
(99, 193, 194),
(99, 194, 195),
(100, 195, 3),
(100, 196, 2),
(100, 197, 4),
(100, 198, 5);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `personaid` int(50) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `age` int(10) NOT NULL,
  `interests` varchar(250) NOT NULL,
  `hobby` varchar(250) NOT NULL,
  `aim` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `browsers_used` varchar(250) NOT NULL,
  `gadgets_owned` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `adminid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`personaid`, `firstname`, `lastname`, `age`, `interests`, `hobby`, `aim`, `qualification`, `occupation`, `browsers_used`, `gadgets_owned`, `description`, `adminid`) VALUES
(1, 'nischitha', 'gopinath', 27, 'ghgh', 'nlnk', 'ghchg', 'vhj', 'gfrf', 'ggtr', 'grtg', 'bgfh', 2),
(2, 'hgfh', 'hfgh', 25, 'gdfg', 'gbdfg', 'ghchg', 'f', 'f', 'gdfg', 'dfgfdg', 'jbhkhb', 0),
(3, 'gdfgfd', 'grefg', 54, 'gergre', 'gdfg', 'grdf', 'gdrfg', 'hfgh', 'fdgdf', 'fghgf', 'nlkl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` bigint(80) NOT NULL,
  `questionname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `questionname`) VALUES
(1, 'Will the user try to achieve the right effect?'),
(2, 'Will the user associate the correct action with the effect that user is trying to achieve?'),
(3, 'Will the user notice that the correct action is available?'),
(4, 'Will the feasible and correct action be made sufficiently evident to the user and do the actions match the intention as stated by the user?'),
(5, 'question1'),
(6, 'question2'),
(7, 'new question 1'),
(8, 'new question2'),
(9, 'Will the feasible and correct action be made sufficiently evident to the user and do the actions match the intention as stated by the user?'),
(10, 'Will the user associate the correct action with the effect that user is trying to achieve?'),
(11, 'Will the user associate the correct action with the effect that user is trying to achieve?'),
(12, 'question1'),
(13, 'question2');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `stepid` bigint(80) NOT NULL,
  `stepname` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`stepid`, `stepname`, `image`) VALUES
(1, 'gerge', 'course_reg.PNG'),
(2, 'gerge', 'course_reg.PNG'),
(3, 'gerge', 'course_reg.PNG'),
(4, 'jgjghj', 'exam_MUI.PNG'),
(5, 'jhbhb', 'for_seminar.PNG'),
(6, 'hkhl', 'exam_MUI.PNG'),
(7, 'kjbkj', 'exam_MUI.PNG'),
(8, 'step1', 'course_reg.PNG'),
(9, '1', 'course_reg.PNG'),
(10, '2', 'course_reg.PNG'),
(11, '3', 'exam_MUI.PNG'),
(12, '4', 'for_seminar.PNG'),
(13, '6', 'IMG_20160629_195933.jpg'),
(14, '7', 'screenshot.PNG'),
(18, '1', 'course_reg.PNG'),
(19, '2', 'exam_MUI.PNG'),
(20, '1', 'course_reg.PNG'),
(21, '1', 'course_reg.PNG'),
(25, '2', 'exam_MUI.PNG'),
(26, '1', 'course_reg.PNG'),
(27, '2', 'exam_MUI.PNG'),
(29, '2', 'exam_MUI.PNG'),
(30, '1', 'course_reg.PNG'),
(31, '4', 'for_seminar.PNG'),
(33, '4', 'for_seminar.PNG'),
(34, 'step1', 'course_reg.PNG'),
(35, 'step2', 'exam_MUI.PNG'),
(36, 'step1', 'course_reg.PNG'),
(37, 'step3', 'for_seminar.PNG'),
(38, 's1', 'exam_MUI.PNG'),
(39, 's2', 'for_seminar.PNG'),
(40, 'me3', 'IMG_20160629_195933.jpg'),
(41, 's1', 'exam_MUI.PNG'),
(42, 'step1', 'course_reg.PNG'),
(43, 'step2', 'exam_MUI.PNG'),
(44, 'step1', 'exam_MUI.PNG'),
(45, 'step1', 'course_reg.PNG'),
(46, 'step2', 'for_seminar.PNG'),
(47, 'step3', 'for_seminar.PNG'),
(48, 'step3', 'for_seminar.PNG'),
(49, 'step4', 'for_seminar.PNG'),
(50, 'step5', 'IMG_20160629_195933.jpg'),
(51, 'step6', 'screenshot.PNG'),
(52, 'step8', 'course_reg.PNG'),
(53, 'step9', 'course_reg.PNG'),
(54, 'step10', 'exam_MUI.PNG'),
(58, 'step10', 'course_reg.PNG'),
(59, 'step1', 'for_seminar.PNG'),
(60, 'step2', 'exam_MUI.PNG'),
(66, 'step1', 'course_reg.PNG'),
(67, 'step2', 'exam_MUI.PNG'),
(80, 'step3', 'course_reg.PNG'),
(82, 'step14', 'exam_MUI.PNG'),
(83, 'step1', 'course_reg.PNG'),
(84, 'step15', 'course_reg.PNG'),
(85, 'step16', 'course_reg.PNG'),
(86, 'step17', 'exam_MUI.PNG'),
(87, 's1', 'course_reg.PNG'),
(88, 's2', 'exam_MUI.PNG'),
(89, 's3', 'exam_MUI.PNG'),
(90, 's3', 'exam_MUI.PNG'),
(91, 's4', 'course_reg.PNG'),
(92, 's5', 'for_seminar.PNG'),
(93, 's4', 'course_reg.PNG'),
(94, 's6', 'for_seminar.PNG'),
(95, 's7', 'exam_MUI.PNG'),
(96, 's8', 'exam_MUI.PNG'),
(97, 's9', 'course_reg.PNG'),
(101, 's4', 'for_seminar.PNG'),
(102, 's5', 'exam_MUI.PNG'),
(108, 's8', 'exam_MUI.PNG'),
(109, 's7', 'course_reg.PNG'),
(110, 's9', 'course_reg.PNG'),
(111, 'step1', 'course_reg.PNG'),
(112, 'step2', 'exam_MUI.PNG'),
(113, 'step1', 'for_seminar.PNG'),
(114, 'step2', 'exam_MUI.PNG'),
(115, 'step3', 'course_reg.PNG'),
(116, 'step4', 'course_reg.PNG'),
(120, 'step5', 'exam_MUI.PNG'),
(121, 'step7', 'course_reg.PNG'),
(122, 'step1', 'course_reg.PNG'),
(123, 's1', 'course_reg.PNG'),
(124, 'step1', 'course_reg.PNG'),
(125, 'step2', 'exam_MUI.PNG'),
(126, 's1', 'course_reg.PNG'),
(127, 's2', 'exam_MUI.PNG'),
(128, 's1', 'course_reg.PNG'),
(129, 's1', 'course_reg.PNG'),
(130, 's2', 'exam_MUI.PNG'),
(131, 's1', 'course_reg.PNG'),
(132, 's1', 'course_reg.PNG'),
(133, 's1', 'exam_MUI.PNG'),
(134, 's2', 'exam_MUI.PNG'),
(135, 'step1', 'exam_MUI.PNG'),
(136, 'step2', 'exam_MUI.PNG'),
(137, 's1', 'IMG_20160629_195933.jpg'),
(138, 's2', 'exam_MUI.PNG'),
(139, 's1', 'Screenshot (1).png'),
(140, 's2', 'Screenshot (1).png'),
(141, 's1', 'Screenshot (1).png'),
(142, 's2', 'Screenshot (1).png'),
(143, 's1', 'course_reg.PNG'),
(144, 's2', 'for_seminar.PNG'),
(145, 's1', 'course_reg.PNG'),
(146, '1', 'for_seminar.PNG'),
(147, '2', 'for_seminar.PNG'),
(148, '3', 'exam_MUI.PNG'),
(149, '1', 'exam_MUI.PNG'),
(150, '1', 'course_reg.PNG'),
(151, '1', 'exam_MUI.PNG'),
(152, '2', 'for_seminar.PNG'),
(153, '3', 'exam_MUI.PNG'),
(154, 'hbhjb', 'exam_MUI.PNG'),
(155, 'jknlk', 'for_seminar.PNG'),
(156, 'gdfg', 'IMG_20160629_195933.jpg'),
(157, 'hgf', 'for_seminar.PNG'),
(158, 'bhmb', 'course_reg.PNG'),
(159, 'jhk', 'for_seminar.PNG'),
(160, 'liujuil', 'for_seminar.PNG'),
(161, 'bjj', 'for_seminar.PNG'),
(162, 'bhmb', 'course_reg.PNG'),
(163, 'bjh', 'for_seminar.PNG'),
(164, 'jghjh', 'for_seminar.PNG'),
(165, 's1', 'course_reg.PNG'),
(166, 's2', 'exam_MUI.PNG'),
(167, 's1', 'course_reg.PNG'),
(168, 's2', 'for_seminar.PNG'),
(169, 's4', 'IMG_20160629_195933.jpg'),
(170, 'gf', 'course_reg.PNG'),
(171, 's11', 'exam_MUI.PNG'),
(172, 'jhj', 'exam_MUI.PNG'),
(173, 'hrtz', 'IMG_20160629_195933.jpg'),
(174, 'gtfg', 'for_seminar.PNG'),
(175, 'grg', 'course_reg.PNG'),
(176, 'kjn', 'exam_MUI.PNG'),
(177, 'm1s1', 'course_reg.PNG'),
(178, 'm1s2', 'for_seminar.PNG'),
(179, 'm1s3', 'for_seminar.PNG'),
(180, 'm1s4', 'IMG_20160629_195933.jpg'),
(181, 'm2s1', 'screenshot.PNG'),
(182, 'm2s2', 'for_seminar.PNG'),
(183, 'm2s3', 'for_seminar.PNG'),
(184, 's1', 'course_reg.PNG'),
(185, 's2', 'exam_MUI.PNG'),
(186, 's2', 'exam_MUI.PNG'),
(187, 's3', 'IMG_20160629_195933.jpg'),
(188, 's4', 'for_seminar.PNG'),
(189, 'u1', 'for_seminar.PNG'),
(190, 'u2', 'for_seminar.PNG'),
(192, 'u1', 'for_seminar.PNG'),
(193, 'u1', 'for_seminar.PNG'),
(194, 'u3', 'IMG_20160629_195933.jpg'),
(195, 'u1', 'for_seminar.PNG'),
(196, 'u3', 'IMG_20160629_195933.jpg'),
(197, 'u2', 'for_seminar.PNG'),
(198, 'u1', 'for_seminar.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `steps_altsteps`
--

CREATE TABLE `steps_altsteps` (
  `stepid` bigint(80) NOT NULL,
  `altstepid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steps_altsteps`
--

INSERT INTO `steps_altsteps` (`stepid`, `altstepid`) VALUES
(66, 10),
(73, 9),
(74, 7),
(75, 8),
(78, 11),
(79, 12),
(79, 13),
(80, 14),
(80, 15),
(85, 16),
(85, 17),
(85, 18),
(87, 19),
(87, 20),
(88, 21),
(88, 22),
(92, 24),
(92, 25),
(93, 26),
(94, 27),
(95, 28),
(96, 29),
(97, 30),
(97, 31),
(98, 32),
(99, 33),
(101, 34),
(102, 35),
(103, 36),
(103, 37),
(104, 38),
(105, 39),
(105, 40),
(108, 41),
(108, 42),
(109, 43),
(110, 44),
(110, 45),
(111, 46),
(111, 47),
(113, 48),
(113, 49),
(130, 50),
(130, 51),
(130, 52),
(130, 53),
(130, 54),
(130, 55),
(132, 56),
(132, 57),
(132, 58),
(132, 59),
(132, 60),
(132, 61),
(132, 62),
(132, 63),
(134, 64),
(134, 65),
(134, 66),
(136, 67),
(136, 68),
(138, 69),
(138, 70),
(140, 71),
(140, 72),
(149, 73),
(149, 74),
(150, 75),
(150, 76),
(152, 77),
(152, 78),
(153, 79),
(153, 80),
(154, 85),
(154, 86),
(155, 81),
(155, 82),
(155, 83),
(155, 84),
(155, 91),
(155, 92),
(156, 87),
(156, 88),
(156, 89),
(156, 90),
(157, 93),
(157, 94),
(166, 97),
(166, 98),
(169, 95),
(169, 96),
(169, 99),
(169, 100),
(178, 101),
(178, 102),
(179, 103),
(179, 104),
(182, 105),
(182, 106),
(186, 117),
(186, 118),
(186, 119),
(186, 120),
(187, 107),
(187, 108),
(187, 111),
(187, 112),
(187, 113),
(187, 114),
(188, 109),
(188, 110),
(188, 115),
(188, 116),
(196, 121),
(196, 122),
(197, 125),
(197, 126),
(198, 123),
(198, 124);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskid` bigint(80) NOT NULL,
  `taskname` varchar(200) NOT NULL,
  `Startimage` varchar(200) NOT NULL,
  `adminid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskid`, `taskname`, `Startimage`, `adminid`) VALUES
(13, 'save a doc', 'course_reg.PNG', 0),
(14, 'save a doc', 'course_reg.PNG', 0),
(15, 'do a method', 'course_reg.PNG', 0),
(16, 'save a doc', 'IMG_20160629_195933.jpg', 0),
(17, 'save a doc', 'course_reg.PNG', 0),
(18, 'all new task', 'for_seminar.PNG', 0),
(19, 'save a doc', 'course_reg.PNG', 1),
(20, 'save a doc', 'course_reg.PNG', 1),
(21, 'save a doc', 'course_reg.PNG', 1),
(22, 'all new task', 'course_reg.PNG', 1),
(23, 'bfghfg', 'exam_MUI.PNG', 1),
(24, 'do a method', 'exam_MUI.PNG', 1),
(25, 'do a method', 'course_reg.PNG', 1),
(26, 'save a doc', 'course_reg.PNG', 1),
(27, 'do a method', 'course_reg.PNG', 1),
(28, 'save a doc', 'course_reg.PNG', 1),
(29, 'do a method', 'exam_MUI.PNG', 1),
(30, 'save a doc', 'exam_MUI.PNG', 1),
(31, 'save a doc', 'exam_MUI.PNG', 1),
(32, 'save a doc', 'course_reg.PNG', 1),
(33, 'save a doc', 'exam_MUI.PNG', 1),
(34, 'save a doc', 'course_reg.PNG', 1),
(35, 'save a doc', 'course_reg.PNG', 1),
(36, 'save a doc', 'exam_MUI.PNG', 1),
(37, 'do a method', 'exam_MUI.PNG', 1),
(38, 'do a method', 'exam_MUI.PNG', 1),
(39, 'do a method', 'course_reg.PNG', 1),
(40, 'do a method', 'exam_MUI.PNG', 1),
(41, 'do a method', 'Screenshot (1).png', 1),
(42, 'do a method', 'Screenshot (1).png', 1),
(43, 'save a doc', 'Screenshot (1).png', 1),
(44, 'do a method', 'exam_MUI.PNG', 1),
(45, 'do a method', 'for_seminar.PNG', 1),
(46, 'all new task', 'for_seminar.PNG', 1),
(47, 'save a doc', 'exam_MUI.PNG', 1),
(48, 'do a method', 'exam_MUI.PNG', 1),
(49, 'save a doc', 'exam_MUI.PNG', 1),
(50, 'save a doc', 'exam_MUI.PNG', 1),
(51, 'do a method', 'exam_MUI.PNG', 1),
(52, 'do a method', 'for_seminar.PNG', 1),
(53, 'do a method', 'for_seminar.PNG', 1),
(54, 'save a doc', 'course_reg.PNG', 1),
(55, 'do a method', 'for_seminar.PNG', 1),
(56, 't1', 'course_reg.PNG', 1),
(57, 'save a doc', 'course_reg.PNG', 1),
(58, 'do a method', 'for_seminar.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_method`
--

CREATE TABLE `task_method` (
  `taskid` bigint(80) NOT NULL,
  `methodid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_method`
--

INSERT INTO `task_method` (`taskid`, `methodid`) VALUES
(13, 21),
(14, 22),
(14, 23),
(15, 24),
(15, 25),
(16, 26),
(16, 27),
(17, 28),
(17, 29),
(18, 30),
(18, 31),
(19, 32),
(19, 33),
(20, 34),
(20, 35),
(21, 36),
(21, 37),
(22, 38),
(22, 39),
(23, 40),
(23, 41),
(24, 42),
(24, 43),
(25, 44),
(25, 45),
(26, 46),
(26, 47),
(27, 48),
(27, 49),
(28, 50),
(29, 51),
(30, 52),
(30, 53),
(31, 54),
(31, 55),
(32, 56),
(32, 57),
(33, 58),
(33, 59),
(34, 60),
(34, 61),
(35, 62),
(35, 63),
(36, 64),
(36, 65),
(37, 66),
(38, 67),
(38, 68),
(39, 69),
(39, 70),
(40, 71),
(40, 72),
(41, 73),
(41, 74),
(42, 75),
(42, 76),
(43, 77),
(43, 78),
(44, 79),
(45, 80),
(46, 81),
(47, 82),
(48, 83),
(48, 84),
(49, 85),
(49, 86),
(50, 87),
(51, 88),
(52, 89),
(53, 90),
(54, 91),
(54, 92),
(55, 93),
(55, 94),
(56, 95),
(56, 96),
(57, 97),
(57, 98),
(58, 99),
(58, 100);

-- --------------------------------------------------------

--
-- Table structure for table `task_persona`
--

CREATE TABLE `task_persona` (
  `taskid` bigint(80) NOT NULL,
  `personaid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_persona`
--

INSERT INTO `task_persona` (`taskid`, `personaid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 1),
(16, 2),
(18, 1),
(18, 2),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `userid` bigint(80) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`userid`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'gfdg', 'hfgvdfd', 'swagathdg088@gmail.com', 'lots', '2ec001fcda7f781cac039579ca1ec170'),
(2, 'bgbgfbfb', 'bgtbb', 'nrd1988@gmail.com', 'nish', '97c9fc8f92fc23d75b60b9fb14e13598');

-- --------------------------------------------------------

--
-- Table structure for table `variantname`
--

CREATE TABLE `variantname` (
  `variantid` bigint(80) NOT NULL,
  `variantname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variantname`
--

INSERT INTO `variantname` (`variantid`, `variantname`) VALUES
(1, 'Traditional Cognitive Walkthrough'),
(2, 'variant 2'),
(3, 'variant 2'),
(4, 'Norman Cognitive Walkthrough'),
(5, 'first variant');

-- --------------------------------------------------------

--
-- Table structure for table `variant_question`
--

CREATE TABLE `variant_question` (
  `variantid` bigint(80) NOT NULL,
  `questionid` bigint(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variant_question`
--

INSERT INTO `variant_question` (`variantid`, `questionid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(4, 11),
(5, 12),
(5, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `altsteps`
--
ALTER TABLE `altsteps`
  ADD PRIMARY KEY (`altstepid`);

--
-- Indexes for table `altsteps_altsubsteps`
--
ALTER TABLE `altsteps_altsubsteps`
  ADD PRIMARY KEY (`altstepid`,`altsubstepid`);

--
-- Indexes for table `altsubsteps`
--
ALTER TABLE `altsubsteps`
  ADD PRIMARY KEY (`altsubstepid`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`methodid`);

--
-- Indexes for table `method_step`
--
ALTER TABLE `method_step`
  ADD PRIMARY KEY (`stepid`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`personaid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`stepid`);

--
-- Indexes for table `steps_altsteps`
--
ALTER TABLE `steps_altsteps`
  ADD PRIMARY KEY (`stepid`,`altstepid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `task_method`
--
ALTER TABLE `task_method`
  ADD PRIMARY KEY (`taskid`,`methodid`);

--
-- Indexes for table `task_persona`
--
ALTER TABLE `task_persona`
  ADD PRIMARY KEY (`taskid`,`personaid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `variantname`
--
ALTER TABLE `variantname`
  ADD PRIMARY KEY (`variantid`);

--
-- Indexes for table `variant_question`
--
ALTER TABLE `variant_question`
  ADD PRIMARY KEY (`variantid`,`questionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adminid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `altsteps`
--
ALTER TABLE `altsteps`
  MODIFY `altstepid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `altsubsteps`
--
ALTER TABLE `altsubsteps`
  MODIFY `altsubstepid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `methodid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `personaid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `stepid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `userid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `variantname`
--
ALTER TABLE `variantname`
  MODIFY `variantid` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
