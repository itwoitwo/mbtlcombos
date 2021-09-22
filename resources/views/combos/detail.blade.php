@extends('layouts.app')
@section('content')
<li class="card mb-3 mt-2">
    <ul class="breadcrumb mb-1 rounded-0 border-bottom">
        <li class="breadcrumb-item">{!! nl2br(e($combo->fighter)) !!}</li>
        <li class="breadcrumb-item"> Ver. {!! nl2br(e($combo->version)) !!}</li>
        @if($combo->difficulty === 'easy')
            <li class="breadcrumb-item">
                <i class="fas fa-seedling text-success"></i>
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
    <div class="card-body border-top border-bottom py-1">
        {!! nl2br(e($combo->words)) !!}
    </div>
    <div class="mt-0 pt-0">
        <div class="button-group mt-0 pt-0">
            @if (Auth::check())
                <div class="btn mt-0 pt-0">
                    @include("favorite_and_adopt.adopt_button")
                </div>
                <div class="btn mt-0 pt-0">
                    @include("favorite_and_adopt.favorite_button")
                </div>
            @endif
            @if(isset($combo->explain) || isset($combo->video))
            <div class="btn mt-0 pt-0">
                <a class="btn" data-toggle="collapse" href="#collapse{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$combo->id}}">
                    <i class="far fa-file-alt text-primary"></i>&nbsp;詳細
                </a>
            </div>
            {{-- 展開領域 --}}
                <div class="collapse border-top" id="collapse{{$combo->id}}">
                    @if(isset($combo->explain))
                    <div class="card card-body">
                        {!! nl2br(e($combo->explain)) !!}
                    </div>
                    @else
                    @endif
                    @if(isset($combo->video))
                    <div class="card card-body border-0">
                    <a href='{!! nl2br(e($combo->video)) !!}' target="_blank" rel="noopener">
                        {!! nl2br(e($combo->video)) !!}
                    </a> 
                    </div>
                    @else
                    @endif
                </div>
            @endif
        </div>
    </div>
</li>
<br>
@if(Auth::id() == $combo->user_id)

<div class="form-group col-md-8 offset-2 card px-0">
    {!! Form::open(['method' => 'post','route' => ['combos.update', $combo->id]]) !!}
        {!! Form::hidden('id', $combo->id) !!}
        <div class="card-header">編集フォーム</div>
        <div class="form-group mb-2 card-body">
            {!! Form::label('version', '対応バージョンの修正') !!}
                {!! Form::select('version', [
                    '1.01' => '1.01',
                    '1.00' => '1.00',
                    ],$combo->version ,['class' => 'col-md-3 form-control']) !!}
        </div>
        <div class="form-group card-body">
            {!! Form::label('ダメージ', 'ダメージの修正') !!}
            {!! Form::text('ダメージ',$combo->damage, ['class' => 'form-control col-md-3','placeholder' => 'ダメージを入力']) !!}
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
@endsection