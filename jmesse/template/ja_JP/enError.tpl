<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、{$app.fair_detail.exhibits_en|replace:'&lt;br/&gt;':''}, {$app.fair_detail.keyword}" />
{include file="enHeader.tpl"}
<title>error page</title>

<body class="layout-LC highlight-database j-messe">

	<!-- header -->
	{$app_ne.header}
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul class="clearfix">
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			<li><a href="/en/j-messe/tradefair/">Trade Fairs held in Japan and the World</a></li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2">
				<h2>Trade Fairs held in Japan and the World</h2>
			</div>
			<div class="in_main">

				<h3>System error</h3>

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
		<!-- /main -->

		<!-- submenu -->
		{$app_ne.left_menu}
		<!-- /submenu -->

	</div>
	<!-- /contents -->

	<!-- footer -->
	{$app_ne.footer}
	<!-- /footer -->

</body>
</html>
