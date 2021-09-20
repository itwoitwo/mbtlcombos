@extends('layouts.app')
@section('content')
        <div class="card mb-3 mt-2">
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
                    マジックサーキット&nbsp;:&nbsp;{!! nl2br(e($combo->magic_circuit)) !!}本
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
            </div>
            </div>
        </div>
@endsection