<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости интернет-магазина");
?><div class="b-block large b-subscribe">
				<div class="b-block-title">
					<h2>Подписка</h2>
				</div>

				<div class="body">
					<p>
						Предлагаем вам подписаться на регулярную рассылку новостей и информации об акциях и скидках.
					</p>

					<form action="">
						<div class="field">
							<input type="text" class="field-element" placeholder="Ваш e-mail">
						</div>
						<div class="field">
							<input class="button" type="submit" value="Подписаться">
							<input class="button primary" type="submit" value="Отказаться от рассылки">
						</div>
					</form>
				</div>
			</div>

<?$APPLICATION->IncludeComponent("bitrix:news", "new_news_list", Array(
	"IBLOCK_TYPE" => "news",	// Тип инфоблока
		"IBLOCK_ID" => "3",	// Инфоблок
		"NEWS_COUNT" => "5",	// Количество новостей на странице
		"USE_SEARCH" => "N",	// Разрешить поиск
		"USE_RSS" => "Y",	// Разрешить RSS
		"NUM_NEWS" => "20",	// Количество новостей для экспорта
		"NUM_DAYS" => "360",	// Количество дней для экспорта
		"YANDEX" => "N",	// Экспортировать в диалект Яндекса
		"USE_RATING" => "N",	// Разрешить голосование
		"USE_CATEGORIES" => "Y",	// Выводить материалы по теме
		"CATEGORY_IBLOCK" => array(	// Инфоблоки
			0 => "3",
		),
		"CATEGORY_CODE" => "THEMES",	// Код свойства
		"CATEGORY_ITEMS_COUNT" => "4",	// Максимальное количество материалов из одного инфоблока
		"CATEGORY_THEME_#ID(XML_ID=content-news)#" => "list",
		"USE_REVIEW" => "N",	// Разрешить отзывы
		"USE_FILTER" => "N",	// Показывать фильтр
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SEF_FOLDER" => "/content/news/",	// Каталог ЧПУ (относительно корня сайта)
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"DISPLAY_PANEL" => "Y",
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"PREVIEW_TRUNCATE_LEN" => "0",	// Максимальная длина анонса для вывода (только для типа текст)
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"LIST_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"META_KEYWORDS" => "KEYWORDS",	// Установить ключевые слова страницы из свойства
		"META_DESCRIPTION" => "DESCRIPTION",	// Установить описание страницы из свойства
		"BROWSER_TITLE" => "BROWSER_TITLE",	// Установить заголовок окна браузера из свойства
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"DETAIL_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(	// Свойства
			0 => "SOURCE",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
		"DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
		"DETAIL_PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_ID#/",
			"detail" => "#SECTION_ID#/#ELEMENT_ID#/",
			"search" => "search/",
			"rss" => "rss/",
			"rss_section" => "#SECTION_ID#/rss/",
		),
		"VARIABLE_ALIASES" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>