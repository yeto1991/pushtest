<?php
/**
 *  Json/GetJsonRegion.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: a99a32157780abedaf1b817cf022da94c2d1572c $
 */

/**
 *  json_getJsonRegion Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Form_JsonGetJsonRegion extends Jmesse_ActionForm
{
}

/**
 *  json_getJsonRegion action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Action_JsonGetJsonRegion extends Jmesse_ActionClass
{
	/**
	 *  preprocess of json_getJsonRegion Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		return null;
	}

	/**
	 *  json_getJsonRegion action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// このファイルは下記のethnaコマンドで作成する
		// > ethna add-action -g cli json_getJsonRegion

		// DB検索
		$jm_fair_cnt_mgr = $this->backend->getManager('JmFairCnt');

		//日本語用
		$jm_fair_cnt_region_list_jp = $jm_fair_cnt_mgr->getJsonRegionJP();
		if (null != $jm_fair_cnt_region_list_jp) {
			// JSON化
			$jm_fair_cnt_region_json = json_encode($jm_fair_cnt_region_list_jp);
			// FILE出力
			$filename = $this->config->get('jsonfile_path').'region_jp.json';
			file_put_contents($filename, $jm_fair_cnt_region_json);
 		}

 		//英語用
 		$jm_fair_cnt_region_list_en = $jm_fair_cnt_mgr->getJsonRegionEN();
 		if (null != $jm_fair_cnt_region_list_en) {
 			// JSON化
 			$jm_fair_cnt_region_json = json_encode($jm_fair_cnt_region_list_en);
 			// FILE出力
 			$filename = $this->config->get('jsonfile_path').'region_en.json';
 			file_put_contents($filename, $jm_fair_cnt_region_json);
 		}

		return null;
	}
}

?>
