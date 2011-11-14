<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

<title>My展示会一覧 - Online Trade Fair Database (J-messe) - JETRO</title>

<!--テスト用-->
<base href="http://produce.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link href="/css/en/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}
<!--以下のCSSは最終的に削除します-->
<link href="/css/en/parts/newmodule.css" rel="stylesheet" type="text/css" media="all" />
<!--/-->

<script type="text/javascript">
<!--
{literal}

	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/enHeader.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/enFooter.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/enLeft_menu.html");
	});

	function del() {
		// 選択チェック
		var check_mihon_no = document.getElementsByName('check_mihon_no[]');
		var i = 0;
		var cnt = 0;
		for (i = 0; i < check_mihon_no.length; i++) {
			if (check_mihon_no[i].checked) {
				cnt++;
			}
		}
		if (0 == cnt) {
			window.alert('選択して下さい。');
			return;
		}

		if (!window.confirm('選択したデータを削除します。\nよろしいですか？')) {
			return;
		}
		action = document.createElement('input');
		action.type = 'hidden';
		action.name = 'action_user_enFairListDel';
		action.id = 'action_user_enFairListDel';
		action.value = 'dummy';
		document.getElementById('form_user_enFairList').appendChild(action);
		document.getElementById('form_user_enFairList').submit();
	}

{/literal}
//-->
</script>
</head>

<body class="layout-LC highlight-database j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
		<ul class="clearfix">
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			<li><a href="/en/j-messe/tradefair/">Trade Fairs held in Japan and the World</a></li>
			<li><a href="/database/j-messe/tradefair/">個人メニュー</a></li>
			<li>My展示会一覧</li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2"><h2>My展示会一覧</h2></div>
			<div class="in_main">
				{if $app.my_fair_info_list_count != "0"}
				<p>・詳細を確認したい場合は、見本市名リンクをクリックしてください。<br />・削除する場合は、チェックを入れて削除ボタンをクリックしてください。<br /><br />
				{/if}
				<form name="form_user_enFairList" id="form_user_enFairList" method="post" action="">
					<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
					<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
					{if $app.my_fair_info_list_count == "0"}
					<font size=2>展示会情報が存在しません。</font><br />
					{else}
					<font size=2>総件数：{$app.my_fair_info_list_count}件</font><br />
					{/if}
					<!-- 検索結果分 繰り返し処理 -->
					{section name=it loop=$app.my_fair_info_list}
					<table id="registration">
						<tr>
							<th class="item"><input type="checkbox" name="check_mihon_no[]" id="check_mihon_no[]" value="{$app.my_fair_info_list[it].mihon_no}"><font size="2">&nbsp;&nbsp;見本市名(日)</font></th>
							<td><a href="{$config.url}?action_user_enFairDetail=true&mode=d&mihon_no={$app.my_fair_info_list[it].mihon_no}"><font size="2">{$app.my_fair_info_list[it].fair_title_jp}</font></a></td>
						</tr>
						<tr>
							<th class="item"><font size="2">会期</font></th>
							<td><font size="2">{$app.my_fair_info_list[it].date_from_yyyy}年{$app.my_fair_info_list[it].date_from_mm}月{$app.my_fair_info_list[it].date_from_dd}日～{$app.my_fair_info_list[it].date_to_yyyy}年{$app.my_fair_info_list[it].date_to_mm}月{$app.my_fair_info_list[it].date_to_dd}日</font></td>
						</tr>
						<tr>
							<th class="item"><font size="2">開催地</font></th>
							<td><font size="2">{$app.my_fair_info_list[it].region_name}&nbsp;/&nbsp;{$app.my_fair_info_list[it].country_name}&nbsp;/&nbsp;{if $app.my_fair_info_list[it].city_name == ""}その他{else}{$app.my_fair_info_list[it].city_name}{/if}</font></td>
						</tr>
						<tr>
							<th class="item"><font size="2">業種</font></th>
							<td><font size="2">
								{$app.my_fair_info_list[it].main_indust_name1}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name1}
								{if $app.my_fair_info_list[it].main_indust_name2 != ""}
									&nbsp;,&nbsp;{$app.my_fair_info_list[it].main_indust_name2}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name2}
								{/if}
								{if $app.my_fair_info_list[it].main_indust_name3 != ""}
									&nbsp;,&nbsp;{$app.my_fair_info_list[it].main_indust_name3}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name3}
								{/if}
								{if $app.my_fair_info_list[it].main_indust_name4 != ""}
									&nbsp;,&nbsp;{$app.my_fair_info_list[it].main_indust_name4}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name4}
								{/if}
								{if $app.my_fair_info_list[it].main_indust_name5 != ""}
									&nbsp;,&nbsp;{$app.my_fair_info_list[it].main_indust_name5}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name5}
								{/if}
								{if $app.my_fair_info_list[it].main_indust_name6 != ""}
									&nbsp;,&nbsp;{$app.my_fair_info_list[it].main_indust_name6}&nbsp;/&nbsp;{$app.my_fair_info_list[it].sub_indust_name6}
								{/if}
								</font>
							</td>
						</tr>
						<tr>
							<th class="item"><font size="2">出品物</font></th>
							<td><font size="2">{$app.my_fair_info_list[it].exhibits_jp|replace:'&lt;br/&gt;':'<br/>'}</font></td>
						</tr>
						<tr>
							<th class="item"><font size="2">承認ステータス</font></th>
							<td>
								<font size="2">
								{if $app.my_fair_info_list[it].confirm_flag == "0"}承認待ち{/if}
								{if $app.my_fair_info_list[it].confirm_flag == "1"}承認済み{/if}
								{if $app.my_fair_info_list[it].confirm_flag == "2"}否認{/if}
								</font>
							</td>
						</tr>
						<tr>
							<th class="item"><font size="2">更新日</font></th>
							<td><font size="2">{$app.my_fair_info_list[it].update_date}</font></td>
						</tr>
					</table>
					{/section}
					<!-- navi area-->
					{if $app.my_fair_info_list_count != "0"}
					<table width="100%">
						<tr>
							<td><input type="button" value="削除" onclick="del()" /></td>
						</tr>
					</table>
					{/if}
				</form>
				<div class="line_dot"><hr /></div>
				<!-- /navi area-->
			</div>
			<p class="totop">
				<a href="javascript:window.open('{$config.url}?action_user_enFairList=true&print=1', 'print')" target="print"><img src="/images/en/btn-print.gif" alt="Print" height="14" width="46" /></a>
				<a href="javascript:window.scrollTo(0, 0);"><img src="/images/en/totop.gif" alt="Return to PAGETOP" width="103" height="14" /></a>
				</p>
		</div>
		<!-- /main -->
		<!-- submenu -->
		<div id="include_left_menu"></div>
		<!-- /submenu -->
	</div>
	<!-- /contents -->
	<!-- footer -->
	<div id="include_footer" ></div>
	<!-- /footer -->
</body>
</html>