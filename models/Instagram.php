<?php


namespace app\models;


class Instagram
{
    
    
    public static function fetchUserMetaData($accessToken){
        $ig_id = "17841448326243769";
        $api_version="v10.0";
        $fields="username,media_count,followers_count,profile_picture_url,media,biography,name";
        $mainUrl = "https://graph.facebook.com";
        $url=$mainUrl."/".$api_version."/".$ig_id."?fields=".$fields."&access_token=".$accessToken;
        $response = @file_get_contents( $url);
        if($response!=false){
            return json_decode($response,true);

        }
    }

    public static function fetchMediaMetaData($media,$size,$accessToken)
    {
        $mediaFields="media_type,media_url,comments_count,like_count,permalink,caption";
        $api_version="v10.0";
        $mainUrl = "https://graph.facebook.com";
        $dataReturned=[];
        for ($index = 0; $index < $size; ++$index) {
            $url = $mainUrl . "/" . $api_version . "/" . $media[$index]['id'] . "?fields=" . $mediaFields . "&access_token=" . $accessToken;
            $response = @file_get_contents($url);
            if ($response != false) {
                $data = json_decode($response, true);
                if ($data != null) {
                    array_push($dataReturned,$data);
                }

            }

        }
        return $dataReturned;
    }
    public static function fetchBasicUserMetaData($accessToken){
        $ig_id = "4168781673187942";
        $fields="id,username,media_count";
        $mainUrl = "https://graph.instagram.com";
        $url="$mainUrl/$ig_id?fields=$fields&access_token=$accessToken";
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($curlSession));
        curl_close($curlSession);
        return $data;
    }
    public static function fetchBasicMediaMetaData($accessToken){
        $ig_id = "4168781673187942";
        $fields="media_type,media_url,permalink,caption";
        $mainUrl = "https://graph.instagram.com";
        $url="$mainUrl/".$ig_id."/media?fields=$fields&access_token=$accessToken";
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $media = json_decode(curl_exec($curlSession));
        curl_close($curlSession);
        return $media;
    }
}