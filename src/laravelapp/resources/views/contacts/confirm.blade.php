@extends('layout')
  <title>お問い合わせフォーム - 確認画面</title>
    @section('header')
      <h1>お問い合わせフォーム</h1>
    @endsection

    @section('content')
      <div class="contact-form">
        <form action="{{ route('contact.thanks') }}" method="POST" enctype="multipart/form-data">
        @csrf  
          <table>
            <tr>
              <td><label for="name">お名前</label></td>
              <td>
                {{ $data['name'] }}
              </td>
            </tr>
            <tr>
              <td><label for="email">メールアドレス</label></td>
              <td>
                {{ $data['email'] }}
              </td>
            </tr>
            <tr>
              <td><label for="sex">性別</label></td>
              <td>
                {{ $data['sex'] }}
              </td>
            </tr>
            <tr>
              <td><label for="category">お問い合わせカテゴリ<br>(複数選択可)</label></td>
              <td>
              {{ $data['category'] }}
              </td> 
            </tr>
            @if(isset($data['image_path']))
              <tr>
                <td><label for="image_path">画像</label></td>
                <td class="upload_img">
                <img src="{{ asset(str_replace('public/', 'storage/', $data['image_path'])) }}" alt="画像" width="500">
                </td>
              </tr>
            @endif
            <tr>
              <td><label for="play_env">プレイ環境</label></td>
              <td>
                {{ $data['play_env'] }}
              </td> 
            </tr>
            <tr>
              <td><label for="message">お問い合わせ内容</label></td>
              <td>
                {{ $data['message'] }}
              </td>
            </tr>
            <tr>
              <td class="send_btn" colspan="2">
                <input type="submit" name="send" value="送信">
              </td>
            </tr>  
          </table>
        </form>
      </div>
    @endsection