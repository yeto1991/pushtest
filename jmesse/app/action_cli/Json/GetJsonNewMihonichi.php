<?php
/**
 *  Json/GetJsonNewMihonichi.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: a99a32157780abedaf1b817cf022da94c2d1572c $
 */

/**
 *  json_getJsonNewMihonichi Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Form_JsonGetJsonNewMihonichi extends Jmesse_ActionForm
{
}

/**
 *  json_getJsonNewMihonichi action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Action_JsonGetJsonNewMihonichi extends Jmesse_ActionClass
{
	/**
	 *  preprocess of json_getJsonNewMihonichi Action.
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
	 *  json_getJsonNewMihonichi action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// DB検索
		$jm_fair_mgr = $this->backend->getManager('JmFair');

		//日本語用
		$jm_fair_new_mihonichi_list = $jm_fair_mgr->getJsonNewMihonichiJP();
		if (null != $jm_fair_new_mihonichi_list) {
			// JSON化
			$jm_fair_new_mihonchi_json = json_encode($jm_fair_new_mihonichi_list);
			// FILE出力
			$filename = $this->config->get('jsonfile_path').'new-mihonichi_jp.json';
			file_put_contents($filename, $jm_fair_new_mihonchi_json);
		}
		//英語用
		$jm_fair_new_mihonichi_list = $jm_fair_mgr->getJsonNewMihonichiEN();
		if (null != $jm_fair_new_mihonichi_list) {
			// JSON化
			$jm_fair_new_mihonchi_json = json_encode($jm_fair_new_mihonichi_list);
			// FILE出力
			$filename = $this->config->get('jsonfile_path').'new-mihonichi_en.json';
			file_put_contents($filename, $jm_fair_new_mihonchi_json);
		}
		return null;
	}
}

?>
