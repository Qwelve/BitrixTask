<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//global $USER; // для добавление записей
CJSCore::Init(array('jquery'));




$arItems = $this->getHighLoadList();

$arResult["COUNT"] = count($arItems);
$arResult["ITEMS"] = $this->buildTree($arItems, 0);
 
$this->includeComponentTemplate();

?>