<?php
//define('P_W','admincp');
!function_exists('readover') && exit('Forbidden');
//require_once(D_P.'global.php');
if( !isset($order_info['uid'])){
die();
}
$rt = $db->get_one("SELECT `uid`,`email`,`groupid`, `groups` FROM `pw_members` WHERE `uid`=$order_info[uid] LIMIT 1");


    //require_once(D_P.'lib/user/userservice.class.php');
	//$userService = L::loadClass('UserService', 'user'); /* @var $userService PW_UserService */
	
	if ($rt['extra_1'] = 1) {
		if ($rt['groupid'] == '-1') {
			$sql = sprintf("UPDATE `pw_members` SET `groupid`=%d WHERE `uid`=%d LIMIT 1",$order_info['gid'], $rt['uid']);
			$db->query($sql);
		} else {
			$groups = $rt['groups'] ? $rt['groups'].$rt['groupid'].',' : ",$rt[groupid],";
			$groups = explode(',',$groups);
                        $groups = array_unique($groups);
                        $groups = implode(',', $groups);
			$sql = sprintf("UPDATE `pw_members` SET `groupid`=%d,`groups`='%s' WHERE `uid`=%d LIMIT 1",$order_info['gid'], $groups, $rt['uid']);
			$db->query($sql);
		}
	} 
	/*else {
		$groups = $rt['groups'] ? $rt['groups'].$g['gid'].',' : ",$g[gid],";
		$userService->update($rt['uid'], array('groups' => $groups));
	}
	*/
	$togid = in_array($rt['groupid'], $alipay_config['vip_groups'])? -1: $rt['groupid'];
	$db->pw_update(
		"SELECT uid FROM pw_extragroups WHERE uid=" . S::sqlEscape($rt['uid']) . " AND gid=" . S::sqlEscape($order_info['gid']),
		"UPDATE pw_extragroups SET ". S::sqlSingle(array(
			//'togid'		=> $togid,
			'startdate'	=> $timestamp,
			'days'		=> $order_info['days']
		)) . " WHERE uid=" . S::sqlEscape($rt['uid']) . " AND gid=" . S::sqlEscape($order_info['gid'])
		,
		"INSERT INTO pw_extragroups SET " . S::sqlSingle(array(
			'uid'		=> $rt['uid'],
			'togid'		=> $togid,
			'gid'		=> $order_info['gid'],
			'startdate'	=> $timestamp,
			'days'		=> $order_info['days']
		))
	);

	    require_once(R_P.'phpmailer/sendemail.php');
		$subject='用户'.$order_info['uname'].'购买用户组'.$order_info['gtitle'].'花费'.$order_info['money'];
		//$content='用户'.$order_info['uname'].'购买用户组'.$order_info['gtitle'].'花费'.$order_info['money'];

		sendemail($rt['email'],$subject,$order_info);

function addVIPGroup(){
    	if($join) {
			$extgroupidsarray = array();
			foreach(array_unique(array_merge($extgroupids, array($groupid))) as $extgroupid) {
				if($extgroupid) {
					$extgroupidsarray[] = $extgroupid;
				}
			}
			$extgroupidsnew = implode("\t", $extgroupidsarray);
			if($group['dailyprice']) {
				if(($days = intval($_GET['days'])) < $group['minspan']) {
					showmessage('usergroups_span_invalid', '', array('minspan' => $group['minspan']));
				}

				if($space['extcredits'.$creditstrans] - ($amount = $days * $group['dailyprice']) < ($minbalance = 0)) {
					showmessage('credits_balance_insufficient', '', array('title'=> $_G['setting']['extcredits'][$creditstrans]['title'],'minbalance' => ($minbalance + $amount)));
				}

				$groupterms['ext'][$groupid] = ($groupterms['ext'][$groupid] > TIMESTAMP ? $groupterms['ext'][$groupid] : TIMESTAMP) + $days * 86400;

				$groupexpirynew = groupexpiry($groupterms);

				C::t('common_member')->update($_G['uid'], array('groupexpiry' => $groupexpirynew, 'extgroupids' => $extgroupidsnew));
				updatemembercount($_G['uid'], array($creditstrans => "-$amount"), true, 'UGP', $extgroupidsnew);

				C::t('common_member_field_forum')->update($_G['uid'], array('groupterms' => serialize($groupterms)));

			} else {
				C::t('common_member')->update($_G['uid'], array('extgroupids' => $extgroupidsnew));
			}
}


?>