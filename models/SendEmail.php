<?php


namespace app\models;


class SendEmail
{
    public static function sendMail($objEmailInfo){
        $result       = false;
        $url      = 'http://expresspg.co.uk/emailcontainer/send_email.php';
        $objData  = json_encode($objEmailInfo, true);
        $objData  = urlencode($objData);
        $postData = ['method' => 'external', 'email_data' => $objData];
        $result   = self::postViaCurl($postData, $url);
        return $result;
    }
    public static function postViaCurl($data, $url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
    }
}