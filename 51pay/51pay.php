<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>����IT����ѧԺ��������VIP</title>
</head>
<?php
/* *
 * ���ܣ���׼˫�ӿڽ���ҳ
 * �汾��3.3
 * �޸����ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*************************
 * ������ڽӿڼ��ɹ������������⣬���԰��������;�������
 * 1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
 * 2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
 * 3��֧������̳��http://club.alipay.com/read-htm-tid-8681712.html��
 * �������ʹ����չ���������չ���ܲ�������ֵ��
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
define('APPTYPEID', 1);
define('CURSCRIPT', '51pay');

define('P_W','admincp');
define('R_P',dirname(__FILE__).'/../');
define('D_P',R_P);
function_exists('date_default_timezone_set') && date_default_timezone_set('Etc/GMT+0');

require_once(R_P.'source/class/class_core.php');
require_once R_P.'source/function/function_home.php';
$discuz = C::app();

$cachelist = array('magic','userapp','usergroups', 'diytemplatenamehome');
$discuz->cachelist = $cachelist;
$discuz->init();

define('CURMODULE', 'index');

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");

$onlineip = $_SERVER['REMOTE_ADDR'];
$datetime = time();

/**************************�������**************************/

        //֧������
        $payment_type = "1";
        //��������޸�
        //�������첽֪ͨҳ��·��
        $notify_url = $alipay_config['base_url']."/51pay/notify_url.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������

        //ҳ����תͬ��֪ͨҳ��·��
        $return_url = $alipay_config['base_url']."/51pay/return_url.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������������д��http://localhost/

        //����֧�����ʻ�
        $seller_email = $alipay_config['seller_email'];
       
        //����

         //�ջ�������
        $receive_name = $_POST['uname'];
        //�磺����

        //������
        $price = $_POST['money'];
		if( !in_array($price, $alipay_config['order_type'])){
		   $price = array_shift($alipay_config['order_type']);
		}
        //��������
        $subject = $alipay_config['order_subject'][$price]['title'];
        //����

        //��Ʒ����
        $quantity = "1";
        //�������Ĭ��Ϊ1�����ı�ֵ����һ�ν��׿�����һ���¶������ǹ���һ����Ʒ
        //��������
        $logistics_fee = "0.00";
        //������˷�
        //��������
        $logistics_type = "EXPRESS";
        //�������ֵ��ѡ��EXPRESS����ݣ���POST��ƽ�ʣ���EMS��EMS��
        //����֧����ʽ
        $logistics_payment = "SELLER_PAY";
        //�������ֵ��ѡ��SELLER_PAY�����ҳе��˷ѣ���BUYER_PAY����ҳе��˷ѣ�
        //��������

        $body = $subject;
        //��Ʒչʾ��ַ
        $show_url = '';
        //����http://��ͷ������·�����磺http://www.xxx.com/myorder.html

        //�ջ��˵�ַ
        $receive_address = '';
        //�磺XXʡXXX��XXX��XXX·XXXС��XXX��XXX��ԪXXX��

        //�ջ����ʱ�
        $receive_zip = '';
        //�磺123456

        //�ջ��˵绰����
        $receive_phone = '';
        //�磺0571-88158090

        //�ջ����ֻ�����
        $receive_mobile = '';
        //�磺13312341234
                    
	    $data = array('uid'=>$_POST['uid'],'uname'=>$_POST['uname'],'money'=>$price);		   
  $number = md5('hacktea8.com'.$data['uid'].time());

  $data = array(
  'number' => $number
  , 'uid' => $data['uid']
  , 'uname' => $data['uname']
  , 'money' => $data['money']
  , 'dateline' => date('Y-m-d H:i:s')
  , 'datetime' => $datetime
  , 'ip' => $onlineip
  , 'status' => 4
  , 'gid' => $alipay_config['order_subject'][$price]['gid']
  ,'days' => $alipay_config['order_subject'][$price]['days']
  ,'gtitle' => $subject
  );

var_dump($data);exit;
  C::t('order')->add_by_data($data);
  DB::query($sql);

  C::t('order')->add_log_by_data($data);

  /*ɾ������ δ֧��ʱ�䳬��30��*/
  C::t('order')->delete_by_dateline(time() - 2592000);
  C::t('order')->delete_log_by_dateline(time() - 2592000);
  
	     //����
        //�̻�������
        $out_trade_no   = $row['number'];
        //�̻���վ����ϵͳ��Ψһ�����ţ�����

/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�
$parameter = array(
		"service" => "trade_create_by_buyer",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"price"	        => $price,
		"quantity"	=> $quantity,
		"logistics_fee"	=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"receive_name"	=> $receive_name,
		"receive_address"	=> $receive_address,
		"receive_zip"	=> $receive_zip,
		"receive_phone"	=> $receive_phone,
		"receive_mobile"	=> $receive_mobile,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"post", "ȷ����һ��");
echo $html_text;

?>
</body>
</html>