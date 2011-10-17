<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META HTTP-EQUIV="Expires" CONTENT="0">
<script type="text/javascript">
{literal}
<!--
-->
{/literal}
</script>
<title>ユーザ管理</title>
</head>
<body>
<form name="form_admin_userList" id="form_admin_userList" method="POST" action=""  enctype="multipart/form-data">
	<table style="width:100%;">
		<tr>
			<td valign="top" style="width:150px;">{include file="admin/menu.tpl"}</td>
			<td>
				<div style="text-align:center">
					<font size=5><b>ユーザ管理</b></font>
				</div>
				<hr>
				<div align="center">ユーザ一覧</div>
				<table style="width:100%;">
					<tr>
						<td>
							<input type="button" name="" value="ダウンロード" style="height:20px;"/>
						</td>
						<td align="right">
							<input type="button" name="" value="次の一覧" style="height:20px;"/>
						</td>
					<tr>
					<tr>
						<td colspan=2><font size=2>199999999999999～100222222222222222件目／{$app.user_search_count}ヒット</font></td>
					</tr>
					<tr>
						<td colspan=2>
							<table  border=1 style="width:100%; table-layout:fixed">
								 <tr>
									 <th width=4% rowspan=2><font size=2>状態</font></th>
									 <th width=20% rowspan=2><font size=2>Eメール</font></th>
									 <th width=9% colspan=3><font size=2>権限</font></th>
									 <th rowspan=2><font size=2>会社名</font></th>
									 <th width=15% rowspan=2><font size=2>部署名</font></th>
									 <th width=15% rowspan=2><font size=2>氏名</font></th>
									 <th width=10% rowspan=2><font size=2>更新</font></th>
								</tr>
								<tr>
									 <th><font size=2>般</font></th>
									 <th><font size=2>ユ</font></th>
									 <th><font size=2>展</font></th>
								</tr>
								<!-- 検索結果分 繰り返し処理 -->
								{section name=it loop=$app.user_search_info_list}
								<tr>
									<td><font size=2>?</font></td>
									<td><font size=2><a href="{$config.url}?action_admin_userDetail=true&user_id={$app.user_search_info_list[it].user_id}">{$app.user_search_info_list[it].email}</a></font></td>
									<td><font size=2>
										{if ($app.user_search_info_list[it].auth_gen == '1')}
											○
										{/if}
										{if ($app.user_search_info_list[it].auth_gen != '1')}
											×
										{/if}
										</font>
									</td>
									<td><font size=2>
										{if ($app.user_search_info_list[it].auth_user == '1')}
											○
										{/if}
										{if ($app.user_search_info_list[it].auth_user != '1')}
											×
										{/if}
										</font>
									</td>
									<td><font size=2>
										{if ($app.user_search_info_list[it].auth_fair == '1')}
											○
										{/if}
										{if ($app.user_search_info_list[it].auth_fair != '1')}
											×
										{/if}
										</font>
									</td>
									<td><font size=2>{$app.user_search_info_list[it].company_nm}</font></td>
									<td><font size=2>{$app.user_search_info_list[it].division_dept_nm}</font></td>
									<td><font size=2>{$app.user_search_info_list[it].user_nm}</font></td>
									<td><font size=2>
										{if ($app.user_search_info_list[it].update_date != null)}
											{$app.user_search_info_list[it].update_date}
										{/if}
										{if ($app.user_search_info_list[it].update_date == null)}
											{$app.user_search_info_list[it].regist_date}
										{/if}
										</font>
									</td>
								</tr>
								{/section}
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>

