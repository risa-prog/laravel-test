@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm">
    <div class="confirm__inner">
        <h2 class="confirm__ttl">Confirm</h2>
    </div>
    <form class="confirm__form" action="/thanks" method="post">
        @csrf
        <table class="confirm__table">
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お名前</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="last_name" value="{{$contact['last_name']}}">
                    <input class="confirm__table-input" type="hidden" name="first_name" value="{{$contact['first_name']}}">
                    {{$contact['last_name']}} {{$contact['first_name']}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">性別</th>
                <td class="confirm__table-data">
                    <input type="hidden" class="confirm__table-input" name="gender" value="{{$contact['gender']}}">
                    @if($contact['gender']=='1')
                        男性
                    @elseif($contact['gender']=='2')
                        女性
                    @elseif($contact['gender']=='3')
                        その他
                    @endif
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">メールアドレス</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="email" value="{{$contact['email']}}">
                    {{$contact['email']}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">電話番号</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="tel" value="{{$contact['tel']}}">
                    {{$contact['tel']}} 
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">住所</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="address" value="{{$contact['address']}}"> 
                    {{$contact['address']}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">建物名</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="building" value="{{optional($contact)['building']}}">
                    {{optional($contact)['building']}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お問い合わせの種類</th>
                <td class="confirm__table-data">
                    <input class="confirm__table-input" type="hidden" name="category_id" value="{{$contact['category_id']}}">
                    @if($contact['category_id']=="1")
                        商品のお届けについて
                    @elseif($contact['category_id']=="2")
                        商品の交換について
                    @elseif($contact['category_id']=="3")
                        商品トラブル
                    @elseif($contact['category_id']=="4")
                        ショップへのお問い合わせ
                    @elseif($contact['category_id']=="5")
                        その他
                    @endif
                    
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お問い合わせの内容</th>
                <td class="confirm__table-data">
                    <input type="hidden" class="confirm__table-input" name="detail" value="{{$contact['detail']}}">
                    {{$contact['detail']}}
                </td>
            </tr>
        </table>
        <div class="confirm__form-button">
            <button class="confirm__form-submit" type="submit" name="submit" value="complete">
                送信
            </button>
            
            <button class="confirm__link" type="submit" name="back" value="back">修正</button>
            </form>
           
        </div>
    </form>
</div>
@endsection