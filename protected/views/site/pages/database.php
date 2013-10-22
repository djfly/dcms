<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1>DCMS数据库</h1>

        <p class="lead"> </p>
    </div>
</header>
<div class="container">
	<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="200">
          <li><a href="#database"><i class="icon-chevron-right"></i> 数据库说明</a></li>
          <li><a href="#database-dictionary"><i class="icon-chevron-right"></i> 数据库字典</a></li>
          <li><a href="#import-and-export"><i class="icon-chevron-right"></i> 关于导入导出</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="database">
          <div class="page-header">
            <h1> 数据库说明</h1>
          </div>
          <p class="lead">数据库一些约定</p>
          <ul>
            <li>InnoDB作为默认数据库引擎</li>
            <li>数据库统一编码 CHARSET=utf8 COLLATE=utf8_unicode_ci</li>
            <li>表名，字段名单词统一用下划线分割，非特殊需要禁止使用复数词</li>
            <li>尽可能的把字段定义为 NOT NULL</li>
            <li>int,tinyint 等数字类型一律检查是否该使用无符号类型默认0 , unsigned NOT NULL DEFAULT '0'</li>
            <li>日期时间统一保存成Unix时间戳</li>
          </ul>
        </section>
        <section id="database-dictionary">
          <div class="page-header">
            <h1> 数据字典</h1>
          </div>
          <p class="lead">DCMS 1.0 数据字典</p>
<pre class="prettyprint linenums">
--
-- 数据库: `dcms`
--

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS=0;

--
-- 表的结构 `pre_authassignment`
--

CREATE TABLE IF NOT EXISTS `pre_authassignment` (
  `itemname` varchar(64) NOT NULL COMMENT '项名称',
  `userid` varchar(64) NOT NULL COMMENT '用户id',
  `bizrule` text COMMENT '业务规则',
  `data` text COMMENT '数据',
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='授权表';

--
-- 表的结构 `pre_authitem`
--

CREATE TABLE IF NOT EXISTS `pre_authitem` (
  `name` varchar(64) NOT NULL COMMENT '项名称',
  `type` int(11) NOT NULL COMMENT '类型 0：操作（operations）1：任务（tasks）2：角色（roles）',
  `description` text COMMENT '描述',
  `bizrule` text COMMENT '业务规则',
  `data` text COMMENT '数据',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限项表';

--
-- 表的结构 `pre_authitemchild`
--

CREATE TABLE IF NOT EXISTS `pre_authitemchild` (
  `parent` varchar(64) NOT NULL COMMENT '父项名称',
  `child` varchar(64) NOT NULL COMMENT '子项名称',
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='子类项表';

--
-- 表的结构 `pre_config`
--

CREATE TABLE IF NOT EXISTS `pre_config` (
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设置表';

--
-- 表的结构 `pre_user`
--

CREATE TABLE IF NOT EXISTS `pre_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 COMMENT='用户表';

--
-- 表的结构 `pre_category`
--

CREATE TABLE `pre_category` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
 `root` int(10) unsigned DEFAULT NULL COMMENT '树id',
 `lft` int(10) unsigned NOT NULL COMMENT '左值',
 `rgt` int(10) unsigned NOT NULL COMMENT '右值',
 `level` smallint(5) unsigned NOT NULL COMMENT '分类层级',
 `name` varchar(255) NOT NULL COMMENT '分类名称',
 PRIMARY KEY (`id`),
 KEY `root` (`root`),
 KEY `lft` (`lft`),
 KEY `rgt` (`rgt`),
 KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 表的结构 `pre_upload`
--

CREATE TABLE `pre_upload` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
 `post_id` int(11) NOT NULL COMMENT '文章id',
 `author_id` int(11) NOT NULL COMMENT '作者id',
 `name` varchar(255) NOT NULL COMMENT '原名称',
 `size` int(11) NOT NULL COMMENT '尺寸',
 `description` varchar(255) NOT NULL COMMENT '说明',
 `path` varchar(255) NOT NULL COMMENT '路径',
 `type` tinyint(1) NOT NULL COMMENT '类型 1：图片 2：文件',
 `create_time` int(11) NOT NULL COMMENT '创建时间',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='附件表';

--
-- 表的结构 `pre_post`
--

CREATE TABLE `pre_post` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
 `category_id` int(10) NOT NULL COMMENT '分类id',
 `title` varchar(128) NOT NULL COMMENT '标题',
 `content` text NOT NULL COMMENT '内容',
 `status` int(11) NOT NULL COMMENT '状态 1：发布 2：草稿 3：存档',
 `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
 `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
 `author_id` int(11) NOT NULL COMMENT '作者id',
 PRIMARY KEY (`id`),
 KEY `FK_post_author` (`author_id`),
 CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `pre_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 表的结构 `pre_lookup`
--

CREATE TABLE `pre_lookup` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
 `name` varchar(128) NOT NULL COMMENT '名称',
 `code` int(11) NOT NULL COMMENT '代码',
 `type` varchar(128) NOT NULL COMMENT '类型',
 `position` int(11) NOT NULL COMMENT '排序位置',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='文本映射表';

--
-- 表的结构 `pre_link`
--

CREATE TABLE `pre_link` (
 `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
 `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
 `url` varchar(255) NOT NULL COMMENT '路径',
 `img` varchar(255) NOT NULL COMMENT '图片logo',
 `target` tinyint(3) unsigned NOT NULL COMMENT '窗口打开方式',
 `type` tinyint(3) unsigned NOT NULL COMMENT '类型',
 `position` tinyint(3) unsigned NOT NULL COMMENT '排序',
 `visible` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示 1：显示 0：不显示',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='链接表';


--
-- 限制表 `pre_authassignment`
--
ALTER TABLE `pre_authassignment`
  ADD CONSTRAINT `pre_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `pre_authitemchild`
--
ALTER TABLE `pre_authitemchild`
  ADD CONSTRAINT `pre_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pre_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `pre_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


SET FOREIGN_KEY_CHECKS=1;
</pre>
        </section>
        <section id="import-and-export">
          <div class="page-header">
            <h1> 数据库导入导出</h1>
          </div>
          <p class="lead">数据库导入导出的问题</p>
          <p>由于几个表中有使用外键关联，在phpmyadmin，或者其他工具中导入导出数据的时候必须先关闭外键关联，运行如下sql：<br><code>SET FOREIGN_KEY_CHECKS=0;</code><br>操作完后运行如下代码还原外键设置<br><code>SET FOREIGN_KEY_CHECKS=1;</code></p>
        </section>
    </div>
</div>
