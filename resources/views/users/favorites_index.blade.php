@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md">
        @include('users.navtabs', ['user' => $user])
        <div class="card border-info">
            <div class="card-header bordere-bottom border-info">
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
    </div>
</div>
<br>
@endsection