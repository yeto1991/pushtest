<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="" />

<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<link href="/css/jp/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css" rel="stylesheet" type="text/css" media="print" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css" rel="stylesheet" type="text/css" media="all" />
{/if}

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery/jquery.tools.min.js"></script>
<script type="text/javascript" src="/j-messe/js/j-messe-form.js" charset="utf-8"></script>
<script type="text/javascript">
<!--
{literal}

	function init(select_language_info) {
		if ('2' == select_language_info) {
			var div = $("#engform").removeClass("regist_english");
		}
	}

	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/header.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/footer.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/left_menu.html");
	});

	function fair_delete(url, mihon_no) {
		if (window.confirm('削除します。よろしいですか？')) {
			document.location.href = url + '?action_user_fairDel=true&mihon_no=' + mihon_no;
		}
	}

{/literal}
//-->
</script>
<title>見本市情報詳細 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
</head>

<body class="layout-LC highlight-match j-messe" onload="init('{$form.select_language_info}')"">
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
			<div id="include_left_menu"></div>
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
								<h2>見本市情報詳細</h2>
							</div>
							<div class="in_main">
								<form name="form_user_fairDetail" id="form_user_fairDetail" method="post" action="" >
									{uniqid}
									{if ('d' == $form.mode)}
									<input type="hidden" name="action_user_fairChangeStep1" id="action_user_fairChangeStep1" value="dummy" />
									<input type="hidden" name="mode" id="mode" value="c" />
									{else}
									<input type="hidden" name="action_user_fairRegistDone" id="action_user_fairRegistDone" value="dummy" />
									<input type="hidden" name="mode" id="mode" value="{$form.mode}" />
										{if ('c' == $form.mode)}
									<input type="hidden" name="mihon_no" id="mihon_no" value="{$form.mihon_no}" />
										{/if}
									{/if}
									<input type="hidden" name="" mihon_no"" id="mihon_no" value="{$form.mihon_no}" />
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
												<td>{$app.frequency_name.discription_jp}</td>
											</tr>
										</table>
										<h4>業種・取扱品目</h4>
										<table id="registration">
											<tr>
												<th class="item">業種</th>
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
												<th class="item">取扱品目</th>
												<td>{$form.exhibits_jp|nl2br}</td>
											</tr>
										</table>
										<h4>開催地・会場</h4>
										<table id="registration">
											<tr>
												<th class="item">開催地</th>
												<td>
													{$app.region_name.discription_jp}
													/ {$app.country_name.discription_jp}
													{if ('' != $app.city_name)}
													/ {$app.city_name.discription_jp}
													{/if}
													{if ('' != $form.other_city_jp)}
													/ {$form.other_city_jp}
													{/if}
												<br /></td>
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
												<td>{$app.open_to_name.discription_jp}</td>
											</tr>
											<tr>
												<th class="item">チケットの入手方法</th>
												<td>
													{if ('1' == $form.admission_ticket_1)}
													登録の必要なし<br />
													{/if}
													{if ('1' == $form.admission_ticket_2)}
													WEBからの事前登録<br />
													{/if}
													{if ('1' == $form.admission_ticket_3)}
													主催者・日本の照会先へ問い合わせ<br />
													{/if}
													{if ('1' == $form.admission_ticket_4)}
													当日会場で入手<br />
													{/if}
													{if ('1' == $form.admission_ticket_5)}
													その他 ({$form.other_admission_ticket_jp})<br />
													{/if}
												</td>
											</tr>
											<tr>
												<th class="item">出展申込締切日</th>
												<td>
													{if ('' != $form.app_dead_yyyy)}
													{$form.app_dead_yyyy}年{$form.app_dead_mm}月{$form.app_dead_dd}日
													{/if}
												</td>
											</tr>
										</table>
										<h4>過去の実績</h4>
										<table id="registration">
											<tr>
												<th class="item">対象年</th>
												<td>
													{if ('' != $form.year_of_the_trade_fair)}
													{$form.year_of_the_trade_fair}年
													{/if}
												</td>
											</tr>
											<tr>
												<th class="item">総来場者数</th>
												<td>
													{if ('' != $form.total_number_of_visitor || '' != $form.number_of_foreign_visitor)}
													{$form.total_number_of_visitor}人 うち海外から {$form.number_of_foreign_visitor}人
													{/if}
												</td>
											</tr>
											<tr>
												<th class="item">総出展社数</th>
												<td>
													{if ('' != $form.total_number_of_exhibitors || '' != $form.number_of_foreign_exhibitors)}
													{$form.total_number_of_exhibitors}社 うち海外から {$form.number_of_foreign_exhibitors}社
													{/if}
												</td>
											</tr>
											<tr>
												<th class="item">展示面積</th>
												<td>
													{if ('' != $form.net_square_meters)}
													{$form.net_square_meters} sqm (NET)
													{/if}
												</td>
											</tr>
										</table>
										<h4>PR・キャッチフレーズ</h4>
										<table id="registration">
											<tr>
												<th class="item">キャッチフレーズ</th>
												<td>{$form.profile_jp|nl2br}</td>
											</tr>
											<tr>
												<th class="item">PR・紹介文</th>
												<td>{$form.detailed_information_jp|nl2br}</td>
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
												<td><strong>TEL: </strong>{$form.organizer_tel}<br /> <strong>FAX: </strong>{$form.organizer_fax}<br /> <strong>Email: </strong>{$form.organizer_email}<br /></td>
											</tr>
											<tr>
												<th class="item">日本国内の照会先</th>
												<td><strong>海外で開催される見本市で、日本国内に問い合わせ先がある場合</strong><br /> <strong>団体名等： </strong>{$form.agency_in_japan_jp}<br /> <strong>TEL: </strong>{$form.agency_in_japan_tel}<br /> <strong>FAX: </strong>{$form.agency_in_japan_fax}<br /> <strong>Email: </strong>{$form.agency_in_japan_email}<br /></td>
											</tr>
										</table>
										<h4>英文情報</h4>
										<table id="registration">
											<tr>
												<th class="item">海外への紹介を希望</th>
												<td>
													{if ('2' == $form.select_language_info)}
													希望する
													{elseif ('0' == $form.select_language_info)}
													希望しない
													{/if}
												</td>
											</tr>
										</table>
										<div class="regist_english" id="engform">
											<table id="registration">
												<tr>
													<th class="item">Fair Title<br />見本市名
													</th>
													<td>{$form.fair_title_en}</td>
												</tr>
												<tr>
													<th class="item">Teaser Copy<br />キャッチフレーズ
													</th>
													<td>{$form.profile_en}</td>
												</tr>
												<tr>
													<th class="item">Organizer's statement,special features. etc.<br />PR・紹介文
													</th>
													<td>{$form.detailed_information_en}</td>
												</tr>
												<tr>
													<th class="item">Exhibits<br />出品物
													</th>
													<td>{$form.exhibits_en}</td>
												</tr>
												<tr>
													<th class="item">City (other)<br />開催都市（その他）
													</th>
													<td>{$form.other_city_en}</td>
												</tr>
												<tr>
													<th class="item">Venue<br />会場
													</th>
													<td>{$form.venue_en}</td>
												</tr>
												<tr>
													<th class="item">Transportation<br />交通手段
													</th>
													<td>{$form.transportation_en}</td>
												</tr>
												<tr>
													<th class="item">Admission ticket(other)<br />チケット入手法（その他)
													</th>
													<td>{$form.other_admission_ticket_en}</td>
												</tr>
												<tr>
													<th class="item">Show Management<br />主催者
													</th>
													<td>{$form.organizer_en}</td>
												</tr>
												<tr>
													<th class="item">Agency in Japan<br />日本国内の連絡先
													</th>
													<td>{$form.agency_in_japan_en}</td>
												</tr>
												<tr>
													<th class="item">Details of last fair audited by<br />承認機関
													</th>
													<td>{$form.spare_field1}</td>
												</tr>
											</table>
										</div>
										<div class="line_dot">
											<hr />
										</div>
										<table width="100%">
											<tr>
												{if ('d' == $form.mode)}
												<td></td>
												<td align="right">
													<a href="javascript:fair_delete('{$config.url}', '{$form.mihon_no}')"><img src="/j-messe/images/db/btn-finish.gif" alt="削除" class="over" /></a>
													<a href="{$config.url}?action_user_fairRegistStep1=true&mode=c&mihon_no={$form.mihon_no}"><img src="/j-messe/images/db/btn-finish.gif" alt="編集" class="over" /></a>
												</td>
												{elseif ('c' == $form.mode)}
												<td><a href="{$config.url}?action_user_fairRegistStep3=true&mode=c&mihon_no={$form.mihon_no}&back=1"><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" /></a></td>
												<td align="right"><input type="image" src="/j-messe/images/db/btn-finish.gif" alt="詳細" class="over" /></td>
												{else}
												<td><a href="{$config.url}?action_user_fairRegistStep3=true&back=1"><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" /></a></td>
												<td align="right"><input type="image" src="/j-messe/images/db/btn-finish.gif" alt="詳細" class="over" /></td>
												{/if}
											</tr>
										</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					{if ('d' == $form.mode)}
					<a href="javascript:window.open('{$config.url}?action_user_fairDetail=true&mode=d&mihon_no={$form.mihon_no}&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{elseif ('c' == $form.mode)}
					<a href="javascript:window.open('{$config.url}?action_user_fairDetail=true&mode=c&mihon_no={$form.mihon_no}&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{else}
					<a href="javascript:window.open('{$config.url}?action_user_fairDetail=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
					{/if}
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
{debug}
