@extends('layouts.app')

@section('content')
<div class="low card-group">
    @include('commons.sidebar')
    <div class="col-md">
        @foreach ($users as $user)
        <div class="card mb-2">
            <div class="card-header auth">
                {{ $user->name }}<br>
            </div>
            <div class="card-body pb-1">
                <p>メインキャラ : {{ $user->main_character }} 機種 : {{ str_replace('","',', ',mb_substr($user->platform, 2, -2)) }}
                    <a href="{{ route('users.adoptions_index', ['id' => $user->id]) }}">{{ $user->name }}さんのページへ</a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection