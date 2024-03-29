<?php
namespace Helpers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Application;
use Illuminate\Support\Facades\Auth;

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


        $i = 0;
        foreach($posts['results'] as $post){
            $application = Application::where('trackid', $posts['results'][$i]['trackId'])->first();

            if (is_null($application)) {
                $posts['results'][$i] = array_merge($posts['results'][$i],array('id' => 0));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('countlikes' => 0));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('isLikedBy' => false));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('averageReviews' => 0));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('countreviews' => 0));
            }else{
                $posts['results'][$i] = array_merge($posts['results'][$i],array('id' => $application->id));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('countlikes' => $application->count_likes));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('isLikedBy' => $application->isLikedBy(Auth::user())));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('averageReviews' => $application->average_reviews));
                $posts['results'][$i] = array_merge($posts['results'][$i],array('countreviews' => $application->users->count()));
            }
            $i++;
        }
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



        $application = Application::where('trackid', $posts['results'][0]['trackId'])->first();
        if (is_null($application)) {
            $posts['results'][0] = array_merge($posts['results'][0], array('id' => 0));
            $posts['results'][0] = array_merge($posts['results'][0], array('countlikes' => 0));
            $posts['results'][0] = array_merge($posts['results'][0], array('isLikedBy' => false));
            $posts['results'][0] = array_merge($posts['results'][0], array('averageReviews' => 0));
            $posts['results'][0] = array_merge($posts['results'][0], array('countreviews' => 0));
        } else {
            $posts['results'][0] = array_merge($posts['results'][0], array('id' => $application->id));
            $posts['results'][0] = array_merge($posts['results'][0], array('countlikes' => $application->count_likes));
            $posts['results'][0] = array_merge($posts['results'][0], array('isLikedBy' => $application->isLikedBy(Auth::user())));
            $posts['results'][0] = array_merge($posts['results'][0], array('averageReviews' => $application->average_reviews));
            $posts['results'][0] = array_merge($posts['results'][0], array('countreviews' => $application->users->count()));
        }
        return $posts;
    }
}
