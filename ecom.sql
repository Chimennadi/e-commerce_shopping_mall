-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 09:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'superadmin', 0, '+2347032281281', 'admin@admin.com', '$2a$12$9r8Uw1J7H4JD0qxV8aprAO1nsJCzNu3oqgx9qXr2WpXDZdlEMfKeq', '', 1, NULL, NULL),
(2, 'Nnadi', 'vendor', 1, '+2347060869085', 'nnadi@admin.com', '$2a$12$9r8Uw1J7H4JD0qxV8aprAO1nsJCzNu3oqgx9qXr2WpXDZdlEMfKeq', '', 1, NULL, '2023-05-20 13:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TL', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GG', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'YT', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Eswatini'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arrow', 1, NULL, '2023-05-21 06:15:25'),
(2, 'Gap', 1, NULL, NULL),
(3, 'Huawei', 1, NULL, '2023-05-21 06:12:30'),
(4, 'Samsung', 1, NULL, NULL),
(5, 'LG', 1, NULL, '2023-05-21 06:09:30'),
(6, 'Lenovo', 1, NULL, '2023-05-21 06:09:32'),
(7, 'MI', 1, NULL, '2023-05-21 06:49:54'),
(9, 'Others', 1, '2023-05-21 06:14:42', '2023-05-21 06:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_discount` double(8,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 1, 'Women', '', 0.00, '', 'women', '', '', '', 1, NULL, NULL),
(3, 0, 1, 'Kids', '', 0.00, '', 'kids', '', '', '', 1, NULL, NULL),
(5, 0, 2, 'Mobiles', '', 10.00, 'This is a mobile category', 'mobiles', 'mobiles', 'mobiles', 'mobiles', 1, '2023-05-19 16:37:06', '2023-05-19 16:37:06'),
(6, 0, 3, 'Cooking gas', '', 5.00, 'This is a kitchen appliances', 'Kitchen', 'kitchen', 'kitchen', 'kitchen', 1, '2023-05-19 16:39:49', '2023-05-19 16:39:49'),
(7, 5, 2, 'Smartphones', '', 10.00, NULL, 'smartphones', 'smartphones', 'smartphones', 'smartphones', 1, '2023-05-20 12:19:58', '2023-05-20 13:58:16'),
(8, 11, 1, 'T-Shirts', '', 0.00, NULL, 'tshirts', 'tshirts', 'tshirts', 'tshirts', 1, '2023-05-20 12:48:00', '2023-05-22 10:30:28'),
(9, 1, 1, 'Shirts', '', 0.00, NULL, 'shirts', 'shirts', 'shirts', 'shirts', 1, '2023-05-20 13:01:56', '2023-05-20 13:07:53'),
(10, 2, 1, 'Denims', '', 0.00, NULL, 'denims', NULL, NULL, NULL, 1, '2023-05-20 13:12:56', '2023-05-20 13:15:11'),
(11, 0, 1, 'Men', '', 0.00, NULL, 'men', NULL, NULL, NULL, 1, '2023-05-22 09:46:31', '2023-05-22 09:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'AS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AU', 'Australia', 1),
(14, 'AT', 'Austria', 1),
(15, 'AZ', 'Azerbaijan', 1),
(16, 'BS', 'Bahamas', 1),
(17, 'BH', 'Bahrain', 1),
(18, 'BD', 'Bangladesh', 1),
(19, 'BB', 'Barbados', 1),
(20, 'BY', 'Belarus', 1),
(21, 'BE', 'Belgium', 1),
(22, 'BZ', 'Belize', 1),
(23, 'BJ', 'Benin', 1),
(24, 'BM', 'Bermuda', 1),
(25, 'BT', 'Bhutan', 1),
(26, 'BO', 'Bolivia', 1),
(27, 'BA', 'Bosnia and Herzegovina', 1),
(28, 'BW', 'Botswana', 1),
(29, 'BV', 'Bouvet Island', 1),
(30, 'BR', 'Brazil', 1),
(31, 'IO', 'British Indian Ocean Territory', 1),
(32, 'BN', 'Brunei Darussalam', 1),
(33, 'BG', 'Bulgaria', 1),
(34, 'BF', 'Burkina Faso', 1),
(35, 'BI', 'Burundi', 1),
(36, 'KH', 'Cambodia', 1),
(37, 'CM', 'Cameroon', 0),
(38, 'CA', 'Canada', 0),
(39, 'CV', 'Cape Verde', 0),
(40, 'KY', 'Cayman Islands', 0),
(41, 'CF', 'Central African Republic', 0),
(42, 'TD', 'Chad', 0),
(43, 'CL', 'Chile', 0),
(44, 'CN', 'China', 0),
(45, 'CX', 'Christmas Island', 0),
(46, 'CC', 'Cocos (Keeling) Islands', 0),
(47, 'CO', 'Colombia', 0),
(48, 'KM', 'Comoros', 0),
(49, 'CD', 'Democratic Republic of the Congo', 0),
(50, 'CG', 'Republic of Congo', 0),
(51, 'CK', 'Cook Islands', 0),
(52, 'CR', 'Costa Rica', 0),
(53, 'HR', 'Croatia (Hrvatska)', 0),
(54, 'CU', 'Cuba', 0),
(55, 'CY', 'Cyprus', 0),
(56, 'CZ', 'Czech Republic', 0),
(57, 'DK', 'Denmark', 0),
(58, 'DJ', 'Djibouti', 0),
(59, 'DM', 'Dominica', 0),
(60, 'DO', 'Dominican Republic', 0),
(61, 'TL', 'East Timor', 0),
(62, 'EC', 'Ecuador', 0),
(63, 'EG', 'Egypt', 0),
(64, 'SV', 'El Salvador', 0),
(65, 'GQ', 'Equatorial Guinea', 0),
(66, 'ER', 'Eritrea', 0),
(67, 'EE', 'Estonia', 0),
(68, 'ET', 'Ethiopia', 0),
(69, 'FK', 'Falkland Islands (Malvinas)', 0),
(70, 'FO', 'Faroe Islands', 0),
(71, 'FJ', 'Fiji', 0),
(72, 'FI', 'Finland', 0),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 0),
(75, 'GF', 'French Guiana', 0),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 0),
(79, 'GM', 'Gambia', 0),
(80, 'GE', 'Georgia', 0),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 0),
(83, 'GI', 'Gibraltar', 0),
(84, 'GG', 'Guernsey', 0),
(85, 'GR', 'Greece', 0),
(86, 'GL', 'Greenland', 0),
(87, 'GD', 'Grenada', 0),
(88, 'GP', 'Guadeloupe', 0),
(89, 'GU', 'Guam', 0),
(90, 'GT', 'Guatemala', 0),
(91, 'GN', 'Guinea', 0),
(92, 'GW', 'Guinea-Bissau', 0),
(93, 'GY', 'Guyana', 0),
(94, 'HT', 'Haiti', 0),
(95, 'HM', 'Heard and Mc Donald Islands', 0),
(96, 'HN', 'Honduras', 0),
(97, 'HK', 'Hong Kong', 0),
(98, 'HU', 'Hungary', 0),
(99, 'IS', 'Iceland', 0),
(100, 'IN', 'India', 0),
(101, 'IM', 'Isle of Man', 0),
(102, 'ID', 'Indonesia', 0),
(103, 'IR', 'Iran (Islamic Republic of)', 0),
(104, 'IQ', 'Iraq', 0),
(105, 'IE', 'Ireland', 0),
(106, 'IL', 'Israel', 0),
(107, 'IT', 'Italy', 0),
(108, 'CI', 'Ivory Coast', 0),
(109, 'JE', 'Jersey', 0),
(110, 'JM', 'Jamaica', 0),
(111, 'JP', 'Japan', 0),
(112, 'JO', 'Jordan', 0),
(113, 'KZ', 'Kazakhstan', 0),
(114, 'KE', 'Kenya', 1),
(115, 'KI', 'Kiribati', 0),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 0),
(117, 'KR', 'Korea, Republic of', 0),
(118, 'XK', 'Kosovo', 0),
(119, 'KW', 'Kuwait', 0),
(120, 'KG', 'Kyrgyzstan', 0),
(121, 'LA', 'Lao People\'s Democratic Republic', 0),
(122, 'LV', 'Latvia', 0),
(123, 'LB', 'Lebanon', 0),
(124, 'LS', 'Lesotho', 0),
(125, 'LR', 'Liberia', 0),
(126, 'LY', 'Libyan Arab Jamahiriya', 0),
(127, 'LI', 'Liechtenstein', 0),
(128, 'LT', 'Lithuania', 0),
(129, 'LU', 'Luxembourg', 0),
(130, 'MO', 'Macau', 0),
(131, 'MK', 'North Macedonia', 0),
(132, 'MG', 'Madagascar', 0),
(133, 'MW', 'Malawi', 0),
(134, 'MY', 'Malaysia', 0),
(135, 'MV', 'Maldives', 0),
(136, 'ML', 'Mali', 0),
(137, 'MT', 'Malta', 0),
(138, 'MH', 'Marshall Islands', 0),
(139, 'MQ', 'Martinique', 0),
(140, 'MR', 'Mauritania', 0),
(141, 'MU', 'Mauritius', 0),
(142, 'YT', 'Mayotte', 0),
(143, 'MX', 'Mexico', 0),
(144, 'FM', 'Micronesia, Federated States of', 0),
(145, 'MD', 'Moldova, Republic of', 0),
(146, 'MC', 'Monaco', 0),
(147, 'MN', 'Mongolia', 0),
(148, 'ME', 'Montenegro', 0),
(149, 'MS', 'Montserrat', 0),
(150, 'MA', 'Morocco', 0),
(151, 'MZ', 'Mozambique', 0),
(152, 'MM', 'Myanmar', 0),
(153, 'NA', 'Namibia', 0),
(154, 'NR', 'Nauru', 0),
(155, 'NP', 'Nepal', 0),
(156, 'NL', 'Netherlands', 0),
(157, 'AN', 'Netherlands Antilles', 0),
(158, 'NC', 'New Caledonia', 0),
(159, 'NZ', 'New Zealand', 0),
(160, 'NI', 'Nicaragua', 0),
(161, 'NE', 'Niger', 0),
(162, 'NG', 'Nigeria', 1),
(163, 'NU', 'Niue', 0),
(164, 'NF', 'Norfolk Island', 0),
(165, 'MP', 'Northern Mariana Islands', 0),
(166, 'NO', 'Norway', 0),
(167, 'OM', 'Oman', 0),
(168, 'PK', 'Pakistan', 0),
(169, 'PW', 'Palau', 0),
(170, 'PS', 'Palestine', 0),
(171, 'PA', 'Panama', 0),
(172, 'PG', 'Papua New Guinea', 0),
(173, 'PY', 'Paraguay', 0),
(174, 'PE', 'Peru', 0),
(175, 'PH', 'Philippines', 0),
(176, 'PN', 'Pitcairn', 0),
(177, 'PL', 'Poland', 0),
(178, 'PT', 'Portugal', 0),
(179, 'PR', 'Puerto Rico', 0),
(180, 'QA', 'Qatar', 0),
(181, 'RE', 'Reunion', 0),
(182, 'RO', 'Romania', 0),
(183, 'RU', 'Russian Federation', 0),
(184, 'RW', 'Rwanda', 0),
(185, 'KN', 'Saint Kitts and Nevis', 0),
(186, 'LC', 'Saint Lucia', 0),
(187, 'VC', 'Saint Vincent and the Grenadines', 0),
(188, 'WS', 'Samoa', 0),
(189, 'SM', 'San Marino', 0),
(190, 'ST', 'Sao Tome and Principe', 0),
(191, 'SA', 'Saudi Arabia', 0),
(192, 'SN', 'Senegal', 0),
(193, 'RS', 'Serbia', 0),
(194, 'SC', 'Seychelles', 0),
(195, 'SL', 'Sierra Leone', 0),
(196, 'SG', 'Singapore', 0),
(197, 'SK', 'Slovakia', 0),
(198, 'SI', 'Slovenia', 0),
(199, 'SB', 'Solomon Islands', 0),
(200, 'SO', 'Somalia', 0),
(201, 'ZA', 'South Africa', 1),
(202, 'GS', 'South Georgia South Sandwich Islands', 0),
(203, 'SS', 'South Sudan', 0),
(204, 'ES', 'Spain', 0),
(205, 'LK', 'Sri Lanka', 0),
(206, 'SH', 'St. Helena', 0),
(207, 'PM', 'St. Pierre and Miquelon', 0),
(208, 'SD', 'Sudan', 0),
(209, 'SR', 'Suriname', 0),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 0),
(211, 'SZ', 'Eswatini', 0),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 0),
(214, 'SY', 'Syrian Arab Republic', 0),
(215, 'TW', 'Taiwan', 0),
(216, 'TJ', 'Tajikistan', 0),
(217, 'TZ', 'Tanzania, United Republic of', 0),
(218, 'TH', 'Thailand', 0),
(219, 'TG', 'Togo', 1),
(220, 'TK', 'Tokelau', 0),
(221, 'TO', 'Tonga', 0),
(222, 'TT', 'Trinidad and Tobago', 0),
(223, 'TN', 'Tunisia', 0),
(224, 'TR', 'Turkey', 1),
(225, 'TM', 'Turkmenistan', 0),
(226, 'TC', 'Turks and Caicos Islands', 0),
(227, 'TV', 'Tuvalu', 0),
(228, 'UG', 'Uganda', 1),
(229, 'UA', 'Ukraine', 0),
(230, 'AE', 'United Arab Emirates', 0),
(231, 'GB', 'United Kingdom', 1),
(232, 'US', 'United States', 1),
(233, 'UM', 'United States minor outlying islands', 0),
(234, 'UY', 'Uruguay', 1),
(235, 'UZ', 'Uzbekistan', 0),
(236, 'VU', 'Vanuatu', 0),
(237, 'VA', 'Vatican City State', 0),
(238, 'VE', 'Venezuela', 0),
(239, 'VN', 'Vietnam', 1),
(240, 'VG', 'Virgin Islands (British)', 0),
(241, 'VI', 'Virgin Islands (U.S.)', 0),
(242, 'WF', 'Wallis and Futuna Islands', 0),
(243, 'EH', 'Western Sahara', 0),
(244, 'YE', 'Yemen', 1),
(245, 'ZM', 'Zambia', 1),
(246, 'ZW', 'Zimbabwe', 1),
(247, '', '', 1);

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_04_30_112010_create_vendors_table', 1),
(26, '2023_04_30_112602_create_admins_table', 1),
(27, '2023_05_04_204211_create_vendors_business_details_table', 1),
(28, '2023_05_04_204819_create_vendors_bank_details', 1),
(29, '2023_05_11_173711_create_sections_table', 1),
(30, '2023_05_14_023205_create_categories_table', 1),
(31, '2023_05_20_150721_create_brands_table', 2),
(32, '2023_05_21_072301_create_products_table', 3),
(33, '2023_05_21_073504_create_products_table', 4);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_image`, `product_video`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 7, 1, 2, 'vendor', 'Redmi Note 11', 'RN11', 'Blue', '15000', 10, '500', '', '', NULL, '', '', '', 'Yes', 1, NULL, NULL),
(2, 1, 6, 2, 0, 1, 'superadmin', 'Red Casual T-Shirt', 'RC001', 'Red', '1000', 20, '200', '', '', NULL, '', '', '', 'Yes', 1, NULL, NULL),
(3, 1, 8, 1, 0, 1, 'superadmin', 'Arrow T-Shirts', 'AT01', 'Red', '1200', 10, '100', '94877.jfif', '61760.webm', 'This is a pure cotton t-shirt', 't-shirt', 'tshirts', 'cotton t-shirt', 'Yes', 1, '2023-05-22 17:03:38', '2023-05-22 18:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 1, NULL, NULL),
(2, 'Electronics', 1, NULL, NULL),
(3, 'Appliances', 1, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nnadi', 'CP-112', 'Ikeja', 'Lagos State', 'Burundi', '112002', '+2347060869085', 'nnadi@admin.com', 1, NULL, '2023-05-20 13:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_bin_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_details`
--

INSERT INTO `vendors_bank_details` (`id`, `vendor_id`, `account_holder_name`, `bank_name`, `account_number`, `bank_bin_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nnadi', 'GTBank', '0613743801', '061374', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_business_details`
--

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `shop_city` varchar(255) NOT NULL,
  `shop_state` varchar(255) NOT NULL,
  `shop_country` varchar(255) NOT NULL,
  `shop_pincode` varchar(255) NOT NULL,
  `shop_mobile` varchar(255) NOT NULL,
  `shop_website` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL,
  `address_proof` varchar(255) NOT NULL,
  `address_proof_image` varchar(255) NOT NULL,
  `business_license_number` varchar(255) NOT NULL,
  `nin_number` varchar(255) NOT NULL,
  `pan_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_business_details`
--

INSERT INTO `vendors_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `address_proof_image`, `business_license_number`, `nin_number`, `pan_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chime Electronics Stores', '1234-SCF', 'Ikeja', 'Lagos State', 'Cambodia', '110003', '+2347060829085', 'nnadi.com', 'nnadi@admin.com', 'Passport', 'test.jpg', '123450000', '324500000', '322000000', NULL, '2023-05-20 13:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
