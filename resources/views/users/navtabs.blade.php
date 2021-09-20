<ul class="nav nav-pills nav-justified mb-3 border border-primary rounded">
    <li class="nav-item"><a href="{{ route('users.adopts_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.adopts*') ? 'active' : '' }}">採用コンボ</a></li>
    <li class="nav-item border-left border-right border-primary"><a href="{{ route('users.favorites_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.favorites*') ? 'active' : '' }}">お気に入り</a></li>
    <li class="nav-item"><a href="{{ route('users.mycombos_index', ['id' => $user->id]) }}" class="nav-link {{ request()->route()->named('users.mycombos*') ? 'active' : '' }}">投稿したコンボ</a></li>
</ul>