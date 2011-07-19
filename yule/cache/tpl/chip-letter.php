<?php defined('IN_DESTOON') or exit('Access Denied');?><html><ul class='clr'>
<?php if($CATALOG) { ?>
<?php if(is_array($CATALOG)) { foreach($CATALOG as $i => $c) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a></li>
<?php } } ?>
<?php } else { ?>
没有拼音字母 <strong><?php echo $letter;?></strong> 开头的类目
<?php } ?>
</ul>
