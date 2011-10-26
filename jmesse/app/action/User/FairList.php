<?php
/**
 *  User/FairList.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_fairList Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairList extends Jmesse_ActionForm
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
 *  user_fairList action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairList extends Jmesse_ActionClass
{
	/**
	*  preprocess of user_fairList Action.
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
	*  user_fairList action implementation.
	*
	*  @access public
	*  @return string  forward name.
	*/
	function perform()
	{
		return 'user_fairList';
	}
}

?>
