-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2015 at 11:50 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qb_starter`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedsites`
--

CREATE TABLE IF NOT EXISTS `approvedsites` (
  `id` int(10) NOT NULL,
  `agcode` varchar(28) NOT NULL DEFAULT '',
  `agname` varchar(45) DEFAULT NULL,
  `add1` varchar(45) NOT NULL DEFAULT '',
  `add2` varchar(45) DEFAULT NULL,
  `add3` varchar(45) DEFAULT NULL,
  `city` varchar(45) NOT NULL DEFAULT '',
  `postcode` varchar(5) DEFAULT NULL,
  `state` varchar(45) NOT NULL DEFAULT '',
  `tel` varchar(15) NOT NULL DEFAULT '',
  `fax` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `create_by` varchar(20) NOT NULL DEFAULT '',
  `create_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lst_modif_by` varchar(20) NOT NULL DEFAULT '',
  `lst_modif_dtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvedsites`
--

INSERT INTO `approvedsites` (`id`, `agcode`, `agname`, `add1`, `add2`, `add3`, `city`, `postcode`, `state`, `tel`, `fax`, `email`, `create_by`, `create_dtm`, `lst_modif_by`, `lst_modif_dtm`, `created_at`, `updated_at`) VALUES
(1, '010101', 'KOMMS Sungai Petani', 'No 1, Jalan Haji Tapah,', 'Taman Perindustrian Sungai Petani', '', 'Sungai Petani', '10000', '02', '01-123456789', '01-123456789', 'sungaipetani@komms.com.my', '1', '2015-11-25 02:15:32', '1', '2015-11-24 09:04:43', '2015-11-24 01:04:43', '2015-11-24 01:04:43'),
(4, '009103', 'KOMMS Tampin', 'Lot 30', 'Jalan Tampin 2/1', 'Taman Tampin Jaya', 'Tampin', '34000', '01', '07-1234567', '07-1234567', 'komms_tampin@email.com', '1', '2015-11-25 07:45:03', '1', '2015-11-25 07:45:03', '2015-11-24 19:36:54', '2015-11-24 23:45:03'),
(12, 'assa', 'AssaSA', '', '', '', '', '', '02', '', '', '', '1', '2015-11-27 08:32:05', '1', '2015-11-27 08:32:05', '2015-11-27 00:32:05', '2015-11-27 00:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `approved_sites`
--

CREATE TABLE IF NOT EXISTS `approved_sites` (
  `id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_phone` varchar(30) NOT NULL,
  `site_address` varchar(250) NOT NULL,
  `person_in_charge` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(11, 4, 3),
(12, 3, 4),
(13, 2, 4),
(14, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `candidates_info`
--

CREATE TABLE IF NOT EXISTS `candidates_info` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `candidate_name` varchar(150) NOT NULL,
  `candidate_ic` varchar(30) NOT NULL,
  `candidate_phone` varchar(30) NOT NULL,
  `approved_site_id` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates_info`
--

INSERT INTO `candidates_info` (`id`, `user_id`, `candidate_name`, `candidate_ic`, `candidate_phone`, `approved_site_id`, `updated_at`, `created_at`) VALUES
(1, 1, 'test', '1231323', '', 1, '2015-11-26 08:55:46', '0000-00-00 00:00:00'),
(2, 2, 'testste', '111', '1235445545454', 1, '2015-11-30 06:15:21', '0000-00-00 00:00:00'),
(3, 3, 'sdfdfs', '4444', '123', 12, '2015-11-30 06:15:03', '0000-00-00 00:00:00'),
(4, 4, 'fathur rahman', '1232312312', '', 4, '2015-11-28 19:35:37', '0000-00-00 00:00:00'),
(5, 9, 'ahmad', '1238488888', '01393399933', 0, '2015-11-26 00:56:55', '2015-11-26 00:56:55'),
(6, 8, 'toriko', '123213321', '334343433', 12, '2015-11-29 23:45:11', '2015-11-29 23:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(2, 1, 1, 'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(3, 1, 1, 'Et consul eirmod feugait mel! Te vix iuvaret feugiat repudiandae. Solet dolore lobortis mei te, saepe habemus imperdiet ex vim. Consequat signiferumque per no, ne pri erant vocibus invidunt te.', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(4, 1, 2, 'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(5, 1, 2, 'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(6, 1, 3, 'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.', '2015-11-18 20:15:38', '2015-11-18 20:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_02_05_024934_confide_setup_users_table', 1),
('2013_02_05_043505_create_posts_table', 1),
('2013_02_05_044505_create_comments_table', 1),
('2013_02_08_031702_entrust_setup_tables', 1),
('2013_05_21_024934_entrust_permissions', 1),
('2015_11_18_121815_create_questions_table', 1),
('2015_11_19_070516_add_fields_to_questions_table', 2),
('2015_11_22_023729_add_fields_to_questions_table', 3),
('2015_11_22_040742_add_fields_to_questions_table', 4),
('2015_11_26_031336_create_candidates_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`) VALUES
(1, 'manage_blogs', 'manage blogs'),
(2, 'manage_posts', 'manage posts'),
(3, 'manage_comments', 'manage comments'),
(4, 'manage_users', 'manage users'),
(5, 'manage_roles', 'manage roles'),
(6, 'post_comment', 'post comment'),
(7, 'seat_exam', 'seat exam'),
(8, 'manage_candidate', 'manage candidate'),
(9, 'wait_exam', 'wait exam');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 6, 2),
(8, 7, 3),
(9, 8, 4),
(10, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet', 'lorem-ipsum-dolor-sit-amet', 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?', 'meta_title1', 'meta_description1', 'meta_keywords1', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(2, 1, 'Vivendo suscipiantur vim te vix', 'vivendo-suscipiantur-vim-te-vix', 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?', 'meta_title2', 'meta_description2', 'meta_keywords2', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(3, 1, 'In iisque similique reprimique eum', 'in-iisque-similique-reprimique-eum', 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?', 'meta_title3', 'meta_description3', 'meta_keywords3', '2015-11-18 20:15:38', '2015-11-18 20:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) NOT NULL,
  `question_content` text COLLATE utf8_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correct_option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_content_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_content_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_content_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_content_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_image_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_image_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_image_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_image_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question_content`, `question_image`, `question_language`, `question_section`, `correct_option`, `option_content_1`, `option_content_2`, `option_content_3`, `option_content_4`, `option_image_1`, `option_image_2`, `option_image_3`, `option_image_4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 2, 'This is third question bro kaba sikit gak<br>', '56513eea52e9d6.14963131_nazatv-logo-final.png', 'BI', 'B', 'D', 'Ahmad', 'Ali baba<br>', 'Abu', 'Almari', '', '56513eea534f65.06762803_naza-add-video5.PNG', '', '', '2015-11-21 18:55:30', '2015-11-21 20:04:58', NULL),
(11, 2, 'this is question full of image<br>', '56513632de2f59.01424883_naza-add-video.PNG', 'BI', 'B', 'C', 'option content 1<br>', 'option content 2<br><br>', 'option content 3<br><br>', 'option content 4<br><br>', '56513632df1a87.27977020_naza-add-video1.PNG', '56513632df72c4.12931494_naza-add-video2.PNG', '56513632dfc128.68988229_naza-add-video3.PNG', '56513632e00692.65309410_naza-add-video4.PNG', '2015-11-21 19:27:46', '2015-11-21 19:27:46', NULL),
(12, 2, 'test soft delete<br>', '5651411fc7d718.85150027_subscription_list5.png', 'BM', 'A', 'A', '', '', '', '', '', '', '', '', '2015-11-21 20:14:23', '2015-11-21 20:14:40', '2015-11-21 20:14:40'),
(13, 1, 'Test new file upload with preview<br>', '565bc28ed63455.79527044_Windows-10-Orange-Preview-Wallpaper.jpg', 'BM', 'C', 'C', 'adsdsasda', 'asddsadsa', 'asddsad', 'asddsadas', '', '', '', '', '2015-11-29 19:29:18', '2015-11-29 19:29:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE IF NOT EXISTS `ref` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `desc1` varchar(250) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL,
  `group_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `code`, `desc1`, `value`, `group_type`) VALUES
(1, '01', 'JOHOR', NULL, 6),
(2, '02', 'KEDAH', '', 6),
(3, '03', 'KELANTAN', '', 6),
(4, '04', 'MELAKA', '', 6),
(5, '05', 'NEGERI SEMBILAN', '', 6),
(6, '06', 'PAHANG', '', 6),
(7, '07', 'PULAU PINANG', '', 6),
(8, '08', 'PERAK', '', 6),
(9, '09', 'PERLIS', '', 6),
(10, '10', 'SELANGOR', '', 6),
(11, '11', 'TERENGGANU', '', 6),
(12, '12', 'SABAH', '', 6),
(13, '13', 'SARAWAK', '', 6),
(14, '14', 'WILAYAH PERSEKUTUAN KUALA LUMPUR', '', 6),
(15, '15', 'WILAYAH PERSEKUTUAN LABUAN', '', 6),
(16, '16', 'WILAYAH PERSEKUTUAN PUTRAJAYA', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(2, 'comment', '2015-11-18 20:15:38', '2015-11-18 20:15:38'),
(3, 'supervisor', '2015-11-22 01:59:03', '2015-11-22 01:59:03'),
(4, 'candidate', '2015-11-22 02:17:48', '2015-11-22 02:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(5) NOT NULL,
  `state_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors_info`
--

CREATE TABLE IF NOT EXISTS `supervisors_info` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `approved_site_id` int(10) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `supervisor_ic` varchar(30) NOT NULL,
  `supervisor_phone` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors_info`
--

INSERT INTO `supervisors_info` (`id`, `user_id`, `approved_site_id`, `supervisor_name`, `supervisor_ic`, `supervisor_phone`, `updated_at`, `created_at`) VALUES
(1, 4, 1, 'fathur rahman1', '1235555555', '01234567888', '2015-11-30 22:35:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.org', '$2y$10$WqTOrzQ9RYerEz8zv0Sd0uvcU8y62US4YEQ9jRpkrQIln6/Axz1.G', '93830d788c2def939a62a1acdbc7e592', '824xEYZHAR47alXcgY154YkyywlMK5t8vmyzDETNNGHhYsFuu6Ffur18z5mm', 1, '2015-11-18 20:15:37', '2015-11-30 23:21:15'),
(2, 'user', 'user@example.org', '$2y$10$cHRFxGXBhbX23qtDGlNCouTGd4xSnrJzxy884rTEPfIbYejMC2ULq', '6c617c98147e7bb3b9bdfb1bdb1b5d2b', 'IdPMyZ0jGrsufQ7mh1PHSzsVx4djAIl5bsXEtcgByK3D24lbpJmCelyVCy6I', 1, '2015-11-18 20:15:37', '2015-11-30 23:01:56'),
(3, 'candidate1', 'candidate1@gmail.com', '$2y$10$6ngyh8u5bnvwCIA24lWpXezylhRCX/KRFSBvfnYyA0Z3QfsQE/Sxi', '413e9fcc5b155222c0ae8f4fa04a2d10', NULL, 1, '2015-11-21 06:21:21', '2015-11-21 06:21:21'),
(4, 'integrasolid', 'integrasolid@gmail.com', '$2y$10$/j/UV3uzo0lZVos9EHuEWOQWZAYUoVmd9z1ZNGu4t6jpxbXqCzfyC', '262ab4ef538627e576c5fae04501b7e8', 'okRNEzYgwbUPiiN9hnhr12RStWPxvsewpcfreU94QaPy1KnuYpHtBLD8oEZJ', 1, '2015-11-26 00:43:52', '2015-11-30 23:18:03'),
(8, 'toriko', 'toriko@gmail.com', '$2y$10$g3vVxRljgKptxBERrh3PZebW6SdU6pTIu1LEMIFw7p/LMCmwFwGXK', 'e11ed62a125fec8f217dc16239ec05f7', NULL, 1, '2015-11-29 23:45:11', '2015-11-29 23:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedsites`
--
ALTER TABLE `approvedsites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agcode` (`agcode`);

--
-- Indexes for table `approved_sites`
--
ALTER TABLE `approved_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_user_id_index` (`user_id`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`);

--
-- Indexes for table `candidates_info`
--
ALTER TABLE `candidates_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_display_name_unique` (`display_name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_role_permission_id_role_id_unique` (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors_info`
--
ALTER TABLE `supervisors_info`
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
-- AUTO_INCREMENT for table `approvedsites`
--
ALTER TABLE `approvedsites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `approved_sites`
--
ALTER TABLE `approved_sites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `candidates_info`
--
ALTER TABLE `candidates_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supervisors_info`
--
ALTER TABLE `supervisors_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
