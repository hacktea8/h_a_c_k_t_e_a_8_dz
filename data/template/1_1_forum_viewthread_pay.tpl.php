<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($thread['freemessage']) { ?>
<div id="postmessage_<?php echo $pid;?>" class="t_f"><?php echo $thread['freemessage'];?></div>
<?php } if(empty($_GET['archiver'])) { ?>
<div class="locked">
<a href="javascript:;" class="y viewpay" title="��������" onclick="showWindow('pay', 'forum.php?mod=misc&action=pay&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php if(!empty($_GET['from'])) { ?>&from=<?php echo $_GET['from'];?><?php } ?>')">��������</a>
<em class="right">
<?php if($thread['payers']) { ?>���� <?php echo $thread['payers'];?> �˹���&nbsp; <?php } ?>
</em>
<?php if($_G['forum_thread']['price'] > 0) { ?>��������������֧�� <strong><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></strong> �������<?php } if($thread['endtime']) { ?><br />�����⹺���ֹ����Ϊ <?php echo $thread['endtime'];?>�����ں����<?php } ?>
</div>
</div>
<?php } else { if($thread['payers']) { ?>���� <?php echo $thread['payers'];?> �˹���&nbsp; <?php } if($_G['forum_thread']['price'] > 0) { ?>��������������֧�� <strong><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></strong> �������<?php } if($thread['endtime']) { ?><br />�����⹺���ֹ����Ϊ <?php echo $thread['endtime'];?>�����ں����<?php } } ?>