@extends('layouts.app')

@section('content')
<div class="low col-md card-group">
    @include('commons.sidebar')
    <div class="col-md">
        <div class="row card">
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
            <h2 class="card-header border-top topic">当サイトに掲載されている広告について</h2>
            <p class="card-body my-0 pb-0">当サイトでは、第三者配信の広告サービス（Googleアドセンス）を利用しており、ユーザーの興味に応じた商品やサービスの広告を表示するため、クッキー（Cookie）を使用しております。
                クッキーを使用することで当サイトはお客様のコンピュータを識別できるようになりますが、お客様個人を特定できるものではありません。
                
                Cookieを無効にする方法やGoogleアドセンスに関する詳細は、<a target="_blank" href="http://www.google.co.jp/policies/technologies/ads/">こちら</a>をクリックしてください。</p>
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