<div class="card border-0">
	<div class="list-group col-md-3">
		<a href="{{ route('combos.index') }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('combos*') ? 'active' : '' }}">コンボ検索</a>
		@if (Auth::check())
			<a href="{{ route('users.adoptions_index', ['id' => Auth::user()->id]) }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('users*') ? 'active' : '' }}">コンボ管理</a>
			<a href="{{route('combo_post')}}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('combo_post') ? 'active' : ''}}">コンボを投稿する</a>
		@else
		<li class="list-group-item-primary list-group-item disabled">コンボ管理(会員のみ)</li>
		<li class="list-group-item-primary list-group-item disabled">コンボを投稿する(会員のみ)</li>
		<a href="{{ route('twitter') }}" class="list-group-item-primary list-group-item list-group-item-action">登録/ログインする</a>
		@endif
			<a href="{{ route('about') }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('about*') ? 'active' : '' }}">MBTLCombosとは？</a>
		<a href="{{route('top_page')}}" class="list-group-item-primary list-group-item list-group-item-action">トップに戻る</a>
		<br>
		<a href="{{ route('arcade') }}" class="list-group-item-primary list-group-item list-group-item-action {{ request()->route()->named('arcade') ? 'active' : '' }}">おまけ（アケコン紹介）</a>
		@if (isset($user))
			<br>
			@if(request()->route()->named('combos.*'))
			@else
			@include('users.card')
			@endif
		@endif
		<br>
		<div class="">
			{!! Form::open(['route' => 'users.serch', 'method' => 'get']) !!}
				{!! Form::text('user_name','', ['class' => 'form-control rounded-0 border-bottom-0','placeholder' => 'ユーザー検索']) !!}
				{!! Form::submit('検索する', ['class' => 'mb-2 col-md btn-light form-control border rounded-0 btn-block mx-auto']) !!}
			{!! Form::close() !!}
		</div>
		<br>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8705074607112164"
		crossorigin="anonymous"></script>
		<!-- サイドバー -->
		<ins class="adsbygoogle"
			style="display:block"
			data-ad-client="ca-pub-8705074607112164"
			data-ad-slot="6845112048"
			data-ad-format="auto"
			data-full-width-responsive="true"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<br>
	</div>
</div>