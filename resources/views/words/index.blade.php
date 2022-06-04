    @extends('layouts.template')
    @section('head-section')
    @include('layouts.head')
    @endsection
    @section('header-section')
    @include('layouts.header')
    @endsection
    @section('content')
    <div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            @if(url()->previous() === url('/words/create'))
                <div class="panel-heading">{{ Auth::user()->name }}さん専用の単語帳が完成しました！</div>
            @else
            <div class="panel-heading">{{ Auth::user()->name }}さんが登録した単語一覧</div>
            @endif
            <div class="panel-body">
                @foreach($words as $word)
                単語：{{$word->title}}、
            　|　
                和訳：{{$word->translation}}
            　|　
                <button><a class="" href="{{route('words.edit',['word'=>$word->id])}}">編集</a></button><br>
                @endforeach
                <div class="">
                    <button type="button" class="btn btn-outline-primary">
                        <a class="h4" href="{{route('home')}}">トップページへ戻る</a>
                    </button>
                </div>
            </div>
        </nav>
    </div>
    </div>
    </div>
    @endsection
    @section('footer-section')
    @include('layouts.footer')
    @endsection
