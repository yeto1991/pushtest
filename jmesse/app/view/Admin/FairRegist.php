<?php
/**
 *  Admin/FairRegist.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 47c269115c9380915eda42c4fa1c780886c064d8 $
 */

require_once 'Jmesse_JmCodeM.php';

/**
 *  admin_fairRegist view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_View_AdminFairRegist extends Jmesse_ViewClass
{
	/**
	 *  preprocess before forwarding.
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 現在のシステム日付
		$this->af->setApp('year', date('Y'));
		$this->af->setApp('month', date('m'));
		$this->af->setApp('day', date('d'));

		// Fairの件数を取得
		$this->af->setApp('fair_count', $this->backend->getManager('JmFair')->getCountAll());

		// 開催頻度
		$this->af->setApp('frequency', $this->backend->getManager('JmCodeM')->getFrequencyList());

		// 業種（大分類）
		$this->af->setApp('main_industory', $this->backend->getManager('JmCodeM')->getMainIndustoryList());

		// 開催地（地域）
		$this->af->setApp('region', $this->backend->getManager('JmCodeM')->getRegionList());

		// 入場資格
		$this->af->setApp('open_to', $this->backend->getManager('JmCodeM')->getOpenToList());
	}
}

?>
