<?php
namespace Qwelve\TreeComments;

use Bitrix\Main\Entity;

class TreeCommentsTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'tree_comments';
    }
    
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('PARENT_ID'),
            new Entity\IntegerField('POST_ID'),
            new Entity\DateField('AUTHOR'),
            new Entity\DateField('COMMENT'),
            new Entity\DateField('ADDTIME'),
        );
    }
}
