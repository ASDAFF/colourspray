<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $options;
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])){?>
    <div style="overflow:hidden;<?=$options['HEADER_WIDTH_SIZE']['ACTIVE_VALUE'] != 'Y'?' max-width: 1162px; margin: 0 auto;':''?>">
        <ul class="slider-main-1">
            <? $num=0; ?>
            <?foreach($arResult["ITEMS"] as $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                $background = "none";

                if ($arItem["PROPERTIES"]["BACKGROUND"]["VALUE"]){
                    $background = CFile::GetFileArray($arItem["PROPERTIES"]["BACKGROUND"]["VALUE"]);
                }

                if ($background["HEIGHT"]!=0 && $background["WIDTH"]!=0) {
                    $height = $background["HEIGHT"]/$background["WIDTH"]*100;
                }

                if (!empty($arItem["PROPERTIES"]["POSITION"]["VALUE_XML_ID"])) {
					$position = $arItem["PROPERTIES"]["POSITION"]["VALUE_XML_ID"];
				} else $position='left';
                $picture = $arItem["PROPERTIES"]["PICTURE"]["VALUE"];

                if ($picture) {
                    $picture = CFile::ResizeImageGet($picture, Array("width" => 763, "height" => 400));
                    $picture = $picture["src"];
                }

                $target = $arItem["PROPERTIES"]["TARGET"]["VALUE_XML_ID"];
                $href = $arItem["PROPERTIES"]["BANNER_HREF"]["VALUE"];

                $showPicture = function () use (&$picture, &$position,$num, &$arParams) { ?>
                    <?
                    if (empty($picture))
                        return;

                    $classes = array('slider-main-1-item-part-image');

                    if ($position == 'left')
                        $classes[] = 'slider-main-1-item-part-image-right';

                    if ($position == 'right')
                        $classes[] = 'slider-main-1-item-part-image-left';
                    ?>
                    <div <?=($arParams['USE_ANIMATION'] == 'Y')? 'id="imgshow-'.$num.'"' : ''?> class="<?= implode(' ', $classes) ?> <?=($arParams['USE_ANIMATION'] == 'Y')? 'slider-imgshow' : ''?>" >
                        <img src="<?= $picture ?>">
                    </div>
                <? };

                $showText = function () use (&$picture, &$position, &$href, &$arItem,$num, &$arParams) { ?>
                    <?

                    $classes = array('slider-main-1-item-part-text');
                    $classes[] = $arItem["PROPERTIES"]["COLOR_TEXT"]["VALUE_XML_ID"];

                    if ($position == 'left')
                        $classes[] = 'slider-main-1-item-part-text-left';

                    if ($position == 'right')
                        $classes[] = 'slider-main-1-item-part-text-right';


                    ?>

                    <div <?=($arParams['USE_ANIMATION'] == 'Y')? 'id="textblock-'.$num.'"' : ''?> class="<?= implode(' ', $classes) ?> <?=($arParams['USE_ANIMATION'] == 'Y')? 'slider-'.$position : ''?>" >
                        <?if( $arItem["PROPERTIES"]["HEADER"]["~VALUE"] ){?>
                            <div class = "slider-main-1-item-part-text-header-1">
                                <?= $arItem["PROPERTIES"]["HEADER"]["~VALUE"] ?>
                            </div>
                        <?}?>
                        <?if($arItem["PROPERTIES"]["HEADER2"]["~VALUE"]){?>
                            <div class="slider-main-1-item-part-text-header-2">
								<span class="slider-main-text-header-fon-parent">
									<span class="slider-main-text-header-fon-child"><?= $arItem["PROPERTIES"]["HEADER2"]["~VALUE"] ?></span>
								</span>
                            </div>
                        <?}?>
                        <?if ($arItem["PROPERTIES"]["TEXT"]["~VALUE"]) {?>
                            <div class = "slider-main-1-item-part-text-text">
								<span class="slider-main-text-header-fon-parent">
									<span class="slider-main-text-header-fon-child"><?= $arItem["PROPERTIES"]["TEXT"]["~VALUE"]["TEXT"] ?></span>
								</span>
                            </div>
                        <?}?>
                        <? if ($arItem["PROPERTIES"]["BUTTON1_TEXT"]["VALUE"] &&
                            $arItem["PROPERTIES"]["BUTTON1_LINK"]["VALUE"] && empty($href)) { ?>
                            <div>
                                <a href="<?= $arItem["PROPERTIES"]["BUTTON1_LINK"]["VALUE"] ?>"
                                   class="slider-main-1-item-part-text-button <?= $arItem["PROPERTIES"]["BUTTON1_CLASS"]["VALUE"] ?>"
                                >
                                    <?= $arItem["PROPERTIES"]["BUTTON1_TEXT"]["VALUE"] ?>
                                </a>
                            </div>
                        <?}?>
                    </div>
                <? };

                ?>
                <li class="slider-main-1-item"
                    id="<?=$this->GetEditAreaId($arItem['ID']);?>"
                >
                    <div class="slider-main-1-item-wrap"
                         style="background-image:url(<?="'".$background["SRC"]."'"?>);"
                    >
                        <? if (!empty($href)) { ?>
                        <a class="slider-main-1-item-link" href="<?= $href ?>" target="<?= $target ?>">
                            <? } ?>
                            <div class="slider-main-1-item-wrap-wrap">
                                <div class="uni-aligner-vertical"></div>
                                <? if ($position == 'picture' || $position == 'onlytext') { ?>
                                    <div class="slider-main-1-item-part slider-main-1-item-part-full">
                                        <div class="slider-main-1-item-part-wrap">
                                            <? if ($position == "picture") { ?>
                                                <? $showPicture(); ?>
                                            <? } else { ?>
                                                <? $showText(); ?>
                                            <? } ?>
                                        </div>
                                    </div>
                                <? } else { ?>
                                    <? if ($position == 'right') { ?>
                                        <div   class="slider-main-1-item-part slider-main-1-item-part-hideable ">
                                            <div class="slider-main-1-item-part-wrap ">
                                                <? $showPicture(); ?>
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div  class="slider-main-1-item-part slider-main-1-item-part-adaptable" >
                                        <div class="slider-main-1-item-part-wrap">
                                            <? $showText(); ?>
                                        </div>
                                    </div>
                                    <? if ($position == 'left') { ?>
                                        <div  class="slider-main-1-item-part slider-main-1-item-part-hideable ">
                                            <div  class="slider-main-1-item-part-wrap ">
                                                <? $showPicture(); ?>
                                            </div>
                                        </div>
                                    <? } ?>
                                <? } ?>
                            </div>
                            <? if (!empty($href)) { ?>
                        </a>
                    <? } ?>
                    </div>
                </li>
                <? $num++; ?>
            <?endforeach;?>
        </ul>
    </div>
    <script>
        $(document).ready(function(){
            var slider = $('.slider-main-1').bxSlider({
                mode : "<?=$arParams["MODE_SLIDER"]?>",
                speed: "<?=$arParams["SPEED_SLIDER"]?>",
                pager: true,
                auto: <?=$arParams["USE_AUTOSCROLL"] == "Y"? "true":"false"?>,
                pause: "<?=$arParams["PAUSE_AUTOSCROLL"]?>",
                <?if ($arParams['USE_ANIMATION'] == 'Y') {?>
                onSlideAfter: function(slideElement, oldIndex, newIndex){
                    var wdt1=$("#textblock-"+newIndex).width();
					if ($("div").is("#textblock-"+oldIndex)) {
                   	$("#textblock-"+oldIndex).css({'opacity':'0'});
					}
					if ($("div").is("#imgshow-"+oldIndex)) {
                   	 $("#imgshow-"+oldIndex).css({'opacity':'0'});
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
                        $("#textblock-"+newIndex).css({'opacity':'1'});
                        $("#imgshow-"+newIndex).offset({left:h})
                        $("#imgshow-"+newIndex).css({'opacity':'1'});
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
                        $("#textblock-"+newIndex).css({'opacity':'1'});
                        $("#imgshow-"+newIndex).offset({left:-offsetToImg});
                        $("#imgshow-"+newIndex).css({'opacity':'1'});
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
                        $("#textblock-"+currentIndex).css({'opacity':'1'});
                        $("#imgshow-"+currentIndex).offset({left:h})
                        $("#imgshow-"+currentIndex).css({'opacity':'1'});
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
                        $("#textblock-"+currentIndex).css({'opacity':'1'});
                        $("#imgshow-"+currentIndex).offset({left:-offsetToImg});
                        $("#imgshow-"+currentIndex).css({'opacity':'1'});
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
                <?}?>
            });
        });
    </script>
<?}?>