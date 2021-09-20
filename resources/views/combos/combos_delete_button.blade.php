@if (Auth::id() == $combo->user_id)
{!! Form::open(['route' => ['combos.destroy', $combo->id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="bi bi-trash"></i>削除', ['class' => "btn", 'type' => 'submit']) !!}
{!! Form::close() !!}
@endif