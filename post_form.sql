CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sub_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `post_form`.`posts` (`title`, `body`, `image`, `price`, `address`, `category_id`, `subcategory_id`) VALUES ('This is post one', 'This is the body of post one', 'default.png', '877', 'New Delhi', '1', '2');
INSERT INTO `post_form`.`posts` (`title`, `body`, `image`, `price`, `address`, `category_id`, `subcategory_id`) VALUES ('post two', 'This is the body of post two.', 'default.png', '2342', 'Mumbai', '2', '3');
INSERT INTO `post_form`.`posts` (`title`, `body`, `image`, `price`, `address`, `category_id`, `subcategory_id`) VALUES ('post three', 'This is the body of post three', 'default.png', '2322', 'Kolkata', '3', '4');
INSERT INTO `post_form`.`posts` (`title`, `body`, `image`, `price`, `address`, `category_id`, `subcategory_id`) VALUES ('post four', 'This is the body of post four.', 'default.png', '5342', 'Indore', '4', '5');


INSERT INTO `post_form`.`category` (`name`) VALUES ('Technology');
INSERT INTO `post_form`.`category` (`name`) VALUES ('Business');
INSERT INTO `post_form`.`category` (`name`) VALUES ('Art');
INSERT INTO `post_form`.`category` (`name`) VALUES ('Culture');


INSERT INTO `post_form`.`sub_category` (`name`, `category_id`) VALUES ('Java', '1');
INSERT INTO `post_form`.`sub_category` (`name`, `category_id`) VALUES ('Hotel', '2');
INSERT INTO `post_form`.`sub_category` (`name`, `category_id`) VALUES ('Painter', '3');
INSERT INTO `post_form`.`sub_category` (`name`, `category_id`) VALUES ('Dance', '4');


