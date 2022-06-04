@extends('layouts.template')
@section('head-section')
    @include('layouts.head')
@endsection
@section('header-section')
    @include('layouts.header')
@endsection

@section('content')
    <div class="row justify-content-center">
            {{-- <div class="col col-md-4">
                <nav class="panel panel-default">
                <div class="panel-heading">フォルダ</div>
                <div class="panel-body">
                    <a href="#" class="btn btn-default btn-block">
                    フォルダを追加する
                    </a>
                </div>
                <div class="list-group">
                    @foreach($folders as $folder)
                    <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="list-group-item">
                        {{ $folder->title }}
                    </a>
                    @endforeach
                </div>
                </nav>
            </div> --}}
            <div class="d-block border-bottom">
                <div class="margin-center">
                    <h1 class="pb-3">「Quiz App」とは？</h1>
                    <p>英単語を自分で調べて登録し、自分だけのオリジナル単語帳を作っていくアプリです。</p>
                </div>
            </div>
            <div class="d-block border-bottom">
                <div class="margin-center display-f">
                    <div class="adjust-text">
                        <h2 class="pb-3">STEP1</h2>
                        <p class="a">以下から和訳のわからない単語を見つけ、「単語」を登録します。（自分でネットで検索しましょう！）</p>
                    </div>
                    <div class="adjustment">
                        <button type="button" class="btn btn-outline-primary">
                            <a class="h4" href="{{route('words.create')}}">単語を登録する</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="d-block border-bottom">
                <div class="margin-center display-f">
                    <div class="adjustment">
                        <button type="button" class="btn btn-outline-primary">
                            <a class="h4" href="{{route('words.index')}}">単語帳一覧へ</a></button>
                    </div>
                    <div class="adjust-text">
                        <h2 class="pb-3">STEP2</h2>
                        <p class="a">自分だけの単語帳が完成します。後から編集することも可能です。</p>
                    </div>
                </div>
            </div>
            <div class="d-block border-bottom">
                <div class="margin-center display-f">
                    <div class="adjust-text">
                        <h2 class="pb-3">STEP3</h2>
                        <p class="a">作った単語帳を元に「クイズ」に挑戦します。</p>
                    </div>
                    <div class="adjustment">
                        <button type="button" class="btn btn-outline-primary">
                            <a href="" class="h4">クイズに挑戦する</a></button>
                    </div>
                </div>
            </div>
            <div class="d-block border-bottom">
                <div class="margin-center display-f">
                    <div class="adjustment">
                        <button type="button" class="btn btn-outline-primary">
                            <a href="" class="h4">マイ単語帳へ</a></button>
                    </div>
                    <div class="adjust-text">
                        <h2 class="pb-3">STEP4</h2>
                        <p class="pb-3">より詳しく意味を覚えていきたい単語には「例文」も登録しましょう</p>
                            <p>そして、完全に意味を暗記した単語は積極的に「削除」していきましょう。
                        単語帳から削除すると覚えた証として学習ポイントが手に入ります。</p>
                        <p>登録した「単語」や「例文」が消える心配はありません。
                        忘れた頃に抜き打ちテストとしてどこかで登場します！</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footer-section')
    @include('layouts.footer')
@endsection
