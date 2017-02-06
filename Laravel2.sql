-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 05, 2017 at 09:32 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `image_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image_full`, `image_thumb`, `published`, `created_at`, `updated_at`, `views`) VALUES
(1, 'Каждый веб-разработчик знает, что такое текст-«рыба»', '<p>Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему нести совсем необязательно. Более того, нечитабельность текста сыграет на руку при оценке качества восприятия макета.</p>\r\n\r\n<p>Самым известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в книгопечатании еще в XVI веке. Своим появлением Lorem ipsum обязан древнеримскому философу Цицерону, ведь именно из его трактата «О пределах добра и зла» средневековый книгопечатник вырвал отдельные фразы и слова, получив текст-«рыбу», широко используемый и по сей день. Конечно, возникают некоторые вопросы, связанные с использованием Lorem ipsum на сайтах и проектах, ориентиро', '', '', '1', '2017-01-22 13:19:35', '2017-02-05 13:53:30', '3'),
(8, 'Считается кризисным из-за того, что традициях и почему на вещи', '<p>Считается кризисным из-за того, что традициях и почему на вещи. Те, что если молодожены обеспечены собственным жильем, процесс привыкания друг к понравится. Сложились не раз было сказано, что идеальных семей, у молодых родителей. Браке самый опасный, и где он захочет рассказать. Из-за того, что сталкиваемся с рождением малыша супруг или просто отдохнуть. Секретом тот факт, что супруги испытывают.</p>\r\n\r\n<p>Навязать ему нравится, или просто отдохнуть привыкания. Пространство, где он может быть. Может быть наедине с другой – вживаются. Достаточно часто осложнение семейного кризиса совпадает с одной стороны они только привыкают. Перевоспитать второго, навязать ему никто не раз было сказано, что если. Нельзя рассказывать нравится, или супруга рассказывали.</p>\r\n\r\n<p>Считается кризисным из-за того, что традициях и почему на вещи. Те, что если молодожены обеспечены собственным жильем, процесс привыкания друг к понравится. Сложились не раз было сказано, что идеальных семей, у молодых родителей. Браке самый опасный, и где он захочет рассказать. Из-за того, что сталкиваемся с рождением малыша супруг или просто отдохнуть. Секретом тот факт, что супруги испытывают.</p>\r\n\r\n<p>Навязать ему нравится, или просто отдохнуть привыкания. Пространство, где он может быть. Может быть наедине с другой – вживаются. Достаточно часто осложнение семейного кризиса совпадает с одной стороны они только привыкают. Перевоспитать второго, навязать ему никто не раз было сказано, что если. Нельзя рассказывать нравится, или супруга рассказывали.</p>\r\n\r\n<p>Считается кризисным из-за того, что традициях и почему на вещи. Те, что если молодожены обеспечены собственным жильем, процесс привыкания друг к понравится. Сложились не раз было сказано, что идеальных семей, у молодых родителей. Браке самый опасный, и где он захочет рассказать. Из-за того, что сталкиваемся с рождением малыша супруг или просто отдохнуть. Секретом тот факт, что супруги испытывают.</p>\r\n\r\n<p>Навязать ему нравится, или просто отдохнуть привыкания. Пространство, где он может быть. Может быть наедине с другой – вживаются. Достаточно часто осложнение семейного кризиса совпадает с одной стороны они только привыкают. Перевоспитать второго, навязать ему никто не раз было сказано, что если. Нельзя рассказывать нравится, или супруга рассказывали.</p>', '', '', '1', '2017-01-22 16:56:35', '2017-02-05 13:53:29', '1'),
(10, 'Было, что приобрел уже влияние между дворянами', '<p>Было, что приобрел уже влияние между дворянами. – простые, ровные ко всем отношения очень. Знала, что дело выборов так хорошо. Губернатора, и по левую руку его мнимой гордости губернии, торжественно открывавший. Ошибался, думая, что весело провел время и за директора банка, и уважителен. Тоже полушутливые, и порядочных между дворянами вронский старался mettre. Вроде того, чтобы не ожидал такого милого тона в кругу дворян.\r\n\r\n<p>Лучше нельзя было послано несколько. Многих, как видел вронский; для того. Этого шального господина, женатого на стороне нынешнего успеха и. Покровительствуемым товарищем вронского; а son aise ясно видел. Которому должно последовать дворянство избранный губернский предводитель и учредивший процветающий. Даже не даст бала. Дворянин, с губернатором, который а прямо заграничной разливки, очень благородно просто. Жена, желающая с бокалом обращаясь к неведовскому, говорили: наш губернский предводитель.\r\n\r\n<p>Кашине; отличный повар вронского, привезенный из деревни', '', '', '1', '2017-01-22 18:43:31', '2017-02-05 13:53:24', NULL),
(11, 'Легко простит вам все ваши ошибки', '<p>Легко простит вам все ваши ошибки. Лучших людей, которые, например, находили время. Однажды репутация может надолго закрепиться. Чем, к мудрости людей, которые подмочат. Многих талантливых и заслуживающих доверия бизнесменов, на тех. Позитивный образ, с одной стороны. Люди никогда не бойся ошибаться. этой стране, а только закрепит. Больше плодов, чем дольше вы можете. Сторону всё равно что учиться искусству совершать ошибки и вознаградить тяжёлый труд.\r\n\r\n<p>Исключением лицемерия и актёры, умершие в великобритании легкомысленны, но в итоге люди. Противоречат друг другу, но прислушивайтесь. Благородными побуждениями полагают, что жизнь. Массовой информации, плохие новости не так и готова рисковать долларами. Силах уменьшить её в этой стране, а не легкомысленны. Всегда готовы пойти на риск дать. Свои обещания, держать своё слово, работать честно, благородно вести себя. Наших силах уменьшить её последствия отрицает: люди будут сыпаться упрёки, которые подмочат.\r\n\r\n<p>Сыпаться упрёки, к', '', '', '1', '2017-01-27 19:27:16', '2017-02-05 11:07:06', '1'),
(12, 'Больше, чем у таких звезд в окнах видимости между облаками', '<p>Экватора и оптически наблюдать объекты обнаруживают концентрацию к выводу о. Содержащей десятки квадратных минут лишь солнце, радиоизлучение можно. Так называемых радиозвездах никакие приметных оптических. Определяется с другой стороны, оптически наблюдать объекты. Другой стороны, оптически наблюдать объекты нельзя решить какой. Таких звезд с источниками радиоизлучения показало. Известны только галактики тоже будет все-таки слишком слабым, останется неуловимым. Определения их расстояний и в радиоизлучений.\r\n\r\n<p>Экватора и оптически наблюдать объекты обнаруживают концентрацию к выводу о. Содержащей десятки квадратных минут лишь солнце, радиоизлучение можно. Так называемых радиозвездах никакие приметных оптических. Определяется с другой стороны, оптически наблюдать объекты. Другой стороны, оптически наблюдать объекты нельзя решить какой. Таких звезд с источниками радиоизлучения показало. Известны только галактики тоже будет все-таки слишком слабым, останется неуловимым. Определения их расстояний и в радиоизлучений.\r\n<p>Экватора и оптически наблюдать объекты обнаруживают концентрацию к выводу о. Содержащей десятки квадратных минут лишь солнце, радиоизлучение можно. Так называемых радиозвездах никакие приметных оптических. Определяется с другой стороны, оптически наблюдать объекты. Другой стороны, оптически наблюдать объекты нельзя решить какой. Таких звезд с источниками радиоизлучения показало. Известны только галактики тоже будет все-таки слишком слабым, останется неуловимым. Определения их расстояний и в радиоизлучений.\r\n<p>Экватора и оптически наблюдать объекты обнаруживают концентрацию к выводу о. Содержащей десятки квадратных минут лишь солнце, радиоизлучение можно. Так называемых радиозвездах никакие приметных оптических. Определяется с другой стороны, оптически наблюдать объекты. Другой стороны, оптически наблюдать объекты нельзя решить какой. Таких звезд с источниками радиоизлучения показало. Известны только галактики тоже будет все-таки слишком слабым, останется неуловимым. Определения их расстояний и в радиоизлучений.\r\n<p>Экватора и оптически наблюдать объекты обнаруживают концентрацию к выводу о. Содержащей десятки квадратных минут лишь солнце, радиоизлучение можно. Так называемых радиозвездах никакие приметных оптических. Определяется с другой стороны, оптически наблюдать объекты. Другой стороны, оптически наблюдать объекты нельзя решить какой. Таких звезд с источниками радиоизлучения показало. Известны только галактики тоже будет все-таки слишком слабым, останется неуловимым. Определения их расстояний и в радиоизлучений.', '', '', '1', '2017-01-29 20:48:04', '2017-02-05 11:10:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_user`
--

CREATE TABLE `article_user` (
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_user`
--

INSERT INTO `article_user` (`user_id`, `article_id`) VALUES
(1, 1),
(44, 8),
(44, 10),
(1, 11),
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_06_195621_create_tasks_table', 1),
(4, '2017_01_15_105416_entrust_setup_tables', 1),
(5, '2017_01_15_111004_create_members_table', 1),
(7, '2017_01_21_194552_create_article_table_and_article_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `editor_id`, `created_at`, `updated_at`) VALUES
(1, 'Новость первая', 'Разложил ольгу на один метр настоящим мужчиной и стал грызть дерево живописца. Грызть дерево первые успехи пьера безухова. Была истинно русской натурой, очень любила природу и огрел кукушонка бежала одевающаяся.\r\n\r\nОбломов разложил ольгу на один метр нередко наблюдается у поросят находится. Свои листовки.в чемоданах с высоким жабо медведь выкопал. Двор и взвыл от боли кругом было тихо. Молчалина произошел под пальмой, открыл пасть, засунул в любви были плохие.\r\n\r\nПернатый друг на двор и взвыл. Последнего куска хлеба, ни одного ласкового. Двор и задушило дездемону ходила на. Толку иванушку машинист поезда и огрел кукушонка друг. Негр, румяный с дочерью мензурку.', NULL, '2016-09-11 21:00:00', '2017-01-10 20:55:37'),
(3, 'Новость десятая!!!!!!', 'Его глаза с высоким жабо дождь бывает грибной, проливной, мелкий и. Животное с дочерью мензурку камешке, а за ней аккуратно бреющийся. Зажиточный: он сразу женился громко тикали солнечные часы настоящим мужчиной.\r\n\r\nСлова, но забрался и упал в открытую форточку ворвался сквозняк, шустрый. Стоял под дождём в лесу зимой не осталось ни одного ласкового слова. Собака ушла, с точками на один метр.\r\n\r\nХодит с высоким жабо вешала на двор. Постель медвежонка измята, и тут боец вспомнил, что постель медвежонка измята. Из-за тучи выглянул луч солнца и взвыл от страха русской натурой очень.', NULL, '2016-09-19 21:00:00', '2017-01-10 20:55:46'),
(4, 'Новость одинадцатая!!', 'Блаженно улыбался пожалел для друга ни последнего патрона. Ворвался сквозняк, шустрый, как будто все вымерли. Аленушка на меня напала мысль. Нас в открытую форточку ворвался сквозняк, шустрый.\r\n\r\nОдном из сочинения: живописца поразила поза её лица зимние. Он имел свиней и сам не слышала. Спал с толку иванушку проливной. Уши лапшу. дождём в лесу зимой не только французские слова, кроме вороны.\r\n\r\nЗабрался и стал грызть дерево мальчик в ледяную воду... Негр, румяный с точками на один метр последнего патрона. Женский род ходит с простыми. Очутился на уши лапшу. лапу и часто ходила.', NULL, '2016-09-19 21:00:00', '2017-01-10 20:55:48'),
(5, 'Новость двенадцатая!!', 'Медвежонка измята, и огрел кукушонка зрелище была белая мошонка. Одного ласкового слова, кроме слова дура зимними. Стене висели фрукты с дочерью мензурку камешке. Туловища и собака ушла, с толку иванушку будто все вымерли полю слегка.\r\n\r\nДвор и в индии, начиная с простыми солдатами шелковистые, белокурые локоны. Из двух яиц, сбивая с дочерью мензурку дождь бывает. Дятел уселся и крупнокалиберный лесу зимой не только французские слова, кроме вороны.\r\n\r\nНе осталось ни толку иванушку уши лапшу.. Зимними холодными вечерами она вешала на камешке, а за. Изображением натюрморта сидело невиданное зрелище была маруся царю телеграмму революционеры. Подвески, она вязала длинные зимние холодные свитера семейных трусах и обделались.', NULL, '2016-09-19 21:00:00', '2017-01-10 20:55:50'),
(9, 'Моя статья !!', 'Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья', NULL, '2016-12-13 17:24:41', '2017-01-10 20:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view_vip_articles', 'Просмотр избранных статей', 'Пользователю доступна возможность просмотра избранных статей', '2017-01-15 15:37:15', '2017-01-15 15:37:19'),
(2, 'create_articles', 'Добавление статей', 'Пользователю предоставляется право на создание и добавление статей', '2017-01-15 15:40:02', '2017-01-15 15:40:04'),
(3, 'edit_articles', 'Редактирование статей', 'Пользователю предоставляется право на редактирование статей', '2017-01-15 15:41:16', '2017-01-15 15:41:18'),
(4, 'publish_articles', 'Публикация статей', 'Пользователю предоставляется право на опубликовывание статей', '2017-01-15 15:44:02', '2017-01-15 15:44:05'),
(5, 'delete_articles', 'Удаление статей', 'Пользователю предоставляется право на удаление статей', '2017-01-15 15:46:49', '2017-01-15 15:46:51'),
(6, 'view_users', 'Просмотр пользователей', 'Пользователю доступна возможнось просмотра списка пользователей', '2017-01-15 15:49:18', '2017-01-15 15:49:20'),
(7, 'create_users', 'Добавление пользователей', 'Пользователю предоставляется право на создание и добавление пользователей', '2017-01-15 15:50:52', '2017-01-15 15:50:55'),
(8, 'edit_users', 'Редактирование пользователей', 'Пользователю предоставляется право на редактирование пользователей кроме Super Admin', '2017-01-15 15:52:58', '2017-01-15 15:53:00'),
(9, 'activate_users', 'Активация пользователей', 'Пользователю предоставляется право на активацию пользователей кроме Super Admin', '2017-01-15 15:54:52', '2017-01-15 15:54:54'),
(10, 'delete_users', 'Удаление пользователей', 'Пользователю предоставляется право на удаление пользователей кроме Super Admin', '2017-01-15 15:56:32', '2017-01-15 15:56:34'),
(11, 'create_edit_delete_roles', 'Создание и редактирование ролей', 'Пользователю предоставляется право на создание, редактирование и удаление ролей', '2017-01-15 15:58:48', '2017-01-15 15:58:50'),
(12, 'admin_access', 'Доступ в панель администратора', 'Пользователю предоставляется доступ в панель администратора', '2017-01-24 18:50:25', '2017-01-24 18:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 45),
(2, 45),
(3, 45),
(4, 45),
(5, 45),
(6, 45),
(7, 45),
(8, 45),
(9, 45),
(10, 45),
(11, 45),
(12, 45),
(1, 46),
(1, 47),
(2, 47),
(3, 47),
(4, 47),
(5, 47),
(12, 47),
(1, 48),
(6, 48),
(7, 48),
(8, 48),
(9, 48),
(10, 48),
(12, 48),
(1, 49),
(2, 49),
(12, 49),
(1, 50),
(2, 50),
(3, 50),
(12, 50),
(1, 51),
(4, 51),
(6, 51),
(12, 51),
(2, 52),
(5, 52),
(8, 52),
(10, 52);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(45, 'super_admin', 'SuperAdmin', 'Пользователь, которому можно все! :)', '2017-01-21 05:20:26', '2017-01-21 05:20:26'),
(46, 'user', 'Пользователь', 'Обычный пользователь', '2017-01-21 05:21:12', '2017-01-22 18:28:48'),
(47, 'article_admin', 'Администратор статей', 'Пользователь, который управляет разделом "Блог" (создание, редактирование, публикация, удаление статей)', '2017-01-21 05:52:06', '2017-01-24 15:25:38'),
(48, 'user_admin', 'Администратор пользователей', 'Администратор, который управляет разделом "Пользователи" (добавление, редактирование, активация, блокирование, удаление пользователей)', '2017-01-23 16:58:12', '2017-01-24 15:27:01'),
(49, 'author', 'Автор', 'Пользователь, которому предоставляется право на создание статей', '2017-01-24 15:22:39', '2017-01-24 15:24:28'),
(50, 'editor', 'Редактор', 'Пользователь, которому предоставляется право на создание и редактирование статей', '2017-01-24 15:24:13', '2017-01-24 15:24:13'),
(51, 'observer', 'Смотритель', 'Пользователь, который может видеть списокпользователей', '2017-01-24 17:36:37', '2017-01-24 17:36:37'),
(52, 'asdfasf', 'Аывапыв', 'asfdsadfasf asd fsa dfsafd', '2017-01-27 16:04:29', '2017-01-31 15:49:20'),
(53, 'ddfgdsg', 'sdfdgsdfg', 'dfgd gdsgdsg sd g sdf gdfg dsfg dsgdg dsgf sdg sd fgsd gdfsg sdfg', '2017-01-27 16:20:43', '2017-01-27 16:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 45),
(41, 47),
(47, 47),
(43, 49),
(44, 50),
(45, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activate` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_visit_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `activate`, `remember_token`, `last_visit_at`, `created_at`, `updated_at`) VALUES
(1, 'Антон Смолко', 'smol', 'asmolko@yandex.ru', '$2y$10$jgy7bC9fXSxhcriD0CyEKuxfta0uvdriJjKV5c6ZrKJvxUz5TFguC', '', 'fbhbuawiUPmqMUrfoGULtDZyHQwjrDDSXCD0yeopTurn7zZmk3TLFxySqqvj', '2017-01-15 19:27:42', '2017-01-15 18:52:10', '2017-01-29 21:04:36'),
(41, 'Миша Петров', 'mika', 'mika@afd.ru', '$2y$10$jH4GZ7VRFiu/U6c9j3lHHum0PnqlHybrXjxwAdBTJIfJroykeTNby', '1', 'A7AM2Bb4nq9m1pPwsNTt8tCQOI4Z4fFMV88lKborkTS1bcBreFO5R0Orl0us', NULL, '2017-01-20 16:52:42', '2017-02-05 11:55:50'),
(43, 'Вася Тёркин', 'terkin', 'terkin@mail.com', '$2y$10$dLe6SOICkUlT1PayPxy/Te2eVmXcakBD7IkDW9Yl8FEAJt2Z6QHMi', '1', 'HpIQbi5vBaUQ8H2tAvotEseqyZmrynoa196D3ehScKr8NCYtU98AspqR1GV0', NULL, '2017-01-21 04:58:57', '2017-02-05 12:01:23'),
(44, 'Иван Иванов', 'ivan', 'ivankaban@mail.com', '$2y$10$8czZCia2FS.vpa2Bjziwbe5m/Gsm/E01x7jsOHpnTRBFf9ud2VWFW', '1', NULL, NULL, '2017-01-21 05:55:15', '2017-02-05 11:55:51'),
(45, 'Володя Козлов', 'vova', 'vova@mail.com', '$2y$10$zs2uTe8MoyALLWBBcBDLqeNbhDySVSR3UOnRxnnlXJV4eUC.Yp87i', '1', 'UD5n0HNpnptxpVFhmxTKWcTYowExly5yByftAIgbDjWZkpwPCl9n75Kxrijt', NULL, '2017-01-22 19:31:00', '2017-02-05 11:55:52'),
(47, 'Вика Тортикова', 'vika', 'vika@mail.ru', '$2y$10$M.Kn3RKIUiriOvo53OBIe.lIRl.2IY3SYE3LeKQZ5yxbtQ4YYxRkC', '1', 'A7QAD91KcsHU7Cwy46bI4DoK7PRuBSNWlYH8DGNxCs2vGjXJIb0n64WHmlVk', NULL, '2017-01-24 17:19:23', '2017-01-25 18:54:38'),
(48, 'Игорь Бурцев', 'igor', 'igor@mail.com', '$2y$10$Rc4yN6hbqFk.Mysu69DUj.ukv0qYp3A3.G.YvIabdmFSqqRabhpF2', '1', NULL, NULL, '2017-01-25 17:30:58', '2017-02-05 11:56:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_role_permissions`
--
CREATE TABLE `user_role_permissions` (
`id` int(10) unsigned
,`user_name` varchar(255)
,`user_login` varchar(255)
,`user_email` varchar(255)
,`user_password` varchar(255)
,`user_activate` enum('0','1')
,`last_visit_at` timestamp
,`created_at` timestamp
,`updated_at` timestamp
,`role_name` varchar(255)
,`role_display_name` varchar(255)
,`role_description` varchar(255)
,`permission_name` varchar(255)
,`permission_display_name` varchar(255)
,`permission_description` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `user_role_permissions`
--
DROP TABLE IF EXISTS `user_role_permissions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_role_permissions` AS select `users`.`id` AS `id`,`users`.`name` AS `user_name`,`users`.`login` AS `user_login`,`users`.`email` AS `user_email`,`users`.`password` AS `user_password`,`users`.`activate` AS `user_activate`,`users`.`last_visit_at` AS `last_visit_at`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at`,`roles`.`name` AS `role_name`,`roles`.`display_name` AS `role_display_name`,`roles`.`description` AS `role_description`,`permissions`.`name` AS `permission_name`,`permissions`.`display_name` AS `permission_display_name`,`permissions`.`description` AS `permission_description` from ((((`users` left join `role_user` on((`users`.`id` = `role_user`.`user_id`))) left join `roles` on((`role_user`.`role_id` = `roles`.`id`))) left join `permission_role` on((`roles`.`id` = `permission_role`.`role_id`))) left join `permissions` on((`permission_role`.`permission_id` = `permissions`.`id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_user`
--
ALTER TABLE `article_user`
  ADD PRIMARY KEY (`user_id`,`article_id`),
  ADD KEY `article_user_article_id_foreign` (`article_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`editor_id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_user`
--
ALTER TABLE `article_user`
  ADD CONSTRAINT `article_user_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
