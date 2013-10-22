<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'DCMS 管理中心',
);
?>
<div class="well well-small"><strong>系统信息</strong></div>
<table class="table tb">
<tr><td>DCMS 程序版本</td><td>DCMS <small><?php echo CHtml::encode(Yii::app()->params['dcmsVersion']); ?> Release <?php echo CHtml::encode(Yii::app()->params['releaseDate']); ?></small> <a href="http://www.cmsboom.com"  target="_blank">查看最新版本</a> <a href="http://www.cmsboom.com"  target="_blank">专业支持与服务</a> <a href="http://idc.cmsboom.com"  target="_blank">DCMS专用服务器</a></td></tr>
<tr><td>服务器软件</td><td><?php echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : ''; ?></td></tr>
<tr><td>服务器 MySQL 版本</td><td><?php echo @mysql_get_server_info() ?> <?php echo extension_loaded('pdo_mysql')?"PDO(√)":"PDO(×)"; ?></td></tr>
<tr><td>内存缓存支持</td><td>Redis<?php echo extension_loaded('redis')?"(√)":"(×)"; ?> memcache<?php echo extension_loaded('memcache')?"(√)":"(×)"; ?> APC<?php echo extension_loaded('apc')?"(√)":"(×)"; ?></td></tr>
<tr><td>GD库支持</td><td><?php 
$tmp = function_exists('gd_info') ? gd_info() : array(); 
echo empty($tmp['GD Version']) ? 'noext' : $tmp['GD Version'];
?></td></tr>
<tr><td>上传许可</td><td><?php echo @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'unknow'; ?></td></tr>
<!-- <tr><td>当前数据库尺寸</td><td>3.89 MB</td></tr>
<tr><td>当前附件尺寸</td><td>929.02 KB</td></tr> -->
</table>

<div class="well well-small"><strong>DCMS 开发团队</strong></div>
<table class="table tb">
<tr><td class="vtop td24">总策划兼项目经理</td>
	<td class="lineheight smallfont team">
	<a href="http://www.cmsboom.com"  target="_blank">DJFly (ff)</a></td>
</tr>
<tr><td class="vtop td24">感谢提供帮助的人</td><td class="lineheight team">
	<a href="#"  target="_blank">银河王子</a>
	<a href="#"  target="_blank">Simon-菜鸟</a>
	<a href="#"  target="_blank">Lonely</a>
	<a href="#"  target="_blank">亦清</a>
	<a href="#"  target="_blank">哥不是坏人</a>
	<a href="#"  target="_blank">MutiEE|skyverd</a>
	<a href="#"  target="_blank">会真同学</a> 
	<a href="#"  target="_blank">OnlyPHP</a>
</td></tr>
<tr><td class="vtop td24">相关链接</td><td>
		<a href="http://www.cmsboom.com" target="_blank">DCMS</a>,
		<a href="http://www.yiiframework.com/" target="_blank">Yii PHP framework</a>,
		<a href="http://www.jquery.com/" target="_blank">jQuery</a>,
		<a href="http://www.highcharts.com/" target="_blank">Highcharts JS</a>,
		<a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap</a>,
		<a href="https://github.com/clevertech/YiiBooster" target="_blank">Booster</a>,
		<a href="https://www.kindsoft.net" target="_blank">kindEditor</a>,
	</td></tr>
<tr><td class="vtop td24">赞助商</td><td>
		<a href="#" target="_blank">时代宏远</a>,
		<a href="#" target="_blank">图客网络</a>,
	</td></tr>
	</table>
<br>


