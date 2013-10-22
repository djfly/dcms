/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
DROP TABLE IF EXISTS `pre_authassignment`;
CREATE TABLE IF NOT EXISTS `pre_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `pre_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `pre_authassignment` DISABLE KEYS */;
INSERT INTO `pre_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
	('authenticated', '1', NULL, 'N;'),
	('post.*', '1', NULL, 'N;'),
	('postAdmin', '1', NULL, 'N;');
/*!40000 ALTER TABLE `pre_authassignment` ENABLE KEYS */;
DROP TABLE IF EXISTS `pre_authitem`;
CREATE TABLE IF NOT EXISTS `pre_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `pre_authitem` DISABLE KEYS */;
INSERT INTO `pre_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('authenticated', 2, 'Authenticated', NULL, 'N;'),
	('comment.*', 0, 'Comment wildcard', NULL, 'N;'),
	('comment.create', 0, 'Create comments', NULL, 'N;'),
	('comment.index', 0, 'List comments', NULL, 'N;'),
	('comment.update', 0, 'Update comments', NULL, 'N;'),
	('commentAdmin', 1, 'Administer comments', NULL, 'N;'),
	('post.*', 0, 'Post wildcard', NULL, 'N;'),
	('post.admin', 0, 'Manage posts', NULL, 'N;'),
	('post.create', 0, 'Create posts', NULL, 'N;'),
	('post.delete', 0, 'Delete posts', NULL, 'N;'),
	('post.index', 0, 'List posts', NULL, 'N;'),
	('post.update', 0, 'Update posts', NULL, 'N;'),
	('post.view', 0, 'View posts', NULL, 'N;'),
	('postAdmin', 1, 'Administer posts', NULL, 'N;');
/*!40000 ALTER TABLE `pre_authitem` ENABLE KEYS */;
DROP TABLE IF EXISTS `pre_authitemchild`;
CREATE TABLE IF NOT EXISTS `pre_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `pre_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pre_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `pre_authitemchild` DISABLE KEYS */;
INSERT INTO `pre_authitemchild` (`parent`, `child`) VALUES
	('commentAdmin', 'comment.create'),
	('commentAdmin', 'comment.index'),
	('commentAdmin', 'comment.update'),
	('authenticated', 'commentAdmin'),
	('postAdmin', 'post.create'),
	('postAdmin', 'post.delete'),
	('postAdmin', 'post.index'),
	('postAdmin', 'post.update'),
	('postAdmin', 'post.view'),
	('authenticated', 'postAdmin');
/*!40000 ALTER TABLE `pre_authitemchild` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;