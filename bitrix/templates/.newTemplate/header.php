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
	 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"new_template", 
	array(
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_PERSONAL" => "/personal/",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"POSITION_FIXED" => "N"
	),
	false
);
         ?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "contacts_top", Array(
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
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "newtop_menu_inner_pages", Array(
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
                                            "search_new_template",
                                            Array(
	
                                    ),
                                    false
                                    );?>
<!--					-->
				</div>
				<!-- / .header-search -->
			</div>
		</div>
		<!-- / .header-bottom -->
	</div>
	<!-- / .header -->
 <div class="page container">
		<div class="aside">
			<div class="products-filter">
				<div class="products-filter-title">
					Подбор товаров
				</div>
				
				<div class="products-filter-options-wrapper">
					<div class="options">
						<div class="option">Цена</div>
						<div class="option">Марка</div>
						<div class="option">Пол</div>
						<div class="option">Часы</div>
						<div class="option">Ремень / Браслет</div>
						<div class="option">Материал</div>
						<div class="option">Механизм</div>
						<div class="option">Водостойкость</div>
						<div class="option">Стекло</div>
						<div class="option">Дополнительно</div>
					</div>

					<div class="action">
						<div class="button refresh">Очистить</div>
						<div class="button">Подобрать</div>
					</div>
				</div>
					

				<div class="products-filter-search">
					<form action="">
						<input type="text" placeholder="Расширенный поиск">
						<input type="submit">
					</form>
				</div>

				<div class="products-filter-menu">
					<ul>
						<li><a href="#">Мои Закладки</a></li>
						<li><a href="#">Доставка</a></li>
						<li><a href="#">Оплата</a></li>
						<li><a href="#">Скидки</a></li>
						<li><a href="#">Возврат/Гарантия</a></li>
						<li><a href="#">Кредит</a></li>
						<li><a href="#">Задать вопрос</a></li>
					</ul>
				</div>

				<div class="products-filter-secondary-menu">
					<ul>
						<li class="discount"><a href="#">Скидка</a></li>
						<li class="best-seller"><a href="#">Лидер продаж</a></li>
						<li class="new-product"><a href="#">Новый товар</a></li>
						<li class="daily-offer"><a href="#">Товар дня</a></li>
						<li class="gift"><a href="#">Подарок к часам</a></li>
						<li class="video-review"><a href="#">Видео Обзор</a></li>
						<li class="coach"><a href="#">Репетир</a></li>
						<li class="limited"><a href="#">Ограниченная Коллекция</a></li>
					</ul>
				</div>

				<div class="show-more">
				</div>
			</div>
			<!-- / .products-filter -->
		</div>
		<!-- / .aside -->
		<div class="main">
