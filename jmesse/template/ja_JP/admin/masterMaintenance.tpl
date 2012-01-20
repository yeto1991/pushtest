<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<h1>JM_CODE_M 管理画面</h1>
<hr/>

<h2>検索</h2>
<form name="form_search" id="form_search" method="post" action="">
<input type="hidden" name="action_admin_masterMaintenance" id="action_admin_masterMaintenance" value="dummy" />
<input type="hidden" name="mode" id="mode" value="0" />
区分１：<input type="text" name="kbn_1" id="kbn_1" value="{$form.kbn_1}" size="3" maxlength="3"/>
区分２：<input type="text" name="kbn_2" id="kbn_2" value="{$form.kbn_2}" size="3" maxlength="3" />
区分３：<input type="text" name="kbn_3" id="kbn_3" value="{$form.kbn_3}" size="3" maxlength="3" />
区分４：<input type="text" name="kbn_4" id="kbn_4" value="{$form.kbn_4}" size="3" maxlength="3" />
<input type="submit" value="検索" />
</form>
区分１：
<table>
<tr><td>001</td><td>開催頻度</td></tr>
<tr><td>002</td><td>業種分類</td></tr>
<tr><td>003</td><td>開催地</td></tr>
<tr><td>004</td><td>入場資格</td></tr>
</table>

<hr/>

{if '1'==$app.mode}
<h2>更新</h2>
{elseif '2'==$app.mode}
<h2>新規登録</h2>
{/if}
<form name="form_regist" id="form_regist" method="post" action="">
<input type="hidden" name="action_admin_masterMaintenance" id="action_admin_masterMaintenance" value="dummy" />
<input type="hidden" name="mode" id="mode" value="{$app.mode}" />
<input type="hidden" name="kbn_1" id="kbn_1" value="{$form.kbn_1}" />
<input type="hidden" name="kbn_2" id="kbn_2" value="{$form.kbn_2}" />
<input type="hidden" name="kbn_3" id="kbn_3" value="{$form.kbn_3}" />
<input type="hidden" name="kbn_4" id="kbn_4" value="{$form.kbn_4}" />


{if '0'!=$app.mode  && ''!=$app.mode}
<table>
<tr>
<td>内容(日本語)</td><td>:</td><td><input type="text" name="discription_jp" id="discription_jp" value="{$form.discription_jp}" size="20" maxlength="255" />【255バイトまで】</td>
</tr>
<tr>
<td>内容(英語)</td><td>:</td><td><input type="text" name="discription_en" id="discription_en" value="{$form.discription_en}"  size="20" maxlength="255" />【255バイトまで】</td>
</tr>
<tr>
<td>表示コード</td><td>:</td><td><input type="text" name="disp_cd" id="disp_cd" value="{$form.disp_cd}" size="10" maxlength="10" />【10バイトまで】<br/>※区分1='003'(開催地)の場合、展示会一覧(業種別)の地域選択条件に表示する国を設定(0:非表示、1:表示)。</td>
</tr>
<tr>
<td>表示順</td><td>:</td><td><input type="text" name="disp_num" id="disp_num" value="{$form.disp_num}" size="5" maxlength="5" />【INT型】</td>
</tr>
<tr>
<td>予備1</td><td>:</td><td><input type="text" name="reserve_1" id="reserve_1" value="{$form.reserve_1}" size="10" maxlength="10" />【10バイトまで】<br/>※区分1='003'(開催地)の場合、ISO 3166-1 alpha-2：ラテン文字2文字による国名コードを設定。</td>
</tr>
<tr>
<td>予備2</td><td>:</td><td><input type="text" name="reserve_2" id="reserve_2" value="{$form.reserve_2}" size="10" maxlength="10" />【10バイトまで】</td>
</tr>
<tr>
<td>予備3</td><td>:</td><td><input type="text" name="reserve_3" id="reserve_3" value="{$form.reserve_3}" size="10" maxlength="10" />【10バイトまで】</td>
</tr>
<tr>
<td>予備4</td><td>:</td><td><input type="text" name="reserve_4" id="reserve_4" value="{$form.reserve_4}" size="20" maxlength="255" />【255バイトまで】<br/>※区分1='003'(開催地)の場合、国旗画像ファイル名を設定。</td>
</tr>
<tr>
<td>予備5</td><td>:</td><td><input type="text" name="reserve_5" id="reserve_5" value="{$form.reserve_5}" size="20" maxlength="255" />【255バイトまで】</td>
</tr>
<tr>
<td>予備6</td><td>:</td><td><input type="text" name="reserve_6" id="reserve_6" value="{$form.reserve_6}" size="20" maxlength="255" />【255バイトまで】</td>
</tr>
{if '1'==$app.mode}
<tr>
<td>削除</td><td>:</td><td><input type="checkbox" name="del" id="del" value="1" />※入力項目に関係なく物理削除する</td>
</tr>
{/if}
</table>

<p>※空欄はnullが設定されます。</p>

{if '1'==$app.mode}
<input type="submit" value="更新" />
{elseif '2'==$app.mode}
<input type="submit" value="登録" />
{/if}


{/if}
</form>

</head>
<body>
</body>
</html>
