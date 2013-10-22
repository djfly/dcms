<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1>About</h1>

        <p class="lead"> </p>
    </div>
</header>
<div class="container">
	<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="200">
          <li><a href="#reflections"><i class="icon-chevron-right"></i> 感言</a></li>
          <li><a href="#thanks"><i class="icon-chevron-right"></i> 鸣谢</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="reflections">
          <div class="page-header">
            <h1> 感言</h1>
          </div>
          <p class="lead">写在项目开发之前</p>
        </section>
        <section id="thanks">
          <div class="page-header">
            <h1> 鸣谢</h1>
          </div>
          <p class="lead">感谢在DCMS开发中提供帮助的人</p>
          <ul>
            <li>银河王子</li>
            <li>Simon-菜鸟</li>
            <li>Lonely</li>
            <li>亦清</li>
            <li>哥不是坏人</li>
            <li>MutiEE|skyverd</li>
            <li>会真同学</li>
            <li>OnlyPHP...</li>
          </ul>
          <p><span class="label label-important">注:</span> 由于开发很长一段时间，未能记住每一位提供帮助的同学，若您曾提供帮助而以上名单没有您的名字，请联系我</p>

        </section>
    </div>
</div>
