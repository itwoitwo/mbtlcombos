<div class="list-group col-md-3">
	<a href="{{ route('combos.index') }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('combos*') ? 'active' : '' }}">コンボ検索</a>
	@if (Auth::check())
		<a href="{{ route('users.adoptions_index', ['id' => Auth::user()->id]) }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('users*') ? 'active' : '' }}">コンボ管理</a>
		<a href="{{route('combo_post')}}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('combo_post') ? 'active' : ''}}">コンボを投稿する</a>
	@else
	<li class="list-group-item-primary list-group-item disabled">コンボ管理(会員のみ)</li>
	<li class="list-group-item-primary list-group-item disabled">コンボを投稿する(会員のみ)</li>
	<a href="{{ route('signup.get') }}" class="list-group-item-primary list-group-item list-group-item-action">登録する</a>
	@endif
		<a href="{{ route('about') }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('about') ? 'active' : '' }}">MBTLCombosとは？</a>
	<a href="{{route('top_page')}}" class="list-group-item-primary list-group-item list-group-item-action">トップに戻る</a>
	@if (isset($user))
		<br>
		@if(request()->route()->named('combos.index'))
		@else
		@include('users.card')
		@endif
	@endif
	</div>