<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
if ($_REQUEST["ajax"] && ($_REQUEST["ajax"] == "yes")) {
    $APPLICATION->RestartBuffer();
    $addItemInfo = $this->addNewComment($_REQUEST["parent"], $_REQUEST["author"], $_REQUEST["comment"]);
    die();
}
