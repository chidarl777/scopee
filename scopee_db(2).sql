-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2017 at 12:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scopee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_log`
--

CREATE TABLE `active_log` (
  `ID` bigint(20) NOT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `ACTIVE` varchar(50) NOT NULL DEFAULT 'NO',
  `DATE_ACTIVE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `INACTIVE` varchar(50) NOT NULL DEFAULT 'NO',
  `DATE_INACTIVE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TURNED_OFF` varchar(50) NOT NULL DEFAULT 'NO',
  `DATE_TURNED_OFF` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `COOKIE_VALUE` varchar(200) NOT NULL,
  `COOKIE_DATE` varchar(200) NOT NULL,
  `REMENBER_ME` varchar(40) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='used to save when a user is logged in';

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `removed` varchar(200) NOT NULL DEFAULT 'no',
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ative_sms_plan`
--

CREATE TABLE `ative_sms_plan` (
  `id` bigint(20) NOT NULL,
  `username` varchar(250) NOT NULL,
  `plan` varchar(250) NOT NULL DEFAULT 'no',
  `active` varchar(250) NOT NULL DEFAULT 'no',
  `tracker` varchar(250) NOT NULL,
  `date_active` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `amount_paid` varchar(200) NOT NULL,
  `peecoin_rate` varchar(200) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid` varchar(30) NOT NULL DEFAULT 'yes',
  `tracker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buy_sms_unit`
--

CREATE TABLE `buy_sms_unit` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `amount_paid` bigint(20) NOT NULL,
  `sms_total_unit` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comfirmed` varchar(100) NOT NULL DEFAULT 'NO',
  `unit_remaining` bigint(20) NOT NULL,
  `unit_paid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `removed` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_tbl`
--

CREATE TABLE `chat_tbl` (
  `ID` bigint(20) NOT NULL,
  `CHAT_FROM` varchar(150) NOT NULL,
  `CHAT_TO` varchar(150) NOT NULL,
  `CHAT_CONTENT` text NOT NULL,
  `CHAT_TRACKER` varchar(230) NOT NULL,
  `DATE_SENT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OPENED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_OPENED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(40) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` bigint(20) NOT NULL,
  `COMMENTED_FROM` varchar(70) NOT NULL,
  `COMMENTED_TO` varchar(70) NOT NULL,
  `COMMENT` text NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `OPENED` varchar(20) NOT NULL DEFAULT 'NO',
  `DATE_COMMENTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `COMMENT_TRACKER` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_views`
--

CREATE TABLE `comment_views` (
  `ID` bigint(20) NOT NULL,
  `COMMENT_ID` bigint(20) NOT NULL,
  `COMMENTED_TO` varchar(150) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `POSTED_FROM` varchar(100) NOT NULL,
  `VIEWED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_VIEWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow_worlds`
--

CREATE TABLE `follow_worlds` (
  `ID` bigint(20) NOT NULL,
  `FOLLOWER` varchar(150) NOT NULL,
  `WORLD_ADRESS` varchar(150) NOT NULL,
  `WORLD_ID` bigint(20) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `WORLD_POST_ID` bigint(20) NOT NULL,
  `WORLD_POST_BY` varchar(150) NOT NULL,
  `FOLLOWED` varchar(40) NOT NULL DEFAULT 'NO',
  `DATE_FOLLOWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `UNFOLLOWED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_UNFOLLOWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends_tbl`
--

CREATE TABLE `friends_tbl` (
  `ID` bigint(20) NOT NULL,
  `SENT_FROM` varchar(70) NOT NULL,
  `SENT_TO` varchar(70) NOT NULL,
  `TIME_FRIENDS` time NOT NULL DEFAULT '00:00:00',
  `DATE_FRIENDS` date NOT NULL DEFAULT '0000-00-00',
  `USER_REMOVED` varchar(70) NOT NULL,
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `TIME_REMOVED` time NOT NULL DEFAULT '00:00:00',
  `DATE_REMOVED` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `ID` bigint(20) NOT NULL,
  `REQUEST_FROM` varchar(70) NOT NULL,
  `REQUEST_TO` varchar(70) NOT NULL,
  `TIME_SENT` time NOT NULL DEFAULT '00:00:00',
  `DATE_SENT` date NOT NULL DEFAULT '0000-00-00',
  `ACCEPTED` varchar(30) NOT NULL DEFAULT 'NO',
  `TIME_ACCEPTED` time NOT NULL DEFAULT '00:00:00',
  `DATE_ACCEPTED` date NOT NULL DEFAULT '0000-00-00',
  `IGNORED` varchar(30) NOT NULL DEFAULT 'NO',
  `TIME_IGNORED` time NOT NULL DEFAULT '00:00:00',
  `DATE_IGNORED` date NOT NULL DEFAULT '0000-00-00',
  `CANCELLED` varchar(40) NOT NULL DEFAULT 'NO',
  `TIME_CANCELLED` time NOT NULL DEFAULT '00:00:00',
  `DATE_CANCELLED` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `ID` bigint(20) NOT NULL,
  `LIKED_FROM` varchar(150) NOT NULL,
  `POSTED_FROM` varchar(150) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `CATEGORY` varchar(250) NOT NULL,
  `LIKED` varchar(20) NOT NULL DEFAULT 'NO',
  `DATE_LIKED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `UNLIKED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_UNLIKED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` bigint(20) NOT NULL,
  `MESSAGE_FROM` varchar(70) NOT NULL,
  `MESSAGE_TO` varchar(70) NOT NULL,
  `MESSAGE` text NOT NULL,
  `MESSAGE_TRACKER` varchar(50) NOT NULL,
  `DATE_SENT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OPENED` varchar(20) NOT NULL DEFAULT 'NO',
  `REMOVED` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` bigint(20) NOT NULL,
  `posted_by` varchar(200) NOT NULL,
  `post_tracker` varchar(200) NOT NULL,
  `post_category` varchar(200) NOT NULL,
  `post_category_address` varchar(200) NOT NULL COMMENT 'the world n',
  `post_category_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed` varchar(50) NOT NULL DEFAULT 'NO',
  `date_removed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `posted_by` varchar(200) NOT NULL,
  `posted_to` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `tracker` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `opened` varchar(200) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opened_post`
--

CREATE TABLE `opened_post` (
  `id` bigint(20) NOT NULL,
  `posted_by` varchar(200) NOT NULL,
  `opened_by` varchar(200) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `date_opened` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peecoin_rate`
--

CREATE TABLE `peecoin_rate` (
  `id` bigint(20) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid` varchar(100) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts_tbl`
--

CREATE TABLE `posts_tbl` (
  `ID` bigint(20) NOT NULL,
  `POSTED_FROM` varchar(70) NOT NULL,
  `POST_MSG` text NOT NULL,
  `TIME_POSTED` time NOT NULL DEFAULT '00:00:00',
  `DATE_POSTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OPENED` varchar(30) NOT NULL DEFAULT 'NO',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `POST_TRACKER` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `ID` bigint(20) NOT NULL,
  `POSTED_FROM` varchar(150) NOT NULL,
  `POST_ID` bigint(150) NOT NULL,
  `VIEWED` varchar(20) NOT NULL DEFAULT 'NO',
  `DATE_VIEWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` bigint(20) NOT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `ABOUT_USER` text NOT NULL,
  `MARITAL_STATUS` varchar(70) NOT NULL,
  `EDUCATION` varchar(230) NOT NULL,
  `OCCUPATION` varchar(230) NOT NULL,
  `HOBBY` varchar(230) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `STATE_OF_RESIDENCE` varchar(100) NOT NULL,
  `COUNTRY_OF_RESIDENCE` varchar(100) NOT NULL,
  `STATE_OF_ORIGIN` varchar(100) NOT NULL,
  `COUNTRY_OF_ORIGIN` varchar(100) NOT NULL,
  `COUNTACTS` varchar(230) NOT NULL,
  `DATE_UPDATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share_tbl`
--

CREATE TABLE `share_tbl` (
  `ID` bigint(20) NOT NULL,
  `SHARED_FROM` varchar(150) NOT NULL,
  `POSTED_FROM` varchar(150) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `SHARED_WITH` varchar(100) NOT NULL,
  `SHARED_TO` varchar(200) NOT NULL,
  `DATE_SHARED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skip_add_friend`
--

CREATE TABLE `skip_add_friend` (
  `ID` bigint(20) NOT NULL,
  `USER_FROM` varchar(150) NOT NULL,
  `USER_TO` varchar(150) NOT NULL,
  `TIME_SKIPPED` time NOT NULL DEFAULT '00:00:00',
  `DATE_SKIPPED` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) NOT NULL,
  `username` varchar(250) NOT NULL,
  `active_sms_plan` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_message`
--

CREATE TABLE `sms_message` (
  `ID` bigint(20) NOT NULL,
  `POST_BY` varchar(150) NOT NULL,
  `CATEGORY_ID` bigint(20) NOT NULL,
  `SENDER_ID` varchar(255) NOT NULL,
  `CATEGORY` varchar(250) NOT NULL,
  `SMS_TO` longblob NOT NULL,
  `SMS_MESSAGE` text NOT NULL,
  `DATE_POSTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SAVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_SAVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PUBLISHED` varchar(30) NOT NULL DEFAULT 'NO',
  `POST_TRACKER` varchar(200) NOT NULL,
  `DATE_PUBLISHED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SMS_LENGTH` int(11) NOT NULL,
  `BOOKED` varchar(200) NOT NULL DEFAULT 'NO',
  `DATE_BOOKED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `BOOKED_CANCELLED` varchar(200) NOT NULL,
  `DATE_BOOKED_CANCELLED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SMS_UNIT` int(11) NOT NULL,
  `NO_OF_SEND_TO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_plan`
--

CREATE TABLE `sms_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit_price` int(2) NOT NULL,
  `lowest_range` bigint(20) NOT NULL,
  `highest_range` bigint(20) NOT NULL,
  `unit_range` varchar(200) NOT NULL,
  `removed` varchar(200) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_pics_tbl`
--

CREATE TABLE `uploaded_pics_tbl` (
  `ID` bigint(20) NOT NULL,
  `USER_UPLOADED` varchar(150) NOT NULL,
  `UPLOADED_FILE` varchar(230) NOT NULL,
  `DATE_UPLOADED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(20) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CATEGORY_ID` bigint(20) NOT NULL,
  `CATEGORY` varchar(230) NOT NULL,
  `UPLOADED_TYPE` varchar(230) NOT NULL DEFAULT 'image',
  `TRACKER` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `USER_ID` bigint(20) NOT NULL,
  `FIRST_NAME` varchar(70) NOT NULL,
  `OTHER_NAME` varchar(70) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `GENDER` varchar(20) NOT NULL,
  `DOB_DAY` int(11) NOT NULL,
  `DOB_MONTH` varchar(50) NOT NULL,
  `DOB_YEAR` year(4) NOT NULL,
  `REFERED_BY` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `SIGNUP_TIME` time NOT NULL DEFAULT '00:00:00',
  `SIGNUP_DATE` date NOT NULL DEFAULT '0000-00-00',
  `VER_CODE` bigint(20) NOT NULL,
  `ACCESS_CODE` varchar(50) NOT NULL,
  `REF_CODE` varchar(230) NOT NULL,
  `USER_TRACKER` varchar(230) NOT NULL,
  `ACTIVATED` varchar(20) NOT NULL DEFAULT 'NO',
  `PROFILE_PIC` varchar(90) NOT NULL,
  `PROFILE_BACKGROUND_PIC` varchar(230) NOT NULL,
  `REMOVED` varchar(20) NOT NULL DEFAULT 'NO',
  `ACCEPTED_TERMS_AND_COMDITION` varchar(40) NOT NULL DEFAULT 'YES',
  `ACCEPTED_PRIVACY_POLICY` varchar(40) NOT NULL DEFAULT 'YES',
  `ABOUT_USER` text NOT NULL,
  `OCCUPATION` varchar(230) NOT NULL,
  `MARITAL_STATUS` varchar(100) NOT NULL,
  `EDUCATION` varchar(230) NOT NULL,
  `HOBBY` varchar(230) NOT NULL,
  `PROFESSIONAL_SKILLS` varchar(230) NOT NULL,
  `CONTACTS` varchar(230) NOT NULL,
  `CITY` varchar(150) NOT NULL,
  `STATE_OF_RESIDENCE` varchar(150) NOT NULL,
  `COUNTRY_OF_RESIDENCE` varchar(150) NOT NULL,
  `STATE_OF_ORIGIN` varchar(150) NOT NULL,
  `COUNTRY_OF_ORIGIN` varchar(200) NOT NULL,
  `POST_VIEW` varchar(50) NOT NULL DEFAULT 'Public',
  `PROFILE_VIEW` varchar(50) NOT NULL DEFAULT 'Public',
  `DATE_UPDATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `COMPLETE` varchar(40) NOT NULL DEFAULT 'NO',
  `SMS_UNIT` varchar(200) NOT NULL DEFAULT '0',
  `BANK` varchar(200) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worlds_tbl`
--

CREATE TABLE `worlds_tbl` (
  `ID` bigint(20) NOT NULL,
  `CREATED_BY` varchar(120) NOT NULL,
  `WORLD_NAME` varchar(200) NOT NULL,
  `WORLD_DESCRIPTION` text NOT NULL,
  `WORLD_TAG` text NOT NULL,
  `WORLD_ADRESS` varchar(150) NOT NULL,
  `WORLD_CATEGORY` varchar(150) NOT NULL,
  `SUB_CATEGORY` varchar(120) NOT NULL,
  `AGE_CRITERIA` varchar(70) NOT NULL,
  `WORLD_VIEW` varchar(50) NOT NULL,
  `WORLD_POST` varchar(50) NOT NULL,
  `WORLD_COMMENT` varchar(50) NOT NULL,
  `WORLD_GENDER` varchar(50) NOT NULL,
  `WORLD_BACKGROUND_PIC` varchar(250) NOT NULL,
  `DATE_CREATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `COMPLETED_PROFILE` varchar(40) NOT NULL DEFAULT 'NO',
  `DATE_COMPLETE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DATE_UPDATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `world_comment_views`
--

CREATE TABLE `world_comment_views` (
  `ID` bigint(20) NOT NULL,
  `COMMENT_ID` bigint(20) NOT NULL,
  `COMMENTED_TO` varchar(150) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `POST_BY` varchar(100) NOT NULL,
  `VIEWED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_VIEWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `world_post`
--

CREATE TABLE `world_post` (
  `ID` bigint(20) NOT NULL,
  `POST_BY` varchar(150) NOT NULL,
  `WORLD_ID` bigint(20) NOT NULL,
  `POST_TITLE` varchar(255) NOT NULL,
  `POST_TAG` varchar(250) NOT NULL,
  `POST_SUMMARY` varchar(250) NOT NULL,
  `POST_CONTENT` text CHARACTER SET utf8 NOT NULL,
  `DATE_POSTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SAVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_SAVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PUBLISHED` varchar(30) NOT NULL DEFAULT 'NO',
  `POST_TRACKER` varchar(200) NOT NULL,
  `DATE_PUBLISHED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `world_post_comments`
--

CREATE TABLE `world_post_comments` (
  `ID` bigint(20) NOT NULL,
  `COMMENTED_FROM` varchar(150) NOT NULL,
  `COMMENTED_TO` varchar(120) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `COMMENTS` text NOT NULL,
  `DATE_COMMENTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_REMOVED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `COMMENT_TRACKER` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `world_post_view`
--

CREATE TABLE `world_post_view` (
  `ID` bigint(20) NOT NULL,
  `POST_BY` varchar(150) NOT NULL,
  `POST_ID` bigint(20) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `WORLD_ID` bigint(20) NOT NULL,
  `VIEWED` varchar(30) NOT NULL DEFAULT 'NO',
  `DATE_VIEWED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `w_sports`
--

CREATE TABLE `w_sports` (
  `ID` bigint(20) NOT NULL,
  `USER_NAME` varchar(150) NOT NULL,
  `WORLD_ID` bigint(20) NOT NULL,
  `POST_TITLE` varchar(255) NOT NULL,
  `POST_CONTENT` longblob NOT NULL,
  `TIME_POSTED` time NOT NULL DEFAULT '00:00:00',
  `DATE_POSTED` date NOT NULL DEFAULT '0000-00-00',
  `REMOVED` varchar(30) NOT NULL DEFAULT 'NO',
  `TIME_REMOVED` time NOT NULL DEFAULT '00:00:00',
  `DATE_REMOVED` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_log`
--
ALTER TABLE `active_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_sms_unit`
--
ALTER TABLE `buy_sms_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`,`COMMENT_TRACKER`);

--
-- Indexes for table `comment_views`
--
ALTER TABLE `comment_views`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `follow_worlds`
--
ALTER TABLE `follow_worlds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `friends_tbl`
--
ALTER TABLE `friends_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opened_post`
--
ALTER TABLE `opened_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peecoin_rate`
--
ALTER TABLE `peecoin_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_tbl`
--
ALTER TABLE `posts_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`,`USERNAME`);

--
-- Indexes for table `share_tbl`
--
ALTER TABLE `share_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skip_add_friend`
--
ALTER TABLE `skip_add_friend`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_message`
--
ALTER TABLE `sms_message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms_plan`
--
ALTER TABLE `sms_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_pics_tbl`
--
ALTER TABLE `uploaded_pics_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`USERNAME`);

--
-- Indexes for table `worlds_tbl`
--
ALTER TABLE `worlds_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `world_comment_views`
--
ALTER TABLE `world_comment_views`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `world_post`
--
ALTER TABLE `world_post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `world_post_comments`
--
ALTER TABLE `world_post_comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `world_post_view`
--
ALTER TABLE `world_post_view`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `w_sports`
--
ALTER TABLE `w_sports`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_log`
--
ALTER TABLE `active_log`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buy_sms_unit`
--
ALTER TABLE `buy_sms_unit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `comment_views`
--
ALTER TABLE `comment_views`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow_worlds`
--
ALTER TABLE `follow_worlds`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `friends_tbl`
--
ALTER TABLE `friends_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `opened_post`
--
ALTER TABLE `opened_post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peecoin_rate`
--
ALTER TABLE `peecoin_rate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts_tbl`
--
ALTER TABLE `posts_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share_tbl`
--
ALTER TABLE `share_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skip_add_friend`
--
ALTER TABLE `skip_add_friend`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms_message`
--
ALTER TABLE `sms_message`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sms_plan`
--
ALTER TABLE `sms_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uploaded_pics_tbl`
--
ALTER TABLE `uploaded_pics_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `worlds_tbl`
--
ALTER TABLE `worlds_tbl`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `world_comment_views`
--
ALTER TABLE `world_comment_views`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `world_post`
--
ALTER TABLE `world_post`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `world_post_comments`
--
ALTER TABLE `world_post_comments`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `world_post_view`
--
ALTER TABLE `world_post_view`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `w_sports`
--
ALTER TABLE `w_sports`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
