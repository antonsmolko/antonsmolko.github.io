/*
 Navicat Premium Data Transfer

 Source Server         : PHP3
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : Laravel

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 01/23/2017 03:37:16 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `article_user`
-- ----------------------------
DROP TABLE IF EXISTS `article_user`;
CREATE TABLE `article_user` (
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`article_id`),
  KEY `article_user_article_id_foreign` (`article_id`),
  CONSTRAINT `article_user_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `article_user`
-- ----------------------------
BEGIN;
INSERT INTO `article_user` VALUES ('44', '1'), ('44', '8'), ('44', '10');
COMMIT;

-- ----------------------------
--  Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `articles`
-- ----------------------------
BEGIN;
INSERT INTO `articles` VALUES ('1', 'Статья', 'Контент статьи', '1', '2017-01-22 16:19:35', '2017-01-22 16:19:37', '3'), ('8', 'Статья Привет Привет Привет!', '<h2>Привет мир!</h2>\r\n<h2>Привет мир!</h2>\r\n<h2>Привет мир!</h2>', '1', '2017-01-22 19:56:35', '2017-01-22 20:19:54', null), ('10', 'Свапыап', 'ыапвпаа фыаыфв авфа фв а', '', '2017-01-22 21:43:31', '2017-01-22 21:43:39', null);
COMMIT;

-- ----------------------------
--  Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2017_01_06_195621_create_tasks_table', '1'), ('4', '2017_01_15_105416_entrust_setup_tables', '1'), ('5', '2017_01_15_111004_create_members_table', '1'), ('7', '2017_01_21_194552_create_article_table_and_article_user_table', '2'), ('8', '2017_01_22_115501_change_table_articles', '3');
COMMIT;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`editor_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=cp1251;

-- ----------------------------
--  Records of `news`
-- ----------------------------
BEGIN;
INSERT INTO `news` VALUES ('1', 'Новость первая', 'Разложил ольгу на один метр настоящим мужчиной и стал грызть дерево живописца. Грызть дерево первые успехи пьера безухова. Была истинно русской натурой, очень любила природу и огрел кукушонка бежала одевающаяся.\r\n\r\nОбломов разложил ольгу на один метр нередко наблюдается у поросят находится. Свои листовки.в чемоданах с высоким жабо медведь выкопал. Двор и взвыл от боли кругом было тихо. Молчалина произошел под пальмой, открыл пасть, засунул в любви были плохие.\r\n\r\nПернатый друг на двор и взвыл. Последнего куска хлеба, ни одного ласкового. Двор и задушило дездемону ходила на. Толку иванушку машинист поезда и огрел кукушонка друг. Негр, румяный с дочерью мензурку.', null, '2016-09-12 00:00:00', '2017-01-10 23:55:37'), ('3', 'Новость десятая!!!!!!', 'Его глаза с высоким жабо дождь бывает грибной, проливной, мелкий и. Животное с дочерью мензурку камешке, а за ней аккуратно бреющийся. Зажиточный: он сразу женился громко тикали солнечные часы настоящим мужчиной.\r\n\r\nСлова, но забрался и упал в открытую форточку ворвался сквозняк, шустрый. Стоял под дождём в лесу зимой не осталось ни одного ласкового слова. Собака ушла, с точками на один метр.\r\n\r\nХодит с высоким жабо вешала на двор. Постель медвежонка измята, и тут боец вспомнил, что постель медвежонка измята. Из-за тучи выглянул луч солнца и взвыл от страха русской натурой очень.', null, '2016-09-20 00:00:00', '2017-01-10 23:55:46'), ('4', 'Новость одинадцатая!!', 'Блаженно улыбался пожалел для друга ни последнего патрона. Ворвался сквозняк, шустрый, как будто все вымерли. Аленушка на меня напала мысль. Нас в открытую форточку ворвался сквозняк, шустрый.\r\n\r\nОдном из сочинения: живописца поразила поза её лица зимние. Он имел свиней и сам не слышала. Спал с толку иванушку проливной. Уши лапшу. дождём в лесу зимой не только французские слова, кроме вороны.\r\n\r\nЗабрался и стал грызть дерево мальчик в ледяную воду... Негр, румяный с точками на один метр последнего патрона. Женский род ходит с простыми. Очутился на уши лапшу. лапу и часто ходила.', null, '2016-09-20 00:00:00', '2017-01-10 23:55:48'), ('5', 'Новость двенадцатая!!', 'Медвежонка измята, и огрел кукушонка зрелище была белая мошонка. Одного ласкового слова, кроме слова дура зимними. Стене висели фрукты с дочерью мензурку камешке. Туловища и собака ушла, с толку иванушку будто все вымерли полю слегка.\r\n\r\nДвор и в индии, начиная с простыми солдатами шелковистые, белокурые локоны. Из двух яиц, сбивая с дочерью мензурку дождь бывает. Дятел уселся и крупнокалиберный лесу зимой не только французские слова, кроме вороны.\r\n\r\nНе осталось ни толку иванушку уши лапшу.. Зимними холодными вечерами она вешала на камешке, а за. Изображением натюрморта сидело невиданное зрелище была маруся царю телеграмму революционеры. Подвески, она вязала длинные зимние холодные свитера семейных трусах и обделались.', null, '2016-09-20 00:00:00', '2017-01-10 23:55:50'), ('9', 'Моя статья !!', 'Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья Моя статья', null, '2016-12-13 20:24:41', '2017-01-10 23:55:54');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permission_role`
-- ----------------------------
BEGIN;
INSERT INTO `permission_role` VALUES ('1', '45'), ('2', '45'), ('3', '45'), ('4', '45'), ('5', '45'), ('6', '45'), ('7', '45'), ('8', '45'), ('9', '45'), ('10', '45'), ('11', '45'), ('1', '46'), ('1', '47'), ('2', '47'), ('3', '47'), ('4', '47'), ('5', '47'), ('6', '47');
COMMIT;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permissions`
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES ('1', 'view_vip_articles', 'Просмотр избранных статей', 'Пользователю доступна возможность просмотра избранных статей', '2017-01-15 18:37:15', '2017-01-15 18:37:19'), ('2', 'add_articles', 'Добавление статей', 'Пользователю предоставляется право на создание и добавление статей', '2017-01-15 18:40:02', '2017-01-15 18:40:04'), ('3', 'edit_articles', 'Редактирование статей', 'Пользователю предоставляется право на редактирование статей', '2017-01-15 18:41:16', '2017-01-15 18:41:18'), ('4', 'publish_articles', 'Публикация статей', 'Пользователю предоставляется право на опубликовывание статей', '2017-01-15 18:44:02', '2017-01-15 18:44:05'), ('5', 'delete_articles', 'Удаление статей', 'Пользователю предоставляется право на удаление статей', '2017-01-15 18:46:49', '2017-01-15 18:46:51'), ('6', 'view_users', 'Просмотр пользователей', 'Пользователю доступна возможнось просмотра списка пользователей', '2017-01-15 18:49:18', '2017-01-15 18:49:20'), ('7', 'add_users', 'Добавление пользователей', 'Пользователю предоставляется право на создание и добавление пользователей', '2017-01-15 18:50:52', '2017-01-15 18:50:55'), ('8', 'edit_users', 'Редактирование пользователей', 'Пользователю предоставляется право на редактирование пользователей кроме Super Admin', '2017-01-15 18:52:58', '2017-01-15 18:53:00'), ('9', 'activate_users', 'Активация пользователей', 'Пользователю предоставляется право на активацию пользователей кроме Super Admin', '2017-01-15 18:54:52', '2017-01-15 18:54:54'), ('10', 'delete_users', 'Удаление пользователей', 'Пользователю предоставляется право на удаление пользователей кроме Super Admin', '2017-01-15 18:56:32', '2017-01-15 18:56:34'), ('11', 'add_edit_delete_roles', 'Создание и редактирование ролей', 'Пользователю предоставляется право на создание, редактирование и удаление ролей', '2017-01-15 18:58:48', '2017-01-15 18:58:50');
COMMIT;

-- ----------------------------
--  Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `role_user`
-- ----------------------------
BEGIN;
INSERT INTO `role_user` VALUES ('1', '45'), ('44', '45'), ('45', '45'), ('46', '45'), ('41', '46'), ('43', '47');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('45', 'super_admin', 'SuperAdmin', 'Пользователь, которому можно все! :)', '2017-01-21 08:20:26', '2017-01-21 08:20:26'), ('46', 'user', 'Пользователь', 'Обычный пользователь', '2017-01-21 08:21:12', '2017-01-22 21:28:48'), ('47', 'admin', 'Администратор', 'Пользователь-руководитель', '2017-01-21 08:52:06', '2017-01-21 08:52:06');
COMMIT;

-- ----------------------------
--  Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activate` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_visit_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Антон Смолко', 'smol', 'asmolko@yandex.ru', '123456', null, null, '2017-01-15 22:27:42', '2017-01-15 21:52:10', '2017-01-20 12:34:55'), ('41', 'Миша', 'mika', 'mika@afd.ru', '123456', '1', null, null, '2017-01-20 19:52:42', '2017-01-20 19:52:42'), ('43', 'Вася Пупкин', 'pupkin', 'pupkin@mail.com', 'pupkin', '1', null, null, '2017-01-21 07:58:57', '2017-01-21 07:58:57'), ('44', 'Ваня Смолко', 'ivan', 'ivankaban@mail.com', '123456', '1', null, null, '2017-01-21 08:55:15', '2017-01-21 08:55:15'), ('45', 'Иван Иванов', 'ivanov', 'ivanov@mail.com', '$2y$10$nfTzytJi0rK5S7PyjfecfejguOHfmtUg7SSfNcS15ILKjsS9Jxu4G', '1', null, null, '2017-01-22 22:31:00', '2017-01-22 22:57:42'), ('46', 'Анатолий', 'tolik', 'tolik@mail.ru', '$2y$10$Zq6Z6e9cQM4I7kBjjGdEMeSO8Tex2Z3gMX9qWDGF50QFHXcmnhRuq', '1', 'o28i5fmUWcyy3UIFe4oQaj0ubqvLNRKLvgOLDSG3UBtyU1x45cQJz3MzdQlG', null, '2017-01-22 23:02:42', '2017-01-23 00:30:51');
COMMIT;

-- ----------------------------
--  View structure for `user_role_permissions`
-- ----------------------------
DROP VIEW IF EXISTS `user_role_permissions`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_role_permissions` AS select `users`.`id` AS `id`,`users`.`name` AS `user_name`,`users`.`login` AS `user_login`,`users`.`email` AS `user_email`,`users`.`password` AS `user_password`,`users`.`activate` AS `user_activate`,`users`.`last_visit_at` AS `last_visit_at`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at`,`roles`.`name` AS `role_name`,`roles`.`display_name` AS `role_display_name`,`roles`.`description` AS `role_description`,`permissions`.`name` AS `permission_name`,`permissions`.`display_name` AS `permission_display_name`,`permissions`.`description` AS `permission_description` from ((((`users` left join `role_user` on((`users`.`id` = `role_user`.`user_id`))) left join `roles` on((`role_user`.`role_id` = `roles`.`id`))) left join `permission_role` on((`roles`.`id` = `permission_role`.`role_id`))) left join `permissions` on((`permission_role`.`permission_id` = `permissions`.`id`)));

SET FOREIGN_KEY_CHECKS = 1;
