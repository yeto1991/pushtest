<?php
/**
 *  User/FairDetail.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep1.php';

/**
 *  user_fairDetail Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairDetail extends Jmesse_ActionForm
{
}

/**
 *  user_fairDetail action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairDetail extends Jmesse_ActionClass
{
	/**
	*  preprocess of user_fairDetail Action.
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
			$this->af->set('function', $this->config->get('host_path').$_SERVER[REQUEST_URI]);
			return 'user_Login';
		}
		return null;
	}

	/**
	*  user_fairDetail action implementation.
	*
	*  @access public
	*  @return string  forward name.
	*/
	function perform()
	{
		$jm_fair =& $this->backend->getObject('JmFair', 'mihon_no', $this->af->get('mihon_no'));
		if (Ethna::isError($jm_fair)) {
			$this->ae->addObject('error', $jm_fair);
			$this->backend->getLogger()->log(LOG_ERR, '展示会情報テーブル検索エラー');
			return 'error';
		}

		//Form値設定
		$this->af->set('mode', 'change'); //編集開始遷移用
		$this->af->set('user_id', $this->session->get('user_id'));
		$this->af->set('fair_title_jp', $jm_fair->get('fair_title_jp'));
		$this->af->set('abbrev_title', $jm_fair->get('abbrev_title'));
		$this->af->set('fair_url', $jm_fair->get('fair_url'));
		$this->af->set('date_from_yyyy', $jm_fair->get('date_from_yyyy'));
		$this->af->set('date_from_mm', $jm_fair->get('date_from_mm'));
		$this->af->set('date_from_dd', $jm_fair->get('date_from_dd'));
		$this->af->set('date_to_yyyy', $jm_fair->get('date_to_yyyy'));
		$this->af->set('date_to_mm', $jm_fair->get('date_to_mm'));
		$this->af->set('date_to_dd', $jm_fair->get('date_to_dd'));
		$this->af->set('frequency', $jm_fair->get('frequency'));
		$this->af->set('main_industory_1', $jm_fair->get('main_industory_1'));
		$this->af->set('sub_industory_1', $jm_fair->get('sub_industory_1'));
		$this->af->set('main_industory_name_1', $jm_fair->get('main_industory_name_1'));
		$this->af->set('sub_industory_name_1', $jm_fair->get('sub_industory_name_1'));
		$this->af->set('main_industory_2', $jm_fair->get('main_industory_2'));
		$this->af->set('sub_industory_2', $jm_fair->get('sub_industory_2'));
		$this->af->set('main_industory_name_2', $jm_fair->get('main_industory_name_2'));
		$this->af->set('sub_industory_name_2', $jm_fair->get('sub_industory_name_2'));
		$this->af->set('main_industory_3', $jm_fair->get('main_industory_3'));
		$this->af->set('sub_industory_3', $jm_fair->get('sub_industory_3'));
		$this->af->set('main_industory_name_3', $jm_fair->get('main_industory_name_3'));
		$this->af->set('sub_industory_name_3', $jm_fair->get('sub_industory_name_3'));
		$this->af->set('main_industory_4', $jm_fair->get('main_industory_4'));
		$this->af->set('sub_industory_4', $jm_fair->get('sub_industory_4'));
		$this->af->set('main_industory_name_4', $jm_fair->get('main_industory_name_4'));
		$this->af->set('sub_industory_name_4', $jm_fair->get('sub_industory_name_4'));
		$this->af->set('main_industory_5', $jm_fair->get('main_industory_5'));
		$this->af->set('sub_industory_5', $jm_fair->get('sub_industory_5'));
		$this->af->set('main_industory_name_5', $jm_fair->get('main_industory_name_5'));
		$this->af->set('sub_industory_name_5', $jm_fair->get('sub_industory_name_5'));
		$this->af->set('main_industory_6', $jm_fair->get('main_industory_6'));
		$this->af->set('sub_industory_6', $jm_fair->get('sub_industory_6'));
		$this->af->set('main_industory_name_6', $jm_fair->get('main_industory_name_6'));
		$this->af->set('sub_industory_name_6', $jm_fair->get('sub_industory_name_6'));
		$this->af->set('exhibits_jp', $jm_fair->get('exhibits_jp'));
		$this->af->set('region', $jm_fair->get('region'));
		$this->af->set('country', $jm_fair->get('country'));
		$this->af->set('city', $jm_fair->get('city'));
		$this->af->set('other_city_jp', $jm_fair->get('other_city_jp'));
		$this->af->set('check_other_city_jp', $jm_fair->get('check_other_city_jp'));
		$this->af->set('venue_jp', $jm_fair->get('venue_jp'));
		$this->af->set('gross_floor_area', $jm_fair->get('gross_floor_area'));
		$this->af->set('transportation_jp', $jm_fair->get('transportation_jp'));
		$this->af->set('open_to', $jm_fair->get('open_to'));
		$this->af->set('admission_ticket_1', $jm_fair->get('admission_ticket_1'));
		$this->af->set('admission_ticket_2', $jm_fair->get('admission_ticket_2'));
		$this->af->set('admission_ticket_3', $jm_fair->get('admission_ticket_3'));
		$this->af->set('admission_ticket_4', $jm_fair->get('admission_ticket_4'));
		$this->af->set('admission_ticket_5', $jm_fair->get('admission_ticket_5'));
		$this->af->set('other_admission_ticket_jp', $jm_fair->get('other_admission_ticket_jp'));
		$this->af->set('app_dead_yyyy', $jm_fair->get('app_dead_yyyy'));
		$this->af->set('app_dead_mm', $jm_fair->get('app_dead_mm'));
		$this->af->set('app_dead_dd', $jm_fair->get('app_dead_dd'));
		$this->af->set('year_of_the_trade_fair', $jm_fair->get('year_of_the_trade_fair'));
		$this->af->set('total_number_of_visitor', $jm_fair->get('total_number_of_visitor'));
		$this->af->set('number_of_foreign_visitor', $jm_fair->get('number_of_foreign_visitor'));
		$this->af->set('total_number_of_exhibitors', $jm_fair->get('total_number_of_exhibitors'));
		$this->af->set('number_of_foreign_exhibitors', $jm_fair->get('number_of_foreign_exhibitors'));
		$this->af->set('net_square_meters', $jm_fair->get('net_square_meters'));
		$this->af->set('profile_jp', $jm_fair->get('profile_jp'));
		$this->af->set('detailed_information_jp', $jm_fair->get('detailed_information_jp'));
		$this->af->set('photos_1', $jm_fair->get('photos_1'));
		$this->af->set('photos_2', $jm_fair->get('photos_2'));
		$this->af->set('photos_3', $jm_fair->get('photos_3'));
		$this->af->set('organizer_jp', $jm_fair->get('organizer_jp'));
		$this->af->set('organizer_tel', $jm_fair->get('organizer_tel'));
		$this->af->set('organizer_fax', $jm_fair->get('organizer_fax'));
		$this->af->set('organizer_email', $jm_fair->get('organizer_email'));
		$this->af->set('agency_in_japan_jp', $jm_fair->get('agency_in_japan_jp'));
		$this->af->set('agency_in_japan_tel', $jm_fair->get('agency_in_japan_tel'));
		$this->af->set('agency_in_japan_fax', $jm_fair->get('agency_in_japan_fax'));
		$this->af->set('agency_in_japan_email', $jm_fair->get('agency_in_japan_email'));
		$this->af->set('select_language_info', $jm_fair->get('select_language_info'));
		$this->af->set('fair_title_en', $jm_fair->get('fair_title_en'));
		$this->af->set('profile_en', $jm_fair->get('profile_en'));
		$this->af->set('detailed_information_en', $jm_fair->get('detailed_information_en'));
		$this->af->set('exhibits_en', $jm_fair->get('exhibits_en'));
		$this->af->set('check_other_city_en', $jm_fair->get('check_other_city_en'));
		$this->af->set('other_city_en', $jm_fair->get('other_city_en'));
		$this->af->set('venue_en', $jm_fair->get('venue_en'));
		$this->af->set('transportation_en', $jm_fair->get('transportation_en'));
		$this->af->set('other_admission_ticket_en', $jm_fair->get('other_admission_ticket_en'));
		$this->af->set('organizer_en', $jm_fair->get('organizer_en'));
		$this->af->set('agency_in_japan_en', $jm_fair->get('agency_in_japan_en'));
		$this->af->set('spare_field1', $jm_fair->get('spare_field1'));

		// ログテーブル登録
		$mgr = $this->backend->getManager('userCommon');
		$ret = $mgr->regLog($this->session->get('user_id'), '1' , '2', $this->af->get('mihon_no'));
		if (Ethna::isError($ret)) {
			$this->ae->addObject('error', $ret);
			$db->rollback();
			return 'error';
		}
		return 'user_fairDetail';
	}
}

?>