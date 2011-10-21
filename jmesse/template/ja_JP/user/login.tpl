<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理画面</title>
</head>
<body onload="document.getElementById('email').focus()">
	<div align="center">
		<font size=5><b>管理画面</b></font>
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

	<div align="center">ログイン</div>
	<br />
	<form name="form_user_login" id="form_user_login" method="POST" action="">
		<input type="hidden" name="action_user_loginDo" id="action_user_loginDo" value="dummy" />
		<input type="hidden" name="function" id="function" value="{$form.function}" />
		{uniqid}
		<div align="center">
			<table>
				<tr>
					<td colspan=3 align="left">Eメール、パスワードを入力してください。</td>
				</tr>
				<tr>
					<td align="left">Eメール</td>
					<td>:</td>
					<td align="left"><input type="text" name="email" id="email" value="{$form.email}"  maxlength="28" style="width:200px" /></td>
				</tr>
				<tr>
					<td align="left">パスワード</td>
					<td>:</td>
					<td align="left"><input type="password" name="password" id="password" value="" maxlength="8" style="width:200px;" /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" value=" 実  行 " /><br /><br /><br /><br /></td>
				</tr>
			</table>
		</div>
		<div align="center">
			<table>
				<tr>
					<td align="left">新規登録の方は<a href="?action_user_userRegist=true">こちら</a><br /><br /><br /><br /></td>
				</tr>
				<tr>
					<td align="left">パスワード忘れた方は<a href="http://www.yahoo.com">こちら</a><br /><br /><br /><br /></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
