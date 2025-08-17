-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2025 at 10:54 PM
-- Server version: 10.6.22-MariaDB-cll-lve-log
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asem_assem`
--

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `manager` varchar(191) DEFAULT NULL,
  `license_number` int(11) DEFAULT NULL,
  `beneficiaries_count` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `bref` longtext DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `linked_in` varchar(191) DEFAULT NULL,
  `director_name` varchar(191) DEFAULT NULL,
  `director_phone` int(11) DEFAULT NULL,
  `director_email` varchar(191) DEFAULT NULL,
  `coordinator_name` varchar(191) DEFAULT NULL,
  `coordinator_phone` int(11) DEFAULT NULL,
  `coordinator_email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id`, `name`, `manager`, `license_number`, `beneficiaries_count`, `phone`, `address`, `bref`, `facebook`, `twitter`, `linked_in`, `director_name`, `director_phone`, `director_email`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'Kolby Beier', 'Animi alias fugit laborum autem eaque sapiente.', 475, 'American Samoa', '050303030303', '5652 Lulu Prairie', 'Placeat magnam quod hic aliquid voluptatum repudiandae vitae cum.', NULL, 'Quas ducimus praesentium non ipsa ea minima perspiciatis ullam delectus.', 'Nemo animi aperiam consequuntur.', 'Sterling Ondricka', 520505050, 'your.email+fakedata38442@gmail.com', 'Jason Kunde', 523232323, 'your.email+fakedata42033@gmail.com', '2025-07-05 07:12:45', '2025-07-24 02:28:02', '2025-07-24 02:28:02', 3),
(2, 'جمعية رحماء لتنمية الأيتام', NULL, 875, NULL, '0508054149', 'جدة- حي النخيل مبنى الراشد مكتب 19', NULL, NULL, NULL, NULL, 'محمود احمد', 503030303, 'your.email+fakedata98122@gmail.com', 'محمود احمد', 503030303, 'your.email+fakedata98122@gmail.com', '2025-07-14 00:55:10', '2025-07-24 02:27:49', NULL, 5),
(3, 'Kariane Bauch', 'Sint unde hic necessitatibus.', 666, 'British Indian Ocean Territory (Chagos Archipelago)', '257-404-7051', '28063 Herbert Skyway', 'Sequi quo officiis sed non odit.', 'Quam saepe dolores vitae consequatur distinctio distinctio maxime voluptatibus magnam.', 'Optio cum eaque ratione natus tempora.', 'Harum ipsum veritatis minus quidem unde voluptate.', 'Jena Schoen', 306, 'your.email+fakedata37599@gmail.com', 'Janessa Emmerich', 292, 'your.email+fakedata71618@gmail.com', '2025-08-04 23:03:39', '2025-08-04 23:32:32', '2025-08-04 23:32:32', 15),
(4, 'Mohamed Ahmed', 'Mohamed Ahmed', 32131354, '500', '0599004455', 'caire', 'برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجة', NULL, NULL, NULL, 'محمد احمد', 590868540, 'ma0712@gma', 'احمد محمد', 543908765, 'ma712@gmail', '2025-08-05 01:08:40', '2025-08-05 01:08:40', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `short_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'لغة انجليزية', 'أعمال يدوية', '2025-05-25 13:29:32', '2025-07-12 23:40:00', NULL),
(2, 'برمجيات', NULL, '2025-06-01 18:37:09', '2025-06-01 18:37:23', '2025-06-01 18:37:23'),
(3, 'تحصيلي', NULL, '2025-06-01 18:37:44', '2025-07-12 23:39:48', NULL),
(4, 'تدريب', NULL, '2025-07-22 01:10:40', '2025-07-22 01:10:40', NULL),
(5, 'تعليمي', NULL, '2025-07-24 02:49:42', '2025-07-24 02:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `specialization` varchar(191) NOT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `beneficiar_count` int(11) DEFAULT NULL,
  `description` longtext NOT NULL,
  `facebook_link` varchar(191) DEFAULT NULL,
  `twitter_link` varchar(191) DEFAULT NULL,
  `linked_in` varchar(191) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `license_number` varchar(191) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `director_name` varchar(191) DEFAULT NULL,
  `director_phone` int(11) DEFAULT NULL,
  `director_email` varchar(191) DEFAULT NULL,
  `coordinator_name` varchar(191) DEFAULT NULL,
  `coordinator_phone` int(11) DEFAULT NULL,
  `coordinator_email` varchar(191) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `specialization`, `experience_years`, `beneficiar_count`, `description`, `facebook_link`, `twitter_link`, `linked_in`, `location`, `website`, `license_number`, `end_date`, `director_name`, `director_phone`, `director_email`, `coordinator_name`, `coordinator_phone`, `coordinator_email`, `phone`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'Blanditiis odit nam laborum itaque architecto asperiores facilis.', 'Iusto eum nam.', 507, NULL, 'Impedit expedita id in nisi optio culpa.', NULL, NULL, NULL, 'At ipsum voluptatem numquam.', 'https://cpanel.visions-sa.com/cpsess0081068189/frontend/jupiter/index.html?=undefined&login=1&post_login=22418338004202', '394', '2026-04-28', 'Urban Jacobi', 585755566, 'your.email+fakedata20643@gmail.com', 'Stan Goyette', 598747488, 'your.email+fakedata89763@gmail.com', NULL, '2025-07-03 22:33:32', '2025-07-22 01:06:37', '2025-07-22 01:06:37', 2),
(2, 'UBT university', 'لغات وترجمة', 25, 4778, '<p>جامعة الأعمال والتكنولوجيا (UBT) هي مزود تعليم عالي خاص شاب ورائد تم تأسيسه في جدة ، المملكة العربية السعودية ، حيث يقدم ، من خلال كلياته الأربع ، مجموعة من برامج البكالوريوس والدراسات العليا عالية الجودة والمستجيبة للسوق. أحد مقترحات القيمة المميزة ل هو أنها تسعى جاهدة لإعداد الطلاب بالمهارات القابلة للتحويل المطلوبة للتفوق كقادة في الصناعة ورجال أعمال.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 00:53:01', '2025-07-22 00:56:51', NULL, 4),
(3, 'معهد رؤيا البركة', 'تدريب', 7, 1200, '<p><strong>معهد رؤيا البركة للتدريب&nbsp; منشأة خاصة معتمدة من المؤسسة العامة للتدريب التقني تم تأسيسه&nbsp;&nbsp;</strong></p><p><strong>في عام :&nbsp; 26/ 6 / 14439هــ&nbsp; _ 14 / 3 / 2018م</strong></p><p><strong>يقدم المعهد عديد من البرامج في شتى المجالات الادارية والحرفية والتقنية&nbsp; بشقيها التأهيلي والتطويري حضوري وعن بعد ونرص دائما ان تكون&nbsp;دوراتنا منتقاه بعناية لتواكب</strong></p><p><strong>&nbsp;آخر التطورات والمستجدات&nbsp;في التدريب و التعليم وتنمية المهارات</strong></p><p><strong>وبما يتناسب مع مستهدفات رؤية 2030.</strong></p><p>&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-22 00:49:16', '2025-07-22 00:49:16', NULL, 6),
(4, 'مركز جودة السلامة الشاملة', 'تدريب', 18, 4570, '<ul><li>خبرة طويلة الأمد: أكثر من 18 عامًا من التميز في تقديم الحلول المبتكرة.</li><li>معترف بنا عالميًا ومحلياً :خدماتنا وشهاداتنا تحظى بتقدير الهيئات والمؤسسات الحكومية والشركات وأصحاب العمل والمجتمع المهني.</li><li>التزام بالجودة: نضع الابتكار والجودة في صميم كل ما نقوم به.</li><li>شريك موثوق: نقدم حلولًا مخصصة تعكس احتياجات عملائنا بدقة.</li></ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-22 01:05:47', '2025-07-22 01:05:47', NULL, 7),
(5, 'منصة فهيم', 'منصة تعليمية', 8, 500000, '<p>تقديم خدمة الدروس الخصوصية بشكل فردي عن بعد للطلاب من مرحلة الروضة وحتى المرحلة الجامعية عن طريق توفير معلمين ومعلمات أكفاء ومؤهلين لمساعدة الطلاب على التفوق والنجاح</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-24 02:43:34', '2025-07-24 02:43:34', NULL, 8),
(6, 'Mohamed Ahmed', 'برمجة', 5, 100, '<p>برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجة</p>', NULL, NULL, NULL, 'القاهرة', NULL, '321313', '2025-08-05', 'محمد احمد', 567889944, 'ma7700712@gma', 'احمد محمد', 567889944, 'vb712@gmail.com', 599004453, '2025-08-05 01:04:57', '2025-08-05 01:04:57', NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `message` longtext NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohamed Ahmed', 'ma7700712@gmail.com', 'https://www.awesomescreenshot.com/video/42772406?key=905b15e446a2fe7ac08c39986f7aef5fhttps://www.awesomescreenshot.com/video/42772406?key=905b15e446a2fe7ac08c39986f7aef5f', '01140085900', '2025-08-04 22:06:05', '2025-08-04 22:06:23', '2025-08-04 22:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` longtext DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `trainer` varchar(191) DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `duration` varchar(191) NOT NULL,
  `duration_weekly` varchar(191) NOT NULL,
  `avaliable` tinyint(1) DEFAULT 0,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `assistant` varchar(191) DEFAULT NULL,
  `support_value` decimal(15,2) NOT NULL,
  `number_supported` int(11) NOT NULL,
  `location` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `center_id` bigint(20) UNSIGNED DEFAULT NULL,
  `goal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supporter_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `description`, `title`, `short_description`, `type`, `trainer`, `video_url`, `duration`, `duration_weekly`, `avaliable`, `start_at`, `end_at`, `assistant`, `support_value`, `number_supported`, `location`, `url`, `created_at`, `updated_at`, `deleted_at`, `category_id`, `center_id`, `goal_id`, `supporter_id`) VALUES
(1, '<p>\"مبادرة التعليم التنموي\" هي مشروع تعليمي تنموي يهدف إلى معالجة ضعف التحصيل العلمي لدى الطلاب، وتعزيز وعي الأسرة والطالب بأهمية التعليمكوسيلة للخروج من دائرة الفقر وتحسين جودة الحياة. تقدم المبادرة محتوى تعليمي متكامل عن بعد باستخدام منصة إلكترونية ذكية وتفاعلية، وتستهدف تطوير نواتج التعلم لدى الطلاب، وغرس قيم الاجتهاد والمثابرة.</p><p>الفئة المستفيدة:<br>- الطلاب المستفيدين من الجمعية من المرحلة الابتدائية وحتى الجامعية.<br>- الطلاب الذين يعانون من تدنٍ في المستوى الدراسي أو ضعف المهارات التعليمية.<br><br>الخدمات المقدمة:</p><p>- جلسات إرشاد لتعزيز الدافعية والإقبال على التعليم.</p><p>- دروس تقوية فردية عن بعد في مختلف مواد التعليم العام والجامعي.</p><p>- برامج تأهيلية لاختبارات القدرات والتحصيلي.</p><p>- بناء المهارات الحياتية والقيمية.</p>', 'مبادرة التعليم التنموي', 'مبادرة التعليم التنموي\" هي مشروع تعليمي تنموي يهدف إلى معالجة ضعف التحصيل العلمي لدى الطلاب، وتعزيز وعي الأسرة والطالب بأهمية التعليم كوسيلة للخروج من دائرة الفقر وتحسين جودة الحياة. تقدم المبادرة محتوى تعليمي متكامل عن بعد باستخدام منصة إلكترونية ذكية وتفاعلية، وتستهدف تطوير نواتج التعلم لدى الطلاب، وغرس قيم الاجتهاد والمثابرة.', 'blended', 'جمعية عاصم', 'https://www.youtube.com/watch?v=_sI_Ps7JSEk', '6 أشهر', '0', 1, '2025-09-01 00:00:00', '2026-01-31 00:00:00', 'جمعية عاصم', 0.00, 5, 'السعودية', NULL, '2025-05-25 13:35:25', '2025-08-05 00:04:30', NULL, 5, 3, 1, 2),
(2, '<p>هي مبادرة تعليمية تهدف الى رفع مستوى إتقان اللغة الانجليزية لدى فئة معينة من المجتمع</p>', 'خطوة نحو تعلم اللغة الانجليزية', 'هي مبادرة تعليمية تهدف الى رفع مستوى إتقان اللغة الانجليزية لدى فئة معينة من المجتمع', 'blended', NULL, '-', '180', '0', 1, '2025-08-01 00:00:00', '2025-12-31 00:00:00', NULL, 0.00, 50, NULL, NULL, '2025-05-31 20:12:01', '2025-08-03 03:31:27', '2025-08-03 03:31:27', 1, 1, NULL, NULL),
(3, '<figure class=\"table\"><table><tbody><tr><td>هي دورة تعليمية تهدف الى رفع مستوى إتقان اللغة الانجليزية لدى فئة معينة من المجتمع</td><td>&nbsp;</td></tr></tbody></table></figure>', 'دورة خطوة نحو تعلم اللغة الانجليزية', 'هي دورة تعليمية تهدف الى رفع مستوى إتقان اللغة الانجليزية لدى فئة معينة من المجتمع', 'offline', 'جمعية عاصم', '<iframe src=\"https://drive.google.com/file/d/1CEe6FGnOKeLCOz1rKDpBIrld03-7u_jm/preview\" width=\"640\" height=\"480\" allow=\"autoplay\"></iframe>', 'شهر', '2', 1, '2025-08-01 00:31:15', '2025-09-01 00:31:20', 'جمعية عاصم', 0.00, 50, 'السعودية', NULL, '2025-07-27 13:32:31', '2025-08-03 02:42:57', NULL, 1, 2, 1, 2),
(4, '<p>دورة تدريبية لتعليم وتأهيل امهات الايتام على الخياطة</p>', 'دورة الخياطة', 'دورة تدريبية لتعليم وتأهيل امهات الايتام على الخياطة', 'offline', 'جمعية عاصم', '<iframe src=\"https://drive.google.com/file/d/1LvLkXswrlTT0KPhKmtO0P-hZEjhfpt5N/preview\" width=\"640\" height=\"480\" allow=\"autoplay\"></iframe>', '4 أشهر', '2', 1, '2025-08-01 00:35:40', '2025-12-01 00:35:43', 'جمعية عاصم', 0.00, 50, 'السعودية', NULL, '2025-07-27 13:37:47', '2025-08-03 02:30:32', NULL, 4, 3, 1, 2),
(5, '<p>دورة تدريبية لتعليم امهات الايتام اساسيات المكياج</p>', 'دورة المكياج', NULL, 'offline', 'جمعية عاصم', '<iframe src=\"https://drive.google.com/file/d/1mFdVfUocPmc8xflwwHsF-PHSiPOKZKNt/preview\" width=\"640\" height=\"480\" allow=\"autoplay\"></iframe>', 'شهر', '2', 0, '2025-08-01 00:44:02', '2025-09-01 00:44:05', 'جمعية عاصم', 0.00, 50, 'السعودية', NULL, '2025-07-27 13:45:33', '2025-08-03 02:06:07', '2025-08-03 02:06:07', 4, 3, 1, 1),
(6, '<p>&nbsp;دورة تدريبية لتعليم امهات الايتام اساسيات المكياج</p>', 'دورة المكياج', 'دورة تدريبية لتعليم امهات الايتام اساسيات المكياج', 'offline', 'جمعية عاصم', NULL, 'شهر', '2', 1, '2025-08-05 13:32:27', '2025-09-05 13:32:32', 'جمعية عاصم', 1.00, 20, 'السعودية', NULL, '2025-08-03 02:32:59', '2025-08-03 02:40:00', NULL, 4, 3, 1, 2),
(7, '<p>dsfdsafadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa fadads dsdsa fdsfa&nbsp;</p>', 'test er', 'fadads dsdsa fdsfa', 'online', 'mohamed', 'https://www.youtube.com/embed/I6JcSGaZvzo', '20', '4', 1, '2025-08-04 20:48:45', '2025-09-01 20:48:48', 'ahmed', 20.00, 20, 'القاهرة', 'https://www.youtube.com/embed/mP5ro6dduKA', '2025-08-04 21:49:33', '2025-08-04 21:53:27', '2025-08-04 21:53:27', 1, 3, 1, 1),
(8, '<p>برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجة</p>', 'tretre', 'برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجةبرمجة برمجةبرمجةبرمجة برمجة برمجة برمجة برمجة', 'online', 'mohamed', 'https://www.youtube.com/watch?v=zE7nkWmp4eE&list=RDzE7nkWmp4eE&start_radio=1', '20', '3', 1, '2025-08-05 00:12:14', '2025-08-25 00:12:16', 'ahmed', 23.00, 323, 'القاهرة', 'https://www.youtube.com/embed/mP5ro6dduKA', '2025-08-05 01:13:55', '2025-08-05 01:25:21', NULL, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_attendances`
--

CREATE TABLE `course_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_attendances`
--

INSERT INTO `course_attendances` (`id`, `course_id`, `course_student_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2025-07-06', '2025-07-06 06:13:45', '2025-07-06 06:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `course_requests`
--

CREATE TABLE `course_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `association_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_requests`
--

INSERT INTO `course_requests` (`id`, `association_id`, `course_id`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(18, 1, 1, 'approved', NULL, '2025-07-06 04:22:56', '2025-07-06 05:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `identity_num` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `registered` varchar(191) DEFAULT NULL,
  `certificate` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `relevance` varchar(191) DEFAULT NULL,
  `attend_course` varchar(191) DEFAULT NULL,
  `course_name` varchar(191) DEFAULT NULL,
  `course_trainer` varchar(191) DEFAULT NULL,
  `transportaion` varchar(191) DEFAULT NULL,
  `prev_exper` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `request_certificate` tinyint(4) NOT NULL DEFAULT 0,
  `email_certificate` varchar(191) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `courses_before` text DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `association_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `name`, `email`, `identity_num`, `phone_number`, `date_of_birth`, `registered`, `certificate`, `description`, `relevance`, `attend_course`, `course_name`, `course_trainer`, `transportaion`, `prev_exper`, `address`, `request_certificate`, `email_certificate`, `approved`, `courses_before`, `course_id`, `association_id`, `course_request_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محمد القحطاني', 'm.qhtani@example.com', '1023456789', '0501234567', '1990-01-01', 'yes', 'no', 'خريج جامعي', 'مطابق', '0', NULL, NULL, 'يوجد', 'خبرة في مجال التدريب', 'الرياض، السعودية', 1, 'm.qhtani@example.com', 0, 'نعم، دورة قيادة', 2, 1, NULL, '2025-07-06 03:56:21', '2025-07-06 03:56:21', NULL),
(2, 'سارة العتيبي', 's.otaibi@example.com', '1098765432', '0559876543', '1995-05-12', 'no', 'yes', 'طالبة جامعية', 'غير مطابق', '0', NULL, NULL, 'لا يوجد', 'بدون خبرة', 'جدة، السعودية', 0, 's.otaibi@example.com', 0, 'لا', 2, 1, NULL, '2025-07-06 03:56:21', '2025-07-06 03:56:21', NULL),
(3, 'أحمد محمد', 'ahmed@example.com', '1234567890', '0551234567', '1990-01-01', 'yes', 'no', 'مهتم بالدورة', 'مناسب', '0', NULL, NULL, 'yes', 'نعم لدي خبرة', 'الرياض', 1, 'ahmed@example.com', 1, 'دورة سابقة', 1, 1, 18, '2025-07-06 04:22:56', '2025-07-06 05:28:52', NULL),
(4, 'سارة علي', 'sara@example.com', '0987654321', '0557654321', '1992-05-10', 'no', 'yes', 'طالبة جامعية', 'مرتبط جزئياً', '0', NULL, NULL, 'no', 'خبرة بسيطة', 'جدة', 0, 'sara@example.com', 1, NULL, 1, 1, 18, '2025-07-06 04:22:56', '2025-07-06 05:28:52', NULL),
(5, 'أحمد محمد', 'ahmed@example.com', '1234567890', '0551234567', '1990-01-01', 'yes', 'no', 'مهتم بالدورة', 'مناسب', '0', NULL, NULL, 'yes', 'نعم لدي خبرة', 'الرياض', 1, 'ahmed@example.com', 1, NULL, 1, 1, 18, '2025-07-06 04:30:27', '2025-07-06 05:28:52', NULL),
(6, 'سارة علي', 'sara@example.com', '0987654321', '0557654321', '1992-05-10', 'no', 'yes', 'طالبة جامعية', 'مرتبط جزئياً', '0', NULL, NULL, 'no', 'خبرة بسيطة', 'جدة', 0, 'sara@example.com', 1, NULL, 1, 1, 18, '2025-07-06 04:30:27', '2025-07-06 05:28:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `curricula`
--

CREATE TABLE `curricula` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curricula`
--

INSERT INTO `curricula` (`id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`, `course_id`) VALUES
(1, 'ffdaf fdafd', '<p>dafsda</p>', '2025-08-04 21:53:57', '2025-08-04 21:54:36', '2025-08-04 21:54:36', 4),
(2, 'rereaw', '<p>fdSfdsas</p>', '2025-08-04 21:56:16', '2025-08-04 21:56:25', '2025-08-04 21:56:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(2, 'Mohamed Ahmed', 'رئيس', '2025-08-04 22:07:11', '2025-08-04 22:07:11'),
(3, 'Mohamed Ahmed', 'رئيس', '2025-08-05 01:23:03', '2025-08-05 01:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'تأهيل وتمكين الأيتام', '<p>تأهيل وتمكين الأيتام</p>', '2025-07-24 03:43:10', '2025-07-24 03:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `hawkam_categories`
--

CREATE TABLE `hawkam_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hawkmas`
--

CREATE TABLE `hawkmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `mime_type` varchar(191) DEFAULT NULL,
  `disk` varchar(191) NOT NULL,
  `conversions_disk` varchar(191) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Center', 1, 'cbb8b33a-cdf8-4d2c-a935-69452d24bc64', 'logo', '6833f20022961_center05 (1)', '6833f20022961_center05-(1).png', 'image/png', 'public', 'public', 12683, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-25 12:45:56', '2025-05-25 12:45:56'),
(3, 'App\\Models\\Center', 1, '44c9e4a3-69fa-40bc-be39-4bad5578e872', 'image', '6833f1c49cc6b_center03-big', '6833f1c49cc6b_center03-big.png', 'image/png', 'public', 'public', 19502, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-05-25 12:45:56', '2025-05-25 12:45:56'),
(4, 'App\\Models\\Center', 2, '64d95a28-dd7c-4a98-82df-91f504f06505', 'logo', '6833f3e81d5e3_center05 (1)', '6833f3e81d5e3_center05-(1).png', 'image/png', 'public', 'public', 12683, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-25 12:54:46', '2025-05-25 12:54:46'),
(6, 'App\\Models\\Partner', 1, 'a269ecfc-26e6-403d-940d-ad9385aa51b9', 'image', '6833f582972f3_brand-1-4', '6833f582972f3_brand-1-4.png', 'image/png', 'public', 'public', 10261, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-25 13:01:05', '2025-05-25 13:01:05'),
(8, 'App\\Models\\Association', 1, '9e2a798b-b9be-499a-bb9f-2e7d8b70b167', 'logo', 'brand-1-4', 'brand-1-4.png', 'image/png', 'public', 'public', 12913, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-25 17:26:16', '2025-05-25 17:26:16'),
(10, 'App\\Models\\Association', 2, 'f8556421-bbcd-4cd5-aa1c-4be774dde202', 'logo', 'brand-1-4', 'brand-1-4.png', 'image/png', 'public', 'public', 12913, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-25 17:44:12', '2025-05-25 17:44:12'),
(14, 'App\\Models\\Association', 4, '5e17a846-6306-4c9e-b303-4d437761e1bf', 'logo', '683c30488656c_about1', '683c30488656c_about1.png', 'image/png', 'public', 'public', 321975, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-31 19:07:21', '2025-05-31 19:07:21'),
(15, 'App\\Models\\Course', 2, 'f59319a7-5548-4a28-a615-83df7225243f', 'photo', '683c423339f5d_course-1-1', '683c423339f5d_course-1-1.png', 'image/png', 'public', 'public', 216651, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-05-31 20:12:02', '2025-05-31 20:12:02'),
(16, 'App\\Models\\Course', 2, 'f5203b04-f480-4d7a-a139-a4bca56267ef', 'inside_image', '683c43379a0f1_course-details-1', '683c43379a0f1_course-details-1.jpg', 'image/jpeg', 'public', 'public', 202449, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-05-31 20:12:02', '2025-05-31 20:12:02'),
(17, 'App\\Models\\Course', 2, 'fbf553e5-0dd2-4883-87e2-7fb76991bc3e', 'video_background', '683c436d487a7_course-1-4', '683c436d487a7_course-1-4.png', 'image/png', 'public', 'public', 197116, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 3, '2025-05-31 20:12:02', '2025-05-31 20:12:02'),
(20, 'App\\Models\\Hawkma', 1, 'b5436685-03cf-4194-aacb-b901b38baaeb', 'file', '683e32b8488bb_slide03', '683e32b8488bb_slide03.png', 'image/png', 'public', 'public', 690362, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:24:44', '2025-06-02 07:24:44'),
(21, 'App\\Models\\Hawkma', 2, '73a1f671-5ff5-4f46-b15d-fdbee4fa1595', 'file', '683e32c98ec29_slide02', '683e32c98ec29_slide02.png', 'image/png', 'public', 'public', 468987, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:24:59', '2025-06-02 07:24:59'),
(22, 'App\\Models\\Hawkma', 3, 'e1029c51-aaf8-4133-828f-1b55a43011af', 'file', '683e32f155489_slide01', '683e32f155489_slide01.png', 'image/png', 'public', 'public', 474351, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:25:38', '2025-06-02 07:25:38'),
(23, 'App\\Models\\Hawkma', 4, '879d5866-3428-4187-9253-5684637cae46', 'file', '683e33000dc0a_slide03', '683e33000dc0a_slide03.png', 'image/png', 'public', 'public', 690362, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:25:52', '2025-06-02 07:25:53'),
(24, 'App\\Models\\Report', 1, '1b14c49a-9ce6-4d38-9f00-6f7762cb2b76', 'file', '683e3327f1ab3_slide03', '683e3327f1ab3_slide03.png', 'image/png', 'public', 'public', 690362, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:26:46', '2025-06-02 07:26:47'),
(25, 'App\\Models\\Report', 1, '970b3a08-fd17-40a5-ba2c-d5becce2926d', 'image', '683e332c01fe3_slide02', '683e332c01fe3_slide02.png', 'image/png', 'public', 'public', 468987, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-06-02 07:26:47', '2025-06-02 07:26:47'),
(26, 'App\\Models\\News', 1, '490d1272-3e8c-4b13-b2b0-f97985472704', 'photo', '683e3372ed775_slide03', '683e3372ed775_slide03.png', 'image/png', 'public', 'public', 690362, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:28:23', '2025-06-02 07:28:23'),
(27, 'App\\Models\\News', 1, 'cccd1d10-4bdf-41e1-94fd-02539e79be66', 'inside_image', '683e33798e4d5_about2', '683e33798e4d5_about2.png', 'image/png', 'public', 'public', 475449, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-06-02 07:28:23', '2025-06-02 07:28:24'),
(28, 'App\\Models\\News', 1, 'dc8defac-bb70-4a7d-a892-6f8983ccdfb2', 'background_image', '683e339615d71_about2', '683e339615d71_about2.png', 'image/png', 'public', 'public', 475449, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 3, '2025-06-02 07:28:24', '2025-06-02 07:28:24'),
(30, 'App\\Models\\Director', 2, '3c2d25ea-4c65-42a4-8a6a-bc106ad0879b', 'image', '683e340d36f54_blog-1-2', '683e340d36f54_blog-1-2.jpg', 'image/jpeg', 'public', 'public', 98207, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:30:23', '2025-06-02 07:30:23'),
(31, 'App\\Models\\Center', 3, '5164e58a-49ad-42fa-9910-9c899cc8f0b4', 'logo', '683e35b707f30_center01', '683e35b707f30_center01.png', 'image/png', 'public', 'public', 19784, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-06-02 07:37:55', '2025-06-02 07:37:55'),
(32, 'App\\Models\\Center', 3, '9c1fb240-55c7-46db-b485-f9a67b7bb81e', 'image', '683e35d0670bb_center03-big', '683e35d0670bb_center03-big.png', 'image/png', 'public', 'public', 19502, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-06-02 07:37:55', '2025-06-02 07:37:55'),
(33, 'App\\Models\\Center', 1, '15d471aa-fa79-4724-8831-7ba8205c21ab', 'logo', '685013bc2dad1_project03', '685013bc2dad1_project03.png', 'image/png', 'public', 'public', 406537, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 3, '2025-07-03 22:33:32', '2025-07-03 22:33:33'),
(34, 'App\\Models\\Center', 1, 'b646d85c-2924-4a2f-abe0-a4fdaf8f6e5c', 'license_image', '6850133fd3ec7_project01', '6850133fd3ec7_project01.png', 'image/png', 'public', 'public', 460519, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 4, '2025-07-03 22:33:33', '2025-07-03 22:33:33'),
(35, 'App\\Models\\Association', 1, 'f4410724-0681-4530-87cb-4912ca931bb2', 'logo', '6850133fd3ec7_project01', '6850133fd3ec7_project01.png', 'image/png', 'public', 'public', 460519, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-05 07:12:45', '2025-07-05 07:12:46'),
(62, 'App\\Models\\CourseRequest', 18, '6d98b8be-149a-4d51-8c32-b0a40bc952df', 'beneficiar', 'course_students_template_no_attend', 'course_students_template_no_attend.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 5363, '[]', '[]', '[]', '[]', 1, '2025-07-06 04:30:27', '2025-07-06 04:30:27'),
(69, 'App\\Models\\Slider', 1, '12822134-4107-49c8-98dc-665bf6e5b1af', 'image', '687631eff30ec_slide02', '687631eff30ec_slide02.png', 'image/png', 'public', 'public', 468987, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-15 02:48:17', '2025-07-15 02:48:17'),
(70, 'App\\Models\\Center', 3, 'f078f8ad-2e90-457e-ae4f-a43cc75a4fc8', 'logo', '687f50854f91a_رؤيا البركة (3)', '687f50854f91a_رؤيا-البركة-(3).png', 'image/png', 'public', 'public', 15271, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 3, '2025-07-22 00:49:16', '2025-07-22 00:49:16'),
(71, 'App\\Models\\Center', 3, '0d7b29ae-f72d-481f-bae4-5e520bd375ee', 'image', '687f506839785_رؤيا البركة (2)', '687f506839785_رؤيا-البركة-(2).png', 'image/png', 'public', 'public', 83528, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 4, '2025-07-22 00:49:16', '2025-07-22 00:49:17'),
(72, 'App\\Models\\Center', 2, '7ea63647-1547-4b67-b3a5-cc86bf4e125e', 'logo', '687f5201c36ca_ubt (1)', '687f5201c36ca_ubt-(1).png', 'image/png', 'public', 'public', 8665, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 5, '2025-07-22 00:56:51', '2025-07-22 00:56:51'),
(73, 'App\\Models\\Center', 2, 'e7eea91c-e90a-428c-ac79-6b1ea33df958', 'image', '687f522534739_ubt (3)', '687f522534739_ubt-(3).png', 'image/png', 'public', 'public', 44480, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 6, '2025-07-22 00:56:51', '2025-07-22 00:56:51'),
(74, 'App\\Models\\Center', 4, '3342cb85-e564-48a2-abb2-56c7e71142dc', 'logo', '687f5455e2e32_جودة السلامة (1)', '687f5455e2e32_جودة-السلامة-(1).jpeg', 'image/jpeg', 'public', 'public', 3958, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-22 01:05:47', '2025-07-22 01:05:47'),
(75, 'App\\Models\\Center', 4, 'fd58746b-2083-42b6-a061-797d54df36d5', 'image', '687f546699df8_جودة السلامة (1) (1)', '687f546699df8_جودة-السلامة-(1)-(1).jpeg', 'image/jpeg', 'public', 'public', 12751, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-22 01:05:47', '2025-07-22 01:05:47'),
(76, 'App\\Models\\Association', 2, 'eb4bd05d-cbc7-46cb-af7b-f895f56cc3d7', 'logo', '68820aa3e3988_WhatsApp Image 2025-06-29 at 12.03.57', '68820aa3e3988_WhatsApp-Image-2025-06-29-at-12.03.57.jpeg', 'image/jpeg', 'public', 'public', 14200, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-24 02:27:50', '2025-07-24 02:27:50'),
(77, 'App\\Models\\Center', 5, '3189cc57-d4a6-47fb-b768-c88e7fbea437', 'logo', '68820e50b9440_منصة فهيم- (1)', '68820e50b9440_منصة-فهيم--(1).jpeg', 'image/jpeg', 'public', 'public', 5987, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-24 02:43:34', '2025-07-24 02:43:34'),
(78, 'App\\Models\\Center', 5, 'e2a846c5-ae11-44d4-99eb-176ae6ab49d5', 'image', '68820e536aedd_منصة فهيم- (2)', '68820e536aedd_منصة-فهيم--(2).jpeg', 'image/jpeg', 'public', 'public', 20113, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-24 02:43:34', '2025-07-24 02:43:34'),
(79, 'App\\Models\\News', 1, '24eefd01-8f6b-4a30-a865-e7e1e5f83e6e', 'photo', '68869fd165524_GwZl55mXYAAFUHl', '68869fd165524_GwZl55mXYAAFUHl.jpeg', 'image/jpeg', 'public', 'public', 153242, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 4, '2025-07-27 13:53:31', '2025-07-27 13:53:31'),
(80, 'App\\Models\\News', 1, '3ef4e3f4-3a21-4873-82c8-3e5dbb0afd88', 'inside_image', '68869fd882672_GwZl55nWsAIBxJ6', '68869fd882672_GwZl55nWsAIBxJ6.jpeg', 'image/jpeg', 'public', 'public', 447623, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 5, '2025-07-27 13:53:31', '2025-07-27 13:53:32'),
(81, 'App\\Models\\News', 2, '0fabd6aa-a633-4df3-9716-fa2bc18da81c', 'photo', '6886a06159ad5_Gu2Kw8QX0AAyU6i', '6886a06159ad5_Gu2Kw8QX0AAyU6i.jpeg', 'image/jpeg', 'public', 'public', 169573, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-27 13:56:10', '2025-07-27 13:56:10'),
(82, 'App\\Models\\News', 2, 'f7ec83b6-5834-4134-9dc4-9883ca4c9f4f', 'inside_image', '6886a0666931f_Gu2Kw9gXsAI3K7S', '6886a0666931f_Gu2Kw9gXsAI3K7S.jpeg', 'image/jpeg', 'public', 'public', 166199, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-27 13:56:10', '2025-07-27 13:56:10'),
(83, 'App\\Models\\News', 3, 'e40cc1ad-eb96-4b0f-8912-0c63cb900061', 'photo', '6886a0f92428c_GuXiV_eXQAA02vj', '6886a0f92428c_GuXiV_eXQAA02vj.jpeg', 'image/jpeg', 'public', 'public', 293878, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-27 13:58:37', '2025-07-27 13:58:37'),
(84, 'App\\Models\\News', 3, '1c13d971-fa86-4958-ac4b-675c2db13202', 'inside_image', '6886a0ff7d27a_GuXiV_eXQAA02vj', '6886a0ff7d27a_GuXiV_eXQAA02vj.jpeg', 'image/jpeg', 'public', 'public', 293878, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-27 13:58:37', '2025-07-27 13:58:37'),
(85, 'App\\Models\\News', 4, 'e53feab3-7393-4267-85e2-3e2b61ca62e9', 'photo', '6886a17e9203c_GuDLhxHXwAA8Pgj', '6886a17e9203c_GuDLhxHXwAA8Pgj.jpeg', 'image/jpeg', 'public', 'public', 207833, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-27 14:01:03', '2025-07-27 14:01:03'),
(86, 'App\\Models\\News', 4, '15a510b3-a3f5-433c-a582-624fceb6ef68', 'inside_image', '6886a1864c44a_GuDLhxIWEAAkEY0', '6886a1864c44a_GuDLhxIWEAAkEY0.jpeg', 'image/jpeg', 'public', 'public', 240726, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-27 14:01:03', '2025-07-27 14:01:04'),
(87, 'App\\Models\\News', 5, 'a18a6e6c-89ed-4ba7-bc89-55f9035e3a48', 'photo', '68877ffcc3966_GwZl55mXYAAFUHl', '68877ffcc3966_GwZl55mXYAAFUHl.jpeg', 'image/jpeg', 'public', 'public', 153242, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-07-28 05:50:59', '2025-07-28 05:50:59'),
(88, 'App\\Models\\News', 5, '507dc324-cf80-4aa9-ab74-943f490c951c', 'inside_image', '688780020a590_GwZl55nWsAIBxJ6', '688780020a590_GwZl55nWsAIBxJ6.jpeg', 'image/jpeg', 'public', 'public', 447623, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-07-28 05:50:59', '2025-07-28 05:51:00'),
(89, 'App\\Models\\Course', 4, 'b16c244b-6dc8-4819-98ce-986f3ee2763a', 'photo', '688f38a211d61_410x330-1', '688f38a211d61_410x330-1.png', 'image/png', 'public', 'public', 63950, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-08-03 02:24:42', '2025-08-03 02:24:42'),
(90, 'App\\Models\\Course', 4, 'a3528573-f623-4b7c-aeb0-84ae5ff1f9a2', 'inside_image', '688f38c170f37_860x430-1', '688f38c170f37_860x430-1.png', 'image/png', 'public', 'public', 96210, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-08-03 02:24:42', '2025-08-03 02:24:42'),
(91, 'App\\Models\\Course', 3, 'c2cd8d72-5435-4bbd-97cc-9aa323aa2e2b', 'photo', '688f3a1ccfae6_410x330-2', '688f3a1ccfae6_410x330-2.png', 'image/png', 'public', 'public', 53925, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-08-03 02:30:08', '2025-08-03 02:30:08'),
(92, 'App\\Models\\Course', 3, '23282f72-7d26-445f-b9d4-ce40636615c6', 'inside_image', '688f3a23b5b35_860x430-2', '688f3a23b5b35_860x430-2.png', 'image/png', 'public', 'public', 88685, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-08-03 02:30:08', '2025-08-03 02:30:09'),
(93, 'App\\Models\\Course', 6, 'f176e085-3fd1-4abc-96be-e53d19dc5c3f', 'photo', '688f3a7cba97a_410x330-3', '688f3a7cba97a_410x330-3.png', 'image/png', 'public', 'public', 50845, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2025-08-03 02:32:59', '2025-08-03 02:32:59'),
(94, 'App\\Models\\Course', 6, 'c255f2f7-e9ad-4bb1-94f5-8449ec237fab', 'inside_image', '688f3a83ed097_860x430-3', '688f3a83ed097_860x430-3.png', 'image/png', 'public', 'public', 84468, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2025-08-03 02:32:59', '2025-08-03 02:32:59'),
(95, 'App\\Models\\Course', 1, '5dd761af-aadf-456f-a27b-a1ce32d7725d', 'photo', '688f9012ac06b_410x330-4', '688f9012ac06b_410x330-4.png', 'image/png', 'public', 'public', 60836, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 4, '2025-08-03 08:37:06', '2025-08-03 08:37:06'),
(96, 'App\\Models\\Course', 1, '14691ce0-8053-4f8d-ae28-0c450a8af507', 'inside_image', '688f9018c2f3d_860x430-4', '688f9018c2f3d_860x430-4.png', 'image/png', 'public', 'public', 109442, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 5, '2025-08-03 08:37:06', '2025-08-03 08:37:06'),
(97, 'App\\Models\\Course', 7, '398c30f9-8419-40a2-b3eb-5267d275cc9b', 'photo', '6890f249ec04f_course-1-1', '6890f249ec04f_course-1-1.png', 'image/png', 'public', 'public', 216651, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-04 21:49:33', '2025-08-04 21:49:34'),
(98, 'App\\Models\\Course', 7, '1860685d-0017-4c89-87c3-cc93ec7342ff', 'inside_image', '6890f252e9816_course-details-1', '6890f252e9816_course-details-1.jpg', 'image/jpeg', 'public', 'public', 202449, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-04 21:49:34', '2025-08-04 21:49:34'),
(99, 'App\\Models\\Course', 7, '7d2b37ab-29df-4cbe-96a3-10f97829e941', 'video_background', '6890f25d230a5_course-details-2-1', '6890f25d230a5_course-details-2-1.jpg', 'image/jpeg', 'public', 'public', 442161, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 3, '2025-08-04 21:49:34', '2025-08-04 21:49:35'),
(100, 'App\\Models\\News', 6, '9d6e616d-7889-4d5d-9ac1-43b2a408be36', 'photo', '6890f5649ea93_blog-1-3', '6890f5649ea93_blog-1-3.jpg', 'image/jpeg', 'public', 'public', 86722, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-04 22:01:29', '2025-08-04 22:01:29'),
(101, 'App\\Models\\News', 6, 'ff336b15-8679-44f9-af3d-5e7d4e0749a8', 'inside_image', '6890f56812b01_blog-1-3', '6890f56812b01_blog-1-3.jpg', 'image/jpeg', 'public', 'public', 86722, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-04 22:01:29', '2025-08-04 22:01:29'),
(102, 'App\\Models\\News', 6, '436928d4-b864-4745-8b0d-62a85111f608', 'background_image', '6890f5771c983_blog-1-3', '6890f5771c983_blog-1-3.jpg', 'image/jpeg', 'public', 'public', 86722, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 3, '2025-08-04 22:01:29', '2025-08-04 22:01:29'),
(103, 'App\\Models\\Partner', 1, 'dd2068b9-ee0c-4838-85f4-3e47e468ce6b', 'image', '6890f7168785e_brand-1-1', '6890f7168785e_brand-1-1.png', 'image/png', 'public', 'public', 24512, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-04 22:08:25', '2025-08-04 22:08:25'),
(104, 'App\\Models\\Program', 1, '62e2bb2f-4f4e-4680-b89b-819e410a9a29', 'image', '6890f73d39ae4_breadcumb-bg (1)', '6890f73d39ae4_breadcumb-bg-(1).png', 'image/png', 'public', 'public', 327852, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-04 22:09:05', '2025-08-04 22:09:05'),
(105, 'App\\Models\\Program', 2, '54f3d604-8c23-4022-b14e-fab8b8382a60', 'image', '6890f7b4d711d_breadcumb-bg', '6890f7b4d711d_breadcumb-bg.png', 'image/png', 'public', 'public', 327852, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-04 22:11:09', '2025-08-04 22:11:09'),
(106, 'App\\Models\\Center', 0, '7dcc055f-4da3-4da0-97e8-4aa43926523a', 'ck-media', 'image', 'image.png', 'image/png', 'public', 'public', 256988, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:02:45', '2025-08-05 01:02:45'),
(107, 'App\\Models\\Center', 6, 'ec1525fd-5070-4639-8c99-0d09c227b847', 'logo', '6891206bcecde_center01 (1)', '6891206bcecde_center01-(1).png', 'image/png', 'public', 'public', 19784, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:04:57', '2025-08-05 01:04:57'),
(108, 'App\\Models\\Center', 6, 'a5f6c160-d7db-4589-8983-561b1ec50437', 'image', '6891206619061_center03-big', '6891206619061_center03-big.png', 'image/png', 'public', 'public', 19502, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-05 01:04:57', '2025-08-05 01:04:57'),
(109, 'App\\Models\\Association', 4, '94ebc36e-2a6c-4e7b-ab0f-55e912d16946', 'logo', '6891213874f88_breadcumb-bg (1)', '6891213874f88_breadcumb-bg-(1).png', 'image/png', 'public', 'public', 327852, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-05 01:08:40', '2025-08-05 01:08:40'),
(110, 'App\\Models\\Course', 8, '72377aeb-f331-4d7b-8a1e-5d0d2c568a25', 'photo', '6891227a31f06_course-1-2', '6891227a31f06_course-1-2.png', 'image/png', 'public', 'public', 252464, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:13:55', '2025-08-05 01:13:56'),
(111, 'App\\Models\\Course', 8, '66eb55e3-b283-4368-a410-df21438c9c3a', 'inside_image', '689122807e384_course-details-1', '689122807e384_course-details-1.jpg', 'image/jpeg', 'public', 'public', 202449, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2025-08-05 01:13:56', '2025-08-05 01:13:56'),
(112, 'App\\Models\\Course', 8, '73884e88-292f-46f2-9149-20721ce73aaa', 'video_background', '68912286ad0c6_course-details-2-1', '68912286ad0c6_course-details-2-1.jpg', 'image/jpeg', 'public', 'public', 442161, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 3, '2025-08-05 01:13:56', '2025-08-05 01:13:56'),
(113, 'App\\Models\\Director', 3, 'a1d5ca2a-c9ee-4318-ac0a-d0f9591b0872', 'image', '689124b46db92_team-s-3-1', '689124b46db92_team-s-3-1.png', 'image/png', 'public', 'public', 37030, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:23:03', '2025-08-05 01:23:03'),
(114, 'App\\Models\\Program', 3, 'be967049-8a60-4596-a969-b9bd6cf7e47f', 'image', '68912556c6243_team-s-3-1', '68912556c6243_team-s-3-1.png', 'image/png', 'public', 'public', 37030, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:25:43', '2025-08-05 01:25:43'),
(115, 'App\\Models\\Program', 4, '35c3cfcf-85d1-466f-a2ad-23e731badbda', 'image', '689125c35b711_team-s-3-1', '689125c35b711_team-s-3-1.png', 'image/png', 'public', 'public', 37030, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2025-08-05 01:27:32', '2025-08-05 01:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2024_05_1_000027_create_supporters_table', 1),
(3, '2024_11_09_000012_create_hawkam_categories_table', 1),
(4, '2025_05_05_000001_create_media_table', 1),
(5, '2025_05_05_000002_create_permissions_table', 1),
(6, '2025_05_05_000003_create_roles_table', 1),
(7, '2025_05_05_000004_create_users_table', 1),
(8, '2025_05_05_000005_create_settings_table', 1),
(9, '2025_05_05_000006_create_sliders_table', 1),
(10, '2025_05_05_000007_create_courses_table', 1),
(11, '2025_05_05_000008_create_categories_table', 1),
(12, '2025_05_05_000009_create_centers_table', 1),
(13, '2025_05_05_000010_create_curricula_table', 1),
(14, '2025_05_05_000011_create_newss_table', 1),
(15, '2025_05_05_000012_create_contacts_table', 1),
(16, '2025_05_05_000013_create_hawkmas_table', 1),
(17, '2025_05_05_000014_create_report_categories_table', 1),
(18, '2025_05_05_000015_create_reports_table', 1),
(19, '2025_05_05_000016_create_directors_table', 1),
(20, '2025_05_05_000017_create_goals_table', 1),
(21, '2025_05_05_000018_create_partners_table', 1),
(22, '2025_05_05_000019_create_programs_table', 1),
(23, '2025_05_05_000020_create_needs_table', 1),
(24, '2025_05_05_000021_create_permission_role_pivot_table', 1),
(25, '2025_05_05_000022_create_role_user_pivot_table', 1),
(26, '2025_05_05_000023_add_relationship_fields_to_courses_table', 1),
(27, '2025_05_05_000024_add_relationship_fields_to_curricula_table', 1),
(28, '2025_05_09_000027_add_relationship_fields_to_hawkmas_table', 1),
(29, '2025_05_14_000021_create_associations_table', 1),
(30, '2025_05_14_000023_create_user_alerts_table', 1),
(31, '2025_05_14_000026_create_user_user_alert_pivot_table', 1),
(32, '2025_05_14_000029_add_relationship_fields_to_associations_table', 1),
(33, '2025_05_14_000031_add_relationship_fields_to_centers_table', 1),
(34, '2025_06_23_041628_course_requests_table', 1),
(35, '2025_07_02_000021_create_course_students_table', 1),
(36, '2025_08_22_190556_create_course_attendances_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newss`
--

CREATE TABLE `newss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `description_2` longtext DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newss`
--

INSERT INTO `newss` (`id`, `title`, `short_description`, `description`, `description_2`, `views`, `video_url`, `date`, `created_at`, `updated_at`) VALUES
(1, 'زيارة جمعية عاصم لتأهيل وتدريب الايتام بزيارة جمعية انسان', 'في إطار سعيها لتطوير برامجها التمكينية،قامت جمعية #عاصم_لتأهيل_وتدريب_الأيتام ممثلة بمديرها التنفيذي د.عبدالله الشهري بزيارة إلى جمعية #إنسان، حيث التقى بسعادة المدير العام أ. محمد المحارب،في لقاءٍ ملهم هدفه تبادل الخبرات واستلهام التجارب النوعية في تمكين اليتيم وتأهيله للمستقبل', '<p>في إطار سعيها لتطوير برامجها التمكينية،قامت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د.عبدالله الشهري بزيارة إلى جمعية <a href=\"https://x.com/hashtag/%D8%A5%D9%86%D8%B3%D8%A7%D9%86?src=hashtag_click\">#إنسان</a>، حيث التقى بسعادة المدير العام أ. محمد المحارب،في لقاءٍ ملهم هدفه تبادل الخبرات واستلهام التجارب النوعية في تمكين اليتيم وتأهيله للمستقبل</p>', '<p>في إطار سعيها لتطوير برامجها التمكينية،قامت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د.عبدالله الشهري بزيارة إلى جمعية <a href=\"https://x.com/hashtag/%D8%A5%D9%86%D8%B3%D8%A7%D9%86?src=hashtag_click\">#إنسان</a>، حيث التقى بسعادة المدير العام أ. محمد المحارب،في لقاءٍ ملهم هدفه تبادل الخبرات واستلهام التجارب النوعية في تمكين اليتيم وتأهيله للمستقبل</p>', NULL, NULL, '2025-07-21', '2025-07-27 13:53:30', '2025-07-27 13:53:30'),
(2, 'زيارة جمعية عاصم لتأهيل وتدريب الايتام جناح الاكاديمية البحرية', 'زيارة جمعية عاصم لتأهيل وتدريب الايتام جناح الاكاديمية البحرية', '<p>بهدف بناء شراكات نوعية، زارت جمعية #عاصم_لتأهيل_وتدريب_الأيتام جناح الأكاديمية الوطنية البحرية ضمن #ملتقى_القطاع_غير_الربحي_في_التعليم_والتدريب_2025 وتعرف الفريق على برامجهم في التدريب البحري، ونسعد بمد جسور التعاون لما يخدم أبناءنا الأيتام ويفتح لهم آفاقاً مهنية واعدة &nbsp;</p><p>&nbsp;</p>', '<p>بهدف بناء شراكات نوعية، زارت جمعية #عاصم_لتأهيل_وتدريب_الأيتام جناح الأكاديمية الوطنية البحرية ضمن #ملتقى_القطاع_غير_الربحي_في_التعليم_والتدريب_2025 وتعرف الفريق على برامجهم في التدريب البحري، ونسعد بمد جسور التعاون لما يخدم أبناءنا الأيتام ويفتح لهم آفاقاً مهنية واعدة &nbsp;</p><p>&nbsp;</p>', NULL, NULL, '2025-07-02', '2025-07-27 13:56:10', '2025-07-27 13:56:10'),
(3, 'توقيع جمعية عاصم لتأهيل وتدريب الأيتام اتفاقية تعاون مع مركز سمو الفكر للإرشاد الأسري', 'توقيع جمعية عاصم لتأهيل وتدريب الأيتام ممثلة بمديرها التنفيذي د. عبدالله الشهري اتفاقية تعاون مع مركز سمو الفكر للإرشاد الأسري', '<p>امتدادًا لجهود التكامل المجتمعي وتعزيزًا لبرامج التمكين، وقّعت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د. عبدالله الشهري اتفاقية تعاون مع مركز سمو الفكر للإرشاد الأسري ممثلاً بالدكتور/سامي الأنصاري، بهدف تطوير مبادرات نوعية تخدم الأيتام وأسرهم وترتقي بجودة حياتهم</p>', '<p>امتدادًا لجهود التكامل المجتمعي وتعزيزًا لبرامج التمكين، وقّعت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د. عبدالله الشهري اتفاقية تعاون مع مركز سمو الفكر للإرشاد الأسري ممثلاً بالدكتور/سامي الأنصاري، بهدف تطوير مبادرات نوعية تخدم الأيتام وأسرهم وترتقي بجودة حياتهم</p>', NULL, NULL, '2025-06-26', '2025-07-27 13:58:37', '2025-07-27 13:58:37'),
(4, 'توقيع اتفاقية شراكة بين جمعية عاصم لتأهيل وتدريب الأيتام وشركة بارنز', 'توقيع اتفاقية شراكة بين جمعية عاصم لتأهيل وتدريب الأيتام ممثلة بمديرها التنفيذي د. عبدالله الشهري، وشركة بارنز', '<p>تم توقيع اتفاقية شراكة بين جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د. عبدالله الشهري، وشركة بارنز بحضور أ. ريان المربعي أخصائي استقطاب المواهب، تجسيدًا للتكامل بين القطاعات وتعزيزًا لدور الشراكات المجتمعية في دعم التنمية المستدامة</p>', '<p>تم توقيع اتفاقية شراكة بين جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د. عبدالله الشهري، وشركة بارنز بحضور أ. ريان المربعي أخصائي استقطاب المواهب، تجسيدًا للتكامل بين القطاعات وتعزيزًا لدور الشراكات المجتمعية في دعم التنمية المستدامة</p>', NULL, NULL, '2025-06-22', '2025-07-27 14:01:03', '2025-07-27 14:01:03'),
(5, 'زيارة جمعية عاصم لتأهيل وتدريب الايتام جمعية انسان', 'زيارة جمعية عاصم لتأهيل وتدريب الايتام جمعية انسان', '<p>في إطار سعيها لتطوير برامجها التمكينية،قامت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د.عبدالله الشهري بزيارة إلى جمعية <a href=\"https://x.com/hashtag/%D8%A5%D9%86%D8%B3%D8%A7%D9%86?src=hashtag_click\">#إنسان</a>، حيث التقى بسعادة المدير العام أ. محمد المحارب،في لقاءٍ ملهم هدفه تبادل الخبرات واستلهام التجارب النوعية في تمكين اليتيم وتأهيله للمستقب</p>', '<p>في إطار سعيها لتطوير برامجها التمكينية،قامت جمعية <a href=\"https://x.com/hashtag/%D8%B9%D8%A7%D8%B5%D9%85_%D9%84%D8%AA%D8%A3%D9%87%D9%8A%D9%84_%D9%88%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8_%D8%A7%D9%84%D8%A3%D9%8A%D8%AA%D8%A7%D9%85?src=hashtag_click\">#عاصم_لتأهيل_وتدريب_الأيتام</a> ممثلة بمديرها التنفيذي د.عبدالله الشهري بزيارة إلى جمعية <a href=\"https://x.com/hashtag/%D8%A5%D9%86%D8%B3%D8%A7%D9%86?src=hashtag_click\">#إنسان</a>، حيث التقى بسعادة المدير العام أ. محمد المحارب،في لقاءٍ ملهم هدفه تبادل الخبرات واستلهام التجارب النوعية في تمكين اليتيم وتأهيله للمستقب</p>', NULL, NULL, '2025-07-21', '2025-07-28 05:50:59', '2025-07-28 05:50:59'),
(6, 'ffg gfgfsfs', 'ffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfs', '<p>vvffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfs</p>', '<p>ffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfsffg gfgfsfs</p>', 250, 'https://youtu.be/gtWXlt8DA40?t=4', '2025-08-11', '2025-08-04 22:01:29', '2025-08-05 01:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'https://oyoon.visions-sa.com/admin/partners/create', '2025-08-04 22:08:25', '2025-08-04 22:08:30', '2025-08-04 22:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'setting_create', NULL, NULL, NULL),
(18, 'setting_edit', NULL, NULL, NULL),
(19, 'setting_show', NULL, NULL, NULL),
(20, 'setting_delete', NULL, NULL, NULL),
(21, 'setting_access', NULL, NULL, NULL),
(22, 'slider_create', NULL, NULL, NULL),
(23, 'slider_edit', NULL, NULL, NULL),
(24, 'slider_show', NULL, NULL, NULL),
(25, 'slider_delete', NULL, NULL, NULL),
(26, 'slider_access', NULL, NULL, NULL),
(27, 'course_create', NULL, NULL, NULL),
(28, 'course_edit', NULL, NULL, NULL),
(29, 'course_show', NULL, NULL, NULL),
(30, 'course_delete', NULL, NULL, NULL),
(31, 'course_access', NULL, NULL, NULL),
(32, 'courses_management_access', NULL, NULL, NULL),
(33, 'category_create', NULL, NULL, NULL),
(34, 'category_edit', NULL, NULL, NULL),
(35, 'category_show', NULL, NULL, NULL),
(36, 'category_delete', NULL, NULL, NULL),
(37, 'category_access', NULL, NULL, NULL),
(38, 'center_create', NULL, NULL, NULL),
(39, 'center_edit', NULL, NULL, NULL),
(40, 'center_show', NULL, NULL, NULL),
(41, 'center_delete', NULL, NULL, NULL),
(42, 'center_access', NULL, NULL, NULL),
(43, 'curriculum_create', NULL, NULL, NULL),
(44, 'curriculum_edit', NULL, NULL, NULL),
(45, 'curriculum_show', NULL, NULL, NULL),
(46, 'curriculum_delete', NULL, NULL, NULL),
(47, 'curriculum_access', NULL, NULL, NULL),
(48, 'news_create', NULL, NULL, NULL),
(49, 'news_edit', NULL, NULL, NULL),
(50, 'news_show', NULL, NULL, NULL),
(51, 'news_delete', NULL, NULL, NULL),
(52, 'news_access', NULL, NULL, NULL),
(53, 'contact_create', NULL, NULL, NULL),
(54, 'contact_edit', NULL, NULL, NULL),
(55, 'contact_show', NULL, NULL, NULL),
(56, 'contact_delete', NULL, NULL, NULL),
(57, 'contact_access', NULL, NULL, NULL),
(58, 'hawkma_create', NULL, NULL, NULL),
(59, 'hawkma_edit', NULL, NULL, NULL),
(60, 'hawkma_show', NULL, NULL, NULL),
(61, 'hawkma_delete', NULL, NULL, NULL),
(62, 'hawkma_access', NULL, NULL, NULL),
(63, 'report_category_create', NULL, NULL, NULL),
(64, 'report_category_edit', NULL, NULL, NULL),
(65, 'report_category_show', NULL, NULL, NULL),
(66, 'report_category_delete', NULL, NULL, NULL),
(67, 'report_category_access', NULL, NULL, NULL),
(68, 'report_create', NULL, NULL, NULL),
(69, 'report_edit', NULL, NULL, NULL),
(70, 'report_show', NULL, NULL, NULL),
(71, 'report_delete', NULL, NULL, NULL),
(72, 'report_access', NULL, NULL, NULL),
(73, 'report_mangment_access', NULL, NULL, NULL),
(74, 'director_create', NULL, NULL, NULL),
(75, 'director_edit', NULL, NULL, NULL),
(76, 'director_show', NULL, NULL, NULL),
(77, 'director_delete', NULL, NULL, NULL),
(78, 'director_access', NULL, NULL, NULL),
(79, 'goal_create', NULL, NULL, NULL),
(80, 'goal_edit', NULL, NULL, NULL),
(81, 'goal_show', NULL, NULL, NULL),
(82, 'goal_delete', NULL, NULL, NULL),
(83, 'goal_access', NULL, NULL, NULL),
(84, 'partner_create', NULL, NULL, NULL),
(85, 'partner_edit', NULL, NULL, NULL),
(86, 'partner_show', NULL, NULL, NULL),
(87, 'partner_delete', NULL, NULL, NULL),
(88, 'partner_access', NULL, NULL, NULL),
(89, 'about_association_access', NULL, NULL, NULL),
(90, 'program_create', NULL, NULL, NULL),
(91, 'program_edit', NULL, NULL, NULL),
(92, 'program_show', NULL, NULL, NULL),
(93, 'program_delete', NULL, NULL, NULL),
(94, 'program_access', NULL, NULL, NULL),
(95, 'need_create', NULL, NULL, NULL),
(96, 'need_edit', NULL, NULL, NULL),
(97, 'need_show', NULL, NULL, NULL),
(98, 'need_delete', NULL, NULL, NULL),
(99, 'need_access', NULL, NULL, NULL),
(100, 'association_create', NULL, NULL, NULL),
(101, 'association_edit', NULL, NULL, NULL),
(102, 'association_show', NULL, NULL, NULL),
(103, 'association_delete', NULL, NULL, NULL),
(104, 'association_access', NULL, NULL, NULL),
(105, 'course_request_create', NULL, NULL, NULL),
(106, 'course_request_edit', NULL, NULL, NULL),
(107, 'course_request_show', NULL, NULL, NULL),
(108, 'course_request_delete', NULL, NULL, NULL),
(109, 'course_request_access', NULL, NULL, NULL),
(110, 'user_alert_create', NULL, NULL, NULL),
(111, 'user_alert_show', NULL, NULL, NULL),
(112, 'user_alert_delete', NULL, NULL, NULL),
(113, 'user_alert_access', NULL, NULL, NULL),
(114, 'beneficiary_create', NULL, NULL, NULL),
(115, 'beneficiary_edit', NULL, NULL, NULL),
(116, 'beneficiary_show', NULL, NULL, NULL),
(117, 'beneficiary_delete', NULL, NULL, NULL),
(118, 'beneficiary_access', NULL, NULL, NULL),
(119, 'course_enrollement_access', NULL, NULL, NULL),
(120, 'hawkam_category_create', NULL, NULL, NULL),
(121, 'hawkam_category_edit', NULL, NULL, NULL),
(122, 'hawkam_category_show', NULL, NULL, NULL),
(123, 'hawkam_category_delete', NULL, NULL, NULL),
(124, 'hawkam_category_access', NULL, NULL, NULL),
(125, 'audit_log_show', NULL, NULL, NULL),
(126, 'audit_log_access', NULL, NULL, NULL),
(127, 'supporter_create', NULL, NULL, NULL),
(128, 'supporter_edit', NULL, NULL, NULL),
(129, 'supporter_show', NULL, NULL, NULL),
(130, 'supporter_delete', NULL, NULL, NULL),
(131, 'supporter_access', NULL, NULL, NULL),
(132, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tefd', 'rewewrerewewrerewewrerewewrevvrewewrerewewrerewewrerewewrevv rewewrerewewrerewewrerewewrevv rewewrerewewrerewewrerewewrevv', '2025-08-04 22:09:05', '2025-08-04 22:09:15', '2025-08-04 22:09:15'),
(2, 'fsda', 'rewewrerewewrerewewrerewewrevvrewewrerewewrerewewrerewewrevvrewewrerewewrerewewrerewewrevvrewewrerewewrerewewrerewewrevv rewewrerewewrerewewrerewewrevv rewewrerewewrerewewrerewewrevv rewewrerewewrerewewrerewewrevvrewewrerewewrerewewrerewewrevv', '2025-08-04 22:11:09', '2025-08-05 01:27:38', '2025-08-05 01:27:38'),
(3, 'tefsd', 'fa klfds l; dsporew l fdal oprew lmv poer lm fdp ero dfp erlcvm pfd soerw pfds krew lfsdp werf ldfslm pfds  p\'sdfa  l;fdsa ;\'fdas kdfsa kfdsam;\' kdfs', '2025-08-05 01:25:43', '2025-08-05 01:25:43', NULL),
(4, 'tdhgdg', 'رنامج سنوي متكامل يحتوي على العديد من المشاريع المخصصة يهتم بتمكين الأيتام من اتقان العديد من الحرف التي تمكنهم من الالتحاق بسوق العمل .', '2025-08-05 01:27:32', '2025-08-05 01:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_categories`
--

CREATE TABLE `report_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'site_name', 'جمعية عاصم لتأهيل وتدريب الأيتام', '2025-05-25 11:53:15', '2025-07-12 23:45:27', NULL),
(2, 'phone', '966507155517', '2025-05-25 11:53:15', '2025-07-12 23:45:27', NULL),
(3, 'email', 'info@asem.org.sa', '2025-05-25 11:53:15', '2025-07-12 23:45:27', NULL),
(4, 'address', NULL, '2025-05-25 11:53:15', '2025-07-12 23:45:27', NULL),
(5, 'description', '<p>اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم ورعايتهم وكفالتهم ، وقد أولت دولتنا المباركة هذا الجانب أهمية كبيرة ، فخصصت العديد من الجمعيات والبرامج والمراكز للعناية بهم ورعايتهم ، وانطلاقاً من رؤية المملكة العربية السعودية 2030 الذي من أهم أركانها ) بناء مجتمع حيوي ( ومن توجه وزارة الموارد البشرية والتنمية الاجتماعية وشعارها المميز )من الرعوية إلى التنموية ( انطلقت جمعية عاصم لتأهيل وتدريب الأيتام .</p><p>جمعية تنموية تدريبية غير ربحية مسجلة بوزارة الموارد البشرية والتنمية الاجتماعية برقم »1106« متخصصة في تأهيل وتدريب الأيتام بمنطقة مكة المكرمة تسعى لتحقيق حاجة الأيتام في الحصول على خدمات التدريب والتأهيل والتمكين ومعالجة السلوكيات السلبية لدى البيئات الحاضنة للأيتام وتوفير بيئة لاكتشاف مواهبهم وقدراتهم ورعايتها.</p>', '2025-05-25 11:53:15', '2025-05-25 13:11:14', NULL),
(6, 'description_2', '<p>اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم ورعايتهم وكفالتهم ،&nbsp;</p>', '2025-05-25 11:53:15', '2025-05-25 13:11:14', NULL),
(7, 'vision_text', 'جمعية تنموية تدريبية غير ربحية مسجلة بوزارة الموارد البشرية والتنمية الاجتماعية برقم »1106« متخصصة في تأهيل وتدريب الأيتام بمنطقة مكة المكرمة تسعى لتحقيق حاجة الأيتام في الحصول على خدمات التدريب والتأهيل والتمكين ومعالجة السلوكيات السلبية لدى البيئات الحاضنة للأيتام وتوفير بيئة لاكتشاف مواهبهم وقدراتهم ورعايتها.', '2025-05-25 11:53:15', '2025-06-02 07:08:57', NULL),
(8, 'mission_text', 'جمعية تنموية تدريبية غير ربحية مسجلة بوزارة الموارد البشرية والتنمية الاجتماعية برقم »1106« متخصصة في تأهيل وتدريب الأيتام بمنطقة مكة المكرمة تسعى لتحقيق حاجة الأيتام في الحصول على خدمات التدريب والتأهيل والتمكين ومعالجة السلوكيات السلبية لدى البيئات الحاضنة للأيتام وتوفير بيئة لاكتشاف مواهبهم وقدراتهم ورعايتها.', '2025-05-25 11:53:15', '2025-06-02 07:08:57', NULL),
(9, 'values_text', '<p>جمعية تنموية تدريبية غير ربحية مسجلة بوزارة الموارد البشرية والتنمية الاجتماعية برقم »1106« متخصصة في تأهيل وتدريب الأيتام بمنطقة مكة المكرمة تسعى لتحقيق حاجة الأيتام في الحصول على خدمات التدريب والتأهيل والتمكين ومعالجة السلوكيات السلبية لدى البيئات الحاضنة للأيتام وتوفير بيئة لاكتشاف مواهبهم وقدراتهم ورعايتها.</p>', '2025-05-25 11:53:15', '2025-06-02 07:08:57', NULL),
(10, 'logo', 'settings/1748252778_logo_settings.png', '2025-05-25 11:53:15', '2025-05-25 17:46:18', NULL),
(11, 'structure', 'settings/1754342612_structure_settings.png', '2025-05-25 11:53:15', '2025-08-05 01:23:32', NULL),
(12, 'about', 'settings/1754218682_about_settings.png', '2025-05-25 12:21:29', '2025-08-03 02:58:02', NULL),
(13, 'count_courses', '15', '2025-05-25 12:28:01', '2025-07-22 01:25:30', NULL),
(14, 'count_benificair', '3500', '2025-05-25 12:28:01', '2025-05-25 12:28:01', NULL),
(17, 'count_centers', '5', '2025-05-25 12:29:32', '2025-07-22 01:25:30', NULL),
(18, 'count_associations', '30', '2025-05-25 12:29:32', '2025-07-22 01:25:30', NULL),
(19, 'logo_footer', 'settings/1748252823_logo_settings.png', '2025-05-25 13:16:23', '2025-05-25 17:47:03', NULL),
(20, 'facebook', NULL, '2025-06-02 07:09:54', '2025-07-12 23:43:36', NULL),
(21, 'twitter', 'https://x.com/asemorphans?s=21&t=fTR_3SrhIXS5kwqIWLI1Gw', '2025-06-02 07:09:54', '2025-07-12 23:43:36', NULL),
(22, 'instagram', 'https://www.instagram.com/asemorphans?igsh=MWQ3aGdvMnc5d3RqaA%3D%3D&utm_source=qr', '2025-06-02 07:09:54', '2025-07-12 23:43:36', NULL),
(23, 'googleplus', NULL, '2025-06-02 07:09:54', '2025-07-12 23:43:36', NULL),
(24, 'website', 'https://assem.visions-sa.com/', '2025-06-02 07:09:55', '2025-06-02 07:09:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `sub_title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES
(1, 'مــــــــعـــــــاً  لمستقبل واعد', 'جمعية تنموية تدريبية غير ربحية مسجلة بوزارة الموارد البشرية والتنمية الاجتماعية', '2025-05-25 11:31:40', '2025-05-25 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `supporters`
--

CREATE TABLE `supporters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `official_name` varchar(191) DEFAULT NULL,
  `official_phone` int(11) DEFAULT NULL,
  `official_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supporters`
--

INSERT INTO `supporters` (`id`, `name`, `phone`, `email`, `official_name`, `official_phone`, `official_email`, `created_at`, `updated_at`) VALUES
(1, 'صندوق دعم الجمعيات', 507155517, 'info@asem.org.sa', NULL, NULL, NULL, '2025-07-24 03:42:02', '2025-07-24 03:42:19'),
(2, 'لا يوجد', 501234567, 'info@info.com', NULL, NULL, NULL, '2025-07-28 23:30:22', '2025-07-28 23:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `user_type` varchar(191) DEFAULT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$aLS7wH7OXF6skQXPGUPUxObpAoLm/jLNCP43BEZMURd6I85oaz8B.', NULL, 'staff', 1, NULL, NULL, NULL),
(2, 'Blanditiis odit nam laborum itaque architecto asperiores facilis.', 'nadafarid068@gmail.com', NULL, '$2y$10$.E/qsY97w3HMmHaYvFhBkuWMWhAoXPChyeNCaiBY8zlCsyVi60wdu', 'IacXmy2VVZ3gFVErADCZZw1dn8Gnck63WApeBfbFg2ze83r2MEKYyHfp8OED', 'center', 1, '2025-07-03 22:33:32', '2025-07-07 21:44:49', NULL),
(3, 'Kolby Beier', 'nodyfared@gmail.com', NULL, '$2y$10$g8HPQqzGyx0prx1XXbI9gO4EdakOwwAkaKwFI1mBu3uJqa0kLrBUC', NULL, 'association', 1, '2025-07-05 07:12:45', '2025-07-05 07:53:43', NULL),
(4, 'UBT university', 'info@ubt.edu.sa', NULL, '$2y$10$GJhB.qqwdUgzhU2J4W3BmemvlfA8Y2syP9QzsR9nMeZDFGiYI5ju2', NULL, 'center', 0, '2025-07-14 00:53:01', '2025-07-22 00:56:51', NULL),
(5, 'جمعية رحماء لتنمية الأيتام', 'info@rohamaa-j.org.sa', NULL, '$2y$10$zO/m52c9gVcub0hx659EqOKfmzij6DCMw9a43LZVMxi2J7Q9VqBqy', NULL, 'association', 0, '2025-07-14 00:55:10', '2025-07-24 02:27:50', NULL),
(6, 'معهد رؤيا البركة', 'info@rouyabraka.edu.sa', NULL, '$2y$10$q4jnSdxsBezNgllqAPE0Gu8T4fWtg/cFUBHnLWftbX72hp7M/lQva', NULL, 'center', 1, '2025-07-22 00:49:16', '2025-07-22 00:49:16', NULL),
(7, 'مركز جودة السلامة الشاملة', 'info@tsq.com.sa', NULL, '$2y$10$ib1NxxG1.qmBYkTuwJ6zDeqd92USuqwE0sqULFkMHfukU9keF3x2O', NULL, 'center', 1, '2025-07-22 01:05:47', '2025-07-22 01:05:47', NULL),
(8, 'منصة فهيم', 'info@asem.org.sa', NULL, '$2y$10$dxbFm9LMTyzvI/uJdmVvxO/VCSkgzSVs845/cLNsSIK7qOHg17GDS', NULL, 'center', 1, '2025-07-24 02:43:34', '2025-07-24 02:43:34', NULL),
(9, 'Mohamed Ahmed', 'ma7700712@gmail.com', NULL, '$2y$10$kfmKyvqrElIN2XBjOUgOhua3AsTNq6C7WakYEykocL83f5ubbHoxW', NULL, 'association', 1, '2025-08-04 21:45:17', '2025-08-04 21:45:17', NULL),
(12, 'Isaiah Blick', 'your.email+fakedata49082@gmail.com', NULL, '$2y$10$DqkJc5D1LyQcPSkWaBRvgOf2y3KRafND54sS1HXt5B4BjujysN.O6', NULL, 'association', 1, '2025-08-04 22:57:39', '2025-08-04 22:57:39', NULL),
(14, 'Isaiah Blick', 'nn@gmail.com', NULL, '$2y$10$B4uRm2O3/4.I0o3Ugi6s0uO9uenB/AGE89Z7x1TMwZMIwLNAvqoQK', NULL, 'association', 1, '2025-08-04 22:58:41', '2025-08-04 22:58:41', NULL),
(15, 'Kariane Bauch', 'your.email+fakedata67846@gmail.com', NULL, '$2y$10$Jk.SQm8PRDfHhFwCKPn2D.Y2YHFZ5sKa0Dg99X1TAYXBu248HASMu', NULL, 'association', 1, '2025-08-04 23:03:39', '2025-08-04 23:03:39', NULL),
(18, 'Mohamed Ahmed', 'ma7712@gmail.com', NULL, '$2y$10$6kPLMQtuog1jS0X3rgDEo.5J60C4xIsoz2cy99f0xQpTs6Bij/vYm', NULL, 'center', 1, '2025-08-05 01:04:57', '2025-08-05 01:04:57', NULL),
(19, 'Mohamed Ahmed', 'm@m', NULL, '$2y$10$NhQr9.LtdSGpiIMrV1Nl5uAa/6nlRCzscJ3zW52/ZEiajGsP9fqUm', NULL, 'association', 1, '2025-08-05 01:08:40', '2025-08-05 01:08:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_text` varchar(191) NOT NULL,
  `alert_link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_alerts`
--

INSERT INTO `user_alerts` (`id`, `alert_text`, `alert_link`, `created_at`, `updated_at`) VALUES
(1, ' قم مركز جديد بالتسجيل:  Blanditiis odit nam laborum itaque architecto asperiores facilis.', 'https://assem.visions-sa.com/admin/centers/1', '2025-07-03 22:33:33', '2025-07-03 22:33:33'),
(2, ' قمت جمعية جديدة بالتسجيل:  Kolby Beier', 'https://assem.visions-sa.com/admin/associations/1', '2025-07-05 07:12:46', '2025-07-05 07:12:46'),
(3, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/1', '2025-07-05 07:56:50', '2025-07-05 07:56:50'),
(4, ' نأسف تم رفض  طلب انضمام مستفدينكم للدورة', 'https://assem.visions-sa.com/association/courses/requests', '2025-07-05 07:58:45', '2025-07-05 07:58:45'),
(5, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/2', '2025-07-05 08:04:55', '2025-07-05 08:04:55'),
(6, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/3', '2025-07-05 08:08:19', '2025-07-05 08:08:19'),
(7, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/3', '2025-07-05 08:17:00', '2025-07-05 08:17:00'),
(8, 'طلب انضمام جديد لدورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/admin/course-requests/4', '2025-07-05 08:19:43', '2025-07-05 08:19:43'),
(9, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/5', '2025-07-05 08:24:06', '2025-07-05 08:24:06'),
(10, 'طلب انضمام جديد لدورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/admin/course-requests/6', '2025-07-06 01:51:52', '2025-07-06 01:51:52'),
(11, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/5', '2025-07-06 01:53:02', '2025-07-06 01:53:02'),
(12, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/5', '2025-07-06 01:55:30', '2025-07-06 01:55:30'),
(13, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/5', '2025-07-06 02:18:36', '2025-07-06 02:18:36'),
(14, 'طلب انضمام جديد لدورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/admin/course-requests/6', '2025-07-06 02:24:46', '2025-07-06 02:24:46'),
(15, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/5', '2025-07-06 02:25:18', '2025-07-06 02:25:18'),
(16, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/8', '2025-07-06 02:52:10', '2025-07-06 02:52:10'),
(17, 'طلب انضمام جديد لدورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/admin/course-requests/9', '2025-07-06 02:54:17', '2025-07-06 02:54:17'),
(18, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/8', '2025-07-06 02:55:09', '2025-07-06 02:55:09'),
(19, 'طلب انضمام جديد لدورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/admin/course-requests/17', '2025-07-06 03:56:21', '2025-07-06 03:56:21'),
(20, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/18', '2025-07-06 04:22:56', '2025-07-06 04:22:56'),
(21, 'طلب انضمام جديد لدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/admin/course-requests/18', '2025-07-06 04:30:27', '2025-07-06 04:30:27'),
(22, ' تم الموافقة علي طلب انضمام مستفدينكم للدورة', 'https://assem.visions-sa.com/association/courses/requests', '2025-07-06 05:28:52', '2025-07-06 05:28:52'),
(23, ' قم مركز جديد بالتسجيل:  مركز بادر', 'https://assem.visions-sa.com/admin/centers/2', '2025-07-14 00:53:02', '2025-07-14 00:53:02'),
(24, ' قمت جمعية جديدة بالتسجيل:  جمعية تعاون', 'https://assem.visions-sa.com/admin/associations/2', '2025-07-14 00:55:11', '2025-07-14 00:55:11'),
(25, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://assem.visions-sa.com/center/courses/3', '2025-07-27 13:32:31', '2025-07-27 13:32:31'),
(26, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://assem.visions-sa.com/center/courses/4', '2025-07-27 13:37:47', '2025-07-27 13:37:47'),
(27, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://assem.visions-sa.com/center/courses/5', '2025-07-27 13:45:33', '2025-07-27 13:45:33'),
(28, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة الخياطة', 'https://assem.visions-sa.com/center/courses/4', '2025-08-03 02:24:42', '2025-08-03 02:24:42'),
(29, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة الخياطة', 'https://assem.visions-sa.com/center/courses/4', '2025-08-03 02:29:30', '2025-08-03 02:29:30'),
(30, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/center/courses/3', '2025-08-03 02:30:09', '2025-08-03 02:30:09'),
(31, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة الخياطة', 'https://assem.visions-sa.com/center/courses/4', '2025-08-03 02:30:32', '2025-08-03 02:30:32'),
(32, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/center/courses/3', '2025-08-03 02:31:00', '2025-08-03 02:31:00'),
(33, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://assem.visions-sa.com/center/courses/6', '2025-08-03 02:32:59', '2025-08-03 02:32:59'),
(34, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة المكياج', 'https://assem.visions-sa.com/center/courses/6', '2025-08-03 02:40:00', '2025-08-03 02:40:00'),
(35, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة المكياج', 'https://assem.visions-sa.com/center/courses/6', '2025-08-03 02:42:52', '2025-08-03 02:42:52'),
(36, ' قمت جمعية عاصم  بتعديل بيانات الدورة دورة خطوة نحو تعلم اللغة الانجليزية', 'https://assem.visions-sa.com/center/courses/3', '2025-08-03 02:42:57', '2025-08-03 02:42:57'),
(37, ' قمت جمعية عاصم  بتعديل بيانات الدورة مبادرة التعليم التنموي', 'https://assem.visions-sa.com/center/courses/1', '2025-08-03 08:37:07', '2025-08-03 08:37:07'),
(38, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://asem.org.sa/center/courses/7', '2025-08-04 21:49:35', '2025-08-04 21:49:35'),
(39, ' قمت جمعية عاصم  بتعديل بيانات الدورة test er', 'https://asem.org.sa/center/courses/7', '2025-08-04 21:52:46', '2025-08-04 21:52:46'),
(40, ' قمت جمعية عاصم  بتعديل بيانات الدورة مبادرة التعليم التنموي', 'https://asem.org.sa/center/courses/1', '2025-08-04 23:45:36', '2025-08-04 23:45:36'),
(41, ' قمت جمعية عاصم  بتعديل بيانات الدورة مبادرة التعليم التنموي', 'https://asem.org.sa/center/courses/1', '2025-08-05 00:04:30', '2025-08-05 00:04:30'),
(42, ' قمت جمعية عاصم  بإضافتك إلي دورة جديدة', 'https://asem.org.sa/center/courses/8', '2025-08-05 01:13:56', '2025-08-05 01:13:56'),
(43, ' قمت جمعية عاصم  بتعديل بيانات الدورة tretre', 'https://asem.org.sa/center/courses/8', '2025-08-05 01:24:08', '2025-08-05 01:24:08'),
(44, ' قمت جمعية عاصم  بتعديل بيانات الدورة tretre', 'https://asem.org.sa/center/courses/8', '2025-08-05 01:25:21', '2025-08-05 01:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_user_alert`
--

INSERT INTO `user_user_alert` (`user_alert_id`, `user_id`, `read`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 3, 0),
(5, 1, 1),
(6, 1, 0),
(7, 1, 1),
(8, 1, 1),
(9, 1, 0),
(10, 1, 0),
(11, 1, 1),
(12, 1, 0),
(13, 1, 0),
(14, 1, 0),
(15, 1, 0),
(16, 1, 0),
(17, 1, 0),
(18, 1, 0),
(19, 1, 0),
(20, 1, 0),
(21, 1, 0),
(22, 3, 0),
(23, 1, 0),
(24, 1, 0),
(25, 4, 0),
(26, 6, 0),
(27, 6, 0),
(28, 6, 0),
(29, 6, 0),
(30, 4, 0),
(31, 6, 0),
(32, 4, 0),
(33, 6, 0),
(34, 6, 0),
(35, 6, 0),
(36, 4, 0),
(37, 6, 0),
(38, 6, 0),
(39, 6, 0),
(40, 6, 0),
(41, 6, 0),
(42, 6, 0),
(43, 6, 0),
(44, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_10573079` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_10573080` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_10556535` (`category_id`),
  ADD KEY `center_fk_10556554` (`center_id`),
  ADD KEY `goal_fk_10627169` (`goal_id`),
  ADD KEY `supporter_fk_10627181` (`supporter_id`);

--
-- Indexes for table `course_attendances`
--
ALTER TABLE `course_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_fk_882224` (`course_id`),
  ADD KEY `course_fk_88522364` (`course_student_id`);

--
-- Indexes for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_requests_association_id_foreign` (`association_id`),
  ADD KEY `course_requests_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_fk_8821564` (`course_id`),
  ADD KEY `association_fk_10573079` (`association_id`),
  ADD KEY `course_reques_fk_10573088` (`course_request_id`);

--
-- Indexes for table `curricula`
--
ALTER TABLE `curricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_fk_10556636` (`course_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hawkam_categories`
--
ALTER TABLE `hawkam_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hawkmas`
--
ALTER TABLE `hawkmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_10251858` (`category_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_10551838` (`role_id`),
  ADD KEY `permission_id_fk_10551838` (`permission_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_categories`
--
ALTER TABLE `report_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_10551847` (`user_id`),
  ADD KEY `role_id_fk_10551847` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporters`
--
ALTER TABLE `supporters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supporters_phone_unique` (`phone`),
  ADD UNIQUE KEY `supporters_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_10573086` (`user_alert_id`),
  ADD KEY `user_id_fk_10573086` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_attendances`
--
ALTER TABLE `course_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_requests`
--
ALTER TABLE `course_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `curricula`
--
ALTER TABLE `curricula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hawkam_categories`
--
ALTER TABLE `hawkam_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hawkmas`
--
ALTER TABLE `hawkmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_categories`
--
ALTER TABLE `report_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supporters`
--
ALTER TABLE `supporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `associations`
--
ALTER TABLE `associations`
  ADD CONSTRAINT `user_fk_10573079` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `user_fk_10573080` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `category_fk_10556535` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `center_fk_10556554` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `goal_fk_10627169` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`),
  ADD CONSTRAINT `supporter_fk_10627181` FOREIGN KEY (`supporter_id`) REFERENCES `supporters` (`id`);

--
-- Constraints for table `course_attendances`
--
ALTER TABLE `course_attendances`
  ADD CONSTRAINT `course_fk_882224` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_fk_88522364` FOREIGN KEY (`course_student_id`) REFERENCES `course_students` (`id`);

--
-- Constraints for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD CONSTRAINT `course_requests_association_id_foreign` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_requests_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `association_fk_10573079` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`),
  ADD CONSTRAINT `course_fk_8821564` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_reques_fk_10573088` FOREIGN KEY (`course_request_id`) REFERENCES `course_requests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `curricula`
--
ALTER TABLE `curricula`
  ADD CONSTRAINT `course_fk_10556636` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `hawkmas`
--
ALTER TABLE `hawkmas`
  ADD CONSTRAINT `category_fk_10251858` FOREIGN KEY (`category_id`) REFERENCES `hawkam_categories` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_10551838` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_10551838` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_10551847` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_10551847` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_10573086` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_10573086` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
