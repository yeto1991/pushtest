<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />
{include file="user/enHeader.tpl"}
<title>User Detail - Online Trade Fair Database (J-messe) - JETRO</title>
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
{*
		<ul>
			<li><a href="/">HOME</a></li>
			<li><a href="/en/database/">引き合い・展示会検索</a></li>
			<li><a href="/en/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/en/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li><a href="/en/database/j-messe/tradefair/">個人メニュー</a></li>
			<li>ユーザー詳細</li>
		</ul>
*}
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2"><h2>Detailed User Information</h2></div>
			<div class="in_main">
				<p>If you need to change your registration information or to withdraw your registration, click “Return to Editing Page.”<br /></p>
				<form name="form_user_enUserDetail" id="form_user_enUserDetail" method="post" action=""  enctype="multipart/form-data">
					<input type="hidden" name="action_user_enUserChange" id="action_user_enUserChange" value="dummy" />
					<!-- モード -->
					<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
					<!-- ユーザID -->
					<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
					<h4>E-mail Account and Password</h4>
					<table id="registration">
						<tr>
							<th class="item">email</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>{$form.email}</td>
						</tr>
						<tr>
							<th class="item">password</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>●●●●●●●●</td>
						</tr>
					</table><br />
					<h4>Other User Information</h4>
					<table id="registration">
						<tr>
							<th class="item">Company name</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>{$form.companyNm}</td>
						</tr>
						<tr>
							<th class="item">Division/Dept name</th>
							<th class="required"></th>
							<td>{$form.divisionDeptNm}<br /></td>
						</tr>
						<tr>
							<th class="item">Your name</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>{$form.userNm}</td>
						</tr>
						<tr>
							<th class="item">Gender</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>
							{if $form.genderCd == "0"}Male{/if}
							{if $form.genderCd == "1"}Female{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Post Code</th>
							<th class="required"></th>
							<td>{$form.postCode}</td>
						</tr>
						<tr>
							<th class="item">Address</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>{$form.address}</td>
						</tr>
						<tr>
							<th class="item">TEL</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="40" /></th>
							<td>{$form.tel}</td>
						</tr>
						<tr>
							<th class="item">FAX</th>
							<th class="required"></th>
							<td>{$form.fax}</td>
						</tr>
						<tr>
							<th class="item">URL</th>
							<th class="required"></th>
							<td>{$form.url}</td>
						</tr>
					</table>
					<!-- navi area-->
					<table width="100%">
						<tr>
							<td><img src="/en/database/j-messe/images/db/btn-back.gif" alt="back" width="110" height="37" class="over" onclick="history.back()"/></td>
							<td align="right"><input type="image" src="/en/database/j-messe/images/db/btn-confirm.gif" alt="TO EDIT"  class="over" /></td>
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
						<td>All your information submitted through this page is protected by SSL.</td>
					</tr>
				</table>
			</div>
			<p class="totop">
				<a href="javascript:window.open('{$config.url}?action_user_enUserDetail=true&print=1', 'print')" target="print"><img src="/images/en/btn-print.gif" alt="Print" height="14" width="46" /></a>
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