@extends('layouts.app')
@section('content')

<div class="card-body">
    対象商品
    <ul>
        <li>商品名 : {{ $item->item_name }}</li>
        <li>クリエイター名 : {{ $item->user->name}}</li>
        <li>最低価格 : {{ $item->min_price }}</li>
        <li>商品紹介 : {{ $item->item_desc }}</li>
    </ul>
    <hr>
    @if( Auth::check())
    <form action="{{ url('purchase/confirm') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="card-title">
                <div>申請価格</div>
                <p>こちらの商品にお支払いができる最大額を記入ください（購入できる場合、こちらの価格以下の値段が自動で設定されます）</p>
            </div>
            <div class="col-sm-6">
                <input type="number" name="max_price" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                <div>クリエイターへのメッセージ</div>
                <p>クリエイターが選ぶ際に参考にします。</p>
            </div>
            <div class="col-sm-6">
                <input type="textbox" name="message" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                <div>支払い手段</div>
            </div>
            <div class="col-sm-6">
                <select name="payment">
                    <option value="1">クレジットカード</option>
                    <option value="2">銀行振込</option>
                </select>
            </div>
        </div>
        <!-- アイテム 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    購入申請へ
                </button>
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{Auth::id()}}" /> <!--/ User id 値を送信 -->
        <input type="hidden" name="item_id" value="{{$item->id}}" /> <!--/ Item id 値を送信 -->
    </form>
    @endif
    <hr>
    <a class="btn btn-danger pull-right" href="{{ url('item/'.$item->id) }}">Back</a>
</div>    
@endsection