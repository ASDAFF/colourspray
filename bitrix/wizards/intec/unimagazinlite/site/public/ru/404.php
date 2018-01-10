<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>


<div class="error404 crearfix">
	<div class="img solid_element">
		404.
	</div>
	<div class="header_text">
		Страница не найдена.
	</div>
	<div class="text">
		К сожалению, страница, которую Вы запросили, не была найдена (ошибка 404).
		Вы можете перейти на главную страницу или воспользоваться каталогом товаров.
	</div>
	<a href="<?=SITE_DIR?>catalog/" class="solid_button left">В каталог товаров</a>
	<a href="<?=SITE_DIR?>" class="border_button right">На главную страницу</a>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>