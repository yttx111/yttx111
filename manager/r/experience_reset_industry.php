<?php 
set_time_limit(60);


$menu_flag = "manager";
include_once ("header.php");

$arrReturnResult = array(
	'status' => 100,
	'message' => '生成成功'
);

$in['CompanyIndustry'] = intval($in['CompanyIndustry']);

if(empty($in['CompanyIndustry'])){
	resultMessage('未指定公司行业');
}

function clearIndustry($nCompanyIndustry){
	global $in,$db;

	// 还原商品删除状态
	$sqlUpdate = "UPDATE ".DB_DATABASE."_{$nCompanyIndustry}.".DATATABLE."_order_content_index SET FlagID='0' 
 WHERE IsSystem = '1' AND FlagID = '1' AND EXISTS ( SELECT cc.CompanyID FROM ".DATABASEU.DATATABLE."_order_company cc WHERE cc.CompanyID = ".DB_DATABASE."_{$nCompanyIndustry}.".DATATABLE."_order_content_index.CompanyID AND cc.CompanyIndustry = '2' ) ";

	if($db->query($sqlUpdate)===false){
		resultMessage('还原商品删除状态失败');
	}

	// 清理掉是否已经首次进入后台记录信息
	$sqlUpdate = "DELETE FROM ".DATABASEU.DATATABLE."_experience_isset WHERE EXISTS ( SELECT cc.CompanyID FROM ".DATABASEU.DATATABLE."_order_company cc WHERE cc.CompanyID = ".DATABASEU.DATATABLE."_experience_isset.CompanyID ) ";

	if($db->query($sqlUpdate)===false){
		resultMessage('删除首次进入后台记录信息失败');
	}

	// 释放公司占用
	$sqlUpdate = "UPDATE ".DATABASEU.DATATABLE."_order_company set IsUse='0',LoginIP=null WHERE IsSystem = '0' and IsUse = '1' and CompanyIndustry ={$nCompanyIndustry} ";
	if($db->query($sqlUpdate)===false){
		resultMessage('释放公司占用失败');
	}

	return true;
}

function resultMessage($sMessage,$result=false){
	global $arrReturnResult;
	$arrReturnResult['message'] = $sMessage;
	if($result===true){
		$arrReturnResult['status'] = 101;
	}
	
	if(isset($_REQUEST['over']) && $_REQUEST['over']=='11'){
		$arrReturnResult['over'] = '11';
	}else{
		$arrReturnResult['over'] = '10';
	}

	exit(json_encode($arrReturnResult));
}

clearIndustry($in['CompanyIndustry']);

resultMessage('还原成功',true);

?>