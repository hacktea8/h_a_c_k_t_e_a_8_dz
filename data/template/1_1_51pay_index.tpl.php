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
<h2> 温馨提醒：您尚未登录！请登录后在进行赞助升级！！</h2>
</div>
<?php } ?>

  <p>
<br>
<strong><span style="color: #ff0000;"><span style="font-size: large;"><span style="color: #0000ff;">1、捐助是对我们继续办好网站的一种赞许和支持，完全出于自愿，并清楚你的赞助不是商业交易行为。<br>
2、大家对本站的资金支持纯属自愿捐助性质，同时我们也保证所有资金用在本站自身建设上。<br>
3、希望大家在赞助前考虑清楚，你对本站捐助帮助是建立在纯粹自愿基础上的，如果觉得没有必要通过赞助获得VIP或教程币以及其他原因，请勿捐助。如果匆忙赞助，本站不予退还赞助费用，赞助会员是建立在对网站热爱的基础上才在资金上支持我们。<br>
4、VIP全站及其附属站点教程资料（视频）均可畅通无阻下载（观看），下载不扣教程币。因各地区网络接口不同，本站不承诺任何下载速度的保证，只保证资源下载的有效性。<br>
5、帐号仅限个人使用，严禁一号多用，否则进行封号处理。<br>
6、本声明最终解释权归本站[<?php echo $_G['setting']['sitename'];?>]所有。</span></span></span></strong>
  </p>
  <div class="clear"></div>
  <div id="viptype">
       <?php if(is_array($viptype)) foreach($viptype as $val) { ?>    <div class="vip">
   <h2>VIP <?php echo $val['title'];?>天</h2>
  <ul>
    <li><img src="/51pay/images/vip<?php echo $val['key'];?>/1.gif" title="VIP <?php echo $val['title'];?>天" alt="VIP <?php echo $val['title'];?>天" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/2.gif" title="VIP <?php echo $val['title'];?>天" alt="VIP <?php echo $val['title'];?>天" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/3.gif" title="VIP <?php echo $val['title'];?>天" alt="VIP <?php echo $val['title'];?>天" /></li>
<li><img src="/51pay/images/vip<?php echo $val['key'];?>/4.gif" title="VIP <?php echo $val['title'];?>天" alt="VIP <?php echo $val['title'];?>天" /></li>
  </ul>
  <div class="clear"></div>
  <?php if(is_array($val['type'])) foreach($val['type'] as $row) { ?>  <form action="/51pay/51pay.php" method="post">
  <strong><?php echo $row['type'];?>VIP ￥<?php echo $row['money'];?> </strong>
  <input type="hidden" name="money" value="<?php echo $row['money'];?>" />
  <input type="hidden" name="uid" value="<?php echo $_G['uid'];?>" />
  <input type="hidden" name="uname" value="<?php echo $_G['username'];?>" />
  <input type="submit" value="赞助" />
  </form>
  <?php } ?>
  
</div>
<?php } ?>

  </div>
  <div class="clear"></div>
  <div class="tips">
  <ul>
  <li style="color:red;">注意：</li>
  <li>1. VIP 具有所有权限（除了视频下载）。</li>
  <li>2. 至尊VIP 具有所有权限。</li>
  <li>3. 下单以后请在24小时之内付款，超过时间 订单有可能被删除。</li>
  <li>4. <img src="/51pay/images/vippay.jpg" alt="温馨提示" title="温馨提示" /></li>
  </ul>
  </div>
</div><?php include template('common/footer'); ?>