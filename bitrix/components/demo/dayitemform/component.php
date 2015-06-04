<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("form");
$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"])){
    if(check_bitrix_sessid()){
        $FORM_ID = 4;
        $error = CForm::Check($FORM_ID);
        $arValues = array (
            "form_email_29"  => $_POST['user_email'],     // "Дата рождения"
        );
        $RESULT_ID = CFormResult::Add($FORM_ID, $arValues);
        LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
    }
}

$this->IncludeComponentTemplate();