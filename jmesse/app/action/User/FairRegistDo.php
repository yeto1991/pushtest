<?php
/**
 *  User/FairRegistDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep1.php';

/**
 *  user_fairRegistDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairRegistDo extends Jmesse_Form_UserFairRegistStep1
{
}

/**
 *  user_fairRegistDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairRegistDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_fairRegistDo Action.
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

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'user_fairRegistStep1';
		}

		if ('2' == $this->af->get('select_language_info')) {
			// 海外への紹介を希望する。

			// Fair Title
			if ('' == $this->af->get('fair_title_en')) {
				$this->ae->add('error', 'Fair Title が入力されていません');
			}

			// Teaser Copy
			if ('' == $this->af->get('profile_en')) {
				$this->ae->add('error', 'Teaser Copy が入力されていません');
			}
			if (500 < mb_strlen($this->af->get('profile_en'))) {
				$this->ae->add('error', 'Teaser Copy は500文字以内にして下さい');
			}

			// Organizer's statement,special features. etc.
			if ('' != $this->af->get('detailed_information_en')) {
				if (1000 < mb_strlen($this->af->get('detailed_information_en'))) {
					$this->ae->add('error', "Organizer's statement,special features. etc. は1000文字以内にして下さい");
				}
			}

			// Exhibits
			if ('' == $this->af->get('exhibits_en')) {
				$this->ae->add('error', 'Exhibits が入力されていません');
			}
			if (300 < mb_strlen($this->af->get('exhibits_en'))) {
				$this->ae->add('error', 'Exhibits は300文字以内にして下さい');
			}

			// City (other)

			// Venue
			if ('' == $this->af->get('venue_en')) {
				$this->ae->add('error', 'Venue が入力されていません');
			}

			// Transportation
			if ('' == $this->af->get('transportation_en')) {
				$this->ae->add('error', 'Transportation が入力されていません');
			}

			// Admission ticket(other)
			$regist_param_1 = $this->session->get('regist_param_1');
			if ('1' != $regist_param_1['admission_ticket_5']) {
				$this->ae->add('error', '「チケットの入手方法」でその他にチェックされていません');
			}

			// Show Management
			if ('' == $this->af->get('organizer_en')) {
				$this->ae->add('error', 'Show Management が入力されていません');
			}

			// Agency in Japan

			// Details of last fair audited by
		}

		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '詳細チェックエラー');
			return 'user_fairRegistStep1';
		}

		return null;
	}

	/**
	 *  user_fairRegistDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// formの情報をsessionに設定
		$this->_setFormToSession();

		// 表示項目をSESSIONからAPPに設定
		$this->_setSessionToApp();

		return 'user_fairRegistDo';
	}

	function _setFromToSession() {
		$regist_param_3 = $this->session->get('regist_param_3');
		if (null == $regist_param_3) {
			$regist_param_3 = array();
		}
		$regist_param_3['fair_title_en'] = $this->af->get('fair_title_en');
		$regist_param_3['profile_en'] = $this->af->get('profile_en');
		$regist_param_3['detailed_information_en'] = $this->af->get('detailed_information_en');
		$regist_param_3['exhibits_en'] = $this->af->get('exhibits_en');
		$regist_param_3['check_other_city_en'] = $this->af->get('check_other_city_en');
		$regist_param_3['other_city_en'] = $this->af->get('other_city_en');
		$regist_param_3['venue_en'] = $this->af->get('venue_en');
		$regist_param_3['transportation_en'] = $this->af->get('transportation_en');
		$regist_param_3['other_admission_ticket_en'] = $this->af->get('other_admission_ticket_en');
		$regist_param_3['organizer_en'] = $this->af->get('organizer_en');
		$regist_param_3['agency_in_japan_en'] = $this->af->get('agency_in_japan_en');
		$regist_param_3['spare_field1'] = $this->af->get('spare_field1');
		$this->session->get('regist_param_3', $regist_param_3);
	}

	function _setSessionToApp() {
		$regist_param_1 = $this->session->get('regist_param_1');
		$this->af->setApp('fair_title_jp', $regist_param_1['fair_title_jp']);
		$this->af->setApp('abbrev_title', $regist_param_1['abbrev_title']);
		$this->af->setApp('fair_url', $regist_param_1['fair_url']);
		$this->af->setApp('date_from_yyyy', $regist_param_1['date_from_yyyy']);
		$this->af->setApp('date_from_mm', $regist_param_1['date_from_mm']);
		$this->af->setApp('date_from_dd', $regist_param_1['date_from_dd']);
		$this->af->setApp('date_to_yyyy', $regist_param_1['date_to_yyyy']);
		$this->af->setApp('date_to_mm', $regist_param_1['date_to_mm']);
		$this->af->setApp('date_to_dd', $regist_param_1['date_to_dd']);
		$this->af->setApp('frequency', $regist_param_1['frequency']);
		$this->af->setApp('main_industory_1', $regist_param_1['main_industory_1']);
		$this->af->setApp('sub_industory_1', $regist_param_1['sub_industory_1']);
		$this->af->setApp('main_industory_name_1', $regist_param_1['main_industory_name_1']);
		$this->af->setApp('sub_industory_name_1', $regist_param_1['sub_industory_name_1']);
		$this->af->setApp('main_industory_2', $regist_param_1['main_industory_2']);
		$this->af->setApp('sub_industory_2', $regist_param_1['sub_industory_2']);
		$this->af->setApp('main_industory_name_2', $regist_param_1['main_industory_name_2']);
		$this->af->setApp('sub_industory_name_2', $regist_param_1['sub_industory_name_2']);
		$this->af->setApp('main_industory_3', $regist_param_1['main_industory_3']);
		$this->af->setApp('sub_industory_3', $regist_param_1['sub_industory_3']);
		$this->af->setApp('main_industory_name_3', $regist_param_1['main_industory_name_3']);
		$this->af->setApp('sub_industory_name_3', $regist_param_1['sub_industory_name_3']);
		$this->af->setApp('main_industory_4', $regist_param_1['main_industory_4']);
		$this->af->setApp('sub_industory_4', $regist_param_1['sub_industory_4']);
		$this->af->setApp('main_industory_name_4', $regist_param_1['main_industory_name_4']);
		$this->af->setApp('sub_industory_name_4', $regist_param_1['sub_industory_name_4']);
		$this->af->setApp('main_industory_5', $regist_param_1['main_industory_5']);
		$this->af->setApp('sub_industory_5', $regist_param_1['sub_industory_5']);
		$this->af->setApp('main_industory_name_5', $regist_param_1['main_industory_name_5']);
		$this->af->setApp('sub_industory_name_5', $regist_param_1['sub_industory_name_5']);
		$this->af->setApp('main_industory_6', $regist_param_1['main_industory_6']);
		$this->af->setApp('sub_industory_6', $regist_param_1['sub_industory_6']);
		$this->af->setApp('main_industory_name_6', $regist_param_1['main_industory_name_6']);
		$this->af->setApp('sub_industory_name_6', $regist_param_1['sub_industory_name_6']);
		$this->af->setApp('check_sub_industory', $regist_param_1['check_sub_industory']);
		$this->af->setApp('exhibits_jp', $regist_param_1['exhibits_jp']);
		$this->af->setApp('region', $regist_param_1['region']);
		$this->af->setApp('country', $regist_param_1['country']);
		$this->af->setApp('city', $regist_param_1['city']);
		$this->af->setApp('other_city_jp', $regist_param_1['other_city_jp']);
		$this->af->setApp('check_other_city_jp', $regist_param_1['check_other_city_jp']);
		$this->af->setApp('venue_jp', $regist_param_1['venue_jp']);
		$this->af->setApp('gross_floor_area', $regist_param_1['gross_floor_area']);
		$this->af->setApp('transportation_jp', $regist_param_1['transportation_jp']);
		$this->af->setApp('open_to', $regist_param_1['open_to']);
		$this->af->setApp('admission_ticket_1', $regist_param_1['admission_ticket_1']);
		$this->af->setApp('admission_ticket_2', $regist_param_1['admission_ticket_2']);
		$this->af->setApp('admission_ticket_3', $regist_param_1['admission_ticket_3']);
		$this->af->setApp('admission_ticket_4', $regist_param_1['admission_ticket_4']);
		$this->af->setApp('admission_ticket_5', $regist_param_1['admission_ticket_5']);
		$this->af->setApp('other_admission_ticket_jp', $regist_param_1['other_admission_ticket_jp']);
		$this->af->setApp('app_dead_yyyy', $regist_param_1['app_dead_yyyy']);
		$this->af->setApp('app_dead_mm', $regist_param_1['app_dead_mm']);
		$this->af->setApp('app_dead_dd', $regist_param_1['app_dead_dd']);

		$regist_param_2 = $this->session->get('regist_param_2');
		$this->af->setApp('year_of_the_trade_fair', $regist_param_2['year_of_the_trade_fair']);
		$this->af->setApp('total_number_of_visitor', $regist_param_2['total_number_of_visitor']);
		$this->af->setApp('number_of_foreign_visitor', $regist_param_2['number_of_foreign_visitor']);
		$this->af->setApp('total_number_of_exhibitors', $regist_param_2['total_number_of_exhibitors']);
		$this->af->setApp('number_of_foreign_exhibitors', $regist_param_2['number_of_foreign_exhibitors']);
		$this->af->setApp('net_square_meters', $regist_param_2['net_square_meters']);
		$this->af->setApp('profile_jp', $regist_param_2['profile_jp']);
		$this->af->setApp('detailed_information_jp', $regist_param_2['detailed_information_jp']);
		$this->af->setApp('photos_1', $regist_param_2['photos_1']);
		$this->af->setApp('photos_2', $regist_param_2['photos_2']);
		$this->af->setApp('photos_3', $regist_param_2['photos_3']);
		$this->af->setApp('organizer_jp', $regist_param_2['organizer_jp']);
		$this->af->setApp('organizer_tel', $regist_param_2['organizer_tel']);
		$this->af->setApp('organizer_fax', $regist_param_2['organizer_fax']);
		$this->af->setApp('organizer_email', $regist_param_2['organizer_email']);
		$this->af->setApp('agency_in_japan_jp', $regist_param_2['agency_in_japan_jp']);
		$this->af->setApp('agency_in_japan_tel', $regist_param_2['agency_in_japan_tel']);
		$this->af->setApp('agency_in_japan_fax', $regist_param_2['agency_in_japan_fax']);
		$this->af->setApp('agency_in_japan_email', $regist_param_2['agency_in_japan_email']);

		$regist_param_3 = $this->session->get('regist_param_3');
		$this->af->setApp('select_language_info', $regist_param_3['select_language_info']);
		$this->af->setApp('fair_title_en', $regist_param_3['fair_title_en']);
		$this->af->setApp('profile_en', $regist_param_3['profile_en']);
		$this->af->setApp('detailed_information_en', $regist_param_3['detailed_information_en']);
		$this->af->setApp('exhibits_en', $regist_param_3['exhibits_en']);
		$this->af->setApp('check_other_city_en', $regist_param_3['check_other_city_en']);
		$this->af->setApp('other_city_en', $regist_param_3['other_city_en']);
		$this->af->setApp('venue_en', $regist_param_3['venue_en']);
		$this->af->setApp('transportation_en', $regist_param_3['transportation_en']);
		$this->af->setApp('other_admission_ticket_en', $regist_param_3['other_admission_ticket_en']);
		$this->af->setApp('organizer_en', $regist_param_3['organizer_en']);
		$this->af->setApp('agency_in_japan_en', $regist_param_3['agency_in_japan_en']);
		$this->af->setApp('spare_field1', $regist_param_3['spare_field1']);
	}
}

?>
