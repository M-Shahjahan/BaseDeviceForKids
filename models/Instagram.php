<?php


namespace app\models;


class Instagram
{
    
    
    public static function fetchUserMetaData(){
        $accessToken ="EAAHAZBeRuF6YBAAXzYBBV7yasitn0e56fZCihAjHul23WF8sXqWS6ZBBto4z7nZBrZBYsnaN7Dhx7NTnWr0FjWQ2rlrJ5xAvZAf1CvfZCYogEjgxajxXd2ODxJHEus46qznoJJZB435A5XcwANjUxcBPlVjB3R1tLfTg54RZB6PW4jgLaMH4Ox4Ym";
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

    public static function fetchMediaMetaData($media,$size)
    {
        $mediaFields="media_type,media_url,comments_count,like_count,permalink,caption";
        $accessToken ="EAAHAZBeRuF6YBAAXzYBBV7yasitn0e56fZCihAjHul23WF8sXqWS6ZBBto4z7nZBrZBYsnaN7Dhx7NTnWr0FjWQ2rlrJ5xAvZAf1CvfZCYogEjgxajxXd2ODxJHEus46qznoJJZB435A5XcwANjUxcBPlVjB3R1tLfTg54RZB6PW4jgLaMH4Ox4Ym";
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