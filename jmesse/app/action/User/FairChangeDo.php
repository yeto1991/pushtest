<?php
/**
 *  User/FairChangeDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistDo.php';

/**
 *  user_fairChangeDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairChangeDo extends Jmesse_Form_UserFairRegistDo
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
 *  user_fairChangeDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairChangeDo extends Jmesse_ActionClass
{
    /**
     *  preprocess of user_fairChangeDo Action.
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
     *  user_fairChangeDo action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		return 'user_fairRegistDo';
    }
}

?>
