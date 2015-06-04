<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>

	<div class="mf-email" width="300px">
		<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
                <input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
	</div>

	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	
</form>
</div>