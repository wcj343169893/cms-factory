<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $DT['sitename'];?><?php } ?></title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<meta name="generator" content=""/>
<meta http-equiv="x-ua-compatible" content="ie=7"/>
<?php if($moduleid!=7) { ?><link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>style.css"/><?php } ?>
<?php if($moduleid>4) { ?><link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>my.css"/>
<link rel="shortcut icon" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="bookmark" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/style.css"/>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/head.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/page.js"></script>
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
</head>
<body>
<div id="header" class="community">
<div class="top">
	<div class="top_div">
		<div class="f_r" id="destoon_member"></div>
		<div>
		<img src="<?php echo DT_SKIN;?>image/vip.gif" alt="<?php echo VIP;?>标识" align="absmiddle"/><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><span class="f_red">上网做生意，首选<?php echo VIP;?>会员</span></a>
		 | <script type="text/javascript">addFav('收藏本页');</script>
		<?php if(extend_setting('wap_enable')) { ?> | <a href="<?php echo extendurl('wap');?>">WAP浏览</a><?php } ?>
		<?php if(extend_setting('feed_enable')) { ?> | <a href="<?php echo extendurl('feed');?>">RSS订阅</a> <img src="<?php echo DT_SKIN;?>image/free.gif" width="23" height="12" alt=""/><?php } ?>
		</div>
	</div>
</div>

<div class="m950">
<?php echo ad(31);?>
</div>
<div id="logo-search" class="logo-search">
		<h1 id="logo">
			<a title="<?php echo $seo_title;?>" href="<?php echo DT_PATH;?>">
				<img src="<?php if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>" alt="<?php echo $DT['sitename'];?>"/>
			</a>
		</h1>
		<div id="search-bar">
			<ul id="search-nav">

              <div id="searchnav">
		 		<li class="w2 current" id="ms5" onclick="setDsearch(5);" ><a title="产品搜索" href="javascript:void(0)" target="_self">供应</a></li>
				<li class="w2" id="ms6" onclick="setDsearch(6);"><a title="求购搜索" href="javascript:void(0)" target="_self">求购</a></li>
				<li class="w2" id="ms7" onclick="setDsearch(7);"><a title="行情搜索" href="javascript:void(0)" target="_self">行情</a></li>
				<li class="w2" id="ms4" onclick="setDsearch(4);"><a title="公司搜索" href="javascript:void(0)" target="_self">公司</a></li>
				<li class="w2" id="ms21" onclick="setDsearch(21);"><a title="资讯搜索" href="javascript:void(0)" target="_self">资讯</a></li>
              </div>

			</ul>
			<form method="get"  onsubmit="return Dsearch();" id="destoon_search" action="<?php echo $MODULE['5']['linkurl'];?>search.php">
				<fieldset id="search-box">
					<legend>企商网搜索</legend>
					<div id="search-input-container">
						<input type="text" id="destoon_kw" name="kw" value="请输入关键字" onfocus="if(this.value=='请输入关键字') this.value='';">
						<button id="search-submit" type="submit">找一下</button>
					</div>
				</fieldset>
			</form>
			<h2 id="yplan"><a href=" " target="_blank">求商计划</a></h2>
		</div>
</div>
<div id="main-nav" class="main-nav">
		<div class="nav-right"></div>
        <ul id="nav-list" class="float-clr">
			<li id="more-trigger" class="nav-trigger">
            <div class="trigger-base"><a title="<?php echo $DT['sitename'];?>" href="javascript:void(0)" target="_self"><?php echo $DT['sitename'];?></a></div>
            <ul class="trigger-down">
            <li><a href="/special/" title="专题">专题</a></li>
            <li><a href="/photo/" title="图库">图库</a></li>
            <li><a href="/video/" title="视频">视频</a></li>
            <li><a href="/down/" title="下载">下载</a></li>
            <li class="more-bottom"></li>
            </ul>
            </li>
        <li<?php if($moduleid<4) { ?> class="current"<?php } ?>><a href="<?php echo DT_PATH;?>" title="首页">首页</a></li><?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu']) { ?><li<?php if($m['moduleid']==$moduleid) { ?> class="current"<?php } ?>><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?> title="<?php echo $m['name'];?>"><span<?php if($m['style']) { ?> style="color:<?php echo $m['style'];?>;"<?php } ?>><?php echo $m['name'];?></span></a></li><?php } ?><?php } } ?><li class="last"><a href="http://bbs.qshang.com/" title="企商社区">企商社区</a></li>
        </ul>
	</div>
	<?php if($MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) { ?>
	<?php $searchid = $moduleid;?>
	<?php } else { ?>
	<?php $searchid = 5;?>
	<?php } ?>
<script type="text/javascript"> var searchid = <?php echo $searchid;?>;</script>
	<div id="advanced-nav" class="advanced-nav">
		<div class="nav-right"></div>
		<ul class="advanced-cont"><li><a class="hot-icon">热门搜索</a></li>
		<?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=20&order=total_search desc&template=list-search_kwali");?></ul>
	</div> 
</div>
<div class="m b10">&nbsp;</div>
