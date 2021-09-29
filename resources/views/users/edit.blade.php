@extends('layouts.app')
@section('content')
<div class="low card-group">
    @include('commons.sidebar')
    <div class="col-md">
        <div class="form-group col-md-6 offset-3 card px-0">
            {!! Form::open(['method' => 'post','route' => ['users.update', $user->id]]) !!}
            <div class="card-header">ユーザー情報編集</div>
                <div class="form-group col-md">
                    <div class="form-group mb-2 card-body">
                        {!! Form::label('main_character', 'メインキャラ') !!}
                            {!! Form::select('main_character', [
                                '遠野志貴' => '遠野志貴',
                                'アルクェイド' => 'アルクェイド',
                                '遠野秋葉' => '遠野秋葉',
                                'シエル' => 'シエル',
                                '翡翠' => '翡翠',
                                '琥珀' => '琥珀',
                                '翡翠＆琥珀' => '翡翠＆琥珀',
                                '軋間紅摩' => '軋間紅摩',
                                '有馬都古' => '有馬都古',
                                'ノエル' => 'ノエル',
                                'ロア' => 'ロア',
                                'ヴローヴ' => 'ヴローヴ',
                                '暴走アルクェイド' => '暴走アルクェイド',
                                'セイバー' => 'セイバー',
                                ],$user->main_character ,['class' => 'form-control col-md']) !!}
                    </div>
                    <div class="form-group card-body mx-auto">
                        <span>機種 : </span>
                        <div class="custom-control custom-checkbox custom-control-inline">
                        {{Form::checkbox('platform[]', 'PS4', false, ['class'=>'custom-control-input','id'=>'platform1'])}}
                        {{Form::label('platform1','PS4',['class'=>'custom-control-label'])}}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                        {{Form::checkbox('platform[]', 'Switch', false, ['class'=>'custom-control-input','id'=>'platform2'])}}
                        {{Form::label('platform2','Switch',['class'=>'custom-control-label'])}}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                        {{Form::checkbox('platform[]', 'Steam', false, ['class'=>'custom-control-input','id'=>'platform3'])}}
                        {{Form::label('platform3','Steam',['class'=>'custom-control-label'])}}
                        </div>
                        </div>
                    <div>
                        {!! Form::submit('修正する', ['class' => 'col-md-4 mt-2 btn btn-primary btn-block mx-auto']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection