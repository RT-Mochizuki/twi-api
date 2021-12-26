@extends('layouts.app')

@section('content')

    <div class="container m-auto pt-10">

    <form action="/twitter/search" method="get">
        <input type="text" value="{{$word}}" name="word">
        <input type="submit" value="検索">
    </form>



    <p class="mb-5">検索結果：{{ count($result->statuses) == 100 ? "100件以上": count($result->statuses)."件" }}</p>
        @foreach ($result->statuses as $tweet)
            <div class="card mb-5 bg-white p-5">
                <div class="card-body">
                    <div class="flex justify-between">
                        <p style="width : 84px">
                            <img src="{{$tweet->user->profile_image_url}}" width="80" height="auto" class="rounded-circle mr-4">
                        </p>
                        <div style="width: calc(100% - 115px)" class="media-body">
                            <h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}（＠{{$tweet->user->screen_name}}）</strong></h5>
                            <h6 class="d-inline text-secondary">{{ date('Y/m/d H:i:s', strtotime($tweet->created_at)) }}</h6>
                            <p>TweetID: {{ $tweet->id }}</p>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                            <p>リツイート：{{$tweet->retweet_count}}　いいね：{{$tweet->favorite_count}}</p>
                            @if(isset($tweet->extended_entities->media[0]))
                            <div class="flex">
                                @foreach($tweet->extended_entities->media as $media)
                                <p style="width: 400px" class="m-5"><a href="{{$media->media_url_https}}" target="_blank"><img src="{{$media->media_url_https}}"></a></p>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex flex-row justify-content-end">
                        <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                        <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                        <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
