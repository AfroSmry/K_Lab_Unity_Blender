<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
if( empty($arResult["ITEMS"]) || count($arResult["ITEMS"]) == 0 ){
    return;
}

?>
<div class="news__parent pagenvaigation-parent">

    <div class="news__list pagenvaigation-articles row g-2">

        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <?

            $db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"title_eng"));
            if($ar_props = $db_props->Fetch()){$title_eng = $ar_props["VALUE"];}else{$title_eng = "";}

            $db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"description_eng"));
            if($ar_props = $db_props->Fetch()){$description_eng = $ar_props["VALUE"];}else{$description_eng = "";}

            $db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"preview_eng"));
            if($ar_props = $db_props->Fetch()){$preview_eng = $ar_props["VALUE"];}else{$preview_eng = "";}

            ?>

            <div class="col-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="bg-white p-3" >

                    <div class="row" style="align-items: center">
                        <div class="col-md-10 col-sm-12">
                            <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                                <h6 class="news-date-time"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></h6>
                            <?endif ?>
                            <? if ($_GET['lang'] != 'eng'){ ?>
                                <h5>
                                    <a class="textDecorA" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a>
                                </h5>
                            <?}else{?>
                                <h5>
                                <a class="textDecorA" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>?lang=eng"><? echo $title_eng ?></a>
                                </h5>
                            <?}?>

                            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
                                <? if ($_GET['lang'] != 'eng'){ ?>
                                    <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                                <?}else{?>
                                    <p><? echo $preview_eng; ?></p>
                                <?}?>

                            <?endif; ?>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button onclick="window.open('<?=$arItem["DETAIL_PAGE_URL"]?>')" class="btn-more">Читать</button>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>

        <style>
            .textDecorA:hover{
                text-decoration: underline;
            }
            .btn-more {
                color: #2c2c2c;
                font-size: 12px;
                line-height: 16px;
                text-transform: uppercase;
                cursor: pointer;
                padding: 23px 36px 24px;
                border: 1px solid #852a34;
                -webkit-border-radius: 50px;
                border-radius: 50px;
                -webkit-transition: background 0.2s ease;
                transition: background 0.2s ease;
                background: white;
                width: 100%;
            }
            .btn-more:hover {
                background: #852a34;
                color: white;
            }
            @media screen and (max-width: 526px){
                .btn-more {
                    width: auto;
                    padding: 15px 40px;
                    display: block;
                    margin: auto;
                }
            }
        </style>
    </div>

    <?if(false):?>
    <div class="news__list pagenvaigation-articles" data-ratio="0.6847" >

        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

			<?

				$db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"title_eng"));
				if($ar_props = $db_props->Fetch()){$title_eng = $ar_props["VALUE"];}else{$title_eng = "";}

				$db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"description_eng"));
				if($ar_props = $db_props->Fetch()){$description_eng = $ar_props["VALUE"];}else{$description_eng = "";}

				$db_props = CIBlockElement::GetProperty(1, $arItem['ID'], array("sort" => "asc"), Array("CODE"=>"preview_eng"));
				if($ar_props = $db_props->Fetch()){$preview_eng = $ar_props["VALUE"];}else{$preview_eng = "";}

			?>

            <div class="news__list--item" style="background:white" id="<?=$this->GetEditAreaId($arItem['ID']);?>">



                <div class="news__list--text" style="flex: 0 0 80%; max-width: 80%;">
                    <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                        <h6 class="news-date-time"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></h6>
                    <?endif ?>

					<? if ($_GET['lang'] != 'eng'){ ?>
						<h3>
                        	<a  href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a>
                    	</h3>
					<?}else{?>
						<h3>
                        	<a  href="<? echo $arItem["DETAIL_PAGE_URL"] ?>?lang=eng"><? echo $title_eng ?></a>
                    	</h3>
					<?}?>

                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
						<? if ($_GET['lang'] != 'eng'){ ?>
							<p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
						<?}else{?>
							<p><? echo $preview_eng; ?></p>
						<?}?>
			
                    <?endif; ?>
					
					
                </div>
				<div style="flex: 0 0 20%; max-width: 20%;">
				<a class="more" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">Читать</a>
				</div>
            </div>
        <?endforeach;?>


    </div>
    <?endif;?>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>

</div>