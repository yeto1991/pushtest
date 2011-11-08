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

		// SESSIONのチェック
		if (null == $this->session->get('regist_param_1')) {
			$this->ae->add('error', '最初からやり直して下さい');
			return 'error';
		}

		// 戻った場合
		if ('1' == $this->af->get('back')) {
			return null;
		}

		// 見本市番号
		if ('c' == $this->af->get('mode') || 'e' == $this->af->get('mode')) {
			if ('' == $this->af->get('mihon_no')) {
				$this->ae->add('error', '見本市番号がありません');
			}
		}

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
//			return 'user_fairRegistStep2';
		}

		// 見本市名
		if ('' == $this->af->get('fair_title_jp')) {
			$this->ae->add('error', '見本市名が入力されていません');
		}

		// 対象年

		// 総来場者数
		if ('' != $this->af->get('total_number_of_visitor')
			&& 0 < $this->af->get('total_number_of_visitor')
			&& '' != $this->af->get('number_of_foreign_visitor')
			&& 0 < $this->af->get('number_of_foreign_visitor')) {
			if ($this->af->get('total_number_of_visitor') < $this->af->get('number_of_foreign_visitor')) {
				$this->ae->add('error', '総来場者数が正しくありません(全体<海外)');
			}
		}

		// 総出展者数
		if ('' != $this->af->get('total_number_of_exhibitors')
			&& 0 < $this->af->get('total_number_of_exhibitors')
			&& '' != $this->af->get('number_of_foreign_exhibitors')
			&& 0 < $this->af->get('number_of_foreign_exhibitors')) {
			if ($this->af->get('total_number_of_exhibitors') < $this->af->get('number_of_foreign_exhibitors')) {
				$this->ae->add('error', '総出展社数が正しくありません(全体<海外)');
			}
		}

		// 開催規模

		// キャッチフレーズ
		if ('' == $this->af->get('profile_jp')) {
			$this->ae->add('error', 'キャッチフレーズが入力されていません');
		}
// 		if (500 < mb_strlen($this->af->get('profile_jp'))) {
// 			$this->ae->add('error', 'キャッチフレーズは500文字以内にして下さい');
// 		}

		// PR・紹介文
// 		if ('' != $this->af->get('detailed_information_jp')) {
// 			if (1000 < mb_strlen($this->af->get('detailed_information_jp'))) {
// 				$this->ae->add('error', 'PR・紹介文は1000文字以内にして下さい');
// 			}
// 		}

		// 見本市の紹介写真
		// gifとjpgのみ
		$ary_photos = array($this->af->get('photos_1'), $this->af->get('photos_2'), $this->af->get('photos_3'));
		$ary_photos_name = array($this->af->get('photos_name_1'), $this->af->get('photos_name_2'), $this->af->get('photos_name_3'));
		for ($i = 0; $i < count($ary_photos_name); $i++) {
			$photos_name = $ary_photos_name[$i];
			$this->backend->getLogger()->log(LOG_DEBUG, '■$photos_name : '.$photos_name);
			for ($j = 0; $j < count($ary_photos); $j++) {
				$photos = $ary_photos[$j];
				if ('' != $photos_name && $photos['name'] == $photos_name) {
					if ('image/jpeg' != $photos['type'] && 'image/gif' != $photos['type'] && 'image/pjpeg' != $photos['type']) {
						$this->ae->add('error', '見本市の紹介写真はgif、または、jpegのみにして下さい('.$photos['type'].')');
						break;
					}
				}
			}
		}

		// 主催者
		if ('' == $this->af->get('organizer_jp')) {
			$this->ae->add('error', '主催者(日)が入力されていません');
		}
		if ('' == $this->af->get('organizer_en')) {
			$this->ae->add('error', '主催者(英)が入力されていません');
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
			return 'user_fairRegistStep2';
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
		if ('1' == $this->af->get('back')) {
			// 戻った場合
			$this->backend->getLogger()->log(LOG_DEBUG, '■戻った場合');

			// sessionの情報をformに設定
			$this->_setSessionToForm();
		} else {
			if ('c' == $this->af->get('mode') || 'e' == $this->af->get('mode')) {
				// 修正の場合
				$this->backend->getLogger()->log(LOG_DEBUG, '■修正の場合');

				// formの情報をsessionに設定
				$this->_setFormToSession();

				// sessionの情報をformに設定
				$this->_setSessionToForm();

				// 画像の保存
				$this->_savePhotos();
			} else {
				// formの情報をsessionに設定
				$this->_setFormToSession();

				// sessionの情報をformに設定
				$this->_setSessionToForm();

				// 画像の保存
				$this->_savePhotos();
			}
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
		$regist_param_2['photos_name_1'] = $this->af->get('photos_name_1');
		$regist_param_2['photos_name_2'] = $this->af->get('photos_name_2');
		$regist_param_2['photos_name_3'] = $this->af->get('photos_name_3');
		$regist_param_2['del_photos_name'] = $this->af->get('del_photos_name');
		$regist_param_2['organizer_jp'] = $this->af->get('organizer_jp');
		$regist_param_2['organizer_en'] = $this->af->get('organizer_en');
		$regist_param_2['organizer_tel'] = $this->af->get('organizer_tel');
		$regist_param_2['organizer_fax'] = $this->af->get('organizer_fax');
		$regist_param_2['organizer_email'] = $this->af->get('organizer_email');
		$regist_param_2['agency_in_japan_jp'] = $this->af->get('agency_in_japan_jp');
		$regist_param_2['agency_in_japan_en'] = $this->af->get('agency_in_japan_en');
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
// 		$this->af->set('transportation_en', $regist_param_3['transportation_en']);
		$this->af->set('other_admission_ticket_en', $regist_param_3['other_admission_ticket_en']);
		$this->af->set('spare_field1', $regist_param_3['spare_field1']);

		$regist_param_1 = $this->session->get('regist_param_1');
		if (null == $regist_param_1) {
			return;
		}
		$this->af->set('fair_title_jp', $regist_param_1['fair_title_jp']);
	}

	function _savePhotos() {
		// 一時保存ディレクトリ
		if (null == $this->session->get('img_tmp_path') || '' == $this->session->get('img_tmp_path')) {
			$img_tmp_path = $this->config->get('img_path').$this->session->get('user_id').'_'.date(YmdHis);
			$this->backend->getLogger()->log(LOG_DEBUG, '■img_tmp_path : '.$img_tmp_path);
			mkdir($img_tmp_path);
			$this->session->set('img_tmp_path', $img_tmp_path);
		}

		// 削除
		$ary_del_photos_name = $this->af->get('del_photos_name');
		for ($i = 0; $i < count($ary_del_photos_name); $i++) {
			unlink($this->session->get('img_tmp_path').'/'.$ary_del_photos_name[$i]);
		}

		// 保存
		$ary_photos = array($this->af->get('photos_1'), $this->af->get('photos_2'), $this->af->get('photos_3'));
		$ary_photos_name = array($this->af->get('photos_name_1'), $this->af->get('photos_name_2'), $this->af->get('photos_name_3'));
		for ($i = 0; $i < count($ary_photos_name); $i++) {
			$photos_name = $ary_photos_name[$i];
			for ($j = 0; $j < count($ary_photos); $j++) {
				$photos = $ary_photos[$j];
				if ('' != $photos_name && $photos['name'] == $photos_name) {
					rename($photos['tmp_name'], $this->session->get('img_tmp_path').'/'.$photos_name);
					break;
				}
			}
		}
	}
}

?>
