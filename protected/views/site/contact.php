<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="lead">如果你有商务合作或其他问题，请用以下方式与我们联系。谢谢。</p>
    </div>
</header>
<div class="container">
	<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="200">
          <li><a href="#qqgrounp"><i class="icon-chevron-right"></i> 技术支持</a></li>
          <li><a href="#email"><i class="icon-chevron-right"></i> 商务合作</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="qqgrounp">
      	<div class="page-header">
        	<h2>技术支持</h2>
        </div>
			   QQ群：236534985
        </section>
        <section id="email">
        <div class="page-header">
        	<h2>商务合作</h2>
        </div>
        QQ：863155629<br>
        Email：business@cmsboom.com
			  <br><br>
        <p><span class="label label-important">注:</span> 以上联系方式不接受技术咨询，遇到技术问题请到QQ群内提问。</p>
        </section>
</div></div></div>
