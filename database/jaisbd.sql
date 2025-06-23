-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaisbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `image`, `image1`, `created_at`, `updated_at`) VALUES
(3, 'Who we About', '<h2 class=\"heading\">Preparing for your success<br>trusted source in IT services</h2>\r\n<p class=\"mb-0\">Dissuade ecstatic and properly saw entirely sir why laughter endeavor. In on my jointure horrible margaret suitable he followed speedily. Indeed vanity excuse or mr lovers of on. By offer scale an stuff. Blush be sorry no sight sang lose.</p>\r\n<ul class=\"short-feature-list\">\r\n<li>\r\n<h4><a href=\"#\">IT Consultancy</a></h4>\r\n<p>Believe fat how six drawing pursuit minute exact dear open to reaching out.</p>\r\n</li>\r\n<li>\r\n<h4><a href=\"#\">Cyber Security</a></h4>\r\n<p>Same do seen head am part it dear open to travelling so especially prosperous.</p>\r\n</li>\r\n</ul>', '1750571410.jpg', '1750572390.jpg', '2025-06-21 23:50:10', '2025-06-22 02:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `number`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Satisfied Clients', '7777', '1747309114.jpg', 1, '2025-05-15 04:40:41', '2025-05-15 05:38:34'),
(3, 'Finished Projects', '648', '1747309199.jpeg', 1, '2025-05-15 05:39:59', '2025-05-15 05:39:59'),
(4, 'Skilled Experts', '764', '1747309311.jpg', 1, '2025-05-15 05:41:51', '2025-05-15 05:42:14'),
(5, 'Media Posts', '804', '1747309539.jpg', 1, '2025-05-15 05:45:39', '2025-05-15 05:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_detail` text NOT NULL,
  `detail` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `posted_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_detail`, `detail`, `image`, `posted_by`, `posted_on`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Voluptas veritatis a', 'Nesciunt dolor qui', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750651818.jpeg', 'Admin', '2025-06-30 00:09:39', 1, '2025-06-22 22:10:18', '2025-06-22 22:10:18'),
(4, 'Eos fuga Sed fugia', 'Deserunt irure proid', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750651850.jpeg', 'Admin', '2025-06-23 04:10:24', 1, '2025-06-22 22:10:50', '2025-06-22 22:10:50'),
(5, 'Consectetur ut corru', 'Deleniti vero saepe', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750651874.jpeg', 'Admin', '2025-06-23 04:10:53', 1, '2025-06-22 22:11:14', '2025-06-22 22:11:14'),
(6, 'Atque architecto con', 'Fugiat in et qui ill', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750651901.jpeg', 'Admin', '2025-06-23 04:11:17', 1, '2025-06-22 22:11:41', '2025-06-22 22:11:41'),
(7, 'Discovery incommode earnestly commanded mentions.', 'Qui minim fuga Illu', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750651980.jpg', 'Technology', '2025-07-01 04:11:45', 1, '2025-06-22 22:13:00', '2025-06-22 22:13:00'),
(8, 'Everything melancholy uncommonly but solicitude.', 'Non sed accusantium', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750652031.jpg', 'Solution', '2025-07-10 04:13:06', 1, '2025-06-22 22:13:51', '2025-06-22 22:13:51'),
(9, 'Providing top quality cleaning and related services charms.', 'Dignissimos ullamco', '<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.</p>\r\n<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<p>Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>\r\n<h3>Conduct replied off led whether?</h3>\r\n<ul>\r\n<li>Pretty merits waited six</li>\r\n<li>General few civilly amiable pleased account carried.</li>\r\n<li>Continue indulged speaking</li>\r\n<li>Narrow formal length my highly</li>\r\n<li>Occasional pianoforte alteration unaffected impossible</li>\r\n</ul>\r\n<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye. Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Iure, laudantium, tempore. Autem dolore repellat, omnis quam? Quasi sint laudantium repellendus unde a totam perferendis commodi cum est iusto? Minima, laborum.</p>', '1750652071.jpg', 'Analysis', '2025-06-30 04:13:55', 1, '2025-06-22 22:14:31', '2025-06-22 22:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `job_type` enum('Full Time','Part Time','Remote','Contractual') NOT NULL DEFAULT 'Full Time',
  `vacancies` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_applications`
--

CREATE TABLE `career_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chooses`
--

CREATE TABLE `chooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chooses`
--

INSERT INTO `chooses` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Why choose us', 'Our goal is giving the best our customers', '<p>Jennings appetite disposed me an at subjects an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now</p>\r\n<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1750582896.jpg', 1, '2025-06-22 02:57:57', '2025-06-22 03:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sbsc', '1750663239.png', '2025-05-14 04:34:45', '2025-06-23 01:20:39'),
(2, 'DINC', '1750663250.png', '2025-05-14 04:40:05', '2025-06-23 01:20:50'),
(3, 'ISMS', '1750663261.png', '2025-05-14 04:41:58', '2025-06-23 01:21:01'),
(4, 'kanchkura', '1750663271.png', '2025-05-14 04:45:38', '2025-06-23 01:21:11'),
(5, 'mmta', '1750663281.png', '2025-05-14 04:46:47', '2025-06-23 01:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chairman of the Board', '2025-05-20 05:24:01', '2025-05-20 05:24:01'),
(2, 'Delegate of the Board', '2025-05-20 05:24:20', '2025-05-20 05:24:20'),
(3, 'Member of the Board', '2025-05-20 05:24:51', '2025-05-20 05:24:51'),
(4, 'Chief Executive Officer', '2025-05-20 05:25:08', '2025-05-20 05:25:08'),
(5, 'Chief Commercial Officer', '2025-05-20 05:25:19', '2025-05-20 05:25:19'),
(6, 'Chief Product Officer', '2025-05-20 05:26:10', '2025-05-20 05:26:10'),
(7, 'VP of Strategy & Value Proposition', '2025-05-20 05:26:58', '2025-05-20 05:26:58'),
(8, 'EVP, Market DE & Head of Consulting (Revenue)', '2025-05-20 05:27:11', '2025-05-20 05:27:11'),
(9, 'Head of Insurance & Banking (Revenue)', '2025-05-20 05:27:25', '2025-05-20 05:27:25'),
(10, 'Head of Telecom & Technology (Revenue)', '2025-05-20 05:27:46', '2025-05-20 05:27:46'),
(11, 'Head of ORDERMONKEY (Revenue)', '2025-05-20 05:27:57', '2025-05-20 05:27:57'),
(12, 'Head of Sourcing (Revenue)', '2025-05-20 05:28:06', '2025-05-20 05:28:06'),
(13, 'VP of Engineering', '2025-05-20 05:29:27', '2025-05-20 05:29:27'),
(14, 'Head of Genesis X (Operations & Engineering)', '2025-05-20 05:29:35', '2025-05-20 05:29:35'),
(15, 'Head of Telecom & Technology (Engineering)', '2025-05-20 05:29:43', '2025-05-20 05:29:43'),
(16, 'Head of Telecom & Technology (Engineering Excellence)', '2025-05-20 05:29:57', '2025-05-20 05:29:57'),
(17, 'Head of Manufacturing & Engineering (Engineering)', '2025-05-20 05:30:07', '2025-05-20 05:30:07'),
(18, 'Head of Insurance & Banking (Engineering)', '2025-05-20 05:30:16', '2025-05-20 05:30:16'),
(19, 'Member of Board SELISE Bhutan', '2025-05-20 05:30:55', '2025-05-20 05:30:55'),
(20, 'Head of Insurance & Banking (Operations)', '2025-05-20 05:31:06', '2025-05-20 05:31:06'),
(21, 'Head of Telecom & Technology (Operations)', '2025-05-20 05:31:16', '2025-05-20 05:31:16'),
(22, 'Head of Total Experience Lab (Operations)', '2025-05-20 05:31:26', '2025-05-20 05:31:26'),
(23, 'Head of IT Operations (Revenue)', '2025-05-20 05:31:36', '2025-05-20 05:31:36'),
(24, 'Head of Manufacturing & Engineering (Operations)', '2025-05-20 05:31:44', '2025-05-20 05:31:44'),
(25, 'Head of Retail & Services (operations)', '2025-05-20 05:31:56', '2025-05-20 05:31:56'),
(26, 'Business Development Manager (Kosovo)', '2025-05-20 05:32:05', '2025-05-20 05:32:05'),
(27, 'Company Secretary Bangladesh & Bhutan, Head of General Admin', '2025-05-20 05:32:17', '2025-05-20 05:32:17'),
(28, 'Head of Finance & Legal (Operations)', '2025-05-20 05:32:27', '2025-05-20 05:32:27'),
(29, 'Head of Human Resource (Operations)', '2025-05-20 05:32:34', '2025-05-20 05:32:34'),
(30, 'Deputy Head of Marketing (Operations)', '2025-05-20 05:32:45', '2025-05-20 05:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location_map` text DEFAULT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON Data' CHECK (json_valid(`gallery`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Marketing', '2025-05-20 05:15:06', '2025-06-22 05:38:40'),
(4, 'Project Manager', '2025-05-20 05:15:17', '2025-06-22 05:38:56'),
(5, 'Co-Founder', '2025-05-20 05:15:27', '2025-06-22 05:39:12'),
(6, 'Designer', '2025-05-20 05:16:08', '2025-06-22 05:39:26'),
(7, 'Delivery Management', '2025-05-20 05:16:28', '2025-05-20 05:16:28'),
(8, 'Support Functions', '2025-05-20 05:16:47', '2025-05-20 05:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2025_05_12_100114_create_permission_tables', 1),
(13, '2025_05_13_093503_create_sliders_table', 2),
(15, '2025_05_13_114113_create_abouts_table', 3),
(16, '2025_05_14_091324_create_clients_table', 4),
(17, '2025_05_14_111157_create_services_table', 5),
(18, '2025_05_15_051531_create_work_processes_table', 6),
(19, '2025_05_15_090328_create_achievements_table', 7),
(20, '2025_05_20_092543_create_management_table', 8),
(21, '2025_05_20_093959_create_designations_table', 9),
(22, '2025_05_20_094116_create_team_members_table', 10),
(32, '2025_05_25_084233_create_project_categories_table', 11),
(33, '2025_05_25_091117_create_project_infos_table', 12),
(34, '2025_05_26_041217_create_projects_table', 13),
(35, '2025_05_26_043927_create_blogs_table', 14),
(36, '2025_05_26_044115_create_events_table', 15),
(39, '2025_05_26_054748_create_careers_table', 16),
(40, '2025_05_26_072901_create_career_applications_table', 16),
(41, '2025_06_22_035432_create_settings_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `display_name`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Choose List', 'choose-list', 'web', '2025-06-22 08:33:12', '2025-06-22 08:33:12'),
(2, 'Choose Create', 'choose-create', 'web', '2025-06-22 08:33:12', '2025-06-22 08:33:12'),
(3, 'Choose Edit', 'choose-edit', 'web', '2025-06-22 08:33:12', '2025-06-22 08:33:12'),
(4, 'Choose Delete', 'choose-delete', 'web', '2025-06-22 08:33:12', '2025-06-22 08:33:12'),
(19, 'Project Categories List', 'project-categories-list', 'web', '2025-06-14 02:02:33', '2025-06-14 02:02:33'),
(20, 'Project Categories Create', 'project-categories-create', 'web', '2025-06-14 02:02:33', '2025-06-14 02:02:33'),
(21, 'Project Categories Edit', 'project-categories-edit', 'web', '2025-06-14 02:02:33', '2025-06-14 02:02:33'),
(22, 'Project Categories Delete', 'project-categories-delete', 'web', '2025-06-14 02:02:33', '2025-06-14 02:02:33'),
(23, 'Project List', 'project-list', 'web', '2025-06-14 02:02:33', '2025-06-14 02:02:33'),
(24, 'Project Create', 'project-create', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(25, 'Project Edit', 'project-edit', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(26, 'Project Delete', 'project-delete', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(27, 'Work Process List', 'work-process-list', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(28, 'Work Process Create', 'work-process-create', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(29, 'Work Process Edit', 'work-process-edit', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(30, 'Work Process Delete', 'work-process-delete', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(31, 'Project Info List', 'project-info-list', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(32, 'Project Info Create', 'project-info-create', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(33, 'Project Info Edit', 'project-info-edit', 'web', '2025-06-14 02:02:34', '2025-06-14 02:02:34'),
(34, 'Project Info Delete', 'project-info-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(35, 'Team Member List', 'team-member-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(36, 'Team Member Create', 'team-member-create', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(37, 'Team Member Edit', 'team-member-edit', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(38, 'Team Member Delete', 'team-member-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(39, 'Slider List', 'slider-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(40, 'Slider Create', 'slider-create', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(41, 'Slider Edit', 'slider-edit', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(42, 'Slider Delete', 'slider-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(43, 'Service List', 'service-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(44, 'Service Create', 'service-create', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(45, 'Service Edit', 'service-edit', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(46, 'Service Delete', 'service-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(47, 'Role List', 'role-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(48, 'Role Create', 'role-create', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(49, 'Role Edit', 'role-edit', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(50, 'Role Delete', 'role-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(51, 'Management List', 'management-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(52, 'Management Create', 'management-create', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(53, 'Management Edit', 'management-edit', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(54, 'Management Delete', 'management-delete', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(55, 'Event List', 'event-list', 'web', '2025-06-14 02:02:35', '2025-06-14 02:02:35'),
(56, 'Event Create', 'event-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(57, 'Event Edit', 'event-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(58, 'Event Delete', 'event-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(59, 'Designation List', 'designation-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(60, 'Designation Create', 'designation-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(61, 'Designation Edit', 'designation-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(62, 'Designation Delete', 'designation-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(63, 'Client List', 'client-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(64, 'Client Create', 'client-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(65, 'Client Edit', 'client-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(66, 'Client Delete', 'client-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(67, 'Career List', 'career-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(68, 'Career Create', 'career-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(69, 'Career Edit', 'career-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(70, 'Career Delete', 'career-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(71, 'Career Application List', 'career-application-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(72, 'Career Application Create', 'career-application-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(73, 'Career Application Edit', 'career-application-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(74, 'Career Application Delete', 'career-application-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(75, 'Blog List', 'blog-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(76, 'Blog Create', 'blog-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(77, 'Blog Edit', 'blog-edit', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(78, 'Blog Delete', 'blog-delete', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(79, 'Assign Role List', 'assign-role-list', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(80, 'Assign Role Create', 'assign-role-create', 'web', '2025-06-14 02:02:36', '2025-06-14 02:02:36'),
(81, 'Assign Role Edit', 'assign-role-edit', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(82, 'Assign Role Delete', 'assign-role-delete', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(83, 'Achievement List', 'achievement-list', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(84, 'Achievement Create', 'achievement-create', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(85, 'Achievement Edit', 'achievement-edit', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(86, 'Achievement Delete', 'achievement-delete', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(87, 'About List', 'about-list', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(88, 'About Create', 'about-create', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(89, 'About Edit', 'about-edit', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37'),
(90, 'About Delete', 'about-delete', 'web', '2025-06-14 02:02:37', '2025-06-14 02:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_info_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_info_id`, `title`, `subtitle`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 'Ea dolorem nisi enim', 'Know your study before starting', '1750586549.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:02:29', '2025-06-22 04:05:08'),
(4, 7, 'Quia commodo et dolo', 'Excepturi quia volup', '1750586575.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:02:55', '2025-06-22 04:05:20'),
(5, 8, 'Quia et ipsum accus', 'Qui aut do officia e', '1750586746.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:05:46', '2025-06-22 04:05:46'),
(6, 9, 'Assumenda corporis c', 'Voluptatem odit et', '1750586768.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:06:08', '2025-06-22 04:06:08'),
(7, 10, 'Est sequi et culpa', 'Perferendis soluta s', '1750586788.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:06:28', '2025-06-22 04:06:28'),
(8, 11, 'Cumque aut sunt rer', 'Obcaecati cupidatat', '1750586808.jpg', '<p>Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.</p>\r\n<ul class=\"check-list\">\r\n<li>\r\n<h4>Mobile Optimization</h4>\r\n<p>See general few civilly amiable pleased account carried. Excellence projecting is devonsh.</p>\r\n</li>\r\n<li>\r\n<h4>Marketing Automation</h4>\r\n<p>Account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n<li>\r\n<h4>Robust Analytics</h4>\r\n<p>Civilly amiable pleased account carried. Excellence projecting is devonshire dispatched.</p>\r\n</li>\r\n<li>\r\n<h4>Third-party Integrations</h4>\r\n<p>Amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably.</p>\r\n</li>\r\n</ul>\r\n<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her. Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum</p>', 1, '2025-06-22 04:06:48', '2025-06-22 04:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'IT Management', '2025-06-22 03:57:19', '2025-06-22 03:57:19'),
(5, 'Cyber Security', '2025-06-22 03:57:32', '2025-06-22 03:57:32'),
(6, 'Cloud Computing', '2025-06-22 03:57:44', '2025-06-22 03:57:44'),
(7, 'Software Dev', '2025-06-22 03:57:57', '2025-06-22 03:57:57'),
(8, 'Backup & Recovery', '2025-06-22 03:58:05', '2025-06-22 03:58:05'),
(9, 'Social Media App', '2025-06-22 03:58:14', '2025-06-22 03:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_infos`
--

CREATE TABLE `project_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_infos`
--

INSERT INTO `project_infos` (`id`, `name`, `category_id`, `email`, `phone`, `location`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Abra Stephens', 4, 'gopyha@mailinator.com', '+1 242 634-7808', 'Recusandae Rerum de', 1, '2025-06-22 03:59:48', '2025-06-22 03:59:48'),
(7, 'Serina Kemp', 5, 'xytabyqu@mailinator.com', '+1 294 974-3761', 'Laboriosam perspici', 1, '2025-06-22 04:00:02', '2025-06-22 04:00:02'),
(8, 'Selma Mcguire', 6, 'fimenypize@mailinator.com', '+1 899 125-4335', 'Id non eiusmod omnis', 1, '2025-06-22 04:00:16', '2025-06-22 04:00:16'),
(9, 'Fay Merritt', 7, 'jomudynik@mailinator.com', '+1(114 214-6144', 'Do temporibus quo co', 1, '2025-06-22 04:00:31', '2025-06-22 04:00:31'),
(10, 'Nell Bates', 8, 'metyf@mailinator.com', '+1 592 851-2592', 'Sequi ut sed aut opt', 1, '2025-06-22 04:00:45', '2025-06-22 04:00:45'),
(11, 'Aretha Melendez', 9, 'gysodadoq@mailinator.com', '+1 38993-3468', 'Velit voluptatibus i', 1, '2025-06-22 04:01:00', '2025-06-22 04:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'superadmin', 'web', NULL, NULL),
(4, 'admin', 'web', '2025-06-14 03:31:19', '2025-06-14 04:53:24'),
(6, 'user', 'web', '2025-06-20 22:37:03', '2025-06-20 22:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 4),
(2, 2),
(2, 4),
(3, 2),
(3, 4),
(4, 2),
(4, 4),
(19, 2),
(19, 4),
(20, 2),
(20, 4),
(21, 2),
(21, 4),
(22, 2),
(22, 4),
(23, 2),
(23, 4),
(24, 2),
(24, 4),
(25, 2),
(25, 4),
(26, 2),
(26, 4),
(27, 2),
(27, 4),
(28, 2),
(28, 4),
(29, 2),
(29, 4),
(30, 2),
(30, 4),
(31, 2),
(31, 4),
(32, 2),
(32, 4),
(33, 2),
(33, 4),
(34, 2),
(34, 4),
(35, 2),
(35, 4),
(36, 2),
(36, 4),
(37, 2),
(37, 4),
(38, 2),
(38, 4),
(39, 2),
(39, 4),
(39, 6),
(40, 2),
(40, 4),
(41, 2),
(41, 4),
(42, 2),
(42, 4),
(43, 2),
(43, 4),
(44, 2),
(44, 4),
(45, 2),
(45, 4),
(46, 2),
(46, 4),
(47, 2),
(47, 4),
(48, 2),
(48, 4),
(49, 2),
(49, 4),
(50, 2),
(50, 4),
(51, 2),
(51, 4),
(52, 2),
(52, 4),
(53, 2),
(53, 4),
(54, 2),
(54, 4),
(55, 2),
(55, 4),
(56, 2),
(56, 4),
(57, 2),
(57, 4),
(58, 2),
(58, 4),
(59, 2),
(59, 4),
(60, 2),
(60, 4),
(61, 2),
(61, 4),
(62, 2),
(62, 4),
(63, 2),
(63, 4),
(64, 2),
(64, 4),
(65, 2),
(65, 4),
(66, 2),
(66, 4),
(67, 2),
(67, 4),
(68, 2),
(68, 4),
(69, 2),
(69, 4),
(70, 2),
(70, 4),
(71, 2),
(71, 4),
(72, 2),
(72, 4),
(73, 2),
(73, 4),
(74, 2),
(74, 4),
(75, 2),
(75, 4),
(76, 2),
(76, 4),
(77, 2),
(77, 4),
(78, 2),
(78, 4),
(79, 2),
(79, 4),
(80, 2),
(80, 4),
(81, 2),
(81, 4),
(82, 2),
(82, 4),
(83, 2),
(83, 4),
(84, 2),
(84, 4),
(85, 2),
(85, 4),
(86, 2),
(86, 4),
(87, 2),
(87, 4),
(88, 2),
(88, 4),
(89, 2),
(89, 4),
(90, 2),
(90, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `icon`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Data Center', 'A', '<p>We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue cannot foresee. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled data structures manages data in technology.</p>\r\n<div class=\"features\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Included Services</h3>\r\n<ul>\r\n<li>100% Guarantee Cleaning</li>\r\n<li>24/7 Alltime Supporting</li>\r\n<li>Fully Carefull &amp; Safety Guard</li>\r\n<li>Expert Team Members</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Benifits of services</h3>\r\n<ul>\r\n<li>No Hidden Charges</li>\r\n<li>Special Careness Risk Free</li>\r\n<li>Quality Standards</li>\r\n<li>15+ Years Experiences</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>Nam libero tempore, cum soluta nobis est elig endi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repelle ndus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias. consequatur aut perferendis doloribus asperiores repellat. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. pleasures have to be repudiated.</p>', '1750573142.png', '1750573142.jpg', 1, '2025-06-22 00:19:02', '2025-06-22 00:19:02'),
(4, 'Cloud Services', 'Architecto sequi ani', '<p>We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue cannot foresee. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled data structures manages data in technology.</p>\r\n<div class=\"features\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Included Services</h3>\r\n<ul>\r\n<li>100% Guarantee Cleaning</li>\r\n<li>24/7 Alltime Supporting</li>\r\n<li>Fully Carefull &amp; Safety Guard</li>\r\n<li>Expert Team Members</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Benifits of services</h3>\r\n<ul>\r\n<li>No Hidden Charges</li>\r\n<li>Special Careness Risk Free</li>\r\n<li>Quality Standards</li>\r\n<li>15+ Years Experiences</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>Nam libero tempore, cum soluta nobis est elig endi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repelle ndus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias. consequatur aut perferendis doloribus asperiores repellat. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. pleasures have to be repudiated.</p>', '1750573240.jpeg', '1750573240.jpg', 1, '2025-06-22 00:20:40', '2025-06-22 02:01:23'),
(5, 'Software Development', 'In id earum voluptat', '<p>We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue cannot foresee. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled data structures manages data in technology.</p>\r\n<div class=\"features\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Included Services</h3>\r\n<ul>\r\n<li>100% Guarantee Cleaning</li>\r\n<li>24/7 Alltime Supporting</li>\r\n<li>Fully Carefull &amp; Safety Guard</li>\r\n<li>Expert Team Members</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Benifits of services</h3>\r\n<ul>\r\n<li>No Hidden Charges</li>\r\n<li>Special Careness Risk Free</li>\r\n<li>Quality Standards</li>\r\n<li>15+ Years Experiences</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>Nam libero tempore, cum soluta nobis est elig endi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repelle ndus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias. consequatur aut perferendis doloribus asperiores repellat. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. pleasures have to be repudiated.</p>', '1750573313.jpeg', '1750573313.jpg', 1, '2025-06-22 00:21:53', '2025-06-22 02:01:35'),
(6, 'IT Management', 'Quisquam commodo ass', '<p>We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue cannot foresee. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled data structures manages data in technology.</p>\r\n<div class=\"features\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Included Services</h3>\r\n<ul>\r\n<li>100% Guarantee Cleaning</li>\r\n<li>24/7 Alltime Supporting</li>\r\n<li>Fully Carefull &amp; Safety Guard</li>\r\n<li>Expert Team Members</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"content\">\r\n<h3>Benifits of services</h3>\r\n<ul>\r\n<li>No Hidden Charges</li>\r\n<li>Special Careness Risk Free</li>\r\n<li>Quality Standards</li>\r\n<li>15+ Years Experiences</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>Nam libero tempore, cum soluta nobis est elig endi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repelle ndus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias. consequatur aut perferendis doloribus asperiores repellat. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains. pleasures have to be repudiated.</p>', '1750573410.jpeg', '1750573410.jpeg', 1, '2025-06-22 00:23:30', '2025-06-22 02:01:48'),
(7, 'Quisquam itaque et c', 'In id earum voluptat', '<p>as</p>', '1750573449.jpeg', '1750573449.png', 1, '2025-06-22 00:24:09', '2025-06-22 02:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_name`, `value`, `created_at`, `updated_at`) VALUES
('CONTACT_ADDRESS', '2267 Genesee St , Buffalo- NY-14211.', NULL, '2025-06-23 02:56:47'),
('CONTACT_EMAIL', 'info@kdabny.org<br>contact@kdabny.org', NULL, '2025-06-23 02:56:47'),
('CONTACT_GOOGLE_MAP', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.8568138366277!2d-78.79975230000001!3d42.9180607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d30d23b89acc4d%3A0xe10d612b12e87288!2s2267%20Genesee%20St%2C%20Buffalo%2C%20NY%2014211%2C%20USA!5e0!3m2!1sen!2sbd!4v1704691566026!5m2!1sen!2sbd\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2025-06-23 02:56:47'),
('CONTACT_PHONE', 'PH:+1 (347)9356585 <br>PH: +1 (718)5765237', NULL, '2025-06-23 02:56:47'),
('SETTING_ABOUT_US', '<h4 style=\"text-align: center;\"><strong>Khulna Divisional Association of Buffalo, NewYork</strong></h4>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">The Khulna Divisional Association in Buffalo, New York, started in 2023, is a group of families from Khulna now living in Buffalo. They want to bring people together since many families moved to Buffalo from different states but don\'t know each other. Even though they share the same origin, they feel a bit alone without extended family around.</p>\r\n<p style=\"text-align: justify;\">Especially for kids without grandparents and not understanding family relationships, there\'s a sense of solitude. The association\'s goal is to create social bonds, making a supportive community like an extended family.</p>\r\n<p style=\"text-align: justify;\">One big challenge is that younger people don\'t know much about their cultural heritage, traditions, and the importance of respecting elders. The association plans to fix this by providing a space for cultural exchange and learning. They want to teach about their roots, values, customs, and religious practices.</p>\r\n<p style=\"text-align: justify;\">Their main goal is to make a friendly environment where people can connect with their cultural heritage and develop a deep appreciation for it. The association dreams of a lively community where shared experiences and cultural understanding create a strong sense of belonging. Ultimately, they want to represent and preserve the rich cultural heritage of the Khulna division in Buffalo, promoting unity, respect, and love among its members.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', NULL, '2025-06-23 00:18:04'),
('SETTING_PAGE_BANNER', 'banner_1750576158.jpg', NULL, '2025-06-22 01:09:18'),
('SETTING_SITE_DESCRIPTION', '', NULL, NULL),
('SETTING_SITE_FAVICON', 'favicon_1750665245.jpg', NULL, '2025-06-23 01:54:05'),
('SETTING_SITE_LOGO', 'logo_1750669007.jpg', NULL, '2025-06-23 02:56:47'),
('SETTING_SOCIAL_FACEBOOK', 'https://www.facebook.com/share/b5D1wfN6HZv3DPPw/?mibextid=K35XfP', NULL, '2025-06-23 02:56:47'),
('SETTING_SOCIAL_INSTAGRAM', '#', NULL, '2025-06-23 02:56:47'),
('SETTING_SOCIAL_LINKEDIN', '#', NULL, '2025-06-23 02:56:47'),
('SETTING_SOCIAL_TWITTER', '#', NULL, '2025-06-23 02:56:47'),
('SETTING_SOCIAL_YOUTUBE', '#', NULL, '2025-06-23 02:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `sort`, `title`, `subtitle`, `status`, `created_at`, `updated_at`) VALUES
(10, '1750570962.jpg', 1, 'Optimize IT Systems', 'Creating a better Tech solutions', 1, '2025-06-21 23:42:42', '2025-06-21 23:42:42'),
(11, '1750571006.jpg', 2, 'IT Software & Design', 'Transform every technical process', 1, '2025-06-21 23:43:26', '2025-06-21 23:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `management_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `management_id`, `designation_id`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Sporia Deko', 3, 4, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592471.jpg', 1, '2025-06-22 05:41:11', '2025-06-22 05:41:11'),
(6, 'Adhom Jonam', 4, 6, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592525.jpg', 1, '2025-06-22 05:42:05', '2025-06-22 05:42:05'),
(7, 'Sylvester Bailey', 5, 5, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592558.jpg', 1, '2025-06-22 05:42:38', '2025-06-22 05:42:38'),
(8, 'Aline Bowen', 6, 5, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592586.jpg', 1, '2025-06-22 05:43:06', '2025-06-22 05:43:06'),
(9, 'Sonya Santiago', 6, 4, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592608.jpg', 1, '2025-06-22 05:43:28', '2025-06-22 05:43:28'),
(10, 'Halla Hayes', 8, 6, '<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>', '1750592628.jpg', 1, '2025-06-22 05:43:48', '2025-06-22 05:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$sadFdYfLYV2Y5JjXplTtiOjynrD8XoqJvHEqele8CuWT26Pu3asQG', NULL, '2025-05-12 06:03:28', '2025-05-12 06:03:28'),
(2, 'Alamgir Kabir Roni', 'rafiun@gmail.com', NULL, '$2y$12$p8i92lgOOhEZlwzBNM0zgenLggTcEbP2slaJy8f1sn8rQATBPg7Aa', NULL, '2025-06-14 03:05:42', '2025-06-14 03:05:42'),
(3, 'G.M. Zesan', 'zesan.bitscol7767@gmail.com', NULL, '$2y$12$iiSMnrMBr57bWfnL6TaAJut8XoByhsiz2/YtJ3UXJ.Mkl.JY.LYse', NULL, '2025-06-14 03:05:43', '2025-06-14 03:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `work_processes`
--

CREATE TABLE `work_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_processes`
--

INSERT INTO `work_processes` (`id`, `name`, `title`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Choose A Service', 'In a free hour, when our power of choice is untrammeled and', '<p>In a free hour, when our power of choice is untrammeled and</p>', '1747299392.svg', 1, '2025-05-15 02:56:32', '2025-05-15 02:56:32'),
(6, 'Define Requirements', 'In a free hour, when our power of choice is untrammeled and', '<p>In a free hour, when our power of choice is untrammeled and</p>', '1747299422.svg', 1, '2025-05-15 02:57:02', '2025-05-15 02:57:02'),
(7, 'Request A Meeting', 'In a free hour, when our power of choice is untrammeled and', '<p>In a free hour, when our power of choice is untrammeled and</p>', '1747299453.svg', 1, '2025-05-15 02:57:33', '2025-05-15 02:57:33'),
(8, 'Finial Solutio3', 'In a free hour, when our power of choice is untrammeled and', '<p>In a free hour, when our power of choice is untrammeled and</p>', '1747299486.svg', 1, '2025-05-15 02:58:06', '2025-05-15 02:58:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_applications_career_id_foreign` (`career_id`);

--
-- Indexes for table `chooses`
--
ALTER TABLE `chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_project_info_id_foreign` (`project_info_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_infos`
--
ALTER TABLE `project_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_infos_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_members_management_id_foreign` (`management_id`),
  ADD KEY `team_members_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_processes`
--
ALTER TABLE `work_processes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `career_applications`
--
ALTER TABLE `career_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chooses`
--
ALTER TABLE `chooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_infos`
--
ALTER TABLE `project_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_processes`
--
ALTER TABLE `work_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD CONSTRAINT `career_applications_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_info_id_foreign` FOREIGN KEY (`project_info_id`) REFERENCES `project_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_infos`
--
ALTER TABLE `project_infos`
  ADD CONSTRAINT `project_infos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_members_management_id_foreign` FOREIGN KEY (`management_id`) REFERENCES `management` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
