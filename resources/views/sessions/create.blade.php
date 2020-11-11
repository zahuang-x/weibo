@extends('layouts.default')
@section('title', '登录')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>ログイン</h5>
    </div>
    <div class="card-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">メール：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">パスワード：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Memberme</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">ログイン</button>
      </form>

      <hr>

      <p>考え中？<a href="{{ route('signup') }}">すぐ登録！</a></p>
    </div>
  </div>
</div>
@stop