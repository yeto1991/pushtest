<?php
/**
 *  Admin/Login.php
 *
 *  @author     m.sasaki
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  admin_login Form implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminLogin extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
		'username' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'ID',            // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'password' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'Password',      // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
	);
}

/**
 *  admin_login action implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminLogin extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_login Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ここには何も記述しないで下さい。
		return null;
	}

	/**
	 *  admin_login action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// ここには何も記述しないで下さい。
		return 'admin_login';
	}
}

?>
