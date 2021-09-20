@extends('layouts.app')

@section('content')
これはMBTLCombosのトップページです。

<div class="">
    <a>{!! link_to_route('combos.index', 'Enter') !!}</a>
</div>
@endsection