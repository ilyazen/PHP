CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
    `prev_description` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

ALTER TABLE `notes` ADD `status` VARCHAR(128) NOT NULL DEFAULT 'Выполняется' AFTER `description`;