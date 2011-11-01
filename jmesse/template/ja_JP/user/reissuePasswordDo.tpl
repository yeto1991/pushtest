<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>パスワード再発行画面</title>
</head>
<body onload="document.getElementById('email').focus()">
	<div align="center">
		<font size=5><b>パスワード再発行完了画面</b></font>
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

	<div align="center">パスワード再発行完了</div>
	<br />
	<form name="form_user_reissuePassword" id="form_user_reissuePassword" method="post" action="">
		<input type="hidden" name="action_user_reissuePasswordDo" id="action_user_reissuePasswordDo" value="dummy" />
		{uniqid}
		<div align="center">
			<table>
				<tr>
					<td align="left">パスワード通知メールを送信致しました。</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
