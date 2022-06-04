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
            <div class="panel-heading">単語を登録しましょう</div>
            <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('words.create') }}" method="POST">
                    @csrf

                @for($i=0;$i<10;$i++)
                    <div class="form-group">
                        <label for="title">単語【{{$i+1}}】</label>
                        <input type="text" class="form-control" name="title[{{$i}}]" id="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="tranlation">和訳【{{$i+1}}】</label>
                        <input type="text" class="form-control" name="translation[{{$i}}]" id="due_date" value="{{ old('translation') }}" />
                    </div>
                @endfor

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
