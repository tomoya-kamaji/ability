<?php
namespace Helpers;
use GuzzleHttp\Client;

class iTunesapi
{
    /*
    検索ワードを指定して、APIでアプリを取得する。
       in:keyword
       out:posts -> track_id(アプリの一意のid),track_name(アプリの名前),artworkURL512(アプリの画像512*512),artistName(作成者),description(説明)
    */
    public static function iTunessearch($keyword)
    {
        $client = new Client([
            'base_uri' => 'https://itunes.apple.com/search',
        ]);
        $params['term']    = rawurlencode($keyword);
        $params['country'] = 'jp';
        $params['media']   = 'software';
        $params['limit']   = 12;
        $method = "GET";

        $url = '';
        foreach ($params as $k => $v) {
            $url .= '&' . $k . '=' . $v;
        }
        $url = '?' . substr($url, 1); // $url = "?term=chrome&country=JP";
        $response = $client->request($method, $url);
        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        return $posts;
    }


    public static function iTuneslookup($track_id)
    {
        $client = new Client([
            'base_uri' => 'https://itunes.apple.com/lookup',
        ]);
        $params['id']    = $track_id;
        $params['country'] = 'jp';
        $method = "GET";

        $url = '';
        foreach ($params as $k => $v) {
            $url .= '&' . $k . '=' . $v;
        }
        $url = '?' . substr($url, 1); // $url = "?term=chrome&country=JP";
        $response = $client->request($method, $url);
        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        return $posts;
    }
}
