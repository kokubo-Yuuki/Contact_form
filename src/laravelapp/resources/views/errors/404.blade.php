@extends('layout')

@section('content')
  <div class="nothing-page">
    <p>お探しのページは見つかりませんでした。</p>
    <a href="{{ route('home') }}" class="back-btn">
      ホームへ戻る
    </a>
  </div>
@endsection