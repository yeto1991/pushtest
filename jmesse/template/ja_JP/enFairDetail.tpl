<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、{$app.fair_detail.exhibits_en|replace:'&lt;br/&gt;':''}, {$app.fair_detail.keyword}" />

<title>
{if ('' != $app.fair_detail.abbrev_title)}
{$app.fair_detail.abbrev_title} - {$app.fair_detail.fair_title_en} - Online Trade Fair Database (J-messe) - JETRO
{else}
{$app.fair_detail.fair_title_en} - Online Trade Fair Database (J-messe) - JETRO
{/if}
</title>

<!--テスト用-->
<base href="http://produce.jetro.go.jp" />
<!--/テスト用-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link href="/css/en/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css" rel="stylesheet" type="text/css" media="print" />
<!--以下のCSSは最終的に削除します-->
<link href="/css/en/parts/newmodule.css" rel="stylesheet" type="text/css" media="all" />
<!--/-->
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}
<link rel="stylesheet" href="/css/js/prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script src="/j-messe/js/j-messe.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{$config.url_pub}js/j-messe_enInclude_pub.js"></script>
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
			{if (''!= $app.fair_detail.abbrev_title)}
			<li>{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_en})</li>
			{else}
			<li>{$app.fair_detail.fair_title_en}</li>
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
				<h2>Trade Fairs held in Japan and the World</h2>
			</div>
			<div class="in_main">
				{if ('' != $app.fair_detail.abbrev_title)}
				<div class="h3">
				<h3>{$app.fair_detail.abbrev_title}<br/>
				<span>{$app.fair_detail.fair_title_en}</span></h3>
				</div>
				{else}
				<h3>{$app.fair_detail.fair_title_en}</h3>
				{/if}

				<p>{$app.fair_detail.profile_en|replace:"&lt;br/&gt;":"<br/>"}</p>
				{if ('' != $app.fair_detail.fair_url)}
				<p class="t_right">
					<a class="icon_arrow" target="_blank" href="{$app.fair_detail.fair_url}">officail site</a><img class="icon_external" alt="他のサイトへ" src="/images/jp/icon-external.gif">
				</p>
				{/if}
				<!-- left -->

				<!-- left -->
				{if ('' != $app.fair_detail.photos_1 || '' != $app.fair_detail.photos_2 || '' != $app.fair_detail.photos_3)}
				<div class="left" id="detail">
				{else}
				<div class="left" id="detail-noimg">
				{/if}
					<table class="detail">
						<tr>
							<th>Date</th>
							<td>{$app.fair_detail.date_from_format} to {$app.fair_detail.date_to_format}</td>
						</tr>
						<tr>
							<th>City / Country</th>
							<td>
								{if ('' != $app.fair_detail.flag_image)}
								<img src="{$config.url_pub}{$config.flag_path}{$app.fair_detail.flag_image}" style="vertical-align: middle;">
								{/if}
								{if ('' != $app.fair_detail.city_other_en)}
								{$app.fair_detail.city_other_en} /
								{/if}
								{if ('' != $app.fair_detail.city_name)}
								<a href="{$config.url_pub}?action_enFairList=true&type=v2&v_2={$app.fair_detail.region}&v_3={$app.fair_detail.country}&v_4={$app.fair_detail.city}">{$app.fair_detail.city_name}</a> /
								{/if}
								<a href="{$config.url_pub}?action_enFairList=true&type=v2&v_2={$app.fair_detail.region}&v_3={$app.fair_detail.country}">{$app.fair_detail.country_name}</a> /
								<a href="{$config.url_pub}?action_enFairList=true&type=v1&v_2={$app.fair_detail.region}">{$app.fair_detail.region_name}</a>
							</td>
						</tr>
						<tr>
							<th>Venue</th>
							<td>{$app.fair_detail.venue_en}<br />
								<div style="padding-left: 15px;">
								{if ('' != $app.fair_detail.gross_floor_area && 0 <$app.fair_detail.gross_floor_area)}
								Net square meters(net)：{$app.fair_detail.gross_floor_area|number_format} sqm<br />
								{/if}
{*
									{if ('' != $app.fair_detail.transportation_jp)}
									交通手段：{$app.fair_detail.transportation_jp}
									{/if}
*}
								</div>
							</td>
						</tr>
						<tr>
							<th>Exhibits</th>
							<td>{$app.fair_detail.exhibits_en|replace:"&lt;br/&gt;":"<br/>"}</td>
						</tr>
						<tr>
							<th>For Visitors</th>

							<td>
								Open to:{$app.fair_detail.open_to_name}<br />
								{if ('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3 || '1' == $app.fair_detail.admission_ticket_4 || '' != $app.fair_detail.other_admission_ticket_en)}
								Admission/tickets:
									{if ('1' == $app.fair_detail.admission_ticket_1)}
									Free
									{/if}
									{if ('1' == $app.fair_detail.admission_ticket_1 && '1' == $app.fair_detail.admission_ticket_2)}
									/
									{/if}
									{if ('1' == $app.fair_detail.admission_ticket_2)}
									Apply/register online
									{/if}
									{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2) && '1' == $app.fair_detail.admission_ticket_3)}
									/
									{/if}
									{if ('1' == $app.fair_detail.admission_ticket_3)}
									Contact organizer/agency in Japan
									{/if}
									{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3) && '1' == $app.fair_detail.admission_ticket_4)}
									/
									{/if}
									{if ('1' == $app.fair_detail.admission_ticket_4)}
									Available at event
									{/if}
									{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3 || '1' == $app.fair_detail.admission_ticket_4) && '' != $app.fair_detail.other_admission_ticket_en)}
									/
									{/if}
									{if ('' != $app.fair_detail.other_admission_ticket_en)}
									Other:{$app.fair_detail.other_admission_ticket_en}
									{/if}
								{/if}
							</td>
						</tr>
						<tr>
							<th>Show Management</th>
							<td>
								{$app.fair_detail.organizer_en}<br />
								Address : {$app.fair_detail.organizer_addr}<br/>
								Department : {$app.fair_detail.organizer_div}<br/>
								Person : {$app.fair_detail.organizer_pers}<br/>
								{if ('' != $app.fair_detail.organizer_tel)}
								TEL : {$app.fair_detail.organizer_tel}<br />
								{/if}
								{if ('' != $app.fair_detail.organizer_fax)}
								FAX : {$app.fair_detail.organizer_fax}<br />
								{/if}
								{if ('' != $app.fair_detail.organizer_email)}
								E-mail : <a href="mailto:{$app.fair_detail.organizer_email}">{$app.fair_detail.organizer_email}</a><br />
								{/if}
								<!-- {if ('' != $app.fair_detail.organizer_tel || '' != $app.fair_detail.organizer_fax)}
								TEL・FAXは国際電話用の国番号から表示されています。<br />
								例 : 東京の場合 +81-3-1234-5678<br />
								{/if} -->
							</td>
						</tr>
						{if ('' != $app.fair_detail.detailed_information_en|replace)}
						<tr>
							<th>PR</th>
							<td>{$app.fair_detail.detailed_information_en|replace:"&lt;br/&gt;":"<br/>"}</td>
						</tr>
						{/if}
						{if ('' != $app.fair_detail.agency_in_japan_en)
							|| ('' != $app.fair_detail.agency_in_japan_addr)
							|| ('' != $app.fair_detail.agency_in_japan_div)
							|| ('' != $app.fair_detail.agency_in_japan_pers)
							|| ('' != $app.fair_detail.agency_in_japan_tel)
							|| ('' != $app.fair_detail.agency_in_japan_fax)
							|| ('' != $app.fair_detail.agency_in_japan_email)
						}
						<tr>
							<th>Agency in Japan</th>
							<td>
								{if ('' != $app.fair_detail.agency_in_japan_en)}
								{$app.fair_detail.agency_in_japan_en}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_addr)}
								Address : {$app.fair_detail.agency_in_japan_addr}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_div)}
								Department : {$app.fair_detail.agency_in_japan_div}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_pers)}
								Person : {$app.fair_detail.agency_in_japan_pers}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_tel)}
								TEL : {$app.fair_detail.agency_in_japan_tel}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_fax)}
								FAX : {$app.fair_detail.agency_in_japan_fax}<br/>
								{/if}
								{if ('' != $app.fair_detail.agency_in_japan_email)}
								E-mail : {$app.fair_detail.agency_in_japan_email}<br/>
								{/if}
							</td>
						</tr>
						{/if}
						<tr>
							<th>Industry</th>

							<td>
								{if ('' != $app.fair_detail.main_industory_1 && '' != $app.fair_detail.sub_industory_1)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_1}&i_3={$app.fair_detail.sub_industory_1}">{$app.fair_detail.main_industory_name_1}／{$app.fair_detail.sub_industory_name_1}</a><br />
								{/if}
								{if ('' != $app.fair_detail.main_industory_2 && '' != $app.fair_detail.sub_industory_2)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_2}&i_3={$app.fair_detail.sub_industory_2}">{$app.fair_detail.main_industory_name_2}／{$app.fair_detail.sub_industory_name_2}</a><br />
								{/if}
								{if ('' != $app.fair_detail.main_industory_3 && '' != $app.fair_detail.sub_industory_3)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_3}&i_3={$app.fair_detail.sub_industory_3}">{$app.fair_detail.main_industory_name_3}／{$app.fair_detail.sub_industory_name_3}</a><br />
								{/if}
								{if ('' != $app.fair_detail.main_industory_4 && '' != $app.fair_detail.sub_industory_4)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_4}&i_3={$app.fair_detail.sub_industory_4}">{$app.fair_detail.main_industory_name_4}／{$app.fair_detail.sub_industory_name_4}</a><br />
								{/if}
								{if ('' != $app.fair_detail.main_industory_5 && '' != $app.fair_detail.sub_industory_5)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_5}&i_3={$app.fair_detail.sub_industory_5}">{$app.fair_detail.main_industory_name_5}／{$app.fair_detail.sub_industory_name_5}</a><br />
								{/if}
								{if ('' != $app.fair_detail.main_industory_6 && '' != $app.fair_detail.sub_industory_6)}
								<a href="{$config.url_pub}?action_enFairList=true&type=i1&i_2={$app.fair_detail.main_industory_6}&i_3={$app.fair_detail.sub_industory_6}">{$app.fair_detail.main_industory_name_6}／{$app.fair_detail.sub_industory_name_6}</a><br />
								{/if}
							</td>
						</tr>
						{if ('' != $app.fair_detail.frequency)}
						<tr>
							<th>Frequency</th>
							<td>
								{$app.fair_detail.frequency_name}
							</td>
						</tr>
						{/if}
						{if ('' != $app.fair_detail.year_of_the_trade_fair
							|| ('' != $app.fair_detail.total_number_of_visitor && 0 < $app.fair_detail.total_number_of_visitor))
							|| ('' != $app.fair_detail.number_of_foreign_visitor && 0 < $app.fair_detail.number_of_foreign_visitor)
							|| ('' != $app.fair_detail.total_number_of_exhibitors && 0 < $app.fair_detail.total_number_of_exhibitors)
							|| ('' != $app.fair_detail.number_of_foreign_exhibitors && 0 < $app.fair_detail.number_of_foreign_exhibitors)
							|| ('' != $app.fair_detail.net_square_meters && 0 < $app.fair_detail.net_square_meters)
							|| ('' != $app.fair_detail.spare_field1)
						}
						<tr>
							<th>last fair information</th>
							<td>
								{if ('' != $app.fair_detail.year_of_the_trade_fair)}
								{$app.fair_detail.year_of_the_trade_fair} year<br />
								{/if}
								{if ('' != $app.fair_detail.total_number_of_visitor && 0 < $app.fair_detail.total_number_of_visitor)}
								Total number of visitors : {$app.fair_detail.total_number_of_visitor}
								{/if}
								{if ('' != $app.fair_detail.number_of_foreign_visitor && 0 < $app.fair_detail.number_of_foreign_visitor)}
								（including ：{$app.fair_detail.number_of_foreign_visitor} foreign visitors)
								{/if}
								<br/>
								{if ('' != $app.fair_detail.total_number_of_exhibitors && 0 < $app.fair_detail.total_number_of_exhibitors)}
								Total number of exhibitors : {$app.fair_detail.total_number_of_exhibitors}
								{/if}
								{if ('' != $app.fair_detail.number_of_foreign_exhibitors && 0 < $app.fair_detail.number_of_foreign_exhibitors)}
								（including : {$app.fair_detail.number_of_foreign_exhibitors} foreign exhibitors)
								{/if}
								<br/>
								{if ('' != $app.fair_detail.net_square_meters && 0 < $app.fair_detail.net_square_meters)}
								Net square meters(net) : {$app.fair_detail.net_square_meters} ㎡<br/>
								{/if}
								{if ('' != $app.fair_detail.spare_field1)}
								Data verified : {$app.fair_detail.spare_field1}<br/>
								{/if}
							</td>
						</tr>
						{/if}
						{if ('' != $app.fair_detail.keyword)}
						<tr>
							<th>Keyword</th>
							<td>{$app.fair_detail.keyword}</td>
						</tr>
						{/if}
						<tr>
							<th>last update</th>
							<td>
								{if ('' != $app.fair_detail.update_date)}
									{$app.fair_detail.update_date|date_format:"%e-%b-%Y"}
								{else}
									{$app.fair_detail.regist_date|date_format:"%e-%b-%Y"}
								{/if}
							</td>
						</tr>
					</table>
				</div>
				<!-- /result -->
				{if ('' != $app.fair_detail.photos_1 || '' != $app.fair_detail.photos_2 || '' != $app.fair_detail.photos_3)}
				<div id="picture" class="right">
					{if ('' != $app.fair_detail.photos_1)}
					<a href="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_1}" rel="prettyPhoto[gallery]"
					{if ('' != $app.fair_detail.abbrev_title)}
					title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_en})"
					{else}
					title="{$app.fair_detail.fair_title_en}"
					{/if}
					>
						<img src="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_1}" width="200px" alt="" />
					</a>
					{/if}
					{if ('' != $app.fair_detail.photos_2)}
					<a href="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_2}" rel="prettyPhoto[gallery]"
					{if ('' != $app.fair_detail.abbrev_title)}
					title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_en})"
					{else}
					title="{$app.fair_detail.fair_title_en}"
					{/if}
					>
						<img src="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_2}" width="200px" alt="" />
					</a>
					{/if}
					{if ('' != $app.fair_detail.photos_3)}
					<a href="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_3}" rel="prettyPhoto[gallery]"
					{if ('' != $app.fair_detail.abbrev_title)}
					title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_en})"
					{else}
					title="{$app.fair_detail.fair_title_en}"
					{/if}
					>
						<img src="{$config.url_pub}{$config.img_path}{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_3}" width="200px" alt="" />
					</a>
					{/if}
				</div>
				{/if}
			</div>
			<p class="totop">
				<a href="javascript:window.open('{$config.url_pub}tradefair_en/{$app.fair_detail.mihon_no}/print/1/', 'print')" target="print"><img src="/images/en/btn-print.gif" alt="Print" height="14" width="46" /></a>
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
