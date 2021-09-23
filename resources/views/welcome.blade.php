@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<style>
    .content {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        text-align: center;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .title {
        font-size: 64px;
    }

    .about {
        color: #636b6f;
        font-size: 22px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .explain {
        color: #636b6f;
        padding: 0 25px;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-align: justify;
        /* text-transform: uppercase; */
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

<div class="content">
    <div class="center jumbotron ">
        <div class="text-center">
            <div class="title m-b-md">
                MELTY BLOOD<br>
                TYPE LUMINA Combos
            </div>
        </div>
</div>
<div class= >
    <h2 class ='text-center'>メルブラを盛り上げるための「コンボ特化型ＳＮＳ」誕生！</h2>
    <div class="explain">
        <p>
        『ＭＥＬＴＹ　ＢＬＯＯＤ：ＴＹＰＥ　ＬＵＭＩＮＡ』のコンボを収集、管理、共有するためのｗｅｂサービスです。<br>
        プレイヤーの皆様に投稿していただいたレシピを元に作られたデータベースから、充実した検索機能によって、他のプレイヤーが実戦でどんなコンボを採用しているのか調べたり、
        始動や状況別に一番減るコンボを探したりといった作業が自由自在！<br>
        さらに、メールアドレス不要の簡単登録で自分が実戦で使うコンボを記録しておくことが可能に。ライバルに差をつけろ！
        </p>
    </div>
    <p class="text-muted">※皆様からのコンボレシピの投稿が無ければ成り立ちません。特に発売初期は界隈を盛り上げるためにもぜひご協力ください。</p>
</div>
<br>
{!! link_to_route('combos.index','とりあえず使ってみる', [], ['class' => 'btn btn-lg btn-info mx-auto btn-block col-md-3']) !!}
<br>
{!! link_to_route('login', '登録する', [], ['class' => 'btn btn-lg btn-primary mx-auto btn-block col-md-3']) !!}
@endsection