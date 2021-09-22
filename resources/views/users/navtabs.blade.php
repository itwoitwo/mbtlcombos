<ul class="nav nav-pills nav-justified mb-3 border border-primary rounded">
    <li class="nav-item"><a href="{{ route('users.adoptions_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.adoptions*') ? 'active' : '' }}">採用コンボ</a></li>
    <li class="nav-item border-left border-right border-primary"><a href="{{ route('users.favorites_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.favorites*') ? 'active' : '' }}">お気に入り</a></li>
    <li class="nav-item"><a href="{{ route('users.mycombos_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.mycombos*') ? 'active' : '' }}">投稿したコンボ</a></li>
</ul>

  <style>
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: white;
        background-color:#004085;
    }
  </style>
  