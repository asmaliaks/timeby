<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> 

		</div>
		<!-- / .main -->
	</div>  
<!-- / .container -->

<div class="footer">
        <div class="container">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "bottom_menu", Array(
	
	),
	false
        );?>

                <div class="column large">
                        <div class="footer-subscribe">
                                <div class="title">
                                        Оставьте свой e-mail, чтобы получать индивидуальные скидки и специальные предложения:
                                </div>

                                <form action="">
                                        <input type="text" placeholder="-- Ваш E-mail --">
                                        <input type="submit">
                                </form>
                        </div>

                        <div class="footer-social-links">
                                <a href="#" class="social-link twitter"></a>
                                <a href="#" class="social-link facebook"></a>
                                <a href="#" class="social-link google-plus"></a>
                                <a href="#" class="social-link pinterest"></a>
                        </div>
                </div>

                <div class="column">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "contact_bottom", Array(
                            "AREA_FILE_SHOW" => "page",	// Показывать включаемую область
                                    "AREA_FILE_SUFFIX" => "inc",	// Суффикс имени файла включаемой области
                                    "EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
                            ),
                            false
                        );?><br>
                </div>
        </div>
</div>
	<!-- / .footer -->
	
</body>
</html>