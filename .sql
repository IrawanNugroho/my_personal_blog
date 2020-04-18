CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(25) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `article_tag_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tags_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `statuses` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8


CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `content` varchar(15000) DEFAULT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `author` varchar(25) DEFAULT NULL,
  `slug` varchar(80) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status_id` tinyint(3) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8

INSERT INTO `statuses` (`id`,`name`,`description`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES (1,'Draft','Draft adalah artikel yang baru saja ditulis dan disimpan hanya untuk dilihat oleh admin saja. Edit gaes',1,'2020-02-21 22:58:58',1,'2020-02-21 22:59:28',1);
INSERT INTO `statuses` (`id`,`name`,`description`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES (2,'Review','Review adalah artikel yang sudah direview ulang. Kondisi ini bisanya sebelum publish',1,'2020-02-23 20:13:21',1,'2020-02-23 20:13:21',1);
INSERT INTO `statuses` (`id`,`name`,`description`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES (3,'Publish','Publish untuk artikel yang bisa dilihat secara publik',1,'2020-04-18 15:46:57',1,'2020-04-18 15:46:57',1);

INSERT INTO `categories` (`id`,`name`,`description`,`active`,`create_at`,`create_by`,`updated_at`,`update_by`) VALUES (1,'Uncategorized',NULL,1,'2020-03-07 02:03:10',1,'2020-03-07 02:10:11',1);
INSERT INTO `categories` (`id`,`name`,`description`,`active`,`create_at`,`create_by`,`updated_at`,`update_by`) VALUES (2,'Opini',NULL,1,'2020-03-07 02:10:11',1,'2020-03-07 02:10:11',1);

INSERT INTO `articles` (`id`,`title`,`content`,`excerpt`,`author`,`slug`,`active`,`status_id`,`category_id`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES (1,'My First Article','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus blandit orci, non fringilla augue pulvinar id. Praesent non dui eu enim blandit ornare. Vivamus bibendum eros eget molestie sagittis. Proin sed sapien congue, ullamcorper lorem fringilla, ullamcorper elit. Curabitur tempus mattis efficitur. Phasellus sapien nulla, tempor sit amet volutpat eu, tempor a sem. Etiam sagittis, massa at maximus aliquet, odio justo aliquet diam, nec maximus metus tortor sit amet arcu. Duis ultrices lacus eget accumsan gravida. Vestibulum sed ipsum gravida, euismod urna a, egestas mi. Fusce ornare orci at massa mollis, tincidunt egestas ligula convallis. In nec ultricies nunc, vel molestie libero. Aliquam metus tortor, malesuada ac quam sed, condimentum molestie ex. Aliquam vulputate sagittis quam vitae ultrices.</p>\r\n<p>In vitae tellus in eros auctor tristique. Nulla lobortis scelerisque arcu sed bibendum. Mauris mattis nisl quis tellus ornare posuere. Maecenas erat sem, egestas in condimentum id, vehicula id sapien. Nullam a egestas ante. Nam at nunc elit. Suspendisse lobortis tellus nec eros faucibus, ac tempor eros hendrerit. Vestibulum lacinia placerat rhoncus.</p>\r\n<p>Donec in enim augue. Phasellus ac urna sit amet ligula dapibus eleifend. Etiam nulla augue, auctor in aliquam et, sodales eget mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec consectetur sodales purus. Pellentesque in finibus massa. Pellentesque ut sollicitudin nibh. Donec nec urna elit. Integer eget diam dui. Aliquam ac congue odio. Donec eros neque, interdum ac purus suscipit, pretium elementum diam. Quisque vitae tristique tortor. Phasellus ligula purus, malesuada vitae commodo placerat, fringilla sit amet ligula. Fusce feugiat magna et magna pulvinar varius.</p>\r\n<p>Proin auctor euismod ultricies. Morbi aliquam at arcu in varius. Morbi pellentesque vitae odio id volutpat. Nam dapibus ipsum molestie libero finibus pharetra. Donec in elementum nibh. Sed turpis velit, tempor vitae mollis ac, sodales vel libero. In nec sem massa. Nulla vel turpis id ante ultricies iaculis. Donec dignissim feugiat est a pharetra. Nulla facilisi. Fusce et est ac lectus condimentum finibus a sed justo.</p>\r\n<p>Aenean porta purus tempor varius dignissim. Proin purus odio, tincidunt a massa et, mattis molestie odio. Curabitur enim nunc, commodo vitae suscipit eget, ullamcorper et erat. Integer eget dignissim nibh. Suspendisse non mi laoreet, malesuada leo non, hendrerit sapien. Vivamus sem odio, mollis sed aliquam ac, feugiat pellentesque nulla. Donec vitae bibendum tortor. Morbi at nunc at libero lobortis consectetur. Ut felis enim, dapibus quis sapien in, convallis feugiat eros. Sed sagittis vulputate lacus, eget commodo eros. Integer luctus sit amet arcu elementum tempus. Vivamus accumsan placerat tincidunt. Nullam a sodales erat.</p>','\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"','irawan','my-first-article-1',1,3,2,'2020-04-18 08:44:04',1,'2020-04-18 08:48:11',1);