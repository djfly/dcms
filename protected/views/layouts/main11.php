<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode(Yii::app()->params['siteName']); ?> - </title>
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="masthead">
        <h3 class="muted"><?php echo CHtml::encode(Yii::app()->params['siteName']); ?></h3>
        
        <?php 
        $result=Link::model()->findAll(array(
          'condition'=>'type=:type and visible=:visible',
          'order' => 'position desc',
          'limit' => 10,
          'offset' => 0,
          'params'=>array(':type'=>0,':visible'=>1)
        ));
        $items=array();
        foreach ($result as $key => $value) {
          $items[]=array('label' => $value->name, 'url' => $value->url,'linkOptions'=>$value->target?array('target'=>'_blank'):'');
        }
        $this->widget('bootstrap.widgets.TbNavbar',
            array(
                'brand' => false,
                'fixed' => false,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => $items
                    )
                )
            )
        );
        ?><!-- /.navbar -->
      </div>
      <?php echo $content; ?>
      <div class="footer">
        <p>友情链接：</p>
        <?php 
        $result=Link::model()->findAll(array(
          'condition'=>'type=:type and visible=:visible',
          'order' => 'position desc',
          'limit' => 10,
          'offset' => 0,
          'params'=>array(':type'=>1,':visible'=>1)
        ));
        $items=array();
        foreach ($result as $key => $value) {
          echo CHtml::link(CHtml::encode($value->name), $value->url,$value->target?array("target"=>"_blank"):'');
        }
        ?>
      </div>
      <div class="footer">
        <p>&copy; <?php echo CHtml::encode(Yii::app()->params['siteCopyright']); ?> <br><small><?php echo CHtml::encode(Yii::app()->params['siteIcp']); ?></small></p>
      </div>

    </div> <!-- /container -->
  </body>
</html>
