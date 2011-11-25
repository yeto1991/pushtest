<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />
{include file="user/header.tpl"}
{*
<!--テスト用-->
<base href="https://dev.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="{$config.url}js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="{$config.url}js/j-messe_include.js"></script>
*}
<title>ユーザーログイン - 世界の見本市・展示会 -ジェトロ</title>
</head>


<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->

{*
	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li>ユーザーログイン</li>
		</ul>
	</div>
	<!-- /bread -->
*}

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
							<div class="h2"><h2>ユーザーログイン</h2></div>
							<div class="in_main">
								<p>世界の見本市・展示会データベース(J-messe)の主催者向け管理ページにログインします。</p>
								<div class="login">
									<form name="form_user_login" id="form_user_login" method="post" action="">
										<input type="hidden" name="action_user_loginDo" id="action_user_loginDo" value="dummy" />
										<input type="hidden" name="function" id="function" value="{$form.function}" />
										{* エラー表示 *}
										{if count($errors)}
										<p class="error-message" id="error-pagetop">入力に誤りがあります。ご確認ください。</p>
										{/if}
										<table id="registration">
											<tbody>
												{if is_error('email')}
												<tr class="errorcheck">
												{else}
												<tr>
												{/if}
													<th class="item">ユーザー名<br />（メールアドレス）</th>
													<td>
														<input type="text" name="email" id="email" size="60" value="{$form.email}" /><br />
														{if is_error('email')}
														<span class="error-message">{message name="email"}</span><br />
														{/if}
													</td>
												</tr>
												{if is_error('password')}
												<tr class="errorcheck">
												{else}
												<tr>
												{/if}
													<th class="item">パスワード<br /></th>
													<td>
														<input type="password" name="password" id="password" size="60" value="{$form.password}" /><br />
														{if is_error('password')}
														<span class="error-message">{message name="password"}</span><br />
														{/if}
													</td>
												</tr>
											</tbody>
										</table>
										<p class="t_right"><input type="image" src="/j-messe/images/db/btn-login.gif" alt="ログイン"  class="over" width="180" height="37"  /></p>
									</form>
									<div class="line_dot"><hr /></div>
									<p><strong>パスワードを忘れた方</strong><br />
									<a href="{$config.url}?action_user_reissuePassword=true"  class="icon_arrow">パスワードお問い合わせ</a></p><br />
									<p><strong>初めてご利用の方</strong><br />見本市登録を始めてご利用いただく場合はまずユーザー登録をお願いします。<br />
									<a href="{$config.url}?action_user_userRegist=true" class="icon_arrow">ユーザー登録</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<!-- <a href="javascript:window.open('{$config.url}?action_user_login=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a> -->
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

	</script>
</body>
</html>