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
<title>見本市情報詳細 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
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
			<li>見本市情報詳細</li>
		</ul>
	</div>
	<!-- /bread -->

	<!-- contents -->
	<div id="contents">



	<div class="area">
	<!-- left -->
	<div id="left">
		<div class="bgbox_set">
			<p id="title"><a href="/j-messe/">見本市・展示会データベース(J-messe)</a></p>
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
							<li class="lv02_title on"><a href="/j-messe/registration/">見本市登録</a></li>
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
					<div class="h2"><h2>見本市情報詳細</h2></div>
					<div class="in_main">
						<form name="form_user_fairDetail" id="form_user_fairDetail" method="post" action=""  enctype="multipart/form-data">
							<input type="hidden" name="action_user_fairChangeStep1" id="action_user_fairChangeStep1" value="dummy">
							<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
							<input type="hidden" name=""mihon_no"" id="mihon_no" value="{$form.mihon_no" />
							<input type="hidden" name="user_id" id="user_id" value="{$form.user_id}" />
							<h4>基本情報</h4>
							<table id="registration">
								<tr>
									<th class="item">見本市名</th>
									<td>{$form.fair_title_jp}</td>
								</tr>
								<tr>
									<th class="item">見本市略称</th>
									<td>{$form.abbrev_title}</td>
								</tr>
								<tr>
									<th class="item">見本市公式サイトURL</th>
									<td>{$form.fair_url}</td>
								</tr>
								<tr>
									<th class="item">会期</th>
									<td>{$form.date_from_yyyy}年{$form.date_from_mm}月{$form.date_from_dd}日～{$form.date_to_yyyy}年{$form.date_to_mm}月{$form.date_to_dd}日</td>
								</tr>
								<tr>
									<th class="item">開催頻度</th>
									<td>{$form.frequency}</td>
								</tr>
							</table>
							<h4>業種・取扱品目</h4>
							<table id="registration">
								<tr>
									<th class="item">業種</th>
									<td>
										{$form.main_industory_1}/{$form.sub_industory_1}<br />
										{$form.main_industory_2}/{$form.sub_industory_2}<br />
										{$form.main_industory_3}/{$form.sub_industory_3}<br />
										{$form.main_industory_4}/{$form.sub_industory_4}<br />
										{$form.main_industory_5}/{$form.sub_industory_5}<br />
										{$form.main_industory_6}/{$form.sub_industory_6}<br />
									</td>
								</tr>
								<tr>
									<th class="item">取扱品目</th>
									<td>{$form.exhibits_jp}</td>
								</tr>
							</table>
							<h4>開催地・会場</h4>
							<table id="registration">
								<tr>
									<th class="item">開催地</th>
									<td>{$form.region}/{$form.country}/{$form.city}<br /></td>
								</tr>
								<tr>
									<th class="item">会場名</th>
									<td>{$form.venue_jp}</td>
								</tr>
								<tr>
									<th class="item">同展示会で使用する面積</th>
									<td>{$form.gross_floor_area}sqm（NET）</td>
								</tr>
								<tr>
									<th class="item">会場までの交通手段</th>
									<td>{$form.transportation_jp}</td>
								</tr>
								<tr>
									<th class="item">入場資格</th>
									<td>{$form.open_to}</td>
								</tr>
								<tr>
									<th class="item">チケットの入手方法</th>
									<td>
										{$form.admission_ticket_1}<br />
										{$form.admission_ticket_2}<br />
										{$form.admission_ticket_3}<br />
										{$form.admission_ticket_4}<br />
										{$form.admission_ticket_5}<br />
										{$form.other_admission_ticket_jp}
									</td>
								</tr>
								<tr>
									<th class="item">出展申込締切日</th>
									<td>{$form.app_dead_yyyy}年{$form.app_dead_mm}月{$form.app_dead_dd}日</td>
								</tr>
							</table>
							<h4>過去の実績</h4>
							<table id="registration">
								<tr>
									<th class="item">対象年</th>
									<td>{$form.year_of_the_trade_fair}年</td>
								</tr>
								<tr>
									<th class="item">総来場者数</th>
									<td>{$form.total_number_of_visitor}人 うち海外から {$form.number_of_foreign_visitor}人</td>
								</tr>
								<tr>
									<th class="item">総出展社数</th>
									<td>{$form.total_number_of_exhibitors}社 うち海外から {$form.number_of_foreign_exhibitors}社</td>
								</tr>
								<tr>
									<th class="item">展示面積</th>
									<td>{$form.net_square_meters}sqm (NET)</td>
								</tr>
							</table>
							<h4>PR・キャッチフレーズ</h4>
							<table id="registration">
								<tr>
									<th class="item">キャッチフレーズ</th>
									<td>{$form.profile_jp}</td>
								</tr>
								<tr>
									<th class="item">PR・紹介文</th>
									<td>{$form.detailed_information_jp}</td>
								</tr>
								<tr>
									<th class="item">見本市の紹介写真</th>
									<td>
										画像(1)：{$form.photos_1}<br />
										画像(2)：{$form.photos_2}<br />
										画像(3)：{$form.photos_3}<br />
									</td>
								</tr>
							</table>
							<h4>主催者</h4>
							<table id="registration">
								<tr>
									<th class="item">主催者</th>
									<td>{$form.organizer_jp}</td>
								</tr>
								<tr>
									<th class="item">主催者連絡先</th>
									<td>
										<strong>TEL: </strong>{$form.organizer_tel}<br />
										<strong>FAX: </strong>{$form.organizer_fax}<br />
										<strong>Email: </strong>{$form.organizer_email}<br />
									</td>
								</tr>
								<tr>
									<th class="item">日本国内の照会先</th>
									<td>
										<strong>海外で開催される見本市で、日本国内に問い合わせ先がある場合</strong><br />
										<strong>団体名等： </strong>{$form.agency_in_japan_jp}<br />
										<strong>TEL: </strong>{$form.agency_in_japan_tel}<br />
										<strong>FAX: </strong>{$form.agency_in_japan_fax}<br />
										<strong>Email: </strong>{$form.agency_in_japan_email}<br />
									</td>
								</tr>
							</table>
							<h4>英文情報</h4>
							<table id="registration">
								<tr>
									<th class="item">海外への紹介を希望</th>
									<td>{$form.select_language_info}</td>
								</tr>
							</table>
							<div class="regist_english" id="engform">
								<table id="registration">
									<tr>
										<th class="item">Fair Title<br />見本市名</th>
										<td>{$form.fair_title_en}</td>
									</tr>
									<tr>
										<th class="item">Teaser Copy<br />キャッチフレーズ</th>
										<td>{$form.profile_en}</td>
									</tr>
									<tr>
										<th class="item">Organizer's statement,special features. etc.<br />PR・紹介文</th>
										<td>{$form.detailed_information_en}</td>
									</tr>
									<tr>
										<th class="item">Exhibits<br />出品物</th>
										<td>{$form.exhibits_en}</td>
									</tr>
									<tr>
										<th class="item">City (other)<br />開催都市（その他）</th>
										<td>{$form.check_other_city_en}</td>
									</tr>
									<tr>
										<th class="item">Venue<br />会場</th>
										<td>{$form.venue_en}</td>
									</tr>
									<tr>
										<th class="item">Transportation<br />交通手段</th>
										<td>{$form.transportation_en}</td>
									</tr>
									<tr>
										<th class="item">Admission ticket(other)<br />チケット入手法（その他)</th>
										<td>{$form.other_admission_ticket_en}</td>
									</tr>
									<tr>
										<th class="item">Show Management<br />主催者</th>
										<td>{$form.organizer_en}</td>
									</tr>
									<tr>
										<th class="item">Agency in Japan<br />日本国内の連絡先</th>
										<td>{$form.agency_in_japan_en}</td>
									</tr>
									<tr>
										<th class="item">Details of last fair audited by<br />承認機関</th>
										<td>{$form.spare_field1}</td>
									</tr>
								</table>
							</div>
							<div class="line_dot"><hr /></div>
							<table width="100%">
								<tr>
									<td><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" onclick="history.back()"/></td>
									<td align="right">
									<input type="image" src="/j-messe/images/db/btn-finish.gif" alt="詳細" class="over" /></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<p class="totop">
			<a href="javascript:window.open('{$config.url}?action_user_userDetail=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
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