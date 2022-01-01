<div class="form-group">
    <div class="form-group row m-2">
        <div class="col-md-3 mb-2">
            <select name="キャラクター" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>キャラ選択</option>
                <option value="遠野志貴"
                    @if(isset($request))
                        @if($request->キャラクター == '遠野志貴') selected  @endif 
                    @endif>遠野志貴
                </option>
                <option value="アルクェイド"
                    @if(isset($request))
                        @if($request->キャラクター == 'アルクェイド') selected  @endif 
                    @endif>アルクェイド
                </option>
                <option value="遠野秋葉"
                    @if(isset($request))
                        @if($request->キャラクター == '遠野秋葉') selected  @endif 
                    @endif>遠野秋葉
                </option>
                <option value="シエル"
                    @if(isset($request))
                        @if($request->キャラクター == 'シエル') selected  @endif 
                    @endif>シエル
                </option>
                <option value="翡翠"
                    @if(isset($request))
                        @if($request->キャラクター == '翡翠') selected  @endif 
                    @endif>翡翠
                </option>
                <option value="琥珀"
                    @if(isset($request))
                        @if($request->キャラクター == '琥珀') selected  @endif 
                    @endif>琥珀
                </option>
                <option value="翡翠＆琥珀"
                    @if(isset($request))
                        @if($request->キャラクター == '翡翠＆琥珀') selected  @endif 
                    @endif>翡翠＆琥珀
                </option>
                <option value="軋間紅摩"
                    @if(isset($request))
                        @if($request->キャラクター == '軋間紅摩') selected  @endif 
                    @endif>軋間紅摩
                </option>
                <option value="有馬都古"
                    @if(isset($request))
                        @if($request->キャラクター == '有馬都古') selected  @endif 
                    @endif>有馬都古
                </option>
                <option value="ノエル"
                    @if(isset($request))
                        @if($request->キャラクター == 'ノエル') selected  @endif 
                    @endif>ノエル
                </option>
                <option value="ロア"
                    @if(isset($request))
                        @if($request->キャラクター == 'ロア') selected  @endif 
                    @endif>ロア
                </option>
                <option value="ヴローヴ"
                    @if(isset($request))
                        @if($request->キャラクター == 'ヴローヴ') selected  @endif 
                    @endif>ヴローヴ
                </option>
                <option value="暴走アルクェイド"
                    @if(isset($request))
                        @if($request->キャラクター == '暴走アルクェイド') selected  @endif 
                    @endif>暴走アルクェイド
                </option>
                <option value="セイバー"
                    @if(isset($request))
                        @if($request->キャラクター == 'セイバー') selected  @endif 
                    @endif>セイバー
                </option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <input class="form-control" id="始動技検索" placeholder="始動技検索" name="始動技検索" type="text" @if(isset($request)) value="{{$request->始動技検索}}" @endif>
        </div>
        <div class="col-md-3 mb-2">
            <select name="version" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>Ver. 指定</option>
                <option value="1.04"
                    @if(isset($request))
                        @if($request->version == '1.04') selected  @endif 
                    @endif>Ver. 1.04
                </option>
                <option value="1.00"
                    @if(isset($request))
                        @if($request->version == '1.00') selected  @endif 
                    @endif>Ver. 1.00
                </option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select name="コンボ難易度" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>難易度指定</option>
                <option value="簡単"
                @if(isset($request))
                        @if($request->コンボ難易度 == '簡単') selected  @endif 
                    @endif>簡単！安定！</option>
                <option value="普通"
                @if(isset($request))
                        @if($request->コンボ難易度 == '普通') selected  @endif 
                    @endif>そこそこ</option>
                <option value="難しい"
                @if(isset($request))
                        @if($request->コンボ難易度 == '難しい') selected  @endif 
                    @endif>ベテラン向け</option>
                <option value="魅せコン"
                @if(isset($request))
                        @if($request->コンボ難易度 == '魅せコン') selected  @endif 
                    @endif>魅せコン</option>
            </select>
        </div>
    </div>
    <div class="form-group row m-2">
        <div class="col-md-3 mb-2">
            <select name="状況" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>画面端指定等</option>
                <option value=""
                    @if(isset($request))
                        @if($request->状況 == 'どこでも') selected  @endif 
                    @endif>どこでも
                </option>
                <option value="端以外"
                    @if(isset($request))
                        @if($request->状況 == '端以外') selected  @endif 
                    @endif>端以外
                </option>
                <option value="端限定"
                    @if(isset($request))
                        @if($request->状況 == '端限定') selected  @endif 
                    @endif>端限定
                </option>
                <option value="端背負い限定"
                    @if(isset($request))
                        @if($request->状況 == '端背負い限定') selected  @endif 
                    @endif>端背負い限定
                </option>
                <option value="その他"
                    @if(isset($request))
                        @if($request->状況 == 'その他') selected  @endif 
                    @endif>その他
                </option>
            </select>
        </div>                
        <div class="col-md-3 mb-2">
            <select name="始動技" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>始動技系統指定</option>
                <option value="A系統"
                    @if(isset($request))
                        @if($request->始動技 == 'A系統') selected  @endif 
                    @endif>A系統
                </option>
                <option value="B系統"
                    @if(isset($request))
                        @if($request->始動技 == 'B系統') selected  @endif 
                    @endif>B系統
                </option>
                <option value="C系統"
                    @if(isset($request))
                        @if($request->始動技 == 'C系統') selected  @endif 
                    @endif>C系統
                </option>
                <option value="空中技"
                    @if(isset($request))
                        @if($request->始動技 == '空中技') selected  @endif 
                    @endif>空中技
                </option>
                <option value="必殺技"
                    @if(isset($request))
                        @if($request->始動技 == '必殺技') selected  @endif 
                    @endif>必殺技
                </option>
                <option value="その他"
                    @if(isset($request))
                        @if($request->始動技 == 'その他') selected  @endif 
                    @endif>その他
                </option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select name="counter_hit" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>カウンター関連</option>
                <option value="ノーマルヒット"
                    @if(isset($request))
                        @if($request->counter_hit == 'ノーマルヒット') selected  @endif 
                    @endif>ノーマルヒット
                </option>
                <option value="カウンター限定"
                    @if(isset($request))
                        @if($request->counter_hit == 'カウンター限定') selected  @endif 
                    @endif>カウンター限定
                </option>
                <option value="フェイタル限定"
                    @if(isset($request))
                        @if($request->counter_hit == 'フェイタル限定') selected  @endif 
                    @endif>フェイタル限定
                </option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select name="video" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>動画指定無し</option>
                <option value="動画付きのみ"
                    @if(isset($request))
                        @if($request->video == '動画付きのみ') selected  @endif 
                    @endif>動画付きのみ
                </option>
            </select>
        </div>
    </div>
    <div class="form-group row m-2">
        <div class="form-group col-md-3 mb-2">
            <div class="ml-1">
            {!! Form::label('magic_circuit', 'マジックサーキット') !!}
            </div>
            <select name="magic_circuit" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>指定無し</option>
                <option value="0"
                    @if(isset($request))
                        @if($request->magic_circuit == '0') selected  @endif 
                    @endif>0本
                </option>
                <option value="1"
                    @if(isset($request))
                        @if($request->magic_circuit == '1') selected  @endif 
                    @endif>1本
                </option>
                <option value="2"
                    @if(isset($request))
                        @if($request->magic_circuit == '2') selected  @endif 
                    @endif>2本
                </option>
                <option value="3"
                    @if(isset($request))
                        @if($request->magic_circuit == '3') selected  @endif 
                    @endif>3本
                </option>
                <option value="4"
                    @if(isset($request))
                        @if($request->magic_circuit == '4') selected  @endif 
                    @endif>4本
                </option>
                <option value="10"
                    @if(isset($request))
                        @if($request->magic_circuit == '10') selected  @endif 
                    @endif>強制開放あり
                </option>
            </select>
        </div>
        <div class="form-group col-md-3 mb-2">
            <i class="fas fa-moon fa-flip-horizontal text-warning ml-1"></i>&nbsp;:&nbsp;{!! Form::label('moon', 'ムーンアイコン') !!}
            <select name="moon" class="form-control">
                <option value="" @if(isset($request)) @else selected @endif>指定無し</option>
                <option value="0"
                    @if(isset($request))
                        @if($request->moon == '0') selected  @endif 
                    @endif>0カウント
                </option>
                <option value="1"
                    @if(isset($request))
                        @if($request->moon == '1') selected  @endif 
                    @endif>1カウント
                </option>
                <option value="2"
                    @if(isset($request))
                        @if($request->moon == '2') selected  @endif 
                    @endif>2カウント
                </option>
                <option value="3"
                    @if(isset($request))
                        @if($request->moon == '3') selected  @endif 
                    @endif>3カウント
                </option>
                <option value="10"
                    @if(isset($request))
                        @if($request->moon == '10') selected  @endif 
                    @endif>ムーンドライブ
                </option>
            </select>
        </div>
        <div class="form-group col-md-3 mb-2">
            {!! Form::label('タグ', ' タグ検索') !!}
            <input class="form-control" id="タグ" placeholder="例：基礎コン" name="タグ" type="text" @if(isset($request)) value="{{$request->タグ}}" @endif>
        </div>
        <div class="form-group col-md mb-2 mx-2">
            {!! Form::label('serch', '　') !!}
            {!! Form::submit('検索する', ['class' => 'btn btn-info btn-block']) !!}
        </div>
    </div>
</div>