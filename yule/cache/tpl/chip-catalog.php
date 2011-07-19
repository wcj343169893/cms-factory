<?php defined('IN_DESTOON') or exit('Access Denied');?>	<?php $CATEGORY = cache_read('category-'.$mid.'.php');?>
		<?php $child = get_maincat(0, $CATEGORY, 1);?>
		<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
		 	<div class="business  bd" onmousemove="getFocus(this)" onmouseout="lostFocus(this)">
		 	<h4>
			 	<a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" class="px15">
			 		<strong><?php echo set_style($c['catname'], $c['style']);?></strong>
			 	</a>
		 	</h4>
			<?php if($c['child']) { ?>
			<?php $sub = get_maincat($c['catid'], $CATEGORY, 1);?>
				<dl>
				<?php if(is_array($sub)) { foreach($sub as $j => $s) { ?>
				<a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $s['linkurl'];?>" target="_blank" class="g"><?php echo set_style($s['catname'], $s['style']);?></a>
				<?php } } ?>
				<?php if($j>8) { ?><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" class="g">更多</a><?php } ?>
				</dl>
				<div class="c_b"></div>
			<?php } ?> 
			</div>
		<?php } } ?>
