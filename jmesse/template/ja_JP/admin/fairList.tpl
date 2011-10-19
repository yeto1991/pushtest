<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>見本市ＤＢ 管理者用</title>
</head>
<body>
	<form name="form_fairList" method="POST" action="">
		<table style="width: 100%;">
			<tr>
				<td valign="top" style="width: 200px;">{include file="admin/menu.tpl"}</td>
				<td valign="top">





					<div align="center">
						<font size="5"><b>見本市ＤＢ 管理者用</b></font>
					</div>
					<hr>
					<div align="center">一覧画面</div>
						<input type="button" value="前の一覧" onClick="" />
						<input type="button" value="次の一覧" onClick="" />
						<input type="button" name="$GetList" value="ダウンロード" onClick="document.location.href='{$config.url}?action_admin_fairCsvDownload=true'" />
						<input type="button" name="$Query" value="検索画面" onClick="" />
						<input type="button" name="$AList" value="集計画面" onClick="" />
					<p>
						<input type="button" name="$DeleteDoc" value="削除" onClick="" />
						<input type="button" name="$List" value="最新情報" onClick="" />
						<input type="hidden" name="Refresh" value="">
						<small> 選択した文書に対して処理を実行します。</small>
					<hr> 432 件中、1 から 100 件を表示

					<table border="1">
						<tr>
							<th nowrap>選択</th>
							<th nowrap>状態</th>
							<th nowrap>見本市番号</th>
							<th nowrap>見本市名</th>
							<th nowrap>見本市略称</th>
							<th nowrap>会期</th>
							<th nowrap>開催地</th>
							<th nowrap>Eメール</th>
							<th nowrap>申請年月日</th>
							<th nowrap>登録日(承認日)</th>
							<th nowrap>否認コメント</th>
						</tr>

						{section name=it loop=$app.jm_fair_list}
						<tr>
							<td align="center"><input type="checkbox" name="mihon_no[]" id="mihon_no[]" value="{$app.jm_fair_list[it].mihon_no}"></td>
							<td></td>
							<td align="right">{$app.jm_fair_list[it].mihon_no}</td>
							<td><a href="{$config.url}?action_admin_fairDetail=true&mihon_no={$app.jm_fair_list[it].mihon_no}">{$app.jm_fair_list[it].fair_title_jp}</a></td>
							<td><a href="{$config.url}?action_admin_fairDetail=true&mihon_no={$app.jm_fair_list[it].mihon_no}">{$app.jm_fair_list[it].abbrev_title}</a></td>
							<td>{$app.jm_fair_list[it].date_from_yyyy}/{$app.jm_fair_list[it].date_from_mm}/{$app.jm_fair_list[it].date_from_dd} - {$app.jm_fair_list[it].date_to_yyyy}/{$app.jm_fair_list[it].date_to_mm}/{$app.jm_fair_list[it].date_to_dd}</td>
							<td>{$app.jm_fair_list[it].region_name}/{$app.jm_fair_list[it].country_name}/{$app.jm_fair_list[it].city_name}/{$app.jm_fair_list[it].other_city}</td>
							<td>{$app.jm_fair_list[it].email}</td>
							<td>{$app.jm_fair_list[it].date_of_application}</td>
							<td>{$app.jm_fair_list[it].date_of_registration}</td>
							<td>{$app.jm_fair_list[it].negate_comment}</td>
						</tr>
						{/section}

					</table> 432 件中、1 から 100 件を表示 <!-- /form -->
					<hr>
					 [現在のソート条件]<br>
				<dd>
						ソート１：見本市名(日),昇順<br>
					<dd>
						ソート２：@文書番号,昇順<br>
					<dd>
						ソート３：@文書番号,昇順<br>
					<dd>
						ソート４：@文書番号,昇順<br>
					<dd>
						ソート５：@文書番号,昇順<br>
					<dd>
						<input type="button" name="$List" value="ソート"> <input type="reset" value="リセット">

						<hr>

						<input type="button" name="$DeleteDoc" value="削除" onClick="javascript:return doDeleteDoc( document.ListForm );"> <input type="button" name="$List" value="最新情報" onClick="javascript:setRefresh( document.ListForm );">

						<p>

							<!-- input type="button"                    value="前の一覧" onClick="javascript:doBackList( 432, 1, 100 );" -->
							<input type="button" value="次の一覧" onClick="javascript:return doNextList( 432, 1, 100 )";> <input type="button" name="$GetList" value="ダウンロード" onClick="javascript:doGetList( document.ListForm, '/mihon_admin' );"> <input type="button" name="$Query" value="検索画面" onClick="this.form.target='_top'"> <input type="button" name="$Docclass" value="メニュー画面">
						</form>
</body>
</html>






































</td>
</tr>
</table>
</body>
</html>
