@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">
      今見てるのは <a href="https://learnku.com/courses/laravel-essential-training">Laravelプロジェクト</a>のウェブテキストです。
    </p>
    <p>
      ここから　始まりましょう。
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">すぐ登録</a>
    </p>
  </div>
@stop
