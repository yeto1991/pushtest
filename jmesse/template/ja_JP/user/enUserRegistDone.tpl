<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

<title>Expobioenergia 11 - Online Trade Fair Database (J-messe) - JETRO</title>

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
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li><a href="/database/j-messe/tradefair/">個人メニュー</a></li>
			{if ("regist" == $form.mode)}
				<li><a href="/database/j-messe/tradefair/">ユーザー登録</a></li>
				<li><a href="/database/j-messe/tradefair/">ユーザー登録確認</a></li>
				<li>ユーザー登録完了</li>
			{elseif ("change" == $form.mode)}
				<li><a href="/database/j-messe/tradefair/">ユーザー修正</a></li>
				<li><a href="/database/j-messe/tradefair/">ユーザー修正確認</a></li>
				<li>ユーザー修正完了</li>
			{else}
				<li><a href="/database/j-messe/tradefair/">ユーザー修正</a></li>
				<li><a href="/database/j-messe/tradefair/">ユーザー削除確認</a></li>
				<li>ユーザー削除完了</li>
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
				{if ("regist" == $form.mode)}
				<h2>ユーザー登録</h2>
				{/if}
				{if ("change" == $form.mode)}
				<h2>ユーザー修正</h2>
				{/if}
				{if ("delete" == $form.mode)}
				<h2>ユーザー削除</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center"><img src="/j-messe/images/db/user04.jpg" alt="ユーザー登録完了"></a></h3>
				{if ("regist" == $form.mode)}
				<p>ユーザー登録が完了しました。ありがとうございました。</p>
				{/if}
				{if ("change" == $form.mode)}
				<p>ユーザー修正が完了しました。ありがとうございました。</p>
				{/if}
				{if ("delete" == $form.mode)}
				<p>ユーザー削除が完了しました（退会処理完了）。ありがとうございました。</p>
				{/if}
				<div class="finish-navi">
					{if ("delete" != $form.mode)}
					<div class="btn">
						<a href="{$config.url}?action_user_enFairRegistStep1=true" ><span class="title">続いて見本市を登録する</span>
						<span class="description">見本市新規登録ページを開きます。</span></a>
					</div>
					{/if}
					<div class="btn">
						<a href="/j-messe/" ><span class="title">登録を終了する</span>
						<span class="description">「見本市・展示会データベース」のトップページに戻ります。</span></a>
					</div>
				</div>
			</div>
			<p class="totop">
				<!-- <a href="?print=1" target="print"><img src="/images/en/btn-print.gif" alt="Print" width="46" height="14" /></a>  -->
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