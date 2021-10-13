@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md">
        <div class="row card">
            <h2 class="card-header topic">はじめに</h2>
            <p class="card-body mb-0">
                アケコン歴5台、改造や痛アケコン化も経験している管理人が、初心者向けに現行アケコンのおすすめを語るおまけコーナー。<br>
                趣味半分、サーバー維持費のために広告を貼りたい気持ち半分の私利私欲にまみれたページです。メルブラ始めて、アケコンにも興味出てきたけどどれ買っていいかわからないよーって方の参考になれば幸いです。<br>
                基本的におすすめ順に紹介していきます。
            </p>
            <h2 class="card-header topic">Qanba Drone</h2>
            <p class="card-body mb-0">
                初心者が迷ったらまずはこれ。PS3、PS4(PS5)、PC対応。Qanba自社レバー、自社ボタンを採用しているが、低価格、小型、軽量とまさしくライト向けなのが良いところ。ただし、ライト向けと侮るなかれ。<br>
                遅延の少なさは良好、ボタンやレバーのメンテナンスや換装も可能で、本気のやり込みにも十分に応えてくれる。まずはこれを試してみて、ゲームやアケコンにハマれたらボタンやレバーの改造に手を出すのがおすすめ。ボタンは1個200～300円から。レバーは3000円ぐらい。プラスドライバーとマイナスドライバーさえあれば難しい作業は必要無い。<br>
                欠点は、イヤホンジャックとタッチパネルが非搭載。PS4版メルブラだと、トレモのメニュー画面を非表示にすることが出来ない（？）。痛アケコンにする場合はステッカーを貼る形になるので結構大変。<br>
                管理人が使っているのもこれのボタンとレバーを換装したもの。メルブラ開発ディレクターの芹沢鴨音さんも使っていた。<br>
                <a href="https://www.amazon.co.jp/dp/B078SST6QC?&linkCode=li3&tag=iton619-22&linkId=c8bf819d4c8ed89948e7c8d434f8966f&language=ja_JP&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B078SST6QC&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=iton619-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=iton619-22&language=ja_JP&l=li3&o=9&a=B078SST6QC" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
            </p>
        </div>
    </div>
    <br>
</div>
<br>

<style>
    .topic {
        background-color:lightskyblue;
    }
  </style>
@endsection