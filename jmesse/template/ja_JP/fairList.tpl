<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、欧州、ヨーロッパ" />
<!--テスト用-->
<base href="http://dev.jetro.go.jp/" />
<!--/テスト用-->
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />

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

	function dosort() {

	}

{/literal}
// -->
</script>
<title>アジアで開催される見本市・展示会(J-messe) -ジェトロ</title>
</head>

<body class="layout-LC highlight-match  j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>

			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/country/">開催地別に見る</a></li>
			<li>アジア</li>
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
									<h3>アジア</h3>
									<span class="right"><a href="{$config.url}?action_top=true" class="icon_arrow">他の地域を見る</a> <a href="" class="icon_arrow">詳細検索</a></span>

								</div>

								<div id="skip_menu">
									<a href="#breakdown">絞り込み条件にスキップ</a>
								</div>

								<!-- list of tradefairs -->
								<div class="left" id="list">

									<div class="h4 clearfix">
										<h4>これから開催される見本市・展示会一覧</h4>
										<span class="right"><a href="{$config.url}?action_fairList=true&all=1&page=1" class="icon_arrow">すべての見本市・展示会</a></span>
									</div>

									<p class="t_right">
										表示件数：<a href="">20件</a>&nbsp;&nbsp;<a href="">50件</a>&nbsp;&nbsp;<a href="">100件</a> &nbsp;&nbsp;&nbsp;
										<select id="sort" name="sort" onchange(dosort())>
											<option value="">並び替え</option>
											<option value="1">新着順</option>
											<option value="2">名称順</option>
										</select>
									</p>

									<p>619件中 1から20件目</p>
									<p class="number">
										{$app_ne.pager}<br/>
									</p>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<p>
											<strong><a href="">Le Forme del GIOIELLO - The Shapes of Jewelry</a></strong><br /> 2011年09月～2011年09月<br /> 欧州 / イタリア / ビチェンツァ<br /> ジュエリー・デザイン <br />
										</p>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>

									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>

											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>

									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>
											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<div class="list1">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/madrid-international-567890">Madrid International Fashion Fair</a>
											</dt>
											<dd>
												2011年09月01日～2011年09月03日<br /> マドリード / スペイン / 欧州<br /> 婦人用ファッション,ウエディング/カクテル･ドレス,スポーツウエア
											</dd>
									</div>
									<div class="list0">
										<dl>
											<dt>
												<a href="/j-messe/tradefair/shopes-of-123456">Le Forme del GIOIELLO - The Shapes of Jewelry</a>
											</dt>

											<dd>
												2011年09月～2011年09月<br /> ビチェンツァ / イタリア / 欧州<br /> ジュエリー・デザイン
											</dd>
									</div>
									<p class="number">
										<span class="current_page">1</span><a href="?p=2">2</a><a href="?p=3">3</a>...<a href="?p=31">31</a><a href="?p=2">次へ</a>
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
					<a href="?print=1" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a><a href="#header"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a>
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