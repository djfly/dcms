<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <title><?php echo CHtml::encode(Yii::app()->name); ?> - 管理后台</title>
        <style type="text/css">
            body, td, input, textarea, select, button{font: "Lucida Grande", Verdana, Lucida, Helvetica, Arial, 'Simsun', sans-serif; color: #555555}
            ul{ list-style:none; }
            a{ color:#21759B; text-decoration:none; }
            .fontweight{ font-weight: bold;}
            .navbar .brand{margin-right: 30px;}
            .tb a{color: #555555;}
            .tb tr td{line-height: 150%;border-top: 1px dotted #ECECEC ;}
            .td24{width: 150px;}
            .vtop{vertical-align:top;}
            .team a{width: 33%;float: left;}
        </style>
    </head>
    <body>
        <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'brand' => 'DCMS',
                'type' => 'inverse',
                //'fixed' => false,
                'collapse'=>true,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'htmlOptions'=>array('class'=>'fontweight'),
                        'items' => array(
                            array('label'=>'系统', 'url'=>array('/admin/'), 'active'=>$this->module->id.'/'.Yii::app()->controller->id=='admin/default'),
                            array('label'=>'文章', 'url'=>array('/admin/post/admin'), 'active'=>Yii::app()->controller->id=='post'),
                            // array('label'=>'相册', 'url'=>array('/albums/'), 'active'=>$this->module->id=='albums'),
                            // array('label'=>'专题', 'url'=>array('/topic/'), 'active'=>$this->module->id=='topic'),
                            array('label'=>'分类', 'url'=>array('/admin/category/'), 'active'=>Yii::app()->controller->id=='category'),
                            array('label'=>'权限', 'url'=>array('/auth/'), 'active'=>$this->module->id=='auth'),
                            array('label'=>'用户', 'url'=>array('/admin/user/admin'), 'active'=>Yii::app()->controller->id=='user'),
                            array('label'=>'数据库', 'url'=>array('/database/'), 'active'=>$this->module->id=='database'),
                            array('label'=>'其他',
                                'items' => array(
                                  array('label' => '链接管理', 'url' => array('/admin/link/admin')),
                                  array('label' => '文本映射', 'url' => array('/admin/lookup/admin')),
                                  array('label' => '文件管理', 'url' => array('/admin/upload/admin'))
                                ),
                                'active'=>Yii::app()->controller->id=='links'
                                ),
                            array('label'=>'查看站点', 'url'=>array('/site/index'),'linkOptions'=>array('target'=>'_blank')),
                        )
                    ),
                    array(
                        'class'=>'bootstrap.widgets.TbMenu',
                        'encodeLabel'=>false,
                        'htmlOptions'=>array('class'=>'pull-right'),
                        'items'=>array(
                            array('label'=>'您好, '.Yii::app()->user->name.' 欢迎使用 DCMS &nbsp;&nbsp;', 'url'=>'#','linkOptions'=>array('style'=>'padding-right:0px;'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'<i class="icon-off"></i>[退出]', 'url'=>array('/site/logout'),'linkOptions'=>array('style'=>'padding-left:0px;'), 'visible'=>!Yii::app()->user->isGuest),
                            )
                        )
                )
                
            ));
            ?>
    	<div class="container-fluid" style="margin-top:60px;">
            <?php echo $content; ?>	
    	</div>
    </body>
</html>