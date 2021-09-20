@extends('layouts.app')

@section('content')
<div class="low card-group">
    @include('commons.sidebar')
    <div class="col-md">
    <div class="card border-info">
        <div class="card-header bordere-bottom border-info">
            検索フォーム
        </div>
        {!! Form::open(['method' => 'get','route' => ['combos.serch']]) !!}
            @include('combos.serch')
        {!! Form::close() !!}
    </div>
    <br />
    @include('combos.combos')
    @include('combos.combo_annotation')
    </div>
</div>
@endsection