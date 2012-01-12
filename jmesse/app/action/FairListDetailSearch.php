<?php
/**
 *  FairListDetailSearch.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */


/**
 *  fairListDetailSearch Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_FairListDetailSearch extends Jmesse_ActionForm
{
}

/**
 *  fairListDetailSearch action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_FairListDetailSearch extends Jmesse_ActionClass
{
	/**
	 *  preprocess of fairListDetailSearch Action.
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
	 *  fairListDetailSearch action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		return 'fairListDetailSearch';
	}
}

?>
