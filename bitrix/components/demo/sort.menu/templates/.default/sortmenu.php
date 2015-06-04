<p>Сортировать по: 
<?php 
$pageURL = $APPLICATION->GetCurPageParam();
$paramsToDelete[0] = 'sort';
$paramsToDelete[1] = 'method';
$clearURL = CHTTP::urlDeleteParams($pageURL, $paramsToDelete, array("delete_system_params" => true));
?>
<a <?if ($_GET["sort"] == "name"):?> class="actived" <?endif;?> href="<?= $clearURL?><?php if($_GET['del_filter'] || $_GET['set_filter']){?>&<?php }else{ ?>?<?php } ?>sort=name&method=asc"> 
Названию 
</a> 

<a <?if ($_GET["sort"] == "MAIN_PRICE"):?> class="actived" <?endif;?> href="<?= $clearURL?><?php if($_GET['del_filter'] || $_GET['set_filter']){?>&<?php }else{ ?>?<?php } ?>sort=MAIN_PRICE&method=asc"> 
Цене 
</a> 
</p>
    