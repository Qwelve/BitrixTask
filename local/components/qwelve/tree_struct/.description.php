<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use  Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("QWELVE_COMPONENT_TREE_NAME"),
    "DESCRIPTION" => "",
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => "tree_struct",
        "NAME" => "tree_struct"
    ],
    "ICON" => "/images/logo.gif"
];