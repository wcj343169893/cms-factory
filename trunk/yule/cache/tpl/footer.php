<?php defined('IN_DESTOON') or exit('Access Denied');?><html><div class="m950">
	<div class="b10">&nbsp;</div>
	<div class="foot_search">
		<div class="foot_search_m" id="foot_search_m">
		<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu'] && !$m['islink']) { ?><span id="foot_search_m_<?php echo $m['moduleid'];?>" onclick="setFModule(<?php echo $m['moduleid'];?>)" class="<?php if($m['moduleid']==$searchid) { ?>f_b<?php } else { ?><?php } ?>"><?php echo $m['name'];?></span> | <?php } ?><?php } } ?>
		</div>
		<div>
		<form id="foot_search" action="<?php echo DT_PATH;?>search.php" onsubmit="return Fsearch();">
		<input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="foot_moduleid"/>
		<input type="text" name="kw" class="foot_search_i" id="foot_kw" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键词<?php } ?>" onfocus="if(this.value=='请输入关键词') this.value='';"/>&nbsp;&nbsp;
		<input type="submit" class="foot_search_s" id="foot_search_s" value="搜索"/>
		</form>
		</div>
	</div>
	<div class="b10">&nbsp;</div>
</div>
<!--标准底部 start-->
<div class="footerBox">
	<div class="footer">
		<ul>
			<li><a href="<?php echo DT_PATH;?>">网站首页</a></li>
	    	<?php echo tag("table=webpage&condition=item=1&order=listorder desc,itemid desc&template=list-webpageali");?>
			<li><a href="<?php echo DT_PATH;?>sitemap/">网站地图</a></li>
			<?php if(extend_setting('link_enable')) { ?><li><a href="<?php echo extendurl('link');?>">友情链接</a></li><?php } ?>
			<?php if(extend_setting('guestbook_enable')) { ?><li><a href="<?php echo extendurl('guestbook');?>">网站留言</a></li><?php } ?>
			<?php if(extend_setting('ad_enable')) { ?><li><a href="<?php echo extendurl('ad');?>">广告服务</a></li><?php } ?>
            <?php if($DT['icpno']) { ?>
			<li class="no_border"><a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $DT['icpno'];?></a></li>
            <?php } ?>
  		</ul>
  		<ul>
			<li><?php echo $DT['copyright'];?></li>
	  	</ul>
	</div>
</div>
<!--标准底部 end--> 
<SCRIPT>
	function toueme(){
		document.getElementById("toubiao").style.display="none";
	}
</SCRIPT>
<script type="text/javascript">
var SearchID = 5;
var SearchURL = new Array();
SearchURL[5] = '<?php echo $MODULE['5']['linkurl'];?>';
SearchURL[6] = '<?php echo $MODULE['6']['linkurl'];?>';
SearchURL[4] = '<?php echo $MODULE['4']['linkurl'];?>';
SearchURL[7] = '<?php echo $MODULE['7']['linkurl'];?>';
SearchURL[21] = '<?php echo $MODULE['21']['linkurl'];?>';
function setDsearch(ID) {
	if(ID == SearchID) return;
	$('ms'+ID).className = 'w2 current';
	$('ms'+SearchID).className = 'w2';
	$('destoon_search').action = SearchURL[ID]+'search.php';
	SearchID = ID;	
}
function Dsearch() {
	if($('destoon_kw').value == '' || $('destoon_kw').value == '请输入关键字') {
		alert('请输入关键字');
		$('destoon_kw').focus();
		return false;
	}
}
<?php if($moduleid == 5) { ?>
setDsearch(5);
<?php } else if($moduleid == 6) { ?>
setDsearch(6);
<?php } else if($moduleid == 4) { ?>
setDsearch(4);
<?php } else if($moduleid == 7) { ?>
setDsearch(7);
<?php } else if($moduleid == 21) { ?>
setDsearch(21);
<?php } ?>
</script>
<script type="text/javascript">
	document.write('<script type="text/javascript" src="<?php echo DT_PATH;?>api/task.js.php?<?php echo $destoon_task;?>&refresh='+Math.random()+'.js"></sc'+'ript>');
</script>
<?php include template('stats', 'chip');?>
</body>
</html>
