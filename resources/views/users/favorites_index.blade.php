@extends('layouts.app')

@section('content')
@include('commons.flash_message')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md-9">
        @include('users.navtabs', ['user' => $user])
        <div class="card border-info">
            <div class="card-header bordere-bottom border-info mb-2">
                検索フォーム
            </div>
            {!! Form::open(['method' => 'get','route' => ['users.favorites_serch', $user->id]]) !!}
            {!!Form::hidden('user_id', $user->id) !!}
                @include('combos.serch')
            {!! Form::close() !!}
        </div>
        @include('combos.combos', ['combos' => $combos])
        <br>
        @include('combos.combo_annotation')
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
<br>
@endsection