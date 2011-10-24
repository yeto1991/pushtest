<?php
/**
 *  FairList.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  fairList Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_FairList extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
		'all' => array(
			'type'        => VAR_TYPE_INT, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '全表示',        // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,               // Maximum value
			'regexp'      => null,    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'type' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => 'メニュータイプ', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 2,               // Maximum value
			'regexp'      => '/^[0-9a-z]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'i_2' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分2(業種)',   // Display name
			'required'    => false,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'i_3' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分3(業種)',   // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'i_4' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分4(業種)',   // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'v_2' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分2(開催地)', // Display name
			'required'    => false,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'v_3' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分3(開催地)', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'v_4' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '区分4',         // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'check_main_industory' => array(
			'type'        => array(VAR_TYPE_STRING), // Input type
			'form_type'   => FORM_TYPE_CHECKBOX, // Form type
			'name'        => '選択（業種(大分類)）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'check_sub_industory' => array(
			'type'        => array(VAR_TYPE_STRING), // Input type
			'form_type'   => FORM_TYPE_CHECKBOX, // Form type
			'name'        => '選択（業種(小分類)）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'check_region' => array(
			'type'        => array(VAR_TYPE_STRING), // Input type
			'form_type'   => FORM_TYPE_CHECKBOX, // Form type
			'name'        => '選択（地域）',  // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'check_country' => array(
			'type'        => array(VAR_TYPE_STRING), // Input type
			'form_type'   => FORM_TYPE_CHECKBOX, // Form type
			'name'        => '選択（国・地域）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'check_city' => array(
			'type'        => array(VAR_TYPE_STRING), // Input type
			'form_type'   => FORM_TYPE_CHECKBOX, // Form type
			'name'        => '選択（都市）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 3,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'year' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_RADIO,  // Form type
			'name'        => '開催時期',      // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 1,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'keyword' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'キーワード',    // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),

		'page' => array(
			'type'        => VAR_TYPE_INT,    // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => 'ページ番号',    // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'limit' => array(
			'type'        => VAR_TYPE_INT,    // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '表示件数',      // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'sort' => array(
			'type'        => VAR_TYPE_INT,    // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => 'ソート順',      // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 1,               // Maximum value
			'regexp'      => '/^[0-9]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
	);
}

/**
 *  fairList action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_FairList extends Jmesse_ActionClass
{
	/**
	 *  preprocess of fairList Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'error';
		}

		$this->backend->getLogger()->log(LOG_DEBUG, '■type : '.$this->af->get('type'));
		$this->backend->getLogger()->log(LOG_DEBUG, '■i_2 : '.$this->af->get('i_2'));
		$this->backend->getLogger()->log(LOG_DEBUG, '■i_3 : '.$this->af->get('i_3'));
		$this->backend->getLogger()->log(LOG_DEBUG, '■v_2 : '.$this->af->get('v_2'));
		$this->backend->getLogger()->log(LOG_DEBUG, '■v_3 : '.$this->af->get('v_3'));
		$this->backend->getLogger()->log(LOG_DEBUG, '■v_4 : '.$this->af->get('v_4'));

		return null;
	}

	/**
	 *  fairList action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$tpl = null;

		// 前検索か否か
		if (1 == $this->af->get('all')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '■全検索');
			// 全検索
			$tpl = $this->_selectAll();
		} else {
			$this->backend->getLogger()->log(LOG_DEBUG, '■条件検索');
			// 条件検索
			$tpl = $this->_selectCond();
		}

		return $tpl;
	}

	function _selectAll() {
		// 絞り込みメニュー設定
		$this->_setMenuSelecte();

		// ページ
		if (null == $this->af->get('page') || '' == $this->af->get('page') || 0 == $this->af->get('page')) {
			$page = 1;
		} else {
			$page = $this->af->get('page');
		}

		// 表示数
		if (null == $this->af->get('limit') || '' == $this->af->get('limit') || 0 == $this->af->get('limit')) {
			$limit = 7;
		} else {
			$limit = $this->af->get('limit');
		}

		// ソート順
		if (null == $this->af->get('sort') || '' == $this->af->get('sort') || 0 == $this->af->get('sort')) {
			$sort = 1;
		} else {
			$sort = $this->af->get('sort');
		}

		// マネージャの取得
		$jm_fair_mgr =& $this->backend->getManager('JmFair');

		// ページ計算
		$tatal = $jm_fair_mgr->getFairListAllCnt();
		$this->backend->getLogger()->log(LOG_DEBUG, '■全件数 : '.$tatal);
		$max_page = floor($tatal / $limit);
		if (0 < $tatal % $limit) {
			$max_page += 1;
		}
		if ($max_page < $page) {
			$page = $max_page;
		}
		$offset = $limit * ($page - 1);
		$this->backend->getLogger()->log(LOG_DEBUG, '■表示開始 : '.$offset);
		$this->backend->getLogger()->log(LOG_DEBUG, '■最大ページ : '.$max_page);

		// ページャー作成
		$this->af->setAppNE('pager', $this->_makePager($this->config->get('url').'?action_fairList=true&all=1&sort='.$sort.'&page=', $page, $max_page));

		// 検索実行
		$this->af->setApp('fair_list', $jm_fair_mgr->getFairListAll($offset, $limit, $sort));

		return 'fairList';
	}

	function _selectCond() {
		$ret = '';
		// ページ送りか絞り込みか
		if (null == $this->af->get('page') || '' == $this->af->get('page') || 0 == $this->af->get('page')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '■絞り込み検索');
			// 絞り込み
			$ret = $this->_breakdown();
		} else {
			$this->backend->getLogger()->log(LOG_DEBUG, '■ページ送り・表示件数変更・ソート変更');
			// ページ送り
			$ret = $this->_paging();
		}
		return $ret;
	}

	function _paging() {
		// 絞り込み（メニュー）部
		$this->_setMenuSelecte();

		// ページ設定
		$page = $this->af->get('pag');

		// デフォルト設定
		// 表示件数
		if (null != $this->af->get('limit') && '' != $this->af->get('limit') && 0 != $this->af->get('limit')) {
			$search_cond['limit'] =  $this->af->get('limit');
		}
		if (null == $search_cond['limit'] || '' == $search_cond['limit'] || 0 == $search_cond['limit']) {
			$search_cond['limit'] =  20;
		}
		$limit = $search_cond['limit'];

		// ソート順
		if (null != $this->af->get('sort') && '' != $this->af->get('sort') && 0 != $this->af->get('sort')) {
			$search_cond['sort'] =  $this->af->get('sort');
		}
		if (null != $search_cond['sort'] && '' != $search_cond['sort'] && 0 != $search_cond['sort']) {
			$search_cond['sort'] =  0;
		}
		$sort = $search_cond['sort'];

		// 検索結果（リスト）部
		// マネージャの取得
		$jm_fair_mgr =& $this->backend->getManager('JmFair');

		// ページ計算
		$tatal = $jm_fair_mgr->getFairListCnt();
		$this->backend->getLogger()->log(LOG_DEBUG, '■全件数 : '.$tatal);
		$max_page = floor($tatal / $limit);
		if (0 < $tatal % $limit) {
			$max_page += 1;
		}
		if ($max_page < $page) {
			$page = $max_page;
		}
		$offset = $limit * ($page - 1);
		$this->backend->getLogger()->log(LOG_DEBUG, '■表示開始 : '.$offset);
		$this->backend->getLogger()->log(LOG_DEBUG, '■最大ページ : '.$max_page);

		// ページャー作成
		$this->af->setAppNE('pager', $this->_makePager($this->config->get('url').'?action_fairList=true&sort='.$sort.'&page=', $page, $max_page));

		// 検索実行
		$this->af->setApp('fair_list', $jm_fair_mgr->getFairList($offset, $limit, $sort));

		return 'fairList';
	}

	function _breakdown() {
		// ページング用に検索条件をSESSIONに保存する。
		$this->_setFormToSession();

		// 絞り込み（メニュー）部
		$this->_setMenuSelecte();

		// ページ設定
		$page = 1;

		// デフォルト設定
		// 表示件数
		if (null != $this->af->get('limit') && '' != $this->af->get('limit') && 0 != $this->af->get('limit')) {
			$search_cond['limit'] =  $this->af->get('limit');
		}
		if (null == $search_cond['limit'] || '' == $search_cond['limit'] || 0 == $search_cond['limit']) {
			$search_cond['limit'] =  20;
		}
		$limit = $search_cond['limit'];

		// ソート順
		if (null != $this->af->get('sort') && '' != $this->af->get('sort') && 0 != $this->af->get('sort')) {
			$search_cond['sort'] =  $this->af->get('sort');
		}
		if (null != $search_cond['sort'] && '' != $search_cond['sort'] && 0 != $search_cond['sort']) {
			$search_cond['sort'] =  0;
		}
		$sort = $search_cond['sort'];

		// 検索結果（リスト）部
		// マネージャの取得
		$jm_fair_mgr =& $this->backend->getManager('JmFair');

		// ページ計算
		$tatal = $jm_fair_mgr->getFairListCnt();
		$this->backend->getLogger()->log(LOG_DEBUG, '■全件数 : '.$tatal);
		$max_page = floor($tatal / $limit);
		if (0 < $tatal % $limit) {
			$max_page += 1;
		}
		if ($max_page < $page) {
			$page = $max_page;
		}
		$offset = $limit * ($page - 1);
		$this->backend->getLogger()->log(LOG_DEBUG, '■表示開始 : '.$offset);
		$this->backend->getLogger()->log(LOG_DEBUG, '■最大ページ : '.$max_page);

		// ページャー作成
		$this->af->setAppNE('pager', $this->_makePager($this->config->get('url').'?action_fairList=true&sort='.$sort.'&page=', $page, $max_page));

		// 検索実行
		$this->af->setApp('fair_list', $jm_fair_mgr->getFairList($offset, $limit, $sort));

		return 'fairList';
	}

	function _setFormToSession() {
		// ページング用に検索条件をSESSIONに保存する。
		$search_cond = null;
		if (!$this->session->isStart()) {
			$this->session->start();
		} else {
			$search_cond = $this->session->get('search_cond');
		}
		if (null == $search_cond) {
			$search_cond = array();
		}
		$search_cond['type'] = $this->af->get('type');
		$search_cond['i_2'] = $this->af->get('i_2');
		$search_cond['i_3'] = $this->af->get('i_3');
		$search_cond['i_4'] = $this->af->get('i_4');
		$search_cond['v_2'] = $this->af->get('v_2');
		$search_cond['v_3'] = $this->af->get('v_3');
		$search_cond['v_4'] = $this->af->get('v_4');
		$search_cond['check_main_industory'] = $this->af->get('check_main_industory');
		$search_cond['check_sub_industory'] = $this->af->get('check_sub_industory');
		$search_cond['check_region'] = $this->af->get('check_region');
		$search_cond['check_country'] = $this->af->get('check_country');
		$search_cond['check_city'] = $this->af->get('check_city');
		$search_cond['year'] = $this->af->get('year');
		$search_cond['keyword'] = $this->af->get('keyword');
		$this->session->set('search_cond', $search_cond);
	}

	function _clearSession() {
		if (!$this->session->isStart()) {
			return;
		}
		$search_cond = $this->session->get('search_cond');
		if (null == $search_cond) {
			return;
		}
		$search_cond['type'] ='';
		$search_cond['i_2'] = '';
		$search_cond['i_3'] = '';
		$search_cond['i_4'] = '';
		$search_cond['v_2'] = '';
		$search_cond['v_3'] = '';
		$search_cond['v_4'] = '';
		$search_cond['check_main_industory'] = '';
		$search_cond['check_sub_industory'] = '';
		$search_cond['check_region'] = '';
		$search_cond['check_country'] = '';
		$search_cond['check_city'] = '';
		$search_cond['year'] = '';
		$search_cond['keyword'] = '';
		$this->session->set('search_cond', $search_cond);
	}

	function _setMenuSelecte() {
		// type : i1:業種（大分類、小分類）表示、v1:開催地（地域）表示、v2:開催地（国・地域、都市）表示
		$search_cond = $this->session->get('search_cond');
		if ('i1' == $search_cond['type']) {
			// 業種選択
			if ('' == $search_cond['i_2']) {
				$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
				$this->ae->add('error', '業種（大区分）指定されていません。');
				return 'error';
			}
			// 業種（小分類）集計値
			$this->af->setApp('sub_industory_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListSubIndustory($search_cond['i_2']));

			// 開催地（地域）集計値
			$this->af->setApp('region_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListRegionIndustory());
			// 開催地（国・地域）集計値
			$this->af->setApp('country_disp_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListCountryDisp());
			$this->af->setApp('country_close_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListCountryClose());

		} elseif ('v1' == $search_cond['type']) {
			// 地域選択
			if ('' == $search_cond['v_2']) {
				$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
				$this->ae->add('error', '地域が指定されていません。');
				return 'error';
			}
			// 開催地（国・地域）集計値
			$this->af->setApp('country_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListCountry($search_cond['v_2']));

			// 業種（大分類）集計値
			$this->af->setApp('main_industory_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListMainIndustory());
		} elseif ('v2' == $search_cond['type']) {
			// 地域選択
			if ('' == $search_cond['v_2']) {
				$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
				$this->ae->add('error', '地域が指定されていません。');
				return 'error';
			}
			// 地域選択
			if ('' == $search_cond['v_3']) {
				$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
				$this->ae->add('error', '国・地域が指定されていません。');
				return 'error';
			}
			// 開催地（都市）集計値
			$this->af->setApp('city_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListCity($search_cond['v_2'], $search_cond['v_3']));

			// 業種（大分類）集計値
			$this->af->setApp('main_industory_cnt', $this->backend->getManager('JmFairCnt')->getFairCntListMainIndustory());
		}

		// formに設定
		$this->af->set('type', $search_cond['type']);
		$this->af->set('i_2', $search_cond['i_2']);
		$this->af->set('i_3', $search_cond['i_3']);
		$this->af->set('i_4', $search_cond['i_4']);
		$this->af->set('v_2', $search_cond['v_2']);
		$this->af->set('v_3', $search_cond['v_3']);
		$this->af->set('v_4', $search_cond['v_4']);
	}

	function _makePager($url,$page, $max_page) {
		$pager = '';
		if (1 < $page) {
			$n = $page - 1;
			$pager .= '<a href="'.$url.$n.'">前へ'.'</a>';
		}
		if (5 >= $max_page) {
			$this->backend->getLogger()->log(LOG_DEBUG, '■TYPE : 1 2 3 4 5');
			// 1 2 3 4 5
			for ($i = 1; $i <= $max_page; $i++) {
				if ($page == $i) {
					$pager .= '<span class="current_page">'.$i.'</span>';
				} else {
					$pager .= '<a href="'.$url.$i.'">'.$i.'</a>';
				}
			}
		} else {
			if ($page <= 3) {
				$this->backend->getLogger()->log(LOG_DEBUG, '■TYPE : 1 2 3 4 ... E');
				// 1 2 3 4 ... E
				for ($i = 1; $i <= 4; $i++) {
					if ($page == $i) {
						$pager .= '<span class="current_page">'.$i.'</span>';
					} else {
						$pager .= '<a href="'.$url.$i.'">'.$i.'</a>';
					}
				}
				$pager .= '...';
				$pager .= '<a href="'.$url.$max_page.'">'.$max_page.'</a>';
			} elseif ($max_page - 2 <= $page) {
				$this->backend->getLogger()->log(LOG_DEBUG, '■TYPE : 1 ... E-3 E-2 E-1 E');
				// 1 ... E-3 E-2 E-1 E
				$pager .= '<a href="'.$url.'1">1</a>';
				$pager .= '...';
				for ($i = $max_page - 3; $i <= $max_page; $i++) {
					if ($page == $i) {
						$pager .= '<span class="current_page">'.$i.'</span>';
					} else {
						$pager .= '<a href="'.$url.$i.'">'.$i.'</a>';
					}
				}
			} elseif (4 <= $page && $page <= $max_page - 3) {
				$this->backend->getLogger()->log(LOG_DEBUG, '■TYPE : 1 ... 3 4 5 ... E');
				// 1 ... 3 4 5 ... E
				$pager .= '<a href="'.$url.'1">1</a>';
				$pager .= '...';

				for ($i = $page - 1; $i <= $page + 1; $i++) {
					if ($page == $i) {
						$pager .= '<span class="current_page">'.$i.'</span>';
					} else {
						$pager .= '<a href="'.$url.$i.'">'.$i.'</a>';
					}
				}

				$pager .= '...';
				$pager .= '<a href="'.$url.$max_page.'">'.$max_page.'</a>';
			}
		}
		if ($page < $max_page) {
			$n = $page + 1;
			$pager .= '<a href="'.$url.$n.'">次へ'.'</a>';
		}

		return $pager;
	}
}

?>
