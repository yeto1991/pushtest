<?php
/**
 *  Json/GetJsonMonthlyRanking.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: a99a32157780abedaf1b817cf022da94c2d1572c $
 */

/**
 *  json_getJsonMonthlyRanking Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Form_JsonGetJsonMonthlyRanking extends Jmesse_ActionForm
{
}

/**
 *  json_getJsonMonthlyRanking action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Cli_Action_JsonGetJsonMonthlyRanking extends Jmesse_ActionClass
{
	/**
	 *  preprocess of json_getJsonMonthlyRanking Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		return null;
	}

	var $file_name_list = array(
		'ranking1_jp.json',
		'ranking2_jp.json',
		'ranking3_jp.json',
		'ranking4_jp.json',
		'ranking5_jp.json',
		'ranking6_jp.json',
		'ranking1_en.json',
		'ranking2_en.json',
		'ranking3_en.json',
		'ranking4_en.json',
		'ranking5_en.json',
		'ranking6_en.json'
	);

	/**
	 *  json_getJsonMonthlyRanking action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$jm_ranking = $this->backend->getManager('JmRanking');

		for ($i = 0; $i < count($this->file_name_list); $i++) {
			$list = $jm_ranking->getJsonRanking($i);
			if (null != $list) {
				file_put_contents($this->config->get('jsonfile_path').$this->file_name_list[$i], json_encode($list));
			} else {
				file_put_contents($this->config->get('jsonfile_path').$this->file_name_list[$i], '');
			}
		}

		return null;
	}
}

?>
