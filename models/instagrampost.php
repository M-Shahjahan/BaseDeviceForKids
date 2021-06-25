<?php


namespace app\models;
use yii\db\ActiveRecord;

class instagrampost extends ActiveRecord
{
    public static function tableName()
    {
        return 'instagrampost';
    }
}