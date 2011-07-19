<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2010 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
class dsession {
    function dsession() {
		global $CFG;
		if($CFG['cookie_domain']) @ini_set('session.cookie_domain', $CFG['cookie_domain']);
    	if(is_dir(DT_ROOT.'/file/session/')) session_save_path(DT_ROOT.'/file/session/');
		session_cache_limiter('private, must-revalidate');
		session_start();
		header("cache-control: private");
    }
}
?>