<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->addExternalJS($templateFolder . "/js/jquery.min.js");
$this->addExternalJS($templateFolder . "/js/bootstrap/bootstrap.min.js");
$this->addExternalCss($templateFolder . "/css/bootstrap/bootstrap.min.css");
?>

<section class="container comments" data-comment-type="<?=$arParams["COMMENT_OBJECT_TYPE"]?>" data-comment-object="<?=$arParams["COMMENT_OBJECT"]?>">
   <h3 class="title-comments">Комментарии (<?=$arResult["COUNT"]?>)</h3>
   <div class="row">
      <div class="col-md-12">
         <div class="panel">
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
         <?if($arResult["ITEMS"]):?>
         <div class="panel">
            <div class="panel-body">
               <?$APPLICATION->IncludeComponent(
                    "qwelve:tree_struct",
                    "",
                    Array(
                        "SOURCE" => $arResult["ITEMS"],
                    )
                );?>
            </div>
         </div>
         <?endif;?>
      </div>
   </div>
</section>

