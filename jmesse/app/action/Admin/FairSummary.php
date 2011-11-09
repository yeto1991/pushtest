<?php
/**
 *  Admin/FairSummary.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairSearch.php';

/**
 *  admin_fairSummary Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminFairSummary extends Jmesse_Form_AdminFairSearch
{
}

/**
 *  admin_fairSummary action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminFairSummary extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_fairSummary Action.
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
			$this->af->set('function', $this->config->get('url').'?action_admin_fairSearch=true');
			return 'admin_Login';
		}
		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'admin_fairSearch';
		}

		// 日付の整合性
		// 申請年月日
		if ((null != $this->af->get('date_of_application_y_from') && '' != $this->af->get('date_of_application_y_from'))
			|| (null != $this->af->get('date_of_application_m_from') && '' != $this->af->get('date_of_application_m_from'))
			|| (null != $this->af->get('date_of_application_d_from') && '' != $this->af->get('date_of_application_d_from'))) {
			if (!checkdate($this->af->get('date_of_application_m_from'), $this->af->get('date_of_application_d_from'), $this->af->get('date_of_application_y_from'))) {
				$this->ae->addObject('error', Ethna::raiseError('申請年月日が正しくありません（開始）', E_INPUT_TYPE));
			}
		}
		if ((null != $this->af->get('date_of_application_y_to') && '' != $this->af->get('date_of_application_y_to')
			|| (null != $this->af->get('date_of_application_m_to') && '' != $this->af->get('date_of_application_m_to'))
			|| (null != $this->af->get('date_of_application_d_to') && '' != $this->af->get('date_of_application_d_to')))) {
			if (!checkdate($this->af->get('date_of_application_m_to'), $this->af->get('date_of_application_d_to'), $this->af->get('date_of_application_y_to'))) {
				$this->ae->addObject('error', Ethna::raiseError('申請年月日が正しくありません（終了）', E_INPUT_TYPE));
			}
		}
		if (((null != $this->af->get('date_of_application_y_from') && '' != $this->af->get('date_of_application_y_from'))
			|| (null != $this->af->get('date_of_application_m_from') && '' != $this->af->get('date_of_application_m_from'))
			|| (null != $this->af->get('date_of_application_d_from') && '' != $this->af->get('date_of_application_d_from')))
			&& ((null != $this->af->get('date_of_application_y_to') && '' != $this->af->get('date_of_application_y_to'))
			|| (null != $this->af->get('date_of_application_m_to') && '' != $this->af->get('date_of_application_m_to'))
			|| (null != $this->af->get('date_of_application_d_to') && '' != $this->af->get('date_of_application_d_to')))) {
			if (mktime(0, 0, 0, $this->af->get('date_of_application_m_from'), $this->af->get('date_of_application_d_from'), $this->af->get('date_of_application_y_from'))
				> mktime(0, 0, 0, $this->af->get('date_of_application_m_to'), $this->af->get('date_of_application_d_to'), $this->af->get('date_of_application_y_to'))) {
				$this->ae->addObject('error', Ethna::raiseError('申請年月日が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}
		// 登録日(承認日)
		if ((null != $this->af->get('date_of_registration_y_from') && '' != $this->af->get('date_of_registration_y_from'))
			|| (null != $this->af->get('date_of_registration_m_from') && '' != $this->af->get('date_of_registration_m_from'))
			|| (null != $this->af->get('date_of_registration_d_from') && '' != $this->af->get('date_of_registration_d_from'))) {
			if (!checkdate($this->af->get('date_of_registration_m_from'), $this->af->get('date_of_registration_d_from'), $this->af->get('date_of_registration_y_from'))) {
				$this->ae->addObject('error', Ethna::raiseError('登録日(承認日)が正しくありません', E_INPUT_TYPE));
			}
		}
		if ((null != $this->af->get('date_of_registration_y_to') && '' != $this->af->get('date_of_registration_y_to'))
			|| (null != $this->af->get('date_of_registration_m_to') && '' != $this->af->get('date_of_registration_m_to'))
			|| (null != $this->af->get('date_of_registration_d_to') && '' != $this->af->get('date_of_registration_d_to'))) {
			if (!checkdate($this->af->get('date_of_registration_m_to'), $this->af->get('date_of_registration_d_to'), $this->af->get('date_of_registration_y_to'))) {
				$this->ae->addObject('error', Ethna::raiseError('登録日(承認日)が正しくありません', E_INPUT_TYPE));
			}
		}
		if (((null != $this->af->get('date_of_registration_y_from') && '' != $this->af->get('date_of_registration_y_from'))
			|| (null != $this->af->get('date_of_registration_m_from') && '' != $this->af->get('date_of_registration_m_from'))
			|| (null != $this->af->get('date_of_registration_d_from') && '' != $this->af->get('date_of_registration_d_from')))
			&& ((null != $this->af->get('date_of_registration_y_to') && '' != $this->af->get('date_of_registration_y_to'))
			|| (null != $this->af->get('date_of_registration_m_to') && '' != $this->af->get('date_of_registration_m_to'))
			|| (null != $this->af->get('date_of_registration_d_to') && '' != $this->af->get('date_of_registration_d_to')))) {
			if (mktime(0, 0, 0, $this->af->get('date_of_registration_m_from'), $this->af->get('date_of_registration_d_from'), $this->af->get('date_of_registration_y_from'))
				> mktime(0, 0, 0, $this->af->get('date_of_registration_m_to'), $this->af->get('date_of_registration_d_to'), $this->af->get('date_of_registration_y_to'))) {
				$this->ae->addObject('error', Ethna::raiseError('登録日(承認日)が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}
		// 会期
		if ((null != $this->af->get('date_from_yyyy') && '' != $this->af->get('date_from_yyyy'))
			|| (null != $this->af->get('date_from_mm') && '' != $this->af->get('date_from_mm'))
			|| (null != $this->af->get('date_from_dd') && '' != $this->af->get('date_from_dd'))) {
			if (!checkdate($this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('会期（開始）が正しくありません', E_INPUT_TYPE));
			}
		}
		if ((null != $this->af->get('date_to_yyyy') && '' != $this->af->get('date_to_yyyy'))
			|| (null != $this->af->get('date_to_mm') && '' != $this->af->get('date_to_mm'))
			|| (null != $this->af->get('date_to_dd') && '' != $this->af->get('date_to_dd'))) {
			if (!checkdate($this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('会期（終了）が正しくありません', E_INPUT_TYPE));
			}
		}
		if (((null != $this->af->get('date_from_yyyy') && '' != $this->af->get('date_from_yyyy'))
			|| (null != $this->af->get('date_from_mm') && '' != $this->af->get('date_from_mm'))
			|| (null != $this->af->get('date_from_dd') && '' != $this->af->get('date_from_dd')))
			&& ((null != $this->af->get('date_to_yyyy') && '' != $this->af->get('date_to_yyyy'))
			|| (null != $this->af->get('date_to_mm') && '' != $this->af->get('date_to_mm'))
			|| (null != $this->af->get('date_to_dd') && '' != $this->af->get('date_to_dd')))) {
			if (mktime(0, 0, 0, $this->af->get('date_from_mm'), $this->af->get('date_from_dd'), $this->af->get('date_from_yyyy'))
				> mktime(0, 0, 0, $this->af->get('date_to_mm'), $this->af->get('date_to_dd'), $this->af->get('date_to_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('会期が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}
		// 数値の大小
		// 見本市番号
		if (null != $this->af->get('mihon_no_from') && '' != $this->af->get('mihon_no_from')
			&& null != $this->af->get('mihon_no_to') && '' != $this->af->get('mihon_no_to')) {
			if ($this->af->get('mihon_no_from') > $this->af->get('mihon_no_to')) {
				$this->ae->addObject('error', Ethna::raiseError('見本市番号が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 開催予定規模
		if (null != $this->af->get('gross_floor_area_from') && '' != $this->af->get('gross_floor_area_from')
			&& null != $this->af->get('gross_floor_area_to') && '' != $this->af->get('gross_floor_area_to')) {
			if ($this->af->get('gross_floor_area_from') > $this->af->get('gross_floor_area_to')) {
				$this->ae->addObject('error', Ethna::raiseError('開催予定規模が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 過去の実績(入場者数)
		if (null != $this->af->get('total_number_of_visitor_from') && '' != $this->af->get('total_number_of_visitor_from')
			&& null != $this->af->get('total_number_of_visitor_to') && '' != $this->af->get('total_number_of_visitor_to')) {
			if ($this->af->get('total_number_of_visitor_from') > $this->af->get('total_number_of_visitor_to')) {
				$this->ae->addObject('error', Ethna::raiseError('過去の実績(入場者数)が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 過去の実績(入場者数(うち海外から))
		if (null != $this->af->get('number_of_foreign_visitor_from') && '' != $this->af->get('number_of_foreign_visitor_from')
			&& null != $this->af->get('number_of_foreign_visitor_to') && '' != $this->af->get('number_of_foreign_visitor_to')) {
			if ($this->af->get('number_of_foreign_visitor_from') > $this->af->get('number_of_foreign_visitor_to')) {
				$this->ae->addObject('error', Ethna::raiseError('過去の実績(入場者数(うち海外から))が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 過去の実績(出展社数)
		if (null != $this->af->get('total_number_of_exhibitors_from') && '' != $this->af->get('total_number_of_exhibitors_from')
			&& null != $this->af->get('total_number_of_exhibitors_to') && '' != $this->af->get('total_number_of_exhibitors_to')) {
			if ($this->af->get('total_number_of_exhibitors_from') > $this->af->get('total_number_of_exhibitors_to')) {
				$this->ae->addObject('error', Ethna::raiseError('過去の実績(出展社数)が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 過去の実績(出展社数(うち海外から))
		if (null != $this->af->get('number_of_foreign_exhibitors_from') && '' != $this->af->get('number_of_foreign_exhibitors_from')
		&& null != $this->af->get('number_of_foreign_exhibitors_to') && '' != $this->af->get('number_of_foreign_exhibitors_to')) {
			if ($this->af->get('number_of_foreign_exhibitors_from') > $this->af->get('number_of_foreign_exhibitors_to')) {
				$this->ae->addObject('error', Ethna::raiseError('過去の実績(出展社数(うち海外から))が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}

		// 集計期間項目
		if ((null != $this->af->get('summary_value_from_yyyy') && '' != $this->af->get('summary_value_from_yyyy'))
		|| (null != $this->af->get('summary_value_from_mm') && '' != $this->af->get('summary_value_from_mm'))
		|| (null != $this->af->get('summary_value_from_dd') && '' != $this->af->get('summary_value_from_dd'))) {
			if (!checkdate($this->af->get('summary_value_from_mm'), $this->af->get('summary_value_from_dd'), $this->af->get('summary_value_from_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('集計期間項目（開始）が正しくありません', E_INPUT_TYPE));
			}
		}
		if ((null != $this->af->get('summary_value_to_yyyy') && '' != $this->af->get('summary_value_to_yyyy'))
		|| (null != $this->af->get('summary_value_to_mm') && '' != $this->af->get('summary_value_to_mm'))
		|| (null != $this->af->get('summary_value_to_dd') && '' != $this->af->get('summary_value_to_dd'))) {
			if (!checkdate($this->af->get('summary_value_to_mm'), $this->af->get('summary_value_to_dd'), $this->af->get('summary_value_to_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('集計期間項目（終了）が正しくありません', E_INPUT_TYPE));
			}
		}
		if (((null != $this->af->get('summary_value_from_yyyy') && '' != $this->af->get('summary_value_from_yyyy'))
		|| (null != $this->af->get('summary_value_from_mm') && '' != $this->af->get('summary_value_from_mm'))
		|| (null != $this->af->get('summary_value_from_dd') && '' != $this->af->get('summary_value_from_dd')))
		&& ((null != $this->af->get('summary_value_to_yyyy') && '' != $this->af->get('summary_value_to_yyyy'))
		|| (null != $this->af->get('summary_value_to_mm') && '' != $this->af->get('summary_value_to_mm'))
		|| (null != $this->af->get('summary_value_to_dd') && '' != $this->af->get('summary_value_to_dd')))) {
			if (mktime(0, 0, 0, $this->af->get('summary_value_from_mm'), $this->af->get('summary_value_from_dd'), $this->af->get('summary_value_from_yyyy'))
			> mktime(0, 0, 0, $this->af->get('summary_value_to_mm'), $this->af->get('summary_value_to_dd'), $this->af->get('summary_value_to_yyyy'))) {
				$this->ae->addObject('error', Ethna::raiseError('集計期間項目が正しくありません（開始 > 終了）', E_INPUT_TYPE));
			}
		}
		//集計キー未選択の場合 集計画面に行かせない。
		if((null == $this->af->get('summary_key1') || '' == $this->af->get('summary_key1'))
			&& (null == $this->af->get('summary_key2') || '' == $this->af->get('summary_key2'))
			&& (null == $this->af->get('summary_key3') || '' == $this->af->get('summary_key3'))
			&& (null == $this->af->get('summary_key4') || '' == $this->af->get('summary_key4'))
			&& (null == $this->af->get('summary_key5') || '' == $this->af->get('summary_key5'))
			&& (null == $this->af->get('summary_value') || '' == $this->af->get('summary_value'))){
			$this->ae->addObject('error', Ethna::raiseError('集計対象項目を設定してください。', E_INPUT_TYPE));
		}
		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, '詳細チェックエラー');
			return 'admin_fairSearch';
		}

		return null;
	}

	/**
	* ソート方向
	*
	*  0:asc
	*  1:desc
	*/
	var $sort_cond = array('昇順', '降順');

	/**
	 * ソート項目
	 *
	 * "0" :ユーザID
	 * "1" :Webページの表示／非表示
	 * "2" :承認フラグ
	 * "3" :否認コメント
	 * "4" :メール送信フラグ
	 * "5" :ユーザ使用言語フラグ
	 * "6" :Eメール
	 * "7" :申請年月日
	 * "8" :登録日(承認日)
	 * "9" :言語選択情報
	 * "10":見本市番号
	 * "11":見本市名(日)
	 * "12":見本市名(英)
	 * "13":見本市略称
	 * "14":見本市URL
	 * "15":キャッチフレーズ(日)
	 * "16":キャッチフレーズ(英)
	 * "17":ＰＲ・紹介文(日)
	 * "18":ＰＲ・紹介文(英)
	 * "19":会期開始年
	 * "20":会期開始月
	 * "21":会期開始日
	 * "22":会期終了年
	 * "23":会期終了月
	 * "24":会期終了日
	 * "25":開催頻度
	 * "26":業種大分類(1)
	 * "27":業種小分類(1)
	 * "28":業種大分類(2)
	 * "29":業種小分類(2)
	 * "30":業種大分類(3)
	 * "31":業種小分類(3)
	 * "32":業種大分類(4)
	 * "33":業種小分類(4)
	 * "34":業種大分類(5)
	 * "35":業種小分類(5)
	 * "36":業種大分類(6)
	 * "37":業種小分類(6)
	 * "38":出品物(日)
	 * "39":出品物(英)
	 * "40":開催地地域
	 * "41":開催地国地域
	 * "42":開催地都市
	 * "43":開催地その他(日)
	 * "44":開催地その他(英)
	 * "45":会場名(日)
	 * "46":会場名(英)
	 * "47":開催予定規模
	 * "48":入場資格
	 * "49":チケットの入手方法(1)
	 * "50":チケットの入手方法(2)
	 * "51":チケットの入手方法(3)
	 * "52":チケットの入手方法(4)
	 * "53":チケットの入手方法その他(日)
	 * "54":チケットの入手方法Others(英)
	 * "55":過去の実績年実績
	 * "56":過去の実績来場者数
	 * "57":過去の実績海外来場者数
	 * "58":過去の実績出展社数
	 * "59":過去の実績海外出展社数
	 * "60":過去の実績開催規模
	 * "61":過去の実績認証機関
	 * "62":主催者・問合せ先名称(日)
	 * "63":主催者・問合せ先名称(英)
	 * "64":主催者・問合せ先TEL
	 * "65":主催者・問合せ先FAX
	 * "66":主催者・問合せ先Email
	 * "67":主催者・問合せ先住所
	 * "68":主催者・問合せ先担当部課
	 * "69":主催者・問合せ先担当者
	 * "70":日本国内の照会先名称(日)
	 * "71":日本国内の照会先名称(英)
	 * "72":日本国内の照会先TEL
	 * "73":日本国内の照会先FAX
	 * "74":日本国内の照会先Email
	 * "75":日本国内の照会先住所
	 * "76":日本国内の照会先担当部課
	 * "77":日本国内の照会先担当者
	 * "78":見本市レポートURL
	 * "79":世界の展示会場URL
	 * "80":展示会に係わる画像名称1
	 * "81":展示会に係わる画像名称2
	 * "82":展示会に係わる画像名称3
	 * "83":システム管理者備考欄
	 * "84":データ管理者備考欄
	 * "85":削除フラグ
	 * "86":登録者ID
	 * "87":更新者ID
	 * "88":削除日時
	 * "89":登録日
	 * "90":更新日
	 *
	 */
	var $sort_column = array(
		'ユーザID',
		'Webページの表示／非表示',
		'承認フラグ',
		'否認コメント',
		'メール送信フラグ',
		'ユーザ使用言語フラグ',
		'Eメール',
		'申請年月日',
		'登録日(承認日)',
		'言語選択情報',
		'見本市番号',
		'見本市名(日)',
		'見本市名(英)',
		'見本市略称',
		'見本市URL',
		'キャッチフレーズ(日)',
		'キャッチフレーズ(英)',
		'ＰＲ・紹介文(日)',
		'ＰＲ・紹介文(英)',
		'会期開始年',
		'会期開始月',
		'会期開始日',
		'会期終了年',
		'会期終了月',
		'会期終了日',
		'開催頻度',
		'業種大分類(1)',
		'業種小分類(1)',
		'業種大分類(2)',
		'業種小分類(2)',
		'業種大分類(3)',
		'業種小分類(3)',
		'業種大分類(4)',
		'業種小分類(4)',
		'業種大分類(5)',
		'業種小分類(5)',
		'業種大分類(6)',
		'業種小分類(6)',
		'出品物(日)',
		'出品物(英)',
		'開催地地域',
		'開催地国地域',
		'開催地都市',
		'開催地その他(日)',
		'開催地その他(英)',
		'会場名(日)',
		'会場名(英)',
		'開催予定規模',
		'入場資格',
		'チケットの入手方法(1)',
		'チケットの入手方法(2)',
		'チケットの入手方法(3)',
		'チケットの入手方法(4)',
		'チケットの入手方法その他(日)',
		'チケットの入手方法Others(英)',
		'過去の実績年実績',
		'過去の実績来場者数',
		'過去の実績海外来場者数',
		'過去の実績出展社数',
		'過去の実績海外出展社数',
		'過去の実績開催規模',
		'過去の実績認証機関',
		'主催者・問合せ先名称(日)',
		'主催者・問合せ先名称(英)',
		'主催者・問合せ先TEL',
		'主催者・問合せ先FAX',
		'主催者・問合せ先Email',
		'主催者・問合せ先住所',
		'主催者・問合せ先担当部課',
		'主催者・問合せ先担当者',
		'日本国内の照会先名称(日)',
		'日本国内の照会先名称(英)',
		'日本国内の照会先TEL',
		'日本国内の照会先FAX',
		'日本国内の照会先Email',
		'日本国内の照会先住所',
		'日本国内の照会先担当部課',
		'日本国内の照会先担当者',
		'見本市レポートURL',
		'世界の展示会場URL',
		'展示会に係わる画像名称1',
		'展示会に係わる画像名称2',
		'展示会に係わる画像名称3',
		'システム管理者備考欄',
		'データ管理者備考欄',
		'削除フラグ',
		'登録者ID',
		'更新者ID',
		'削除日時',
		'登録日',
		'更新日'
	);

	/**
	 *  admin_fairSummary action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// 検索・集計条件をセッションに保存
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
		$search_cond['summary_key1'] = $this->af->get('summary_key1');
		$search_cond['summary_key1_sort_cond'] = $this->af->get('summary_key1_sort_cond');
		$search_cond['summary_key2'] = $this->af->get('summary_key2');
		$search_cond['summary_key2_sort_cond'] = $this->af->get('summary_key2_sort_cond');
		$search_cond['summary_key3'] = $this->af->get('summary_key3');
		$search_cond['summary_key3_sort_cond'] = $this->af->get('summary_key3_sort_cond');
		$search_cond['summary_key4'] = $this->af->get('summary_key4');
		$search_cond['summary_key4_sort_cond'] = $this->af->get('summary_key4_sort_cond');
		$search_cond['summary_key5'] = $this->af->get('summary_key5');
		$search_cond['summary_key5_sort_cond'] = $this->af->get('summary_key5_sort_cond');
		$search_cond['summary_value'] = $this->af->get('summary_value');
		$search_cond['summary_value_from_yyyy'] = $this->af->get('summary_value_from_yyyy');
		$search_cond['summary_value_from_mm'] = $this->af->get('summary_value_from_mm');
		$search_cond['summary_value_from_dd'] = $this->af->get('summary_value_from_dd');
		$search_cond['summary_value_to_yyyy'] = $this->af->get('summary_value_to_yyyy');
		$search_cond['summary_value_to_mm'] = $this->af->get('summary_value_to_mm');
		$search_cond['summary_value_to_dd'] = $this->af->get('summary_value_to_dd');
		$search_cond['summary_value_hani_cond'] = $this->af->get('summary_value_hani_cond');
		$search_cond['summary_value_sort_cond'] = $this->af->get('summary_value_sort_cond');
		$this->session->set('search_cond', $search_cond);
		// 集計ソート条件
		$sort_cond = array();
		$sort_cond['summary_key1'] = $this->af->get('summary_key1');
		$sort_cond['summary_key1_sort_cond'] = $this->af->get('summary_key1_sort_cond');
		$sort_cond['summary_key2'] = $this->af->get('summary_key2');
		$sort_cond['summary_key2_sort_cond'] = $this->af->get('summary_key2_sort_cond');
		$sort_cond['summary_key3'] = $this->af->get('summary_key3');
		$sort_cond['summary_key3_sort_cond'] = $this->af->get('summary_key3_sort_cond');
		$sort_cond['summary_key4'] = $this->af->get('summary_key4');
		$sort_cond['summary_key4_sort_cond'] = $this->af->get('summary_key4_sort_cond');
		$sort_cond['summary_key5'] = $this->af->get('summary_key5');
		$sort_cond['summary_key5_sort_cond'] = $this->af->get('summary_key5_sort_cond');
		$sort_cond['summary_value'] = $this->af->get('summary_value');
		$sort_cond['summary_value_sort_cond'] = $this->af->get('summary_value_sort_cond');
		$this->session->set('sort_cond', $sort_cond);

		// マネージャの取得
		$jm_fair_mgr =& $this->backend->getManager('JmFair');
		// 総件数の取得
		$jm_fair_cnt = $jm_fair_mgr->getFairSummarySearchCnt(); //TODO
		if (0 < $jm_fair_cnt) {
			//集計列の画面項目名設定
			$syukei_retu = array();
			if($this->af->get('summary_key1') != '' || $this->af->get('summary_key1') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_key1')]);
			}
			if($this->af->get('summary_key2') != '' || $this->af->get('summary_key2') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_key2')]);
			}
			if($this->af->get('summary_key3') != '' || $this->af->get('summary_key3') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_key3')]);
			}
			if($this->af->get('summary_key4') != '' || $this->af->get('summary_key4') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_key4')]);
			}
			if($this->af->get('summary_key5') != '' || $this->af->get('summary_key5') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_key5')]);
			}
			if($this->af->get('summary_value') != '' || $this->af->get('summary_value') != null){
				array_push($syukei_retu, $this->sort_column[$this->af->get('summary_value')]);
			}
			$this->af->setApp('syukei_retu', $syukei_retu);

			// ページ設定
			$limit = 100;
			$max_page = floor($jm_fair_cnt / $limit);
			if (0 < $jm_fair_cnt % $limit) {
				$max_page += 1;
			}
			if ('' == $this->af->get('page')) {
				$page = 1;
			} elseif ($max_page < $this->af->get('page')) {
				$page = $max_page;
			} else {
				$page = $this->af->get('page');
			}
			$offset = $limit * ($page - 1);

			//(Groupbyかつ)OrderBy設定
			$sort_cond = $this->session->get('sort_cond');
			$ary_sort = array($sort_cond['summary_key1'], $sort_cond['summary_key2'], $sort_cond['summary_key3'], $sort_cond['summary_key4'], $sort_cond['summary_key5'], $sort_cond['summary_value']);
			$ary_sort_cond = array($sort_cond['summary_key1_sort_cond'], $sort_cond['summary_key2_sort_cond'], $sort_cond['summary_key3_sort_cond'], $sort_cond['summary_key4_sort_cond'], $sort_cond['summary_key5_sort_cond'], $sort_cond['summary_value_sort_cond']);

			// 見本市リストの取得
			$jm_fair_summary_list = $jm_fair_mgr->getFairSummarySearch($offset, $limit, $ary_sort, $ary_sort_cond); //TODO
			// 見本市リスト
			$this->af->setApp('jm_fair_summary_list', $jm_fair_summary_list);
			// 全件数
			$this->af->setApp('total', $jm_fair_cnt);
			// 表示開始
			$this->af->setApp('begin', $offset + 1);
			// 表示件数
			if ($jm_fair_cnt > ($page * $limit)) {
				$this->af->setApp('limit', $limit);
			} else {
				$this->af->setApp('limit', $jm_fair_cnt - (($page - 1) * $limit));
			}
			// ページ
			$this->af->setApp('page', $page);
			$this->af->setApp('page_next', $page + 1);
			$this->af->setApp('page_prev', $page - 1);
			// 検索タイプ
			$this->af->setApp('type', $this->af->get('type'));
			// 最初・最後？
			if (1 == $page) {
				$this->af->setApp('first_page', '1');
			}
			if ($max_page == $page) {
				$this->af->setApp('last_page', '1');
			}
		} else {
			// 見本市リスト
			$this->af->setApp('$jm_fair_summary_list', null);
			// 全件数
			$this->af->setApp('total', 0);
			// 表示開始
			$this->af->setApp('begin', 0);
			// 表示件数
			$this->af->setApp('limit', 0);
			// ページ
			$this->af->setApp('page', 1);
			$this->af->setApp('page_next', $page + 1);
			$this->af->setApp('page_prev', $page - 1);
			// 検索タイプ
			$this->af->setApp('type', $this->af->get('type'));
			// 最初・最後？
			$this->af->setApp('first_page', '1');
			$this->af->setApp('last_page', '1');
		}

		// エラー判定
		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, 'システムエラー');
			return 'error';
		}

		return 'admin_fairSummary';
	}
}

?>
