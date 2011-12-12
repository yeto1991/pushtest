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
{if ("regist" == $form.mode)}
<title>User Registration - Online Trade Fair Database (J-messe) - JETRO</title>
{else}
<title>User Editing - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/">HOME</a></li>
			<li><a href="/en/database/">Business Opportunities</a></li>
			<li><a href="/en/database/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			{if ("regist" == $form.mode)}
				<li>User Registration</li>
				{else}
				<li><a href="{$config.url}?action_user_enTop=true">My Menu</a></li>
				<li>User Editing</li>
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
				{else}
				<h2>Edit User Information</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center"><img src="/en/database/j-messe/images/db/user02.jpg " alt="ユーザー情報入力" /></h3>
				<form name="form_user_enUserRegist" id="form_user_enUserRegist" method="post" action="">
					{if ("regist" == $form.mode)}
					<input type="hidden" name="action_user_enUserRegistDo" id="action_user_enUserRegistDo" value="dummy" />
					{else}
					<input type="hidden" name="action_user_enUserChangeDo" id="action_user_enUserChangeDo" value="dummy" />
					{/if}
					<!-- ユーザID -->
					<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
					<!-- 登録モード -->
					<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
					{* エラー表示 *}
					{if count($errors)}
					<p class="error-message" id="error-pagetop">The data you have entered is invalid. Please re-enter.</p>
					{/if}
					<h4>E-mail Account and Password</h4>
					<p class="nomargin">Please register your e-mail address and password to log into J-messe.<br />
					(※ All letters entered for e-mail registration will be automatically converted to lowercase.)</p>
					<table id="registration">
						{if is_error('email')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">email</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="text" value="{$form.email}" size="50" name="email" id="email" /><br />
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
							<th class="item">email（Confirm）</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="text" value="{$form.email2}" size="50" name="email2" id="email2" /><br />
							{if is_error('email2')}
							<span class="error-message">{message name="email2"}</span><br />
							{/if}
							<strong>Re-enter the e-mail address for confirmation.</strong></td>
						</tr>
						{if is_error('password')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">password</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="password" value="{$form.password}" size="20" name="password" id="password" /><br />
							{if is_error('password')}
							<span class="error-message">{message name="password"}</span><br />
							{/if}
							<strong>Enter a login password with a combination of 4 to 8 single-byte letters and numbers.</strong></td>
						</tr>
						{if is_error('password2')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">password（Confirm）</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="password" value="{$form.password2}" size="20" name="password2" id="password2" /><br />
							{if is_error('password2')}
							<span class="error-message">{message name="password2"}</span><br />
							{/if}
							<strong>Re-enter the password for confirmation.</strong></td>
						</tr>
					</table><br />
					<h4>Other User Information</h4>
					<table id="registration">
						{if is_error('companyNm')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">Company name</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="text" value="{$form.companyNm}" size="60" name="companyNm" id="companyNm" /><br />
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
							<th class="item">Division/Dept name</th>
							<th class="required"></th>
							<td><input type="text" value="{$form.divisionDeptNm}" size="60" name="divisionDeptNm" id="divisionDeptNm" /><br />
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
							<th class="item">Your name</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="text" value="{$form.userNm}" size="60" name="userNm" id="userNm" /><br />
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
							<th class="item">Gender</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td>
							<input type="radio" size="60" name="genderCd" id="genderCd" value="0" {if $form.genderCd == "0" } checked {/if} />Male
							<input type="radio" size="60" name="genderCd" id="genderCd" value="1" {if $form.genderCd == "1"} checked {/if} />Female<br />
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
							<th class="item">Post Code</th>
							<th class="required"></th>
							<td>
							<input type="text" maxlength="20" value="{$form.postCode}" size="10" name="postCode" id="postCode" />（single-byte letters and numbers)<br />
							Insert a hyphen between each group of numbers.<br />(E.g. for an address in Japan: 123-4568)<br />
							{if is_error('postCode')}
							<span class="error-message">{message name="postCode"}</span>
							{/if}
							</td>
						</tr>
						{if is_error('address')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">Address</th>
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td><input type="text" value="{$form.address}" size="80" name="address" id="address" /><br />
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
							<th class="required"><img src="/en/database/j-messe/images/db/required.gif " height="18" width="30" /></th>
							<td>
							<input type="text" value="{$form.tel}" size="30" name="tel" id="tel" />（single-byte letters and numbers)<br />
							{if is_error('tel')}
							<span class="error-message">{message name="tel"}</span><br />
							{/if}
							Enter the numbers starting with a plus mark “+” followed by the country code. <br />
							Insert hyphens between each group of numbers. <br />(E.g. for a phone number in Tokyo: +81-3-1234-5678)<br />
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
							<input type="text" value="{$form.fax}" size="30" name="fax" id="fax" />（single-byte letters and numbers)<br />
							{if is_error('fax')}
							<span class="error-message">{message name="fax"}</span><br />
							{/if}
							</td>
						</tr>
						{if is_error('url')}
						<tr class="errorcheck">
						{else}
						<tr>
						{/if}
							<th class="item">URL</th>
							<th class="required"></th>
							<td><input type="text" value="{$form.url}" size="60" name="url" id="url" /><br />
							{if is_error('url')}
							<span class="error-message">{message name="url"}</span><br />
							{/if}
							Enter the URL beginning with “http(s)://”.
							</td>
						</tr>
						{if ("regist" != $form.mode)}
						<tr>
							<th class="item">Withdrawal of Registration</th>
							<th class="required"></th>
							<td><input type="checkbox" size="60" name="delFlg" id="delFlg" value="1" />I would like to withdraw my registration.<br />
							※Check the box above if you wish to withdraw your registration.<br />
							</td>
						</tr>
						{/if}
					</table>
					<!-- navi area-->
					<table width="100%">
						<tr>
							<td><img src="/j-messe/images/db/btn-back.gif" alt="back" width="110" height="37" class="over" onclick="history.back()"/></td>
							<td align="right"><input type="image" src="/j-messe/images/db/btn-confirm.gif" alt="To Confirm"  class="over" /></td>
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
				<!-- /ssl area-->
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