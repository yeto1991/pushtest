<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、{$app.meta_keyword}" />

<title>
{if ('1' == $form.all)}
すべての見本市・展示会(J-messe) - JETRO
{else}
	{if ('i1' == $form.type || 'i2' == $form.type)}
{$app.title} - Online Trade Fair Database (J-messe) - JETRO
	{else}
{$app.title}で開催される見本市・展示会(J-messe) -ジェトロ
	{/if}
{/if}
</title>

<!--テスト用-->
<base href="http://produce.jetro.go.jp/" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link href="/css/en/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<!--以下のCSSは最終的に削除します-->
<link href="/css/en/parts/newmodule.css" rel="stylesheet" type="text/css" media="all" />
<!--/-->
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}

<script type="text/javascript">
<!--
{literal}

	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/enHeader.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/enFooter.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/enLeft_menu.html");
	});

	function resetAll() {
		document.getElementById('keyword').value = '';
		var i = 0;
		if (null != document.getElementsByName('check_main_industory[]')) {
			for (i = 0; i < document.getElementsByName('check_main_industory[]').length; i++) {
				document.getElementsByName('check_main_industory[]')[i].checked = false;
			}
		}
		if (null != document.getElementsByName('check_sub_industory[]')) {
			for (i = 0; i < document.getElementsByName('check_sub_industory[]').length; i++) {
				document.getElementsByName('check_sub_industory[]')[i].checked = false;
			}
		}
		if (null != document.getElementsByName('check_region[]')) {
			for (i = 0; i < document.getElementsByName('check_region[]').length; i++) {
				document.getElementsByName('check_region[]')[i].checked = false;
			}
		}
		if (null != document.getElementsByName('check_country[]')) {
			for (i = 0; i < document.getElementsByName('check_country[]').length; i++) {
				document.getElementsByName('check_country[]')[i].checked = false;
			}
		}
		if (null != document.getElementsByName('check_city[]')) {
			for (i = 0; i < document.getElementsByName('check_city[]').length; i++) {
				document.getElementsByName('check_city[]')[i].checked = false;
			}
		}
	}

{/literal}
//-->
</script>
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
		<ul class="clearfix">
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			{if ('1' != $form.all)}
				{if ('i1' == $form.type)}
			<li><a href="">Trade Fairs held in Japan and the World</a></li>
					{if ('' == $form.i_3)}
			<li>{$app.pan_1}</li>
					{else}
			<li><a href="{$config.url}?action_enFairList=true&type=i1&i_2={$form.i_2}">{$app.pan_1}</a></li>
			<li>{$app.pan_2}</li>
					{/if}
				{elseif ('v1' == $form.type)}
			<li><a href="">開催地別に見る</a></li>
			<li>{$app.pan_1}</li>
				{elseif ('v2' == $form.type)}
			<li><a href="">開催地別に見る</a></li>
					{if ('' == $form.v_4)}
			<li><a href="{$config.url}?action_enFairList=true&type=v1&v_2={$form.v_2}">{$app.pan_1}</a></li>
			<li>{$app.pan_2}</li>
					{else}
			<li><a href="{$config.url}?action_enFairList=true&type=v1&v_2={$form.v_2}">{$app.pan_1}</a></li>
			<li><a href="{$config.url}?action_enFairList=true&type=v2&v_2={$form.v_2}&v_3={$form.v_3}">{$app.pan_2}</a></li>
			<li>{$app.pan_3}</li>
					{/if}
				{/if}
			{else}
			<li>すべての見本市</li>
			{/if}
		</ul>
	</div>
	<!-- /bread -->
	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2">
				<h2>Trade Fairs held in Japan and the World </h2>
			</div>
			<div class="in_main">
				<div class="h3 clearfix">
					<h3>{$app.list_name}</h3>
					<span class="right"><a href="/j-messe/country/" class="icon_arrow">View Other Region/Country</a> <a href="/j-messe/tradefair/" class="icon_arrow">Advanced Search</a></span>
				</div>
				<div id="skip_menu"><a href="#right">Skip to search refinement</a></div>

				<!-- list of tradefairs -->
				<div class="left" id="list">

				<div class="h4 clearfix">
					{if ('a' != $form.year)}
					<h4>List of Upcoming Trade Fairs and Exhibitions</h4>
					{else}
					<h4>Including Past Trade Fairs View All </h4>
					{/if}
					<span class="right"><a href="{$config.url}?action_enFairList=true&all=1&page=1" class="icon_arrow">View All</a></span>
				</div>

				<p class="t_right">
					{if ('1' == $form.all)}
					Items per page：<a href="{$config.url}?action_enFairList=true&all=1&page=1&limit=20">20</a>&nbsp;&nbsp;<a href="{$config.url}?action_enFairList=true&all=1&page=1&limit=50">50</a>&nbsp;&nbsp;<a href="{$config.url}?action_enFairList=true&all=1&page=1&limit=100">100</a> &nbsp;&nbsp;&nbsp;
					{else}
					Items per page：<a href="{$config.url}?action_enFairList=true&page=1&limit=20">20</a>&nbsp;&nbsp;<a href="{$config.url}?action_enFairList=true&page=1&limit=50">50</a>&nbsp;&nbsp;<a href="{$config.url}?action_enFairList=true&page=1&limit=100">100</a> &nbsp;&nbsp;&nbsp;
					{/if}
					<select name="sort" id="sort"
						{if ('1' == $form.all)}
						onchange="dosort('{$config.url}?action_enFairList=ture&page=1&all=1')"
						{else}
						onchange="dosort('{$config.url}?action_enFairList=ture&page=1')"
						{/if}
						>
						<option value="">Sort by</option>
						<option value="1" {if ('1' == $form.sort)}selected{/if}>Newest</option>
						<option value="2" {if ('2' == $form.sort)}selected{/if}>Name</option>
					</select>
				</p>

				<p>Results {$app.start}-{$app.end} of {$app.total}</p>
				<p class="number">{$app_ne.pager}<br/></p>
				{section name=it loop=$app.fair_list}
					{if (0 == $smarty.section.it.index%2)}
					<div class="list0">
					{else}
					<div class="list1">
					{/if}
						<dl>
							<dt>
								<a href="{$config.url}tradefair/{$app.fair_list[it].detail_url}">{$app.fair_list[it].fair_title_jp}</a>
							</dt>
							<dd>
								{$app.fair_list[it].date_from_yyyy}年{$app.fair_list[it].date_from_mm}月{$app.fair_list[it].date_from_dd}日～{$app.fair_list[it].date_to_yyyy}年{$app.fair_list[it].date_to_mm}月{$app.fair_list[it].date_to_dd}日<br />
								{$app.fair_list[it].city_name} / {$app.fair_list[it].country_name} / {$app.fair_list[it].region_name}<br />
								{$app.fair_list[it].exhibits_jp|replace:'&lt;br/&gt;':'<br/>'}
							</dd>
						</dl>
					</div>
				{/section}
				<p class="number">{$app_ne.pager}<br/></p>
			</div>
			<!-- breakdown -->
			{if ('i1' == $form.type)}
				<!-- 業種選択 -->
				{include file="enFairMenuIndustory.tpl"}
			{elseif ('v1' == $form.type)}
				<!-- 地域選択 -->
				{include file="enFairMenuRegion.tpl"}
			{elseif ('v2' == $form.type)}
				<!-- 国・地域選択 -->
				{include file="enFairMenuCountry.tpl"}
			{/if}
			<!-- /breakdown -->
			</div>
			<p class="totop">
				<a href="{$config.url}?action_enFairListDownload=true&page={$app.page}">CSV downloadボタン</a>
				<a href="javascript:window.open('{$config.url}?action_enFairList=true&page={$app.page}&print=1', 'print')" target="print"><img src="/images/en/btn-print.gif" alt="Print" height="14" width="46" /></a>
				<a href="javascript:window.scrollTo(0, 0);"><img src="/images/en/totop.gif" alt="Return to PAGETOP" width="103" height="14" /></a>
			</p>
		</div>
		<!-- /main -->
		<!-- submenu -->
		<div id="include_left_menu"></div>
		<!-- /submenu -->
	</div>
	<!-- /contents -->
	<!-- footer -->
	<div id="include_footer" ></div>
	<!-- /footer -->
</body>
</html>