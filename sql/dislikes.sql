CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` 			int(32) NOT NULL AUTO_INCREMENT,
  `user` 		varchar(255) NOT NULL, 
  `post` 		int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 