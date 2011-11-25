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
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}
<script type="text/javascript" src="{$config.url}js/j-messe_include.js"></script>
*}
<title>ユーザー詳細 - 世界の見本市・展示会 -ジェトロ</title>
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
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li><a href="/database/j-messe/tradefair/">個人メニュー</a></li>
			<li>ユーザー詳細</li>
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
							<div class="h2"><h2>ユーザー詳細</h2></div>
							<div class="in_main">
								<!-- <h3 class="img t_center"><img src="/j-messe/images/db/user03.jpg" alt="ユーザー登録情報確認"></h3> -->
								<p>登録情報を変更したい場合、または退会をご希望の方は「編集画面へ」ボタンをクリックしてください。<br /></p>
								<form name="form_user_userDetail" id="form_user_userDetail" method="post" action=""  enctype="multipart/form-data">
									<input type="hidden" name="action_user_userChange" id="action_user_userChange" value="dummy" />
									<!-- モード -->
									<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
									<!-- ユーザID -->
									<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
									<h4>Eメールとパスワード</h4>
									<table id="registration">
										<tr>
											<th class="item">Eメール</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.email}</td>
										</tr>
										<tr>
											<th class="item">パスワード</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.password}</td>
										</tr>
									</table><br />
									<h4>お客様情報入力</h4>
									<table id="registration">
										<tr>
											<th class="item">会社名</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.companyNm}</td>
										</tr>
										<tr>
											<th class="item">部署名</th>
											<th class="required"></th>
											<td>{$form.divisionDeptNm}<br /></td>
										</tr>
										<tr>
											<th class="item">お名前</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.userNm}</td>
										</tr>
										<tr>
											<th class="item">性別</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
											{if $form.genderCd == "0"}男性{/if}
											{if $form.genderCd == "1"}女性{/if}
											</td>
										</tr>
										<tr>
											<th class="item">郵便番号</th>
											<th class="required"></th>
											<td>{$form.postCode}</td>
										</tr>
										<tr>
											<th class="item">住所</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.address}</td>
										</tr>
										<tr>
											<th class="item">TEL</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>{$form.tel}</td>
										</tr>
										<tr>
											<th class="item">FAX</th>
											<th class="required"></th>
											<td>{$form.fax}</td>
										</tr>
										<tr>
											<th class="item">御社のウェブサイトURL</th>
											<th class="required"></th>
											<td>{$form.url}</td>
										</tr>
									</table>
									<!-- navi area-->
									<table width="100%">
										<tr>
											<td><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" onclick="history.back()"/></td>
											<td align="right"><input type="image" src="/j-messe/images/db/btn-confirm.gif" alt="編集画面へ"  class="over" /></td>
										</tr>
									</table>
								</form>
								<div class="line_dot"><hr /></div>
								<!-- /navi area-->
								<!-- ssl area-->
								<table id="ssl-content">
									<tr>
										<td>
											<!-- DigiCert Site Seal Code -->
											<div id="digicertsitesealcode" style="width: 65px; margin: 5px auto 5px auto;" align="center">
											<script language="javascript" type="text/javascript" src="https://www.digicert.com/custsupport/sealtable.php?order_id=00155638&amp;seal_type=a&amp;seal_size=small&amp;seal_color=blue&amp;new=1&amp;newsmall=1"></script>
											<a href="http://www.digicert.com/ssl-certificate.htm">SSL Certificate</a><script language="javascript" type="text/javascript">coderz();</script></div>
											<!-- /DigiCert Site Seal Code -->
										</td>
										<td>このページから送信される情報は、SSL暗号化通信により保護されています。</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<a href="javascript:window.open('{$config.url}?action_user_userDetail=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
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