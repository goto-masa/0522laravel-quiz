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
            <div class="panel-heading">単語を編集する</div>
            <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('words.edit',['word'=>$word->id]) }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="title">単語</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title') ?? $word->title }}" />
                </div>
                <div class="form-group">
                    <label for="translation">和訳</label>
                    <input type="text" class="form-control" name="translation" id="translation"
                        value="{{ old('translation') ?? $word->translation }}" />
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
                </form>

            </div>
            </nav>
        </div>
        </div>
    </div>
@endsection
@section('footer-section')
    @include('layouts.footer')
@endsection
