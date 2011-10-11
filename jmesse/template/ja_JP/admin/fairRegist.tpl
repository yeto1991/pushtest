<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
{literal}
<script type="text/javascript">
<!--
	function open_select_city() {
		for (i = 0; i < document.getElementsByName('use_language_flag').length; i++) {
			if (document.getElementsByName('use_language_flag')[i].checked) {
				use_language_flag = document.getElementsByName('use_language_flag')[i].value;
				break;
			}
		}
		region = document.getElementById('region_jp').value;
		country = document.getElementById('country_jp').value;
		window.open("?action_admin_selectCity=1&kbn_2=" + region + "&kbn_3=003" + country + "&use_language_flag=" + use_language_flag, null);
//		window.open("?action_admin_selectCity=1&kbn_2=" + region + "&kbn_3=" + country + "&use_language_flag=" + use_language_flag, null);
	}
// -->
</script>
{/literal}
<title>見本市ＤＢ 管理者用</title>
</head>
<body>
	<table style="width: 100%;">
		<tr>
			<td valign="top" style="width: 200px;">{include file="admin/menu.tpl"}</td>
			<td valign="top">
				<div align="center">
					<font size="5"><b>見本市ＤＢ 管理者用</b></font>
				</div>
				<hr>

				<form name="form_admin_fairRegist" method="post" action="">
					<input type="hidden" name="action_admon_fairRegistDo" id="action_admon_fairRegistDo" value="dummy"> <font color="#CC3333">●</font>印は入力必須項目、<font color="#CC3333">○</font>は入力推奨項目です。<br> 言語選択で「日本語のみ」をつけた時は、原則 翻訳入力は必要ありません<br> （英語インターフェースでの検索対象となりません）

					<table border="1">

						<tr>
							<td nowrap>新規登録／コピー更新登録</td>
							<!-- 新規登録／コピー更新登録 -->
							<td nowrap><input type="radio" name="copy" id="copy" value="0" checked />新規登録<input type="radio" name="copy" id="copy" value="1" />コピー編集登録</td>
						</tr>

						<tr>
							<td nowrap>Webページの表示／非表示 <font color="#CC3333">●</font></td>
							<!-- Ｗｅｂページの表示／非表示 -->
							<td nowrap><input type="radio" name="web_display_type" id="web_display_type" value="1" checked />表示する<input type="radio" name="web_display_type" id="web_display_type" value="0" />表示しない</td>
						</tr>

						<tr>

							<td nowrap>承認フラグ <font color="#CC3333">●</font></td>
							<!-- 承認フラグ -->
							<!-- 否認コメント -->
							<td nowrap><input type="radio" name="confirm_flag" id="confirm_flag" value="1" checked />承認<input type="radio" name="confirm_flag" id="confirm_flag" value="0" />承認待ち<input type="radio" name="confirm_flag" id="confirm_flag" value="2" />否認<br />否認コメント： <input type="text" name="negate_comment" id="negate_comment" value="" size="120" /></td>
						</tr>

						<tr>
							<td nowrap>メール送信フラグ <font color="#CC3333">●</font></td>
							<!-- メール送信フラグ -->
							<td nowrap><input type="radio" name="mail_send_flag" id="mail_send_flag" value="0" />送信しない<input type="radio" name="mail_send_flag" id="mail_send_flag" value="1" checked />送信する</td>
						</tr>

						<tr>

							<td nowrap>ユーザ使用言語フラグ <font color="#CC3333">●</font></td>
							<!-- 予備フラグ３ -->
							<td nowrap><input type="radio" name="use_language_flag" id="use_language_flag" value="0" checked>日本語<input type="radio" name="use_language_flag" id="use_language_flag" value="1" />英語</td>
						</tr>

						<tr>
							<td nowrap>ユーザID <font color="#CC3333">●</font></td>
							<!-- ユーザＩＤ -->
							<td nowrap><input type="text" name="user_id" id="user_id" value="{$session.username}" maxlength="28" size="28" />（半角英数）</td>
						</tr>

						<tr>
							<td nowrap>申請年月日 <font color="#CC3333">●</font></td>
							<!-- 申請年月日 -->
							<td nowrap><input type="text" name="date_of_application_y" id="date_of_application_y" value="{$app.year}" maxlength="4" size="4" />年<input type="text" name="date_of_application_m" id="date_of_application_m" value="{$app.month}" maxlength="2" size="2" />月<input type="text" name="date_of_application_d" id="date_of_application_d" value="{$app.day}" maxlength="2" size="2" />日</td>
						</tr>

						<tr>
							<td nowrap>登録日(承認日) <font color="#CC3333">●</font></td>
							<!-- 登録日(承認日) -->
							<td nowrap><input type="text" name="date_of_registration_y" id="date_of_registration_y" value="{$app.year}" maxlength="4" size="4" />年<input type="text" name="date_of_registration_m" id="date_of_registration_m" value="{$app.month}" maxlength="2" size="2" />月<input type="text" name="date_of_registration_d" id="date_of_registration_d" value="{$app.day}" maxlength="2" size="2" />日</td>
						</tr>

						<tr>
							<td nowrap>言語選択情報 <font color="#CC3333">●</font></td>
							<!-- 言語選択情報 -->
							<td nowrap><input type="radio" name="select_language_info" id="select_language_info" value="0" checked>日本語<input type="radio" name="select_language_info" id="select_language_info" value="2" />日本語・英語両方<input type="radio" name="select_language_info" id="select_language_info" value="1" />英語</td>

						</tr>

						<tr>
							<td nowrap>見本市番号</td>
							<!-- 見本市番号 -->
							<td nowrap><input type="text" name="mihon_no" id="mihon_no" maxlength="10" size="10" /></td>
						</tr>
						<tr>

							<td nowrap rowspan="2">見本市名 <font color="#CC3333">●</font></td>
							<!-- 見本市名(日) -->
							<!-- 見本市名(英) -->
							<td nowrap>日：<input type="text" name="fair_title_jp" id="fair_title_jp" maxlength="255" size="120" /></td>
						</tr>
						<tr>
							<td nowrap>英：<input type="text" name="fair_title_en" id="fair_title_en" maxlength="255" size="120" /></td>
						</tr>
						<tr>
							<td nowrap>見本市略称</td>
							<!-- 見本市略称(英) -->
							<td nowrap>英：<input type="text" name="abbrev_title" id="abbrev_title" maxlength="100" size="100" /><br> <font size="-1">■日本語は文字化けが発生するため、入力しないでください。</font>

							</td>
						</tr>
						<tr>
							<td nowrap>見本市URL</td>
							<!-- 見本市ＵＲＬ -->
							<td nowrap><input type="text" name="fair_url" id="fair_url" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap rowspan="2">キャッチフレーズ</td>
							<!-- キャッチフレーズ(日) -->
							<!-- キャッチフレーズ(英) -->
							<td nowrap>日：<br /> <textarea name="profile_jp" id="profile_jp" cols="100" rows="7"></textarea><br />
						</tr>
						<tr>

							<td nowrap>英：<font color="#CC3333">（翻訳）</font><br /> <textarea name="profile_jp" id="profile_jp" cols="100" rows="7"></textarea><br />
							</td>
						</tr>
						<tr>
							<td nowrap rowspan="2">ＰＲ・紹介文</td>
							<!-- ＰＲ・紹介文(日) -->
							<!-- ＰＲ・紹介文(英) -->
							<td nowrap>日：<br> <textarea name="detailed_infomation_jp" id="detailed_infomation_jp" cols="100" rows="7"></textarea></td>
						</tr>
						<tr>
							<td nowrap>英：<br> <textarea name="detailed_infomation_en" id="detailed_infomation_en" cols="100" rows="7"></textarea></td>
						</tr>

						<tr>
							<td nowrap>会期 <font color="#CC3333">●</font></td>
							<!-- 開始年月 -->
							<!-- 開始日 -->
							<!-- 終了年月 -->
							<!-- 終了日 -->
							<td><input type="text" name="date_from_yyyy" id="date_from_yyyy" maxlength="4" size="4" />年<input type="text" name="date_from_mm" id="date_from_mm" maxlength="2" size="2" />月<input type="text" name="date_from_dd" id="date_from_dd" maxlength="2" size="2" />日から <input type="text" name="date_to_yyyy" id="date_to_yyyy" maxlength="4" size="4" />年<input type="text" name="date_to_mm" id="date_to_mm" maxlength="2" size="2" />月<input type="text" name="date_to_dd" id="date_to_dd" maxlength="2" size="2" />日まで <br> <font size="-1">■例：2002年8月1日の場合には半角数字で、2002 08 01 と入力してください。</font></td>
						</tr>

						<tr>
							<td nowrap rowspan="3">開催頻度 <font color="#CC3333">●</font></td>
							<!-- 開催頻度(日) -->
							<!-- 開催頻度(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>

							<td nowrap>日：<br/>
							<table>
								{section name=it loop=$app.frequency}
								{if (0 == (($smarty.section.it.index) % 5))}
								<tr>
								{/if}
									<td><input type="radio" name="frequency_jp" id="frequency_jp" value="{$app.frequency[it].kbn_2}"{if $form.frequency_jp == $app.frequency[it].kbn_2} checked {/if}>{$app.frequency[it].discription_jp}</td>
								{if (0 == (($smarty.section.it.index + 1) % 5))}
								</tr>
								{/if}
								{/section}
							</table>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<br/>
							<table>
								{section name=it loop=$app.frequency}
								{if (0 == (($smarty.section.it.index) % 5))}
								<tr>
								{/if}
									<td><input type="radio" name="frequency_en" id="frequency_en" value="{$app.frequency[it].kbn_2}">{$app.frequency[it].discription_en}</td>
								{if (0 == (($smarty.section.it.index + 1) % 5))}
								</tr>
								{/if}
								{/section}
							</table>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">業種 <font color="#CC3333">●</font></td>
							<!-- 業種大分類(日) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：

								<table>

									<tr>
										<td colspan="2"><font size="-1">1. 大分類 → 小分類の順に選択してください。</font></td>
									</tr>
									<tr>
										<td colspan="2">大分類<br/>
											<select name="main_industory_jp" id="main_industory_jp" style="width:200px;">
												<option value="">...</option>
											{section name=it loop=$app.main_industory}
												<option value="{$app.main_industory[it].kbn_2}">{$app.main_industory[it].discription_jp}</option>
											{/section}
											</select>

										</td>
									</tr>
									<tr>
										<td colspan="2">小分類<br/>
											<select name="sub_industory_jp" id="sub_industory_jp" style="width:200px;">
												<option value="">...</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><font size="-1">2.「登録」ボタンをクリックして下さい。</font></td>
									</tr>
									<tr>
										<td><select name="industory_list_jp" id="industory_list_jp" size="4"></select></td>
										<td><input type="button" name="ind_add" value="登録" onClick="" /><br /> <br /> <input type="button" name="ind_del" value="削除" onClick="" /></td>
									</tr>

								</table> <font size="-1">■ 業種は6つまで登録可能です。業種を追加したい場合には1、2の作業を繰り返して下さい。 </font>


							</td>
						</tr>
						<tr>
							<td nowrap>英： <!--  2002.10.24 add [ start ] infocom  -->
								<table>
									<tr>

										<td colspan="2"><font size="-1">1. 大分類 → 小分類の順に選択してください。</font></td>
									</tr>
									<tr>
										<td colspan="2">大分類<br/>
											<select name="main_industory_en" id="main_industory_en" style="width:200px;">
												<option value="">...</option>
											{section name=it loop=$app.main_industory}
												<option value="{$app.main_industory[it].kbn_2}">{$app.main_industory[it].discription_en}</option>
											{/section}
											</select>
										</td>
									</tr>

									<tr>
										<td colspan="2">小分類<br/>
											<select name="sub_industory_en" id="sub_industory_en" style="width:200px;">
												<option value="">...</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><font size="-1">2.「登録」ボタンをクリックして下さい。</font></td>

									</tr>
									<tr>
										<td><select name="industory_list_jp" id="industory_list_jp" size="4"></select></td>
										<td><input type="button" name="ind_add" value="登録" onClick="" /><br /> <br /> <input type="button" name="ind_del" value="削除" onClick="" /></td>
									</tr>

								</table> <font size="-1">■ 業種は6つまで登録可能です。業種を追加したい場合には1、2の作業を繰り返して下さい。 </font> <!--  2002.10.24 add [  end  ] infocom  -->
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">出品物 <font color="#CC3333">●</font></td>
							<!-- 出品物(日) -->
							<!-- 出品物(英) -->

							<td nowrap>日：<br/>
							<textarea name="exhibits_jp" id="exhibits_jp" cols="100" rows="7"></textarea>
							<br>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<font color="#CC3333">（翻訳）</font><br>
							<textarea name="exhibits_en" id="exhibits_en" cols="100" rows="7"></textarea>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">開催地 <font color="#CC3333">●</font></td>
							<!-- 開催地域(日) -->
							<!-- 開催地域(英) -->
							<!-- 開催国(日) -->
							<!-- 開催国(英) -->
							<!-- 開催都市(日) -->
							<!-- 開催都市(英) -->
							<!-- その他の都市(日) -->
							<!-- その他の都市(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>

							<td nowrap>日：

								<table border="0">
									<tr>
										<td colspan="4"><font size="-1">1.地域 → 2.国 → 3.都市の順に選択してください。</font></td>
									</tr>
									<tr>
										<td>1.</td>
										<td>地域</td>
										<td>
										<select name="region_jp" id="region_jp" style="width:200px;">
											<option value="">...</option>
										{section name=it loop=$app.region}
											<option value="{$app.region[it].kbn_2}">{$app.region[it].discription_jp}</option>
										{/section}
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>国・地域</td>
										<td>
										<select name="country_jp" id="country_jp" style="width:200px;">
											<option value="">...</option>
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>都市</td>

										<td colspan="2">
											<a href="javascript:open_select_city();">都市を選択</a>
											<input type="text" name="city_name_jp" id="city_name_jp" value="{$form.city_name_jp}" readonly/>
											<input type="hidden" name="city_jp" id="city_jp" value="{$form.city_jp}" />
											<input type="button" value="削除" onClick=""></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="checkbox" name="othercity_jp" value="その他" onFocus="javascript:this.blur();"> その他</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td></td>
									</tr>
								</table> <font size="-1">■「都市を選択」をクリックして表示される一覧に、開催都市がない場合は「その他」にチェックをし、都市名を入力して下さい。</font>

							</td>
						</tr>
						<tr>
							<td nowrap>英：


								<table border="0">
									<tr>
										<td colspan="4"><font size="-1">1.地域 → 2.国 → 3.都市の順に選択してください。</font></td>
									</tr>

									<tr>
										<td>1.</td>
										<td>地域</td>
										<td>
										<select name="region_en" id="region_en" style="width:200px;">
											<option value="">...</option>
										{section name=it loop=$app.region}
											<option value="{$app.region[it].kbn_2}">{$app.region[it].discription_en}</option>
										{/section}
										</select>
										</td>
										<td colspan="2"></td>
									</tr>

									<tr>
										<td>2.</td>
										<td>国・地域</td>
										<td>
										<select name="country_en" id="country_en" style="width:200px;">
											<option value="">...</option>
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>都市</td>
										<td colspan="2"><a href="javascript:doSelectCity( '/mihon_admin'+'/JAPAN/en/', 'document.MainForm', 'Field29', 'Field31', 'othercity_en', 'EN' );">都市を選択</a> <input type="button" value="削除" onClick="javascript:this.form.Field33.value='';"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="checkbox" name="othercity_en" value="Other" onFocus="javascript:this.blur();"> Others</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td><font color="#CC3333">（翻訳）</font></td>
									</tr>
								</table> <font size="-1">■「都市を選択」をクリックして表示される一覧に、開催都市がない場合は「その他」にチェックをし、都市名を入力して下さい。</font> <!--  2002.10.24 add [  end  ] infocom  -->
							</td>
						</tr>
						<tr>
							<td nowrap rowspan="2">会場名 <font color="#CC3333">●</font></td>
							<!-- 会場名(日) -->
							<!-- 会場名(英) -->
							<td nowrap>日：</td>
						</tr>
						<tr>
							<td nowrap>英：</td>
						</tr>
						<tr>
							<td nowrap>展示会で使用する面積（Ｎｅｔ） <font color="#CC3333">○</font></td>
							<!-- 会場の展示面積 -->

							<td nowrap><br> <font size="-1">■半角数字で入力して下さい。","(カンマ)は使用しないで下さい。例：1000</font></td>
						</tr>
						<tr>
							<td nowrap rowspan="2">交通手段</td>
							<!-- 交通手段(日) -->
							<!-- 交通手段(英) -->
							<td nowrap>日： <br> <font size="-1">■例：成田空港からA12バスで30分</font>
							</td>
						</tr>
						<tr>
							<td nowrap>英：</td>
						</tr>
						<tr>
							<td nowrap rowspan="3">入場資格 <font color="#CC3333">●</font></td>
							<!-- 入場資格(日) -->
							<!-- 入場資格(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：</td>
						</tr>
						<tr>
							<td nowrap>英：</td>
						</tr>
						<tr>
							<td nowrap rowspan="3">チケットの入手方法</td>
							<!-- チケットの入手方法(日) -->
							<!-- チケットの入手方法(英) -->
							<!-- その他のチケットの入手方法(日) -->
							<!-- その他のチケットの入手方法(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：</td>
						</tr>
						<tr>
							<td nowrap>英：</td>
						</tr>
						<tr>
							<td nowrap>過去の実績 <font color="#CC3333">○</font></td>
							<!-- 実績年 -->
							<!-- 総入場者数(人) -->
							<!-- 海外からの入場者数(人) -->
							<!-- 総出典者数(社) -->
							<!-- 海外からの出典者数(社) -->
							<!-- 展示面積(㎡) -->
							<!-- 予備域１ -->
							<td nowrap>
								<table border="0">
									<tr>

										<td>&nbsp;</td>
										<td colspan="2"><input type="text" name="Field46" value="" size="10"> 年実績（西暦４桁）</td>
										<td colspan="2">&nbsp;</td>
									</tr>
									<tr>
										<td>来場者数</td>
										<td><input type="text" name="Field47" value="" size="10"> 人</td>

										<td>（うち海外から</td>
										<td><input type="text" name="Field48" value="" size="10"> 人）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>出展者数</td>
										<td><input type="text" name="Field49" value="" size="10"> 社</td>

										<td>（うち海外から</td>
										<td><input type="text" name="Field50" value="" size="10"> 社）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>展示面積</td>
										<td colspan="4">英：<input type="text" name="Field51" value="" size="20"> <font size="-1">※単位を必ず<font color="#CC3333">英語</font>で入力します。<br> 「㎡」は英語ページで文字化けが発生するため、「sq m」を使用します。 例：1000 sq m, 6000booth
										</font>
										</td>
									</tr>
									<tr>
										<td>承認機関</td>
										<td colspan="4"></td>
									</tr>
								</table> <font size="-1">■出展者数の多いデータが検索結果で上位に表示されます。</font>
							</td>
						</tr>
						<tr>
							<td nowrap>出展申込締切日</td>
							<!-- 出典申込締切日 -->
							<td><br> <font size="-1">■例：2002年8月1日の場合には半角数字で、2002 08 01 と入力してください。</font></td>
						</tr>
						<tr>
							<td nowrap>主催者・問合せ先 <font color="#CC3333">●</font></td>
							<!-- 問合わせ先・運営機関名(日) -->
							<!-- 問合わせ先・運営機関名(英) -->
							<!-- 問合わせ先・運営機関ＴＥＬ -->
							<!-- 問合わせ先・運営機関ＦＡＸ -->
							<!-- 問合わせ先・運営機関Ｅ－ＭＡＩＬ -->
							<td>
								<table border="0">
									<tr>
										<td nowrap>名称（日）</td>
										<td nowrap></td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap><font color="#CC3333">（翻訳）</font></td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td><input type="text" name="dummyAddress1" value="" size="120"></td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td><input type="text" name="dummyDepartment1" value="" size="120"></td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td><input type="text" name="dummyUser1" value="" size="50"></td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td><input type="text" name="Field55" value="" size="30"> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td><input type="text" name="Field56" value="" size="30"> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>

										<td nowrap><input type="text" name="Field57" value="" size="110"> （半角英数）</td>
									</tr>
								</table> <font size="-1"> ■TEL・FAX はハイフン区切り、国番号から入力してください。 <br> 例：東京の場合 +81-3-1234-5678 <br> ■TEL、FAX、E-mailのどれか一つは必ず入力願います。
							</font>
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

										<td nowrap></td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap><font color="#CC3333">（翻訳）</font></td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td><input type="text" name="dummyAddress2" value="" size="120"></td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td><input type="text" name="dummyDepartment2" value="" size="120"></td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td><input type="text" name="dummyUser2" value="" size="50"></td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td><input type="text" name="Field60" value="" size="30"> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td><input type="text" name="Field61" value="" size="30"> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td nowrap><input type="text" name="Field62" value="" size="110"> （半角英数）</td>
									</tr>
								</table> <font size="-1"> ■海外で開催される見本市で、日本国内に問合せ先がある場合のみ入力してください。 <br> ■TEL・FAX はハイフン区切り、国番号から入力してください。 <br> 例：東京の場合 +81-3-1234-5678
							</font>
							</td>
						</tr>
						<tr>
							<td nowrap>見本市レポート／URL</td>
							<!-- 駐在員レポート／リンク -->
							<td nowrap></td>
						</tr>
						<tr>
							<td nowrap>世界の展示会場／URL</td>
							<!-- 展示会場／リンク -->
							<td nowrap></td>
						</tr>
						<tr>
							<td nowrap>展示会に係わる画像(3点)</td>
							<!-- 展示会に係わる画像(3点) -->
							<td><font size="-1">1.「参照」ボタンをクリックして登録する画像ファイルを選択してください。最大3つまで登録できます。（JPEG, GIF, TIFF 形式のみ）</font><br> <br> <input type="file" name="Field2" size=50 onBlur="onFileChange(this, 2, 1, true)"><br> <input type="file" name="Field2" size=50 onBlur="onFileChange(this, 2, 2, true)"><br> <input type="file" name="Field2" size=50 onBlur="onFileChange(this, 2, 3, true)"><br> <font size="-1">2. 登録された画像ファイル名が以下に表示されます。表示されない時は画面上をクリックしてください。</font><br> <input type="button" value="上へ" onClick="onUp(this.form.filelist2)">&nbsp;<input type="button" value="下へ" onClick="onDown(this.form.filelist2)">&nbsp;<input type="button" value="削除" onClick="onDelete(this.form.filelist2)"><br> <select name="filelist2" size=5><option></select><input type="hidden" name="values2" value=""> <br> <font size="-1">登録されているイメージの順番は上から1番目です。<br>詳細表示するときには左から1番目を表示します。
							</font></td>
						</tr>
						<tr>
							<td nowrap>システム管理者備考欄</td>
							<!-- システム管理者備考欄 -->
							<td nowrap></td>
						</tr>
						<tr>
							<td nowrap>データ管理者備考欄:</td>
							<!-- データ管理者備考欄 -->
							<td nowrap></td>
						</tr>
					</table>
					<hr>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
