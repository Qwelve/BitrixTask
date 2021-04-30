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
         <div class="pad-ver comment-response">
            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
            <div class="response-panel" style="display:none;">
               <div class="panel-body new-comment">
                  <div>
                     <?if (CUser::IsAuthorized()):?>
                        <input type="hidden" name="fullName" value="<?=CUser::GetFullName()?>">
                     <?else:?>
                        <input class="form-control w-100" type="text" name="fullName" value="" placeholder="Введите ваше фио">
                     <?endif?>
                  </div>               
                  <textarea class="form-control w-100" rows="2" placeholder="Добавьте Ваш комментарий"></textarea>
                  <div class="mar-top clearfix">
                     <button class="add-new-record btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Добавить</button>
                  </div>
               </div>
         </div>
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
