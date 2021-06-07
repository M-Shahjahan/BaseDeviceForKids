<?php


namespace app\models;


class Instagram
{
    
    
    public static function fetchUserMetaData(){
        $accessToken ="EAAHAZBeRuF6YBAPTkil4pNbI1sFgWwrF7gBb9xvC6bPWJ4GGDBrB19VSq0mNem9w0GznZAkneC7IS35ZB9uQuZBCTofixQHLQaKm7R69eTbtrltjLYtc47ebJf2jJeT0RXQU2AZCN1kcQbh2sU3G63MXQZCu1fwGSp8URlM0GLAthr7VWKJv2J";
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
        $accessToken ="EAAHAZBeRuF6YBAPTkil4pNbI1sFgWwrF7gBb9xvC6bPWJ4GGDBrB19VSq0mNem9w0GznZAkneC7IS35ZB9uQuZBCTofixQHLQaKm7R69eTbtrltjLYtc47ebJf2jJeT0RXQU2AZCN1kcQbh2sU3G63MXQZCu1fwGSp8URlM0GLAthr7VWKJv2J";
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