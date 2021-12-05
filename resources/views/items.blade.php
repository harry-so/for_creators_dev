<!-- resources/views/items.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
<div class="card-body">
    <form action="{{ url('sell') }}" method="GET">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">
            出品へ
        </button>
    </form>
    <!-- 現在の本 -->
    @if (count($items) > 0)
    <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>アイテム一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    <tr>
                        <th>アイテム名</th>
                        <th>出品者</th>
                        <th>最低価格</th>
                        <th>商品紹介</th>
                    </tr>
                </tbody>  
                @foreach ($items as $item)
                <tfoot>    
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div>{{ $item->item_name }}</div>
                        </td>
                        <!-- 紹介者 -->
                        <td class="table-text">
                            <div>{{ $item->user->name}}</div>
                        </td>
                        <!-- 最低価格 -->
                        <td class="table-text">
                            <div>{{ $item->min_price }}</div>
                        </td>
                        <!-- 紹介 -->
                        <td class="table-text">
                            <div>{{ $item->item_desc }}</div>
                        </td>
                        <td>
                            <form action="{{ url('item/'.$item->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                    詳細
                                </button>
                            </form>
                        </td>
                        <!-- 本: 削除ボタン -->
                        @if(Auth::check())
                            @if(Auth::id() == $item->user_id)
                            <td>
                                <form action="{{ url('itemdelete/'.$item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>
                            </td>
                            
                            <td>
                                <form action="{{ url('itemsedit/'.$item->id) }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        更新
                                    </button>
                                </form>
                            </td>
                            @endif
                            @if(Auth::id() != $item->user_id && $item->fav_user()->where('user_id',Auth::id())->exists() !== true)
                            <td>
                                <form action="{{ url('item/fav/'.$item->id) }}" method="POST"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        FAV
                                    </button>
                                </form>
                            @endif
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tfoot>
            </table>
        </div>
    </div>
    @endif

</div>

@if( Auth::check())
@if (count($fav_items) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>お気に入り一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tr>
                        <th>アイテム名</th>
                        <th>商品紹介</th>
                        <th>出品者</th>
                    </tr>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($fav_items as $fav_item)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $fav_item->item_name }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $fav_item->item_desc }}</div>
                                </td>
                                <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                    <div>{{ $fav_item->user->name }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif

@endif
<div class="row">
	<div class="col-md-4 offset-md-4">
		{{ $items->links()}}
    </div>
</div>
@endsection