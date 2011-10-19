<?php
/**
 *  Admin/FairList.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairSearch.php';

/**
 *  admin_fairList Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminFairList extends Jmesse_Form_AdminFairSearch
{
}

/**
 *  admin_fairList action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminFairList extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_fairList Action.
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
			$this->af->set('function', $this->config->get('host_path').$_SERVER[REQUEST_URI]);
			return 'admin_Login';
		}

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'admin_fairSearch';
		}

		// 日付の整合性
		// 日付、数値の大小


		return null;
	}

	/**
	 *  admin_fairList action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (null == $this->session->get('search_cond')) {
			// 検索条件をセッションに保存
			$search_cond = array();
			$search_cond['phrases'] = $this->af->get('phrases');
			$search_cond['phrase_connection'] = $this->af->get('phrase_connection');
			$search_cond['connection'] = $this->af->get('connection');
			$search_cond['relation'] = $this->af->get('relation');
			$search_cond['web_display_type'] = $this->af->get('web_display_type');
			$search_cond['confirm_flag'] = $this->af->get('confirm_flag');
			$search_cond['negate_comment'] = $this->af->get('negate_comment');
			$search_cond['negate_comment_cond'] = $this->af->get('negate_comment_cond');
			$search_cond['mail_send_flag'] = $this->af->get('mail_send_flag');
			$search_cond['use_language_flag'] = $this->af->get('use_language_flag');
			$search_cond['email'] = $this->af->get('email');
			$search_cond['email_cond'] = $this->af->get('email_cond');
			$search_cond['date_of_application_y_from'] = $this->af->get('date_of_application_y_from');
			$search_cond['date_of_application_m_from'] = $this->af->get('date_of_application_m_from');
			$search_cond['date_of_application_d_from'] = $this->af->get('date_of_application_d_from');
			$search_cond['date_of_application_y_to'] = $this->af->get('date_of_application_y_to');
			$search_cond['date_of_application_m_to'] = $this->af->get('date_of_application_m_to');
			$search_cond['date_of_application_d_to'] = $this->af->get('date_of_application_d_to');
			$search_cond['date_of_registration_y_from'] = $this->af->get('date_of_registration_y_from');
			$search_cond['date_of_registration_m_from'] = $this->af->get('date_of_registration_m_from');
			$search_cond['date_of_registration_d_from'] = $this->af->get('date_of_registration_d_from');
			$search_cond['date_of_registration_y_to'] = $this->af->get('date_of_registration_y_to');
			$search_cond['date_of_registration_m_to'] = $this->af->get('date_of_registration_m_to');
			$search_cond['date_of_registration_d_to'] = $this->af->get('date_of_registration_d_to');
			$search_cond['select_language_info'] = $this->af->get('select_language_info');
			$search_cond['mihon_no_from'] = $this->af->get('mihon_no_from');
			$search_cond['mihon_no_to'] = $this->af->get('mihon_no_to');
			$search_cond['mihon_no_cond'] = $this->af->get('mihon_no_cond');
			$search_cond['fair_title_jp'] = $this->af->get('fair_title_jp');
			$search_cond['fair_title_jp_cond'] = $this->af->get('fair_title_jp_cond');
			$search_cond['fair_title_en'] = $this->af->get('fair_title_en');
			$search_cond['fair_title_en_cond'] = $this->af->get('fair_title_en_cond');
			$search_cond['abbrev_title'] = $this->af->get('abbrev_title');
			$search_cond['abbrev_title_cond'] = $this->af->get('abbrev_title_cond');
			$search_cond['fair_url'] = $this->af->get('fair_url');
			$search_cond['fair_url_cond'] = $this->af->get('fair_url_cond');
			$search_cond['profile_jp'] = $this->af->get('profile_jp');
			$search_cond['profile_jp_cond'] = $this->af->get('profile_jp_cond');
			$search_cond['profile_en'] = $this->af->get('profile_en');
			$search_cond['profile_en_cond'] = $this->af->get('profile_en_cond');
			$search_cond['detailed_information_jp'] = $this->af->get('detailed_information_jp');
			$search_cond['detailed_information_jp_cond'] = $this->af->get('detailed_information_jp_cond');
			$search_cond['detailed_information_en'] = $this->af->get('detailed_information_en');
			$search_cond['detailed_information_en_cond'] = $this->af->get('detailed_information_en_cond');
			$search_cond['date_from_yyyy'] = $this->af->get('date_from_yyyy');
			$search_cond['date_from_mm'] = $this->af->get('date_from_mm');
			$search_cond['date_from_dd'] = $this->af->get('date_from_dd');
			$search_cond['date_to_yyyy'] = $this->af->get('date_to_yyyy');
			$search_cond['date_to_mm'] = $this->af->get('date_to_mm');
			$search_cond['date_to_dd'] = $this->af->get('date_to_dd');
			$search_cond['frequency'] = $this->af->get('frequency');
			$search_cond['main_industory'] = $this->af->get('main_industory');
			$search_cond['sub_industory'] = $this->af->get('sub_industory');
			$search_cond['main_industory_name'] = $this->af->get('main_industory_name');
			$search_cond['sub_industory_name'] = $this->af->get('sub_industory_name');
			$search_cond['exhibits_jp'] = $this->af->get('exhibits_jp');
			$search_cond['exhibits_jp_cond'] = $this->af->get('exhibits_jp_cond');
			$search_cond['exhibits_en'] = $this->af->get('exhibits_en');
			$search_cond['exhibits_en_cond'] = $this->af->get('exhibits_en_cond');
			$search_cond['region'] = $this->af->get('region');
			$search_cond['country'] = $this->af->get('country');
			$search_cond['city'] = $this->af->get('city');
			$search_cond['city_name'] = $this->af->get('city_name');
			$search_cond['other_city_jp'] = $this->af->get('other_city_jp');
			$search_cond['other_city_jp_cond'] = $this->af->get('other_city_jp_cond');
			$search_cond['other_city_en'] = $this->af->get('other_city_en');
			$search_cond['other_city_en_cond'] = $this->af->get('other_city_en_cond');
			$search_cond['venue_jp'] = $this->af->get('venue_jp');
			$search_cond['venue_jp_cond'] = $this->af->get('venue_jp_cond');
			$search_cond['venue_en'] = $this->af->get('venue_en');
			$search_cond['venue_en_cond'] = $this->af->get('venue_en_cond');
			$search_cond['gross_floor_area_from'] = $this->af->get('gross_floor_area_from');
			$search_cond['gross_floor_area_to'] = $this->af->get('gross_floor_area_to');
			$search_cond['gross_floor_area_cond'] = $this->af->get('gross_floor_area_cond');
			$search_cond['transportation_jp'] = $this->af->get('transportation_jp');
			$search_cond['transportation_jp_cond'] = $this->af->get('transportation_jp_cond');
			$search_cond['transportation_en'] = $this->af->get('transportation_en');
			$search_cond['transportation_en_cond'] = $this->af->get('transportation_en_cond');
			$search_cond['open_to'] = $this->af->get('open_to');
			$search_cond['admission_ticket_1'] = $this->af->get('admission_ticket_1');
			$search_cond['admission_ticket_2'] = $this->af->get('admission_ticket_2');
			$search_cond['admission_ticket_3'] = $this->af->get('admission_ticket_3');
			$search_cond['admission_ticket_4'] = $this->af->get('admission_ticket_4');
			$search_cond['admission_ticket_5'] = $this->af->get('admission_ticket_5');
			$search_cond['other_admission_ticket_jp'] = $this->af->get('other_admission_ticket_jp');
			$search_cond['other_admission_ticket_jp_cond'] = $this->af->get('other_admission_ticket_jp_cond');
			$search_cond['other_admission_ticket_en'] = $this->af->get('other_admission_ticket_en');
			$search_cond['other_admission_ticket_en_cond'] = $this->af->get('other_admission_ticket_en_cond');
			$search_cond['year_of_the_trade_fair'] = $this->af->get('year_of_the_trade_fair');
			$search_cond['year_of_the_trade_fair_cond'] = $this->af->get('year_of_the_trade_fair_cond');
			$search_cond['total_number_of_visitor_from'] = $this->af->get('total_number_of_visitor_from');
			$search_cond['total_number_of_visitor_to'] = $this->af->get('total_number_of_visitor_to');
			$search_cond['total_number_of_visitor_cond'] = $this->af->get('total_number_of_visitor_cond');
			$search_cond['number_of_foreign_visitor_from'] = $this->af->get('number_of_foreign_visitor_from');
			$search_cond['number_of_foreign_visitor_to'] = $this->af->get('number_of_foreign_visitor_to');
			$search_cond['number_of_foreign_visitor_cond'] = $this->af->get('number_of_foreign_visitor_cond');
			$search_cond['total_number_of_exhibitors_from'] = $this->af->get('total_number_of_exhibitors_from');
			$search_cond['total_number_of_exhibitors_to'] = $this->af->get('total_number_of_exhibitors_to');
			$search_cond['total_number_of_exhibitors_cond'] = $this->af->get('total_number_of_exhibitors_cond');
			$search_cond['number_of_foreign_exhibitors_from'] = $this->af->get('number_of_foreign_exhibitors_from');
			$search_cond['number_of_foreign_exhibitors_to'] = $this->af->get('number_of_foreign_exhibitors_to');
			$search_cond['number_of_foreign_exhibitors_cond'] = $this->af->get('number_of_foreign_exhibitors_cond');
			$search_cond['net_square_meters'] = $this->af->get('net_square_meters');
			$search_cond['net_square_meters_cond'] = $this->af->get('net_square_meters_cond');
			$search_cond['spare_field1'] = $this->af->get('spare_field1');
			$search_cond['spare_field1_cond'] = $this->af->get('spare_field1_cond');
			$search_cond['app_dead_yyyy_from'] = $this->af->get('app_dead_yyyy_from');
			$search_cond['app_dead_mm_from'] = $this->af->get('app_dead_mm_from');
			$search_cond['app_dead_dd_from'] = $this->af->get('app_dead_dd_from');
			$search_cond['app_dead_yyyy_to'] = $this->af->get('app_dead_yyyy_to');
			$search_cond['app_dead_mm_to'] = $this->af->get('app_dead_mm_to');
			$search_cond['app_dead_dd_to'] = $this->af->get('app_dead_dd_to');
			$search_cond['organizer_jp'] = $this->af->get('organizer_jp');
			$search_cond['organizer_jp_cond'] = $this->af->get('organizer_jp_cond');
			$search_cond['organizer_en'] = $this->af->get('organizer_en');
			$search_cond['organizer_en_cond'] = $this->af->get('organizer_en_cond');
			$search_cond['organizer_tel'] = $this->af->get('organizer_tel');
			$search_cond['organizer_tel_cond'] = $this->af->get('organizer_tel_cond');
			$search_cond['organizer_fax'] = $this->af->get('organizer_fax');
			$search_cond['organizer_fax_cond'] = $this->af->get('organizer_fax_cond');
			$search_cond['organizer_email'] = $this->af->get('organizer_email');
			$search_cond['organizer_email_cond'] = $this->af->get('organizer_email_cond');
			$search_cond['agency_in_japan_jp'] = $this->af->get('agency_in_japan_jp');
			$search_cond['agency_in_japan_jp_cond'] = $this->af->get('agency_in_japan_jp_cond');
			$search_cond['agency_in_japan_en'] = $this->af->get('agency_in_japan_en');
			$search_cond['agency_in_japan_en_cond'] = $this->af->get('agency_in_japan_en_cond');
			$search_cond['agency_in_japan_tel'] = $this->af->get('agency_in_japan_tel');
			$search_cond['agency_in_japan_tel_cond'] = $this->af->get('agency_in_japan_tel_cond');
			$search_cond['agency_in_japan_fax'] = $this->af->get('agency_in_japan_fax');
			$search_cond['agency_in_japan_fax_cond'] = $this->af->get('agency_in_japan_fax_cond');
			$search_cond['agency_in_japan_email'] = $this->af->get('agency_in_japan_email');
			$search_cond['agency_in_japan_email_cond'] = $this->af->get('agency_in_japan_email_cond');
			$search_cond['report_link'] = $this->af->get('report_link');
			$search_cond['report_link_cond'] = $this->af->get('report_link_cond');
			$search_cond['venue_link'] = $this->af->get('venue_link');
			$search_cond['venue_link_cond'] = $this->af->get('venue_link_cond');
			$search_cond['photos'] = $this->af->get('photos');
			$search_cond['photos_cond'] = $this->af->get('photos_cond');
			$search_cond['note_for_system_manager'] = $this->af->get('note_for_system_manager');
			$search_cond['note_for_system_manager_cond'] = $this->af->get('note_for_system_manager_cond');
			$search_cond['note_for_data_manager'] = $this->af->get('note_for_data_manager');
			$search_cond['note_for_data_manager_cond'] = $this->af->get('note_for_data_manager_cond');
			$this->session->set('search_cond', $search_cond);
		}

		var_dump($this->session->get('search_cond'));
		echo '<br/><br/>';

		// 以降、SESSIONから検索条件を取得する。
		$jm_fair_mgr =& $this->backend->getManager('JmFair');
		$jm_fair_list = $jm_fair_mgr->getFairList();
		$this->af->setApp('jm_fair_list', $jm_fair_list);

		echo 'result<br/><br/>';
		var_dump($jm_fair_list);

		return 'admin_fairList';
	}
}

?>
