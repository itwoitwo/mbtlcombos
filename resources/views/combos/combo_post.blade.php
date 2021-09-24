@extends('layouts.app')

@section('content')
<div class="col-md">
@include('combos.combo_annotation')
<br>
<br>
{!! Form::open(['route' => 'combos.store']) !!}
    <div class="form-group">
        <div class="form-group row">
            <div class="col-md-6 mb-2">
                {!! Form::select('キャラクター', [
                    '' => 'キャラクターを選択',
                    '遠野志貴' => '遠野志貴',
                    'アルクェイド' => 'アルクェイド',
                    '遠野秋葉' => '遠野秋葉',
                    'シエル' => 'シエル',
                    '翡翠' => '翡翠',
                    '琥珀' => '琥珀',
                    '翡翠＆琥珀'=>'翡翠＆琥珀',
                    '軋間紅摩' => '軋間紅摩',
                    '有馬都古' => '有馬都古',
                    'ノエル' => 'ノエル',
                    'ロア' => 'ロア',
                    'ヴローヴ' => 'ヴローヴ',
                    ],'' ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3 mb-2">
                {!! Form::select('version', ['1.01' => 'Ver. 1.01', '1.00' => 'Ver. 1.00'],'1.01' ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3 mb-2">
                {!! Form::select('コンボ難易度', ['' => 'コンボ難易度', '簡単' => '簡単！安定！', '普通' => 'そこそこ', '難しい' => 'ベテラン向け', '魅せコン' => '魅せコン'],'' ,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 mb-2">
                {!! Form::select('状況', [
                    '' => '状況を選択',
                    'どこでも' => 'どこでも',
                    '端以外' => '端以外',
                    '端限定' => '端限定',
                    '端背負い限定' => '端背負い限定',
                    'その他' => 'その他',
                    ],'' ,['class' => 'form-control']) !!}
            </div>                
            <div class="col-md-3 mb-2">
                {!! Form::select('始動技', [
                    '' => '始動技を選択',
                    'A系統' => 'A系統',
                    'B系統' => 'B系統',
                    'C系統' => 'C系統',
                    '必殺技' => '必殺技',
                    'その他' => 'その他',
                    ],'' ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3 mb-2">
                {!! Form::select('counter_hit', [
                    'ノーマルヒット' => 'ノーマルヒット',
                    'カウンター限定' => 'カウンター限定',
                    'フェイタル限定' => 'フェイタル限定',
                    ],'ノーマルヒット' ,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-3 mb-2">
                {!! Form::label('magic_circuit', 'マジックサーキット',['class' => 'pr-0 mr-0']) !!}
                {!! Form::select('magic_circuit', [
                    0 => 'ノーゲージ可',
                    1 => '1本',
                    2 => '2本',
                    3 => '3本',
                    4 => '4本',
                    10 => '強制開放あり',
                    ],'' ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3 mb-2">
                <i class="fas fa-moon fa-flip-horizontal text-warning"></i> {!! Form::label('moon', 'ムーンアイコン') !!}
                {!! Form::select('moon', [
                    0 => 'ノーゲージ可',
                    1 => '1カウント',
                    2 => '2カウント',
                    3 => '3カウント',
                    10 => 'ムーンドライブ発動',
                    ],'' ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('ダメージ', 'ダメージ') !!}
                {!! Form::text('ダメージ', old('ダメージ'), ['class' => 'form-control','placeholder' => 'ダメージを入力']) !!}
            </div>
        </div>
        <div class="form-group mb-2">
            {!! Form::label('コンボレシピ', 'コンボレシピ') !!}
            {!! Form::textarea('コンボレシピ', old('コンボレシピ'), ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div class="form-group mb-4">
            {!! Form::label('タグ', 'タグ（確反、ヒット確認簡単、対空始動、などの検索しやすくなる情報。最大30文字。）') !!}
            {!! Form::text('タグ', old('タグ'), ['class' => 'form-control']) !!}
        </div>
        <br>
        <br>
        <div class="form-group mb-4">
            {!! Form::label('explain', '備考（特殊な条件やコツなど）　※ダメージ、備考、動画は空欄可') !!}
            {!! Form::textarea('explain', old('explain'), ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div class="mb-2">
            {!! Form::text('動画', old('動画'), ['class' => 'form-control', 'placeholder' => '動画URL']) !!}
        </div>
        <div>
            {!! Form::submit('投稿する', ['class' => 'col-md-4 mt-5 btn-lg btn-primary btn-block mx-auto']) !!}
        </div>
    </div>
{!! Form::close() !!}
@endsection