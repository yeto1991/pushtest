<?php
/**
 *  Admin/FairChangeDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairChange.php';

/**
 *  admin_fairChangeDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminFairChangeDo extends Jmesse_Form_AdminFairChange
{
}

/**
 *  admin_fairChangeDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminFairChangeDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_fairChangeDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ログインチェック
		if (!$this->backend->getManager('adminCommon')->isLoginFair()) {
			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
			$this->af->set('function', '');
			return 'admin_Login';
		}

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'admin_fairRegist';
		}

		// 見本市番号は必須
		if (null == $this->af->get('mihon_no') || '' == $this->af->get('mihon_no')) {
			$this->ae->addObject('error', Ethna::raiseError('見本市番号が入力されていません', E_REQUIRED));
			return 'error';
		}

		// 入力チェック（詳細）
		$use_language_flag = $this->af->get('use_language_flag');
// 		if ('0' == $use_language_flag) {
			// 開催頻度
			if (null == $this->af->get('frequency_jp') || '' == $this->af->get('frequency_jp')) {
				$this->ae->addObject('error', Ethna::raiseError('開催頻度が入力されていません', E_REQUIRED));
			}
			// 開催地
			if (null == $this->af->get('region_jp') || '' == $this->af->get('region_jp')) {
				$this->ae->addObject('error', Ethna::raiseError('開催地（地域）が入力されていません', E_REQUIRED));
			}
			if (null == $this->af->get('country_jp') || '' == $this->af->get('country_jp')) {
				$this->ae->addObject('error', Ethna::raiseError('開催地（国・地域）が入力されていません', E_REQUIRED));
			}
			if ((null == $this->af->get('city_jp') || '' == $this->af->get('city_jp'))
			&& (null == $this->af->get('othercity_jp') || '' == $this->af->get('othercity_jp'))) {
				$this->ae->addObject('error', Ethna::raiseError('開催地（都市）が入力されていません', E_REQUIRED));
			}
			// 入場資格
			if (null == $this->af->get('open_to_jp') || '' == $this->af->get('open_to_jp')) {
				$this->ae->addObject('error', Ethna::raiseError('入場資格が入力されていません', E_REQUIRED));
			}
			// チケットの入手方法
			if ('1' == $this->af->get('admission_ticket_5_jp')
			&& (null == $this->af->get('other_admission_ticket_jp') || '' == $this->af->get('other_admission_ticket_jp'))) {
				$this->ae->addObject('error', Ethna::raiseError('チケットの入手方法が入力されていません', E_REQUIRED));
			}
// 		} else {
// 			// 開催頻度
// 			if (null == $this->af->get('frequency_en') || '' == $this->af->get('frequency_en')) {
// 				$this->ae->addObject('error', Ethna::raiseError('開催頻度入力されていません', E_REQUIRED));
// 			}
// 			// 開催地
// 			if (null == $this->af->get('region_en') || '' == $this->af->get('region_en')) {
// 				$this->ae->addObject('error', Ethna::raiseError('開催地（地域）が入力されていません', E_REQUIRED));
// 			}
// 			if (null == $this->af->get('country_en') || '' == $this->af->get('country_en')) {
// 				$this->ae->addObject('error', Ethna::raiseError('開催地（国・地域）が入力されていません', E_REQUIRED));
// 			}
// 			if ((null == $this->af->get('city_en') || '' == $this->af->get('city_en'))
// 			&& (null == $this->af->get('othercity_en') || '' == $this->af->get('othercity_en'))) {
// 				$this->ae->addObject('error', Ethna::raiseError('開催地（都市）が入力されていません', E_REQUIRED));
// 			}
// 			// 入場資格
// 			if (null == $this->af->get('open_to_en') || '' == $this->af->get('open_to_en')) {
// 				$this->ae->addObject('error', Ethna::raiseError('入場資格が入力されていません', E_REQUIRED));
// 			}
			// チケットの入手方法
			if ('1' == $this->af->get('admission_ticket_5_en')
			&& (null == $this->af->get('other_admission_ticket_en') || '' == $this->af->get('other_admission_ticket_en'))) {
				$this->ae->addObject('error', Ethna::raiseError('チケットの入手方法が入力されていません', E_REQUIRED));
			}
// 		}
		// Eメール
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
		if (Ethna::isError($user)) {
			$this->ae->addObject('error', $user);
			return 'error';
		}
		if (null == $user || null == $user->get('user_id')) {
			$this->ae->addObject('error', Ethna::raiseError('Eメールのユーザは未登録です', E_REQUIRED));
		}
		// 主催者・問合せ先
		if ((null == $this->af->get('organizer_tel') || '' == $this->af->get('organizer_tel'))
			&& (null == $this->af->get('organizer_fax') || '' == $this->af->get('organizer_fax'))
			&& (null == $this->af->get('organizer_email') || '' == $this->af->get('organizer_email'))) {
			$this->ae->addObject('error', Ethna::raiseError('主催者・問合せ先が入力されていません', E_REQUIRED));
		}

		// 日付チェック
		// 申請年月日
		if (!checkdate($this->af->get('date_of_application_m'), $this->af->get('date_of_application_d'), $this->af->get('date_of_application_y'))) {
			$this->ae->addObject('error', Ethna::raiseError('申請年月日が正しくありません', E_INPUT_TYPE));
		}
		// 登録日(承認日)
		if (!checkdate($this->af->get('date_of_registration_m'), $this->af->get('date_of_registration_d'), $this->af->get('date_of_registration_y'))) {
			$this->ae->addObject('error', Ethna::raiseError('登録日(承認日)が正しくありません', E_INPUT_TYPE));
		}
		// 会期
		if (!checkdate($this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))) {
			$this->ae->addObject('error', Ethna::raiseError('会期（開始）が正しくありません', E_INPUT_TYPE));
		}
		if (!checkdate($this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
			$this->ae->addObject('error', Ethna::raiseError('会期（終了）が正しくありません', E_INPUT_TYPE));
		}
		if (mktime(0, 0, 0, $this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))
			> mktime(0, 0, 0, $this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
			$this->ae->addObject('error', Ethna::raiseError('会期が正しくありません（開始 > 終了）', E_INPUT_TYPE));
		}
		// 出展申込締切日
		if ((null != $this->af->get('app_dead_yyyy') && '' != $this->af->get('app_dead_yyyy'))
			|| (null != $this->af->get('app_dead_mm') && '' != $this->af->get('app_dead_mm'))
			|| (null != $this->af->get('app_dead_dd') && '' != $this->af->get('app_dead_dd'))) {
			if (!checkdate($this->af->get('app_dead_mm'), $this->af->get('app_dead_dd'), $this->af->get('app_dead_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('出展申込締切日が正しくありません', E_INPUT_TYPE));
			}
		}

		// URLチェック
		// 見本市URL
		if (null != $this->af->get('fair_url') && '' != $this->af->get('fair_url')) {
			if (0 !== strpos($this->af->get('fair_url'), 'http')) {
				$this->ae->addObject('error', Ethna::raiseError('見本市URLはhttp～として下さい', E_INPUT_TYPE));
			}
		}
		// 見本市レポート／URL
		if (null != $this->af->get('report_link') && '' != $this->af->get('report_link')) {
			if (0 !== strpos($this->af->get('report_link'), 'http')) {
				$this->ae->addObject('error', Ethna::raiseError('見本市レポート／URLはhttp～として下さい', E_INPUT_TYPE));
			}
		}
		// 世界の展示会場／URL
		if (null != $this->af->get('venue_link') && '' != $this->af->get('venue_link')) {
			if (0 !== strpos($this->af->get('venue_link'), 'http')) {
				$this->ae->addObject('error', Ethna::raiseError('世界の展示会場／URLはhttp～として下さい', E_INPUT_TYPE));
			}
		}

		// Eメールチェック
		// 主催者・問合せ先 E-Mail
		if (null != $this->af->get('organizer_email') && '' != $this->af->get('organizer_email')) {
			if (!strpos($this->af->get('organizer_email'), '@')
				|| 0 === strpos($this->af->get('organizer_email'), '@')
				|| strlen($this->af->get('organizer_email')) - 1 === strpos($this->af->get('organizer_email'), '@')) {
				$this->ae->addObject('error', Ethna::raiseError('主催者・問合せ先E-Mailが不正です', E_INPUT_TYPE));
			}
		}
		// 主催者・問合せ先 E-Mail
		if (null != $this->af->get('agency_in_japan_email') && '' != $this->af->get('agency_in_japan_email')) {
			if (!strpos($this->af->get('agency_in_japan_email'), '@')
				|| 0 === strpos($this->af->get('agency_in_japan_email'), '@')
				|| strlen($this->af->get('agency_in_japan_email')) - 1 === strpos($this->af->get('agency_in_japan_email'), '@')) {
				$this->ae->addObject('error', Ethna::raiseError('日本国内の照会先E-Mailが不正です', E_INPUT_TYPE));
			}
		}

		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '詳細チェックエラー');
			return 'admin_fairRegist';
		}

		return null;
	}

	/**
	 *  admin_fairChangeDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (Ethna_Util::isDuplicatePost()) {
			// 二重POSTの場合
			$this->backend->getLogger()->log(LOG_WARNING, '二重POST');
			header('Location: '.$this->config->get('url').'?action_admin_fairChange=true&mihon_no='.$this->af->get('mihon_no').'&mode=change');
			return null;
		}

		// JM_FAIRオブジェクトの取得
		$jm_fair =& $this->backend->getObject('JmFair', 'mihon_no', $this->af->get('mihon_no'));
		if (Ethna::isError($jm_fair)) {
			$this->ae->addObject('error', $jm_fair);
			return 'error';
		}

		// トランザクション開始
		$db = $this->backend->getDB();
		$db->db->autocommit(false);
		$db->begin();

		// TEXTAREAの改行コード
		$br = $this->af->get('br');

		// Webページの表示/非表示
		$jm_fair->set('web_display_type', $this->af->get('web_display_type'));

		// 承認フラグ
		$jm_fair->set('confirm_flag', $this->af->get('confirm_flag'));
		$jm_fair->set('negate_comment', $this->af->get('negate_comment'));

		// メール送信フラグ
		$jm_fair->set('mail_send_flag', $this->af->get('mail_send_flag'));

		// ユーザ使用言語フラグ
		$jm_fair->set('use_language_flag', $this->af->get('use_language_flag'));
		$use_language_flag = $this->af->get('use_language_flag');

		// ユーザID
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
		$user_id = $user->get('user_id');
		$jm_fair->set('user_id', $user_id);

		// 申請年月日
		$date_of_application = $this->af->get('date_of_application_y').'/'.$this->af->get('date_of_application_m').'/'.$this->af->get('date_of_application_d');
		$jm_fair->set('date_of_application', $date_of_application);

		// 登録日(承認日)
		$date_of_registration = $this->af->get('date_of_registration_y').'/'.$this->af->get('date_of_registration_m').'/'.$this->af->get('date_of_registration_d');
		$jm_fair->set('date_of_registration', $date_of_registration);

		// 言語選択情報
		$jm_fair->set('select_language_info', $this->af->get('select_language_info'));

		// 見本市名
		$jm_fair->set('fair_title_jp', $this->af->get('fair_title_jp'));
		$jm_fair->set('fair_title_en', $this->af->get('fair_title_en'));

		// 見本市略称
		$jm_fair->set('abbrev_title', $this->af->get('abbrev_title'));

		// 見本市URL
		$jm_fair->set('fair_url', $this->af->get('fair_url'));

		// キャッチフレーズ
		$jm_fair->set('profile_jp', str_replace($br, '<br/>', $this->af->get('profile_jp')));
		$jm_fair->set('profile_en', str_replace($br, '<br/>', $this->af->get('profile_en')));

		// ＰＲ・紹介文
		$jm_fair->set('detailed_information_jp', str_replace($br, '<br/>', $this->af->get('detailed_information_jp')));
		$jm_fair->set('detailed_information_en', str_replace($br, '<br/>', $this->af->get('detailed_information_en')));

		// 会期
		$jm_fair->set('date_from_yyyy', $this->af->get('date_from_yyyy'));
		$jm_fair->set('date_from_mm', $this->af->get('date_from_mm'));
		$jm_fair->set('date_from_dd', $this->af->get('date_from_dd'));
		$jm_fair->set('date_to_yyyy', $this->af->get('date_to_yyyy'));
		$jm_fair->set('date_to_mm', $this->af->get('date_to_mm'));
		$jm_fair->set('date_to_dd', $this->af->get('date_to_dd'));

		// 開催頻度
// 		if ('0' == $use_language_flag) {
			$jm_fair->set('frequency', $this->af->get('frequency_jp'));
// 		} else {
// 			$jm_fair->set('frequency', $this->af->get('frequency_en'));
// 		}

		// 業種
		$jm_fair->set('main_industory_1', $this->af->get('main_industory_1'));
		$jm_fair->set('sub_industory_1', $this->af->get('sub_industory_1'));
		$jm_fair->set('main_industory_2', $this->af->get('main_industory_2'));
		$jm_fair->set('sub_industory_2', $this->af->get('sub_industory_2'));
		$jm_fair->set('main_industory_3', $this->af->get('main_industory_3'));
		$jm_fair->set('sub_industory_3', $this->af->get('sub_industory_3'));
		$jm_fair->set('main_industory_4', $this->af->get('main_industory_4'));
		$jm_fair->set('sub_industory_4', $this->af->get('sub_industory_4'));
		$jm_fair->set('main_industory_5', $this->af->get('main_industory_5'));
		$jm_fair->set('sub_industory_5', $this->af->get('sub_industory_5'));
		$jm_fair->set('main_industory_6', $this->af->get('main_industory_6'));
		$jm_fair->set('sub_industory_6', $this->af->get('sub_industory_6'));

		// 出品物
		$jm_fair->set('exhibits_jp', str_replace($br, '<br/>', $this->af->get('exhibits_jp')));
		$jm_fair->set('exhibits_en', str_replace($br, '<br/>', $this->af->get('exhibits_en')));

		// 開催地
// 		if ('0' == $use_language_flag) {
			$jm_fair->set('region', $this->af->get('region_jp'));
			$jm_fair->set('country', $this->af->get('country_jp'));
			$jm_fair->set('city', $this->af->get('city_jp'));
			$jm_fair->set('other_city_jp', $this->af->get('other_city_jp'));
// 		} else {
// 			$jm_fair->set('region', $this->af->get('region_en'));
// 			$jm_fair->set('country', $this->af->get('country_en'));
// 			$jm_fair->set('city', $this->af->get('city_en'));
			$jm_fair->set('other_city_en', $this->af->get('other_city_en'));
// 		}

		// 会場名
		$jm_fair->set('venue_jp', $this->af->get('venue_jp'));
		$jm_fair->set('venue_en', $this->af->get('venue_en'));

		// 展示会で使用する面積（Ｎｅｔ）
		$jm_fair->set('gross_floor_area', $this->af->get('gross_floor_area'));

		// 交通手段
		$jm_fair->set('transportation_jp', $this->af->get('transportation_jp'));
		$jm_fair->set('transportation_en', $this->af->get('transportation_en'));

		// 入場資格
// 		if ('0' == $use_language_flag) {
			$jm_fair->set('open_to', $this->af->get('open_to_jp'));
// 		} else {
// 			$jm_fair->set('open_to', $this->af->get('open_to_en'));
// 		}

		// チケットの入手方法
// 		if ('0' == $use_language_flag) {
			$jm_fair->set('admission_ticket_1', $this->af->get('admission_ticket_1_jp'));
			$jm_fair->set('admission_ticket_2', $this->af->get('admission_ticket_2_jp'));
			$jm_fair->set('admission_ticket_3', $this->af->get('admission_ticket_3_jp'));
			$jm_fair->set('admission_ticket_4', $this->af->get('admission_ticket_4_jp'));
			$jm_fair->set('other_admission_ticket_jp', $this->af->get('other_admission_ticket_jp'));
// 		} else {
// 			$jm_fair->set('admission_ticket_1', $this->af->get('admission_ticket_1_en'));
// 			$jm_fair->set('admission_ticket_2', $this->af->get('admission_ticket_2_en'));
// 			$jm_fair->set('admission_ticket_3', $this->af->get('admission_ticket_3_en'));
// 			$jm_fair->set('admission_ticket_4', $this->af->get('admission_ticket_4_en'));
			$jm_fair->set('other_admission_ticket_en', $this->af->get('other_admission_ticket_en'));
// 		}

		// 過去の実績
		$jm_fair->set('year_of_the_trade_fair', $this->af->get('year_of_the_trade_fair'));
		$jm_fair->set('total_number_of_visitor', $this->af->get('total_number_of_visitor'));
		$jm_fair->set('number_of_foreign_visitor', $this->af->get('number_of_foreign_visitor'));
		$jm_fair->set('total_number_of_exhibitors', $this->af->get('total_number_of_exhibitors'));
		$jm_fair->set('number_of_foreign_exhibitors', $this->af->get('number_of_foreign_exhibitors'));
		$jm_fair->set('net_square_meters', $this->af->get('net_square_meters'));
		$jm_fair->set('spare_field1', $this->af->get('spare_field1'));

		// 出展申込締切日
		$jm_fair->set('app_dead_yyyy', $this->af->get('app_dead_yyyy'));
		$jm_fair->set('app_dead_mm', $this->af->get('app_dead_mm'));
		$jm_fair->set('app_dead_dd', $this->af->get('app_dead_dd'));

		// 主催者・問合せ先
		$jm_fair->set('organizer_jp', $this->af->get('organizer_jp'));
		$jm_fair->set('organizer_en', $this->af->get('organizer_en'));
		$jm_fair->set('organizer_addr', $this->af->get('organizer_addr'));
		$jm_fair->set('organizer_div', $this->af->get('organizer_div'));
		$jm_fair->set('organizer_pers', $this->af->get('organizer_pers'));
		$jm_fair->set('organizer_tel', $this->af->get('organizer_tel'));
		$jm_fair->set('organizer_fax', $this->af->get('organizer_fax'));
		$jm_fair->set('organizer_email', $this->af->get('organizer_email'));

		// 日本国内の照会先
		$jm_fair->set('agency_in_japan_jp', $this->af->get('agency_in_japan_jp'));
		$jm_fair->set('agency_in_japan_en', $this->af->get('agency_in_japan_en'));
		$jm_fair->set('agency_in_japan_addr', $this->af->get('agency_in_japan_addr'));
		$jm_fair->set('agency_in_japan_div', $this->af->get('agency_in_japan_div'));
		$jm_fair->set('agency_in_japan_pers', $this->af->get('agency_in_japan_pers'));
		$jm_fair->set('agency_in_japan_tel', $this->af->get('agency_in_japan_tel'));
		$jm_fair->set('agency_in_japan_fax', $this->af->get('agency_in_japan_fax'));
		$jm_fair->set('agency_in_japan_email', $this->af->get('agency_in_japan_email'));

		// 見本市レポート／URL
		$jm_fair->set('report_link', $this->af->get('report_link'));

		// 世界の展示会場／URL
		$jm_fair->set('venue_link', $this->af->get('venue_link'));

		// 展示会に係わる画像(3点)
		$jm_fair->set('photos_1', $this->af->get('photos_name_1'));
		$jm_fair->set('photos_2', $this->af->get('photos_name_2'));
		$jm_fair->set('photos_3', $this->af->get('photos_name_3'));

		// システム管理者備考欄
		$jm_fair->set('note_for_system_manager', $this->af->get('note_for_system_manager'));

		// データ管理者備考欄:
		$jm_fair->set('note_for_data_manager', $this->af->get('note_for_data_manager'));

		// 削除フラグ
		$jm_fair->set('del_flg', $this->af->get('del_flg'));
		if ('1' == $this->af->get('del_flg')) {
			$jm_fair->set('del_date', date('Y/m/d H:i:s'));
		} else {
			$jm_fair->set('del_date', null);
		}

		// 登録情報
		$jm_fair->set('update_user_id', $this->session->get('user_id'));
		$jm_fair->set('update_date', date('Y/m/d H:i:s'));

		// 入力項目なし
		$jm_fair->set('venue_url', '');
		$jm_fair->set('keyword', '');
		$jm_fair->set('jetro_suport', '');
		$jm_fair->set('jetro_suport_url', '');
		$jm_fair->set('regist_type', '');
//		$jm_fair->set('mihon_no', $this->af->get('mihon_no'));
//		$jm_fair->set('regist_user_id', $this->session->get('user_id'));
//		$jm_fair->set('regist_date', date('Y/m/d H:i:s'));

		// 検索キーワードの作成
		$search_key = '';
		// 申請年月日
		$search_key .= $this->af->get('date_of_application_y').'年'.$this->af->get('date_of_application_m').'月'.$this->af->get('date_of_application_d').'日 ';
		// 登録日(承認日)
		$search_key .= $this->af->get('date_of_registration_y').'年'.$this->af->get('date_of_registration_m').'月'.$this->af->get('date_of_registration_d').'日 ';
		// 見本市番号
		$search_key .= $this->af->get('mihon_no').' ';
		// 見本市名
		$search_key .= $this->af->get('fair_title_jp').' ';
		$search_key .= $this->af->get('fair_title_en').' ';
		// 見本市略称
		$search_key .= $this->af->get('abbrev_title').' ';
		// 見本市URL
		$search_key .= $this->af->get('fair_url').' ';
		// キャッチフレーズ
		$search_key .= str_replace($br, '', $this->af->get('profile_jp')).' ';
		$search_key .= str_replace($br, '', $this->af->get('profile_en')).' ';
		// ＰＲ・紹介文
		$search_key .= str_replace($br, '', $this->af->get('detailed_information_jp')).' ';
		$search_key .= str_replace($br, '', $this->af->get('detailed_information_en')).' ';
		// 会期
		$search_key .= $this->af->get('date_from_yyyy').'年'.$this->af->get('date_from_mm').'月'.$this->af->get('date_from_dd').'日 ';
		$search_key .= $this->af->get('date_to_yyyy').'年'.$this->af->get('date_to_mm').'月'.$this->af->get('date_to_dd').'日 ';
		// 開催頻度
		$jm_code_m_mgr =& $this->backend->getManager('JmCodeM');
		$code = $jm_code_m_mgr->getCode('001', $this->af->get('frequency_jp'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		// 業種
		$main_list = $jm_code_m_mgr->getMainIndustoryList();
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_1'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_1'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_1'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_1'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_1'), '1').' ';
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_2'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_2'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_2'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_2'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_2'), '1').' ';
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_3'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_3'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_3'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_3'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_3'), '1').' ';
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_4'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_4'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_4'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_4'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_4'), '1').' ';
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_5'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_5'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_5'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_5'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_5'), '1').' ';
		$sub_list = $jm_code_m_mgr->getSubIndustoryList($this->af->get('main_industory_6'));
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_6'), '0').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_6'), '0').' ';
		$search_key .= $this->_getMainIndustory($main_list, $this->af->get('main_industory_6'), '1').' ';
		$search_key .= $this->_getSubIndustory($sub_list, $this->af->get('sub_industory_6'), '1').' ';
		// 出品物
		$search_key .= str_replace($br, '', $this->af->get('exhibits_jp')).' ';
		$search_key .= str_replace($br, '', $this->af->get('exhibits_en')).' ';
		// 開催地
		$code = $jm_code_m_mgr->getCode('003', $this->af->get('region_jp'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$code = $jm_code_m_mgr->getCode('003', $this->af->get('region_jp'), $this->af->get('country_jp'), '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$code = $jm_code_m_mgr->getCode('003', $this->af->get('region_jp'), $this->af->get('country_jp'), $this->af->get('city_jp'));
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$search_key .= $this->af->get('other_city_jp').' ';
		$search_key .= $this->af->get('other_city_en').' ';
		// 会場名
		$search_key .= $this->af->get('venue_jp').' ';
		$search_key .= $this->af->get('venue_en').' ';
		// 展示会で使用する面積（Ｎｅｔ）
		$search_key .= $this->af->get('gross_floor_area').' ';
		// 交通手段
		$search_key .= $this->af->get('transportation_jp').' ';
		$search_key .= $this->af->get('transportation_en').' ';
		// 入場資格
		$code = $jm_code_m_mgr->getCode('004', $this->af->get('open_to'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		// チケットの入手方法
		if ('1' == $this->af->get('admission_ticket_1')) {
			$search_key .= '登録の必要なし ';
		}
		if ('1' == $this->af->get('admission_ticket_2')) {
			$search_key .= 'WEBからの事前登録 ';
		}
		if ('1' == $this->af->get('admission_ticket_3')) {
			$search_key .= '主催者・日本の照会先へ問い合わせ ';
		}
		if ('1' == $this->af->get('admission_ticket_3')) {
			$search_key .= '当日会場で入手 ';
		}
		$search_key .= $this->af->get('other_admission_ticket_jp').' ';
		$search_key .= $this->af->get('other_admission_ticket_en').' ';
		// 過去の実績
		$search_key .= $this->af->get('year_of_the_trade_fair').' ';
		$search_key .= $this->af->get('total_number_of_visitor').' ';
		$search_key .= $this->af->get('number_of_foreign_visitor').' ';
		$search_key .= $this->af->get('total_number_of_exhibitors').' ';
		$search_key .= $this->af->get('number_of_foreign_exhibitors').' ';
		$search_key .= $this->af->get('net_square_meters').' ';
		$search_key .= $this->af->get('spare_field1').' ';
		// 出展申込締切日
		$search_key .= $this->af->get('app_dead_yyyy').'年'.$this->af->get('app_dead_mm').'月'.$this->af->get('app_dead_dd').'日 ';
		// 主催者・問合せ先
		$search_key .= $this->af->get('organizer_jp').' ';
		$search_key .= $this->af->get('organizer_en').' ';
		$search_key .= $this->af->get('organizer_tel').' ';
		$search_key .= $this->af->get('organizer_fax').' ';
		$search_key .= $this->af->get('organizer_email').' ';
		$search_key .= $this->af->get('organizer_addr').' ';
		$search_key .= $this->af->get('organizer_div').' ';
		$search_key .= $this->af->get('organizer_pers').' ';
		// 日本国内の照会先
		$search_key .= $this->af->get('agency_in_japan_jp').' ';
		$search_key .= $this->af->get('agency_in_japan_en').' ';
		$search_key .= $this->af->get('agency_in_japan_tel').' ';
		$search_key .= $this->af->get('agency_in_japan_fax').' ';
		$search_key .= $this->af->get('agency_in_japan_email').' ';
		$search_key .= $this->af->get('agency_in_japan_addr').' ';
		$search_key .= $this->af->get('agency_in_japan_div').' ';
		$search_key .= $this->af->get('agency_in_japan_pers').' ';
		// 見本市レポート／URL
		$search_key .= $this->af->get('report_link').' ';
		// 世界の展示会場／URL
		$search_key .= $this->af->get('venue_link').' ';
		// 展示会に係わる画像(3点)
		$search_key .= $this->af->get('photos_name_1').' ';
		$search_key .= $this->af->get('photos_name_2').' ';
		$search_key .= $this->af->get('photos_name_3').' ';
		// システム管理者備考欄
		$search_key .= $this->af->get('note_for_system_manager').' ';
		// データ管理者備考欄
		$search_key .= $this->af->get('note_for_data_manager').' ';
		// 削除
		if ('1' == $this->af->get('del_flg')) {
			$search_key .= '削除 ';
		}
		$jm_fair->set('search_key', $search_key);

		// UPDATE
		$ret = $jm_fair->update();
		if (Ethna::isError($ret)) {
			$this->ae->addObject('error', $ret);
			$db->rollback();
			return 'error';
		}
		$this->af->setApp('mihon_no', $jm_fair->get('mihon_no'));

		// 画像ファイルの削除
		$del_photos_name = $this->af->get('del_photos_name');
		for ($i = 0; $i < count($del_photos_name); $i++) {
			if (null == $del_photos_name[$i] || '' == $del_photos_name[$i]) {
				continue;
			}
			$this->backend->getLogger()->log(LOG_DEBUG, $this->config->get('img_path').$del_photos_name[$i].'削除します。');
			unlink($this->config->get('img_path').$jm_fair->get('mihon_no').'/'.$del_photos_name[$i]);
		}

		// 画像ファイルの保存
		$photos_list = array();
		$idx = 0;
		for ($i = 1; $i <= 3; $i++) {
			$name_list = $this->af->get('photos_name_'.$i);
			for ($j = 1; $j <=3; $j++) {
				$file = $this->af->get('photos_'.$j);
				if (null != $file && $name_list == $file['name']) {
					rename($file['tmp_name'], $this->config->get('img_path').$jm_fair->get('mihon_no').'/'.$file['name']);
					$photos_list[$idx++] = $name_list;
					break;
				}
			}
		}
		$this->af->setApp('photos', $photos_list);

		// JM_FAIR_TEMPにコピー
		$jmFairTempMgr = $this->backend->getManager('jmFairTemp');
		$jmFairTempMgr->copyFair($jm_fair->get('mihon_no'));

		// ログに登録
		$mgr = $this->backend->getManager('adminCommon');
		if ('1' == $this->af->get('del_flg')) {
			$ope_kbn = '4';
		} else {
			$ope_kbn = '3';
		}
		$ret = $mgr->regLog($this->session->get('user_id'), $ope_kbn, '2', $jm_fair->get('mihon_no'));
		if (Ethna::isError($ret)) {
			$this->ae->addObject('error', $ret);
			$db->rollback();
			return 'error';
		}

		// コミット
		$db->commit();

		// 変更画面へ遷移
		header('Location: '.$this->config->get('url').'?action_admin_fairChange=true&mihon_no='.$this->af->get('mihon_no').'&mode=change&success=1');
		return null;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $main_industory_list
	 * @param unknown_type $kbn_2
	 * @param unknown_type $use_language_flag
	 */
	function _getMainIndustory($main_industory_list, $kbn_2, $use_language_flag) {
		$ret = '';
		for ($i = 0; $i < count($main_industory_list); $i++) {
			if ($kbn_2 == $main_industory_list[$i]['kbn_2']) {
				if ('0' == $use_language_flag) {
					$ret = $main_industory_list[$i]['discription_jp'];
				} else {
					$ret = $main_industory_list[$i]['discription_en'];
				}
			}
		}
		return $ret;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $sub_industory_list
	 * @param unknown_type $kbn_3
	 * @param unknown_type $use_language_flag
	 * @return string
	 */
	function _getSubIndustory($sub_industory_list, $kbn_3, $use_language_flag) {
		$ret = '';
		for ($i = 0; $i < count($sub_industory_list); $i++) {
			if ($kbn_3 == $sub_industory_list[$i]['kbn_3']) {
				if ('0' == $use_language_flag) {
					$ret = $sub_industory_list[$i]['discription_jp'];
				} else {
					$ret = $sub_industory_list[$i]['discription_en'];
				}
			}
		}
		return $ret;
	}

}

?>
