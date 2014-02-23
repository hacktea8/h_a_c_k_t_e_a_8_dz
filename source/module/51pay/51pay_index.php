<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: search_portal.php 33522 2013-06-28 02:58:15Z laoguozhang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('NOROBOT', false);

require_once libfile('function/home');
//echo 888;exit;


$viptype = array(
  array('title'=>'30','key'=>1,'type' =>array(array('money'=>60,'type'=>''),array('money'=>90,'type'=>'жавП')))
  ,array('title'=>'180','key'=>2,'type' =>array(array('money'=>300,'type'=>''),array('money'=>450,'type'=>'жавП')))
  ,array('title'=>'365','key'=>3,'type' =>array(array('money'=>600,'type'=>''),array('money'=>900,'type'=>'жавП')))
);

include template('51pay/index');
