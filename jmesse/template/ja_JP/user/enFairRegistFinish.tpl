<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />
{include file="user/enHeader.tpl"}
{*
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
<script type="text/javascript" src="{$config.url}js/j-messe_enInclude.js"></script>
*}
{if ('r' == $form.msg)}
<title>Fair Registration - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ('c' == $form.msg)}
<title>User Editing - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ('d' == $form.msg)}
<title>User Deleting - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
{*
		<ul class="clearfix">
			<li><a href="/">HOME</a></li>
			<li><a href="/en/database/">Business Opportunities</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
			{if ('r' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">Fair Registration(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Registration(step2)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Registratio Confirm</a></li>
			<li>Fair Registration Complete</li>
			{elseif ('c' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">Fair Editing(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Editing(step2)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Editing Confirm</a></li>
			<li>Fair Editing Complete</li>
			{elseif ('d' == $form.msg)}
			<li><a href="/database/j-messe/tradefair/">Fair Detail(Fair Deleting Confirm)</a></li>
			<li>Fair Deleting Complete</li>
			{/if}
		</ul>
*}
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2">
				{if ('r' == $form.msg)}
				<h2>New Fair Registration</h2>
				{elseif ('c' == $form.msg)}
				<h2>Fair Editing</h2>
				{elseif ('d' == $form.msg)}
				<h2>Fair Deleting</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center">
					<img src="/en/database/j-messe/images/db/fair06.jpg" alt="見本市登録完了" />
				</h3>
				{if ('r' == $form.msg)}
				<p>Your registration has been completed.</p>
				{elseif ('c' == $form.msg)}
				<p>Your editing has been completed.</p>
				{elseif ('d' == $form.msg)}
				<p>Your deleting has been completed.</p>
				{/if}
				<div class="finish-navi">
					<div class="btn">
						<a href="{$config.url}?action_user_enFairRegistStep1=true"><span class="title">New Fair Registration</span> <span class="description">To new fair registration page</span></a>
					</div>
					<div class="btn">
						<a href="/j-messe/"><span class="title">To top page</span> <span class="description">To jemmese top page</span></a>
					</div>
				</div>
			</div>
			<p class="totop">
				<a href="javascript:window.scrollTo(0, 0);"><img src="/images/en/totop.gif" alt="Return to PAGETOP" width="103" height="14" /></a>
			</p>
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