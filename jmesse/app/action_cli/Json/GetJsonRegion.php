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
		$jm_fair_cnt_region_list = $jm_fair_cnt_mgr->getJsonRegion();

		if (null != $jm_fair_cnt_region_list) {

			// DBの項目名がJSONの項目名と異なる場合、連想配列のキーを置き換え
			$jm_fair_cnt_region_ary = array();
			foreach ($jm_fair_cnt_region_list as $jm_fair_cnt_row) {
				$row = array();
				foreach ($jm_fair_cnt_row as $key => $value) {
					switch ($key) {
						case 'region_jp':
							array_push($row, array('region' => $value));
							break;
						case 'region_en':
							//array_push($row, array('region' => $value));
							break;
						default:
							array_push($row, array($key => $value));
							break;
					}
				}
				array_push($jm_fair_cnt_region_ary, $row);
			}
			// JSON化
			$jm_fair_cnt_region_json = json_encode($jm_fair_cnt_region_ary);

			// FILE出力
			$filename = $this->config->get('url').$this->config->get('jsonfile_path').'a.json';
			file_put_contents($filename, $jm_fair_cnt_region_json);
 		}

		return null;
	}
}

?>
