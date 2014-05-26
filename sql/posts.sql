CREATE TABLE IF NOT EXISTS `posts` (
  `id` 			int(32) NOT NULL AUTO_INCREMENT,
  `title` 		varchar(255)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` 		varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author`  	varchar(200)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` 	timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent` 		int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;