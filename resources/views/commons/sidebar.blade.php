{{-- @push('css')
<link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
@endpush --}}

<ul class="list-group col-md-3">
	<li class="list-group-item {{ request()->route()->named('combos*') ? 'active' : '' }}"><a href="{{ route('combos.index') }}" class="link text-dark">コンボ検索</a></li>
	@if (Auth::check())
	<li class="list-group-item {{ request()->route()->named('users*') ? 'active' : '' }}">
		<a href="{{ route('users.adopts_index', ['id' => Auth::user()->id]) }}" class="link text-dark">ユーザーページ</a></li>
	@else
	<li class="list-group-item">{!! link_to_route('signup.get', '登録してコンボを管理する', [], ['class' => 'link text-dark']) !!}</li>
	@endif
	<li class="list-group-item {{ request()->route()->named('about') ? 'active' : '' }}">
		<a href="{{ route('about') }}" class="link text-dark">MBTLCombosとは？</a></li>
	<li class="list-group-item"><a href="/" class="link text-dark">トップに戻る</a></li>
	@if (isset($user))
		<br />
		@include('users.card')
	@endif
</ul>