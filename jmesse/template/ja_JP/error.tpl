<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会" />
{include file="header.tpl"}
<title>error page</title>
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
			<li><a href="/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/j-messe/tradefair/">世界の見本市・展示会</a></li>
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
								<h2>システムエラー</h2>
							</div>
							<div class="in_main">
								<p>
									<ul>
									{if count($errors)}
									{foreach from=$errors item=error}
										<li><font color="#ff0000">{$error}</font></li>
									{/foreach}
									{/if}
									</ul>
								</p>
							</div>
						</div>
					</div>
				</div>
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
