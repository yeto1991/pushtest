<?php
/**
 *  User/FairRegistStep2.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep1.php';

/**
 *  user_fairRegistStep2 Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairRegistStep2 extends Jmesse_Form_UserFairRegistStep1
{
}

/**
 *  user_fairRegistStep2 action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairRegistStep2 extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_fairRegistStep2 Action.
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

		// 入力チェック
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'user_fairRegistStep1';
		}

		// 詳細チェック
		// 見本市名
		if ('' == $this->af->get('fair_title_jp')) {
			$this->ae->add('error', '見本市名が入力されていません');
		}

		// 見本市略称

		// 見本市URL
		if (null != $this->af->get('fair_url') && '' != $this->af->get('fair_url')) {
			if (0 !== strpos($this->af->get('fair_url'), 'http')) {
				$this->ae->add('error', '見本市URLはhttp～として下さい');
			}
		}

		// 会期
		if ('' == $this->af->get('date_from_yyyy') || '' == $this->af->get('date_from_mm') || '' == $this->af->get('date_from_dd')) {
			$this->ae->add('error', '会期（開始）が入力されていません');
		}
		if ('' == $this->af->get('date_to_yyyy') || '' == $this->af->get('date_to_mm') || '' == $this->af->get('date_to_dd')) {
			$this->ae->add('error', '会期（終了）が入力されていません');
		}
		if (!checkdate($this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))) {
			$this->ae->add('error', '会期（開始）が正しくありません');
		}
		if (!checkdate($this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
			$this->ae->add('error', '会期（終了）が正しくありません');
		}
		if (mktime(0, 0, 0, $this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))
			> mktime(0, 0, 0, $this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
			$this->ae->add('error', '会期が正しくありません（開始 > 終了）');
		}
		if (time() > mktime(0, 0, 0, $this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
			$this->ae->add('error', '会期（終了）は未来の日付を入力して下さい');
		}

		// 開催頻度
		if ('' == $this->af->get('frequency')) {
			$this->ae->add('error', '開催頻度が入力されていません');
		}

		// 業種
		if ('' == $this->af->get('main_industory_1') || '' == $this->af->get('sub_industory_1')) {
			$this->ae->add('error', '業種が入力されていません');
		}

		// 取扱品目
		if ('' == $this->af->get('exhibits_jp')) {
			$this->ae->add('error', '取扱品目が入力されていません');
		}
		if (300 < mb_strlen($this->af->get('exhibits_jp', 'UTF-8'))) {
			$this->ae->add('error', '取扱品目は300文字以内にして下さい');
		}

		// 開催地
		if ('' == $this->af->get('region') || '' == $this->af->get('country')) {
			$this->ae->add('error', '開催地が入力されていません');
		}
		if ('' == $this->af->get('city') && '' == $this->af->get('other_city')) {
			$this->ae->add('error', '開催地の都市を選択、または、入力して下さい');
		}

		// 会場名
		if ('' == $this->af->get('venue_jp')) {
			$this->ae->add('error', '会場名が入力されていません');
		}

		// 同展示会で使用する面積

		// 会場までの交通手段
		if ('' == $this->af->get('transportation_jp')) {
			$this->ae->add('error', '会場までの交通手段が入力されていません');
		}

		// 入場資格
		if ('' == $this->af->get('open_to')) {
			$this->ae->add('error', '入場資格が入力されていません');
		}

		// チケットの入手方法
		if ('1' != $this->af->get('admission_ticket_1')
			&& '1' != $this->af->get('admission_ticket_2')
			&& '1' != $this->af->get('admission_ticket_3')
			&& '1' != $this->af->get('admission_ticket_4')
			&& '' == $this->af->get('other_admission_ticket_jp')) {
			$this->ae->add('error', 'チケットの入手方法を選択、または、入力して下さい');
		}

		// 出展申込締切日
		if ((null != $this->af->get('app_dead_yyyy') && '' != $this->af->get('app_dead_yyyy'))
			|| (null != $this->af->get('app_dead_mm') && '' != $this->af->get('app_dead_mm'))
			|| (null != $this->af->get('app_dead_dd') && '' != $this->af->get('app_dead_dd'))) {
			if (!checkdate($this->af->get('app_dead_mm'), $this->af->get('app_dead_dd'), $this->af->get('app_dead_yyyy'))) {
				$this->ae->add('error', '出展申込締切日が正しくありません');
			}
		}

		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '詳細チェックエラー');
			return 'user_fairRegistStep1';
		}
		return null;
	}

	/**
	 *  user_fairRegistStep2 action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if ('b' == $this->af->get('mode')) {
			// 戻った場合
			$this->backend->getLogger()->log(LOG_DEBUG, '■戻った場合');
			// sessionの情報をformに設定
			$this->_setSessionToForm();
		} elseif ('c' == $this->af->get('mode')) {
			// 修正の場合
			$this->backend->getLogger()->log(LOG_DEBUG, '■修正場合');
			// sessionの情報をformに設定
			$this->_setSessionToForm();
		} else {
			// formの情報をsessionに設定
			$this->_setFormToSession();
		}

		return 'user_fairRegistStep2';
	}

	function _setFormToSession() {
		$regist_param_1 = $this->session->get('regist_param_1');
		if (null == $regist_param_1) {
			$regist_param_1 = array();
		}
		$regist_param_1['fair_title_jp'] = $this->af->get('fair_title_jp');
		$regist_param_1['abbrev_title'] = $this->af->get('abbrev_title');
		$regist_param_1['fair_url'] = $this->af->get('fair_url');
		$regist_param_1['date_from_yyyy'] = $this->af->get('date_from_yyyy');
		$regist_param_1['date_from_mm'] = $this->af->get('date_from_mm');
		$regist_param_1['date_from_dd'] = $this->af->get('date_from_dd');
		$regist_param_1['date_to_yyyy'] = $this->af->get('date_to_yyyy');
		$regist_param_1['date_to_mm'] = $this->af->get('date_to_mm');
		$regist_param_1['date_to_dd'] = $this->af->get('date_to_dd');
		$regist_param_1['frequency'] = $this->af->get('frequency');
		$regist_param_1['main_industory_1'] = $this->af->get('main_industory_1');
		$regist_param_1['sub_industory_1'] = $this->af->get('sub_industory_1');
		$regist_param_1['main_industory_name_1'] = $this->af->get('main_industory_name_1');
		$regist_param_1['sub_industory_name_1'] = $this->af->get('sub_industory_name_1');
		$regist_param_1['main_industory_2'] = $this->af->get('main_industory_2');
		$regist_param_1['sub_industory_2'] = $this->af->get('sub_industory_2');
		$regist_param_1['main_industory_name_2'] = $this->af->get('main_industory_name_2');
		$regist_param_1['sub_industory_name_2'] = $this->af->get('sub_industory_name_2');
		$regist_param_1['main_industory_3'] = $this->af->get('main_industory_3');
		$regist_param_1['sub_industory_3'] = $this->af->get('sub_industory_3');
		$regist_param_1['main_industory_name_3'] = $this->af->get('main_industory_name_3');
		$regist_param_1['sub_industory_name_3'] = $this->af->get('sub_industory_name_3');
		$regist_param_1['main_industory_4'] = $this->af->get('main_industory_4');
		$regist_param_1['sub_industory_4'] = $this->af->get('sub_industory_4');
		$regist_param_1['main_industory_name_4'] = $this->af->get('main_industory_name_4');
		$regist_param_1['sub_industory_name_4'] = $this->af->get('sub_industory_name_4');
		$regist_param_1['main_industory_5'] = $this->af->get('main_industory_5');
		$regist_param_1['sub_industory_5'] = $this->af->get('sub_industory_5');
		$regist_param_1['main_industory_name_5'] = $this->af->get('main_industory_name_5');
		$regist_param_1['sub_industory_name_5'] = $this->af->get('sub_industory_name_5');
		$regist_param_1['main_industory_6'] = $this->af->get('main_industory_6');
		$regist_param_1['sub_industory_6'] = $this->af->get('sub_industory_6');
		$regist_param_1['main_industory_name_6'] = $this->af->get('main_industory_name_6');
		$regist_param_1['sub_industory_name_6'] = $this->af->get('sub_industory_name_6');
		$regist_param_1['check_sub_industory'] = $this->af->get('check_sub_industory');
		$regist_param_1['exhibits_jp'] = $this->af->get('exhibits_jp');
		$regist_param_1['region'] = $this->af->get('region');
		$regist_param_1['country'] = $this->af->get('country');
		$regist_param_1['city'] = $this->af->get('city');
		$regist_param_1['other_city_jp'] = $this->af->get('other_city_jp');
		$regist_param_1['check_other_city_jp'] = $this->af->get('check_other_city_jp');
		$regist_param_1['venue_jp'] = $this->af->get('venue_jp');
		$regist_param_1['gross_floor_area'] = $this->af->get('gross_floor_area');
		$regist_param_1['transportation_jp'] = $this->af->get('transportation_jp');
		$regist_param_1['open_to'] = $this->af->get('open_to');
		$regist_param_1['admission_ticket_1'] = $this->af->get('admission_ticket_1');
		$regist_param_1['admission_ticket_2'] = $this->af->get('admission_ticket_2');
		$regist_param_1['admission_ticket_3'] = $this->af->get('admission_ticket_3');
		$regist_param_1['admission_ticket_4'] = $this->af->get('admission_ticket_4');
		$regist_param_1['admission_ticket_5'] = $this->af->get('admission_ticket_5');
		$regist_param_1['other_admission_ticket_jp'] = $this->af->get('other_admission_ticket_jp');
		$regist_param_1['app_dead_yyyy'] = $this->af->get('app_dead_yyyy');
		$regist_param_1['app_dead_mm'] = $this->af->get('app_dead_mm');
		$regist_param_1['app_dead_dd'] = $this->af->get('app_dead_dd');
		$this->session->set('regist_param_1', $regist_param_1);
	}

	function _setSessionToForm() {
		$regist_param_2 = $this->session->get('regist_param_2');
		if (null == $regist_param_2) {
			return ;
		}
		$this->af->set('year_of_the_trade_fair', $regist_param_2['year_of_the_trade_fair']);
		$this->af->set('total_number_of_visitor', $regist_param_2['total_number_of_visitor']);
		$this->af->set('number_of_foreign_visitor', $regist_param_2['number_of_foreign_visitor']);
		$this->af->set('total_number_of_exhibitors', $regist_param_2['total_number_of_exhibitors']);
		$this->af->set('number_of_foreign_exhibitors', $regist_param_2['number_of_foreign_exhibitors']);
		$this->af->set('net_square_meters', $regist_param_2['net_square_meters']);
		$this->af->set('profile_jp', $regist_param_2['profile_jp']);
		$this->af->set('detailed_information_jp', $regist_param_2['detailed_information_jp']);
// 		$this->af->set('photos_1', $regist_param_2['photos_1']);
// 		$this->af->set('photos_2', $regist_param_2['photos_2']);
// 		$this->af->set('photos_3', $regist_param_2['photos_3']);
		$this->af->set('organizer_jp', $regist_param_2['organizer_jp']);
		$this->af->set('organizer_tel', $regist_param_2['organizer_tel']);
		$this->af->set('organizer_fax', $regist_param_2['organizer_fax']);
		$this->af->set('organizer_email', $regist_param_2['organizer_email']);
		$this->af->set('agency_in_japan_jp', $regist_param_2['agency_in_japan_jp']);
		$this->af->set('agency_in_japan_tel', $regist_param_2['agency_in_japan_tel']);
		$this->af->set('agency_in_japan_fax', $regist_param_2['agency_in_japan_fax']);
		$this->af->set('agency_in_japan_email', $regist_param_2['agency_in_japan_email']);
		$this->session->set('regist_param_2', null);

		$regist_param_1 = $this->session->get('regist_param_1');
		if (null == $regist_param_1) {
			return;
		}
		$this->af->set('fair_title_jp', $regist_param_1['fair_title_jp']);
	}
}

?>
