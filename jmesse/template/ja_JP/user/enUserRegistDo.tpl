<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="">

{if ("regist" == $form.mode)}
	<title>User Registration - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ("change" == $form.mode)}
	<title>User Editing - Online Trade Fair Database (J-messe) - JETRO</title>
{else}
	<title>User Deleting - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}

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

<script type="text/javascript">
<!--
{literal}

	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/enHeader.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/enFooter.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/enLeft_menu.html");
	});

{/literal}
//-->
</script>
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	<div id="include_header"></div>
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
				<li>User Registration Confirm</li>
			{elseif ("change" == $form.mode)}
				<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
				<li><a href="/database/j-messe/tradefair/">User Editing</a></li>
				<li>User Editing Confirm</li>
			{else}
				<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
				<li><a href="/database/j-messe/tradefair/">User Editing</a></li>
				<li>User Deleting Confirm</li>
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
				{elseif ("change" == $form.mode)}
				<h2>User Editing</h2>
				{else}
				<h2>User Deleting</h2>
				{/if}
			</div>
			<div class="in_main">
				<h3 class="img t_center"><img src="/j-messe/images/db/user03.jpg" alt="ユーザー登録情報確認"></h3>
				{if ("delete" == $form.mode)}
				<p><font color="red">If you press the "Complete" button, user's informations can't restore because it is deleted.<br />
				So please note when you withdraw from membership.</font></p>
				{else}
				<p>
				Please confirm the your entered informations.If it's ok, please press the "Complete" button.<br />
				If you want to back the last page, please press the "back" button.
				</p>
				{/if}
				<form name="form_user_enUserRegistDo" id="form_user_enUserRegistDo" method="post" action="">
					{uniqid}
					{if ("regist" == $form.mode)}
					<input type="hidden" name="action_user_enUserRegistDone" id="action_user_enUserRegistDone" value="dummy" />
					{else}
					<input type="hidden" name="action_user_enUserChangeDone" id="action_user_enUserChangeDone" value="dummy" />
					{/if}
					<!-- ユーザID -->
					<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
					<!-- 登録モード -->
					<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
					<!-- フォーム情報をhidden設定 -->
					<input type="hidden" name="email" id="email" value="{$form.email}" />
					<input type="hidden" name="password" id="password" value="{$form.password}" />
					<input type="hidden" name="companyNm" id="companyNm" value="{$form.companyNm}" />
					<input type="hidden" name="divisionDeptNm" id="divisionDeptNm" value="{$form.divisionDeptNm}" />
					<input type="hidden" name="userNm" id="userNm" value="{$form.userNm}" />
					<input type="hidden" name="genderCd" id="genderCd" value="{$form.genderCd}" />
					<input type="hidden" name="postCode" id="postCode" value="{$form.postCode}" />
					<input type="hidden" name="address" id="address" value="{$form.address}" />
					<input type="hidden" name="tel" id="tel" value="{$form.tel}" />
					<input type="hidden" name="fax" id="fax" value="{$form.fax}" />
					<input type="hidden" name="url" id="url" value="{$form.url}" />
					<input type="hidden" name="delFlg" id="delFlg" value="{$form.delFlg}" />
					<input type="hidden" name="emailCheckFlg" id="emailCheckFlg" value="{$form.emailCheckFlg}" />
					{* エラー表示 *}
					{if count($errors)}
					<ul>
						{foreach from=$errors item=error}
						<li><font color="#ff0000">{$error}</font></li>
						{/foreach}
					</ul>
					{/if}
					<h4>Email and Password</h4>
					<table id="registration">
						<tr>
							<th class="item">email</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.email}</td>
						</tr>
						<tr>
							<th class="item">password</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.password}</td>
						</tr>
					</table><br />
					<h4>User's Information</h4>
					<table id="registration">
						<tr>
							<th class="item">Company name</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.companyNm}</td>
						</tr>
						<tr>
							<th class="item">Division/Dept name</th>
							<th class="required"></th>
							<td>{$form.divisionDeptNm}<br /></td>
						</tr>
						<tr>
							<th class="item">Your name</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.userNm}</td>
						</tr>
						<tr>
							<th class="item">Gender</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
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
							<th class="item">URL</th>
							<th class="required"></th>
							<td>{$form.url}</td>
						</tr>
						{if ("1" == $form.delFlg)}
						<tr>
							<th class="item">Withdrawal from membership</th>
							<th class="required"></th>
							<td>Yes</td>
						</tr>
						{/if}
					</table>
					<!-- navi area-->
					<table width="100%">
						<tr>
							<td><img src="/j-messe/images/db/btn-back.gif" alt="back" width="110" height="37" class="over" onclick="history.back()"/></td>
							<td align="right"><input type="image" src="/j-messe/images/db/btn-finish.gif" alt="complete" class="over" /></td>
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
			<p class="totop">
				<!-- <a href="?print=1" target="print"><img src="/images/en/btn-print.gif" alt="Print" width="46" height="14" /></a>  -->
				<a href="javascript:window.scrollTo(0, 0);"><img src="/images/en/totop.gif" alt="Return to PAGETOP" width="103" height="14" /></a>
			</p>
		</div>
		<!-- /main -->
		<!-- submenu -->
		<div id="include_left_menu"></div>
		<!-- /submenu -->
	</div>
	<!-- /contents -->
	<!-- footer -->
	<div id="include_footer"></div>
	<!-- /footer -->
</body>
</html>