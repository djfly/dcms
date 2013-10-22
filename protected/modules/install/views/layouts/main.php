<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <title><?php echo CHtml::encode(Yii::app()->name); ?> - 安装向导</title>
    </head>

    <body>
        <div id="page" class="container">
                <?php echo $content; ?>
        <footer class="footer text-center">
        <div class="container">
          <p>Copyright &copy; <?php echo date('Y'); ?> by CMSBOOM. All Rights Reserved.<br/>Powered by DCMS</p>
        </div>
        </footer>
        </div><!-- page -->   
    </body>
</html>
