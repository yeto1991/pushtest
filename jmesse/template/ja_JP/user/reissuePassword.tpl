<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>パスワード再発行画面</title>
</head>
<body onload="document.getElementById('email').focus()">
	<div align="center">
		<font size=5><b>パスワード再発行画面</b></font>
	</div>
	<hr>

	{* エラー表示 *}
	{if count($errors)}
	<ul>
		{foreach from=$errors item=error}
		<li><font color="#ff0000">{$error}</font></li>
		{/foreach}
	</ul>
	{/if}

	<div align="center">パスワード再発行</div>
	<br />
	<form name="form_user_reissuePassword" id="form_user_reissuePassword" method="post" action="">
		<input type="hidden" name="action_user_reissuePasswordDo" id="action_user_reissuePasswordDo" value="dummy" />
		{uniqid}
		<div align="center">
			<table>
				<tr>
					<td colspan=3 align="left">Eメールを入力してください。</td>
				</tr>
				<tr>
					<td align="left">Eメール</td>
					<td>:</td>
					<td align="left"><input type="text" name="email" id="email" value="{$form.email}"  maxlength="28" style="width:200px" /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" value=" 実  行 " /><br /><br /><br /><br /></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
