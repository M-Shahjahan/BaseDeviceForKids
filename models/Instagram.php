<?php


namespace app\models;


class Instagram
{
    
    
    public static function fetchUserMetaData($accessToken){
        //$accessToken ="EAAHAZBeRuF6YBAKovMUOwDXiGP2or5BqD5eSA7n1asSNzMnOSHIbRaikxBNrol9cjODxIHSMC3IHBhR4jkgQctJmLi7nQ4RH6blMITJ3aQ1Uk7vq1monghnMr8qGsq0SrO5I5wS7Osp0k4MtuX5oV7idus1vjEdOO6QZCkP49QFDZBp41kl";
        $ig_id = "17841447771512559";
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
        //$accessToken ="EAAHAZBeRuF6YBAKovMUOwDXiGP2or5BqD5eSA7n1asSNzMnOSHIbRaikxBNrol9cjODxIHSMC3IHBhR4jkgQctJmLi7nQ4RH6blMITJ3aQ1Uk7vq1monghnMr8qGsq0SrO5I5wS7Osp0k4MtuX5oV7idus1vjEdOO6QZCkP49QFDZBp41kl";
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
        $ig_id = "17841447771512559";
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
        $ig_id = "17841447771512559";
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