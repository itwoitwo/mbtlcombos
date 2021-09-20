@extends('layouts.app')

@section('content')

@include('combos.combo_annotation')
<br />
<br />
{!! Form::open(['route' => 'combos.store']) !!}
    <div class="form-group">
        <div class="form-group row">
            <div class="col-md-3 mb-2">
                {!! Form::select('キャラクター', [
                    '' => 'キャラクターを選択',
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
                    ],'' ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3 mb-2">
                {!! Form::select('version', ['1.00' => 'Ver. 1.00', '1.01' => 'Ver. 1.01'],'1.01' ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3 mb-2">
                {!! Form::select('コンボ難易度', ['' => 'コンボ難易度', 'easy' => '簡単！安定！', 'difficult' => '初心者向けではない'],'' ,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 mb-2">
                {!! Form::select('状況', [
                    '' => '状況',
                    'どこでも' => 'どこでも',
                    '中央限定' => '中央限定',
                    '端' => '端限定',
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
                {!! Form::label('magic_circuit', 'マジックサーキット') !!}
                {!! Form::select('magic_circuit', [
                    0 => 'ノーゲージ可',
                    1 => '1本',
                    2 => '2本',
                    3 => '3本',
                    4 => '4本',
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
            {!! Form::label('一言コメント', '一言コメント（「確反」「ヒット確認簡単」「対空始動」など。最大20文字。）') !!}
            {!! Form::text('一言コメント', old('一言コメント'), ['class' => 'form-control']) !!}
        </div>
        <br />
        <br />
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