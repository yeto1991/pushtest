<?php
/**
 *  User/FairRegistStep3.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep1.php';

/**
 *  user_fairRegistStep3 Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairRegistStep3 extends Jmesse_Form_UserFairRegistStep1
{
}

/**
 *  user_fairRegistStep3 action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairRegistStep3 extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_fairRegistStep3 Action.
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

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'user_fairRegistStep1';
		}

		// 対象年

		// 総来場者数
		if ('' != $this->af->get('total_number_of_visitor')
			&& 0 < $this->af->get('total_number_of_visitor')
			&& '' != $this->af->get('number_of_foreign_visitor')
			&& 0 < $this->af->get('number_of_foreign_visitor')) {
			if ($this->af->get('total_number_of_visitor') < $this->af->get('number_of_foreign_visitor')) {
				$this->ae->add('error', '海外からの来場者数は総来場者数より少ない数を入力して下さい');
			}
		}

		// 総出展者数
		if ('' != $this->af->get('total_number_of_exhibitors')
			&& 0 < $this->af->get('total_number_of_exhibitors')
			&& '' != $this->af->get('number_of_foreign_exhibitors')
			&& 0 < $this->af->get('number_of_foreign_exhibitors')) {
			if ($this->af->get('total_number_of_exhibitors') < $this->af->get('number_of_foreign_exhibitors')) {
				$this->ae->add('error', '海外からの出展者数は総出展者数より少ない数を入力して下さい');
			}
		}

		// 展示面積

		// キャッチフレーズ
		if ('' == $this->af->get('profile_jp')) {
			$this->ae->add('error', 'キャッチフレーズが入力されていません');
		}
		if (500 < mb_strlen($this->af->get('profile_jp'))) {
			$this->ae->add('error', 'キャッチフレーズは500文字以内にして下さい');
		}

		// PR・紹介文
		if ('' != $this->af->get('detailed_information_jp')) {
			if (1000 < mb_strlen($this->af->get('detailed_information_jp'))) {
				$this->ae->add('error', 'キャッチフレーズは1000文字以内にして下さい');
			}
		}

		// 見本市の紹介写真
		// gifとjpgのみ


		// 主催者
		if ('' == $this->af->get('organizer_jp')) {
			$this->ae->add('error', '主催者が入力されていません');
		}

		// 主催者連絡先
		if ('' == $this->af->get('organizer_tel') && '' == $this->af->get('organizer_fax') && '' == $this->af->get('organizer_email')) {
			$this->ae->add('error', '主催者連絡先が入力されていません');
		}
		if ('' != $this->af->get('organizer_email')) {
			if (!strpos($this->af->get('organizer_email'), '@')
				|| 0 === strpos($this->af->get('organizer_email'), '@')
				|| strlen($this->af->get('organizer_email')) - 1 === strpos($this->af->get('organizer_email'), '@')) {
				$this->ae->add('error', '主催者連絡先E-Mailが不正です');
			}
		}

		// 日本国内の照会先
		if ('' != $this->af->get('agency_in_japan_email')) {
			if (!strpos($this->af->get('agency_in_japan_email'), '@')
				|| 0 === strpos($this->af->get('agency_in_japan_email'), '@')
				|| strlen($this->af->get('agency_in_japan_email')) - 1 === strpos($this->af->get('agency_in_japan_email'), '@')) {
				$this->ae->add('error', '日本国内の照会先E-Mailが不正です');
			}
		}

		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '詳細チェックエラー');
			return 'user_fairRegistStep1';
		}

		return null;
	}

	/**
	 *  user_fairRegistStep3 action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if ('b' == $this->af->get('type')) {
			// 戻った場合
			$this->backend->getLogger()->log(LOG_DEBUG, '■戻った場合');
			// sessionの情報をformに設定
			$this->_setSessionToForm();
		} elseif ('c' == $this->af->get('type')) {
			// 修正の場合
			$this->backend->getLogger()->log(LOG_DEBUG, '■修正場合');
			// sessionの情報をformに設定
			$this->_setSessionToForm();
		} else {
			// formの情報をsessionに設定
			$this->_setFormToSession();
		}

		return 'user_fairRegistStep3';
	}

	function _setFormToSession() {
		$regist_param_2 = $this->session->get('regist_param_2');
		if (null == $regist_param_2) {
			$regist_param_2 = array();
		}
		$regist_param_2['year_of_the_trade_fair'] = $this->af->get('year_of_the_trade_fair');
		$regist_param_2['total_number_of_visitor'] = $this->af->get('total_number_of_visitor');
		$regist_param_2['number_of_foreign_visitor'] = $this->af->get('number_of_foreign_visitor');
		$regist_param_2['total_number_of_exhibitors'] = $this->af->get('total_number_of_exhibitors');
		$regist_param_2['number_of_foreign_exhibitors'] = $this->af->get('number_of_foreign_exhibitors');
		$regist_param_2['net_square_meters'] = $this->af->get('net_square_meters');
		$regist_param_2['profile_jp'] = $this->af->get('profile_jp');
		$regist_param_2['detailed_information_jp'] = $this->af->get('detailed_information_jp');
		$regist_param_2['photos_1'] = $this->af->get('photos_1');
		$regist_param_2['photos_2'] = $this->af->get('photos_2');
		$regist_param_2['photos_3'] = $this->af->get('photos_3');
		$regist_param_2['organizer_jp'] = $this->af->get('organizer_jp');
		$regist_param_2['organizer_tel'] = $this->af->get('organizer_tel');
		$regist_param_2['organizer_fax'] = $this->af->get('organizer_fax');
		$regist_param_2['organizer_email'] = $this->af->get('organizer_email');
		$regist_param_2['agency_in_japan_jp'] = $this->af->get('agency_in_japan_jp');
		$regist_param_2['agency_in_japan_tel'] = $this->af->get('agency_in_japan_tel');
		$regist_param_2['agency_in_japan_fax'] = $this->af->get('agency_in_japan_fax');
		$regist_param_2['agency_in_japan_email'] = $this->af->get('agency_in_japan_email');
		$this->session->set('regist_param_2', $regist_param_2);

		$regist_param_1 = $this->session->get('regist_param_1');
		if (null == $regist_param_1) {
			$regist_param_1 = array();
		}
		$regist_param_1['fair_title_jp'] = $this->af->get('fair_title_jp');
		$this->session->set('regist_param_1', $regist_param_1);
	}

	function _setSessionToForm() {
		$regist_param_3 = $this->session->get('regist_param_3');
		if (null == $regist_param_3) {
			return;
		}
		$this->af->set('select_language_info', $regist_param_3['select_language_info']);
		$this->af->set('fair_title_en', $regist_param_3['fair_title_en']);
		$this->af->set('profile_en', $regist_param_3['profile_en']);
		$this->af->set('detailed_information_en', $regist_param_3['detailed_information_en']);
		$this->af->set('exhibits_en', $regist_param_3['exhibits_en']);
		$this->af->set('other_city_en', $regist_param_3['other_city_en']);
		$this->af->set('venue_en', $regist_param_3['venue_en']);
		$this->af->set('transportation_en', $regist_param_3['transportation_en']);
		$this->af->set('other_admission_ticket_en', $regist_param_3['other_admission_ticket_en']);
		$this->af->set('organizer_en', $regist_param_3['organizer_en']);
		$this->af->set('agency_in_japan_en', $regist_param_3['agency_in_japan_en']);
		$this->af->set('spare_field1', $regist_param_3['spare_field1']);
		$this->session->set('regist_param_3', null);

		$regist_param_1 = $this->session->get('regist_param_1');
		if (null == $regist_param_1) {
			return;
		}
		$this->af->set('fair_title_jp', $regist_param_1['fair_title_jp']);
	}
}

?>
