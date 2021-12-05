@extends('layouts.app')
@section('content')

<div class="card-title">
    アイテム登録
</div>
    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- ログインしたユーザーしか投稿できない -->
    @if(Auth::check())
    <!-- 本登録フォーム -->
    <form action="{{ url('items') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- 本のタイトル -->
        <div class="form-group">
            <div class="card-title">
                アイテム名
            </div>
            <div class="col-sm-6">
                <input type="text" name="item_name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                最低価格
            </div>
            <div class="col-sm-6">
                <input type="number" name="min_price" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                紹介
            </div>
            <div class="col-sm-6">
                <input type="textbox" name="item_desc" class="form-control">
            </div>
        </div>
        <!-- アイテム 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    出品
                </button>
            </div>
        </div>
    </form>
@else
    <div>
        ログインしてください！
        <a href="/login">ログイン画面へ</a>
    </div>

@endif
@endsection
