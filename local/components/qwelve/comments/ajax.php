<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$value = $request->getPost("value");

echo $value;
die();