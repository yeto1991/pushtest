<?php
/**
 *  User/FairDetail.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_fairDetail Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairDetail extends Jmesse_ActionForm
{
	/**
	*  @access private
	*  @var    array   form definition.
	*/
	var $form = array(

	//Form定義

    );
}

/**
 *  user_fairDetail action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairDetail extends Jmesse_ActionClass
{
	/**
	*  preprocess of user_fairDetail Action.
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
	*  user_fairDetail action implementation.
	*
	*  @access public
	*  @return string  forward name.
	*/
	function perform()
	{
		return 'user_fairDetail';
	}
}

?>
