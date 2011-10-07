<!doctype html>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=UTF-8">
<title>管理画面</title>
</head>
<body>
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
	<form name="form_admin_login" id="form_admin_login" method="POST" action="">
		<input type="hidden" name="action_admin_loginDo" id="action_admin_loginDo" value="dummy" />
		{uniqid}
		<div align="center">
			<table>
				<tr>
					<td colspan=3 align="left">ID、Passwordを入力してください。</td>
				</tr>
				<tr>
					<td align="left">ID</td>
					<td>:</td>
					<td align="left"><input type="text" name="username" id="username" value="{$form.username}"  maxlength="28" style="width:200px" /></td>
				</tr>
				<tr>
					<td align="left">Password</td>
					<td>:</td>
					<td align="left"><input type="password" name="password" id="password" value="" maxlength="8" style="width:200px;" /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" value=" 実  行 " /></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
