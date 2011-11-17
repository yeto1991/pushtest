<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />

{if ('' == $form.mode) || ('e' == $form.mode)}
<title>Fair Registration - Online Trade Fair Database (J-messe) - JETRO</title>
{elseif ('c' == $form.mode)}
<title>User Editing - Online Trade Fair Database (J-messe) - JETRO</title>
{else}
<title>User Detail - Online Trade Fair Database (J-messe) - JETRO</title>
{/if}

<!--テスト用-->
<base href="http://produce.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="{$config.url}/js/jquery/jquery.tools.min.js"></script>
<script type="text/javascript" src="/j-messe/js/j-messe-form.js" charset="utf-8"></script>
<link href="/css/en/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<!--以下のCSSは最終的に削除します-->
<link href="/css/en/parts/newmodule.css" rel="stylesheet" type="text/css" media="all" />
<!--/-->

<script type="text/javascript">
<!--
{literal}

	function init(select_language_info, mode) {
		if ('2' == select_language_info) {
			var div = $("#engform").removeClass("regist_english");
		}

		// Changeモードと詳細表示以外では重複がある場合警告
		if ('c' != mode && 'd' != mode && 'p' != mode) {
			var msg = '';
	{/literal}
			{section name=it loop=$app.duplication_list}
			msg += "　・{$app.duplication_list[it].fair_title_en}\n";
			{/section}
	{literal}
			if ('' != msg) {
				msg = "Please confirm this fair.(This fair's Date,Location and Industry is overlap.)\n\n" + msg;
				window.alert(msg);
			}
		}
	}
	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/enHeader.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/enFooter.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/enLeft_menu.html");
	});

	function fair_delete(url, mihon_no) {
		if (window.confirm('Do you delete the fair?')) {
			document.location.href = url + '?action_user_enFairDel=true&mihon_no=' + mihon_no;
		}
	}

{/literal}
//-->
</script>
</head>

<body class="layout-LC highlight-database j-messe" onload="init('{$form.select_language_info}', '{$from.mode}')">
	<!-- header -->
	<div id="include_header"></div>
	<!-- /header -->
	<!-- bread -->
	<div id="bread">
		<ul class="clearfix">
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">Business Opportunities</a></li>
			<li><a href="/en/j-messe/">Online Trade Fair Database (J-messe)</a></li>
			<li><a href="/en/j-messe/tradefair/">Trade Fairs held in Japan and the World</a></li>
			<li><a href="/database/j-messe/tradefair/">My Menu</a></li>
			{if ('' == $form.mode) || ('e' == $form.mode)}
			<li><a href="/database/j-messe/tradefair/">Fair Registration(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Registration(step2)</a></li>
			<li>Fair Registration Confirm</li>
			{elseif ('c' == $form.mode)}
			<li><a href="/database/j-messe/tradefair/">Fair Editing(step1)</a></li>
			<li><a href="/database/j-messe/tradefair/">Fair Editing(step2)</a></li>
			<li>Fair Editing Confirm</li>
			{else}
			<li>Fair Detail</li>
			{/if}
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">
		<!-- main -->
		<div id="main">
			<h1>Online Trade Fair Database (J-messe)</h1>
			<div class="h2">
{*
$form.mode
''  : 新規登録モードStep.3 → 確認画面 (→ 登録)
'c' : 修正モードStep.3     → 確認画面 (→ 更新)
'd' : My展示会一覧         → 詳細表示 (→ 修正モードStep.1)
'e' : 修正登録モードStep.3 → 確認画面 (→ 登録)
'p' : 修正登録一覧         → 詳細表示 (→ 修正登録モードStep.1)
*}
				{if ('' == $form.mode) || ('e' == $form.mode)}
				<h2>Fair Registration</h2>
				{elseif ('c' == $form.mode)}
				<h2>Fair Editing</h2>
				{else}
				<h2>Fair Detail</h2>
				{/if}
			</div>
			<form name="form_user_enFairDetail" id="form_user_enFairDetail" method="post" action="" >
				{uniqid}
				{if ('d' == $form.mode)}
				<input type="hidden" name="action_user_enFairChangeStep1" id="action_user_enFairChangeStep1" value="dummy" />
				<input type="hidden" name="mode" id="mode" value="c" />
				{elseif ('p' == $form.mode)}
				<input type="hidden" name="action_user_enFairChangeStep1" id="action_user_enFairChangeStep1" value="dummy" />
				<input type="hidden" name="mode" id="mode" value="e" />
				{else}
				<input type="hidden" name="action_user_enFairRegistDone" id="action_user_enFairRegistDone" value="dummy" />
				<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
					{if ('c' == $form.mode || 'e' == $form.mode)}
				<input type="hidden" name="mihon_no" id="mihon_no" value="{$form.mihon_no}" />
					{/if}
				{/if}
				<input type="hidden" name="" mihon_no"" id="mihon_no" value="{$form.mihon_no}" />

				<div class="in_main">
					{if ('d' != $form.mode && 'p' != $form.mode)}
					<h3 class="img t_center">
						<img src="/j-messe/images/db/fair05.jpg" alt="見本市登録　ステップ4" />
					</h3>
					{/if}
					<p class="t_right">user：{$session.email}</p>

					{if ('' == $form.mode)}
					<p><strong><span class="red">Do you regist this fair?</span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="Yes" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('e' == $form.mode)}
					<p><strong><span class="red">Do you regist on a base the fair? </span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&mode=e&mihon_no={$form.mihon_no}&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="Yes" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('c' == $form.mode)}
					<p><strong><span class="red">Do you edit this fair?</span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&mode=c&mihon_no={$form.mihon_no}&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="はい" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('d' == $form.mode)}
					<p></p>
					<p>
						<a href="{$config.url}?action_user_enFairList=true"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						Delete<a href="javascript:fair_delete('{$config.url}', '{$form.mihon_no}')"><img src="/j-messe/images/db/btn-yes.gif" alt="Delete" class="over" /></a>
						Edit<a href="{$config.url}?action_user_enFairRegistStep1=true&mode=c&mihon_no={$form.mihon_no}"><img src="/j-messe/images/db/btn-yes.gif" alt="Edit" class="over" /></a>
					</p>
					{elseif ('p' == $form.mode)}
					<p></p>
					<p>
						<a href="{$config.url}?action_user_enFairCopyList=true"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						Delete<a href="javascript:fair_delete('{$config.url}', '{$form.mihon_no}')"><img src="/j-messe/images/db/btn-yes.gif" alt="Delete" class="over" /></a>
						Edit<a href="{$config.url}?action_user_enFairRegistStep1=true&mode=e&mihon_no={$form.mihon_no}"><img src="/j-messe/images/db/btn-yes.gif" alt="Edit" class="over" /></a>
					</p>
					{else}
					{/if}
					<div class="line_dot">
						<hr />
					</div>
				</div>
				<div class="in_main">
					<h4>basic information</h4>
					<table id="registration">
						<tr>
							<th class="item">Fair title</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.fair_title_en}</td>
						</tr>
						<tr>
							<th class="item">Abbreviated title</th>
							<th class="required"></th>
							<td>{$form.abbrev_title}</td>
						</tr>
						<tr>
							<th class="item">URL</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.fair_url}</td>
						</tr>
						<tr>
							<th class="item">Date</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.date_from_yyyy}/{$form.date_from_mm}/{$form.date_from_dd}～{$form.date_to_yyyy}/{$form.date_to_mm}/{$form.date_to_dd}</td>
						</tr>
						<tr>
							<th class="item">Frequency</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$app.frequency_name.discription_en}</td>
						</tr>
					</table>
					<h4>Industry and Exhibits</h4>
					<table id="registration">
						<tr>
							<th class="item">Main/Sub Industry</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>
								{$form.main_industory_name_1}/{$form.sub_industory_name_1}<br />
								{if ('' != $form.main_industory_name_2)}
								{$form.main_industory_name_2}/{$form.sub_industory_name_2}<br />
								{/if}
								{if ('' != $form.main_industory_name_3)}
								{$form.main_industory_name_3}/{$form.sub_industory_name_3}<br />
								{/if}
								{if ('' != $form.main_industory_name_4)}
								{$form.main_industory_name_4}/{$form.sub_industory_name_4}<br />
								{/if}
								{if ('' != $form.main_industory_name_5)}
								{$form.main_industory_name_5}/{$form.sub_industory_name_5}<br />
								{/if}
								{if ('' != $form.main_industory_name_6)}
								{$form.main_industory_name_6}/{$form.sub_industory_name_6}<br />
								{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Exhibits</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.exhibits_en|nl2br|replace:"&lt;br/&gt;":"<br/>"}</td>
						</tr>
					</table>
					<h4>Location and Venue</h4>
					<table id="registration">
						<tr>
							<th class="item">Location</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>
								{$app.region_name.discription_en}
								/ {$app.country_name.discription_en}
								{if ('' != $app.city_name)}
								/ {$app.city_name.discription_en}
								{/if}
								{if ('' != $form.other_city_en)}
								/ {$form.other_city_en}
								{/if}
							<br /></td>
						</tr>
						<tr>
							<th class="item">Venue</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.venue_en}</td>
						</tr>
						<tr>
							<th class="item">Net square meters</th>
							<th class="required"></th>
							<td>
							{if ('' != $form.gross_floor_area)}
								{$form.gross_floor_area} sqm（NET）
							{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Data verified</th>
							<th class="required"></th>
							<td>
							{if ('' != $form.spare_field1)}
								{$form.spare_field1}
							{/if}
							</td>
						</tr>
{*
						<tr>
							<th class="item">会場までの交通手段</th>
							<td>{$form.transportation_en}</td>
						</tr>
*}
						<tr>
							<th class="item">Open to</th>
							<th class="required"></th>
							<td>{$app.open_to_name.discription_en}</td>
						</tr>
						<tr>
							<th class="item">Admission/tickets</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>
								{if ('1' == $form.admission_ticket_1)}
								Free<br />
								{/if}
								{if ('1' == $form.admission_ticket_2)}
								Apply/register online<br />
								{/if}
								{if ('1' == $form.admission_ticket_3)}
								Contact organizer/agency in Japan<br />
								{/if}
								{if ('1' == $form.admission_ticket_4)}
								Available at event<br />
								{/if}
								{if ('1' == $form.admission_ticket_5)}
								Other ({$form.other_admission_ticket_en})<br />
								{/if}
							</td>
						</tr>
{*
						<tr>
							<th class="item">出展申込締切日</th>
							<td>
								{if ('' != $form.app_dead_yyyy)}
								{$form.app_dead_yyyy}年{$form.app_dead_mm}月{$form.app_dead_dd}日
								{/if}
							</td>
						</tr>
*}
					</table>
					<h4>last fair information</h4>
					<table id="registration">
						<tr>
							<th class="item">year</th>
							<th class="required"></th>
							<td>
								{if ('' != $form.year_of_the_trade_fair)}
								{$form.year_of_the_trade_fair} year
								{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Total number of visitors</th>
							<th class="required"></th>
							<td>
								{if ('' != $form.total_number_of_visitor || '' != $form.number_of_foreign_visitor)}
								{$form.total_number_of_visitor} (including {$form.number_of_foreign_visitor} foreign visitors)
								{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Total number of exhibitors</th>
							<th class="required"></th>
							<td>
								{if ('' != $form.total_number_of_exhibitors || '' != $form.number_of_foreign_exhibitors)}
								{$form.total_number_of_exhibitors} (including {$form.number_of_foreign_exhibitors} foreign exhibitors)
								{/if}
							</td>
						</tr>
						<tr>
							<th class="item">Net square meters</th>
							<th class="required"></th>
							<td>
								{if ('' != $form.net_square_meters)}
								{$form.net_square_meters} sqm (NET)
								{/if}
							</td>
						</tr>
					</table>
					<h4>PR・Catchphrase</h4>
					<table id="registration">
						<tr>
							<th class="item">Catchphrase</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>{$form.profile_en|nl2br|replace:"&lt;br/&gt;":"<br/>"}</td>
						</tr>
						<tr>
							<th class="item">PR</th>
							<th class="required"></th>
							<td>{$form.detailed_information_en|nl2br|replace:"&lt;br/&gt;":"<br/>"}</td>
						</tr>
						<tr>
							<th class="item">Photos</th>
							<th class="required"></th>
							<td>
								Photo(1)：{$form.photos_name_1}<br />
								Photo(2)：{$form.photos_name_2}<br />
								Photo(3)：{$form.photos_name_3}<br />
							</td>
						</tr>
						<tr>
							<th class="item">Search Keyword</th>
							<th class="required"></th>
							<td>{$form.keyword}</td>
						</tr>
					</table>
					<h4>Show Management</h4>
					<table id="registration">
						<tr>
							<th class="item">Show Management Name</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>
								{$form.organizer_en}
							</td>
						</tr>
						<tr>
							<th class="item">Show Management Information</th>
							<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
							<td>
								<strong>Address: </strong>{$form.organizer_addr}<br />
								<strong>Department: </strong>{$form.organizer_div}<br />
								<strong>Person: </strong>{$form.organizer_pers}<br />
								<strong>TEL: </strong>{$form.organizer_tel}<br />
								<strong>FAX: </strong>{$form.organizer_fax}<br />
								<strong>Email: </strong>{$form.organizer_email}<br />
							</td>
						</tr>
						<tr>
							<th class="item">Agency in Japan</th>
							<th class="required"></th>
							<td>
								<strong>Name: </strong>{$form.agency_in_japan_en}<br />
								<strong>Address: </strong>{$form.agency_in_japan_addr}<br />
								<strong>Department: </strong>{$form.agency_in_japan_div}<br />
								<strong>Person: </strong>{$form.agency_in_japan_pers}<br />
								<strong>TEL: </strong>{$form.agency_in_japan_tel}<br />
								<strong>FAX: </strong>{$form.agency_in_japan_fax}<br />
								<strong>Email: </strong>{$form.agency_in_japan_email}<br />
							</td>
						</tr>
					</table>
					<div class="line_dot">
						<hr />
					</div>
				</div>
				<div class="in_main">
					{if ('' == $form.mode)}
					<p><strong><span class="red">Do you regist this fair?</span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="Yes" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('e' == $form.mode)}
					<p><strong><span class="red">Do you regist on a base the fair? </span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&mode=e&mihon_no={$form.mihon_no}&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="Yes" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('c' == $form.mode)}
					<p><strong><span class="red">Do you edit this fair?</span></strong></p>
					<p>
						<a href="{$config.url}?action_user_enFairRegistStep2=true&mode=c&mihon_no={$form.mihon_no}&back=1"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						<input type="image" width="110" height="37" class="over" alt="はい" src="/j-messe/images/db/btn-yes.gif" />
					</p>
					{elseif ('d' == $form.mode)}
					<p></p>
					<p>
						<a href="{$config.url}?action_user_enFairList=true"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						Delete<a href="javascript:fair_delete('{$config.url}', '{$form.mihon_no}')"><img src="/j-messe/images/db/btn-yes.gif" alt="Delete" class="over" /></a>
						Edit<a href="{$config.url}?action_user_enFairRegistStep1=true&mode=c&mihon_no={$form.mihon_no}"><img src="/j-messe/images/db/btn-yes.gif" alt="Edit" class="over" /></a>
					</p>
					{elseif ('p' == $form.mode)}
					<p></p>
					<p>
						<a href="{$config.url}?action_user_enFairCopyList=true"><img width="110" height="37" class="over" alt="back" src="http://dev.jetro.go.jp/j-messe/images/db/btn-back.gif" /></a>
						Delete<a href="javascript:fair_delete('{$config.url}', '{$form.mihon_no}')"><img src="/j-messe/images/db/btn-yes.gif" alt="Delete" class="over" /></a>
						Edit<a href="{$config.url}?action_user_enFairRegistStep1=true&mode=e&mihon_no={$form.mihon_no}"><img src="/j-messe/images/db/btn-yes.gif" alt="Edit" class="over" /></a>
					</p>
					{else}
					{/if}
				</div>
{* テキストエリアの改行コード *}
			<textarea name="br" id="br" style="display:none;">

			</textarea>
			</form>
			<p class="totop">
				{if ('d' == $form.mode || 'p' == $form.mode)}
					<a href="javascript:window.open('{$config.url}?action_user_enFairDetail=true&mode={$form.mode}&mihon_no={$form.mihon_no}&print=1', 'print')"  target="print"><img src="/images/en/btn-print.gif" alt="Print" height="14" width="46" /></a>
				{/if}
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