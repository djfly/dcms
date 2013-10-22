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
        <?php 
        $result=Link::model()->findAll(array(
          'condition'=>'type=:type and visible=:visible',
          'order' => 'position ASC',
          // 'limit' => 50,
          // 'offset' => 0,
          'params'=>array(':type'=>1,':visible'=>1)
        ));
        $items=array();
        foreach ($result as $key => $value) {
          echo "<li>".CHtml::link(CHtml::encode($value->name), $value->url,$value->target?array("target"=>"_blank"):'')."</li>";
        }
        ?>
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
  <div style="display:none"><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F98ea678e7c2b73e9be34a18b37115b20' type='text/javascript'%3E%3C/script%3E"));
</script>
</div>
</body>
</html>
