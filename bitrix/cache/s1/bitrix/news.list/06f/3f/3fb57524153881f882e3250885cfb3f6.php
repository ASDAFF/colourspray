<?
if($INCLUDE_FROM_CACHE!='Y')return false;
$datecreate = '001513325629';
$dateexpire = '001549325629';
$ser_content = 'a:2:{s:7:"CONTENT";s:9757:"    <div style="overflow:hidden;">
        <ul class="slider-main-1">
                                        <li class="slider-main-1-item"
                    id="bx_3218110189_215"
                >
                    <div class="slider-main-1-item-wrap"
                         style="background-image:url(\'/upload/iblock/e43/e43be664cf0786fb778217e506305849.png\');"
                    >
                                                    <div class="slider-main-1-item-wrap-wrap">
                                <div class="uni-aligner-vertical"></div>
                                                                                                        <div  class="slider-main-1-item-part slider-main-1-item-part-adaptable" >
                                        <div class="slider-main-1-item-part-wrap">
                                                                
                    <div id="textblock-0" class="slider-main-1-item-part-text dark slider-main-1-item-part-text-left slider-left" >
                                                                            <div class="slider-main-1-item-part-text-header-2">
								<span class="slider-main-text-header-fon-parent">
									<span class="slider-main-text-header-fon-child">Официальный производитель HUGNER</span>
								</span>
                            </div>
                                                                            <div class = "slider-main-1-item-part-text-text">
								<span class="slider-main-text-header-fon-parent">
									<span class="slider-main-text-header-fon-child">Мы предлагаем купить профессиональное оборудование "Hugner" без посредников, напрямую от производителя!</span>
								</span>
                            </div>
                                                                            <div>
                                <a href="/catalog/okrasochnye_apparaty/"
                                   class="slider-main-1-item-part-text-button button_slide"
                                >
                                    В каталог                                </a>
                            </div>
                                            </div>
                                                        </div>
                                    </div>
                                                                            <div  class="slider-main-1-item-part slider-main-1-item-part-hideable ">
                                            <div  class="slider-main-1-item-part-wrap ">
                                                                                        <div id="imgshow-0" class="slider-main-1-item-part-image slider-main-1-item-part-image-right slider-imgshow" >
                        <img src="/upload/resize_cache/iblock/e96/763_400_1/e96a94eb73c6131363bd04a3715c091a.jpg">
                    </div>
                                                            </div>
                                        </div>
                                                                                                </div>
                                                </div>
                </li>
                                    </ul>
    </div>
    <script>
        $(document).ready(function(){
            var slider = $(\'.slider-main-1\').bxSlider({
                mode : "fade",
                speed: "800",
                pager: true,
                auto: true,
                pause: "8000",
                                onSlideAfter: function(slideElement, oldIndex, newIndex){
                    var wdt1=$("#textblock-"+newIndex).width();
					if ($("div").is("#textblock-"+oldIndex)) {
                   	$("#textblock-"+oldIndex).css({\'opacity\':\'0\'});
					}
					if ($("div").is("#imgshow-"+oldIndex)) {
                   	 $("#imgshow-"+oldIndex).css({\'opacity\':\'0\'});
					}

                    if($("#textblock-"+newIndex).hasClass("slider-left")){
						if ($("div").is("#textblock-"+newIndex)) {
                        	var mrglft=$("#textblock-"+newIndex).offset().left;
						}
						if ($("div").is("#imgshow-"+newIndex)) {
                        	var mrgImgLft=$("#imgshow-"+newIndex).offset().left;
						}
                        h=screen.width;
                        var offsettoAnimateImg=h-mrgImgLft;
                        var offsetText=offsettoAnimateImg-mrglft;
                        $("#textblock-"+newIndex).offset({  left:-offsetText });
                        $("#textblock-"+newIndex).css({\'opacity\':\'1\'});
                        $("#imgshow-"+newIndex).offset({left:h})
                        $("#imgshow-"+newIndex).css({\'opacity\':\'1\'});
                        var sourceTxt=-offsetText;
                        var sourceImg=h;

                        for(var i1=0;i1<offsettoAnimateImg;i1+=5){
                            setTimeout(function (){
                                sourceTxt+=5;
                                sourceImg-=5;
                                $("#textblock-"+newIndex).offset({left:sourceTxt});
                                $("#imgshow-"+newIndex).offset({left:sourceImg});
                            },3);

                        }



                    }
                    else if($("#textblock-"+newIndex).hasClass("slider-right")){
						if ($("div").is("#textblock-"+newIndex)) {
                        	var mrglft=$("#textblock-"+newIndex).offset().left;
						}
						if ($("div").is("#imgshow-"+newIndex)) {
                        	var mrgImgLft=$("#imgshow-"+newIndex).offset().left;
						}
                        var h=screen.width;
                        var offsettoAnimateText=h-mrglft;
                        var offsetToImg=offsettoAnimateText-mrgImgLft;
                        $("#textblock-"+newIndex).offset({  left:h });
                        $("#textblock-"+newIndex).css({\'opacity\':\'1\'});
                        $("#imgshow-"+newIndex).offset({left:-offsetToImg});
                        $("#imgshow-"+newIndex).css({\'opacity\':\'1\'});
                        var sourceTxt=h;
                        var sourceImg=-offsetToImg;

                        for(var i1=0; i1<offsettoAnimateText; i1+=5){
                            setTimeout(function (){
                                sourceTxt-=5;
                                sourceImg+=5;
                                $("#textblock-"+newIndex).offset({  left:sourceTxt});
                                $("#imgshow-"+newIndex).offset({left:sourceImg});
                            },3);
                        }


                    }

                },
                onSliderLoad:function(currentIndex){

                    var wdt=$("#textblock-"+currentIndex).width();

                    if($("#textblock-"+currentIndex).hasClass("slider-left")){
						if ($("div").is("#textblock-"+currentIndex)) {
                        	var mrglft=$("#textblock-"+currentIndex).offset().left;
						}
						if ($("div").is("#imgshow-"+currentIndex)) {
                        	var mrgImgLft=$("#imgshow-"+currentIndex).offset().left;
						}
                        h=screen.width;
                        var offsettoAnimateImg=h-mrgImgLft;
                        var offsetText=offsettoAnimateImg-mrglft;
                        $("#textblock-"+currentIndex).offset({  left:-offsetText });
                        $("#textblock-"+currentIndex).css({\'opacity\':\'1\'});
                        $("#imgshow-"+currentIndex).offset({left:h})
                        $("#imgshow-"+currentIndex).css({\'opacity\':\'1\'});
                        var sourceTxt=-offsetText;
                        var sourceImg=h;

                        for(var i1=0; i1<offsettoAnimateImg; i1+=5){
                            setTimeout(function (){
                                sourceTxt+=5;
                                sourceImg-=5;
                                $("#textblock-"+currentIndex).offset({left:sourceTxt});
                                $("#imgshow-"+currentIndex).offset({left:sourceImg});
                            },3);

                        }

                    }
                    else if($("#textblock-"+currentIndex).hasClass("slider-right")){
						if ($("div").is("#textblock-"+currentIndex)) {
                        	var mrglft=$("#textblock-"+currentIndex).offset().left;
						}
						if ($("div").is("#imgshow-"+currentIndex)) {
                        	var mrgImgLft=$("#imgshow-"+currentIndex).offset().left;
						}
                        var h=screen.width;
                        var offsettoAnimateText=h-mrglft;
                        var offsetToImg=offsettoAnimateText-mrgImgLft;
                        $("#textblock-"+currentIndex).offset({  left:h });
                        $("#textblock-"+currentIndex).css({\'opacity\':\'1\'});
                        $("#imgshow-"+currentIndex).offset({left:-offsetToImg});
                        $("#imgshow-"+currentIndex).css({\'opacity\':\'1\'});
                        var sourceTxt=h;
                        var sourceImg=-offsetToImg;

                        for(var i1=0;i1<offsettoAnimateText;i1+=5){
                            setTimeout(function (){
                                sourceTxt-=5;
                                sourceImg+=5;
                                $("#textblock-"+currentIndex).offset({  left:sourceTxt});
                                $("#imgshow-"+currentIndex).offset({left:sourceImg});
                            },3);
                        }
                    }

                }
                            });
        });
    </script>
";s:4:"VARS";a:2:{s:8:"arResult";a:7:{s:2:"ID";s:2:"23";s:14:"IBLOCK_TYPE_ID";s:7:"content";s:13:"LIST_PAGE_URL";s:43:"#SITE_DIR#/content/index.php?ID=#IBLOCK_ID#";s:15:"NAV_CACHED_DATA";N;s:4:"NAME";s:34:"Слайдер на главной";s:7:"SECTION";b:0;s:8:"ELEMENTS";a:1:{i:0;s:3:"215";}}s:18:"templateCachedData";a:4:{s:13:"additionalCSS";s:85:"/bitrix/templates/unimagazinlite_s1/components/bitrix/news.list/main_slider/style.css";s:9:"frameMode";b:1;s:17:"__currentCounters";a:1:{s:28:"bitrix:system.pagenavigation";i:1;}s:13:"__editButtons";a:2:{i:0;a:5:{i:0;s:13:"AddEditAction";i:1;s:3:"215";i:2;N;i:3;s:31:"Изменить элемент";i:4;a:0:{}}i:1;a:5:{i:0;s:15:"AddDeleteAction";i:1;s:3:"215";i:2;N;i:3;s:29:"Удалить элемент";i:4;a:1:{s:7:"CONFIRM";s:123:"Будет удалена вся информация, связанная с этой записью. Продолжить?";}}}}}}';
return true;
?>