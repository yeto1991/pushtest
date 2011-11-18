<?php
/**
 *  Json/GetJsonSample.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: a99a32157780abedaf1b817cf022da94c2d1572c $
 */

/**
 *  json_getJsonSample Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Form_JsonGetJsonSample extends Jmesse_ActionForm
{
}

/**
 *  json_getJsonSample action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Action_JsonGetJsonSample extends Jmesse_ActionClass
{
	/**
	 *  preprocess of json_getJsonSample Action.
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
	 *  json_getJsonSample action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// このファイルは下記のethnaコマンドで作成する
		// > ethna add-action -g cli json_getJsonSample

		// DB検索
		$jm_fair_mgr = $this->backend->getManager('JmFair');
		$jm_fair_list = $jm_fair_mgr->getFairList();

		if (null != $jm_fair_list) {

			// DBの項目名がJSONの項目名と異なる場合、連想配列のキーを置き換え
			$jm_fair_ary = array();
			foreach ($jm_fair_list as $jm_fair_row) {
				$row = array();
				foreach ($jm_fair_row as $key => $value) {
					switch ($key) {
						case 'aaa':
							array_push($row, array('xxx' => $value));
							break;
						case 'bbb':
							array_push($row, array('yyy' => $value));
							break;
						case 'ccc':
							array_push($row, array('zzz' => $value));
							break;
						default:
							array_push($row, array($key => $value));
							break;
					}
				}
				array_push($jm_fair_ary, $row);
			}

			// JSON化
			$jm_fair_json = json_encode($jm_fair_ary);

			// FILE出力
			$filename = 'xxx.json';
			file_put_contents($filename, $jm_fair_json);

 		}

		return null;
	}
}

?>
