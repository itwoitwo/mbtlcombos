@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md">
        <div class="row card">
                <h2 class="card-header topic">MBTLCombosとは？</h2>
                <p class="card-body mb-0">
                    MBTLCombosとは、『MELTY BLOOD: TYPE LUMINA』の攻略情報の共有、ファン同士の交流を目的としたWebサービスです。
                    プレイヤーの皆様に投稿していただいたレシピを元に作られたデータベースから、様々な検索条件でコンボを探すことが出来ます。<br>
                    初心者向けのコンボを探すといった基本的なことから、キャラ毎の端での最大反撃を調べたり、魅せコンを探したりといったベテラン格ゲープレイヤーにもご満足いただけるような機能をご利用いただけます。
                    また、登録することで、実戦で使用するコンボを記録しておいたり、他のプレイヤーが使用しているコンボを参照したりといった、コンボに関する総合管理ツールとしての機能がご利用いただけます。<br>
                    ネットの海を探してコンボを見つけ、メモ帳に書き込んで整理するといった作業から解放されるはずです。<br>
                    <span class="text-danger">当サイトは個人のメルブラファンが運営する非公式のWebサービスです。ディライトワークス様、フランスパン様、他関連企業様とは一切関係ありません。ご利用の際は、ページ下部の利用規約を必ずお読みくださいますようお願い致します。</span>
                </p>
                <h2 class="card-header border-top topic">１分でわかる使い方</h2>
                <div class="card-body">
                <h6>基本</h6>
                <ul>
                    <li>コンボ検索から良さそうなレシピにお気に入りボタンを押しまくる！</li>
                    <li>コンボ管理ページに行き、お気に入りの中から実戦で使うコンボを吟味して採用ボタンを押す！<br>妥協する場合はレシピをアレンジして新しく投稿し、採用ボタンを押す！</li>
                    <li>採用コンボタブで一覧表示してメルブラのトレーニングモードで練習する！</li>
                </ul>
                <h6>その他</h6>
                <ul>
                    <li>有名プレイヤーのユーザーページからそのプレイヤーが使っているコンボの情報を得る。</li>
                    <li>自作したコンボがどれぐらい採用されているかわかる。</li>
                    <li>メルブラを離れていてコンボを忘れてしまっても、自分の使っていたコンボがすぐにわかる。</li>
                </ul>
                </div>
                <h2 class="card-header border-top topic">コンボ検索について</h2>
                <p class="card-body">
                    検索フォームに指定した条件で絞り込み検索が出来ます。項目を組み合わせることで細かな条件で検索することが出来ます。<br>
                    また、各コンボには難しさに応じてマークがついており、<br>
                    「簡単→<i class="fas fa-seedling text-success"></i>」「難しい→<i class="bi bi-joystick text-danger"></i>」「魅せコン→<i class="bi bi-moon-stars-fill text-primary"></i>」
                    という対応関係になっています。<br>
                    例：「キャラクター→アルクェイド」「難易度→簡単」「状況→端限定」とすると、<br>
                    アルクェイドの端限定の簡単なコンボが一覧で表示されます。さらにダメージで並び替えを実行し、一番威力の高いコンボを見つけたり、採用数で並べ替えて、人気があるコンボを見つけることが出来ます。<br>
                    ※「状況」を選択しない場合、「どこでも」を選んだ場合と同じになります。<br>
                    @include('combos.combo_annotation')
                </p>
                <h2 class="card-header border-top topic">コンボ投稿について</h2>
                <p class="card-body">
                    コンボ投稿ページに設置されている「表記について」をよくお読みいただき、他のプレイヤーに伝わりやすいように心がけてください。<br>
                    レシピ欄は様々な状況に対応出来るよう、基本的に自由に記述することが可能ですが技の繋ぎは半角の「>」を使用してください。<br>
                    キャラクターとレシピが完全に一致している場合は、投稿が弾かれるようになっているので、きれいな表記を心がけていただければ重複投稿を防ぐ事が出来ます。<br>
                    タグや備考欄に書き込む内容は公序良俗に違反せず、他の人が不快にならないような表現をするよう努めてください。<br>
                    動画欄にはそのコンボの動画が表示されるようURLを追加してください。You TubeやTwitchのクリップ機能が便利だと思います。<br>
                    <span class="text-danger">皆様の投稿なくしては成り立たないサービスなので、ぜひ気軽に投稿してくださいますようお願いします。<br>
                    検索で見つけたレシピの難しいところを自分で簡単にアレンジした妥協コンボを投稿する、というのも歓迎です。<br>
                    むしろ、そうして投稿したコンボを自分で採用リストに入れて管理することを推奨します。</span>

                </p>
                <h2 class="card-header border-top topic">コンボ管理機能について</h2>
                <p class="card-body">
                    「コンボ検索」から見つけたコンボの
                    <i class="bi bi-award text-danger"></i>&nbsp;採用、<i class="bi bi-star text-warning"></i>&nbsp;お気に入りボタンを押すことで、<br>
                    自分のコンボ管理ページから一覧が見られるようになります。もう一度押すと解除されます。<br>
                    「採用コンボ」「お気に入り」「投稿したコンボ」のそれぞれのタブの中から検索することで、その中から検索することが出来ます。<br>
                    例：「採用コンボ」タブの検索フォームから「キャラクター→遠野志貴」とすると、採用コンボの中から志貴のコンボが一覧で表示されます。<br>
                    また、他のプレイヤーのページでは、そのプレイヤーが採用しているコンボやお気に入り登録をしているコンボを見ることが可能です。<br>
                    サイドバー下に表示されているプレイヤー情報欄のTweetボタンから自分のページを紹介することが出来ます。<br>
                    また、コンボに表示されているプレイヤー名からそのプレイヤーのページに飛ぶことが出来ます。
                </p>
                <h2 class="card-header border-top topic">管理人について</h2>
                <p class="card-body">
                    いとん。<a href="https://twitter.com/iton619" target="_blank">Twitter</a><br>
                    メルブラもサイト制作も初心者。UNIでは黄色前後をウロウロしていた一般格ゲーマー。<br>
                    お問い合わせはリプかDMで。
                </p>
                {{-- <h2 class="card-header border-top topic">当サイトに掲載されている広告について</h2>
                
                <p class="card-body my-0 pb-0">当サイトでは、第三者配信の広告サービス（Googleアドセンス）を利用しており、ユーザーの興味に応じた商品やサービスの広告を表示するため、クッキー（Cookie）を使用しております。
                    クッキーを使用することで当サイトはお客様のコンピュータを識別できるようになりますが、お客様個人を特定できるものではありません。
                    
                    Cookieを無効にする方法やGoogleアドセンスに関する詳細は、<a target="_blank" href="http://www.google.co.jp/policies/technologies/ads/">こちら</a>をクリックしてください。</p>
                <p class="card-body my-0">MBTLCombosは、Amazon.co.jpを宣伝しリンクすることによってサイトが紹介料を獲得できる手段を提供することを目的に設定されたアフィリエイトプログラムである、Amazonアソシエイト・プログラムの参加者です。』</p>
                 --}}
                <h2 class="card-header topic">利用規約</h2>
                <div class="card-body">
                    <h6>利用規約</h6>
                    <ul>
                        <li>利用者は当サイトを利用した時点で当規約に同意するものとします。</li>
                        <li>公序良俗に反する表現、他の利用者を不快にする可能性の高い表現は禁止です。</li>
                        <li>当サイトを著しくサーバの負荷をかける行為、もしくはサーバをダウンさせる行為は、アクセス制限及び法的に処分を行う場合があります</li>
                        <li>今後第三者配信の広告サービスによる広告が掲載される可能性があります。</li>
                        <li>利用規約は当サイトの都合により改正することができます。追加、削除、別途定めた場合は改正規約に同意した前提とします。</li>
                    </ul>
                    <h6>免責事項</h6>
                    <ul>
                        <li>当サイトではご利用上の安全性などに細心の注意を払っておりますが、コンテンツの内容が正確であるかどうか、安全なものであるか等について保証をするものではなく、生じたトラブル・損失・損害に対しても何らの責任を負うものではありません。予めご了承ください。</li>
                    </ul>

                    </div>
        </div>
        <br>
</div>

<style>
    .topic {
        background-color:lightskyblue;
    }
  </style>
@endsection