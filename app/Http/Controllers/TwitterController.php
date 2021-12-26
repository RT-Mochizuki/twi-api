<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function index(Request $request)
    {

        $result = \Twitter::get('statuses/home_timeline', array("count" => 1010));

        //ViewのTwitter.blade.phpに渡す
        return view('twitter', [
            "result" => $result
        ]);

    }
    public function search(Request $request)
    {
        $word = $request['word'];
        $result = \Twitter::get('/search/tweets', array("q" => $word, "count" => 100, "exclude" => "retweets" ));


        //ViewのTwitter.blade.phpに渡す
        return view('search', [
            "result" => $result,
            "word" => $word
        ]);
    }
}
