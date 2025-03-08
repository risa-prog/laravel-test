<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    
</head>
<body>
    <div class="detail">
        <table class="detail__table">
            <tr class="detail__table-row">
                <th class="detail__table-heading">お名前</th>
                <td class="detail__table-date">
                    <span>{{$contact->last_name}}</span>
                    <span>
                        {{$contact->first_name}}
                    </span>
                </td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">性別</th>
                <td class="detail__table-date">
                    @if($contact->gender=='1')
                        男性
                    @elseif($contact->gender=='2')
                        女性
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">メールアドレス</th>
                <td class="detail__table-date">{{$contact->email}}</td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">電話番号</th>
                <td>{{$contact->tel}}</td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">住所</th>
                <td class="detail__table-date">{{$contact->address}}</td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">建物名</th>
                <td class="detail__table-date">{{optional($contact)->building}}</td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">お遠い合わせの種類</th>
                <td class="detail__table-date">{{$contact->category->content}}</td>
            </tr>
            <tr class="detail__table-row">
                <th class="detail__table-heading">お問い合わせ内容</th>
                <td class="detail__table-date">{{$contact->detail}}</td>
            </tr>

        </table>
        <div class="delete">
            <form  class="delete-form" action="/delete" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$contact->id}}">
                    <button class="delete-form-submit">
                        削除
                    </button>
            </form>
        </div>
    </div>
</body>
</html>