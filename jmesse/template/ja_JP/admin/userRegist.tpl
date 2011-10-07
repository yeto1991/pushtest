<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ユーザ管理</title>
</head>
<body>
	<table style="width:100%;">
	<tr>
		<td valign="top" style="width:200px;">{include file="admin/menu.tpl"}</td>
		<td>
			<center>
				<font size=5><b>ユーザ管理</b></font>
			</center>
	<hr>
	<div align="center">登録・編集画面</div>
	<center>
		<table>
			<tr>
				<td colspan=2>
					<form name="form_admin_userRegist" id="form_admin_userRegist" method="POST" action="">
					<input type="hidden" name="action_admin_userRegistDo" id="action_admin_userRegistDo" value="dummy" />
					<div align="left">
						<input type="button" value="前画面に戻る"><br><br>
						<font color="#CC3333">●</font>印は必須入力項目です。<br> ユーザIDは半角英数字かつ8文字以上16文字以内、<br> パスワードは半角英数字かつ4文字以上8文字以内で<br> 入力してください。<br>
					</div>
						<table border=1>
							<tr>
								<th nowrap style=text-align:left>ユーザID<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="userId" id="userId" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>パスワード<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="password" id="password" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>会社名<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="companyNm" id="companyNm" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>部署名</th>
								<td nowrap style=text-align:left><input type="text" name="divisionDeptNm" id="divisionDeptNm" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>氏名<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="userNm" id="userNm" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>性別<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<td>
												<input type="radio" name="genderCd" id="genderCd" value="0" checked>男性
												<input type="radio" name="genderCd" id="genderCd" value="1">女性
												<input type="radio" name="genderCd" id="genderCd" value="2">不明
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>Eメール<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="email" id="email" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>郵便番号</th>
								<td nowrap style=text-align:left><input type="text" name="postCode" id="postCode" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>住所<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="address" id="address" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>TEL<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="tel" id="tel" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>FAX</th>
								<td nowrap style=text-align:left><input type="text" name="fax" id="fax" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>URL</th>
								<td nowrap style=text-align:left><input type="text" name="url" id="url" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>ユーザ使用言語</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="radio" name="useLanguageCd" id="useLanguageCd" value="0" checked>日本語
											<input type="radio" name="useLanguageCd" id="useLanguageCd" value="1">英語
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>登録結果通知</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="radio" name="registResultNoticeCd" id="registResultNoticeCd" value="0">メール送信する
											<input type="radio" name="registResultNoticeCd" id="registResultNoticeCd" value="1" checked>メール送信しない
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>ユーザ管理権限</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="radio" name="userAuthorityCd" id="userAuthorityCd" value="0" checked>権限なし
											<input type="radio" name="userAuthorityCd" id="userAuthorityCd" value="1">権限あり
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>秘密の質問</th>
								<td nowrap style=text-align:left>
									<select name="secretQuestionCd">
										<option value="0">コードマスタより取得し表示する。
									</select>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>秘密の質問の答え</th>
								<td nowrap style=text-align:left><input type="text" name="secretQuestionAnswer" id="secretQuestionAnswer" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>ID・パスワード通知メール</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<td>
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="0" checked>日本語で送信
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="1">英語で送信
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="2">変更しない
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
				</td>
			</tr>
			<tr>
				<td colspan=2>&nbsp</td>
			</tr>
			<tr>
				<td><input type="submit" value="登録・更新"></td>
				<td align=right></td>
			</tr>
		</table>
		</form>
		</center>
		</td>
	</tr>
	</table>
</body>
</html>
