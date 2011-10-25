<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、{$app.meta_keyword}" />
<!--テスト用-->
<base href="http://dev.jetro.go.jp/" />
<!--/テスト用-->
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}

<script type="text/javascript" src="/j-messe/js/j-messe.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
<!--
{literal}
	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/header.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/footer.html");
	});

	$(function(){
		$("#include_contact_us").load("http://localhost/jmesse/www/contact_us.html");
	});

	function search(form_name) {
		document.getElementById(form_name).submit();
	}

	function dosort(url) {
		sort = document.getElementById('sort').options[document.getElementById('sort').selectedIndex].value;
		document.location.href = url + "&sort=" + sort;
	}

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
// -->
</script>
<title>
{if ('1' == $form.all)}
すべての見本市・展示会(J-messe) -ジェトロ
{else}
	{if ('i1' == $form.type || 'i2' == $form.type)}
{$app.title} - 世界の見本市・展示会(J-messe) -ジェトロ
	{else}
{$app.title}で開催される見本市・展示会(J-messe) -ジェトロ
	{/if}
{/if}
</title>
</head>

<body class="layout-LC highlight-match  j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="">HOME</a></li>
			<li><a href="">引き合い・展示会検索</a></li>
			<li><a href="{$config.url}">見本市・展示会データベース（J-messe）</a></li>
			{if ('1' != $form.all)}
				{if ('i1' == $form.type)}
			<li><a href="">世界の見本市・展示会</a></li>
					{if ('' == $form.i_3)}
			<li>{$app.pan_1}</li>
					{else}
			<li><a href="{$config.url}?action_fairList=true&type=i1&i_2={$form.i_2}">{$app.pan_1}</a></li>
			<li>{$app.pan_2}</li>
					{/if}
				{elseif ('v1' == $form.type)}
			<li><a href="">開催地別に見る</a></li>
			<li>{$app.pan_1}</li>
				{elseif ('v2' == $form.type)}
			<li><a href="">開催地別に見る</a></li>
					{if ('' == $form.v_4)}
			<li><a href="{$config.url}?action_fairList=true&type=v1&v_2={$form.v_2}">{$app.pan_1}</a></li>
			<li>{$app.pan_2}</li>
					{else}
			<li><a href="{$config.url}?action_fairList=true&type=v1&v_2={$form.v_2}">{$app.pan_1}</a></li>
			<li><a href="{$config.url}?action_fairList=true&type=v2&v_2={$form.v_2}&v_3={$form.v_3}">{$app.pan_2}</a></li>
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


		<div class="area">
			<!-- left -->
			<div id="left">
				<div class="bgbox_set">
					<p id="title">
						<a href="/j-messe/">見本市・展示会データベース</a>
					</p>
					<div class="bgbox_base">
						<div class="bgbox_in">
							<div class="submenu no_border">
								<ul class="navi">
									<li class="lv01_title"><a href="/j-messe/tradeshow/industry/">業種別に見る</a></li>

									<li class="lv01_title"><a href="/j-messe/country/">開催地別に見る</a></li>
									<li class="lv02_title"><a href="/j-messe/asia/">アジア</a></li>
									<li class="lv02_title"><a href="/j-messe/oceania/">オセアニア</a></li>
									<li class="lv02_title"><a href="/j-messe/n_america/">北米</a></li>
									<li class="lv02_title"><a href="/j-messe/cs_america/">中南米</a></li>
									<li class="lv02_title on"><a href="/j-messe/europe/">欧州</a></li>

									<li class="lv02_title"><a href="/j-messe/russia_cis/">ロシア・CIS</a></li>
									<li class="lv02_title"><a href="/j-messe/middle_east/">中東</a></li>
									<li class="lv02_title"><a href="/j-messe/africa/">アフリカ</a></li>

									<li class="lv01_title"><a href="/j-messe/tradeshow/">詳細検索</a></li>
									<li class="lv01_title"><a href="/j-messe/new_fair/">新着見本市</a></li>
									<li class="lv01_title"><a href="/j-messe/ranking/">月間ランキング</a></li>

								</ul>

								<!-- 外部ファイルにして随時修正可能にする -->
								<ul class="navi">
									<li class="lv01_label">出展お役立ち情報</li>
									<li class="lv02_title"><a href="/j-messe/w-info/">見本市レポート</a></li>
									<li class="lv02_title"><a href="/services/tradefair/">出展支援</a></li>
									<li class="lv02_title"><a href="/j-messe/center/">世界の展示会場</a></li>
									<li class="lv02_title"><a href="/j-messe/business/">世界の見本市ビジネス動向</a></li>

								</ul>
								<ul class="navi no_border">
									<li class="lv01_label">出展者向け</li>
									<li class="lv02_title"><a href="/j-messe/registration/">見本市登録</a></li>
								</ul>
								<!-- ここまで -->
							</div>
						</div>
					</div>
				</div>

				<!-- contact_us -->
				<div id="include_contact_us"></div>
				<!-- /contact_us -->

			</div>
			<!-- /left -->

			<!-- center -->
			<div id="center">
				<div id="main">
					<div class="bgbox_set">
						<div class="bgbox_base">


							<div class="h1">
								<h1>見本市・展示会データベース（J-messe)</h1>
							</div>

							<div class="h2">
								<h2>世界の見本市・展示会</h2>
							</div>
							<div class="in_main">


								<div class="h3">
									<h3>{$app.list_name}</h3>
									<span class="right"><a href="{$config.url}?action_top=true" class="icon_arrow">他の地域を見る</a> <a href="" class="icon_arrow">詳細検索</a></span>

								</div>

								<div id="skip_menu">
									<a href="">絞り込み条件にスキップ</a>
								</div>

								<!-- list of tradefairs -->
								<div class="left" id="list">

									<div class="h4 clearfix">
										{if ('a' != $form.year)}
										<h4>これから開催される見本市・展示会一覧</h4>
										{else}
										<h4>過去のものを含む見本市・展示会一覧</h4>
										{/if}
										<span class="right"><a href="{$config.url}?action_fairList=true&all=1&page=1" class="icon_arrow">すべての見本市・展示会</a></span>
									</div>

									<p class="t_right">
										{if ('1' == $form.all)}
										表示件数：<a href="{$config.url}?action_fairList=true&all=1&page=1&limit=20">20件</a>&nbsp;&nbsp;<a href="{$config.url}?action_fairList=true&all=1&page=1&limit=50">50件</a>&nbsp;&nbsp;<a href="{$config.url}?action_fairList=true&all=1&page=1&limit=100">100件</a> &nbsp;&nbsp;&nbsp;
										{else}
										表示件数：<a href="{$config.url}?action_fairList=true&page=1&limit=20">20件</a>&nbsp;&nbsp;<a href="{$config.url}?action_fairList=true&page=1&limit=50">50件</a>&nbsp;&nbsp;<a href="{$config.url}?action_fairList=true&page=1&limit=100">100件</a> &nbsp;&nbsp;&nbsp;
										{/if}
										<select name="sort" id="sort"
											{if ('1' == $form.all)}
											onchange="dosort('{$config.url}?action_fairList=ture&page=1&all=1')"
											{else}
											onchange="dosort('{$config.url}?action_fairList=ture&page=1')"
											{/if}
											">
											<option value="">並び替え</option>
											<option value="1" {if ('1' == $form.sort)}selected{/if}>新着順</option>
											<option value="2" {if ('2' == $form.sort)}selected{/if}>名称順</option>
										</select>
									</p>

									<p>{$app.total}件中 {$app.start}から{$app.end}件目</p>
									<p class="number">
										{$app_ne.pager}<br/>
									</p>
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

									<p class="number">
										{$app_ne.pager}<br/>
									</p>
								</div>

								<!-- /result -->

								<!-- breakdown -->
								{if ('i1' == $form.type)}
									<!-- 業種選択 -->
									{include file="fairMenuIndustory.tpl"}
								{elseif ('v1' == $form.type)}
									<!-- 地域選択 -->
									{include file="fairMenuRegion.tpl"}
								{elseif ('v2' == $form.type)}
									<!-- 国・地域選択 -->
									{include file="fairMenuCountry.tpl"}
								{/if}
								<!-- /breakdown -->

							</div>
						</div>
					</div>

				</div>
				<p class="totop">
					<a href="javascript:window.open('{$config.url}?action_fairList=true&page={$app.page}&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					<a href="javascript:window.scrollTo(0, 0);"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a>
				</p>
			</div>
			<!-- /center -->
		</div>
	</div>
	<!-- /contents -->

	<!-- footer -->
	<div id="include_footer"></div>
	<!-- /footer -->

</body>
</html>
