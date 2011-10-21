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
<title>ユーザー登録 - 世界の見本市・展示会 -ジェトロ</title>
<script type="text/javascript" src="/js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
</head>


<body class="layout-LC highlight-match j-messe">
<!-- header -->
<div id="skip_menu"><a href="#center">skip to contents.</a></div>
<div id="header">
<div class="area">
	<p id="logo"><a href="/indexj.html"><img src="/images/jp/logo.gif" alt="JETRO 日本貿易振興機構（ジェトロ）" height="41" width="283" /></a></p>
	<div id="headlink">
		<ul class="clearfix">
			<li><a href="/contact/"><img src="/images/jp/headmenu01.gif" alt="お問い合わせ" height="9" width="67" /></a></li>
			<li><a href="/guide/"><img src="/images/jp/headmenu05.gif" alt="サイト活用ガイド" height="9" width="82" /></a></li>
			<li><a href="/sitemap/"><img src="/images/jp/headmenu02.gif" alt="サイトマップ" height="9" width="62" /></a></li>
			<li class="end"><a href="/"><img src="/images/jp/headmenu03.gif" alt="Global Home" height="9" width="74" /></a></li>
		</ul>
	</div>
	<div id="headbox">
		<!-- Site Search Box Begins  -->
		<form method="get" action="http://search.jetro.go.jp/ja_all/search.x">
		<div id="search">
		<input type="text" name="q" value="サイト内検索" id="MF_form_phrase" class="search_area" autocomplete="off" onclick="if(this.value=='サイト内検索') this.value=''; this.style.color = '#555555';" onblur="if(!this.value) this.value='サイト内検索';" style="color: #555555;" />
		<input type="image" class="search_btn" alt="検索" src="/images/jp/btn-search.gif" value="search" name="sa" />
		<input type="hidden" name="ie" value="UTF-8" />
		<input type="hidden" name="page" value="1" />
		<a href="/search/"><img src="/images/jp/icon-question.gif" alt="HELP" width="14" height="14" /></a>
		</div>
		</form>
		<!-- Site Search Box eEnd  -->

		<div id="fontsizech">
			<div><img src="/images/jp/fontsizech.gif" alt="文字のサイズを変更できます" width="45" height="9" /></div>
			<ul>
				<li id="fontsizech_small"><a href="#"><img src="/images/jp/fontsizech_small.gif" alt="標準の文字サイズ" width="23" height="45" /></a></li>
				<li id="fontsizech_large"><a href="#"><img src="/images/jp/fontsizech_large.gif" alt="大きい文字サイズ" width="23" height="45" /></a></li>
			</ul>
		</div>
		<noscript id="fontsizech_noscriptalert">
			<p>文字サイズの変更機能にJavascriptを使用しています。Javascriptがお使いになれない環境では、ブラウザの機能を使用して文字サイズの変更を行ってください。</p>
		</noscript>
	</div>
</div>
</div>
<!-- global -->
<div id="globalnavi">
<ul>
	<li class="g01"><a href="/indexj.html"><img src="/images/jp/global01.gif" alt="ホーム" height="37" width="104" /></a></li>
	<li class="g02"><a href="/biz/"><img src="/images/jp/global02.gif" alt="海外ビジネス情報" height="37" width="177" /></a></li>
	<li class="g03"><a href="/database/"><img src="/images/jp/global03.gif" alt="引き合い・展示会検索" height="37" width="168" /></a></li>
	<li class="g04"><a href="/news_events/"><img src="/images/jp/global04.gif" alt="ニュース・イベント" height="37" width="158" /></a></li>
	<li class="g05"><a href="/support_services/"><img src="/images/jp/global05.gif" alt="サポート&amp;サービス" height="37" width="178" /></a></li>
	<li class="g06"><a href="/jetro/"><img src="/images/jp/global06.gif" alt="ジェトロについて" height="37" width="159" /></a></li>
</ul>
</div>
<!-- /global -->
<!-- /header -->

<!-- bread -->
<div id="bread">
<ul>
	<li><a href="/indexj.html">HOME</a></li>
	<li><a href="/database/">引き合い・展示会検索</a></li>
	<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
	<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
	<li>ユーザー登録</li>
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
	<li class="lv01_label">出展者向け</li>
	<li class="lv02_title"><a href="/j-messe/registration/">見本市登録</a></li>
	<li class="lv02_title on"><a href="/j-messe/user/">ユーザー登録・修正</a></li>
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

<div class="h2">
		<h2>ユーザー登録</h2>
</div>

<div class="in_main">
<h3 class="img t_center"><img src="/j-messe/images/db/user03.jpg" alt="ユーザー登録情報確認"></h3>

<p>以下の内容に間違いがないかご確認の上、「登録」ボタンをクリックしてください。<br />
修正したい場合は「戻る」ボタンをクリックしてください。</p>

<form>
<h4>ユーザーIDとパスワード</h4>
<table id="registration">
<tr>
<th class="item">ユーザーID</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>userid</td>
</tr>
<tr>
<th class="item">パスワード</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>******</td>
</tr>

</table>
<br />
<h4>お客様情報入力</h4>
<table id="registration">
<tr>
<th class="item">会社名</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>会社名</td>
</tr>
<tr>
<th class="item">部署名</th>
<th class="required"></th>
<td>部署名<br /></td>
</tr>
<tr>
<th class="item">お名前</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>お名前</td>
</tr>
<tr>
<th class="item">Eメール </th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>aaa@aaa.co.jp</td>
</tr>
<tr>

<th class="item">郵便番号</th>
<th class="required"></th>
<td>123-4567</td>
</tr>

<tr>
<th class="item">住所</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>東京都</td>
</tr>
<tr>

<th class="item">TEL</th>
<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
<td>+81-3-1234-5678</td>
</tr>
<tr>
<th class="item">FAX</th>
<th class="required"></th>
<td>+81-3-1234-5678</td>
</tr>
</tr>
<tr>
<th class="item">御社のウェブサイトURL</th>
<th class="required"></th>
<td>http://www.aaa.co.jp</td>
</tr>
</table>

<!-- navi area-->
<table width="100%">
<tr><td><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" /></td>

<td align="right"><img src="/j-messe/images/db/btn-finish.gif" alt="完了" width="180" height="37" class="over" /></td></tr>
</table>
</form>
<div class="line_dot">
	<hr />
</div>
<!-- /navi area-->
<!-- ssl area-->
<table id="ssl-content">
<tr>
<td>
<!-- DigiCert Site Seal Code -->
<div id="digicertsitesealcode"
style="width: 65px; margin: 5px auto 5px auto;" align="center"><script
language="javascript" type="text/javascript"
src="https://www.digicert.com/custsupport/sealtable.php?order_id=00155638&amp;seal_type=a&amp;seal_size=small&amp;seal_color=blue&amp;new=1&amp;newsmall=1"></script><a
href="http://www.digicert.com/ssl-certificate.htm">SSL
Certificate</a><script language="javascript"
type="text/javascript">coderz();</script></div>
<!-- /DigiCert Site Seal Code -->

</td>
<td>このページから送信される情報は、SSL暗号化通信により保護されています。</td>
</tr>
</table>


</div>

			</div>
		</div>
	</div>
<p class="totop"><a href="?print=1" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a><a href="#header"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a></p>
</div>
<!-- /center -->
</div>
</div>
<!-- /contents -->
13:35 2011/10/18
<!-- footer -->
<div id="footer">
	<div class="area">

		<ul id="footlink">
			<li class="start"><a href="/privacy/">個人情報保護</a></li>
			<li><a href="/legal/">利用規約・免責事項</a></li>
			<li><a href="/disclosure/">情報公開</a></li>
			<li><a href="/contact/">FAQ/お問い合わせ</a></li>
			<li class="end"><a href="/links/">リンク</a></li>
		</ul>
		<p id="copyright">Copyright (C) 1995-2011 Japan External Trade Organization(JETRO). All rights reserved.</p>
	</div>
</div>

<!-- footer_script -->
<script src="http://search.jetro.go.jp/site/js/suggest_ext.js#unitid=ja_all" type="text/javascript" charset=" UTF-8"></script>
<script type="text/javascript" src="/js/galink.js"></script>
<script type="text/javascript" src="/js/matc.js"></script>
<script type="text/javascript" src="/js/gatrack.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<!-- /footer_script -->
<!-- /footer -->

</body></html>