<div class="card">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body pb-1">
        <p>メインキャラ:{{ $user->main_character }}</p>
        <p>機種:{{ nl2br(e($user->platform)) }}</p>
    </div>
    <div class="card-body mt-0 pt-0 pr-0">
        <a class="" href="https://twitter.com/intent/tweet?url={{url('/')}}/users/{{$user->id}}&text=MBTLCombos {{$user->name}}さんのページ&hashtags=MBTLCombos,MBTL,メルブラ,タイプルミナ" target="blank_">
            <i class="fab fa-twitter text-primary"></i>&nbsp;<span class="text-dark">Tweet</span>
        </a>
    </div>
    @if(Auth::check())
        @if (Auth::user()->id === $user->id)
        <div class="card-footer py-1">
            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="link">編集</a>
        </div>
        @endif
    @endif
</div>
<br>