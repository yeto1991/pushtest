<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="">

<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<title>パスワードお問い合わせ - 世界の見本市・展示会 -ジェトロ</title>
<script type="text/javascript" src="/js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript">
<!--
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
-->
</script>
</head>

<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->

	<!-- bread -->
	<!--
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li>パスワードお問い合わせ</li>
		</ul>
	</div>
	 -->
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
							<div class="h1"><h1>見本市・展示会データベース</h1></div>
							<div class="h2"><h2>パスワードお問い合わせ</h2></div>
							<div class="in_main">
								<p>ご登録いただいているメールアドレスを入力してください。</p>
								<div class="login">
									<form name="form_user_reissuePassword" id="form_user_reissuePassword" method="post" action="">
										<input type="hidden" name="action_user_reissuePasswordDo" id="action_user_reissuePasswordDo" value="dummy" />
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
													<th class="item">ご登録メールアドレス</th>
													<td><input name="email" id="email" size="60" type="text" value="{form.email}"><br>
													{if is_error('email')}
													<span class="error-message">{message name="email"}</span><br />
													{/if}
													</td>
												</tr>
											</tbody>
										</table>
										<p class="t_right"><input type="image" src="/j-messe/images/db/btn-send.gif"" alt="送信"  class="over" width="110" height="37"  /></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<!-- <a href="javascript:window.open('{$config.url}?action_user_reissuePassword=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a> -->
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
