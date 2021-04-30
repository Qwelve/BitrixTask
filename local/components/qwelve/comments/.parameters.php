<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

$arComponentParameters = [
    "GROUPS" => [
        "BASE" =>[
            "NAME" => Loc::getMessage("QWELVE_COMMENT_GROUP_OBJECT_TYPE"),
            "SORT" => 100
        ],
        "COMMENT_OBJECT" => [
            "NAME" => Loc::getMessage("QWELVE_COMMENT_GROUP_OBJECT"),
            "SORT" => 200
        ]
    ],
    "PARAMETERS" => [
        "COMMENT_OBJECT_TYPE" => [
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("QWELVE_COMMENT_PROP_OBJECT_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => [
                "IBLOCK_ELEM" => Loc::getMessage("QWELVE_COMMENT_PROP_IBLOCK_ELEM"),
                "PAGE_ELEM" => Loc::getMessage("QWELVE_COMMENT_PROP_PAGE_ELEM")
            ]
        ],
        "COMMENT_OBJECT" => [
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("QWELVE_COMMENT_PROP_OBJECT_TYPE"),
            "TYPE" => "STRING"
        ]
    ]
];