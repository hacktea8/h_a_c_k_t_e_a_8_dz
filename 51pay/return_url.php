<?php
/* * 
 * ���ܣ�֧����ҳ����תͬ��֪ͨҳ��
 * �汾��3.3
 * ���ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ҳ�湦��˵��*************************
 * ��ҳ����ڱ������Բ���
 * �ɷ���HTML������ҳ��Ĵ��롢�̻�ҵ���߼��������
 * ��ҳ�����ʹ��PHP�������ߵ��ԣ�Ҳ����ʹ��д�ı�����logResult���ú����ѱ�Ĭ�Ϲرգ���alipay_notify_class.php�еĺ���verifyReturn
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

//����ó�֪ͨ��֤���
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if( $verify_result) {//��֤�ɹ�
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//������������̻���ҵ���߼��������
	
	//�������������ҵ���߼�����д�������´�������ο�������
    //��ȡ֧������֪ͨ���ز������ɲο������ĵ���ҳ����תͬ��֪ͨ�����б�

	//�̻�������

	$out_trade_no = $_GET['out_trade_no'];

	//֧�������׺�

	$trade_no = $_GET['trade_no'];

	//����״̬
	$trade_status = $_GET['trade_status'];


    if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
		//�жϸñʶ����Ƿ����̻���վ���Ѿ���������
			//���û�������������ݶ����ţ�out_trade_no�����̻���վ�Ķ���ϵͳ�в鵽�ñʶ�������ϸ����ִ���̻���ҵ�����
			//���������������ִ���̻���ҵ�����
    }
	else if($_GET['trade_status'] == 'TRADE_FINISHED') {
		//�жϸñʶ����Ƿ����̻���վ���Ѿ���������
			//���û�������������ݶ����ţ�out_trade_no�����̻���վ�Ķ���ϵͳ�в鵽�ñʶ�������ϸ����ִ���̻���ҵ�����
			//���������������ִ���̻���ҵ�����
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
		
	echo "��֤�ɹ�<br />";
	echo "trade_no=".$trade_no;

	//�������������ҵ���߼�����д�������ϴ�������ο�������
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //��֤ʧ��
    //��Ҫ���ԣ��뿴alipay_notify.phpҳ���verifyReturn����
	echo 'fail';
    header('Location: /');
}
?>