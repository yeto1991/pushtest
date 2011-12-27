<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="見本市、展示会、商談会、{$app.fair_detail.exhibits_jp|replace:'&lt;br/&gt;':''}, {$app.fair_detail.keyword}" />
{include file="header.tpl"}
<title>
{if ('' != $app.fair_detail.abbrev_title)}
{$app.fair_detail.abbrev_title} - {$app.fair_detail.fair_title_jp} - 世界の見本市・展示会 - ジェトロ
{else}
{$app.fair_detail.fair_title_jp} - 世界の見本市・展示会 - ジェトロ
{/if}
</title>
</head>


<body class="layout-LC highlight-match j-messe">
	<!-- header -->
	{$app_ne.header}
	<!-- /header -->

	<!-- bread -->
	<div id="bread">
		<ul>
			<li><a href="/indexj.html">HOME</a></li>
			<li><a href="/database/">引き合い・展示会検索</a></li>
			<li><a href="/j-messe/">見本市・展示会データベース（J-messe）</a></li>
			<li><a href="/j-messe/tradefair/">世界の見本市・展示会</a></li>
			{if (''!= $app.fair_detail.abbrev_title)}
			<li>{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_jp})</li>
			{else}
			<li>{$app.fair_detail.fair_title_jp}</li>
			{/if}
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">

		<div class="area">

			<!-- left -->
			{$app_ne.left_menu}
			<!-- /left -->

			<!-- center -->
			<div id="center">
				<div id="main">
					<div class="bgbox_set">
						<div class="bgbox_base">

							<div class="h1">
								<h1>見本市・展示会データベース</h1>
							</div>

							<div class="h2">
								<h2>世界の見本市・展示会</h2>
							</div>

							<div class="in_main">

								{if ('' != $app.fair_detail.abbrev_title)}
								<div class="h3">
								<h3>{$app.fair_detail.abbrev_title}<br/>
								<span>{$app.fair_detail.fair_title_jp}</span></h3>
								</div>
								{else}
								<h3>{$app.fair_detail.fair_title_jp}</h3>
								{/if}

								<p>{$app.fair_detail.profile_jp|replace:"&lt;br/&gt;":"<br/>"}</p>
								{if ('' != $app.fair_detail.fair_url)}
								<p class="t_right">
									<a class="icon_arrow" target="_blank" href="{$app.fair_detail.fair_url}">公式ウェブサイト</a><img class="icon_external" alt="他のサイトへ" src="/images/jp/icon-external.gif">
								</p>
								{/if}
								<!-- left -->
								{if ('' != $app.fair_detail.photos_1 || '' != $app.fair_detail.photos_2 || '' != $app.fair_detail.photos_3)}
								<div class="left" id="detail">
								{else}
								<div class="left" id="detail-noimg">
								{/if}
									<table class="detail">
										<tr>
											<th>会期</th>
											<td>{$app.fair_detail.date_from_yyyy}年{$app.fair_detail.date_from_mm}月{$app.fair_detail.date_from_dd}日 ～ {$app.fair_detail.date_to_yyyy}年{$app.fair_detail.date_to_mm}月{$app.fair_detail.date_to_dd}日</td>

										</tr>
										<tr>
											<th>開催地</th>
											<td>
												{if ('' != $app.fair_detail.flag_image)}
												<img src="{$config.flag_path}{$app.fair_detail.flag_image}" class="flag">
{*
												<img src="{$config.url_pub}{$config.flag_path}{$app.fair_detail.flag_image}" style="vertical-align: middle;">
*}
												{/if}
												{if ('' != $app.fair_detail.city_other_jp)}
												{$app.fair_detail.city_other_jp} /
												{/if}
												{if ('' != $app.fair_detail.city_name)}
												<a href="{$config.url_pub}?action_fairList=true&type=v2&v_2={$app.fair_detail.region}&v_3={$app.fair_detail.country}&v_4={$app.fair_detail.city}">{$app.fair_detail.city_name}</a> /
												{/if}
												<a href="{$config.url_pub}?action_fairList=true&type=v2&v_2={$app.fair_detail.region}&v_3={$app.fair_detail.country}">{$app.fair_detail.country_name}</a> /
												<a href="{$config.url_pub}?action_fairList=true&type=v1&v_2={$app.fair_detail.region}">{$app.fair_detail.region_name}</a>
											</td>
										</tr>
										<tr>
											<th>会場</th>
											<td>
											{if ('' != $app.fair_detail.venue_url && '0' == $app.is_end)}
												<a target="_blank" href="{$app.fair_detail.venue_url}">{$app.fair_detail.venue_jp}</a><br />
											{else}
												{$app.fair_detail.venue_jp}<br />
											{/if}

												<div style="padding-left: 15px;">
													{if ('' != $app.fair_detail.gross_floor_area && 0 <$app.fair_detail.gross_floor_area)}
													展示面積(net)：{$app.fair_detail.gross_floor_area|number_format} sqm<br />
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
											<th>取扱品目</th>
											<td>{$app.fair_detail.exhibits_jp|replace:"&lt;br/&gt;":"<br/>"}</td>
										</tr>
										<tr>
											<th>ご来場の方へ</th>

											<td>
												入場資格:{$app.fair_detail.open_to_name}<br />
												{if ('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3 || '1' == $app.fair_detail.admission_ticket_4 || '' != $app.fair_detail.other_admission_ticket_jp)}
												チケットの入手方法:
													{if ('1' == $app.fair_detail.admission_ticket_1)}
													登録の必要なし
													{/if}
													{if ('1' == $app.fair_detail.admission_ticket_1 && '1' == $app.fair_detail.admission_ticket_2)}
													/
													{/if}
													{if ('1' == $app.fair_detail.admission_ticket_2)}
													WEBからの事前登録
													{/if}
													{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2) && '1' == $app.fair_detail.admission_ticket_3)}
													/
													{/if}
													{if ('1' == $app.fair_detail.admission_ticket_3)}
													主催者・日本の登録先へ問合せ
													{/if}
													{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3) && '1' == $app.fair_detail.admission_ticket_4)}
													/
													{/if}
													{if ('1' == $app.fair_detail.admission_ticket_4)}
													当日会場で入手
													{/if}
													{if (('1' == $app.fair_detail.admission_ticket_1 || '1' == $app.fair_detail.admission_ticket_2 || '1' == $app.fair_detail.admission_ticket_3 || '1' == $app.fair_detail.admission_ticket_4) && '' != $app.fair_detail.other_admission_ticket_jp)}
													/
													{/if}
													{if ('' != $app.fair_detail.other_admission_ticket_jp)}
													{$app.fair_detail.other_admission_ticket_jp}
													{/if}
												{/if}
											</td>
										</tr>
										<tr>
											<th>主催者</th>
											<td>
												{$app.fair_detail.organizer_jp}<br />
												住所 : {$app.fair_detail.organizer_addr}<br/>
												{if ('' != $app.fair_detail.organizer_div)}
												担当部課 : {$app.fair_detail.organizer_div}<br/>
												{/if}
												{if ('' != $app.fair_detail.organizer_pers)}
												担当者 : {$app.fair_detail.organizer_pers}<br/>
												{/if}
												TEL : {$app.fair_detail.organizer_tel}<br />
												{if ('' != $app.fair_detail.organizer_fax)}
												FAX : {$app.fair_detail.organizer_fax}<br />
												{/if}
												E-mail : <a href="mailto:{$app.fair_detail.organizer_email}">{$app.fair_detail.organizer_email}</a><br />
												TEL・FAXは国際電話用の国番号から表示されています。<br />
												例 : 東京の場合 +81-3-1234-5678<br />
											</td>
										</tr>
										{if ('' != $app.fair_detail.detailed_information_jp|replace)}
										<tr>
											<th>主催者より</th>
											<td>{$app.fair_detail.detailed_information_jp|replace:"&lt;br/&gt;":"<br/>"}</td>
										</tr>
										{/if}
										{if ('' != $app.fair_detail.agency_in_japan_jp)
											|| ('' != $app.fair_detail.agency_in_japan_addr)
											|| ('' != $app.fair_detail.agency_in_japan_div)
											|| ('' != $app.fair_detail.agency_in_japan_pers)
											|| ('' != $app.fair_detail.agency_in_japan_tel)
											|| ('' != $app.fair_detail.agency_in_japan_fax)
											|| ('' != $app.fair_detail.agency_in_japan_email)
										}
										<tr>
											<th>日本国内の連絡先</th>
											<td>
												{if ('' != $app.fair_detail.agency_in_japan_jp)}
												{$app.fair_detail.agency_in_japan_jp}<br/>
												{/if}
												{if ('' != $app.fair_detail.agency_in_japan_addr)}
												住所 : {$app.fair_detail.agency_in_japan_addr}<br/>
												{/if}
												{if ('' != $app.fair_detail.agency_in_japan_div)}
												担当部課 : {$app.fair_detail.agency_in_japan_div}<br/>
												{/if}
												{if ('' != $app.fair_detail.agency_in_japan_pers)}
												担当者 : {$app.fair_detail.agency_in_japan_pers}<br/>
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
											<th>業種</th>

											<td>
												{if ('' != $app.fair_detail.main_industory_1 && '' != $app.fair_detail.sub_industory_1)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_1}&i_3={$app.fair_detail.sub_industory_1}">{$app.fair_detail.main_industory_name_1}／{$app.fair_detail.sub_industory_name_1}</a><br />
												{/if}
												{if ('' != $app.fair_detail.main_industory_2 && '' != $app.fair_detail.sub_industory_2)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_2}&i_3={$app.fair_detail.sub_industory_2}">{$app.fair_detail.main_industory_name_2}／{$app.fair_detail.sub_industory_name_2}</a><br />
												{/if}
												{if ('' != $app.fair_detail.main_industory_3 && '' != $app.fair_detail.sub_industory_3)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_3}&i_3={$app.fair_detail.sub_industory_3}">{$app.fair_detail.main_industory_name_3}／{$app.fair_detail.sub_industory_name_3}</a><br />
												{/if}
												{if ('' != $app.fair_detail.main_industory_4 && '' != $app.fair_detail.sub_industory_4)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_4}&i_3={$app.fair_detail.sub_industory_4}">{$app.fair_detail.main_industory_name_4}／{$app.fair_detail.sub_industory_name_4}</a><br />
												{/if}
												{if ('' != $app.fair_detail.main_industory_5 && '' != $app.fair_detail.sub_industory_5)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_5}&i_3={$app.fair_detail.sub_industory_5}">{$app.fair_detail.main_industory_name_5}／{$app.fair_detail.sub_industory_name_5}</a><br />
												{/if}
												{if ('' != $app.fair_detail.main_industory_6 && '' != $app.fair_detail.sub_industory_6)}
												<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.fair_detail.main_industory_6}&i_3={$app.fair_detail.sub_industory_6}">{$app.fair_detail.main_industory_name_6}／{$app.fair_detail.sub_industory_name_6}</a><br />
												{/if}
											</td>
										</tr>
										{if ('' != $app.fair_detail.frequency)}
										<tr>
											<th>開催頻度</th>
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
											<th>過去の実績</th>
											<td>
												{if ('' != $app.fair_detail.year_of_the_trade_fair)}
												{$app.fair_detail.year_of_the_trade_fair}年実績<br />
												{/if}
												{if ('' != $app.fair_detail.total_number_of_visitor && 0 < $app.fair_detail.total_number_of_visitor)}
												来場者数 : {$app.fair_detail.total_number_of_visitor} 人
												{/if}
												{if ('' != $app.fair_detail.number_of_foreign_visitor && 0 < $app.fair_detail.number_of_foreign_visitor)}
												（うち海外から：{$app.fair_detail.number_of_foreign_visitor} 人）
												{/if}
												<br/>
												{if ('' != $app.fair_detail.total_number_of_exhibitors && 0 < $app.fair_detail.total_number_of_exhibitors)}
												出展者数 : {$app.fair_detail.total_number_of_exhibitors} 社
												{/if}
												{if ('' != $app.fair_detail.number_of_foreign_exhibitors && 0 < $app.fair_detail.number_of_foreign_exhibitors)}
												（うち海外から : {$app.fair_detail.number_of_foreign_exhibitors} 社）
												{/if}
												<br/>
												{if ('' != $app.fair_detail.net_square_meters && 0 < $app.fair_detail.net_square_meters)}
												展示面積(net) : {$app.fair_detail.net_square_meters} ㎡<br/>
												{/if}
												{if ('' != $app.fair_detail.spare_field1)}
												承認機関 : {$app.fair_detail.spare_field1}<br/>
												{/if}
											</td>
										</tr>
										{/if}
										{if ('' != $app.fair_detail.keyword)}
										<tr>
											<th>キーワード</th>
											<td>{$app.fair_detail.keyword}</td>
										</tr>
										{/if}
										<tr>
											<th>最終更新日</th>
											<td>
												{if ('' != $app.fair_detail.update_date)}
													{$app.fair_detail.update_date|date_format:"%Y年 %m月 %d日"}
												{else}
													{$app.fair_detail.regist_date|date_format:"%Y年 %m月 %d日"}
												{/if}
											</td>
										</tr>
									</table>

								</div>
								<!-- /result -->

								{if ('' != $app.fair_detail.photos_1 || '' != $app.fair_detail.photos_2 || '' != $app.fair_detail.photos_3)}
								<div id="picture" class="right">
									{if ('' != $app.fair_detail.photos_1)}
									<a href="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_1}" rel="prettyPhoto[gallery]"
									{if ('' != $app.fair_detail.abbrev_title)}
									title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_jp})"
									{else}
									title="{$app.fair_detail.fair_title_jp}"
									{/if}
									>
										<img src="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_1}" width="200px" alt="" />
									</a>
									{/if}
									{if ('' != $app.fair_detail.photos_2)}
									<a href="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_2}" rel="prettyPhoto[gallery]"
									{if ('' != $app.fair_detail.abbrev_title)}
									title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_jp})"
									{else}
									title="{$app.fair_detail.fair_title_jp}"
									{/if}
									>
										<img src="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_2}" width="200px" alt="" />
									</a>
									{/if}
									{if ('' != $app.fair_detail.photos_3)}
									<a href="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_3}" rel="prettyPhoto[gallery]"
									{if ('' != $app.fair_detail.abbrev_title)}
									title="{$app.fair_detail.abbrev_title} ({$app.fair_detail.fair_title_jp})"
									{else}
									title="{$app.fair_detail.fair_title_jp}"
									{/if}
									>
										<img src="{$config.url_pub}{$config.img_path}{$app.photos_dir}/{$app.fair_detail.mihon_no}/{$app.fair_detail.photos_3}" width="200px" alt="" />
									</a>
									{/if}
								</div>
								{/if}
								<br class="clr" />
								<div class="frame_gray inside terms_use">
								<p>
								掲載の見本市情報は主催者により変更、延期、中止されることがあります。詳細については直接各主催者のサイト等を確認願います。<br />
								詳しくは<a href="/j-messe/tradefair/terms.html">見本市・展示会情報のご利用について</a>を参照ください。
								</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<a href="javascript:window.open('{$config.url_pub}tradefair/{$app.fair_detail.mihon_no}/print/1/', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					<a href="javascript:window.scrollTo(0, 0);"><img src="/images/jp/btn-totop.gif" alt="このページの上へ" height="23" width="110" /></a>
				</p>
			</div>

			<!-- /center -->

		</div>
	</div>
	<!-- /contents -->

	<!-- footer -->
	{$app_ne.footer}
	<!-- /footer -->

</body>
</html>
