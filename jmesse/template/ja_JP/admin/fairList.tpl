<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>見本市ＤＢ　管理者用</title>
</head>
<body>
  <form name="form_fairList" method="POST" action="">
	<table style="width: 100%;">
		<tr>
			<td valign="top" style="width: 200px;">{include file="admin/menu.tpl"}</td>
			<td valign="top">





   <div align="center"><font size="5"><b>見本市ＤＢ　管理者用</b></font></div>
   <hr>
   <div align="center">一覧画面</div>

   <input type="button"                    value="前の一覧"     onClick="" />
   <input type="button"                    value="次の一覧"     onClick="" />
   <input type="button" name="$GetList"    value="ダウンロード" onClick="" />
   <input type="button" name="$Query"      value="検索画面"     onClick="" />
   <input type="button" name="$AList"      value="集計画面"     onClick="" />
   <input type="button" name="$Docclass"   value="メニュー画面">
  <p>
   <input type="button" name="$DeleteDoc"  value="削除"         onClick="" />
   <input type="button" name="$List"       value="最新情報"     onClick="" />
   <input type="hidden" name="Refresh"     value="">
   <small> 選択した文書に対して処理を実行します。</small>
  <hr>
432 件中、1 から 100 件を表示

  <table border="1">
   <tr>
    <th nowrap>選択<input type="hidden" name="DocumentNo" value=""></th>
    <th nowrap>状態</th>
    <th nowrap>見本市番号</th>
    <th nowrap>見本市名<input type="hidden" name="DocTitle" value=""></th>
    <th nowrap>見本市略称</th>
    <th nowrap>会期</th>
    <th nowrap>開催地</th>
    <th nowrap>ユーザID</th>
    <th nowrap>申請年月日</th>
    <th nowrap>登録日(承認日)</th>
    <th nowrap>否認コメント</th>
   </tr>

   <tr>
    <td align="center">
     <input type="checkbox" name="DocumentNo" value="14326">
    </td>
    <td>
    </td>
    <td align="right">
    </td>
    <td>
     <input type="hidden" name="DocTitle" value=" ">
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
   </tr>

   <tr>
    <td align="center">
     <input type="checkbox" name="DocumentNo" value="16906">
    </td>
    <td>
    </td>
    <td align="right">
    </td>
    <td>
     <input type="hidden" name="DocTitle" value=" ">
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
   </tr>

   <tr>
    <td align="center">
     <input type="checkbox" name="DocumentNo" value="52800">
    </td>
    <td>
    </td>
    <td align="right">
    </td>
    <td>
     <input type="hidden" name="DocTitle" value=" ">
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
   </tr>

   <tr>
    <td align="center">
     <input type="checkbox" name="DocumentNo" value="56885">
    </td>
    <td>
    </td>
    <td align="right">
    </td>
    <td>
     <input type="hidden" name="DocTitle" value=" ">
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
   </tr>


  </table>

432 件中、1 から 100 件を表示

  <!-- /form -->
 <hr>
  <!-- form method="POST" action="/cgi-bin/mw_mihon_adminstart/list|1|mihonadmin2|eksEPXjByBeK|7998|0|0|33277|2|432|0,3,0|14326,1|120237,100" -->
   [現在のソート条件]<br><dd>
   ソート１：見本市名(日),昇順<br><dd>
   ソート２：@文書番号,昇順<br><dd>
   ソート３：@文書番号,昇順<br><dd>
   ソート４：@文書番号,昇順<br><dd>
   ソート５：@文書番号,昇順<br>
  <dd>
   <input type="button"	name="$List"       value="ソート">
   <input type="reset"	                   value="リセット">

  <hr>

   <input type="button" name="$DeleteDoc"  value="削除"     onClick="javascript:return doDeleteDoc( document.ListForm );">
   <input type="button" name="$List"       value="最新情報" onClick="javascript:setRefresh( document.ListForm );">

   <p>

   <!-- input type="button"                    value="前の一覧" onClick="javascript:doBackList( 432, 1, 100 );" -->
   <input type="button"                    value="次の一覧"     onClick="javascript:return doNextList( 432, 1, 100 )";>
   <input type="button" name="$GetList"    value="ダウンロード" onClick="javascript:doGetList( document.ListForm, '/mihon_admin' );">
   <input type="button" name="$Query"      value="検索画面"     onClick="this.form.target='_top'">
   <input type="button" name="$Docclass"   value="メニュー画面">
  </form>
 </body>
</html>






































			</td>
		</tr>
	</table>
</body>
</html>
