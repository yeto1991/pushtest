<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

{if ('r' == $form.msg)}
<title>見本市登録 - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ('c' == $form.msg)}
<title>見本市修正 - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ('d' == $form.msg)}
<title>見本市削除 - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}

<!--テスト用-->
<base href="http://produce.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link href="/css/en/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<!--以下のCSSは最終的に削除します-->
<link href="/css/en/parts/newmodule.css" rel="stylesheet" type="text/css" media="all" />
<!--/-->

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
			<li><a href="/en/j-messe/tradefair/">Trade Fairs held in Japan and the World</a></li>
			<li><a href="/database/j-messe/tradefair/">個人メニュー</a></li>
			{if ('r' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">見本市登録(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市登録(step2)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市登録(step3)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市登録確認</a></li>
			<li>見本市登録完了</li>
			{elseif ('c' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">見本市修正(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市修正(step2)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市修正(step3)</a></li>
			<li><a href="/database/j-messe/tradefair/">見本市修正確認</a></li>
			<li>見本市修正完了</li>
			{elseif ('d' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">見本市詳細(削除確認)</a></li>
			<li>見本市削除完了</li>
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
				{if ('r' == $form.msg)}
				<h2>見本市登録</h2>
				{elseif ('c' == $form.msg)}
				<h2>見本市修正</h2>
				{elseif ('d' == $form.msg)}
				<h2>見本市削除</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center">
					<img src="/j-messe/images/db/fair06.jpg" alt="見本市登録完了" /></a>
				</h3>
				{if ('r' == $form.msg)}
				<p>見本市の登録が完了しました。ありがとうございました。</p>
				{elseif ('c' == $form.msg)}
				<p>見本市の修正が完了しました。ありがとうございました。</p>
				{elseif ('d' == $form.msg)}
				<p>見本市の削除が完了しました。ありがとうございました。</p>
				{/if}
				<div class="finish-navi">
					<div class="btn">
						<a href="{$config.url}?action_user_enFairRegistStep1=true"><span class="title">続いて見本市を登録する</span> <span class="description">見本市新規登録ページを開きます。</span></a>
					</div>
					<div class="btn">
						<a href="/j-messe/"><span class="title">登録を終了する</span> <span class="description">「見本市・展示会データベース」のトップページに戻ります。</span></a>
					</div>
				</div>
			</div>
			<p class="totop">
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