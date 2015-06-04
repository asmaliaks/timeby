<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("watches");
?><?$APPLICATION->IncludeComponent(
	"demo:news.line",
	"for_mainpage",
	Array(
		"IBLOCK_TYPE" => "news",
		"IBLOCKS" => array(),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"DETAIL_URL" => "news/news_detail.php?ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	)
);?><?$APPLICATION->IncludeComponent(
	"demo:fastsearch",
	"",
	Array(
	)
);?><?$APPLICATION->IncludeComponent("demo:recomended", "main_page_recommended", Array(
	"IBLOCK_TYPE" => "watches",	// Тип информационного блока
		"IBLOCKS" => array(	// Код информационного блока
			0 => "29",
		),
		"NEWS_COUNT" => "10",	// Количество новостей на странице
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "300",	// Время кеширования (сек.)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>