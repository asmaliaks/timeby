<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
    <?$APPLICATION->ShowHead()?>
	<meta charset="utf-8">

	<title>Каталог - Заголовок Сайта</title>

    <meta name="format-detection" content="telephone=no">

	<link rel="shortcut icon" href="/favicon.ico">

	<meta name="description" content="">
	<meta name="keywords" content="">
        
        <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/jquery.mCustomScrollbar.css">
        <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.flexslider-min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mCustomScrollbar.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mousewheel.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap-select.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<!--	
	

-->

	<!--[if lt IE 9]>
		<script src="/js/css3-mediaqueries.js"></script>
		<script src="/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!--	<div class="temp">

		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="/catalog.php">Каталог (переход)</a></li>
			<li><a href="/catalog2.php">Каталог (подбор)</a></li>
			<li><a href="/cart.php">Корзина</a></li>
			<li><a href="/anounce.php">Анонс на 10 дней</a></li>
			<li><a href="/brands.php">Бренды</a></li>
			<li><a href="/news.php">Подписка/Новости</a></li>
			<li><a href="/product.php">Товар</a></li>
			<li><a href="/product-day.php">Товар дня</a></li>
		</ul>
	</div>-->
	<!-- / .temp -->

	<div class="header">
		<div class="header-top">
			<div class="container">
<?$APPLICATION->IncludeComponent("bitrix:main.include",
        "logo_header",
        Array(
	
	),
	false
);?>
	 <? $APPLICATION->IncludeComponent(
                "bitrix:sale.basket.basket.line",
                "new_template",
                Array(
                        "PATH_TO_BASKET" => "/personal/cart/",
                        "PATH_TO_PERSONAL" => "/personal/",
                        "SHOW_PERSONAL_LINK" => "N"
                )
                );
         ?>


<?$APPLICATION->IncludeComponent("bitrix:main.include", "contacts_bottom", Array(
	"AREA_FILE_SHOW" => "page",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "inc",	// Суффикс имени файла включаемой области
		"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
			</div>
		</div>
		<!-- / .header-top -->

		<div class="header-bottom">
			<div class="container">
				<div class="main-navigation">
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "new_top_menu", Array(
	"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"MAX_LEVEL" => "0",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
	),
	false
);?> 
<!--					<ul>
						<li><a href="#">Наручные часы</a></li>
						<li><a href="#">Интерьерные часы</a></li>
						<li><a href="#">Украшения</a></li>
						<li><a href="#">Подарки</a></li>
						<li><a href="#">Акции</a></li>
						<li><a href="#">Товар дня</a></li>
						<li><a href="#">Бренды</a></li>
					</ul>-->
				</div>
				<!-- / .main-navigation -->

				<div class="header-search">
                                    <?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"serch_new_template", 
	array(
		"PAGE" => "#SITE_DIR#search/index.php"
	),
	false
);?>
<!--					<form action="">
						<input type="text">
						<input type="submit">
					</form>-->
				</div>
				<!-- / .header-search -->
			</div>
		</div>
		<!-- / .header-bottom -->
	</div>
	<!-- / .header -->
 <?$APPLICATION->IncludeComponent(
	"demo:banners.mainpage", 
	"new", 
	array(
		"IBLOCK_TYPE" => "banners",
		"IBLOCKS" => array(
			0 => "19",
		),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"DETAIL_URL" => "news/news_detail.php?ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300"
	),
	false
);?>       
 <div class="page container">
