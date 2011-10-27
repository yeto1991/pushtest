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
<title>ユーザー登録 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
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
			{if ("regist" == $form.mode)}
				<li>ユーザー登録</li>
				{else}
				<li>ユーザー編集</li>
			{/if}
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
							<dd>ジェトロ展示事業課<br />（TEL:03-3582-5541）<br />
								<a href="javascript:jetro_open_win600('https://www.jetro.go.jp/form/fm/faa/inquiry_j');" class="icon_arrow">お問い合わせ</a>
							</dd>
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
								{if ("regist" == $form.mode)}
								<h2>ユーザー登録</h2>
								{else}
								<h2>ユーザー編集</h2>
								{/if}
							</div>
							<div class="in_main">
								<h3 class="img t_center"><img src="/j-messe/images/db/user02.jpg" alt="ユーザー情報入力"></h3>
								<form name="form_user_userRegist" id="form_user_userRegist" method="post" action="">
									{if ("regist" == $form.mode)}
									<input type="hidden" name="action_user_userRegistDo" id="action_user_userRegistDo" value="dummy" />
									{else}
									<input type="hidden" name="action_user_userChangeDo" id="action_user_userChangeDo" value="dummy" />
									{/if}
									<!-- ユーザID -->
									<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
									<!-- 登録モード -->
									<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
									{* エラー表示 *}
									{if count($errors)}
									<p class="error-message" id="error-pagetop">入力に誤りがあります。ご確認ください。</p>
									{/if}
									<h4>Eメールとパスワード</h4>
									<p class="nomargin">J-messe見本市登録をご利用いただくためのEメールとパスワードを設定してください。<br />
									（※入力されたEメールは小文字に変換されて登録されます。）</p>
									<table id="registration">
										{if is_error('email')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">Eメール </th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.email}" size="50" name="email" id="email"><br />
											{if is_error('email')}
											<span class="error-message">{message name="email"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('email2')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">Eメール（確認）</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.email2}" size="50" name="email2" id="email2"><br />
											{if is_error('email2')}
											<span class="error-message">{message name="email2"}</span><br />
											{/if}
											<strong>確認のためもう一度Eメールを入力してください。</strong></td>
										</tr>
										{if is_error('password')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">パスワード</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="password" value="{$form.password}" size="20" name="password" id="password"><br />
											{if is_error('password')}
											<span class="error-message">{message name="password"}</span><br />
											{/if}
											<strong>半角英数字4文字以上、8文字以内で入力して下さい。</td>
										</tr>
										{if is_error('password2')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">パスワード（確認）</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="password" value="{$form.password2}" size="20" name="password2" id="password2"><br />
											{if is_error('password2')}
											<span class="error-message">{message name="password2"}</span><br />
											{/if}
											<strong>確認のためもう一度パスワードを入力してください。</td>
										</tr>
									</table><br />
									<h4>お客様情報入力</h4>
									<table id="registration">
										{if is_error('companyNm')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">会社名</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.companyNm}" size="60" name="companyNm" id="companyNm"><br />
											{if is_error('companyNm')}
											<span class="error-message">{message name="companyNm"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('divisionDeptNm')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">部署名</th>
											<th class="required"></th>
											<td><input type="text" value="{$form.divisionDeptNm}" size="60" name="divisionDeptNm" id="divisionDeptNm"><br />
											{if is_error('divisionDeptNm')}
											<span class="error-message">{message name="divisionDeptNm"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('userNm')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">お名前</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.userNm}" size="60" name="userNm" id="userNm"><br />
											{if is_error('userNm')}
											<span class="error-message">{message name="userNm"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('genderCd')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">性別</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
											<input type="radio" size="60" name="genderCd" id="genderCd" value="0" {if $form.genderCd == "0" } checked {/if}>男性
											<input type="radio" size="60" name="genderCd" id="genderCd" value="1" {if $form.genderCd == "1"} checked {/if}>女性<br />
											{if is_error('genderCd')}
											<span class="error-message">{message name="genderCd"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('postCode')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">郵便番号</th>
											<th class="required"></th>
											<td>
											<input type="text" maxlength="20" value="{$form.postCode}" size="10" name="postCode" id="postCode">（半角英数字)<br />
											{if is_error('postCode')}
											<span class="error-message">{message name="postCode"}</span><br />
											{/if}
											郵便番号はハイフン区切りで入力してください。例：123-4567
											</td>
										</tr>
										{if is_error('address')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">住所</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.address}" size="80" name="address" id="address"><br />
											{if is_error('address')}
											<span class="error-message">{message name="address"}</span><br />
											{/if}
											</td>
										</tr>
										{if is_error('tel')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">TEL</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
											<input type="text" value="{$form.tel}" size="30" name="tel" id="tel">（半角英数字)<br />
											{if is_error('tel')}
											<span class="error-message">{message name="tel"}</span><br />
											{/if}
											電話番号はハイフン区切りで国番号から入力してください。<br />
											例：東京の場合　+81-3-1234-5678
											</td>
										</tr>
										{if is_error('fax')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">FAX</th>
											<th class="required"></th>
											<td>
											<input type="text" value="{$form.fax}" size="30" name="fax" id="fax" >（半角英数字)<br />
											{if is_error('fax')}
											<span class="error-message">{message name="fax"}</span><br />
											{/if}
											FAX番号はハイフン区切りで国番号から入力してください。<br />
											例：東京の場合　+81-3-1234-5678</td>
										</tr>
										{if is_error('url')}
										<tr class="errorcheck">
										{else}
										<tr>
										{/if}
											<th class="item">御社のウェブサイトURL</th>
											<th class="required"></th>
											<td><input type="text" value="{$form.url}" size="60" name="url" id="url"><br />
											{if is_error('url')}
											<span class="error-message">{message name="url"}</span><br />
											{/if}
											URLはhttp(s):// から入力して下さい。
											</td>
										</tr>
										{if ("regist" != $form.mode)}
										<tr>
											<th class="item">退会希望</th>
											<th class="required"></th>
											<td><input type="checkbox" size="60" name="delFlg" id="delFlg" value="1"> 退会を希望します。<br />
											※退会をご希望の方は、チェックをつけてください。<br />
											</td>
										</tr>
										{/if}
									</table>
									<!-- navi area-->
									<table width="100%">
										<tr>
											<td><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" onclick="history.back()"/></td>
											<td align="right"><input type="image" src="/j-messe/images/db/btn-confirm.gif" alt="確認画面へ"  class="over" /></td>
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
								<!-- /ssl area-->
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					{if ("regist" == $form.mode)}
					<a href="javascript:window.open('{$config.url}?action_user_userRegist=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{else}
					<a href="javascript:window.open('{$config.url}?action_user_userChange=true&user_id={$form.user_id}&mode={$form.mode}&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{/if}
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