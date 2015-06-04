<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бренды");
?><?$APPLICATION->IncludeComponent("demo:brands.list", "new_brands_template", Array(
	"IBLOCK_TYPE" => "watches",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => "24",	// Код информационного блока
		"ELEMENT_ID" => "",	// Инфоблок
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"OFFERS_SORT_FIELD" => "name",	// Поле сортировки
		"OFFERS_SORT_ORDER" => "asc",	// Сортировка
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>