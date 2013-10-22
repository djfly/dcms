-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `pre_authassignment`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_authassignment`;
CREATE TABLE IF NOT EXISTS `pre_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `pre_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='授权表';

-- -------------------------------------------
-- TABLE `pre_authitem`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_authitem`;
CREATE TABLE IF NOT EXISTS `pre_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_authitemchild`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_authitemchild`;
CREATE TABLE IF NOT EXISTS `pre_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `pre_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pre_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_category`;
CREATE TABLE IF NOT EXISTS `pre_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_config`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_config`;
CREATE TABLE IF NOT EXISTS `pre_config` (
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_link`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_link`;
CREATE TABLE IF NOT EXISTS `pre_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `target` tinyint(3) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `visible` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_lookup`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_lookup`;
CREATE TABLE IF NOT EXISTS `pre_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_post`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_post`;
CREATE TABLE IF NOT EXISTS `pre_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `pre_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_upload`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_upload`;
CREATE TABLE IF NOT EXISTS `pre_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `pre_user`
-- -------------------------------------------
DROP TABLE IF EXISTS `pre_user`;
CREATE TABLE IF NOT EXISTS `pre_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL COMMENT '用户名',
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- -------------------------------------------
-- TABLE DATA pre_authitem
-- -------------------------------------------
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.admin','0','分类管理','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.create','0','分类创建','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.delete','0','删除分类','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.index','0','分类管理首页','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.move','0','移动分类','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.update','0','修改分类','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.category.view','0','分类查看','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.access','0','访问ip限制','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.attach','0','附件设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.email','0','Email设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.index','0','后台首页','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.reg','0','注册设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.siteinfo','0','站点信息管理','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.thumbnails','0','缩略图设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.default.watermark','0','水印设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.admin','0','管理链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.create','0','创建链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.delete','0','删除链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.index','0','链接列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.update','0','修改链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.link.view','0','查看链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.admin','0','管理文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.create','0','创建文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.delete','0','删除文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.index','0','文本映射列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.update','0','修改文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.lookup.view','0','查看文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.admin','0','管理文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.create','0','创建文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.delete','0','删除文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.index','0','文章列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.update','0','修改文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.post.view','0','查看文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.admin','0','管理附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.create','0','创建附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.delete','0','删除附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.index','0','附件列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.update','0','修改附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.upload.view','0','查看附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.admin','0','管理用户','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.create','0','创建用户','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.delete','0','删除用户','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.index','0','用户列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.update','0','修改用户','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin.user.view','0','查看用户','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('authenticated','2','Authenticated','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('categoryAdmin','1','分类','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.backup','0','备份数据库','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.delete','0','删除数据库备份文件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.download','0','下载数据库备份文件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.execsql','0','执行SQL','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.index','0','数据库备份','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.list','0','数据库备份列表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.optimize','0','优化表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.repair','0','修复表','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('database.default.restore','0','恢复数据库','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('databaseAdmin','1','数据库','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('defaultAdmin','1','站点设置','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('editor','2','编辑','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('linkAdmin','1','链接','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('lookupAdmin','1','文本映射','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('postAdmin','1','文章','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('uploadAdmin','1','附件','','N;');
INSERT INTO `pre_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('userAdmin','1','用户','','N;');



-- -------------------------------------------
-- TABLE DATA pre_authitemchild
-- -------------------------------------------
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.move');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('categoryAdmin','admin.category.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.access');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.attach');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.email');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.reg');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.siteinfo');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.thumbnails');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('defaultAdmin','admin.default.watermark');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('linkAdmin','admin.link.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('lookupAdmin','admin.lookup.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('postAdmin','admin.post.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('uploadAdmin','admin.upload.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.admin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.create');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.update');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('userAdmin','admin.user.view');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('editor','categoryAdmin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.backup');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.delete');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.download');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.execsql');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.index');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.list');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.optimize');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.repair');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('databaseAdmin','database.default.restore');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('authenticated','postAdmin');
INSERT INTO `pre_authitemchild` (`parent`,`child`) VALUES
('editor','postAdmin');



-- -------------------------------------------
-- TABLE DATA pre_category
-- -------------------------------------------
INSERT INTO `pre_category` (`id`,`root`,`lft`,`rgt`,`level`,`name`) VALUES
('1','1','1','6','1','文章分类');
INSERT INTO `pre_category` (`id`,`root`,`lft`,`rgt`,`level`,`name`) VALUES
('12','1','2','3','2','最新动态');
INSERT INTO `pre_category` (`id`,`root`,`lft`,`rgt`,`level`,`name`) VALUES
('13','1','4','5','2','国际新闻');



-- -------------------------------------------
-- TABLE DATA pre_config
-- -------------------------------------------
INSERT INTO `pre_config` (`key`,`value`) VALUES
('attach','a:3:{s:3:\"jpg\";i:200;s:2:\"qq\";i:2000;s:3:\"rar\";i:3000;}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('email','a:9:{s:11:\"mailSendWay\";s:1:\"1\";s:4:\"host\";s:11:\"smtp.qq.com\";s:4:\"port\";s:2:\"25\";s:4:\"auth\";s:1:\"1\";s:4:\"from\";s:13:\"123456@qq.com\";s:8:\"username\";s:6:\"123456\";s:8:\"password\";s:6:\"123456\";s:8:\"testForm\";s:0:\"\";s:6:\"testTo\";s:0:\"\";}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('ftp','a:10:{s:5:\"ftpOn\";s:1:\"1\";s:3:\"ssl\";s:1:\"0\";s:4:\"host\";s:0:\"\";s:4:\"port\";s:2:\"21\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";s:4:\"pasv\";s:1:\"0\";s:9:\"attachDir\";s:0:\"\";s:9:\"attachUrl\";s:0:\"\";s:7:\"timeout\";s:2:\"90\";}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('ipAccess','s:0:\"\";');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('ipAdminAccess','s:0:\"\";');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('reg','a:9:{s:9:\"regStatus\";s:1:\"0\";s:15:\"regCloseMessage\";s:0:\"\";s:10:\"sendRegUrl\";s:1:\"0\";s:10:\"censorUser\";s:0:\"\";s:8:\"pwLength\";s:0:\"\";s:9:\"regVerify\";s:1:\"0\";s:10:\"welcomeMsg\";s:1:\"0\";s:15:\"welcomeMsgTitle\";s:67:\"{username}，您好，感谢您的注册，请阅读以下内容。\";s:13:\"welcomeMsgTxt\";s:215:\"尊敬的{username}，您已经注册成为{sitename}的会员，请您在发表言论时，遵守当地法律法规。
如果您有什么疑问可以联系管理员，Email: {adminemail}。


{sitename}
{time}\";}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('siteInfo','a:10:{s:8:\"siteName\";s:4:\"DCMS\";s:7:\"siteUrl\";s:15:\"www.cmsboom.com\";s:9:\"siteTitle\";s:12:\"我的网站\";s:11:\"siteKeyword\";s:17:\"DCMS,Yii,boostrap\";s:15:\"siteDescription\";s:27:\"这是我们公司的网站\";s:10:\"adminEmail\";s:15:\"admin@admin.com\";s:13:\"siteCopyright\";s:44:\"2012-2013 公司版权所有 Powered by DCMS\";s:7:\"siteIcp\";s:20:\"京ICP备08105208号\";s:8:\"statCode\";s:0:\"\";s:6:\"closed\";s:1:\"0\";}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('thumbnails','a:7:{s:8:\"imageLib\";s:1:\"1\";s:15:\"imageMagickPath\";s:0:\"\";s:9:\"thumbSize\";N;s:13:\"maxThumbWidth\";s:0:\"\";s:14:\"maxThumbHeight\";s:0:\"\";s:11:\"thumbStatus\";s:1:\"1\";s:12:\"thumbQuality\";s:0:\"\";}');
INSERT INTO `pre_config` (`key`,`value`) VALUES
('watermark','a:8:{s:11:\"waterMarkOn\";s:1:\"1\";s:17:\"waterMarkPosition\";s:1:\"5\";s:13:\"waterMarkType\";s:1:\"1\";s:14:\"waterMarkTrans\";s:0:\"\";s:16:\"waterMarkQuality\";s:0:\"\";s:13:\"waterMarkText\";s:0:\"\";s:13:\"waterMarkSize\";s:0:\"\";s:14:\"waterMarkColor\";s:7:\"#00db65\";}');



-- -------------------------------------------
-- TABLE DATA pre_link
-- -------------------------------------------
INSERT INTO `pre_link` (`id`,`name`,`url`,`img`,`target`,`type`,`position`,`visible`) VALUES
('1','首页','http://127.0.0.1/dcms/index.php?r=site/index','images/mail/yii.png','0','0','1','1');
INSERT INTO `pre_link` (`id`,`name`,`url`,`img`,`target`,`type`,`position`,`visible`) VALUES
('2','新闻','http://127.0.0.1/dcms/index.php?r=post','images/mail/yii.png','0','0','0','1');
INSERT INTO `pre_link` (`id`,`name`,`url`,`img`,`target`,`type`,`position`,`visible`) VALUES
('8','关于','http://127.0.0.1/dcms/index.php?r=site/page&view=about','','0','0','0','1');
INSERT INTO `pre_link` (`id`,`name`,`url`,`img`,`target`,`type`,`position`,`visible`) VALUES
('11','联系','http://127.0.0.1/dcms/index.php?r=site/contact','','0','0','0','1');
INSERT INTO `pre_link` (`id`,`name`,`url`,`img`,`target`,`type`,`position`,`visible`) VALUES
('12','DCMS','http://www.cmsboom.com','','1','1','0','1');



-- -------------------------------------------
-- TABLE DATA pre_lookup
-- -------------------------------------------
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('1','显示','1','LinkVisible','1');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('2','不显示','0','LinkVisible','2');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('3','当前','0','LinkTarget','1');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('4','新窗口','1','LinkTarget','2');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('5','导航菜单','0','LinkType','1');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('6','友情链接','1','LinkType','2');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('7','发布','1','PostStatus','1');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('8','草稿','2','PostStatus','2');
INSERT INTO `pre_lookup` (`id`,`name`,`code`,`type`,`position`) VALUES
('9','存档','3','PostStatus','3');



-- -------------------------------------------
-- TABLE DATA pre_post
-- -------------------------------------------
INSERT INTO `pre_post` (`id`,`category_id`,`title`,`content`,`status`,`create_time`,`update_time`,`author_id`) VALUES
('1','12','国内互联网巨头的员工获利力','互联网公司最重要的资产就是人力（智力）资源，PingWest整理了国内较有代表性、且有准确公开资料的几家互联网上市公司的数据， 通过“年度净利润/该年员工总数”，计算了这些公司的单位员工的净利润贡献值。同时附上员工数的变化以及部分公司的、有意思的员工构成。','1','1381665538','1381665538','1');
INSERT INTO `pre_post` (`id`,`category_id`,`title`,`content`,`status`,`create_time`,`update_time`,`author_id`) VALUES
('3','12','三四十','<img src=\"upload/post/181848z77sg0ds6gwze167.png\" alt=\"\" />三四十','1','1381853934','1381853934','1');
INSERT INTO `pre_post` (`id`,`category_id`,`title`,`content`,`status`,`create_time`,`update_time`,`author_id`) VALUES
('4','13','清仓甩卖','<p>
	<img src=\"upload/post/201310/054142rt2lliqoz5rrp7pq.png\" alt=\"\" />斯蒂芬斯蒂芬第三方
</p>
<p>
	斯蒂芬第三方的双方的首发
</p>
<p>
	斯蒂芬森的发生的发
	<hr style=\"page-break-after:always;\" class=\"ke-pagebreak\" />
	发的双方的首发的双方的首发速度
</p>
<p>
	打发放假啊手机费is敬佛阿娇三分敬佛i阿的岁肌肤i阿的江石佛
</p>
<p>
	的岁激发肌肤i哦姐啊石佛i戒毒所
</p>
<p>
	<hr style=\"page-break-after:always;\" class=\"ke-pagebreak\" />
	发的岁发的发达省份的撒发的岁分打首发发的岁发送到分速度
</p>
<p>
	房贷收紧艾迪阿娇ofjoisxcvcxv和规范化规范化
</p>
<p>
	规范化规范化规范化广泛
</p>
<p>
	和规范化广泛
	<hr style=\"page-break-after:always;\" class=\"ke-pagebreak\" />
	和规范化规范化规范化规范化
</p>
<p>
	和规范化规范化广泛好
</p>','1','1381895116','1381914346','1');



-- -------------------------------------------
-- TABLE DATA pre_upload
-- -------------------------------------------
INSERT INTO `pre_upload` (`id`,`post_id`,`author_id`,`name`,`size`,`description`,`path`,`type`,`create_time`) VALUES
('28','3','1','focus.png','349955','','upload/post/181848z77sg0ds6gwze167.png','1','1381853928');
INSERT INTO `pre_upload` (`id`,`post_id`,`author_id`,`name`,`size`,`description`,`path`,`type`,`create_time`) VALUES
('29','0','1','t-weibo.png','1021','','upload/post/182157tmo9rg1qbmu1r6bg.png','1','1381854117');
INSERT INTO `pre_upload` (`id`,`post_id`,`author_id`,`name`,`size`,`description`,`path`,`type`,`create_time`) VALUES
('31','0','1','footer-logo.png','2418','','upload/post/201310/053757xne2rnnxznxztijx.png','1','1381894677');
INSERT INTO `pre_upload` (`id`,`post_id`,`author_id`,`name`,`size`,`description`,`path`,`type`,`create_time`) VALUES
('32','4','1','ad1.png','14325','','upload/post/201310/054142rt2lliqoz5rrp7pq.png','1','1381894902');



-- -------------------------------------------
-- TABLE DATA pre_user
-- -------------------------------------------
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('1','admin','admin','admin@localhost.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('2','test2','pass2','test2@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('3','test3','pass3','test3@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('4','test4','pass4','test4@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('5','test5','pass5','test5@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('6','test6','pass6','test6@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('7','test7','pass7','test7@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('8','test8','pass8','test8@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('9','test9','pass9','test9@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('10','test10','pass10','test10@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('11','test11','pass11','test11@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('12','test12','pass12','test12@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('13','test13','pass13','test13@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('14','test14','pass14','test14@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('15','test15','pass15','test15@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('16','test16','pass16','test16@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('17','test17','pass17','test17@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('18','test18','pass18','test18@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('19','test19','pass19','test19@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('21','test21','pass21','test21@example.com');
INSERT INTO `pre_user` (`id`,`username`,`password`,`email`) VALUES
('22','test22','pass22','test21@example.com');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------




