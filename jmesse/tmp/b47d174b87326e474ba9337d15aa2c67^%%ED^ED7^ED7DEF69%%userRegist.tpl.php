<?php /* Smarty version 2.6.26, created on 2011-10-05 17:21:37
         compiled from admin/userRegist.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>見本市ユーザ管理</title>
<script language="javascript" src="/mihonuser_admin/mihonuser/CommonTips.js"></script>
</head>
<body>
	<table style="width:100%;">
	<tr>
	<td valign="top" style="width:200px;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Admin/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<td>
	<center>
		<font size=5><b>見本市ユーザ管理</b></font>
	</center>
	<hr>
	<div align="center">登録・編集画面</div>
	<center>
		<table>
			<tr>
				<td colspan=2>
					<form name="EditForm" method="POST" action="" target="updatedoc">
						<input type="hidden" name="FlowRoute" value=""> <input type="hidden" name="SaveAs" value="Normal"> <input type="hidden" name="ACL" value=""> <input type="hidden" name="Notice" value=""> <input type="hidden" name="FullTextIndex" value="no"> <input type="hidden" name="UpdateMode" value="input">
						<!-- 更新モード -->
						<input type="hidden" name="SecurityLevel" value="1">
						<!-- セキュリティレベル -->
						<input type="hidden" name="Field20" value="5">
						<!-- 処理フラグ -->
						<input type="hidden" name="Field15" value="1">
						<!-- PAT用ユーザID -->
						<input type="hidden" name="Field21" value="">
						<!-- PAT用E-mail -->
						<input type="hidden" name="Field22" value="">
						<!-- 予備フラグ等 -->
						<input type="hidden" name="Field17" value="0"> <input type="hidden" name="Field23" value="0"> <input type="hidden" name="Field24" value="0"> <input type="hidden" name="Field25" value="0"> <input type="hidden" name="Field26" value="0"> <input type="hidden" name="Field27" value="0"> <input type="hidden" name="Field28" value=" "> <input type="hidden" name="Field29" value=" "> <input type="hidden" name="Field30" value=" "> <input type="hidden" name="Field31" value=" "> <input type="hidden" name="Field32" value=" "> <font color="#CC3333">●</font>印は入力必須項目です。<br> ユーザIDは半角英小文字または数字8文字以上16文字以内、<br> パスワードは半角英小文字または数字4文字以上8文字以内で<br> 入力してください
						<table border=1>
							<tr>
								<th nowrap>ユーザID<font color="#CC3333">●</font></th>
								<td nowrap></td>
							</tr>
							</tr>
							<tr>
								<th nowrap>パスワード<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field4" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>会社名<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field5" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>部署</th>
								<td nowrap><input type="text" name="Field6" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>氏名<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field7" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>性別</th>
								<td nowrap><table border=0>
										<tr>
											<td></td>
										</tr>
									</table></td>
							</tr>
							<tr>
								<th nowrap>Eメール<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field9" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>郵便番号</th>
								<td nowrap><input type="text" name="Field10" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>住所<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field11" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>電話番号<font color="#CC3333">●</font></th>
								<td nowrap><input type="text" name="Field12" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>FAX</th>
								<td nowrap><input type="text" name="Field13" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>URL</th>
								<td nowrap><input type="text" name="Field14" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>ユーザ使用言語</th>
								<td nowrap><table border=0>
										<tr>
											<td></td>
										</tr>
									</table></td>
							</tr>
							<tr>
								<th nowrap>登録結果通知</th>
								<td nowrap><table border=0>
										<tr>
											<td></td>
										</tr>
									</table></td>
							</tr>
							<tr>
								<th nowrap>ユーザ権限</th>
								<td nowrap><table border=0>
										<tr>
											<td></td>
										</tr>
									</table></td>
							</tr>
							<!-- 2009-06-03 add start-->
							<tr>
								<th nowrap>秘密の質問</th>
								<td nowrap><input type="text" name="Field48" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>秘密の質問の答え</th>
								<td nowrap><input type="text" name="Field49" size=50 value=""></td>
							</tr>
							<tr>
								<th nowrap>ID・パスワード通知メール</th>
								<td nowrap><table border=0>
										<tr>
											<td><input type="hidden" name="Field47" value=""> <input type="radio" name="sField47" value="1">日本語で送信 <input type="radio" name="sField47" value="2">英語で送信 <input type="radio" name="sField47" value="0" checked>変更しない</td>
										</tr>
									</table></td>
							</tr>
							<!-- 2009-06-03 add end-->
						</table>
				</td>
			</tr>
			<tr>
				<td colspan=2>&nbsp</td>
			</tr>
			<tr>
				<td><input type="button" value="登録・更新" onClick="return onSubmit(this.form)"></td>
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