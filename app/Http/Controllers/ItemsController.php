<?php

namespace App\Http\Controllers;
use App\Item;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(5);
        
        if(Auth::check()) {
            $fav_items = Auth::user()->fav_items()->get();
            return view('items', [
                'items' => $items,
                'fav_items' =>$fav_items
            ]);
        }else{
            return view('items', [
                'items' => $items,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
        'item_name' => 'required|max:255',
        'min_price' => 'required|max:100',
        'item_desc' => 'required|max:500',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->min_price = $request->min_price;
        $items->user_id = Auth::id();
        $items->item_desc = $request->item_desc;
        $items->published = now();
        $items->save();
        return redirect('/');
    }

    public function sell() {
        return view ('sell');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  商品ページ
    public function show(Item $item)
    {
        return view('itemdetail',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('itemsedit',['item'=> $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'min_price' => 'required|max:100',
            'item_desc' => 'required|max:500',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquent モデル
        $items = Item::find($request->id);
        $items->item_name = $request->item_name;
        $items->min_price = $request->min_price;
        $items->user_id = Auth::id();
        $items->item_desc = $request->item_desc;
        $items->published = now();
        $items->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/');
    }
    public function fav($item_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $item = Item::find($item_id);
        
        //リレーションの登録
        $item->fav_user()->attach($user);
        
        return redirect('/');
    }
}
