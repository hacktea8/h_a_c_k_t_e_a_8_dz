<?php
/* *
 * �����ļ�
 * �汾��3.3
 * ���ڣ�2012-07-19
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
	
 * ��ʾ����λ�ȡ��ȫУ����ͺ��������id
 * 1.������ǩԼ֧�����˺ŵ�¼֧������վ(www.alipay.com)
 * 2.������̼ҷ���(https://b.alipay.com/order/myorder.htm)
 * 3.�������ѯ���������(pid)��������ѯ��ȫУ����(key)��
	
 * ��ȫУ����鿴ʱ������֧�������ҳ��ʻ�ɫ��������ô�죿
 * ���������
 * 1�������������ã������������������������
 * 2���������������ԣ����µ�¼��ѯ��
 */
 
//�����������������������������������Ļ�����Ϣ������������������������������
//���������id����2088��ͷ��16λ������
$alipay_config['partner']		= '2088702134217036';

//��ȫ�����룬�����ֺ���ĸ��ɵ�32λ�ַ�
$alipay_config['key']			= 'ss7fw2qp12xbd2v10r72wlwlx1u5ad4b';

//��վ����
$alipay_config['base_url']      = 'http://www.hacktea8.com';

//����֧����
$alipay_config['seller_email']  = '1187247901@qq.com';

//��������
$alipay_config['order_subject']  = array(60=>array('title'=>'VIPһ����','gid'=>16,'days'=>30),90=>array('title'=>'����VIPһ����','gid'=>24,'days'=>30),300=>array('title'=>'VIP����','gid'=>16,'days'=>180),450=>array('title'=>'����VIP����','gid'=>24,'days'=>180),600=>array('title'=>'VIPһ��','gid'=>16,'days'=>365),900=>array('title'=>'����VIPһ��','gid'=>24,'days'=>365));
$alipay_config['order_type']     = array_keys($alipay_config['order_subject']);
$alipay_config['vip_groups']     = array(16,24);
//�����������������������������������Ļ�����Ϣ������������������������������


//ǩ����ʽ �����޸�
$alipay_config['sign_type']    = strtoupper('MD5');

//�ַ������ʽ Ŀǰ֧�� gbk �� utf-8
$alipay_config['input_charset']= strtolower('gbk');

//ca֤��·����ַ������curl��sslУ��
//�뱣֤cacert.pem�ļ��ڵ�ǰ�ļ���Ŀ¼��
$alipay_config['cacert']    = getcwd().'\\cacert.pem';

//����ģʽ,�����Լ��ķ������Ƿ�֧��ssl���ʣ���֧����ѡ��https������֧����ѡ��http
$alipay_config['transport']    = 'http';
?>