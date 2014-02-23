<?php
/* *
 * 配置文件
 * 版本：3.3
 * 日期：2012-07-19
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
	
 * 提示：如何获取安全校验码和合作身份者id
 * 1.用您的签约支付宝账号登录支付宝网站(www.alipay.com)
 * 2.点击“商家服务”(https://b.alipay.com/order/myorder.htm)
 * 3.点击“查询合作者身份(pid)”、“查询安全校验码(key)”
	
 * 安全校验码查看时，输入支付密码后，页面呈灰色的现象，怎么办？
 * 解决方法：
 * 1、检查浏览器配置，不让浏览器做弹框屏蔽设置
 * 2、更换浏览器或电脑，重新登录查询。
 */
 
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id，以2088开头的16位纯数字
$alipay_config['partner']		= '2088702134217036';

//安全检验码，以数字和字母组成的32位字符
$alipay_config['key']			= 'ss7fw2qp12xbd2v10r72wlwlx1u5ad4b';

//网站域名
$alipay_config['base_url']      = 'http://www.hacktea8.com';

//卖家支付宝
$alipay_config['seller_email']  = '1187247901@qq.com';

//订单名称
$alipay_config['order_subject']  = array(60=>array('title'=>'VIP一个月','gid'=>16,'days'=>30),90=>array('title'=>'至尊VIP一个月','gid'=>24,'days'=>30),300=>array('title'=>'VIP半年','gid'=>16,'days'=>180),450=>array('title'=>'至尊VIP半年','gid'=>24,'days'=>180),600=>array('title'=>'VIP一年','gid'=>16,'days'=>365),900=>array('title'=>'至尊VIP一年','gid'=>24,'days'=>365));
$alipay_config['order_type']     = array_keys($alipay_config['order_subject']);
$alipay_config['vip_groups']     = array(16,24);
//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


//签名方式 不需修改
$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config['input_charset']= strtolower('gbk');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
$alipay_config['cacert']    = getcwd().'\\cacert.pem';

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';
?>