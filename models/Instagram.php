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
}