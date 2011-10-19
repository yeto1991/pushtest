<?php
/**
 *  Admin/FairCsvDownload.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'Jmesse_JmFair.php';

/**
 *  admin_fairCsvDownload Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminFairCsvDownload extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
	/*
	 *  TODO: Write form definition which this action uses.
	*  @see http://ethna.jp/ethna-document-dev_guide-form.html
	*
	*  Example(You can omit all elements except for "type" one) :
	*
	*  'sample' => array(
	*      // Form definition
	*      'type'        => VAR_TYPE_INT,    // Input type
	*      'form_type'   => FORM_TYPE_TEXT,  // Form type
	*      'name'        => 'Sample',        // Display name
	*
	*      //  Validator (executes Validator by written order.)
	*      'required'    => true,            // Required Option(true/false)
	*      'min'         => null,            // Minimum value
	*      'max'         => null,            // Maximum value
	*      'regexp'      => null,            // String by Regexp
	*      'mbregexp'    => null,            // Multibype string by Regexp
	*      'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
	*
	*      //  Filter
	*      'filter'      => 'sample',        // Optional Input filter to convert input
	*      'custom'      => null,            // Optional method name which
	*                                        // is defined in this(parent) class.
	*  ),
	*/
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed           Converted result.
	 */
	/*
	 function _filter_sample($value)
	{
	//  convert to upper case.
	return strtoupper($value);
	}
	*/
}

/**
 *  admin_fairCsvDownload action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminFairCsvDownload extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_fairCsvDownload Action.
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
			$this->af->set('function', '');
			return 'admin_Login';
		}
		return null;
	}

	/**
	 *  admin_fairCsvDownload action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// 以降、SESSIONから検索条件を取得する。
		$jm_fair_mgr =& $this->backend->getManager('JmFair');
		$jm_fair_list = $jm_fair_mgr->getFairList();

		$file = 'xxx.csv';

		header ("Content-Disposition: attachment; filename=$file");
		header ("Content-type: application/x-csv");

		for ($i = 0; $i < count($jm_fair_list); $i++) {
			$row = $jm_fair_list[$i];
			$j = 0;
			foreach ($row as $key => $value) {
				if (0 < $j) {
					echo ',';
				}
				echo $value;
				$j++;
			}
			echo "\n";
		}

		return null;
	}
}

?>
