<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if($request->isAjaxRequest()) {
    $APPLICATION->IncludeComponent(
        "qwelve:comments",
        "",
        [
            "COMMENT_OBJECT_TYPE" => $request->getPost("commentType"),
            "COMMENT_OBJECT" => $request->getPost("commentObject")
        ]
    );
}
die();