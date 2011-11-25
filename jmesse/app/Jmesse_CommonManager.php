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
		$this->af->setAppNe('header', file_get_contents($this->config->get('header_url')));
		$this->af->setAppNe('footer', file_get_contents($this->config->get('footer_url')));
		$this->af->setAppNe('left_menu', file_get_contents($this->config->get('left_menu_url')));
	}

	/**
	 * 外部htmlの設定(英語ページ)。
	 *
	 */
	function setEnExtHtml() {
		$this->af->setAppNe('header', file_get_contents($this->config->get('header_url_en')));
		$this->af->setAppNe('footer', file_get_contents($this->config->get('footer_url_en')));
		$this->af->setAppNe('left_menu', file_get_contents($this->config->get('left_menu_url_en')));
	}

}
?>
