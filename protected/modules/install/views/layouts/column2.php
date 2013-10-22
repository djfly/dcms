<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div id="content" class="row">
    <div class="span2">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'list',
            'items' => $this->menu,
        ));
        ?>
    </div>
    <div class="span10">
        <?php echo $content; ?>
    </div>
</div><!-- content -->
<?php $this->endContent(); ?>