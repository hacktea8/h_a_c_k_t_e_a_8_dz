<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
define('P_W','admincp');
define('R_P',dirname(__FILE__).'/../');
define('D_P',R_P);
define('PRO','1');
define('SCR','return_url');


function_exists('date_default_timezone_set') && date_default_timezone_set('Etc/GMT+0');

require_once(R_P.'require/common.php');
require_once(R_P.'51pay/db.php');

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if( $verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];


    if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
	else if($_GET['trade_status'] == 'TRADE_FINISHED') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
	 $order_info = $db->get_one("SELECT `uid`,`gid`,`days`,`gtitle`,`uname`,`money` FROM `pw_order_log` WHERE `status`=4 AND `number`='$out_trade_no' LIMIT 1");
       // var_dump($order_info);exit;
      if(isset($order_info['uid']) && $order_info['uid']){
        require_once(R_P.'51pay/pay_vip.php');
        $db->query("DELETE FROM `bbspw_order` WHERE `status`=4 AND `number`='$out_trade_no' LIMIT 1");
        $db->query("UPDATE `bbspw_order_log` SET`status`=6 WHERE `status`=4 AND `number`='$out_trade_no' LIMIT 1");
      }	
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
     
    }
		
	echo "验证成功<br />";
	echo "trade_no=".$trade_no;

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
	echo 'fail';
    header('Location: /');
}
?>