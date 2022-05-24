    <!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravelquiz_app</title>
    <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">Quiz App</a>
        </nav>
        </header>

        <main>
            <div class="container">
                <div class="row">
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
                        <h1 class="pb-3">「Quiz App」とは？</h1>
                        <p class="a">英単語を自分で調べて登録し、自分だけのオリジナル単語帳を作っていくアプリです。</p>
                    </div>
                    <div class="border-bottom">
                        <div class="col-lg-8 ">
                            <h1 class="pb-3">STEP1</h1>
                            <p class="a">以下から和訳のわからない単語を見つけ、「単語」と「和訳」を登録します。</p>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-outline-primary">
                                <a href="">単語を登録する</a>
                            </button>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-outline-primary">単語帳一覧へ</button>
                        </div>
                        <div class="col-lg-8">

                            <h1 class="pb-3">STEP2</h1>
                            <p class="a">自分だけの単語帳が完成します。</p>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="col-lg-8 ">
                            <h1 class="pb-3">STEP3</h1>
                            <p class="a">作った単語帳を元に「クイズ」に挑戦します。</p>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-outline-primary">クイズに挑戦する</button>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-outline-primary">マイ単語帳へ</button>
                        </div>
                        <div class="col-lg-8">

                            <h1 class="pb-3">STEP4</h1>
                            <p class="pb-3">より詳しく意味を覚えていきたい単語には「例文」も登録しましょう！
        完全に意味を暗記した単語は積極的に「削除」していきましょう！
        単語帳から削除することで学習ポイントが手に入ります。</p>
                            <p>登録した「単語」や「例文」が消える心配はありません。
        忘れた頃に抜き打ちテストとしてクイズに登場します！</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
