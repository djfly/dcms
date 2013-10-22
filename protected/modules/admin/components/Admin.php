<?php

class Admin extends CApplicationComponent
{
	/**
     * Admin::sendMail('863155629@qq.com','863155629@qq.com','contact',"测试邮件标题",array('message' => '邮件正文内容', 'name' => '四爷', 'description' => '邮件简介'))
     * @param  string $from 'from@example.com'
     * @param  string $to 'john@example.com'
     * @param  string $view 'contact'
     * @param  string $subject '邮件标题'
     * @param  array  $data array('message' => 'Message to send', 'name' => 'John Doe', 'description' => 'Contact form')
     * @return boolean 
     */
	public static function sendMail($from,$to,$view='contact',$subject,$data)
	{
		$config=Yii::app()->config->get("email");
		
		$mail = new YiiMailer();
		$mail->setView('contact');
		$mail->setData($data);
		if ($config['mailSendWay']) {
			$mail->IsSMTP();// Set mailer to use SMTP
		}
		$mail->Host = $config['host']; 
		$mail->Port = $config['port'];
		$mail->SMTPAuth = $config['auth']?true:false;// Enable SMTP authentication
		$mail->Username = $config['username'];// SMTP username
		$mail->Password = $config['password'];// SMTP password
		//$mail->SMTPSecure = 'tls';    
		$mail->setFrom($from);
		$mail->setSubject($subject);
		$mail->setTo($to);
		if ($mail->send()) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Admin::ftp()
     * @return object
     */
	public static function ftp()
	{
		Yii::import('ext.EFtp');
		$config=Yii::app()->config->get("ftp");
		$ftp=new EFtp($config['host'], $config['username'], $config['password'], $config['ssl'], $config['pasv'], $config['port'], $config['timeout']);
		return $ftp;
	}

	public static function random($length, $numeric = 0) {
		$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
		if($numeric) {
			$hash = '';
		} else {
			$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
			$length--;
		}
		$max = strlen($seed) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $seed{mt_rand(0, $max)};
		}
		return $hash;
	}
}