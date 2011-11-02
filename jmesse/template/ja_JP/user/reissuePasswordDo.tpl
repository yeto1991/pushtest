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
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}
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
		$("#include_contact_us").load("http://localhost/jmesse/www/contact_us.html");
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
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li>パスワードお問い合わせ</li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<div class="area">
	<!-- left -->
	<div id="left">
		<div class="bgbox_set">
			<p id="title"><a href="/j-messe/">見本市・展示会データベース</a></p>
			<div class="bgbox_base">
				<div class="bgbox_in">
					<div class="submenu no_border">
						<ul class="navi">
							<li class="lv01_title"><a href="/j-messe/tradefair/industry/">業種別に見る</a></li>
							<li class="lv01_title"><a href="/j-messe/tradefair/country/">開催地別に見る</a></li>
							<li class="lv01_title"><a href="/j-messe/tradefair/">詳細検索</a></li>
							<li class="lv01_title"><a href="/j-messe/new_fair/">新着見本市</a></li>
							<li class="lv01_title"><a href="/j-messe/ranking/">月間ランキング</a></li>
						</ul>
						<ul class="navi">
							<li class="lv01_label">出展お役立ち情報</li>
							<li class="lv02_title"><a href="/j-messe/w-info/">見本市レポート</a></li>
							<li class="lv02_title"><a href="/services/tradefair/">出展支援</a></li>
							<li class="lv02_title"><a href="/j-messe/center/">世界の展示会場</a></li>
							<li class="lv02_title"><a href="/j-messe/business/">世界の見本市ビジネス動向</a></li>
						</ul>
						<ul class="navi no_border">
							<li class="lv01_label">主催者向け</li>
							<li class="lv02_title"><a href="/j-messe/registration/">見本市登録</a></li>
							<li class="lv02_title"><a href="/j-messe/user/">ユーザー登録・修正</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="sub_inquiry">
			<div class="bgbox_set">
				<dl class="frame_beige">
					<dt>お問い合わせ<br />ご意見・ご感想</dt>
					<dd>ジェトロ展示事業課<br />
					（TEL:03-3582-5541）<br />
					<a href="javascript:jetro_open_win600('https://www.jetro.go.jp/form/fm/faa/inquiry_j');" class="icon_arrow">お問い合わせ</a></dd>
				</dl>
			</div>
		</div>
	</div>
	<!-- /left -->
	<!-- center -->
	<div id="center">
		<div id="main">
			<div class="bgbox_set">
				<div class="bgbox_base">
					<div class="h1"><h1>見本市・展示会データベース</h1></div>
					<div class="h2"><h2>パスワードお問い合わせ完了</h2></div>
					<div class="in_main">
						<p>メール送信致しました。ご確認ください。</p>
					</div>
				</div>
			</div>
		</div>
		<p class="totop">
			<a href="javascript:window.open('{$config.url}?action_user_reissuePasswordDo=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
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
