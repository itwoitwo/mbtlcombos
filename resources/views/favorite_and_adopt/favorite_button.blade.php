@if (Auth::user()->is_favoring($combo->id))
{!! Form::open(['route' => ['favorites.unfavorite', $combo->id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="bi bi-star-fill text-warning"></i>お気に入り', ['class' => "btn", 'type' => 'submit']) !!}
{!! Form::close() !!}
@else
{!! Form::open(['route' => ['favorites.favorite', $combo->id], 'method' => 'post']) !!}
    {!! Form::button('<i class="bi bi-star text-warning"></i>お気に入り', ['class' => "btn", 'type' => 'submit']) !!}
{!! Form::close() !!}
@endif
