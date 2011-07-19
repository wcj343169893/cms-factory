<?php defined('IN_DESTOON') or exit('Access Denied');?><html><?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/quote.css"/>
<!-- 广告代码 -->
<div class="layout-p32a24 topadv">
	<div class="grid-24" style="overflow:hidden" >
<a href="#"><img src="<?php echo DT_SKIN;?>images/quote/ad1.gif" width="950" height="90" border="0"></a>
	</div>
</div>
<!-- 广告代码结束 -->
<!-- part 1 start -->
<div class="layout-p32a24 part1">
	<div class="grid-18">
		<div class="p-list-box clr box-1">
				<!--推荐头图-->
				<div class="lp">
					<!--焦点图切换 -->
                     <div class="sliderplus">
						<ul class="sliderul">
                          <?php echo ad(30);?>
						</ul>	
					</div>
					<!--焦点图切换 end-->
				</div>				
				<!--推荐头图 end-->	
                	
				<div class="rp">
					<!--推荐文字链-->
					<ul class="cont-txt-1 ">
			  <?php $tags=tag("moduleid=$moduleid&length=36&condition=status=3 and level=5&order=".$MOD['order']."&pagesize=1&template=null");?>
			         <?php if(is_array($tags)) { foreach($tags as $t) { ?>
						<li class="fst"><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></li>						
						<li><p><?php echo $t['introduce'];?> &hellip;</p></li>		
			         <?php } } ?>
					</ul>
					<ul class="cont-txt-2 unhlf">
                    
			  <?php $tags=tag("moduleid=$moduleid&length=32&condition=status=3 and level=4&pagesize=6&order=".$MOD['order']."&&template=null");?>
			         <?php if(is_array($tags)) { foreach($tags as $t) { ?>
						<li><span class="p3">[<?php echo timetodate($t['edittime'], 2);?>]</span><span class="p1"><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo $CATEGORY[$t['catid']]['linkurl'];?>">[<?php echo $CATEGORY[$t['catid']]['catname'];?>]</a></span><span class="p2"><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></span></li>
			         <?php } } ?>
					</ul>
					<!--推荐文字链 end-->
				</div>
		</div>
	</div>
		<div class="grid-6 grid-fixed" >
		<div class="pr-tab samtab" >
			<ul class="tabslt clr">
			<li class="f-tab-t current">点击排行</li>
			<li class="f-tab-t"><a class="more" href="#">更多</a></li>
			</ul>
			<div class="f-tab-b">
			  <ul class="srk"> 
			  <?php $tags=tag("moduleid=$moduleid&condition=status=3 and addtime>$today_endtime-30*86400&order=hits desc&pagesize=10&template=null");?>
			  <?php if(is_array($tags)) { foreach($tags as $t) { ?>
			      <li><a class="rk n_<?php echo $i+1;$i++?>" href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></li>
			  <?php } } ?>
			  </ul> 		
			</div>
		</div>
	</div>
</div>
<!-- part 1 end -->
<!-- part 2 start -->		
<div class="layout-p32a24 part2">
	<div class="grid-24">
		<div class="p-list-box">
			<div class="p-list clr">
					<div class="title">
						<ul>
							<h2>价格行情库</h2>
							<!--<li id="price-tab"><a title="#">钢材</a><a title="#" target="_self">化工</a><a title="#" target="_self">塑料橡胶</a></li>-->
			<span class="f_l" style="float:left; padding-top:4px;">
			<form action="<?php echo $MOD['linkurl'];?>price.php" onsubmit="return quote_search();">
			<input type="text" size="12" value="输入产品名" name="kw" id="quote_kw" class="quote_head_i" onclick="if(this.value=='输入产品名')this.value='';"/> <input type="image" src="<?php echo DT_SKIN;?>image/btn_quote.gif" align="absmiddle"/>
			</form>
			</span>
							<li class="more"><a href="price.php?kw=&mode=0&fromdate=&todate=&catid=0&minprice=&maxprice=&areaid=0&x=45&y=15">更多</a></li>
						</ul>
					</div>
					<div class="cont-a-box">
<div id="bd">
   <div class="left" id="c_right_box">
   <div id="priceDay">
    <table border="0" cellpadding="0" cellspacing="0" class="listtable" id="listtable">
            <tr>
             <th scope="col" width="160" style="width:160px; overflow:hidden">品名</th>
                   <th>型号</th>
                   <th>规格</th>
                   <th>品牌</th>
                   <th>地域</th>
                   <th>价格<div>(元/吨)</div></th>
                   <th>产地</th>
                   <th>更新时间</th>
                   <th width="220" style="width:220px; overflow:hidden">公司</th>
             </tr>
		<?php $tags=tag("moduleid=5&condition=tag<>'' and unit<>'' and price>0 and status=3&pagesize=12&order=edittime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
            <tr valign="top" class="ever">
                  <td width="160" style="width:160px; overflow:hidden"><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['tag'];?></a></td>
                  <td class="nol"><?php if($t['model']) { ?><?php echo $t['model'];?><?php } else { ?>-<?php } ?></td>
                  <td class="nol"><?php if($t['standard']) { ?><?php echo $t['standard'];?><?php } else { ?>-<?php } ?></td>
                  <td class="nol"><?php if($t['brand']) { ?><?php echo $t['brand'];?><?php } else { ?>-<?php } ?></td>
                  <td class="nol"><?php echo area_pos($t['areaid'], '', 2);?></td>
                  <td><span class="uptrend"><?php echo $t['price'];?><?php echo $DT['money_unit'];?>/<?php echo $t['unit'];?></span></td>
                  <td class="nol"><?php echo area_pos($t['areaid'], '', 2);?></td>
                  <td><?php echo timetodate($t['edittime'], 3);?></td>
                  <td width="220" style="width:220px; overflow:hidden"><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></td>
            </tr>
		<?php } } ?>

        </table>
      </div>
</div>
</div>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- part 2 end -->
<!-- part 11 start -->
<div class="layout-p32a24 part5">
	<div class="maintitle">
		<h2>行情报价</h2>
  </div>
		<?php if(is_array($maincat)) { foreach($maincat as $i => $c) { ?>
	<div class="grid-8 <?php if($i%3==1) { ?>grid-fixed<?php } ?>">
		<div class="p-list-box">
			<div class="title">
				<ul>
					<h6><?php echo $c['catname'];?></h6>
					<li><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>">更多</a></li>
				</ul>
			</div>
			<div class="p-list clr">
				<ul class="cont-txt-2 unhlf">
<?php echo tag("moduleid=$moduleid&length=30&catid=".$c['catid']."&condition=status=3&order=".$MOD['order']."&pagesize=".$MOD['page_icat']."&datetype=2&target=_blank&template=list-quote");?>
				</ul>
			</div>
		</div>
	</div>
		<?php } } ?>
</div><!-- part 11 end -->
<?php include template('footer');?>
