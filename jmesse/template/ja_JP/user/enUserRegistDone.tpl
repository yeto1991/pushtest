<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />
{include file="user/enHeader.tpl}
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
{if ("regist" == $form.mode)}
	<title>User Registration - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ("change" == $form.mode)}
	<title>User Editing - Online Trade Fair Database (J-messe) - JETRO</title>
{else}
	<title>User Deleting - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">Business Opportunities</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			<li><a href="/en/j-messe/tradefair/">Trade Fairs held in Japan and the World</a></li>
			{if ("regist" == $form.mode)}
				<li><a href="/database/j-messe/tradefair/">User Registration</a></li>
				<li><a href="/database/j-messe/tradefair/">User Registration Confirm</a></li>
				<li>User Registration Complete</li>
			{elseif ("change" == $form.mode)}
				<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
				<li><a href="/database/j-messe/tradefair/">User Editing</a></li>
				<li><a href="/database/j-messe/tradefair/">User Editing Confirm</a></li>
				<li>User Editing Complete</li>
			{else}
				<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
				<li><a href="/database/j-messe/tradefair/">User Editing</a></li>
				<li><a href="/database/j-messe/tradefair/">User Deleting Confirm</a></li>
				<li>User Deleting Complete</li>
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
				<h2>User Registration</h2>
				{/if}
				{if ("change" == $form.mode)}
				<h2>User Editing</h2>
				{/if}
				{if ("delete" == $form.mode)}
				<h2>User Deleting</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center"><img src="/j-messe/images/db/user04.jpg" alt="ユーザー登録完了" /></h3>
				{if ("regist" == $form.mode)}
				<p>User Registration complete. Thank you very much.</p>
				{/if}
				{if ("change" == $form.mode)}
				<p>User Editing complete. Thank you very much.</p>
				{/if}
				{if ("delete" == $form.mode)}
				<p>User Deleting complete. Thank you very much.</p>
				{/if}
				<div class="finish-navi">
					{if ("delete" != $form.mode)}
					<div class="btn">
						<a href="{$config.url}?action_user_enFairRegistStep1=true" ><span class="title">New Fair Registration</span>
						<span class="description">To new fair registration page</span></a>
					</div>
					{/if}
					<div class="btn">
						<a href="/j-messe/" ><span class="title">To top page</span>
						<span class="description">To jemmese top page</span></a>
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
		{$app_ne.left_menu}
		<!-- /submenu -->
	</div>
	<!-- /contents -->
	<!-- footer -->
	{$app_ne.footer}
	<!-- /footer -->
</body>
</html>