<?php
/**
 *  User/ReissuePassword.php
 *
 *  @author     m.sasaki
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_reissuePassword Form implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserReissuePassword extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
		'print' => array(
			'type'        => VAR_TYPE_INT,    // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => 'プリント用表示', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'email' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'Eメール',       // Display name
			'required'    => true,
			'min'         => null,
			'max'         => 255,
			'regexp'      => '/^[!-~]+$/',
			'mbregexp'    => null,
			'mbregexp_encoding' => 'UTF-8',
			'filter'      => null,
			'custom'      => null,
		),
	);
}

/**
 *  user_reissuePassword action implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserReissuePassword extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_reissuePassword Action.
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
	 *  user_reissuePassword action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		return 'user_reissuePassword';
	}
}

?>
