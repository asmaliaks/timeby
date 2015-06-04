<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Анонс на 10 дней");
?><?$APPLICATION->IncludeComponent(
	"demo:chapter.banner",
	".default",
	Array(
		"IBLOCK_TYPE" => "banners",
		"IBLOCKS" => array(0=>"38",),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"DETAIL_URL" => "news/news_detail.php?ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:announcement",
	"",
	Array(
		"IBLOCK_TYPE" => "watches",
		"IBLOCKS" => array("35"),
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><br>
 <br>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"WEB_FORM_ID" => "4",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"SEF_MODE" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "result_list.php",
		"EDIT_URL" => "result_edit.php",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"SEF_FOLDER" => "/dayitem/"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>