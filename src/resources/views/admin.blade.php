@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    
@endsection

@section('link')
<nav class="header__nav">
    <form class="logout-link" action="/logout" method="post">
    @csrf
        <button class="logout-link-button" type="submit">logout</button>
    </form>
</nav>
@endsection

@section('content')
      
    <div class="admin">
        <div class="admin__inner">
            <h2 class="admin__ttl">Admin</h2>
        </div>
        <div class="search-content">
            <form class="search-form" action="/search" method="get" id="search">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">
                </div>
                <div class="search-form__gender">
                    <select class="search-form__gender-select" name="gender">
                        <option value="" disabled selected style="display:none;">性別</option>
                        <option value=""></option>
                        <option value="">
                            全て
                        </option>
                        <option value="1">
                        男性
                        </option>
                        <option value="2">
                        女性
                        </option>
                        <option value="3">
                        その他
                        </option>
                    </select>
                </div>
                <div class="search-form__category">
                    <select class="search-form__category-select" name="category_id">
                        <option value="" disabled selected style="display:none;">お問い合わせの種類</option>
                         <option value=""></option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">
                        {{$category->content}}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="search-form__date">
                    <input class="search-form__date-input" type="date" name="created_at">
                </div>
                <div class="search-form__button">
                    <button class="search-form__submit">検索</button>
                </div>
            </form>
            <form class="search-form__export" action="/search-export" method="get" form="search" id="export">
                    <input class="search-form__export-submit" type="submit" value="エクスポート">
            </form>
            <div class="search-form__reset">
                <form action="">
                    <button class="search-form__reset-button">リセット</button>
                </form>
            </div>
        </div>
        
        <div class="admin__option">
            <form action="/csv-download" method="get">
                <input class="admin__export" type="submit" value="エクスポート">
            </form>
           
            <!-- <span class="admin__pagination">{{$contacts->links('vendor.pagination.semantic-ui')}}</span> -->
             <span class="admin__pagination">{{$contacts->appends(request()->query())->links('vendor.pagination.semantic-ui')}}</span>
        </div>
        <div class="admin__list">
            <table class="admin__table">
                <tr class="admin__table-row">
                    <th class="admin__table-heading1">お名前</th>
                    <th class="admin__table-heading2">性別</th>
                    <th class="admin__table-heading3">メールアドレス</th>
                    <th class="admin__table-heading4">お問い合わせの種類</th>
                   <th class="admin__table-heading5"></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin__table-row">
                    <td class="admin__table-data1">
                        <span>{{$contact->last_name}}</span>
                        <span>{{$contact->first_name}}</span>
                    {{$contact->name}}</td>
                    <td class="admin__table-data2">
                        @if($contact->gender=='1')
                            男性
                        @elseif($contact->gender=='2')
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td class="admin__table-data3">{{$contact->email}}</td>
                    <td class="admin__table-data4">
                        {{$contact->category->content}}
                    </td>

                    <td class="admin__table-data5">
                        <button wire:click="openModal()" type="button" class="">
                            詳細
                        </button>
                        @if($showModal)
                        <div>
                            <button wire:click="closeModal()" type="button" class="">
                                ×
                            </button>
                        </div>
                         @endif
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection



