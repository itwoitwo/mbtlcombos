@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md">
        @include('users.navtabs', ['user' => $user])
        @include('combos.combos', ['combos' => $combos])
        <div class="card border-info">
            <div class="card-header bordere-bottom border-info">
                検索フォーム
            </div>
            {!! Form::open(['method' => 'get','route' => ['users.mycombos_serch', $user->id]]) !!}
            {!!Form::hidden('user_id', $user->id) !!}
                @include('combos.serch')
            {!! Form::close() !!}
        </div>
        <br />
        @include('combos.combo_annotation')
    </div>
</div>
@endsection