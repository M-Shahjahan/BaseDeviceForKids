<?php


namespace app\models;
use yii\db\ActiveRecord;

class instagramuser extends ActiveRecord
{
    public static function tableName()
    {
        return 'instagramuser';
    }
}