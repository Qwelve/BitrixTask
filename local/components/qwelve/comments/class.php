<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Application,
    \Bitrix\Main\Loader,
    \Bitrix\Highloadblock\HighloadBlockTable;
Loader::includeModule("highloadblock");

class TreeCommentsComponent extends CBitrixComponent
{   
    private $hlBlockID = 3;
    public function getHighLoadList(){        
        $strEntityDataClass = $this->getHLBlock();
        $rsData = $strEntityDataClass::getList(array(
            'select' => array('ID', 'UF_PARENT_ID', 'UF_COMMENT', 'UF_POST_CODE', 'UF_AUTHOR', 'UF_ADDTIME', 'UF_POST_TYPE'),
            'order' => array('UF_ADDTIME' => 'ASC'),
            'filter' => array('UF_POST_CODE' => $this->arParams['COMMENT_OBJECT'], 'UF_POST_TYPE' => $this->arParams['COMMENT_OBJECT_TYPE'])
        ));
        while ($arItem = $rsData->Fetch()) {
            $arItems[] = $arItem;
        }
        return $arItems;
    }
    private function getHLBlock(){
        $arHLBlock = HighloadBlockTable::getById($this->hlBlockID)->fetch();        
        $obEntity = HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        return $strEntityDataClass;
    }
    public function buildTree(&$elements, $parentId = 0) {
        if(count($elements) < 1) return array();
        $branch = array();
        foreach ($elements as $element) {
            if ($element['UF_PARENT_ID'] == $parentId) {
                $children = $this->buildTree($elements, $element['ID']);
                if ($children) {
                    $element['CHILDREN'] = $children;
                }
                $branch[$element['ID']] = $element;
                unset($elements[$element['ID']]);
            }
        }
        return $branch;
    }
    public function addNewComment($parentID, $authorName, $commentText){
        $strEntityDataClass = $this->getHLBlock();        
        $data = array(
            "UF_AUTHOR"=>$authorName,
            "UF_PARENT_ID"=>$parentID,
            "UF_COMMENT"=>$commentText,
            "UF_POST_CODE"=>$this->arParams["COMMENT_OBJECT"],
            "UF_POST_TYPE"=>$this->arParams["COMMENT_OBJECT_TYPE"],
            "UF_ADDTIME" => new \Bitrix\Main\Type\DateTime()
         );
         $result = $strEntityDataClass::add($data);
         return $result;
    }
}
