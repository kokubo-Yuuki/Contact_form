@extends('layout')
  <title>お問い合わせフォーム - お問い合わせ一覧</title>

    @section('header')
      <h1>お問い合わせ一覧</h1>
      <p>
        お問い合わせの一覧ページになります。<br>
        お好きにお問い合わせ内容をご覧ください。
      </p>
    @endsection

    @section('content')
      <div class="contact-link">
        <p>気になることがありましたら、お気軽にお問い合わせください。</p>
        <a href="{{ route('contact.index') }}" class="btn">お問い合わせフォームへ</a>
        <p class="contact-intro">↓↓ 最近はこんなお問い合わせがありました ↓↓</p>
        @foreach($contacts as $contact)
          <div class="contact-list">
            <ul>
              <li class="cont-msg">{{ $contact->message }}</li>
              <li class="cont-cate">{{ $contact->category }}</li>
              <li class="cont-env">{{ $contact->play_env }}</li>
              @if(!empty($contact->image_path))
                <li>
                  <img src="{{ asset(str_replace('public/', 'storage/', $contact->image_path)) }}" alt="画像" width="500">
                </li>
              @endif
              <li class="cont-time">{{ $contact->created_at }}</li>
            </ul>
          </div>
        @endforeach
      </div> 
    @endsection 
