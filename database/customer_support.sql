-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 08:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1= admin, 2= staff,3= customer',
  `ticket_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_type`, `ticket_id`, `comment`, `date_created`) VALUES
(3, 2, 3, 1, '&lt;p&gt;Sample&amp;nbsp;&lt;/p&gt;', '2020-11-09 15:36:56'),
(4, 1, 1, 1, '&lt;p&gt;Noted&lt;/p&gt;', '2023-05-07 09:36:33'),
(5, 6, 2, 4, '&lt;p&gt;Hello&lt;/p&gt;', '2023-05-18 02:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 3,
  `lock_unlock` varchar(10) NOT NULL DEFAULT 'false',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `user_type`, `lock_unlock`, `date_created`) VALUES
(1, 'John', 'Smith', 'C', '022222222', 'Ashaley Botwe St. Francis Church', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 3, 'false', '2020-11-09 10:24:42'),
(2, 'Claire', 'Blake', 'Cave', '+18456-5455-55', 'Sample address', 'cblake@sample.com', '2e442d9bae67dbe9b4e4eb0ce93c0028', 3, 'false', '2020-11-09 10:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `date_created`) VALUES
(1, 'I.T Department', 'Information technology Department', '2020-11-09 11:43:18'),
(2, 'Sample Department', 'Sample Department', '2020-11-09 11:44:08'),
(21, 'HR Department', 'We are here', '2023-05-13 18:07:41'),
(26, 'Financial Department', 'We ensure your money is safe with us', '2023-05-13 18:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1= admin, 2= staff,3= customer',
  `lock_unlock` varchar(10) NOT NULL DEFAULT 'false',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `department_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `user_type`, `lock_unlock`, `date_created`) VALUES
(2, 21, 'Nathaniel', 'Nkrumah', 'Nightingale', '0248865955', 'Ashaley Botwe St. Francis Church', 'nat@gmail.com', 'e9b59046bfad66983177acea12045cb9', 2, 'false', '2023-05-14 13:13:15'),
(6, 21, 'Bridget', 'Gafa', '', '0545062856', 'Ashaley Botwe St. Francis Church', 'bridget@gmail.com', '8a2808b850d578d17131ea19a958cd7c', 2, 'false', '2023-05-14 14:16:35'),
(7, 1, 'Kwesi', 'Nightingale', '', '0203783920', 'Ashaley Botwe, Agorwu road', 'kwesi@gmail.com', '5d81fe2702ef28a168320c96cb4bfa35', 1, 'false', '2023-05-20 10:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(30) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=Pending,1=on process,2= Closed',
  `priority` varchar(10) NOT NULL,
  `department_id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `staff_id` int(30) NOT NULL,
  `admin_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `status`, `priority`, `department_id`, `customer_id`, `staff_id`, `admin_id`, `date_created`) VALUES
(1, 'Sample ticket for sale', '&lt;h2 style=&quot;text-align: center; font-family: &amp;quot;Source Sans Pro&amp;quot;, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; color: rgb(33, 37, 41);&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;Software Bug&amp;nbsp;&lt;/span&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin accumsan velit, et aliquam mi mollis vitae. Vivamus pellentesque placerat vehicula. Pellentesque vulputate diam nisi, bibendum pharetra lectus ultrices vel. Ut in ipsum tristique, iaculis velit id, convallis justo. Donec aliquam justo quis purus consequat rutrum. Sed sed velit at ante tincidunt dictum id eget ipsum. Proin a tellus felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis sagittis urna nec lorem pharetra, quis commodo libero efficitur. Ut odio lectus, blandit nec dapibus nec, scelerisque a lectus. In hac habitasse platea dictumst.&lt;/span&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;Test&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;sample&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;bug&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;', 1, 'High', 1, 2, 1, 1, '2023-05-20 07:59:57'),
(3, 'Do they really work', '&lt;h2&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;Canned responses get a bad rap. If you&rsquo;ve ever been on the receiving end of one, there&rsquo;s a fair chance that it left you either rolling your eyes or frustrated with its unhelpfulness.\n\nHelpfulness&mdash;that&rsquo;s the make or break word here.\n\nCanned responses can actually provide a whole lot of value for both customers and your support team. The key is to create them thoughtfully so that they do two things:&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt; &lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;\n\n1. Provide accurate, helpful information, and they should do it fast so that you can impress customers with your response time.&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt; &lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;\n2. Offer an easy way for the customer to continue the conversation if the information provided doesn&rsquo;t solve their problem.\nWhen done right, your customers and support team will reap the benefits. Customers will be able to solve issues, which takes the strain off a busy support team that&rsquo;s trying to juggle lots of support requests.&lt;/span&gt;&lt;/h2&gt;', 0, 'Normal', 1, 2, 1, 1, '2023-05-20 08:09:59'),
(5, 'Failed to login', '&lt;p&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-family: &amp;quot;Segoe UI Emoji&amp;quot;; font-size: 18px;&quot;&gt;Lorem Ipsum&lt;/span&gt;&lt;/strong&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Emoji&amp;quot;; font-size: 18px; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 2, 'Highest', 1, 1, 0, 0, '2023-05-20 01:54:43'),
(7, 'Failed to transact', '&lt;h2 style=&quot;text-align: center; &quot;&gt;&lt;span style=&quot;font-family: &amp;quot;Arial Black&amp;quot;; font-size: 18px; text-align: justify;&quot;&gt;&lt;b&gt;&lt;u&gt;Invalid amount&lt;/u&gt;&lt;/b&gt;&lt;/span&gt;&lt;/h2&gt;&lt;h2&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;#x2019;Content here, content here&amp;#x2019;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;#x2019;lorem ipsum&amp;#x2019; will uncover many web sites still in their infancy.&amp;nbsp;&lt;/span&gt;&lt;/h2&gt;', 0, 'Highest', 26, 1, 0, 0, '2023-05-18 03:02:59'),
(15, 'Having issue with the food', '&lt;h2 style=&quot;text-align: center; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);&quot;&gt;&lt;b&gt;&lt;span style=&quot;font-size: 24px; background-color: rgb(255, 0, 0); font-family: &amp;quot;Arial Black&amp;quot;;&quot;&gt;Where can I get some?&lt;/span&gt;&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&rsquo;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;', 0, 'Highest', 21, 1, 0, 0, '2023-05-20 07:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1 = Admin,2=support',
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `role`, `username`, `password`, `date_created`) VALUES
(1, 'Administrator', '', '', 1, 'admin', '0192023a7bbd73250516f069df18b500', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
