<div class="btn mt-0 pt-0 pr-0">
    {{-- ハッシュタグ分岐 --}}
    @if($combo->fighter == '遠野志貴')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_SH" target="blank_">
    @elseif ($combo->fighter == 'アルクェイド')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_AR" target="blank_">
    @elseif ($combo->fighter == '遠野秋葉')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_AK" target="blank_">
    @elseif ($combo->fighter == 'シエル')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_CI" target="blank_">
    @elseif ($combo->fighter == '翡翠')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_HI" target="blank_">
    @elseif ($combo->fighter == '琥珀')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KO" target="blank_">
    @elseif ($combo->fighter == '翡翠＆琥珀')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KI" target="blank_">
    @elseif ($combo->fighter == '軋間紅摩')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_KI" target="blank_">
    @elseif ($combo->fighter == '有馬都古')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_MI" target="blank_">
    @elseif ($combo->fighter == 'ノエル')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_NO" target="blank_">
    @elseif ($combo->fighter == 'ロア')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_RO" target="blank_">
    @elseif ($combo->fighter == 'ヴローヴ')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_VL" target="blank_">
    @elseif ($combo->fighter == '暴走アルクェイド')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_RE" target="blank_">
    @elseif ($combo->fighter == 'セイバー')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_SA" target="blank_">
    @elseif ($combo->fighter == '死徒ノエル')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_DN" target="blank_">
    @elseif ($combo->fighter == '蒼崎青子')
        <a class="btn" href="https://twitter.com/intent/tweet?url={{url('/')}}/combos/{{$combo->id}}&text=MBTLCombos {{$combo->fighter}} {{$combo->damage}}ダメージ {{$combo->recipe}}&hashtags=MBTLCombos,MBTL,メルブラ,MBTL_AO" target="blank_">
    @endif    
        <i class="fab fa-twitter text-primary"></i>&nbsp;Tweet
    </a>
</div>