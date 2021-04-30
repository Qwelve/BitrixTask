<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init(array('jquery'));
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if($request->isAjaxRequest()) {
    $addItemInfo = $this->addNewComment($request->getPost("parent"), $request->getPost("author"), $request->getPost("comment"));
}

$arItems = $this->getHighLoadList();

$arResult["COUNT"] = count($arItems);
$arResult["ITEMS"] = $this->buildTree($arItems, 0);
 
$this->includeComponentTemplate();

?>