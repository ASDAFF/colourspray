<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();?>
<?
    $arServices = array(
        "main" => array(
            "NAME" => GetMessage('WIZARD_SERVICES_MAIN'),
            "STAGES" => array(
                "files.php",
                "urlrewrite.php",
                "settings.php",
                "template.php",
                "theme.php",
				"forms.php"
            )
        ),
		"highloadblock" => Array(
			"NAME" => GetMessage("WIZARD_SERVICES_HIGHLOAD"),
			"STAGES" => Array(
				"references.php",
				"references2.php",
			)
		),
        "iblock" => array(
            "NAME" => GetMessage('WIZARD_SERVICES_IBLOCK'),
            "STAGES" => array(
				"group.php", // Создание группы владельцев сайта 
                "types.php",
                "articles.php",
                "banners.php",
                "brands.php",
                "calls_orders.php",
                "categories_popular.php",
                "characteristics.php",
                "clients.php",
                "contacts.php",
                "faq.php",
                "jobs.php",
                "news.php",
                "products.php",
				"offers.php",
                "projects.php",
                "questions.php",
                "resume.php",
                "reviews.php",
                "reviews_catalog.php",
                "reviews_services.php",
                "services.php",
                "services_orders.php",
                "shares.php",
                "slider.php",
                "staffs.php",
                "tizers.php",
                "videos.php",
				"pickup.php",
                "final.php"
            )
        )
    )
?>