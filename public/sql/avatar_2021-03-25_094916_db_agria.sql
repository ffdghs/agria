DROP TABLE IF EXISTS avatar;
CREATE TABLE `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_avatar` varchar(255) NOT NULL,
  `url_avatar` varchar(255) NOT NULL,
  `description_avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT=' Définition des avatars ';



INSERT INTO avatar(id,name_avatar,url_avatar,description_avatar) VALUES(5,'Bapt','bapt.png','Bapt'),(6,'Camix','camix.png','Camix'),(7,'Kevin','kevin.png','Kevin'),(8,'Mimi','mimi.png','Mimi'),(9,'Soso','soso.png','Soso');







