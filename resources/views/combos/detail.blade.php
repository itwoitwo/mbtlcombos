@extends('layouts.app')
@section('content')
@include('commons.flash_message')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md-9">
        <li class="card mb-3 mt-2">
            <ul class="breadcrumb mb-1 rounded-0 border-bottom">
                <li class="breadcrumb-item">{!! nl2br(e($combo->fighter)) !!}</li>
                <li class="breadcrumb-item"> Ver. {!! nl2br(e($combo->version)) !!}</li>
                @if($combo->difficulty === '簡単')
                <li class="breadcrumb-item">
                    <i class="fas fa-seedling text-success"></i>
                </li>
                @endif
                @if($combo->difficulty === '難しい')
                    <li class="breadcrumb-item">
                        <i class="bi bi-joystick text-danger"></i>
                    </li>
                @endif
                @if($combo->difficulty === '魅せコン')
                <li class="breadcrumb-item">
                    <i class="bi bi-moon-stars-fill text-primary"></i>
                </li>
                @endif
                <li class="breadcrumb-item">採用数&nbsp;<i class="bi bi-award-fill text-danger"></i>&nbsp;:&nbsp;{!! nl2br(e($combo->adoption_count)) !!}</li>
                <li class="breadcrumb-item">お気に入り&nbsp;<i class="bi bi-star-fill text-warning"></i>&nbsp;:&nbsp;{!! nl2br(e($combo->favorite_count)) !!}</li>
            </ul>
            <div class="row card-body py-1">
                <div class="col-md">
                    場所&nbsp;:&nbsp;{!! nl2br(e($combo->place)) !!}
                </div>
                <div class="col-md">
                    始動&nbsp;:&nbsp;{!! nl2br(e($combo->starting)) !!}
                </div>
                <div class="col-md">
                    {!! nl2br(e($combo->counter_hit)) !!}
                </div>
            </div>
            <div class="row card-body py-1">
                <div class="col-md">
                    @if($combo->magic_circuit != 10)
                    マジックサーキット&nbsp;:&nbsp;{!! nl2br(e($combo->magic_circuit)) !!}本
                    @else
                    強制開放あり
                    @endif
                </div>
                @if ($combo->moon != 10)
                <div class="col-md">
                    <i class="fas fa-moon fa-flip-horizontal text-warning"></i>
                    :&nbsp;{!! nl2br(e($combo->moon)) !!}カウント
                </div>
                @else
                <div class="col-md">
                    <i class="fas fa-circle text-danger"></i>
                    :&nbsp;ムーンドライブ
                </div>
                @endif
                <div class="col-md">
                    ダメージ&nbsp;:&nbsp;{!! nl2br(e($combo->damage)) !!}
                </div>
            </div>
            <div style="font-size: 20px" class="card-body border-top">
                {!! nl2br(e($combo->recipe)) !!}
            </div>
            <div class="card-body border-top py-1">
                {!! nl2br(e($combo->words)) !!}
            </div>
            @if(isset($combo->video))
            <div class="card-body border-top py-1">
            <a href='{{nl2br(e($combo->video))}}' target="_blank" rel="noopener">
                {{nl2br(e($combo->video))}}
            </a> 
            </div>
            @else
            @endif
            @if(isset($combo->explain))
            <div class="card-body border-top">
                {!! nl2br(e($combo->explain)) !!}
            </div>
            @else
            @endif
            <div class="mt-0 pt-0 border-top">
                {{-- ボタン --}}
                <div class="button-group mt-0 pt-0">
                    @if (Auth::check())
                        <div class="btn mt-0 pt-0 pr-0">
                            @include("favorite_and_adopt.adopt_button")
                        </div>
                        <div class="btn mt-0 pt-0 pr-0">
                            @include("favorite_and_adopt.favorite_button")
                        </div>
                        @if (Auth::id() == $combo->user_id)
                        @else
                            <div class="btn mt-0 pt-0 pr-0">
                                <a class="btn" data-toggle="collapse" href="#collapseReport{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapseReport{{$combo->id}}">
                                    <i class="fas fa-bullhorn fa-flip-horinzontal text-dark"></i>&nbsp;通報
                                </a>
                            </div>
                            {{-- 展開領域 --}}
                        <div class="collapse border-0" id="collapseReport{{$combo->id}}">
                            <div class="col-md offset-4 mb-1">
                                本当に通報しますか？
                                {!! Form::open(['route' => ['combos.report', $combo->id], 'method' => 'post']) !!}
                                    {!! Form::button('通報する', ['class' => "btn btn-danger ml-3", 'type' => 'submit']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @endif
                    @endif
                    <div class="btn mt-0 pt-0 pr-0">
                        {{-- ハッシュタグ分岐 --}}
                        @if($combo->fighter == '遠野志貴')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_SH" target="blank_">
                        @elseif ($combo->fighter == 'アルクェイド')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_AR" target="blank_">
                        @elseif ($combo->fighter == '遠野秋葉')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_AK" target="blank_">
                        @elseif ($combo->fighter == 'シエル')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_CI" target="blank_">
                        @elseif ($combo->fighter == '翡翠')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_HI" target="blank_">
                        @elseif ($combo->fighter == '琥珀')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KO" target="blank_">
                        @elseif ($combo->fighter == '翡翠＆琥珀')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KI" target="blank_">
                        @elseif ($combo->fighter == '軋間紅摩')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KI" target="blank_">
                        @elseif ($combo->fighter == '有馬都古')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_MI" target="blank_">
                        @elseif ($combo->fighter == 'ノエル')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_NO" target="blank_">
                        @elseif ($combo->fighter == 'ロア')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_RO" target="blank_">
                        @elseif ($combo->fighter == 'ヴローヴ')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_VL" target="blank_">
                        @elseif ($combo->fighter == '暴走アルクェイド')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_RE" target="blank_">
                        @elseif ($combo->fighter == 'セイバー')
                            <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_SA" target="blank_">
                        @endif    
                        <i class="fab fa-twitter text-primary"></i>&nbsp;Tweet
                    </a>
                    </div>
                </div>
            </div>
        </li>
        <br>
        @if(Auth::id() == $combo->user_id)
            <div class="form-group col-md card px-0">
                {!! Form::open(['method' => 'post','route' => ['combos.update', $combo->id]]) !!}
                    {!! Form::hidden('id', $combo->id) !!}
                    <div class="card-header">編集フォーム</div>
                    <div class="form-group row m-2">
                        <div class="form-group mb-2 card-body">
                            {!! Form::label('version', '対応バージョンの修正') !!}
                                {!! Form::select('version', [
                                    // '1.01' => 'Ver. 1.01',
                                    '1.00' => 'Ver. 1.00',
                                    ],$combo->version ,['class' => 'col-md form-control']) !!}
                        </div>
                        <div class="form-group mb-2 card-body">
                            {!! Form::label('始動技', '始動技の修正') !!}
                                {!! Form::select('始動技', [
                                    'A系統' => 'A系統',
                                    'B系統' => 'B系統',
                                    'C系統' => 'C系統',
                                    '空中技' => '空中技',
                                    '必殺技' => '必殺技',
                                    'その他' => 'その他',
                                    ],$combo->starting ,['class' => 'col-md form-control']) !!}
                        </div>
                        <div class="form-group card-body">
                            {!! Form::label('ダメージ', 'ダメージの修正') !!}
                            {!! Form::text('ダメージ',$combo->damage, ['class' => 'form-control col-md','placeholder' => 'ダメージを入力']) !!}
                        </div>
                    </div>
                    <div class="form-group mb-4 card-body">
                        {!! Form::label('タグ', 'タグ（「確反」「ヒット確認簡単」「対空始動」など。最大30文字。）') !!}
                        {!! Form::text('タグ', $combo->words, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group mb-4 card-body">
                        {!! Form::label('explain', '備考（特殊な条件やコツなど）') !!}
                        {!! Form::textarea('explain', $combo->explain, ['class' => 'form-control', 'rows' => '2']) !!}
                    </div>
                    <div class="mb-2 card-body">
                        {!! Form::label('動画', '動画URL') !!}
                        {!! Form::text('動画', $combo->video, ['class' => 'form-control', 'placeholder' => '動画URL']) !!}
                    </div>
                    <div>
                        {!! Form::submit('修正する', ['class' => 'col-md-4 py-2 mb-2 btn btn-primary btn-block mx-auto card-body']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        @endif
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