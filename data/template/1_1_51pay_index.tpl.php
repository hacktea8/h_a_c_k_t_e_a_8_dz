<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');?><?php include template('common/header'); ?><style type="text/css">
#nologin h2{color:red;text-align:center;display:block;font-size:medium;}
#viptype{height:350px;margin-top:25px;}
.vip{width:320px;float:left;}
.vip form{float:left;}
.vip h2{color:red;text-align:center;display:block;}
.vip ul li{width:140px;float:left;}
</style>
<?php if(!$_G['uid']) { ?>
<div id="nologin">
<h2> ��ܰ���ѣ�����δ��¼�����¼���ڽ���������������</h2>
</div>
<?php } ?>

  <p>
<br>
<strong><span style="color: #ff0000;"><span style="font-size: large;"><span style="color: #0000ff;">1�������Ƕ����Ǽ��������վ��һ��������֧�֣���ȫ������Ը��������������������ҵ������Ϊ��<br>
2����ҶԱ�վ���ʽ�֧�ִ�����Ը�������ʣ�ͬʱ����Ҳ��֤�����ʽ����ڱ�վ���������ϡ�<br>
3��ϣ�����������ǰ�����������Ա�վ���������ǽ����ڴ�����Ը�����ϵģ��������û�б�Ҫͨ���������VIP��̳̱��Լ�����ԭ����������������æ��������վ�����˻��������ã�������Ա�ǽ����ڶ���վ�Ȱ��Ļ����ϲ����ʽ���֧�����ǡ�<br>
4��VIPȫվ���丽��վ��̳����ϣ���Ƶ�����ɳ�ͨ�������أ��ۿ��������ز��۽̳̱ҡ������������ӿڲ�ͬ����վ����ŵ�κ������ٶȵı�֤��ֻ��֤��Դ���ص���Ч�ԡ�<br>
5���ʺŽ��޸���ʹ�ã��Ͻ�һ�Ŷ��ã�������з�Ŵ�����<br>
6�����������ս���Ȩ�鱾վ[<?php echo $_G['setting']['sitename'];?>]���С�</span></span></span></strong>
  </p>
  <div class="clear"></div>
  <div id="viptype">
       <?php if(is_array($viptype)) foreach($viptype as $val) { ?>    <div class="vip">
   <h2>VIP <?php echo $val['title'];?>��</h2>
  <ul>
    <li><img src="/51pay/images/vip<?php echo $val['key'];?>/1.gif" title="VIP <?php echo $val['title'];?>��" alt="VIP <?php echo $val['title'];?>��" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/2.gif" title="VIP <?php echo $val['title'];?>��" alt="VIP <?php echo $val['title'];?>��" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/3.gif" title="VIP <?php echo $val['title'];?>��" alt="VIP <?php echo $val['title'];?>��" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/4.gif" title="VIP <?php echo $val['title'];?>��" alt="VIP <?php echo $val['title'];?>��" /></li>
  </ul>
  <div class="clear"></div>
  <?php if(is_array($val['type'])) foreach($val['type'] as $row) { ?>  <form action="/51pay/51pay.php" method="post">
  <strong><?php echo $row['type'];?>VIP ��<?php echo $row['money'];?> </strong>
  <input type="hidden" name="money" value="<?php echo $row['money'];?>" />
  <input type="hidden" name="uid" value="<?php echo $_G['uid'];?>" />
  <input type="hidden" name="uname" value="<?php echo $_G['username'];?>" />
  <input type="submit" value="����" />
  </form>
  <?php } ?>
  
</div>
<?php } ?>

  </div>
  <div class="clear"></div>
  <div class="tips">
  <ul>
  <li style="color:red;">ע�⣺</li>
  <li>1. VIP ��������Ȩ�ޣ�������Ƶ���أ���</li>
  <li>2. ����VIP ��������Ȩ�ޡ�</li>
  <li>3. �µ��Ժ�����24Сʱ֮�ڸ������ʱ�� �����п��ܱ�ɾ����</li>
  <li>4. <img src="/51pay/images/vippay.jpg" alt="��ܰ��ʾ" title="��ܰ��ʾ" /></li>
  </ul>
  </div>
</div><?php include template('common/footer'); ?>