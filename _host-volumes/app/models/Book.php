<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * curl -X POST http://localhost:8102/v1/book/create?access-token=xxx -H 'Content-type: application/json' -d '{"title":"Agrotóxicos", "author":"Larissa Mies Bombardi", "pages":101}' | json_reformat
 */
class Book extends ActiveRecord
{ 
    public static function tableName()
    {
        return 'book';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['author'], 'required'],
            [['pages'], 'required'],
        ];
    }
}