-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2023 at 04:32 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mySite`
--

-- --------------------------------------------------------

--
-- Table structure for table `myFooter`
--

CREATE TABLE `myFooter` (
  `footer_id` smallint(5) UNSIGNED NOT NULL,
  `footer_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `LinkedinLink` varchar(255) DEFAULT NULL,
  `GithubLink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myFooter`
--

INSERT INTO `myFooter` (`footer_id`, `footer_name`, `email`, `phoneNumber`, `LinkedinLink`, `GithubLink`) VALUES
(1, 'Emmanuel Usman', 'mailto:Emmanuelusman2004@gmail.com', '+1 (929) 434-8166', 'https://www.linkedin.com/in/Emmanuelusman2004', 'https://github.com/Emmanuelusman2004');

-- --------------------------------------------------------

--
-- Table structure for table `myLabs`
--

CREATE TABLE `myLabs` (
  `lab_id` smallint(5) UNSIGNED NOT NULL,
  `lab_name` varchar(255) NOT NULL,
  `lab_description` text DEFAULT NULL,
  `lab_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myLabs`
--

INSERT INTO `myLabs` (`lab_id`, `lab_name`, `lab_description`, `lab_link`) VALUES
(1, 'Digital Resume', 'I practiced HTML/CSS in class by developing a digital resume. Below you will find a link to the resume with details about me.', '../Labs/Lab02/ITWS1100-Lab02-HTML/Usmane-EmmanuelUsman-resume.html'),
(2, 'RSS FEED', 'I tried to develop an RSS feed using XML', '../Labs/Lab04XML/ITWS1100-Lab4-RSS&Atom/ITWS1100-Lab4-RSS&Atom/Intro ITWS - Lab 4 - RSS&Atom - TemplateRSS.xml'),
(3, 'ATOM FEED', 'I tried to develop an ATOM feed using XML', '../Labs/Lab04XML/ITWS1100-Lab4-RSS&Atom/ITWS1100-Lab4-RSS&Atom/Intro ITWS - Lab 4 - RSS&Atom - TemplateATOM.xml'),
(4, 'Javascript/HTML form', 'I made a form with JavaScript events', '../Labs/Lab05/lab5.html'),
(5, 'Jquery', 'I did lab06', '../Labs/Lab06/ITWS1100-lab6-jQuery/lab6.html'),
(6, 'Lab08 JSON/Ajax', 'this is where I displayed my labs using JSON and JS', '../Labs/Lab08/ITWS1100-Lab8-JSONAJAX/lab08.html'),
(7, 'Lab09', 'movies...', '../Labs/Lab09/ITWS1100-Lab9-PHP/inclassexample/index.php'),
(8, 'Lab10', 'movies also...', '../Labs/Lab10/lab10.html');

-- --------------------------------------------------------

--
-- Table structure for table `myProjects`
--

CREATE TABLE `myProjects` (
  `project_id` smallint(5) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mySiteUsers`
--

CREATE TABLE `mySiteUsers` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mySiteUsers`
--

INSERT INTO `mySiteUsers` (`user_id`, `username`, `name`, `password`, `type`) VALUES
(2, 'usmane', 'Emmanuel Usman', 'Loveshadow12!', 'admin'),
(3, '', NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myFooter`
--
ALTER TABLE `myFooter`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `myLabs`
--
ALTER TABLE `myLabs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `myProjects`
--
ALTER TABLE `myProjects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `mySiteUsers`
--
ALTER TABLE `mySiteUsers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myFooter`
--
ALTER TABLE `myFooter`
  MODIFY `footer_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myLabs`
--
ALTER TABLE `myLabs`
  MODIFY `lab_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `myProjects`
--
ALTER TABLE `myProjects`
  MODIFY `project_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mySiteUsers`
--
ALTER TABLE `mySiteUsers`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
