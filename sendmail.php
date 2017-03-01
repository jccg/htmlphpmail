<?php

	/**
	 * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
	 * 1. 用户名和密码是否正确；
	 * 2. 检查邮箱设置是否启用了smtp服务；
	 * 3. 是否是php环境的问题导致；
	 * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
	 */

	require_once "email.class.php";
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.xxx.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "ptkid@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = $smtpusermail;//发送给谁
	$smtpuser = "shuruzhanghao";//SMTP服务器的用户帐号
	$smtppass = "darumima";//SMTP服务器的用户密码
	$mailmessage =$_POST['message'];//留言信息
	$mailtitle = $_POST['toemail'];//邮件发件人
	$mailcompany = $_POST['company'];//发件人公司
	$mailcountry = $_POST['country'];//发件人国家
	$mailcontent = "$mailmessage  $mailtitle $mailcountry";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = true;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "NO~~~~~~~~~~~~eRROR。";
		echo "<a href='contact.html'>Go Back</a>";
		exit();
	}
	echo "OK Goood！！";
	echo "<a href='contact.html'>Go Back</a>";
	echo "</div>";

?>
