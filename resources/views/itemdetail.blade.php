@extends('layouts.app')
@section('content')
@include('common.errors')
<div class="card-body">
    <form action="{{ url('purchase/'.$item->id) }}" method="GET">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
            購入へ
        </button>
        <a class="btn btn-danger pull-right" href="{{ url('/') }}">Back</a>
    </form>
    
    <hr>
    <ul>
        <li>商品名 : {{ $item->item_name }}</li>
        <li>クリエイター名 : {{ $item->user->name}}</li>
        <li>最低価格 : {{ $item->min_price }}</li>
        <li>商品紹介 : {{ $item->item_desc }}</li>
    </ul>
    
@endsection