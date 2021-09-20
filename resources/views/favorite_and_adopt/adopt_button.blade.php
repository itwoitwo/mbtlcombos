@if (Auth::user()->is_adopting($combo->id))
{!! Form::open(['route' => ['adoptions.unadopt', $combo->id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="bi bi-award-fill text-danger"></i>&nbsp;採用', ['class' => "btn", 'type' => 'submit']) !!}
{!! Form::close() !!}
@else
{!! Form::open(['route' => ['adoptions.adopt', $combo->id], 'method' => 'post']) !!}
    {!! Form::button('<i class="bi bi-award text-danger"></i>&nbsp;採用', ['class' => "btn", 'type' => 'submit']) !!}
{!! Form::close() !!}
@endif