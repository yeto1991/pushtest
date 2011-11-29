<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="">
{include file="user/header.tpl"}
{*
<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="{$config.url}js/j-messe_include.js"></script>
*}
{if ("regist" == $form.mode)}
	<title>ユーザー登録 - 世界の見本市・展示会 -ジェトロ</title>
{elseif ("change" == $form.mode)}
	<title>ユーザー修正 - 世界の見本市・展示会 -ジェトロ</title>
{else}
	<title>ユーザー削除 - 世界の見本市・展示会 -ジェトロ</title>
{/if}
</head>


<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
{*
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			{if ("regist" == $form.mode)}
				<li><a href="{$config.url}?action_user_userRegist=true">ユーザー登録</a></li>
				<li><a href="{$config.url}?action_user_userRegistDo=true">ユーザー登録確認</a></li>
				<li>ユーザー登録完了</li>
			{elseif ("change" == $form.mode)}
				<li><a href="{$config.url}?action_user_top=true">個人メニュー</a></li>
				<li><a href="{$config.url}?action_user_userChange=true&user_id={$form.user_id}&mode={$form.mode}">ユーザー修正</a></li>
				<li><a href="{$config.url}?action_user_userChangeDo=true&user_id={$form.user_id}&mode={$form.mode}">ユーザー修正確認</a></li>
				<li>ユーザー修正完了</li>
			{else}
				<li><a href="{$config.url}?action_user_top=true">個人メニュー</a></li>
				<li><a href="{$config.url}?action_user_userChange=true&user_id={$form.user_id}&mode={$form.mode}">ユーザー修正</a></li>
				<li><a href="{$config.url}?action_user_userChangeDo=true&user_id={$form.user_id}&mode={$form.mode}">ユーザー削除確認</a></li>
				<li>ユーザー削除完了</li>
			{/if}
		</ul>
*}
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
							<div class="h1"><h1>見本市・展示会データベース</h1></div>
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
										<a href="{$config.url}?action_user_fairRegistStep1=true" ><span class="title">続いて見本市を登録する</span>
										<span class="description">見本市新規登録ページを開きます。</span></a>
									</div>
									{/if}
									<div class="btn">
										<a href="/j-messe/" ><span class="title">登録を終了する</span>
										<span class="description">「見本市・展示会データベース」のトップページに戻ります。</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
				<!--
					{if ("regist" == $form.mode)}
					<a href="javascript:window.open('{$config.url}?action_user_userRegistDone=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{else}
					<a href="javascript:window.open('{$config.url}?action_user_userChangeDone=true&user_id={$form.user_id}&mode={$form.mode}&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{/if}
				 -->
					<a href="javascript:window.scrollTo(0, 0);"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a>
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