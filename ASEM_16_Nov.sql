-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2019 at 05:26 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ASEM`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_user` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_user`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 8, 'sujan', 'asdasd@gsdsa.com', 'asdsadsadaxsacsac\r\n', 'approved', '2019-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `corner`
--

CREATE TABLE `corner` (
  `ctv_id` int(4) NOT NULL,
  `ctv_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corner`
--

INSERT INTO `corner` (`ctv_id`, `ctv_name`) VALUES
(1, 'Concept and Creations '),
(2, 'Project'),
(3, 'Feedback'),
(5, 'Solutions');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(2) NOT NULL,
  `fac_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`) VALUES
(1, 'BBA'),
(3, 'BIT'),
(10, 'BCA'),
(12, 'BE CIVIL');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(4) NOT NULL,
  `post_cat_id` int(9) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL DEFAULT 'draft ',
  `post_views_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_user`, `post_date`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(8, 1, ' IS it hard to become a Java developer?', 'Aayush', '2019-10-31', 'JAva Softwaev adhsacb', 'Java, Software', 0, 'published', 73),
(12, 3, 'Example of adding Post 2', 'Sanjay', '2019-11-03', '<p>this is just an another ecample of adding post</p>', 'Testing', 0, 'published', 4),
(13, 10, ' IS it hard to become a Java developer?', 'Sanjay', '2019-11-04', '<p><i><strong>asdasjdgsagdjbasbamx</strong></i></p>', 'BCA', 1, 'published', 0),
(14, 1, 'Example of adding Post 4', 'Rabin Bishwokarma', '2019-11-05', '<p>testing new features</p>', 'Testing', 0, 'published', 1),
(18, 1, 'Example of adding Post 4', 'Rabin Bishwokarma', '2019-11-05', '<p>testing new features</p>', 'published', 0, 'published', 1),
(19, 1, 'Example of adding Post', 'JMW', '2019-11-05', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>', 'BBA', 0, 'published', 0),
(20, 1, 'Example of adding Post', 'JMW', '2019-11-05', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>', 'BBA', 0, 'published', 0),
(21, 10, 'Tell me about python programming?', 'Rabin Bishwokarma', '2019-11-06', '<p>goat table tafua xians</p>', 'programming, Python ', 0, 'published', 0),
(22, 1, 'Example of adding Post', 'JMW', '2019-11-06', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>', 'BBA', 0, 'published', 0),
(23, 10, 'Tell me about python programming?', 'Rabin Bishwokarma', '2019-11-06', '<p>goat table tafua xians</p>', 'programming, Python ', 0, 'published', 0),
(24, 1, 'Example of adding Post 4', 'Rabin Bishwokarma', '2019-11-06', '<p>testing new features</p>', 'published', 0, 'published', 0),
(25, 3, 'Example of adding Post 2', 'Sanjay', '2019-11-06', '<p>this is just an another ecample of adding post</p>', 'Testing', 0, 'published', 0),
(26, 12, 'Example of adding Post 10', 'purplestar', '2019-11-06', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>', 'Testing', 0, 'published', 0),
(27, 12, 'Example of adding Post 10', 'purplestar', '2019-11-06', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>', 'Testing', 0, 'published', 0),
(28, 12, 'Example of adding Post 10', 'purplestar', '2019-11-06', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>', 'Testing', 0, 'published', 1),
(29, 3, 'Example of adding Post 2', 'Sanjay', '2019-11-06', '<p>this is just an another ecample of adding post</p>', 'Testing', 0, 'published', 0),
(30, 1, 'Example of adding Post 4', 'Rabin Bishwokarma', '2019-11-06', '<p>testing new features</p>', 'published', 0, 'published', 0),
(33, 12, 'How to build more secure system?', 'Gaurav', '2019-11-10', '<p>this is just ann another eexample of adding post</p>', '', 0, 'published', 0),
(34, 12, 'How to build more secure system?', 'Gaurav', '2019-11-11', '<p>this is just ann another eexample of adding post</p>', '', 0, 'published', 1),
(35, 12, 'What is Lorem Ipsum?', 'Sujan', '2019-11-16', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p>', 'Testing', 0, 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) DEFAULT '$2y$10$usesomecrazystringlol'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(28, 'new', '$2y$12$vzbUjuIeuo4hQqVDJjIke.VeKFeWHl/PcFWnODwf3IQtpVh8t0/FG', 'Testing', '', 'new@gmail.com', NULL, 'admin', '$2y$10$usesomecrazystringlol'),
(29, 'william', '$2y$10$dUjajduwUBugKhoDdbFMVejQ1r3vglUQl5IgKBV6f5T.B4Ick/LIe', 'Rob', 'William', 'robwill@gmail.com', NULL, 'admin', '$2y$10$usesomecrazystringlol'),
(30, 'test12', '$2y$12$UdZMUBN3sUQFx/tMwvSI9eTToUVsSTrkC/DI5k3szQzVkUBmeaS6S', 'Test', 'User', 'testphp@gmail.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(31, 'gauravgurung', '$2y$12$Zw8PFy2Med/Iwn5oB7l2UuoOMaklWgR6TNS2O4bno7h7QSJOtuFo.', 'Gaurav', 'Gurung', 'gauravgurung067@gmail.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(34, 'rabin', '$2y$12$N1j1Ms5InO0y5WxSOZQdH.oqF.YLb6Sd1cHxol7eICDsQoaD6dIS2', 'Rabin', 'Test', 'rabin@gmail.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(35, 'gauravgurung123', '$2y$12$Kq1mz1SGp1uvuFgmB7IumOFgnX2S1T7pKHvCAQmHlvW5ve6lIlDye', 'gaurav', 'Gurung', 'gauravgurung067@test.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(38, 'gauravgurung2054', '$2y$12$TjfBJCj7.wPIlhoKnGUI/eRfc6QE/T98pALlVaUVlg3sAx43p3Cfi', 'gaurav', 'gurung', 'gauravgurung2054@test.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(39, 'gauravgurung054', '$2y$12$tIpZTJukaNu.vt8tfPlbE.1KJuTeHqCB5d4jh/BGmyKsSXDl4mVTW', 'gaurav', 'gurung', 'gauravgurung054@test.com', NULL, 'member', '$2y$10$usesomecrazystringlol'),
(40, 'sujangurung', '$2y$12$kJlCoS0A2kSVX2gi7gKTueLxJYbKgLDT4XlV7RWimVMLyPLqXOfoq', 'Sujan', 'Gurung', 'sujabn123@test.com', NULL, 'member', '$2y$10$usesomecrazystringlol');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(4, '919kdi2nbbv1l6doglmhbvpuja', 1573141124),
(5, 'h2sv8dn5pbcn8iupfgtomeo655', 1573139418),
(6, 'v56df7qj0g0461btuehbhm29h0', 1573869999),
(7, 'qupb4p3kjjv6cn60vu5rdnjige', 1573141349),
(8, 'k5e0q9e3gf8k85bh596uer4kpq', 1573217798),
(9, '20h6l0hit8dh1u6j0t92qjdi2m', 1573228118),
(10, 'f89kmpf0fc3nefcf7bc267mgje', 1573260758),
(11, 'e330lu3s3a0vk8d2e33mmdved7', 1573281230),
(12, 'ma83pgcpdjeq0let3pnfe8cfhu', 1573369127),
(13, 'r0q8hldg7k9rt2e3fs03l0sfgl', 1573390422),
(14, '6bb96v8ug44v9hcfjksbhbsjjr', 1573401635),
(15, 'eij8c97j8mgp8mv3pgqpajs2b9', 1573439620),
(16, 'uhoj0v7i091q4trt1m0k56nr96', 1573440439),
(17, '8tp0cdt204n4p21b1om1a4ug7h', 1573454368),
(18, 't3h2cec5n03c53rhg83sai2ghi', 1573562281),
(19, 'vd8nj3g28i0snph8i4hftj5lk1', 1573565371),
(20, 'c06st8ur9jg5idm6lag1ig3lr3', 1573733921),
(21, 'jr5ech5adc4sdlno2efg4n2s11', 1573802922),
(22, 'vdv46v49ibt5pqbql7ad28hcg1', 1573870592);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `corner`
--
ALTER TABLE `corner`
  ADD PRIMARY KEY (`ctv_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corner`
--
ALTER TABLE `corner`
  MODIFY `ctv_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
