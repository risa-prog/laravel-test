<div>
    <button wire:click="openModal()" type="button" class="">
        詳細
    </button>
    @if($showModal)
        <button wire:click="closeModal()" type="button" class="">
            ×
        </button>
        <div>
            <table>
                <tr>
                    <th>お名前</th>
                    <td>
                        <span>
                            {{$contact->first_name}}
                        </span>
                        <span>
                            {{$contact->last_name}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{$contact->gender}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{$contact->email}}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{$contact->tel}}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{$contact->address}}</td>
                </tr>
                <tr>
                    <th><建物名/th>
                    <td>{{optional($contact)->building}}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{$contact->category->content}}</td>
                </tr>
                <tr>
                    <th>お問い合わせの内容</th>
                    <td>{{$contact->detail}}</td>
                </tr>
            </table>
            <form action="" method="">
                <button>削除</button>
            </form>
        </div>
        @endif

    <!-- {{-- Stop trying to control. --}} -->
</div>
