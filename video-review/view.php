<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Видео обзор");
?><?$APPLICATION->IncludeComponent(
	"demo:videoreview.page",
	".default",
	Array(
		"IBLOCK_TYPE" => "watches",
		"IBLOCKS" => array(0=>"26",),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "0"
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:dayitem", 
	".default", 
	array(
		"IBLOCK_TYPE" => "watches",
		"IBLOCKS" => array(
			0 => "30",
		),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	),
	false
);?> <br>
<?$APPLICATION->IncludeComponent(
	"demo:newones",
	"",
	Array(
	)
);?><br>
<?$APPLICATION->IncludeComponent(
	"demo:discountitems",
	"",
	Array(
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>