<?php defined('IN_DESTOON') or exit('Access Denied');?><html><?php include template('header');?>
<link href="<?php echo DT_SKIN;?>css/news.css" rel="stylesheet" type="text/css" />
<!--start		-->
<div class="Oa">
  <div class="cf bs1f h_subnav">
    <dl>
      <dt class="f14 fwb cf30">企商网</dt>
      <dd><a href="#">最新动态</a>|<a href="#">媒体报道</a>|<a href="#">图片</a>|<a href="#">视频</a><br />
        <a href="#">通知公告</a>|<a href="#">商家访谈</a>|<a href="#">专题</a>|<a href="#">招聘</a></dd>
      <dt class="f14 fwb cf30">行 <span class="hr8">&nbsp;</span> 业</dt>
      <dd><a href="#" target="_blank">五金工具</a>|<a href="#" target="_blank">机械设备</a>|<a href="#" target="_blank">纺织</a>|<a href="#" target="_blank">皮革</a>|<a href="#" target="_blank">服装</a><br />
        <a href="#" target="_blank">电工电气</a>|<a href="#" target="_blank">印刷包装</a>|<a href="#" target="_blank">化工</a>|<a href="#" target="_blank">塑胶</a>|<a href="#" target="_blank">服饰</a></dd>
      <dt class="f14 fwb cf30">经理人</dt>
      <dd><a href="#">成功故事</a>|<a href="#">商机创业</a>|<a href="#">电子商务</a><br />
        <a href="#">市场营销</a>|<a href="#">投资理财</a>|<a href="#">网络营销</a></dd>
    </dl>
  </div>
</div>
<!--end		-->
<div class="hr8"></div>
<!--start		-->
<div class="Oa">
  <div class="fl cf w692">
<div class="fl w320 news">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=2 and thumb!=''&order=".$MOD['order']."&pagesize=".$MOD['page_islide']."&width=320&height=200&target=_blank&template=slide");?>

      <div class="cf f14 T_center c0047 h">
        <ul>
          <li class="noBg current" id="m01"><a href="/announce/">本站公告</a></li>
          <li id="m02"><a href="/announce/">媒体报道</a></li>
          <li id="m03"><a href="/announce/">通知公告</a></li>
        </ul>
      </div>
      <div class="c0047 list00 c">
        <ul class="current" id="c01">
                  <?php $tags=tag("table=announce&condition=1&pagesize=5&datetype=2&order=listorder desc,addtime desc&template=null");?>
                  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                  <li ><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a></li>
                  <?php } } ?>
        </ul>
        <ul class="current" id="c02" style="display:none;">
                  <?php $tags=tag("table=announce&condition=1&pagesize=5&datetype=2&order=listorder desc,addtime desc&template=null");?>
                  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                  <li ><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a></li>
                  <?php } } ?>
        </ul>
        <ul class="current" id="c03" style="display:none;">
                  <?php $tags=tag("table=announce&condition=1&pagesize=5&datetype=2&order=listorder desc,addtime desc&template=null");?>
                  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                  <li ><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a></li>
                  <?php } } ?>
        </ul>
      </div>
    </div>      
      
    <div class="fr w364 nhtopc">
      <div class="bs1b">
        <div class="headline">
                  <?php $tags=tag("moduleid=$moduleid&length=30&condition=status=3 and level=5&order=".$MOD['order']."&pagesize=1&template=null");?>
                  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                  <h1 class="T_center f18 c04a"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></h1>
<p ><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['introduce'];?>"><?php echo dsubstr($t['introduce'], 90);?>...</a><a href="<?php echo $t['linkurl'];?>" class="fsim red">[详细]</a></p>
                  <?php } } ?>
        </div>
        <div class="cf fsim l">
          <dl>
                  <?php $tags=tag("moduleid=$moduleid&length=28&condition=status=3 and level=4&pagesize=10&order=".$MOD['order']."&template=null");?>
                  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                  <dt ><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo $CATEGORY[$t['catid']]['linkurl'];?>" target="_blank" title="<?php echo $CATEGORY[$t['catid']]['catname'];?>">[<?php echo $CATEGORY[$t['catid']]['catname'];?>]</a></dt>
                  <dd><a href="<?php echo $t['linkurl'];?>" class="fl" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a><?php echo timetodate($t['addtime'], 2);?></dd>
                  <?php } } ?>
          </dl>
        </div>
      </div>
    </div>
  </div>
  
  <div class="fr w260">
   <!--start		视频-->
    <div class="bs1b h_video">
      <div class="T_center">
       <div id="v_player"></div>
<script type="text/javascript">
function Pl(u, p, a, i) {
Inner('v_player', player(u,240,200,p,a));
Inner('v_title', $('v_title_'+i).innerHTML);
}
</script>
      </div>
            <div class="cf l">
        <ul>
<?php $tags=tag("moduleid=14&condition=status=3 and level=1&order=".$MOD['order']."&length=30&pagesize=3&template=null")?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <li class="cf">
            <h5 id="v_title_<?php echo $i;?>"><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h5>
            <div class="fl video_thumb"><img src="<?php echo $t['thumb'];?>" title="点击播放" width="68" height="51" class="c" onclick="Pl('<?php echo $t['video'];?>',<?php echo $t['player'];?>,1,<?php echo $i;?>);" /><img src="<?php echo DT_SKIN;?>images/news/videoico.gif" alt="" width="17" height="17" class="i" /></div>
            <p class="c666"></p>
          </li>
<?php if($i==0) { ?><script type="text/javascript">Pl('<?php echo $t['video'];?>',<?php echo $t['player'];?>,0,<?php echo $i;?>);</script><?php } ?>
<?php } } ?>
        </ul>
      </div>
    </div>
     <!--end		视频-->
</div>
<!--end		-->
<div class="hr8"></div>
<!--start		-->
<div class="Oa">
  <div class="fl cf w692">
		<?php if(is_array($childcat)) { foreach($childcat as $i => $c) { ?>
		<?php if($i%2==0) { ?><div class="fl w342"><?php } else { ?><div class="fr w342"><?php } ?>
      <div class="MnH">
        <div class="h"><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" class="fr fsim c04a" target="_blank">更多>></a><h3 class="f14 c0047"><?php echo $c['catname'];?></h3></div>
        <div class="c Mhc">
             <div class="cf img">
<?php $tags=tag("moduleid=$moduleid&catid=".$c['catid']."&length=35&condition=status=3&order=".$MOD['order']."&pagesize=7&template=null")?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
		<?php if($i<1) { ?>
                   <h4 class="f14 c0047"><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo dsubstr($t['title'], 20);?></a></h4><img src="<?php echo imgurl($t['thumb'], 1);?>" alt="<?php echo $t['title'];?>" width="120" height="90" class="fl p2b1e" />
                   <p class="c666"><?php echo dsubstr($t['introduce'], 70);?>...<a href="<?php echo $t['linkurl'];?>" class="fsim red" target="_blank">[详细]</a></p>
             </div>
          <div class="cf c0047 fsim l">
            <dl>        
		<?php } else { ?>    
               <dd><a href="<?php echo $t['linkurl'];?>" class="fl" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a><?php echo timetodate($t['edittime'], 2);?></dd>
		<?php } ?>
<?php } } ?>
            </dl>
          </div>

        </div>
      </div>

    </div>
<?php } } ?>


  <div class="fl cf w692 MnH imgshow">
    <div class="h"><a href="<?php echo $MODULE['12']['linkurl'];?>" class="fr fsim c04a" target="_blank">更多>></a>
      <h3 class="f14 c0047">企商网图库</h3>
    </div>
    <div class="cf T_center c l">
      <ul>
			<?php $tags=tag("moduleid=12&condition=status=3&order=hits desc&length=20&pagesize=8&template=null");?>
			<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                    <li><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" width="140" height="105" class="p2b1e" /></a><br /><a href="<?php echo $t['linkurl'];?>" title="#" target="_blank"><?php echo $t['title'];?></a></li>
			<?php } } ?>
      </ul>
    </div>
  </div>


  </div>
  
  <div class="fr w260 MnH chem B8">
   <div class="h"><!--<a href="#" class="fr fsim c04a" target="_blank">更多>></a>--><h3 class="f14 c0047">按分类浏览</h3></div>
		<div class="box_body">
		<table width="100%" cellpadding="3">
		<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
		<?php if($k%2==0) { ?><tr><?php } ?>
		<td><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a> <span class="f_gray px10">(<?php echo $ITEMS[$v['catid']];?>)</span></td>
		<?php if($k%2==1) { ?></tr><?php } ?>
		<?php } } ?>
		</table>
		</div>
  </div>

  <div class="fr w260 MnH chem">
   <div class="h"><!--<a href="#" class="fr fsim c04a" target="_blank">更多>></a>--><h3 class="f14 c0047">推荐图文</h3></div>
    <div class="c0047">
    		<div class="box_body thumb"><?php echo tag("moduleid=$moduleid&length=20&condition=status=3 and level=3 and thumb<>''&pagesize=".$MOD['page_irecimg']."&order=".$MOD['order']."&width=110&height=80&cols=2&target=_blank&template=thumb-table");?></div>
    </div>


  </div>

  <div class="fr w260 MnH chem B8">
   <div class="h"><!--<a href="#" class="fr fsim c04a" target="_blank">更多>></a>--><h3 class="f14 c0047">点击排行</h3></div>
    <div class="c0047 list00 c">
      <ul>
			<?php $tags=tag("moduleid=$moduleid&length=31&condition=status=3 and addtime>$today_endtime-30*86400&order=hits desc&pagesize=12&template=null");?>
			<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                <li ><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a></li>
			<?php } } ?>
      </ul>
    </div>
  </div>

</div>
<!--end		-->
<div class="hr8"></div>


<!--start		合作媒体-->
<div class="Oa">
  <div class="b1c friendlink">
    <h3 class="c333 f14"><span class="fr fwn">友情合作：services@qshang.com</span>合作媒体</h3>
    <div class="c616 l">
      <ul class="cf img">
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>
         <li><a href="#" target="_blank" title=""><img src="<?php echo SKIN_PATH;?>images/news/newslink.jpg" width="88" height="31" alt="TVB"></a></li>

      </ul>
      <ul class="cf txt">
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        <li><a href="http://www.qshang.com" target="_blank" title="">企商网</a></li> 
        
      </ul>
    </div>
  </div>
</div>
<!--end		合作媒体-->

<script type="text/javascript">
function scrollDoor(){
}
scrollDoor.prototype = {
sd : function(menus,divs,openClass,closeClass){
var _this = this;
if(menus.length != divs.length)
{
alert("菜单层数量和内容层数量不一样!");
return false;
}
for(var i = 0 ; i < menus.length ; i++)
{
_this.$(menus[i]).value = i;
_this.$(menus[i]).onmouseover = function(){
for(var j = 0 ; j < menus.length ; j++)
{
_this.$(menus[j]).className = closeClass;
_this.$(divs[j]).style.display = "none";
}
_this.$(menus[this.value]).className = openClass;
_this.$(divs[this.value]).style.display = "block";
}
}
},
$ : function(oid){
if(typeof(oid) == "string")
return document.getElementById(oid);
return oid;
}
}
window.onload = function(){
var SDmodel = new scrollDoor();
SDmodel.sd(["m01","m02","m03"],["c01","c02","c03"],"current"," ");
SDmodel.sd(["mm01","mm02","mm03","mm04","mm05"],["cc01","cc02","cc03","cc04","cc05"],"sd01","sd02");
SDmodel.sd(["mmm01","mmm02","mmm03","mmm04","mmm05"],["ccc01","ccc02","ccc03","ccc04","ccc05"],"sd01","sd02");
}
</script>
<?php include template('footer');?>
