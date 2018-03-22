CREATE DATABASE fuber;
 
USE fuber;
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `api_key` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
);
 
CREATE TABLE IF NOT EXISTS `cabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabnumber` text NOT NULL,
  `cabcolor` text NOT NULL,  
  `driver` text NOT NULL,
  `location` text NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
 
CREATE TABLE IF NOT EXISTS `user_cabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cab_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `cab_id` (`cab_id`)
);
 
ALTER TABLE  `user_cabs` ADD FOREIGN KEY (  `user_id` ) REFERENCES  `fuber`.`users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
 
ALTER TABLE  `user_cabs` ADD FOREIGN KEY (  `cab_id` ) REFERENCES  `fuber`.`cabs` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;