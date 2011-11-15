<?php
/**
 *  EnFairListDownload.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairList.php';

/**
 *  enFairListDownload Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_EnFairListDownload extends Jmesse_Form_FairList
{
}

/**
 *  enFairListDownload action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_EnFairListDownload extends Jmesse_ActionClass
{
	/**
	 *  preprocess of enFairListDownload Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ページ番号
		if ('' == $this->af->get('page')) {
			$msg = 'ページ番号が設定されていません。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			return 'error';
		}

		return null;
	}

	/**
	 *  enFairListDownload action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// ページ設定
		$page = $this->af->get('page');

		// ソート順
		$sort = $this->_setSort();

		// 検索結果（リスト）部
		// マネージャの取得
		$jm_fair_mgr =& $this->backend->getManager('JmFair');

		// 検索実行
		$jm_fair_list = $jm_fair_mgr->getFairListCsv($sort);

		// エラー判定
		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, 'システムエラー');
			return 'error';
		}

		// CSV出力
		if (null != $jm_fair_list) {
			// ファイル名
			$file = 'list.csv';

			// header出力
			header ("Content-Disposition: attachment; filename=$file");
			header ("Content-type: application/x-csv");

			foreach ($jm_fair_list as $row) {
				$j = 0;
				foreach ($row as $value) {
					if (0 < $j) {
						echo ',';
					}
					echo str_replace('<br/>', '', $value);
					$j++;
				}
				echo "\n";
			}
		} else {
			$this->ae->set('error', '検索件数が0件です。');
			return 'enFairList';
		}

		return null;
	}

	/**
	* ソート設定・取得。
	*
	* @return int ソート番号
	*/
	function _setSort() {
		$search_cond = $this->session->get('search_cond');
		if (null != $this->af->get('sort') && '' != $this->af->get('sort') && 0 != $this->af->get('sort')) {
			$search_cond['sort'] =  $this->af->get('sort');
		}
		if (null == $search_cond['sort'] || '' == $search_cond['sort'] || 0 == $search_cond['sort']) {
			$search_cond['sort'] =  0;
		}
		$this->session->set('search_cond', $search_cond);
		return $search_cond['sort'];
	}


}

?>