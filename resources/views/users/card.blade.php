<div class="card">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body pb-1">
        <p>メインキャラ:{{ $user->main_character }}</p>
        <p>機種:{!! nl2br(e($user->platform)) !!}</p>
    </div>
    @if(Auth::check())
        @if (Auth::user()->id === $user->id)
        <div class="card-footer py-1">
            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="link">編集</a>
        </div>
        @endif
    @endif
</div>