<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Товар дня");
?><?$APPLICATION->IncludeComponent(
	"demo:chapter.banner",
	".default",
	Array(
		"IBLOCK_TYPE" => "banners",
		"IBLOCKS" => array(0=>"36",),
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
	"demo:dayitem",
	".default",
	Array(
		"IBLOCK_TYPE" => "watches",
		"IBLOCKS" => array(0=>"30",),
		"NEWS_COUNT" => "2",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:socialbuttons",
	"",
	Array(
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"demo:interestingitems",
	".default",
	Array(
		"IBLOCK_TYPE" => "watches",
		"IBLOCKS" => array(0=>"37",),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>