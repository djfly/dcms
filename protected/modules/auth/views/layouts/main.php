<?php /* @var $this AuthController */ ?>

<?php $this->beginContent($this->module->defaultLayout); ?>
<div class="row-fluid">
<div class="span2">
    <?php
    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'tabs',
        'items' => $this->menu,
        'htmlOptions'=>array('class'=>'nav-stacked'),
    ));
    ?>
</div>
<div class="span10">
<div class="auth-module">
	<?php 
	$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		'homeLink'=>false,
        'links'=>array_merge(array('首页'=>array('index')),$this->breadcrumbs),
        //'htmlOptions'=>array('style'=>'margin-top: 0px!important;'),
	));
    ?><!-- breadcrumbs -->
    <!-- 操作返回信息提示 -->
    <?php 
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info', // you don't need to specify full config
        'warning' => array('block' => false, 'closeText' => false),
        'error' => array('block' => false, 'closeText' => '&times;')
    ),
	));
    ?>
	<?php echo $content; ?>

</div>
</div>
<?php $this->endContent(); ?>