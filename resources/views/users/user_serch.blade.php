@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md-9">
        <p>全{{$count_users_hits}}件がヒット</p>
        @foreach ($users as $user)
        <div class="card mb-2">
            <div class="card-header auth">
                {{ $user->name }}<br>
            </div>
            <div class="card-body pb-1">
                <p>メインキャラ : {{ $user->main_character }}　機種 : {{ str_replace('","',', ',mb_substr($user->platform, 2, -2)) }}　
                    <a href="{{ route('users.adoptions_index', ['id' => $user->id]) }}">{{ $user->name }}さんのページへ</a></p>
            </div>
        </div>
        @endforeach
        {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
        <br>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8705074607112164"
            crossorigin="anonymous"></script>
        <!-- 横長 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-8705074607112164"
            data-ad-slot="3369669378"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
@endsection