<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use  Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("QWELVE_COMPONENT_NAME"),
    "DESCRIPTION" => "",
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => "comments",
        "NAME" => "comments"
    ],
    "ICON" => "/images/logo.gif"
];