<?php 
defined('IN_DESTOON') or exit('Access Denied');
if(!$MOD['show_html'] || !$itemid) return false;
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid AND status>2");
if(!$item) return false;
extract($item);
$CAT = get_cat($catid);
$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
$content = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
$content = $content['content'];
if($MOD['keylink']) $content = keylink($content, $moduleid);
$adddate = timetodate($addtime, 3);
$editdate = timetodate($edittime, 3);
$fileurl = $linkurl;
$linkurl = linkurl($MOD['linkurl'].$linkurl, 1);
$maincat = get_maincat(0, $CATEGORY);
$video_s = $video;
if(file_ext($video) == 'flv' && strpos($video, '?') === false) $video_s = DT_PATH.'file/flash/flvplayer.swf?vcastr_file='.$video_s.'&BufferTime=3&IsAutoPlay=1';
$video_w = $width;
$video_h = $height;
$video_p = $player;
$fee = get_fee($item['fee'], $MOD['fee_view']);
if($fee) {
	$description = '';
	$user_status = 4;
} else {
	$user_status = 3;
}
include DT_ROOT.'/include/seo.inc.php';
if($MOD['seo_show']) {
	eval("\$seo_title = \"$MOD[seo_show]\";");
} else {
	$seo_title = $seo_showtitle.$seo_delimiter.$seo_catname.$seo_modulename.$seo_delimiter.$seo_sitename;
}
$head_keywords = $keyword;
$head_description = $introduce ? $introduce : $title;
$template = $item['template'] ? $item['template'] : ($CAT['show_template'] ? $CAT['show_template'] : 'show');
$destoon_task = "moduleid=$moduleid&html=show&itemid=$itemid";
ob_start();
include template($template, $module);
$data = ob_get_contents();
ob_clean();
$filename = DT_ROOT.'/'.$MOD['moduledir'].'/'.$fileurl;
if($DT['pcharset']) $filename = convert($filename, DT_CHARSET, $DT['pcharset']);
file_put($filename, $data);
return true;
?>