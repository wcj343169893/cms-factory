<?php defined('IN_DESTOON') or exit('Access Denied');?><html><?php if($typeid==1) { ?>
<?php echo $code;?>
<?php } else if($typeid==2) { ?>
<a href="<?php echo $url;?>" title="<?php echo $text_title;?>" target="_blank"><?php echo $text_name;?></a>
<?php } else if($typeid==3) { ?>
<?php if($url) { ?><a href="<?php echo $url;?>" target="_blank"><?php } ?><img src="<?php echo $image_src;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $image_alt;?>"/><?php if($url) { ?></a><?php } ?>
<?php } else if($typeid==4) { ?>
<?php if($url) { ?><a href="<?php echo $url;?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/spacer.gif" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="" style="position:absolute;z-index:2;"/></a><?php } ?><embed src="<?php echo $flash_src;?>" quality="high" loop="false" extendspage="http://get.adobe.com/flashplayer/" type="application/x-shockwave-flash" wmode="transparent" width="<?php echo $width;?>" height="<?php echo $height;?>"></embed>
<?php } else if($typeid == 5) { ?>
<script type="text/javascript">
var config='5|0xFFFFFF|0x333333|80|0xFAFAFA|0x333333|0x000000';
var files='<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><?php if($i) { ?>|<?php } ?><?php echo $t['thumb'];?><?php } } ?>';
var links='<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><?php if($i) { ?>|<?php } ?><?php echo $t['linkurl'];?><?php } } ?>';
var texts='<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><?php if($i) { ?>|<?php } ?><?php echo $t['alt'];?><?php } } ?>';
document.write('<embed src="<?php echo DT_PATH;?>file/flash/slide.swf" wmode="opaque" FlashVars="config='+config+'&bcastr_flie='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="<?php echo $width;?>" height="<?php echo $height;?>" type="application/x-shockwave-flash" extendspage="http://get.adobe.com/flashplayer/"></embed>');
</script>
<?php } else if($typeid==6) { ?>
	<?php if($tags) { ?>
		<div id="adword">
		<div class="adword"><?php include template('list-'.$ad_module, 'tag');?></div>
		</div>
	<?php } ?>
<?php } ?>
