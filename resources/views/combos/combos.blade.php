<ul class="list-unstyled">
    <thead>
        <tr>
            <td>@sortablelink('adoption_count', '採用数')
            <td>@sortablelink('favorite_count', 'お気に入り数')
            <td>@sortablelink('damage', 'ダメージ')
            <td>@sortablelink('created_at', '作成日')
    </thead>
    <p>全{{$count_hits}}件がヒット</p>
    @foreach ($combos as $combo)
        <li class="card mb-3 mt-2">
            <ul class="breadcrumb mb-1 rounded-0 border-bottom">
                <li class="breadcrumb-item">{!! nl2br(e($combo->fighter)) !!}</li>
                <li class="breadcrumb-item"> Ver. {!! nl2br(e($combo->version)) !!}</li>
                @if($combo->difficulty === '簡単')
                    <li class="breadcrumb-item">
                        <i class="fas fa-seedling text-success"></i>
                    </li>
                @endif
                @if($combo->difficulty === '難しい')
                    <li class="breadcrumb-item">
                        <i class="bi bi-joystick text-danger"></i>
                    </li>
                @endif
                @if($combo->difficulty === '魅せコン')
                <li class="breadcrumb-item">
                    <i class="bi bi-moon-stars-fill text-primary"></i>
                </li>
                @endif
                <li class="breadcrumb-item">採用数&nbsp;<i class="bi bi-award-fill text-danger"></i>&nbsp;:&nbsp;{!! nl2br(e($combo->adoption_count)) !!}</li>
                <li class="breadcrumb-item">お気に入り&nbsp;<i class="bi bi-star-fill text-warning"></i>&nbsp;:&nbsp;{!! nl2br(e($combo->favorite_count)) !!}</li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.adoptions_index', ['id' => $combo->user_id]) }}" class="text-dark"><i class="far fa-user text-primary"></i>&nbsp;{!! nl2br(e($combo->user_name)) !!}</a>
                </li>
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
                    @if($combo->magic_circuit != 10)
                    マジックサーキット&nbsp;:&nbsp;{!! nl2br(e($combo->magic_circuit)) !!}本
                    @else
                    強制開放あり
                    @endif
                </div>
                @if ($combo->moon != 10)
                <div class="col-md">
                    <i class="fas fa-moon fa-flip-horizontal text-warning"></i>
                    :&nbsp;{!! nl2br(e($combo->moon)) !!}カウント
                </div>
                @else
                <div class="col-md">
                    <i class="fas fa-moon fa-flip-horizontal text-danger"></i>
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
            <div class="card-body border-top py-1">
                {!! nl2br(e($combo->words)) !!}
            </div>
            @if(isset($combo->video))
            <div class="card-body border-top py-1">
            <a href='{{nl2br(e($combo->video))}}' target="_blank" rel="noopener">
                {{nl2br(e($combo->video))}}
            </a> 
            </div>
            @else
            @endif
            <div class="mt-0 pt-0 border-top">
                {{-- ボタン --}}
                <div class="button-group mt-0 pt-0">
                    @if (Auth::check())
                        <div class="btn mt-0 pt-0 pr-0">
                            @include("favorite_and_adopt.adopt_button")
                        </div>
                        <div class="btn mt-0 pt-0 pr-0">
                            @include("favorite_and_adopt.favorite_button")
                        </div>
                        @if (Auth::id() == $combo->user_id)
                            <div class="btn mt-0 pt-0 pr-0">
                                <a href="{{ route('users.combos.detail', ['id' => $combo->id]) }}" class="btn"><i class="far fa-edit text-success"></i>編集</a>
                            </div>
                        @else
                            <div class="btn mt-0 pt-0 pr-0">
                                <a class="btn" data-toggle="collapse" href="#collapseReport{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapseReport{{$combo->id}}">
                                    <i class="fas fa-bullhorn fa-flip-horinzontal text-dark"></i>&nbsp;通報
                                </a>
                            </div>
                            {{-- 展開領域 --}}
                        <div class="collapse border-0" id="collapseReport{{$combo->id}}">
                            <div class="col-md offset-4 mb-1">
                                本当に通報しますか？
                                {!! Form::open(['route' => ['combos.report', $combo->id], 'method' => 'post']) !!}
                                    {!! Form::button('通報する', ['class' => "btn btn-danger ml-3", 'type' => 'submit']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @endif
                    @endif
                    @include("combos.combos_delete_button")
                    @include("commons.tweet_button")
                    @if(isset($combo->explain))
                    <div class="btn mt-0 pt-0 pr-0">
                        <a class="btn" data-toggle="collapse" href="#collapse{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$combo->id}}">
                            <i class="far fa-file-alt text-primary"></i>&nbsp;解説
                        </a>
                    </div>
                    {{-- 展開 --}}
                        <div class="collapse border-top" id="collapse{{$combo->id}}">
                            @if(isset($combo->explain))
                            <div class="card-body">
                                {!! nl2br(e($combo->explain)) !!}
                            </div>
                            @else
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $combos->appends(request()->query())->links('pagination::bootstrap-4') }}