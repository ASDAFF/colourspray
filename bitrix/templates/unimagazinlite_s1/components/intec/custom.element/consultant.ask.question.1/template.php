<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="consultant-ask-question-1">
    <div class="consultant-ask-question-1-wrapper">
        <div class="consultant-ask-question-1-image uni-image">
            <div class="uni-aligner-vertical"></div>
            <img src="<?=$this->GetFolder().'/images/consultant.png'?>" alt="" />
        </div>
        <div class="consultant-ask-question-1-information">
            <div class="consultant-ask-question-1-name">
                <div class="consultant-ask-question-1-name-wrapper"><?=GetMessage('CONSULTANT_ASK_QUESTION_NAME')?></div>
            </div>
            <div class="consultant-ask-question-1-description">
                <?=GetMessage('CONSULTANT_ASK_QUESTION_DESCRIPTION')?>
            </div>
        </div>
        <div class="consultant-ask-question-1-buttons">
            <div class="uni-aligner-vertical"></div>
            <div class="uni-button solid_button consultant-ask-question-1-button" onclick="openFaqPopup('<?=SITE_DIR?>');"><?=GetMessage('CONSULTANT_ASK_QUESTION_BUTTONS_ASK')?></div>
        </div>
    </div>
</div>