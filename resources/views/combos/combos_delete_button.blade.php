@if (Auth::id() == $combo->user_id)
<div class="btn mt-0 pt-0 pr-0">
    <a class="btn" data-toggle="collapse" href="#collapseDel{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapseDel{{$combo->id}}">
        <i class="bi bi-trash"></i>&nbsp;削除
    </a>
</div>
{{-- 展開領域 --}}
    <div class="collapse border-0" id="collapseDel{{$combo->id}}">
        <div class="col-md offset-4 mb-1">
            本当に削除しますか？
            {!! Form::open(['route' => ['combos.destroy', $combo->id], 'method' => 'delete']) !!}
                {!! Form::button('削除する', ['class' => "btn btn-danger", 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endif