<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$site = ($_REQUEST["site"] <> ''? $_REQUEST["site"] : ($_REQUEST["src_site"] <> ''? $_REQUEST["src_site"] : false));
$arFilter = Array("TYPE_ID" => "FEEDBACK_FORM", "ACTIVE" => "Y");
if($site !== false)
	$arFilter["LID"] = $site;

$arEvent = Array();
$dbType = CEventMessage::GetList($by="ID", $order="DESC", $arFilter);
while($arType = $dbType->GetNext())
	$arEvent[$arType["ID"]] = "[".$arType["ID"]."] ".$arType["SUBJECT"];

$arComponentParameters = array(
	"PARAMETERS" => array(
		
		"EMAIL_TO" => Array(
			"NAME" => GetMessage("MFP_EMAIL_TO"), 
			"TYPE" => "STRING",
			"DEFAULT" => htmlspecialcharsbx(COption::GetOptionString("main", "email_from")), 
			"PARENT" => "BASE",
		),
		

	)
);


?>