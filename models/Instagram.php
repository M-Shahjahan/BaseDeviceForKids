<?php


namespace app\models;


class Instagram
{
    
    
    public function fetchUserMetaData(){
        $accessToken ="EAAHAZBeRuF6YBAD34JLKdVCANW1DS2BNmXkGEZC0St011WMsRQbu7JOZCOekXWqzR2YUlYRZAJgvkikonl26tueK8qkphFAFjYfEEoALMSpm9aZBN0Ui9AZB8aZCWwhiNhRytYL77qhM1FizZCQFKigCA1CZCF1a6jZCcab1tJuAN2ZAkSGSm7ZCQ4hG";
        $ig_id = "17841447771512559";
        $api_version="v10.0";
        $fields="username,media_count,followers_count,profile_picture_url,media,biography";
        $mainUrl = "https://graph.facebook.com";
        $url=$mainUrl."/".$api_version."/".$ig_id."?fields=".$fields."&access_token=".$accessToken;
        $response = @file_get_contents( $url);
        if($response!=false){
            return json_decode($response,true);

        }
    }

    public function fetchMediaMetaData($media,$size)
    {
        $mediaFields="media_type,media_url,comments_count,like_count,permalink,caption";
        $accessToken ="EAAHAZBeRuF6YBAD34JLKdVCANW1DS2BNmXkGEZC0St011WMsRQbu7JOZCOekXWqzR2YUlYRZAJgvkikonl26tueK8qkphFAFjYfEEoALMSpm9aZBN0Ui9AZB8aZCWwhiNhRytYL77qhM1FizZCQFKigCA1CZCF1a6jZCcab1tJuAN2ZAkSGSm7ZCQ4hG";
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
}