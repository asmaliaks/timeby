<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("COMPONENT_NAME"),
	"DESCRIPTION" => GetMessage("COMPONENT_DESCR"),
	"ICON" => "/images/feedback.gif",
	"PATH" => array(
		"ID" => "my_components",
		"SORT" => 2000,
		"NAME" => GetMessage("MY_COMPONENTS"),
		"CHILD" => array(
			"ID" => "my_forms",
			"NAME" => GetMessage("MY_FORMS"),
			"SORT" => 10,
		)
	),
);
?>