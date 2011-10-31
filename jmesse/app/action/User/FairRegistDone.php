<?php
/**
 *  User/FairRegistDone.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep1.php';

/**
 *  user_fairRegistDone Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairRegistDone extends Jmesse_Form_UserFairRegistStep1
{
}

/**
 *  user_fairRegistDone action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairRegistDone extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_fairRegistDone Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ログインチェック
		if (!$this->backend->getManager('userCommon')->isLoginUser()) {
			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
			$this->af->set('');
			return 'user_Login';
		}

		// SESSIONのチェック
		if (null == $this->session->get('regist_param_1')) {
			$this->ae->add('error', '登録画面Step.1の情報がありません');
		}
		if (null == $this->session->get('regist_param_2')) {
			$this->ae->add('error', '登録画面Step.2の情報がありません');
		}
		if (null == $this->session->get('regist_param_3')) {
			$this->ae->add('error', '登録画面Step.3の情報がありません');
		}

		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '不正にアクセスされた可能性があります');
			return 'error';
		}

		return null;
	}

	/**
	 *  user_fairRegistDone action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$url = $this->config->get('url').'?action_user_fairRegistFinish=true';

		if (Ethna_Util::isDuplicatePost()) {
			// 二重POSTの場合
			$this->backend->getLogger()->log(LOG_WARNING, '二重POST');
			header('Location: '.$url);
			return null;
		}

		// トランザクション開始
		$db = $this->backend->getDB();
		$db->db->autocommit(false);
		$db->begin();

		// オブジェクトの取得
		$jm_fair =& $this->backend->getObject('JmFair');

		// SESSIONからOBJECTに設定
		$jm_fair->set('fair_title_jp', $regist_param_1['fair_title_jp']);
		$jm_fair->set('abbrev_title', $regist_param_1['abbrev_title']);
		$jm_fair->set('fair_url', $regist_param_1['fair_url']);
		$jm_fair->set('date_from_yyyy', $regist_param_1['date_from_yyyy']);
		$jm_fair->set('date_from_mm', $regist_param_1['date_from_mm']);
		$jm_fair->set('date_from_dd', $regist_param_1['date_from_dd']);
		$jm_fair->set('date_to_yyyy', $regist_param_1['date_to_yyyy']);
		$jm_fair->set('date_to_mm', $regist_param_1['date_to_mm']);
		$jm_fair->set('date_to_dd', $regist_param_1['date_to_dd']);
		$jm_fair->set('frequency', $regist_param_1['frequency']);
		$jm_fair->set('main_industory_1', $regist_param_1['main_industory_1']);
		$jm_fair->set('sub_industory_1', $regist_param_1['sub_industory_1']);
		$jm_fair->set('main_industory_2', $regist_param_1['main_industory_2']);
		$jm_fair->set('sub_industory_2', $regist_param_1['sub_industory_2']);
		$jm_fair->set('main_industory_3', $regist_param_1['main_industory_3']);
		$jm_fair->set('sub_industory_3', $regist_param_1['sub_industory_3']);
		$jm_fair->set('main_industory_4', $regist_param_1['main_industory_4']);
		$jm_fair->set('sub_industory_4', $regist_param_1['sub_industory_4']);
		$jm_fair->set('main_industory_5', $regist_param_1['main_industory_5']);
		$jm_fair->set('sub_industory_5', $regist_param_1['sub_industory_5']);
		$jm_fair->set('main_industory_6', $regist_param_1['main_industory_6']);
		$jm_fair->set('sub_industory_6', $regist_param_1['sub_industory_6']);
		$jm_fair->set('check_sub_industory', $regist_param_1['check_sub_industory']);
		$jm_fair->set('exhibits_jp', str_replace($br, '<br/>', $regist_param_1['exhibits_jp']));
		$jm_fair->set('region', $regist_param_1['region']);
		$jm_fair->set('country', $regist_param_1['country']);
		$jm_fair->set('city', $regist_param_1['city']);
		$jm_fair->set('other_city_jp', $regist_param_1['other_city_jp']);
		$jm_fair->set('venue_jp', $regist_param_1['venue_jp']);
		$jm_fair->set('gross_floor_area', $regist_param_1['gross_floor_area']);
		$jm_fair->set('transportation_jp', $regist_param_1['transportation_jp']);
		$jm_fair->set('open_to', $regist_param_1['open_to']);
		$jm_fair->set('admission_ticket_1', $regist_param_1['admission_ticket_1']);
		$jm_fair->set('admission_ticket_2', $regist_param_1['admission_ticket_2']);
		$jm_fair->set('admission_ticket_3', $regist_param_1['admission_ticket_3']);
		$jm_fair->set('admission_ticket_4', $regist_param_1['admission_ticket_4']);
		$jm_fair->set('other_admission_ticket_jp', $regist_param_1['other_admission_ticket_jp']);
		$jm_fair->set('app_dead_yyyy', $regist_param_1['app_dead_yyyy']);
		$jm_fair->set('app_dead_mm', $regist_param_1['app_dead_mm']);
		$jm_fair->set('app_dead_dd', $regist_param_1['app_dead_dd']);
		$jm_fair->set('year_of_the_trade_fair', $regist_param_2['year_of_the_trade_fair']);
		$jm_fair->set('total_number_of_visitor', $regist_param_2['total_number_of_visitor']);
		$jm_fair->set('number_of_foreign_visitor', $regist_param_2['number_of_foreign_visitor']);
		$jm_fair->set('total_number_of_exhibitors', $regist_param_2['total_number_of_exhibitors']);
		$jm_fair->set('number_of_foreign_exhibitors', $regist_param_2['number_of_foreign_exhibitors']);
		$jm_fair->set('net_square_meters', $regist_param_2['net_square_meters']);
		$jm_fair->set('profile_jp', str_replace($br, '<br/>', $regist_param_2['profile_jp']));
		$jm_fair->set('detailed_information_jp', str_replace($br, '<br/>', $regist_param_2['detailed_information_jp']));
		$jm_fair->set('photos_1', $regist_param_2['photos_1']['name']);
		$jm_fair->set('photos_2', $regist_param_2['photos_2']['name']);
		$jm_fair->set('photos_3', $regist_param_2['photos_3']['name']);
		$jm_fair->set('organizer_jp', $regist_param_2['organizer_jp']);
		$jm_fair->set('organizer_tel', $regist_param_2['organizer_tel']);
		$jm_fair->set('organizer_fax', $regist_param_2['organizer_fax']);
		$jm_fair->set('organizer_email', $regist_param_2['organizer_email']);
		$jm_fair->set('agency_in_japan_jp', $regist_param_2['agency_in_japan_jp']);
		$jm_fair->set('agency_in_japan_tel', $regist_param_2['agency_in_japan_tel']);
		$jm_fair->set('agency_in_japan_fax', $regist_param_2['agency_in_japan_fax']);
		$jm_fair->set('agency_in_japan_email', $regist_param_2['agency_in_japan_email']);
		$jm_fair->set('select_language_info', $regist_param_3['select_language_info']);
		$jm_fair->set('fair_title_en', $regist_param_3['fair_title_en']);
		$jm_fair->set('profile_en', str_replace($br, '<br/>', $regist_param_3['profile_en']));
		$jm_fair->set('detailed_information_en', str_replace($br, '<br/>', $regist_param_3['detailed_information_en']));
		$jm_fair->set('exhibits_en', str_replace($br, '<br/>', $regist_param_3['exhibits_en']));
		$jm_fair->set('check_other_city_en', $regist_param_3['check_other_city_en']);
		$jm_fair->set('other_city_en', $regist_param_3['other_city_en']);
		$jm_fair->set('venue_en', $regist_param_3['venue_en']);
		$jm_fair->set('transportation_en', $regist_param_3['transportation_en']);
		$jm_fair->set('other_admission_ticket_en', $regist_param_3['other_admission_ticket_en']);
		$jm_fair->set('organizer_en', $regist_param_3['organizer_en']);
		$jm_fair->set('agency_in_japan_en', $regist_param_3['agency_in_japan_en']);
		$jm_fair->set('spare_field1', $regist_param_3['spare_field1']);

		// 付加情報
		$jm_fair->set('date_of_application', date('Y/m/d H:i:s'));
		$jm_fair->set('date_of_registration', date('Y/m/d H:i:s'));

		$jm_fair->set('del_flg', '0');
		$jm_fair->set('regist_user_id', $this->session->get('user_id'));
		$jm_fair->set('regist_date', date('Y/m/d H:i:s'));

		// フリーワード検索用カラム作成
		$jm_fair->set('search_key', $this->_makeSearchKey($jm_fair));

		// INSERT
		$ret = $jm_fair->add();
		if (Ethna::isError($ret)) {
			$msg = 'JM_FAIRテーブルへの登録に失敗しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			$db->rollback();
			return 'error';
		}
		$this->backend->getLogger()->log(LOG_DEBUG, '■new mihon_no : '.$jm_fair->get('mihon_no'));


		// 画像ファイルの保存
		mkdir($this->config->get('img_path').$jm_fair->get('mihon_no'));
		if (null != $regist_param_2['photos_1']) {
			rename($regist_param_2['photos_1']['tmp_name'], $this->config->get('img_path').$jm_fair->get('mihon_no').'/'.$regist_param_2['photos_1']['name']);
		}
		if (null != $regist_param_2['photos_2']) {
			rename($regist_param_2['photos_2']['tmp_name'], $this->config->get('img_path').$jm_fair->get('mihon_no').'/'.$regist_param_2['photos_2']['name']);
		}
		if (null != $regist_param_2['photos_3']) {
			rename($regist_param_2['photos_3']['tmp_name'], $this->config->get('img_path').$jm_fair->get('mihon_no').'/'.$regist_param_2['photos_3']['name']);
		}

		// LOGに記録
		$mgr =& $this->backend->getManager('adminCommon');
		$ret = $mgr->regLog($this->session->get('user_id'), '3', '2', $jm_fair->get('mihon_no'));
		if (Ethna::isError($ret)) {
			$msg = 'JM_LOGテーブルへの登録に失敗しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			$db->rollback();
			return 'error';
		}

		// COMMIT
		$db->commit();

		// SESSIONの削除
		$this->session->set('regist_param_1', null);
		$this->session->set('regist_param_2', null);
		$this->session->set('regist_param_3', null);

		// 画面遷移
		header('Location: '.$url);
		return null;
	}

	function _makeSearchKey($jm_fair) {
		// 検索キーワードの作成
		$br = $this->af->get('br');
		$jm_code_m_mgr =& $this->backend->getManager('JmCodeM');
		$regist_param_1 = $this->session->get('regist_param_1');
		$search_key = '';

		// 申請年月日
		$search_key .= $jm_fair->get('date_of_application_y').'年'.$jm_fair->get('date_of_application_m').'月'.$jm_fair->get('date_of_application_d').'日 ';
		// 登録日(承認日)
		$search_key .= $jm_fair->get('date_of_registration_y').'年'.$jm_fair->get('date_of_registration_m').'月'.$jm_fair->get('date_of_registration_d').'日 ';
		// 見本市番号
 		$search_key .= $jm_fair->get('mihon_no').' ';
		// 見本市名
		$search_key .= $jm_fair->get('fair_title_jp').' ';
		$search_key .= $jm_fair->get('fair_title_en').' ';
		// 見本市略称
		$search_key .= $jm_fair->get('abbrev_title').' ';
		// 見本市URL
		$search_key .= $jm_fair->get('fair_url').' ';
		// キャッチフレーズ
		$search_key .= str_replace($br, '', $jm_fair->get('profile_jp')).' ';
		$search_key .= str_replace($br, '', $jm_fair->get('profile_en')).' ';
		// ＰＲ・紹介文
		$search_key .= str_replace($br, '', $jm_fair->get('detailed_information_jp')).' ';
		$search_key .= str_replace($br, '', $jm_fair->get('detailed_information_en')).' ';
		// 会期
		$search_key .= $jm_fair->get('date_from_yyyy').'年'.$jm_fair->get('date_from_mm').'月'.$jm_fair->get('date_from_dd').'日 ';
		$search_key .= $jm_fair->get('date_to_yyyy').'年'.$jm_fair->get('date_to_mm').'月'.$jm_fair->get('date_to_dd').'日 ';
		// 開催頻度
		$code = $jm_code_m_mgr->getCode('001', $jm_fair->get('frequency_jp'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		// 業種
		$search_key .= $regist_param_1['main_industory_name_1'].' ';
		$search_key .= $regist_param_1['sub_industory_name_1'].' ';
		$search_key .= $regist_param_1['main_industory_name_2'].' ';
		$search_key .= $regist_param_1['sub_industory_name_2'].' ';
		$search_key .= $regist_param_1['main_industory_name_3'].' ';
		$search_key .= $regist_param_1['sub_industory_name_3'].' ';
		$search_key .= $regist_param_1['main_industory_name_4'].' ';
		$search_key .= $regist_param_1['sub_industory_name_4'].' ';
		$search_key .= $regist_param_1['main_industory_name_5'].' ';
		$search_key .= $regist_param_1['sub_industory_name_5'].' ';
		$search_key .= $regist_param_1['main_industory_name_6'].' ';
		$search_key .= $regist_param_1['sub_industory_name_6'].' ';
		// 出品物
		$search_key .= str_replace($br, '', $jm_fair->get('exhibits_jp')).' ';
		$search_key .= str_replace($br, '', $jm_fair->get('exhibits_en')).' ';
		// 開催地
		$code = $jm_code_m_mgr->getCode('003', $jm_fair->get('region_jp'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$code = $jm_code_m_mgr->getCode('003', $jm_fair->get('region_jp'), $jm_fair->get('country_jp'), '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$code = $jm_code_m_mgr->getCode('003', $jm_fair->get('region_jp'), $jm_fair->get('country_jp'), $jm_fair->get('city_jp'));
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		$search_key .= $jm_fair->get('other_city_jp').' ';
		$search_key .= $jm_fair->get('other_city_en').' ';
		// 会場名
		$search_key .= $jm_fair->get('venue_jp').' ';
		$search_key .= $jm_fair->get('venue_en').' ';
		// 展示会で使用する面積（Ｎｅｔ）
		$search_key .= $jm_fair->get('gross_floor_area').' ';
		// 交通手段
		$search_key .= $jm_fair->get('transportation_jp').' ';
		$search_key .= $jm_fair->get('transportation_en').' ';
		// 入場資格
		$code = $jm_code_m_mgr->getCode('004', $jm_fair->get('open_to'), '000', '000');
		$search_key .= $code['discription_jp'].' ';
		$search_key .= $code['discription_en'].' ';
		// チケットの入手方法
		if ('1' == $jm_fair->get('admission_ticket_1')) {
			$search_key .= '登録の必要なし ';
		}
		if ('1' == $jm_fair->get('admission_ticket_2')) {
			$search_key .= 'WEBからの事前登録 ';
		}
		if ('1' == $jm_fair->get('admission_ticket_3')) {
			$search_key .= '主催者・日本の照会先へ問い合わせ ';
		}
		if ('1' == $jm_fair->get('admission_ticket_3')) {
			$search_key .= '当日会場で入手 ';
		}
		$search_key .= $jm_fair->get('other_admission_ticket_jp').' ';
		$search_key .= $jm_fair->get('other_admission_ticket_en').' ';
		// 過去の実績
		$search_key .= $jm_fair->get('year_of_the_trade_fair').' ';
		$search_key .= $jm_fair->get('total_number_of_visitor').' ';
		$search_key .= $jm_fair->get('number_of_foreign_visitor').' ';
		$search_key .= $jm_fair->get('total_number_of_exhibitors').' ';
		$search_key .= $jm_fair->get('number_of_foreign_exhibitors').' ';
		$search_key .= $jm_fair->get('net_square_meters').' ';
		$search_key .= $jm_fair->get('spare_field1').' ';
		// 出展申込締切日
		$search_key .= $jm_fair->get('app_dead_yyyy').'年'.$jm_fair->get('app_dead_mm').'月'.$jm_fair->get('app_dead_dd').'日 ';
		// 主催者・問合せ先
		$search_key .= $jm_fair->get('organizer_jp').' ';
		$search_key .= $jm_fair->get('organizer_en').' ';
		$search_key .= $jm_fair->get('organizer_tel').' ';
		$search_key .= $jm_fair->get('organizer_fax').' ';
		$search_key .= $jm_fair->get('organizer_email').' ';
		// 日本国内の照会先
		$search_key .= $jm_fair->get('agency_in_japan_jp').' ';
		$search_key .= $jm_fair->get('agency_in_japan_en').' ';
		$search_key .= $jm_fair->get('agency_in_japan_tel').' ';
		$search_key .= $jm_fair->get('agency_in_japan_fax').' ';
		$search_key .= $jm_fair->get('agency_in_japan_email').' ';
		// 展示会に係わる画像(3点)
		$search_key .= $jm_fair->get('photos_1').' ';
		$search_key .= $jm_fair->get('photos_2').' ';
		$search_key .= $jm_fair->get('photos_3').' ';

		return $search_key;
	}

}

?>