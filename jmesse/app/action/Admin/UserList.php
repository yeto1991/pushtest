<?php
/**
 *  Admin/UserList.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserSearch.php';

/**
 *  admin_userList Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminUserList extends Jmesse_Form_AdminUserSearch
{
}

/**
 *  admin_userList action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminUserList extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_userList Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		/**
		*  admin_userList action implementation.
		*
		*  @param string $koumoku         検索対象項目
		*  @param string $statement       検索キーワード
		*  @param string $searchcondition 検索条件
		*  @return string  $sql 検索条件式
		*/
		function makeWhereStatementForSQL($koumoku,$statement,$searchcondition)
		{
			$sql = null;
			$sqlAdd = null;
			//検索項目内容無しの場合、null
			if($statement == null){
				return null;
			}else{
				//入力値が存在する場合、半角スペース存在確認
				if(stristr($statement," ")){
					//複数キーワードの場合
					//半角で区切られた文字列を配列格納
					$ex = explode(" ", $statement);
					//キーワード数
					$count = count($ex);
					//各検索条件ごとに検索条件文を作成
					if($searchcondition == "1"){
						//「一致」選択時
						$sql = " ".$koumoku." in (";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'".$ex[$i]."',";
						}
						//最後のカンマを削除
						$sqlAdd = rtrim($sqlAdd, ",");
						$sql = $sql.$sqlAdd.") ";
					}elseif($searchcondition == "2"){
						//「不一致」選択時
						$sql = " ".$koumoku." not in (";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'".$ex[$i]."',";
						}
						//最後のカンマを削除
						$sqlAdd = rtrim($sqlAdd, ",");
						$sql = $sql.$sqlAdd.") ";
					}elseif($searchcondition == "3"){
						//「前一致」選択時
						$sql = " ".$koumoku." like ";
						$sql2 = " and ".$koumoku." like ";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'".$ex[$i]."%'";
							$sqlAdd = $sqlAdd.$sql2;
						}
						//最後[AND 項目 LIKE]を削除
						$sqlAdd = rtrim($sqlAdd, $sql2);
						$sql = $sql.$sqlAdd." ";
					}elseif($searchcondition == "4"){
						//「前不一」選択時
						$sql = " ".$koumoku." not like ";
						$sql2 = " and ".$koumoku." not like ";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'".$ex[$i]."%'";
							$sqlAdd = $sqlAdd.$sql2;
						}
						//最後[AND 項目 NOT LIKE]を削除
						$sqlAdd = rtrim($sqlAdd, $sql2);
						$sql = $sql.$sqlAdd." ";
					}elseif($searchcondition == "5"){
						//「含む」選択時
						$sql = " ".$koumoku." like ";
						$sql2 = " and ".$koumoku." like ";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'%".$ex[$i]."%'";
							$sqlAdd = $sqlAdd.$sql2;
						}
						//最後[AND 項目 LIKE]を削除
						$sqlAdd = rtrim($sqlAdd, $sql2);
						$sql = $sql.$sqlAdd." ";
					}elseif($searchcondition == "6"){
						//「含まず」選択時
						$sql = " ".$koumoku." not like ";
						$sql2 = " and ".$koumoku." not like ";
						for($i=0; $i<$count; $i++){
							$sqlAdd = $sqlAdd."'%".$ex[$i]."%'";
							$sqlAdd = $sqlAdd.$sql2;
						}
						//最後[AND 項目 NOT LIKE]を削除
						$sqlAdd = rtrim($sqlAdd, $sql2);
						$sql = $sql.$sqlAdd." ";
					}else{
						//それ以外の場合
						return null;
					}
				}else{
					//複数キーワードではない場合
					//各検索条件の分岐
					if($searchcondition =="1"){
						//「一致」選択時
						$sql = " ".$koumoku." in ('".$statement."') ";
					}elseif($searchcondition == "2"){
						//「不一致」選択時
						$sql = " not ".$koumoku." in ('".$statement."') ";
					}elseif($searchcondition == "3"){
						//「前一致」選択時
						$sql = " ".$koumoku." like '".$statement."%' ";
					}elseif($searchcondition == "4"){
						//「前不一」選択時
						$sql = " ".$koumoku." not like '".$statement."%' ";
					}elseif($searchcondition == "5"){
						//「含む」選択時
						$sql = " ".$koumoku." like '%".$statement."%' ";
					}elseif($searchcondition == "6"){
						//「含まず」選択時
						$sql = " ".$koumoku." not like '%".$statement."%' ";
					}else{
						//それ以外の場合
						return null;
					}
				}
			}
			return $sql;
		}

		// ログインチェック
		if (!$this->backend->getManager('adminCommon')->isLoginFair()) {
			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
			$this->af->set('function', $this->config->get('host_path').$_SERVER[REQUEST_URI]);
			return 'admin_Login';
		}
		// 検索条件を作成
		$sql = " where ";
		$makeWhereSentence = null;
		if($this->af->get('searchEmail') != null){
			//Eメール 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("email",$this->af->get('searchEmail'),$this->af->get('searchConditionEmail'))." AND";
		}
		if($this->af->get('searchPassword') != null){
			//パスワード 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("password",$this->af->get('searchPassword'),$this->af->get('searchConditionPassword'))." AND";
		}
		if($this->af->get('searchCompanyNm') != null){
			//会社名 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("company_nm",$this->af->get('searchCompanyNm'),$this->af->get('searchConditionCompanyNm'))." AND";
		}
		if($this->af->get('searchDivisionDeptNm') != null){
			//部署名 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("division_dept_nm",$this->af->get('searchDivisionDeptNm'),$this->af->get('searchConditionDivisionDeptNm'))." AND";
		}
		if($this->af->get('searchUserNm') != null){
			//氏名 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("user_nm",$this->af->get('searchUserNm'),$this->af->get('searchConditionUserNm'))." AND";
		}
// 		if($this->af->get('searchUserId') != null){
// 			//ユーザID 検索条件が存在する場合
// 			$sql = $sql.makeWhereStatementForSQL("user_id",$this->af->get('searchUserId'),$this->af->get('searchConditionUserId'))." AND";
// 		}
		if($this->af->get('searchPostCode') != null){
			//郵便番号 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("post_code",$this->af->get('searchPostCode'),$this->af->get('searchConditionPostCode'))." AND";
		}
		if($this->af->get('searchAddress') != null){
			//住所 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("address",$this->af->get('searchAddress'),$this->af->get('searchConditionAddress'))." AND";
		}
		if($this->af->get('searchTel') != null){
			//TEL 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("tel",$this->af->get('searchTel'),$this->af->get('searchConditionTel'))." AND";
		}
		if($this->af->get('searchFax') != null){
			//FAX 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("fax",$this->af->get('searchFax'),$this->af->get('searchConditionFax'))." AND";
		}
		if($this->af->get('searchUrl') != null){
			//URL 検索条件が存在する場合
			$sql = $sql.makeWhereStatementForSQL("url",$this->af->get('searchUrl'),$this->af->get('searchConditionUrl'))." AND";
		}
		//性別の検索条件
		$genderSC = " gender_cd in (";
		if($this->af->get('searchGenderCd0') == "1"){
			$genderSC = $genderSC."'0',";
		}
		if($this->af->get('searchGenderCd1') == "1"){
			$genderSC = $genderSC."'1',";
		}
		if($this->af->get('searchGenderCd2') == "1"){
			$genderSC = $genderSC."'2',";
		}
		//最後のカンマを削除
		$genderSC = rtrim($genderSC, ",");
		$genderSC = $genderSC.") ";
		if($genderSC == " gender_cd in (".") "){
			$genderSC = "";
		}else{
			$sql = $sql.$genderSC." AND";
		}

		//ユーザ使用言語の検索条件
		$useLanguageSC = " use_language_cd in (";
		if($this->af->get('searchUseLanguageCd0') == "1"){
			$useLanguageSC = $useLanguageSC."'0',";
		}
		if($this->af->get('searchUseLanguageCd1') == "1"){
			$useLanguageSC = $useLanguageSC."'1',";
		}
		//最後のカンマを削除
		$useLanguageSC = rtrim($useLanguageSC, ",");
		$useLanguageSC = $useLanguageSC.") ";
		if($useLanguageSC == " use_language_cd in (".") "){
			$useLanguageSC = "";
		}else{
			$sql = $sql.$useLanguageSC." AND";
		}

		//権限(一般)の検索条件
		$authGenSC = " auth_gen in (";
		if($this->af->get('searchAuthGen0') == "1"){
			$authGenSC = $authGenSC."'0',";
		}
		if($this->af->get('searchAuthGen1') == "1"){
			$authGenSC = $authGenSC."'1',";
		}
		//最後のカンマを削除
		$authGenSC = rtrim($authGenSC, ",");
		$authGenSC = $authGenSC.") ";
		if($authGenSC == " auth_gen in (".") "){
			$authGenSC = "";
		}else{
			$sql = $sql.$authGenSC." AND";
		}

		//権限(ユーザ管理)の検索条件
		$authUserSC = " auth_user in (";
		if($this->af->get('searchAuthUser0') == "1"){
			$authUserSC = $authUserSC."'0',";
		}
		if($this->af->get('searchAuthUser1') == "1"){
			$authUserSC = $authUserSC."'1',";
		}
		//最後のカンマを削除
		$authUserSC = rtrim($authUserSC, ",");
		$authUserSC = $authUserSC.") ";
		if($authUserSC == " auth_user in (".") "){
			$authUserSC = "";
		}else{
			$sql = $sql.$authUserSC." AND";
		}

		//権限(展示会管理)の検索条件
		$authFairSC = " auth_fair in (";
		if($this->af->get('searchAuthFair0') == "1"){
			$authFairSC = $authFairSC."'0',";
		}
		if($this->af->get('searchAuthFair1') == "1"){
			$authFairSC = $authFairSC."'1',";
		}
		//最後のカンマを削除
		$authFairSC = rtrim($authFairSC, ",");
		$authFairSC = $authFairSC.") ";
		if($authFairSC == " auth_fair in (".") "){
			$authFairSC = "";
		}else{
			$sql = $sql.$authFairSC." AND";
		}

		//削除フラグの検索条件
		$delFlgSC = " del_flg in (";
		if($this->af->get('searchdelflg0') == "1"){
			$delFlgSC = $delFlgSC."'0',";
		}
		if($this->af->get('searchdelflg1') == "1"){
			$delFlgSC = $delFlgSC."'1',";
		}
		//最後のカンマを削除
		$delFlgSC = rtrim($delFlgSC, ",");
		$delFlgSC = $delFlgSC.") ";
		if($delFlgSC == " del_flg in (".") "){
			$delFlgSC = "";
		}else{
			$sql = $sql.$delFlgSC." AND";
		}
		//最後のカンマを削除
		$sql = rtrim($sql, " AND");

		if($sql == " where"){
			$sql = null;
		}

		//検索実行
		//検索結果
		$this->af->setApp('user_search_info_list', $this->backend->getManager('jmUser')->getUserInfoList($sql));
		// 検索結果総件数
		$this->af->setApp('user_search_count', $this->backend->getManager('jmUser')->getUserInfoListCount($sql));
		return null;
    }

	/**
	 *  admin_userList action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		return 'admin_userList';
    }
}

?>
