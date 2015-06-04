<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> </td><td class="right-column"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "sect", 
		"AREA_FILE_SUFFIX" => "inc", 
		"AREA_FILE_RECURSIVE" => "N", 
		"EDIT_MODE" => "html", 
		"EDIT_TEMPLATE" => "sect_inc.php" 
	)
);?> <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html",
		"EDIT_TEMPLATE" => "page_inc.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?> </td></tr>
  </tbody>
</table>

<div id="bottom_banner"><?$APPLICATION->IncludeComponent("bitrix:advertising.banner",".default",Array("TYPE" => "BOTTOM"));?></div>

<div id="footer">
    <div style="float:right">
        <?$APPLICATION->IncludeComponent(
	"demo:subscription", 
	".newDef", 
	array(
		"EMAIL_TO" => "asmaliaks@gmail.com"
	),
	false
);?>
    </div>

  <?
  $APPLICATION->IncludeFile(
    $APPLICATION->GetTemplatePath("include_areas/footer_menu.php"), 
          array(),
          array("MODE"=>"html")
    );
  ?>  
    
    <?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/copyright.php"),
			Array(),
			Array("MODE"=>"html")
		);?> 
</div>
</body>
</html>