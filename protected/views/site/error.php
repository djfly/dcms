<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="container">
	<div class="row">
      	<div class="span3"></div>
      	<div class="span9">
      		<br><br>
      		<h2>Error <?php echo $code; ?></h2>
      		<?php echo CHtml::encode($message); ?>
      	</div>
    </div>
</div>
