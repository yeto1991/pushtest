<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
{include file="header.tpl"}
<title>世界の見本市・展示会 - ジェトロ</title>
</head>

<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li>見本市・展示会データベース（J-messe）</li>

		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">

		<div class="area">
			<!-- left -->
			{$app_ne.left_menu}
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
								<h2>世界の見本市・展示会</h2>
							</div>

							<div class="in_main">
								<h3>
									システムエラー
								</h3>

								{if count($errors)}
								<p>下記の理由のため、ページを表示できません。</p>
								<ul>
								{foreach from=$errors item=error}
									<li>{$error}</li>
								{/foreach}
								</ul>
								{/if}

								<p>お手数ですが、世界の見本市・展示会データベーストップページから、該当するページをお探しください。</p>

								<ul class="icon_arrow">
									<li><a href="/j-messe/">世界の見本市・展示会データベーストップページに戻る</a></li>
									<li><a href="/indexj.html">日本語トップページに戻る</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<p class="totop">
					<a href="javascript:window.scrollTo(0, 0);"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /> </a>
				</p>
			</div>
			<!-- /center -->

		</div>
	</div>
	<!-- /contents -->

	<!-- footer -->
	{$app_ne.footer}
	<!-- /footer -->

</body>
</html>
