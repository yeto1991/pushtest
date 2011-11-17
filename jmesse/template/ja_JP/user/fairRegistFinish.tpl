<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />

<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
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
</script>
{if ('r' == $form.msg)}
<title>見本市登録 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
{elseif ('c' == $form.msg)}
<title>見本市修正 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
{elseif ('d' == $form.msg)}
<title>見本市削除 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
{/if}
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
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
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
								<h1>見本市・展示会データベース</h1>
							</div>
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
									<img src="/j-messe/images/db/fair06.jpg" alt="見本市登録完了" />
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
										<a href="{$config.url}?action_user_fairRegistStep1=true"><span class="title">続いて見本市を登録する</span> <span class="description">見本市新規登録ページを開きます。</span></a>
									</div>
									<div class="btn">
										<a href="/j-messe/"><span class="title">登録を終了する</span> <span class="description">「見本市・展示会データベース」のトップページに戻ります。</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<!--
					<a href="javascript:window.open('{$config.url}?action_user_fairRegistFinish=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					 -->
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
