<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if($arParams["SOURCE"]):?>
   <?foreach ($arParams["SOURCE"] as $arItem):?>
   <div class="media-block" data-comment-id = "<?=$arItem["ID"]?>">
      <div class="media-left">
         <img class="img-circle img-sm" alt="Профиль пользователя" src="https://bootstraptema.ru/snippets/icons/2016/mia/1.png">
      </div>
      <div class="media-body">
         <div class="mar-btm">
            <span class="btn-link text-semibold media-heading box-inline"><?=$arItem["UF_AUTHOR"]?></span>
            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - <?=$arItem["UF_ADDTIME"]->toString()?></p>
         </div>
         <p><?=$arItem["UF_COMMENT"]?></p>
         <div class="pad-ver">
            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
         </div>
         <?if($arItem["CHILDREN"]):?>
         <hr>
         <?$APPLICATION->IncludeComponent(
                    "qwelve:tree_struct",
                    "",
                    Array(
                        "SOURCE" => $arItem["CHILDREN"],
                    )
                );?>
         <?endif?>
      </div>
   </div>
   <?endforeach;?>  
<?endif;?>
