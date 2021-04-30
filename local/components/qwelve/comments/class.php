<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class TreeCommentsComponent extends CBitrixComponent
{    
    public function getHighLoadList(){
        switch ($this->arParams["COMMENT_OBJECT_TYPE"]){
            case 'IBLOCK_ELEM':
                return $this->getIBlockCommentList();
            case 'PAGE_ELEM':
                return $this->getStaticPageCommentList();
        }
    }
    private function getStaticPageCommentList(){
        if (CModule::IncludeModule('highloadblock')) {
            $strEntityDataClass = $this->getHLBlock(2);

            $rsData = $strEntityDataClass::getList(array(
               'select' => array('ID', 'UF_PARENT_ID', 'UF_COMMENT', 'UF_POST_SECTION', 'UF_AUTHOR', 'UF_ADDTIME'),
               'order' => array('UF_ADDTIME' => 'ASC'),
               'filter' => array('UF_POST_SECTION' => $this->arParams['COMMENT_OBJECT'])
            ));
            while ($arItem = $rsData->Fetch()) {
               $arItems[] = $arItem;
            }
            return $arItems;
        }
    }
    private function getIBlockCommentList(){
        if (CModule::IncludeModule('highloadblock')) {
            $strEntityDataClass = $this->getHLBlock(1);

            $rsData = $strEntityDataClass::getList(array(
               'select' => array('ID', 'UF_PARENT_ID', 'UF_COMMENT', 'UF_POST_ID', 'UF_AUTHOR', 'UF_ADDTIME'),
               'order' => array('UF_ADDTIME' => 'ASC'),
               'filter' => array('UF_POST_ID' => $this->arParams['COMMENT_OBJECT'])
            ));
            while ($arItem = $rsData->Fetch()) {
               $arItems[] = $arItem;
            }
            return $arItems;
        }         
    }
    private function getHLBlock($id){
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        return $strEntityDataClass;
    }
    public function buildTree(array &$elements, $parentId = 0) {
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
    public function addNewComment($parentID, $section, $commentText){
        $strEntityDataClass = $this->getHLBlock(2);
        $data = array(
            "UF_AUTHOR"=>'James Addler',
            "UF_PARENT_ID"=>'0',
            "UF_COMMENT"=>'ADD_TEST',
            "UF_POST_SECTION"=>"contacts",
            "UF_ADDTIME" => new \Bitrix\Main\Type\DateTime()
         );
      
         $result = $strEntityDataClass::add($data);
         return $result;
    }
    public function getTest(){
        return "test";
    }
}
