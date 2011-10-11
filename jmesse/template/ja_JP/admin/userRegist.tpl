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

	{* エラー表示 *}
	{if count($errors)}
	<ul>
		{foreach from=$errors item=error}
		<li><font color="#ff0000">{$error}</font></li>
		{/foreach}
	</ul>
	{/if}

	<div align="center">ユーザ新規登録</div>
	<center>
		<table>
			<tr>
				<td colspan=2>
					<form name="form_admin_userRegist" id="form_admin_userRegist" method="POST" action="">
					<input type="hidden" name="action_admin_userRegistDo" id="action_admin_userRegistDo" value="dummy" />
					<div align="left">
						<input type="button" value="前画面に戻る" onClick="history.back()"><br><br>
						<font color="#CC3333">●</font>印は必須入力項目です。<br> ユーザIDは半角英数字かつ8文字以上16文字以内、<br>パスワードは半角英数字かつ4文字以上8文字以内で入力してください。<br>
					</div>
						<table border=1>
							<tr>
								<th nowrap style=text-align:left>ユーザID<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="userId" id="userId" size=50 value="{$form.userId}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>パスワード<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="password" id="password" size=50 value="{$form.password}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>会社名<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="companyNm" id="companyNm" size=50 value="{$form.companyNm}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>部署名</th>
								<td nowrap style=text-align:left><input type="text" name="divisionDeptNm" id="divisionDeptNm" size=50 value="{$form.divisionDeptNm}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>氏名<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="userNm" id="userNm" size=50 value="{$form.userNm}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>性別<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<td>
												<input type="radio" name="genderCd" id="genderCd" value="0" {if $form.genderCd == "0"} checked {/if}>男性
												<input type="radio" name="genderCd" id="genderCd" value="1" {if $form.genderCd == "1"} checked {/if}>女性
												<input type="radio" name="genderCd" id="genderCd" value="2" {if $form.genderCd != "0" && $form.genderCd != "1"} checked {/if}>不明
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>Eメール<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="email" id="email" size=50 value="{$form.email}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>郵便番号</th>
								<td nowrap style=text-align:left><input type="text" name="postCode" id="postCode" size=50 value="{$form.postCode}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>住所<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="address" id="address" size=50 value="{$form.address}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>TEL<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="tel" id="tel" size=50 value="{$form.tel}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>FAX</th>
								<td nowrap style=text-align:left><input type="text" name="fax" id="fax" size=50 value="{$form.fax}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>URL</th>
								<td nowrap style=text-align:left><input type="text" name="url" id="url" size=50 value="{$form.url}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>ユーザ使用言語</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="radio" name="useLanguageCd" id="useLanguageCd" value="0" {if $form.useLanguageCd != "1"} checked {/if}>日本語
											<input type="radio" name="useLanguageCd" id="useLanguageCd" value="1" {if $form.useLanguageCd == "1"} checked {/if}>英語
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>登録結果通知</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="radio" name="registResultNoticeCd" id="registResultNoticeCd" value="0" {if $form.registResultNoticeCd == "0"} checked {/if}>メール送信する
											<input type="radio" name="registResultNoticeCd" id="registResultNoticeCd" value="1" {if $form.registResultNoticeCd != "0"} checked {/if}>メール送信しない
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>権限付与<font color="#CC3333"></font></th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<input type="checkbox" name="authGen" id="authGen" value="1" {if $form.authGen == "1"} checked {/if}>一般
											<input type="checkbox" name="authUser" id="authUser" value="1" {if $form.authUser == "1"} checked {/if}>ユーザ管理
											<input type="checkbox" name="authFair" id="authFair" value="1" {if $form.authFair == "1"} checked {/if}>展示会管理
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>秘密の質問<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left>
									<select name="secretQuestionCd" id="secretQuestionCd">
										<option value="">...</option>
										{section name=it loop=$app.secretQuestionCd}
											<option value="{$app.secretQuestionCd[it].kbn_2}" {if $app.secretQuestionCd[it].kbn_2 ==  $form.secretQuestionCd} selected {/if}>
												{$app.secretQuestionCd[it].discription_jp}
											</option>
										{/section}
									</select>
								</td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>秘密の質問の答え<font color="#CC3333">●</font></th>
								<td nowrap style=text-align:left><input type="text" name="secretQuestionAnswer" id="secretQuestionAnswer" size=50 value="{$form.secretQuestionAnswer}"></td>
							</tr>
							<tr>
								<th nowrap style=text-align:left>ID・パスワード通知メール</th>
								<td nowrap style=text-align:left>
									<table border=0>
										<tr>
											<td>
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="0" {if $form.idpassNoticeCd == "0"} checked {/if}>日本語で送信
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="1" {if $form.idpassNoticeCd == "1"} checked {/if}>英語で送信
												<input type="radio" name="idpassNoticeCd" id="idpassNoticeCd" value="2" {if $form.genderCd != "0" && $form.genderCd != "1"} checked {/if}>変更しない
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
				<td><div align="left"><input type="submit" value="登録"></div></td>
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
