@extends('layouts.app')
@section('content')
{!! Form::open(['method' => 'post','route' => ['users.update', $user->id]]) !!}
    <div class="form-group col-md">
        <div class="form-group mb-2">
            {!!Form::hidden('user_id', $user->id) !!}
            {!! Form::label('main_character', 'メインキャラ') !!}
                {!! Form::select('main_character', [
                    '遠野志貴' => '遠野志貴',
                    'アルクェイド' => 'アルクェイド・ブリュンスタッド',
                    '遠野秋葉' => '遠野秋葉',
                    'シエル' => 'シエル',
                    '翡翠' => '翡翠',
                    '琥珀' => '琥珀',
                    '軋間紅摩' => '軋間紅摩',
                    '有馬都古' => '有馬都古',
                    'ノエル' => 'ノエル',
                    'ロア' => 'ミハイル・ロア・バルダムヨォン',
                    'ヴローヴ' => 'ヴローヴ・アルハンゲリ',
                    ],$user->main_character ,['class' => 'form-control']) !!}
        </div>
        <div class="form-group mb-4">
            {!! Form::label('platform', '機種') !!}
            {!! Form::text('platform', $user->platform, ['class' => 'form-control']) !!}
        </div>
        <div>
            {!! Form::submit('修正する', ['class' => 'col-md-4 mt-5 btn-lg btn-primary btn-block mx-auto']) !!}
        </div>
    </div>
{!! Form::close() !!}
@endsection