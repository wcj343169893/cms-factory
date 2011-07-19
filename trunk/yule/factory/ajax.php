<?php
/**
 * 修改 by 文朝军
 * */
define ( 'DT_NONUSER', true );
require '../common.inc.php';
require DT_ROOT . '/include/post.func.php';
switch ($action) {
	case 'area' :
		$area_title = convert ( $area_title, 'UTF-8', DT_CHARSET );
		$area_extend = isset ( $area_extend ) ? stripslashes ( $area_extend ) : '';
		$areaid = isset ( $areaid ) ? intval ( $areaid ) : 0;
		$area_deep = isset ( $area_deep ) ? intval ( $area_deep ) : 0;
		$area_id = isset ( $area_id ) ? intval ( $area_id ) : 1;
		echo get_area_select ( $area_title, $areaid, $area_extend, $area_deep, $area_id );
		break;
	case 'category' :
		$category_title = convert ( $category_title, 'UTF-8', DT_CHARSET );
		$category_extend = isset ( $category_extend ) ? stripslashes ( $category_extend ) : '';
		$category_moduleid = isset ( $category_moduleid ) ? intval ( $category_moduleid ) : 1;
		if (! $category_moduleid)
			exit ();
		$category_deep = isset ( $category_deep ) ? intval ( $category_deep ) : 0;
		$cat_id = isset ( $cat_id ) ? intval ( $cat_id ) : 1;
		if ($_groupid == 1) {
			$R = cache_read ( 'right-' . $_userid . '.php' );
			if (isset ( $R [$category_moduleid] ['index'] ['catid'] )) {
				$_catids = $R [$category_moduleid] ['index'] ['catid'];
				if ($_catids) {
					$CATEGORY = cache_read ( 'category-' . $category_moduleid . '.php' );
					foreach ( $CATEGORY as $k => $c ) {
						if ($c ['parentid'] > 0)
							continue;
						if (! in_array ( $k, $_catids ))
							unset ( $CATEGORY [$k] );
					}
				}
			}
		}
		echo get_category_select ( $category_title, $catid, $category_moduleid, $category_extend, $category_deep, $cat_id );
		break;
	case 'product' :
		include DT_ROOT . '/module/sell/product.func.php';
		$product_title = convert ( $product_title, 'UTF-8', DT_CHARSET );
		$product_extend = isset ( $product_extend ) ? stripslashes ( $product_extend ) : '';
		echo get_product_select ( $product_title, $product_catid, $product_pid, $product_extend );
		break;
	case 'product_option' :
		include DT_ROOT . '/module/sell/product.func.php';
		$pid = isset ( $pid ) ? intval ( $pid ) : 0;
		$options = cache_read ( 'option-' . $pid . '.php' );
		$options or exit ();
		$values = array ();
		if ($product_itemid) {
			$result = $db->query ( "SELECT * FROM {$DT_PRE}sell_value WHERE itemid=$product_itemid" );
			while ( $r = $db->fetch_array ( $result ) ) {
				$values [$r ['oid']] = $r ['value'];
			}
		}
		$select = '<select id="product_require" style="display:none;">';
		$table = '<table cellpadding="2" cellspacing="2" class="product_option_t">';
		foreach ( $options as $k => $v ) {
			isset ( $values [$v ['oid']] ) or $values [$v ['oid']] = '';
			$table .= $v ['type'] ? '<tr><td class="product_option_l">' . $v ['name'] . ' ' . ($v ['required'] ? '<span class="f_red">*</span>' : '') . '</td><td class="product_option_r">' . product_html ( $values [$v ['oid']], $v ['oid'], $v ['type'], $v ['value'], $v ['extend'] ) . ' <span class="f_red" id="dproduct-' . $v ['oid'] . '"></span></td></tr>' : '<tr><td class="product_option_h" colspan="2">' . $v ['name'] . '</td></tr>';
			$select .= $v ['required'] ? '<option value="' . $v ['oid'] . '">' . $v ['name'] . '</option>' : '';
		}
		$table .= '</table>';
		$select .= '</select>';
		echo $table . $select;
		break;
	case 'clear' :
		@ignore_user_abort ( true );
		$session = new dsession ();
		if ($_SESSION ['uploads']) {
			foreach ( $_SESSION ['uploads'] as $file ) {
				delete_upload ( $file, $_userid );
			}
			$_SESSION ['uploads'] = array ();
		}
		break;
	case 'ipage' :
		isset ( $job ) or exit ();
		if ($job == 'sell') {
			$moduleid = 5;
		} else if ($job == 'buy') {
			$moduleid = 6;
		} else {
			exit ();
		}
		tag ( "moduleid=$moduleid&condition=status=3&pagesize=" . $DT ['page_trade'] . "&page=$page&datetype=2&order=addtime desc&time=addtime&template=list-trade" );
		break;
	case 'keyword' :
		$mid = isset ( $mid ) ? intval ( $mid ) : 0;
		$mid or exit ();
		isset ( $MODULE [$mid] ) or exit ();
		tag ( "moduleid=$mid&table=keyword&condition=moduleid=$mid and status=3&pagesize=10&order=total_search desc&template=list-search_kw" );
		break;
	case 'tipword' :
		if (! $DT ['search_tips'])
			exit ();
		$mid = isset ( $mid ) ? intval ( $mid ) : 0;
		$mid or exit ();
		isset ( $MODULE [$mid] ) or exit ();
		if (! $word || strlen ( $word ) < 2 || strlen ( $word ) > 30)
			exit ();
		$word = convert ( $word, 'UTF-8', DT_CHARSET );
		$word = str_replace ( array (' ', '*', "\'" ), array ('%', '%', '' ), $word );
		if (preg_match ( "/^[a-z0-9A-Z]+$/", $word )) {
			tag ( "moduleid=$mid&table=keyword&condition=moduleid=$mid and letter like '%$word%'&pagesize=10&order=total_search desc&template=list-search_tip", - 2 );
		} else {
			tag ( "moduleid=$mid&table=keyword&condition=moduleid=$mid and keyword like '%$word%'&pagesize=10&order=total_search desc&template=list-search_tip", - 2 );
		}
		break;
	case 'letter' :
		preg_match ( "/[a-z]{1}/", $letter ) or exit ();
		$cols = isset ( $cols ) ? intval ( $cols ) : 5;
		$precent = ceil ( 100 / $cols );
		$CATEGORY = cache_read ( 'category-' . $moduleid . '.php' );
		$CATALOG = array ();
		foreach ( $CATEGORY as $k => $v ) {
			if ($v ['letter'] == $letter)
				$CATALOG [] = $v;
		}
		include template ( 'letter', 'chip' );
		break;
	case 'catalog' :
		$mid = isset ( $mid ) ? intval ( $mid ) : 0;
		$mid or exit ();
		isset ( $MODULE [$mid] ) or exit ();
		include template ( 'catalog', 'chip' );
		break;
	case 'schcate' :
		isset ( $name ) or $name == '';
		if ($name)
			$name = convert ( $name, 'UTF-8', DT_CHARSET );
		$CATEGORY = cache_read ( 'category-' . $moduleid . '.php' );
		$limit = $DT ['schcate_limit'] ? intval ( $DT ['schcate_limit'] ) : 10;
		$html = '';
		$result = $db->query ( "SELECT catid FROM {$DT_PRE}category WHERE moduleid=$moduleid AND catname LIKE '%$name%' ORDER BY item DESC,catid DESC LIMIT $limit" );
		while ( $r = $db->fetch_array ( $result ) ) {
			$html .= '<input type="radio" name="dtcate" value="' . $r ['catid'] . '" onclick="load_category(' . $r ['catid'] . ', 1);" id="dtcate_' . $r ['catid'] . '"/> <label for="dtcate_' . $r ['catid'] . '">' . strip_tags ( cat_pos ( $r ['catid'] ) ) . '</label><br/>';
		}
		echo $html;
		break;
	case 'reccate' :
		isset ( $name ) or $name == '';
		if ($name)
			$name = convert ( $name, 'UTF-8', DT_CHARSET );
		$CATEGORY = cache_read ( 'category-' . $moduleid . '.php' );
		$limit = $DT ['schcate_limit'] ? intval ( $DT ['schcate_limit'] ) : 10;
		$table = get_table ( $moduleid );
		$key = in_array ( $moduleid, array (5, 6 ) ) ? 'tag' : 'keyword';
		$html = '';
		$result = $db->query ( "SELECT DISTINCT catid FROM {$table} WHERE `{$key}` LIKE '%$name%' ORDER BY addtime DESC LIMIT $limit" );
		while ( $r = $db->fetch_array ( $result ) ) {
			$html .= '<input type="radio" name="dtcate" value="' . $r ['catid'] . '" onclick="load_category(' . $r ['catid'] . ', 1);" id="dtcate_' . $r ['catid'] . '"/> <label for="dtcate_' . $r ['catid'] . '">' . strip_tags ( cat_pos ( $r ['catid'] ) ) . '</label><br/>';
		}
		echo $html;
		break;
	case 'ckpath' :
		if ($_groupid != 1)
			exit ();
		if ($moduleid < 5)
			exit ();
		if (strlen ( $path ) < 5)
			exit ();
		$path = convert ( $path, 'UTF-8', DT_CHARSET );
		$table = get_table ( $moduleid );
		if ($table) {
			$sql = "filepath='$path'";
			if ($itemid)
				$sql .= " AND itemid!=$itemid";
			if ($db->get_one ( "SELECT itemid FROM {$table} WHERE $sql" )) {
				exit ( lang ( 'message->ajax_filepath_exists' ) );
			} else {
				exit ( lang ( 'message->ajax_filepath_not_exists' ) );
			}
		}
		break;
	case 'member' :
		isset ( $job ) or $job = '';
		require DT_ROOT . '/module/' . $module . '/common.inc.php';
		isset ( $value ) or $value == '';
		$value = convert ( $value, 'UTF-8', DT_CHARSET );
		require MD_ROOT . '/member.class.php';
		$do = new member ();
		if (isset ( $userid ) && $userid)
			$do->userid = $userid;
		switch ($job) {
			case 'username' :
				if (! $value)
					exit ( lang ( 'message->ajax_member_username' ) );
				if (! $do->is_username ( $value ))
					echo $do->errmsg;
				break;
			case 'passport' :
				if (! $value)
					exit ();
				if (! $do->is_passport ( $value ))
					echo $do->errmsg;
				break;
			case 'password' :
				if (! $do->is_password ( $value, $value ))
					echo $do->errmsg;
				break;
			case 'payword' :
				if (! $do->is_payword ( $value, $value ))
					echo $do->errmsg;
				break;
			case 'email' :
				$value = trim ( $value );
				if (! is_email ( $value ))
					exit ( lang ( 'message->ajax_member_email' ) );
				if ($do->email_exists ( $value ))
					echo lang ( 'message->ajax_member_email_exists' );
				break;
			case 'emailcode' :
				$session = new dsession ();
				$value = trim ( $value );
				if (! preg_match ( "/[0-9]{6}/", $value ) || $value != $_SESSION ['emailcode'])
					echo '&nbsp;';
				break;
			case 'company' :
				if (! $value)
					exit ( lang ( 'message->ajax_member_company' ) );
				if ($do->company_exists ( $value ))
					echo lang ( 'message->ajax_member_company_exists' );
				break;
			case 'get_company' :
				$user = $do->get_one ( $value );
				if ($user) {
					echo '<a href="' . $user ['linkurl'] . '" target="_blank" class="t">' . $user ['company'] . '</a>' . ($user ['vip'] ? ' <img src="' . DT_SKIN . 'image/vip.gif" align="absmiddle"/> <img src="' . DT_SKIN . 'image/vip_' . $user ['vip'] . '.gif" align="absmiddle"/>' : '');
				} else {
					echo '1';
				}
				break;
		}
		break;
	case 'get_data' :
		if (! $_userid)
			exit ();
		$mid = isset ( $mid ) ? intval ( $mid ) : 0;
		$mid or exit ();
		isset ( $MODULE [$mid] ) or exit ();
		$file = DT_ROOT . '/file/user/' . dalloc ( $_userid ) . '/' . $_userid . '/editor.data.' . $mid . '.php';
		$content = file_get ( $file );
		if ($content) {
			echo substr ( $content, 13 );
		} else {
			echo '';
		}
		break;
	case 'save_data' :
		if (! $_userid)
			exit ();
		$mid = isset ( $mid ) ? intval ( $mid ) : 0;
		$mid or exit ();
		isset ( $MODULE [$mid] ) or exit ();
		if (! $content)
			exit ();
		$content = stripslashes ( $content );
		$content = convert ( $content, 'UTF-8', DT_CHARSET );
		$content = '<?php exit;?>' . timetodate ( $DT_TIME ) . $content;
		file_put ( DT_ROOT . '/file/user/' . dalloc ( $_userid ) . '/' . $_userid . '/editor.data.' . $mid . '.php', $content );
		break;
	case crypt_action ( 'captcha' ) :
		if (strlen ( $captcha ) < 4)
			exit ( '1' );
		$session = new dsession ();
		if (! isset ( $_SESSION ['captchastr'] ))
			exit ( '2' );
		$captcha = convert ( $captcha, 'UTF-8', DT_CHARSET );
		if ($_SESSION ['captchastr'] != md5 ( md5 ( strtoupper ( $captcha ) . DT_KEY . $DT_IP ) ))
			exit ( '3' );
		exit ( '0' );
		break;
	case crypt_action ( 'question' ) :
		if (strlen ( $answer ) < 1)
			exit ( '1' );
		$answer = stripslashes ( $answer );
		$answer = convert ( $answer, 'UTF-8', DT_CHARSET );
		$session = new dsession ();
		if (! isset ( $_SESSION ['answerstr'] ))
			exit ( '2' );
		if ($_SESSION ['answerstr'] != md5 ( md5 ( $answer . DT_KEY . $DT_IP ) ))
			exit ( '3' );
		exit ( '0' );
		break;
	case 'ixedit-module' :
		foreach ( $MODULE as $k => $v ) {
			if ($v ["moduleid"] > 3) {
				echo $v ["moduleid"] . "-" . $v ["name"] . ",";
			}
		}
		break;
	case 'ixedit-module-catlist' :
		$CATEGORY = cache_read ( 'category-' . $moduleid . '.php' );
		//print_r($CATEGORY);
		foreach ( $CATEGORY as $k => $v ) {
			echo $v ["catid"] . "-" . $v ["catname"] . ",";
		}
		break;
	case 'ixedit-templates' :
		echo tpl_select ( '', 'tag', 'module_template', '请选择模板', '0', 'id="module_template"' );
		break;
	case 'widget-setting' :
		if ($tuotuo) { //保存更改
			//修改配置config.inc.php
			$tmp = file_get ( DT_ROOT . '/config.inc.php' );
			$tmp = preg_replace ( "/[$]CFG\['widget_setting'\]\s*\=\s*[\"'].*?[\"']/is", "\$CFG['widget_setting'] = '$settings'", $tmp );
			file_put ( DT_ROOT . '/config.inc.php', $tmp );
			//include DT_ROOT.'/include/global.func.php';//暂时还没有用到
			include DT_ROOT . '/admin/global.func.php';
			//保存配置到数据库中啦
			if (update_one_setting ( "widget_setting", $settings )) {
				echo "保存成功";
			} else {
				echo "保存失败";
			}
		} else { //读取数据库中的设置
			include DT_ROOT . '/config.inc.php';
			extract ( dhtmlspecialchars ( $CFG ) );
			echo $widget_setting;
		}
		//echo tpl_select('', 'tag', 'module_template', '请选择模板', '0', 'id="module_template"');
		break;
	case 'widget-save' :
		include DT_ROOT . '/config.inc.php';
		extract ( dhtmlspecialchars ( $CFG ) );
		//读取模板$template
		//exit("aaa");
		//保存页面内容到文件中 
		$html_template = file_get ( DT_ROOT . '/template/' . $template . '/index.htm' );
		$t = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
		$html_template = $t;
		$html_template .= '<html>';
		$html_template .= '<head>';
		$html_template .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		$html_template .= '<link rel="stylesheet" type="text/css" href="plugins/ixedit/css/ixedit.css" />
		<link rel="stylesheet" type="text/css" href="plugins/ixedit/css/ui-sui.css" />
		<link rel="stylesheet" type="text/css" href="skin/deadRed/style.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="plugins/easywidgets/styles/jquery.easywidgets.css" />
		<link rel="stylesheet" type="text/css" href="factory/css/layout.css" />
		<link rel="stylesheet" type="text/css" href="plugins/easywidgets/styles/main.css" />';
		$html_template .= '</head>';
		$html_template .= '<body>';
		
		//实战演习啦.....
		$html_template = "{template 'header'}";
		$html_template .= '<div class="main">';
		$h_val = str_replace ( "\\\"", "\"", $h_val ); //这里把所有的 \" 替换为 '  保证这个文件能正常解析
		$h_val = str_replace ( "\\'", "'", $h_val ); //这里把所有的 \' 替换为 '  保证这个文件能正常解析
		$h_val = preg_replace ( "/<span class=\"widget-frame-menu\">(.*?)<\/span>/i", '', $h_val ); //这个可以删除编辑页面上的功能（编辑，删除）
		$h_val = preg_replace ( "/<span class=\"widget-menu\">(.*?)<\/span>/i", '', $h_val ); //这个可以删除编辑页面上的功能（编辑，删除）
		//style="cursor: move; " 删除这个手板
		$h_val = str_replace ( " style=\"cursor: move; \"", "", $h_val );
		$h_val = str_replace ( " style=\"cursor: default; \"", "", $h_val );
		//判定是否需要删除框架标题f_che <div class="widget-frame-header" style="cursor: move; ">1:1框架<span class="widget-frame-menu"></span></div>
		if ($f_che == "true") {
			$h_val = preg_replace ( "/<div class=\"widget-frame-header\">(.*?)<\/div>/i", '', $h_val );
		}
		//判定是否删除广告模块的标题  这里多删除了一个模块，需要修改正则表达式
		//		if ($a_che =="true") {
		//			$h_val = preg_replace ( "/<div class=\"widget-header\"><div><a href=\"(.*?)\"><strong>广告模块<\/strong><\/a><\/div><\/div>/i", '', $h_val );
		//		}
		$html_template .= $h_val;
		//		$html_template.="<div id='main'></div>";
		$html_template .= '</div>';
		$html_template .= "{template 'footer'}";
		
		//		$html_template.='</body>';
		//		$html_template.='</html>';
		//然后写入到文件中
		file_put ( DT_ROOT . '/template/' . $template . '/index.htm', $html_template );
		echo "写入成功";
		break;
	case 'window-update' :
		echo $pid . $content;
		break;
	case 'get-ad' :
		include DT_ROOT . '/lang/zh-cn/extend.inc.php';
		include DT_ROOT . '/module/extend/ad.class.php';
		isset ( $typeid ) or $typeid = 0;
		if ($typeid == 0) { //加载ad type 
			$TYPE = $L ['ad_type'];
			$ad_type = "<select onchange='getAdPlace(this.value)'>";
			foreach ( $TYPE as $k => $v ) {
				if ($k > 0) {
					$ad_type .= "<option value='$k'>$v</option>";
				}
			}
			$ad_type .= "</select>";
			echo $ad_type;
		
	//			echo $TYPE;
		//		print_r($TYPE);
		} else { //获取ad place
			$do = new ad ();
			$condition = "typeid=" . $typeid;
			$places = $do->get_list_place ( $condition );
			$ad_place = "<select id='ad_place_val'>";
			if (count ( $places ) == 0) {
				$ad_place .= "<option value='0'>暂无此类型的广告位</option>";
			}
			foreach ( $places as $k => $v ) {
				$ad_place .= "<option value='" . $v ["pid"] . "'>" . $v ["name"] . "</option>";
			}
			$ad_place .= "</select>";
			echo $ad_place;
		}
		//		echo $pid.$content;
		//echo "获取广告位";
		break;
	case 'get-template' :
		include DT_ROOT . '/admin/global.func.php';
		$select = '';
		$dirs = list_dir ( 'template' );
		foreach ( $dirs as $v ) {
			$selected = ($CFG ['template'] && $v ['dir'] == $CFG ['template']) ? 'selected' : '';
			$select .= "<option value='" . $v ['dir'] . "' " . $selected . ">" . $v ['name'] . "</option>";
		}
		$select = '<select id="web_template">' . $select . '</select>';
		echo $select;
		break;
}
?>