<?php defined('IN_DESTOON') or exit('Access Denied');?><html><?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/index.css"/>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index1.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/BizAdvert.js"></script>
<!--<script type="text/javascript" src="<?php echo DT_SKIN;?>js/ServiceJs.js"></script>-->
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/NewTop.js"></script>

    <div id="doc">
      <div class="main1t clr">
          <div class="col-sub">
                <div class="notice">
                    <div class="title-1">
                        <h3>最新公告</h3><SPAN><A href="/announce/" target=_blank>[媒体报道]</A></SPAN> 
                    </div>
                    <div class="contentindex ct-1">
                        <UL class=sj-news>
                          <?php $tags=tag("table=announce&condition=1&pagesize=4&datetype=2&order=listorder desc,addtime desc&template=null");?>
                          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                          <LI><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></LI> 
                          <?php } } ?>
                        </UL>
                        <UL id=story class=story>
                        <LI class=cick onmouseover=ShowInfo(this,0)>成功故事<LI onmouseover=ShowInfo(this,1)>优质企业</LI>
                        </UL>
                        
                        <DIV id=story_0 class=story-show1>
				<?php $tags=tag("moduleid=21&catid=28358&condition=status=3 and level=1&order=addtime desc&pagesize=1&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                        <DIV class=story-tp1>
                        <A title="<?php echo $t['linkurl'];?>" href="<?php echo $t['linkurl'];?>" target=_blank><IMG src="<?php echo imgurl($t['thumb'], 1);?>" width=54 height=54></A> 
                        <UL>
                        <LI class=t1>
                        <A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A> 
                        <LI>发布时间：<?php echo timetodate($t['addtime'], 3);?></LI>
                        <LI>本文作者：<?php if($author) { ?><?php echo $t['author'];?><?php } else { ?>佚名<?php } ?></LI>
                        </UL>
                        </DIV>
                        <DIV class=show1-gd><?php echo dsubstr($t['introduce'], 45);?>...<A href="<?php echo $t['linkurl'];?>" target=_blank>[详情]</A></DIV>
                      <?php } } ?>
                        </DIV>
                        <DIV style="DISPLAY: none" id=story_1 class=story-show2>
				<?php $tags=tag("moduleid=4&condition=groupid>5 and catids<>''&pagesize=6&order=userid desc&template=null");?>
                        <DIV class=show1-gd2>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                        <P><I><?php echo area_pos($t['areaid'], '/', 1);?></I> <A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['company'];?></A></P>
                      <?php } } ?>
                        </DIV>
                        </DIV>
                    </div>
                    <div class="ft-1">
                    </div>
                </div>
        </div>
        
            <div class="col-main">
                <div class="ad-tp1"><DIV class=PageT><UL><?php echo ad(26);?></UL></DIV></div>
                    
                <div class="cp-add">
                    <div class="title-2">
                        <h3>今日新增</h3>
                        <UL><LI> </LI></UL><DIV class=fb-btn><A title=我要发布 href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=5">我要发布</A></DIV>
                    </div>
                    <div class="contentindex ct-2" >
					 <div class="show_dht" id="divLast">
                        <UL>
				<?php $tags=tag("moduleid=5&length=14&condition=status=3&pagesize=6&order=addtime desc&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                        <LI><I>[供应]</I> <A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo dsubstr($t['tag'], 23);?></A> </LI>
                      <?php } } ?>
				<?php $tags=tag("moduleid=6&condition=status=3&pagesize=6&order=addtime desc&time=addtime&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                        <LI><I>[求购]</I> <A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['tag'];?></A> </LI>
                      <?php } } ?>
                        </UL>
					  </div>
                    </div>
                    <div class="ft-2"></div>
                </div>
            </div>
            <div class="col-extra">
                <div class="login-1">
                    <div class="buy_login">
                    <?php if($DT['page_login']) { ?>
                    <?php include template('user-index', 'chip');?>
                    <?php } ?>
                    </div>
                </div>
                <div class="use-tool">
                    <DIV class=title-3>
                    <UL id=f_Info><LI class=k1 onmouseover=contSwitch(this,0)>发信息 <LI onmouseover=contSwitch(this,1)>做推广 <LI onmouseover=contSwitch(this,2)>学经验 <LI onmouseover=contSwitch(this,3)>有疑问 </LI></UL>
                    </DIV>
                    <DIV class="contentindex ct-3" id=con_0>
                    <DIV class=tl-1><UL><LI><A href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=5" target=_blank>发布供应信息</A> <LI><A href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5" target=_blank>管理供求信息</A> <LI><A href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=6" target=_blank>发布求购信息</A> <LI><A href="<?php echo $MODULE['2']['linkurl'];?>favorite.php" target=_blank>查看商机收藏夹</A> </LI></UL></DIV></DIV>
                    <DIV class="contentindex ct-3" id=con_1 style="DISPLAY: none"><DIV class=tl-2><P><A href="#" target=_blank><SPAN>[商机直达] </SPAN>每日百万流量，我们更懂买家！</A> </P><P><A href="#" target=_blank><SPAN>[万网联播] </SPAN>万家站点推广，效果可控！</A> </P></DIV></DIV>
                    <DIV class="contentindex ct-3" id=con_2 style="DISPLAY: none"><DIV class=tl-2><P><A href="#" target=_blank><SPAN>[商友社区] </SPAN>经验交流，拓展商圈人脉</A>！ </P><P><A href="#" target=_blank><SPAN>[商 学 院] </SPAN>在线学习，提升企业竞争力</A>！ </P></DIV></DIV>
                    <DIV class="contentindex ct-3" id=con_3 style="DISPLAY: none"><DIV class=tl-2><P><A href="#" target=_blank><SPAN>[有问题] </SPAN>客服中心为您答疑解难！</A></P><P><A href="#" target=_blank><SPAN>[提建议] </SPAN></FONT>平台进步，由您进言监督！</A> </P></DIV></DIV>
                    <div class="ft-3">
                    </div>
                </div>
                <div class="jptj">
                    <div class="title-4">
                        <h3>热门精品</h3>
                    </div>
                    <div class="brd ct-4">
                        <UL class=jp-pr>
				<?php $tags=tag("moduleid=5&length=14&condition=status=3 and thumb<>''&pagesize=3&order=addtime desc&order=addtime desc&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                        <LI><A title=<?php echo $t['tag'];?> href="<?php echo $t['linkurl'];?>" target=_blank><IMG height=60 alt=<?php echo $t['tag'];?> src="<?php echo imgurl($t['thumb'], 1);?>" width=70><SPAN><?php echo dsubstr($t['tag'], 12);?></SPAN></A> </LI>
                       <?php } } ?>
                        </UL>
                    </div>
                </div>
            </div>
      </div>
        <div class="main2 clr">
            <div class="fl-list">
                <div class="listclass">
                    <div class="title-5">
                        <h3>行业分类</h3>
                        <SPAN><A href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target=_blank>网上生意第一站</A></SPAN> </div>
                </div>
                <div class="ct-5">
                  <?php $mid = 5;?>
                  <?php include template('catalog', 'chip');?>
                </div>
            </div>
            
            <div class="col-fl">
                <div class="market">
                    <div class="title-4">
                        <h3>品牌展示</h3>
                        <span><a href="<?php echo $MODULE['13']['linkurl'];?>" target="_blank">&gt;&gt;更多</a></span></div>
                    <div class="brd ct-6">
                        <UL>
                        
                        
				<?php $tags=tag("moduleid=13&condition=status=3 and level>0&pagesize=4&order=addtime desc&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                        <LI><A title="<?php echo $t['title'];?>" href="<?php echo $t['linkurl'];?>" target=_blank><IMG border=0 alt="<?php echo $t['title'];?>" src="<?php echo $t['thumb'];?>" width=118 height=58></A> 
                        <DIV>
                        <P class=org><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></P>
                        <P><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo dsubstr($t['company'], 20);?></a></P>
                        <P><?php if($t['validated']) { ?>[已核实]<?php } else { ?>[未核实]<?php } ?> <?php if(!$t['username']) { ?> [未注册]<?php } ?>
</P>
                        </DIV>
                        </LI>
				<?php } } ?>

                        
                        </UL>
                    </div>
                </div>
                <div class="hot-sale">
                    <div class="title-4">
                        <h3>图片中心</h3>
                        <span><a href="<?php echo $MODULE['12']['linkurl'];?>" target="_blank">&gt;&gt;更多</a></span>
                    </div>
                    <DIV class="brd ct-7">
				<?php $tags=tag("moduleid=12&length=10&condition=status=3 and open=3 and level>0&pagesize=6&order=addtime desc&cols=4&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                      <?php if($i%3==0) { ?><UL class="ct7-tp clr"><?php } ?>
                      <LI><A title=<?php echo $t['title'];?> href="<?php echo $t['linkurl'];?>" target=_blank><IMG alt="<?php echo $t['alt'];?>(<?php echo $t['items'];?>图)" src="<?php echo $t['thumb'];?>" width=80 height=70><SPAN><?php echo $t['title'];?></SPAN></A> </LI>
                      <?php if($i%3==(3-1)) { ?></UL><?php } ?>
                      <?php } } ?>
                    </DIV>
                </div>
            </div>
        </div>
        
        <div class="main3 clr">
            <div class="pr-list">
                <div class="title-7">
                    <h3>产品中心</h3> 
                    <SPAN><A href="#" target=_blank>文字广告</A><A href="#" target=_blank>文字广告</A></SPAN>
                </div>
                <div class="brd ct-8">
                    <UL>
				<?php $tags=tag("moduleid=5&length=14&condition=status=3 and thumb<>''&pagesize=10&order=addtime desc&order=addtime desc&template=null");?>
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                      <LI><A href="<?php echo $t['linkurl'];?>" target=_blank><IMG height=92 alt=<?php echo $t['tag'];?> src="<?php echo imgurl($t['thumb'], 1);?>" width=92><SPAN><?php echo dsubstr($t['tag'], 12);?></SPAN></A></LI>                      
                      <?php } } ?>
                    </UL>

                </div>
            </div>

            <div class="col-pr">
                <div class="ad-tp3">
                        <DIV class=PageRight><UL><?php echo ad(27);?></UL></DIV></div>
                <div class="process">
                    <div class="title-4">
                        <h3>招商代理</h3>
                        <span><a href="<?php echo $MODULE['22']['linkurl'];?>" target="_blank" >&gt;&gt;更多</a></span></div>
                        
                        
                        
                <DIV class="brd ct-114">
                <UL class=sty-list>
		<?php $tags=tag("moduleid=22&length=32&condition=status=3&pagesize=7&datetype=2&order=addtime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                        <LI><I><?php echo timetodate($t['fromtime'], 3);?></I> <SPAN><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></SPAN> </LI>
		<?php } } ?>
                        </UL>
                    </div>
                </div>
            </div>
        </div>
        <div class="main4 clr">
            <div class="bs-news">
                <div class="title-4">
                    <h3 class="tab_2" id="job_t_1" onmouseover="Tb(1, 2, 'job', 'tab');">招聘信息</h3>  <h3 class="tab_1" id="job_t_2" onmouseover="Tb(2, 2, 'job', 'tab');">求职简历</h3><span><a href="<?php echo $MODULE['9']['linkurl'];?>" target="_blank">>>更多</a></span></div>
                <DIV class="brd ct-10">
                <UL class=fw-list id="job_c_1" style="display:">
		<?php $tags=tag("moduleid=9&condition=status=3&pagesize=8&length=30&order=edittime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <LI><I><A href="<?php echo $t['linkurl'];?>" target=_blank>[<?php echo $t['title'];?>]</A></I><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a><?php if($t['vip']) { ?> <img src="<?php echo DT_SKIN;?>image/vip.gif" alt="<?php echo $t['vip'];?>级" title="<?php echo $t['vip'];?>级"/><?php } ?></LI>
		<?php } } ?>
                </UL>
                <UL class=fw-list id="job_c_2" style="display:none">
		<?php $tags=tag("moduleid=9&table=resume&condition=status=3 and open=3&pagesize=8&order=edittime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <LI><I><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['truename'];?>">[<?php echo $t['truename'];?>(<?php if($t['gender']==1) { ?>男<?php } else { ?>女<?php } ?>)]</A></I><?php echo area_pos($t['areaid'], '', 1);?></LI>
		<?php } } ?>
                </UL>
                </DIV>
            </div>
            <div class="bs-news">
                <div class="title-4">
                    <h3>展会预告</h3>
                    <span><a href="/exhibit/" target="_blank">>>更多</a></span></div>
                <DIV class="brd ct-11">
				<?php $tags=tag("moduleid=8&condition=status=3&length=24&pagesize=1&order=addtime desc&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?><DIV class="zh-tp clr"><A href="<?php echo $t['linkurl'];?>" target=_blank><IMG alt="<?php echo $t['title'];?>" src="<?php echo imgurl($t['thumb'], 1);?>" width=100 height=75></A><UL><LI class=zhbt><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A> <LI>地点：<?php echo dsubstr($t['address'], 20);?></LI><LI>时间：<?php echo timetodate($t['fromtime'], 'Y年m月d日');?> </LI></UL></DIV><?php } } ?>
                <UL class=zh-list>
				<?php $tags=tag("moduleid=8&condition=status=3&length=30&pagesize=4&order=addtime desc&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?><LI><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?> [<?php echo $t['city'];?>]</A> </LI><?php } } ?></UL></DIV>
            </div>
            
            <div class="bs-news last2">
                <div class="title-4">
                    <h3>行业知道</h3>
                    <span><a href="<?php echo $MODULE['10']['linkurl'];?>" target="_blank">&gt;&gt;更多</a></span></div>
                    
                <DIV class="brd ct-12">
		<?php $tags=tag("moduleid=10&length=20&condition=status=3 and process>0  and thumb<>''&pagesize=1&order=addtime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <DIV class="news-tp clr">
                <A title="" href="<?php echo $t['linkurl'];?>" target=_blank><IMG height=80 alt="" src="<?php echo imgurl($t['thumb'], 1);?>" width=100></A> 
                <UL>
                <LI class=nes-tit>
                <H4><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></H4>
                <LI><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['introduce'];?></A></LI>
                </UL>
                </DIV>
		<?php } } ?>

                <UL class=news-list>
		<?php $tags=tag("moduleid=10&length=15&condition=status=3 and process>0&pagesize=6&order=addtime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                
                <LI><I><?php if($t['credit']) { ?><img src="<?php echo DT_SKIN;?>image/ico_reward.gif" align="absmiddle"/><?php echo $t['credit'];?><?php } ?></I><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></LI> 
		<?php } } ?>
                </UL>
                </DIV>
            </div>
        </div>
        <div class="main5 clr">
            <div class="comy">
                <div class="title-7">
                    <h3>专题 &amp; 资讯</h3>
                    <span><a href="/news" target="_blank">&gt;&gt;更多</a></span></div>
                <DIV class="brd ct-13">
                <DIV class=sq-tp>
				<?php $tags=tag("moduleid=11&condition=status=3&pagesize=2&order=addtime desc&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <DIV class="sq-nr clr"><A title=<?php echo $t['title'];?> href="<?php echo $t['linkurl'];?>" target=_blank><IMG height=70 alt=<?php echo $t['title'];?> src="<?php echo imgurl($t['thumb'], 1);?>" width=100></A> 
                <UL><LI class=sq-tit><H4><A href="<?php echo $t['linkurl'];?>" target=_blank title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'], 18);?></A></H4>
                <LI><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo dsubstr($t['introduce'], 56);?></A> </LI>
                </UL>
                </DIV>
				<?php } } ?>
                </DIV>
                <DIV class=sq-list>
				<?php $tags=tag("moduleid=21&length=36&condition=status=3 and level=5&order=addtime desc&pagesize=1&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <DIV class="sq-bt clr">
                <P><A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo $t['title'];?></A></P>
                <A href="<?php echo $t['linkurl'];?>" target=_blank><?php echo dsubstr($t['introduce'], 80);?>...</A>
                </DIV>
				<?php } } ?>
                <UL class=sq-lb>
				<?php $tags=tag("moduleid=21&length=36&condition=status=3&pagesize=4&datetype=2&order=addtime desc&template=null");?>
				<?php if(is_array($tags)) { foreach($tags as $t) { ?>
                <LI><I><A href="#" target=_blank>[<?php echo timetodate($t['addtime'], 3);?>]</A></I> <A href="#" target=_blank><?php echo $t['title'];?></A> </LI>
				<?php } } ?>
                </UL>
                </DIV></DIV>
            </div>
            <div class="school">
                <div class="title-4">
                    <h3>资料下载</h3>
                    <span><a href="<?php echo $MODULE['15']['linkurl'];?>">>>更多</a></span></div>
                <DIV class="brd ct-14">
                <UL class=sty-list>
		<?php $tags=tag("moduleid=15&length=42&condition=status=3&pagesize=8&target=_blank&order=addtime desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $t) { ?>                
                <LI><I><img src="<?php echo DT_PATH;?>file/ext/<?php echo $t['fileext'];?>.gif" align="absmiddle"/></I> <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?><?php if($class) { ?> class="<?php echo $class;?>"<?php } ?> title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></LI>
		<?php } } ?>
                </UL>
                </DIV>
            </div>
        </div>
        
        <div class="main6 clr">
            <div class="ad-tp4">
              <DIV class=PageBotLef><UL><?php echo ad(29);?></UL></DIV></div>
            <div class="ad-tp5">
              <DIV class=PageBotRig><UL><?php echo ad(30);?></UL></DIV></div>
        </div>
        <div id="footer"></div>
         <div class="que_inf" id="regene"><a href="#" target="_blank">新首页反馈</a></div>
    </div>
<div class="layout-p32a24 part10">
<div class="grid-24">
	<div class="p-list-box">
		<div class="p-list clr">
			<span><b><a href="<?php echo extendurl('link');?>">友情链接:</a></b>
	<?php echo tag("table=link&condition=status=3 and level>0 and username=''&pagesize=".$DT['page_text']."&order=listorder desc,itemid desc&template=list-linkali");?>[<a href="<?php echo extendurl('link');?><?php echo rewrite('index.php?action=reg');?>">申请链接</a>]
			</span>
		</div>
	</div>
</div>

</div>

<script type="text/javascript">
var curls = ['<?php echo $MODULE['5']['linkurl'];?>','<?php echo $MODULE['6']['linkurl'];?>','<?php echo $MODULE['4']['linkurl'];?>'];
var member_myurl = '<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>';
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/index.js"></script>
<!--<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/quote.js"></script>-->




<script type="text/javascript" src="<?php echo DT_SKIN;?>js/on.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/IndexScoll.js"></script>

<?php include template('footer');?>
