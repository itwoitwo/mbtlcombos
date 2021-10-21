@extends('layouts.app')

@section('content')
@include('commons.flash_message')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md-9">
        <div class="card border-info">
            <div class="card-header bordere-bottom border-info">
                検索フォーム
            </div>
            {!! Form::open(['method' => 'get','route' => ['combos.serch']]) !!}
                @include('combos.serch')
            {!! Form::close() !!}
        </div>
        <br>
        @include('combos.combos')
        @include('combos.combo_annotation')
        <br>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8705074607112164"
                crossorigin="anonymous"></script>
        <!-- 横長 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-8705074607112164"
            data-ad-slot="3369669378"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
        </script>    
    </div> 
</div>
<br>
@endsection