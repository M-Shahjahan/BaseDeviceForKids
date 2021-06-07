<?php


namespace app\models;


class Instagram
{
    
    
    public function fetchUserMetaData(){
        $accessToken ="EAAHAZBeRuF6YBAJrW5e8vvIsiqnZAZAWZAN96mMjs3OlDbiomVW0kKFpUrRzfJUPm9EfOhDyXCyAFyX3Ku0QzB2uTmuSMo5JAjt8VwJNzo4W7IJG91NMeWd4poxqVM79iZAVwG0rrSaOUSgEiAljqF4Eo0pcZCUdJvDfFOlfIXGUerol93ZCMbO";
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
        $accessToken ="EAAHAZBeRuF6YBAJrW5e8vvIsiqnZAZAWZAN96mMjs3OlDbiomVW0kKFpUrRzfJUPm9EfOhDyXCyAFyX3Ku0QzB2uTmuSMo5JAjt8VwJNzo4W7IJG91NMeWd4poxqVM79iZAVwG0rrSaOUSgEiAljqF4Eo0pcZCUdJvDfFOlfIXGUerol93ZCMbO";
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