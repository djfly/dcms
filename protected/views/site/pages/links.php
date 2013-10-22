<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1>常用网址集合</h1>

        <p class="lead"> </p>
    </div>
</header>
<div class="container">
	<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="200">
          <li><a href="#yiiframework"><i class="icon-chevron-right"></i> Yii Framework</a></li>
          <li><a href="#bootstrap"><i class="icon-chevron-right"></i> Bootstrap</a></li>
          <li><a href="#booster"><i class="icon-chevron-right"></i> YiiBooster</a></li>
          <li><a href="#fontawesome"><i class="icon-chevron-right"></i> fontawesome</a></li>
          <li><a href="#jQuery"><i class="icon-chevron-right"></i> jQuery</a></li>
          <li><a href="#highcharts"><i class="icon-chevron-right"></i> highcharts</a></li>
          <li><a href="#extension"><i class="icon-chevron-right"></i> extension</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="yiiframework">
          <div class="page-header">
            <h1> Yii Framework</h1>
          </div>
          <p class="lead">DCMS使用Yii Framework（1.1.14）作为后端框架 其官方网站为 <a href="http://www.yiiframework.com/" target="_blank">Yii Framework</a></p>
          <ul>
            <li><a href="http://www.yiiframework.com/doc/guide/1.1/zh_cn/index" target="_blank">yiiframework 权威指南</a> <span class="label label-info">中文</span> <span class="muted">Yii的权威指南是最全面的Yii文档，每一个功能都给出了明确的说明。</span></li>
            <li><a href="http://www.yiiframework.com/doc/guide/1.1/zh_cn/basics.convention" target="_blank">Yii 开发规范</a> <span class="label label-info">中文</span> <span class="muted">Yii 开发规范</span></li>
            <li><a href="http://www.yiiframework.com/doc/blog/1.1/zh_cn/start.overview" target="_blank">Yii 建立博客示例</a> <span class="label label-info">中文</span> <span class="muted">详细介绍了如何使用Yii开发一个演示博客的过程，它阐述了yii开发流程。</span></li>
            <li><a href="http://www.yiiframework.com/wiki/" target="_blank">yiiframework wiki</a> <span class="label">英文</span> <span class="muted">wiki包含yii使用，各种问题解决，经验贴</span></li>
            <li><a href="http://www.yiichina.com/api/" target="_blank">yiiframework api</a> <span class="label label-info">中文</span> <span class="muted">国内翻译过的yii类参考</span></li>
            <li><a href="http://www.yiiframework.com/doc/api/" target="_blank">yiiframework api</a> <span class="label">英文</span> <span class="muted">yii类参考</span></li>
            <li><a href="http://www.yiiframework.com/extensions/" target="_blank">yiiframework 扩展</a> <span class="label">英文</span> <span class="muted">yii扩展</span></li>
            <li><a href="http://yiibook.com/" target="_blank">Yii 书籍</a> <span class="label label-info">中文</span> <span class="muted">翻译国外的yii开发书籍</span></li>
          </ul>
        </section>
        <section id="bootstrap">
          <div class="page-header">
            <h1> Bootstrap</h1>
          </div>
          <p class="lead">DCMS使用bootstrap（2.3.2）作为前端框架，其官方网站为 <a href="http://getbootstrap.com/2.3.2/" target="_blank">bootstrap</a></p>
          <ul>
            <li><a href="http://getbootstrap.com/2.3.2/" target="_blank">bootstrap官方网站</a> <span class="label">英文</span> <span class="muted">使用介绍，组件说明</span></li>
            <li><a href="http://www.bootcss.com/" target="_blank">bootstrap国内汉化</a> <span class="label label-info">中文</span> <span class="muted">方便不会英文的同学</span></li>
            <li><a href="http://www.bootcss.com/p/layoutit/" target="_blank">layoutit</a> <span class="label label-info">中文</span> <span class="muted">可以在线拖拽排版bootstrap，方便学习，调试</span></li>
          </ul>
        </section>
        <section id="booster">
          <div class="page-header">
            <h1> YiiBooster</h1>
          </div>
          <p class="lead">DCMS使用YiiBooster（2.0.0）以提高yii+bootstrap的开发效率，其官方网站为 <a href="http://yii-booster.clevertech.biz/" target="_blank">YiiBooster</a></p>
          <ul>
            <li><a href="http://yii-booster.clevertech.biz/" target="_blank">YiiBooster官方网站</a> <span class="label">英文</span> <span class="muted">YiiBooster，使用介绍，参考说明</span></li>
            <li><a href="http://yiibooster.oadoc360.com/" target="_blank">YiiBooster国内汉化</a> <span class="label label-info">中文</span> <span class="muted">YiiBooster，使用介绍，参考说明</span></li>
          </ul>
        </section>
        <section id="fontawesome">
          <div class="page-header">
            <h1> fontawesome</h1>
          </div>
          <p class="lead">DCMS使用fontawesome（3.2.1）作为默认的图标库，其官方网站为 <a href="http://fontawesome.io/" target="_blank">fontawesome</a></p>
          <ul>
            <li><a href="http://fontawesome.io/" target="_blank">fontawesome</a> <span class="label">英文</span> <span class="muted">fontawesome，使用介绍，图标说明</span></li>
            <li><a href="http://www.bootcss.com/p/font-awesome/" target="_blank">fontawesome国内汉化</a> <span class="label label-info">中文</span> <span class="muted">fontawesome，使用介绍，图标说明</span></li>
            <li><a href="http://fontawesome.io/icons/" target="_blank">fontawesome</a> <span class="label">英文</span> <span class="muted">fontawesome，图标快速查询列表</span></li>
          </ul>
        </section>
        <section id="jQuery">
          <div class="page-header">
            <h1> jQuery</h1>
          </div>
          <p class="lead">DCMS使用jQuery（1.8.3）作为默认的js库，其官方网站为 <a href="http://jquery.com/" target="_blank">jquery</a></p>
          <ul>
            <li><a href="http://api.jquery.com/" target="_blank">jquery api</a> <span class="label">英文</span> <span class="muted">api 英文文档</span></li>
            <li><a href="http://www.php100.com/manual/jquery/" target="_blank">jquery api</a> <span class="label label-info">中文</span> <span class="muted">api 中文文档</span></li>
          </ul>
        </section>
        <section id="highcharts">
          <div class="page-header">
            <h1> highcharts</h1>
          </div>
          <p class="lead">DCMS使用highcharts（2.2.5）作为默认的图表曲线库，其官方网站为 <a href="http://www.highcharts.com/" target="_blank">highcharts</a></p>
          <ul>
            <li><a href="http://www.highcharts.com/" target="_blank">highcharts</a> <span class="label">英文</span> <span class="muted">highcharts 使用介绍，参考说明</span></li>
          </ul>
        </section>
        <section id="extension">
          <div class="page-header">
            <h1> extensions</h1>
          </div>
          <p class="lead">DCMS使用了一些Yii扩展补充功能，Yii扩展获取地址 <a href="http://www.yiiframework.com/extensions/" target="_blank">Yii扩展</a></p>
          <ul>
            <li><a href="http://www.yiiframework.com/extension/config" target="_blank">config</a> <span class="muted">config 用于网站配置</span></li>
            <li><a href="http://www.yiiframework.com/extension/authbooster" target="_blank">authbooster</a> <span class="muted">authbooster 用于权限控制</span></li>
            <li><a href="http://www.yiiframework.com/extension/upload" target="_blank">upload</a> <span class="muted">upload 用于附件上传，水印，缩略图</span></li>
            <li><a href="http://www.yiiframework.com/extension/FTP" target="_blank">FTP</a> <span class="muted">FTP 使用FTP，远程附件</span></li>
            <li><a href="http://www.yiiframework.com/extension/yiimailer" target="_blank">YiiMailer</a> <span class="muted">YiiMailer 用于邮件发送，支持布局</span></li>
            <li><a href="http://www.yiiframework.com/extension/yii-kindeditor" target="_blank">kindeditor</a> <span class="muted">kindeditor 所见所得编辑器</span></li>
            <li><a href="http://www.yiiframework.com/extension/nestedsetbehavior" target="_blank">NestedSetBehavior</a> <span class="muted">NestedSetBehavior 无限分类</span></li>
            <li><a href="http://www.yiiframework.com/extension/backup" target="_blank">backup</a> <span class="muted">backup 用于数据备份恢复</span></li>
            <li><a href="http://www.yiiframework.com/extension/yii-debug-toolbar" target="_blank">Yii Debug Toolbar</a> <span class="muted">Yii Debug Toolbar 用于调试</span></li>
          </ul>
        </section>
    </div>
</div>
