<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode(Yii::app()->name); ?> - </title>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/docs.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/prettify.js"></script>
    </head>
    <body data-spy="scroll" data-target=".bs-docs-sidebar" onload="prettyPrint()">
    <div class="navbar-wrapper"><div class="container">
    <?php
    $this->widget('bootstrap.widgets.TbNavbar', array(
        'brand' => '',
        //'brandOptions' => array('style' => 'float:right;'),
        'type' => 'inverse',
        //'fixed' => false,
        'collapse'=>true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'fontweight'),
                'items' => array(
                  array('label'=>'首页', 'url'=>array('/site/index')),
                  array('label'=>'快速开始', 'url'=>array('/site/page', 'view'=>'quickstart')),
                  array(
                      'label' => '在线文档',
                      'items' => array(
                          array('label' => '常用网址集合', 'url' => array('/site/page', 'view'=>'links')),
                          array('label' => 'DCMS数据库', 'url' => array('/site/page', 'view'=>'database'))
                      )
                  ),
                  array('label'=>'关于', 'url'=>array('/site/page', 'view'=>'about')),
                  array('label'=>'联系', 'url'=>array('/site/contact')),
                  array('label'=>'管理', 'url'=>array('/admin'), 'visible'=>!Yii::app()->user->isGuest),
                  array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                  array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                )
            ),
        )
        
    ));
    ?>
    </div></div>
    
	   <?php echo $content; ?>
    
	<footer class="footer">
    <div class="container">
      <div class="text-left">
      <p>友情链接：</p>
      <ul class="inline">
        <li><a href="http://yincart.com/" target="_blank">yincart</a></li>
        <li><a href="http://www.bagesoft.cn/" target="_blank">BageCms</a></li>
        <li><a href="http://www.fircms.com/" target="_blank">fircms</a></li>
        <li><a href="http://www.kindsoft.net/" target="_blank">kindsoft</a></li>
        <li><a href="http://www.zentao.net/" target="_blank">禅道</a></li>
        <li><a href="http://www.akcms.com/" target="_blank">akcms</a></li>
        <li><a href="http://www.kingcms.com/" target="_blank">kingcms</a></li>
        <li><a href="http://xheditor.com/" target="_blank">xheditor</a></li>
        <li><a href="http://www.phpcms.cn/" target="_blank">phpcms</a></li>
        <li><a href="http://www.pjhome.net/" target="_blank">PJBlog</a></li>
        <li><a href="http://www.emlog.net/" target="_blank">emlog</a></li>
        <li><a href="http://www.jieqi.com/" target="_blank">杰奇</a></li>
        <li><a href="http://www.rainbowsoft.org/" target="_blank">Z-Blog</a></li>
        <li><a href="http://www.feifeicms.com/" target="_blank">飞飞CMS</a></li>
        <li><a href="http://www.yiichina.com/" target="_blank">yiichina</a></li>
        <li><a href="http://www.itchaguan.com/" target="_blank">IT茶馆</a></li>
        <li><a href="http://www.php100.com/" target="_blank">php100</a></li>
        <li><a href="http://www.chinahtml.com/" target="_blank">chinahtml</a></li>
        <li><a href="http://www.phpchina.com/" target="_blank">phpchina</a></li>
        <li><a href="http://www.cncms.com.cn/" target="_blank">cncms</a></li>
        <li><a href="http://www.chinahtml.com/" target="_blank">chinahtml</a></li>
      </ul>
      </div>
      <br>
      <br>
      <p>Copyright &copy; <?php echo date('Y'); ?> by CMSBOOM. All Rights Reserved.<br/>Powered by DCMS</p>
      <!-- <ul class="footer-links">
        <li><a href="#">Blog</a></li>
        <li class="muted">&middot;</li>
        <li><a href="#">Issues</a></li>
        <li class="muted">&middot;</li>
        <li><a href="#">Changelog</a></li>
      </ul> -->
    </div>
  </footer>
</body>
</html>
