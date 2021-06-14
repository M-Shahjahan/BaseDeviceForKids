<?php


namespace app\models;
use yii\base\Model;

class NominationForm extends Model
{
    public $name;
    public $email;
    public $school;
    public $address;
    public $contact;
    public $position;
    public $connection;
    public $emailAddress;
    public $otherInfo;
    public $reCaptcha;
    public function rules()
    {
        return [
            [['name','email','school','address','contact','position','connection','emailAddress','otherInfo'],'required'],
            [['email','emailAddress'],'email'],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'secret'=>'6LdvMygbAAAAAHaOXCN0GmNoDI-DPrxBIf2yaMkZ',
                'uncheckedMessage' => 'Please confirm that you are not a bot.'],
        ];
    }
}