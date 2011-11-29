<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript">
{literal}
<!--
	function openDoc(url, mihon_no, type, page) {
		document.location.href = url + '?action_admin_fairDetail=true&mihon_no=' + mihon_no + '&type=' + type + '&page=' + page;
	}

	function openTemp(url, mihon_no, type, seq_no) {
		window.open(url + '?action_admin_fairDetail=true&mihon_no=' + mihon_no + '&type=' + type + '&seq_num=' + seq_no, 'OLD_FAIR_DETAIL');
	}

	function changeDoc(url, mihon_no) {
		document.location.href = url + '?action_admin_fairChange=true&mode=change&mihon_no=' + mihon_no;
	}

	function copyDoc(url, mihon_no) {
		document.location.href = url + '?action_admin_fairChange=true&mode=copy&mihon_no=' + mihon_no;
	}

	function backToList(url, type, page) {
		document.location.href = url + '?action_admin_fairList=true&type=' + type + '&page=' + page;
	}
// -->
{/literal}
</script>
<title>見本市ＤＢ 管理者用</title>
</head>
<body>
	<form name="form_admin_fairRegist" id="form_admin_fairRegist" method="post" action="" enctype="multipart/form-data">
		{uniqid}
		<!-- 見本市番号 -->
		<input type="hidden" name="mihon_no" id="mihon_no" value="{$form.mihon_no}" />
		<table width="100%">
			<tr>
				<td valign="top" width="200">{include file="admin/menu.tpl"}</td>
				<td valign="top" >
					<div align="center">
						<font size="5"><b>見本市ＤＢ 管理者用</b></font>
					</div>
					<hr>
					{if (null == $form.seq_num || '' == $form.seq_num)}
					<table>
						<tr>
							<td>
							{if ("" != $app.mihon_no_prev)}
							<input type="button" value="前の文書" onclick="openDoc('{$config.url}', '{$app.mihon_no_prev}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" />
							{else}
							<input type="button" value="前の文書" onclick="" disabled />
							{/if}
							</td>
							<td>
							{if ("" != $app.mihon_no_next)}
							<input type="button" value="次の文書" onclick="openDoc('{$config.url}', '{$app.mihon_no_next}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" />
							{else}
							<input type="button" value="次の文書" onclick="" disabled />
							{/if}
							</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="button" value="修正・更新" onclick="changeDoc('{$config.url}', '{$form.mihon_no}')" /></td>
							<td><input type="button" value="コピー編集登録" onclick="copyDoc('{$config.url}', '{$form.mihon_no}')" /></td>
							<td><input type="button" value="一覧へ戻る" onclick="backToList('{$config.url}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" /></td>
						</tr>
					</table>
					<hr/>
					{/if}
					<table border="1">
						<tr>
							<td nowrap>見本市番号</td>
							<!-- 見本市番号 -->
							<td nowrap>{$form.mihon_no}</td>
						</tr>
						{if (null != $form.seq_num && '' != $form.seq_num)}
						<tr>
							<td nowrap>見本市番号枝番</td>
							<!-- 見本市番号 -->
							<td nowrap>{$form.seq_num}</td>
						</tr>
						{/if}
						<tr>
							<td nowrap>Webページの表示／非表示</td>
							<!-- Ｗｅｂページの表示／非表示 -->
							<td nowrap>
								{if ("1" == $form.web_display_type)}
								表示する
								{elseif ("0" == $form.web_display_type)}
								表示しない
								{/if}
							</td>
						</tr>

						<tr>
							<td nowrap>承認フラグ</td>
							<!-- 承認フラグ -->
							<!-- 否認コメント -->
							<td nowrap>
								{if ("1" == $form.confirm_flag)}
								承認
								{elseif ("0" == $form.confirm_flag)}
								承認待ち
								{elseif ("2" == $form.confirm_flag)}
								否認
								{/if}<br />
								否認コメント： {$form.negate_comment}
							</td>
						</tr>

						<tr>
							<td nowrap>メール送信フラグ</td>
							<!-- メール送信フラグ -->
							<td nowrap>
								{if ("1" == $form.mail_send_flag)}
								送信しない
								{elseif ("0" == $form.mail_send_flag)}
								送信する
								{/if}
							</td>
						</tr>

						<tr>
							<td nowrap>ユーザ使用言語フラグ</td>
							<!-- ユーザ使用言語フラグ -->
							<td nowrap>
								{if ("0" == $form.use_language_flag)}
								日本語
								{elseif ("1" == $form.use_language_flag)}
								英語
								{/if}
							</td>
						</tr>

						<tr>
							<td nowrap>Eメール</td>
							<!-- Eメール -->
							<td nowrap>{$form.email}</td>
						</tr>

						<tr>
							<td nowrap>申請年月日</td>
							<!-- 申請年月日 -->
							<td nowrap>
								{$form.date_of_application_y}年
								{$form.date_of_application_m}月
								{$form.date_of_application_d}日
							</td>
						</tr>

						<tr>
							<td nowrap>登録日(承認日)</td>
							<!-- 登録日(承認日) -->
							<td nowrap>
								{$form.date_of_registration_y}年
								{$form.date_of_registration_m}月
								{$form.date_of_registration_d}日
							</td>
						</tr>

						<tr>
							<td nowrap>言語選択情報</td>
							<!-- 言語選択情報 -->
							<td nowrap>
								{if ("0" == $form.select_language_info)}
								日本語
								{elseif ("2" == $form.select_language_info)}
								日本語・英語両方
								{elseif ("1" == $form.select_language_info)}
								英語
								{/if}
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">見本市名</td>
							<!-- 見本市名(日) -->
							<!-- 見本市名(英) -->
							<td nowrap>{$form.fair_title_jp}</td>
						</tr>
						<tr>
							<td nowrap>{$form.fair_title_en}</td>
						</tr>

						<tr>
							<td nowrap>見本市略称</td>
							<!-- 見本市略称(英) -->
							<td nowrap>英：{$form.abbrev_title}</td>
						</tr>

						<tr>
							<td nowrap>見本市URL</td>
							<!-- 見本市ＵＲＬ -->
							<td nowrap>{$form.fair_url}</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">キャッチフレーズ</td>
							<!-- キャッチフレーズ(日) -->
							<!-- キャッチフレーズ(英) -->
							<td nowrap>{$form.profile_jp|nl2br}</td>
						</tr>
						<tr>
							<td nowrap>{$form.profile_en|nl2br}</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">ＰＲ・紹介文</td>
							<!-- ＰＲ・紹介文(日) -->
							<!-- ＰＲ・紹介文(英) -->
							<td nowrap>{$form.detailed_information_jp|nl2br}</td>
						</tr>
						<tr>
							<td nowrap>{$form.detailed_information_en|nl2br}</td>
						</tr>

						<tr>
							<td nowrap>検索キーワード</td>
							<!-- 検索キーワード -->
							<td>{$form.keyword}</td>
						</tr>

						<tr>
							<td nowrap>会期</td>
							<!-- 開始年月 -->
							<!-- 開始日 -->
							<!-- 終了年月 -->
							<!-- 終了日 -->
							<td>
								{$form.date_from_yyyy}年
								{$form.date_from_mm}月
								{$form.date_from_dd}日から
								{$form.date_to_yyyy}年
								{$form.date_to_mm}月
								{$form.date_to_dd}日まで
							</td>
						</tr>

						<tr>
							<td nowrap>開催頻度</td>
							<!-- 開催頻度(日) -->
							<!-- 開催頻度(英) -->
							<td nowrap>
								{section name=it loop=$app.frequency}
								{if ($form.frequency_jp == $app.frequency[it].kbn_2)}
									{$app.frequency[it].discription_jp}
								{/if}
								{/section}
							</td>
						</tr>

						<tr>
							<td nowrap>業種</td>
							<!-- 業種大分類(日) -->
							<td nowrap>
								<table>
									{if (null != $form.main_industory_1 && 0 < count($form.main_industory_1))}
									<tr>
										<td>{$form.main_industory_name_1}／{$form.sub_industory_name_1}</td>
									</tr>
									{/if}
									{if (null != $form.main_industory_2 && 0 < count($form.main_industory_2))}
									<tr>
										<td>{$form.main_industory_name_2}／{$form.sub_industory_name_2}</td>
									</tr>
									{/if}
									{if (null != $form.main_industory_3 && 0 < count($form.main_industory_3))}
									<tr>
										<td>{$form.main_industory_name_3}／{$form.sub_industory_name_3}</td>
									</tr>
									{/if}
									{if (null != $form.main_industory_4 && 0 < count($form.main_industory_4))}
									<tr>
										<td>{$form.main_industory_name_4}／{$form.sub_industory_name_4}</td>
									</tr>
									{/if}
									{if (null != $form.main_industory_5 && 0 < count($form.main_industory_5))}
									<tr>
										<td>{$form.main_industory_name_5}／{$form.sub_industory_name_5}</td>
									</tr>
									{/if}
									{if (null != $form.main_industory_6 && 0 < count($form.main_industory_6))}
									<tr>
										<td>{$form.main_industory_name_6}／{$form.sub_industory_name_6}</td>
									</tr>
									{/if}
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">出品物</td>
							<!-- 出品物(日) -->
							<!-- 出品物(英) -->
							<td nowrap>{$form.exhibits_jp|nl2br}</td>
						</tr>
						<tr>
							<td nowrap>{$form.exhibits_en|nl2br}</td>
						</tr>

						<tr>
							<td nowrap>開催地</td>
							<!-- 開催地域(日) -->
							<!-- 開催地域(英) -->
							<!-- 開催国(日) -->
							<!-- 開催国(英) -->
							<!-- 開催都市(日) -->
							<!-- 開催都市(英) -->
							<!-- その他の都市(日) -->
							<!-- その他の都市(英) -->
							<td nowrap>
								{section name=it loop=$app.region}
									{if ($form.region_jp == $app.region[it].kbn_2)}
										{$app.region[it].discription_jp}
									{/if}
								{/section}
								{section name=it loop=$app.country}
									{if ($form.country_jp == $app.country[it].kbn_3)}
										/ {$app.country[it].discription_jp}
									{/if}
								{/section}
								/ {$form.city_name_jp}
								{if ("1" == $form.othercity_jp)}
									/ {$form.other_city_jp}
								{/if}
								{if ("1" == $form.othercity_en)}
									/ {$form.other_city_en}
								{/if}
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">会場名</td>
							<!-- 会場名(日) -->
							<!-- 会場名(英) -->
							<td nowrap>{$form.venue_jp}</td>
						</tr>
						<tr>
							<td nowrap>{$form.venue_en}</td>
						</tr>

						<tr>
							<td nowrap>開催予定規模</td>
							<!-- 開催予定規模 -->
							<td nowrap>{$form.gross_floor_area}</td>
						</tr>

						<tr>
							<td nowrap rowspan="1">入場資格</td>
							<!-- 入場資格(日) -->
							<!-- 入場資格(英) -->
							<td nowrap>
							{section name=it loop=$app.open_to}
								{if ($app.open_to[it].kbn_2 == $form.open_to_jp)}
									{$app.open_to[it].discription_jp}
								{/if}
							{/section}
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="1">チケットの入手方法</td>
							<!-- チケットの入手方法(日) -->
							<!-- チケットの入手方法(英) -->
							<!-- その他のチケットの入手方法(日) -->
							<!-- その他のチケットの入手方法(英) -->
							<td nowrap>
							{if ("1" == $form.admission_ticket_1_jp)}
								登録の必要なし
							{/if}
							{if ("1" == $form.admission_ticket_2_jp)}
								{if ("1" == $form.admission_ticket_1_jp)} / {/if}
								WEBからの事前登録
							{/if}
							{if ("1" == $form.admission_ticket_3_jp)}
								{if ("1" == $form.admission_ticket_1_jp || "1" == $form.admission_ticket_2_jp)} / {/if}
								主催者・日本の照会先へ問い合わせ
							{/if}
							{if ("1" == $form.admission_ticket_4_jp)}
								{if ("1" == $form.admission_ticket_1_jp || "1" == $form.admission_ticket_2_jp || "1" == $form.admission_ticket_3_jp)} / {/if}
								当日会場で入手
							{/if}
							{if ("1" == $form.admission_ticket_5_jp)}
								{if ("1" == $form.admission_ticket_1_jp || "1" == $form.admission_ticket_2_jp || "1" == $form.admission_ticket_3_jp || "1" == $form.admission_ticket_4_jp)} / {/if}
								その他（{$form.other_admission_ticket_jp}）
							{/if}
							{if ("1" == $form.admission_ticket_5_en)}
								{if ("1" == $form.admission_ticket_1_jp || "1" == $form.admission_ticket_2_jp || "1" == $form.admission_ticket_3_jp || "1" == $form.admission_ticket_4_jp || "1" == $form.admission_ticket_5_jp)} / {/if}
								Others（{$form.other_admission_ticket_en}）
							{/if}
						</tr>

						<tr>
							<td nowrap>過去の実績</td>
							<!-- 実績年 -->
							<!-- 総入場者数(人) -->
							<!-- 海外からの入場者数(人) -->
							<!-- 総出典者数(社) -->
							<!-- 海外からの出典者数(社) -->
							<!-- 開催規模(㎡) -->
							<!-- 予備域１ -->
							<td nowrap>
								<table border="0">
									<tr>
										<td>&nbsp;</td>
										<td colspan="2">{$form.year_of_the_trade_fair} 年実績</td>
										<td colspan="2">&nbsp;</td>
									</tr>
									<tr>
										<td>来場者数</td>
										<td>{$form.total_number_of_visitor} 人</td>
										<td>（うち海外から</td>
										<td>{$form.number_of_foreign_visitor} 人）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>出展者数</td>
										<td>{$form.total_number_of_exhibitors} 社</td>
										<td>（うち海外から</td>
										<td>{$form.number_of_foreign_exhibitors} 社）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>開催規模</td>
										<td colspan="4">{$form.net_square_meters} ㎡</td>
									</tr>
									<tr>
										<td>承認機関</td>
										<td colspan="4">{$form.spare_field1}</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>主催者・問合せ先</td>
							<!-- 問合わせ先・運営機関名(日) -->
							<!-- 問合わせ先・運営機関名(英) -->
							<!-- 問合わせ先・運営機関ＴＥＬ -->
							<!-- 問合わせ先・運営機関ＦＡＸ -->
							<!-- 問合わせ先・運営機関Ｅ－ＭＡＩＬ -->
							<td>
								<table border="0">
									<tr>
										<td nowrap>名称（日）</td>
										<td nowrap>{$form.organizer_jp}</td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap>{$form.organizer_en}</td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td>{$form.organizer_addr}</td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td>{$form.organizer_div}</td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td>{$form.organizer_pers}</td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td>{$form.organizer_tel}</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td>{$form.organizer_fax}</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td nowrap>{$form.organizer_email}</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>日本国内の照会先</td>
							<!-- 在日代理店名(日) -->
							<!-- 在日代理店名(英) -->
							<!-- 在日代理店ＴＥＬ -->
							<!-- 在日代理店ＦＡＸ -->
							<!-- 在日代理店Ｅ－ＭＡＩＬ -->
							<td>
								<table border="0">
									<tr>
										<td nowrap>名称（日）</td>
										<td nowrap>{$form.agency_in_japan_jp}</td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap>{$form.agency_in_japan_en}</td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td>{$form.agency_in_japan_addr}</td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td>{$form.agency_in_japan_div}</td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td>{$form.agency_in_japan_pers}</td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td>{$form.agency_in_japan_tel}</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td>{$form.agency_in_japan_fax}</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td nowrap>{$form.agency_in_japan_email}</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>見本市レポート／URL</td>
							<!-- 駐在員レポート／リンク -->
							<td nowrap>{$form.report_link}</td>
						</tr>

						<tr>
							<td nowrap>世界の展示会場／URL</td>
							<!-- 展示会場／リンク -->
							<td nowrap>{$form.venue_link}</td>
						</tr>


						<tr>
							<td nowrap>システム管理者備考欄</td>
							<!-- システム管理者備考欄 -->
							<td nowrap>{$form.note_for_system_manager}</td>
						</tr>

						<tr>
							<td nowrap>データ管理者備考欄</td>
							<!-- データ管理者備考欄 -->
							<td nowrap>{$form.note_for_data_manager}</td>
						</tr>
						<tr>
							<td nowrap>削除</td>
							<!-- 削除フラグ -->
							<td nowrap>{if ("1" ==$form.del_flg)}削除済{else}未削除{/if}</td>
						</tr>
					</table>
					<hr/>

					展示会に係わる画像(3点) ({$app.photos|@count}ファイル)<br/>
					<!-- 展示会に係わる画像(3点) -->
					{section name=it loop=$app.photos}
						<img src="{$config.url}{$config.img_path}{$app.photos_dir}/{$form.mihon_no}/{$app.photos[it]}" alt="{$app.photos[it]}" width="150" />
					{/section}
					<hr/>

					<!-- 履歴 -->
					<table border="1">
						<tr>
							<th>操作</th>
							<th>日時</th>
							<th>ユーザ</th>
							<th>承認フラグ</th>
							<th>否認コメント</th>
						</tr>
						{section name=it loop=$app.jm_fair_temp_list}
						<tr>
							{if ("1" == $app.jm_fair_temp_list[it].del_flg)}
								<td>削除</td>
								<td>{$app.jm_fair_temp_list[it].del_date}</td>
								<td>
									{if "0" == $app.jm_fair_temp_list[it].update_user_id}
									{$app.jm_fair_temp_list[it].regist_user_email}
									{else}
									{$app.jm_fair_temp_list[it].update_user_email}
									{/if}
								</td>
							{else}
								{if $app.seq_num_ed == $app.jm_fair_temp_list[it].seq_num}
								<td>新規登録</td>
								<td>{$app.jm_fair_temp_list[it].regist_date}</td>
								<td>{$app.jm_fair_temp_list[it].regist_user_email}</td>
								{else}
								<td>更新</td>
								<td>{$app.jm_fair_temp_list[it].update_date}</td>
								<td>{$app.jm_fair_temp_list[it].update_user_email}</td>
								{/if}
							{/if}
							<td><a href="javascript:openTemp('{$config.url}', '{$app.jm_fair_temp_list[it].mihon_no}', '{$form.type}','{$app.jm_fair_temp_list[it].seq_num}');">
							{if ("0" == $app.jm_fair_temp_list[it].confirm_flag)}
							承認待ち
							{elseif ("1" == $app.jm_fair_temp_list[it].confirm_flag)}
							承認
							{elseif ("2" == $app.jm_fair_temp_list[it].confirm_flag)}
							否認
							{else}
							数値不正
							{/if}
							</a></td>
							<td>{$app.jm_fair_temp_list[it].negate_comment}</td>
						</tr>
						{/section}
					</table>
					<hr/>

					{if (null == $form.seq_num || '' == $form.seq_num)}
					<table>
						<tr>
							<td>
							{if ("" != $app.mihon_no_prev)}
							<input type="button" value="前の文書" onclick="openDoc('{$config.url}', '{$app.mihon_no_prev}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" />
							{else}
							<input type="button" value="前の文書" onclick="" disabled />
							{/if}
							</td>
							<td>
							{if ("" != $app.mihon_no_next)}
							<input type="button" value="次の文書" onclick="openDoc('{$config.url}', '{$app.mihon_no_next}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" />
							{else}
							<input type="button" value="次の文書" onclick="" disabled />
							{/if}
							</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="button" value="修正・更新" onclick="changeDoc('{$config.url}', '{$form.mihon_no}')" /></td>
							<td><input type="button" value="コピー編集登録" onclick="copyDoc('{$config.url}', '{$form.mihon_no}')" /></td>
							<td><input type="button" value="一覧へ戻る" onclick="backToList('{$config.url}', '{$form.type}', '{if ('' != $form.page)}{$form.page}{else}1{/if}')" /></td>
						</tr>
					</table>
					{/if}
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
