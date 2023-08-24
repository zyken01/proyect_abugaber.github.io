CREATE TABLE IF NOT EXISTS `tbl_data_api` (
  `id_tbl_data_api` int(11) NOT NULL AUTO_INCREMENT,
  `id_api` int(11) DEFAULT NULL,
  `name` varchar(70) DEFAULT NULL,
  `full_name` varchar(70) DEFAULT NULL,
  `owner_login` varchar(70) DEFAULT NULL,
  `owner_avatar_url` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,

  PRIMARY KEY (`id_tbl_data_api`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
