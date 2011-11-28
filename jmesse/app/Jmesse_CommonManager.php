<?php
/**
 *  Jmesse_CommonManager.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: d4af361a99e2aaa95cedee2132d1ca3f10920c6b $
 */

/**
 *  Jmesse_CommonManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_CommonManager extends Ethna_AppManager
{


	/**
	 * 外部htmlの設定(日本語ページ)。
	 *
	 */
	function setExtHtml() {
// 		$opts = array(
// 			'http' => array(
// 				'method' => "GET",
// 				'header' => "Content-Type: text/html; charset=utf-8",
// 				'timeout' => 10
// 			)
// 		);
// 		$context = stream_context_create($opts);
// 		$this->af->setAppNe('header', $this->_curl_get_contents($this->config->get('header_url')));
// 		$this->af->setAppNe('header', $this->_file_get_contents('localhost/jmesse/www/header.html'));
		$this->af->setAppNe('header', @file_get_contents($this->config->get('header_url')));
		$this->af->setAppNe('footer', @file_get_contents($this->config->get('footer_url')));
		$this->af->setAppNe('left_menu', @file_get_contents($this->config->get('left_menu_url')));
	}

	/**
	 * 外部htmlの設定(英語ページ)。
	 *
	 */
	function setEnExtHtml() {
		$this->af->setAppNe('header', @file_get_contents($this->config->get('header_url_en')));
		$this->af->setAppNe('footer', @file_get_contents($this->config->get('footer_url_en')));
		$this->af->setAppNe('left_menu', @file_get_contents($this->config->get('left_menu_url_en')));
	}


	function _file_get_contents($server = '', $timeout = 10){
		$data = '';
		if(isset($server)){
			$fp = fsockopen($server, 80, $errno, $errstr, $timeout);
			if($fp){
				while($eof_check = fread($fp, 1024)){
					$data .= $eof_check;
				}
				fclose($fp);
			}else{
				$this->backend->getLogger()->log(LOG_DEBUG, '■return false ①');
				return false;
			}
		}else{
			$this->backend->getLogger()->log(LOG_DEBUG, '■return false ②');
			return false;
		}
		$this->backend->getLogger()->log(LOG_DEBUG, '■OK');
		return $data;
	}


	function _curl_get_contents( $url, $timeout = 60 ){
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_HEADER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
		$result = curl_exec( $ch );
		curl_close( $ch );
		return $result;
	}
}
?>
