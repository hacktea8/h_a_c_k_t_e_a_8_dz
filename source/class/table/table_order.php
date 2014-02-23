<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_regip.php 28771 2012-03-12 09:13:43Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_order extends discuz_table
{
	public function __construct() {

		$this->_table = 'order';
                $this->_table_log = 'order_log';

		$this->_pk    = '';

		parent::__construct();
	}

	public function fetch_by_ip_dateline($clientip, $dateline) {
		return DB::fetch_first('SELECT count FROM %t WHERE ip=%s AND count>0 AND dateline>%d', array($this->_table, $clientip, $dateline));
	}

        public function add_by_data($data = array()){
                return DB::insert($this->_table, $data);
        }

        public function add_log_by_data($data = array()){
                return DB::insert($this->_table_log, $data);
        }


	public function count_by_ip_dateline($ctrlip, $dateline) {
		if(!empty($ctrlip)) {
			return DB::result_first('SELECT COUNT(*) FROM %t WHERE '.DB::field('ip', $ctrlip, 'like').' AND count=-1 AND dateline>%d  LIMIT 1', array($this->_table, $dateline));
		}
		return 0;
	}

	public function update_status_by_uid($uid) {
		return DB::query('UPDATE %t SET `status`=6 WHERE uid=%d LIMIT 1', array($this->_table, $uid));
	}

        public function update_log_status_by_uid($uid) {
		return DB::query('UPDATE %t SET `status`=6 WHERE uid=%d LIMIT 1', array($this->_table, $uid));
	}


	public function delete_by_dateline($dateline) {
		return DB::query('DELETE FROM %t  WHERE `status`=4 AND `datetime`<=%d', array($this->_table, $dateline), false, true);
	}

        public function delete_log_by_dateline($dateline) {
		return DB::query('DELETE FROM %t WHERE `status`=4 AND `datetime`<=%d', array($this->_table_log, $dateline), false, true);
	}

}

?>