<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции");
?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:promo.menulist",
	"",
	Array(
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:discountitems",
	"",
	Array(
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>