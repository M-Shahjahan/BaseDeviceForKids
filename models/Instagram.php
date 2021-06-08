<?php


namespace app\models;


class Instagram
{
    
    
    public static function fetchUserMetaData(){
        $accessToken ="EAAHAZBeRuF6YBAOA5yUZCuIP4S3xv5KpejhP4u54ylXQG0gVXM4kiwstdYfp6ZAau8Vw0dP2tLHqFY52bSX0oy6ZAlhPwPKc7FDL4yDhcuBzjON5v23tSpzvXRW97XrG4tx1HsATv2ZBm4XjKErQ7WqSwZC4ZChU9YmpF2rw3nEGRmk3TvxJXkJ";
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

    public static function fetchMediaMetaData($media,$size)
    {
        $mediaFields="media_type,media_url,comments_count,like_count,permalink,caption";
        $accessToken ="EAAHAZBeRuF6YBAOA5yUZCuIP4S3xv5KpejhP4u54ylXQG0gVXM4kiwstdYfp6ZAau8Vw0dP2tLHqFY52bSX0oy6ZAlhPwPKc7FDL4yDhcuBzjON5v23tSpzvXRW97XrG4tx1HsATv2ZBm4XjKErQ7WqSwZC4ZChU9YmpF2rw3nEGRmk3TvxJXkJ";
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