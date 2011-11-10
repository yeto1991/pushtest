<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="">

<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<title>My展示会一覧 - 世界の見本市・展示会 -ジェトロ</title>
<script type="text/javascript" src="/js/jquery.js"></script>
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}
<script type="text/javascript">
<!--
{literal}
	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/header.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/footer.html");
	});

	$(function(){
		$("#include_contact_us").load("http://localhost/jmesse/www/contact_us.html");
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
		action.name = 'action_user_fairListDel';
		action.id = 'action_user_fairListDel';
		action.value = 'dummy';
		document.getElementById('form_user_fairList').appendChild(action);
		document.getElementById('form_user_fairList').submit();
	}
{/literal}
-->
</script>
</head>

<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/database/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/database/j-messe/tradefair/">世界の見本市・展示会</a></li>
			<li><a href="/database/j-messe/tradefair/">個人メニュー</a></li>
			<li>My展示会一覧</li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<div class="area">
			<!-- left -->
			<div id="left">
				<div class="bgbox_set">
					<p id="title"><a href="/j-messe/">見本市・展示会データベース</a></p>
					<div class="bgbox_base">
						<div class="bgbox_in">
							<div class="submenu no_border">
								<ul class="navi">
									<li class="lv01_title"><a href="/j-messe/tradefair/industry/">業種別に見る</a></li>
									<li class="lv01_title"><a href="/j-messe/tradefair/country/">開催地別に見る</a></li>
									<li class="lv01_title"><a href="/j-messe/tradefair/">詳細検索</a></li>
									<li class="lv01_title"><a href="/j-messe/new_fair/">新着見本市</a></li>
									<li class="lv01_title"><a href="/j-messe/ranking/">月間ランキング</a></li>
								</ul>
								<ul class="navi">
									<li class="lv01_label">出展お役立ち情報</li>
									<li class="lv02_title"><a href="/j-messe/w-info/">見本市レポート</a></li>
									<li class="lv02_title"><a href="/services/tradefair/">出展支援</a></li>
									<li class="lv02_title"><a href="/j-messe/center/">世界の展示会場</a></li>
									<li class="lv02_title"><a href="/j-messe/business/">世界の見本市ビジネス動向</a></li>
								</ul>
								<ul class="navi no_border">
									<li class="lv01_label">出展者向け</li>
									<li class="lv02_title"><a href="/j-messe/registration/">見本市登録</a></li>
									<li class="lv02_title on"><a href="/j-messe/user/">ユーザー登録・修正</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="sub_inquiry">
					<div class="bgbox_set">
						<dl class="frame_beige">
							<dt>お問い合わせ<br />ご意見・ご感想</dt>
							<dd>ジェトロ展示事業課<br />（TEL:03-3582-5541）<br />
								<a href="javascript:jetro_open_win600('https://www.jetro.go.jp/form/fm/faa/inquiry_j');" class="icon_arrow">お問い合わせ</a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
			<!-- /left -->

			<!-- center -->
			<div id="center">
				<div id="main">
					<div class="bgbox_set">
						<div class="bgbox_base">
							<div class="h1"><h1>見本市・展示会データベース</h1></div>
							<div class="h2"><h2>My展示会一覧</h2></div>
							<div class="in_main">
								{if $app.my_fair_info_list_count != "0"}
								<p>・詳細を確認したい場合は、見本市名リンクをクリックしてください。<br />・削除する場合は、チェックを入れて削除ボタンをクリックしてください。<br /><br />
								{/if}
								<form name="form_user_fairList" id="form_user_fairList" method="post" action="">
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
											<td><a href="{$config.url}?action_user_fairDetail=true&mode=d&mihon_no={$app.my_fair_info_list[it].mihon_no}"><font size="2">{$app.my_fair_info_list[it].fair_title_jp}</font></a></td>
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
						</div>
					</div>
				</div>
				<p class="totop">
					<a href="javascript:window.open('{$config.url}?action_user_fairList=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					<a href="javascript:window.scrollTo(0, 0);"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a>
				</p>
			</div>
			<!-- /center -->
		</div>
	</div>
	<!-- /contents -->

	<!-- footer -->
	<div id="include_footer"></div>
	<!-- /footer -->
</body>
</html>