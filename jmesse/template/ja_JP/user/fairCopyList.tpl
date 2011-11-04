<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!--テスト用-->
<base href="http://dev.jetro.go.jp/" />
<!--/テスト用-->

<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}

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
		$("#include_left_menu").load("http://localhost/jmesse/www/left_menu.html");
	});

{/literal}
//-->
</script>

<title>見本市登録 - 世界の見本市・展示会 - ジェトロ</title>
</head>

<body class="layout-LC highlight-match j-messe">

	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>

			<li>見本市登録</li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">

		<div class="area">
			<!-- left -->
			<div id="include_left_menu"></div>
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
								<h2>見本市登録</h2>
							</div>
							<div class="in_main">

								<p class="t_right">ユーザー：{$session.email}</p>

								<p>
									過去に登録した見本市情報をコピーして、新規の見本市情報として登録します。<br />
									<strong><span class="red">元にする見本市を選択してください。</span></strong>
								</p>

								<h4>登録済みの見本市一覧</h4>
								<p>{$app.cnt}件中 1から{$app.cnt}件目</p>

								{section name=it loop=$app.fair_list}
								{if (0 == $smarty.section.it.index%2)}
								<div class="list0">
								{else}
								<div class="list1">
								{/if}
									<dl>
										<dt>
											<a href="{$config.url}?action_user_fairRegistStep1=true&mode=e&mihon_no={$app.fair_list[it].mihon_no}">
											{if ('' != $app.fair_list[it].abbrev_title)}
											{$app.fair_list[it].abbrev_title} -
											{/if}
											{$app.fair_list[it].fair_title_jp}
											</a>
										</dt>
										<dd>
											{$app.fair_list[it].date_from_yyyy}年{$app.fair_list[it].date_from_mm}月{$app.fair_list[it].date_from_dd}日～{$app.fair_list[it].date_to_yyyy}年{$app.fair_list[it].date_to_mm}月{$app.fair_list[it].date_to_dd}日<br />
											{$app.fair_list[it].city_name} / {$app.fair_list[it].country_name} / {$app.fair_list[it].region_name}<br />
											{$app.fair_list[it].exhibits_jp|replace:'&lt;br/&gt;':'<br/>'}
										</dd>
								</div>
								{/section}

							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<a href="{$config.url}?action_user_fairCopyList=true&print=1" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
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