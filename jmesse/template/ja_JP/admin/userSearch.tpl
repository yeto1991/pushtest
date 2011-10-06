<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>見本市ユーザ管理</title>
		<script language="javascript" src="/mihonuser_admin/mihonuser/CommonTips.js"></script>
</head>
<body>
	<table style="width:100%;">
		<tr>
			<td valign="top" style="width:200px;">{include file="admin/menu.tpl"}</td>
			<td>
				<center>
					<font size=5><b>見本市ユーザ管理</b></font>
				</center>
				<hr>
				<div align="center">検索画面</div>
				<center>
					<table border=0>
						<tr>
							<td>
								<input type="submit" name="$List" value="メニューに戻る">
							</td>
						</tr>
						<tr>
							<td>
								同じ項目に複数のキーワードを入力し検索する場合は、<br>半角スペースで区切るとAND検索ができます<br>
							</td>
						</tr>
						<tr>
							<td>
								<table border=1>
									<tr>
										<td nowrap>ユーザID</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>パスワード</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>会社名</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>部署名</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>部署名</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>氏名</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>性別</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>Eメール</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>郵便番号</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>TEL</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>FAX</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>URL</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>ユーザ使用言語</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>権限(一般)</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>権限(ユーザ管理)</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
									<tr>
										<td nowrap>権限(展示会管理)</td>
										<td nowrap><input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致<option value="2">不一致<option value="3">前一致<option value="4">前不一<option selected value="5">含む<option value="6">含まず</select></td>
									</tr>
								  </table>
							</td>
						</tr>
						<tr>
							<td>
								<br><input type="submit" name="$EditDoc" value="検索実行">
							</td>
						<tr>
					</table>
		  		</center>
			</td>
		</tr>
	</table>
</body>
</html>
