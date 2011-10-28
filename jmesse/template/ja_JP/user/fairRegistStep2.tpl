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

	$(function(){
		$("#include_header").load("http://localhost/jmesse/www/header.html");
	});

	$(function(){
		$("#include_footer").load("http://localhost/jmesse/www/footer.html");
	});

	$(function(){
		$("#include_left_menu").load("http://localhost/jmesse/www/left_menu.html");
	});

	function next() {
		document.getElementById('form_fairRegistStep2').submit();
	}

{/literal}
// -->
</script>
<title>見本市登録 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
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
			<li>見本市登録</li>
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
								<h2>見本市登録</h2>
							</div>
							<div class="in_main">
								<h3 class="img t_center">
									<img src="/j-messe/images/db/fair03.jpg" alt="見本市登録　ステップ2">
								</h3>
								<p class="t_right">ユーザー：{$session.email}</p>
								<form name="form_fairRegistStep2" id="form_fairRegistStep2" method="post" action=""  enctype="multipart/form-data">
									<input type="hidden" name="action_user_fairRegistStep3" id="action_user_fairRegistStep3" value="dummy" />

									<table id="registration">
										<tr>
											<th class="item">見本市名</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
												<input type="text" value="{$form.fair_title_jp}" size="60" name="fair_title_jp" id="fair_title_jp" /><br/>
											</td>
										</tr>
									</table>


									<h4>過去の実績</h4>
									<table id="registration">
										<tr>
											<th class="item">対象年</th>
											<th class="required"></th>
											<td><select name="year_of_the_trade_fair" size="1" id="year_of_the_trade_fair">
													<option value=""></option>
													{section name=it loop=$app.year_list}
													<option value="{$app.year_list[it]}" {if $app.year_list[it]==$form.year_of_the_trade_fair}selected{/if}>{$app.year_list[it]}</option>
													{/section}
												</select> 年実績
											</td>
										</tr>
										<tr>
											<th class="item">総来場者数</th>
											<th class="required"></th>
											<td>
												<input type="text" value="{$form.total_number_of_visitor}" size="10" name="total_number_of_visitor" id="total_number_of_visitor" /> <strong>人</strong> うち海外から <input type="text" value="{$form.number_of_foreign_visitor}" size="10" name="number_of_foreign_visitor" id="number_of_foreign_visitor" /> <strong>人</strong><br />
												半角数字で入力して下さい。","(カンマ)は使用しないで下さい。例：1000
											</td>
										</tr>
										<tr>
											<th class="item">総出展社数</th>
											<th class="required"></th>
											<td><input type="text" value="{$form.total_number_of_exhibitors}" size="10" name="total_number_of_exhibitors" id="total_number_of_exhibitors" /> <strong>社</strong> うち海外から <input type="text" value="{$form.number_of_foreign_exhibitors}" size="10" name="number_of_foreign_exhibitors" id="number_of_foreign_exhibitors" /> <strong>社</strong><br />
											半角数字で入力して下さい。","(カンマ)は使用しないで下さい。例：1000 </td>
										</tr>
										<tr>
											<th class="item">展示面積</th>
											<th class="required"></th>
											<td><input type="text" value="{$form.net_square_meters}" size="10" name="net_square_meters" id="net_square_meters" /> <strong>sqm (NET)</strong><br />
											半角数字で入力して下さい。","(カンマ)は使用しないで下さい。例：1000 </td>
										</tr>
									</table>
									<h4>PR・キャッチフレーズ</h4>
									<table id="registration">
										<tr>
											<th class="item">キャッチフレーズ</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
												<textarea cols="60" rows="2" name="profile_jp" id="profile_jp">{$form.profile_jp}</textarea><br/>
											 	500文字以内で簡潔に。例：20年の歴史をもつ○○で最大の環境機器の展示会。
											 </td>
										</tr>
										<tr>
											<th class="item">PR・紹介文</th>
											<th class="required"></th>
											<td>
												<textarea cols="60" rows="6" name="detailed_information_jp" id="detailed_information_jp">{$form.detailed_information_jp}</textarea><br/>
												1000文字以内で。
											</td>
										</tr>
										<tr>
											<th class="item">見本市の紹介写真</th>
											<th class="required"></th>
											<td>
												<input type="file" size="40" name="photos_1" id="photos_1" /><br />
												<input type="file" size="40" name="photos_2" id="photos_2" /><br />
												<input type="file" size="40" name="photos_3" id="photos_3" /><br />
												画像ファイルはgif,jpegで縦・横600ピクセル以内のもの</td>
										</tr>
									</table>
									<h4>主催者</h4>
									<table id="registration">
										<tr>
											<th class="item">主催者</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td><input type="text" value="{$form.organizer_jp}" size="60" name="organizer_jp" id="organizer_jp" /></td>
										</tr>
										<tr>
											<th class="item">主催者連絡先</th>
											<th class="required"><img src="/j-messe/images/db/required.gif" height="18" width="30" /></th>
											<td>
												<strong>TEL: </strong><input type="text" value="{$form.organizer_tel}" size="30" name="organizer_tel" id="organizer_tel" /><br />
												<strong>FAX: </strong><input type="text" value="{$form.organizer_fax}" size="30" name="organizer_fax" id="organizer_fax" /><br />
												電話番号はハイフン区切りで国番号から入力してください。（半角数字）<br />
												例：東京の場合 +81-3-1234-5678<br />
												<strong>Email: </strong><input type="text" value="{$form.organizer_email}" size="60" name="organizer_email" id="organizer_email" /><br />
											 </td>
										</tr>
										<tr>
											<th class="item">日本国内の照会先</th>
											<th class="required"></th>
											<td>
												<strong>海外で開催される見本市で、日本国内に問い合わせ先がある場合</strong><br />
												<strong>団体名等： </strong><input type="text" value="{$form.agency_in_japan_jp}" size="60" name="agency_in_japan_jp" id="agency_in_japan_jp" /><br />
												<strong>TEL: </strong><input type="text" value="{$form.agency_in_japan_tel}" size="30" name="agency_in_japan_tel" id="agency_in_japan_tel" /><br />
												<strong>FAX: </strong><input type="text" value="{$form.agency_in_japan_fax}" size="30" name="agency_in_japan_fax" id="agency_in_japan_fax" /><br />
												電話番号はハイフン区切りで国番号から入力してください。（半角数字）<br />
												例：東京の場合 +81-3-1234-5678<br />
												<strong>Email: </strong><input type="text" value="{$form.agency_in_japan_email}" size="60" name="agency_in_japan_email" id="agency_in_japan_email" /><br />
											</td>
										</tr>
									</table>
									<div class="line_dot">
										<hr />
									</div>
									<table width="100%">
										<tr>
											<td width="250px"><a href="{$config.url}?action_user_fairRegistStep1=true&mode=b"><img src="/j-messe/images/db/btn-back.gif" alt="戻る" width="110" height="37" class="over" /></a></td>
											<td align="right"><a href="javascript:next();"><img src="/j-messe/images/db/btn-next.gif" alt="次へ" width="180" height="37" class="over" /></a></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<p class="totop">
					<a href="javascript:window.open('{$config.url}?action_user_fairRegistStep2=true&print=1', 'print')" target="print"><img src="/images/jp/btn-print.gif" alt="印刷" height="23" width="71" /></a>
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
