<?php
define('DT_NONUSER', true);
require '../common.inc.php';
$charset = strtoupper($CFG['charset']);
if(!$submit) $fc = $charset == 'GBK' ? 'UTF-8' : 'GBK';
if($fc == 'GBK') {
	$tc = 'UTF-8';
} else {
	$fc = 'UTF-8';
	$tc = 'GBK';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $charset;?>"/>
<title>Charset Convert Tool</title>
</head>
<body>
<form action="index.php" method="post">
<select name="fc" onchange="var tc;if(this.value=='GBK'){tc='UTF-8';}else{tc='GBK';}document.getElementById('tc').innerHTML=tc">
<option value="GBK"<?php echo $fc == 'GBK' ? 'selected' : '';?>>GBK</option>
<option value="UTF-8"<?php echo $fc == 'UTF-8' ? 'selected' : '';?>>UTF-8</option>
</select>
<strong>-></strong> <span id="tc"><?php echo $tc;?></span>&nbsp;&nbsp;
<input type="submit" name="submit" value="Convert"/>转换之后的文件全部存放在<?php echo $tc;?>这个目录下面
</form>
<?php
function get_files($dir, $fs = array()) {
	$files = glob($dir.'/*');
	if(!is_array($files)) return $fs;
	foreach($files as $file) {
		if(is_dir($file)) {
			$fs = get_files($file, $fs);
		} else {
			$fs[] = $file;
		}
	}
	return $fs;
}
if($submit) {
	$files = get_files(DT_ROOT.'/convert/'.$fc);
	if($files):
	echo '--------------------------------------------<br/>';
	foreach($files as $file) {
		$new = str_replace('convert/'.$fc, 'convert/'.$tc, $file);
		if(in_array(file_ext($file), array('php', 'htm', 'html', 'css', 'js', 'txt', 'sql'))) {
			$data = convert(file_get($file), $fc, $tc);
			file_put($new, $data);
		} else {
			file_copy($file, $new);
		}
		$new = str_replace(DT_ROOT.'/convert/', '', $new);
		echo '-> '.$new.'<br/>';
	}
	endif;
}
?>
</body>
</html>