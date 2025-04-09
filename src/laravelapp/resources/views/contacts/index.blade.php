@extends('layout')
  <title>お問い合わせフォーム - トップページ</title>

    @section('header')
      <h1>お問い合わせフォーム</h1>
    @endsection  
      
    @section('content')
      <div class="contact-form">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $err_msg)
                <li>{{ $err_msg }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('contact.confirm') }}" method="POST" enctype="multipart/form-data">
        @csrf  
          <table>
            <tr>
              <td>
                <label for="name">お名前</label>
              </td>
              <td>
                <input type="text" name="name">
              </td>
            </tr>
            <tr>
              <td>
                <label for="email">メールアドレス</label>
              </td>
              <td>
                <input type="email" name="email">
              </td>
            </tr>
            <tr>
              <td>
                <label for="sex">性別</label>
              </td>
              <td>
                <label><input type="radio" name="sex" value="男性">男性</label>
                <label><input type="radio" name="sex" value="女性">女性</label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="category">お問い合わせカテゴリ<br>(複数選択可)</label>
              </td>
              <td>
                @foreach($cates as $category)
                  <input type="checkbox" name="category[]" value="{{ $category }}"
                  {{ is_array(old('category')) && in_array($category, old('category')) ? 'checked' : '' }}>
                  {{ $category }}
                @endforeach 
              </td> 
            </tr>
            <tr>
              <td>
                <label for="play_env">プレイ環境</label>
              </td>
              <td>
                <select name="play_env">
                  <option value="">選択してください</option>
                  @foreach($play_envs as $play_env)
                    <option value="{{ $play_env }}" {{ old('play_env') == $play_env ? 'selected' : '' }}>
                      {{ $play_env }}
                    </option>
                  @endforeach
                </select>
              </td> 
            </tr>
            <tr>
              <td>
                <label for="image_path">画像</label>
              </td>
              <td>
                <input type="file" name="image_path">
              </td>
            </tr>
            <tr>
              <td><label for="message">お問い合わせ内容</label></td>
              <td>
                <textarea name="message" rows="8" cols="80"></textarea>
              </td>
            </tr>
            <tr>
              <td class="send_btn" colspan="2">
                <input type="submit" name="send" value="お問い合わせ内容確認へ">
              </td>
            </tr>  
          </table>
        </form>
      </div>
    @endsection

        
