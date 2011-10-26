<?php
/**
 *  User/FairChangeDone.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistDone.php';

/**
 *  user_fairChangeDone Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairChangeDone extends Jmesse_Form_UserFairRegistDone
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
 *  user_fairChangeDone action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairChangeDone extends Jmesse_ActionClass
{
    /**
     *  preprocess of user_fairChangeDone Action.
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
     *  user_fairChangeDone action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		return 'user_fairRegistDone';
    }
}

?>
