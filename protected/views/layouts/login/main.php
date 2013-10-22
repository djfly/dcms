<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <title><?php echo CHtml::encode(Yii::app()->name); ?> - </title>
        <style type="text/css">
        body, td, input, textarea, select, button{font:14px "Lucida Grande", Verdana, Lucida, Helvetica, Arial, 'Simsun', sans-serif; color: #555555}
        /*body{background: url(images/gh-enterprise-bg.jpg) no-repeat; background-size:100%;}*/
        .footer{position: absolute;bottom: 30px; width: 90%;}
        </style>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#box").css("margin-top",(($(window).height()-$('#box').outerHeight())/2)-50+"px");
        });
        </script>
    </head>
    <body>

<div class="container">
   
	<?php echo $content; ?>
	<div class="footer text-center">
		Copyright &copy; <?php echo date('Y'); ?> CMSBOOM. All Rights Reserved
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
