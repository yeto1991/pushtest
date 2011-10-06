<!doctype html>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=UTF-8">
<title>見本市ユーザ管理</title>
</head>
<body>
	<center>
		<font size=5><b>見本市ユーザ・展示会管理</b></font>
	</center>
	<hr>

	<div align="center">ログイン画面</div>
	<form name="form_login" id="form_login" method="POST" action="">
		<input type="hidden" name="action_admin_loginDo" id="action_admin_loginDo" value="dummy" />
		<center>
			<table>
				<tr>
					<td colspan=2>ID、Passwordを入力してください。</td>
				</tr>
				<tr>
					<td>ID :</td>
					<td><input type="text" name="Username" id="Username" value="" size=28 maxlength=28></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="Password" id="Password" value="" size=8 maxlength=8></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value=" 実  行 "></td>
				</tr>

			</table>
		</center>
	</form>
</body>
</html>
