<?php
/**
 *  Jmesse_MailManager.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: d4af361a99e2aaa95cedee2132d1ca3f10920c6b $
 */

require_once('Mail.php');

/**
 *  Jmesse_MailManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_MailManager extends Ethna_AppManager
{
	/**
	 * 見本市ユーザ情報登録完了メール送信。（日本語メール）
	 *
	 * @access public
	 * @param string $mail_to 送信先Eメール
	 * @param array $ary_param 置き換え文字列
	 */
	function sendmailUserReigst($mail_to, $ary_param) {
		$this->_sendmail('userRegist.tpl', $this->config->get('mail_title_user_regist'), $mail_to, $ary_param);
	}

	/**
	* 見本市ユーザ情報登録完了メール送信。（英語メール）
	*
	* @access public
	* @param string $mail_to 送信先Eメール
	* @param array $ary_param 置き換え文字列
	*/
	function sendmailEnUserReigst($mail_to, $ary_param) {
		$this->_sendmail('enUserRegist.tpl', $this->config->get('mail_title_user_regist_en'), $mail_to, $ary_param);
	}

	/**
	 * 見本市ユーザ情報更新完了メール送信。（日本語メール）
	 *
	 * @access public
	 * @param string $mail_to 送信先Eメール
	 * @param array $ary_param 置き換え文字列
	 */
	function sendmailUserChange($mail_to, $ary_param) {
		$this->_sendmail('userChange.tpl', $this->config->get('mail_title_user_change'), $mail_to, $ary_param);
	}

	/**
	* 見本市ユーザ情報更新完了メール送信。（英語メール）
	*
	* @access public
	* @param string $mail_to 送信先Eメール
	* @param array $ary_param 置き換え文字列
	*/
	function sendmailEnUserChange($mail_to, $ary_param) {
		$this->_sendmail('enUserChange.tpl', $this->config->get('mail_title_user_change_en'), $mail_to, $ary_param);
	}

	/**
	 * ID/パスワード確認メール送信。（日本語メール）
	 *
	 * @access public
	 * @param string $mail_to 送信先Eメール
	 * @param array $ary_param 置き換え文字列
	 */
	function sendmailUserConfirm($mail_to, $ary_param) {
		$this->_sendmail('userConfirm.tpl', $this->config->get('mail_title_user_confirm'), $mail_to, $ary_param);
	}

	/**
	* ID/パスワード確認メール送信。（英語メール）
	*
	* @access public
	* @param string $mail_to 送信先Eメール
	* @param array $ary_param 置き換え文字列
	*/
	function sendmailEnUserConfirm($mail_to, $ary_param) {
		$this->_sendmail('enUserConfirm.tpl', $this->config->get('mail_title_user_confirm_en'), $mail_to, $ary_param);
	}

	/**
	 * 見本市情報登録完了メール送信。（日本語メール）
	 *
	 * @access public
	 * @param string $mail_to 送信先Eメール
	 * @param array $ary_param 置き換え文字列
	 */
	function sendmailFairReigst($mail_to, $ary_param) {
		$this->_sendmail('fairRegist.tpl', $this->config->get('mail_title_fair_regist'), $mail_to, $ary_param);
	}

	/**
	* 見本市情報登録完了メール送信。（英語メール）
	*
	* @access public
	* @param string $mail_to 送信先Eメール
	* @param array $ary_param 置き換え文字列
	*/
	function sendmailEnFairReigst($mail_to, $ary_param) {
		$this->_sendmail('enFairRegist.tpl', $this->config->get('mail_title_fair_regist_en'), $mail_to, $ary_param);
	}

	/**
	 * 見本市情報更新完了メール送信。（日本語メール）
	 *
	 * @access public
	 * @param string $mail_to 送信先Eメール
	 * @param array $ary_param 置き換え文字列
	 */
	function sendmailFairChange($mail_to, $ary_param) {
		$this->_sendmail('fairChange.tpl', $this->config->get('mail_title_fair_change'), $mail_to, $ary_param);
	}

	/**
	* 見本市情報更新完了メール送信。（英語メール）
	*
	* @access public
	* @param string $mail_to 送信先Eメール
	* @param array $ary_param 置き換え文字列
	*/
	function sendmailEnFairChange($mail_to, $ary_param) {
		$this->_sendmail('enFairChange.tpl', $this->config->get('mail_title_fair_change_en'), $mail_to, $ary_param);
	}

	/**
	 * メール送信。
	 *
	 * @access private
	 * @param string $template テンプレート名(mail_*)
	 * @param string $title メールのサブジェクト
	 * @param string $mail_to メール送信先
	 * @param array $ary_value 置き換え文字列
	 */
	function _sendmail($template, $title, $mail_to, $ary_value) {

		// 日本語メールを送る際の設定
		mb_language("Japanese");
		mb_internal_encoding("UTF-8");

		// SMTPサーバーの情報を配列に設定
		$params = array(
			'host'       => $this->config->get('mail_smtp_host'),
			'port'       => $this->config->get('mail_smtp_port'),
			'auth'       => false,
			'username'   => base64_encode($this->config->get('mail_smtp_user')),
			'password'   => base64_encode($this->config->get('mail_smtp_pass')),
			'localhost'  => null,
			'timeout'    => null,
			'debug'      => false,
			'persist'    => null,
			'pipelining' => null
		);

		// メールヘッダ情報を配列に設定
		$headers = array (
			'To'      => mb_encode_mimeheader(mb_convert_encoding($mail_to, "ISO-2022-JP", "UTF-8")),
			'Bcc'     => mb_encode_mimeheader(mb_convert_encoding($this->config->get('mail_bcc'), "ISO-2022-JP", "UTF-8")),
			'From'    => mb_encode_mimeheader(mb_convert_encoding($this->config->get('mail_from'), "ISO-2022-JP", "UTF-8")),
			'Subject' => mb_encode_mimeheader(mb_convert_encoding($title, "ISO-2022-JP", "UTF-8"))
		);

		// メール本文
		$ethna_mail =& new Ethna_MailSender($this->backend);
		$body_tmp = $ethna_mail->send(
			null,
			$template,
			$ary_value
		);
		$this->backend->getLogger()->log(LOG_DEBUG, '■本文(UTF-8) : '.$body_tmp);
		$body = mb_convert_encoding($body_tmp, "ISO-2022-JP", "UTF-8");
		$this->backend->getLogger()->log(LOG_DEBUG, '■本文(JIS) : '.$body);

		// 送信
		$mail_obj =& Mail::factory('smtp', $params);
		$result = $mail_obj->send($mail_to, $headers, $body);
		if (PEAR::isError($result)) {
			$msg = 'メールの送信に失敗しました';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->backend->getActionError()->add('error', $msg);
			// DEBUG-S
// 			echo '<pre>';
// 			var_dump($headers);
// 			echo '</pre><br/><br/>';
// 			echo '<pre>';
// 			var_dump($ary_value);
// 			echo '</pre><br/><br/>';
			// DEBUG-E
		}

		return;
	}

	/**
	 * IMAP接続によりメールを取得する。
	 *
	 * @return array メールリスト
	 */
	function getErrMail() {
		// 言語と文字コードの設定
		mb_language('Japanese');
		mb_internal_encoding('UTF-8');

		// メールボックスのオープン
		$mbox = @imap_open('{'.$this->config->get('mail_imap_host').':'.$this->config->get('mail_imap_port').'/imap/ssl}INBOX',
			$this->config->get('mail_imap_user'),
			$this->config->get('mail_imap_pass')
		);
		if (null == $mbox) {
			$msg = 'Failed to open the mailbox.';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->backend->getActionError()->add('error', $msg);
			return null;
		}

		// メールの取り込み
		$err_mail_list = array();
		for ($i = 1; $i <= imap_num_msg($mbox); $i++) {
			if (false !== stripos(imap_qprint(imap_body($mbox, $i)), 'User unknown')) {
				// アドレス不正
				$err_mail = array('yyyymmdd' => date('Ymd', strtotime(imap_headerinfo($mbox, $i)->date)), 'email' => imap_headerinfo($mbox, $i)->to[0]->mailbox.'@'.imap_headerinfo($mbox, $i)->to[0]->host, 'err_kind' => '0', 'mail_contents' => mb_convert_encoding(imap_body($mbox, $i), 'UTF-8', 'ISO-2022-JP'));
				array_push($err_mail_list, $err_mail);
			} elseif (false !== stripos(imap_qprint(imap_body($mbox, $i)), 'Host not found')) {
				// メールサーバ不正
				$err_mail = array('yyyymmdd' => date('Ymd', strtotime(imap_headerinfo($mbox, $i)->date)), 'email' => imap_headerinfo($mbox, $i)->to[0]->mailbox.'@'.imap_headerinfo($mbox, $i)->to[0]->host, 'err_kind' => '1', 'mail_contents' => mb_convert_encoding(imap_body($mbox, $i), 'UTF-8', 'ISO-2022-JP'));
				array_push($err_mail_list, $err_mail);
			} else {
				// その他
				$err_mail = array('yyyymmdd' => date('Ymd', strtotime(imap_headerinfo($mbox, $i)->date)), 'email' => imap_headerinfo($mbox, $i)->to[0]->mailbox.'@'.imap_headerinfo($mbox, $i)->to[0]->host, 'err_kind' => '2', 'mail_contents' => mb_convert_encoding(imap_body($mbox, $i), 'UTF-8', 'ISO-2022-JP'));
				array_push($err_mail_list, $err_mail);
 			}
		}

		// エラー表示
		echo imap_last_error();

		// メールボックスのクローズ
		imap_close($mbox);

		return $err_mail_list;
	}
}
?>
