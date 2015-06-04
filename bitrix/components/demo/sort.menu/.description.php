<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("SORT_NAME"),
	"DESCRIPTION" => GetMessage("SORT_DESCRIPTION"),
	"ICON" => "/images/news_all.gif",
	"COMPLEX" => "Y",
	"PATH" => array(
		"ID" => "my_components",
		"SORT" => 2000,
		"NAME" => GetMessage("MY_COMPONENTS"),
		"CHILD" => array(
			"ID" => "sort",
			"NAME" => GetMessage("SORT"),
			"SORT" => 10,
		),
	),
);

?>