@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact">
    <div class="contact__inner">
        <h2 class="contact__ttl">Contact</h2>
    </div>
    <div class="contact__content">
        <form class="contact__form" action="/confirm" method="post">
            @csrf
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">
                    お名前
                    </span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <input class="contact__form-input" type="text" name="last_name" value="{{old('last_name')}}" placeholder="例:山田">
                    <input class="contact__form-input"
                    type="text" name="first_name" value="{{old('first_name')}}" placeholder="例:太郎">
                </div>
            </div>
            <div class="error">
                @error('last_name')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
                @error('first_name')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            

            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">性別</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <label class="contact__form-gender">
                        <input class="contact__form-radio" type="radio" name="gender" value="1" checked @if((int)old('gender')== 1) checked @endif>男性
                    </label>
                    <label class="contact__form-gender">
                        <input class="contact__form-radio" type="radio" name="gender" value="2" @if((int)old('gender')==2) checked @endif>女性
                    </label>
                    <label class="contact__form-gender">
                        <input class="contact__form-radio" type="radio" name="gender" value="3" @if((int)old('gender')==3) checked @endif>その他
                    </label>
                </div>
            </div>
            <div class="error">
                @error('gender')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">メールアドレス</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <input class="contact__form-input" type="email" name="email" value="{{old('email')}}" placeholder="例:test@example.com">
                </div>
            </div>
            <div class="error">
                @error('email')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">電話番号</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <input class="contact__form-input" type="text" name="tel1" placeholder="080" value="{{old('tel1')}}">
                    <span>-</span>
                    <input class="contact__form-input" type="text" name="tel2" placeholder="1234" value="{{old('tel2')}}">
                    <span>-</span>
                    <input class="contact__form-input" type="text" name="tel3" placeholder="5678" value="{{old('tel3')}}">
                </div>
            </div>
            <div class="error">
                @if($errors->has('tel1'))
                <p class="error-message">
                    {{$errors->first('tel1')}}
                </p>
                @elseif($errors->has('tel2'))
                    <p class="error-message">
                    {{$errors->first('tel2')}}
                    </p>
                @elseif($errors->has('tel3'))
                    <p class="error-message">
                    {{$errors->first('tel3')}}
                    </p>
                @endif
            </div>
           
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">住所</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <input class="contact__form-input" type="text" name="address" value="{{old('address')}}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>
            <div class="error">
                @error('address')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">建物名</span>
                    
                </div>
                <div class="contact__form-item">
                    <input class="contact__form-input" type="text" name="building" value="{{old('building')}}" placeholder="例:千駄ヶ谷マンション101">
                </div>
            </div>
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">お問い合わせの種類</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <!-- <label for=""></label> -->
                    <select class="contact__form-select" name="category_id">
                        <option value="" disabled selected style="display:none;">選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if((int)old('category_id')==$category->id) selected @endif>
                            {{$category->content}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="error">
                @error('category_id')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            </div>
            <div class="contact__form-group">
                <div class="contact__form-text">
                    <span class="contact__form-label">お問い合わせの内容</span>
                    <span class="contact__form-required">※</span>
                </div>
                <div class="contact__form-item">
                    <textarea class="contact__form-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">
                    {{old('detail')}}
                    </textarea>
                </div>
            </div>
            <div class="error">
                @error('detail')
                <p class="error-message">
                    {{$message}}
                </p>
                @enderror
            </div>
            
            <div class="contact__form-button">
                <button class="contact__form-submit" type="submit">
                    確認画面
                </button>
            </div>
        </form>
    </div>
    
   
</div>
@endsection