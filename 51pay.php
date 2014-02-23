<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: search.php 26313 2011-12-08 09:12:56Z yangli $
 */

define('APPTYPEID', 0);
define('CURSCRIPT', '51pay');

require './source/class/class_core.php';

$discuz = C::app();

$cachelist = $slist = array();
$mod = 'index';
$discuz->cachelist = $cachelist;
$discuz->init();

define('CURMODULE', $mod);


runhooks();

//require_once libfile('function/search');

//include template('51pay/index');
require DISCUZ_ROOT.'./source/module/51pay/51pay_'.$mod.'.php';

?>